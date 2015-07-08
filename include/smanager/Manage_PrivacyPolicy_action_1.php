<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action				= $_REQUEST["action"];
	$PrivacyPolicyID1	= $_REQUEST["id"];
	$PrivacyPolicyID2	= $_REQUEST["PrivacyPolicyID"];
	$IsActive			= $_POST["IsActive"];
	$PrivacyPolicy		= $_POST["PrivacyPolicy"];
	$button				= $_POST["button"];
	$view				= $_POST["view"];
		

	if ($action == "del") {
		$DB->query("DELETE FROM PrivacyPolicy WHERE PrivacyPolicyID=".$PrivacyPolicyID1);
	
	} elseif ($action == "add") {
		$strSQL		= ("INSERT INTO PrivacyPolicy (PrivacyPolicy, IsActive) VALUES(
				\"".$PrivacyPolicy."\",
				\"".$IsActive."\"
		)");

		$DB->query($strSQL);
	} elseif ($action == "update") {
	
		$strSQL = ("UPDATE PrivacyPolicy SET
				PrivacyPolicy			= \"".$PrivacyPolicy."\",
				IsActive				= \"".$IsActive."\",
				DateTimeLastModified	= now()
				WHERE PrivacyPolicyID=".$PrivacyPolicyID2);
		
		$DB->query($strSQL);
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_PrivacyPolicy.php?act=".$view."&aid=".$PrivacyPolicyID2."');</script>";
?>