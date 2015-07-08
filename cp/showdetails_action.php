<?php 
	$tcSite_Url="lemontreeclothing.com/cp/";
	$action=$_REQUEST['action'];
	$cUser_Num=$_REQUEST['cUser_Num'];
	$cFistName=$_POST['cFistName'];
	$cLastName=$_POST['cLastName'];
	$cEmail=$_POST['cEmail'];
	$cCellNumb=$_POST['cCellNumb'];
	$tnSMS_Numb=$_POST['tnSMS_Numb'];
	$cAddressX=$_POST['cAddressX'];
	$cCityName=$_POST['cCityName'];
	$cProvince=$_POST['cProvince'];
	$cZipsCode=$_POST['cZipsCode'];
	$cPassword=$_POST['cPassword'];
	
	$tcOpenDate=date("Y-m-d" );
	$tcOpenTime=date("H:i:s" );

	include('function.php');
	
	$DB2 = new myDB;
	$strSQL2 = "SELECT * FROM  spt_SMS   WHERE  nSMS_Numb =".$tnSMS_Numb; 		
	
	$DB2->query($strSQL2);
	while ($data2 = $DB2->fetch_array($DB2->res)){
		$tcCountryX=$data2["cCountryX"];
		$tcSuffixAT=$data2["cSuffixAT"];
		$tcCarriers=$data2["cCarriers"];
	}

	$DB = new myDB;
	if($action=='add'){

		$strSQLc = "SELECT * FROM acc_user Where cUserIDNO='".$cEmail."'"; 
		
			
			//print_r('xxxx'.$strSQLc);
			//exit;
		$DBc = new myDB;
		$DBc->query($strSQLc);
		if ($DBc->rows==0)
		{
			
			

			
			
			$strSQL=("INSERT INTO acc_user (cSponsorX,cFistName,cLastName,cCellNumb,cUserIDNO,cAddressX,nSMS_Numb,cCountryX,cSuffixAT,cCarriers,cCityName,cProvince,cZipsCode,cOpenDate,cOpenTime)
			VALUES (
			\"".$cUser_Num."\",
			\"".$cFistName."\",
			\"".$cLastName."\",
			\"".$cCellNumb."\",
			\"".$cEmail."\",
			\"".$cAddressX."\",
			\"".$tnSMS_Numb."\",
			\"".$tcCountryX."\",
			\"".$tcSuffixAT."\",
			\"".$tcCarriers."\",
			\"".$cCityName."\",
			\"".$cProvince."\",
			\"".$cZipsCode."\",
			\"".$tcOpenDate."\",
			\"".$tcOpenTime."\")");
			$DB->query($strSQL);

			//print_r($strSQL);
			//exit;

			$strSQLi="SELECT nUser_Num  from acc_user Order By nUser_Num DESC Limit 0,1";
			$DBi = new myDB;
			$DBi->query($strSQLi);
				while ($data = $DBi->fetch_array($DBi->res)){
					$nUser_Num=$data["nUser_Num"];
					$cUser_Num=$data["nUser_Num"]+70000;
					
				}
			
			$strSQLu="UPDATE acc_user SET cUser_Num='".$cUser_Num."' WHERE nUser_Num=".$nUser_Num;
			
			//print_r($strSQLu);
			//exit;
			$DBu = new myDB;
			$DBu->query($strSQLu);



		}
		else
		{
			echo "<script>alert('Already we have same email.');location.replace('/cp/myaccount.php');</script>";
			exit;
		}	
		
//-------------------------------------------------------------------------------------------------------------------
		
		



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
		$htmBody .= "<tr><td width=500 align=center><a href=http://".$tcSite_Url." target=_blank><img border=0 src=http://".$tcSite_Url. "/img/logo-x.png></a></td></tr>";
	   $htmBody .=  "</table></center>";
	   $htmBody .= "<center><table border=0 cellpadding=0 cellspacing=0 bgcolor=#FFFFFF>";
	   $htmBody .= " <tr><td align=center><font face=Tahoma><b>Thank you for your registration.</b></td></tr>";
	   $htmBody .=  "</table></center>";
	   $htmBody .=  "<center>";
	   $htmBody .= "<table border=0 cellpadding=1 cellspacing=1 bgcolor=#FFFFFF>";
	   $htmBody .="  <tr><td align=left><font face=Tahoma><b>Member ID:". $tcUser_Num. "<b></td></tr>";
	   $htmBody .="  <tr><td align=left><font face=Tahoma>Date:". $tcOpenDate . "</td></tr>";
	   $htmBody .= "  <tr><td align=left><font face=Tahoma>Time:" . $tcOpenTime. "</td></tr>";
	   $htmBody .= "  <tr><td align=left><font face=Tahoma>Verify an email address with BigTMS to confirm that you own it.</td></tr>";
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

//-------------------------------------------------------------------------------------------------------------------
	}

	else if($action=='del')
	{
		$strSQL="UPDATE acc_user SET cSponsorX='0' WHERE cUser_Num='".$cUser_Num."'";
	
		$DB->query($strSQL);
		
	}
	else
	{
		$strSQL="UPDATE acc_user SET  cFistName='".$cFistName."',cLastName='".$cLastName."', cCellNumb='".$cCellNumb."', cUserIDNO='".$cEmail."', cAddressX='".$cAddressX."',  nSMS_Numb=".$tnSMS_Numb.",cCountryX='".$tcCountryX."',cSuffixAT='".$tcSuffixAT."',cCarriers='".$tcCarriers."', cCityName='".$cCityName."', cProvince='".$cProvince."', cZipsCode='".$cZipsCode."',cPassword='".$cPassword."' where cUser_Num='".$cUser_Num."'";
			$DB->query($strSQL);
	}
	//print_r($strSQL);	
	//exit;



?>

<script>
//opener.location.reload();
location="/cp/myaccount.php";
fancybox.close();
//alert('xx');
	/*window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
	window.close();*/
</script>	