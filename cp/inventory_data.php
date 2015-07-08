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
	
	if (isset($_GET['garment_inventory_po']))
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$cquery = "SELECT  * FROM size1 where size_id=".$_GET['size_id'];
		$cresult = mysql_query($cquery) or die("SQL Error get size name: " . mysql_error());
		while ($crow = mysql_fetch_array($cresult, MYSQL_ASSOC)) {
			$colname[] = array(
				'size_name' => $crow['size_name'],
				);
		}
		
		$query = "SELECT SQL_CALC_FOUND_ROWS a.date, a.inventory_type, b.type_name, a.id_no,";
		$query .= " GROUP_CONCAT( IF( size_no =  's1', qty, NULL ) ) AS s1,";
		$query .= " GROUP_CONCAT( IF( size_no =  's2', qty, NULL ) ) AS s2,";
		$query .= " GROUP_CONCAT( IF( size_no =  's3', qty, NULL ) ) AS s3,";
		$query .= " GROUP_CONCAT( IF( size_no =  's4', qty, NULL ) ) AS s4,";
		$query .= " GROUP_CONCAT( IF( size_no =  's5', qty, NULL ) ) AS s5,";
		$query .= " GROUP_CONCAT( IF( size_no =  's6', qty, NULL ) ) AS s6,";
		$query .= " GROUP_CONCAT( IF( size_no =  's7', qty, NULL ) ) AS s7,";
		$query .= " GROUP_CONCAT( IF( size_no =  's8', qty, NULL ) ) AS s8,";
		$query .= " GROUP_CONCAT( IF( size_no =  's9', qty, NULL ) ) AS s9,";
		$query .= " GROUP_CONCAT( IF( size_no =  's10', qty, NULL ) ) AS s10,";
		$query .= " GROUP_CONCAT( IF( size_no =  's11', qty, NULL ) ) AS s11,";
		$query .= " GROUP_CONCAT( IF( size_no =  's12', qty, NULL ) ) AS s12,";	
		$query .= " SUM( qty ) AS total";
		$query .= " FROM garment_history a, inventory_type b";
		$query .= " WHERE a.inventory_type = b.inventory_type_id";
		$query .= " AND a.inventory_type =1";
		$query .= " AND a.garment_id ='".$_GET['garment_id']."'";
		$query .= " AND a.garment_color_id =".$_GET['garment_color_id'];
		$query .= " AND a.location_id ='".$_GET['location_id']."'";
		$query .= " GROUP BY a.date, a.inventory_type";
		
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		$employees[] = array(
			'date' => '',
				'inventory_type' => 0,
				'type_name' => 'Balance Forward',
				'id_no' => '',				
				's1' => 0,
				's2' => 0,
				's3' => 0,
				's4' => 0,
				's5' => 0,
				's6' => 0,
				's7' => 0,
				's8' => 0,
				's9' => 0,
				's10' => 0,
				's11' => 0,
				's12' => 0,
				'total' => 0,
		);
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'date' => $row['date'],
				'inventory_type' => $row['inventory_type'],
				'type_name' => $row['type_name'],
				'id_no' => $row['id_no'],				
				's1' => $row['s1'],
				's2' => $row['s2'],
				's3' => $row['s3'],
				's4' => $row['s4'],
				's5' => $row['s5'],
				's6' => $row['s6'],
				's7' => $row['s7'],
				's8' => $row['s8'],
				's9' => $row['s9'],
				's10' => $row['s10'],
				's11' => $row['s11'],
				's12' => $row['s12'],
				'total' => $row['total'],
			  );
		}
		$data[] = array(
		   'colname' => $colname,
		   'Rows' => $employees
		); 
		echo json_encode($data);
	}
	if (isset($_GET['garment_inventory_so']))
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$cquery = "SELECT  * FROM size1 where size_id=".$_GET['size_id'];
		$cresult = mysql_query($cquery) or die("SQL Error get size name: " . mysql_error());
		while ($crow = mysql_fetch_array($cresult, MYSQL_ASSOC)) {
			$colname[] = array(
				'size_name' => $crow['size_name'],
				);
		}
		
		$query = "SELECT SQL_CALC_FOUND_ROWS a.date, a.inventory_type, b.type_name, a.id_no,";
		$query .= " GROUP_CONCAT( IF( size_no =  's1', qty, NULL ) ) AS s1,";
		$query .= " GROUP_CONCAT( IF( size_no =  's2', qty, NULL ) ) AS s2,";
		$query .= " GROUP_CONCAT( IF( size_no =  's3', qty, NULL ) ) AS s3,";
		$query .= " GROUP_CONCAT( IF( size_no =  's4', qty, NULL ) ) AS s4,";
		$query .= " GROUP_CONCAT( IF( size_no =  's5', qty, NULL ) ) AS s5,";
		$query .= " GROUP_CONCAT( IF( size_no =  's6', qty, NULL ) ) AS s6,";
		$query .= " GROUP_CONCAT( IF( size_no =  's7', qty, NULL ) ) AS s7,";
		$query .= " GROUP_CONCAT( IF( size_no =  's8', qty, NULL ) ) AS s8,";
		$query .= " GROUP_CONCAT( IF( size_no =  's9', qty, NULL ) ) AS s9,";
		$query .= " GROUP_CONCAT( IF( size_no =  's10', qty, NULL ) ) AS s10,";
		$query .= " GROUP_CONCAT( IF( size_no =  's11', qty, NULL ) ) AS s11,";
		$query .= " GROUP_CONCAT( IF( size_no =  's12', qty, NULL ) ) AS s12,";	
		$query .= " SUM( qty ) AS total";
		$query .= " FROM garment_history a, inventory_type b";
		$query .= " WHERE a.inventory_type = b.inventory_type_id";
		$query .= " AND a.inventory_type =3";
		$query .= " AND a.garment_id ='".$_GET['garment_id']."'";
		$query .= " AND a.garment_color_id =".$_GET['garment_color_id'];
		$query .= " AND a.location_id ='".$_GET['location_id']."'";
		$query .= " GROUP BY a.date, a.inventory_type";
		
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		$employees[] = array(
			'date' => '',
				'inventory_type' => 0,
				'type_name' => 'Balance Forward',
				'id_no' => '',				
				's1' => 0,
				's2' => 0,
				's3' => 0,
				's4' => 0,
				's5' => 0,
				's6' => 0,
				's7' => 0,
				's8' => 0,
				's9' => 0,
				's10' => 0,
				's11' => 0,
				's12' => 0,
				'total' => 0,
		);
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'date' => $row['date'],
				'inventory_type' => $row['inventory_type'],
				'type_name' => $row['type_name'],
				'id_no' => $row['id_no'],				
				's1' => $row['s1'],
				's2' => $row['s2'],
				's3' => $row['s3'],
				's4' => $row['s4'],
				's5' => $row['s5'],
				's6' => $row['s6'],
				's7' => $row['s7'],
				's8' => $row['s8'],
				's9' => $row['s9'],
				's10' => $row['s10'],
				's11' => $row['s11'],
				's12' => $row['s12'],
				'total' => $row['total'],
			  );
		}
		$data[] = array(
		   'colname' => $colname,
		   'Rows' => $employees
		); 
		echo json_encode($data);
	}
	
	else if (isset($_GET['garment_inventory_detail']))
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$cquery = "SELECT  * FROM size1 where size_id=".$_GET['size_id'];
		$cresult = mysql_query($cquery) or die("SQL Error get size name: " . mysql_error());
		while ($crow = mysql_fetch_array($cresult, MYSQL_ASSOC)) {
			$colname[] = array(
				'size_name' => $crow['size_name'],
				);
		}
		
		$query = "SELECT SQL_CALC_FOUND_ROWS a.date, a.inventory_type, b.type_name, a.id_no,";
		$query .= " GROUP_CONCAT( IF( size_no =  's1', qty, NULL ) ) AS s1,";
		$query .= " GROUP_CONCAT( IF( size_no =  's2', qty, NULL ) ) AS s2,";
		$query .= " GROUP_CONCAT( IF( size_no =  's3', qty, NULL ) ) AS s3,";
		$query .= " GROUP_CONCAT( IF( size_no =  's4', qty, NULL ) ) AS s4,";
		$query .= " GROUP_CONCAT( IF( size_no =  's5', qty, NULL ) ) AS s5,";
		$query .= " GROUP_CONCAT( IF( size_no =  's6', qty, NULL ) ) AS s6,";
		$query .= " GROUP_CONCAT( IF( size_no =  's7', qty, NULL ) ) AS s7,";
		$query .= " GROUP_CONCAT( IF( size_no =  's8', qty, NULL ) ) AS s8,";
		$query .= " GROUP_CONCAT( IF( size_no =  's9', qty, NULL ) ) AS s9,";
		$query .= " GROUP_CONCAT( IF( size_no =  's10', qty, NULL ) ) AS s10,";
		$query .= " GROUP_CONCAT( IF( size_no =  's11', qty, NULL ) ) AS s11,";
		$query .= " GROUP_CONCAT( IF( size_no =  's12', qty, NULL ) ) AS s12,";	
		$query .= " SUM( qty ) AS total";
		$query .= " FROM garment_history a, inventory_type b";
		$query .= " WHERE a.inventory_type = b.inventory_type_id";
		$query .= " AND a.garment_id ='".$_GET['garment_id']."'";
		$query .= " AND a.garment_color_id =".$_GET['garment_color_id'];
		$query .= " AND a.location_id ='".$_GET['location_id']."'";
		$query .= " GROUP BY a.date, a.inventory_type";
		
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		$employees[] = array(
			'date' => '',
				'inventory_type' => 0,
				'type_name' => 'Balance Forward',
				'id_no' => '',				
				's1' => 0,
				's2' => 0,
				's3' => 0,
				's4' => 0,
				's5' => 0,
				's6' => 0,
				's7' => 0,
				's8' => 0,
				's9' => 0,
				's10' => 0,
				's11' => 0,
				's12' => 0,
				'total' => 0,
		);
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'date' => $row['date'],
				'inventory_type' => $row['inventory_type'],
				'type_name' => $row['type_name'],
				'id_no' => $row['id_no'],				
				's1' => $row['s1'],
				's2' => $row['s2'],
				's3' => $row['s3'],
				's4' => $row['s4'],
				's5' => $row['s5'],
				's6' => $row['s6'],
				's7' => $row['s7'],
				's8' => $row['s8'],
				's9' => $row['s9'],
				's10' => $row['s10'],
				's11' => $row['s11'],
				's12' => $row['s12'],
				'total' => $row['total'],
			  );
		}
		$data[] = array(
		   'colname' => $colname,
		   'Rows' => $employees
		); 
		echo json_encode($data);
	}
	
	
?>