<?php
	include "../include/function.php";
	$DB = new myDB;

	$action		= $_REQUEST["action"];
	$BizHoursID	= $_GET["id"];
	$BizHours	= $_REQUEST["BizHours"];
	$button		= $_POST["button"];
	
	if ($action == "del") {
		$DB->query("DELETE FROM BusinessHours WHERE BizHoursID=".$BizHoursID);

	}
	elseif ($action == "add") {
		$strSQL		= ("INSERT INTO BusinessHours (BizHours) VALUES(
				\"".$BizHours."\"
		)");

		$DB->query($strSQL);
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_BusinessHours.php');</script>";
?>