<?php 
	require_once("header.php"); 
	require_once("../lib/CountryCodes.php");

	$action						= $_POST["action"];
	$IsActive					= $_POST["IsActive"];
	$Is_VIP_Member				= $_POST["Is_VIP_Member"];
	$TotalPointsEarned			= $_POST["TotalPointsEarned"];
	$LoginID					= $_POST["LoginID"];
	$LoginPassword				= $_POST["LoginPassword"];
	$ReceiveEmail				= $_POST["ReceiveEmail"];
	$HowDidYouFindUs			= $_POST["HowDidYouFindUs"];
	$CreditAmount				= $_POST["CreditAmount"];
	$PenaltyAmount				= $_POST["PenaltyAmount"];
	$MemoOnCredit				= $_POST["MemoOnCredit"];
	$MemoOnPenalty				= $_POST["MemoOnPenalty"];
	$MemoOnCustomer				= $_POST["MemoOnCustomer"];
	$MailingFirstName			= $_POST["MailingFirstName"];
	$MailingMiddleName			= $_POST["MailingMiddleName"];
	$MailingLastName			= $_POST["MailingLastName"];
	$MailingCompanyName			= $_POST["MailingCompanyName"];
	$MailingStreet				= $_POST["MailingStreet"];
	$MailingCity				= $_POST["MailingCity"];
	$MailingStateOrProvince		= $_POST["MailingStateOrProvince"];
	$MailingZipcode				= $_POST["MailingZipcode"];
	$MailingCountry				= $_POST["MailingCountry"];
	$MailingPhone				= $_POST["MailingPhone"];
	$MailingFax					= $_POST["MailingFax"];
	$SortShippingAddress		= $_POST["SortShippingAddress"];
	$ShippingFirstName			= $_POST["ShippingFirstName"];
	$ShippingLastName			= $_POST["ShippingLastName"];
	$ShippingCompanyName		= $_POST["ShippingCompanyName"];
	$ShippingStreet				= $_POST["ShippingStreet"];
	$ShippingCity				= $_POST["ShippingCity"];
	$ShippingStateOrProvince	= $_POST["ShippingStateOrProvince"];
	$ShippingZipcode			= $_POST["ShippingZipcode"];
	$ShippingCountry			= $_POST["ShippingCountry"];
	$ShippingPhone				= $_POST["ShippingPhone"];
	$ShippingEmailAddress		= $_POST["ShippingEmailAddress"];
	$ShippingFax				= $_POST["ShippingFax"];
	$SearchField	= $_GET["SearchField"];
	$SearchKeyword	= $_GET["SearchKeyword"];
	$aid			= empty($_GET["aid"])?null:$_GET["aid"];
	$act			= empty($_GET["act"])?null:$_GET["act"];
	$btn			= empty($_POST["button"])?null:$_POST["button"];
	$pp				= empty($_GET["pp"])?null:$_GET["pp"];
