<?php
	include "../include/function.php";
	$DB = new myDB;

	$DisplayOrder			= $_POST["DisplayOrder"];
	$action					= $_REQUEST["action"];
	$PackChartID			= $_GET["id"];
	$PackChartID2			= $_POST["PackChartID"];
	$PackChartName			= $_POST["PackChartName"];
	$PackChartDescription	= $_POST["PackChartDescription"];
	$var					= $_POST["Pack"];
	$hvar					= $_POST["hPack"];
	$view					= $_POST["view"];
	$pp						= $_POST["pp"];
	$searchField			= $_POST["searchField"];
	$searchKeyword			= $_POST["searchKeyword"];
	$displayOrder			= $_POST["displayOrder"];
	$Edit_IsActive			= $_POST["Edit_IsActive"];
//	echo "action<br/>";
//	echo $action;
//	exit;
	if ($action == "del") {
		$strSQL = ("DELETE FROM Pack WHERE PackChartID=".$PackChartID);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	} elseif ($action == "add") {
		$DB2 = new myDB;
		$smallSQL = "SELECT MAX(PackChartID) FROM Pack";
		$DB2->query($smallSQL);
		$data2 = $DB2->fetch_array($DB2->res);
		$PackChartID = $data2["MAX(PackChartID)"]+1;
		for($i=1;$i<11;$i++){
			if($var[$i]){
				$strSQL = ("INSERT INTO Pack (PackChartID,PackChartName,PackChartDescription,Pack,IsActive,DateTimeCreated,DateTimeLastModified) VALUES(
						\"".$PackChartID."\",
						\"".$PackChartName."\",
						\"".$PackChartDescription."\",
						\"".$var[$i]."\",
						\"".$Edit_IsActive."\",now(),now()
				)");
				$DB->query($strSQL);
			}
		}
		$DB2->close();
	}elseif ($action == "update") {
		for($i=1;$i<11;$i++){
			if($hvar[$i]){
				$strSQL = ("UPDATE Pack SET
					PackChartName	= \"".$PackChartName."\",
					PackChartDescription= \"".$PackChartDescription."\",
					IsActive= \"".$Edit_IsActive."\",
					DateTimeLastModified= now(),
					Pack	= \"".$var[$i]."\"
					WHERE PackID=".$hvar[$i]." AND PackChartID=".$PackChartID2);
				//echo $strSQL."<br/>";
				$DB->query($strSQL);
			}else{
				if($var[$i]){
					$strSQL = ("INSERT INTO Pack (PackChartID,PackChartName,PackChartDescription,Pack,IsActive,DateTimeCreated,DateTimeLastModified) VALUES(
							\"".$PackChartID2."\",
							\"".$PackChartName."\",
							\"".$PackChartDescription."\",
							\"".$var[$i]."\",
							\"".$Edit_IsActive."\",now(),now()
					)");
//					echo $strSQL."<br/>";
					$DB->query($strSQL);
				}
			}
		}
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_PackCharts.php?act=".$view."&aid=".$PackChartID2."&searchField=".$searchField."&searchKeyword=".$searchKeyword."&displayOrder=".$displayOrder."&pp=".$pp."');</script>";
?>