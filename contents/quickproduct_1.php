

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
					<div class="main-col" style="max-height:500px;">
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
											<ul style="width:300px;">
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
										<div class="product-desc"><?php //echo $data["ProductDescription"]?></div>
										<?php if($data["BrandName"]){?>
										<p style="font-weight: normal; color: #2F2F2F;">Brand: <b><?php echo $data["BrandName"];?></b></p>
										<?php }?>
										<p><span style="font-weight: normal; color: #2F2F2F;">Item Number:</span> <?php echo $data["StyleNo"];?></p>
										<p class="availability instock">
											This item is made <strong>FOR <?php echo strtoupper($data["ForMenOrWomen"])?></strong>
										</p>
<?php 
			if (!empty($data["SizeChartID"]) || $data["ColorIDs"]!="1") {
?>										
										<div class="product-options">
											<dl>
<?php			if (!empty($data["SizeChartID"]) && $data["SizeChartID"]!=136) {
//					
				//if ($data["SizeChartID"] != 136){
				$sizes = $DB->getSizeRun($data["SizeChartID"]);
					$DB7 = new myDB;
					$smallSQL1 = "SELECT * FROM `Size` WHERE `SizeChartID` = ".$data["SizeChartID"]." ORDER BY `Order`, `SizeID` ASC";
					$DB7->query($smallSQL1);
					if ($DB7->rows) {
					
						$data7 = $DB7->fetch_array($DB7->res);																
						$tsize=  $data7["SizeChartName"];
					
?>										
												<dt><label class="required"><!--<em>*</em>-->Size:</label><?php echo $tsize?></dt>
<?php 
				     }
			}	


				if (!empty($data["PackChartID"]) ) {
					$sizes = $DB->getSizeRun($data["PackChartID"]);
					$DB11 = new myDB;
					$larSQL1 = "SELECT * FROM Pack WHERE PackChartID = ".$data["PackChartID"];
					//echo $smallSQL1;
					$DB11->query($larSQL1);
					if ($DB11->rows) {

						$data11 = $DB11->fetch_array($DB11->res);																
						$tpack=  $data11["PackChartName"];
					
?>										
												<dt><label class="required"><!--<em>*</em>-->Pack:</label><?php echo $tpack?><input type="hidden" id="tsize" name="tsize" value="<?php echo $tsize."(".$tpack.")"?>"></dt>
												<?php 
				     }
			}	

			if ($data["ColorIDs"]!="1") {
				$colors = $DB->getColorRun($data["ColorIDs"]);
			}

?>
<?php
						
			if(count($colors)>0){	
							
?>	
						<dt><label class="required"><em>*</em>Color:</label></dt>
						<table> 
						<tr>
						<td>Size</td><td>Color</td><td>QTY</td>
						</tr>
						<input  type="hidden" id="PrepackQuantity" name="PrepackQuantity" value="<?php echo $data["PrepackQuantity"]?>">
															
			<?php 					
				for ($i=0; $i<count($colors); $i++) {
			?>
			
								<input  type="hidden" id="fill_<?php echo $colors[$i]?>" name="fill[]" value="">
								<tr><td><span id="tsize"><?php echo $tsize?></span></td><td><span id=""><?php echo $colors[$i]?></span><!--<input  type="text" id="bulk_color_3" name="bulk_color1[]" value="<?php echo $colors[$i]?>">--></td>

								<td><input  type="number" id="bulk_<?php echo $colors[$i]?>" name="bulkcolor[]"  onchange="fill('<?php echo $colors[$i]?>')" maxlength="3" min="1" max="99" value="0" title="Qty"  /></td></tr>

			<?php 
				}			
			?>
							</table>		



<?php 
			} else {
									
				$DB19 = new myDB;
				$YSQL1 = "SELECT * FROM `ProductColors` WHERE `ProductID` = ".$data["ProductID"];
				$DB19->query($YSQL1);
				if($DB19->rows>0)
				{
					echo "<dt><label class=\"required\"><em>*</em>Color:</label></dt>";
					echo "<dd>";
					echo "<div class=\"jqTransformSelect\">";
					echo "<select name=\"color\" id=\"color\">";
					echo "<option>-- Please Select --</option>";
					
					for ($j=1; $j<16; $j++) {
					
					$imagechk=$data["Picture".$j];
					
						if ($imagechk!="")
						{
							$DB10 = new myDB;
							$XSQL1 = "SELECT * FROM `ProductColors` WHERE `ProductID` = ".$data["ProductID"]." and imageno=".$j." ORDER BY `Color`";
							$DB10->query($XSQL1);
							
							$colorname="";
							while ($data10 = $DB10->fetch_array($DB10->res)){
								$colorname.=$data10["Color"]." /";
								
							}
							$colorname=substr($colorname,0,strlen($colorname)-2);
							echo "<option value=\"" .$colorname."\">".$colorname."</option>";
							
						}
					}
					echo "</select>";
					echo "<div class=\"validation-advice\" id=\"advice-required-entry-select_2\" style=\"display:none\">This is a required field.</div>";
					echo "</div>";
					echo "</dd>";
				}
			}

?>
											</dl>
<?php 		if(count($colors)>1){?>
											<p class="required">* Required Fields</p>
<?php 		}?>
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
												<label for="qty"></label>
												<input type="hidden" name="qty" maxlength="3" value="<?php echo $qty?>" title="Qty" class="input-text qty" />
												<input type="hidden" name="productid" value="<?php echo $data["ProductID"]?>" />
												<input type="button" id="qclick"  onclick="x()" title="Quick Add to Cart" class="button btn-cart" value="Add to Cart"><!--<span>Add to Cart</span>-->
												<span id="ajax_loader" style="display:none"><img src="/images/ajax_loader.gif"/></span>
											</div>
											<ul class="addto-links">
												<!--<li><a href="#" onclick="" class="link-wishlist">Add to Wishlist</a></li>
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
						
							<!--<div class="product-collateral">
       
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
										
									</div>
								</div>
							</div>					
							
<!-- End Note to buyer -->	
<script type="text/javascript">
	
	function fill(color) {
		$('#fill_'+color).val(color+';'+$('#bulk_'+color).val());
		//document.getElementById('fill_'+color).value=color+';'+document.getElementById('bulk_'+color).value;
		//alert(color);
	}
	function x() {
		//alert('yyyy');

		var emblem	= ($('#attachemblem').is(':checked')) ? "1" : "0";
			var flag 	= false;
			var pflag	= ($('#personalizeit:checked').val()=="Y")? "Y":"N";
			
			
			var frmData1	= $('form').serializeArray();
		//	alert($('#tsize').text());
			//if (flag) return false;
			$("#ajax_loader").css("display","block");
			frmData1.push({name:"action", value:"add"},{name:"id", value:$('input[name="productid"]').val()},{name:"p_flag", value:"C"},{name:"PrepackQuantity", value:$('#PrepackQuantity').val()});
			frmData1.push({name:"tsize", value:$('#tsize').text()},{name:"options[color]", value:$('#bulk_color_3').val()});
			
			$.ajax({
				async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
				data:frmData1,
					success:function(d){
					$("#ajax_loader").css("display","none");
					$("div.alert").slideDown(1000, function() {
						$(this).delay(6000).slideUp(1000);
					});
					$("#mycart").html("My Cart ("+d.cartItems[0].cartItemCount+" items)");
					updateMiniCart();
				}
			});				

		parent.jQuery.fn.colorbox.close();
	}

	jQuery(function(jQuery) {
		var jqTr_zindex = 11;
		
		//$("button[title='Quick Add to Cart']").click(function() {
		/*$("#qclick").click(function() {
			alert('xxx');
			
			//parent.jQuery.fn.colorbox.close();
		});*/
		$(".inner_alert > button").click(function() {
			$("div.alert").clearQueue();
			$("div.alert").slideUp(1000);
		});
		
	});
</script>					
					</div>