<?php 
	require_once("header.php"); 

	$action						= !empty($_POST["action"]);
	$IsActive					= !empty($_POST["IsActive"]);
	$Is_VIP_Member				= !empty($_POST["Is_VIP_Member"]);
	$TotalPointsEarned			= !empty($_POST["TotalPointsEarned"]);
	$LoginID					= !empty($_POST["LoginID"]);
	$LoginPassword				= !empty($_POST["LoginPassword"]);
	$ReceiveEmail				= !empty($_POST["ReceiveEmail"]);
	$HowDidYouFindUs			= !empty($_POST["HowDidYouFindUs"]);
	$CreditAmount				= !empty($_POST["CreditAmount"]);
	$PenaltyAmount				= !empty($_POST["PenaltyAmount"]);
	$MemoOnCredit				= !empty($_POST["MemoOnCredit"]);
	$MemoOnPenalty				= !empty($_POST["MemoOnPenalty"]);
	$MemoOnCustomer				= !empty($_POST["MemoOnCustomer"]);
	$MailingFirstName			= !empty($_POST["MailingFirstName"]);
	$MailingMiddleName			= !empty($_POST["MailingMiddleName"]);
	$MailingLastName			= !empty($_POST["MailingLastName"]);
	$MailingCompanyName			= !empty($_POST["MailingCompanyName"]);
	$MailingStreet				= !empty($_POST["MailingStreet"]);
	$MailingCity				= !empty($_POST["MailingCity"]);
	$MailingStateOrProvince		= !empty($_POST["MailingStateOrProvince"]);
	$MailingZipcode				= !empty($_POST["MailingZipcode"]);
	$MailingCountry				= !empty($_POST["MailingCountry"]);
	$MailingPhone				= !empty($_POST["MailingPhone"]);
	$MailingFax					= !empty($_POST["MailingFax"]);
	$SortShippingAddress		= !empty($_POST["SortShippingAddress"]);
	$ShippingFirstName			= !empty($_POST["ShippingFirstName"]);
	$ShippingLastName			= !empty($_POST["ShippingLastName"]);
	$ShippingCompanyName		= !empty($_POST["ShippingCompanyName"]);
	$ShippingStreet				= !empty($_POST["ShippingStreet"]);
	$ShippingCity				= !empty($_POST["ShippingCity"]);
	$ShippingStateOrProvince	= !empty($_POST["ShippingStateOrProvince"]);
	$ShippingZipcode			= !empty($_POST["ShippingZipcode"]);
	$ShippingCountry			= !empty($_POST["ShippingCountry"]);
	$ShippingPhone				= !empty($_POST["ShippingPhone"]);
	$ShippingEmailAddress		= !empty($_POST["ShippingEmailAddress"]);
	$ShippingFax				= !empty($_POST["ShippingFax"]);
	
	$order	= empty($_GET["order"])?null:$_GET["order"];
	$orderfield	= empty($_GET["orderfield"])?null:$_GET["orderfield"];

	$SearchField	= !empty($_GET["SearchField"]);
	$SearchKeyword	= !empty($_GET["SearchKeyword"]);
	$aid			= empty($_GET["aid"])?null:$_GET["aid"];
	$act			= empty($_GET["act"])?null:$_GET["act"];
	$btn			= empty($_POST["button"])?null:$_POST["button"];
	$pp				= empty($_GET["pp"])?null:$_GET["pp"];
	$DB 	= new myDB;
	$DBo 	= new myDB;
?>


	<!-- sideMenu -->
	<div class="path" style='display:none'>
	</div>

	<div id="bodywrapper">
    
    <!-- sideMenu -->
		<div id="navLeft">
			<div style="font:bold 16px/1.2 Palatino Linotype;color:#aaa;">gogomarket Events
			</div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
				<br/>
				
			</div>
			
		</div>
		
		
		<!-- content right -->
		<div id="contwrapper" style="border-left: 1px solid #BBB;">
			<div id="title">
				Manage Customers
			</div>
