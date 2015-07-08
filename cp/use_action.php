<?php 

//include_once dirname(__FILE__) . "/function.php";
include('function.php');
$tcSite_Url="";
$cCouponNo=trim($_POST['cCouponNo']);
$useCoupon=trim($_POST['useCoupon']);
//print_r("xx".$useCoupon);
//exit;
	if($useCoupon=='Y')
	{
		$DB = new myDB;
		$DBu = new myDB;
		$sDB = new myDB;
		$DBi = new myDB;
		$DB1 = new myDB;
		$DB2 = new myDB;
		$cCountSQL = "UPDATE acc_user_coupon SET nActive='N',fComision=(fSale*0.2),fCredit=(fSale*0.05),dUse_date=now() where cCouponNo='".$cCouponNo."'";
		
		$DB->query($cCountSQL);		
		
		$strSQL = "SELECT * FROM acc_user_coupon  WHERE  cCouponNo='".$cCouponNo."'";
		//print_r('xx:'.$strSQL."/");
		$DBu->query($strSQL);

		while ($data = $DBu->fetch_array($DBu->res)){
			$cUser_Num=$data["cUser_Num"];
			
			$strSQL1 = "SELECT * FROM acc_user  WHERE  cUser_Num='".$cUser_Num."'";
			$DB1->query($strSQL1);
			while ($data1 = $DB1->fetch_array($DB1->res)){
				$cSponsorX=$data1["cSponsorX"];
				$cCellNumb=$data1["cCellNumb"];
				$cSuffixAT=$data1["cSuffixAT"];
			}
			
			

			$strSQL2 = "SELECT * FROM acc_user  WHERE  cUser_Num='".$cSponsorX."'";
			$DB2->query($strSQL2);
			while ($data2 = $DB2->fetch_array($DB2->res)){
				$cSponsorIDNO=$data2["cUserIDNO"];
				$cSponCellNumb=$data2["cCellNumb"];
				$cSponSuffixAT=$data2["cSuffixAT"];
			}
			
			
		}

		$sstrSQLtuse = "SELECT sum(a.fSale) as stuse FROM acc_coupon a,acc_user_coupon b,acc_user c WHERE a.nCouponID=b.nCouponID and b.cUser_Num=c.cUser_Num and  c.cSponsorX='".$cSponsorX."' and b.dUse_date>0 and b.nFinishSeq<1";
		
		//print_r($sstrSQLtuse."/");
		$sDB->query($sstrSQLtuse);
		while ($sdatau = $sDB->fetch_array($sDB->res)){
			$stuse=$sdatau["stuse"];
			//print_r($stuse."/");
			$cuse=$stuse*0.2;
			//print_r($cuse."/");
		}

		$cSQL = "UPDATE acc_user SET nUsePoint=(nUsePoint+".$cuse.") where cUser_Num='".$cSponsorX."'";
		
		//print_r($cSQL);
		//exit;
		$DBi->query($cSQL);
		
		$DB->close();
		$DB1->close();
		$DB2->close();
		$DBu->close();
		$DBi->close();
		$sDB->close();

//----------------------------------------------------------------------------------------------------
	$subject="Thank you for use coupon.";
	$ssubject="Your friend  use coupon.";
	$xsubject="Member  use coupon.";

	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From:Encore<contact@encore.com>' . "\n";

	$html = "Member ID:".$cUser_Num. "\n";
    $html.= "Coupon:".$cCouponNo. "\n";
	$html.= "Coupon Price:".$stuse. "\n";
    $html.= "Thank for use coupon";

	$shtml = "Member ID:".$cUser_Num. "\n";
	$shtml.= "Name:".$cFistName. " ".$cLastName. "\n";
    $shtml.= "Email:".$cUserIDNO. "\n"; 
	$shtml.= "Coupon:".$cCouponNo. "\n";
	$shtml.= "Coupon Price:".$stuse. "\n";
	$shtml.= "Your Commission:".$cuse. "\n";
    $shtml.= "Your friend use coupon";


	$tto=$cCellNumb.$cSuffixAT;
	$sto=$cSponCellNumb.$cSponSuffixAT;
			

   $to=$cUserIDNO;
   $htmBody = "<!doctype html><html><head><meta http-equiv=content-type content=text/html; charset=UTF-8>";
   $htmBody .= "<style type=text/css><!-- td  {font-size: 10pt; font-fmaily:Tahoma,Arial;  COLOR:black;text-decoration: none} --></style>";
   $htmBody .= "</head><body>";
   $htmBody .=  "<center><table border=0 cellpadding=10 cellspacing=0 bgcolor=#8C001A>";
   $htmBody .=  "<tr><td width=500 align=center><a href=http://www." . $tcSite_Url . " target=_blank><img border=0 src=http://www." . $tcSite_Url  .  "/img/logo-x.png></a></td></tr>";
   $htmBody .=  "</table></center>";
   $htmBody .= "<center><table border=0 cellpadding=0 cellspacing=0 bgcolor=#FFFFFF>";
   $htmBody .= " <tr><td align=center><font face=Tahoma><b>Thank for use coupon.</b></td></tr>";
   $htmBody .=  "</table></center>";
   $htmBody .=  "<center>";
   $htmBody .= "<table border=0 cellpadding=1 cellspacing=1 bgcolor=#FFFFFF>";
   $htmBody .="  <tr><td align=left><font face=Tahoma><b>Member ID:". $cUser_Num. "<b></td></tr>";
   $htmBody .="  <tr><td align=left><font face=Tahoma>Coupon No:". $Coupon . "</td></tr>";
   $htmBody .= "  <tr><td align=left><font face=Tahoma>Coupon Price:" . $stuse. "</td></tr>";
   $htmBody .= "</table>";
   $htmBody .=  "</center>";
   $htmBody .= "<div align=center>";
   $htmBody .= "<table border=0 cellpadding=9 cellspacing=1>";
   $htmBody .= "<tr height=10><td colspan=2></td></tr>";
   $htmBody .= "<tr height=30><td colspan=2></td></tr>";
   $htmBody .= "</table>";
   $htmBody .= "</div>";

   $ssto=$cSponsorIDNO;

   $shtmBody = "<!doctype html><html><head><meta http-equiv=content-type content=text/html; charset=UTF-8>";
   $shtmBody .= "<style type=text/css><!-- td  {font-size: 10pt; font-fmaily:Tahoma,Arial;  COLOR:black;text-decoration: none} --></style>";
   $shtmBody .= "</head><body>";
   $shtmBody .=  "<center><table border=0 cellpadding=10 cellspacing=0 bgcolor=#8C001A>";
   $shtmBody .=  "<tr><td width=500 align=center><a href=http://www." . $tcSite_Url . " target=_blank><img border=0 src=http://www." . $tcSite_Url  .  "/img/logo-x.png></a></td></tr>";
   $shtmBody .=  "</table></center>";
   $shtmBody .= "<center><table border=0 cellpadding=0 cellspacing=0 bgcolor=#FFFFFF>";
   $shtmBody .= " <tr><td align=center><font face=Tahoma><b>Your friend  use coupon.</b></td></tr>";
   $shtmBody .=  "</table></center>";
   $shtmBody .=  "<center>";
   $shtmBody .= "<table border=0 cellpadding=1 cellspacing=1 bgcolor=#FFFFFF>";
   $shtmBody .="  <tr><td align=left><font face=Tahoma><b>Member ID:". $cUser_Num. "<b></td></tr>";
   $shtmBody .="  <tr><td align=left><font face=Tahoma>Coupon No:". $Coupon . "</td></tr>";
   $shtmBody .= "  <tr><td align=left><font face=Tahoma>Coupon Price:" . $stuse. "</td></tr>";
   $shtmBody .= "  <tr><td align=left><font face=Tahoma>Your Commission:" . $cuse. "</td></tr>";
   $shtmBody .= "</table>";
   $shtmBody .=  "</center>";
   $shtmBody .= "<div align=center>";
   $shtmBody .= "<table border=0 cellpadding=9 cellspacing=1>";
   $shtmBody .= "<tr height=10><td colspan=2></td></tr>";
   $shtmBody .= "<tr height=30><td colspan=2></td></tr>";
   $shtmBody .= "</table>";
   $shtmBody .= "</div>";


	$xsto="fxskin1@gmail.com";

   $xhtmBody = "<!doctype html><html><head><meta http-equiv=content-type content=text/html; charset=UTF-8>";
   $xhtmBody .= "<style type=text/css><!-- td  {font-size: 10pt; font-fmaily:Tahoma,Arial;  COLOR:black;text-decoration: none} --></style>";
   $xhtmBody .= "</head><body>";
   $xhtmBody .=  "<center><table border=0 cellpadding=10 cellspacing=0 bgcolor=#8C001A>";
   $xhtmBody .=  "<tr><td width=500 align=center><a href=http://www." . $tcSite_Url . " target=_blank><img border=0 src=http://www." . $tcSite_Url  .  "/img/logo-x.png></a></td></tr>";
   $xhtmBody .=  "</table></center>";
   $xhtmBody .= "<center><table border=0 cellpadding=0 cellspacing=0 bgcolor=#FFFFFF>";
   $xhtmBody .= " <tr><td align=center><font face=Tahoma><b>Member  use coupon.</b></td></tr>";
   $xhtmBody .=  "</table></center>";
   $xhtmBody .=  "<center>";
   $xhtmBody .= "<table border=0 cellpadding=1 cellspacing=1 bgcolor=#FFFFFF>";
   $xhtmBody .="  <tr><td align=left><font face=Tahoma><b>Member ID:". $cUser_Num. "<b></td></tr>";
   $xhtmBody .="  <tr><td align=left><font face=Tahoma>Coupon No:". $Coupon . "</td></tr>";
   $xhtmBody .= "  <tr><td align=left><font face=Tahoma>Coupon Price:" . $stuse. "</td></tr>";
   $xhtmBody .= "  <tr><td align=left><font face=Tahoma>Member Commission:" . $cuse. "</td></tr>";
   $xhtmBody .= "</table>";
   $xhtmBody .=  "</center>";
   $xhtmBody .= "<div align=center>";
   $xhtmBody .= "<table border=0 cellpadding=9 cellspacing=1>";
   $xhtmBody .= "<tr height=10><td colspan=2></td></tr>";
   $xhtmBody .= "<tr height=30><td colspan=2></td></tr>";
   $xhtmBody .= "</table>";
   $xhtmBody .= "</div>";

/*	
	mail($tto, $subject, $html, $headers);
	mail($sto, $ssubject, $shtml, $headers);
	
	mail($to, $subject, $htmBody, $headers);
	mail($ssto, $ssubject, $shtmBody, $headers);
	mail($xsto, $xsubject, $xhtmBody, $headers);*/
//-----------------------------------------------------------------------------------------------------




		echo "<script>location='scoupon.php?usechk=Y';</script>";
	}
	else
		echo "<script>alert('wrong choice!!'); location='scoupon.php?usechk=Y';</script>";
	
?>	