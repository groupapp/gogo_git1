<?php 

	switch ($arrGet[0][1]) {
		
		case "thankyou":
			$title 		= "<span>Thank You</span> for your order.";
			$subttl		= "Your order has been submitted successfully!";
			$inv_title	= "Order Summary";
			break;
			
		case "sorry":
			$title 		= "<span>We are</span> sorry...";
			$subttl		= "We couldn't submit your order due to an error.";
			break;
		case "carderror":
			$title 		= "<span>We are</span> sorry...";
			$subttl		= "We couldn't submit your order due to the following error:";
			break;	
		case "newmember":
			$title 		= "<span>Thank You</span> for registering with us";
			$subttl		= "Thank for new member.";
			break;		
			
	}

    
?>
					<div class="container">
						<div class="cart">
							<div class="page-title">
								<h1><?php echo $title?></h1>
							</div>
							<div class="round-cart">
							
								<table id="shopping-cart-table" class="cart-table">
									<colgroup><col></colgroup>
									<tfoot>
										<tr class="last">
											<td class="a-right last">
												<button type="button" title="Continue Shopping" class="button btn-continue" onclick="setLocation('<?php echo SITE_URL?>')">
													<span>Continue Shopping</span>
												</button>
											</td>
										</tr>
									</tfoot>
									<tbody>
										<tr class="first odd">
											<td align="center">
												<br />
												<h2 class="cart-product-name"><?php echo $subttl?></h2>
												<br />
												<br />
