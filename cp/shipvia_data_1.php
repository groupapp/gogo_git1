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
	if (isset($_GET['insert']))
	{
		// INSERT COMMAND 
		$insert_query = "INSERT INTO shipvia (`shipvia_id`,`description`) VALUES (".$_GET['shipvia_id'].",'".$_GET['description']."')";
		$result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);  
		echo $result;
	}

	else if (isset($_GET['update']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		$update_query = "UPDATE `shipvia` SET `description`='".$_GET['description']."' WHERE `shipvia_id`=".$_GET['shipvia_id'];		  
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM shipvia WHERE `shipvia_id`=".$_GET['shipvia_id'];	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT shipvia_id FROM shipvia Order by shipvia_id DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'shipvia_id' => $row['shipvia_id']
			  );
		}
		 
		echo json_encode($lastid);
	}
	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM shipvia ";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'shipvia_id' => $row['shipvia_id'],
				'description' => $row['description']				
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($employees);
	}
?>