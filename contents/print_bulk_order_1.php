<?php 
	include_once dirname(__FILE__) . "/../include/function.php";
	
	$bulk_size 		= $_POST["bulk_size"];
	$bulk_color		= $_POST["bulk_color"];
	$bulk_BigNo 	= $_POST["bulk_BigNo"];
	$bulk_smallNo 	= $_POST["bulk_smallNo"];
	$bulk_ShortsNo 	= $_POST["bulk_ShortsNo"];
	$bulk_name 		= $_POST["bulk_name"];
	$bulk_row		= $_POST["bulk_row"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Bulk Order List</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/css/style_print.css"/>
		<script type="text/javascript" src="/js/jquery-1.7.1.js"></script>
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
											<div id="checkout-review-table-wrapper">
											
												<div class="inv-title-box left">
													<h2><span>Bulk Order List</span></h2>
												</div>
												<div class="bulk_order_info">
													<div class="order_from">
														<span>From:</span>
														<div>
															<ul>
																<li><div class="title">Name</div><div class="content"><input type="text" name="name" class="box"/></div></li>
																<li><div class="title">Phone #</div><div class="content"><input type="text" name="phone" class="box"/></div></li>
																<li><div class="title">Address</div><div class="content"><textarea name="address" ></textarea></div></li>
															</ul>
														</div>
													</div>
													<div class="ship_to">
														<span>Ship to:</span>
														<div>
															<ul>
																<li><div class="title">Name</div><div class="content"><input type="text" name="name" class="box"/></div></li>
																<li><div class="title">Phone #</div><div class="content"><input type="text" name="phone" class="box"/></div></li>
																<li><div class="title">Address</div><div class="content"><textarea name="address"></textarea></div></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="bulkList">
													<br/>
													<table class="bulkList_table">
														<thead>
															<tr>
																<th class="subject" style="border: 1px solid black;"></th>
																<th class="subject" style="border: 1px solid black;">Size1</th>
																<th class="subject" style="border: 1px solid black;">Color</th>
																<th class="subject" style="border: 1px solid black; width: 75px">Big #</th>
																<th class="subject" style="border: 1px solid black; width: 75px">Small #</th>
																<th class="subject" style="border: 1px solid black; width: 75px">Shorts #</th>
																<th class="subject" style="border: 1px solid black;">Name</th>
															</tr>
														</thead>
														<tbody>
	<?php for($i = 0; $i < $bulk_row; $i++){?>
															<tr>
																<td class="number" style="border: 1px solid black;"><?php echo $i+1;?></td>
																<td class="contents" style="border: 1px solid black;"><?php echo $bulk_size[$i];?></td>
																<td class="contents" style="border: 1px solid black;"><?php echo $bulk_color[$i];?></td>
																<td class="contents" style="border: 1px solid black;"><?php echo $bulk_BigNo[$i];?></td>
																<td class="contents" style="border: 1px solid black;"><?php echo $bulk_smallNo[$i];?></td>
																<td class="contents" style="border: 1px solid black;"><?php echo $bulk_ShortsNo[$i];?></td>
																<td class="contents" style="border: 1px solid black;"><?php echo $bulk_name[$i];?></td>
															</tr>

		
		
															
															
	<?php }?>														
														</tbody>
													</table>
													<br/>
													<span style="font: normal 17px/1.4 Arial, Helvetica, Sans-serif;">NOTE:</span><br/>
													<textarea></textarea>
												</div>
											    <p class="clear"></p>
											    <br/>
											    <div class="bulk_footer">
												    <div class="left">
												    	<h2>Fax: 1-213-381-1969</h2>
												    </div>
												    <div class="right">
												    	<b><a href="#" onclick="javascript:window.print();" style="font-size: 14px;">print</a></b>
												    </div>
											    </div>
											    <br/>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">												
		$(document).ready(function(){		
				<?php for($j = 0; $j < $bulk_row; $j++){?>
				$.ajax({
					async:false, type:"POST", dataType:"json", url:"../lib/cart_action.php",
					data:{
						"qty":"1",
						"id":"12890",
						"options":{"size":<?php echo $bulk_size[$j];?>,"color":<?php echo $bulk_color[$j];?>,"p_flag":"Y","p_name":<?php echo $bulk_name[$j];?>,"p_number":<?php echo $bulk_BigNo[$j];?>},
						"action":"add"
					},success:function(d){
						/*
						$("div.alert").slideDown(1000, function() {
							$(this).delay(6000).slideUp(1000);
						});
						$("#mycart").html("My Cart ("+d.cartItems[0].cartItemCount+" items)");*/
						updateMiniCart();
					}
				});
				<?php }?>
			});	
		</script>		
	</body>
</html>
