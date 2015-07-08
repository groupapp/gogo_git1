<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$Action	= $_POST["Action"];
	$SalesMonth	= $_POST["SalesMonth"];
	$SalesYear	= $_POST["SalesYear"];
	
	//DEBUG
	echo $Action;
	echo "<br/>";
	echo $SalesMonth;
	echo "<br/>";
	echo $SalesYear;
	//END DEBUG

	$DB->close();
	echo "<script>location.replace('Manage_Statistics_Sales.php');</script>";
?>