<?php	
	$pageTitle = "";
	
	if ($arrGet[0][0]=="pid") {
		$DB = new myDB;
		$pid = $arrGet[0][1];
		$strSQL = "SELECT * FROM Products WHERE ProductID=".$pid." AND IsActive=\"Y\"";
		$DB->query($strSQL);
		if ($DB->rows) {
			$data = $DB->fetch_array($DB->res);
			$productname	= $data["ProductName"];
			$pagepath		= "<p class=\"path-info\"><a href=\"?c1=".$data["Cat1ID"]."\">".$DB->getCatID(1,$data["Cat1ID"])."</a></p></strong><span>/</span></li><li><strong>".$DB->getCatID(2,$data["Cat2ID"])."</strong></li>";
?>
<script type="text/JavaScript" src="/js/cloud-zoom.1.0.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.jqtransform.js"></script>

					<div class="main-col">
						<div class="page-path">
							<ul>
								<li class="home"><a href="/" title="Go to Home Page">Home</a><span>/ </span></li>
								<li class="home"><strong><?php echo $pagepath?></strong></li>
							</ul>
						</div>
						
						<div class="product_view">
							<div class="alert">
								<div class="inner_alert"><?php echo $productname?> was added to your shopping cart.<button></button></div>
							</div>
							<div class="product-detailbox">
								<form action="" method="post" id="" name="">
									<div class="product-imgbox">
										<div class="imgbox-zoom">
											<div class="product-image">
												<div id="wrap" style="top:0px;z-index:98;position:relative;">
													<a href="<?php echo PRODUCT_IMAGE_PATH.$data["Picture1"]?>" class="cloud-zoom" id="zoom1" rel="position:'right',zoomWidth:400,zoomHeight:400,tint:'#FFFFFF',tintOpacity:0.8,showTitle:1,titleOpacity:0.5,adjustX:10,adjustY:-4,softFocus:1">
														<img src="<?php echo PRODUCT_IMAGE_PATH.$data["Picture1"]?>" width="300" height="300" alt="" align="left" title="<?php echo $productname?>"/>
													</a>
												</div>
											</div>
										</div>
										<div class="thumbnails">
											<ul>
<?php 
			for ($i=1; $i<16; $i++) {
				if ($data["Picture".$i]!="") {
					$thumb_class = ($i%5==1)?" class=\"first\"":null;
?>
												<li<?php echo $thumb_class?>>
												<a href="<?php echo PRODUCT_IMAGE_PATH.$data["Picture".$i]?>" class="cloud-zoom-gallery" title="Thumbnail<?php echo $i?>" rel="useZoom:'zoom1', smallImage:'<?php echo PRODUCT_IMAGE_PATH.$data["Picture".$i]?>'"><img src="<?php echo PRODUCT_IMAGE_PATH.$data["Picture".$i]?>" width="50" /></a>
												</li>
<?php
				}
			}
?>											
											</ul>
										</div>
									</div>
									<div class="product-shop">
										<div class="product-name">
											<h2><?php echo $productname?></h2>
										</div>
										<div class="product-desc"><?php echo $data["ProductDescription"]?></div>
										<p class="availability instock">
											This item is <strong>FOR <?php echo strtoupper($data["ForMenOrWomen"])?></strong>
										</p>
<?php 
			if (!empty($data["SizeChartID"]) || $data["ColorIDs"]!="1") {
?>										
										<div class="product-options">
											<dl>										
<?php 
				if (!empty($data["SizeChartID"])) {
					$sizes = $DB->getSizeRun($data["SizeChartID"]);
?>										
												<dt><label class="required"><em>*</em>Size:</label>&nbsp;&nbsp;<a href="/?info=sizechart">View Size Chart</a></dt>
												<dd>
													<div class="jqTransformSelect">
														<select name="size" id="size">
															<option>-- Please Select --</option>
<?php 
					for ($i=0; $i<count($sizes); $i++) {
?>
															<option value="<?php echo $sizes[$i]?>"><?php echo $sizes[$i]?></option>
<?php 
					}
?>
														</select>
														<div class="validation-advice" id="advice-required-entry-select_1" style="display:none">This is a required field.</div>
													</div>
												</dd>
<?php 
				}
				if ($data["ColorIDs"]!="1") {
					$colors = $DB->getColorRun($data["ColorIDs"]);
?>
												<dt><label class="required"><em>*</em>Color:</label></dt>
												<dd>
													<div class="jqTransformSelect">
														<select name="color" id="color">
															<option>-- Please Select --</option>
<?php 
					for ($i=0; $i<count($colors); $i++) {
?>
															<option value="<?php echo $colors[$i]?>"><?php echo $colors[$i]?></option>
<?php 
					}
?>
														</select>
														<div class="validation-advice" id="advice-required-entry-select_2" style="display:none">This is a required field.</div>
													</div>
												</dd>
<?php 
				}
?>
											</dl>
											<p class="required">* Required Fields</p>
<?php
if ($data["personalize"]=="1") {
$QstrSQL = "SELECT * FROM QuantityDiscounts ";
		$DB->query($QstrSQL);
		if ($DB->rows) {
			$Qdata = $DB->fetch_array($DB->res);
			
		
		}
?>
			<script type="text/javascript">	
			var quantitydiscount = new Array();
			if ("<?php echo $Qdata["LowerQty1"]?>">0)
			{
			addQuantitydiscount("<?php echo $data["UnitPriceOnSale"]?>","<?php echo $Qdata["LowerQty1"]?>","<?php echo $Qdata["UpperQty1"]?>","<?php echo $Qdata["DiscountPercentage1"]?>","<?php echo $Qdata["LowerQty2"]?>","<?php echo $Qdata["UpperQty2"]?>","<?php echo $Qdata["DiscountPercentage2"]?>","<?php echo $Qdata["LowerQty3"]?>","<?php echo $Qdata["UpperQty3"]?>","<?php echo $Qdata["DiscountPercentage3"]?>","<?php echo $Qdata["LowerQty4"]?>","<?php echo $Qdata["UpperQty4"]?>","<?php echo $Qdata["DiscountPercentage4"]?>","<?php echo $Qdata["LowerQty5"]?>","<?php echo $Qdata["UpperQty5"]?>","<?php echo $Qdata["DiscountPercentage5"]?>","<?php echo $Qdata["LowerQty6"]?>","<?php echo $Qdata["UpperQty6"]?>","<?php echo $Qdata["DiscountPercentage6"]?>");
			}
			
			function addQuantitydiscount(priceonsale,lowqty1,upperqty1,discount1,lowqty2,upperqty2,discount2,lowqty3,upperqty3,discount3,lowqty4,upperqty4,discount4,lowqty5,upperqty5,discount5,lowqty6,upperqty6,discount6)
			{
				
				quantitydiscount["priceonsale"]=priceonsale;
				quantitydiscount["lowqty1"]=lowqty1;				
				quantitydiscount["upperqty1"]=upperqty1;
			//alert(quantitydiscount["upperqty1"]);
				quantitydiscount["discount1"]=discount1;
			//alert(quantitydiscount["discount1"]);	
				quantitydiscount["lowqty2"]=lowqty2;
				quantitydiscount["upperqty2"]=upperqty2;
				quantitydiscount["discount2"]=discount2;
				quantitydiscount["lowqty3"]=lowqty3;
				quantitydiscount["upperqty3"]=upperqty3;
				quantitydiscount["discount3"]=discount3;
				quantitydiscount["lowqty4"]=lowqty4;
				quantitydiscount["upperqty4"]=upperqty4;
				quantitydiscount["discount4"]=discount4;				
				quantitydiscount["lowqty5"]=lowqty5;
				quantitydiscount["upperqty5"]=upperqty5;
				quantitydiscount["discount5"]=discount5;				
				quantitydiscount["lowqty6"]=lowqty6;
				quantitydiscount["upperqty6"]=upperqty6;
				quantitydiscount["discount6"]=discount6;
				
				//quantitydiscounts.push(quantitydiscount);
				
			}



		function findquantitydiscount()
		{
			var x = $('#quantity_wanted').val();
			var basicprice = quantitydiscount["priceonsale"];
			//alert(quantitydiscount["lowqty2"]);
			//alert(quantitydiscount["upperqty1"]);
			//alert(x);
			if (x<quantitydiscount["lowqty1"])
			{
			$('#our_price_display').text(basicprice);
			}
			else if (quantitydiscount["lowqty1"]<=x || quantitydiscount["upperqty1"]>=x)
			{
				//alert('yy');
				var lowprice1 = basicprice-((basicprice*quantitydiscount["discount1"])/100);
				//alert(lowprice1);
				$('#our_price_display').text(lowprice1);				
			}
			else if (quantitydiscount["lowqty2"]<=x && x>=quantitydiscount["upperqty2"])
			{
				alert('yy');
				var lowprice2 = basicprice-((basicprice*quantitydiscount["discount2"])/100);
				//alert(lowprice1);
				$('#our_price_display').text(lowprice2);				
			}
			
			/*
			else if(quantitydiscount["lowqty1"]<x && quantitydiscount["upperqty1"]>x)
			{
			var lowprice1 = (basicprice-((basicprice*quantitydiscount["discount1"])/100);
			$('#our_price_display').text(lowprice1);
			}*/
			
		}

			
			</script>		
												<dt><label class="required">Personalize this?</label><input type="checkbox" class="input-text per2"/>
												<p>(A name and number below to be ironed on this item)</p></dt>
												<dt><label class="required">Personalize Name:</label><input type="text" class="input-text per1"/></dt>
												<p>(Up to 15 letters. Ex MESSI or TOURE YAYA)</p></dt>
												<dt><label class="required">Personalize Number:</label><input type="text" class="input-text per"/>
												<p>(Maximum 2 digits EX: 4,15)</p>
												</dt>
												
<?php 
				}
?>
											


											
											
											
											
											
										</div>											
<?php 
			}
				
			if ($arrGet[1]=="configure") {
				$qty = $_SESSION['cart']['$pid']['qty'];
			} else {
				$qty = 1;
			}
			
?>										
			<script type="text/javascript">
			function addwish(id){
		    window.location ="/lib/wish_action.php?action=add&id="+id;
			}
			function vipmember(){
			alert('Please first login !!');
		    window.location ="/?page=customer&account=login";
			}
			
			
			/*
				foreach from=$Qty item='quantity_discount' name='quantity_discounts'
					addQuantitydiscount($quantity_discount.id_specific_price,$quantity_discount.id_product|intval,$quantity_discount.id_group,$quantity_discount.price, $quantity_discount.from_quantity,$quantity_discount.reduction,$quantity_discount.real_value, $quantity_discount.nextQuantity);*/
				
			
			</script>							
										<div class="product-options-foot">
											<div class="addto-cart">
												<div class="pricebox"><span id="our_price_display" class="price"><?php echo "$".$data["UnitPriceOnSale"]?></span></div>
												<label for="qty">Qty:</label>
												<input id="quantity_wanted"  type="text" name="qty" onkeyup="findquantitydiscount();" maxlength="3" value="<?php echo $qty?>" title="Qty" class="input-text qty" />
												<input type="hidden" name="productid" value="<?php echo $data["ProductID"]?>" />
												<?php if ($data["ProductID"]==13007 && empty($_COOKIE["userID"])) 
												echo "<button type=\"button\" title=\"\" onclick=\"vipmember()\" class=\"button btn-cart\"><span>Add to Cart</span></button>";
												else
												echo "<button type=\"button\" title=\"Add to Cart\" class=\"button btn-cart\"><span>Add to Cart</span></button>";
												?>
												<span id="ajax_loader" style="display:none"><img src="/images/ajax_loader.gif"/></span>
											</div>
											<ul class="addto-links">
												<!--<button type="button" title="Add to Wish" class="button btn-cart"><span>Add to wish</span></button>-->
												<li><a href="#" onclick="addwish(<?php echo $data["ProductID"]?>)" class="link-wishlist">Add to Wishlist</a></li>
												<!--<li><span class="separator">|</span>
													<a href="#" onclick="" class="link-compare">Add to Compare</a>
												</li>-->
												<li><span id="ajax_loading25" style="display:none"><img src="/images/ajax_loader.gif"/></span></li>
											</ul>
										</div>
									</div>
								</form>
							</div>
<?php
		}
	}
