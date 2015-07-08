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
	$searchKeyword	= empty($_GET["searchKeyword"])?null:$_GET["searchKeyword"];
	$action	= empty($_GET["action"])?null:$_GET["action"];
	$today	= empty($_GET["today"])?null:$_GET["today"];
	if($today==1)
		$Today = date('Y-m-d');
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
		<div id="contwrapper" style="border-left: 1px solid #BBB;">
			<div id="title">
			<table >
			<tr>
			<td width="60%">
				All Orders
			</td>
			<td>
			<form name="searchOrder" method="get" action="Manage_Orders_All.php">
					<div class="general_c">
						Search  &nbsp;
						<input type="text" name="searchKeyword" value="<?php echo $searchKeyword;?>"/>&nbsp;
						<input type="submit" name="submitKeyword" value="Search"/>
					</div>
					
			</form>
			</td>
			</tr>
			</table>
			</div>
			<div style="position:fixed;left:50px;top:165px;">
			<h1>Today Order</h1><br>
			<a href="Manage_Orders_All.php?action=new&today=1">New</a><br><br>
			<a href="Manage_Orders_All.php?action=processing&today=1">Processing</a><br><br>
			<a href="Manage_Orders_All.php?action=shipped&today=1">Shipped</a><br><br>
			<a href="">Back Order</a><br><br>
			<a href="Manage_Orders_All.php?action=cancel&today=1">Cancealled</a><br><br>
			<a href="Manage_Orders_All.php?action=refund&today=1">Returned</a><br><br>
			<h1>Order</h1><br>
			<a href="Manage_Orders_All.php?action=new">New</a><br><br>
			<a href="Manage_Orders_All.php?action=processing">Processing</a><br><br>
			<a href="Manage_Orders_Shipped.php">Shipped</a><br><br>
			<a href="">Back Order</a><br><br>
			<a href="Manage_Orders_Cancelled.php">Cancealled</a><br><br>
			<a href="Manage_Orders_All.php?action=refund">Returned</a><br><br>
			
			</div>
			<div id="sub1">
			
			<form name="statusUpdate" method="post" action="Manage_Orders_All_action.php">
					<div class="general_c" style="text-align: left;">
					<p>
						Status  &nbsp;
						<select  name="status" >
						<option value="">-Select-</option>
						<option value="new">New</option>
						<option value="processing">Processing</option>
						<option value="shipped">Shipped</option>
						<option value="back">Back Order</option>
						<option value="cancel">Cancealled</option>
						<option value="refund">Returned</option>
						</select>
						<input type="submit" name="statuskey" value="Update"/>
					</p>
					</div>
				<table class="table_jy">
					<thead>
						<tr>
							<td class="subject1_2"  style="width: 20px;"></td>
							<td class="subject1_2" style="width: 56px;">Order No</td>
							<td class="subject1_2" style="width: 110px;">Company(Customer)</td>
							<td class="subject1_2">Total</td>
							<td class="subject1_2">ORG</td>
							<td class="subject1_2">Date</td>
							<td class="subject1_2">Status</td>
							<td class="subject1_2">Payment</td>
							<td class="subject1_2">PO</td>
							<td class="subject1_2">Invoice</td>
							<!--<td class="subject1_2">Customer ID</td>-->
							
							<!--<td class="subject1_2">State</td>
							<td class="subject1_2">Country</td>
							<td class="subject1_2">Item</td>
							<td class="subject1_2">Qty.</td>-->
							
							<!--
							<td class="subject1_2">Conf.By</td>
							<td class="subject1_2" style="width: 140px;">Shipped Date</td>
							<td class="subject1_2" style="width: 130px;">Tracking Number</td>-->
						</tr>
					</thead>
					<tbody>
<?php 
	/*if($status=="new"){
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
	}*/
	$strSQL = "SELECT * FROM Orders WHERE 1=1";
	if ($searchKeyword!="")
	{
		$strSQL .=" and (CONCAT(OrderID) like '".$searchKeyword."%') or (MailingCompanyName like '".$searchKeyword."%') or (MailingFirstName like '".$searchKeyword."%') or (MailingLastName like '".$searchKeyword."%')";	
	}
	
	if($today==1)
	{
		if($action=='new')
		$strSQL .=" and OrderConfirmed='N' and ShippingConfirmed='N' and OrderCancelled='N' and OrderDateTime LIKE '".$Today."%'";

		else if($action=='processing')
		$strSQL .=" and OrderConfirmed='Y' and ShippingConfirmed='N' and OrderCancelled='N' and OrderConfirmedDateTime LIKE '".$Today."%'";

		else if($action=='shipped')
		$strSQL .=" and OrderConfirmed='Y' and ShippingConfirmed='Y' and OrderCancelled='N' and ShippingConfirmedDateTime LIKE '".$Today."%'";

		else if($action=='cancel')
		$strSQL .=" and ShippingConfirmed='N' and OrderCancelled='Y' and OrderCancelledDateTime LIKE '".$Today."%'";

		else if($action=='refund')
		$strSQL .=" and Orders SET OrderConfirmed='Y' and ShippingConfirmed='Y'";
	}
	else
	{
		if($action=='new')
		$strSQL .=" and OrderConfirmed='N' and ShippingConfirmed='N' and OrderCancelled='N'";

		else if($action=='processing')
		$strSQL .=" and OrderConfirmed='Y' and ShippingConfirmed='N' and OrderCancelled='N'";

		else if($action=='shipped')
		$strSQL .=" and OrderConfirmed='Y' and ShippingConfirmed='Y' and OrderCancelled='N'";

		else if($action=='cancel')
		$strSQL .=" and ShippingConfirmed='N' and OrderCancelled='Y' ";

		else if($action=='refund')
		$strSQL .=" and Orders SET OrderConfirmed='Y' and ShippingConfirmed='Y'";
	}
	$strSQL .=" ORDER BY OrderID DESC";
