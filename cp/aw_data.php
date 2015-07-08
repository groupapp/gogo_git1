<?php
session_start();
include_once dirname(__FILE__) . '/include/function.php';
//$mode		= (!empty($_POST['mode']))?$_POST['mode']:null;

$DB = new myDB;
$cnt = 0;
$json ="";
	
	$strSQL = "SELECT *	FROM `account`";	
	$DB->query($strSQL);
	//$data = $DB->fetch_array($DB->res);
	//print_r($data);
	//echo $strSQL;
	//$json = '{"list": [';
	$json = '[';
	while ($data = $DB->fetch_array($DB->res)) {
		if ($cnt>0) $json .=",";
		$json .= '{"type":"'.$data["type"].'", "account_id":"'.$data["account_id"].'"}';
		$cnt++;
	}
	$json .= ']';
	//$json .= ']}';
	echo $json;
?>