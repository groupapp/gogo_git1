<?php
	include "../include/function.php";
	$DB = new myDB;
	
	
	$aid		= $_GET["aid"];
	$act		= $_GET["act"];		
	$Display_ActiveItems_By	= $_GET["Display_ActiveItems_By"];
	$Display_ActiveItems_In	= $_GET["Display_ActiveItems_In"];
	$pp	= $_GET["pp"];
	$ppAI	= $_GET["ppAI"];
	$action		= $_GET["action"];
	$colorid		= $_GET["colorid"];
	$delcolorid= $_GET["delcolorid"];
	//echo $action;
	//exit;
	if($action == "del"){
		$strSQL = ("DELETE FROM ProductColors Where ProductColor=".$delcolorid);		
		$DB->query($strSQL);
	}
	elseif($action == "add"){
		$strSQL = ("INSERT INTO ProductColors (ColorID, ProductID)
					VALUES(
						\"".$colorid."\",
						\"".$aid."\"
					)");

		$DB->query($strSQL);
	}
	
	
	$DB->close();
	echo "<script>location.replace('Manage_Products.php?act=".$act."&aid=".$aid."&Display_ActiveItems_By=".$Display_ActiveItems_By."&Display_ActiveItems_In=".$Display_ActiveItems_In."&pp=".$pp."&ppAI=".$ppAI."&ppII=".$ppII."');</script>";
?>