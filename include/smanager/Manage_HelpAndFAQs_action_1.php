<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action			= $_REQUEST["action"];
	$HelpAndFAQs_ID	= $_REQUEST["id"];
	$HelpAndFAQs_ID2= $_POST["HelpAndFAQs_ID"];
	$IsActive		= $_POST["IsActive"];
	$HelpAndFAQs	= $_POST["HelpAndFAQs"];
	$button			= $_POST["button"];
	$view			= $_POST["view"];
		
	//echo $action;
	//exit;
	if ($action == "del") {
		$DB->query("DELETE FROM HelpAndFAQs WHERE HelpAndFAQs_ID=".$HelpAndFAQs_ID);
	} elseif ($action == "add") {
		$strSQL		= ("INSERT INTO HelpAndFAQs (HelpAndFAQs, IsActive) VALUES(
				\"".$HelpAndFAQs ."\",
				\"".$IsActive."\"
		)");
		$DB->query($strSQL);
	} elseif ($action == "update") {
	
		$strSQL 	= ("UPDATE HelpAndFAQs SET
				HelpAndFAQs			= \"".$HelpAndFAQs."\",
				IsActive			= \"".$IsActive."\",
				DateTimeLastModified= now()
				WHERE HelpAndFAQs_ID=".$HelpAndFAQs_ID2);

		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_HelpAndFAQs.php?act=".$view."&aid=".$HelpAndFAQs_ID2."');</script>";
?>