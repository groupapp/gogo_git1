<?php
//if ($_SERVER['REMOTE_ADDR'] != "71.103.9.233") {
//	header("Location: /index.html");
//}


//setcookie("TestCookie", 'xxx', time()+3600,"/aw",COOKIE_DOMAIN);
//echo "cookie:".$_COOKIE["TestCookie"];


//session_start();

$cUserIDNO=$_COOKIE["adminID"];
if (empty($cUserIDNO))
{
echo "<script>
window.location='login.php';
</script>";
}

//include_once dirname(__FILE__) . "/include/function.php";
include_once dirname(__FILE__) . "../../include/header.php";
//include_once dirname(__FILE__) . "/include/menu.php";
/***
*********************** BODY **************************/
$position	= empty($_GET["position"])?null:$_GET["position"];
	switch($position) {


		case "coupon":
			include dirname(__FILE__) . "../../contents/coupon_so.php";
			break;
		
		default:
			include_once dirname(__FILE__) . "../../contents/garment_so.php";
			break;
	}
	
		
	

/************************ END BODY ************************/

include dirname(__FILE__) . "../../include/foot.php";
?>
