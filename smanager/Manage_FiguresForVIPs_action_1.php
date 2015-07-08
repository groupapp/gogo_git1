<?php
	include "../include/function.php";
	$DB = new myDB;

	$action							= $_POST["action"];
	$PointsID						= $_POST["PointsID"];
	$DiscountPercentageForVIPs		= $_POST["DiscountPercentageForVIPs"];
	$ProductAmountPercentageForVIPs	= $_POST["ProductAmountPercentageForVIPs"];
	$MinimumPointsForVIPs			= $_POST["MinimumPointsForVIPs"];
	$VIP_Membership_Price			= $_POST["VIP_Membership_Price"];
	$button							= $_POST["button"];
	
	if ($action == "update"){
		$strSQL 	= ("UPDATE FiguresForVIPs SET
				DiscountPercentageForVIPs		= \"".$DiscountPercentageForVIPs."\",
				ProductAmountPercentageForVIPs	= \"".$ProductAmountPercentageForVIPs."\",
				MinimumPointsForVIPs			= \"".$MinimumPointsForVIPs."\",
				VIP_Membership_Price			= \"".$VIP_Membership_Price."\",
				DateTimeUpdated	= now()
				WHERE PointsID=1");
		$DB->query($strSQL);
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_FiguresForVIPs.php');</script>";
?>