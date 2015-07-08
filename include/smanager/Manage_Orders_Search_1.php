<?php 
	require_once("header.php"); 
	
	$action		= $_REQUEST["action"];
	$OrderID	= $_REQUEST["OrderID"];
	//Search parameters
	$s_onumber 				= $_GET["s_onumber"];
	$s_odate 				= $_GET["s_odate"];
	$s_cnumber 				= $_GET["s_cnumber"];
	$s_cname 				= $_GET["s_cname"];
	$s_cemail 				= $_GET["s_cemail"];
	$s_cphone 				= $_GET["s_cphone"];
	$s_address 				= $_GET["s_address"];
	$s_city 				= $_GET["s_city"];
	$s_state 				= $_GET["s_state"];
	$s_zipcode 				= $_GET["s_zipcode"];
	$s_country				= $_GET["s_country"];
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
				Search Orders
			</div>
			<div id="sub1">
				<form name="form" method="get" action="Manage_Orders_Search.php" onsubmit="return SearchOrders(this);">
					<table>
						<tbody>
							<tr class="subject_border_top">
								<td class="subject1_2">Order Number</td>
								<td class="subject1_2">Order Date (YYYY-MM-DD)</td>
								<td class="subject1_2">Customer Number</td>
								<td class="subject1_2">Customer Name</td>
								<td class="subject1_2">Customer E-Mail</td>
								<td class="subject1_2">Customer Phone</td>
							</tr>
							<tr align="center">
								<td class="general_c">
									<input type="text" name="s_onumber" value="<?php echo $s_onumber; ?>"/>
								</td>
								<td class="general_c">
									<input type="text" name="s_odate" value="<?php echo $s_odate; ?>"/>
								</td>
								<td class="general_c">
									<input type="text" name="s_cnumber" value="<?php echo $s_cnumber; ?>"/>
								</td>
								<td class="general_c">
									<input type="text" name="s_cname" value="<?php echo $s_cname; ?>"/>
								</td>
								<td class="general_c">
									<input type="text" name="s_cemail" value="<?php echo $s_cemail; ?>"/>
								</td>
								<td class="general_c">
									<input type="text" name="s_cphone" value="<?php echo $s_cphone; ?>"/>
								</td>
							</tr>
							<tr>
								<td class="subject1_2">Address</td>
								<td class="subject1_2">City</td>
								<td class="subject1_2">State</td>
								<td class="subject1_2">Zip Code</td>
								<td class="subject1_2">Country</td>
								<td class="subject1_2"></td>
							</tr>
							<tr class="subject_border_bottom">
								<td class="general_c">
									<input type="text" name="s_address" value="<?php echo $s_address; ?>"/>
								</td>
								<td class="general_c">
									<input type="text" name="s_city" value="<?php echo $s_city; ?>"/>
								</td>
								<td class="general_c">
									<input type="text" name="s_state" value="<?php echo $s_state; ?>"/>
								</td>
								<td class="general_c">
									<input type="text" name="s_zipcode" value="<?php echo $s_zipcode; ?>"/>
								</td>
								<td class="general_c">
									<input type="text" name="s_country" value="<?php echo $s_country; ?>"/>
								</td>
								<td class="general_c"></td>
							</tr>
							<tr>
								<td colspan="6" class="general , btns">
									<input type="submit" value="Search" id="btn_serch"/>
									<input type="hidden" name="action" value="search"/>
								</td>
							</tr>
						</tbody>
					</table>					
				</form>
