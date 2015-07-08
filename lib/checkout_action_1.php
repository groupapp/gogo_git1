<?php
session_start();
include_once dirname(__FILE__) . '/../include/function.php';
$action		= (!empty($_POST['fact']))?$_POST['fact']:null;
//print_r('xx');

$DB 		= new myDB;

switch ($action) {
	
	case "process_cart":
		
		$user_session = strtoupper(session_id());
		if (empty($_SESSION['cart'])) {
			echo "Cart Error!";
			break;
		} else {
			
			$total_qty	= multiDimArrSum($_SESSION['cart']);
		}
		
		$billing		= $_POST['billing'];
		$shipping		= $_POST['shipping'];
		$shippingmethod	= $_POST['shippingMethod'];
		$payment		= $_POST['payment'];
		$cart			= $_POST['cart'];
		$product		= $_POST['product'];
		
		if (!empty($billing['uid'])) {
			$DB->query("SELECT CustomerID FROM Customers WHERE LoginID='".$billing['uid']."'");
			if (is_array($temp = $DB->fetch_row($DB->res))) {
				$uid	= $temp[0];
			} else {
				$uid	= null;
			}
		} else {
			$uid		= null;
		}
		
		//--------------------------------------------------------------------------------
		if($payment['cc_number'])
		{	
			if ($cart['grandtotal'] > 0) {
				$post_url = "https://secure.authorize.net/gateway/transact.dll";
/*	
lemontree
4MCc33rw3
9D9Qj6hdb785H2pW
payment[cc_cid]
*/
				$post_values = array(
					
					"x_login"			=> "4MCc33rw3",//"9y57XurMc",
					"x_tran_key"		=> "9D9Qj6hdb785H2pW",//"342ge6Hqm4Eh59R3",
	
					"x_version"			=> "3.1",
					"x_delim_data"		=> "TRUE",
					"x_delim_char"		=> "|",
					"x_relay_response"	=> "FALSE",
	
					"x_type"			=> "AUTH_CAPTURE",
					"x_method"			=> "CC",
					"x_card_num"		=> $payment['cc_number'],
					"x_exp_date"		=> $payment['cc_exp_month'].substr($payment['cc_exp_year'],-2),
					"x_card_code"		=> $payment['cc_cid'],

					"x_amount"			=> $cart['grandtotal'],
					"x_description"		=> "Lemontree",
	
					"x_first_name"		=> $payment['cc_fname'],
					"x_last_name"		=> $payment['cc_lname'],
					"x_address"			=> addslashes($billing['street'][0]),
					"x_state"			=> $billing['region_id'],
					"x_zip"				=> $shipping['postcode']
					
				);
	
				$post_string = "";
				foreach( $post_values as $key => $value )
					{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
				$post_string = rtrim( $post_string, "& " );
				
				
				// Authorize.net submission
				$request = curl_init($post_url); // initiate curl object
				curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
				curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
				curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
				curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
				$post_response = curl_exec($request); // execute curl post and store results in $post_response
				curl_close ($request); // close curl object
	
				$response_array = explode($post_values["x_delim_char"],$post_response);
			} else {
				$response_array = array(1, "Paid in full with GiftCard - Authorize.net");
			}

		}
	
//--------------------------------------------------------------------------------

		// Authorize.net response
		if ((!empty($response_array) && ($response_array[0]>1)) || (substr($payment['az-status'],0,1)=="F"))
		{
			$result = "Carderror";
		}
		else
		{
			if (!empty($payment['az-status'])) {
				$gateway_response = substr($payment['az-status'],1);
			}
			elseif ($response_array[0]>0) {
				$gateway_response = implode(";", $response_array);
			}
			if (!empty($payment['di-status'])) {
				$gateway_response = 'D';
			}

			 
			// DB Insertion
			if ($billing['checkoutas']=="register") {
				$strSQL 	= "INSERT INTO Customers (
							MailingFirstName,
							MailingLastName,
							MailingCompanyName,
							MailingStreet,
							MailingStreet2,
							MailingCity,
							MailingStateOrProvince,
							MailingZipcode,
							MailingCountry,
							MailingPhone,
							MailingFax,
							LoginID,
							LoginPassword,
							IsActive";
				if ($billing['use_for_shipping'] > 0) {
					$strSQL	.= ", ShippingFirstName,
							ShippingLastName,
							ShippingCompanyName,
							ShippingStreet,
							ShippingStreet2,
							ShippingCity,
							ShippingStateOrProvince,
							ShippingZipcode,
							ShippingCountry,
							ShippingPhone,
							ShippingFax";
				}
				$strSQL		.= ") VALUES (
							'".addslashes($billing['firstname'])."',
							'".addslashes($billing['lastname'])."',
							'".addslashes(trim($billing['company']))."',
							'".addslashes(trim($billing['street'][0]))."',
							'".addslashes($billing['street'][1])."',
							'".addslashes($billing['city'])."',
							'".addslashes(trim(($billing['region_id'])?$billing['region_id']:$billing['region']))."',
							'".$billing['postcode']."',
							'".$billing['country_id']."',
							'".$billing['telephone']."',
							'".$billing['fax']."',
							'".$billing['email']."',
							'".$billing['customer_password']."',
							'Y'";
				if ($billing['use_for_shipping'] > 0) {
					$strSQL	.= ", '".addslashes($billing['firstname'])."',
							'".addslashes($billing['lastname'])."',
							'".addslashes($billing['company'])."',
							'".addslashes($billing['street'][0])."',
							'".$billing['street'][1]."',
							'".addslashes($billing['city'])."',
							'".(($billing['region_id'])?$billing['region_id']:$billing['region'])."',
							'".$billing['postcode']."',
							'".$billing['country_id']."',
							'".$billing['telephone']."',
							'".$billing['fax']."'";
				}
				$strSQL		.= ")";
				
				//error_log($strSQL, 0);
			
				$DB->query($strSQL);
				$uid = $DB->get_lastid();
			}
			
			$shippingoption	= explode("|", $shippingmethod['choice']);
			
			if (strpos(trim($shippingoption[1])," ")) {
				$tmp = explode(" ", $shippingoption[1]);
				$shipping_fee = (float)$tmp[0];
			} else {
				$shipping_fee = $shippingoption[1];
			}
			
			$paymentowner=$payment['cc_fname']." ".$payment['cc_lname'];

			$strSQL	= ("INSERT INTO OOrders (
						CustomerID,
						CustomerIP_Address,
						CustomerSessionID,
						MailingFirstName,
						MailingLastName,
						MailingCompanyName,
						MailingStreet,
						MailingStreet2,
						MailingCity,
						MailingStateOrProvince,
						MailingZipcode,
						MailingCountry,
						MailingPhone,
						MailingFax,
						MailingEmailAddress,
						ShippingFirstName,
						ShippingLastName,
						ShippingCompanyName,
						ShippingStreet,
						ShippingStreet2,
						ShippingCity,
						ShippingStateOrProvince,
						ShippingZipcode,
						ShippingCountry,
						ShippingPhone,
						ShippingFax,
						ShippingEmailAddress,
						TotalProductQuantity,
						TotalProductAmount,
						LocalSalesTax,
						VIP_DiscountAmount,
						DiscountAmount,
						Member_DiscountAmount,
						GiftCertificateAmount,
						ShippingCharge,
						TotalOrderAmount,
						PaymentMethod,
						CreditCardName,
						CardHolderName,
						CardNumber,
						CardSecurityCode,
						CardExpireMonth,
						CardExpireYear,
						ShippingMethod,
						Weight_Pounds,
						OrderDateTime,
						TransactionGatewayResponse) VALUES (
						'".$uid."',
						'".$_SERVER['REMOTE_ADDR']."',
						'".$user_session."',
						'".addslashes($billing['firstname'])."',
						'".addslashes($billing['lastname'])."',
						'".addslashes($billing['company'])."',
						'".addslashes($billing['street'][0])."',
						'".addslashes($billing['street'][1])."',
						'".addslashes($billing['city'])."',
						'".(($billing['region_id'])?$billing['region_id']:$billing['region'])."',
						'".$billing['postcode']."',
						'".$billing['country_id']."',
						'".$billing['telephone']."',
						'".$billing['fax']."',
						'".$billing['email']."',
						'".addslashes($shipping['firstname'])."',
						'".addslashes($shipping['lastname'])."',
						'".addslashes($shipping['company'])."',
						'".addslashes($shipping['street'][0])."',
						'".$shipping['street'][1]."',
						'".addslashes($shipping['city'])."',
						'".(($shipping['region_id'])?$shipping['region_id']:$shipping['region'])."',
						'".$shipping['postcode']."',
						'".$shipping['country_id']."',
						'".$shipping['telephone']."',
						'".$shipping['fax']."',
						'".$billing['email']."',
						$total_qty,
						".$cart['subtotal'].",
						'".$cart['tax']."',
						'".$cart['dc_giftcard']."',
						'".$cart['dc_promo']."',
						'".$cart['dc_member']."',
						'".$cart['saving']."',
						".$shipping_fee.",
						".$cart['grandtotal'].",
						'".$payment['method']."',
						'".(($payment['method']=="AZ")?"Paypal Checkout":$payment['cc_type'])."',
						'".addslashes($paymentowner)."',
						'".maskNumbers($payment['cc_number'])."',
						'".$payment['cc_cid']."',
						'".$payment['cc_exp_month']."',
						'".$payment['cc_exp_year']."',
						'".addslashes($shippingoption[0])."',
						".(($shipping['lb_weight']>0)?$shipping['lb_weight']:0).",
						now(),
						'".$gateway_response."'
						)");
			
	//error_log($strSQL, 0);
			$DB->query($strSQL);
			
			$strSQL	= ("INSERT INTO Orders (
						CustomerID,
						CustomerIP_Address,
						CustomerSessionID,
						MailingFirstName,
						MailingLastName,
						MailingCompanyName,
						MailingStreet,
						MailingStreet2,
						MailingCity,
						MailingStateOrProvince,
						MailingZipcode,
						MailingCountry,
						MailingPhone,
						MailingFax,
						MailingEmailAddress,
						ShippingFirstName,
						ShippingLastName,
						ShippingCompanyName,
						ShippingStreet,
						ShippingStreet2,
						ShippingCity,
						ShippingStateOrProvince,
						ShippingZipcode,
						ShippingCountry,
						ShippingPhone,
						ShippingFax,
						ShippingEmailAddress,
						TotalProductQuantity,
						TotalProductAmount,
						LocalSalesTax,
						VIP_DiscountAmount,
						DiscountAmount,
						Member_DiscountAmount,
						GiftCertificateAmount,
						ShippingCharge,
						TotalOrderAmount,
						TotalOOrderAmount,
						PaymentMethod,
						CreditCardName,
						CardHolderName,
						CardNumber,
						CardSecurityCode,
						CardExpireMonth,
						CardExpireYear,
						ShippingMethod,
						Weight_Pounds,
						OrderDateTime,
						TransactionGatewayResponse) VALUES (
						'".$uid."',
						'".$_SERVER['REMOTE_ADDR']."',
						'".$user_session."',
						'".addslashes($billing['firstname'])."',
						'".addslashes($billing['lastname'])."',
						'".addslashes($billing['company'])."',
						'".addslashes($billing['street'][0])."',
						'".addslashes($billing['street'][1])."',
						'".addslashes($billing['city'])."',
						'".(($billing['region_id'])?$billing['region_id']:$billing['region'])."',
						'".$billing['postcode']."',
						'".$billing['country_id']."',
						'".$billing['telephone']."',
						'".$billing['fax']."',
						'".$billing['email']."',
						'".addslashes($shipping['firstname'])."',
						'".addslashes($shipping['lastname'])."',
						'".addslashes($shipping['company'])."',
						'".addslashes($shipping['street'][0])."',
						'".$shipping['street'][1]."',
						'".addslashes($shipping['city'])."',
						'".(($shipping['region_id'])?$shipping['region_id']:$shipping['region'])."',
						'".$shipping['postcode']."',
						'".$shipping['country_id']."',
						'".$shipping['telephone']."',
						'".$shipping['fax']."',
						'".$billing['email']."',
						$total_qty,
						".$cart['subtotal'].",
						'".$cart['tax']."',
						'".$cart['dc_giftcard']."',
						'".$cart['dc_promo']."',
						'".$cart['dc_member']."',
						'".$cart['saving']."',
						".$shipping_fee.",
						".$cart['grandtotal'].",
						".$cart['grandtotal'].",
						'".$payment['method']."',
						'".(($payment['method']=="AZ")?"Paypal Checkout":$payment['cc_type'])."',
						'".addslashes($paymentowner)."',
						'".maskNumbers($payment['cc_number'])."',
						'".$payment['cc_cid']."',
						'".$payment['cc_exp_month']."',
						'".$payment['cc_exp_year']."',
						'".addslashes($shippingoption[0])."',
						".(($shipping['lb_weight']>0)?$shipping['lb_weight']:0).",
						now(),
						'".$gateway_response."'
						)");
			
	//error_log($strSQL, 0);
/*	$result=$strSQL;
echo $result;
exit;

if($result==0)
{*/
			$DB->query($strSQL);
			

			$order_id 	= $DB->get_lastid();
			$dc			= 1;
			if (!empty($_COOKIE['VIP']['ratio'])) {
				$dc		= 1 - (int) $_COOKIE['VIP']['ratio'] / 100;
			}
			

			for ($i = 0; $i < count($product['id']); $i++) {
				
				$pid = $product['id'][$i];
			
				$DB->query("SELECT Cat1ID, ProductName, StyleNo, UnitPriceOnSale, QuantityDiscountID FROM Products WHERE ProductID=".$pid);
				list($cat1id, $prod_name, $style_no, $unit_price,  $qtydc_price) = $DB->fetch_row($DB->res);
				
				/*  Wrong discount calculation ... (commentized and '$unit_price' replaced with 'bulk_unit_price' by Michael on 5/23/13)
				if($qtydc_price>0)
				{
					$strSQL2="SELECT DiscountPercentage1 FROM NewQuantityDiscounts WHERE QD_ID=".$qtydc_price." and LowerQty<=".$product['qty'][$i]." and UpperQty>=".$product['qty'][$i];
					$DB3 = new myDB;
					$DB3->query($strSQL2);
					$dcqty = $DB3->fetch_array($DB3->res);
					$QTYDC=$dcqty["DiscountPercentage1"];
					$qdc	= 1 - (int) $QTYDC / 100;
					$unit_price *= $qdc;
				}
				*/
				if (!empty($product['bulk_unit_price'][$i])) 	$unit_price = $product['bulk_unit_price'][$i];
				
				
				$giftprice = formatMoney($unit_price, true);
				$unit_price = formatMoney($unit_price * $dc, true);
				$strSQL	= ("INSERT INTO OOrderItems (
						OrderID,
						CustomerID,
						IP_Address,
						SessionID,
						ProductID,
						ProductName,
						StyleNo,
						ListOfSizeNames,
						ListOfColorNames,
						ListOfOrderQuantities,
						TotalQuantity,
						UnitPrice,
						UnitPriceHow,
						TotalAmount,
						Personalization,
						AttachLeagueEmblems,
						IsThisBackOrderItem,
						IsWishList,
						DateTimeSaved,bulkchk) VALUES (
						".$order_id.",
						'".$uid."',
						'".$_SERVER['REMOTE_ADDR']."',
						'".$user_session."',
						".$pid.",
						'".addslashes($prod_name)."',
						'".$style_no."',
						'".$product['size'][$i]."',
						'".(($product['color'][$i]!="")?$product['color'][$i]:"As Is")."',
						'".$product['qty'][$i]."',
						'".$product['qty'][$i]."',");
				
				if ($product['bulk'][$i]=='N') {
					if (!empty($product['persona_fee'][$pid])) {
						$strSQL .= ($unit_price + $product['persona_fee'][$pid]).",";
						$strSQL .= "'Unit Price = Sale Unit Price ($".$unit_price.") + Fee for ironing personal name and number ($".$product['persona_fee'][$pid].") = $".($unit_price + $product['persona_fee'][$pid])."',";
						$strSQL .= ($unit_price + $product['persona_fee'][$pid]) * $product['qty'][$i] . ", ";
						$strSQL .= "'".$product['persona_data'][$pid]."', ";
						$strSQL .= "'N', ";
					} elseif (!empty($product['emblem'][$pid])) {
						$strSQL .= ($unit_price + $product['emblem_fee'][$pid]).",";
						$strSQL .= "'Unit Price = Sale Unit Price ($".$unit_price.") + Fee for emblem attachment ($".$product['emblem_fee'][$pid].") = $".($unit_price + $product['emblem_fee'][$pid])."',";
						$strSQL .= ($unit_price + $product['emblem_fee'][$pid]) * $product['qty'][$i] . ", ";
						$strSQL .= "'', ";
						$strSQL .= "'Y', ";
					} else {
						$strSQL .= $unit_price.",";
						$strSQL .= "'', ".($unit_price * $product['qty'][$i]).", ";
						$strSQL .= "'', ";
						$strSQL .= "'N', ";
					}
				} else {
					if (!empty($product['persona_fee'][$pid])) {
						$strSQL .= ($unit_price + $product['persona_fee'][$pid]).",";
						$strSQL .= "'Unit Price = Sale Unit Price ($".$unit_price.") + Fee for ironing personal name and number ($".$product['persona_fee'][$pid].") = $".($unit_price + $product['persona_fee'][$pid])."',";
						$strSQL .= ($unit_price + $product['persona_fee'][$pid]) * $product['qty'][$i] . ", ";
						$strSQL .= "'".$product['persona_data'][$pid]."', ";
						$strSQL .= "'N', ";
					} elseif (!empty($product['emblem'][$pid])) {
						$strSQL .= ($unit_price + $product['emblem_fee'][$pid]).",";
						$strSQL .= "'Unit Price = Sale Unit Price ($".$unit_price.") + Fee for emblem attachment ($".$product['emblem_fee'][$pid].") = $".($unit_price + $product['emblem_fee'][$pid])."',";
						$strSQL .= ($unit_price + $product['emblem_fee'][$pid]) * $product['qty'][$i] . ", ";
						$strSQL .= "'', ";
						$strSQL .= "'Y', ";
					} else {
						$strSQL .= $unit_price.",";
						$strSQL .= "'', ".($unit_price * $product['qty'][$i]).", ";
						$strSQL .= "'', ";
						$strSQL .= "'N', ";
					}
				}
				
				$strSQL .= ("
						'N',
						'N',
						now(),
						'".$product['bulk'][$i]."'
						)");
/*
$result=$strSQL;
echo $result;
exit;
*/
				
				$DB->query($strSQL);
//-----------------------------------------------------------------------------------------------
				$strSQL	= ("INSERT INTO OrderItems (
						OrderID,
						CustomerID,
						IP_Address,
						SessionID,
						ProductID,
						ProductName,
						StyleNo,
						ListOfSizeNames,
						ListOfColorNames,
						ListOfOrderQuantities,
						TotalQuantity,
						UnitPrice,
						UnitPriceHow,
						TotalAmount,
						Personalization,
						AttachLeagueEmblems,
						IsThisBackOrderItem,
						IsWishList,
						DateTimeSaved,bulkchk) VALUES (
						".$order_id.",
						'".$uid."',
						'".$_SERVER['REMOTE_ADDR']."',
						'".$user_session."',
						".$pid.",
						'".addslashes($prod_name)."',
						'".$style_no."',
						'".$product['size'][$i]."',
						'".(($product['color'][$i]!="")?$product['color'][$i]:"As Is")."',
						'".$product['qty'][$i]."',
						'".$product['qty'][$i]."',");
				
				if ($product['bulk'][$i]=='N') {
					if (!empty($product['persona_fee'][$pid])) {
						$strSQL .= ($unit_price + $product['persona_fee'][$pid]).",";
						$strSQL .= "'Unit Price = Sale Unit Price ($".$unit_price.") + Fee for ironing personal name and number ($".$product['persona_fee'][$pid].") = $".($unit_price + $product['persona_fee'][$pid])."',";
						$strSQL .= ($unit_price + $product['persona_fee'][$pid]) * $product['qty'][$i] . ", ";
						$strSQL .= "'".$product['persona_data'][$pid]."', ";
						$strSQL .= "'N', ";
					} elseif (!empty($product['emblem'][$pid])) {
						$strSQL .= ($unit_price + $product['emblem_fee'][$pid]).",";
						$strSQL .= "'Unit Price = Sale Unit Price ($".$unit_price.") + Fee for emblem attachment ($".$product['emblem_fee'][$pid].") = $".($unit_price + $product['emblem_fee'][$pid])."',";
						$strSQL .= ($unit_price + $product['emblem_fee'][$pid]) * $product['qty'][$i] . ", ";
						$strSQL .= "'', ";
						$strSQL .= "'Y', ";
					} else {
						$strSQL .= $unit_price.",";
						$strSQL .= "'', ".($unit_price * $product['qty'][$i]).", ";
						$strSQL .= "'', ";
						$strSQL .= "'N', ";
					}
				} else {
					if (!empty($product['persona_fee'][$pid])) {
						$strSQL .= ($unit_price + $product['persona_fee'][$pid]).",";
						$strSQL .= "'Unit Price = Sale Unit Price ($".$unit_price.") + Fee for ironing personal name and number ($".$product['persona_fee'][$pid].") = $".($unit_price + $product['persona_fee'][$pid])."',";
						$strSQL .= ($unit_price + $product['persona_fee'][$pid]) * $product['qty'][$i] . ", ";
						$strSQL .= "'".$product['persona_data'][$pid]."', ";
						$strSQL .= "'N', ";
					} elseif (!empty($product['emblem'][$pid])) {
						$strSQL .= ($unit_price + $product['emblem_fee'][$pid]).",";
						$strSQL .= "'Unit Price = Sale Unit Price ($".$unit_price.") + Fee for emblem attachment ($".$product['emblem_fee'][$pid].") = $".($unit_price + $product['emblem_fee'][$pid])."',";
						$strSQL .= ($unit_price + $product['emblem_fee'][$pid]) * $product['qty'][$i] . ", ";
						$strSQL .= "'', ";
						$strSQL .= "'Y', ";
					} else {
						$strSQL .= $unit_price.",";
						$strSQL .= "'', ".($unit_price * $product['qty'][$i]).", ";
						$strSQL .= "'', ";
						$strSQL .= "'N', ";
					}
				}
				
				$strSQL .= ("
						'N',
						'N',
						now(),
						'".$product['bulk'][$i]."'
						)");
				
				$DB->query($strSQL);
				
//------------------------------------------------------------------------------------------------				
				$giname =substr($prod_name,0,4);
				
				if ( $cat1id==57 and $giname=='Gift')
				{
					$acode= getGiftcertCode();
					$fr_date=date('Y-m-d H:i:s',strtotime('+180 days'));
					$GstrSQL	= ("INSERT INTO GiftCertificates (
						GiftAuthorizationCode,
						GiftAmount,
						GiftAmountRemaining,
						GiftOrderID,
						ProductID,
						GiftCustomerID,
						GiftCustomerIP_Address,
						GiftExpiryDate,
						GiftCustomerSessionID,
						IsActive,
						DateTimeIssued) VALUES (
						'".$acode."',
						".$giftprice.",
						".$giftprice.",
						'".$order_id."',
						".$product['id'][$i].",
						'".$uid."',
						'".$_SERVER['REMOTE_ADDR']."',
						'".$fr_date."',
						'".$user_session."',
						'N',
						now())");
					$DB->query($GstrSQL);	
						
				}
				//error_log($strSQL, 0);
			} // end for		
			
			// Gift Certificate balance update
			if ($payment['giftcard'] && $cart['dc_giftcard']) {
				$DB->query("
						UPDATE GiftCertificates SET 
						GiftAmountRemaining	= GiftAmountRemaining-".$cart['dc_giftcard'].",
						GiftAmountLastUsed = '".$cart['dc_giftcard']."',
						GiftUsedOrderID = '".$order_id."',
						GiftUsedCustomerIP_Address = '".$_SERVER['REMOTE_ADDR']."',
						GiftUsedDateTime = now()
						WHERE GiftAuthorizationCode='".trim($payment['giftcard'])."'
						");
			}
			
			// When order placed successfully
			unset($_SESSION['cart']);
			unset($_SESSION['personalized']);
			unset($_SESSION['emblem']);
			$_SESSION[$user_session] = $order_id;
			
			$result = $user_session;		
			
		}
//}		
		echo $result;

		break;
		
	case "billing_save":
		$billing		= $_POST['billing'];
		$state			= (!empty($billing['region_id']))?$billing['region_id']:$billing['region'];
		$strSQL 		= "INSERT INTO Customers (
							MailingFirstName,
							MailingLastName,
							MailingCompanyName,
							MailingStreet,
							MailingStreet2,
							MailingCity,
							MailingStateOrProvince,
							MailingZipcode,
							MailingCountry,
							MailingPhone,
							MailingFax,
							LoginID,
							LoginPassword,
							IsActive";
		if ($billing['use_for_shipping'] > 0) {
			$strSQL		.= ", ShippingFirstName,
							ShippingLastName,
							ShippingCompanyName,
							ShippingStreet,
							ShippingStreet2,
							ShippingCity,
							ShippingStateOrProvince,
							ShippingZipcode,
							ShippingCountry,
							ShippingPhone,
							ShippingFax";
		}
		$strSQL			.= ") VALUES (
							'".$billing['firstname']."',
							'".$billing['lastname']."',
							'".$billing['company']."',
							'".$billing['street'][0]."',
							'".$billing['street'][1]."',
							'".$billing['city']."',
							'".$state."',
							'".$billing['postcode']."',
							'".$billing['country_id']."',
							'".$billing['telephone']."',
							'".$billing['fax']."',
							'".$billing['email']."',
							'".$billing['customer_password']."',
							'Y'";
		if ($billing['use_for_shipping'] > 0) {
			$strSQL		.= ", '".$billing['firstname']."',
							'".$billing['lastname']."',
							'".$billing['company']."',
							'".$billing['street'][0]."',
							'".$billing['street'][1]."',
							'".$billing['city']."',
							'".$state."',
							'".$billing['postcode']."',
							'".$billing['country_id']."',
							'".$billing['telephone']."',
							'".$billing['fax']."'";
		}
		$strSQL				.= ")";
		
		$DB->query($strSQL);
		
		echo $DB->get_lastid();
		break;
		
	case "shipping_save":
		$shipping		= $_POST['shipping'];
		$state			= (!empty($shipping['region_id']))?$shipping['region_id']:$shipping['region'];
		$strSQL 		= "UPDATE Customers SET
							ShippingFirstName = '".$shipping['firstname']."',
							ShippingLastName = '".$shipping['lastname']."',
							ShippingCompanyName = '".$shipping['company']."',
							ShippingStreet = '".$shipping['street'][0]."',
							ShippingStreet2 = '".$shipping['street'][1]."',
							ShippingCity = '".$shipping['city']."',
							ShippingStateOrProvince = '".$state."',
							ShippingZipcode = '".$shipping['postcode']."',
							ShippingCountry = '".$shipping['country_id']."',
							ShippingPhone = '".$shipping['telephone']."',
							ShippingFax = '".$shipping['fax']."'
							WHERE CustomerID = ".$shipping['address_id'];		
		$DB->query($strSQL);
		
		echo "1";
		break;
		
	case "shipping_method_save":
		$shippingMethod	= $_POST['shippingMethod'];
		echo "1";
		break;
		
}


?>