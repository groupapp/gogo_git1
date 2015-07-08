<?php
	include "../include/function.php";
	$DB = new myDB;

	$action				= $_REQUEST["action"];
	$PaymentMethodID	= $_GET["id"];
	$PaymentMethodID2	= $_POST["PaymentMethodID"];
	$PaymentType		= $_POST["PaymentType"];
	$PaymentMethod		= $_POST["PaymentMethod"];
	$view				= $_POST["view"];
	
	if ($action == "del") {
		$DB->query("DELETE FROM PaymentMethods WHERE PaymentMethodID=".$PaymentMethodID);
	} elseif ($action == "add") {
		$strSQL		= ("INSERT INTO PaymentMethods (PaymentType,PaymentMethod) VALUES(
				\"".$PaymentType."\",
				\"".$PaymentMethod."\"
		)");
		$DB->query($strSQL);
	} elseif ($action == "update") {	
		$strSQL 	= ("UPDATE PaymentMethods SET
				PaymentType			= \"".$PaymentType."\",
				PaymentMethod		= \"".$PaymentMethod."\",
				DateTimeLastModified= now()
				WHERE PaymentMethodID=".$PaymentMethodID2);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_PaymentMethods.php?act=".$view."&aid=".$PaymentMethodID2."');</script>";
?>