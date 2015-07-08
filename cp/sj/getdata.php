<?php
#Include the connect.php file
include('connect.php');
#Connect to the database
//connection String
$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False){
	print "can't find $database";
}


/*
$pagenum = $_GET['pagenum'];
$pagesize = $_GET['pagesize'];
$start = $pagenum * $pagesize;
*/

$query = "SELECT *";
$query .= "FROM item  ";






$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
/*
$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
$rows = mysql_query($sql);
$rows = mysql_fetch_assoc($rows);
$total_rows = $rows['found_rows'];
$old_total_qty=0;
$old_total_amount=0;
*/
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	/*	
	$employees[] = array(
		'field_name' => $row['field_name'],
		'id_item' => $row['id_item'],
		);*/
	
	$query1 = "SELECT *";
	$query1 .= "FROM data  where id_item=".$row['id_item'];
	
	$result1 = mysql_query($query1) or die("SQL Error 1: " . mysql_error());
	
	while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
		
		$employees1[] = array(
			'varchr_value'=>$row1['varchr_value'],
			'data_seq'=>$row1['data_seq'],
			);
	}
	
}

$data[] = array(
	'Rows' => $employees1
	);
echo json_encode($employees1);

?>