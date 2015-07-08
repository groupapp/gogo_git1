<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action			= $_REQUEST["action"];		
	$GiftID			= $_REQUEST["GiftID"];
	$IsActive		= $_POST["IsActive"];
	$GiftExpiryDate	= $_POST["GiftExpiryDate"];
	$GiftAmount		= $_POST["GiftAmount"];
	$SearchField	= $_POST["SearchField"];
	$SearchKeyword	= $_POST["SearchKeyword"];
	$DisplayOrder	= $_REQUEST["DisplayOrder"];
	$pp				= $_POST["pp"];
	//$button	= $_POST["button"];
	$fr_date=date('Y-m-d H:i:s',strtotime($GiftExpiryDate));
	
		if ($action=="add")
		{
			$GiftAuthorizationCode=getGiftcertCode();
			
			$GstrSQL	= ("INSERT INTO GiftCertificates (
						GiftAuthorizationCode,
						GiftAmount,
						GiftAmountRemaining,
						IsActive,
						GiftExpiryDate,
						DateTimeIssued) VALUES (
						'".$GiftAuthorizationCode."',
						".$GiftAmount.",
						".$GiftAmount.",
						'Y',
						'".$fr_date."',						
						now())");
			
			
			$DB->query($GstrSQL);
			
		}
		else
		{
		$strSQL = ("UPDATE GiftCertificates SET
						IsActive	= \"".$IsActive."\",
						GiftExpiryDate		= \"".$fr_date."\",
						DateTimeModified = now()
						WHERE GiftID=".$GiftID);
		//echo $strSQL;
		//exit;
			$DB->query($strSQL);
		}
		
	
	
	$DB->close();
	echo "<script>location.replace('Manage_GiftCertificates.php?DisplayOrder=".$DisplayOrder."&act=".$action."&SearchField=".$SearchField."&SearchKeyword=".$SearchKeyword."&pp=".$pp."&gid=".$GiftID."');</script>";
?>