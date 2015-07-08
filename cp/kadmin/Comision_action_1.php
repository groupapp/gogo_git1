<?php 

include_once dirname(__FILE__) . "/function.php";

$current=trim($_POST['current']);
$cUserIDNO=$_COOKIE["userID"];
$thismon=date('Y-m');
//print_r($useCoupon);
//exit;
	
		$DB = new myDB;
		$DBi = new myDB;
		$cCountSQL = "UPDATE acc_user_coupon SET nFinishSeq=".$current." where dUse_date>0 and nActive and nFinishSeq<1";
		//print_r($cCountSQL);
		//exit;
		$DB->query($cCountSQL);		
		
		$strSQL = "INSERT INTO comision (fDate,dCreate,cAdmin) VALUES ('".$thismon."',now(),'".$cUserIDNO."')";
		$DBi->query($strSQL);
		
		$DB->close();
		$DBi->close();
		echo "<script>alert('This month finish commission'); location='/cp/kadmin/index.php';</script>";
	
?>	