<!---------------------------------------------------------------------------------------------------------------->
		<div id="sub3">
				<?php 
				if($act=="view"){		//someting selected
					//echo "<p><a href=\"Manage_Customers.php\">Add New Customer</a></p>";
				?>
				<table>
					<form name="form2" method="post" action="Manage_Customers_action.php">
						<?php
							if($act=="view"){
								$strSQL = "SELECT * FROM customers WHERE id_customer = " . $aid;
								$DB->query($strSQL);
								$data = $DB->fetch_array($DB->res);
								if($data["date_created"]<1){
									$dateRegistered="";
								}else{
									$dateRegistered = date("n/j/Y g:i:s A", strtotime($data["date_created"]));
								}
								/*if($data["DateTimeLastLogin"]<1){
									$dateLastLogin = "";
								}else{
									$dateLastLogin = date("n/j/Y g:i:s A", strtotime($data["DateTimeLastLogin"]));
								}*/
								if($data["date_updated"]<1){
									$dateUpdate="";
								}else{
									$dateUpdate = date("n/j/Y g:i:s A", strtotime($data["date_updated"]));
								}	
							}	
						?>
						<input type="hidden" name="CustomerID" value="<?php echo $aid ?>"/>
						<input type="hidden" name="SearchField" value="<?php echo $SearchField; ?>">
						<input type="hidden" name="SearchKeyword" value="<?php echo $SearchKeyword; ?>">
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<td colspan="4" class="subject">Account Info 
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Account No</th>
								<td  class="general"><?php 
								if($act=="view"){		//someting selected
									echo  $data["id_customer"]  ;
								}
								?>
								</td>
								<th class="subject2">Status</th>
								<!--<td class="general">
									<input type="checkbox" name="IsActive" value="Y" <?php echo ($data["IsActive"]=="Y")?"checked":null?>>
								</td>-->

								<td class="general" >
								<input type="radio" name="IsActive"  value="1" <?php echo ($data["active"]==1) ?"checked":null?>/>Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="IsActive"  value="0" <?php echo (($data["active"]==0) or ($data["active"]=="") )?"checked":null?>/>Inactive
							</td>
								
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Registered</th>
								<td class="general"><?php if($act=="view") echo $dateRegistered;?></td>
								<th class="subject2">Updated</th>
								<td class="general"><?php if($act=="view") echo $dateUpdate;?></td>
							</tr>
							<!--<tr class="thin_border_bottom">
								<th class="subject2">Last Login</th>
								<td class="general"><?php if($act=="view") echo $dateLastLogin;?></td>
								<th class="subject2">Login Count</th>
								<td class="general"><?php echo $data["TotalLoginCount"];?></td>
							</tr>-->
							
							<tr class="thin_border_bottom">
								<th class="subject2">Login ID</th>
								<td class="general">
									<input type="text" name="LoginID" value="<?php echo $data["id_customer"]; ?>"/>
								</td>
								<th class="subject2">Password</th>
								<td class="general">
									<input type="text" name="LoginPassword" value="<?php echo $data["customer_password"]; ?>"/>
								</td>
							</tr>
							
							<tr>
								<td colspan="4" class="subject , subject_border_top , thin_border_bottom">Mailing / Billing Address</td>
								
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Name</th>
								<td class="general">
									First Name:<br/>
									<input type="text" name="MailingFirstName" value="<?php echo $data["MailingFirstName"];?>"/>
								</td>
								<td class="general">
									Middle Name (or Initial):<br/>
									<input type="text" name="MailingMiddleName" value="<?php echo $data["MailingMiddleName"];?>"/>
								</td>
								<td class="general">
									Last Name:<br/>
									<input type="text" name="MailingLastName" value="<?php echo $data["MailingLastName"];?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Company Name</th>
								<td class="general">
									<input type="text" name="MailingCompanyName" value="<?php echo $data["MailingCompanyName"];?>"/>
								</td>
								<th class="subject2"></th>
								<td class="general"></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Street Address</th>
								<td class="general">
									<input type="text" name="MailingStreet" value="<?php echo $data["MailingStreet"];?>"/>
								</td>
								<th class="subject2">City</th>
								<td class="general">
									<input type="text" name="MailingCity" value="<?php echo $data["MailingCity"];?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">State / Province</th>
								<td class="general">
									<input type="text" name="MailingStateOrProvince" value="<?php echo $data["MailingStateOrProvince"];?>"/>
								</td>
								<th class="subject2">Zipcode</th>
								<td class="general">
									<input type="text" name="MailingZipcode" value="<?php echo $data["MailingZipcode"];?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Country</th>
								<td class="general">
									<input type="text" name="MailingCountry" value="<?php echo $data["MailingCountry"];?>"/>
								</td>
								<th class="subject2">Phone</th>
								<td class="general">
									<input type="text" name="MailingPhone" value="<?php echo $data["MailingPhone"];?>"/>
									(Ex: 213-500-1234)
								</td>
							</tr>
							<tr>
								<th class="subject2">Date of Birth</th>
								<td class="general">
<?php 
	if($data["BirthMonth"]>0){
		echo $data["BirthMonth"];
	}
	if($data["BirthDate"]>0){
		echo " / ".$data["BirthDate"];
	}
	if($data["BirthYear"]>0){
		echo " / ".$data["BirthYear"];
	}
?>
								</td>
								<th class="subject2">Fax</th>
								<td class="general">
									<input type="text" name="MailingFax" value="<?php echo $data["MailingFax"];?>"/>
									(Ex: 213-500-1234)
								</td>
							</tr>
							 <?php
								
								/*$strSQLo = "SELECT * FROM Orders Where customers=".$data['id_customer'];
								$DBo->query($strSQLo);
								
								echo "<tr>";
								echo "<td colspan=\"4\" class=\"subject ,thin_border_bottom\">";
								echo "<table><tr>";								
								echo "<th>Order  Date";
								echo "</th>";
								echo "<th>Order  No";
								echo "</th>";
								echo "<th>Payment Type";
								echo "</th>";
								echo "<th>Shipping Method";
								echo "</th>";
								echo "<th>Tacking Number"; 
								echo "</th>";
								echo "<th>Total"; 
								echo "</th>";
								echo "</tr>";
								while ($datao = $DBo->fetch_array($DBo->res)){
								echo "<tr class=\"subject_border_bottom\">";
								echo "<td>".$datao['OrderDateTime']."</td>";
								echo "<td>".$datao['OrderID']."</td>";
								echo "<td>".$datao['PaymentMethod']."</td>";
								echo "<td>".$datao['ShippingMethod']."</td>";
								echo "<td>".$datao['ShippingTrackingNo']."</td>";
								echo "<td>".$datao['TotalOrderAmount']."</td>";
								echo "</tr>";
								}
								echo "</table>";
								echo "</td>";
								echo "<tr>";*/
								?>
						
							
							<?php								
								echo "<tr>";
								echo "<td colspan=\"4\" class=\"general_c , btns\">";
								if(!$act){	//nothing selected
									echo "<input name=\"button2\" type=\"button\" onClick=\"return AddConfirm10(this.form);\" value=\"Add New Customer\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input name=\"button2\" type=\"button\" onClick=\"return UpdateConfirm3(this.form);\" value=\"Update This Customer\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"update\"/>";
									echo "<input type=\"hidden\" name=\"pp\" value=\"".$pp."\">";
									echo "<input type=\"hidden\" name=\"view\" value=\"view\">";
								}
							?>
							
								</td>
							</tr>
						</tbody>
					</form>
				</table>
			<?php }?>
			</div><!--<br>-->
