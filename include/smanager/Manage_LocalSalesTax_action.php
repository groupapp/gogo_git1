<?php
	include "../include/function.php";
	$DB = new myDB;

	$action				= $_POST["action"];
	$LocalSalesTaxRate	= $_POST["LocalSalesTaxRate"];
	
	if($action == "update"){
		$strSQL 	= ("UPDATE CompanyInfo SET
				LocalSalesTaxRate		= \"".$LocalSalesTaxRate."\"
				Where CompanyID = 1");
		$DB->query($strSQL);
	}

	$DB->close();
	echo "<script>location.replace('Manage_LocalSalesTax.php');</script>";
?>