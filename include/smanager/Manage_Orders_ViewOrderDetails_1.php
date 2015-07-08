<?php 
	require_once("header.php"); 

	$ShippingTrackingNo			= $_POST["ShippingTrackingNo"];
	$PONo						= $_POST["PONo"];
	$InvoiceNo					= $_POST["InvoiceNo"];
	$promotionalCode			= $_POST["promotionalCode"];
	$AuthorizationCode			= $_POST["AuthorizationCode"];
	$Sweight					= $_POST["Sweight"];
	$MailingFirstName			= $_POST["MailingFirstName"];
	$MailingLastName			= $_POST["MailingLastName"];
	$ShippingFirstName			= $_POST["ShippingFirstName"];
	$ShippingLastName			= $_POST["ShippingLastName"];
	$MailingStreet				= $_POST["MailingStreet"];
	$ShippingStreet				= $_POST["ShippingStreet"];
	$MailingCompanyName			= $_POST["MailingCompanyName"];
	$ShippingCompanyName		= $_POST["ShippingCompanyName"];
	$MailingCity				= $_POST["MailingCity"];
	$ShippingCity				= $_POST["ShippingCity"];
	$MailingStateOrProvince		= $_POST["MailingStateOrProvince"];
	$ShippingStateOrProvincee	= $_POST["ShippingStateOrProvince"];
	$MailingZipcode				= $_POST["MailingZipcode"];
	$ShippingZipcode			= $_POST["ShippingZipcode"];
	$MailingCountry				= $_POST["MailingCountry"];
	$ShippingCountry			= $_POST["ShippingCountry"];
	$MailingPhone				= $_POST["MailingPhone"];
	$ShippingPhone				= $_POST["ShippingPhone"];
	$MailingFax					= $_POST["MailingFax"];
	$ShippingFax				= $_POST["ShippingFax"];
	$MailingEmailAddress		= $_POST["MailingEmailAddress"];
	$ShippingEmailAddress		= $_POST["ShippingEmailAddress"];
	$PreviousCreditAmount		= $_POST["PreviousCreditAmount"];
	$Member_DiscountAmount				= $_POST["Member_DiscountAmount"];
	$LocalSalesTax				= $_POST["LocalSalesTax"];
	$HandlingCharge				= $_POST["HandlingCharge"];
	$ShippingCharge				= $_POST["ShippingCharge"];
	$Comments					= $_POST["Comments"];
	$oid	= empty($_GET["oid"])?"":$_GET["oid"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
	$btn	= empty($_POST["button"])?"":$_POST["button"];
	$a_pid 					= $_GET["a_pid"];
	$a_styleno 					= $_GET["a_styleno"];
	$a_name 					= $_GET["a_name"];
	$s_idx 					= $_GET["s_idx"];
	$s_styleno 				= $_GET["s_styleno"];
	$s_name 				= $_GET["s_name"];
	$action						= $_REQUEST["action"];
	$action1						= $_REQUEST["action1"];
	$action2						= $_REQUEST["action2"];
	
	
	$customerid= $_GET["customerid"];
	
	if($action2=='add')
	{
		$a_price=  $_GET["a_price"];
		if($a_price=="")
		$a_price=  $_GET["o_price"];
		
		$a_size=  $_GET["a_size"];
		$a_pack=  $_GET["a_pack"];
		
		$pDB 	= new myDB;
		$pSQL = "SELECT * FROM Pack WHERE PackChartID = " . $a_pack." Limit 0,1";
		//print_r($pSQL);
		//exit;
		$pDB->query($pSQL);
		$pdata = $pDB->fetch_array($pDB->res);

		$sDB 	= new myDB;
		$sSQL = "SELECT * FROM Size WHERE SizeChartID = " . $a_size." Limit 0,1";
		$sDB->query($sSQL);
		$sdata = $sDB->fetch_array($sDB->res);

		$ListOfSizeNames=$sdata['SizeChartName']."(".$pdata['PackChartName'].")";
	
		
		$DBi 	= new myDB;
		$strSQLi 	= ("INSERT INTO  OrderItems (OrderID,CustomerID,ProductID,ProductName,ListOfSizeNames,StyleNo,ListOfOrderQuantities,TotalQuantity,UnitPrice,TotalAmount,DateTimeSaved) VALUES
					( \"".$oid."\",
					\"".$customerid."\",
					\"".$a_pid."\",
					\"".$a_name."\",
					\"".$ListOfSizeNames."\",
					\"".$a_styleno."\",0,0,
					\"".$a_price."\",0,					
					 now())");
			//echo $strSQLi;		
			$DBi->query($strSQLi);
	}
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
				Order Details
			</div>
			<input type="hidden" id="oid" value="<?php echo $oid?>">
			
			<div id="sub1">
				<form name="OrderDetailForm" method="post" action="Manage_Orders_All_action.php">
					<?php
						$DBo 	= new myDB;
						$strSQLo = "SELECT * FROM Orders WHERE OrderID = " . $oid;
						$DBo->query($strSQLo);
						$datao = $DBo->fetch_array($DBo->res);

						$DB 	= new myDB;
						$strSQL = "SELECT * FROM OOrders WHERE OrderID = " . $oid;
						$DB->query($strSQL);
						$data = $DB->fetch_array($DB->res);
						if($data["OrderDateTime"]<1){
							$ordDateTime = "";
						}else{
							$ordDateTime = date("n/j/Y g:i:s A", strtotime($data["OrderDateTime"]));
						}				
						if($data["OrderConfirmedDateTime"]<1){
							$ordConfirmTime = "";
						}else{
							$ordConfirmTime = date("n/j/Y g:i:s A", strtotime($data["OrderConfirmedDateTime"]));
						}
						if($data["ShippingConfirmedDateTime"]<1){
							$shipConfDateTime = "";
						}else{
							$shipConfDateTime = date("n/j/Y g:i:s A", strtotime($data["ShippingConfirmedDateTime"]));
						}
						if($data["OrderCancelledDateTime"]<1){
							$shipcancelDateTime = "";
						}else{
							$shipcancelDateTime = date("n/j/Y g:i:s A", strtotime($data["OrderCancelledDateTime"]));
						}
					?>	
					<input type="hidden" name="pointEarn" value="<?php echo $data["TotalProductAmount"];?>">
					<input type="hidden" name="cutomerID" id="customerid" value="<?php echo $data["CustomerID"];?>">
					<input type="hidden" id="OrderID" name="OrderID" value="<?php echo $data["OrderID"];?>"/>
					<input type="hidden" name="action" value=""/>
					<table>
						<tbody>
							<tr class="btns">
								<td class="orderbtn">
								<?php 
									if($data["OrderCancelled"]=="N"&& $data["ShippingConfirmed"]=="N"){
										echo "<input type=\"button\" name=\"button\" value=\"Cancel this order\" onclick=\"return ConfirmCancelOrder(this.form);\"/>";
									}elseif($data["OrderCancelled"]=="N"&& $data["ShippingConfirmed"]=="Y"){
										echo "<input type=\"button\" name=\"button\" value=\"Cancel this shipped order\" onclick=\"return ConfirmShippingCancel(this.form);\"/>";
									}elseif($data["OrderCancelled"]=="Y"&& $data["ShippingConfirmed"]=="N"){
										echo "<input type=\"button\" name=\"button\" value=\"Recover this order\" onclick=\"return RecoverCancelOrder(this.form);\"/>";
									}elseif($data["OrderCancelled"]=="Y"&& $data["ShippingConfirmed"]=="Y"){
										echo "<input type=\"button\" name=\"button\" value=\"Recover this order\" onclick=\"return RecoverAgain(this.form);\"/>";
									}
								?>
									
								</td>
								<td colspan="2" class="orderbtn" style="text-align: center; color: red;">
									<?php 
										if($data["OrderCancelled"]=="N"){
											echo "<a href=\"#\" onclick=\"Popup=window.open('Print_PODetails.php?oid=".$data["OrderID"]."','Popup','scrollbars=yes,resizable=yes,width=1060,height=880'); return false;\"";
											echo " style=\"text-decoration: none; color: #0110DD;\">";
											echo "<input type=\"button\" name=\"buttonPrint\" value=\"PO Print\"/>";
											echo "</a>&nbsp;&nbsp;";
											echo "<a href=\"#\" onclick=\"Popup=window.open('Print_InvoiceDetails.php?oid=".$data["OrderID"]."','Popup','scrollbars=yes,resizable=yes,width=1060,height=880'); return false;\"";
											echo " style=\"text-decoration: none; color: #0110DD;\">";
											echo "<input type=\"button\" name=\"buttonPrint\" value=\"Invoice Print\"/>";
											echo "</a>";

											
										}elseif($data["OrderCancelled"]=="Y"){
											echo "This order was cancelled on ".$shipcancelDateTime.".";
										}
									?>
									<input type="button" name="buttonBack" value="BACK" onclick="history.back();"/>
								</td>
								<td class="orderbtn" style="text-align: right;">
								<?php 
									if($data["OrderConfirmed"]=="N"){
										if($data["OrderCancelled"]=="N"){
											echo "<input type=\"button\" name=\"button2\" value=\"Processing this order\" onclick=\"return ConfirmOrder(this.form);\"/>";
										}										
									}elseif($data["OrderConfirmed"]=="Y" && $data["OrderCancelled"]=="N" && $data["ShippingConfirmed"]=="N"){
										echo "<input type=\"button\" name=\"button2\" value=\"Ship this order\" onclick=\"return ConfirmShipping(this.form);\"/>";
									}
								?>
									
								</td>
							</tr>
							<?php 
							if($data["CommentsByCustomer"]!='')
							{
							
							echo '<tr class="subject_border_bottom">
								<th  class="subject2">Customer Comment:</th>
								<td colspan="6" class="general">'. $data["CommentsByCustomer"].'</td>
							</tr>';
							}	
							 if($data["Comments"]!=''){
							 echo '<tr class="thin_border_top thin_border_bottom">
								<th  class="subject2">Warning :</th>
								<td colspan="6" class="general">'.$data["Comments"].
								'</td>
							</tr>';
							}?>

							<tr class="thin_border_bottom">
								<td colspan="10">
								
								<?php
								
								$DBCO 	= new myDB;
								$strSQLC = " SELECT * FROM Comment WHERE OrderID=".$data["OrderID"]." Order by No DESC" ;
								//echo $strSQLC;
								$DBCO->query($strSQLC);

								if($DBCO->rows>0)
								{
									echo '<table>';
									echo '<tr>';
									echo '<th class="subject2_c" style="tex">Date</th>';
									echo '<th class="subject2_c" >Status</th>';
									echo '<th class="subject2_c" >Comments</th>';
									echo '<th class="subject2_c" >Mail to Customer</th>';
									echo '<th class="subject2_c" >Delete</th>';
									echo '</tr>';
								
									while($dataCO = $DBCO->fetch_array($DBCO->res)){
									
									echo "<tr class='thin_border_bottom thin_border_left' style='height: 40px;'>";
									echo "<td class='general' width='15%'>". $dataCO["DateCreate"]."</td>";
									echo "<td class='general' width='10%'>". $dataCO["Status"]."</td>";
									echo "<td class='general' width='55%'>". $dataCO["Comment"]."</td>";
									echo "<td class='general' width='10%'>". $dataCO["Mailto"]."</td>";
									echo "<td class='general' width='10%'><input style='text' type='button' onclick='commentdel(".$dataCO["No"].",".$data["OrderID"].")' value='Delete'></td>";
									echo "<tr>";
									}
								echo "</table>";
								}								
								?>
								<td>
							</tr>
					
							<!--<tr class="subject_border_top , thin_border_bottom">
								<th colspan="4" class="subject">Order Status</th>
							</tr>-->
							<tr class="thin_border_bottom subject_border_top">
								<th class="subject2" style="width: 200px">Order No.</th>
								<td class="general"><?php echo $data["OrderID"];?></td>
							</tr>
							<!--<tr class="thin_border_bottom">
								<th class="subject2">Order Confirmed?</th>
								<td class="general"><?php echo $data["OrderConfirmed"];?></td>
								<th class="subject2">Date/Time Confirmed</th>
								<td class="general"><?php echo $ordConfirmTime;?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Order Shipped?</th>
								<td class="general"><?php echo $data["ShippingConfirmed"];?></td>
								<th class="subject2">Date/Time Shipped</th>
								<td class="general"><?php echo $shipConfDateTime;?></td>
							</tr>-->
							<tr class="thin_border_bottom">
								<th class="subject2">Invoice No.</th>
								<td class="general">
									<input type="text" name="InvoiceNo" value="<?php echo $data["InvoiceNo"];?>"/>
								</td>
								<th style="color:blue;" class="subject2">Tracking No.</th>
								<td class="general">
									<input type="text" name="ShippingTrackingNo" value="<?php echo $data["ShippingTrackingNo"];?>" /> &nbsp;
								</td>
							</tr>
							<!--<tr class="thin_border_bottom">
								<th class="subject2">P.O. No.</th>
								<td class="general">
									<input type="text" name="PONo" value="<?php echo $data["PONo"];?>"/>
								</td>
								
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Promo-Code</th>
								<td colspan="3" class="general">
									<input type="text" name="promotionalCode" value="<?php echo $data["promotionalCode"];?>"/>
								</td>
							</tr>-->
							<tr class="thin_border_bottom">
								<th colspan="5" class="subject">Order Info</th>
							</tr>
							<!--<tr class="thin_border_bottom">
								<th class="subject2">Credit Card Name</th>
								<td class="general"><?php echo $data["CreditCardName"];?></td>
								<th class="subject2">Card Holder Name</th>
								<td class="general"><?php echo $data["CardHolderName"];?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Card Number</th>
								<td class="general"><?php echo $data["CardNumber"];?></td>
								<th class="subject2">Card Security Code</th>
								<td class="general"><?php echo $data["CardSecurityCode"];?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Card Expiration Month/Year</th>
								<td class="general"><?php echo $data["CardExpireMonth"]?> / <?php echo $data["CardExpireYear"] ?></td>
								<th class="subject2">Card Authorization Code</th>
								<td class="general">
									<input type="text" name="AuthorizationCode" value="<?php echo $data["AuthorizationCode"];?>"/>
								</td>
							</tr>-->
							<tr class="thin_border_bottom">
								<th class="subject2" style="width: 200px">Order Date</th>
								<td colspan="3" class="general"><?php echo $ordDateTime."  (Modified on:".$ordConfirmTime.")";?></td>
							</tr>
							
							<tr class="thin_border_bottom">
								<th class="subject2">Shipment</th>
								<td colspan="3" class="general"><?php echo $data["ShippingMethod"];?></td>
							
								<!--<th class="subject2">Shipping Weight</th>
								<td class="general">
									<input type="text" name="Sweight" id="Sweight" value="<?php if($data["Weight_Pounds"]>0) echo $data["Weight_Pounds"];?>"/> 
									lbs 
									<?php
										$DB2 = new myDB;
										$strShort = "SELECT DISTINCT ShippingMethod FROM Orders WHERE ShippingMethod LIKE '%ups%' OR ShippingMethod='ground'"; 
							//			echo $strShort;
										$DB2->query($strShort);
										while ($dataShipping = $DB2->fetch_array($DB2->res)){
											$shipMethod[] = $dataShipping["ShippingMethod"];
										}
										for($i=0;$i<count($shipMethod);$i++){
											if($data["ShippingMethod"]==$shipMethod[$i]){
												if($i==0 || $i==3){
													echo "<a href=\"#\" onclick=\"upslabel(1,".$data["OrderID"].");\">Print UPS Label</a>";
												}else{
													echo "<a href=\"#\" onclick=\"upslabel(0,".$data["OrderID"].");\">Issue UPS Label</a>";
												}												
											}
									//		echo $shipMethod[$i]."<br/>";
										}										
									?>
								</td>-->
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2">Payment Method</th>
								<td colspan="3" class="general"><?php echo $data["PaymentMethod"];?></td>
								<td  class="general"></td>
								<td  class="general"></td>
							</tr>
							
						</tbody>
					</table><br/>
					<table>
						<tbody>
							<tr class="  thin_border_bottom subject_border_top">
								<?php

								$DBcu 	= new myDB;
								$strSQL = "SELECT * FROM Customers WHERE CustomerID = " . $data['CustomerID'];
								//echo $strSQL;
								$DBcu->query($strSQL);
								$datacu = $DBcu->fetch_array($DBcu->res);
								?>
								<th  class="subject">Customer</th>
								<td class="general">Status:</td>
								<th  class="subject">IP</th>
								<td class="general"><?php echo $data['CustomerIP_Address']."  "."Location:".$data['MailingStateOrProvince'] ?></td>

							</tr>
							<tr class="  thin_border_bottom">
								<th  class="subject"></th>
								<td colspan="3" class="general">
								<?php

								echo "Total Orders:".$datacu['TotalOrderAmount']." Total Order Count: ".$datacu['TotalOrderCount']."<br>";
								echo "Login:".$datacu['TotalLoginCount']
								?>
								</td>
								
							</tr>
							<tr class="subject_border_top , thin_border_bottom">
								<th colspan="2" class="subject">Billing Address</th>
								<th colspan="2" class="subject">Shipping Address</th>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Company Name</th>
								<td class="general">
									<input type="text" name="MailingCompanyName" value="<?php echo $data["MailingCompanyName"];?>" />
								</td>
								<th class="subject2">Company Name</th>
								<td class="general">
									<input type="text" name="ShippingCompanyName" value="<?php echo $data["ShippingCompanyName"];?>" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2" style="width: 200px">Name</th>
								<td class="general">
									<input type="text" name="MailingFirstName" value="<?php echo $data["MailingFirstName"];?>" />&nbsp;
									<input type="text" name="MailingLastName" value="<?php echo $data["MailingLastName"];?>" />
								</td>
								<th class="subject2" style="width: 200px">Attention To </th>
								<td class="general">
									<input type="text" name="ShippingFirstName" value="<?php echo $data["ShippingFirstName"];?>" />&nbsp;
									<input type="text" name="ShippingLastName" value="<?php echo $data["ShippingLastName"];?>" />
								</td>
							</tr>
							<tr>
								<th class="subject2">Street</th>
								<td class="general">
									<input type="text" name="MailingStreet" value="<?php echo $data["MailingStreet"];?>" style="width: 98%;"/>
								</td>
								<th class="subject2">Street</th>
								<td class="general">
									<input type="text" name="ShippingStreet" value="<?php echo $data["ShippingStreet"];?>" style="width: 98%;"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2"></th>
								<td class="general">
									<input type="text" name="MailingStreet" value="<?php echo $data["MailingStreet2"];?>" style="width: 98%;"/>
								</td>
								<th class="subject2"></th>
								<td class="general">
									<input type="text" name="ShippingStreet" value="<?php echo $data["ShippingStreet2"];?>" style="width: 98%;"/>
								</td>
							</tr>
							
							<tr class="thin_border_bottom">
								<th class="subject2">City</th>
								<td class="general">
									<input type="text" name="MailingCity" value="<?php echo $data["MailingCity"];?>" />
								</td>
								<th class="subject2">City</th>
								<td class="general">
									<input type="text" name="ShippingCity" value="<?php echo $data["ShippingCity"];?>" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">State / Province</th>
								<td class="general">
									<input type="text" name="MailingStateOrProvince" value="<?php echo $data["MailingStateOrProvince"];?>" />
								</td>
								<th class="subject2">State / Province</th>
								<td class="general">
									<input type="text" name="ShippingStateOrProvince" value="<?php echo $data["ShippingStateOrProvince"];?>" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Zipcode</th>
								<td class="general">
									<input type="text" name="MailingZipcode" value="<?php echo $data["MailingZipcode"];?>" />
								</td>
								<th class="subject2">Zipcode</th>
								<td class="general">
									<input type="text" name="ShippingZipcode" value="<?php echo $data["ShippingZipcode"];?>" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Country</th>
								<td class="general">
									<input type="text" name="MailingCountry" value="<?php echo $data["MailingCountry"];?>" />
								</td>
								<th class="subject2">Country</th>
								<td class="general">
									<input type="text" name="ShippingCountry" value="<?php echo $data["ShippingCountry"];?>" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Phone</th>
								<td class="general">
									<input type="text" name="MailingPhone" value="<?php echo $data["MailingPhone"];?>" />
								</td>
								<th class="subject2">Phone</th>
								<td class="general">
									<input type="text" name="ShippingPhone" value="<?php echo $data["ShippingPhone"];?>" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Fax</th>
								<td class="general">
									<input type="text" name="MailingFax" value="<?php echo $data["MailingFax"];?>" /> 
								</td>
								<th class="subject2">Fax</th>
								<td class="general">
									<input type="text" name="ShippingFax" value="<?php echo $data["ShippingFax"];?>" />
								</td>
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2">E-mail Address</th>
								<td class="general">
									<input type="text" name="MailingEmailAddress" value="<?php echo $data["MailingEmailAddress"];?>" />
								</td>
								<th class="subject2">E-mail Address</th>
								<td class="general">
									<input type="text" name="ShippingEmailAddress" value="<?php echo $data["ShippingEmailAddress"];?>" />
								</td>
							</tr>

							
						</tbody>
					</table>
					<br/>
<!--------------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------------->

					<table style="min-width: 856px;">
						<tbody>
							<tr class="subject_border_bottom subject_border_top thin_border_bottom">
								<th colspan="10" class="subject">Original Order</th>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2_c">No</th>
								<th class="subject2_c" style="width:50px;">Qty</th>
								<th class="subject2_c">Image</th>
								<th class="subject2_c">Style no</th>
								<th class="subject2_c">Product Name</th>
								<th class="subject2_c">Colors</th>
								<th class="subject2_c">Sizes</th>
								<th class="subject2_c" style="width:50px;"></th>
								<th class="subject2_c">Price</th>
								<th class="subject2_c">Total</th>
							</tr>
							<?php
								$DB2 	= new myDB;
								$DBsub 	= new myDB;
								$DBc 	= new myDB;
								$DBx 	= new myDB;
								$strSMSQL = "SELECT OI.OrderItemID,OI.ProductID,OI.StyleNo, OI.ProductName, OI.ListOfSizeNames as listName,OI.ListOfColorNames as colorName, OI.ListOfOrderQuantities, OI.TotalQuantity, OI.UnitPrice, OI.TotalAmount,";
								$strSMSQL .= " OI.UnitPriceHow, OI.Personalization,  OI.ListOfColorNames,P.ColorIDs, P.BrandName, P.Picture1, C.Color,GF.GiftID as GI";
								$strSMSQL .= " FROM OOrderItems OI LEFT JOIN Products P ON OI.ProductID = P.ProductID LEFT JOIN Colors C ON P.ColorIDs = C.ColorID";
								$strSMSQL .= " LEFT JOIN GiftCertificates GF ON GF.GiftOrderID = OI.OrderID	";
								$strSMSQL .= " WHERE OI.OrderID =".$oid;								
								$strSMSQL .= " ORDER BY OI.ProductID";
								$DB2->query($strSMSQL);
								//echo $strSMSQL;
								$num = 1;
								while($dataSub = $DB2->fetch_array($DB2->res)){
									//$strX = "select Color from  WHERE $dataSub[ListOfColorNames"
									echo "<tr class=\"thin_border_bottom\">";
									echo "<td class=\"general_c\">" . $num . "</td>";
									echo "<td class=\"general_c\">" . $dataSub["TotalQuantity"] . "</td>";
									
									echo "<td class=\"general_c\">";
									echo "<img src=\"".SITE_URL.PRODUCT_IMAGE_PATH."" . $dataSub["Picture1"] . "\" width=\"80\"/></td>";
									
									echo "<td class=\"general_c\">";
									echo $dataSub["StyleNo"]."</td>";
									echo "<td class=\"general_c\">".$dataSub["ProductName"]."</td>";
									
									/*	
									$strCLSQL = "SELECT * FROM Colors WHERE ColorID".$dataSub["ColorIDs"];
									$DBsub->query($strCLSQL);
							echo $strCLSQL;
									echo "<td class=\"general\">";
									
									
										while($dataSub1 = $DBsub->fetch_array($DBsub->res)){
									echo $dataSub1["Color"];
									}*/
									
									echo "<td class=\"general\">";
									echo $dataSub["colorName"];
									echo "</td>";
									
									
									echo "<td class=\"general_c\">";
									echo "<div class=\"bigCel\">";
									echo "<ul>";
									$tmpArray =  explode(",", $dataSub["listName"]);
									$tmpArray2 =  explode(",", $dataSub["ListOfOrderQuantities"]);
									$tmpArray3 =  explode(",", $dataSub["Personalization"]);
									for($i=0; $i< count($tmpArray); $i++){
										echo "<div class=\"product_options\">";
										echo "<li> <span>" . $tmpArray[$i] . "</span></li>";
										if($dataSub["Personalization"]!=null){
											echo "<li>Name: <span>".$tmpArray3[0]."</span></li>";
											if($dataSub["bulkchk"]=='Y'){
												$arrTxtPersona = array("Big","Small","Short");
												for ($i=0; $i<3; $i++)
													echo "<li>" . $arrTxtPersona[$i] . " number: <span>" . $tmpArray3[$i+1] . "</span></li>";
											}else{
												echo "<li>Number: <span>".$tmpArray3[1]."</span></li>";
											}
										}						
										echo "</div>";
									}
									echo "</dl>";
									echo "</div>";
									echo "<div class=\"bigCel\">";
									echo "<div class=\"cel\">";
									//echo "<p style=\"color: #999;\">".$dataSub["UnitPriceHow"] . "</p></div>";
									echo "</div></td>";
									echo "<td class=\"general_c\">";
									echo "</td>";
									echo "<td class=\"general_c\">" . $dataSub["UnitPrice"] . "</td>";
									echo "<td class=\"general_c\">"  . $dataSub["TotalAmount"] . "</td>";
									echo "</tr>";
									$num++;
								}
								$strSQLc = " SELECT sum(TotalQuantity) AS s_qty,sum(TotalAmount) as s_amount from OrderItems WHERE OrderID=".$data["OrderID"];
								$DBc->query($strSQLc);
								//echo $strSQLc;
								while($datac = $DBc->fetch_array($DBc->res)){
									$s_qty=$datac["s_qty"];
									$s_amount=$datac["s_amount"];
								}
							?>
							<tr class="thin_border_bottom">
							<td colspan="10" class="subject2_c">&nbsp;
							<table><tr>
							<td width="30%" class="subject2_c">&nbsp;</td>
							<td width="30%"class="subject2_c">&nbsp;</td>
							<td width="10%" style="text-align: right;" class="subject2_c">Sub-Total Qty</td>
							<td width="10%" style="text-align: right;" class="subject2_c"><?php echo  $s_qty?></td>
							<td width="10%" style="text-align: right;" class="subject2_c">Sub-Total</td>
							<td width="10%" style="text-align: right;" class="subject2_c"><?php echo  $s_amount?></td>
							</td></tr></table>
							

							</tr>
							
							<tr class="subject_border_top thin_border_bottom">
								<td colspan="99">
									<table>
										<!--<tr class="thin_border_bottom">
											<td class="general" style="width: 30%;">Previous Penalty Amount:</td>
											<td class="general_r subject_border_right" style="width: 20%;">
												+ <?php echo $data["PreviousPenaltyAmount"]; ?>
											</td>
											<td class="general" style="width:30%;">Previous Credit Amount:</td>
											<td class="general_r" style="width: 20%;">
												- <?php echo $data["PreviousCreditAmount"];?> 
											</td>
										</tr>-->
										<tr class="thin_border_bottom">
											<td  class="general"></td>
											<td class="general_r">
												
											</td>
											<td class="general_r">Level Discount:</td>
											<td class="general_r">
												- <?php echo $data["Member_DiscountAmount"]; ?>
											</td>
										</tr>
										<tr class="thin_border_bottom">
											<td  class="general"></td>
											<td class="general_r">
												
											</td>
											<td class="general_r">Coupon Discount:</td>
											<td class="general_r">
												- <?php echo $data["DiscountAmount"]; ?>
											</td>
										</tr>
										<tr class="thin_border_bottom">
											<td class="general"></td>
											<td class="general_r">
												 
											</td>
											<td class="general_r">Shipping:</td>
											<td class="general_r">
												 + <?php echo $data["ShippingCharge"]; ?>
											</td>

											<!--<td class="general">gift certificate:</td>
											<td class="general_r">$<?php echo $data["GiftCertificateAmount"]?></td>-->
										</tr>

										<tr class="subject_border_bottom">
											<td width="30%" class="general">&nbsp;</td>
											<td width="30%" class="general_r">&nbsp;
												
											</td>
											<td width="20%" class="general_r" style="background-color: #FCEDDC;"><b>Total:</b></td>
											<td width="20%" class="general_r" style="background-color: #FCEDDC;">
												<span id="ototalorderamount"  class="redstar"><b>$
												<?php 
													$TotalOrderAmount = $data["TotalProductAmount"] - $data["PreviousCreditAmount"];
													$TotalOrderAmount += $data["PreviousPenaltyAmount"];
													$TotalOrderAmount -= $data["Member_DiscountAmount"];
													$TotalOrderAmount -= $data["DiscountAmount"];
													$TotalOrderAmount += $data["LocalSalesTax"];
													$TotalOrderAmount += $data["HandlingCharge"];
													$TotalOrderAmount += $data["ShippingCharge"];
													echo $data["TotalOrderAmount"];
												?></b>
												</span>
												
											</td>
										</tr>
										
									</table>
					
						</tbody>
					</table>
					<br/>
<!-----------------------------------------------------------------------------------------------------------------------------------------------
<div id="sub3">
--->


				<table>
					<tr >
					<th  class="subject2"></th>
					<th  class="subject2">Add Order Item</th>
					<th  class="subject2"></th>
					<th  class="subject2"></th>
					</tr>
					<tr class="subject_border_top">
						<td class="subject2"><a id="C4">Product ID</a></td>
						<td class="subject2">Style #</td>
						<td class="subject2">Product Name</td>
						<td class="subject2">Action</td>
						
					</tr>
					<tr class="subject_border_bottom">
						<td class="general">
							<input type="text" name="s_idx" id="s_idx" value="<?php echo $s_idx?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_styleno" id="s_styleno" value="<?php echo $s_styleno?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_name" id="s_name" value="<?php echo $s_name?>" style="width: 90%;"/>
						</td>
						<td  class="general">
							<input type="button" value="Search" onclick="search();" />
						</td>
						
					</tr>
				</table>
			

<?php
	if($action1 == "search"){
?>
				<table style="width: 100%;">
					<tr class="subject_border_top">
						<td class="subject1_2">Searched Items</td>
					</tr>
<?php	
	$strSCHSQL = (" Where ");
	

	if($s_idx != null){
		$strSCHSQL .= (" ProductID LIKE '%" . $s_idx . "' AND");
	}
	if($s_styleno != null){
		$strSCHSQL .= (" StyleNo LIKE '%" . $s_styleno . "' AND");
	}
	if($s_name != null){
		$strSCHSQL .= (" ProductName LIKE '%" . $s_name . "' AND");
	}
	$strSCHSQL .= " 1=1";
	//$strSCHSQL .= " IsActive='Y'";
	
	$strSQLs = "SELECT * FROM Products ".$strSCHSQL;
	//echo "<br/>" . $strSQLs;
//	$strOrd	= " ORDER BY ProductID DESC";
	
?>
<table>
		<tr class="subject_border_top">
		<td class="subject2" ></td><td class="subject2">Img</td><td class="subject2">Style No</td><td class="subject2">Brand</td><td class="subject2">Name</td><td class="subject2">Price</td><td  class="subject2">Status</td><td class="subject2"></td>
		</tr>
	<?php
	echo "<tr><td class=\"general_c\">";
	$DBs 	= new myDB;
	$DBs->query($strSQLs);
	while ($datas = $DBs->fetch_array($DBs->res)){
		echo "<tr><td class=\"general_c\">";
?>		
		<input type="checkbox" name="idtocheck[]" id="checklist3" value="<?php echo $data["ProductID"];?>"/>
<?php
		echo "<td class=\"general_c\">";
		echo "<a href=\"Manage_Products.php?act=view&aid=" . $datas["ProductID"] . "&{$linkopt}&pp={$pp}\">";
		if($datas["Picture1"]!=null){
			echo "<img src=\"/Images_Products/" . $datas["Picture1"] . "\" width=\"110\" height=\"110\" border=\"0\"/>";
		}else{
			echo "<img src=\"/Images_Products/ComingSoon.jpg\" height=\"110\" border=\"0\"/>";
		}
		echo "</a></td><input type='hidden' id='a_pid_".$datas["ProductID"]."' value='".$datas["ProductID"]."'><input type='hidden' id='a_styleno_".$datas["ProductID"]."' value='".$datas["StyleNo"]."'><input type='hidden' id='a_name_".$datas["ProductID"]."' value='".$datas["ProductName"]."'><input type='hidden' id='a_price_".$datas["ProductID"]."' value='".$datas["UnitPriceOnSale"]."'><input type='hidden' id='o_price_".$datas["ProductID"]."' value='".$datas["UnitPrice"]."'><input type='hidden' id='a_size_".$datas["ProductID"]."' value='".$datas["SizeChartID"]."'><input type='hidden' id='a_pack_".$datas["ProductID"]."' value='".$datas["PackChartID"]."'>";
		echo "<td class=\"general_c\">";
		echo $datas["StyleNo"] ."</td>";
		echo "<td class=\"general_c\">";
		echo $datas["BrandName"] . "</td>";
		echo "<td class=\"general_c\">";		
		echo $datas["ProductName"] . "</td>";
		echo "<td class=\"general_c\">";
		echo "$" . $datas["UnitPriceOnSale"] . " &nbsp;(<s>$" . $datas["UnitPrice"] . "</s>)";
		echo "</td>";
		echo "<td class=\"general\">";
		echo $datas["IsActive"] ."</td>";
		echo "<td class=\"general\">";
		echo "<input type='button' onclick='add(".$datas["ProductID"].")' value='Add'> </td>";
		echo "</tr>";
	}
	
	echo "</table><br/>";
}?>


		

<script type="text/javascript">
//Manage_Orders_All_action.php
function commentdel(id,oid){
location.href="Manage_Orders_All_action.php?CAction=del&CNo="+id+"&OrderID="+oid; 
}
function search(){



var s_idx=document.getElementById('s_idx').value;
var s_styleno=document.getElementById('s_styleno').value;
var s_name=document.getElementById('s_name').value;
var action1='search';
var oid=document.getElementById('oid').value;

location.href="Manage_Orders_ViewOrderDetails.php?act=view&oid="+oid+"&action1="+action1+"&s_idx="+s_idx+"&s_styleno="+s_styleno+"&s_name="+s_name+"#C4";
}

function add(a_pid){
//var a_pid=$('#a_pid').val();
var a_styleno=$('#a_styleno_'+a_pid).val();
var a_name=$('#a_name_'+a_pid).val();
var a_price=$('#a_price_'+a_pid).val();
var o_price=$('#o_price_'+a_pid).val();
var a_size=$('#a_size_'+a_pid).val();
var a_pack=$('#a_pack_'+a_pid).val();
//alert('x'+a_pack);
var oid=$('#oid').val();
var customerid=$('#customerid').val();
var action2='add';
//alert(customerid);
location.href="Manage_Orders_ViewOrderDetails.php?act=view&oid="+oid+"&action1=search"+"&s_idx="+a_pid+"&s_styleno="+a_styleno+"&s_name="+a_name+"&action2="+action2+"&a_pid="+a_pid+"&a_styleno="+a_styleno+"&a_name="+a_name+"&a_price="+a_price+"&o_price="+o_price+"&a_size="+a_size+"&a_pack="+a_pack+"&customerid"+customerid+"#C4";

}

function qtychg(id){
	var TotalQuantity= $('#TotalQuantity_'+id).val();
	var UnitPrice= $('#UnitPrice_'+id).val();		
	var TotalAmount=TotalQuantity*UnitPrice;
	var Status= $('#Cstatus').val();
	//alert(Status);
	 $('#TotalAmount_'+id).val(TotalAmount);

	var oid=$('#OrderID').val();

	$.ajax({
				async:false, type:"post", dataType:"json", url:"../lib/ajaxtools.php",
				data:{"mode":"Orderchange","OrderID":oid,"OrderItemID":id,"TotalQuantity":TotalQuantity,"Status":Status},
				success:function(d) {
					if (d) {
						$('#TotalProductQuantity').val(d.order[0].s_qty);
						//alert($('#TotalProductQuantity').val());
						$('#TotalProductAmount').val(d.order[0].s_amount);//s_amount
						$('#Comments1').text(d.order[0].s_commnt);
						$('#automail').val('Y');
					}
				}
			});



    
          


var TotalProductQuantity= $('#TotalProductQuantity').val();
//alert(TotalProductQuantity);
var TotalProductAmount= $('#TotalProductAmount').val();
	 //var PreviousPenaltyAmount=parseFloat($('#PreviousPenaltyAmount').val());
	 // var PreviousCreditAmount=parseFloat($('#PreviousCreditAmount').val());
	  // var LocalSalesTax=parseFloat($('#LocalSalesTax').val());
	    var Member_DiscountAmount=parseFloat($('#Member_DiscountAmount').val());
		 var CouponCharge=parseFloat($('#CouponCharge').val());
		  var ShippingCharge=parseFloat($('#ShippingCharge').val());
totalorderamount=TotalProductAmount-Member_DiscountAmount-CouponCharge+ShippingCharge;
		   $('#totalorderamount').text(totalorderamount);
			$('#TotalOrderAmount').val(totalorderamount);






}
</script>

<!---------------------------------------------------------------------------------------------------------------------------------------------------->
					<table >
						<tbody>
							<tr class="subject_border_bottom subject_border_top thin_border_bottom">
								<th colspan="10" class="subject">Final Order</th>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2_c">No</th>
								<th class="subject2_c" style="width:10px;">Qty</th>
								<th class="subject2_c">Image</th>
								<th class="subject2_c">Style no</th>
								<th class="subject2_c">Product Name</th>
								<th class="subject2_c">Colors</th>
								<th class="subject2_c">Sizes</th>
								<th class="subject2_c" style="width:10px;">Del</th>
								<th class="subject2_c">Price</th>
								<th class="subject2_c">Total</th>
							</tr>
							<?php
								$DB2 	= new myDB;
								$DBsub 	= new myDB;
								$DBc 	= new myDB;
								$strSMSQL = "SELECT OI.OrderItemID,OI.ProductID,OI.StyleNo, OI.ProductName, OI.ListOfSizeNames as listName, OI.ListOfOrderQuantities, OI.TotalQuantity, OI.UnitPrice, OI.TotalAmount,";
								$strSMSQL .= " OI.UnitPriceHow, OI.Personalization,  OI.ListOfColorNames,P.ColorIDs, P.BrandName, P.Picture1, C.Color,GF.GiftID as GI";
								$strSMSQL .= " FROM OrderItems OI LEFT JOIN Products P ON OI.ProductID = P.ProductID LEFT JOIN Colors C ON P.ColorIDs = C.ColorID";
								$strSMSQL .= " LEFT JOIN GiftCertificates GF ON GF.GiftOrderID = OI.OrderID	";
								$strSMSQL .= " WHERE OI.OrderID =".$oid;								
								$strSMSQL .= " ORDER BY OI.ProductID";
								$DB2->query($strSMSQL);
								//echo $strSMSQL;
								$num = 1;
								while($dataSub = $DB2->fetch_array($DB2->res)){
									echo "<tr class=\"thin_border_bottom\">";
									echo "<td class=\"general_c\">" . $num . "</td>";
									echo "<td  class=\"general_c\"><input type=\"text\" id=\"TotalQuantity_".$dataSub["OrderItemID"]."\" name=\"TotalQuantity_".$dataSub["OrderItemID"]."\" style='border: solid #C8EEFF 1px;height: 25px;width: 50px;text-align: right;' onchange=\"qtychg(".$dataSub["OrderItemID"].")\" value=\"" . $dataSub["TotalQuantity"] . "\"></td>";
									echo "<td class=\"general_c\">";
									echo "<a class='ajax' href=\"".SITE_URL.PRODUCT_IMAGE_PATH."" . $dataSub["Picture1"] . "\"><img src=\"".SITE_URL.PRODUCT_IMAGE_PATH."" . $dataSub["Picture1"] . "\" width=\"80\"/></a></td>";
									
									echo "<td class=\"general_c\">";
									echo $dataSub["StyleNo"]."</td>";
									echo "<td class=\"general\">".$dataSub["ProductName"]."</td>";
									
									
									$strCLSQL = "SELECT * FROM Colors WHERE ColorID in(".$dataSub["ColorIDs"].")";
									$DBsub->query($strCLSQL);
									//echo $strCLSQL;
									echo "<td class=\"general\"><select>";
									while($dataSub1 = $DBsub->fetch_array($DBsub->res)){
										if($dataSub["ListOfColorNames"]==$dataSub1["Color"])
											echo "<option value='".$dataSub1["Color"]."' selected>".$dataSub1["Color"]. "</option>";
										else									
											echo "<option value='".$dataSub1["Color"]."'>".$dataSub1["Color"]. "</option>"; 
									}
									echo "</select></td>";
									
									echo "<td class=\"general_r\">";
									echo "<div class=\"bigCel\">";
									echo "<ul>";
									$tmpArray =  explode(",", $dataSub["listName"]);
									$tmpArray2 =  explode(",", $dataSub["ListOfOrderQuantities"]);
									$tmpArray3 =  explode(",", $dataSub["Personalization"]);
									for($i=0; $i< count($tmpArray); $i++){
										echo "<div class=\"product_options\">";
										echo "<li > <span style=\"text-align: right;\">" . $tmpArray[$i] . "</span></li>";
										if($dataSub["Personalization"]!=null){
											echo "<li>Name: <span>".$tmpArray3[0]."</span></li>";
											if($dataSub["bulkchk"]=='Y'){
												$arrTxtPersona = array("Big","Small","Short");
												for ($i=0; $i<3; $i++)
													echo "<li>" . $arrTxtPersona[$i] . " number: <span>" . $tmpArray3[$i+1] . "</span></li>";
											}else{
												echo "<li>Number: <span>".$tmpArray3[1]."</span></li>";
											}
										}						
										echo "</div>";
									}
									echo "</dl>";
									echo "</div>";
									echo "<div class=\"bigCel\">";
									echo "<div class=\"cel\">";
									//echo "<p style=\"color: #999;\">".$dataSub["UnitPriceHow"] . "</p></div>";
									echo "</div></td>";
									echo "<td class=\"general_c\"><input type=\"checkbox\" style='width: 20px;height: 20px;'id=\"delete_od\" name=\"deleteod[]\" value=\"".$dataSub["OrderItemID"]."\"/>";
									echo "</td>";
									echo "<td class=\"general_r\"><input type=\"text\" style=\"text-align: right; border: solid #ffffff 1px;\" readonly id=\"UnitPrice_".$dataSub["OrderItemID"]."\" name=\"UnitPrice_".$dataSub["OrderItemID"]."\"  style='width: 80px;' value=\"" . $dataSub["UnitPrice"] . "\"></td>";

									echo "<td class=\"general_r\"><input type=\"text\" style=\"text-align: right; border: solid #ffffff 1px;\" readonly id=\"TotalAmount_".$dataSub["OrderItemID"]."\" name=\"TotalAmount_".$dataSub["OrderItemID"]."\" value=\""  . $dataSub["TotalAmount"] . "\"></td>";
									echo "</tr>";
									$num++;
								}
								$strSQLc = " SELECT sum(TotalQuantity) AS s_qty,sum(TotalAmount) as s_amount from OrderItems WHERE OrderID=".$data["OrderID"];
								$DBc->query($strSQLc);
								//echo $strSQLc;
								while($datac = $DBc->fetch_array($DBc->res)){
									$s_qty=$datac["s_qty"];
									$s_amount=$datac["s_amount"];
								}
							?>
							<tr class="thin_border_bottom">
							<td colspan="10" class="subject2_c">&nbsp;
							<table><tr>
							<td width="30%" class="subject2_c">&nbsp;</td>
							<td width="30%"class="subject2_c">&nbsp;</td>
							<td width="10%" style="text-align: right;" class="subject2_c">Sub-Qty</td>
							<td width="10%" style="text-align: right;" class="subject2_c"><input style="text-align: right;" type="text" readonly name="TotalProductQuantity" id="TotalProductQuantity" value="<?php echo  $s_qty?>"></td>
							<td width="10%" style="text-align: right;" class="subject2_c">Sub-Total </td>
							<td width="10%" style="text-align: right;"class="subject2_c"><input style="text-align: right;" type="text" readonly name="TotalProductAmount" id="TotalProductAmount" value="<?php echo  $s_amount?>"></td>
							</td></tr></table>
							</tr>
							
							<tr class="subject_border_top thin_border_bottom">
								<td colspan="99">
									<table>
										<!--<tr class="thin_border_bottom">
											<td class="general" style="width: 30%;">Previous Penalty Amount:</td>
											<td class="general_r subject_border_right" style="width: 20%;">
												+ <input type="text" id="PreviousPenaltyAmount" name="PreviousPenaltyAmount" class="box3" value="<?php echo $data["PreviousPenaltyAmount"]; ?>"/>
											</td>
											<td class="general" style="width:30%;">Previous Credit Amount:</td>
											<td class="general_r" style="width: 20%;">
												- <input type="text" id="PreviousCreditAmount" name="PreviousCreditAmount" class="box3" value="<?php echo $data["PreviousCreditAmount"]; ?>"/>
											</td>
										</tr>-->
										<tr class="thin_border_bottom">
											<td  class="general"></td>
											<td class="general_r">
												
											</td>
											<td class="general">Level Discount:</td>
											<td class="general_r">
												- <input type="text" id="Member_DiscountAmount" name="Member_DiscountAmount" class="box3" value="<?php echo $datao["Member_DiscountAmount"]; ?>"/>
											</td>
										</tr>
										<tr class="thin_border_bottom">
											<td class="general"></td>
											<td class="general_r">
												 
											</td>
											<td class="general">Coupon Discount</td>
											<td class="general_r">
												- <input type="text" id="CouponCharge" name="CouponCharge" class="box3" value="<?php echo $datao["HandlingCharge"]; ?>"/>
											</td>
										</tr>
										<tr class="thin_border_bottom">
											<td class="general"></td>
											<td class="general_r">
												 
											</td>
											<td class="general">Shipping:</td>
											<td class="general_r">
												 + <input type="text" id="ShippingCharge" name="ShippingCharge" class="box3" value="<?php echo $datao["ShippingCharge"]; ?>"/>
											</td>
										</tr>
										<tr class="subject_border_bottom">
											<td width="30%" class="general">&nbsp;</td>
											<td width="30%" class="general_r">&nbsp;
												
											</td>
											<td class="general" style="background-color: #FCEDDC;"><b>Total:</b></td>
											<td class="general_r" style="background-color: #FCEDDC;">
												<span id="totalorderamount"  class="redstar"><b>$
												<?php 
													echo $datao["TotalOrderAmount"];
												?></b>
												</span>
												<input type="hidden"  name="TotalOrderAmount" id="TotalOrderAmount" value="<?php echo  $datao["TotalOrderAmount"]?>">
											</td>
										</tr>
										
									</table>
						</tbody>

						<tr class="subject_border_bottom">
								<th colspan="2" class="subject2">Warning :</th>
								<td colspan="9" class="general">
									
									<br/>
									<textarea name="Comments" rows="4" style="width: 90%"><?php echo $data["ShippingEmailAddress"];?></textarea>
								</td>
							</tr>
						<tr class="subject_border_bottom">
								<th  colspan="2" class="subject2">Status :</th>
								<th  colspan="9" class="subject2">Comment </th>
								
							</tr>
						<tr class="subject_border_bottom">
								<th  colspan="2" class="subject2">
								<select id="Cstatus" name="Cstatus">
								<option value="">Select</option>
								<option value="new" <?php if ($datao["Status"]=="new") echo "selected"?>>New</option>
								<option value="processing" <?php if ($datao["Status"]=="processing") echo "selected"?>>Processing</option>
								<option value="hold" <?php if ($datao["Status"]=="hold") echo "selected"?>>Hold</option>
								<option value="shipped" <?php if ($datao["Status"]=="shipped") echo "selected"?>>Shipped</option>
								<option value="partially_shipped" <?php if ($datao["Status"]=="partially_shipped") echo "selected"?>>Partially Shipped</option>
								<option value="backorder" <?php if ($datao["Status"]=="backorder") echo "selected"?>>Back Order</option>
								<option value="cancel" <?php if ($datao["Status"]=="cancel") echo "selected"?>>Canceled</option>
								<option value="refund" <?php if ($datao["Status"]=="refund") echo "selected"?>>Returned</option>
								</select></th>
								<td rowspan="2" colspan="9" class="general">
									<textarea id="Comments1" name="Comments1" rows="4" style="width: 90%"></textarea>
								</td>
							</tr>
						<tr class="subject_border_bottom">
								<input type="hidden" id="automail" name="automail" value="">
								<th  colspan="2" class="subject2">Mail to Customer
								<input type="checkbox" name="Mailto"  value="Y" <?php echo ($data["Mailto"]=="Y")?"checked":null?>/>
								
								</th>

								
							</tr>
					</table><br/>

					<p class="btns general_c">
						<input type="button" name="buttonUpdate" value="Update this order" onclick="return Confirm_UpdateOrder(this.form);"/>
					</p>
				</form>
			</div>
		
<?php require_once("footer.php"); ?>