?>								
						</div>

<!-- Notice to buyer -->						
						
							<div class="product-collateral">
       
            					<ul class="tabs">
            						<li id="product_tabs_description_tabbed" class="first active"><a href="javascript:void(0)">Product Description</a></li>
	                                <li id="product_tabs_review_tabbed" class=""><a href="javascript:void(0)">Product Reviews</a></li>
	                            </ul>
								<div class="padder">
                        			<div id="product_tabs_description_tabbed_contents" style="">
    									<div class="std">
    										<?php echo $data["NoticeToPurchasers"]?>
    									</div>
									</div>
	                                <div id="product_tabs_review_tabbed_contents" style="display: none; ">
										<!--  Product Review Contents Here -->
									</div>
								</div>
							</div>
							
<link href="../css/amazon_scroller.css" rel="stylesheet" type="text/css"></link>
<script type="text/javascript" src="../js/amazon_scroller.js"></script>
<script language="javascript" type="text/javascript">

	$(function() {
		$("#amazon_scroller3").amazon_scroller({
			scroller_title_show: 'enable',
			scroller_time_interval: '99999',
			scroller_window_background_color: "none",
			scroller_window_padding: '10',
			scroller_border_size: '1',
			scroller_border_color: '#cecece',
			scroller_images_width: '124',
			scroller_images_height: '140',
			scroller_title_size: '14',
			scroller_title_color: 'black',
			scroller_show_count: '5',
			directory: '../images'
		});
	});
