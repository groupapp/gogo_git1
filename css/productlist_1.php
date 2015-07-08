<?php
	$DB = new myDB;
	$pageTitle = "";
	$q	= $_GET["q"];
	$new= $_GET["new"];
	$sale= $_GET["sale"];
	$deal= $_GET["deal"];
	//print_r('xx'.$arrGet[0][0]);
//print($arrGet[0][0]);
//exit;	
	switch($arrGet[0][0]) {
		case "country":
		case "club":
		case "player":
		case "league":		
		/*$strSQL = "SELECT * FROM Products WHERE IsActive=\"Y\" AND IsHolidaySale=\"Y\"";
		print($strSQL);
		exit;
		break;	*/
		case "brand":
			$strSQL = "SELECT * FROM Products WHERE IsActive=\"Y\" AND ";
			$strSQL .= ($arrGet[0][0]=="brand")?"BrandName":$arrGet[0][0];
			$strSQL .= "=\"".$arrGet[0][1]."\"";
			$pagepath = "<p class=\"path-info\"><a href=\"?".$arrGet[0][0]."=more\">Shop By ".$arrGet[0][0]."</a></p></strong><span>/</span></li><li><strong>".$arrGet[0][1]."</strong></li>";
			$pagetitle = $arrGet[0][1];
			if ($arrGet[0][0]=="country")
				$strOrd = " ORDER BY DateTimeCreated DESC, DateTimeLastModified DESC, Cat1ID ASC, ProductName ASC";
			elseif ($arrGet[0][0]=="brand")
				$strOrd = " ORDER BY DateTimeCreated DESC, Cat1ID ASC, BrandName ASC, UnitPrice ASC";
			elseif ($arrGet[0][0]=="club")
				$strOrd = " ORDER BY DateTimeCreated DESC, ProductName ASC, Cat1ID ASC";
			break;
		case "c1":
			$strCatSQL = "SELECT Cat1Name FROM Category1 WHERE Cat1ID=".$arrGet[0][1];
			$strSQL = "SELECT * FROM Products WHERE IsActive=\"Y\" and Cat1ID=".$arrGet[0][1];
			$DB->query($strCatSQL);
			
			if ($DB->rows) {
				$data = $DB->fetch_row($DB->res);
				$pagetitle = $pagepath = $data[0];
			}
			
			if (!empty($c2)) {
				$strSQL .= " and Cat2ID=".$c2;
				$strCat2SQL = "SELECT Cat2Name FROM Category2 WHERE Cat2ID=".$c2;
				$DB->query($strCat2SQL);
				if ($DB->rows) {
					$data = $DB->fetch_row($DB->res);
					$pagepath = "<p class=\"path-info\"><a href=\"?".$arrGet[0][0]."=".$arrGet[0][1]."\">".$pagetitle."</a></p></strong><span>/</span></li><li><strong>".$data[0]."</strong></li>";
					$pagetitle = $data[0];
				}
			}
			
			$strOrd = " ORDER BY ProductID DESC";
			break;
		default:
			$strCatSQL = "SELECT Cat1Name FROM Category1 WHERE Cat1ID=".$arrGet[0][1];
			$strSQL = "SELECT * FROM Products WHERE IsActive=\"Y\" and Cat1ID=".$arrGet[0][1];
	}
	if (!empty($q))
	{
	$strSQL = "SELECT * FROM Products WHERE IsActive=\"Y\" and ProductName  LIKE '%".$q."%'";
	
	}
	elseif (!empty($new))
	{
	$strSQL = "SELECT * FROM Products WHERE IsActive=\"Y\" and DATEDIFF( DateTimeCreated, DATE_SUB( NOW( ) , INTERVAL 60 DAY ) ) >0 order by DateTimeCreated DESC";
	$pagetitle="New Arrivals";
	$pagepath=$pagetitle;
	}
	elseif (!empty($sale))
	{
	$strSQL = "SELECT *,(100*(UnitPrice-UnitPriceOnSale)/UnitPrice) as Rate FROM Products WHERE IsActive=\"Y\" and UnitPrice-UnitPriceOnSale>0 order by Rate DESC";
	$pagetitle="Sale items";
	$pagepath=$pagetitle;
	}
	elseif (!empty($deal))
	{
	$strSQL = "SELECT *,(100*(UnitPrice-UnitPriceOnSale)/UnitPrice) as Rate FROM Products WHERE IsActive=\"Y\" and (100*(UnitPrice-UnitPriceOnSale)/UnitPrice)>=60 order by UnitPrice DESC";
	$pagetitle="Deals of the week";
	$pagepath=$pagetitle;
	}
	
	
//exit;	
?>
<script type="text/JavaScript" src="/js/cloud-zoom.1.0.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.jqtransform.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.ajax').colorbox({rel:'ajax'});
	});
	</script>
<script type="text/javascript">
	function pladdwish(id){
	var reurl=document.getElementById('returnurl').value;
	//alert(reurl);
	window.location ="/lib/wish_action.php?position=list&action=add&id="+id+"&reurl="+reurl;
	}
