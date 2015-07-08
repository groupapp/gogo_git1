<?php
include "/include/function.php";
$DB = new myDB;
$action			= (!empty($_GET["pwd"]))? trim($_GET["pwd"]):null;
$loginId		= $_POST["id"];
$loginpassword	= (!empty($_POST["pwd"]))? trim($_POST["pwd"]):null;
$ip             = $_SERVER['SERVER_ADDR'];
$browser        = $_SERVER['HTTP_USER_AGENT'];

if($action=="logout")
{
	setcookie("aduserID", "", time()-3600,"/","127.0.0.1");
	echo "<script>
		window.location='./';
		</script>";
	exit;	
}

$strSQL 	= "Select count(*) AS cnt,AdminID,PV from  WebsiteAdministrators where LoginID='".$loginId."' and LoginPassword='".$loginpassword."'";
//Print_r($strSQL);
//exit;	

$DB->query($strSQL);
$data = $DB->fetch_array($DB->res);
$cnt=$data['cnt'];
$AdminID=$data['AdminID'];
$PV=$data['PV'];

// i9Biz Staff login
/*
if ($loginId = "i9admin" and $loginpassword = "dkdlskdls") {
	$AdminID	= "i9BizStaff";
	$i9staff	= 1;
}*/

if ($cnt==1 ){
	/*$UstrSQL	= $strSQL		= ("INSERT INTO WebsiteAdminLoginRecords (AdminID,LoginID,LoginPassword,IP_Address,BrowserInfo,DateTimeLoggedIn) VALUES(
				\"".$AdminID."\",
				\"".$loginId."\",
				\"".$loginpassword."\",
				\"".$ip."\",
				\"".$browser."\",
				now()
				)");

	$DB->query($UstrSQL);*/
	//echo $PV;
	
	$expire	= time() + 60 * 60 * 3;
	
	//Print_r($loginId);	
	//Print_r(COOKIE_DOMAIN);
	setcookie("aduserID", $loginId, $expire,"/","127.0.0.1");//COOKIE_DOMAIN);
	
	$DB->close();
	
	echo "<script>
			window.location='./data.php';
			</script>";
} else {
	
	setcookie("aduserID", "", time()-3600);
	$DB->close();

	echo "<script>alert('Please input correct login ID or password.');
			window.location='./';
			</script>";	
}




//echo $_COOKIE["userID"];


?>