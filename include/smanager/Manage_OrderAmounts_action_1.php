<?php
	include "../include/function.php";
	$DB = new myDB;

	$action				= $_POST["action"];
	$MinimumOrderAmount	= $_POST["MinimumOrderAmount"];
	$FreeShippingAmount	= $_POST["FreeShippingAmount"];
	
	if($action == "OrderAmountUpdate"){
		$strSQL 	= ("UPDATE CompanyInfo SET
				MinimumOrderAmount		= \"".$MinimumOrderAmount."\"
				Where CompanyID = 1");
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
		$DB->close();
		echo "<script>location.replace('Manage_OrderAmounts.php');</script>";
	}
	elseif($action == "FreeShippingUpdate"){
		$strSQL 	= ("UPDATE CompanyInfo SET
				FreeShippingAmount		= \"".$FreeShippingAmount."\"
				Where CompanyID = 1");
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
		$DB->close();
		echo "<script>location.replace('Manage_OrderAmountsFreeShipping.php');</script>";
	}	
?>