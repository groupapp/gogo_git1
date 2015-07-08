<?php
	include "../include/function.php";
	$DB = new myDB;

	$strSQL="SELECT * FROM Customers WHERE LoginID = '".$_POST["EmailAddress"]."'";
	$DB->query($strSQL);

	while ($data = $DB->fetch_array($DB->res)){

		if($data["LoginID"]==$_POST["EmailAddress"]){		
			$subject = 'Your Password is';
			$to = $data["LoginID"];
			$message = '
		<html>
			<head></head>
			<body>
				<p>Here is your password</p>
				<p>Your Password: '.$data["LoginPassword"].'</p>
				<p style="color:blue;"><a href="http://sshop.i9biz.com/?page=customer&account=login">Go To Log in</a></p>
			</body>
			';
		
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
		
			// Additional headers
			$headers .= 'From: Password Reminder <info@Lemontreeclothing.com>' . "\n";
		
			// Mail it
			mail($to, $subject, $message, $headers);
			
			echo "<script>location.replace('/?page=customer&account=retrieve_success');</script>";
		}		
	}
	echo "<script>location.replace('/?page=customer&account=retrieve_fail&email=".$_POST["EmailAddress"]."');</script>";
?>