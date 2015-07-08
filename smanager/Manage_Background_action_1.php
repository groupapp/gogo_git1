<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action			= $_REQUEST["action"];	
	$BackgroundID	= $_REQUEST["id"];
	$bgID			= $_POST["BackgroundID"];
	$IsActive		= $_POST["IsActive"];
	$Name			= $_POST["Name"];
	$FromDate		= $_POST["FromDate"];
	$Color			= $_POST["bgColor"];
	$Repeat			= $_POST["bgRepeat"];
	$searchColor	= $_POST["searchColor"];
	$BackgroundImg	= $_FILES["BackgroundImg"];
	
	$ToDate			= $_POST["ToDate"];
	$button			= $_POST["button"];
	$view			= $_POST["view"];

//echo $BannerImg;
//exit;	
	if($FromDate!='')
		$fr_date=date('Y-m-d',strtotime($FromDate));
	if($ToDate!='')
		$to_date=date('Y-m-d',strtotime($ToDate));


	
	if($action == "del"){
		$strSQL = ("DELETE FROM Background Where BackgroundID=".$BackgroundID);		
		$DB->query($strSQL);
	}
	elseif($action == "add"){
		$Obj = new myUpload();
			$Obj->setBaseDir("/images/background/");
			$Obj->upload($BackgroundImg);
		
		$strSQL = ("INSERT INTO Background (IsActive, Name, BackgroundImg, BackgroundColor, BackgroundRepeat, SearchboxColor, FromDate, ToDate)
					VALUES(
						\"".$IsActive."\",
						\"".$Name."\",
						\"".$Obj->uploadfile."\",
						\"".$Color."\",
						\"".$Repeat."\",
						\"".$searchColor."\",
						\"".$fr_date."\",
						\"".$to_date."\"
					)");

		$DB->query($strSQL);
	}
	elseif ($action == "update"){
		
		
		if ($BackgroundImg['size']>0)
		{
			$Obj = new myUpload();
			$Obj->setBaseDir("/images/banner/");
			$Obj->upload($BackgroundImg);
			
		$strSQL = ("UPDATE Background SET
						IsActive			= \"".$IsActive."\",
						Name				= \"".$Name."\",
						BackgroundImg		= \"".$Obj->uploadfile."\",
						BackgroundColor		= \"".$Color."\",
						BackgroundRepeat	= \"".$Repeat."\",
						SearchboxColor		= \"".$searchColor."\",
						FromDate			= \"".$fr_date."\",
						ToDate				= \"".$to_date."\",
						DateTimeLastModified = now()
						WHERE BackgroundID	=".$bgID);
		}
		else
		{
			$strSQL = ("UPDATE Background SET
						IsActive			= \"".$IsActive."\",
						Name				= \"".$Name."\",
						BackgroundColor		= \"".$Color."\",
						BackgroundRepeat	= \"".$Repeat."\",
						SearchboxColor		= \"".$searchColor."\",
						FromDate			= \"".$fr_date."\",
						ToDate				= \"".$to_date."\",
						DateTimeLastModified = now()
						WHERE BackgroundID	=".$bgID);
		}
		$DB->query($strSQL);
	}
	
	
	$DB->close();
	echo "<script>location.replace('Manage_Background.php?act=".$view."&aid=".$bgID."');</script>";
?>