<!---------------------------------------------------------------------------------------------------------------->
			<div id="sub1">
				<form name="SearchForm" method="get" action="Manage_Customers.php">
					<table>
						<tr>
							<td class="general_c">
								Search Customers:&nbsp;
								<select name="SearchField">
									<option value="">Select</option>
									<?php
										$searchVal =  array("MailingFirstName","MailingLastName","LoginID","LoginPassword","MailingStreet","MailingCity",
												"MailingStateOrProvince","MailingZipcode","MailingCountry","MailingPhone","MailingFax","IsActive","ReceiveEmail");
										$searchName=array("First Name","Last Name","Login ID (= Email Address)","Login Password","Mailing Street Address",
												"Mailing City","Mailing State / Province","Mailing Zipcode","Mailing Country","Mailing Phone Number","Mailing Fax Number",
												"Active? (Y or N)","Receive E-mail? (Y or N)");
										for($i=0;$i<=12;$i++){
											echo "<option value=\"".$searchVal[$i]."\"";
											if($SearchField==$searchVal[$i]){
												echo "selected";
											}
											echo ">&nbsp; " .$searchName[$i]."</option>";
										}
									?>
								</select> &nbsp;
								<input type="text" name="SearchKeyword" value="<?php echo $SearchKeyword; ?>"/> &nbsp;
								<input type="submit" name="submit" value="Submit"/>
							</td>
						</tr>						
					</table>
				</form>
			</div>
