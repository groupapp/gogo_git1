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
		$setpono ="UPDATE last_pono SET last_pono=".$_POST['non_po_id'];
		$result = mysql_query($setpono) or die("SQL Error set last_po: " . mysql_error());
		// INSERT COMMAND 
		$insert_query = "INSERT INTO non_po (non_po_id,poto_id,payto_id,shipto_id,shipto_location,po_date,start_ship_date,cancel_date,shipvia,terms,incoterms,division,open_chk,total_qty,total_balance_qty,total_amount,total_balance_amount,ship_hand_fee,other_charge,salestax,grand_total_amount	,add_date,update_date,user_id,non_po_token,note,folder) VALUES (".$_POST['non_po_id'].",'".$_POST['poto_id']."','".$_POST['payto_id']."','".$_POST['shipto_id']."','".$_POST['shipto_location_id']."',str_to_date('".$_POST['po_date']."','%m/%d/%Y'),str_to_date('".$_POST['start_ship_date']."','%m/%d/%Y'),str_to_date('".$_POST['cancel_date']."','%m/%d/%Y'),".$_POST['shipvia'].",".$_POST['terms'].",".$_POST['incoterms'].",".$_POST['division'].",'".$_POST['open_chk']."',".$_POST['total_qty'].",".$_POST['total_balance_qty'].",".$_POST['total_amount'].",".$_POST['total_balance_amount'].",".$_POST['ship_hand_fee'].",".$_POST['other_charge'].",".$_POST['salestax'].",".$_POST['grand_total_amount'].",NOW(),NOW(),'".$_POST['user_id']."','".$_POST['non_po_token']."','".$_POST['note']."','".$_POST['folder']."')";
		
		$result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);  
		echo $result;
	}
	else if (isset($_POST['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `non_po` WHERE `non_po_seq`=".$_POST['non_po_seq'];	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		$delete_query = "DELETE FROM `non_po_detail` WHERE `non_po_id`='".$_POST['non_po_id']."'";	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());

		mysql_close($connect);
		echo $result;
	}
	else if (isset($_POST['update']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");
		
		$update_query = "UPDATE `non_po` SET ";
		$update_query .="non_po_id='".$_POST['non_po_id']."',";
		$update_query .="poto_id='".$_POST['poto_id']."',";
		$update_query .="payto_id='".$_POST['payto_id']."',";
		$update_query .="shipto_id='".$_POST['shipto_id']."',";
		$update_query .="shipto_location='".$_POST['shipto_location_id']."',";
		$update_query .="po_date=str_to_date('".$_POST['po_date']."','%m/%d/%Y'),";
		$update_query .="start_ship_date=str_to_date('".$_POST['start_ship_date']."','%m/%d/%Y'),";
		$update_query .="cancel_date=str_to_date('".$_POST['cancel_date']."','%m/%d/%Y'),";
		$update_query .="shipvia=".$_POST['shipvia'].",";
		$update_query .="terms=".$_POST['terms'].",";
		$update_query .="incoterms=".$_POST['incoterms'].",";
		$update_query .="division=".$_POST['division'].",";
		$update_query .="open_chk='".$_POST['open_chk']."',";
		$update_query .="total_qty=".$_POST['total_qty'].",";
		$update_query .="total_balance_qty=".$_POST['total_balance_qty'].",";
		$update_query .="total_amount=".$_POST['total_amount'].",";
		$update_query .="total_balance_amount=".$_POST['total_balance_amount'].",";
		$update_query .="ship_hand_fee=".$_POST['ship_hand_fee'].",";
		$update_query .="other_charge=".$_POST['other_charge'].",";
		$update_query .="salestax=".$_POST['salestax'].",";
		$update_query .="grand_total_amount=".$_POST['grand_total_amount'].",";
		$update_query .="update_date=NOW(),";
		$update_query .="user_id='".$_POST['user_id']."',";
		$update_query .="note='".$_POST['note']."'";
		$update_query .=" WHERE `non_po_seq`=".$_POST['non_po_seq'];		  
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT non_po_id FROM `non_po` Order by non_po_seq DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'non_po_id' => $row['non_po_id']
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
		$update_query = "UPDATE `non_po_detail` SET ";
		$update_query .="`save_chk`='Y',";
		$update_query .="`non_po_id`='".$_POST['non_po_id']."'";
		$update_query .=" WHERE `user_id`='".$_POST['user_id']."' and `non_po_token`='".$_POST['non_po_token']."'" ;		  
		  
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
		$delete_query = "DELETE FROM `non_po_detail` WHERE `user_id`='".$_POST['user_id']."' and save_chk='N' and `non_po_token`='".$_POST['non_po_token']."'";
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
	
	else if (isset($_GET['non_getpurchaselist']))
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM non_purchase where non_from_po_id=".$_GET['non_po_id'];

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'non_purchase_id' => $row['non_purchase_id'],
				'purchase_date'=>$row['purchase_date'],
				'total_qty'=>$row['total_qty'],
				'total_amount'=>$row['total_amount'],
				'non_purchase_token' => $row['non_purchase_token'],
				'user_id' => $row['user_id'],
			  );
		}
		 
		echo json_encode($employees);
		//echo json_encode($data);
	}
	
	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM `non_po`";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		$old_total_qty=0;
		$old_total_amount=0;
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'non_po_seq' => $row['non_po_seq'],
				'non_po_id' => $row['non_po_id'],
				'poto_id'=>$row['poto_id'],
				'payto_id'=>$row['payto_id'],
				'shipto_id'=>$row['shipto_id'],
				'shipto_location_id'=>$row['shipto_location'],
				'po_date'=>$row['po_date'],
				'start_ship_date'=>$row['start_ship_date'],
				'cancel_date'=>$row['cancel_date'],
				'shipvia'=>$row['shipvia'],
				'terms'=>$row['terms'],
				'incoterms'=>$row['incoterms'],
				'division'=>$row['division'],
				'open_chk'=>$row['open_chk'],
				'total_qty'=>$row['total_qty'],
				'total_balance_qty'=>$old_total_qty+$row['total_qty'],
				'total_amount'=>$row['total_amount'],
				'total_balance_amount'=>$old_total_amount+$row['total_amount'],
				'ship_hand_fee'=>$row['ship_hand_fee'],
				'other_charge'=>$row['other_charge'],
				'salestax'=>$row['salestax'],
				'grand_total_amount'=>$row['grand_total_amount'],
				'non_po_token' => $row['non_po_token'],
				'note' => $row['note'],
				$old_total_qty=$old_total_qty+$row['total_qty'],
				 $old_total_amount=$old_total_amount+$row['total_amount'],
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