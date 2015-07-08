<?php 
define("COOKIE_DOMAIN", "lemontreeclothing.com");
include_once dirname(__FILE__) . "/function.php";

$cUserIDNO=trim($_POST['cUserIDNO']);
$cPassword=trim($_POST['cPassword']);



$strSQL_r = "SELECT * FROM admin_user 
	WHERE 
	id_email=  '" . $cUserIDNO."' and password= '".$cPassword."'";
	
//print_r($strSQL_r);
//exit;
	$DB_r = new myDB;
	$DB_r->query($strSQL_r);

	if($DB_r->rows==0 )
		echo "<script>alert('Mismatch User ID or password');location.replace('login.php');</script>";
	
	else
	{
		while ($datar = $DB_r->fetch_array($DB_r->res)){
			$tcFistName=$datar["cFistName"];
		}
		$expire = time() + 3600;
		setcookie("adminID",$cUserIDNO,$expire,"/", COOKIE_DOMAIN);
		
		echo "<script>location.replace('index.php');</script>";
	}

?>	