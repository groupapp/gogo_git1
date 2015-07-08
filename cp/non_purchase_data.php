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
		$setinvoiceno ="UPDATE last_invoiceno SET last_invoiceno=".$_POST['non_purchase_id'];
		$result = mysql_query($setinvoiceno) or die("SQL Error set last_invoice: " . mysql_error());
		
		
		// INSERT COMMAND 
		$insert_query = "INSERT INTO non_purchase (non_purchase_id,non_from_po_id,non_purchasefrom_id,payto_id,shipto_id,shipto_location,purchase_date,recive_date,shipvia,terms,incoterms,division,recive_chk,total_qty,gl_account1,gl_account2,total_amount,ship_hand_fee,other_charge,salestax,grand_total_amount,add_date,update_date,user_id,non_purchase_token,note,folder) VALUES (".$_POST['non_purchase_id'].",'".$_POST['non_from_po_id']."','".$_POST['non_purchasefrom_id']."','".$_POST['payto_id']."','".$_POST['shipto_id']."','".$_POST['shipto_location_id']."',str_to_date('".$_POST['purchase_date']."','%m/%d/%Y'),str_to_date('".$_POST['received_date']."','%m/%d/%Y'),".$_POST['shipvia'].",".$_POST['terms'].",".$_POST['incoterms'].",".$_POST['division'].",'".$_POST['recive_chk']."',".$_POST['total_qty'].",'".$_POST['gl_account1']."','".$_POST['gl_account2']."',".$_POST['total_amount'].",".$_POST['ship_hand_fee'].",".$_POST['other_charge'].",".$_POST['salestax'].",".$_POST['grand_total_amount'].",NOW(),NOW(),'".$_POST['user_id']."','".$_POST['non_purchase_token']."','".$_POST['note']."','".$_POST['folder']."')";
		
		$result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);  
		echo $result;
	}
	else if (isset($_POST['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `non_purchase` WHERE `non_purchase_seq`=".$_POST['non_purchase_seq'];	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		$delete_query = "DELETE FROM `non_purchase_detail` WHERE `non_purchase_id`='".$_POST['non_purchase_id']."'";	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());

		mysql_close($connect);
		echo $result;
	}
	else if (isset($_POST['update']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");
		
		$update_query = "UPDATE `non_purchase` SET ";
		$update_query .="non_purchase_id='".$_POST['non_purchase_id']."',";
		$update_query .="non_from_po_id='".$_POST['non_from_po_id']."',";
		$update_query .="non_purchasefrom_id='".$_POST['non_purchasefrom_id']."',";
		$update_query .="payto_id='".$_POST['payto_id']."',";
		$update_query .="shipto_id='".$_POST['shipto_id']."',";
		$update_query .="shipto_location='".$_POST['shipto_location_id']."',";
		$update_query .="purchase_date=str_to_date('".$_POST['purchase_date']."','%m/%d/%Y'),";
		$update_query .="recive_date=str_to_date('".$_POST['recive_date']."','%m/%d/%Y'),";
		$update_query .="shipvia=".$_POST['shipvia'].",";
		$update_query .="terms=".$_POST['terms'].",";
		$update_query .="incoterms=".$_POST['incoterms'].",";
		$update_query .="division=".$_POST['division'].",";
		$update_query .="recive_chk='".$_POST['recive_chk']."',";
		$update_query .="total_qty=".$_POST['total_qty'].",";
		$update_query .="gl_account1='".$_POST['gl_account1']."',";
		$update_query .="gl_account2='".$_POST['gl_account2']."',";
		$update_query .="total_amount=".$_POST['total_amount'].",";
		$update_query .="ship_hand_fee=".$_POST['ship_hand_fee'].",";
		$update_query .="other_charge=".$_POST['other_charge'].",";
		$update_query .="salestax=".$_POST['salestax'].",";
		$update_query .="grand_total_amount=".$_POST['grand_total_amount'].",";
		$update_query .="update_date=NOW(),";
		$update_query .="user_id='".$_POST['user_id']."',";
		$update_query .="note='".$_POST['note']."'";
		$update_query .=" WHERE `non_purchase_seq`=".$_POST['non_purchase_seq'];		  
		$result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT non_purchase_id FROM `non_purchase` Order by non_purchase_seq DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'non_purchase_id' => $row['non_purchase_id']
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
		$update_query = "UPDATE `non_purchase_detail` SET ";
		$update_query .="`save_chk`='Y',";
		$update_query .="`non_purchase_id`='".$_POST['non_purchase_id']."',";
		$update_query .="`user_id`='".$_POST['user_id']."'";
		$update_query .=" WHERE  `non_purchase_token`='".$_POST['non_purchase_token']."'" ;		  
		  
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
		$delete_query = "DELETE FROM `non_purchase_detail` WHERE  save_chk='N' and `non_purchase_token`='".$_POST['non_purchase_token']."'";
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
	
	else if (isset($_POST['nonpurchasefrom']))
	{
		$query = "SELECT  * FROM location Group by company_id ";
		
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'name' => $row['name'],
				'non_purchasefrom_id' => $row['company_id'],
				'location_id' => $row['location_id'],
				'address1' => $row['address1'],
				'address2' => $row['address2'],
				'address3' => $row['address3'],
				  );
		}
		 //echo json_encode($query);
		echo json_encode($employees);
	}

	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM `non_purchase`";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'non_purchase_seq' => $row['non_purchase_seq'],
				'non_purchase_id' => $row['non_purchase_id'],
				'non_from_po_id' => $row['non_from_po_id'],
				'non_purchasefrom_id' => $row['non_purchasefrom_id'],
				'payto_id'=>$row['payto_id'],
				'shipto_id'=>$row['shipto_id'],
				'shipto_location_id'=>$row['shipto_location'],
				'purchase_date'=>$row['purchase_date'],
				'recive_date'=>$row['recive_date'],
				'shipvia'=>$row['shipvia'],
				'terms'=>$row['terms'],
				'incoterms'=>$row['incoterms'],
				'division'=>$row['division'],
				'recive_chk'=>$row['recive_chk'],
				'total_qty'=>$row['total_qty'],
				'total_amount'=>$row['total_amount'],
				'ship_hand_fee'=>$row['ship_hand_fee'],
				'other_charge'=>$row['other_charge'],
				'salestax'=>$row['salestax'],
				'grand_total_amount'=>$row['grand_total_amount'],
				'non_purchase_token' => $row['non_purchase_token'],
				'note' => $row['note'],
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