</script>	

					<div class="main-col">
						<div class="page-path">
							<ul>
								<li class="home"><a href="/" title="Go to Home Page">Home</a><span>/ </span></li>
								<li class="home"><strong><?php echo $pagepath?></strong></li>
							</ul>
						</div>
						<div class="page-title">
							<h1><span><?php echo $pagetitle?></span></h1>
							<input type="hidden" id="returnurl" value="<?php echo $_SERVER['REQUEST_URI']?>" />
						</div>
						
					<?php if($arrGet[0][1]==57){?>	
						<script type="text/javascript">

						function GiftBlance() {
							var number=document.getElementById('gift_number').value;
							var code=document.getElementById('gift_code').value;
							if(number==''){
								alert("Please input Gift Certificate Number!");
								document.getElementById('gift_number').focus();
								return false;
							}
							if(code ==''){
								alert("Please input Authorization Code!");
								document.getElementById('gift_code').focus();
								return false;
							}
							var bal=checkgift(number,code) 
							alert(bal);
									//$('#billing\\:email').addClass("validation-failed");
						}
						</script>
						 <div class="title_sub">Check Balance</div>
						 <div class="sub1">
							<table>
								<tr>
									<td class="general" style="padding-top: 10px;">Gift Certificate Number :</td>
									<td class="general" style="padding-top: 10px;"><input type="text" name="gift_number" id="gift_number"></td>
									<td class="general" style="padding-top: 10px;">Authorization Code :</td>
									<td class="general" style="padding-top: 10px;"><input type="text" name="gift_code" id="gift_code"></td>
									<td class="general"><button type="button" onclick="GiftBlance()" name="btn_balance" class="button"><span>Check</span></button></td>
								</tr>
							</table>
						 </div>
						<?php }?>	
						
						
						<div class="category-products">
<?php
	$rowcount = 2;
	$count = 0;
	
	$DB->query($strSQL);
	$numrows = $DB->rows;
	
	/****** PAGING ******/
	if ($_COOKIE["itemspp"]) $LIMIT = $_COOKIE["itemspp"];
	$totalpps = ($LIMIT < 0)?1:ceil($numrows/$LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $LIMIT * ($pp - 1);
	if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
	//echo "<!-- ".$strSQL." -->";
	$DB->query($strSQL);
	if ($numrows) {
?>
							<div class="optionbox">
								<div class="pager">
									<p class="amount"><?php echo $numrows?> Item(s)</p>
									<div class="page-limiter">
										<p class="page-show">Showing</p>
										<ul>
<?php 
		for ($i=9; $i<40; $i*=2) {
			if ($i==$LIMIT)	
				echo "<li>".$i."</li>";
			else
				echo "<li><a href=\"javascript:void(0);\" onclick=\"listItems('itemspp',{$i})\">".$i."</a></li>";
		}
?>
										</ul>
									</div>
								</div>
							</div>
							
							<!-- //*****************************  PRODUCT LIST *******************************// -->
<?php
		while($data = $DB->fetch_array($DB->res)) {
			$count++;
			if ($count==1 || $count%3==1) echo "<ul class=\"products-list\">";
			if ($count%3==0) { $product_li_class = " last"; }else{ $product_li_class=""; }
			$href = "?pid=".$data["ProductID"];
?>
								<li class="item<?php echo $product_li_class?>">
									<div class="product-box" style="height: 32px">
										<h2 class="product-name">
											<a href="<?php echo $href?>" title=""><?php echo $data["ProductName"]?></a>
										</h2>
									</div>
									<div class="desc"><?php echo $data["ProductDescription"]?></div>
									<div class="grid-inner">
										<a href="<?php echo $href?>" title="" class="product-image"><img src="<?php echo PRODUCT_IMAGE_PATH . $data["Picture1"]?>"<?php echo imgFit($data["Picture1"], 170, 194)?>/></a>
									</div>
									<div class="price-wrapper">
										<div class="price-box">
											<span class="regular-price" id="product-price-25">
												<span class="price"><?php echo "\$".formatMoney($data["UnitPriceOnSale"])?></span>&nbsp;
												<span class="regprice"><?php echo "\$".formatMoney($data["UnitPrice"])?></span>
												<?php if(!empty($sale) || !empty($deal))
												echo "<span class=\"price\">(".round($data["Rate"],0)."%)</span>";
												?>
											</span>
										</div>
										<p class="no-rating">
											<a href="">Be the first to review this product</a>
										</p>
										<div class="actions">
											<a href="<?php echo $href?>" ><button type="button" title="" class="button btn-cart">
												<span>Add to Cart</span>
											</button></a>
											<a class="ajax" href="./contents/quickproduct.php?pid=<?php echo $data["ProductID"]?>">Quick</a>
											<!--a class="ajax" href="<?php echo $href?>">Q</a-->
											<span id="ajax_loader25" style="display: none;">
												<img src="/images/ajax_loader.gif" />
											</span>
											<ul class="add-to-links">
												<li><a href="#" title="Add to Wishlist" onclick="pladdwish(<?php echo $data["ProductID"]?>)" class="link-wishlist">Add to Wishlist</a></li>
												<!--<li><span class="separator">|</span>
													<a title="Add to Compare" href="#" onclick="ajaxCompare('http://','25');return false;" class="link-compare">Add to Compare</a>
													<div id="results"></div>
												</li>-->
											</ul>
										</div>
									</div>
								</li>
<?php
			if ($count>2 && $count%3==0) echo "</ul>";
		}
		echo (!$count%3==0)?"</ul>":"";
		echo "<div class=\"product-page-bar\">";
		$linkopt = arr2url($arrGet);
		if ($ord) $linkopt.="&or=".$ord;
		if (!empty($kw)) $linkopt.="&kw=".$kw;
		listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
		echo "</div>";
	} else {
		echo "Products not found.";
	}
?>	

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
				}
			});
		});
		$(".inner_alert > button").click(function() {
			$("div.alert").clearQueue();
			$("div.alert").slideUp(1000);
		});
		
	});
</script>					
							

							<!-- //*****************************  END PRODUCT LIST *******************************// -->
						</div>
					
					</div>
