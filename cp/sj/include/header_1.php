<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>SoccerShopUSA.com</title>
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/css/style_print.css" media="print" />
		<link rel="stylesheet" type="text/css" href="/css/style_jy.css" />
		<link rel="stylesheet" type="text/css" href="/css/style_don.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="/css/jquery.colorbox.css" />
		<link rel="stylesheet" type="text/css" href="/css/cloud-zoom.css" />
		<link rel="stylesheet" href="/css/jqtransform.css" type="text/css" media="all" />
		
		<script type="text/javascript" src="/js/jquery-1.7.1.js"></script>
		<script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
		<script type="text/javascript" src="/js/script.js"></script>
		<script type="text/javascript" src="/js/script_jy.js"></script>
		<script type="text/javascript" src="/js/script_don.js"></script>
		<script type="text/javascript" src="/js/menu.js"></script>
		<![if !IE]>
		<script type="text/javascript" src="/js/sidebar_menu.js"></script>
		<![endif]>
		<!--[if gte IE 8]>
		<script type="text/javascript" src="/js/sidebar_menu.js"></script>
		<![endif]-->
		<!--[if lte IE 7]>
		<script type="text/javascript" src="/js/sidebar_menu_ie.js"></script>
		<![endif]-->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.ajax').colorbox({rel:'ajax'});
			});
		</script>
	</head>
<?php 
	$headb = new myDB;
	$headb->query("SELECT * FROM Background WHERE IsActive='Y' AND FromDate <= now() AND ToDate >= now() ORDER BY ToDate LIMIT 1");
	if ($headb->rows > 0) {
		$data 		= $headb->fetch_array($headb->res);
		$custombg	= " style=\"background:#{$data["BackgroundColor"]} url(/images/background/{$data["BackgroundImg"]}) 50% 0 {$data["BackgroundRepeat"]};\"";
		$bgsearch	= " style=\"background-color:#{$data["SearchboxColor"]};\"";
	}else{
		$custombg	= "";
		$bgsearch	= "";
	}
	
?>	
	<body<?php echo $custombg?>>
		<div class="body-wrapper">
			<p id="totop"><a href="#top" title="Go to top"><span></span></a></p>
			<div class="body">
				<div class="cont-wrapper">
				
					<!-- //***************************** HEADER *******************************// -->
					<div class="header">
						<h1 class="logo">
							<a href="<?php echo SITE_URL?>/" title="SoccerShopUSA.com" class="logo">SoccerShopUSA</a>
						</h1>
						<div class="quick-search-wrapper">
							<form id="header_search_form" action="index.php" method="get">
								<div class="form-search">
								<?php $q = empty($_GET["q"])?"":$_GET["q"];?>
									<input type="text" id="search" name="q" value="<?php if($q) echo $q; else echo "Search product, item #...";?>" onFocus="return Focus(this.form);" onBlur="return Blur(this.form);" class="input-text" autocomplete="off"<?php echo $bgsearch?> />
									<button type="button" onClick="return SearchConfirm(this.form);" title="Search" class="button"></button>
									<img src="/images/tollfreenumber.png" style="margin-top: 8px;" />
								</div>
							</form>
						</div>
						<div class="no-display">
							<h1>Soccer Shop USA</h1>
							<p>154 S. Vermont Ave., Los Angeles, CA 90004<br />
							Phone 1: 1-800-464-KICK Phone 2: (213) 381-3011<br />
							http://www.soccershopusa.com</p>
						</div>
						<div class="header-right">
							<div class="header-menu-block">
								<ul class="header-menu">
		<?php
			for ($i=0; $i<count($headerMenu); $i++) {
				
				
				
				if ($headerMenu[$i][0]=="Log In")
				{
					if($_COOKIE["userID"]!="")
					{
						//unset($headerMenu[$i]);
						$headerMenu[$i][0]="Log Out";
						$headerMenu[$i][1]="logout";
						$headerMenu[$i][2]="page=customer&account=logout";			
					}
					
				}
				else if($headerMenu[$i][0]=="Log Out")
				{
					if($_COOKIE["userID"]!="")
					{
						 //unset($headerMenu[$i]);
						$headerMenu[$i][0]="Log In";
						$headerMenu[$i][1]="login";
						$headerMenu[$i][2]="page=customer&account=login";				
					}
				}
			
				
				echo ($i<1)?"<li class=\"first\">":"<li>|&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href=\"";
				if ($headerMenu[$i][1]=="checkout") {
					echo str_replace("http", "http", SITE_URL);
				} else {
					echo SITE_URL;
				}
				echo "/?".$headerMenu[$i][2]."\" id=\"".$headerMenu[$i][1]."\">".$headerMenu[$i][0];
				if ($headerMenu[$i][0]=="My Cart") {
					if ($_SESSION['cart']) {
						echo " (".multiDimArrSum($_SESSION['cart'])." items)";
					}
				}
				if ($headerMenu[$i][0]=="My Wishlist") {
					if ($_COOKIE['wish']) {
						echo " (".($_COOKIE['wish']).")";
					}
				}
				echo "</a></li>\n";
			}
		?>
								</ul>
							</div>
							<p class="welcome-msg">
		<?php 
			if ($_COOKIE['userFirstname']) {
				echo "Welcome " . (($_COOKIE['VIPMember']=="Y")?"<img src=\"/images/ico_vip.png\" alt=\"VIP Member\" class=\"hicon\" />":null).$_COOKIE['userFirstname'] . "!";
			} else {
				echo "<span style='visibility: hidden;'>Welcome to our new online store!</span>";
			}
		?>
							</p>
							<p class="custom-msg">
								<img src="/images/we_ship_around_the_world.png" style="margin-top: 13px;" />
							</p>
							<div class="clear"></div>
<!-- Quick Search Wrapper was here -->
							<div class="no-display">
								<ul class="middle_menu">
									<li>
										<a href="?page=customer&account=myorderhistory">Order Status</a>
									</li>
									<li>
										<a href="?info=customerservice">Customer Service</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="clear"></div>
						<div class="top-menu-wrapper">
							<div class="side-banner-vertical">
								<a href="<?php echo SITE_URL?>/?info=shippingpolicy">Free Shipping</a>
							</div>
							<a href="<?php echo SITE_URL?>/" title="Home" class="btn-home"></a>
							<ul class="top-menu-links">
		<?php
			for ($i=0; $i<count($topMenu); $i++) {
				echo "<li><a href=\"".SITE_URL."/".$topMenu[$i][1]."\">".$topMenu[$i][0]."</a></li>\n";
			}
		?>
							</ul>
						</div>
		
					</div>
					<!-- //***************************** END HEADER *******************************// -->
		
					<!-- //***************************** MAIN *******************************// -->
					<div class="main-container<?php echo $main_css?>" style="padding-bottom: 0;">
						<div class="main">