
					<div class="main-col1 container">
						<div class="cart">
							<div class="page-title">
								<h1><span>Shopping</span> Cart</h1>
							</div>
<?php 
	// Giftcard and/or Coupon check
	if (!empty($_POST['gift_code'])) {
		
		$DB0 = new myDB;
		$DB0->query("SELECT *FROM GiftCertificates WHERE GiftAuthorizationCode='".$_POST['gift_code']."' AND IsActive='Y' AND GiftExpiryDate>=now()");
		if ($DB0->rows < 1) {
			$error_msg = "The Giftcard code \"".$_POST['gift_code']."\" is not valid.";
		} else {
			$rs = $DB0->fetch_array($DB0->res);
			$gift_amount = $rs['GiftAmountRemaining'];
			if ($gift_amount <= 0) {
				$error_msg = "Your giftcard has no balance.";
			} else {
				$info_msg = "Your giftcard has a balance of <strong>$".$gift_amount."</strong>.";
			}
		}
		

		$DB0->close();
		
	} else {
		
		$gift_amount = (!empty($_POST['giftcard'])) ? $_POST['giftcard'] : null;
		$arrPromo = (!empty($_POST['promo_code'])) ? getPromoInfo($_POST['promo_code'], $_POST['cart_total']) : null;
		//echo "cart total=".$_POST['cart_total'];
		if ($arrPromo['response']==(-2)) {
			$error_msg = "Your order total does not meet the minimum order amount required for ".$arrPromo['type'].".";
		} elseif ($arrPromo['response']==(-1)) {
			$error_msg = $arrPromo['type'];
		} elseif ($arrPromo['response']==1) {
			$info_msg = "Your order qualifies for ".strtoupper(str_replace("_", " ", $arrPromo['type'])).".";
		}
	}
	
	if ($error_msg || $info_msg) {
?>
								<ul class="messages">
									<li class="<?php echo $error_msg ? "error-msg" : "success-msg"?>">
										<ul>
											<li><span><?php echo $error_msg ? $error_msg : $info_msg?></span></li>
										</ul>
									</li>
								</ul>
<?php 		
	}	
	// DEBUG
	//print_array($arrPromo);
?>
							<form action="/lib/cart_action.php" method="post">
							<input type="hidden" name="option" value="cartupdate"/>
								<div class="round-cart">
									<table id="shopping-cart-table" class="cart-table">
										<colgroup><col width="1"><col><col width="1"><col width="1"><col width="1"><col width="1"></colgroup>
										<thead>
											<tr>
												<th>&nbsp;</th>
												<th><span class="nobr">Product Name</span></th>
												<th><span class="nobr">Unit Price</span></th>
												<th class="a-center">Qty</th>
												<th>Subtotal</th>
												<th></th>
											</tr>
										</thead>
										<tfoot>
											<tr class="last">
												<td colspan="99" class="a-right last">
													<button type="button" title="Continue Shopping" class="button btn-continue" onclick="setLocation('<?php echo SITE_URL?>')">
														<span>Continue Shopping</span>
													</button>
<?php 
	if (is_array($_SESSION['cart'])) {
?>													
													<button type="submit" name="action" value="update" title="Update Shopping Cart" class="button btn-update">
														<span>Udate Shopping Cart</span>
													</button>
													<button tydpe="submit" name="action" value="empty" title="Clear Shopping Cart" class="button btn-empty">
														<span>Clear Shopping Cart</span>
													</button>
<?php 
	}
?>													
												</td>
											</tr>
										</tfoot>
										<tbody>
