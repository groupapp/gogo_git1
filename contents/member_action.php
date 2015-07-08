<?php
$account			= $_GET["account"];
include_once dirname(__FILE__) . "/../include/function.php";

$DB = new myDB;
$login			= (!empty($_POST["login"]))? $_POST["login"]:null;
$action			= (!empty($_POST["action"]))? $_POST["action"]:$login["action"];
$billing		= $_POST['billing'];
$shipping		= $_POST['shipping'];
		
$firstname		= $_POST["firstname"];
$lastname		= $_POST["lastname"];
$is_subscribed	= $_POST["is_subscribed"];
$logout			= $_GET["logout"];
$seller		= $_POST["seller"];

$loginuserID	= (!empty($_POST["userid"]))? trim($_POST["userid"]):trim($login["userid"]);
$loginpassword	= (!empty($_POST["password"]))? trim($_POST["password"]):trim($login["password"]);
$month			= $_POST["birth_month"];
$date			= $_POST["birth_date"];
$year			= $_POST["birth_year"];
$returnurl		= (!empty($_POST["returnurl"]))? $_POST["returnurl"]:$login["returnurl"];
$IsActive		= '';//auto new member active
$ip             =  $_SERVER['SERVER_ADDR'];
//print_r($returnurl);
//exit;

if($year!='')
{
		$BirthDay=$year."-".$month."-".$date;
		$br_date=date('Y-m-d',strtotime($BirthDay));
}
if ($account=="logout") $action = $account;


if($is_subscribed==1) $is_subscribed='Y';
//$Notes			= htmlspecialchars($_POST["Notes"]);
//$password		= $_POST["password"];

