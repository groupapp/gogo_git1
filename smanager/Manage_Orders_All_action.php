<?php
	include "../include/function.php";
	$DB = new myDB;
	$DB3 = new myDB;
	$DBc = new myDB;
	$DB4 = new myDB;
	$DB5 = new myDB;
	$DB7 = new myDB;
	$DBd = new myDB;
	$MonthSelected_Shipped	= $_POST["MonthSelected_Shipped"];
	$YearSelected_Shipped	= $_POST["YearSelected_Shipped"];
	$YearSelected_Cancelled	= $_POST["YearSelected_Cancelled"];
	
	$deleteod=$_POST["deleteod"];
	//print_r($deleteod);
	
	$TotalProductQuantity					= $_POST["TotalProductQuantity"];
	$TotalProductAmount					= $_POST["TotalProductAmount"];
	$TotalOrderAmount					= round($_POST["TotalOrderAmount"],3);
	$OrderID					= $_REQUEST["OrderID"];
	$action						= $_POST["action"];
	$button1					= $_POST["button1"];
	
	
	$orderchk					= $_POST["orderchk"];
	$status					= $_POST["status"];
	

	$ShippingTrackingNo			= $_POST["ShippingTrackingNo"];
	$PONo						= $_POST["PONo"];
	$InvoiceNo					= $_POST["InvoiceNo"];
	$promotionalCode			= $_POST["promotionalCode"];
	$AuthorizationCode			= $_POST["AuthorizationCode"];
	$Sweight					= $_POST["Sweight"];
	$MailingFirstName			= $_POST["MailingFirstName"];
	$MailingLastName			= $_POST["MailingLastName"];
	$ShippingFirstName			= $_POST["ShippingFirstName"];
	$ShippingLastName			= $_POST["ShippingLastName"];
	$MailingStreet				= $_POST["MailingStreet"];
	$ShippingStreet				= $_POST["ShippingStreet"];
	$MailingCompanyName			= $_POST["MailingCompanyName"];
	$ShippingCompanyName		= $_POST["ShippingCompanyName"];
	$MailingCity				= $_POST["MailingCity"];
	$ShippingCity				= $_POST["ShippingCity"];
	$MailingStateOrProvince		= $_POST["MailingStateOrProvince"];
	$ShippingStateOrProvincee	= $_POST["ShippingStateOrProvince"];
	$MailingZipcode				= $_POST["MailingZipcode"];
	$ShippingZipcode			= $_POST["ShippingZipcode"];
	$MailingCountry				= $_POST["MailingCountry"];
	$ShippingCountry			= $_POST["ShippingCountry"];
	$MailingPhone				= $_POST["MailingPhone"];
	$ShippingPhone				= $_POST["ShippingPhone"];
	$MailingFax					= $_POST["MailingFax"];
	$ShippingFax				= $_POST["ShippingFax"];
	$MailingEmailAddress		= $_POST["MailingEmailAddress"];
	$ShippingEmailAddress		= $_POST["ShippingEmailAddress"];
	$PreviousCreditAmount		= $_POST["PreviousCreditAmount"];
	$DiscountAmount				= $_POST["DiscountAmount"];
	$Member_DiscountAmount				= $_POST["Member_DiscountAmount"];
	$LocalSalesTax				= $_POST["LocalSalesTax"];
	$HandlingCharge				= $_POST["HandlingCharge"];
	$ShippingCharge				= $_POST["ShippingCharge"];
	$Comments					= $_POST["Comments"];
	$pointEarn					= $_POST["pointEarn"];
	$cutomerID					= $_POST["cutomerID"];
	
	$Cstatus					= $_POST["Cstatus"];
	$Comments1				= $_POST["Comments1"];
	$Mailto					= $_REQUEST["Mailto"];
	if($Mailto=='')
	$Mailto='N';
	$CNo					= $_REQUEST["CNo"];
	$CAction					= $_REQUEST["CAction"];
	$automail					= $_REQUEST["automail"];

	if($CAction!="")
	{
		$strSQLd = " DELETE FROM Comment WHERE No = ".$CNo;
		$DBd->query($strSQLd);
	}

	if(count($orderchk)>0)
	{
		for($i=0; $i<count($orderchk); $i++) {
				
				if($status=="new"){
				$strSQL2 = " UPDATE Orders SET  OrderConfirmed='N' , ShippingConfirmed='N' , OrderCancelled='N'  WHERE OrderID = ".$orderchk[$i];
				}
				elseif($status=="processing"){
				$strSQL2 = "UPDATE Orders SET OrderConfirmed='Y' , ShippingConfirmed='N' , OrderCancelled='N' WHERE OrderID = ".$orderchk[$i];
				}
				elseif($status=="shipped"){
					$strSQL2 = "UPDATE Orders SET OrderConfirmed='Y' , ShippingConfirmed='Y' , OrderCancelled='N' WHERE OrderID = ".$orderchk[$i];
				}
				elseif($status=="cancel"){
					$strSQL2 = "UPDATE Orders SET  ShippingConfirmed='N' , OrderCancelled='Y'  WHERE OrderID = ".$orderchk[$i];
				}
				elseif($status=="refund"){
					$strSQL2 = "UPDATE Orders SET OrderConfirmed='Y' , ShippingConfirmed='Y'  ,OrderCancelled='Y' WHERE OrderID = ".$orderchk[$i];
				}
				$DB4->query($strSQL2);		
		}

	}
	
	if(count($deleteod)>0)
	{
		for($i=0; $i<count($deleteod); $i++) {
				$strSQL2 = " DELETE FROM OrderItems WHERE OrderItemID = ".$deleteod[$i];
				$DB3->query($strSQL2);
		}


		$strSQLc = " SELECT sum(TotalQuantity) AS s_qty,sum(TotalAmount) as s_amount from OrderItems WHERE OrderID=".$OrderID;
		$DBc->query($strSQLc);
		//echo $strSQLc;
		while($datac = $DBc->fetch_array($DBc->res)){
			$TotalProductQuantity=$datac["s_qty"];
			$TotalProductAmount=$datac["s_amount"];
		}
		$TotalOrderAmount=$TotalProductAmount-$PreviousCreditAmount-$Member_DiscountAmount-$DiscountAmount+$LocalSalesTax+$HandlingCharge	+$ShippingCharge;

	}