<?php 
	$DB 	= new myDB;
	if($action == "search"){
		$strSCHSQL = (" Where");
		if($s_onumber != null){
			$strSCHSQL .= (" OrderID LIKE '%" . $s_onumber . "%' AND");
		}
		if($s_odate != null){
			$strSCHSQL .= (" OrderDateTime BETWEEN '" . $s_odate . " 00:00:00' AND '" . $s_odate . " 23:59:59' AND");
		}
		if($s_cnumber != null){
			$strSCHSQL .= (" CustomerID LIKE '%" . $s_cnumber . "%' AND");
		}
		if($s_cname != null){
			$strSCHSQL .= (" (MailingFirstName LIKE '%" . $s_cname . "%' OR MailingLastName LIKE '%" . $s_cname . "%') AND");
		}
		if($s_cemail != null){
			$strSCHSQL .= (" MailingEmailAddress LIKE '%" . $s_cemail . "%' AND");
		}
		if($s_cphone != null){
			$strSCHSQL .= (" MailingPhone LIKE '%" . $s_cphone . "%' AND");
		}
		if($s_address != null){
			$strSCHSQL .= (" (ShippingStreet LIKE '%" . $s_address . "%' OR MailingStreet LIKE '%" . $s_address . "%') AND");
		}
		if($s_city != null){
			$strSCHSQL .= (" (ShippingCity LIKE '%" . $s_city . "%' OR MailingCity LIKE '%" . $s_city . "%') AND");
		}
		if($s_state != null){
			$strSCHSQL .= (" (ShippingStateOrProvince LIKE '%" . $s_state . "%' OR MailingStateOrProvince LIKE '%" . $s_state . "%') AND");
		}
		if($s_zipcode != null){
			$strSCHSQL .= (" (ShippingZipcode LIKE '%" . $s_zipcode . "%' OR MailingZipcode LIKE '%" . $s_zipcode . "%') AND");
		}
		if($s_country != null){
			$strSCHSQL .= (" (ShippingCountry LIKE '%" . $s_country . "%' OR MailingCountry LIKE '%" . $s_country . "%') AND");
		}
		$strSCHSQL .= " 1=1";
		
		$strSQL = "SELECT * FROM Orders ".$strSCHSQL;
	//	echo $strSQL;
		$strOrd	= " ORDER BY OrderID DESC";
		$DB->query($strSQL);
		$numrows = $DB->rows;
		$totalpps = ($LIMIT < 0)?1:ceil($numrows/$LIMIT);
		if ($pp < 1 || $pp > $totalpps) $pp = 1;
		$list_num = $LIMIT * ($pp - 1);
		if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
		$DB->query($strSQL);
		
		echo ("
				<table style=\"border-top: 2px solid #BBB; border-bottom: 2px solid #BBB;\">
				<tbody>
				<tr>
				<td class=\"subject1_2\">Order ID</td>
				<td class=\"subject1_2\">Order Date</td>
				<td class=\"subject1_2\">Customer</td>
				<td class=\"subject1_2\">Billing State / Country</td>
				<td class=\"subject1_2\">Shipping State / Country</td>
				<td class=\"subject1_2\">Product Amount</td>
				<td class=\"subject1_2\">Total Amount</td>
				</tr>
				");


		while ($data = $DB->fetch_array($DB->res)){
			if($data["OrderDateTime"]<1){
				$orderDate="";
			}else{
				$orderDate = date("n/j/Y", strtotime($data["OrderDateTime"]));
			}
				?>
						<tr class="thin_border_bottom">
							<td class="general_c"><a href="Manage_Orders_ViewOrderDetails.php?act=view&oid=<?php echo $data["OrderID"];?>"><?php echo $data["OrderID"]?></a></td>
							<td class="general"><?php echo $orderDate; ?></td>
							<td class="general"><?php echo $data["MailingFirstName"] . "&nbsp;" . $data["MailingLastName"]?></td>
							<td class="general"><?php echo $data["MailingStateOrProvince"] . " / " . $data["MailingCountry"]?></td>
							<td class="general"><?php echo $data["ShippingStateOrProvince"] . " / " . $data["ShippingCountry"]?></td>
							<td class="general" style="text-align: right;">$<?php echo $data["TotalProductAmount"]; ?></td>
							<td class="general" style="text-align: right;">$<?php 	
									$TotalOrderAmount = $data["TotalProductAmount"] - $data["PreviousCreditAmount"];
									$TotalOrderAmount += $data["PreviousPenaltyAmount"];
									$TotalOrderAmount -= $data["DiscountAmount"];
									$TotalOrderAmount += $data["LocalSalesTax"];
									$TotalOrderAmount += $data["HandlingCharge"];
									$TotalOrderAmount += $data["ShippingCharge"];
									echo $TotalOrderAmount;
							 	?>
							</td>
						</tr>
	<?php } ?>
					</tbody>
				</table>
				<br/>
				<?php 
			echo "<div class=\"product-page-bar\">";
			$linkopt = "&s_onumber={$s_onumber}&s_odate={$s_odate}&s_cnumber={$s_cnumber}&s_cname={$s_cname}
			&s_cemail={$s_cemail}&s_cphone={$s_cphone}&s_address={$s_address}&s_city={$s_city}&s_state={$s_state}
			&s_zipcode={$s_zipcode}&s_country={$s_country}&action={$action}";
			
			if (!empty($kw)) $linkopt.="&kw=".$kw;
			listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
			echo "</div>";
	}
		?>
			</div>
		
		
<?php require_once("footer.php"); ?>