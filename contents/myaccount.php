<?php
$userID=!empty($_COOKIE["userID"]);
//echo $userID;
/*
if (empty($userID))
{
echo "<script>
window.location='../?page=customer&account=login';
</script>";
}
*/
include_once dirname(__FILE__) . "/include/function.php";

$strSQL = "SELECT * FROM Customers WHERE LoginID = '" . $userID."'";
$DB = new myDB;
$DB->query($strSQL);
$data = $DB->fetch_array($DB->res);
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
$DB->close();	
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
						<div class="page-title">
							<h1><span>My Account</span></h1>
						</div>

						<ol class="opc" id="checkoutSteps">
						    <li id="opc-billing" class="section active">
						        <div class="step-title">						            
						            <h2>My Personal Information </h2><a href="/index.php?page=customer&account=mypersonalinfo"> More..</a>
						            
						        </div>
						        <div id="checkout-step-billing" class="step a-item" style="display:block;">
						            <form id="co-billing-form" method="post" action="../contents/myaccount_action.php">
									<fieldset>
									    <ul class="form-list">
									        <li id="billing-new-address-form">
									        <fieldset>
									            <input type="hidden" title="hideme" name="billing[address_id]" value="" id="billing:address_id" />
									            <ul>
									                <li class="fields">
									                	<div class="customer-name">
									    					<div class="field name-firstname">
									        					<label for="billing:firstname" class="required"><em>*</em>First Name</label>
									        					<div class="input-box">
									            					<input type="text" readonly id="billing:firstname" name="MailingFirstName" value="<?php echo $MailingFirstName?>" title="First Name" maxlength="255" class="input-text required-entry"  />
									        					</div>
									    					</div>
														    <div class="field name-lastname">
														        <label for="billing:lastname" class="required"><em>*</em>Last Name</label>
														        <div class="input-box">
														            <input type="text" readonly id="billing:lastname" name="MailingLastName" value="<?php echo $MailingLastName?>" title="Last Name" maxlength="255" class="input-text required-entry"  />
														        </div>
														    </div>
														</div>
													</li>
									                <li class="fields" id="register-customer-password">
									                    <div class="field">
									                        <label for="billing:customer_password" class="required"><em>*</em>Password</label>
									                        <div class="input-box">
									                            <input type="password" readonly name="LoginPassword" value="<?php echo $LoginPassword?>" id="billing:customer_password" title="Password" class="input-text required-entry validate-password" />
									                        </div>
									                    </div>
									                    
									                </li>
													<li class="fields">
									                    <div class="field">
									                        <label for="billing:company">Company</label>
									                        <div class="input-box">
									                            <input type="text" id="billing:company" readonly name="MailingCompanyName" value="<?php echo $MailingCompanyName?>" title="Company" class="input-text " />
									                        </div>
									                    </div>
														<div class="field-2">
									                        <label for="billing:email" class="required"><em>*</em>Email Address</label>
									                        <div class="input-box">
									                            <input type="text" name="userID" readonly id="billing:email" value="<?php echo $userID?>" title="Email Address" class="input-text validate-email required-entry" />
									                        </div>
									                    </div>
									                </li>
							</ol>
						
							
					</div>

                                                        
                                        
                                                        
                                    </div>