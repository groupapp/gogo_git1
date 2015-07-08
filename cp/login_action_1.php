<?php 

define("COOKIE_DOMAIN", "lemontreeclothing.com");
include_once dirname(__FILE__) . "/function.php";

$cUserIDNO=trim($_POST['cUserIDNO']);
$cPassword=trim($_POST['cPassword']);



$strSQL_r = "SELECT * FROM acc_user 
	WHERE 
	(cUserIDNO=  '" . $cUserIDNO."' and cPassword= '".$cPassword."') or (cUser_Num=  '" . $cUserIDNO."' and cPassword= '".$cPassword."')";
	
//print_r($strSQL_r);
//exit;
	$DB_r = new myDB;
	$DB_u = new myDB;
	$tcIPnumber=$_SERVER['REMOTE_ADDR'];
	$DB_r->query($strSQL_r);

	if($DB_r->rows==0 )
		echo "<script>alert('Mismatch User ID or password');location.replace('index.php');</script>";
	
	else
	{
		while ($datar = $DB_r->fetch_array($DB_r->res)){
			$tcFistName=$datar["cFistName"];
			$nUser_Num=$datar["nUser_Num"];
		}

		$cCountSQL = "UPDATE acc_user SET  cDeadDate =  now(), cIPnumber = '".$tcIPnumber."'  , nVisitSum = nVisitSum + 1    WHERE nUser_Num = ".$nUser_Num;
		$DB_u->query($cCountSQL);


		$expire = time() + 3600;
		setcookie("userID",$cUserIDNO,$expire,"/", COOKIE_DOMAIN);
		setcookie("username",$tcFistName,$expire,"/", COOKIE_DOMAIN);
		
		$DB_r->close();
		$DB_u->close();

		echo "<script>location.replace('myaccount.php');</script>";
	}

?>	