<?php
	require_once("header.php"); 
	$DB 	= new myDB;

	$MonthSelected_Shipped	= $_GET["MonthSelected_Shipped"];
	$YearSelected_Shipped	= $_GET["YearSelected_Shipped"];
	$YearSelected_Cancelled	= $_GET["YearSelected_Cancelled"];
	$oid	= empty($_GET["oid"])?"":$_GET["oid"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
	$btn	= empty($_POST["button"])?"":$_POST["button"];
	$pp		= empty($_GET["pp"])?null:$_GET["pp"];
	$status	= empty($_GET["status"])?null:$_GET["status"];

?>


	<!-- sideMenu -->
	<div class="path" style='display:none'>
	About Us</div>

	<div id="bodywrapper">
    
    <!-- sideMenu -->
		<div id="navLeft">
			<div style="font:bold 16px/1.2 Palatino Linotype;color:#aaa;">Lemontree Events
			</div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
				<br/>
				
			</div>
			
		</div>
		
		
		<!-- content right -->
		<div id="contwrapper">
			<div id="title">
				All Orders Test
			</div>
			<div id="sub1">
<?php 
	if($status){
?>			
				<p>
					<a href="http://sshop.i9biz.com/shopadmin/allordersTest.php">
						<input type="button" name="btn" value="Go to All Orders"/>
					</a>
				</p>
<?php }?>
				<table class="table_jy">
					<thead>
						<tr>
							<td class="subject1_2" style="width: 56px;">Order ID</td>
							<td class="subject1_2">Status</td>
							<td class="subject1_2">Date</td>
							<td class="subject1_2">Customer ID</td>
							<td class="subject1_2" style="width: 110px;">Customer Name</td>
							<td class="subject1_2">State</td>
							<td class="subject1_2">Country</td>
							<td class="subject1_2">Item</td>
							<td class="subject1_2">Qty.</td>
							<td class="subject1_2">Amount</td>
							<td class="subject1_2">Payment Type</td>
							<td class="subject1_2">Conf.By</td>
							<td class="subject1_2" style="width: 140px;">Shipped Date</td>
							<td class="subject1_2" style="width: 130px;">Tracking Number</td>
						</tr>
					</thead>
					<tbody>
<?php 
	if($status=="new"){
		$strSQL = "SELECT * FROM Orders WHERE OrderConfirmed='N' && ShippingConfirmed='N' && OrderCancelled='N' ORDER BY OrderID DESC";
	}elseif($status=="confirm"){
		$strSQL = "SELECT * FROM Orders WHERE OrderConfirmed='Y' && ShippingConfirmed='N' && OrderCancelled='N' ORDER BY OrderID DESC";
	}elseif($status=="shipped"){
		$strSQL = "SELECT * FROM Orders WHERE OrderConfirmed='Y' && ShippingConfirmed='Y' && OrderCancelled='N' ORDER BY OrderID DESC";
	}elseif($status=="cancel"){
		$strSQL = "SELECT * FROM Orders WHERE ShippingConfirmed='N' && OrderCancelled='Y' ORDER BY OrderID DESC";
	}elseif($status=="refund"){
		$strSQL = "SELECT * FROM Orders WHERE OrderConfirmed='Y' && ShippingConfirmed='Y' && OrderCancelled='Y' ORDER BY OrderID DESC";
	}else{
		$strSQL = "SELECT * FROM Orders ORDER BY OrderID DESC";
	}
//	echo $strSQL;
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = (25 < 0)?1:ceil($numrows/25);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = 25 * ($pp - 1);
	if (25 > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, 25";
	$DB->query($strSQL);
	$color = 1;
	while ($data = $DB->fetch_array($DB->res)){
?>
						<tr class="<?php if($color<0) echo "subColor";?>">
							<td class="general_c">
								<a href="Manage_Orders_ViewOrderDetails.php?act=view&oid=<?php echo $data["OrderID"];?>">
									<?php echo $data["OrderID"]?>
								</a>
							</td>
							<td class="general_c">
								<a href="http://sshop.i9biz.com/shopadmin/allordersTest.php?status=<?php 
								if($data["OrderConfirmed"]=="N"){
									if($data["OrderCancelled"]=="N"){
										echo "new";
									}else{
										echo "cancel";
									}
								}else{
									if($data["ShippingConfirmed"]=="Y"){
										if($data["OrderCancelled"]=="Y"){
											echo "refund";
										}else{
											echo "shipped";
										}
									}else{
										if($data["OrderCancelled"]=="N"){
											echo "confirm";
										}else{
											echo "cancel";
										}
									}
								}								
								?>">
									<button type="button" name="status" class="<?php 
	if($data["OrderConfirmed"]=="N"){
		if($data["OrderCancelled"]=="N"){
			echo "order_new";
		}else{
			echo "order_cancel";
		}
	}else{
		if($data["ShippingConfirmed"]=="Y"){
			if($data["OrderCancelled"]=="Y"){
				echo "order_refund";
			}else{
				echo "order_shipped";
			}
		}else{
			if($data["OrderCancelled"]=="N"){
				echo "order_confirm";
			}else{
				echo "order_cancel";
			}
		}
	}
?>">
<?php 
		if($data["OrderConfirmed"]=="N"){
			if($data["OrderCancelled"]=="N"){
				echo "NEW";
			}else{
				echo "cancelled";
			}
		}else{
			if($data["ShippingConfirmed"]=="Y"){
				if($data["OrderCancelled"]=="Y"){
					echo "REFUND";
				}else{
					echo "Shipped";
				}
			}else{
				if($data["OrderCancelled"]=="N"){
					echo "CONFIRMED";
				}else{
					echo "cancelled";
				}
			}
		}
?>
									</button>
								</a>
							</td>
							<td class="general"><?php echo $data["OrderDateTime"];?></td>
							<td class="general_c"><?php if($data["CustomerID"]==0) echo "Guest"; else echo $data["CustomerID"];?></td>
							<td class="general"><?php echo $data["MailingFirstName"]." ".$data["MailingLastName"];?></td>
							<td class="general_c"><?php echo $data["ShippingStateOrProvince"];?></td>
							<td class="general_c"><?php echo $data["ShippingCountry"];?></td>
							<td class="general">
<?php 	
		$strSQL2 = "SELECT * FROM OrderItems WHERE OrderID = ".$data["OrderID"];
		$DB2 = new myDB;
		$DB2->query($strSQL2);
		$data2 = $DB2->fetch_array($DB2->res);
?>
								<span id="plain_<?php echo $data["OrderID"];?>">
									<?php echo substr($data2["ProductName"], 0, 30);?>...
									<a href="Manage_Orders_ViewOrderDetails.php?act=view&oid=<?php echo $data["OrderID"];?>">more</a>
								</span>
							</td>
							<td class="general_c"><?php echo $data["TotalProductQuantity"];?></td>
							<td class="general"><?php echo $data["TotalOrderAmount"];?></td>
							<td class="general_c"><?php if($data["CreditCardName"]=="Amazon Checkout") echo "Amazon"; else echo $data["CreditCardName"];?></td>
							<td class="general"></td>
							<td class="general_c"><?php echo $data["ShippingConfirmedDateTime"];?></td>
							<td class="general_c"><?php echo $data["ShippingTrackingNo"];?></td>
						</tr>
<?php 
		$color *= -1;
	}
?>
					</tbody>
				</table>
			</div>
<?php 

		echo "<div class=\"product-page-bar\">";
		$linkopt = "SearchField={$SearchField}&SearchKeyword={$SearchKeyword}&status={$status}";
		//if ($ord) $linkopt.="&or=".$ord;
		if (!empty($kw)) $linkopt.="&kw=".$kw;
		listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
		echo "</div>";

?>
		</div>
	</div>			

	
<?php require_once("footer.php"); ?>