<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="keywords" content="wholesale fashion, wholesale clothes, women's wholesale apparel, wholesale tops and dresses, fashion wholesale for boutiques, clothing wholesale, clothes wholesale, high-end designers's fashion">
		<meta name="description" content="Lemon Tree provides wholesale clothing to specialty boutiques and general retailer of fashion apparel.">
		<title>gogomarket.net</title>
		
        <!--<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">-->
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        
		<!-- CSS =============================================================================================================== -->
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<!--link rel="stylesheet" type="text/css" href="/css/style_print.css" media="print" /-->
		<!--link rel="stylesheet" type="text/css" href="/css/cloud-zoom.css" /-->
		<!--link rel="stylesheet" type="text/css" href="/css/jqtransform.css" media="all" /-->
		
		<!--Custom CSS ========================================================================================================-->
		<link rel="stylesheet" type="text/css" href="/css/style_jy.css" />
		<link rel="stylesheet" type="text/css" href="/css/style_don.css" />
		<link rel="stylesheet" type="text/css" href="/css/style_seung.css" />
		 <!-- Fonts START -->
		  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"> 
		  <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		  <!-- Fonts END -->
		
		<!-- jQuery js =========================================================================================================== -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
		 <script src="//code.jquery.com/jquery-migrate-1.1.0.js"></script>
        <!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
		
		<!-- jQuery Colorbox js/CSS ============================================================================================= -->
		<script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="/css/jquery.colorbox.css">
		<!-- Error!!! This is not 'js' file. It's CSS. (Seung)
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/example1/colorbox.min.css"></script-->
		
		<!-- Amazon Scroller js/CSS ============================================================================================== -->
		<link rel="stylesheet" type="text/css" href="/css/amazon_scroller.css"></link>
		<script type="text/javascript" src="/js/amazon_scroller.js"></script>
        
        <!-- Bootstrap v3.3.1 js/CSS ============================================================================================== -->
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
		<!--<link rel="stylesheet" href="/bootstrap/css/demo.css">-->
		<link rel="stylesheet" href="/bootstrap/css/yamm.css">
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        
		
        <!-- Amazing Slider JS -->
        <script src="/sliderengine/amazingslider.js"></script>

        <!-- Amazing Slider initiation productlist.php slider-1 -->
        <link rel="stylesheet" type="text/css" href="/sliderengine/amazingslider-1.css">
		<script src="/sliderengine/initslider-1.js"></script>
        
        <!-- Amazing Slider initiation _index.php slider-100 -->
        <link rel="stylesheet" type="text/css" href="sliderengine-index/amazingslider-100.css">
        <script src="sliderengine-index/initslider-100.js"></script>

        
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.1.0.js"></script>
		<script type="text/javascript" src="//code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.1.0.js"></script>
		
		
		<!-- Custom js =========================================================================================================== -->
		<script type="text/javascript" src="/js/script.js"></script>
		<script type="text/javascript" src="/js/script_don.js"></script>
        <script type="text/javascript" src="/js/script_seung.js"></script>
		
		<!--<script type="text/javascript" src="/js/menu.js"></script>-->
		
		<!-- Problometic js. (Seung)
		<script type="text/javascript" src="/js/script_jy.js"></script-->
		
		<!--[if !IE]>
		<script type="text/javascript" src="/js/sidebar_menu.js"></script>
		<![endif]-->
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
		$headb          = new myDB;
		$headb->query("SELECT * FROM Background WHERE IsActive='Y' AND FromDate <= now() AND ToDate >= now() ORDER BY ToDate LIMIT 1");
        
		if($headb->rows > 0){
			$data 		= $headb->fetch_array($headb->res);
			$custombg	= " style=\"background:#{$data["BackgroundColor"]} url(/images/background/{$data["BackgroundImg"]}) 50% 0 {$data["BackgroundRepeat"]};\"";
			$bgsearch	= " style=\"background-color:#{$data["SearchboxColor"]};\"";
		}
        else{
			$custombg	= "";
			$bgsearch	= "";
		}


		$lang = array();		
		if(isset($_SESSION["lang"]))
		{
			if($_SESSION["lang"]=='en')
			{ 

				$lang_file = 'lang.en.php';
			}
        	else if($_SESSION["lang"]=='es')
				  $lang_file = 'lang.es.php';
               
			else if($_SESSION["lang"]=='kr')
			{
				$lang_file = 'lang.kr.php';
			}	
                 
		}
		else
			$lang_file = 'lang.en.php';
		include_once dirname(__FILE__) .'/languages/'.$lang_file;


	?>	
    
    
	<body <?php echo $custombg?>>
	<p id="totop"><a href="#top" title="Go to top"><span></span></a></p>
        <div class="container-fluid background-color-2" >
            <div class="header container">
                <div class="row">
                    <!--<div class="col-md-6">
                        <h1 class="logo">
                            <a href="<?php echo SITE_URL?>/" title="gogomarket.net" class="logo">gogomarket.net</a>
                        </h1>
                    </div>-->
					<div class="navbar navbar-default yamm" style="height:40px;z-index:9999">
					<div class="navbar-header">
					<button type="button" data-toggle="collapse" data-target="#navbar-collapse-2" class="navbar-toggle" style="  margin-top: -5px;"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					</div>
					
					<div id="navbar-collapse-2" class="navbar-collapse collapse" style="background-color:#60ab59;height: 48px !important;">
                    <div class="col-md-12 col-xs-12">
								


                                <ul class=" navbar-nav " style="margin-top:10px;  width: 100%;">
									<li class="first col-md-1">
										<a href="<?php echo SITE_URL?>/" title="gogomarket.net" class="logo">gogomarket.net</a>
									</li>
									<li class="col-md-1" id="bangicon">
										<input type="hidden" id="remain" value="8">
										<img src="/img/sand1_09.gif" id="showbang" onclick="showbang_1();" style="display:block;float:left;cursor:pointer;"/>
										<img src="/img/sand1_05.gif" id="hidebang" onclick="hidebang_1();" style="display:none;float:left;cursor:pointer;"/>
										
									</li>
									<li class="col-md-5">
									
										<form id="header_search_form" action="index.php" method="get" >
											<input type="hidden" name="c1" value="1">
											<?php $q = empty($_GET["q"]) ? "" : $_GET["q"];?>
											<input style="width:100%;" type="text" id="search" name="q" value="<?php if($q) echo $q; else echo "Search product, item #...";?>" onFocus="return Focus(this.form);" onBlur="return Blur(this.form);" class="input-text col-md-4" autocomplete="off"<?php echo $bgsearch?> />
											<!--<button type="button" onClick="return SearchConfirm(this.form);" title="Search" class="button">Search</button>
											<!--<img src="/images/tollfreenumber.png" style="margin-top: 8px;" />-->
										</form>
									
									</li>
										
                                    <?php
                                        for($i=0; $i<count($headerMenu); $i++){
                                            if($headerMenu[$i][0] == "Log In"){
                                                if(!empty($_COOKIE["userID"]) != ""){
                                                    //unset($headerMenu[$i]);
                                                    $headerMenu[$i][0] = "Log Out";
                                                    $headerMenu[$i][1] = "logout";
                                                    $headerMenu[$i][2] = "page=customer&account=logout";			
                                                }
                                            }
                                            else if($headerMenu[$i][0] == "Log Out"){
                                                if($_COOKIE["userID"] != ""){
                                                    //unset($headerMenu[$i]);
                                                    $headerMenu[$i][0] = "Log In";
                                                    $headerMenu[$i][1] = "login";
                                                    $headerMenu[$i][2] = "page=customer&account=login";				
                                                }
                                            }
                                            echo ($i<1) ? "<li class='col-md-1' style='padding-right: 0px;padding-left: 0px;text-align: right;'>" : "<li class='col-md-1' style='padding-right: 0px;padding-left: 0px;text-align: right;'>";
                                            echo "<a href=\"";
                                            if ($headerMenu[$i][1] == "myaccount"){
                                                echo str_replace("http", "http", SITE_URL);
                                            }
                                            else{
                                                echo SITE_URL;
                                            }
                                            echo "/?".$headerMenu[$i][2] . "\" id=\"" . $headerMenu[$i][1] . "\">" . $headerMenu[$i][0];
                                            if($headerMenu[$i][0] == "My Cart"){
                                                if (!empty($_SESSION['cart'])){
                                                    echo " (".multiDimArrSum($_SESSION['cart'])." items)";
                                                }
                                            }
                                            if($headerMenu[$i][0] == "My Wishlist"){
                                                if ($_COOKIE['wish']) {
                                                    echo " (" . ($_COOKIE['wish']) . ")";
                                                }
                                            }
                                            echo "</a></li>\n";

                                        }

										/*
										$enlang='';
										$eslang='';
										$krlang='';
										if(isset($_SESSION["lang"]))
										{
											if($_SESSION["lang"]=='en')
												$enlang='selected';
											else if($_SESSION["lang"]=='es')
												$eslang='selected';
											else if($_SESSION["lang"]=='kr')
												$krlang='selected';
											else
											{
												$enlang='';
												$eslang='';
												$krlang='';
											}	

										}
										echo "<li>
												<form action='' method='post' >
												<select id='lang' name='lang' onchange='return Blur(this.form);'>
												<option value='en'>Language</option>
												<option value='en' " .$enlang. ">English</option>
												<option value='es' ".$eslang.">Spanish</option>
												<option value='kr' ".$krlang.">Korean</option>
												</select>
												</form>
											</li>";*/


                                    ?>
                                </ul>
								
                            </div>
							<div id="shopcart" style="cursor:pointer;float:right;margin-top:-30px;margin-right:60px;width:60px"><a href="test.php">List</a><i class="fa fa-shopping-cart fa-2x" style="color:white;float:right;"></i><i onclick="showcart()" id="adown" class="fa fa-caret-down fa-2x" style="color:white"></i><i onclick="hidecart()" id="aup" class="fa fa-caret-up fa-2x" style="color:white;display:none"></i></div>	






                            <p class="welcome-msg">
                                <?php 
                                    if(!empty($_COOKIE['userFirstname'])){
                                        echo "Welcome " . (($_COOKIE['VIPMember']=="Y") ? "<img src=\"/images/ico_vip.png\" alt=\"VIP Member\" class=\"hicon\" />" : null) . $_COOKIE['userFirstname'] . "!";
                                    }
                                    else{
                                        echo "<span style='visibility: hidden;'>Welcome to our new online store!</span>";
                                    }
                                ?>
                            </p>

							<script type="text/javascript">
								function Blur(frm){
								frm.submit();
								}	
								</script>

                            <p class="custom-msg">
                                <!--<img src="/images/we_ship_around_the_world.png" style="margin-top: 13px;" />-->
                            </p>

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
                        

                        <!--<div class="col-xs-12">
                           
                        </div>-->
						</div>
                   </div>
				   
                </div>

            </div>
        </div>
		
		<!------------------------------------------------------------------------------------------------------------------------------>
