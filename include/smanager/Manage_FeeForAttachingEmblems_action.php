<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action					= $_POST["action"];
	$FeeForAttachingEmblems	= $_POST["FeeForAttachingEmblems"];
	
	if ($action == "update"){
		$strSQL 	= ("UPDATE CompanyInfo SET
				FeeForAttachingEmblems	= \"".$FeeForAttachingEmblems."\"			
				WHERE CompanyID=1");
		$DB->query($strSQL);
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_FeeForAttachingEmblems.php');</script>";
?>