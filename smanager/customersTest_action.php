<?php
	include "../include/function.php";
	require_once("../lib/CountryCodes.php");
	$DB = new myDB;

	$SearchField				= $_POST["SearchField"];
	$SearchKeyword				= $_POST["SearchKeyword"];
	$action						= $_REQUEST["action"];
	$GotoPage					= $_POST["GotoPage"];
	$CustomerID					= $_GET["id"];
	$CustomerID2				= $_POST["CustomerID"];
	$IsActive					= $_POST["IsActive"];
	$Is_VIP_Member				= $_POST["Is_VIP_Member"];
	$TotalPointsEarned			= $_POST["TotalPointsEarned"];
	$LoginID					= $_POST["LoginID"];
	$LoginPassword				= $_POST["LoginPassword"];
	$ReceiveEmail				= $_POST["ReceiveEmail"];
	$HowDidYouFindUs			= $_POST["HowDidYouFindUs"];
	$CreditAmount				= $_POST["CreditAmount"];
	$PenaltyAmount				= $_POST["PenaltyAmount"];
	$MemoOnCredit				= $_POST["MemoOnCredit"];
	$MemoOnPenalty				= $_POST["MemoOnPenalty"];
	$MemoOnCustomer				= $_POST["MemoOnCustomer"];
	$MailingFirstName			= $_POST["MailingFirstName"];
	$MailingMiddleName			= $_POST["MailingMiddleName"];
	$MailingLastName			= $_POST["MailingLastName"];
	$MailingCompanyName			= $_POST["MailingCompanyName"];
	$MailingStreet				= $_POST["MailingStreet"];
	$MailingCity				= $_POST["MailingCity"];
	$MailingStateOrProvince		= $_POST["MailingStateOrProvince"];
	$MailingZipcode				= $_POST["MailingZipcode"];
	$MailingCountry				= $_POST["MailingCountry"];
	$MailingPhone				= $_POST["MailingPhone"];
	$MailingFax					= $_POST["MailingFax"];
	$SortShippingAddress		= $_POST["SortShippingAddress"];
	$ShippingFirstName			= $_POST["ShippingFirstName"];
	$ShippingLastName			= $_POST["ShippingLastName"];
	$ShippingCompanyName		= $_POST["ShippingCompanyName"];
	$ShippingStreet				= $_POST["ShippingStreet"];
	$ShippingCity				= $_POST["ShippingCity"];
	$ShippingStateOrProvince	= $_POST["ShippingStateOrProvince"];
	$ShippingZipcode			= $_POST["ShippingZipcode"];
	$ShippingCountry			= $_POST["ShippingCountry"];
	$ShippingPhone				= $_POST["ShippingPhone"];
	$ShippingEmailAddress		= $_POST["ShippingEmailAddress"];
	$ShippingFax				= $_POST["ShippingFax"];
	$pp							= $_POST["pp"];
	$view						= $_POST["view"];

	echo $_POST['button']."<br/>";
	
	if($_POST['button']=="Active Checked Customers"){
		foreach($_POST["idtodel"] as $key => $val) {
			$strSQL 	= ("UPDATE Customers SET
					IsActive				= \"Y\",
					DateTimeLastUpdated	= now()
					WHERE CustomerID=".$val);
			//echo $strSQL;				
			$DB->query($strSQL);
		}
		//exit;
	}elseif($_POST['button']=="Delete Checked Customers"){
		foreach($_POST["idtodel"] as $key => $val) {
			$strSQL = ("DELETE FROM Customers WHERE CustomerID=".$val);
			//echo $strSQL;
			$DB->query($strSQL);
		}
		//exit;
	}elseif($_POST['button']=="Update Customers"){
		echo "in the Update Customers<br/>";
		$DB2 = new myDB;
		$strSQL2 = "SELECT * FROM Customers";
		$DB2->query($strSQL2);
		$cnt = 0;
		echo $strSQL2."<br/>";
		while ($data = $DB2->fetch_array($DB2->res)){
		//	echo "in the while<br/>";
			foreach ($country_list as $key=>$val){
				if(strtolower(substr($data["MailingCountry"]))==strtolower(substr($val))){
					$updateCnt = $data["UpdateCnt"]+1;
					$strSQL 	= ("UPDATE Customers SET
					MailingCountry	= \"".$key."\",
					UpdateCnt		= \"".$updateCnt."\",
					WHERE MailingCountry=".$val);
				//	echo $strSQL."<br/>";				
				//	$DB->query($strSQL);
					$cnt++;
				}
			}
		}
		echo "Update".$cnt;
		exit;
	}
	/*if ($actionAct == "active" && isset($_POST["idtodel"])) {
		foreach($_POST["idtodel"] as $key => $val) {
			$strSQL 	= ("UPDATE Customers SET
				IsActive				= \"Y\",
				DateTimeLastUpdated	= now()
				WHERE CustomerID=".$CustomerID2);
			//echo $strSQL;
			
			//$DB->query($strSQL);
		}
		//exit;
	}elseif ($action == "checkdel" && isset($_POST["idtodel"])) {
		foreach($_POST["idtodel"] as $key => $val) {
			$strSQL = ("DELETE FROM Customers WHERE CustomerID=".$val);
			echo $strSQL;
			//$DB->query($strSQL);
		}
		exit;
	}*/
	elseif($action == "del") {
		$strSQL = ("DELETE FROM Customers WHERE CustomerID=".$CustomerID);
		$DB->query($strSQL);
	}
	 elseif ($action == "add") {
		$strSQL		= ("INSERT INTO Customers (IsActive,Is_VIP_Member,TotalPointsEarned,LoginID,LoginPassword,ReceiveEmail,HowDidYouFindUs,CreditAmount,PenaltyAmount,MemoOnCredit
				,MemoOnPenalty,MemoOnCustomer,MailingFirstName,MailingMiddleName,MailingLastName,MailingCompanyName,MailingStreet,MailingCity,MailingStateOrProvince,MailingZipcode,MailingCountry
				,MailingPhone,MailingFax,SortShippingAddress,ShippingFirstName,ShippingLastName,ShippingCompanyName,ShippingStreet,ShippingCity,ShippingStateOrProvince,ShippingZipcode,ShippingCountry,ShippingPhone,ShippingEmailAddress,ShippingFax) VALUES(
				\"".$IsActive."\",
				\"".$Is_VIP_Member."\",
				\"".$TotalPointsEarned."\",
				\"".$LoginID."\",
				\"".$LoginPassword."\",
				\"".$ReceiveEmail."\",
				\"".$HowDidYouFindUs."\",
				\"".$CreditAmount."\",
				\"".$PenaltyAmount."\",		
				\"".$MemoOnCredit."\",
				\"".$MemoOnPenalty."\",
				\"".$MemoOnCustomer."\",
				\"".$MailingFirstName."\",
				\"".$MailingMiddleName."\",
				\"".$MailingLastName."\",				
				\"".$MailingCompanyName."\",
				\"".$MailingStreet."\",
				\"".$MailingCity."\",
				\"".$MailingStateOrProvince."\",
				\"".$MailingZipcode."\",
				\"".$MailingCountry."\",
				\"".$MailingPhone."\",
				\"".$MailingFax."\",
				\"".$SortShippingAddress."\",				
				\"".$ShippingFirstName."\",
				\"".$ShippingLastName."\",
				\"".$ShippingCompanyName."\",
				\"".$ShippingStreet."\",
				\"".$ShippingCity."\",
				\"".$ShippingStateOrProvince."\",
				\"".$ShippingZipcode."\",
				\"".$ShippingCountry."\",
				\"".$ShippingPhone."\",
				\"".$ShippingEmailAddress."\",
				\"".$ShippingFax."\"
				)");
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);	
	} elseif ($action == "update") {
		
		$strSQL 	= ("UPDATE Customers SET
				IsActive				= \"".$IsActive."\",
				Is_VIP_Member			= \"".$Is_VIP_Member."\",
				TotalPointsEarned		= \"".$TotalPointsEarned."\",
				LoginID					= \"".$LoginID."\",
				LoginPassword			= \"".$LoginPassword."\",
				ReceiveEmail			= \"".$ReceiveEmail."\",
				HowDidYouFindUs			= \"".$HowDidYouFindUs."\",
				CreditAmount			= \"".$CreditAmount."\",
				PenaltyAmount			= \"".$PenaltyAmount."\",
				MemoOnCredit			= \"".$MemoOnCredit."\",
				MemoOnPenalty			= \"".$MemoOnPenalty."\",
				MemoOnCustomer			= \"".$MemoOnCustomer."\",
				MailingFirstName		= \"".$MailingFirstName."\",
				MailingMiddleName		= \"".$MailingMiddleName."\",
				MailingLastName			= \"".$MailingLastName."\",
				MailingCompanyName		= \"".$MailingCompanyName."\",
				MailingStreet			= \"".$MailingStreet."\",
				MailingCity				= \"".$MailingCity."\",
				MailingStateOrProvince	= \"".$MailingStateOrProvince."\",
				MailingZipcode			= \"".$MailingZipcode."\",
				MailingCountry			= \"".$MailingCountry."\",
				MailingPhone			= \"".$MailingPhone."\",
				MailingFax				= \"".$MailingFax."\",
				SortShippingAddress		= \"".$SortShippingAddress."\",
				ShippingFirstName		= \"".$ShippingFirstName."\",
				ShippingLastName		= \"".$ShippingLastName."\",
				ShippingCompanyName		= \"".$ShippingCompanyName."\",
				ShippingStreet			= \"".$ShippingStreet."\",
				ShippingCity			= \"".$ShippingCity."\",
				ShippingStateOrProvince	= \"".$ShippingStateOrProvince."\",
				ShippingZipcode			= \"".$ShippingZipcode."\",
				ShippingCountry			= \"".$ShippingCountry."\",
				ShippingPhone			= \"".$ShippingPhone."\",
				ShippingEmailAddress	= \"".$ShippingEmailAddress."\",
				ShippingFax				= \"".$ShippingFax."\",
				DateTimeLastUpdated	= now()
				WHERE CustomerID=".$CustomerID2);
//		echo $strSQL;
//		exit;
		$DB->query($strSQL);
	}
	$DB->close();
	echo "<script>location.replace('Manage_Customers.php?SearchField=".$SearchField."&SearchKeyword=".$SearchKeyword."&pp=".$pp."&act=".$view."&aid=".$CustomerID2."&submit=Submit');</script>";
?>