<div id="bang" class="" style="display:none;width: 300px;position: absolute;left: 130px; background-color: white;z-index: 9999;  border: 1px solid #C2C2C2;padding: 10px;">
		<div class="block-title">
		<span>
		<p>Hannam Tustin</p>
		<p>Short time  Big sale</p>
		<p>배추 1box: $1.00</p>
		<p>06/10/2015  3:00 PM~ 6:00PM</p>
		<p>Today no more show
		<i class="fa fa-times" onclick="nobang()" style="cursor:pointer;"></i></p>
		</span></div>
</div>

<div id="blkcart" class="advanced-search-title col-lg-3 col-md-3 col-sm-6  col-xs-12" style="display:none;float:right"><!--class="block block-cart"-->
						<div class="block-title"><strong><span><h4>Shopping List</h4></span></strong></div>
						<div class="block-content">

							<div class="summary">
									<p class="amount-2">
<?php 
							/*if ($cart_qty > 1) {
								echo "There are <a href=\"/?page=mycart\"> $cart_qty items</a> in your cart.";
							} else {
								echo "There is <a href=\"/?page=mycart\"> $cart_qty item</a> in your cart."; 
							}*/
?>								
									</p>
									<p class="subtotal">
										<span class="label">Cart Subtotal:</span>
										
									</p>
							</div>
								
								
								<p class="block-subtitle">Recently added item(s)</p>
								<ol style="overflow: auto;" id="cart-sidebar" class="mini-products-list">
