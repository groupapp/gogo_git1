<?php
//include "../include/function.php";
$userID=$_COOKIE["userID"];

/*
if (empty($userID))
{
	echo "<script>
	window.location='../index.php?page=customer&account=login';
	</script>";
}
*/
$strSQL = "SELECT * FROM Customers WHERE LoginID = '" . $userID."'";
$DB = new myDB;
$DB->query($strSQL);
$data = $DB->fetch_array($DB->res);
$CustomerID=$data["CustomerID"];
$MailingFirstName=$data["MailingFirstName"];
$MailingLastName=$data["MailingLastName"];
$LoginPassword=$data["LoginPassword"];
$MailingCompanyName=$data["MailingCompanyName"];
$MailingStreet=$data["MailingStreet"];
$MailingStreet2=$data["MailingStreet2"];
$MailingCity=$data["MailingCity"];
$MailingZipcode=$data["MailingZipcode"];
$MailingStateOrProvince=$data["MailingStateOrProvince"];
$MailingCountry=$data["MailingCountry"];
$MailingPhone=$data["MailingPhone"];
$MailingFax=$data["MailingFax"];

$ShippingFirstName=$data["ShippingFirstName"];
$ShippingLastName=$data["ShippingLastName"];
$ShippingCompanyName=$data["ShippingCompanyName"];
$ShippingStreet=$data["ShippingStreet"];
$ShippingStreet2=$data["ShippingStreet2"];
$ShippingCity=$data["ShippingCity"];
$ShippingStateOrProvince=$data["ShippingStateOrProvince"];
$ShippingZipcode=$data["ShippingZipcode"];
$ShippingCountry=$data["ShippingCountry"];
$ShippingPhone=$data["ShippingPhone"];
$ShippingFax=$data["ShippingFax"];
$ShippingEmailAddress=$data["ShippingEmailAddress"];

$DB2 = new myDB;
$strSMSQL = "SELECT * FROM State
WHERE Code = '".$data["MailingStateOrProvince"]."'";
$DB2->query($strSMSQL);
$datastate = $DB2->fetch_array($DB2->res);
$StateCode=$datastate["Code"];
$StateName=$datastate["Name"];
/*
 print_r($StateName);
Exit;*/
$DB3 = new myDB;
$strCoSQL = "SELECT * FROM Country
WHERE Code = '".$data["MailingCountry"]."'";
$DB3->query($strCoSQL);
$dataCountry = $DB3->fetch_array($DB3->res);
$CountryCode=$dataCountry["Code"];
$CountryName=$dataCountry["Name"];

$DB5 = new myDB;
$sstrSMSQL = "SELECT * FROM State
WHERE Code = '".$data["ShippingStateOrProvince"]."'";
$DB5->query($sstrSMSQL);
$sdatastate = $DB5->fetch_array($DB5->res);
$sStateCode=$sdatastate["Code"];
$sStateName=$sdatastate["Name"];
/*
 print_r($StateName);
Exit;*/
$DB6 = new myDB;
$sstrCoSQL = "SELECT * FROM Country
WHERE Code = '".$data["ShippingCountry"]."'";
$DB6->query($sstrCoSQL);
$sdataCountry = $DB6->fetch_array($DB6->res);
$sCountryCode=$sdataCountry["Code"];
$sCountryName=$sdataCountry["Name"];

//print_r($strCoSQL);
//Exit;
$DB->close();
$DB2->close();
$DB3->close();
$DB5->close();
$DB6->close();
?>



