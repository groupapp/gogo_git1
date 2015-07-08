<?php 
	include "../include/function.php";
	$DB = new myDB;
	
	$action					= $_POST["action"];
	$CustomerName			= $_POST["CustomerName"];
	$CustomerEmailAddress	= $_POST["CustomerEmailAddress"];
	$CustomerPhoneNumber	= $_POST["CustomerPhoneNumber"];
	$Subject				= $_POST["Subject"];
	$Message				= $_POST["Message"];
	
	if($action == "submit"){
		$strSQL	= ("INSERT INTO MessagesFromCustomers
				(CustomerName, CustomerEmailAddress, CustomerPhoneNumber, Subject, Message)
				VALUES(
					\"".$CustomerName."\",
					\"".$CustomerEmailAddress."\",
					\"".$CustomerPhoneNumber."\",
					\"".$Subject."\",
					\"".$Message."\"
				)");
	//	echo $strSQL;
	//	exit;
		$DB->query($strSQL);
	}
	echo "<script>location.replace('/?info=contactus&submit=true');</script>";
?>