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
		
		$update_query = "UPDATE `company` SET `company_id`='".$_POST['companyid']."',`name`='".$_POST['name']."',`ship_via_vendor`=".$_POST['shipvendor'].",`ship_via_customer`=".$_POST['shipcustomer'].",`terms_vendor`=".$_POST['termvendor'].",`terms_customer`=".$_POST['termcustomer'].",`incoterms_vendor`=".$_POST['incotermvendor'].",`incoterms_customer`=".$_POST['incotermcustomer'].",";
		if($_POST['pono']!="")
		$update_query .="`po_start`=".$_POST['pono'].",";
		if($_POST['purchaseno']!="")
		$update_query .="`puchase_start`=".$_POST['purchaseno'].",";
		if($_POST['sono']!="")
		$update_query .="`sales_order_start`=".$_POST['sono'].",";
		if($_POST['invoiceno']!="")
		$update_query .="`invoice_start`=".$_POST['invoiceno'].",";
		if($_POST['glno']!="")
		$update_query .="`general_journal`=".$_POST['glno'].",";
		if($_POST['accountar']!="")
		$update_query .="`account_receivable`=".$_POST['accountar'].",";
		if($_POST['accountap']!="")
		$update_query .="`account_payable`=".$_POST['accountap'].",";
		if($_POST['accountinventoryas']!="")
		$update_query .="`inventory_asset`=".$_POST['accountinventoryas'].",";
		if($_POST['accountinventoryco']!="")
		$update_query .="`inventory_cogs`=".$_POST['accountinventoryco'].",";
		if($_POST['accountcashre']!="")
		$update_query .="`cash_receipt_revenue`=".$_POST['accountcashre'].",";
		if($_POST['accountcashdc']!="")
		$update_query .="`cash_receipt_discount`=".$_POST['accountcashdc'].",";
		if($_POST['accountpayex']!="")
		$update_query .="`payment_expense`=".$_POST['accountpayex'].",";
		if($_POST['accountpaydc']!="")
		$update_query .="`payment_discount`=".$_POST['accountpaydc'].",";
		
		$update_query .="`account_receivable_description`='".$_POST['ar']."',";
		$update_query .="`account_payable_description`='".$_POST['ap']."',";
		$update_query .="`inventory_asset_description`='".$_POST['inventoryas']."',";
		$update_query .="`inventory_cogs_description`='".$_POST['inventoryco']."',";
		$update_query .="`cash_receipt_revenue_description`='".$_POST['cashre']."',";
		$update_query .="`cash_receipt_discount_description`='".$_POST['cashdc']."',";
		$update_query .="`payment_expense_description`='".$_POST['payex']."',";
		$update_query .="`payment_discount_description`='".$_POST['paydc']."',";
		$update_query .="`theme`='".$_POST['theme']."',";
		$update_query .="`user_id`='".$_POST['user_id']."'";
		$update_query .=" WHERE `company_seq`=".$_POST['companyseq'];		  
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
	
	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT color_id FROM color Order by color_id DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'color_id' => $row['color_id']
			  );
		}
		 
		echo json_encode($lastid);
	}

	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM company";

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