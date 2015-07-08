<?php
	include "../include/function.php";
	$DB = new myDB;
	
	
	$action			= $_POST["action"];
	$s_category		= $_POST["s_category"];
	$s_brand		= $_POST["s_brand"];
	$s_name			= $_POST["s_name"];
	$s_code			= $_POST["s_code"];
	$UnitPrice 		= $_POST["UnitPrice"];
	$UnitPriceOnSale= $_POST["UnitPriceOnSale"];
	$isActive		= $_POST["isActive"];
	$checkUpdate	= $_POST["checkupdate"];
	$checkHidden	= $_POST["checkHidden"];

	if($_POST['button']=="Update"){
		for($i=0; $i<count($checkUpdate); $i++) {
			$strSQL2 = "SELECT * FROM Products WHERE ProductID = ".$checkHidden[$checkUpdate[$i]];
			$DB2 = new myDB;
			$DB2->query($strSQL2);
			$data = $DB2->fetch_array($DB2->res);
//			echo $data["IsActive"]."<br/>";
//			echo $checkUpdate[$i]."<br/>";
//			echo $isActive[$i]."<br/>";
			$strSQL 	= ("UPDATE Products SET
					UnitPrice			= \"".$UnitPrice[$checkUpdate[$i]-1]."\",
					UnitPriceOnSale		= \"".$UnitPriceOnSale[$checkUpdate[$i]-1]."\",
					IsActive			= \"".(($isActive[$checkUpdate[$i]]=='Y')?'Y':'N')."\"
					WHERE ProductID		= ".$checkHidden[$checkUpdate[$i]-1]);
//			echo $strSQL . "<br />";
			$DB->query($strSQL);
		}
//		exit;
	}
	$DB->close();
	
	echo "<script>location.replace('Manage_bulk_product.php?&s_category=" . $s_category . "&s_brand=" . $s_brand;
	echo "&action=" . $action . "&s_name=" . $s_name . "&s_code=" . $s_code . "');</script>";
?>