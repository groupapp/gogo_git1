<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$id_events			= empty($_REQUEST["id_events"])		? null : $_REQUEST["id_events"];
	$action			= empty($_POST["action"])		? null : $_POST["action"];
	//$delid			= empty($_POST["delid"])		? null : $_POST["delid"];
	$id_vendor			= empty($_POST["id_vendor"])		? null : $_POST["id_vendor"];
	$id_type_list			= empty($_POST["id_type_list"])		? null : $_POST["id_type_list"];
	$title			= empty($_POST["title"])		? null : $_POST["title"];
	$from_date			= empty($_POST["from_date"])		? null : $_POST["from_date"];
	$to_date			= empty($_POST["to_date"])		? null : $_POST["to_date"];
	$description			= empty($_POST["description"])		? null : $_POST["description"];
	$detail_link			= empty($_POST["detail_link"])		? null : $_POST["detail_link"];
	$video_link			= empty($_POST["video_link"])		? null : $_POST["video_link"];
	$id_user_created			= empty($_POST["id_user_created"])		? null : $_POST["id_user_created"];
	$id_user_updated			= empty($_POST["id_user_updated"])		? null : $_POST["id_user_updated"];
	
	$image="";

	$id_vendor=1;
	$id_user_created=1;
	$id_user_updated=1;
	$id_type_list=2;

	$filetemp			= empty($_FILES['image']['tmp_name'])		? 0 : $_FILES['image']['tmp_name'];
	
	 if($filetemp!=0)
	 {
			if(getimagesize($filetemp)==TRUE)
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
			$strSQL = ("DELETE FROM events_vendors WHERE id_events=".$val);
		//echo $strSQL;
			$DB->query($strSQL);
		}
	}
	 else if ($action == "add") {
		$strSQL		= "INSERT INTO events_vendors (id_vendor,id_type_list,title,from_date,to_date,description,";
		if($image!="")
		$strSQL		.="image,";

		$strSQL		.="detail_link,video_link,date_created,date_updated,id_user_created,id_user_updated) VALUES(
				\"".$id_vendor."\",
				\"".$id_type_list."\",
				\"".$title."\",
				\"".$from_date."\",
				\"".$to_date."\",
				\"".$description."\",";
		if($image!="")
		$strSQL		.=		"\"".$image."\",";
		
		$strSQL		.=		"\"".$detail_link."\",
				\"".$video_link."\",
				now(),
				now(),		
				\"".$id_user_created."\",
				\"".$id_user_created."\"
					)";
	//echo $strSQL;
	//exit;
		$DB->query($strSQL);	
	} else if ($action == "update") {
		
		
		$strSQL 	= "UPDATE events_vendors SET
				id_type_list				= \"".$id_type_list."\",
				title			= \"".$title."\",
				from_date			= \"".$from_date."\",
				to_date		= \"".$to_date."\",
				description					= \"".$description."\",";
				
		if($image!="")
		$strSQL .=	"image			= \"".$image."\",";
				
		$strSQL .=	"detail_link			= \"".$detail_link."\",
				video_link			= \"".$video_link."\",
				date_updated			= now(),
				id_user_updated			= \"".$id_user_updated."\"				
				WHERE id_events=".$id_events;
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);
	}
	$DB->close();
//exit;
	//echo "<script>location.replace('event.php?SearchField=".$SearchField."&SearchKeyword=".$SearchKeyword."&pp=".$pp."&act=".$view."&id_events=".$id_events."&submit=Submit');</script>";
	echo "<script>location.replace('event.php?&id_events=".$id_events."&menu=2');</script>";
?>
?>