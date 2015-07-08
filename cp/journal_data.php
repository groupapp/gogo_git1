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
	if (isset($_POST['insert']))
	{
		// INSERT COMMAND 
		$insert_query = "INSERT INTO `journal` (`journal_id`,`date`,`description`,`add_date`,`update_date`,`user_id`,`journal_token`) VALUES (".$_POST['journal_id'].",str_to_date('".$_POST['journaldate']."','%m/%d/%Y'),'".$_POST['journaldescription']."',NOW(),NOW(),'".$_POST['user_id']."','".$_POST['journal_token']."')";
		
		$result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);  
		echo $result;
	}
	else if (isset($_POST['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `journal` WHERE `journal_seq`=".$_POST['journal_seq'];	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		$delete_query = "DELETE FROM `journal_detail` WHERE `journal_id`=".$_POST['journal_id'];	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());

		mysql_close($connect);
		echo $result;
	}
	else if (isset($_POST['update']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");
		
		$update_query = "UPDATE `journal` SET ";
		$update_query .="`journal_id`=".$_POST['journal_id'].",";
		$update_query .="`description`='".$_POST['journaldescription']."',";
		$update_query .="`date`=str_to_date('".$_POST['journaldate']."','%m/%d/%Y'),";
		$update_query .="`update_date`=NOW(),";
		$update_query .="`user_id`='".$_POST['user_id']."',";
		$update_query .="`save_chk`='N'";	
		$update_query .=" WHERE `journal_seq`=".$_POST['journal_seq'];		  
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT journal_id FROM `journal` Order by journal_id DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'journal_id' => $row['journal_id']
			  );
		}
		 
		echo json_encode($lastid);
	}
	else if (isset($_POST['save']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		$update_query = "UPDATE `journal_detail` SET ";
		$update_query .="`save_chk`='Y',";
		$update_query .="`journal_id`='".$_POST['journal_id']."'";
		$update_query .=" WHERE `user_id`='".$_POST['user_id']."' and `journal_token`='".$_POST['journal_token']."'" ;		  
		  
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
		$delete_query = "DELETE FROM `journal_detail` WHERE `user_id`='".$_POST['user_id']."' and save_chk='N' and `journal_token`='".$_POST['journal_token']."'";
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
	
	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM `journal`";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'journal_seq' => $row['journal_seq'],
				'journal_id' => $row['journal_id'],
				'description' => $row['description'],
				'date' => $row['date'],
				'journal_token' => $row['journal_token'],
				
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
?>