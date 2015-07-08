<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$MonthSelected	= $_POST["MonthSelected"];
	$YearSelected	= $_POST["YearSelected"];
	
	$DB->close();
	echo "<script>location.replace('Manage_Orders_Shipped.php');</script>";
?>