<?php 
	include "../include/function.php";
	$DB = new myDB;
	
	$DB->close();
	echo "<script>location.replace('/?info=giftcertificates_next');</script>";
?>