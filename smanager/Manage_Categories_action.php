<?php
	include "../include/function.php";
	$DB = new myDB;

	$action				= $_REQUEST["action"];
	//$id_category				= $_REQUEST["id1"];
	$category_name			= $_REQUEST["category_name"];
	$id_language			= $_REQUEST["id_language"];
	if($id_language==0)
	$id_language=1;

	//echo $category_name;
	//echo "</br>";
	//echo $Cat1ID2;
//	exit;
	if($action == "del1"){
		$strSQL = ("DELETE FROM category Where id_category=".$id_category);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	elseif($action == "add1"){

				$DB1 = new myDB;
				$strSQL1 = "SELECT position FROM category Order by position DESC Limit 0,1 ";
				$DB1->query($strSQL1);
				if ($DB1->rows==0)
					$Cat1SortNo=1;
				else
				{
					while ($data1 = $DB1->fetch_array($DB1->res)){
					$Cat1SortNo=(int)$data1['position']+1;
				}
				}
				
				$strSQL		= ("INSERT INTO category (position) VALUES (				
				\"".$Cat1SortNo."\"	)");	

				$DB->query($strSQL);

				$DB2 = new myDB;
				$strSQL1 = "SELECT id_category FROM category Order by id_category DESC Limit 0,1 ";
				$DB1->query($strSQL1);
				while ($data1 = $DB1->fetch_array($DB1->res)){
				$id_category=(int)$data1['id_category'];
				}
				

				if(empty($id_language))
					$id_language=1;

				$strSQL		= ("INSERT INTO category_language (id_category,id_language,category_name) VALUES(				
				\"".$id_category."\",
				\"".$id_language."\",	
				\"".$category_name."\"				
				)");

//print_r($strSQL);
//exit;

			
				$DB->query($strSQL);
		
	}
	
	else if ($action == "update1"){
		$strSQL 	= ("UPDATE category SET
				category_name		= \"".$category_name."\",
				id_language		= \"".$id_language."\",
				date_updated = now()
				WHERE id_category=".$id_category);
		
		$DB->query($strSQL);
	}
	
	
	$DB->close();
	echo "<script>location.replace('Manage_Categories.php');</script>";
?>