<?php
	if ($_SESSION['cart']) {
		$DB 	= new myDB;
		$tr_css = array("even", "odd");
		$n 		= 1;
		$cnt 	= 0;
		$dc		= 1;
		$bulkchk="N";
		if (!empty($_COOKIE['VIP']['ratio'])) {
			$dc	= 1 - (int) $_COOKIE['VIP']['ratio'] / 100;
		}
		
		foreach($_SESSION['cart'] as $cart_item => $val) {
			// Get the color-matching image of the product
			if (is_array($val)) {
				foreach ($val as $size => $new_val) {
					if (is_array($new_val)) {
						foreach ($new_val as $color => $qty) {
							$PIMG = new myDB;
							$PIMG->query("SELECT imageno FROM ProductColors WHERE ProductID={$cart_item} AND Color=\"".$color."\"");
							if ($PIMG->rows) {
								$myIMG = $PIMG->fetch_obj($PIMG->res);
								$picture_no	= $myIMG->imageno;
							} else {
								$picture_no = 1;
							}
						}
					} else {
						$picture_no = 1;
					}
				}
			} else {
				$picture_no = 1;
			}
			
			$cart_qty = multiDimArrSum($_SESSION['cart'][$cart_item]);
			$DB->query("SELECT Cat1ID, Cat2ID, Picture".$picture_no.", ProductName, UnitPriceOnSale, FeeForPersonalization, QuantityDiscountID, Weight_Pounds, IsTaxable FROM Products WHERE ProductID=".$cart_item);
			list($Cat1ID, $Cat2ID, $prod_img, $prod_name, $prod_price, $persona_fee, $qtydc_price, $prod_weight, $is_taxable) = $DB->fetch_array($DB->res);
			if ($Cat1ID==17 && $Cat2ID==109)
				$bulkchk="Y";
			else
				$bulkchk="N";
			
			if ($qtydc_price>0)
			{
				$strSQL2	= "SELECT DiscountPercentage1 FROM NewQuantityDiscounts WHERE QD_ID=".$qtydc_price." and LowerQty<=".$cart_qty." and UpperQty>=".$cart_qty;
				$DB3 		= new myDB;
				$DB3->query($strSQL2);
				$dcqty 		= $DB3->fetch_array($DB3->res);
				$QTYDC		= $dcqty["DiscountPercentage1"];
				$qdc		= 1 - (int) $QTYDC / 100;
				$prod_price*= $qdc;
			}
			
			$prod_price *= $dc;
			if (!empty($_SESSION['personalized'][$cart_item])) {
				$line_total = ($prod_price + $persona_fee * $dc) * $cart_qty;
				$arrtemp = explode(",", $_SESSION['personalized'][$cart_item]);
				
				if ($bulkchk=="Y")
				{
					foreach ($_SESSION['personalized'][$cart_item] as $size => $val5) {
						$arrtemp2 	= explode(",", $val5);
						$tname		= trim(str_replace(' ','',$arrtemp2[0]));
						$tbigno		= $arrtemp2[1];
						$tsmallno	= $arrtemp2[2];
						$tshortno	= $arrtemp2[3];
						$nameprice	= strlen($tname);
						$dbignoprice	= $dsmallnoprice = $dshortnoprice = 0;
						if (!empty($tbigno)) 	$dbignoprice	= (strlen($tbigno)) * 2.5;
						if (!empty($tsmallno))	$dsmallnoprice	= (strlen($tsmallno)) * 1.5;
						if (!empty($tshortno)) 	$dshortnoprice 	= (strlen($tshortno)) * 1.5;
						$personal_total += $nameprice + $dbignoprice + $dsmallnoprice;	
					}	
					$line_total = $prod_price * $cart_qty + $personal_total;
				}
			} else if (!empty($_SESSION['emblem'][$cart_item])) {			// Emblem included line_total
				$line_total = $prod_price * $cart_qty;
				foreach($_SESSION['emblem'][$cart_item] as $size => $cost) {
					$line_total += $cost * $cart_qty;
				}
			} else {
				$line_total = $prod_price * $cart_qty;
			}
			$nontaxable_total += ($is_taxable=='N')? $prod_price : 0;
			$total_weight += $prod_weight * $cart_qty;
?>
											<tr class="<?php echo ($cnt<1)?"first":null?> <?php echo $tr_css[$n]?>">
												<td class="prod-cart">
													<a href="/?pid=<?php echo $cart_item?>">
														<img src="<?php echo PRODUCT_IMAGE_PATH.$prod_img?>" width="84" height="84" />
													</a>
													<input type="hidden" name="prod_img" value="<?php echo $prod_img;?>" />
												</td>
												<td>
													<h2 class="cart-product-name">
														<a href="/?pid=<?php echo $cart_item?>"><?php echo $prod_name.$str_personalized?></a>
													</h2>
													<dl class="item-options">
<?php
			/*
			if (!empty($_SESSION['personalized'][$cart_item])) {
				echo "<div class=\"cart-product-options\">";
				echo "<dt><span>Personalization: $".formatMoney($persona_fee * $dc, true)."</span></dt>";
				echo "<dd><span>&bull; Name: <em>&quot;{$arrtemp[0]}&quot;</em></dd>";
				echo "<dd><span>&bull; Number: <em>&quot;{$arrtemp[1]}&quot;</em></dd>";
				echo "</div>";
			}*/
			
		
			
			
			
			if (is_array($val) && $persona_fee==0) {
				
				if($bulkchk=="Y")
				{
				/*
				echo "<div class=\"cart-product-options\">";
				echo '<dt><span>Type</span></dt>';
				foreach ($val as $size => $val2) {
					
					echo '<dt><span>Size: '.$size.'</span></dt>';

					if (is_array($val2)) {
						foreach ($val2 as $color => $val3) {
							echo "<dd><span>$color: <em>$val3</em> ea</span><span><a href=\"\" title=\"Remove one\" id=\"".$cart_item."|".$size."|".$color."\" class=\"removeone\">-</a></span> <span><a href=\"\" title=\"Add one\" id=\"".$cart_item."|".$size."|".$color."\" class=\"addone\">+</a></span></dd>\n";
						}
					} else {
					
						if($persona_fee>0)
						echo "<dd><span>Qty: <em>$val2</em> ea</span></dd>";
						else
						echo "<dd><span>Qty: <em>$val2</em> ea</span><span><a href=\"\" title=\"Remove one\" id=\"".$cart_item."|".$size."\" class=\"removeone\">-</a></span> <span><a href=\"\" title=\"Add one\" id=\"".$cart_item."|".$size."\" class=\"addone\">+</a></span></dd>";
						
					}
					
				}
				echo "</div>";*/
				
					echo "<div class=\"cart-product-options\">";
					echo "<dt><span>Personalization</span></dt>";
					$addAllTotal = 0;
					foreach ($_SESSION['personalized'][$cart_item] as $size => $val5) {
						$arrtemp1 		= explode(",", $val5);
						$size1			= strtoupper(substr($size, 0, strpos($size, "_")));
						$xname			= trim(str_replace(' ','',$arrtemp1[0]));
						$xbigno			= $arrtemp1[1];
						$xsmallno		= $arrtemp1[2];
						$dnameprice		= strlen($xname);
						$xshortno		= $arrtemp1[3];
						$dbignoprice	= $dsmallnoprice = $dshortnoprice = 0;
						if (!empty($xbigno)) 	$dbignoprice	= (strlen($xbigno)) * 2.5;
						if (!empty($xsmallno))	$dsmallnoprice	= (strlen($xsmallno)) * 1.5;
						if (!empty($xshortno)) 	$dshortnoprice 	= (strlen($xshortno)) * 1.5;
						$dtotal = $dnameprice + $dbignoprice + $dsmallnoprice + $dshortnoprice;
						
						echo "<dd><span>Size:<em>{$size1}</em> Name:<em>{$arrtemp1[0]}(\${$dnameprice})</em>  BigNo:<em>{$arrtemp1[1]}(\${$dbignoprice})</em>  SmallNo:<em>{$arrtemp1[2]}(\${$dsmallnoprice})</em> ShortNo:<em>{$arrtemp1[3]}(\${$dshortnoprice})</em> = $".formatMoney($dtotal,1)."</em></span></dd>";
						$addAllTotal += $dtotal;
					}
					echo "<dd/><b>Total: $".formatMoney($addAllTotal,1)."</b></dd>";
					echo "</div>";
				}
				else
				{
					foreach ($val as $size => $val2) {
						echo "<div class=\"cart-product-options\">";	
						echo "<dt><span>Size: ".$size."</span> ";
						if (!empty($_SESSION['emblem'][$cart_item][$size])) {
							echo " &nbsp; - Emblem attachment: $" . $_SESSION['emblem'][$cart_item][$size];
						}
						echo "</dt>";

						if (is_array($val2)) {
							foreach ($val2 as $color => $val3) {
								echo "<dd><span>$color: <em>$val3</em> ea</span><span><a href=\"\" title=\"Remove one\" id=\"".$cart_item."|".$size."|".$color."\" class=\"removeone\">-</a></span> <span><a href=\"\" title=\"Add one\" id=\"".$cart_item."|".$size."|".$color."\" class=\"addone\">+</a></span></dd>\n";
							}
						} else {
						
							if($persona_fee>0)
							echo "<dd><span>Qty: <em>$val2</em> ea</span></dd>";
							else
							echo "<dd><span>Qty: <em>$val2</em> ea</span><span><a href=\"\" title=\"Remove one\" id=\"".$cart_item."|".$size."\" class=\"removeone\">-</a></span> <span><a href=\"\" title=\"Add one\" id=\"".$cart_item."|".$size."\" class=\"addone\">+</a></span></dd>";
							
						}
						echo "</div>";
					}
				}
			}
			if(is_array($val) && $persona_fee>0)
			{	
				//foreach($_SESSION['personalized'] as $cart_item => $val4) {
					//echo "<div class=\"cart-product-options\">";
					//echo "<dt><span>Personalization: $".formatMoney($persona_fee * $dc, true)."</span></dt>";
					//echo "<dd><span>&bull; Name: <em>&quot;{$arrtemp[0]}&quot;</em></dd>";
					//echo "<dd><span>&bull; Number: <em>&quot;{$arrtemp[1]}&quot;</em></dd>";
					//echo "</div>";
				//}
				//if (is_array($val4)) {
				/*
				echo "<div class=\"cart-product-options\">";
				echo '<dt><span>Type</span></dt>';
				foreach ($val as $size => $val2) {
					
					echo '<dt><span>Size: '.$size.'</span></dt>';

					if (is_array($val2)) {
						foreach ($val2 as $color => $val3) {
							echo "<dd><span>$color: <em>$val3</em> ea</span><span><a href=\"\" title=\"Remove one\" id=\"".$cart_item."|".$size."|".$color."\" class=\"removeone\">-</a></span> <span><a href=\"\" title=\"Add one\" id=\"".$cart_item."|".$size."|".$color."\" class=\"addone\">+</a></span></dd>\n";
						}
					} else {
					
						if($persona_fee>0)
						echo "<dd><span>Qty: <em>$val2</em> ea</span></dd>";
						else
						echo "<dd><span>Qty: <em>$val2</em> ea</span><span><a href=\"\" title=\"Remove one\" id=\"".$cart_item."|".$size."\" class=\"removeone\">-</a></span> <span><a href=\"\" title=\"Add one\" id=\"".$cart_item."|".$size."\" class=\"addone\">+</a></span></dd>";
						
					}
					
				}
				echo "</div>";*/
					if (!empty($_SESSION['personalized'])) {
						echo "<div class=\"cart-product-options\">";
						echo "<dt><span>Personalization: $".formatMoney($persona_fee * $dc, true)."</span></dt>";
						//foreach ($val4 as $size => $val5) {
						foreach ($_SESSION['personalized'][$cart_item] as $size => $val5) {
							$arrtemp1 = explode(",", $val5);
							$size1=str_replace('_','',$size);
							//echo "<div class=\"cart-product-options\">";
							echo "<dd><span>Size: <em>({$size1})</em> Name: <em>{$arrtemp1[0]}</em>  Number:<em>{$arrtemp1[1]}</em></span></dd>";
							//echo '<dd><span>Size: '.$size.'</span></dd>';
							
							
							//echo "</div>";
						}
						echo "</div>";
					}

			}
			//echo "</div>";
			
?>
													</dl>
												</td>
												<td class="a-right">
													<span class="cart-price">$<?php echo formatMoney($prod_price,2)?></span>
												</td>
												<td class="a-center">
<?php
			if (count($_SESSION['cart'][$cart_item][$size])>1 || count($_SESSION['cart'][$cart_item])>1 || count($_SESSION['personalized'][$cart_item])>1) {
				echo $cart_qty;
				//echo count($_SESSION['personalized'][$cart_item][$size]);
			} else {
				//echo count($_SESSION['personalized'][$cart_item]);
?>
													<input name="item[<?php echo $cart_item?>]" value="<?php echo $cart_qty?>" size="4" title="Qty" class="input-text qty" maxlength="12"/>
<?php
			}
?>
												</td>
												<td class="a-right">
													<span class="cart-price">$
<?php 
				if(is_array($val)) { // && $persona_fee > 0){
					if($bulkchk == 'Y'){
						$line_total = formatMoney($prod_price,1) * $cart_qty + formatMoney($addAllTotal,1); // * $cart_qty) + $addAllTotal;
						echo formatMoney($line_total,2);
					}else{
						echo formatMoney($line_total,2);
					}
				} else {
					echo formatMoney($line_total,2);
				}
?>													
													</span>
												</td>
												<td class="a-center last">
													<a href="" title="Remove this item" id="<?php echo $cart_item?>" class="btn-remove2">Remove item</a>
												</td>
											</tr>
<?php
			$cnt++;
			$n = 1 - $n;
			$page_total += $line_total;
		}
	} else {
		echo "<tr class=\"first odd\"><td colspan=\"99\" align=\"center\"><br /><br /><h2 class=\"cart-product-name\">Your shopping cart is empty.</h2><br /><br /></td></tr>";
	}
	
	if($arrPromo["response"]==1 && $arrPromo["type"]=="free_product"){
		$strPromo = "SELECT * FROM Coupons WHERE `coupon_code` = '".$_POST["promo_code"]."' && `coupon_type` = 'free_product'";
		$DBCoupon = new myDB;
		$DBCoupon->query($strPromo);
		$dataPromo = $DBCoupon->fetch_array($DBCoupon->res);
	//	echo $strPromo."<br/>";
		
		$strPromoImg = "SELECT Picture1 FROM Products WHERE ProductID = ".$dataPromo["product_id"];
		$DBPromoImg = new myDB;
		$DBPromoImg->query($strPromoImg);
		$dataPromoImg = $DBPromoImg->fetch_array($DBPromoImg->res);
?>
											<input type="hidden" name="freeprod_qty" value="1" />
											<input type="hidden" name="productid" value="<?php echo $dataPromo["product_id"];?>" />
<script type="text/javascript">
/*	jQuery(function(jQuery){
		$.ajax({
			async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
			data:{
				"qty":"1",
				"id":$("input[name='productid']").val(),
				"options":{"p_name":"Free Gift"},
				"action":"freeItem"
			}
		});
	});*/
</script>
											<tr class="<?php echo $tr_css[$n]?>">
												<td></td>
												<td>
													<h2 class="cart-product-name">
														<a href="/?pid=<?php echo $dataPromo["product_id"];?>" style="text-transform: none;">
															FREE GIFT( Coupon Code: <?php echo $dataPromo["coupon_code"];?> ) &nbsp;
															<img src="<?php echo PRODUCT_IMAGE_PATH.$dataPromoImg["Picture1"]?>" width="56" height="56">
														</a>
													</h2>
												</td>
												<td class="a-right"><span class="cart-price"></span></td>
												<td class="a-center"></td>
												<td class="a-right"><span class="cart-price"></span></td>
												<td class="a-center last"></td>
											</tr>
<?php		
	}
	
	// Estimate Shipping and Tax
	if (!empty($_POST['shipping'])) {
		$temp = explode("|",$_POST['shipping']);
		$shipping = $temp[1];
	} else if (!empty($_POST['estimated_shipping'])) {
		$shipping = $_POST['estimated_shipping'];
	}
	if ($_POST['sstate']=="CA") {
		$tax_rate 	= 0.09;
	} else {
		$tax_rate 	= 0;
	}
	$subtotal 	= $page_total;
	$local_tax 	= (!empty($_POST['local_tax'])) ? $_POST['local_tax'] : ($subtotal - $nontaxable_total) * $tax_rate;
	$grandtotal	= $subtotal + $local_tax + $shipping;
