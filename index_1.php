

<?php
	//if ($_SERVER['REMOTE_ADDR'] != "71.103.9.233") {
	//	header("Location: /index.html");
	//}

	//echo dirname(__FILE__);

	session_start();
	$c1			= empty($_GET["c1"])		? null : $_GET["c1"];
	$p1			= empty($_GET["p1"])		? null : $_GET["p1"];
	$c2			= empty($_GET["c2"])		? null : $_GET["c2"];
	$pp			= empty($_GET["pp"])		? null : $_GET["pp"];
	$country	= empty($_GET["country"])	? null : $_GET["country"];
	$club		= empty($_GET["club"])		? null : $_GET["club"];
	$brand		= empty($_GET["brand"])		? null : $_GET["brand"];

	

	


	if(isSet($_POST['lang']))
	{
	$lang = $_POST['lang'];
	 
	// register the session and set the cookie
	$_SESSION['lang'] = $lang;
	 
	setcookie('lang', $lang, time() + (3600 * 24 * 30));
	}
	else if(isSet($_SESSION['lang']))
	{
	$lang = $_SESSION['lang'];
	}
	else if(isSet($_COOKIE['lang']))
	{
	$lang = $_COOKIE['lang'];
	}
	else
	{
	$lang = 'en';
	}

	if(!empty($arrGet))
	{
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
		include_once dirname(__FILE__) .'/languages/'.$lang_file;
	}



	if (!empty($_GET)) {
		//$arrKeys = array_keys($_GET);
		foreach ($_GET as $key => $val) {
			$arrGet[] = array($key, $val);
		}
	}

	if (strpos("|mycart|thankyou|sorry|carderror|newmember|", !empty($arrGet[0][1]))) {
		$main_css = " col-layout";
	}
	
	include_once dirname(__FILE__) . "/include/function.php";
    
	
    include_once dirname(__FILE__) . "/include/header.php";
    

    /************************** BODY **************************/
   
	
	
	//print_r($arrGet[0][0]);
    if (empty($arrGet)) {
        include dirname(__FILE__) . "/contents/_index.php";
    }
	
    elseif ($arrGet[0][0]=="page") {

        switch($arrGet[0][1]) {

            case "customer":
                if ($arrGet[1][0]=="account") {
                    switch($arrGet[1][1]) {
                        case "create":
                            include dirname(__FILE__) . "/contents/formpage.php";
                            break;
                        case "login":
                            include dirname(__FILE__) . "/contents/formpage.php";
                            break;
                        case "logout":
                            echo "<script>location.replace('/contents/member_action.php?account=logout')</script>";
                            exit();
                            break;
                        case "myaccount":
                            include dirname(__FILE__) . "/contents/myaccount.php";
                            break;
                        case "myorderhistory":
                            include dirname(__FILE__) . "/contents/myorders.php";
                            break;
                        case "mypersonalinfo":
                            include dirname(__FILE__) . "/contents/mypersonalinfo.php";
                            break;
                        case "retrieve":
                            include dirname(__FILE__) . "/contents/retrieveaccount.php";
                            break;
                        case "retrieve_success":
                            include dirname(__FILE__) . "/contents/retrieveaccount.php";
                            break;
                        case "retrieve_fail":
                            include dirname(__FILE__) . "/contents/retrieveaccount.php";
                            break;
                        case "index":
                            include_once dirname(__FILE__) . "/include/navleft.php";
                            include dirname(__FILE__) . "/contents/account_index.php";
                            break;

                    }
                }
                break;

            case "mycart":
                include dirname(__FILE__) . "/contents/shoppingcart.php";
                break;

            case "checkout":
                include dirname(__FILE__) . "/contents/checkoutpage.php";
                break;
            case "sitemap":
                include dirname(__FILE__) . "/contents/sitemap.php";
                break;

            case "thankyou":
            case "sorry":
            case "carderror":
            case "newmember":
                include dirname(__FILE__) . "/contents/thankyoupage.php";
                break;

            default:
                include_once dirname(__FILE__) . "/include/navleft.php";
                break;
        }

    } else {



        if ($arrGet[0][0]=="info") {

            //include_once dirname(__FILE__) . "/include/navleft.php";
            switch($arrGet[0][1]) {

                case (preg_match('/.*policy$/', $arrGet[0][1])?true:false):
                    include dirname(__FILE__) . "/contents/policies.php";
                    break;

                case (preg_match('/.*fromus$/', $arrGet[0][1])?true:false):
                    include dirname(__FILE__) . "/contents/buyfromus.php";
                    break;
                case "mywishlist":
                    include dirname(__FILE__) . "/contents/wishlist.php";
                    break;

                case "aboutus":
                    include dirname(__FILE__) . "/contents/aboutus.php";
                    break;

                case "location":
                    include dirname(__FILE__) . "/contents/location.php";
                    break;
				
				case "contactus":
                    include dirname(__FILE__) . "/contents/contactus.php";
                    break;

                case "marketevent":
                    include dirname(__FILE__) . "/contents/marketevent.php";
                    break;

                case "searchterms":
                    include dirname(__FILE__) . "/contents/searchterms.php";
                    break;
                case "giftcertificates":
                    include dirname(__FILE__) . "/contents/giftcertificates.php";
                    break;
                case "sizechart":
                    include dirname(__FILE__) . "/contents/sizechart.php";
                    break;
                case "vipinfo":
                    include dirname(__FILE__) . "/contents/vipinfo.php";
                    break;

            }

        } else {

           

             if (stristr($arrGet[0][1], "more"))
            {
                    include_once dirname(__FILE__) . "/include/navleft.php";
					include dirname(__FILE__) . "/include/footer.php";
                    include dirname(__FILE__) . "/contents/categorypage.php";
            }
            else if (stristr($arrGet[0][0], "pid"))
                    include dirname(__FILE__) . "/contents/productpage.php";
            else if(!empty($c1))
            {
               
					
					//include dirname(__FILE__) . "/js/tester.js";
                    include_once dirname(__FILE__) . "/include/navleft.php";
                    //include_once dirname(__FILE__) . "/include/navleft-list.php";
                    include dirname(__FILE__) . "/contents/couponlist.php";
            }

			else if(!empty($p1))
            {
               
					
					
                    include dirname(__FILE__) . "/contents/productlist.php";
            }
            //}	
        }
    }

    /************************ END BODY ************************/

    include dirname(__FILE__) . "/include/footer.php";
?>


