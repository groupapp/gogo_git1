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
		$insert_query = "INSERT INTO `non_po_detail` (non_po_d_seq,non_po_id,description,qty,unit,unit_price,amount,add_date,update_date,user_id,save_chk,non_po_token) VALUES ";
		if ($_GET["non_po_d_seq"]!='')
		$insert_query .= "(".$_GET['non_po_d_seq'].",";
		else
		$insert_query .= "(0,";
		$insert_query .= "'".$_GET['non_po_id']."',";
		$insert_query .= "'".$_GET['description']."',";
		$insert_query .= $_GET['qty'].",";
		$insert_query .="'". $_GET['unit']."',";
		$insert_query .= $_GET['unit_price'].",";
		$insert_query .= $total.",";
		$insert_query .="NOW(),";
		$insert_query .="NOW(),";
		$insert_query .="'".$_GET['user_id']."',";
		$insert_query .="'N',";	
		$insert_query .= "'".$_GET['non_po_token']."')";
		$result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		mysql_close($connect);  
		echo $result;//
	}
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `non_po_detail` WHERE `non_po_token`='".$_GET['non_po_token']."' and non_po_d_seq=".$_GET['non_po_d_seq'];	
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
		$update_query = "UPDATE `non_po_detail` SET ";
		$update_query .="non_po_id=".$_GET['non_po_id'].",";
		$update_query .="description='".$_GET['description']."',";
		$update_query .="qty=".$_GET['qty'].",";
		$update_query .="unit='".$_GET['unit']."',";
		$update_query .="unit_price=".$_GET['unit_price'].",";
		$update_query .="amount=".$total.",";
		$update_query .="add_date=NOW(),";
		$update_query .="update_date=NOW(),";
		$update_query .="user_id='".$_GET['user_id']."',";
		$update_query .="save_chk='N'";	
		$update_query .=" WHERE `non_po_d_seq`=".$_GET['non_po_d_seq'];		  
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;//
	}
	
	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT non_po_d_seq FROM `non_po_detail` Order by non_po_d_seq DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'non_po_d_seq' => $row['non_po_d_seq']
			  );
		}
		 
		echo json_encode($lastid);
	}
	
	else if (isset($_GET['coloridchk']))
	{
		$lquery = "SELECT count(*) as cnt FROM `non_po_detail` where color_id=".$_GET['color_id']." and non_po_token='".$_GET['non_po_token']."'";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'cnt' => $row['cnt']
			  );
		}
		 
		echo json_encode($lastid);
	}	

	
	else if (isset($_GET['non_popur']))
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		
		//if($_GET['non_po_id']!="")
		$query = "SELECT SQL_CALC_FOUND_ROWS a.*,b.qty as purchase_qty FROM non_po_detail a LEFT JOIN  non_purchase_detail b ON (a.non_po_id=b.non_from_po_id and a.description=b.description) where a.save_chk='Y' and a.non_po_id='".$_GET['non_po_id']."'";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$percent1=$row['purchase_qty']/$row['qty'];
			$shor_over=($row['purchase_qty']-$row['qty']);
			$percent2=($row['purchase_qty']-$row['qty'])/$row['qty'];
			$employees[] = array(
				
				'non_po_d_seq' => $row['non_po_d_seq'],
				'non_po_id' => $row['non_po_id'],
				'description' => $row['description'],
				'qty' => $row['qty'],
				'purchase_qty' => $row['purchase_qty'],
				'unit' => $row['unit'],
				'percent1'=>$percent1,
				'shor_over'=>$shor_over,
				'percent2'=>$percent2,
				'unit_price' => $row['unit_price'],
				'amount' => $row['amount'],
				'user_id' => $row['user_id'],
				'non_po_token' => $row['non_po_token'],
			  );
		}
		 
		/*$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);*/
		//echo $query;
		echo json_encode($employees);
		//echo json_encode($data);
	}
	
	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		
		if($_GET['non_po_id']!="")
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM `non_po_detail` where save_chk='Y' and `non_po_id`='".$_GET['non_po_id']."'";
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'non_po_d_seq' => $row['non_po_d_seq'],
				'non_po_id' => $row['non_po_id'],
				'description' => $row['description'],
				'qty' => $row['qty'],
				'unit' => $row['unit'],
				'unit_price' => $row['unit_price'],
				'amount' => $row['amount'],
				'user_id' => $row['user_id'],
				'non_po_token' => $row['non_po_token'],
			  );
		}
		 
		/*$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);*/
		echo json_encode($employees);
		//echo json_encode($data);
	}
?>