?>


	<!-- sideMenu -->
	<div class="path" style='display:none'>
	About Us</div>

	<div id="bodywrapper">
    
    <!-- sideMenu -->
		<div id="navLeft">
			<div style="font:bold 16px/1.2 Palatino Linotype;color:#aaa;">Lemontreeclothing Events
			</div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
				<br/>
				
			</div>
			
		</div>
		
		
		<!-- content right -->
		<div id="contwrapper">
			<div id="title">
				Customers Update Test
			</div>
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
												"MailingStateOrProvince","MailingZipcode","MailingCountry","MailingPhone","MailingFax","ShippingStreet",
												"ShippingCity","ShippingStateOrProvince","ShippingZipcode","ShippingCountry","ShippingPhone","ShippingFax",
												"Is_VIP_Member","IsActive","ReceiveEmail");
										$searchName=array("First Name","Last Name","Login ID (= Email Address)","Login Password","Mailing Street Address",
												"Mailing City","Mailing State / Province","Mailing Zipcode","Mailing Country","Mailing Phone Number","Mailing Fax Number",
												"Shipping Street Address","Shipping City","Shipping State / Province","Shipping Zipcode","Shipping Country",
												"Shipping Phone Number","Shipping Fax Number","VIP Member? (Y or N)","Active? (Y or N)","Receive E-mail? (Y or N)");
										for($i=0;$i<=20;$i++){
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
			<div id="sub2">
				<form name="form1" method="post" action="customersTest_action.php">
					<table>									
						<input type="hidden" name="GotoPage" value="1"/>
						<input type="hidden" name="SearchAField" value/>
						<input type="hidden" name="SearchKeyword" value/>
						<tbody>
							<tr class="subject_border_top">
								<td class="subject1_2"><input type="checkbox" id="checkall" onclick="return checkedAll(this.form);"></td>
								<td class="subject1_2">CID</td>
								<td class="subject1_2">Customer Name</td>
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
	/****** PAGING ******/
	$DB 	= new myDB;
	//echo $SearchField. "<br/>";
	//echo $SearchKeyword. "<br/>";
	if($SearchField!=null && $SearchKeyword!=null){
		$strSQL = "SELECT * FROM Customers";
		$strSQL .= " WHERE " . $SearchField . " LIKE '" . $SearchKeyword. "%'";
	}else{
		$strSQL = "SELECT * FROM Customers";
	}	
	$strOrd	= " ORDER BY CustomerID DESC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = ($LIMIT < 0)?1:ceil($numrows/$LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $LIMIT * ($pp - 1);
	if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
	$DB->query($strSQL);
	while ($data = $DB->fetch_array($DB->res)){
		if($data["DateTimeRegistered"]<1){
			$dateRegistered="";
		}else{
		$dateRegistered = date("n/j/Y", strtotime($data["DateTimeRegistered"]));
		}
		if($data["DateTimeLastLogin"]<1){
		$dateLastLogin = "";
		}else{
		$dateLastLogin = date("n/j/Y", strtotime($data["DateTimeLastLogin"]));
		}
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general_c\"><input type=\"checkbox\" name=\"idtodel[]\" id=\"checklist\" value=\"" . $data["CustomerID"] . "\"></td>";
		echo "<td class=\"general_c\">" . $data["CustomerID"] . "</td>";
		echo "<td class=\"general\"><a href=\"Manage_Customers.php?SearchField=" . $SearchField . "&SearchKeyword=" . $SearchKeyword . "&pp=" . $pp;
		echo "&act=view&aid=" . $data["CustomerID"] . "\">" . $data["MailingFirstName"] . "&nbsp;" . $data["MailingLastName"] . "</a></td>";
		echo "<td class=\"general\"><b>Tel</b>: " . $data["MailingPhone"] . "<br/><b>Fax</b>: " . $data["MailingFax"]. "</td>";
		echo "<td class=\"general\"><b>ID</b>: " . $data["LoginID"] . "<br/><b>PW</b>: " . $data["LoginPassword"]. "</td>";
		echo "<td class=\"general_c\">" . $data["MailingCountry"] . "</td>";
		echo "<td class=\"general_c\">" . $dateRegistered . "</td>";
		echo "<td class=\"general_c\">" . $dateLastLogin . "</td>";
		echo "<td class=\"general_c\">" . $data["TotalLoginCount"] . "</td>";
		echo "<td class=\"general_c\">" . $data["IsActive"] . "</td>";
		echo "<td class=\"general_c\">";
		echo "<a href=\"Manage_Customers_action.php?action=del&id=" . $data["CustomerID"] . "\" onclick=\"if(confirm('Do you want to delete this customer?')){return true;}else{return false;}\">";
		echo "Delete</a></td>";
	}
	
?>			
							<input type="hidden" name="CustomerID" value="<?php echo $aid;?>"/>	
							<tr>
								<td colspan="11" class="general_c">
									<input type="submit" name="button" onclick="if(confirm('Do you want to activate the checked customers?')){return true;}else{return false;}" value="Active Checked Customers"/>									
									<input type="submit" name="button" onclick="if(confirm('Do you want to delete the checked customers?')){return true;}else{return false;}" value="Delete Checked Customers"/>
									<input type="submit" name="button" onclick="if(confirm('Do you want to delete the checked customers?')){return true;}else{return false;}" value="Update Customers"/>
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
			<div id="sub3">
				<?php 
				if($act=="view"){		//someting selected
					echo "<p><a href=\"Manage_Customers.php\">Add New Customer</a></p>";
				?>
				<table>
					<form name="form2" method="post" action="customersTest_action.php">
						<?php
							if($act=="view"){
								$strSQL = "SELECT * FROM Customers WHERE CustomerID = " . $aid;
								$DB->query($strSQL);
								$data = $DB->fetch_array($DB->res);
								if($data["DateTimeRegistered"]<1){
									$dateRegistered="";
								}else{
									$dateRegistered = date("n/j/Y g:i:s A", strtotime($data["DateTimeRegistered"]));
								}
								if($data["DateTimeLastLogin"]<1){
									$dateLastLogin = "";
								}else{
									$dateLastLogin = date("n/j/Y g:i:s A", strtotime($data["DateTimeLastLogin"]));
								}
								if($data["DateTimeLastUpdated"]<1){
									$dateUpdate="";
								}else{
									$dateUpdate = date("n/j/Y g:i:s A", strtotime($data["DateTimeLastUpdated"]));
								}	
							}	
						?>
						<input type="hidden" name="CustomerID" value="<?php echo $aid ?>"/>
						<input type="hidden" name="SearchField" value="<?php echo $SearchField; ?>">
						<input type="hidden" name="SearchKeyword" value="<?php echo $SearchKeyword; ?>">
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<td colspan="4" class="subject">Details of Customer <?php 
								if($act=="view"){		//someting selected
									echo "(CustomerID = " . $data["CustomerID"] . ")";
								}
								?>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Date/Time Registered</th>
								<td class="general"><?php if($act=="view") echo $dateRegistered;?></td>
								<th class="subject2">Date/Time Updated</th>
								<td class="general"><?php if($act=="view") echo $dateUpdate;?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Date/Time Last Login</th>
								<td class="general"><?php if($act=="view") echo $dateLastLogin;?></td>
								<th class="subject2">Total Login Count</th>
								<td class="general"><?php echo $data["TotalLoginCount"];?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Total Order Count</th>
								<td class="general"><?php echo $data["TotalOrderCount"];?></td>
								<th class="subject2">Total Order Amount ($)</th>
								<td class="general"><?php echo $data["TotalOrderAmount"];?> (Shipped Amount)</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Active?</th>
								<td class="general">
									<input type="checkbox" name="IsActive" value="Y" <?php echo ($data["IsActive"]=="Y")?"checked":null?>>
								</td>
								<th class="subject2"></th>
								<td class="general"></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">VIP Member?</th>
								<td class="general">
									<input type="checkbox" name="Is_VIP_Member" value="Y" <?php echo ($data["Is_VIP_Member"]=="Y")?"checked":null?>>
								</td>
								<th class="subject2">Total Points Earned</th>
								<td class="general">
									<input type="text" name="TotalPointsEarned" value="<?php echo $data["TotalPointsEarned"];?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Login ID (= E-mail)</th>
								<td class="general">
									<input type="text" name="LoginID" value="<?php echo $data["LoginID"]; ?>"/>
								</td>
								<th class="subject2">Login Password</th>
								<td class="general">
									<input type="text" name="LoginPassword" value="<?php echo $data["LoginPassword"]; ?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Receive E-mail?</th>
								<td class="general">
									<input type="checkbox" name="ReceiveEmail" value="Y" <?php echo ($data["ReceiveEmail"]=="Y")?"checked":null?>>
								</td>
								<th class="subject2">How did he/she find us?</th>
								<td class="general">
									<select name="HowDidYouFindUs"> 
										<option value>Select one:</option>
										<?php 
											$findUs=array("Search Engine - Google","Search Engine - Yahoo","Search Engine - Other","Magazine Advertisement",
													"Flyers / Business Cards","Referred by People / Friends","I was an old customer","By accident","Others");
											for($i=0;$i<=8;$i++){
												echo "<option value=\"".$findUs[$i]."\"";
												if($data["HowDidYouFindUs"]==$findUs[$i]){
													echo "selected";
												} 
												echo "> ".$findUs[$i]."</option>";
											}
										?>
									</select>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Credit Amount ($)</th>
								<td class="general">
									<input type="text" name="CreditAmount" value="<?php echo $data["CreditAmount"];?>"/>
								</td>
								<th class="subject2">Penalty Amount ($)</th>
								<td class="general">
									<input type="text" name="PenaltyAmount" value="<?php echo $data["PenaltyAmount"];?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Memo on Credit Amount</th>
								<td class="general">
									<textarea name="MemoOnCredit" rows="3"  style="width: 95%"><?php echo $data["MemoOnCredit"];?></textarea>
								</td>
								<th class="subject2">Memo on Penalty Amount</th>
								<td class="general">
									<textarea name="MemoOnPenalty" rows="3"  style="width: 100%"><?php echo $data["MemoOnPenalty"];?></textarea>
								</td>
							</tr>
							<tr>
								<th class="subject2">Comment on Customer</th>
								<td colspan="3" class="general">
									<textarea name="MemoOnCustomer" rows="3" style="margin: 0px; width: 100%"<?php echo $data["MemoOnCustomer"];?>></textarea>
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
							<tr>
								<td colspan="4" class="subject , subject_border_top , thin_border_bottom">
									 Shipping Address 
									 <input type="checkbox" name="IsThisSameAddress" value="Yes" onclick="CopyMailingToShipping(this.form);"/> 
									 Check here if the shipping address is the same as the mailing address shown above.
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">This is a</th>
								<td class="general">
									<select name="SortShippingAddress">
										<option value>Select one: </option>
										<option value="Residential Address" selected>Residential Address</option>
										<option value="Commercial Address">Commercial Address</option>
									</select>
								</td>
								<th class="subject2"></th>
								<td class="general"></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">First Name</th>
								<td class="general">
									<input type="text" name="ShippingFirstName" value="<?php echo $data["ShippingFirstName"];?>"/>
								</td>
								<th class="subject2">Last Name</th>
								<td class="general">
									<input type="text" name="ShippingLastName" value="<?php echo $data["ShippingLastName"];?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Company Name</th>
								<td class="general">
									<input type="text" name="ShippingCompanyName" value="<?php echo $data["ShippingCompanyName"];?>"/>
								</td>
								<th class="subject2"></th>
								<td class="general"></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Street Address</th>
								<td class="general">
									<input type="text" name="ShippingStreet" value="<?php echo $data["ShippingStreet"];?>"/>
								</td>
								<th class="subject2">City</th>
								<td class="general">
									<input type="text" name="ShippingCity" value="<?php echo $data["ShippingCity"];?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">State / Province</th>
								<td class="general">
									<input type="text" name="ShippingStateOrProvince" value="<?php echo $data["ShippingStateOrProvince"];?>"/>
								</td>
								<th class="subject2">Zipcode</th>
								<td class="general">
									<input type="text" name="ShippingZipcode" value="<?php echo $data["ShippingZipcode"];?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Country</th>
								<td class="general">
									<input type="text" name="ShippingCountry" value="<?php echo $data["ShippingCountry"];?>"/>
								</td>
								<th class="subject2">Phone</th>
								<td class="general">
									<input type="text" name="ShippingPhone" value="<?php echo $data["ShippingPhone"];?>"/>
									(Ex: 213-500-1234)
								</td>
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2">E-mail Address</th>
								<td class="general">
									<input type="text" name="ShippingEmailAddress" value="<?php echo $data["ShippingEmailAddress"];?>"/>
								</td>
								<th class="subject2">Fax</th>
								<td class="general">
									<input type="text" name="ShippingFax" value="<?php echo $data["ShippingFax"];?>"/>
									(Ex: 213-500-1234)
								</td>
							</tr>
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
			</div>

		
<?php 
	require_once("footer.php");
	$DB->close();	//DB close
?>