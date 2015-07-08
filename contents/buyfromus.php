<?php
	$info	= $arrGet[0][1];
	
	$DB 	= new myDB;
?>
<div class="main-col1 col-md-9">
	<div class="page-title">
		<h1>
			<span>
			<?php
				if($info=="shipandreturnfromus"){
					echo "Shipping &amp Returns";
				}elseif($info=="secureshoppingfromus"){
					echo "Secure Shopping";
				}elseif($info=="internationalfromus"){
					echo "International Shipping";
				}elseif($info=="affiliatefromus"){
					echo "Affiliates";
				}elseif($info=="groupsalesfromus"){
					echo "Group Sales";
				}
			?>
			</span>
		</h1>	
	</div>
	<div class="contents">
		<?php
				if($info=="shipandreturnfromus"){?>
		<div class="sub1">
			<p class="p_jy"><b>Shipping</b></p>
			<div class="subcontents">
				<p class="p_general">Use discount code: "2SHIP99" at check out.</p>
				<p class="p_general">Offer only applies to ground shipping.</p>
				<p class="p_general">For Free Ground Shipping order must total $99.00 worth of Merchandise.</p>
				<p class="p_general">Offer is only valid on orders shipped to one address within the continental U.S. excludes Hawaii and Alaska.</p>
				<p class="p_general">Offer cannot be combined with any other promotional offer.</p>
				<p class="p_general">Excludes all Team Sales, such as Team Uniforms, shorts and socks.</p>
				<p class="p_general">Free Shipping does not include Heavy Items such as goals, Training Equipments and Field Training Equipments.</p>
				<p class="p_general">This promotional offer may be modified or terminated at any time without notice. Other exclusions may also apply.</p>
			</div>
		</div>
		<div class="sub2">
			<p class="p_jy"><b>Returns</b></p>
			<div class="subcontents">
			<?php 
				$strSQL = "SELECT * From ReturnPolicy ORDER BY PriorityNo";
				$DB->query($strSQL);
				while ($data = $DB->fetch_array($DB->res)){
					echo "<p class=\"p_general\">".nl2br($data["ReturnPolicy"])."</p>";
				}
			?>
			</div>
		</div>
		<?php }elseif($info=="secureshoppingfromus"){?>
		<div class="subcontents">
			<div class="subLeft">
				<a href="../Images/secureLogos/lock256bit.png" class="ajax">
					<img src="../Images/secureLogos/lock256bit.png" class="photo"/>
				</a>
			</div>
			<div class="subRight">
				<p class="p_general">
					256-Bit SSL Encryption can help defend against login and password theft, which is particularly common in today's wireless society. The secondary benefit of 256-Bit SSL Encryption is help overcoming the speed issues related to ISP throttling and bottlenecks. Most ISPs do not want to throttle or bottleneck 256-Bit SSL Encrypted data because this kind of data is routinely used to send sensitive data (financial information, logins, passwords, credit card info, etc).
				</p>
			</div>
		</div>
		<div class="subcontents">
			<div class="subLeft">
				<a href="../Images/secureLogos/authorizenet_large.png" class="ajax">
					<img src="../Images/secureLogos/authorizenet_large.png" class="photo"/>
				</a>
			</div>
			<div class="subRight">
				<p class="p_general">
					Authorize.Net is committed to safeguarding customer information and combating fraud. It operate with a mission to provide the most secure and reliable payment solutions. 
					To accomplish this, Authorize.Net dedicates significant resources toward a strong infrastructure, and adheres to both strict internal security policies and industry security initiatives. 
					With Authorize.Net, your data is secure. It utilize industry-leading technologies and protocols, such as 128-bit Secure Sockets Layer (SSL) and It is compliant with a number of government and industry security initiatives.
				</p>
			</div>
		</div>
		<div class="subcontents">
			<div class="subLeft">
				<a href="../Images/secureLogos/header-amazon.png" class="ajax">
					<img src="../Images/secureLogos/header-amazon.png" class="photo"/>
				</a>
			</div>
			<div class="subRight">
				<p class="p_general">
					When you're logging in to your account, we take precautions to protect your account. First, whenever you log in to your Amazon Payments account, you log in using a secure server connection (https://). We use Secure Socket Layer (SSL) with 128 bit encryption, the industry standard in secure server protection.
				</p>
			</div>
		</div>
		<div class="subcontents">
			<div class="subLeft">
				<a href="../Images/secureLogos/https.png" class="ajax">
					<img src="../Images/secureLogos/https.png" class="photo"/>
				</a>
			</div>
			<div class="subRight">
				<p class="p_general">Hypertext Transfer Protocol Secure (HTTPS) is a widely used communications protocol for secure communication over a computer network, with especially wide deployment on the Internet. Technically, it is not a protocol in itself; rather, it is the result of simply layering the Hypertext Transfer Protocol (HTTP) on top of the SSL/TLS protocol, thus adding the security capabilities of SSL/TLS to standard HTTP communications.</p>
			</div>
		</div>			
		<?php 	}elseif($info=="internationalfromus"){ ?>
		<div class="sub1">
			<p class="p_general">Many Lemontreeclothing products are available for delivery outside the United States. If an item cannot be shipped outside the United States, "This item cannot be exported" will be noted on the product detail page.</p>
			<br/>
			<p class="p_general">To determine international delivery rates, you must add the item to your cart and complete the delivery address fields. The amount will be automatically calculated based on your delivery destination and will be displayed in the cart. All prices are U.S. Dollars.</p>
			<br/>
			<p class="p_general">Delivery costs do not include any applicable duties and taxes. The recipient will be responsible for these charges at the time of delivery.</p>
			<br/>
			<p class="p_jy"><b>UPS Worldwide Saver</b></p>
			<div class="subcontents">
				<p class="p_general">Delivery by end of day</p>
				<p class="p_general">Next business day delivery to Canada and for documents to Mexico </p>
				<p class="p_general">Delivery in two business days to Europe and Latin America</p>
				<p class="p_general">Delivery in two or three business days to Asia</p>
			</div>
			<br/>
			<p class="p_jy"><b>UPS Worldwide Expedited</b></p>
			<div class="subcontents">
				<p class="p_general">Delivery in two business days to Canada</p>
				<p class="p_general">Delivery in two or three business days to Mexico</p>
				<p class="p_general">Delivery in three or four days to Europe</p>
				<p class="p_general">Delivery in four or five days to Asia and Latin America</p>
			</div>
			<br/>
			<p class="p_jy"><b>DHL Globalmail Parcel Standard</b></p>
			<div class="subcontents">
				<p class="p_general">Delivery in 8-14 average transit days</p>
			</div>
		</div>
		<?php 	}elseif($info=="affiliatefromus"){
					echo "<p>Affiliates</p>";
				}/*elseif($info=="groupsalesfromus"){
					echo "<p>Group Sales</p>";
				}*/
			?>
	</div>
</div>

</div>
<!-- container CLOSE -->