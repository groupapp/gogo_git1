<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action			= $_POST["action"];
	$PSID			= $_POST["PSID"];
	$CategoryTitle1	= $_POST["CategoryTitle1"];
	$CategoryTitle2	= $_POST["CategoryTitle2"];
	$CategoryTitle3	= $_POST["CategoryTitle3"];
	$Location		= $_POST["location"];
	$CategoryTitle	= $_POST["CategoryTitle"];
	$PopularSearch	= $_POST["PopularSearch"];
	$SearchLink		= $_POST["SearchLink"];
	$DisplayOrder	= $_POST["DisplayOrder"];
	$IsActive		= $_POST["IsActive"];
	$FromDate		= $_POST["FromDate"];
	$ToDate			= $_POST["ToDate"];
	$view			= $_POST["view"];
	
//	echo "in the action<br/>";
//	echo $action;
//	echo $_POST["btn"];
//	exit;
	if ($action == "del" && isset($_POST["idtodel"])) {
		foreach($_POST["idtodel"] as $key => $val) {
			$DB->query("DELETE FROM PopularSearch WHERE PopularSearchID=".$val);
		}
	} elseif ($action == "add") {
		$strSQL		= ("INSERT INTO PopularSearch (Location,PopularSearch,SearchLink,DisplayOrder,FromDate,ToDate,IsActive) VALUES(
				\"".$Location."\",
				\"".$PopularSearch."\",
				\"".$SearchLink."\",
				\"".$DisplayOrder."\",
				\"".$FromDate."\",
				\"".$ToDate."\",
				\"".$IsActive."\"
				)");
		$DB->query($strSQL);	
	} elseif ($action == "update") {
		$strSQL 	= ("UPDATE PopularSearch SET
				Location		= \"".$Location."\",
				PopularSearch	= \"".$PopularSearch."\",
				SearchLink		= \"".$SearchLink."\",
				DisplayOrder	= \"".$DisplayOrder."\",
				FromDate		= \"".$FromDate."\",
				ToDate			= \"".$ToDate."\",
				IsActive		= \"".$IsActive."\",
				DateTimeLastModified	= now()
				WHERE PopularSearchID=".$PSID);
//		echo $strSQL;
//		exit;
		$DB->query($strSQL);
	}elseif($_POST["btn"]=="Update"){
		$strUpdate1	= ("UPDATE ColumnTitle SET
				ColumnTitle	= \"".$CategoryTitle1."\",
				DateTimeLastModified	= now()
				WHERE ColumnOrder=1");
//		echo "<br/>".$strUpdate1;
		$DB->query($strUpdate1);
		
		$strUpdate2	= ("UPDATE ColumnTitle SET
				ColumnTitle	= \"".$CategoryTitle2."\",
				DateTimeLastModified	= now()
				WHERE ColumnOrder=2");
//		echo "<br/>".$strUpdate2;
		$DB->query($strUpdate2);
		
		$strUpdate3	= ("UPDATE ColumnTitle SET
				ColumnTitle	= \"".$CategoryTitle3."\",
				DateTimeLastModified	= now()
				WHERE ColumnOrder=3");
//		echo "<br/>".$strUpdate3;
		$DB->query($strUpdate3);
//		exit;
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_Popular_Searches.php?act=".$view."&psid=".$PSID."');</script>";
?>