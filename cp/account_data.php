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
		$insert_query = "INSERT INTO `account` (`account_id`,`type`,`description`,`active`) VALUES ('".$_POST['accountid']."',".$_POST['accounttype'].",'".$_POST['accountdescription']."','".$_POST['accountactive']."')";
		$result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);  
		echo $result;
	}

	else if (isset($_POST['update']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		$update_query = "UPDATE `account` SET `account_id`='".$_POST['accountid']."',`description`='".$_POST['accountdescription']."',`type`=".$_POST['accounttype'].",`active`='".$_POST['accountactive']."' WHERE `account_seq`=".$_POST['accountseq'];		  
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else if (isset($_POST['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM account WHERE `account_seq`=".$_POST['accountseq'];	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
	else if (isset($_POST['type']))
	{
		$query = "SELECT  * FROM type";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'type_id' => $row['type_id'],
				'name' => $row['name'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else if (isset($_POST['accountar']))
	{
		$query = "SELECT  * FROM account where account_seq=".$_POST['accountseq'];

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'description' => $row['description'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else if (isset($_GET['listar']))
	{
		$query = "SELECT  * FROM account where type=2";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'account_seq' => $row['account_seq'],
				'account_id' => $row['account_id'],
				'name' => $row['name'],
				'description' => $row['description'],
				'active' => $row['active'],
				
			  );
		}
		 
		//$data[] = array(
		  // 'Rows' => $employees
		//);
		echo json_encode($employees);
	}

	else if (isset($_POST['accountap']))
	{
		$query = "SELECT  * FROM account where account_seq=".$_POST['accountseq'];

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'description' => $row['description'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	
	else if (isset($_POST['journalaccount']))
	{
		$query = "SELECT  * FROM account ";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'description' => $row['description'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else if (isset($_POST['getdescription']))
	{
		$query = "SELECT  * FROM account where account_id='".$_POST['account_id']."'";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$description=$row['description'];
			$employees[] = array(
				'description' => $row['description'],
				  );
		}

		
		
		//echo json_encode($update_query); 


		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);

	}
	else if (isset($_POST['getaccountdescription']))
	{
		$query = "SELECT  * FROM account where account_id='".$_POST['account_id']."'";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$description=$row['description'];
			$employees[] = array(
				'description' => $row['description'],
				  );
		}		echo json_encode($employees);

	}
	
	else if (isset($_POST['accountinventoryas']))
	{
		$query = "SELECT  * FROM account where account_seq=".$_POST['accountseq'];

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'description' => $row['description'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else if (isset($_POST['accountinventoryco']))
	{
		$query = "SELECT  * FROM account where account_seq=".$_POST['accountseq'];

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'description' => $row['description'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else if (isset($_POST['accountcashre']))
	{
		$query = "SELECT  * FROM account where account_seq=".$_POST['accountseq'];

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'description' => $row['description'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else if (isset($_POST['accountcashdc']))
	{
		$query = "SELECT  * FROM account where account_seq=".$_POST['accountseq'];

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'description' => $row['description'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else if (isset($_POST['accountpayex']))
	{
		$query = "SELECT  * FROM account where account_seq=".$_POST['accountseq'];

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'description' => $row['description'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else if (isset($_POST['accountpaydc']))
	{
		$query = "SELECT  * FROM account where account_seq=".$_POST['accountseq'];

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'description' => $row['description'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else if (isset($_POST['salestax']))
	{
		$query = "SELECT  * FROM salestax where salestax_id=".$_POST['salestaxseq'];

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'rate' => $row['rate'],
				  );
		}
		 
		$data[] = array(
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS a.account_seq,a.account_id,b.name ,a.description,a.active FROM account a,type b where a.type=b.type_id";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'account_seq' => $row['account_seq'],
				'account_id' => $row['account_id'],
				'name' => $row['name'],
				'description' => $row['description'],
				'active' => $row['active'],
				
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
?>