<?php
	#Include the connect.php file
	include('connect.php');
	include('function.php');
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
		
	}
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM acc_user WHERE cUser_Num='".$_GET['cUser_Num']."'";	
		$result = mysql_query($delete_query) or die("SQL Error d1: " . mysql_error());
		
		mysql_close($connect);
		echo $result;
	}
	else if (isset($_GET['update']))
	{

		// UPDATE COMMAND 
	
		//mysql_query("SET foreign_key_checks = 0");
		
			$update_query = "UPDATE acc_user SET ";
			$update_query .="cUserIDNO='".$_GET['cUserIDNO']."',";
			$update_query .="cPassword='".$_GET['cPassword']."',";
			$update_query .="cFistName='".$_GET['cFistName']."',";
			$update_query .="cLastName='".$_GET['cLastName']."',";
			$update_query .="cCellNumb='".$_GET['cCellNumb']."',";

			$update_query .="cAddressX='".$_GET['cAddressX']."',";
			$update_query .="cCityName='".$_GET['cCityName']."',";
			$update_query .="cProvince='".$_GET['cProvince']."',";
			$update_query .="cZipsCode='".$_GET['cZipsCode']."',";
			$update_query .="nSMS_Numb='".$_GET['nSMS_Numb']."'";
			$update_query .=" WHERE cUser_Num='".$_GET['cUser_Num']."'";		  
			 //echo $update_query;
			 $result = mysql_query($update_query) or die("SQL Error u4: " . mysql_error());
		
		
		mysql_close($connect);
		 echo $result;


		 
		 
	}
	else
	{
		
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS a.*,(SELECT  CONCAT(e.cFistName,' ',e.cLastName) FROM acc_user e WHERE e.cUser_Num=a.cSponsorX ) as s_name  FROM acc_user a ";

		$result = mysql_query($query) or die("SQL Error s4: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'Sponsorid' => $row['cSponsorX'],
				'cUser_Num' => $row['cUser_Num'],
				'cUserIDNO'=>$row['cUserIDNO'],
				'cPassword'=>$row['cPassword'],
				'cFistName'=>$row['cFistName'],
				'cLastName'=>$row['cLastName'],
				'cCellNumb'=>$row['cCellNumb'],
				'nSMS_Numb'=>$row['nSMS_Numb'],
				'cOpenDate'=>date('m/d/Y',strtotime($row['cOpenDate'])),
				'cIPnumber'=>$row['cIPnumber'],
				'cAddressX'=>$row['cAddressX'],
				'cCityName'=>$row['cCityName'],
				'cProvince'=>$row['cProvince'],
				'cZipsCode'=>$row['cZipsCode'],
				'cCarriers'=>$row['cCarriers'],
				's_name'=>$row['s_name'],
				'nUsePoint'=>$row['nUsePoint'],
				
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($data);
	}





?>