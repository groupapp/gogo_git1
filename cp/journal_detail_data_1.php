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
		$insert_query = "INSERT INTO `journal_detail` (`journal_d_seq`,`journal_id`,`account_id`,`account_description`,`debit`,`credit`,`add_date`,`update_date`,`user_id`,`save_chk`,`journal_token`) VALUES ";
		if ($_GET["journal_d_seq"]!='')
		$insert_query .= "(".$_GET['journal_d_seq'].",";
		else
		$insert_query .= "(0,";
		if ($_GET["journal_id"]!='')
		$insert_query .= $_GET['journal_id'].",";
		else
		$insert_query .= "0,";
		$insert_query .= "'".$_GET['account_id']."',";
		$insert_query .= "'".$_GET['account_description']."'";
		if ($_GET["debit"]!='')
		$insert_query .= ",".$_GET['debit'];
		else
		$insert_query .= ",0.00";
		if ($_GET["credit"]!='')
		$insert_query .= ",".$_GET['credit'].",";
		else
		$insert_query .= ",0.00,";
		$insert_query .="NOW(),";
		$insert_query .="NOW(),";
		$insert_query .="'".$_GET['user_id']."',";
		$insert_query .="'N',";	
		$insert_query .= "'".$_GET['journal_token']."')";
		$result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);  
		echo $result;//
	}
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `journal_detail` WHERE `journal_token`='".$_GET['journal_token']."' and account_id='".$_GET['account_id']."'";	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
	else if (isset($_GET['update']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");
		
		$update_query = "UPDATE `journal_detail` SET ";
		$update_query .="`journal_id`=".$_GET['journal_id'].",";
		$update_query .="`account_id`='".$_GET['account_id']."',";
		$update_query .="`account_description`='".$_GET['account_description']."',";
		$update_query .="`debit`=".$_GET['debit'].",";
		$update_query .="`credit`=".$_GET['credit'].",";
		$update_query .="`add_date`=NOW(),";
		$update_query .="`update_date`=NOW(),";
		$update_query .="`user_id`='".$_GET['user_id']."',";
		$update_query .="`save_chk`='N'";	
		$update_query .=" WHERE `journal_d_seq`=".$_GET['journal_d_seq'];		  
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	
	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT journal_d_seq FROM `journal_detail` Order by journal_d_seq DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'journal_d_seq' => $row['journal_d_seq']
			  );
		}
		 
		echo json_encode($lastid);
	}
	
	

	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM `journal_detail` where `journal_id`='".$_GET['journal_id']."'";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'journal_d_seq' => $row['journal_d_seq'],
				'journal_id' => $row['journal_id'],
				'account_id' => $row['account_id'],
				'account_description' => $row['account_description'],
				'debit' => $row['debit'],
				'credit' => $row['credit'],
				'journal_token' => $row['journal_token'],
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($employees);
		//echo json_encode($data);
	}
?>