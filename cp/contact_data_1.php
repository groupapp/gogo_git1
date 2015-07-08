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
		$insert_query = "INSERT INTO `customer_contact` (`contact_id`,`customer_id`,`name`,`title`,`office`,`ext`,`cell`,`fax`,`email`,`user_id`,`add_date`,`update_date`,`save_chk`,`customer_token`) VALUES (".$_GET['contact_id'].",'".$_GET['customer_id']."','".$_GET['name']."','".$_GET['title']."','".$_GET['office']."','".$_GET['ext']."','".$_GET['cell']."','".$_GET['fax']."','".$_GET['email']."','".$_GET['user_id']."',NOW(),NOW(),'N','".$_GET['customer_token']."')";
		$result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);  
		echo $result;
	}

	else if (isset($_GET['update']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		$update_query = "UPDATE `customer_contact` SET ";
		$update_query .="`name`='".$_GET['name']."',";
		$update_query .="`title`='".$_GET['title']."',";
		$update_query .="`office`='".$_GET['office']."',";
		$update_query .="`ext`='".$_GET['ext']."',";
		$update_query .="`cell`='".$_GET['cell']."',";
		$update_query .="`fax`='".$_GET['fax']."',";
		$update_query .="`email`='".$_GET['email']."',";
		$update_query .="`update_date`=NOW(),";
		$update_query .="`user_id`='".$_GET['user_id']."',";
		$update_query .="`save_chk`='N'";
		$update_query .=" WHERE `contact_id`=".$_GET['contact_id'];		  
		  
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 mysql_close($connect);
		 echo $result;
	}
	else if (isset($_POST['save']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		$update_query = "UPDATE `customer_contact` SET ";
		if ($_POST['customer_id']=="")
		$update_query .="`customer_id`='".$_POST['customer_id']."',";
		$update_query .="`save_chk`='Y'";
		if ($_POST['customer_id']!="")
		$update_query .=" WHERE `customer_id`='".$_POST['customer_id']."'" ;
		else
		$update_query .=" WHERE `user_id`='".$_POST['user_id']."' and `customer_token`='".$_POST['customer_token']."'" ;
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 mysql_close($connect);
		 echo $result;
	}
	else if (isset($_POST['cancel']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		$delete_query = "DELETE FROM `customer_contact` WHERE `user_id`='".$_POST['user_id']."' and `customer_token`='".$_POST['customer_token']."'" ;	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `customer_contact` WHERE `contact_id`=".$_GET['contact_id'] ;	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
	
	
	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT contact_id FROM `customer_contact` Order by contact_id DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'contact_id' => $row['contact_id']
			  );
		}
		 
		echo json_encode($lastid);
	}
	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		if($_GET['customer_id']=="")
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM customer_contact where customer_token='".$_GET['customer_token']."'";
		else
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM customer_contact where customer_id='".$_GET['customer_id']."'";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'contact_id' => $row['contact_id'],
				'customer_id' => $row['customer_id'],
				'name' => $row['name'],
				'title' => $row['title'],
				'office' => $row['office'],
				'ext' => $row['ext'],
				'cell' => $row['cell'],
				'fax' => $row['fax'],
				'email' => $row['email']
								
			  );
		}
		/* 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);*/
		echo json_encode($employees);
	}
?>