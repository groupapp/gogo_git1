<?php
	include "../include/function.php";
	$DB = new myDB;

	$action					= $_POST["action"];
	$FeeForPersonalization	= $_POST["FeeForPersonalization"];

	if($action == "update"){
		$strSQL 	= ("UPDATE CompanyInfo SET
				FeeForPersonalization		= \"".$FeeForPersonalization."\"
				Where CompanyID = 1");
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	$DB->close();
	echo "<script>location.replace('Manage_FeeForPersonalization.php');</script>";
?>