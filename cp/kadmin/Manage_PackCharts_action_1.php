<?php
	include "../include/function.php";
	$DB = new myDB;
	$view	= empty($_REQUEST["view"])?"":$_REQUEST["view"];
	$DisplayOrder			= $_POST["DisplayOrder"];
	$action					= $_REQUEST["action"];
	$nCouponID			= $_GET["id"];
	$nCouponID2			= $_POST["nCouponID"];
	$cName			= $_POST["cName"];
	$cDesc	= $_POST["cDesc"];
	$cLocation					= $_POST["cLocation"];
	$cShop					= $_POST["cShop"];
	$cItem					= $_POST["cItem"];
	$dFrom						= $_POST["dFrom"];
	$dTo						= $_POST["dTo"];
	$fOrigin						= $_POST["fOrigin"];
	$fSale						= $_POST["fSale"];
	$cImg						= $_POST["cImg"];
	$searchField			= $_POST["searchField"];
	$searchKeyword			= $_POST["searchKeyword"];
	$displayOrder			= $_POST["displayOrder"];
	$cActive			= $_POST["cActive"];

	if($dFrom=='')
		$dFrom=date('Y-m-d',strtotime($dFrom));
	if($dTo=='')
		$dTo=date('Y-m-d',strtotime($dTo));
//	echo "action<br/>";
//	echo $action;
//	exit;
	if ($action == "del") {
		$strSQL = ("DELETE FROM acc_coupon WHERE nCouponID=".$nCouponID);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	elseif ($action == "add") 
	{
		$strSQL = ("INSERT INTO acc_coupon (cName,cDesc,cLocation,cShop,cItem,dFrom,dTo,fOrigin,fSale,dCreate_date,dUpdate_date,cActive,cImg) VALUES(
				\"".$cName."\",
				\"".$cDesc."\",
				\"".$cLocation."\",
				\"".$cShop."\",
				\"".$cItem."\",
				\"".$dFrom."\",
				\"".$dTo."\",
				\"".$fOrigin."\",
				\"".$fSale."\"
				,now(),now(),
				\"".$cActive."\",
				\"".$cImg."\"
			)");

			
			$DB->query($strSQL);
			
		
		
	}
	elseif ($action == "update")
	{
			$strSQL = ("UPDATE acc_coupon SET
					cName= \"".$cName."\",
					cDesc= \"".$cDesc."\",
					cLocation= \"".$cLocation."\",
					cShop= \"".$cShop."\",
					cItem= \"".$cItem."\",
					dFrom= \"".$dFrom."\",
					dTo= \"".$dTo."\",
					fOrigin= \"".$fOrigin."\",
					fSale= \"".$fSale."\",
					dCreate_date= now(),
					dUpdate_date= now(),
					cActive= \"".$cActive."\",
					cImg= \"".$cImg."\",
					dUpdate_date	= now()
					WHERE nCouponID=".$nCouponID2);
				
				//echo $strSQL."<br/>";
				//exit;
				
				$DB->query($strSQL);
			
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_PackCharts.php?act=".$view."&aid=".$nCouponID2."&searchField=".$searchField."&searchKeyword=".$searchKeyword."&displayOrder=".$displayOrder."&pp=".$pp."');</script>";
?>