?>
										</tbody>
									</table>
								</div>
							</form>

<?php 
	if (is_array($_SESSION['cart'])) {
?>							
							
							<div class="cart-collateral">
								<div class="col2-set">
									
									<div class="col-1">
										<div class="shipping">
											
											<?php if ($total_weight>0) {?>
											<h2>Estimate Shipping and Tax</h2>		
											<div class="shipping-form">
												<form method="post" name="shippingzipcode" id="shippingzipcode">
												<input type="hidden" name="lb_weight" id="lb_weight" value="<?php echo $total_weight?>"/>
												<input type="hidden" name="coupon_opt" id="coupon_opt" value="<?php echo $arrPromo['type']=="free_shipping" ? "freeshipping" : null?>"/>
													<p>Enter your destination to get a shipping estimate.</p>
													<ul class="form-list">
														<li><label for="country" class="required"><em>*</em>Country</label>
															<div class="input-box">
																<select name="ccode" id="countrycode" title="country" class="required-entry validate-select">
<?php
	include dirname(__FILE__) . "/../lib/CountryCodes.php";
	foreach($country_list as $code => $name) {
		echo "<option value=\"$code\">$name</option>\n";
	}

?>
																</select>
															</div>
														</li>
														<li><label for="region">State/Province</label>
															<div class="input-box">
																<input type="text" name="txtregion" id="txt-region" class="" />
																<select name="scode" id="region" title="region" class="required-entry validate-select" style="display: none">
																	<option value="">SELECT ONE</option>
																</select>
															</div>
														</li>
														<li><label for="region">Zip/Postal Code</label>
															<div class="input-box">
																<input type="text" id="postcode" name="zcode" />
															</div>
														</li>
													</ul>
													<div class="buttons-set">
														<button type="button" title="Get a Quote" value="" class="button fleft">Get a Quote</button>
														<div id="ajax_loader" style="display:none;clear:left;padding-top:5px;"><img src="/images/ajax_loader.gif"/><span></span></div>
													</div>
												</form>
											</div>
											<?php }
											else if($total_weight==0 and count($_SESSION['cart'][$cart_item])>0)
											{
												echo "<h2>Estimate Shipping and Tax</h2>";
												echo "<p>No shipping charge.  E-mail shipping.</p>";
											}
											?>
											<form id="shipping_quote" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
												<input type="hidden" name="sstate" id="sstate" />
												<input type="hidden" name="shipping" id="shipping" />
												<input type="hidden" name="promo_code" value="<?php echo ($_POST['promo_code'])?$_POST['promo_code']:null?>" />
												<input type="hidden" name="local_tax" id="local_tax" value="<?php echo (!empty($local_tax))?formatMoney($local_tax, true):null?>">
								            	<input type="hidden" name="cart_total" id="cart_total" value="<?php echo $subtotal?>">
												<div id="shipping_rates"></div>
											</form>
										</div>
									</div>
									
									<div class="col-2">
										<form id="discount-giftcard-form" action="/?page=mycart" method="post">
											<input type="hidden" name="local_tax" id="local_tax" value="<?php echo (!empty($local_tax))?formatMoney($local_tax, true):null?>">
								            <input type="hidden" name="estimated_shipping" id="estimated_shipping" value="<?php echo $shipping?>">
								            <input type="hidden" name="promo_code" id="promo_code" value="<?php $_POST['promo_code'] ? $_POST['promo_code'] : null?>">
								            <input type="hidden" name="cart_total" id="cart_total" value="<?php echo $subtotal?>">

										    <div class="discount">
										        <h2>PROMOTIONAL Code</h2>
										        <div class="discount-form">
										            <label for="promo_code" style="margin-bottom: 5px;">Enter your promo code if you have one.</label>
										            <p style="margin-bottom: 15px;">Please type the code in the box below, then click "Apply" button. if your order qualifies, a box will appear with the promotion details.</p>
										            <div class="input-box">
										                <input class="input-text" id="txt_promo_code" name="promo_code" value="<?php echo $_POST['promo_code'] ? $_POST['promo_code'] : null?>">
										            </div>
										            <div class="buttons-set">
										                <button type="button" title="Apply Code" class="button" value="Apply Coupon" onclick="est_giftcard(this.form, 'promo');"><span><span>Apply Code</span></span></button>
										            </div>
										        </div>
										    </div>
										</form>
									</div>
									
								</div>
								
								<div class="totals">
									<table id="shopping-cart-totals-table">
										<colgroup><col><col width="1"></colgroup>
										<tbody>
											<tr>
												<td>Subtotal</td>
												<td class="a-right"><span class="price">$<?php echo formatMoney($subtotal,1)?></span></td>
											</tr>
<?php
	if ($shipping || $_POST['shipping']) {
?>
											<tr>
												<td>Shipping &amp; Handling</td>
												<td class="a-right"><span class="price">$<?php echo formatMoney($shipping,1)?></span></td>
											</tr>
<?php
	}
	if ($_POST['sstate']=="CA" || $_POST['local_tax'] > 0) {
?>
											<tr>
												<td>Tax</td>
												<td class="a-right"><span class="price">$<?php echo formatMoney($local_tax,1)?></span></td>
											</tr>
<?php
	}
	if ($gift_amount > 0) {
		if ($grandtotal > $gift_amount) {
			$grandtotal = $grandtotal - $gift_amount;
			//$new_gift_amount = 0;
			$tendered_amount = $gift_amount;
		} else {
			$tendered_amount = $grandtotal;
			//$new_gift_amount = $gift_amount - $grandtotal;
			$grandtotal = 0;
		}
?>
											<tr>
												<td>Giftcard Tendered</td>
												<td class="a-right"><span class="price">-$<?php echo formatMoney($tendered_amount,1)?></span></td>
											</tr>
<?php 
	}
?>
										</tbody>
										<tfoot>
											<tr>
												<td class=""><strong>Grand Total:</strong></td>
												<td class="a-right"><span class="price"><strong>$<?php echo formatMoney($grandtotal,1)?></strong></span></td>
											</tr>
										</tfoot>										
									</table>
									<ul class="checkout-types">
										<li>
											<button type="button" title="Proceed to Checkout" class="button btn-proceed-checkout btn-checkout" onclick="submitFrm({<?php echo $arrPromo['response']==1 ? "promo_code:'".$_POST['promo_code']."',cart_total:'".$subtotal."'" : "data:''"?>},'http://soccertblow.com/?page=checkout');"><span>Proceed to Checkout</span></button>
										</li>
									</ul>
								</div>
								<br/>
								
							</div>							
<?php 
	}
