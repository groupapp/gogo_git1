<?php
	#Include the connect.php file
	include('connect.php');
	include('./contents/function.php');
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}
	
	if (isset($_GET['customer_transaction']))
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		
		$query = "SELECT SQL_CALC_FOUND_ROWS *";
		$query .= " FROM garment_so";
		$query .= " WHERE open_chk='OPEN' and soto_id ='".$_GET['soto_id']."'";
		
		$result = mysql_query($query) or die("SQL so list 1: " . mysql_error());
		
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'so_date' => $row['so_date'],
				'garment_so_id' => $row['garment_so_id'],
				'c_garment_so_id' => $row['c_garment_so_id'],
				'cancel_date' => $row['cancel_date'],				
				'total_amount' => $row['total_amount'],
				'total_balance_amount' => $row['total_balance_amount'],
				);
		}
		/*$data[] = array(
		   'colname' => $colname,
		   'Rows' => $employees
		);*/ 
		echo json_encode($employees);
	}
	else if (isset($_GET['customer_transaction_po']))
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		
		$query = "SELECT SQL_CALC_FOUND_ROWS *";
		$query .= " FROM garment_po";
		$query .= " WHERE open_chk='OPEN' and poto_id ='".$_GET['soto_id']."'";
		
		$result = mysql_query($query) or die("SQL so list 1: " . mysql_error());
		
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'po_date' => $row['po_date'],
				'garment_po_id' => $row['garment_po_id'],
				'cancel_date' => $row['cancel_date'],				
				'total_amount' => $row['total_amount'],
				'total_balance_amount' => $row['total_balance_amount'],
				);
		}
		/*$data[] = array(
		   'colname' => $colname,
		   'Rows' => $employees
		);*/ 
		echo json_encode($employees);
	}
	
	
?>