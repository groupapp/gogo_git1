<?php 
	/*if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == ""){
		$redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		header("Location: $redirect");
	}*/
	require_once("../include/function.php");
	$oid	= empty($_GET["oid"])?"":$_GET["oid"];
//echo $oid;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Lemontreeclothing Administration</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/smanager/css/printorder.css" />
		<script type='text/javascript' src='Script_jy.js'></script>
	</head>
	<body>
<?php 
	$userID=$_COOKIE["aduserID"];
	if (empty($userID))
	{
		echo "<script>location.replace('index.php');</script>";
		exit;
	}
	else
	{
?>
		<div id="sub1">
		<?php
				$DB 	= new myDB;
				$strSQL = "SELECT * FROM Orders WHERE OrderID = " . $oid;
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
			<table>
			<tr>
			<td style="width: 500px;"><img src="/images/header_back1.png" style="width:200px;"></td><td style="width: 400px;"><h1 style="font-size:30px;">#<?php echo $data["OrderID"];?></h1><br><a href="#" onClick="javascript:window.print();">print</a></b></td ><td  style="border: 1px solid #eee;" rowspan="7"></td>
			</tr>
			</table>
			<table>
				<tr class="subject_border_top , thin_border_bottom">
					<th width="35%" colspan="2" class="subject">Sold To</th>
					<th width="35%" colspan="2" class="subject">Shipping To</th>
					<td width="30%" rowspan="11" >
					<table border="1">
					<tr >
					<td class="general_c" >&nbsp;<br>Print<br>&nbsp;</td><td class="general_c">&nbsp;<br>Pick<br>&nbsp;</td><td class="general_c">&nbsp;<br>Inspect<br>&nbsp;</td><td class="general_c">&nbsp;<br>Pack<br>&nbsp;</td><td class="general_c">&nbsp;<br>Process<br>&nbsp;</td>
					</tr>
					<tr >
					<td >&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td><td >&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td><td >&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td><td >&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td><td >&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
					</tr>
					<tr>
					<td colspan="3" style="text-align: right;">&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;LB<br>&nbsp;<br>&nbsp;<br>&nbsp;</td><td colspan="2">&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
					</tr>
					<tr>
					<td colspan="3">&nbsp;<br>&nbsp;<br>Clothing Qty:&nbsp;<br>&nbsp;<br>&nbsp;</td><td colspan="2">&nbsp;<br>&nbsp;<br>Jewelry Qty:&nbsp;<br>&nbsp;<br>&nbsp;</td>
					</tr>
					</table>
					</td>
				</tr>
				<tr class="thin_border_bottom">
					<th class="subject2">Name</th>
					<td class="general">
						<?php echo $data["MailingFirstName"];?>&nbsp;<?php echo $data["MailingLastName"];?>
					</td>
					<th class="subject2">Name</th>
					<td class="general">
						<?php echo $data["ShippingFirstName"];?>&nbsp;<?php echo $data["ShippingLastName"];?>
					</td>
					
				</tr>
				<tr class="thin_border_bottom">
					<th class="subject2">Street</th>
					<td class="general"><?php echo $data["MailingStreet"];?></td>
					<th class="subject2">Street</th>
					<td class="general"><?php echo $data["ShippingStreet"];?></td>
				</tr>
				<tr class="thin_border_bottom">
					<th class="subject2">Company Name</th>
					<td class="general"><?php echo $data["MailingCompanyName"];?></td>
					<th class="subject2">Company Name</th>
					<td class="general"><?php echo $data["ShippingCompanyName"];?></td>
				</tr>
				<tr class="thin_border_bottom">
					<th class="subject2">City</th>
					<td class="general"><?php echo $data["MailingCity"];?></td>
					<th class="subject2">City</th>
					<td class="general"><?php echo $data["ShippingCity"];?></td>
				</tr>
				<tr class="thin_border_bottom">
					<th class="subject2">State / Province</th>
					<td class="general"><?php echo $data["MailingStateOrProvince"];?></td>
					<th class="subject2">State / Province</th>
					<td class="general"><?php echo $data["ShippingStateOrProvince"];?></td>
				</tr>
				<tr class="thin_border_bottom">
					<th class="subject2">Zipcode</th>
					<td class="general"><?php echo $data["MailingZipcode"];?></td>
					<th class="subject2">Zipcode</th>
					<td class="general"><?php echo $data["ShippingZipcode"];?></td>
				</tr>
				<tr class="thin_border_bottom">
					<th class="subject2">Country</th>
					<td class="general"><?php echo $data["MailingCountry"];?></td>
					<th class="subject2">Country</th>
					<td class="general"><?php echo $data["ShippingCountry"];?></td>
				</tr>
				<tr class="thin_border_bottom">
					<th class="subject2">Phone</th>
					<td class="general"><?php echo $data["MailingPhone"];?></td>
					<th class="subject2">Phone</th>
					<td class="general"><?php echo $data["ShippingPhone"];?></td>
				</tr>
				<tr class="thin_border_bottom">
					<th class="subject2">Fax</th>
					<td class="general"><?php echo $data["MailingFax"];?></td>
					<th class="subject2">Fax</th>
					<td class="general"><?php echo $data["ShippingFax"];?></td>
				</tr>
				<tr class="subject_border_bottom">
					<th class="subject2">E-mail Address</th>
					<td class="general"><?php echo $data["MailingEmailAddress"];?></td>
					<th class="subject2">E-mail Address</th>
					<td class="general"><?php echo $data["ShippingEmailAddress"];?></td>
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
								<table>
								<tr>
								<th class="subject2_c" style="tex">Date</th>
								<th class="subject2_c" >Status</th>
								<th class="subject2_c" >Comments</th>
								<th class="subject2_c" >Mail to Customer</th>
								
							</tr>
								
								<?php
								
								$DBCO 	= new myDB;
								$strSQLC = " SELECT * FROM Comment WHERE OrderID=".$data["OrderID"];
								//echo $strSQLC;
								$DBCO->query($strSQLC);
								
								while($dataCO = $DBCO->fetch_array($DBCO->res)){
								
								echo "<tr class='thin_border_bottom thin_border_left'>";
								echo "<td class='general' width='15%'>". $dataCO["DateCreate"]."</td>";
								echo "<td class='general' width='10%'>". $dataCO["Status"]."</td>";
								echo "<td class='general' width='55%'>". $dataCO["Comment"]."</td>";
								echo "<td class='general' width='10%'>". $dataCO["Mailto"]."</td>";
								echo "<tr>";
								}
								?>
								
								</table>
								<td>
							</tr>
						

				<tr class="subject_border_bottom subject_border_top">
					<th class="subject2">Payment Method</th>
					<td  class="general"><?php echo $data["PaymentMethod"];?></td>
					<th style="color:blue;" class="subject2">Tracking No.</th>
					<td  colspan="2" class="general">
						<?php echo $data["ShippingTrackingNo"];?> &nbsp;
						(Label / Receipt No.)
					</td>
				</tr>
				
				
			</table>
			<br/>
			<table>
				<tr class="subject_border_bottom , thin_border_bottom">
					<th colspan="8" class="subject">Ordered Items</th>
				</tr>
				<!--<tr class="thin_border_bottom">
					<th class="subject2_c">No</th>
					<th class="subject2_c">Item Info</th>
					<th class="subject2_c">Colors</th>
					<th class="subject2_c">Sizes</th>
					<th class="subject2_c">Qty.</th>
					<th class="subject2_c">Unit Price</th>
					<th class="subject2_c">Amount</th>
				</tr>-->
				<?php
					$DB2 	= new myDB;
					$strSMSQL = "SELECT OI.StyleNo, OI.ProductName, OI.ListOfSizeNames as listName, OI.ListOfOrderQuantities, OI.TotalQuantity, OI.UnitPrice, OI.TotalAmount,";
					$strSMSQL .= " OI.UnitPriceHow, P.BrandName, P.Picture1, C.Color";
					$strSMSQL .= " FROM OrderItems OI LEFT JOIN Products P ON OI.ProductID = P.ProductID LEFT JOIN Colors C ON P.ColorIDs = C.ColorID";
					$strSMSQL .= " WHERE OrderID =".$oid;
					$strSMSQL .= " ORDER BY OI.ProductID";
					$DB2->query($strSMSQL);
					//echo $strSMSQL;
					$num = 1;
					echo "<tr class=\"thin_border_bottom\">";
					while($dataSub = $DB2->fetch_array($DB2->res)){
						
						echo "<td class=\"general_c\">" . $num . "<br>";
						//echo "<td class=\"general_c\">";
						echo $dataSub["StyleNo"]."<br/>";
						echo "<a href=\"#\"><img src=\"http://www.lemontreeclothing.com/Images_Products/" . $dataSub["Picture1"] . "\" width=\"80\"/></a><br/>";
						echo "<b>Brand</b>: " . $dataSub["BrandName"] . "<br/>";
						echo $dataSub["ProductName"]."<br/>";
						echo  $dataSub["Color"] . "<br/";
						//echo "<div class=\"bigCel\">";
						//echo "<dl>";
						$tmpArray =  explode(",", $dataSub["listName"]);
						$tmpArray2 =  explode(",", $dataSub["ListOfOrderQuantities"]);
						for($i=0; $i< count($tmpArray); $i++){
							//echo "<div class=\"product_options\">";
							echo "Size: <span>" . $tmpArray[$i] . "</span>";
							//echo "<dd>Qty: <em>" . $tmpArray2[$i] . "</em> ea</dd>";
							//echo "</div>";
						}
						//echo "</dl>";
						echo "<br/>";
						/*echo "<div class=\"bigCel\">";
						echo "<div class=\"cel\">";
						echo "<p style=\"color: #999;\">".$dataSub["UnitPriceHow"] . " = " . $dataSub["UnitPrice"] . "</p></div>";
						echo "</div>";*/
						echo  $dataSub["TotalQuantity"] . "<br/>";
						echo  $dataSub["UnitPrice"] . "</br>";
						echo  $dataSub["TotalAmount"] . "</td>";
						if($num%3==0)
							echo "</tr>";

							$num++;
						
						}
						if($num%3!=0)
						echo "</tr>";
					?>
					<tr class="thin_border_bottom">
						<td colspan="8" class="general" style="text-align: right">
							Sub Total:   &nbsp;<?php echo $data["TotalProductAmount"]; ?><br/>
							Level Discount :   - <?php echo $data["Member_DiscountAmount"]; ?><br/>
							Coupon Discount :   - <?php echo $data["DiscountAmount"]; ?><br/>
							Shipping Charge:   + <?php echo $data["ShippingCharge"]; ?><br/>
							<b>Total Order Amount:&nbsp;         $<?php 
								$TotalOrderAmount = $data["TotalProductAmount"]; 
								$TotalOrderAmount -= $data["Member_DiscountAmount"];
								$TotalOrderAmount -= $data["DiscountAmount"];								
								$TotalOrderAmount += $data["ShippingCharge"];
								echo $TotalOrderAmount;
							?> </b><br/>
						</td>
					</tr>
					<!--<tr class="thin_border_bottom">
						<th colspan="2" class="subject2">Customer's Request:</th>
						<td colspan="6" class="general"><?php echo $data["ShippingEmailAddress"];?></td>
					</tr>-->
			</table>
		</div>
		<?php }?>
	</body>
</html>