<div class="container" style="margin-top: 40px;">
	<div class="right-col1 col-md-3">
		
		<div class="list-group">
			<a href="/?page=customer&account=myaccount" class="list-group-item default">
				<h5 class="list-group-item-heading">My Account</h5>
				<p class="list-group-item-text">Review you account information</p>                                                    
			</a>
			
			<a href="/?page=customer&account=mypersonalinfo" class="list-group-item default">
				<h5 class="list-group-item-heading">My personal Information (Edit)</h5>
				<p class="list-group-item-text">Edit your personal information</p>    
			</a>
			
			<!--<a href="/?page=customer&account=myorderhistory" class="list-group-item default">
				<h5 class="list-group-item-heading">My order History</h5>
				<p class="list-group-item-text">See all your order history</p>    
			</a>
			
			<a href="/?info=mywishlist" class="list-group-item default">
				<h5 class="list-group-item-heading">My Wishlist</h5>
				<p class="list-group-item-text">See all your Wishlist</p>    
			</a>-->
			
		</div>
</div>

<div class="main-col1 col-md-9">
	<!--<div class="page-title">
		<h1>
			<span>My Personal Information</span>
		</h1>
	</div>-->

	<ol class="opc" id="checkoutSteps">
		<li id="opc-billing" class="section active">
			<div class="step-title">
				<h2>My Personal Information</h2>
				<a href="#">Edit</a>
			</div>
			<div id="checkout-step-billing" class="step a-item"
				style="display: block;">
				<form name="frm" id="co-billing-form" method="post"
					action="../contents/myaccount_action.php">
					<input type="hidden" name="CustomerID" value="<?php echo $CustomerID?>" />
					<fieldset>
						<ul class="form-list">
							<li id="billing-new-address-form">
								<fieldset>
									<input type="hidden" title="hideme" name="billing[address_id]"
										value="" id="billing:address_id" />
									<ul>
										<li class="fields">
											<div class="customer-name">
												<div class="field">
													<label for="billing:firstname" class="required"><em>*</em>First
														Name</label>
													<div class="input-box">
														<input type="text" id="billing:firstname"
															name="MailingFirstName"
															value="<?php echo $MailingFirstName?>" title="First Name"
															maxlength="255" class="input-text required-entry" />
													</div>
												</div>
												<div class="field-2">
													<label for="billing:lastname" class="required"><em>*</em>Last
														Name</label>
													<div class="input-box">
														<input type="text" id="billing:lastname"
															name="MailingLastName"
															value="<?php echo $MailingLastName?>" title="Last Name"
															maxlength="255" class="input-text required-entry" />
													</div>
												</div>
											</div>
										</li>
										<li class="fields">
											<div class="field">
												<label>Your Date of Birth</label>
												<div class="input-box input_wide">
													<div class="birth_box">
														<select name="birth_year">
															<option>Year</option>
<?php 
	$currnet_year = date("Y");
	for($i = $currnet_year; $i>=$currnet_year-100; $i--){?>
															<option value="<?php echo $i;?>" <?php if($i==$data["BirthYear"]) echo "selected";?>><?php echo $i;?></option>
<?php
	}
?>		
													
														</select>
													</div>
													<div class="birth_box">
														<select name="birth_month">
															<option>Month</option>
<?php 
	for($i=1;$i<=12;$i++){?>
															<option value="<?php echo $i;?>" <?php if($i==$data["BirthMonth"]) echo "selected";?>><?php echo $i;?></option>
<?php 
	}
?>

														</select>
													</div>
													<div class="birth_box">
														<select name="birth_date">
															<option>Date</option>
