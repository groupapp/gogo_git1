<?php
session_start();
include_once dirname(__FILE__) . "/../include/function.php";

$pid		= (!empty($_POST["id"]))?$_POST["id"]:null;
$id_vendor		= (!empty($_POST["id_vendor"]))?$_POST["id_vendor"]:null;
$action		= (!empty($_POST["action"]))?$_POST["action"]:null;
$option		= (!empty($_POST["option"]))?$_POST["option"]:null;
$options	= (!empty($_POST["options"]))?$_POST["options"]:null;
$referer	= $_SERVER["HTTP_REFERER"];
$name		= (!empty($_REQUEST["name"]))?$_REQUEST["name"]:null;

$user_session = strtoupper(session_id());
$DB0 		= new myDB;
$DB 		= new myDB;
$DB1 		= new myDB;
$DB2 		= new myDB;
$DB3 		= new myDB;
$DB4 		= new myDB;
$DB5 		= new myDB;

$id_user_created=1;
$qty=1;
switch($action) {
	case "add":			
						$DB0->query("select  b.id_vendor FROM contacts a,contact_master b WHERE a.mcontact_id=b.contact_id and a.contact_id=".$pid);				
						$rs = $DB0->fetch_array($DB0->res);
						$id_vendor=$rs['id_vendor'];
						//$_SESSION['cart'][$pid][$tsize][$color] += $qty;

						$strSQL	= ("INSERT INTO cart_items (						
							sessionid,
							contact_id,							
							date_created,
							date_updated,id_user_created,id_user_updated,id_vendor) VALUES (
							'".$user_session."',
							".$pid.",
							now(),now(),'".$id_user_created."','".$id_user_created."',".$id_vendor.")");
						$DB2->query($strSQL);
		
		break;

   case "customadd":			
										
   
						//$_SESSION['cart'][$pid][$tsize][$color] += $qty;

						$strSQL	= ("INSERT INTO cart_items (						
							sessionid,
							contact_id,							
							date_created,
							date_updated,id_user_created,id_user_updated,cart_name,id_vendor) VALUES (
							'".$user_session."',0,							
							now(),now(),'".$id_user_created."','".$id_user_created."','".$name."',".$id_vendor.")");
						$DB2->query($strSQL);
		
		break;

	case "update":
		$item_num = $_POST["item"];
		foreach ($item_num as $pid => $val) {
			if (is_array($_SESSION['cart'][$pid])) {
				foreach($_SESSION['cart'][$pid] as $size => $val2) {
					if (!is_array($val2)) {
						$_SESSION['cart'][$pid][$size] = $val;
					} elseif (count($val2)==1) {
						list($color,)=each($val2);
						$_SESSION['cart'][$pid][$size][$color] = $val;
					}
				}
			} else {
				$_SESSION['cart'][$pid] = $val;
			}
			//if($val>0)
			$TotalAmount=(int)$val*$UnitPrice;
			/*else
			$TotalAmount=0;*/

			$strSQL	= "UPDATE CartItems SET TotalQuantity=".$val.",UnitPrice=".$UnitPrice.",TotalAmount=".$TotalAmount."  WHERE ProductID= ".$pid." AND CustomerID=	".$uid;
			$DB->query($strSQL);

		}
		break;

	case "remove":
		
			$strSQL	= "DELETE  FROM cart_items WHERE id_cart= ".$pid;
			$DB4->query($strSQL);
		
		break;

	case "empty":
		unset($_SESSION['cart']);
		if (!empty($_SESSION['personalized'])) {
			unset($_SESSION['personalized']);
		}
		if (!empty($_SESSION['emblem'])) {
			unset($_SESSION['emblem']);
		}
		if($uid>0)
		{
			$strSQL	= "DELETE  FROM CartItems WHERE CustomerID=	".$uid;
			$DB5->query($strSQL);
		}

		break;

	case "removeone":

		if ($options) {
			foreach ($options as $opt => $val) {
				$$opt = $val;
			}
			if ($size) {
				if ($color) {
					$_SESSION['cart'][$pid][$size][$color] -= 1;
					if ($_SESSION['cart'][$pid][$size][$color]<1)
						unset($_SESSION['cart'][$pid][$size][$color]);
				} else {
				
					$_SESSION['cart'][$pid][$size] -= 1;
					if ($_SESSION['cart'][$pid][$size]<1)
						unset($_SESSION['cart'][$pid][$size]);
						
						
					$_SESSION['personalized'][$pid][$size] -= 1;
					if ($_SESSION['personalized'][$pid][$size]<1)
						unset($_SESSION['personalized'][$pid][$size]);	
				
				}

			} 
			else {
				if ($color) {
					$_SESSION['cart'][$pid]['One Size'][$color] -= 1;
				} else {
					$_SESSION['cart'][$pid]['One Size'] -= 1;
				}
			}
		}
		cleanArr($_SESSION['cart']);
		break;

	case "addone":

		if ($options) {
			foreach ($options as $opt => $val) {
				$$opt = $val;
			}
			if ($size) {
				if ($color) {
					$_SESSION['cart'][$pid][$size][$color] += 1;
				} else {
					$_SESSION['cart'][$pid][$size] += 1;
				}
			} else {
				if ($color) {
					$_SESSION['cart'][$pid]['One Size'][$color] += 1;
				} else {
					$_SESSION['cart'][$pid]['One Size'] += 1;
				}
			}
		}
		cleanArr($_SESSION['cart']);
		cleanArr($_SESSION['personalized']);
		break;
		
	case "freeItem":
		if($options){
			$_SESSION['cart'][$pid][''] += $qty;
		}
		break;
}

//$cartItemCount = $_SESSION['cart'];
//$cartItemCount = multiDimArrSum($_SESSION['cart']);

if ($option) {
	echo "<script>location.replace('".$referer."')</script>";
} else {
	echo "1";
	//echo "{\"cartItems\": [{\"id\":\"".$pid."\", \"action\":\"".$action."\", \"qty\":\"".$qty."\", \"cartItemCount\":\"""\" }]}";
	//echo "{\"products\": [{	\"pdesc\":\"GolfBuddy GPS\", \"prate\":\"205.00\", \"itemCount\":\"3\" }]}";
}
?>