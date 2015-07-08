<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action		= $_REQUEST["action"];	
	$Clock1	= $_REQUEST["id"];
	$Clock2	= $_REQUEST["ClockID"];
	$IsActive	= $_POST["IsActive"];
	$Name	= $_POST["Name"];
	$ClockImg	= $_FILES["ClockImg"];	
	$cssName	= $_POST["cssName"];
	$hexColor	= $_POST["hexColor"];
	$TargetDate	= $_POST["TargetDate"];
	$button		= $_POST["button"];
	$view		= $_POST["view"];

//echo $BannerImg;
//	echo $TargetDate."<br/>";
//	exit;	
	
	if($TargetDate!='')
		$tr_date=date('Y-m-d H:i:s',strtotime($TargetDate));


	
	if($action == "del"){
		$strSQL = ("DELETE FROM ClockImg Where ClockID=".$Clock1);		
		$DB->query($strSQL);
	}
	elseif($action == "add"){
		$Obj = new myUpload();
			$Obj->setBaseDir("/images/banner/");
			$Obj->upload($ClockImg);
		
		$strSQL = ("INSERT INTO ClockImg (IsActive, Name, ClockImg, cssName, TargetDate)
					VALUES(
						\"".$IsActive."\",
						\"".addslashes($Name)."\",
						\"".$Obj->uploadfile."\",
						\"".$cssName."\",
						\"".$hexColor."\",
						\"".$tr_date."\"
					)");

		$DB->query($strSQL);
	}
	elseif ($action == "update"){
		 
		
		if ($ClockImg['size']>0)
		{
			$Obj = new myUpload();
			$Obj->setBaseDir("/images/banner/");
			$Obj->upload($ClockImg);
			
		$strSQL = ("UPDATE ClockImg SET
						IsActive	= \"".$IsActive."\",
						Name		= \"".addslashes($Name)."\",
						ClockImg		= \"".$Obj->uploadfile."\",
						cssName			= \"".$cssName."\",
						hexColor		= \"".$hexColor."\",
						TargetDate		= \"".$tr_date."\",
						DateTimeLastModified = now()
						WHERE ClockID=".$Clock2);
		}
		else
		{
			$strSQL = ("UPDATE ClockImg SET
						IsActive	= \"".$IsActive."\",
						Name		= \"".$Name."\",
						cssName			= \"".$cssName."\",
						hexColor		= \"".$hexColor."\",
						TargetDate		= \"".$tr_date."\",
						DateTimeLastModified = now()
						WHERE ClockID=".$Clock2);
		}
		$DB->query($strSQL);
	}
	
	
	$DB->close();
	echo "<script>location.replace('Manage_Clock_Image.php?act=".$view."&aid=".$Clock2."');</script>";
?>