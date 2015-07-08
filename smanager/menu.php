<?php
include_once dirname(__FILE__) . "/../lib/functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<html>
	<head>
		<title>SoccerShopUSA.com</title>
		<link href="layout/layout.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#menu{
				width:300px;
				float:left;
			}

			#content{
				width:700px;
				float:left;
			}

			table, td, th{
				border: 1px solid black;
				border-collapse: collapse;
			}

		</style>
		<script type="text/javascript" src="Script_jy.js"></script>
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<div id="header_body">
				</div>
				<div id="navbar">
					<ul>
						<li>
							<a href="#" class="drop">Basic Website Setup</a>
							<ul>
								<li class="level1">
									<a href="Manage_Administrators.php">Website Administrators</a>
								</li>
								<li class="level1">
									<a href="Manage_CompanyInfo.php">Company Info</a>
								</li>
								<li class="level1">
									<a href="Manage_AboutUs.php">Manage "About Us"</a>
								</li>
								<li class="level1">
									<a href="Manage_PravacyPolicy.php">Manage "Privacy Policy"</a>
								</li>
								<li class="level1">
									<a href="Manage_ReturnPolicy.php">Manage "Return Policy"</a>
								</li class="level1">
								<li class="level1">
									<a href="Manage_HelpAndFAQs.php">Manage "Help/FAQs"</a>
								</li>
								<li class="level1">
									<a href="Manage_HelpAndFAQs.php">Manage "Help/FAQs"</a>
								</li>
								<li class="level1">
									<a href="Manage_Banner.php">Manage "Banner"</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Basic Business Setup</a>
							<ul>
								<li class="level2">
									<a href="Manage_QuantityDiscounts.php">Discounts by Order Quantities</a>
								</li>
								<li class="level2>
									<a href="Manage_OrderAmounts.php">Minimum Order Amount</a>
								</li>
								<li class="level2>
									<a href="Manage_OrderAmountsFreeShipping.php">Order Amount for Free Shipping</a>
								</li>
								<li class="level2>
									<a href="Manage_FiguresForVIPs.php">Figures of VIP Membership</a>
								</li>
								<li class="level2>
									<a href="Manage_FeeForPersonalization.php">Fee for Persnalization</a>
								</li>
								<li class="level2>
									<a href="Manage_FeeForAttachingEmblems.php">Fee for Attaching Emblems</a>
								</li>
								<li class="level2>
									<a href="Manage_LocalSalesTax.php">California Local Sales Tax Rate</a>
								</li>
								<li class="level2>
									<a href="Manage_PaymentMethods.php">Payment Methods</a>
								</li>
								<li class="level2>
									<a href="Manage_BusinessHours.php">Store Business Hours</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Promotions</a>
							<ul>
								<li class="level3>
									<a href="Manage_GiftCertificates.php">Manage Gift Certificates</a>
								</li>
								<li class="level3>
									<a href="Manage_PromoCodes.php">Manage Promotional Codes</a>
								</li>
								<li class="level3>
									<a href="Manage_SpotLight.php">Manage Spot Light Items</a>
								</li>
								<li class="level3>
									<a href="Manage_Customers.php">Manage Birthday Customer</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Products</a>
							<ul>
								<li class="level4>
									<a href="Manage_Products.php">Manage Products</a>
								</li>
								<li class="level4>
									<a href="Manage_Categories.php">Manage Categories</a>
								</li>
								<li class="level4>
									<a href="Manage_Colors.php">Manage Colors</a>
								</li>
								<li class="level4>
									<a href="Manage_SizeCharts.php">Manage Sizes</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Bulk Update</a>
							<ul>
								<li class="level5>
									<a href="Manage_bulk_product.php">Products bulk update</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Customers</a>
							<ul>
								<li class="level6>
									<a href="Manage_Customers.php">Manage Customers</a>
								</li>
								<li class="level6>
									<a href="Manage_CustomerMessages.php">"Messages from Customers"</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Orders</a>
							<ul>
								<li class="level7>
									<a href="Manage_Orders_Search.php">Search Orders</a>
								</li>
								<li class="level7>
									<a href="Manage_Orders_All.php">All Orders</a>
								</li>
								<li class="level7>
									<a href="Manage_Orders_Unconfirmed.php">New & Unconfirmed Orders</a>
								</li>
								<li class="level7>
									<a href="Manage_Orders_Confirmed.php">Confirmed Orders</a>
								</li>
								<li class="level7>
									<a href="Manage_Orders_Shipped.php">Shipped Orders</a>
								</li>
								<li class="level7>
									<a href="Manage_Orders_Cancelled.php">Canceled Orders</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Shopping Bags/Wish Lists</a>
							<ul>
								<li class="level8>
									<a href="Manage_ShoppingBags.php">Items in Customers' Shopping Bags</a>
								</li>
								<li class="level8>
									<a href="Manage_WishLists.php">Items in Customers's Wish Lists</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Catalogues</a>
							<ul>
								<li class="level9>
									<a href="Manage_CreateCatalogues.php">Create Catalogues</a>
								</li>
								<li class="level9>
									<a href="Manage_SendEmailForm.php">E-mail Catalogues to Customers</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Statistics</a>
							<ul>
								<li class="level10>
									<a href="Manage_Statistics_Sales.php">Sales Statistics</a>
								</li>
								<li class="level10>
									<a href="Manage_Statistics_WebsiteTraffic.php">Website Traffic Statistics</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div id="content">
