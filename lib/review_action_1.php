<?php
	include "../include/function.php";
	$DB = new myDB;

	$pid		= $_POST["pid"];
	$action		= $_POST["action"];
	$memberID	= $_COOKIE["userID"];
	$rated		= $_POST["rated"];
	$recommend	= $_POST["recommend"];
	$review		= $_POST["review"];
	
//	echo "review action<br/>";
//	exit;
	
	if($action == "add"){
		$strSQL = ("INSERT INTO RatingReview(member_id, ProductID, rating, recommend, comment, is_active)
				VALUES(");
		if($memberID!=null){
			$strSQL .= "\"$memberID\",";
		}else{
			$strSQL .= "\"Guest\",";
		}
		$strSQL .=("\"".$pid."\",
					\"".$rated."\",
					\"".$recommend."\",
					\"".$review."\",
					\"Y\"
				)");
//		echo $strSQL;
//		exit;
		$DB->query($strSQL);
	}
	
	echo "<script>location.replace('/?pid=".$pid."');</script>";
?>