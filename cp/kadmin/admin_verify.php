
<?php

$tcSite_Url="bigtms.com";

$tcUser_Num=$_GET['cUser_Num'];

include('function.php'); 
	

	$DB7 = new myDB;	

	$PstrSQL = "SELECT * FROM  acc_user  WHERE  cUser_Num = '".$tcUser_Num."'";	
	
	$DB7->query($PstrSQL);	
	
	while ($pdata = $DB7->fetch_array($DB7->res)){
		$tcSponsorX=$pdata["cSponsorX"];
		$tcUser_Num=$pdata["cUser_Num"];
		$tcUserIDNO=$pdata["cUserIDNO"];
		$tcCellNumb=$pdata["cCellNumb"];
		$tcSuffixAT=$pdata["cSuffixAT"];
		$tcOpenDate=$pdata["cOpenDate"];
		$tcOpenTime=$pdata["cOpenTime"];
//print_r($tnSponsorN);
	}
		

	

	$subject="Thank you for your registration.";

$headers  = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From:BigTMS<contact@bigtms.com>' . "\n";

	$html = "Sponsor #:" .$tcSponsorX. "\n";
    $html .= "Member ID:".$tcUser_Num. "\n";
    $html.= "Email:".$tcUserIDNO. "\n"; 
    $html.= "Please, check your email and verify account";

	$tto=$tcCellNumb.$tcSuffixAT;

	$to=$tcUserIDNO;


	$htmBody = "<!doctype html><html><head><meta http-equiv=content-type content=text/html; charset=UTF-8>";
   $htmBody .= "<style type=text/css><!-- td  {font-size: 10pt; font-fmaily:Tahoma,Arial;  COLOR:black;text-decoration: none} --></style>";
   $htmBody .= "</head><body>";

   $htmBody .=  "<center><table border=0 cellpadding=10 cellspacing=0 bgcolor=#8C001A>";
   $htmBody .=  "<tr><td width=500 align=center><a href=http://www." . $tcSite_Url . " target=_blank><img border=0 src=http://www." . $tcSite_Url  .  "/img/logo.png></a></td></tr>";
   $htmBody .=  "</table></center>";

   $htmBody .= "<center><table border=0 cellpadding=0 cellspacing=0 bgcolor=#FFFFFF>";
   $htmBody .= " <tr><td align=center><font face=Tahoma><b>Thank you for your registration.</b></td></tr>";
   $htmBody .=  " <tr><td align=center><font face=Tahoma><b>Sponsor # " .$tcSponsorX. "</b><br><br></td></tr>";
   $htmBody .=  "</table></center>";

   $htmBody .=  "<center>";
   $htmBody .= "<table border=0 cellpadding=1 cellspacing=1 bgcolor=#FFFFFF>";
   //$htmBody .="  <tr><td align=left><font face=Tahoma><b>" & mlg_MemberID &  " : " & tcUser_Num  & "<b></td></tr>"
   $htmBody .="  <tr><td align=left><font face=Tahoma>Date:". $tcOpenDate . "</td></tr>";
   $htmBody .= "  <tr><td align=left><font face=Tahoma>Time:" . $tcOpenTime. "</td></tr>";
   //$htmBody .= "  <tr><td align=left><font face=Tahoma>" & mlg_Location & ":" & tcLocation & "</td></tr>"
   //'htmBody = htmBody & "  <tr><td align=left><font face=Tahoma>" & mlg_Address & ":" & ttAddressX & "</td></tr>"
   $htmBody .= "  <tr><td align=left><font face=Tahoma>Verify an email address with BigTMS to confirm that you own it.</td></tr>";
   $htmBody .= "</table>";
   $htmBody .=  "</center>";




   $htmBody .= "<div align=center>";
   $htmBody .= "<table border=0 cellpadding=9 cellspacing=1>";
   $htmBody .= "<tr height=10><td colspan=2></td></tr>";
   $htmBody .= "<tr>";
   $htmBody .= " <td><a href=http://www.".$tcSite_Url."/verify.php?no=".$tnUser_Num."&id=".$tcUser_Num."&sp=".$tcSponsorX."&em=".$tcUserIDNO."><font color=blue size=3><b>Verify Your Account</b></font></a></td>";  
   $htmBody .= "</tr> ";
   $htmBody .= "<tr height=30><td colspan=2></td></tr>";
   $htmBody .= "</table>";
   $htmBody .= "</div>";

	
	mail($tto, $subject, $html, $headers);
	mail($to, $subject, $htmBody, $headers);

	echo "<script>location.replace('/kadmin/index.php');</script>";	
?>






