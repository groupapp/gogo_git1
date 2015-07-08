<?php 
	
	$nUserCouponID=$_GET['nUserCouponID'];
	include('function.php');

	$DB = new myDB;
	$strSQL="SELECT a.*,b.cImg,b.fSale,b.fOrigin,b.cDesc,b.dFrom,b.dTo FROM acc_user_coupon a,acc_coupon b where a.nCouponID=b.nCouponID and a.nUserCouponID=".$nUserCouponID;
	
	$DB->query($strSQL);
	while($data = $DB->fetch_array($DB->res)) {	
		$cCouponNo=$data["cCouponNo"];
		$cImg=$data["cImg"];
		$fSale=$data["fSale"];
		$fOrigin=$data["fOrigin"];
		$cDesc=$data["cDesc"];
		$dFrom=$data["dFrom"];
		$dTo=$data["dTo"];
	}
	


?>
<!DOCTYPE html> 
<html>
<head>
	<title>View</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body >
<div align="center" style="background-image: url('/myfilemanager/dynamic_folder/IN_0/<?php echo $cImg?>');width: 663px;height: 322px;">
<div class="col-xs-12">
<?php
echo '
<span><label style="font-size: 12px;margin-top: -0px;margin-left: 20px;color:red;">Issue Date:'.$dFrom.'~'.$dTo.'</label></span><br>
<label style="font-size: 60px;margin-top: 0px;margin-left: -300px;">$'.$fSale.'</label>
<span><label style="font-size: 20px;margin-top: 80px;margin-left: 0px;text-decoration: line-through;">$'.$fOrigin.'</label></span><br>
<span><label style="font-size: 10px;margin-top: -20px;margin-left: -220px;text-align: left;">'.$cDesc.'</label></span><br>

<span style="margin-top:100px"><img src="./php/qr_img.php?d=http://lemontreeclothing.com/cp/scoupon.php?cCouponNo='.$cCouponNo.'"  style="margin-left: 440px; margin-top: -200px;"> </span>';
?>

<span style="font-size: 40px;"><?php echo $cCouponNo?></span>
</div>
</div>

	
</body>
</html>
