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
		if($_GET['customer_id_chk']=='Y')
		$insert_query = "INSERT INTO `location` (`location_seq`,`company_id`,`name`,`customer_id_chk`,`location_id`,`address1`,`address2`,`address3`,`country`,`tel`,`user_id`,`add_date`,`update_date`,`save_chk`,`customer_token`) VALUES (".$_GET['location_seq'].",'".$_GET['company_id']."','".$_GET['name']."','".$_GET['customer_id_chk']."','".$_GET['location_id']."','".$_GET['address1']."','".$_GET['address2']."','".$_GET['address3']."','".$_GET['country']."','".$_GET['tel']."','".$_GET['user_id']."',NOW(),NOW(),'N','".$_GET['customer_token']."')";
		
		else
		$insert_query = "INSERT INTO `location` (`location_seq`,`company_id`,`name`,`location_id`,`address1`,`address2`,`address3`,`country`,`tel`,`user_id`,`add_date`,`update_date`,`save_chk`,`customer_token`) VALUES (".$_GET['location_seq'].",'".$_GET['company_id']."','".$_GET['name']."','".$_GET['location_id']."','".$_GET['address1']."','".$_GET['address2']."','".$_GET['address3']."','".$_GET['country']."','".$_GET['tel']."','".$_GET['user_id']."',NOW(),NOW(),'N','".$_GET['customer_token']."')";
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
		$update_query = "UPDATE `location` SET ";
		$update_query .="`company_id`='".$_GET['company_id']."',";
		$update_query .="`name`='".$_GET['name']."',";
		$update_query .="`location_id`='".$_GET['location_id']."',";
		$update_query .="`address1`='".$_GET['address1']."',";
		$update_query .="`address2`='".$_GET['address2']."',";
		$update_query .="`address3`='".$_GET['address3']."',";
		$update_query .="`country`='".$_GET['country']."',";
		$update_query .="`tel`='".$_GET['tel']."',";
		$update_query .="`update_date`=NOW(),";
		$update_query .="`user_id`='".$_GET['user_id']."',";
		$update_query .="`save_chk`='N'";
		$update_query .=" WHERE `location_seq`=".$_GET['location_seq'];		  
		  
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
		$update_query = "UPDATE `location` SET ";
		//$update_query .="`company_id`='".$_POST['customer_id']."',";
		$update_query .="`name`='".$_POST['name']."',";
		$update_query .="`save_chk`='Y'";
		$update_query .=" WHERE  `customer_id_chk`='Y'";
		if ($_POST['customer_id']!="")
		$update_query .=" and `company_id`='".$_POST['customer_id']."'" ;
		else	
		$update_query .=" and `customer_token`='".$_POST['customer_token']."'" ;		  
		  
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
		$delete_query = "DELETE FROM location WHERE 1";
		if ($_POST['customer_id']!="")
		$delete_query = " and `company_id`='".$_POST['customer_id']."'";
		else
		$delete_query = " and `customer_token`='".$_POST['customer_token']."'";
		$delete_query = " and `customer_id_chk`='Y'";	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
//--------------------------------------------------------------------------
	else if (isset($_POST['com_save']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		$update_query = "UPDATE `location` SET ";
		$update_query .="`company_id`='".$_POST['customer_id']."',";
		$update_query .="`name`='".$_POST['name']."',";
		$update_query .="`save_chk`='Y'";
		$update_query .=" WHERE  `customer_id_chk`='N'";
		if ($_POST['customer_id']!="")
		$update_query .=" and `company_id`='".$_POST['customer_id']."'" ;
		else	
		$update_query .=" and `customer_token`='".$_POST['customer_token']."'" ;		  
		  
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 mysql_close($connect);
		 echo $result;
	}
	else if (isset($_POST['com_cancel']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		$delete_query = "DELETE FROM location WHERE 1";
		if ($_POST['customer_id']!="")
		$delete_query = " and `company_id`='".$_POST['customer_id']."'";
		else
		$delete_query = " and `customer_token`='".$_POST['customer_token']."'";
		$delete_query = " and `customer_id_chk`='N'";	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
//-------------------------------------------------------------------------
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM location WHERE `location_seq`=".$_GET['location_seq'];	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}

	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT location_seq FROM location Order by location_seq DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'location_seq' => $row['location_seq']
			  );
		}
		 
		echo json_encode($lastid);
	}
	else if (isset($_POST['type']))
	{
		$query = "SELECT  * FROM state";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'code' => $row['code']
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else if(isset($_GET['customer_location']))
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		if($_GET['company_id']=="")
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM location where customer_token='".$_GET['customer_token']."' and customer_id_chk='Y'  and save_chk='Y'";
		else
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM location where company_id='".$_GET['company_id']."' and customer_id_chk='Y'  and save_chk='Y'";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'location_seq' => $row['location_seq'],
				'company_id' => $row['company_id'],
				'location_id' => $row['location_id'],
				'address1' => $row['address1'],
				'address2' => $row['address2'],
				'address3' => $row['address3'],	
				'country' => $row['country'],
				'user_id' => $row['user_id'],
				'tel' => $row['tel']				
			  );
		}
		 
		/*$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);*/
		echo json_encode($employees);
	}
	
	else if(isset($_GET['dropDown']))
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT  l.*,CASE WHEN c.type=1 THEN 'Customer' WHEN c.type=7 THEN 'Sales Rep' WHEN c.type=8 THEN 'Financing' WHEN (c.type IS NULL) THEN 'Company' ELSE 'Vendor' END AS type,";
		$query .= " d.name AS divname FROM location l LEFT JOIN customer c ON (l.company_id=c.customer_id)";  
		$query .= " LEFT JOIN division d ON (c.division=d.division_seq) group by l.company_id";
		
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		//$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'location_seq' => $row['location_seq'],
				'company_id' => $row['company_id'],
				'name' => $row['name'],
				'type' => $row['type'],
				'divname' => $row['divname'],
				'location_id' => $row['location_id'],
				'address1' => $row['address1'],
				'address2' => $row['address2'],
				'address3' => $row['address3'],	
				'country' => $row['country'],
				'tel' => $row['tel']				
			  );
		}
		 
		/*$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);*/
		echo json_encode($employees);
	}
	else if(isset($_GET['location_dropDown']))
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT  * FROM location";
		
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		//$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'location_seq' => $row['location_seq'],
				'company_id' => $row['company_id'],
				'location_id' => $row['location_id'],
				'address1' => $row['address1'],
				'address2' => $row['address2'],
				'address3' => $row['address3'],	
				'country' => $row['country'],
				'user_id' => $row['user_id'],
				'tel' => $row['tel']				
			  );
		}
		 
		/*$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);*/
		echo json_encode($employees);
	}
	
	
	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM location where customer_id_chk='N' and save_chk='Y'";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'location_seq' => $row['location_seq'],
				'company_id' => $row['company_id'],
				'location_id' => $row['location_id'],
				'address1' => $row['address1'],
				'address2' => $row['address2'],
				'address3' => $row['address3'],
				'country' => $row['country'],
				'user_id' => $row['user_id'],
				'tel' => $row['tel']				
			  );
		}
		 
		/*$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);*/
		// echo ($query);
		echo json_encode($employees);
	}
?>