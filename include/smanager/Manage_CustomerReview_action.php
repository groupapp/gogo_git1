<?php
	include "../include/function.php";
	$DB = new myDB;

	$rateID		= $_POST["rateID"];
	$is_active	= $_POST["IsActive"];

	if($_POST["update"]=="update"){
		$strSQL 	= ("UPDATE RatingReview SET
			is_active = \"".$is_active."\"
			WHERE RatingReviewID=".$rateID);

		$DB->query($strSQL);
	}	
	
	$DB->close();

	echo "<script>location.replace('Manage_CustomerReview.php?rateID=".$rateID."&act=view');</script>";
?>