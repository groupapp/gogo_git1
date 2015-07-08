<?php
	include "../include/function.php";
	$DB = new myDB;

	$DisplayOrder			= $_POST["DisplayOrder"];
	$action					= $_REQUEST["action"];
	$SizeChartID			= $_GET["id"];
	$SizeChartID2			= $_POST["SizeChartID"];
	$SizeChartName			= $_POST["SizeChartName"];
	$SizeChartDescription	= $_POST["SizeChartDescription"];
	$var					= $_POST["Size"];
	$hvar					= $_POST["hsize"];
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
		$strSQL = ("DELETE FROM Size WHERE SizeChartID=".$SizeChartID);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	} elseif ($action == "add") {
		$DB2 = new myDB;
		$smallSQL = "SELECT MAX(SizeChartID) FROM Size";
		$DB2->query($smallSQL);
		$data2 = $DB2->fetch_array($DB2->res);
		$sizeChartID = $data2["MAX(SizeChartID)"]+1;
		for($i=1;$i<11;$i++){
			if($var[$i]){
				$strSQL = ("INSERT INTO Size (SizeChartID,SizeChartName,SizeChartDescription,Size,IsActive,DateTimeCreated,DateTimeLastModified) VALUES(
						\"".$sizeChartID."\",
						\"".$SizeChartName."\",
						\"".$SizeChartDescription."\",
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
				$strSQL = ("UPDATE Size SET
					SizeChartName	= \"".$SizeChartName."\",
					SizeChartDescription= \"".$SizeChartDescription."\",
					IsActive= \"".$Edit_IsActive."\",
					DateTimeLastModified= now(),
					Size	= \"".$var[$i]."\"
					WHERE SizeID=".$hvar[$i]." AND SizeChartID=".$SizeChartID2);
				//echo $strSQL."<br/>";
				$DB->query($strSQL);
			}else{
				if($var[$i]){
					$strSQL = ("INSERT INTO Size (SizeChartID,SizeChartName,SizeChartDescription,Size,IsActive,DateTimeCreated,DateTimeLastModified) VALUES(
							\"".$SizeChartID2."\",
							\"".$SizeChartName."\",
							\"".$SizeChartDescription."\",
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
	echo "<script>location.replace('Manage_SizeCharts.php?act=".$view."&aid=".$SizeChartID2."&searchField=".$searchField."&searchKeyword=".$searchKeyword."&displayOrder=".$displayOrder."&pp=".$pp."');</script>";
?>