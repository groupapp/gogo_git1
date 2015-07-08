<?php 
	require_once("header.php"); 
	
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
		<div id="contwrapper">
			<div id="title">
				Items in Customers' Shopping Bags
			</div>
			<div id="sub1">
				<table style="border-bottom: 2px solid #BBB;" >
					<caption>
						Items sitting in customer's shopping bags get automatically removed from their shopping bags after 2 weeks.
					</caption>
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">No</td>
							<td class="subject1_2">PID</td>
							<td class="subject1_2">Product Name</td>
							<td class="subject1_2">Product Image</td>
							<td class="subject1_2">Unit Price</td>
							<td class="subject1_2">Quantities</td>
							<td class="subject1_2">Total Amount</td>
							<td class="subject1_2">Customer IDs & IP Addresses</td>
						</tr>
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT ProductID, ProductName, UnitPrice, TotalAmount, CustomerID, IP_Address 
				FROM Products LEFT JOIN OrderItems ON Products.ProductID = OrderItems.ProductID 
				Where IsWishList='N'";
	$strOrd	= "ORDER BY ProductID DESC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = ($LIMIT < 0)?1:ceil($numrows/$LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $LIMIT * ($pp - 1);
	if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
	$DB->query($strSQL);
	$NumItems = 1;
	while ($data = $DB->fetch_array($DB->res)){
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general_c\">" . $NumItems . "</td>";
		echo "<td class=\"general_c\">" . $data["ProductID"] . "</td>";
		echo "<td class=\"general\">" . $data["ProductName"] . "</td>";
		echo "<td class=\"general\">";
		echo "<a href=\"#\" onclick=\"openPopupWindow('../ViewImages.php?ProductID=" . $data["CustomerName"] . "','ImageView','scrollbars=no,resizable=yes,width=600,height=600')\">";
		echo "<img src=\"\" width=\"60\" border=\"0\"></a></td>";
		echo "<td class=\"general_c\">" . $data["UnitPrice"] . "</td>";
		echo "<td class=\"general_c\">/*Quantities*/</td>";
		echo "<td class=\"general_c\">" . $data["TotalAmount"] . "</td>";
		echo "<td class=\"general\">CIDs : <a href=\"Manage_Customers.php?act=view&aid=" . $data["CustomerID"] . "\">" . $data["CustomerID"] . "</a><br/>";
		echo "IPs : " . $data["IP_Address"] . "</td>";
		echo "</tr>";
		
		$total += $data["TotalAmount"];
		$NumItems++;
	}
?>
						<tr>
							<td colspan="6" class="general"></td>
							<th style="text-align: right;" class="general">$<?php echo formatMoney($total, 2);?></th>
							<td class="general"></td>
						</tr>
						
					</tbody>
				</table>
			</div>
<?php 

		echo "<div class=\"product-page-bar\">";
		$linkopt = "";
		//if ($ord) $linkopt.="&or=".$ord;
		if (!empty($kw)) $linkopt.="&kw=".$kw;
		listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
		echo "</div>";

?>
		
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>