<?php 
/*
	if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == ""){
		$redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		header("Location: $redirect");
	}
*/
	require_once("../include/function.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="/smanager/css/adm.css" />
	<!--<link rel="stylesheet" type="text/css" media="screen" href="css/jquery.colorbox.css" />-->
	<title>Lemontree Administration</title>
	<!--<script type="text/javascript" src="js/jquery-1.7.1.js"></script>-->
	<script type="text/javascript" src="/smanager/jw//jquery-1.11.1.min.js"></script> 
	<!--<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>-->
	<!--[if IE]><script type="text/javascript" src="js/jquery.bgiframe.min.js"></script><![endif]-->
	<!-- jquery.datePicker.js -->
	<style type="text/css">
	a.dp-choose-date { float: left; width: 16px; height: 16px; padding: 0; margin: 5px 3px 0; display: block;ext-indent: -2000px; overflow: hidden; background: url(./images/calendar.png) no-repeat; }
	a.dp-choose-date.dp-disabled { background-position: 0 -20px; cursor: default; }
	input.dp-applied { width: 100px; float: left; }
	</style>
	<!-- [if IE 7]><style type="text/css"> .blue ul.mega-menu { position: none; } </style><![endif]-->
	<link href="css/style_ty.css" rel="stylesheet" type="text/css" />
	<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />
	<link href="css/skins/blue.css" rel="stylesheet" type="text/css" />
	

	 <link rel="stylesheet" href="/smanager/js/jquery-ui.css">
 <!-- <script src="/smanager/js/jquery-1.10.2.js"></script>-->
  <script src="/smanager/js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/smanager/js/stylee1.css">


	<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
	<script type='text/javascript' src='Script_jy.js'></script>
	<script type='text/javascript' src='js/jquery.dcmegamenu.1.3.3.js'></script>
	
	
	<link rel="stylesheet" href="/smanager/jw/jqx.base.css" type="text/css" />
	<script type="text/javascript" src="/smanager/jw/jqxcore.js"></script>
    <script type="text/javascript" src="/smanager/jw/jqxdatetimeinput.js"></script>
	<script type="text/javascript" src="/smanager/jw/jqxtooltip.js"></script>
	<script type="text/javascript" src="/smanager/jw/jqxcalendar.js"></script>
	<script type="text/javascript" src="/smanager/jw/globalize.js"></script>
	<!--<script type="text/javascript" src="/smanager/jw/demo.js"></script>-->	
	<script type="text/javascript">
	$(document).ready(function(){
		$('#mega-menu').dcMegaMenu({
			rowItems: '3',
			speed: 'fast',	
			effect: 'fade'
		});
		$('.blue').removeClass("loadmenu");

		// $("#jqxWidget").jqxDateTimeInput({formatString: 'yyyy-MM-dd'});
		//$('.ajax').colorbox({rel:'ajax'});
	});
	</script>
	<script type="text/javascript">
	function logout(){
	window.location='adminmember_action.php?action=logout';
	}
	</script>

	 <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 1100px; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; width: 130px;height: 230px;float: left;}
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script>
  $(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  });
  </script>
</head>

