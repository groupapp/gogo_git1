<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action					= $_REQUEST["action"];
	$QD_ID					= $_REQUEST["id"];
	$QD_ID2					= $_POST["QD_ID"];
	$QuantityDiscountName	= $_POST["QuantityDiscountName"];
	$LowerQty[0]			= $_POST["LowerQty1"];
	$UpperQty[0]			= $_POST["UpperQty1"];
	$DiscountPercentage[0]	= $_POST["DiscountPercentage1"];
	$LowerQty[1]			= $_POST["LowerQty2"];
	$UpperQty[1]			= $_POST["UpperQty2"];
	$DiscountPercentage[1]	= $_POST["DiscountPercentage2"];
	$LowerQty[2]			= $_POST["LowerQty3"];
	$UpperQty[2]			= $_POST["UpperQty3"];
	$DiscountPercentage[2]	= $_POST["DiscountPercentage3"];
	$LowerQty[3]			= $_POST["LowerQty4"];
	$UpperQty[3]			= $_POST["UpperQty4"];
	$DiscountPercentage[3]	= $_POST["DiscountPercentage4"];
	$LowerQty[4]			= $_POST["LowerQty5"];
	$UpperQty[4]			= $_POST["UpperQty5"];
	$DiscountPercentage[4]	= $_POST["DiscountPercentage5"];
	$LowerQty[5]			= $_POST["LowerQty6"];
	$UpperQty[5]			= $_POST["UpperQty6"];
	$DiscountPercentage[5]	= $_POST["DiscountPercentage6"];
	$btnAdd					= $_POST["btnAdd"];
	$btnAdd					= $_POST["btnReset"];
	$view					= $_POST["view"];

	echo $action."<br/>";
	if ($action == "del") {
		$strSQL=("DELETE FROM NewQuantityDiscounts WHERE QD_ID=".$QD_ID);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	
	} elseif ($action == "add") {
		$strMax = "SELECT MAX(QD_ID) FROM NewQuantityDiscounts";
		$DB2 = new myDB;
		$DB2->query($strMax);
		$data2 = $DB2->fetch_array($DB2->res);
		$newQD_ID = $data2["MAX(QD_ID)"] + 1;
		echo "in the add<br/>".$strMax."<br/>";
		echo $data2["MAX(QD_ID)"]."<br/>";
		echo $newQD_ID."<br/>";
		for($i=0; $i<6; $i++){
			if($LowerQty[$i]){
				$strSQL		= ("INSERT INTO NewQuantityDiscounts (QD_ID,QuantityDiscountName,LowerQty,UpperQty,DiscountPercentage1) VALUES(
						\"".$newQD_ID."\",
						\"".$QuantityDiscountName."\",
						\"".$LowerQty[$i]."\",
						\"".$UpperQty[$i]."\",
						\"".$DiscountPercentage[$i]."\"
				)");
				echo $strSQL."<br/>";
				//exit;
				$DB->query($strSQL);
			}
		}
	//	exit;
	} elseif ($action == "update") {
		$strSQL2 = "SELECT * FROM NewQuantityDiscounts WHERE QD_ID = ".$QD_ID2." ORDER BY ID";
		$DB2 = new myDB;
		$DB2->query($strSQL2);
		$i = 0;
		while ($data2 = $DB2->fetch_array($DB2->res)){
			$strSQL = ("UPDATE NewQuantityDiscounts SET
				QuantityDiscountName= \"".$QuantityDiscountName."\",
				LowerQty			= \"".$LowerQty[$i]."\",
				UpperQty			= \"".$UpperQty[$i]."\",
				DiscountPercentage1	= \"".$DiscountPercentage[$i]."\",
				DateTimeLastModified= now()
				WHERE ID=".$data2["ID"]);
			echo $strSQL."<br/>";
			$DB->query($strSQL);
			$i++;
		}
		for($i; $i<=5; $i++){
			if($LowerQty[$i]){
				$strSQL		= ("INSERT INTO NewQuantityDiscounts (QD_ID,QuantityDiscountName,LowerQty,UpperQty,DiscountPercentage1) VALUES(
						\"".$QD_ID2."\",
						\"".$QuantityDiscountName."\",
						\"".$LowerQty[$i]."\",
						\"".$UpperQty[$i]."\",
						\"".$DiscountPercentage[$i]."\"
				)");
				echo $strSQL."<br/>";
				//exit;
				$DB->query($strSQL);
			}
		}
	}
	
	$DB->close();
	echo "<script>location.replace('QuantityDiscountTest.php?act=".$view."&aid=".$QD_ID2."');</script>";
?>