<?php 
	if ($arrGet[0][1] == "thankyou" && $_GET['oid']) {
		$DB = new myDB;
		$order_id	= (!empty($_SESSION[$_GET['oid']]))?$_SESSION[$_GET['oid']]:0;
		if ($order_id > 0) {
			$DB->query("SELECT * FROM Orders WHERE OrderID=".$order_id);
			$data = $DB->fetch_array($DB->res);
			/* 060513 Jayeon Lee */
	//		$strSQL = "SELECT O.*, P.Picture1, P.FeeForPersonalization as persona_fee,P.QuantityDiscountID as DCqty FROM OrderItems O LEFT JOIN Products P ON O.ProductID=P.ProductID WHERE O.OrderID=".$order_id;
			$strSQL = "SELECT O.*, P.*, P.FeeForPersonalization as persona_fee,P.QuantityDiscountID as DCqty FROM OrderItems O LEFT JOIN Products P ON O.ProductID=P.ProductID WHERE O.OrderID=".$order_id;
			$DB->query($strSQL);

			if ($DB->rows > 0) {
				$tr_css = array("even", "odd");
				$n 		= 1;
				$cnt 	= 0;
?>
												<div id="checkout-review-table-wrapper">
												
													<div class="inv-title-box left">
														<h2><span><?php echo $inv_title?></span></h2>
													</div>
													<div class="inv-num-box right">
														<ol>
															<li>Transaction Date : <?php echo $data['OrderDateTime']?></li>
														</ol>
													</div>
													
													<p class="clear"></p>
													<div class="inv-address-box left">
														<dl>
															<dt>Billing Information</dt>
															<dd>
																<address>
<?php
				echo 	strtoupper($data['MailingFirstName'] . " " . $data['MailingLastName']) . "<br />";
						if($data['MailingCompanyName']!=null){
							echo strtoupper($data['MailingCompanyName']) . "<br />";
						}
				echo 	strtoupper($data['MailingStreet'] . " " . $data['MailingStreet2'] . "<br />"
						. $data['MailingCity'] . ", " . $data['MailingStateOrProvince'] . " " . $data['MailingZipcode'] . "<br />"
						. (($data['MailingCountry']!="US"&&$data['MailingCountry']!="USA")?$data['MailingCountry']:null)
						);	
?>
																</address>
															</dd>
														</dl>
													</div>
													
													<div class="inv-address-box right">
														<dl>
															<dt>Shipping Information</dt>
															<dd>
																<address>
<?php
				echo 	strtoupper($data['ShippingFirstName'] . " " . $data['ShippingLastName']) . "<br />";
						if($data['ShippingCompanyName']!=null){
							echo strtoupper($data['ShippingCompanyName']) . "<br />";
						}
				echo 	strtoupper($data['ShippingStreet'] . " " . $data['ShippingStreet2'] . "<br />"
						. $data['ShippingCity'] . ", " . $data['ShippingStateOrProvince'] . " " . $data['ShippingZipcode'] . "<br />"
						. (($data['ShippingCountry']!="US"&&$data['ShippingCountry']!="USA")?$data['ShippingCountry']:null)
						);
?>
																</address>
															</dd>
														</dl>
													</div>
													<p class="clear"></p>
													
													<div class="inv-ext1-box">
														<dl>
														<div>
															<dt>Shipping Method</dt>
															<dd><?php echo strpos($data['ShippingMethod'],"<br>") ? substr($data['ShippingMethod'],0,strpos($data['ShippingMethod'],"<br>")) : $data['ShippingMethod']?></dd>
														</div>
														<div>
															<dt>Pay Method</dt>
															<dd>
<?php
				
				if($data['PaymentMethod']=="PHONE")
				echo "PHONE";
				else
				{
					echo strtoupper($data['CreditCardName']);
					echo ($data['PaymentMethod']!="AZ")?" ending with ".substr($data['CardNumber'],-4,4):null;
				}

?>
															</dd>
														</div>
														</dl>
													</div>
													<div class="inv-ext2-box">
														<dl>
														<div>
															<dt>Order Status</dt>
															<dd>Submitted</dd>
														</div>
														<div>
															<dt>Tracking NO</dt>
															<dd>N/A</dd>
														</div>
														<div>
															<dt>Order Number</dt>
															<dd><?php echo $data['OrderID']?></dd>
														</div>
														</dl>
													</div>
													<p class="clear"></p>
												    <table class="data-table" id="checkout-review-table">
												        <colgroup>
												        <col width="1">
												        <col>
												        <col width="1">
												        <col width="1">
												        <col width="1">
												        <col width="1">
												        </colgroup>
												        <thead>
												            <tr class="first last">
												            	<th></th>
												                <th>Product Name</th>
												                <th class="a-center">Size(Pack)</th>
												                <th class="a-center">Price</th>
												                <th class="a-center">Qty</th>
												                <th class="a-center">Subtotal</th>
												            </tr>
												        </thead>
												        <tbody>
<?php 
				$dc		= 1;
				if (!empty($_COOKIE['VIP']['ratio'])) {
					$dc	= 1 - (int) $_COOKIE['VIP']['ratio'] / 100;
				}
				while ($rs = $DB->fetch_array($DB->res)) {
					$persona_fee 	= (!empty($rs['Personalization'])) ? formatMoney($rs['FeeForPersonalization'] * $dc, true) : null;
					$emblem_fee		= ($rs['AttachLeagueEmblems'] == 'Y') ? formatMoney($rs['FeeForAttachingEmblems'] * $dc, true) : null;
					
					$prod_price	= $rs['UnitPriceOnSale'];
					$line_total	= ($prod_price + $persona_fee + $emblem_fee) * $rs['TotalQuantity'];
					
					/* not needed; commentized by Michael on 5/23/13
					if($rs['DCqty']>0)
					{
						
						$strSQL2="SELECT DiscountPercentage1 FROM NewQuantityDiscounts WHERE QD_ID=".$rs['DCqty']." and LowerQty<=".$data['TotalProductQuantity']." and UpperQty>=".$data['TotalProductQuantity'];
						
						$DB3 = new myDB;
						$DB3->query($strSQL2);
						$dcqty = $DB3->fetch_array($DB3->res);
						$QTYDC=$dcqty["DiscountPercentage1"];
						
						$qdc	= 1 - (int) $QTYDC / 100;
						$prod_price*= $qdc;
					$line_total = $prod_price * $rs['TotalQuantity'];
					}
					else
					{
					$line_total = $rs['UnitPrice'] * $rs['TotalQuantity'];
					
					}
					*/
					$itemPic = new myDB;
					$itemPicSQL = "SELECT imageno FROM ProductColors WHERE ProductID = ".$rs["ProductID"]." && Color = '".$rs["ListOfColorNames"]."'";
					$itemPic->query($itemPicSQL);
					$picdata = $itemPic->fetch_array($itemPic->res);
		//			echo $itemPicSQL."<br/>";
					if($picdata['imageno'] != null){
						$imgNum = $picdata['imageno'];
					}else{
						$imgNum = 1;
					}
					
		//			echo $imgNum."<br/>";
?>										        
													        	<tr class="<?php echo ($cnt<1)?"first":null?> <?php echo $tr_css[$n]?>">
													        		<td><img src="<?php echo PRODUCT_IMAGE_PATH.$rs["Picture".$imgNum]?>" width="60" height="60" /></td>
													    			<td width="50%"><h3><?php echo $rs['ProductName']?></h3>
													                	<dl class="item-options">
<?php 
					if (!empty($rs['Personalization'])) {
						$arrtemp = explode(",", $rs['Personalization']);
						echo "<div class=\"cart-product-options\">";
						if($rs['bulkchk']!="Y")
						{
							echo "<dt><span class=\"cart-price\">Personalization: $".$persona_fee." added</span></dt>";
						}
							echo "<dd><span>&bull; Name: <em>&quot;{$arrtemp[0]}&quot;</em></dd>";
						if($rs['bulkchk']=="Y")
						{
							echo "<dd><span>&bull; Big Number: <em>&quot;{$arrtemp[1]}&quot;</em></dd>";
							echo "<dd><span>&bull; Small Number: <em>&quot;{$arrtemp[2]}&quot;</em></dd>";
							echo "<dd><span>&bull; Number on Short: <em>&quot;{$arrtemp[3]}&quot;</em></dd>";
						}
						else
							echo "<dd><span>&bull; Number: <em>&quot;{$arrtemp[1]}&quot;</em></dd>";
						
						echo "</div>";
					} elseif ($emblem_fee) {
						echo "<dt><span class=\"cart-price\">Emblem attachment: $".$emblem_fee." added</span></dt>";
					}
?>
												                		<div class="cart-product-options">
												                			<dd><span>Color: <?php echo $rs['ListOfColorNames']?></span></dd>
												                			<dd>Style No.: <?php echo $rs['StyleNo']?></dd>
												                		</div>
													                    </dl>
													                </td>
													                <td class="a-right">
													                    <span class="cart-price"><?php echo $rs['ListOfSizeNames'];?></span>            
																	</td>
													        		<td class="a-right">
																		<span class="cart-price">$<?php echo formatMoney($prod_price,2)?></span>
																	</td>
													            	<td class="a-center"><?php echo $rs['ListOfOrderQuantities'];?></td>
													        		<td class="a-right last">
													                    <span class="cart-price">$<?php echo formatMoney($line_total,2)?></span>
													            	</td>
													        	</tr>
<?php
					$cnt++;
					$n = 1 - $n;
					$subtotal += $line_total;
				}
?>  
								  	
												        </tbody>
												        <tfoot>
												        	<tr class="first">
												    			<td style="" class="a-right" colspan="4">Subtotal</td>
												    			<td style="" class="a-right last" colspan="2"><span class="price" id="my-subtotal">$<?php echo $data['TotalProductAmount']?></span></td>
															</tr>
															<tr>
															    <td style="" class="a-right" colspan="4">Local Tax </td>
															    <td style="" class="a-right last" colspan="2"><span class="price" id="my-tax">$<?php echo $data['LocalSalesTax']?></span></td>
															</tr>
															<tr>
															    <td style="" class="a-right" colspan="4">Shipping &amp; Handling <?php echo ($data['ShippingMethod']!="")?" - ".$data['ShippingMethod']:null?></td>
															    <td style="" class="a-right last" colspan="2"><span class="price" id="my-shipping">$<?php echo $data['ShippingCharge']?></span></td>
															</tr>
<?php 
				if ($data['GiftCertificateAmount'] > 0) {
?>
															<tr>
															    <td style="" class="a-right price" colspan="4">Gift Card / Other Discounts Tendered</td>
															    <td style="" class="a-right last" colspan="2"><span class="price" id="my-shipping">- $<?php echo $data['GiftCertificateAmount']?></span></td>
															</tr>
<?php 
				}
?>
												    		<tr class="last">
												    			<td style="" class="a-right" colspan="4"><strong>Grand Total</strong></td>
												    			<td style="" class="a-right" colspan="2"><strong><span class="price" id="my-grandtotal">$<?php echo $data['TotalOrderAmount']?></span></strong></td>
															</tr>
												    	</tfoot>
												    </table>
												    <p class="clear"></p>
												    <br />
												    <h2>Thank you for your business with us!</h2>
												    <br/>
												    <button type="button" title="Print this page" class="button" style="float: right;" onclick="window.print();">
												    	<span>Print this Page</span>
												    </button>
												</div>
<?php
				// Order Confirmation E-mail
				$DB->query("SELECT *FROM Orders WHERE OrderID=$order_id AND ReceiveEmail='N'");
				if ($DB->rows > 0) {
					$subject = 'Lemontreeclothing Order Confirmation';
					$to = $data["MailingEmailAddress"];
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
						<p>Dear '.$data['MailingFirstName'].' '.$data['MailingLastName'].'.</p>
						<p>Thank you for your purchase at Lemontreeclothing.com.</p>
						<p>If you are a registered member, you can view, print and track this order at Lemontreeclothing.com after logging in. If you have questions regarding this order, please contact us via e-mail or phone.</p>
						<p>Thank you so much for shopping with Lemontreeclothing.com.</p>
						<table style="width: 100%;">
							<tr>
								<td style="width: 10%;">
									<h2 style="font-family: Tahoma; font-size: 28px; font-weight: 700; line-height: 1.25; margin-bottom: 7px;">
										<span style="color: #EF0000;">Invoice</span>
									</h2>
								</td>
								<td style="width: 59%;"></td>
								<td style="width: 31%; text-align: right; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
									<span>Transaction Date : '.$data['OrderDateTime'].'</span>
								</td>
							</tr>
						</table>
						<table style="width: 100%; border-collapse: collapse;">
							<tr>
								<td style="width: 250px; border: 1px solid black; background-color: #ECECEC; padding: 10px; font: normal 12px/1.2 Verdana, Geneva, Sans-srif; text-transform: uppercase; margin: 0; text-align: left; color: black;">
									BILLING INFORMATION
								</td>
								<td style="width: 40%;">
								</td>
								<td style="width: 250px; border: 1px solid black; background-color: #ECECEC; padding: 10px; font: normal 12px/1.2 Verdana, Geneva, Sans-srif; text-transform: uppercase; margin: 0; text-align: left; color: black;">
									SHIPPING INFORMATION
								</td>
							</tr>
							<tr>
								<td style="border: 1px solid black; padding: 10px; text-align: left; font: normal 11px/1.4 Verdana, Geneva, Sans-srif;">'
									.$data['MailingFirstName'].' '.$data['MailingLastName'].'<br/>'
									.$data['MailingCompanyName'].'<br/>'
									.$data['MailingStreet'].' '.$data['MailingStreet2'].'<br/>'
									.$data['MailingCity'].' '.$data['MailingStateOrProvince'].'	'.$data['MailingZipcode'].'<br/>'
									.(($data['MailingCountry']!="US"&&$data['MailingCountry']!="USA")?$data['MailingCountry']:null).'
								</td>
								<td></td>
								<td style="border: 1px solid black; padding: 10px; text-align: left; font: normal 11px/1.4 Verdana, Geneva, Sans-srif;">'
									.$data['ShippingFirstName'].' '.$data['ShippingLastName'].'<br/>'
									.$data['ShippingCompanyName'].'<br/>'
									.$data['ShippingStreet'].' '.$data['ShippingStreet2'].'<br/>'
									.$data['ShippingCity'].' '.$data['ShippingStateOrProvince'].'	'.$data['ShippingZipcode'].'<br/>'
									.(($data['ShippingCountry']!="US"&&$data['ShippingCountry']!="USA")?$data['ShippingCountry']:null).'
								</td>
							</tr>
						</table>
						<br/>
						<p style="clear: both; width: 0; height: 0; display: block; overflow: hidden; visibility: hidden;"></p>
						<table style="width: 100%; border-collapse: collapse;">
							<tr>
								<td style="width: 140px; padding: 4px 10px; background-color: #ECECEC; text-align: center; text-transform: uppercase; border: 1px solid black; font: normal 12px/1.2 Verdana, Geneva, Sans-srif; color: black;">
									SHIPPING METHOD
								</td>
								<td style="width: 5px;">
								</td>
								<td style="width: 140px; padding: 4px 10px; background-color: #ECECEC; text-align: center; text-transform: uppercase; border: 1px solid black; font: normal 12px/1.2 Verdana, Geneva, Sans-srif; color: black;">
									PAY METHOD
								</td>
								<td style="width: 5px;">
								</td>
								<td style="width: 140px; padding: 4px 10px; background-color: #ECECEC; text-align: center; text-transform: uppercase; border: 1px solid black; font: normal 12px/1.2 Verdana, Geneva, Sans-srif; color: black;">
									ORDER STATUS
								</td>
								<td style="width: 5px;">
								</td>
								<td style="width: 140px; padding: 4px 10px; background-color: #ECECEC; text-align: center; text-transform: uppercase; border: 1px solid black; font: normal 12px/1.2 Verdana, Geneva, Sans-srif; color: black;">
									TRACKING NO
								</td>
								<td style="width: 5px;">
								</td>
								<td style="width: 140px; padding: 4px 10px; background-color: #ECECEC; text-align: center; text-transform: uppercase; border: 1px solid #ECECEC; border: 1px solid black; font: normal 12px/1.2 Verdana, Geneva, Sans-srif; color: black;">
									ORDER NUMBER
								</td>
							</tr>
							<tr>
								<td style="width: 140px; text-align:center; border: 1px solid black; padding: 4px 10px; font: normal 11px/1.4 Verdana, Geneva, Sans-srif;">
									'.(strpos($data['ShippingMethod'],"<br>") ? substr($data['ShippingMethod'],0,strpos($data['ShippingMethod'],"<br>")) : $data['ShippingMethod']).'
								</td>
								<td style="width: 5px;">
								</td>
								<td style="width: 140px; text-align:center; border: 1px solid black; padding: 4px 10px; font: normal 11px/1.4 Verdana, Geneva, Sans-srif;">';
								if($data['PaymentMethod']=="PHONE")
								$message .="PHONE";
								else
								$message .=	$data['CreditCardName'].' '.(($data['PaymentMethod']!="AZ")?" ending with ".substr($data['CardNumber'],-4,4):null);
								$message .='</td>
								<td style="width: 5px;">
								</td>
								<td style="width: 140px; text-align:center; border: 1px solid black; padding: 4px 10px; font: normal 11px/1.4 Verdana, Geneva, Sans-srif;">
									Submitted
								</td>
								<td style="width: 5px;">
								</td>
								<td style="width: 140px; text-align:center; border: 1px solid black; padding: 4px 10px; font: normal 11px/1.4 Verdana, Geneva, Sans-srif;">
									N/A
								</td>
								<td style="width: 5px;">
								</td>
								<td style="width: 140px; text-align:center; border: 1px solid black; padding: 4px 10px; font: normal 11px/1.4 Verdana, Geneva, Sans-srif;">
									'.$data['OrderID'].'
								</td>
							</tr>
						</table>
						<br/>
						<p style="clear: both; width: 0; height: 0; display: block; overflow: hidden; visibility: hidden; font: normal 11px/1.4 "Courier New", "Courier New", "monospace";"></p>
						<table style="width: 100%; border: 1px solid black; border-collapse: collapse;
						border-spacing: 0; empty-cells: show; font-size: 100%; margin: 0; padding: 0;">
							<thead style="background: none; margin: 0; padding: 0;">
								<tr style="background: none; margin: 0; padding: 0;">
									<td style="padding: 12px 20px 12px 20px; font: bold 12px/1.4 Arial, Helvetica, Sans-serif; border: 1px solid black; line-height: normal;">
									</td>
									<td style="padding: 12px 20px 12px 20px; font: bold 12px/1.4 Arial, Helvetica, Sans-serif; border: 1px solid black; line-height: normal;">
									Product Name
									</td>
									<td style="text-align:center; padding: 12px 20px 12px 20px; font: bold 12px/1.4 Arial, Helvetica, Sans-serif; border: 1px solid black; line-height: normal;">
									Size(Pack)
									</td>
									<td style="text-align:center; padding: 12px 20px 12px 20px; font: bold 12px/1.4 Arial, Helvetica, Sans-serif; border: 1px solid black; line-height: normal;">
									Price
									</td>
									<td style="text-align:center; padding: 12px 20px 12px 20px; font: bold 12px/1.4 Arial, Helvetica, Sans-serif; border: 1px solid black; line-height: normal;">
									Qty
									</td>
									<td style="text-align:center; padding: 12px 20px 12px 20px; font: bold 12px/1.4 Arial, Helvetica, Sans-serif; border: 1px solid black; line-height: normal;">
									Subtotal
									</td>
								</tr>
							</thead>
							<tbody>';
					if ($order_id > 0) {
						/* 060513 Jayeon Lee */
		//				$strSQL = "SELECT O.*, P.Picture1, P.FeeForPersonalization as persona_fee,P.QuantityDiscountID as DCqty FROM OrderItems O LEFT JOIN Products P ON O.ProductID=P.ProductID WHERE O.OrderID=".$order_id;
						$strSQL = "SELECT O.*, P.*, P.FeeForPersonalization as persona_fee,P.QuantityDiscountID as DCqty FROM OrderItems O LEFT JOIN Products P ON O.ProductID=P.ProductID WHERE O.OrderID=".$order_id;
						$DB->query($strSQL);
					
						if ($DB->rows > 0) {
							$tr_css = array("even", "odd");
							$n 		= 1;
							$cnt 	= 0;
							
							while ($rs = $DB->fetch_array($DB->res)) {	
								$persona_fee 	= (!empty($rs['Personalization'])) ? formatMoney($rs['FeeForPersonalization'] * $dc, true) : null;
								$emblem_fee		= ($rs['AttachLeagueEmblems'] == 'Y') ? formatMoney($rs['FeeForAttachingEmblems'] * $dc, true) : null;
							
								$prod_price	= $rs['UnitPriceOnSale'];
								$line_total	= ($prod_price + $persona_fee + $emblem_fee) * $rs['TotalQuantity'];
								
								$itemPicSQL = "SELECT imageno FROM ProductColors WHERE ProductID = ".$rs["ProductID"]." && Color = '".$rs["ListOfColorNames"]."'";
								$itemPic->query($itemPicSQL);
								$picdata = $itemPic->fetch_array($itemPic->res);
								//			echo $itemPicSQL."<br/>";
								if($picdata['imageno'] != null){
									$imgNum = $picdata['imageno'];
								}else{
									$imgNum = 1;
								}
								//$line_total = $rs['UnitPrice'] * $rs['TotalQuantity'];
								$message .= '<tr style="margin: 0; padding: 0;">
									<td style="border: 1px solid black; padding: 16px 20px 14px 20px; vertical-align: middle; line-height: normal; color: black; text-align:center;">
										<img src="'.SITE_URL.PRODUCT_IMAGE_PATH.$rs['Picture'.$imgNum].'" width="60" height="60" style="border: 0; vertical-align: top; margin: 0; padding: 0;">
									</td>
									<td style="padding: 16px 20px 14px 20px; border: 1px solid black; vertical-align: middle; line-height: normal; color: black;">
										<h3 style="margin-bottom: 0; font-size: 12px; color: #2F2F2F; text-transform: uppercase; line-height: 1.25;
										margin: 0; padding: 0; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">'.$rs['ProductName'].'</h3>
										<dl style="margin: 0; padding: 0;">';
								if (!empty($rs['Personalization'])) {
									$arrtemp = explode(",", $rs['Personalization']);
									if($rs['bulkchk']!="Y")
									{
										$message .= '<dt style="float: left; margin-right: 30px; padding-left: 5px; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
													<span>Personalization: $'.$persona_fee.'</span>
												</dt>';
									}
									if($rs['bulkchk']=="Y")
									{			
										$message .= '<dd style="float: left; margin-right: 30px; padding-left: 5px; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
														<span>&bull; Name: <em>&quot;'.$arrtemp[0].'&quot;</em></span>
													</dd>';
										$message .= '<dd style="float: left; margin-right: 30px; padding-left: 5px; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
														<span>&bull; Big No: <em>&quot;'.$arrtemp[1].'&quot;</em></span>
													</dd>';
										$message .= '<dd style="float: left; margin-right: 30px; padding-left: 5px; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
														<span>&bull; Small No: <em>&quot;'.$arrtemp[2].'&quot;</em></span>
													</dd>';
										$message .= '<dd style="float: left; margin-right: 30px; padding-left: 5px; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
													<span>&bull; No on Short: <em>&quot;'.$arrtemp[3].'&quot;</em></span>
													</dd>';
									}
									else
									{			
										$message .= '<dd style="float: left; margin-right: 30px; padding-left: 5px; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
														<span>&bull; Name: <em>&quot;'.$arrtemp[0].'&quot;</em></span>
													</dd>';
										$message .= '<dd style="float: left; margin-right: 30px; padding-left: 5px; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
														<span>&bull; Number: <em>&quot;'.$arrtemp[1].'&quot;</em></span>
													</dd>';
									}
												
								} elseif ($emblem_fee) {
									$message 	.= '<dt style="float: left; margin-right: 30px; padding-left: 5px; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;"><span>Personalization: $'.$emblem_fee.'</span></dt>';
								}
								$message .= '	<dt style="padding-left: 10px; clear: left; margin-right: 30px; padding: 0; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
													<span style="float: left; margin: 0; padding: 0; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
													Color: '.$rs['ListOfColorNames'].'</span>
												</dt>
												<dt style="padding-left: 10px; clear: left; margin-right: 30px; padding: 0; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
													Style No.: '.$rs['StyleNo'].'
												</dt>
											</dl>
											</td>
											<td style="padding: 16px 20px 14px 20px; border: 1px solid black; vertical-align: middle; line-height: normal; color: black;
											text-align: center;  margin: 0; font: normal 12px/1.4 Arial, Helvetica, Sans-serif;">
												<span style="color: #EF0000; font-weight: bold; margin: 0; padding: 0;">'.$rs['ListOfSizeNames'].'</span>            
											</td>
											<td style="padding: 16px 20px 14px 20px; border: 1px solid black; vertical-align: middle; line-height: normal; color: #EF0000;
											text-align: right; font: bold 12px/1.2 Arial, Helvetica, Sans-srif; margin: 0;">
												<span class="cart-price">$'.formatMoney($prod_price,2).'</span>            
											</td>
											<td style="border: 1px solid black; text-align:center; font: bold 12px/1.2 Arial, Helvetica, Sans-srif;">'.$rs['ListOfOrderQuantities'].'</td>
											<td style="border: 1px solid black; text-align: right; padding: 16px 20px 14px 20px;">
												<span style="font: bold 12px/1.2 Arial, Helvetica, Sans-srif; color: #EF0000; margin: 0;">$'.formatMoney($line_total,2).'</span>
											</td>
										</tr>';
								$subtotal += $line_total;
							}
						}
					}
					$message .= '</tbody>
								<tfoot style="margin: 0; padding: 0;">
									<tr style="background: none; margin: 0; padding: 0;">
										<td colspan="4" style="color: black; padding: 16px 20px 14px 20px;
										border: 1px solid black; vertical-align: middle; line-height: normal;
										text-align: right; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">
											Subtotal
										</td>
										<td colspan="2" style="border: 1px solid black; margin: 0; padding: 16px 20px 14px 20px; text-align: right;">
											<span style="color: #EF0000; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">
											$'.$data['TotalProductAmount'].'
											</span>
										</td>
									</tr>
									<tr style="background: none; margin: 0; padding: 0;">
										<td colspan="4" style="color: black; padding: 16px 20px 14px 20px;
										border: 1px solid black; vertical-align: middle; line-height: normal;
										text-align: right; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">
										Local Tax
										</td>
										<td colspan="2" style="border: 1px solid black; margin: 0; padding: 16px 20px 14px 20px; text-align: right;">
											<span style="color: #EF0000; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">
											$'.$data['LocalSalesTax'].'
											</span>
										</td>
									</tr>
									<tr style="background: none; margin: 0; padding: 0;">
										<td colspan="4" style="color: black; padding: 16px 20px 14px 20px;
										border: 1px solid black; vertical-align: middle; line-height: normal;
										text-align: right; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">
										Shipping & Handling  '.(($data['ShippingMethod']!="")?" - ".$data['ShippingMethod']:null).'
										</td>
										<td colspan="2" style="border: 1px solid black; margin: 0; padding: 16px 20px 14px 20px; text-align: right;">
											<span style="color: #EF0000; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">
											$'.$data['ShippingCharge'].'
											</span>
										</td>
									</tr>';
					if ($data['GiftCertificateAmount'] > 0) {
						$message .= '<tr style="background: none; margin: 0; padding: 0;">
									    <td colspan="4" style="color: black; padding: 16px 20px 14px 20px;
										border: 1px solid black; vertical-align: middle; line-height: normal;
										text-align: right; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">Gift Card / Other Discounts Tendered</td>
									    <td colspan="2" style="border: 1px solid black; margin: 0; padding: 16px 20px 14px 20px; text-align: right;">
											<span style="color: #EF0000; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">- $'.$data['GiftCertificateAmount'].'
											</span>
										</td>
									</tr>';
					}				
					$message .= 	'<tr style="background: none; margin: 0; padding: 0;">
										<td colspan="4" style="color: black; padding: 16px 20px 14px 20px;
										border: 1px solid black; vertical-align: middle; line-height: normal;
										text-align: right; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">
										Grand Total
										</td>
										<td colspan="2" style="border: 1px solid black; margin: 0; padding: 16px 20px 14px 20px; text-align: right;">
											<span style="color: #EF0000; font: bold 12px/1.4 Arial, Helvetica, Sans-serif;">
											$'.$data['TotalOrderAmount'].'
											</span>
										</td>
									</tr>
								</tfoot>
							</table>
							<br/>
							<p><a href="http://www.lemontreeclothing.com">http://www.lemontreeclothing.com</a><br />
							<br />
							Los Angeles, CA 90004<br />
							USA<br />
							Tel:<br />
							Fax: </p>
							<p>Please read the <a href="http://www.lemontreeclothing.com/USPS_ActualDeliveryTimes.asp">Actual Delivery Times by USPS</a></p>
						</body>
						</html>';
				
						// To send HTML mail, the Content-type header must be set
						$headers  = 'MIME-Version: 1.0' . "\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
						
						// Additional headers
						//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
						$headers .= 'From: lemontreeclothing <info@lemontreeclothing.com>' . "\n";
						//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
						//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
						
						// Mail it
						mail($to, $subject, $message, $headers);
						$DB->query("UPDATE Orders SET ReceiveEmail='Y' WHERE OrderID=$order_id");
					}
				} else {
					echo "No ordered items found.";
				}
//				unset($_SESSION[$_GET['oid']]);
			}
		}
		elseif ($arrGet[0][1] == "carderror") {
		
			echo "Your credit card transaction has been declined.";
		
		} 
		elseif ($arrGet[0][1] == "newmember") {
			$subject = 'Congratulations! Your are a registered member, now!';
			$to=$_COOKIE["userID"];
			$message = '
<html>
  	<p><img src="http://lemontreeclothing.com/images/header_back.png" ></p>
	<p>Congratulations! You are a registered member of Lemontreeclothing, now!</p>
  	<p>You may now log in with the following credentials:</p><br /><br />
	<ul><li>Web site : <a href="http://lemontreeclothing.com">http://www.lemontreeclothing.com</a><li>
	<li>Login ID : <b>'.$to.'</b></li></ul><br /><br />
	<p style="color:blue;"><a href="http://lemontreeclothing.com">Click here to go to lemontreeclothing.com.</a></p>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: lemontreeclothing <info@lemontreeclothing.com>' . "\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);


	?>
		
		<div class="sub1">
			<p class="p_general" style="color: dimGray;">You will shortly receive an email correspondence from us. If not please check your spam or junkmail folder and add info@lemontreeclothing.com to your address book or safe list.</p>
			<br/>
			<p class="p_general" style="color: dimGray;">We look forward to serving you and your friends!</p>
		</div>
		
<?php	
	}
	else {
		
		echo "We can't find your order. Please contact our customer service for further assistance.";
		
	}
?>	
												<p>&nbsp;</p>
												<p>&nbsp;</p>											
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>