<?php 
	/****** PAGING ******/
	
	//echo $SearchField. "<br/>";
	//echo $SearchKeyword. "<br/>";
	if($SearchField!=null && $SearchKeyword!=null){
		$strSQL = "SELECT * FROM customers";
		$strSQL .= " WHERE " . $SearchField . " LIKE '%" . $SearchKeyword. "%'";
	}else{
		$strSQL = "SELECT * FROM customers";
	}
	if ($orderfield!="")
	{
		$strOrd	= " ORDER BY ";	
		$strOrd	.= $orderfield;
		if ($order =="DESC")
			$strOrd	.= " ".$order;
		//echo $strOrd;
		//exit;
	}
	else
	$strOrd	= " ORDER BY id_customer DESC";

	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = ($LIMIT < 0)?1:ceil($numrows/$LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $LIMIT * ($pp - 1);
	if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
	$DB->query($strSQL);
?>
			<div id="sub2">
				<div style="float:left;">
					Total : <?php echo $numrows?> ( page <?php echo $pp?> of <?php echo $totalpps?> )
				</div>
				<form name="form1" method="post" action="Manage_Customers_action.php">
					<table>									
						<input type="hidden" name="GotoPage" value="1"/>
						<input type="hidden" name="SearchAField" value/>
						<input type="hidden" name="SearchKeyword" value/>
						<tbody>
							<tr class="subject_border_top">
								<td class="subject1_2" ><input type="checkbox" id="checkall" onclick="return checkedAll(this.form);"></td>
								<td class="subject1_2" style="width: 70px;">CID&nbsp;<a href="Manage_Customers.php?SearchField=&SearchKeyword=&pp=&aid=&orderfield=CustomerID"><img src="/smanager/images/arrow_up.png" style="width:10px;height:10px;"></a><a href="Manage_Customers.php?SearchField=&SearchKeyword=&pp=&aid=&orderfield=CustomerID&order=DESC"><img src="/smanager/images/arrow_down.png" style="width:10px;height:10px;"></a></td>
								<td class="subject1_2" style="width: 70px;">Name&nbsp;<a href="Manage_Customers.php?SearchField=&SearchKeyword=&pp=&aid=&orderfield=MailingFirstName"><img src="/smanager/images/arrow_up.png" style="width:10px;height:10px;"></a><a href="Manage_Customers.php?SearchField=&SearchKeyword=&pp=&aid=&orderfield=MailingFirstName&order=DESC"><img src="/smanager/images/arrow_down.png" style="width:10px;height:10px;"></a></td>
								<td class="subject1_2" style="width: 130px;">Mailing Tel / Fax</td>
								<td class="subject1_2">Login ID / Password</td>
								<td class="subject1_2">Country</td>
								<td class="subject1_2" style="width: 130px;">Date Reistered</td>
								<td class="subject1_2" style="width: 130px;">Last Login</td>
								<td class="subject1_2">Login Count</td>
								<td class="subject1_2">Active?</td>
								<td class="subject1_2">Delete</td>
							</tr>
<?php 
	while ($data = $DB->fetch_array($DB->res)){
		if($data["date_created"]<1){
			$dateRegistered="";
		}else{
		$dateRegistered = date("n/j/Y", strtotime($data["DateTimeRegistered"]));
		}
		
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general_c\"><input type=\"checkbox\" name=\"idtodel[]\" id=\"checklist\" value=\"" . $data["id_customer"] . "\"></td>";
		echo "<td class=\"general_c\">" . $data["id_customer"] . "</td>";
		echo "<td class=\"general\"><a href=\"Manage_Customers.php?SearchField=" . $SearchField . "&SearchKeyword=" . $SearchKeyword . "&pp=" . $pp;
		echo "&act=view&aid=" . $data["id_customer"] . "\">" . $data["first_name"] . "&nbsp;" . $data["last_name"] . "</a></td>";
		echo "<td class=\"general\"><b>ID</b>: " . $data["email"] . "<br/><b>PW</b>: " . $data["customer_password"]. "</td>";
		echo "<td class=\"general_c\">" . $dateRegistered . "</td>";
		echo "<td class=\"general_c\">" . $dateLastLogin . "</td>";
		
		echo "<td class=\"general_c\">" . $data["active"] . "</td>";
		echo "<td class=\"general_c\">";
		echo "<a href=\"Manage_Customers_action.php?action=del&id=" . $data["id_customer"] . "\" onclick=\"if(confirm('Do you want to delete this customer?')){return true;}else{return false;}\">";
		echo "Delete</a></td>";
	}
	
?>			
							<input type="hidden" name="CustomerID" value="<?php echo $aid;?>"/>	
							<tr>
								<td colspan="11" class="general_c">
									<input type="submit" name="button" onclick="if(confirm('Do you want to activate the checked customers?')){return true;}else{return false;}" value="Active Checked Customers"/>									
									<input type="submit" name="button" onclick="if(confirm('Do you want to delete the checked customers?')){return true;}else{return false;}" value="Delete Checked Customers"/>
									<input type="hidden" name="pp" value="<?php echo $pp;?>"/>								
								</td>
							</tr>
						</tbody>					
					</table>
				</form>
			</div>
<?php 

		echo "<div class=\"product-page-bar\">";
		$linkopt = "SearchField={$SearchField}&SearchKeyword={$SearchKeyword}";
		//if ($ord) $linkopt.="&or=".$ord;
		if (!empty($kw)) $linkopt.="&kw=".$kw;
		listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
		echo "</div>";

?>
			<br/>
			
		
<?php 
	require_once("footer.php");
	$DB->close();	//DB close
?>