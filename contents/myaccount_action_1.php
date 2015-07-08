<?php
	include "../include/function.php";
	$DB = new myDB;
	$CustomerID	= $_POST["CustomerID"];	
	$login			= $_POST["login"];
	$userID			= $login["userid"];
	$billing		= $_POST["billing"];
	$shipping		= $_POST["shipping"];
	$birth_year		= $_POST["birth_year"];
	$birth_month	= $_POST["birth_month"];
	$birth_date		= $_POST["birth_date"];
	$LoginPassword		= $_POST["password"];
	$returnurl			= $login["returnurl"];
	$MailingFirstName	= $_POST["MailingFirstName"];
	$MailingLastName	= $_POST["MailingLastName"];
	
	$MailingCompanyName	= $_POST["MailingCompanyName"];
	$MailingStreet		= $_POST["MailingStreet"];
	$MailingStreet2		= $_POST["MailingStreet2"];
	$MailingCity		= $_POST["MailingCity"];
	$MailingZipcode		= $_POST["MailingZipcode"];
	if($billing["region_id"]){
		$MailingStateOrProvince=$billing["region_id"];
	}else{
		$MailingStateOrProvince=$billing["region"];
	}
	$MailingCountry	= $billing["country_id"];
	$MailingPhone	= $_POST["MailingPhone"];
	$MailingFax		= $_POST["MailingFax"];
	
	
	$ShippingFirstName		= $_POST["ShippingFirstName"];
	$ShippingLastName		= $_POST["ShippingLastName"];
	$ShippingCompanyName	= $_POST["ShippingCompanyName"];
	$ShippingStreet			= $_POST["ShippingStreet"];
	$ShippingStreet2		= $_POST["ShippingStreet2"];
	$ShippingCity			= $_POST["ShippingCity"];
	if($shipping["region_id"]){
		$ShippingStateOrProvince = $shipping["region_id"];
	}else{
		$ShippingStateOrProvince = $shipping["region"];
	}
	$ShippingZipcode		= $_POST["ShippingZipcode"];
	$ShippingCountry		= $shipping["country_id"];
	$ShippingPhone			= $_POST["ShippingPhone"];
	$ShippingFax			= $_POST["ShippingFax"];
	$ShippingEmailAddress	= $_POST["ShippingEmailAddress"];
	
	
	$strSQL	= "UPDATE Customers SET
				LoginID 				= '".$userID."',
				MailingFirstName 		= '".$MailingFirstName."',
				MailingLastName 		= '".$MailingLastName."',
				LoginPassword 			= '".$LoginPassword."',
				MailingCompanyName 		= '".$MailingCompanyName."',
				MailingStreet 			= '".$MailingStreet."',
				MailingStreet2 			= '".$MailingStreet2."',
				MailingCity 			= '".$MailingCity."',
				MailingStateOrProvince 	= '".$MailingStateOrProvince."',
				MailingZipcode 			= '".$MailingZipcode."',
				MailingCountry 			= '".$MailingCountry."',
				MailingPhone 			= '".$MailingPhone."',
				MailingFax 				= '".$MailingFax."',				
				ShippingFirstName 		= '".$ShippingFirstName."',
				ShippingLastName 		= '".$ShippingLastName."',
				ShippingCompanyName 	= '".$ShippingCompanyName."',
				ShippingStreet 			= '".$ShippingStreet."',
				ShippingStreet2 		= '".$ShippingStreet2."',
				ShippingCity 			= '".$ShippingCity."',
				ShippingStateOrProvince = '".$ShippingStateOrProvince."',
				ShippingZipcode 		= '".$ShippingZipcode."',
				ShippingCountry 		= '".$ShippingCountry."',
				ShippingPhone 			= '".$ShippingPhone."',
				ShippingFax 			= '".$ShippingFax."',
				BirthYear 				= '".$birth_year."',
				BirthMonth 				= '".$birth_month."',
				BirthDate 				= '".$birth_date."' 
				WHERE CustomerID			= ".$CustomerID;

	//echo $strSQL;
	//exit;
	$DB->query($strSQL);

//echo $_COOKIE["userID"];
$DB->close();

echo "<script>
window.location='/?page=customer&account=mypersonalinfo';
</script>";

?>