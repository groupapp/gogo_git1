
<?php

$tcSite_Url="lemontreeclothing.com/cp/";

$tcFistName=$_POST['tcFistName'];
$tcLastName=$_POST['tcLastName'];
$tcUserIDNO=$_POST['tcUserIDNO'];
$password=$_POST['password'];
$tcCellNumb=$_POST['tcCellNumb'];
$tnSMS_Numb=$_POST['tnSMS_Numb'];
/*
$tcAddressX=$_POST['tcAddressX'];
$tcCityName=$_POST['tcCityName'];
$tcProvince=$_POST['tcProvince'];
$tcZipsCode=$_POST['tcZipsCode'];
*/
$tcOpenDate=date("Y-m-d" );
$tcOpenTime=date("H:i:s" );
include('function.php'); 
	
	
	
		

	$strSQL = "SELECT * FROM acc_user Where cUserIDNO='".$tcUserIDNO."'"; 
	$DB = new myDB;
	$DB->query($strSQL);


	
	
	if ($DB->rows==0){
		$DB_i = new myDB;
		
		$strSQL_i		= ("INSERT INTO acc_user (cFistName,cLastName,cUserIDNO,cPassword,cCellNumb,nSMS_Numb,cOpenDate,cOpenTime
				) VALUES(
				\"".$tcFistName."\",
				\"".$tcLastName."\",
				\"".$tcUserIDNO."\",
				\"".$password."\",
				\"".$tcCellNumb."\",
				\"".$tnSMS_Numb."\",
				\"".$tcOpenDate."\",
				\"".$tcOpenTime."\"
				)");


		$DB_i->query($strSQL_i);
		
	
		$DB1 = new myDB;
		$strSQL1 = "SELECT * FROM acc_user Where  cUserIDNO='".$tcUserIDNO."'"; 		

		

		$DB1->query($strSQL1);

		while ($data1 = $DB1->fetch_array($DB1->res)){
			$tnUser_Num=$data1["nUser_Num"];
			$tcUser_Num=$tnUser_Num+70000;
			//$tcUser_Num=$tnUser_Num1."";
			
		}
		
		
		$DB2 = new myDB;
		$strSQL2 = "SELECT * FROM  spt_SMS   WHERE  nSMS_Numb =".$tnSMS_Numb; 		
		
		$DB2->query($strSQL2);
		while ($data2 = $DB2->fetch_array($DB2->res)){
			$tcCountryX=$data2["cCountryX"];
			$tcSuffixAT=$data2["cSuffixAT"];
			$tcCarriers=$data2["cCarriers"];
		}
		$DB_u = new myDB;
		$strSQLu = "UPDATE acc_user SET cUser_Num='".$tcUser_Num."',";
		if($tnSMS_Numb!='')
		$strSQLu .= " nSMS_Numb = ".$tnSMS_Numb.",";
		$strSQLu .=	" cCarriers = '".$tcCarriers."', cSuffixAT = '".$tcSuffixAT."', cCountryX = '".$tcCountryX."'  WHERE   nUser_Num =".$tnUser_Num ;
		
		
		$DB_u->query($strSQLu);	

		$DB->close();
		$DB_i->close();
		$DB1->close();
		$DB2->close();
		$DB_u->close();
		
	}
	else
	{
		echo "<script>alert('Already we have same email.');location.replace('index.php');</script>";
		exit;
	}	

	

	$subject="Thank you for your registration.";

	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From:Encore<contact@encore.com>' . "\n";

	$html = "Member ID:".$tcUser_Num. "\n";
    $html.= "Email:".$tcUserIDNO. "\n"; 
    $html.= "Thank for your registration";

	$tto=$tcCellNumb.$tcSuffixAT;

	$to=$tcUserIDNO;
	$htmBody = "<!doctype html><html><head><meta http-equiv=content-type content=text/html; charset=UTF-8>";
   $htmBody .= "<style type=text/css><!-- td  {font-size: 10pt; font-fmaily:Tahoma,Arial;  COLOR:black;text-decoration: none} --></style>";
   $htmBody .= "</head><body>";

   $htmBody .=  "<center><table border=0 cellpadding=10 cellspacing=0 bgcolor=#8C001A>";
   $htmBody .=  "<tr><td width=500 align=center><a href=http://www." . $tcSite_Url . " target=_blank><img border=0 src=http://www." . $tcSite_Url  .  "/img/logo-x.png></a></td></tr>";
   $htmBody .=  "</table></center>";

   $htmBody .= "<center><table border=0 cellpadding=0 cellspacing=0 bgcolor=#FFFFFF>";
   $htmBody .= " <tr><td align=center><font face=Tahoma><b>Thank you for your registration.</b></td></tr>";
   $htmBody .=  "</table></center>";

   $htmBody .=  "<center>";
   $htmBody .= "<table border=0 cellpadding=1 cellspacing=1 bgcolor=#FFFFFF>";
   $htmBody .="  <tr><td align=left><font face=Tahoma><b>Member ID:". $tcUser_Num. "<b></td></tr>";
   $htmBody .="  <tr><td align=left><font face=Tahoma>Date:". $tcOpenDate . "</td></tr>";
   $htmBody .= "  <tr><td align=left><font face=Tahoma>Time:" . $tcOpenTime. "</td></tr>";
   $htmBody .= "</table>";
   $htmBody .=  "</center>";

   $htmBody .= "<div align=center>";
   $htmBody .= "<table border=0 cellpadding=9 cellspacing=1>";
   $htmBody .= "<tr height=10><td colspan=2></td></tr>";
   $htmBody .= "<tr height=30><td colspan=2></td></tr>";
   $htmBody .= "</table>";
   $htmBody .= "</div>";

	
	mail($tto, $subject, $html, $headers);
	mail($to, $subject, $htmBody, $headers);

	echo "<script>location.replace('index.php');</script>";	
?>