<?php 
		// Mini cart List
		$DB 		= new myDB;
		$DBL 		= new myDB;
		$item_qty=15;
		$n			= 1;
		$cnt		= 0;
		$dc			= 1;
		$cart_item=1;

		$DBL->query("select id_vendor FROM cart_items  Group by id_vendor");	
		while($dataL = $DBL->fetch_array($DBL->res)){	
		
			
			
			echo "<li id='vendor'><span onclick='list_show(".$dataL['id_vendor'].")' id='show_".$dataL['id_vendor']."' style='display:none;float:left;'><i class='fa fa-chevron-circle-up'></i></span>
			<span onclick='list_hide(".$dataL['id_vendor'].")' id='hide_".$dataL['id_vendor']."' style='display:block;float:left;'>
			<i class='fa fa-chevron-circle-down'></i></span><a href='?p1=".$dataL['id_vendor']."'>".$dataL['id_vendor']."</a>
			<span onclick='show_share(".$dataL['id_vendor'].")' style='float: right;  cursor: pointer;'><i class='fa fa-share'></i></span></li>";

			echo "<div class='col-lg-2' style='float: right;'><span id='share_hide_".$dataL['id_vendor']."' onclick='hide_share(".$dataL['id_vendor'].")' style='display:none; cursor: pointer;position: absolute;  border: 1px solid #C2C2C2;padding: 10px;background-color: white;right: 220px;width: 40px;border-top-left-radius: 20px;'><i class='fa fa-arrow-right'></i></span>
			<span id='share_item_".$dataL['id_vendor']."' style='display:none; position: absolute;  border: 1px solid #C2C2C2;padding: 10px;background-color: white;right: 1px; width: 226px;z-index:999;'>
			<li>
			<p><input type='checkbox' id='friend' value='1'>&nbsp;donkim</p>
			<p><input type='checkbox' id='friend' value='2'>&nbsp;youngdong</p>
			<p><input type='button' value='Send'></p>
			</li>
			</span></div>";
			echo "<span id='vendor_item_".$dataL['id_vendor']."'>";
			echo "<li>
			<input type='hidden' name='vendor_id'  id='vendor_id' value='".$dataL['id_vendor']."'><input type='text' name='custominput' id='custominput_".$dataL['id_vendor']."' placeholder='Here your list' onKeyUp='enterForm(event,".$dataL['id_vendor'].");'>			
			<input type='button' id='savebtn' onclick='customadd(".$dataL['id_vendor'].")' style='margin-left 10px;' value='Save'/></li>";
			
			$DB->query("select b.id_cart,b.cart_name,b.contact_id,a.rimg,a.name,a.price FROM cart_items b LEFT JOIN contacts a ON b.contact_id=a.contact_id  WHERE b.id_vendor=".$dataL['id_vendor']." Order by b.id_cart DESC");

			while($data = $DB->fetch_array($DB->res)){
?>
									<li class="item<?php echo ($cnt==15)?" last":null;?>">
											<?php if($data['cart_name']==""){?>
											<img src="<?php echo "data:image;base64,".$data['rimg']?>" width="64" height="64" /><span style="margin-left:10px;"><?php echo $data['name']?></span>
											<a href="javascript:void(0)"  style="margin-left:10px;" onclick="remove_mini_item(<?php echo $data['id_cart'].",".$data['contact_id']?>)"><i class="fa fa-trash-o"></i></a>
											<?php }else{?>
											<img src="<?php echo "data:image;base64,".$data['rimg']?>" width="64" height="64" /><span style="margin-left:10px;"><?php echo $data['cart_name']?></span>
											<a href="javascript:void(0)"  style="margin-left:10px;" onclick="remove_mini_item(<?php echo $data['id_cart'].",".$data['contact_id']?>)"><i class="fa fa-trash-o"></i></a>
											<?php }?>
										<!--<div class="product-details">
											<a href="javascript:void(0)" class="btn-remove" title="Remove This Item" onclick="remove_mini_item(<?php echo $cart_item?>)">Remove This Item</a>
											<p class="product-name">
												
											</p>
											<strong><?php //echo $prod_qty?></strong> X <span class="price">
<?php 
			
				echo "$".formatMoney($data['price'] * $dc, true)."</span>";
			
?>									
										</div>-->
									</li>
										
<?php 
			$cnt++;
			$n = 1 - $n;
			//if ($cnt>2) break;
			}
			echo "</span>";
		}

		echo "</ol>";
	 
?>								
									
								</div>
							</div>

<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
		<script type="text/javascript">
			$(document).ready(function(){
				var cartshow=getCookie("cartshow");
				var remain=$('#remain').val()*1000;
				if (cartshow=='y')
				{
					 showcart();	
				}
				
				var bangicon=getCookie("bangicon");
				
				
				if(remain>0)
				{
					if (bangicon=='2')
						$('#bangicon').remove();
					
					else
					{
						setTimeout(function(){
							$('#bangicon').remove();
							document.cookie="bangicon=;expires=Thu, 01 Jan 1970 00:00:00 UTC";
						},remain);
					}
				}
				//else
					//$('#bangicon').remove();
				 
			});

		</script>
       
	
		
		<!-- tweet and share :)-->
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

		

