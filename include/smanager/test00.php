<?php
	include "function_test.php";
	require_once("../lib/CountryCodes.php");
	$DB = new myDB;
	
	$DB->query("SELECT *FROM Customers1");
	echo $DB->rows;
	echo "<br />";

	echo "test00<br/>";
	$cnt = 0;
	$countryCnt = 0;
	foreach ($country_list as $key=>$val){
		echo $key." ".$val."<br/>";
		$shortVal = strtolower(substr($val,0,8));
		echo $shortVal." shortVal?<br/>";
		$strSQL = "SELECT * FROM Customers1 WHERE MailingCountry LIKE '%".$shortVal."%'";
		$DB->query($strSQL);
		echo $strSQL."<br/>";
		$innerCnt = 0;
		while ($data = $DB->fetch_array($DB->res)){
			echo "in the while<br/>";
			$updateCnt = $data["UpdateCnt"]+1;
			$DB2 = new myDB;
			$strSQL2 	= ("UPDATE Customers1 SET
					MailingCountry	= \"".$key."\",
					UpdateCnt		= \"".$updateCnt."\"
					WHERE CustomerID = ".$data["CustomerID"]);
			echo $strSQL2."<br/>";
				$DB2->query($strSQL2);
			$cnt++;
			$innerCnt++;
		}
		echo $val.": ".$innerCnt."<br/>";
		echo "<br/>";
		$countryCnt++;
	}
	echo "Total Country: ".$countryCnt;
	echo "<br/>Update ".$cnt;
	echo "<br/>";
	echo "<br/>";
	
	$cnt = 0;
	$usStateCnt = 0;
	foreach ($us_states as $key2=>$val2){
		echo $key2." ".$val2."<br/>";
		$shortVal2 = strtolower(substr($val2,0,7));
		$strSQL = "SELECT * FROM Customers1 WHERE MailingCountry='US' && MailingStateOrProvince LIKE '%".$shortVal2."%'";
		$DB->query($strSQL);
		echo $strSQL."<br/>";
		$innerCnt = 0;
		while ($data = $DB->fetch_array($DB->res)){
			echo "in the while<br/>";
			$updateCnt = $data["UpdateCnt"]+1;
			$DB2 = new myDB;
			$strSQL2 	= ("UPDATE Customers1 SET
					MailingStateOrProvince	= \"".$key2."\",
					UpdateCnt		= \"".$updateCnt."\"
					WHERE CustomerID = ".$data["CustomerID"]);
			echo $strSQL2."<br/>";
			$DB2->query($strSQL2);
			$cnt++;
			$innerCnt++;
		}
		echo $val2.": ".$innerCnt."<br/>";
		echo "<br/>";
		$usStateCnt++;
	}
	echo "<br/>State: ".$usStateCnt;
	echo "<br/>Total Update: ".$cnt;
	echo "<br/>";
	echo "<br/>";
	
	$cnt = 0;
	$caStateCnt = 0;
	foreach ($canadian_states as $key3=>$val3){
		echo $key3." ".$val3."<br/>";
		$shortVal3 = strtolower(substr($val3,0,6));
		$strSQL = "SELECT * FROM Customers1 WHERE MailingCountry='CA' && MailingStateOrProvince LIKE '".$shortVal3."%'";
		$DB->query($strSQL);
		echo $strSQL."<br/>";
		$innerCnt = 0;
		while ($data = $DB->fetch_array($DB->res)){
			echo "in the while<br/>";
			$updateCnt = $data["UpdateCnt"]+1;
			$DB2 = new myDB;
			$strSQL2 	= ("UPDATE Customers1 SET
					MailingStateOrProvince	= \"".$key3."\",
					UpdateCnt		= \"".$updateCnt."\"
					WHERE CustomerID = ".$data["CustomerID"]);
			echo $strSQL2."<br/>";
			$DB2->query($strSQL2);
			$cnt++;
			$innerCnt++;
		}
		echo $val3.": ".$innerCnt."<br/>";
		echo "<br/>";
		$caStateCnt++;
	}
	echo "<br/>State: ".$caStateCnt;
	echo "<br/>Total Update: ".$cnt;
	echo "<br/>";
	echo "<br/>";
	
	$cnt = 0;
	$mxStateCnt = 0;
	foreach ($mexican_states as $key4=>$val4){
		echo $key4." ".$val4."<br/>";
		$shortVal4 = strtolower(substr($val4,-8));
		$strSQL = "SELECT * FROM Customers1 WHERE MailingCountry='MX' && MailingStateOrProvince LIKE '%".$shortVal4."%'";
		$DB->query($strSQL);
		echo $strSQL."<br/>";
		$innerCnt = 0;
		while ($data = $DB->fetch_array($DB->res)){
			echo "in the while<br/>";
			$updateCnt = $data["UpdateCnt"]+1;
			$DB2 = new myDB;
			$strSQL2 	= ("UPDATE Customers1 SET
					MailingStateOrProvince	= \"".$key4."\",
					UpdateCnt		= \"".$updateCnt."\"
					WHERE CustomerID = ".$data["CustomerID"]);
			echo $strSQL2."<br/>";
			$DB2->query($strSQL2);
			$cnt++;
			$innerCnt++;
		}
		echo $val4.": ".$innerCnt."<br/>";
		echo "<br/>";
		$mxStateCnt++;
	}
	echo "<br/>State: ".$mxStateCnt;
	echo "<br/>Total Update: ".$cnt;
	echo "<br/>";
	echo "<br/>";
?>