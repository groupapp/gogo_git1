<?php
	
	include "../include/function.php";
	$DB = new myDB;
	
	$action					= $_POST["action"];
	$CompanyName			= $_POST["CompanyName"];
	$OwnerFirstName			= $_POST["OwnerFirstName"];
	$OwnerLastName			= $_POST["OwnerLastName"];
	$ContactFirstName1		= $_POST["ContactFirstName1"];
	$ContactLastName1		= $_POST["ContactLastName1"];
	$ContactFirstName2		= $_POST["ContactFirstName2"];
	$ContactLastName2		= $_POST["ContactLastName2"];
	$CompanyWebsite1		= $_POST["CompanyWebsite1"];
	$CompanyWebsite2		= $_POST["CompanyWebsite2"];
	$CompanyEmailAddress1	= $_POST["CompanyEmailAddress1"];
	$CompanyEmailAddress2	= $_POST["CompanyEmailAddress2"];
	$StoreAddress			= $_POST["StoreAddress"];
	$StoreCity				= $_POST["StoreCity"];
	$StoreStateOrProvince	= $_POST["StoreStateOrProvince"];
	$StoreZipCode			= $_POST["StoreZipCode"];
	$StoreCountryOrRegion	= $_POST["StoreCountryOrRegion"];
	$StorePhoneNumber		= $_POST["StorePhoneNumber"];
	$StoreFaxNumber			= $_POST["StoreFaxNumber"];
	$StorePhoneNumber2		= $_POST["StorePhoneNumber2"];
	$StoreFaxNumber2		= $_POST["StoreFaxNumber2"];
	$button					= $_POST["button"];
	
	if($action == "update"){
		$strSQL = ("UPDATE CompanyInfo SET
				CompanyName 			=\"" .$CompanyName."\",
				OwnerFirstName 			=\"" .$OwnerFirstName."\",
				OwnerLastName			=\"" .$OwnerLastName."\",
				ContactFirstName1		=\"" .$ContactFirstName1."\",
				ContactLastName1		=\"" .$ContactLastName1."\",
				ContactFirstName2		=\"" .$ContactFirstName2."\",
				ContactLastName2		=\"" .$ContactLastName2."\",
				CompanyWebsite1			=\"" .$CompanyWebsite1."\",
				CompanyWebsite2			=\"" .$CompanyWebsite2."\",
				CompanyEmailAddress1	=\"" .$CompanyEmailAddress1."\",
				CompanyEmailAddress2	=\"" .$CompanyEmailAddress2."\",
				StoreAddress			=\"" .$StoreAddress."\",
				StoreCity				=\"" .$StoreCity."\",
				StoreStateOrProvince	=\"" .$StoreStateOrProvince."\",
				StoreZipCode			=\"" .$StoreZipCode."\",
				StoreCountryOrRegion	=\"" .$StoreCountryOrRegion."\",
				StorePhoneNumber		=\"" .$StorePhoneNumber."\",
				StorePhoneNumber2		=\"" .$StorePhoneNumber2."\",
				StoreFaxNumber			=\"" .$StoreFaxNumber."\",
				StoreFaxNumber2			=\"" .$StoreFaxNumber2."\",
				DateTimeLastUpdated = now()
				Where CompanyID = 1");

		$DB -> query($strSQL);	
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_CompanyInfo.php');</script>";
?>