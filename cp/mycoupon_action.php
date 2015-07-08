
<?php


$precoupon=$_POST['precoupon'];
$cUserIDNO=$_POST['cUserIDNO'];
include('function.php'); 

$DB = new myDB;
$DBi = new myDB;
$DBs = new myDB;
$DBr = new myDB;
$strSQLs = "SELECT * FROM acc_user WHERE cUserIDNO='".$cUserIDNO."'";
	
		$DBs->query($strSQLs);

		while ($datax = $DBs->fetch_array($DBs->res)){
			$cSponsorX=$datax["cSponsorX"];
			$cUser_Num=$datax["cUser_Num"];

			if($cSponsorX=="0")
				$cSponsorX="00000";
		}

	$len = count($_POST["precoupon"]);

	for($i=0;$i<$len;$i++){
			if($precoupon[$i]){
				
				
				$strSQLr = "SELECT nUserCouponID  FROM acc_user_coupon Order by nUserCouponID DESC Limit 0,1";
	
				$DBr->query($strSQLr);

				if ($DBr->rows==0)
					$McID=100000;
				else
				{
					while ($datar = $DBr->fetch_array($DBr->res)){
						$McID=$datar["nUserCouponID"]+100000;

					}
				}

				$strSQL = "SELECT * FROM acc_coupon WHERE nCouponID=".$precoupon[$i];
	
				$DB->query($strSQL);

				while ($data = $DB->fetch_array($DB->res)){
					$dFrom=date('Ym',strtotime($data["dFrom"]));

					$cCouponNo=$data["cLocation"].$data["cShop"].$data["cItem"].$dFrom.$cSponsorX.$McID;
					
					
					$strSQLi = ("INSERT INTO acc_user_coupon (cCouponNo,cUser_Num,cSponsorX,nCouponID,dActive_date,fSale,nDown) VALUES(
							\"".$cCouponNo."\",
							\"".$cUser_Num."\",
							\"".$cSponsorX."\",
							\"".$data["nCouponID"]."\",
							now(),
							\"".$data["fSale"]."\",1
					)");
					
					//print_r($strSQLi);
					
					$DBi->query($strSQLi);
				}
			}
		}
	
	echo "<script>location.replace('mycoupon.php');</script>";	
?>






