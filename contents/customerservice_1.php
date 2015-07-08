<?php
	$info	= empty($_GET["info"])?"":$_GET["info"];
	
	$DB 	= new myDB;
?>
<div class="container">
<div class="main-col1 col-md-12">
	<div class="page-title">
		<h1>
			<span>Customer Service</span>
		</h1>	
	</div>
	<div class="contents">
		<div class="sub1">
			<div class="title_sub">Index</div>
			<div class="subcontent">
				<table class="table_jy">
					<tr>
						<td>
							<ul>
								<li class="bullet"><a href="#shipanddelivery">Shipping &amp Delivery</a></li>
								<li class="bullet"><a href="#defectivereturn">Defective Returns</a></li>
								<li class="bullet"><a href="#orderprocess">Ordering Process</a></li>
								<li class="bullet"><a href="#tax">Taxes</a></li>
							</ul>
						</td>
						<td>
							<ul>
								<li class="bullet"><a href="#international">International Shipping</a></li>
								<li class="bullet"><a href="#clearancereturn">Clearance Returns</a></li>
								<li class="bullet"><a href="#paymentmethod">Payment Methods</a></li>
							</ul>
						</td>
						<td>
							<ul>
								<li class="bullet"><a href="#returnandrefund">Returns &amp Refunds</a></li>
								<li class="bullet"><a href="#returninstruction">Return Instructions</a></li>
								<li class="bullet"><a href="#safeshopping">Safe Shopping</a></li>
							</ul>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="sub2">
			<div class="title_sub">Contents</div>
			<div class="subcontent">
				<a name="shipanddelivery"><p class="p_title">Shipping &amp Delivery</p></a>
				<p class="p_general">All Lemontreeclothing.com orders are processed the next business day and shipped Monday - Friday via the shipping method you selected. After your order has shipped,  you will receive an email with the tracking information. Available shipping methods and estimated delivery times are below:</p>
				<div class="description">
					<p class="p_bold">[UPS] Next Day Air Early A.M.</p>
					<p class="p_general">Next business day delivery by 8:00 a.m. in the 48 states</p>
					<br/>
					<p class="p_bold">[UPS] Next Day Air</p>
					<p class="p_general">Early AM Next business day delivery by 10:30 a.m., 12:00 noon</p>
					<p class="p_general">(in stock items delivered by next business days, excludes Saturday and Sunday)</p>
					<p class="p_general">This method is only available in the Continental U.S.</p>
					<br/>
					<p class="p_bold">[UPS] 2nd Day Air</p>
					<p class="p_general">Delivery by the end of the second business day</p>
					<p class="p_general">(in stock items delivered within 2 business days, excludes Saturday and Sunday)</p>
					<p class="p_general">This method is only available in the Continental U.S.</p>
					<br/>
					<p class="p_bold">[UPS] 3 Day Select</p>
					<p class="p_general">Delivery by the end of the third business day</p>
					<br/>
					<p class="p_bold">[UPS] Ground</p>
					<p class="p_general">Day-definite delivery typically in one to five days</p>
					<p class="p_general">Delivery time depends on your distance from us. We are located in Los Angeles, CA.</p>
					<br/>
					<p class="p_bold">[USPS] Express </p>
					<p class="p_general">Overnight delivery to most U.S. locations</p>
					<br/>
					<p class="p_bold">[USPS] Priority</p>
					<p class="p_general">Delivery within 2 days in most cases</p>
					<br/>
					<p class="p_bold">[USPS] Parcel</p>
					<p class="p_general">Delivery in 2 to 8 days</p>
					<br/>
					<p class="p_bold">[DHL] Express</p>
				</div>
				<br/>
				<a name="international"><p class="p_title">International Shipping</p></a>
				<p class="p_general">Many Lemontreeclothing products are available for delivery outside the United States. If an item cannot be shipped outside the United States, "This item cannot be exported" will be noted on the product detail page.</p>
				<p class="p_general">For more information about international shipping, please read our <a href="/?info=internationalfromus">International Shipping</a>.</p>
				<br/>
				<a name="returnandrefund"><p class="p_title">Returns &amp Refunds</p></a>
				<p class="p_general">Claims for any damaged or wrong merchandise shipped to you must be made within 3 bussiness days of receiving your order.</p>
				<div class="description">
					<p class="p_general">NO CASH OR CREDIT REFUNDS. EXCHANGES ONLY.</p>
				</div>
				<p class="p_general">For more information about returns &amp refunds, please read our <a href="/?info=returnpolicy">Return Policy</a>.</p>
				<br/>
				<a name="defectivereturn"><p class="p_title">Defective Returns</p></a>
				<p class="p_general">Any defective product not reported to us within "3" days, customer will need to contact the manufacturer of that product directly for assistance (eg: Adidas,Nike,Puma,Lotto, etc)</p>
				<p class="p_general">For more information about defective returns, please read our <a href="/?info=returnpolicy">Return Policy</a>.</p>
				<br/>
				<a name="clearancereturn"><p class="p_title">Clearance Returns</p></a>
				<p class="p_general">No Refunds or Exchanges on Sale Items. Sale Items are Final.</p>
				<p class="p_general">For more information about clearance returns, please read our <a href="/?info=returnpolicy">Return Policy</a>.</p>
				<br/>
				<a name="returninstruction"><p class="p_title">Return Instructions</p></a>
				<p class="p_general">If you wish to make an exchange, you must contact us within 7 business days from the day you received your product and obtain an official return authorization from us. </p>
				<div class="description">
					<p class="p_bold">Our return address is as follows:</p>
					<p class="p_general" style="font-family: monospace;"></p>
					<p class="p_general" style="font-family: monospace;"></p>
					<p class="p_general" style="font-family: monospace;">Los Angeles, CA 90000</p>
				</div>
				<br/>
				<a name="orderprocess"><p class="p_title">Ordering Process</p></a>
				<p class="p_general">To make a purchase on soccerloco.com, add your products to the shopping cart and then click checkout in the top right. Upon checkout you will specify your method of payment and shipping address.</p>
				<p class="p_general">When your order is submitted online, you will receive a confirmation sent to your specified email address. We will process your order within 24 hours and notify you via email when your order ships. It is extremely important to provide a valid email address when creating or editing your soccerloco.com account, as all communication regarding your order will be by email.</p>
				<p class="p_general">You may check the status of your order or update, click <a href="/?page=customer&account=myorderhistory">My Order History</a>.</p>
				<br/>
				<a name="paymentmethod"><p class="p_title">Payment Methods</p></a>
				<p class="p_general">We accept Visa, Mastercard, American Express and Discover credit cards, as well as debit cards which bear the Visa, Mastercard, American Express or Discover logo.</p>
				<br/>
				<a name="safeshopping"><p class="p_title">Safe Shopping</p></a>
				<p class="p_general">Lemontreeclothing.com takes every measure to ensure your safe shopping experience. We process all credit card transactions secure socket layer (SSL) encryption. We also respect your privacy and will never pass your personal information along to third parties. For more information on how seriously we take your confidence in shopping with us, please read our <a href="/?info=secureshoppingfromus">Secure Shopping</a>.</p>
				<br/>
				<a name="tax"><p class="p_title">Taxes</p></a>
				<p class="p_general">For orders made from within the United States, sales tax will be applied to all orders shipped to a California address.</p>
			</div>
		</div>
	</div>
</div>

</div>
<!-- container CLOSE -->
</div>
