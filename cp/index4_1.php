<?php
//if ($_SERVER['REMOTE_ADDR'] != "71.103.9.233") {
//	header("Location: /index.html");
//}


//setcookie("TestCookie", 'xxx', time()+3600,"/aw",COOKIE_DOMAIN);
//echo "cookie:".$_COOKIE["TestCookie"];


session_start();
define("COOKIE_DOMAIN", "eworldbaby.com");

$_SESSION["olduser_id"]=$_COOKIE["userID"];

$loginuserID="fxskin1@gmail.com";
//$expire = time() + 3600;


setcookie("userID", $loginuserID, time()+3600,"/",COOKIE_DOMAIN );

	

$position	= empty($_GET["position"])?null:$_GET["position"];

$garment_so_seq=empty($_GET["garment_so_seq"])?null:$_GET["garment_so_seq"];
$garment_so_id=empty($_GET["garment_so_id"])?null:$_GET["garment_so_id"];
$garment_so_token=empty($_GET["garment_so_token"])?null:$_GET["garment_so_token"];



if($garment_so_newcheck=="Y" && $_SESSION["garment_so_token"]=="")
{
	$milliseconds = round(microtime(true) * 1000);
	$garment_so_token=$milliseconds;
	$_SESSION["garment_so_token"]=$garment_so_token;
	setcookie("garment_so_token", $garment_so_token, time()+3600*48,"/",COOKIE_DOMAIN );

}
else if($garment_so_savesucess=="Y")
{
	$_SESSION["garment_so_token"]="";
	setcookie("garment_so_token", "", time()-3600*48,"/",COOKIE_DOMAIN );
	
}

if ($position=='glaccount')
$page="Chart of account";
else
$page=$position;

$_SESSION['position']=$page;
//print_r($journal_seq.':'.$journal_id);

//include_once dirname(__FILE__) . "/include/function.php";
include_once dirname(__FILE__) . "/include/header.php";
//include_once dirname(__FILE__) . "/include/menu.php";
/***
*********************** BODY **************************/
	switch($position) {

/*
		case "non_purchased":
			include dirname(__FILE__) . "/contents/non_purchase_d.php";
			break;*/
		
		default:
			include_once dirname(__FILE__) . "/contents/garment_so.php";
			break;
	}
	
		
	

/************************ END BODY ************************/

include dirname(__FILE__) . "/include/foot.php";
?>
