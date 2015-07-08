<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action		= $_REQUEST["action"];	
	$AboutUsID1	= $_REQUEST["id"];
	$AboutUsID2	= $_REQUEST["AboutUsID"];
	$IsActive	= $_POST["IsActive"];
	$AboutUs	= $_POST["AboutUs"];
	$button		= $_POST["button"];
	$view		= $_POST["view"];
	
	//echo $action;
	//exit;
	if($action == "del"){
		$strSQL = ("DELETE FROM AboutUs Where AboutUsID=".$AboutUsID1);		
		$DB->query($strSQL);
	}
	elseif($action == "add"){
		$strSQL = ("INSERT INTO AboutUs (IsActive, AboutUs)
					VALUES(
						\"".$IsActive."\",
						\"".$AboutUs."\"
					)");

		$DB->query($strSQL);
	}
	elseif ($action == "update"){
		$strSQL = ("UPDATE AboutUs SET
						IsActive	= \"".$IsActive."\",
						AboutUs		= \"".$AboutUs."\",
						DateTimeLastModified = now()
						WHERE AboutUsID=".$AboutUsID2);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	
	
	$DB->close();
	echo "<script>location.replace('Manage_AboutUs.php?act=".$view."&aid=".$AboutUsID2."');</script>";
?>