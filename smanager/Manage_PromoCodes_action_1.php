<?php
	include "../include/function.php";
	$DB = new myDB;

	$action				= $_REQUEST["action"];
	$coupon_id			= $_GET["id"];
	$coupon_id2			= $_POST["coupon_id"];
	$coupon_type		= $_POST["coupon_type"];
	$coupon_code		= $_POST["coupon_code"];
	$minimum_order		= $_POST["minimum_order"];
	$is_freeship		= $_POST["is_freeship"];
	$is_active			= $_POST["is_active"];
	$percentage_discount= $_POST["percentage_discount"];
	$product_id			= $_POST["product_id"];
	$view				= $_POST["view"];
	
	//echo $action;
	//exit;
	if ($action == "del") {
		$strSQL = ("DELETE FROM Coupons WHERE coupon_id=".$coupon_id);
		$DB->query($strSQL);
	} elseif ($action == "add") {
		$strSQL		= ("INSERT INTO Coupons(coupon_type, coupon_code, minimum_order, IsFreeShip, is_active, percentage_discount, product_id) VALUES(
				\"".$coupon_type."\",
				\"".$coupon_code."\",
				\"".$minimum_order."\",
				\"".$is_freeship."\",
				\"".$is_active."\",
				\"".$percentage_discount."\",
				\"".$product_id."\"
				)");
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);	
	} elseif ($action == "update") {
		
		$strSQL 	= ("UPDATE Coupons SET
				coupon_type			= \"".$coupon_type."\",
				coupon_code			= \"".$coupon_code."\",
				minimum_order		= \"".$minimum_order."\",
				IsFreeShip			= \"".$is_freeship."\",
				is_active			= \"".$is_active."\",
				percentage_discount	= \"".$percentage_discount."\",
				product_id			= \"".$product_id."\"
				WHERE coupon_id=".$coupon_id2);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_PromoCodes.php?act=".$view."&aid=".$coupon_id2."');</script>";
?>