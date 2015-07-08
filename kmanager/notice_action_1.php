<?php
	include "../include/function.php";
	$DB = new myDB;
	
	

	$my_multi_select1			= empty($_REQUEST["my_multi_select1"])		? null : $_REQUEST["my_multi_select1"];

	

	$id_notices			= empty($_REQUEST["id_notices"])		? null : $_REQUEST["id_notices"];
	$action			= empty($_POST["action"])		? null : $_POST["action"];
	//$delid			= empty($_POST["delid"])		? null : $_POST["delid"];
	$id_vendor			= empty($_POST["id_vendor"])		? null : $_POST["id_vendor"];
	$id_type_list			= empty($_POST["id_type_list"])		? null : $_POST["id_type_list"];
	$from_date			= empty($_POST["from_date"])		? null : $_POST["from_date"];
	$from_time			= empty($_POST["from_time"])		? null : $_POST["from_time"];
	$description			= empty($_POST["description"])		? null : $_POST["description"];
	$detail_link			= empty($_POST["detail_link"])		? null : $_POST["detail_link"];
	$id_user_created			= empty($_POST["id_user_created"])		? null : $_POST["id_user_created"];
	$id_user_updated			= empty($_POST["id_user_updated"])		? null : $_POST["id_user_updated"];
	$step			= empty($_REQUEST["step"])		? null : $_REQUEST["step"];
	
	$image="";

	$id_vendor=1;
	$id_user_created=1;
	$id_user_updated=1;
	$id_type_list=2;

	$filetemp			= empty($_FILES['image']['tmp_name'])		? 0 : $_FILES['image']['tmp_name'];
	
	 if($filetemp!=0)
	 {
			if(getimagesize($_FILES['image']['tmp_name'])==TRUE)
			{
			
				$image=addslashes($_FILES['image']['tmp_name']);


				$name=addslashes($_FILES['image']['name']);
				$image=file_get_contents($image);

	//print_r($image);

				$image=base64_encode($image);
				//saveimage($name,$image);
				
			}
	 }	
	
	if($action == "del") {
		
		foreach($_POST["delid"] as $key => $val) {
			$strSQL = ("DELETE FROM notices_vendors WHERE id_notices=".$val);
		//echo $strSQL;
			$DB->query($strSQL);
		}
	}
	 else if ($id_notices == "") {
		
		foreach($_POST["my_multi_select1"] as $key => $val) {
			$strSQL		= "INSERT INTO notices_vendors (id_vendor,id_type_list,from_date,from_time,
			date_created,date_updated,id_user_created,id_user_updated) VALUES(
					\"".$val."\",
					\"".$id_type_list."\",
					\"".$from_date."\",
					\"".$from_time."\",
					now(),
					now(),		
					\"".$id_user_created."\",
					\"".$id_user_created."\"
					)";
		//echo $strSQL;
		//exit;
			$DB->query($strSQL);
			$step=1;
		}

	} else if ($id_notices >0) {
		
		
		$strSQL 	= "UPDATE notices_vendors SET
				id_type_list				= \"".$id_type_list."\",
				title			= \"".$title."\",
				from_date			= \"".$from_date."\",
				from_time		= \"".$from_time."\",
				to_time		= \"".$to_time."\",
				description					= \"".$description."\",";
				
		if($image!="")
		$strSQL .=	"image			= \"".$image."\",";
				
		$strSQL .=	"detail_link			= \"".$detail_link."\",
				barcode			= \"".$barcode."\",
				date_updated			= now(),
				id_user_updated			= \"".$id_user_updated."\",
				count		= \"".$count."\",
				gender		= \"".$gender."\",
				age_from		= \"".$age_from."\",
				age_to		= \"".$age_to."\",
				emoticon		= \"".$emoticon."\"
				WHERE id_notices=".$id_notices;
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	$DB->close();
//exit;
	echo "<script>location.replace('notice.php?id_notices=".$id_notices."&step=".$step."&menu=2');</script>";
	//echo "<script>location.replace('bang.php?SearchField=".$SearchField."&SearchKeyword=".$SearchKeyword."&pp=".$pp."&act=".$view."&id_bangs=".$id_bangs."&submit=Submit');</script>";
?>