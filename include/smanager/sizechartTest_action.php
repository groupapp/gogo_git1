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
		for($i=1;$i<23;$i++){
			if($var[$i]){
				$strSQL = ("INSERT INTO Size (SizeChartID,SizeChartName,SizeChartDescription,Size) VALUES(
						\"".$sizeChartID."\",
						\"".$SizeChartName."\",
						\"".$SizeChartDescription."\",
						\"".$var[$i]."\"
				)");
				$DB->query($strSQL);
			}
		}
		$DB2->close();
	}elseif ($action == "update") {
		for($i=1;$i<23;$i++){
			if($hvar[$i]){
				$strSQL = ("UPDATE Size SET
					SizeChartName	= \"".$SizeChartName."\",
					SizeChartDescription= \"".$SizeChartDescription."\",
					Size	= \"".$var[$i]."\"
					WHERE SizeID=".$hvar[$i]." AND SizeChartID=".$SizeChartID2);
//				echo $strSQL."<br/>";
				$DB->query($strSQL);
			}else{
				if($var[$i]){
					$strSQL = ("INSERT INTO Size (SizeChartID,SizeChartName,SizeChartDescription,Size) VALUES(
							\"".$SizeChartID2."\",
							\"".$SizeChartName."\",
							\"".$SizeChartDescription."\",
							\"".$var[$i]."\"
					)");
//					echo $strSQL."<br/>";
					$DB->query($strSQL);
				}
			}
		}
	}
	
	$DB->close();
	echo "<script>location.replace('sizechartTest.php?act=".$view."&aid=".$SizeChartID2."');</script>";
?>