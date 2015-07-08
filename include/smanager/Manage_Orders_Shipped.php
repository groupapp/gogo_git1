<?php 
	require_once("header.php");

	$MonthSelected	= $_GET["MonthSelected"];
	$YearSelected	= $_GET["YearSelected"];
	$aid	= empty($_GET["aid"])?"":$_GET["aid"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
	$btn	= empty($_POST["button"])?"":$_POST["button"];
	$pp		= empty($_GET["pp"])?null:$_GET["pp"];
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
				Shipped Orders
			</div>
			<div id="sub1">
				<form name="SelectYearMonthForm" method="get" action="Manage_Orders_Shipped.php">
					<table>
						<tr>
							<td class="general_c">
								Select Month and Year: &nbsp;
								<select name="MonthSelected">
								<?php 
									$thisMonth = date('m');
									$curMonth = date("F");
									echo $thisMonth;
									for($i = 1; $i<=12; $i++){
										$monName = date("F" , mktime(0, 0, 0, $i, 12));
										if($MonthSelected>0){
											if($i == $MonthSelected){
												//$monName = data("F" , mktime(0, 0, 0, $i, 10));
												echo "<option value=\"". $i . "\" selected>&nbsp; " . $monName . "</option>";
											}else{
												//$monName = data("F" , mktime(0, 0, 0, $i, 10));
												echo "<option value=\"". $i . "\">&nbsp; " . $monName . "</option>";
											}
										}else{
											if($i == $thisMonth){
												echo "<option value=\"". $i . "\" selected>&nbsp; " . $curMonth . "</option>";
											}else{
												echo "<option value=\"". $i . "\">&nbsp; " . $monName . "</option>";
											}									
										}
									}
								?>
								</select> &nbsp;
								<select name="YearSelected">
								<?php 
									$thisYear = date('Y');
									for($i = 2008; $i<=$thisYear; $i++){
										if($YearSelected>0){
											if($i == $YearSelected){
												echo "<option value=\"". $i . "\" selected>&nbsp; " . $i . "</option>";
											}else{
												echo "<option value=\"". $i . "\">&nbsp; " . $i . "</option>";
											}
										}else{
											if($i == $thisYear){
												echo "<option value=\"". $i . "\" selected>&nbsp; " . $i . "</option>";
											}else{
												echo "<option value=\"". $i . "\">&nbsp; " . $i . "</option>";
											}
										}
									}	
								?>
								</select> &nbsp;
								<input type="submit" name="submit" value="Submit">
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div id="sub2">
				<table>
					<tbody>
						<tr>
							<td colspan="8" class="subject2_c">Shipped Orders  (<?php
								if($MonthSelected!=null){
									echo $MonthSelected;
								}else{
									echo $thisMonth;
								}?> / <?php 
								if($YearSelected!=null){
									echo $YearSelected;
								}else{
									echo $thisYear;
								}?>)</td>
						</tr>
						<tr class="subject_border_top">
							<td class="subject">Order ID</td>
							<td class="subject">Order Date</td>
							<td class="subject">Confirmed Date</td>
							<td class="subject">Shipped Date</td>
							<td class="subject">Customer</td>
							<td class="subject">Shipping</td>
							<td class="subject">Shipping Method</td>
							<td class="subject">Total Amount</td>
						</tr>
<?php 
	$DB 	= new myDB;
	if($YearSelected!=null && $MonthSelected!=null){
		$strSQL = "SELECT * FROM Orders WHERE OrderConfirmed='Y' && ShippingConfirmed='Y' && ShippingConfirmedDateTime BETWEEN  '" . $YearSelected . "-" . $MonthSelected . "-01 00:00:00' 
		AND '" . $YearSelected . "-" . $MonthSelected . "-31 23:59:59'";
	}else{
		$strSQL = "SELECT * FROM Orders WHERE OrderConfirmed='Y' && ShippingConfirmed='Y' && ShippingConfirmedDateTime BETWEEN '" . $thisYear . "-" . $thisMonth . "-01:00:00:00'
		AND '" . $thisYear . "-" . $thisMonth++ . "-31 23:59:59'";
	}
	//$strSQL = "SELECT * FROM Orders Where OrderConfirmed='Y' && ShippingConfirmed='Y'";
	$strOrd	= " ORDER BY OrderID DESC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = ($LIMIT < 0)?1:ceil($numrows/$LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $LIMIT * ($pp - 1);
	if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
	$DB->query($strSQL);
	$color = 1;
	//echo $strSQL;
	while ($data = $DB->fetch_array($DB->res)){
		if($data["OrderDateTime"]<1){
			$ordTime="";
		}else{
			$ordTime = date("n/j/Y", strtotime($data["OrderDateTime"]));
		}
		if($data["OrderConfirmedDateTime"]<1){
			$ordConfTime="";
		}else{
			$ordConfTime = date("n/j/Y", strtotime($data["OrderConfirmedDateTime"]));
		}
		if($data["ShippingConfirmedDateTime"]<1){
			$shipConfTime="";
		}else{
			$shipConfTime = date("n/j/Y", strtotime($data["ShippingConfirmedDateTime"]));
		}
		$orderID = $data["OrderID"];
		echo "<tr class=\"";
		if($color<0){
			echo "subColor";
		}
		echo "\">";
		echo "<td class=\"general_c\"><a href=\"Manage_Orders_ViewOrderDetails.php?act=view&oid=" . $data["OrderID"] . "\">" . $data["OrderID"] . "</a></td>";
		echo "<td class=\"general\">" . $ordTime . "</td>";
		echo "<td class=\"general\">" . $ordConfTime . "</td>";
		echo "<td class=\"general\">" . $shipConfTime . "</td>";
		echo "<td class=\"general\">" . $data["MailingFirstName"] . "&nbsp;" . $data["MailingLastName"] . "</td>";
		echo "<td class=\"general\">" . $data["ShippingStreet"] . "</td>";
		echo "<td class=\"general\">" . $data["ShippingMethod"] . "</td>";
		echo "<td class=\"general\" style=\"text-align:right;\">$" . $data["TotalOrderAmount"] . "</td>";
		echo "</tr>";
		$DB2 = new myDB;
		$strSMSQL = "SELECT P.ProductName, C.Color, OI.ListOfSizeNames FROM OrderItems OI LEFT JOIN Products P ON OI.ProductID = P.ProductID LEFT JOIN Colors C ON P.ColorIDs = C.ColorID";
		$strSMSQL .= " WHERE OrderID = ".$orderID;
		$strSMOrd = "ORDER BY ProductID";
		$DB2->query($strSMSQL);
		echo "<tr class=\"";
		if($color<0){
			echo "subColor";
		}
		echo ("\">
				<td class=\"general\"></td>
				<td colspan=\"7\" style=\"padding: 1px 1px 1px 10px\">
				<ul class=\"bullet\">");
		while($dataProd = $DB2->fetch_array($DB2->res)){
			echo "<li><table style=\"margin-top:-15px;\"><tr><td style=\"width:50%\">" . $dataProd["ProductName"] . "</td>";
			echo "<td style=\"width:35%\">" . $dataProd["Color"] . "</td>";
			echo "<td style=\"width:15%\">". $dataProd["ListOfSizeNames"] . "</td></tr></table></li>";
		}
		echo "</ul></td>";	
		echo "</tr>";
		$totalProdAmount += $data["TotalProductAmount"];
		$totalAmount += $data["TotalOrderAmount"];
		$color *= -1;
	}
?>
						<tr class="subject_border_bottom">
							<th colspan="7" class="general" style="text-align:right;">$<?php echo formatMoney($totalProdAmount, 2);?></td>
							<th class="general" style="text-align:right;">$<?php echo formatMoney($totalAmount, 2); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
<?php 

		echo "<div class=\"product-page-bar\">";
		$linkopt = "&MonthSelected={$MonthSelected}&YearSelected={$YearSelected}";
		//if ($ord) $linkopt.="&or=".$ord;
		if (!empty($kw)) $linkopt.="&kw=".$kw;
		listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
		echo "</div>";

?>
		
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>