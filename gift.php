<?php
include_once dirname(__FILE__) . '/include/function.php';
$prod_name="Gift Certificate($440)";
list($giname, $amt) =explode(" ", $prod_name);
echo $prod_name;
$acode= getGiftcertCode();
$fr_date=date('Y-m-d H:i:s',strtotime('+180 days'));
echo $fr_date;
				$g_amt=(float)($amt);
				if ($giname=='Gift Certificate')
				{
					$strSQL	= ("INSERT INTO GiftCertificates (
						GiftAuthorizationCode,
						GiftAmount,
						GiftAmountRemaining,
						GiftOrderID,
						GiftCustomerID,
						GiftCustomerIP_Address,
						GiftExpiryDate,
						GiftCustomerSessionID,
						IsActive,
						DateTimeIssued) VALUES (
						'".$acode."',
						".$g_amt.",
						".$g_amt.",
						'".$order_id."',
						'".$uid."',
						'".$_SERVER['REMOTE_ADDR']."',
						'".$fr_date."',
						'".$user_session."',
						'N',
						now())");
						
				}
echo $strSQL;
?>