<?php 
include_once dirname(__FILE__) . "/../include/function.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Order Details</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/css/style_print.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
		<script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
		<script type="text/javascript" src="/js/script.js"></script>
	</head>
	<body style="background: #fff;">
			<div class="main-container col-layout">
				<div class="main">
					<div class="main-col">
						<div class="cart">
							<div class="round-cart">
							
								<table id="shopping-cart-table" class="cart-table" style="width: 900px;">
									<tbody>
										<tr class="first odd">
											<td>											
												<br />
<?php 
	if ($_GET['orderid']) {
		$DB = new myDB;
		$order_id	= $_GET['orderid'];

		$DB->query("SELECT * FROM Orders WHERE OrderID=".$order_id);
		$data = $DB->fetch_array($DB->res);
		$strSQL = "SELECT O.*, P.Picture1, P.FeeForPersonalization as persona_fee FROM OrderItems O LEFT JOIN Products P ON O.ProductID=P.ProductID WHERE O.OrderID=".$order_id;
		$DB->query($strSQL);
		
		if ($DB->rows > 0) {
			$tr_css = array("even", "odd");
			$n 		= 1;
			$cnt 	= 0;
?>
												<div id="checkout-review-table-wrapper">
												
													<div class="inv-title-box left">
														<h2><span>Invoice</span></h2>
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
			echo	strtoupper($data['MailingStreet'] . " " . $data['MailingStreet2'] . "<br />"
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
			echo	strtoupper($data['ShippingStreet'] . " " . $data['ShippingStreet2'] . "<br />"
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
															<dd><?php echo $data['ShippingMethod']?></dd>
														</div>
														<div>
															<dt>Pay Method</dt>
															<dd>
<?php
			echo strtoupper($data['CreditCardName']);
			echo ($data['PaymentMethod']!="AZ")?" ending with ".substr($data['CardNumber'],-4,4):null;
?>
															</dd>
														</div>
														</dl>
													</div>
													<div class="inv-ext2-box">
														<dl>
														<div>
															<dt>Order Status</dt>
															<dd><?php 
																if($data["OrderConfirmed"]=="N" && $data["ShippingConfirmed"]=="N" && $data["OrderCancelled"]=="N"){
																	echo "Submitted";
																}elseif($data["OrderConfirmed"]=="Y" && $data["ShippingConfirmed"]=="N" && $data["OrderCancelled"]=="N"){
																	echo "Order Confirmed";
																}elseif($data["OrderConfirmed"]=="Y" && $data["ShippingConfirmed"]=="Y" && $data["OrderCancelled"]=="N"){
																	echo "Shipping Confirmed";
																}elseif($data["OrderCancelled"]=="Y"){
																	echo "Order Cancelled";
																}
															?></dd>
														</div>
														<div>
															<dt>Tracking Number</dt>
															<dd><?php 
																if($data["ShippingTrackingNo"]!=null){
																	echo $data["ShippingTrackingNo"];
																}else{
																	echo "N/A";
																}?>
															</dd>
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
												                <th class="a-center">Size</th>
												                <th class="a-center">Price</th>
												                <th class="a-center">Qty</th>
												                <th class="a-center">Subtotal</th>
												            </tr>
												        </thead>
												        <tbody>
<?php 
			while ($rs = $DB->fetch_array($DB->res)) {
	
				$line_total = $rs['UnitPrice'] * $rs['TotalQuantity'];
?>										        
												        	<tr class="<?php echo ($cnt<1)?"first":null?> <?php echo $tr_css[$n]?>">
												        		<td><img src="<?php echo PRODUCT_IMAGE_PATH.$rs['Picture1']?>" width="60" height="60" /></td>
												    			<td><h3><?php echo $rs['ProductName']?></h3>
												                	<dl class="item-options">
<?php 
				if (!empty($rs['Personalization'])) {
					$arrtemp = explode(",", $rs['Personalization']);
					echo "<div class=\"cart-product-options\">";
					echo "<dt><span class=\"cart-price\">Personalization: $".$rs['persona_fee']." added</span></dt>";
					echo "<dd><span>&bull; Name: <em>&quot;{$arrtemp[0]}&quot;</em></dd>";
					echo "<dd><span>&bull; Number: <em>&quot;{$arrtemp[1]}&quot;</em></dd>";
					echo "</div>";
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
												                    <span class="cart-price">$<?php echo formatMoney($rs['UnitPrice'],2)?></span>            
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
												    		<tr class="last">
												    			<td style="" class="a-right" colspan="4"><strong>Grand Total</strong></td>
												    			<td style="" class="a-right" colspan="2"><strong><span class="price" id="my-grandtotal">$<?php echo $data['TotalOrderAmount']?></span></strong></td>
															</tr>
												    	</tfoot>
												    </table>
												    <p class="clear"></p>
												    <br/>
												    <div class="left">
												    	<h2>Thank you for your business with us!</h2>
												    </div>
												    <div class="right">
												    	<b><a href="#" onclick="javascript:window.print();" style="font-size: 14px;">print</a></b>
												    </div>
												    <br/>
												</div>
<?php
		}
	} else {
		echo "We can't find your order. Please contact our customer service for further assistance.";
	}
?>												
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
</body>
</html>
