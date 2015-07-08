

<?php	
	
	require_once("../include/function.php");
	$pageTitle = "";
	$pid=$_GET["pid"];
//echo $pid;	
	if ($pid>0) {
		
		$DB = new myDB;
		
		//$pid = $arrGet[0][1];
		$strSQL = "SELECT * FROM Products WHERE ProductID=".$pid." AND IsActive=\"Y\"";
//echo $strSQL;		
		$DB->query($strSQL);
		if ($DB->rows) {
			$data = $DB->fetch_array($DB->res);
			$productname	= $data["ProductName"];
			$pagepath		= "<p class=\"path-info\"><a href=\"?c1=".$data["Cat1ID"]."\">".$DB->getCatID(1,$data["Cat1ID"])."</a></p></strong><span>/</span></li><li><strong>".$DB->getCatID(2,$data["Cat2ID"])."</strong></li>";
?>
					<div class="main-col">
	<script type="text/JavaScript" src="/js/cloud-zoom.1.0.3.min.js"></script>

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
													<a href="<?php echo PRODUCT_IMAGE_PATH.$data["Picture1"]?>" class="cloud-zoom" id="zoom1" rel="position:'right',zoomWidth:400,zoomHeight:400,tint:'#FFFFFF',tintOpacity:0.7,showTitle:1,titleOpacity:0.5,adjustX:10,adjustY:-4,softFocus:0">
														<img src="<?php echo PRODUCT_IMAGE_PATH.getThumbnailImage($data["Picture1"])?>" width="300" height="300" alt="" align="left" title="<?php echo $productname?>"/>
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
												<a href="<?php echo PRODUCT_IMAGE_PATH.$data["Picture".$i]?>" class="cloud-zoom-gallery" title="Thumbnail<?php echo $i?>" rel="useZoom:'zoom1', smallImage:'<?php echo PRODUCT_IMAGE_PATH.getThumbnailImage($data["Picture".$i])?>'"><img src="<?php echo PRODUCT_IMAGE_PATH.$data["Picture".$i]?>" width="50" /></a>
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
												<dt><label class="required"><em>*</em>Size:</label></dt>
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
											<!--<p class="required">* Required Fields</p>-->
										</div>											
<?php 
			}
				
			if ($arrGet[1]=="configure") {
				$qty = $_SESSION['cart']['$pid']['qty'];
			} else {
				$qty = 1;
			}
?>										
										<div class="product-options-foot">
											<div class="addto-cart">
												<div class="pricebox"><span class="price"><?php echo "$".$data["UnitPriceOnSale"]?></span></div>
												
												<label for="qty">Qty:</label>
												<input type="text" name="qty" maxlength="3" value="<?php echo $qty?>" title="Qty" class="input-text qty" />
												<input type="hidden" name="productid" value="<?php echo $data["ProductID"]?>" />
												<button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
												<span id="ajax_loader" style="display:none"><img src="/images/ajax_loader.gif"/></span>
											</div>
											<ul class="addto-links">
												<!--<li><a href="#" onclick="" class="link-wishlist">Add to Wishlist</a></li>
												<li><span class="separator">|</span>
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
							
<!-- End Note to buyer -->	
<script type="text/javascript">
	jQuery(function(jQuery) {
		var jqTr_zindex = 11;
		
		
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
				}
			});
			parent.jQuery.fn.colorbox.close();
		});
		$(".inner_alert > button").click(function() {
			$("div.alert").clearQueue();
			$("div.alert").slideUp(1000);
		});
		
	});
</script>					
					</div>