?>								

							<div class="modal"></div>
							<script type="text/javascript">
/*
							$("body").on({
							    ajaxStart: function() {
							        $(this).addClass("loading");
							    },
							    ajaxStop: function() {
							        $(this).removeClass("loading");
							    }
							});
*/
							var ajaxQueries = new Array();
							function resetAjaxQueries()
							{
								for (i = 0; i < ajaxQueries.length; ++i)
									ajaxQueries[i].abort();

								ajaxQueries = new Array();
							}

							function displayWaitingAjax(type, message)
							{

								$('#ajax_loader').find('span').html(message);
								$('#ajax_loader').css('display', type);
							}


							$(function () {
								$(".btn-remove2").click(function() {
									if (confirm("Remove selected item from your shopping cart?")) {
										var item = $(this).attr("id");
										$.ajax({
											async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
											data:{
												"id":item,
												"options":{"size":"","color":""},
												"action":"remove"
											},success:function(d){
												parent.location.reload();
											}
										});
									} else {
										return false;
									}
								});
								$(".removeone, .addone").click(function() {
									//if (confirm("Adjust quantity of this item?")) {
										var arr = $(this).attr("id").split("|");
										var act = $(this).attr("class");
										var item = arr[0], size = arr[1], color = arr[2];
										$.ajax({
											async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
											data:{
												"id":item,
												"options":{"size":size,"color": color},
												"action":act
											},success:function(d){
												parent.location.reload();
											}
										});
									//}
								});
								$("#countrycode").live("change", function() {
									var ccode = $(this).val();
									if(ccode=="US" || ccode=="CA" || ccode=="MX") {
										$("#txt-region").css("display","none");
										$("#region").css("display","block");
										$("#region").html('');
										$.ajax({
											async:false, type:"post", dataType:"json", url:"/lib/states.php",
											data:{"code":ccode},
											success:function(d) {
												if (d) {
													for(var i=0; i<d.states.length; i++) {
														//$("#region").append(new Option(d.states[i].sname,d.states[i].scode,false,false));
														$("#region").append("<option value="+d.states[i].scode+">"+d.states[i].sname+"</option>");
													}
												}
											}
										});
									} else {
										$("#txt-region").css("display","block");
										$("#txt-region").val('');
										$("#region").css("display","none");
									}
								});

								$("button[title='Get a Quote']").on({
									click: function() {
										if ($("#countrycode").val()) {
											if ($("#countrycode").val()=="US" && !$("#postcode").val()) {
												$("#postcode").addClass("required-input");
											}else {
												var frmdata = $("form").serializeArray();
												frmdata.push(
													{name: "mode", value: "getaquote"}
												);
												$("#sstate").val($("#region").val());
												$("#shipping_rates").html('');
												resetAjaxQueries();
												displayWaitingAjax('block', 'loading...');

												try {
													$.ajax({
														type: "post",
														dataType: "json",
														url: "/lib/estimate_shipping.php",
														data: frmdata,
														success: function (d) {
															displayWaitingAjax('none', '');
															$("#shipping_rates").append("<span><strong>Estimated Shipping Rate:</strong></span>");
															var list = $("#shipping_rates").append("<ul>").find("ul");
															for(var i=0; i<d.rates.length; i++) {
																list.append('<li><input type="radio" name="rateoption" id="rateoption" value="'+d.rates[i].carrier+'|'+(((d.rates[i].carrier).indexOf("FREE")>=0) ? 0 : d.rates[i].value)+'" onclick="setRate(\''+d.rates[i].carrier+'|'+(((d.rates[i].carrier).indexOf("FREE")>=0) ? 0 : d.rates[i].value)+'\')"/> $'+d.rates[i].value + ' ' + d.rates[i].carrier+'</li>');

															}
															$("#shipping_rates").append("<p class='note-msg category-label'>We must receive your order before 3:00 pm (Pacific Time).</p>");
															$("#shipping_rates").append('<button id="update_total" type="submit" class="button">Update Total</button>');
														}
													});
												} catch(e) {
												}
											}
										} else {
											$("#countrycode").addClass("required-input");
										}
									},
									mouseover: function() {
										//displayWaitingAjax('block', 'loading...');
									},
									mouseout: function() {
										//displayWaitingAjax('none', '');
									}
								});

							});

							function setRate(v) {
								$("#shipping").val(v);
							}

							showStates();
							</script>							
						</div>

<?php

	if ($total_weight > 0) {
		echo "<script>putShippingWeight('shippingzipcode',".$total_weight.")</script>";
	}

	//echo "<xmp>";
	
	print_array($_SESSION);
	//print_array($_SESSION['personalized'][$cart_item]);
	//print_array($Cat1ID);
	//print_array($Cat2ID);
	
	//echo "</xmp>";

?>
						<div>
							<div class="vip_advertise" style="display:none">
								<a href="../contents/vipinfo.php">More information about VIP</a>
							</div>
							<div class="buttons-set">
								<button type="button" title="Print this page" class="button right" onclick="window.print()">
									<span>Print this Page</span>
								</button>
							</div>
						</div>
					</div>
