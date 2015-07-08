<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action	= $_POST["action"];
	
//	echo "Hello Spotlight!";
//	echo $action;
	
	if($action=="update"){
		$strSQL = "UPDATE Products SET Spotlight = null";
	//	echo $strSQL."<br/>";
		$DB->query($strSQL);
		for($i=1;$i<=6;$i++){
			$strSQL = "UPDATE Products SET Spotlight = '".$i."' WHERE ProductID = ".$_POST["spot".$i].";";
		//	echo $strSQL."<br/>";
			$DB->query($strSQL);
		}
	//	exit;
	}

/*
//echo $action;
	
	if($action ==""){
		//$DB->query("SELECT * FROM Products WHERE Spotlight > 0 ORDER BY Spotlight limit 9")
		//$strSQL = "UPDATE Products SET spotlight = 1 WHERE $product[0]=" . $spot1;
		//echo "hello" ;
		//exit;
		}
	
	if ($action == "del" && isset($_POST["idtodel"])) {
		foreach($_POST["idtodel"] as $key => $val) {
			$DB->query("DELETE FROM Products WHERE spotlight=".$val);
		}
	} elseif ($action == "add") {
		$strSQL		= ("INSERT INTO Products (coupon_type,coupon_code,minimum_order,is_active,percentage_discount,product_id) VALUES(
				\"".$coupon_type."\",
				\"".$coupon_code."\",
				\"".$minimum_order."\",
				\"".$is_active."\",
				\"".$percentage_discount."\",
				\"".$product_id."\"
				)");
		$DB->query($strSQL);	
	} elseif ($action == "update") {
		
		for ($i=1; $i<=9; $i++){
			$temp = "spot".$i;
		//	echo "UPDATE Products SET Spotlight=0 WHERE Spotlight=".$i."<br />";
		//	echo "UPDATE Products SET Spotlight=". $i . " WHERE ProductID=".$$temp."<br /><hr />";
		 $DB->query("UPDATE Products SET Spotlight=0 WHERE Spotlight=".$i);
		 $DB->query("UPDATE Products SET Spotlight=". $i . " WHERE ProductID=" .(int) $$temp);
		 }
		
		/*		coupon_type			= \"".$coupon_type."\",
				coupon_code			= \"".$coupon_code."\",
				minimum_order		= \"".$minimum_orderD."\",
				is_active			= \"".$is_active."\",
				percentage_discount	= \"".$percentage_discount."\",
				product_id			= \"".$product_id."\",
				WHERE spotlight=".$spotlight);
		$DB->query($strSQL);
	
	
	/*elseif ($action == "update"){
		$strSQL 	= ("UPDATE Products SET spotlight=1 
				FirstName		= \"".$FirstName."\",
				LastName		= \"".$LastName."\",
				LoginID			= \"".$LoginID."\",
				LoginPassword	= \"".$LoginPassword."\",
				Notes			= \"".$Notes."\",
				IsActive		= \"".$isActive."\",
				DateTimeUpdated	= now()
				WHERE productid=1");
		$DB->query($strSQL);
	} */
	$DB->close();
	echo "<script>location.replace('Manage_SpotLight.php');</script>";
	
?>