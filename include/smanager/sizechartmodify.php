<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$sizeChart = 3;
	$strSQL = "SELECT * FROM Size WHERE SizeChartID=".$sizeChart;
	$DB->query($strSQL);
/*	while($data = $DB->fetch_array($DB->res)){
		$strSQL2 = 
	}*/
?>