<body>
	<div id="headWrapper1">
	    <div style="height:70px; width:auto; overflow: hidden;">
	        <div id="title_logo"></div>
	        <div id="logoutbar">
		        <!-- Login member information & Log out button -->
		        <div id="loggedon">Logged in as &nbsp;<span><?php echo $_COOKIE['aduserID']?></span>&nbsp;<span>(<?php echo $_COOKIE['ip']?>)</span>&nbsp;<span><a href="#">lemontreeclothing1.com</a></span> <a href="javascript:logout();">LOG OUT</a></div>
		    </div>
    </div>
	    </div>	    
	</div>
	<div class="wrap">
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
		<div class="blue loadmenu" style="width: 1100px;">  
			<ul id="mega-menu" class="mega-menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="Manage_Products.php">&nbsp;&nbsp;Items&nbsp;&nbsp;</a>
					<ul>
						<li><a href="Manage_Products.php">Item List</a></li>
						<li><a href="Manage_Categories.php">Item Categories</a></li>
						<li><a href="Manage_Colors.php">Item Colors</a></li>
						<li><a href="Manage_SizeCharts.php">Item Sizes</a></li>
						<li><a href="Manage_PackCharts.php">Item Pack</a></li>
						<li><a href="Manage_bulk_product.php">Item bulk update</a></li>
					</ul>	
				</li>
				<li><a href="Manage_Orders_All.php">&nbsp;&nbsp;Orders&nbsp;&nbsp;</a>
					<ul>
						<li><a href="Manage_Orders_All.php">All Orders</a></li>
						<li><a href="Manage_Orders_Search.php">Search Orders</a></li>
						<li><a href="Manage_Orders_Shipped.php">Shipped Orders</a></li>
						<li><a href="Manage_Orders_Cancelled.php">Canceled Orders</a></li>
					</ul>	
				</li>
				
				
				<li><a href="Manage_Customers.php">&nbsp;&nbsp;Customers&nbsp;&nbsp;</a>
					<ul>
						<li><a href="Manage_Customers.php">Manage Customers</a></li>
						<li><a href="Manage_CustomerMessages.php">Messages from Customers</a></li>
						<li><a href="Manage_CustomerReview.php">Customer Reviews</a></li>
						<li><a href="Manage_WishLists.php">Items in Customers's Wish Lists</a></li>
					</ul>	
				</li>
				
				<li><a href="#">&nbsp;&nbsp;Support&nbsp;&nbsp;</a>
					<ul>
						<li><a href="Manage_QuantityDiscounts.php">Discounts by Order Quantities</a></li>
						<li><a href="Manage_OrderAmounts.php">Minimum Order Amount</a></li>
						<li><a href="Manage_OrderAmountsFreeShipping.php">Order Amount for Free Shipping</a></li>
						<li><a href="Manage_FiguresForVIPs.php">Figures of VIP Membership</a></li>
						<!--<li><a href="Manage_FeeForPersonalization.php">Fee for Persnalization</a></li>
						<li><a href="Manage_FeeForAttachingEmblems.php">Fee for Attaching Emblems</a></li>-->
						<li><a href="Manage_LocalSalesTax.php">California Local Sales Tax Rate</a></li>
						<li><a href="Manage_PaymentMethods.php">Payment Methods</a></li>
						<li><a href="Manage_BusinessHours.php">Store Business Hours</a></li>
					</ul>
				</li>
				<li><a href="#">&nbsp;&nbsp;Tools&nbsp;&nbsp;</a>
					<ul>
						<li><a href="Manage_News.php">News Letter</a></li>
					 	<li><a href="Manage_GiftCertificates.php">Manage Gift Certificates</a></li>
						<li><a href="Manage_PromoCodes.php">Manage Promotional Codes</a></li>
						<li><a href="Manage_SpotLight.php">Manage Spot Light Items</a></li>
						<li><a href="Manage_BirthdayCustomers.php">Manage Birthday Customer</a></li>
					</ul>	
				</li>
				<li><a href="#">Report</a>
				</li>
				<li><a href="#">&nbsp;&nbsp;Admin&nbsp;&nbsp;</a>
					<ul>
						<li><a>Company Profile</a>
							<ul>
								<li><a href="Manage_Administrators.php">Website Administrators</a></li>
								<li><a href="Manage_CompanyInfo.php">Company Info</a></li>
								<li><a href="Manage_AboutUs.php">Manage "About Us"</a></li>
								<li><a href="Manage_PrivacyPolicy.php">Manage Privacy Policy</a></li>
								<li><a href="Manage_ReturnPolicy.php">Manage Return Policy</a></li>
								<li><a href="Manage_HelpAndFAQs.php">Manage Help / FAQs</a></li>
							</ul>
						</li>
						<li><a>Main Page</a>
							<ul>
								<!--<li><a href="Manage_Background.php">Background Image</a></li>-->
								<li><a href="Manage_Banner.php">Banners</a></li>
								<!--<li><a href="Manage_Clock_Image.php">Countdown Clock</a></li>-->
								<!--<li><a href="Manage_Popular_Searches.php">Popular Searches</a></li>-->
							</ul>
						</li>
					</ul>	
				</li>
				
				
				
		<!-- 	<li><a href="#">Statistics</a>
					<ul>
						<li><a href="Manage_Statistics_Sales.php">Sales Statistics</a></li>
						<li><a href="Manage_Statistics_WebsiteTraffic.php">Website Traffic Statistics</a></li>
					</ul>	
				</li> -->
			</ul>
		</div>
	</div>
<?php 
	} 
?>