</script>
<?php
$RstrSQL = "SELECT * FROM Products WHERE Cat1ID=".$data["Cat1ID"]." AND Cat2ID=".$data["Cat2ID"]." AND IsActive=\"Y\" LIMIT 0 , 20 ";
$DB->query($RstrSQL);
?>
		<h2>Related Items</h2>	
	     <div id="amazon_scroller1" class="amazon_scroller">
   
               <div id="amazon_scroller3" class="amazon_scroller">
                   <div class="amazon_scroller_mask">
                       <ul>
					   <?php
					   while ($Rdata = $DB->fetch_array($DB->res)){
					   
                          echo" <li><a href=\"/?pid=".$Rdata["ProductID"]."\" title=\"".$Rdata["ProductName"]." \" target=\"\"><img src=\"/Images_Products/".$Rdata["Picture1"]."\" width=\"124\" height=\"160\" alt=\"\"/></a></li>";
                       
					   }
					   ?>
					   </ul>
                   </div>
                   <ul class="amazon_scroller_nav">
                       <li></li>
                       <li></li>
                   </ul>
                   <div style="clear: both"></div>
               </div>

							
							
<!-- End Note to buyer -->						
<script type="text/javascript">
	jQuery(function(jQuery) {
		var jqTr_zindex = 11;
		$(".jqTransformSelect").jqTransform();

		$("div.jqTransformSelectWrapper, a.jqTransformSelectOpen").click(function() {
			$(this).css("z-index",jqTr_zindex);
			jqTr_zindex++;
		});
		
		$("button[title='Add to Cart']").click(function() {
			var flag = false;
			if($('#size').val()=="-- Please Select --") {
				$('#advice-required-entry-select_1').fadeIn(1000);
				flag = true;
			}else{
				$('#advice-required-entry-select_1').css('display','none');
			}
			if($('#color').val()=="-- Please Select --") {
				$('#advice-required-entry-select_2').fadeIn(1000);
				flag = true;
			}else{
				$('#advice-required-entry-select_2').css('display','none');
			}
			if (flag) return false;
			$("#ajax_loader").css("display","block");
			$.ajax({
				async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
				data:{
					"qty":$("input[name='qty']").val(),
					"id":$("input[name='productid']").val(),
					"options":{"size":$("select[name='size']").val(),"color":$("select[name='color']").val(),"misc":""},
					"action":"add"
				},success:function(d){
					$("#ajax_loader").css("display","none");
					$("div.alert").slideDown(1000, function() {
						$(this).delay(6000).slideUp(1000);
					});
					$("#mycart").html("My Cart ("+d.cartItems[0].cartItemCount+" items)");
					updateMiniCart();
				}
			});
			
			
		});
		$(".inner_alert > button").click(function() {
			$("div.alert").clearQueue();
			$("div.alert").slideUp(1000);
		});
		
	});
</script>					
					</div>