//	echo "I'm in the action!<br/>";
	//echo $action;
	//echo $TotalOrderAmount;
	//exit;
	if($action=="cancel"&& !empty($OrderID)){
		//echo "I'm in the cancel!<br/>";
		//exit;
		$strSQL 	= ("UPDATE Orders SET
				OrderCancelled			= \"Y\",
				OrderCancelledDateTime	= now()
				WHERE OrderID=".$OrderID);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	if($action=="recover"&& !empty($OrderID)){
		//echo "I'm in the recover!<br/>";
		//exit;
		$strSQL 	= ("UPDATE Orders SET
				OrderCancelled			= \"N\",
				OrderCancelledDateTime	= \"\"
				WHERE OrderID=".$OrderID);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	if($action=="processing"&& !empty($OrderID)){
		//echo "I'm in the confirm!<br/>";
		$strSQL 	= ("UPDATE Orders SET
				OrderConfirmed			= \"Y\",
				OrderConfirmedDateTime 	= now()
				WHERE OrderID=".$OrderID);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	if($action=="ConfirmShiipingThisOrder"&& !empty($OrderID)){
//		echo $pointEarn."<br/>";
//		exit;
		$DB2 	= new myDB;
		$strSQL2 = "SELECT TotalPointsEarned FROM Customers WHERE CustomerID=".$cutomerID;
		$DB2->query($strSQL2);
		$data2 = $DB2->fetch_array($DB2->res);
		$totalPoint = $data2["TotalPointsEarned"]+$pointEarn;
//		echo "I'm in the shipping confirm!<br/>";
		$strSQL 	= ("UPDATE Orders SET
				ShippingConfirmed			= \"Y\",
				ShippingConfirmedDateTime	= now()
				WHERE OrderID=".$OrderID);
//		echo $strSQL."<br/>";
//		exit;
		$DB->query($strSQL);
		$strSQL 	= ("UPDATE Customers SET
				TotalPointsEarned			= \"".$totalPoint."\"
				WHERE CustomerID=".$cutomerID);
//		echo $strSQL;
		$DB->query($strSQL);
		
		//Is VIP?
		$strSQL2 = "SELECT TotalPointsEarned FROM Customers WHERE CustomerID=".$cutomerID;
		$DB2->query($strSQL2);
		$data2 = $DB2->fetch_array($DB2->res);
		if($data2["TotalPointsEarned"]>=1200){
			$currentPoint = $data2["TotalPointsEarned"] - 1200;
			$strSQL 	= ("UPDATE Customers SET
				Is_VIP_Member			= \"Y\",	
				TotalPointsEarned		= \"".$currentPoint."\",
				DateTimeVIP				= now()
				WHERE CustomerID=".$cutomerID);
			$DB->query($strSQL);
		}
//		exit;
	}
	if($action=="CancelShiipingThisOrder"&& !empty($OrderID)){
//		echo $pointEarn."<br/>";
//		exit;
		$DB2 	= new myDB;
		$strSQL2 = "SELECT TotalPointsEarned FROM Customers WHERE CustomerID=".$cutomerID;
		$DB2->query($strSQL2);
		$data2 = $DB2->fetch_array($DB2->res);
		$totalPoint = $data2["TotalPointsEarned"]-$pointEarn;
//		echo "I'm in the shipping confirm!<br/>";
		$strSQL 	= ("UPDATE Orders SET
				OrderCancelled			= \"Y\",
				OrderCancelledDateTime	= now()
				WHERE OrderID=".$OrderID);
//		echo $strSQL."<br/>";
		//		exit;
		$DB->query($strSQL);
		$strSQL 	= ("UPDATE Customers SET
				TotalPointsEarned			= \"".$totalPoint."\"
				WHERE CustomerID=".$cutomerID);
//		echo $strSQL;
		$DB->query($strSQL);
		
		//Is VIP?
		$strSQL2 = "SELECT C.DateTimeVIP, C.IsVIP_Member, O.ShippingConfirmDateTime From Customers C LEFT JOIN Orders O ON C.CustomerID = O.CustomerID";
		$DB2->query($strSQL2);
		$data2 = $DB2->fetch_array($DB2->res);
		if($data2["ShippingConfirmedDateTime"] == $data2["DateTimeVIP"]){
			$currentPoint = $data2["TotalPointsEarned"] + 1200;
			$strSQL 	= ("UPDATE Customers SET
					Is_VIP_Member			= \"N\",
					TotalPointsEarned		= \"".$currentPoint."\",
					DateTimeVIP				= \"\",
					WHERE CustomerID=".$cutomerID);
			$DB->query($strSQL);
		}
		
	//	exit;
	}
	if($action=="recoverAgain"&& !empty($OrderID)){
		//echo $action."<br/>";
		echo $pointEarn."<br/>";
//		exit;
		$DB2 	= new myDB;
		$strSQL2 = "SELECT TotalPointsEarned FROM Customers WHERE CustomerID=".$cutomerID;
		$DB2->query($strSQL2);
		$data2 = $DB2->fetch_array($DB2->res);
		$totalPoint = $data2["TotalPointsEarned"]+$pointEarn;
		
		$strSQL 	= ("UPDATE Orders SET
				OrderCancelled			= \"N\",
				OrderCancelledDateTime	= \"\"
				WHERE OrderID=".$OrderID);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
		
		$strSQL 	= ("UPDATE Customers SET
				TotalPointsEarned			= \"".$totalPoint."\"
				WHERE CustomerID=".$cutomerID);
//		echo $strSQL;
		$DB->query($strSQL);
		
		//Is VIP?
		$strSQL2 = "SELECT TotalPointsEarned FROM Customers WHERE CustomerID=".$cutomerID;
		$DB2->query($strSQL2);
		$data2 = $DB2->fetch_array($DB2->res);
		if($data2["TotalPointsEarned"]>=1200){
			$currentPoint = $data2["TotalPointsEarned"] - 1200;
			$strSQL 	= ("UPDATE Customers SET
					Is_VIP_Member			= \"Y\",
					TotalPointsEarned		= \"".$currentPoint."\",
					DateTimeVIP				= now()
					WHERE CustomerID=".$cutomerID);
			$DB->query($strSQL);
		}
		//		exit;
	}

	
	if ($action == "update" && !empty($OrderID)) {
		//echo "I'm in the update!<br/>";
		//exit;
		$strSQL 	= ("UPDATE Orders SET
				ShippingTrackingNo		= \"".$ShippingTrackingNo."\",
				PONo					= \"".$PONo."\",
				Status					= \"".$Cstatus."\",				
				InvoiceNo				= \"".$InvoiceNo."\",
				promotionalCode			= \"".$promotionalCode."\",
				AuthorizationCode		= \"".$AuthorizationCode."\",
				Weight_Pounds			= \"".$Sweight."\",
				MailingFirstName		= \"".$MailingFirstName."\",
				MailingLastName			= \"".$MailingLastNamet."\",
				ShippingFirstName		= \"".$ShippingFirstName."\",
				ShippingLastName		= \"".$ShippingLastName."\",
				MailingStreet			= \"".$MailingStreet."\",
				ShippingStreet			= \"".$ShippingStreet."\",
				MailingCompanyName		= \"".$MailingCompanyName."\",
				ShippingCompanyName		= \"".$ShippingCompanyName."\",
				MailingCity				= \"".$MailingCity."\",
				ShippingCity			= \"".$ShippingCity."\",
				MailingStateOrProvince	= \"".$MailingStateOrProvince."\",
				ShippingStateOrProvince	= \"".$ShippingStateOrProvince."\",
				MailingZipcode			= \"".$MailingZipcode."\",
				ShippingZipcode			= \"".$ShippingZipcode."\",
				MailingCountry			= \"".$MailingCountry."\",
				ShippingCountry			= \"".$ShippingCountry."\",
				MailingPhone			= \"".$MailingPhone."\",
				ShippingPhone			= \"".$ShippingPhone."\",
				MailingFax				= \"".$MailingFax."\",
				ShippingFax				= \"".$ShippingFax."\",
				MailingEmailAddress		= \"".$MailingEmailAddress."\",
				ShippingEmailAddress	= \"".$ShippingEmailAddress."\",
				TotalProductQuantity	= \"".$TotalProductQuantity."\",
				TotalProductAmount		= \"".$TotalProductAmount."\",	
				PreviousCreditAmount	= \"".$PreviousCreditAmount."\",
				DiscountAmount			= \"".$DiscountAmount."\",
				Member_DiscountAmount			= \"".$Member_DiscountAmount."\",
				LocalSalesTax			= \"".$LocalSalesTax."\",
				HandlingCharge			= \"".$HandlingCharge."\",
				ShippingCharge			= \"".$ShippingCharge."\",
				TotalOrderAmount		= \"".$TotalOrderAmount."\",
				Comments				= \"".$Comments."\"
				WHERE OrderID=".$OrderID);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);

//=================================================================================
				if($Cstatus=="new"){
				$strSQL5 = " UPDATE Orders SET  OrderConfirmed='N' , ShippingConfirmed='N' , OrderCancelled='N'  WHERE OrderID = ".$OrderID;
				}
				elseif($Cstatus=="processing"){
				$strSQL5 = "UPDATE Orders SET OrderConfirmed='Y' , ShippingConfirmed='N' , OrderCancelled='N' WHERE OrderID = ".$OrderID;
				}
				elseif($Cstatus=="shipped"){
					$strSQL5 = "UPDATE Orders SET OrderConfirmed='Y' , ShippingConfirmed='Y' , OrderCancelled='N' WHERE OrderID = ".$OrderID;
				}
				elseif($Cstatus=="cancel"){
					$strSQL5 = "UPDATE Orders SET  ShippingConfirmed='N' , OrderCancelled='Y'  WHERE OrderID = ".$OrderID;
				}
				elseif($status=="refund"){
					$strSQL5 = "UPDATE Orders SET OrderConfirmed='Y' , ShippingConfirmed='Y'  ,OrderCancelled='Y' WHERE OrderID = ".$OrderID;
				}
				$DB5->query($strSQL5);	
//==================================================================================
			$strSQL7="SELECT * from Comment  WHERE  OrderID=\"".$OrderID."\"  and Save='N'";
			$DB7->query($strSQL7);
			//$data7 = $DB7->fetch_array($DB7->res);
			//echo $strSQL7."//";
			
//
		if (!empty($Comments1)) {

			if ($DB7->rows>0)
			$strSQL = "UPDATE Comment SET Save='Y' WHERE  OrderID=\"".$OrderID."\"  and Save='N'";
			else				
			$strSQL = ("INSERT INTO Comment (OrderID, Status, Comment, DateCreate, Mailto,Save) Values (\"".$OrderID."\",\"".$Cstatus."\",\"".$Comments1."\",now(),\"".$Mailto."\",'Y')");
			//echo $strSQL;
			//exit;
			$DB->query($strSQL);


			if($Mailto=="Y" || ($automail=="Y" && $Cstatus=="processing"))//|| ($automail=="Y" && $Cstatus=="new"))
			{
				$to=$MailingEmailAddress;//"ttung33@hotmail.com";//
				
				$subject = 'LemontreeClothing Order Comment';

				$headers  = 'MIME-Version: 1.0' . "\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
				$headers .= 'From: LemontreeClothing.com <info@lemontreeclothing.com>' . "\n";
				//$message ='test';
				$message = '
					<!DOCTYPE html>
					<html>
					<head>
						<meta http-equiv="content-type" content="text/html; charset=UTF-8">
						<meta http-equiv="X-UA-Compatible" content="IE=8" />
						<title></title>
					</head>
					<body style="font-family: verdana;font-size: 12px;color: #555555; line-height: 14pt">
						<p><img src="http://lemontreeclothing.com/images/header_back.png" ></p>
						<p>Dear '.$MailingFirstName.' '.$MailingLastName.'</p>
						<table style="width: 100%;">
							<tr>
								<td style="width: 10%;">
									Status
								</td>
								<td style="width: 10%;">
									<span>'.$Cstatus.'</span>
								</td>
								<td style="width: 20%;">Comments</td>
								<td style="width: 60%; text-align: right; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
									<span>'.$Comments1.'</span>
								</td>
							</tr>
						</table>';
				
				/*ini_set("SMTP","email.secureserver.net");
				ini_set("smtp_port","465");
				ini_set("auth_username","info@lemontreeclothing.com");
				ini_set("auth_password","$info4lemontree");
				*/			
				mail($to, $subject, $message, $headers);
			}
		}

	}
	
	$DB->close();
	if($status!="")
	echo "<script>location.replace('Manage_Orders_All.php');</script>";
	else
	echo "<script>location.replace('Manage_Orders_ViewOrderDetails.php?act=view&oid=".$OrderID."');</script>";
?>