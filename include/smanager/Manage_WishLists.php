<?php 
	require_once("header.php"); 
	
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
				Items in Customers' Wish Lists
			</div>
			<div id="sub1">
				<table>
					<caption>Items sitting in customer's wish lists get automatically removed from the wish lists after one month.</caption>
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">No</td>
							<td class="subject1_2">PID</td>
							<td class="subject1_2">Product Name</td>
							<td class="subject1_2">Product Image</td>
							<td class="subject1_2">Unit Price</td>
			<!-- 			<td class="subject1_2">Quantities</td>
							<td class="subject1_2">Total Amount</td> -->
							<td class="subject1_2">Customer IDs</td>
						</tr>
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT W.WishlistID, P.ProductID, P.ProductName, P.Picture1, P.UnitPrice, CT.CustomerID
				FROM Wishlist W LEFT JOIN Products P ON W.ProductID = P.ProductID
				LEFT JOIN Customers CT ON W.LoginID = CT.LoginID";
	$strOrd	= " ORDER BY W.WishlistID DESC";
/*	$strSQL = "SELECT ProductID, ProductName, UnitPrice, TotalAmount, CustomerID 
				FROM Products LEFT JOIN OrderItems ON Products.ProductID = OrderItems.ProductID 
				Where IsWishList='Y'";
	$strOrd	= "ORDER BY ProductID DESC";*/
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = ($LIMIT < 0)?1:ceil($numrows/$LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $LIMIT * ($pp - 1);
	if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
	$DB->query($strSQL);
	$numTop = $numrows - ($pp-1)*$LIMIT;
	while ($data = $DB->fetch_array($DB->res)){
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general_c\">" . $numTop . "</td>";
		echo "<td class=\"general_c\">" . $data["ProductID"] . "</td>";
		echo "<td class=\"general\">" . $data["ProductName"] . "</td>";
		echo "<td class=\"general_c\">";
		echo "<a class=\"ajax\" href=\"/Images_Products/".$data["Picture1"]."\">";
		echo "<img src=\"/Images_Products/".$data["Picture1"]."\" width=\"60\" border=\"0\"></a></td>";
		echo "<td class=\"general_c\">$" . $data["UnitPrice"] . "</td>";
		echo "<td class=\"general_c\"><a href=\"Manage_Customers.php?act=view&aid=" . $data["CustomerID"] . "\">" . $data["CustomerID"] . "</a></td>";
		echo "</tr>";
		
		$total += $data["UnitPrice"];
		$numTop--;
	}
?>
						<tr>
							<td colspan="4" class="general"></td>
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