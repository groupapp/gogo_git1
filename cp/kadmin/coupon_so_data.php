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
			$update_query .="nSMS_Numb='".$_GET['nSMS_Numb']."',";
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
		$query = "SELECT SQL_CALC_FOUND_ROWS a.cCouponNo,a.cUse_Location,a.nActive,a.dActive_date,a.dUse_date,a.nFinishSeq,b.cSponsorX,b.cUser_Num,b.cUserIDNO,b.cFistName,b.cLastName,c.cShop,c.cItem,c.dFrom,c.dTo,c.nCouponID,c.cName,c.fOrigin,c.fSale,(SELECT  CONCAT(e.cFistName,' ',e.cLastName) FROM acc_user e WHERE e.cUser_Num=b.cSponsorX ) as s_name  FROM acc_user_coupon a LEFT JOIN acc_user b ON ( a.cUser_Num = b.cUser_Num ) LEFT JOIN acc_coupon c ON ( a.nCouponID = c.nCouponID ) ";

		$result = mysql_query($query) or die("SQL Error s4: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'cSponsorX' => $row['cSponsorX'],
				'cUser_Num' => $row['cUser_Num'],
				'cUserIDNO'=>$row['cUserIDNO'],
				'cFistName'=>$row['cFistName'],
				'cLastName'=>$row['cLastName'],
				's_name'=>$row['s_name'],
				'cCouponNo'=>$row['cCouponNo'],
				'cUse_Location'=>$row['cUse_Location'],
				'cShop'=>$row['cShop'],
				'cItem'=>$row['cItem'],
				'dFrom'=>$row['dFrom'],
				'dTo'=>$row['dTo'],
				'nCouponID'=>$row['nCouponID'],
				'cName'=>$row['cName'],
				'nActive'=>$row['nActive'],
				'dActive_date'=>date('Y-m-d',strtotime($row['dActive_date'])),
					
				'fOrigin'=>$row['fOrigin'],
				'fSale'=>$row['fSale'],
				'dUse_date'=>$row['dUse_date'],
				'nFinishSeq'=>$row['nFinishSeq'],
				
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($data);
	}





?>