<?php for($i=1;$i<=31;$i++){?>
															<option value="<?php echo $i;?>" <?php if($i==$data["BirthDate"]) echo "selected";?>><?php echo $i;?></option>		
<?php }?>																												
														</select>
													</div>
												</div>
											</div>
										</li>
										<li class="fields" id="register-customer-password">
											<div class="field">
												<label for="billing:customer_password" class="required"><em>*</em>Password</label>
												<div class="input-box">
													<input type="password" id="password" name="password"
														value="<?php echo $LoginPassword?>"
														id="billing:customer_password" title="Password"
														class="input-text required-entry validate-password" />
												</div>
											</div>
											<div class="field-2">
													<label for="confirm_password" class="required">
														<em>*</em>Confirm Password
													</label>
													<div class="input-box">
														<input type="password" id="confirm_password"
															name="confirm_password"
															value="" title="Confirm Password"
															class="input-text required-entry" />
													</div>
												</div>

										</li>
										<li class="fields">
											<div class="field">
												<label for="billing:company">Company</label>
												<div class="input-box">
													<input type="text" id="billing:company"
														name="MailingCompanyName"
														value="<?php echo $MailingCompanyName?>" title="Company"
														class="input-text " />
												</div>
											</div>
											<div class="field-2">
												<label for="billing:email" class="required"><em>*</em>Email
													Address</label>
												<div class="input-box">
													<input type="text" name="login[userid]" id="billing:email"
														value="<?php echo $userID?>" title="Email Address"
														class="input-text validate-email required-entry" />
												</div>
											</div>
										</li>
									</ul>
									<!--<div class="step-title" style="margin: 15px 0;">
										<h2>Address</h2>
										<a href="#">Edit</a>
									</div>-->
									<ul>
										<li class="fields wide"><label for="billing:street1"
											class="required"><em>*</em>Address</label>
											<div class="input-box">
												<input type="text" title="Street Address"
													name="MailingStreet" id="billing:street1"
													value="<?php echo $MailingStreet?>"
													class="input-text  required-entry" />
											</div>
										</li>
										<li class="wide">
											<div class="input-box">
												<input type="text" title="Street Address 2"
													name="MailingStreet2" id="billing:street2"
													value="<?php echo $MailingStreet2?>" class="input-text " />
											</div>
										</li>
										<li class="fields">
											<div class="field">
												<label for="billing:city" class="required"><em>*</em>City</label>
												<div class="input-box">
													<input type="text" title="City" name="MailingCity"
														value="<?php echo $MailingCity?>"
														class="input-text  required-entry" id="billing:city" />
												</div>
											</div>
											<div class="field-2">
												<label for="billing:region_id" class="required"><em>*</em>State/Province</label>
												<div class="input-box">

													<?php
													$DB4 = new myDB;
													if ($CountryCode=='')
													{
														$strSQL4 = "SELECT * FROM State
														WHERE Country_code	 = 'US'";
														echo "<select id=\"billing:region_id\" name=\"billing[region_id]\" title=\"State/Province\" class=\"validate-select\" style=\"display:block;\">";
													}
													else
													{
														$strSQL4 = "SELECT * FROM State
														WHERE Country_code	 = '".$MailingCountry."'";
														if ($CountryCode=='US' or $sCountryCode=='CA' or $sCountryCode=='MX')
															echo "<select id=\"billing:region_id\" name=\"billing[region_id]\" title=\"State/Province\" class=\"validate-select\" style=\"display:block;\">";
														else
															echo "<select id=\"billing:region_id\" name=\"billing[region_id]\" title=\"State/Province\" class=\"validate-select\" style=\"display:none;\">";
													}
													echo "<option selected value=\"\"></option>";
													$DB4->query($strSQL4);
													while($datastate4 = $DB4->fetch_array($DB4->res))
													{
														$StateCode1=$datastate4["Code"];
														$StateName1=$datastate4["Name"];
														if ($StateCode==$StateCode1)
															echo "<option selected value=\"$StateCode1\"> $StateName1</option>";
														else
															echo "<option  value=\"$StateCode1\"> $StateName1</option>";
																	 }?>
													<!--<script type="text/javascript">$(document).ready(function() {showStates2("#billing\\:region", "#billing\\:region_id");});</script>>-->
													</select>
													<?php if ($StateCode1!='')
														echo "<input type=\"text\" id=\"billing:region\" name=\"billing[region]\" value=\" $MailingStateOrProvince\"  title=\"State/Province\" class=\"input-text\" style=\"display:none;\" />";
													else
														echo "<input type=\"text\" id=\"billing:region\" name=\"billing[region]\" value=\" $MailingStateOrProvince\"  title=\"State/Province\" class=\"input-text\"  style=\"display:block;\"/>";
													?>
												</div>
											</div>
										</li>

										<li class="fields">
											<div class="field">
												<label for="billing:postcode" class="required"><em>*</em>Zip/Postal
													Code</label>
												<div class="input-box">
													<input type="text" title="Zip/Postal Code"
														name="MailingZipcode" id="billing:postcode"
														value="<?php echo $MailingZipcode?>" class="input-text" />
												</div>
											</div>
											<div class="field-2">
												<label for="billing:country_id" class="required"><em>*</em>Country</label>
												<div class="input-box">
													<select name="billing[country_id]" id="billing:country_id"
														class="validate-select" title="Country">
														<?php
														include dirname(__FILE__) . "/../lib/CountryCodes.php";
														foreach($country_list as $code => $name) {
															if ($CountryCode== $code)
																echo "<option selected value=\"$code\">$name</option>\n";
															else
																echo "<option value=\"$code\">$name</option>\n";
														}

														?>
													</select>
												</div>
											</div>
										</li>
										<li class="fields">
											<div class="field">
												<label for="billing:telephone" class="required"><em>*</em>Telephone</label>
												<div class="input-box">
													<input type="text" name="MailingPhone"
														value="<?php echo $MailingPhone?>" " title="Telephone"
														class="input-text  required-entry" id="billing:telephone" />
												</div>
											</div>
											<div class="field-2">
												<label for="billing:fax">Fax</label>
												<div class="input-box">
													<input type="text" name="MailingFax"
														value="<?php echo $MailingFax?>" " title="Fax"
														class="input-text " id="billing:fax" />
												</div>
											</div>
										</li>

										<li class="no-display"><input type="hidden"
											name="billing[save_in_address_book]" value="1" />
										</li>
										<script type="text/javascript">
							                            $("#billing\\:country_id").live("change", function() {
															var ccode = $(this).val();
															if(ccode=="US" || ccode=="CA" || ccode=="MX") {
																$("#billing\\:region").css("display","none");
																$("#billing\\:region_id").css("display","block");
																$("#billing\\:region_id").html('');
																$.ajax({
																	async:false, type:"post", dataType:"json", url:"/lib/states.php",
																	data:{"code":ccode},
																	success:function(d) {
																		if (d) {
																			for(var i=0; i<d.states.length; i++) {
																				$("#billing\\:region_id").append(new Option(d.states[i].sname,d.states[i].scode,false,false));
																			}
																		}
																	}
																});
															} else {
																
																$("#billing\\:region").css("display","block");
																$("#billing\\:region_id").val('');
																$("#billing\\:region").val('');
																$("#billing\\:region_id").css("display","none");
															}
														});
														//showState2("b","");
						                            </script>
									</ul>
									<div id="window-overlay" class="window-overlay"
										style="display: none;"></div>
									<div id="remember-me-popup" class="remember-me-popup"
										style="display: none;">
										<div class="remember-me-popup-head">
											<h3>What's this?</h3>
											<a href="#" class="remember-me-popup-close" title="Close">Close</a>
										</div>
										<div class="remember-me-popup-body">
											<p>Checking &quot;Remember Me&quot; will let you access your
												shopping cart on this computer when you are logged out</p>
											<div class="remember-me-popup-close-button a-right">
												<a href="#" class="remember-me-popup-close button"
													title="Close"><span>Close</span> </a>
											</div>
										</div>
									</div>
								</fieldset>
							</li>


													</ul>
						

	</ol>
	<div class="buttons-set" id="billing-buttons-container">
		<p class="required">* Required Fields</p>
		<button type="button" title="Continue" class="button" onclick="return confirmPassword(this.form)">
			<span>Save</span>
		</button>
	</div>
	<span class="please-wait" id="billing-please-wait"
		style="display: none;"> <img src="/images/ajax_loader.gif"
		alt="Loading next step..." title="Loading next step..."
		class="v-middle" /> Updating Your imformation...
	</span>
	<p>&nbsp;</p>
	</form>
</div>

</div>
</div>
<!-- container CLOSE-->

