<?php
//session_start();
include_once dirname(__FILE__) . "/../include/function.php";

$pid		= (!empty($_GET["id"]))?$_GET["id"]:null;
$action		= (!empty($_GET["action"]))?$_GET["action"]:null;
$position		= (!empty($_GET["position"]))?$_GET["position"]:null;
$reurl		= (!empty($_GET["reurl"]))?$_GET["reurl"]:null;
//$reurl		= $_SERVER["HTTP_REFERER"];
//$referer	= $_SERVER["HTTP_REFERER"];

//exit;
$userID=$_COOKIE["userID"];
if (empty($userID))
{

echo "<script>
alert('Please login first');
window.location='/?page=customer&account=login';
</script>";
exit;
}

$strSQL = "SELECT count(*) as cnt FROM Wishlist  WHERE LoginID = '" . $userID."' and ProductID=".$pid;
$DB = new myDB;
$DB->query($strSQL);
$data = $DB->fetch_array($DB->res);
$cnt = $data["cnt"];


 
if($action=="add") {
  if ($cnt==0)
	 $AddstrSQL	= ("INSERT INTO Wishlist (LoginID,ProductID) VALUES(
			\"".$userID."\",
			\"".$pid."\"			
			)");

	$DB->query($AddstrSQL);	
	$cntSQL = "SELECT count(*) as cnt FROM Wishlist  WHERE LoginID = '" . $userID."'";
	$DB->query($cntSQL);
	$data = $DB->fetch_array($DB->res);
	$cnt = $data["cnt"];
	$expire=time()+60*60*1;
	setcookie("wish", $cnt, $expire,"/","sshop.i9biz.com");
	$DB->close();
	
	if ($position=="list")
	{
	echo "<script>
	window.location='".$reurl."';
	</script>";
	}
	else
	{
	echo "<script>
	window.location='../?pid=".$pid."';
	</script>";
	}
}
if($action=="del") {
  
	 $DelstrSQL	= "Delete From Wishlist Where ProductID=".$pid;

	$DB->query($DelstrSQL);
	$cntSQL = "SELECT count(*) as cnt FROM Wishlist  WHERE LoginID = '" . $userID."'";
	$DB->query($cntSQL);
	$data = $DB->fetch_array($DB->res);
	$cnt = $data["cnt"];
	$expire=time()+60*60*1;
	setcookie("wish", $cnt, $expire,"/","sshop.i9biz.com");
	$DB->close();
	echo "<script>
	window.location='/?info=mywishlist';
	</script>";	
	exit;


	
}

?>