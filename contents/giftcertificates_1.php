<?php
	$info	= empty($_GET["info"])?"":$_GET["info"];
	$userID=$_COOKIE["userID"];
	if($info==vipmember){
		if (empty($userID)){
			echo "<script>
			window.location='../?page=customer&account=login';
			</script>";
		}
	}	
	include "../include/function.php";
?>
<div class="main-col">
	<div class="contents">
	<?php 
		if($info==giftcertificates){
	?>
 <script type="text/javascript">

function GiftBlance() {
	var number=document.getElementById('gift_number').value;
	var code=document.getElementById('gift_code').value;
	if(number==''){
		alert("Please input Gift Certificate Number!");
		document.getElementById('gift_number').focus();
		return false;
	}
	if(code ==''){
		alert("Please input Authorization Code!");
		document.getElementById('gift_code').focus();
		return false;
	}
	var bal=checkgift(number,code) 
	alert(bal);
			//$('#billing\\:email').addClass("validation-failed");
}
</script>
		 <div class="title_sub">Check Balance</div>
		 <div class="sub1">
		 	<table>
		 		<tr>
		 			<td class="general" style="padding-top: 10px;">Gift Certificate Number :</td>
		 			<td class="general" style="padding-top: 10px;"><input type="text" name="gift_number" id="gift_number"></td>
		 			<td class="general" style="padding-top: 10px;">Authorization Code :</td>
		 			<td class="general" style="padding-top: 10px;"><input type="text" name="gift_code" id="gift_code"></td>
		 			<td class="general"><button type="button" onclick="GiftBlance()" name="btn_balance" class="button"><span>Check</span></button></td>
		 		</tr>
		 	</table>
		 </div>
	 <?php }?>
		 <div class="title_sub">
	 <?php 
		 if($info==giftcertificates){
		 	echo "Purchase an Online Gift Certificate";
		 }elseif($info==vipmember){
		 	echo "VIP Membership Price and Credit Card Information";
		 }
	 ?>
		 </div>
		 <div class="sub2">
		 	<form name="PaymentForm" method="post" action="../lib/giftcertificates_action.php">
			 	<?php 
			 		if($info==giftcertificates){
			 	?>
			 	<div class="subLeft">
			 		<p class="p_general"><b>Online Gift Certificate :</b></p>
			 		<img src="Images/GiftCertificateCard1.jpg" width="140" border="0"/>
			 	</div>
			 	<div class="subRight">
			 		<p class="p_general">
			 			<select name="GiftCertificate_Amount">
			 				<option value>Select a gift certificate:</option>
			 				<?php
			 					for($i=20; $i<=500; $i+=10){ ?>
			 				<option value="<?php echo $i?>"> &nbsp;$<?php echo $i?>.00</option>
			 			<?php	}
			 				?>
			 			</select>
			 		</p>
			 		<ol class="olpadding">
			 			<li class="olnum">An authorization code of the gift certificate that you purchase here will be e-mailed to you after you purchase it.   Thus, please check out your e-mail box right after you complete your purchase.</li>
			 			<li class="olnum">Upon receiving it, you can e-mail the authorization code to someone you care for any occasions so that he/she can use it on Lemontreeclothing.com.</li>
			 		</ol>
			 	</div>
				<div class="addto-cart">
						<input type="hidden" name="qty" maxlength="3" value="1" title="Qty" class="input-text qty" />
						<input type="hidden" name="productid" value="1" />
						<button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
						<span id="ajax_loader" style="display:none"><img src="/images/ajax_loader.gif"/></span>
				</div>
				
				<script type="text/javascript">
				jQuery(function(jQuery) {
					
					
					$("button[title='Add to Cart']").click(function() {
						
						$.ajax({
							async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
							data:{
								"qty":$("input[name='qty']").val(),
								"id":$("input[name='productid']").val(),
								"options":{"size":$("select[name='size']").val(),"color":$("select[name='color']").val(),"misc":""},
								"action":"add"
							},success:function(d){
								$("#ajax_loader").css("display","none");
								$("div.alert").slideDown(1000, function() {
									$(this).delay(6000).slideUp(1000);
								});
								$("#mycart").html("My Cart ("+d.cartItems[0].cartItemCount+" items)");
							}
						});
						
						
					});
					$(".inner_alert > button").click(function() {
						$("div.alert").clearQueue();
						$("div.alert").slideUp(1000);
					});
					
				});
			</script>
				
			 	<?php }elseif($info==vipmember){?>
			 	<p class="p_general">
			 		<b style="color: red;">VIP Membership : &nbsp; &nbsp; &nbsp; &nbsp; $29.99</b>
			 	</p>
			 	<p class="p_general">
			 		<b><u>Note</u>:</b> Once purchased, there is no expiration date set for a VIP membership as long as you are a Lemontreeclothing.com customer.
			 	</p>
			 	<br/>
			 	<?php }?>
			 	<p class="p_general">
			 		<b>Credit Card Information:</b>
			 		<img src="Images/CreditCards_Accepted.jpg" border="0" style="float: right;"/>
			 	</p>
			 	<table class="table_jy">
			 		<tbody>
			 			<tr class="thin_border_bottom">
			 				<td class="subject2" style="width: 30%;">Card Name: <span class="redstar">*</span></td>
			 				<td class="general">
			 					<select name="CreditCardName">
			 						<option value>Selecte a credit card:</option>
			 						<?php 
			 							$DB	= new myDB;
			 							$strSQL = "SELECT PaymentMethod FROM PaymentMethods";
			 							$DB->query($strSQL);
			 							while($cardname = $DB->fetch_array($DB->res)){
			 						?>
			 						<option value="<?php echo $cardname["PaymentMethod"];?>"> <?php echo $cardname["PaymentMethod"];?></option>
			 						<?php }?>
			 					</select>
			 				</td>
			 			</tr>
			 			<tr class="thin_border_bottom">
			 				<td class="subject2">Card Number: <span class="redstar">*</span></td>
			 				<td class="general"><input type="text" name="CardNumber" size="20" maxlength="20" onkeypress="AllowNumberOnly();"></td>
			 			</tr>
			 			<tr class="thin_border_bottom">
			 				<td class="subject2">Card Security Code: <span class="redstar">*</span></td>
			 				<td class="general">
			 					<input type="text" name="CardSecurityCode" maxlength="4" onkeypress="AllowNumberOnly();"/>
			 					<a href="#" onclick="Popup=window.open('SecurityCodes.htm','ImageView', 'scrollbars=no,resizable=yes,width=300,height=400')">What is this?</a>
			 				</td>
			 			</tr>
			 			<tr>
			 				<td class="subject2">Card Expiration Month/Year: <span class="redstar">*</span></td>
			 				<td class="general">&nbsp; Month: <input type="text" name="CardExpireMonth" size="2" maxlength="2" onkeypress="AllowNumberOnly();"> (Ex: 03)
			 					&nbsp; Year: <input type="text" name="CardExpireYear" size="4" maxlength="4" onkeypress="AllowNumberOnly();"> (Ex: 2012)
			 				</td>
			 			</tr>
			 		</tbody>
			 	</table>
			 	<br/>
			 	<p class="p_general">Card Billing Address:</p>
			 	<?php 
				 	$strSQL = "SELECT * FROM Customers WHERE LoginID = '" . $userID."'";
				 	$DB->query($strSQL);
				 	$data = $DB->fetch_array($DB->res)
			 	?>
			 	<table class="table_jy">
			 		<tr class="thin_border_bottom">
			 			<td class="subject2">Card Holder: <span class="redstar">*</span></td>
			 			<td colspan="3" class="general">First Name: <input type="text" name="MailingFirstName" value="<?php echo $data["MailingFirstName"]?>" style="width:100px;" maxlength="25"/>
			 				Last Name: <input type="text" name="MailingLastName" value="<?php echo $data["MailingLastName"];?>" style="width:100px;" maxlength="25"/>
			 			</td>
			 		</tr>
			 		<tr class="thin_border_bottom">
			 			<td class="subject2">Street: <span class="redstar">*</span></td>
			 			<td colspan="3" class="general"><input type="text" name="MailingStreet" value="<?php echo $data["MailingStreet"];?>" style="width:100%;" maxlength="40"/></td>
			 		</tr>
			 		<tr class="thin_border_bottom">
			 			<td class="subject2">City: <span class="redstar">*</span></td>
			 			<td class="general"><input type="text" name="MailingCity" value="<?php echo $data["MailingCity"];?>" maxlength="40"/></td>
			 			<td class="subject2">State/Province: <span class="redstar">*</span></td>
			 			<td class="general"><input type="text" name="MailingStateOrProvince" value="<?php echo $data["MailingStateOrProvince"];?>" maxlength="40"/></td>
			 		</tr>
			 		<tr class="thin_border_bottom">
			 			<td class="subject2">Zipcode: <span class="redstar">*</span></td>
			 			<td class="general"><input type="text" name="MailingZipcode" value="<?php echo $data["MailingZipcode"];?>" maxlength="12"/></td>
			 			<td class="subject2">Country: <span class="redstar">*</span></td>
			 			<td class="general"><input type="text" name="MailingCountry" value="<?php echo $data["MailingCountry"];?>" maxlength="45"/></td>
			 		</tr>
			 		<tr class="thin_border_bottom">
			 			<td class="subject2">Phone Number: <span class="redstar">*</span></td>
			 			<td colspan="3" class="general"><input type="text" name="MailingPhone" value="<?php echo $data["MailingPhone"];?>" maxlength="20"/> (Ex: 213-715-3333)</td>
			 		</tr>
			 		<tr class="thin_border_bottom">
			 			<td class="subject2">Fax Number:</td>
			 			<td colspan="3" class="general"><input type="text" name="MailingFax" value="<?php echo $data["MailingFax"];?>" maxlength="20"/> (Ex: 213-715-3333)</td>
			 		</tr>
			 		<tr class="thin_border_bottom">
			 			<td class="subject2">E-mail Address: <span class="redstar">*</span></td>
			 			<td colspan="3" class="general"><input type="text" name="MailingEmailAddress" value="<?php echo $data["ShippingEmailAddress"];?>" maxlength="40"/></td>
			 		</tr>
			 	</table>
			 	<br/>
			 	<table class="p_general" style="width: 100%;">
			 		<tr>
			 			<td style="width: 15%;">
			 				<button type="button" name="button1" class="button" style="float: center;" onclick="history.back();">
			 					<span>Go Back</span>
			 				</button>
			 			</td>
			 			<td style="padding-top: 9px;">
			 				<b>Done!</b> On the next page, an <b>order summary</b> will be displayed for <b>your final confirmation</b>.
			 			</td>
			 			<td style="width: 15%;">
			 				<button type="submit" name="submit" class="button" style="float: right;" onclick="return Confirm_ToNextPage(this.form);">
			 					<span>Next</span>
			 				</button>
			 			</td>
			 		</tr>
			 	</table>
			 	<br/>
			 	<p class="p_general">
			 	This page is <span class="redstar">secured with a 1024-bit SSL</span> provided by GoDaddy.com, meaning that your credit card information is securely protected. 
			 	</p>
			 	<p class="p_general"><span style="color: blue;">How do I know that this page is secured with a SSL?</span>
			 		<a href="#" onclick="showStuff('SecuredWithSSL'); return false;">Show</a>
			 		<a href="#" onclick="hideStuff('SecuredWithSSL'); return false;">Hide</a>
			 	</p>
			 	<span id="SecuredWithSSL" style="display: block;">
			 		<br/>
			 		<img src="../images/verified.jpg">
			<!--  	<div class="subLeft2">
			 			<p class="p_general">Do the following to see if this page is secured with a SSL:</p>
			 			<ol class="olpadding">
			 				<li class="olnum">Position your mouse pointer on any white space within this page.</li>
			 				<li class="olnum">Click the right button of your mouse.</li>
			 				<li class="olnum">Select <b>Properties</b>.</li>
			 			</ol>
			 			<p class="p_general" style="text-indent: 40px;">You will see the page properties (shown on the right) indicating that this page is secured with a SSL.</p>
			 			<br/>
			 			<p class="p_general"><b style="color: #CA0206;">IMPORTANT:</b>
			 				If the page properties that you see on your web browser doesn't look like this, <u>do the following</u>:
			 			</p>
			 			<ol class="olpadding">
			 				<li class="olnum">Position your mouse pointer on a white space.</li>
			 				<li class="olnum">Click the right button of your mouse and select <b>Refresh</b>.</li>
			 				<li class="olnum">And then, repeat the 3 steps shown above.</li>
			 			</ol>
			 		</div>
			 		<div class="subRight2">
			 			<img src="Images/SecuredWithSSL2.jpg"/>
			 		</div> -->
			 	</span>
		 	</form>
		 </div>
	</div>
</div>