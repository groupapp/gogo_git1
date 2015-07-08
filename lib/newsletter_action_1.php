<?php 
	include "../include/function.php";
	$DB = new myDB;
	
	$action	= $_POST["action"];
	$email	= $_POST["email"];

	if($action == "submit"){
		$strSQL	= ("INSERT INTO SignedUp_EmailList
				(EmailAddress, IsActive)
				VALUES(
				\"".$email."\",
				\"Y\"
		)");
//		echo $strSQL;
//		exit;
		$DB->query($strSQL);
	}
	echo "<script>location.replace('/');</script>";
?>