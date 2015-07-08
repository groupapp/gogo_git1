<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action			= $_REQUEST["action"];
	$ReturnPolicyID	= $_REQUEST["id"];
	$ReturnPolicyID2= $_REQUEST["ReturnPolicyID"];
	$PriorityNo		= $_POST["PriorityNo"];
	$PriorityNo2	= $_POST["PriorityNo_add"];
	$ReturnPolicy	= $_POST["ReturnPolicy"];
	$ReturnPolicy2	= $_POST["ReturnPolicy_add"];
	$Submit3		= $_POST["Submit3"];
	
	if ($action == "del") {
		$DB->query("DELETE FROM ReturnPolicy WHERE ReturnPolicyID=".$ReturnPolicyID);
	} 
	elseif($action == "add"){
		$strSQL = ("INSERT INTO ReturnPolicy (PriorityNo, ReturnPolicy)
					VALUES(
						\"".$PriorityNo2."\",
						\"".$ReturnPolicy2."\"
					)");

		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	elseif ($action == "update") {
	
		$strSQL 	= ("UPDATE ReturnPolicy SET
				PriorityNo		= \"".$PriorityNo."\",
				ReturnPolicy	= \"".$ReturnPolicy."\"
				WHERE ReturnPolicyID=".$ReturnPolicyID2);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	
	$DB->close();
	echo "<script>location.replace('Manage_ReturnPolicy.php');</script>";
?>