//echo $strSQL;
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
						<tr class="<?php if($color<0) echo "subColor";?>" >
							<td class="general">
							<input type="checkbox" name="orderchk[]" id="orderchk" value="<?php echo $data["OrderID"];?>">
							</td>
							<td class="general_c" onclick="detail(<?php echo $data["OrderID"];?>)" style="cursor:pointer;">
									<?php echo $data["OrderID"]?>
								
							</td>
							<td class="general_c" onclick="detail(<?php echo $data["OrderID"];?>)" style="cursor:pointer;">
							<?php echo $data["MailingCompanyName"]."(".$data["MailingFirstName"]." ".$data["MailingLastName"].")";?></td>

								<td class="general_c" onclick="detail(<?php echo $data["OrderID"];?>)" style="cursor:pointer;"><?php echo $data["TotalOrderAmount"];?></td>
								
								
								<td class="general_c" onclick="detail(<?php echo $data["OrderID"];?>)" style="cursor:pointer;"><?php echo $data["TotalOOrderAmount"];?></td>
							<td class="general_c" onclick="detail(<?php echo $data["OrderID"];?>)" style="cursor:pointer;"><!--<a href="Manage_Orders_ViewOrderDetails.php?act=view&oid=<?php echo $data["OrderID"];?>">--><?php echo $data["OrderDateTime"];?></td>
							
								<td class="general_c" onclick="detail(<?php echo $data["OrderID"];?>)" style="cursor:pointer;">
								
									<button type="button" name="status" class="status_btn <?php 
	
	/*
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
	}*/

	if($data["Status"]=="new")
			echo "order_new";
		else if($data["Status"]=="processing")
			echo "order_confirm";
		else if($data["Status"]=="hold")
			echo "order_new";
		else if($data["Status"]=="shipped")
			echo "order_shipped";
		else if($data["Status"]=="partially_shipped")
			echo "order_shipped";
		else if($data["Status"]=="backorder")
			echo "order_shipped";
		else if($data["Status"]=="cancel")
			echo "order_cancel";
		else if($data["Status"]=="refund")
			echo "order_refund";
?>">
<?php 
	/*	
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
					echo "PROCESSING";
				}else{
					echo "cancelled";
				}
			}
		}*/
		if($data["Status"]=="new")
			echo "NEW";
		else if($data["Status"]=="processing")
			echo "PROCESSING";
		else if($data["Status"]=="hold")
			echo "HOLD";
		else if($data["Status"]=="shipped")
			echo "Shipped";
		else if($data["Status"]=="partially_shipped")
			echo "P_SHIPPED";
		else if($data["Status"]=="backorder")
			echo "BACKORDER";
		else if($data["Status"]=="cancel")
			echo "cancelled";
		else if($data["Status"]=="refund")
			echo "REFUND";
		
?>
									</button>
								
							</td>
							<td class="general_c" onclick="detail(<?php echo $data["OrderID"];?>)" style="cursor:pointer;">
							<!--<a href="Manage_Orders_ViewOrderDetails.php?act=view&oid=<?php echo $data["OrderID"];?>">-->
							<?php if($data["CreditCardName"]=="Amazon Checkout") echo "Amazon"; else echo $data["CreditCardName"];?><!--</a>--></td>
							<td class="general_c">
							<?php
							echo "<a href=\"#\" onclick=\"Popup=window.open('Print_PODetails.php?oid=".$data["OrderID"]."','Popup','scrollbars=yes,resizable=yes,width=1060,height=880'); return false;\"";
											echo " style=\"text-decoration: none; color: #0110DD;\">";
											echo "<input type=\"button\" name=\"buttonPrint\" value=\"PO Print\"/>";
							?>
							</td>
							<td class="general_c">
							<?php
							echo "<a href=\"#\" onclick=\"Popup=window.open('Print_InvoiceDetails.php?oid=".$data["OrderID"]."','Popup','scrollbars=yes,resizable=yes,width=1060,height=880'); return false;\"";
											echo " style=\"text-decoration: none; color: #0110DD;\">";
											echo "<input type=\"button\" name=\"buttonPrint\" value=\"Invoice Print\"/>";
							?>
							</td>
							



							
						</tr>
<?php 
		$color *= -1;
	}
?>
							

					</tbody>
				</table>
				</form>
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
<script type="text/javascript">
function detail(id){
location="Manage_Orders_ViewOrderDetails.php?act=view&oid="+id;
}
</script>
	
<?php require_once("footer.php"); ?>