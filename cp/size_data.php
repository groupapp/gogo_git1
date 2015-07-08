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
		$insert_query = "INSERT INTO size (`size_id`,`s1`,`s2`,`s3`,`s4`,`s5`,`s6`,`s7`,`s8`,`s9`,`s10`,`s11`,`s12`) VALUES (".$_GET['size_id'].",'".$_GET['s1']."','".$_GET['s2']."','".$_GET['s3']."','".$_GET['s4']."','".$_GET['s5']."','".$_GET['s6']."','".$_GET['s7']."','".$_GET['s8']."','".$_GET['s49']."','".$_GET['s10']."','".$_GET['s11']."','".$_GET['s12']."')";
		$result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		
		for($i=1;$i<13;$i++){
		if($_GET['s'.$i.'']!="")
			{
				$insert_query1 = "INSERT INTO size1 (size_id,size_no,size_name) VALUES (".$_GET['size_id'].",'s".$i."','".$_GET['s'.$i.'']."')";
				$result = mysql_query($insert_query1) or die("SQL Error 1: " . mysql_error());
			}
		}
		mysql_close($connect);  
		echo $result;
	}

	else if (isset($_GET['update']))
	{
		// UPDATE COMMAND 
		//mysql_query("SET foreign_key_checks = 0");	
		$update_query = "UPDATE `size` SET `s1`='".$_GET['s1']."',`s2`='".$_GET['s2']."',`s3`='".$_GET['s3']."',`s4`='".$_GET['s4']."',`s5`='".$_GET['s5']."',`s6`='".$_GET['s6']."',`s7`='".$_GET['s7']."',`s8`='".$_GET['s8']."',`s9`='".$_GET['s9']."',`s10`='".$_GET['s10']."',`s11`='".$_GET['s11']."',`s12`='".$_GET['s12']."' WHERE `size_id`=".$_GET['size_id'];
		
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 
		 $delete_query = "DELETE FROM size1 WHERE `size_id`=".$_GET['size_id'];	
			$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
			for($i=1;$i<13;$i++){
			if($_GET['s'.$i.'']!="")
				{
					$insert_query1 = "INSERT INTO size1 (size_id,size_no,size_name) VALUES (".$_GET['size_id'].",'s".$i."','".$_GET['s'.$i.'']."')";
					$result = mysql_query($insert_query1) or die("SQL Error 1: " . mysql_error());
				}
			}
		mysql_close($connect);
		 echo $result;
	}
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM size WHERE `size_id`=".$_GET['size_id'];	
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		$delete_query1 = "DELETE FROM size1 WHERE `size_id`=".$_GET['size_id'];	
		$result = mysql_query($delete_query1) or die("SQL Error 1: " . mysql_error());
		
		mysql_close($connect);
		echo $result;
	}
	else if (isset($_GET['lastid']))
	{
		$lquery = "SELECT size_id FROM size Order by size_id DESC LIMIT 0,1";
		$lresult = mysql_query($lquery) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($lresult, MYSQL_ASSOC)) {
			$lastid[] = array(
				'size_id' => $row['size_id']
			  );
		}
		 
		echo json_encode($lastid);
	}
	else
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM size ";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'size_id' => $row['size_id'],
				's1' => $row['s1'],
				's2' => $row['s2'],
				's3' => $row['s3'],
				's4' => $row['s4'],
				's5' => $row['s5'],
				's6' => $row['s6'],
				's7' => $row['s7'],
				's8' => $row['s8'],
				's9' => $row['s9'],
				's10' => $row['s10'],
				's11' => $row['s11'],
				's12' => $row['s12'],
				
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($employees);
	}
?>