//exit;
if ($action == "add") {

	$strSQL 	= "INSERT INTO Customers (
							MailingFirstName,
							MailingLastName,
							MailingCompanyName,
							MailingStreet,
							MailingStreet2,
							MailingCity,
							MailingStateOrProvince,
							MailingZipcode,
							MailingCountry,
							MailingPhone,
							MailingFax,
							LoginID,
							LoginPassword,
							IsActive,
							ReceiveEmail,
							SellerPermit,
							DateTimeRegistered,
							Trace_IP_Addresses";
				if ($billing['use_for_shipping'] > 0) {
					$strSQL	.= ", ShippingFirstName,
							ShippingLastName,
							ShippingCompanyName,
							ShippingStreet,
							ShippingStreet2,
							ShippingCity,
							ShippingStateOrProvince,
							ShippingZipcode,
							ShippingCountry,
							ShippingPhone,
							ShippingFax";
				}
				$strSQL		.= ") VALUES (
							'".addslashes($firstname)."',
							'".addslashes($lastname)."',
							'".addslashes(trim($company))."',
							'".addslashes(trim($billing['street'][0]))."',
							'".addslashes($billing['street'][1])."',
							'".addslashes($billing['city'])."',
							'".addslashes(trim(($billing['region_id'])?$billing['region_id']:$billing['region']))."',
							'".$billing['postcode']."',
							'".$billing['country_id']."',
							'".$billing['telephone']."',
							'".$billing['fax']."',
							'".$loginuserID."',
							'".$loginpassword."',
							'N','".$is_subscribed."',
							'".$seller."',now(),
							'".$ip."'";
				if ($billing['use_for_shipping'] > 0) {
					$strSQL	.= ",'".addslashes($firstname)."',
							'".addslashes($lastname)."',
							'".addslashes(trim($company))."',
							'".addslashes($billing['street'][0])."',
							'".$billing['street'][1]."',
							'".addslashes($billing['city'])."',
							'".(($billing['region_id'])?$billing['region_id']:$billing['region'])."',
							'".$billing['postcode']."',
							'".$billing['country_id']."',
							'".$billing['telephone']."',
							'".$billing['fax']."'";
				}
				else
				{
					$strSQL	.= ",'".addslashes($firstname)."',
							'".addslashes($lastname)."',
							'".addslashes(trim($company))."',
							'".addslashes($shipping['street'][0])."',
							'".$shipping['street'][1]."',
							'".addslashes($shipping['city'])."',
							'".(($shipping['region_id'])?$shipping['region_id']:$shipping['region'])."',
							'".$shipping['postcode']."',
							'".$shipping['country_id']."',
							'".$shipping['telephone']."',
							'".$shipping['fax']."'";
				}
				$strSQL		.= ")";
	//echo $strSQL;
	//exit;

	$DB->query($strSQL);
	
	/* auto new member active
	$expire = time() + 3600;
	setcookie("userID", $loginuserID, $expire,"/",COOKIE_DOMAIN);
	setcookie("userFirstname", $firstname, $expire,"/",COOKIE_DOMAIN);
	*/
	$DB->close();
	echo "<script>window.location='/?page=newmember';</script>";

} 
elseif ($action == 'logout' ) {
	//$past = time() - 3600; 
	//foreach ( $_COOKIE as $key => $value ) { setcookie( $key, $value, $past, '/',COOKIE_DOMAIN); } 
	
	setcookie("userID", "", time()-3600, "/", COOKIE_DOMAIN);
	setcookie("userFirstname", "", time()-3600, "/",COOKIE_DOMAIN);
	setcookie("wish", "", time()-3600,"/", COOKIE_DOMAIN);
	if ($_COOKIE["VIPMember"]=="Y") {		
		setcookie("VIP[ratio]", "", time()-3600,"/", COOKIE_DOMAIN);
		setcookie("VIP[amount]", "", time()-3600,"/", COOKIE_DOMAIN);
		setcookie("VIP[req_amount]", "", time()-3600,"/", COOKIE_DOMAIN);
	} else {
		setcookie("VIPMember", "", time()-3600, "/", COOKIE_DOMAIN);
	}
	
	$DB->close();
	echo "<script>location.replace('/');</script>";

}
elseif ($action == "login" ) {
	
	$strSQL 	= "Select count(*) AS cnt,sum(TotalLoginCount) as sumlogin,MailingFirstName,Is_VIP_Member from Customers where LoginID='".$loginuserID."' and LoginPassword='".$loginpassword."' and IsActive='Y'";
//Print_r($strSQL);
//exit;	
	$DB->query($strSQL);
	$data = $DB->fetch_array($DB->res);
	$cnt=$data['cnt'];
	$sumlogin=$data['sumlogin']+1;
	$FirstName=$data['MailingFirstName'];
	$Is_VIP_Member=$data['Is_VIP_Member'];
	if ($Is_VIP_Member=="Y") {
		$DB->query("SELECT * FROM FiguresForVIPs LIMIT 1");
		if ($DB->rows > 0)
			list(,$vip_ratio, $vip_amount, $vip_req_points) = $DB->fetch_row($DB->res);
	}
	
	if ($cnt==1){
		$UstrSQL	= "UPDATE Customers SET
					TotalLoginCount = ".$sumlogin.",
					Trace_IP_Addresses = '".$ip."',
					DateTimeLastLogin = now() 
					WHERE LoginID='".$loginuserID."'";
		$DB->query($UstrSQL);
		
		$expire=time()+60*60*1;
		setcookie("userID", $loginuserID, $expire,"/", COOKIE_DOMAIN);
		setcookie("userFirstname", $FirstName, $expire,"/", COOKIE_DOMAIN);
		setcookie("VIPMember", $Is_VIP_Member, $expire,"/", COOKIE_DOMAIN);
		if ($Is_VIP_Member=="Y") {
			setcookie("VIP[ratio]", $vip_ratio, $expire, "/", COOKIE_DOMAIN);	
			setcookie("VIP[amount]", $vip_amount, $expire, "/", COOKIE_DOMAIN);
			setcookie("VIP[req_points]", $vip_req_points, $expire, "/", COOKIE_DOMAIN);
		}
	}
	else
	{
		
		$DB->close();

		echo "<script>
		alert('Please input correct email-address or password or You calling customer service.');
		window.location='".$returnurl."';
		</script>";	
	}
}
$DB->close();

if (!empty($_POST['frmdata'])) {
	echo "<form action='{$returnurl}' method='post' name='frm'>";
	$frmdata = $_POST['frmdata'];
	foreach ($frmdata as $key => $val)
		echo "<input type='hidden' name='{$key}' value='{$val}'/>";
	echo "</form><script>document.frm.submit();</script>";
} else {
	echo "<script>window.location='".$returnurl."';</script>";
}

//echo $_COOKIE["userID"];

?>