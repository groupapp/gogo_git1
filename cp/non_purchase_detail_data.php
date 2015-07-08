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
		if ($_GET['qty']!="" && $_GET['unit_price']!="")
			$total=intval($_GET['qty'])*floatval($_GET['unit_price']);
		else
			$total=0;
		$insert_query = "INSERT INTO `non_purchase_detail` (non_purchase_d_seq,non_purchase_id,description,qty,unit,unit_price,amount,add_date,update_date,user_id,save_chk,non_purchase_token) VALUES ";
		if ($_GET["non_purchase_d_seq"]!='')
		$insert_query .= "(".$_GET['non_purchase_d_seq'].",";
		else
		$insert_query .= "(0,";
		$insert_query .= "'".$_GET['non_purchase_id']."',";
		$insert_query .= "'".$_GET['description']."',";
		$insert_query .= $_GET['qty'].",";
		$insert_query .="'". $_GET['unit']."',";
		$insert_query .= $_GET['unit_price'].",";
		$insert_query .= $total.",";
		$insert_query .="NOW(),";
		$insert_query .="NOW(),";
		$insert_query .="'".$_GET['user_id']."',";
		$insert_query .="'N',";	
		$insert_query .= "'".$_GET['non_purchase_token']."')";
		$result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);  
		echo $result;//
	}
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `non_purchase_detail` WHERE `non_purchase_token`='".$_GET['non_purchase_token']."' and non_purchase_d_seq=".$_GET['non_purchase_d_seq'];	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);
		echo $result;
	}
	else if (isset($_GET['update']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");
		if ($_GET['qty']!="" && $_GET['unit_price']!="")
			$total=intval($_GET['qty'])*floatval($_GET['unit_price']);
		else
			$total=0;
		$update_query = "UPDATE `non_purchase_detail` SET ";
		$update_query .="non_purchase_id=".$_GET['non_purchase_id'].",";
		$update_query .="description='".$_GET['description']."',";
		$update_query .="qty=".$_GET['qty'].",";
		$update_query .="unit='".$_GET['unit']."',";
		$update_query .="unit_price=".$_GET['unit_price'].",";
		$update_query .="amount=".$total.",";
		$update_query .="add_date=NOW(),";
		$update_query .="update_date=NOW(),";
		$update_query .="user_id='".$_GET['user_id']."',";
		$update_query .="save_chk='N'";	
		$update_query .=" WHERE `non_purchase_d_seq`=".$_GET['non_purchase_d_seq'];		  
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;//
	}
	
	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT non_purchase_d_seq FROM `non_purchase_detail` Order by non_purchase_d_seq DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'non_purchase_d_seq' => $row['non_purchase_d_seq']
			  );
		}
		 
		echo json_encode($lastid);
	}
//==========================================================================
	else if (isset($_POST['from_poid_to_info']))
	{
		$xquery = "SELECT a.*,b.name FROM non_po a, location b  where a.poto_id=b.company_id and a.non_po_id=".$_POST['non_from_po_id'];
		
		$xresult = mysql_query($xquery) or die("SQL Error get: " . mysql_error());
		while ($xrow = mysql_fetch_array($xresult, MYSQL_ASSOC)) {
			$xemployees[] = array(
				'poto_id' => $xrow['poto_id'],
				'name' => $xrow['name'],
				'podate' => $xrow['po_date'],
				'startship' => $xrow['start_ship_date'],
				'canceldate' => $xrow['cancel_date']
			  );
		}
		
		echo json_encode($xemployees);
	}
	
	else if (isset($_GET['from_po']))
	{
		
		$query = "SELECT count(*) AS cnt FROM non_purchase_detail   where non_from_po_id=".$_GET['non_from_po_id'];

		
		$result = mysql_query($query) or die("SQL Error purchase cnt: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		 $cnt=$row['cnt'];
		}
		
		if ($cnt==0)
		{
			$query1 = "SELECT * FROM non_po_detail   where non_po_id=".$_GET['non_from_po_id'];
			$result1 = mysql_query($query1) or die("SQL Error select from po: " . mysql_error());
			while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			
			$insert_query = "INSERT INTO non_purchase_detail (non_purchase_id,non_from_po_id,description,qty,unit_price,amount,add_date,update_date,user_id,save_chk,non_purchase_token) VALUES ";
			$insert_query .= "('".$_GET['non_purchase_id']."',";
			$insert_query .= $row1['non_po_id'].",";
			$insert_query .= "'".$row1['description']."',";
			$insert_query .= "0,";//$row1['qty'].",";
			$insert_query .= "0,";//$row1['unit_price'].",";
			$insert_query .= "0,";//$row1['amount'].",";
			$insert_query .="NOW(),";
			$insert_query .="NOW(),";
			$insert_query .="'".$_GET['user_id']."',";
			$insert_query .="'N',";	
			$insert_query .= "'".$_GET['non_purchase_token']."')";
			$result = mysql_query($insert_query) or die("SQL insert garment from po: " . mysql_error());
			
			}
			
		}

		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$x=intval($_GET['non_purchase_id']);
		if($x==0)
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM non_purchase_detail where  non_purchase_token='".$_GET['non_purchase_token']."' and non_from_po_id=".$_GET['non_from_po_id'];		
		else
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM non_purchase_detail where  non_purchase_id=".$_GET['non_purchase_id']." and non_from_po_id=".$_GET['non_from_po_id'];
		
		$result = mysql_query($query) or die("SQL Error non from po detail: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'non_purchase_d_seq' => $row['non_purchase_d_seq'],
				'non_purchase_id' => $row['non_purchase_id'],
				'description' => $row['description'],
				'qty' => $row['qty'],
				'unit' => $row['unit'],
				'unit_price' => $row['unit_price'],
				'amount' => $row['amount'],
				'user_id' => $row['user_id'],
				'non_purchase_token' => $row['non_purchase_token'],
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($employees);
			//echo json_encode($query);
	}
	
//============================================================================	
	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		
		//if($_GET['non_purchase_id']!="")
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM `non_purchase_detail` where save_chk='Y' and `non_purchase_id`='".$_GET['non_purchase_id']."'";
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'non_purchase_d_seq' => $row['non_purchase_d_seq'],
				'non_purchase_id' => $row['non_purchase_id'],
				'description' => $row['description'],
				'qty' => $row['qty'],
				'unit' => $row['unit'],
				'unit_price' => $row['unit_price'],
				'amount' => $row['amount'],
				'user_id' => $row['user_id'],
				'non_purchase_token' => $row['non_purchase_token'],
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