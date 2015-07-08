<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$action		= $_REQUEST["action"];
	$navleft	= $_REQUEST["nl"];
	$Banner1	= $_REQUEST["id"];
	$Banner2	= $_REQUEST["BannerID"];
	$IsActive	= $_POST["IsActive"];
	$Name		= $_POST["Name"];
	$FromDate	= $_POST["FromDate"];
	$Url		= $_POST["Url"];
	$BannerImg	= $_FILES["BannerImg"];
	$DispOrder	= $_POST["display_order"];
	$BannerType	= $_POST["banner_type"];
	$text1		= $_POST["text1"];
	$text2		= $_POST["text2"];
	
	$ToDate		= $_POST["ToDate"];
	$button		= $_POST["button"];
	$view		= $_POST["view"];

//echo $BannerImg;
//exit;	
	if($FromDate!='')
		$fr_date=date('Y-m-d',strtotime($FromDate));
	if($ToDate!='')
		$to_date=date('Y-m-d',strtotime($ToDate));


	
	if($action == "del"){
		$strSQL = ("DELETE FROM banner_promotion Where id_banner=".$Banner1);		
		$DB->query($strSQL);
	}
	elseif($action == "add"){
		$Obj = new myUpload();
			$Obj->setBaseDir("/images/banner/");
			$Obj->upload($BannerImg);
		
		$strSQL = ("INSERT INTO banner_promotion (active, banner_name,banner_image,url,from_date,to_date,banner_type,display_order,text1,text2)
					VALUES(
						\"".$IsActive."\",
						\"".$Name."\",
						\"".$Obj->uploadfile."\",
						\"".$Url."\",
						\"".$fr_date."\",
						\"".$to_date."\",
						\"".$BannerType."\",
						\"".$DispOrder."\",
						\"".$text1."\",
						\"".$text1."\"
					)");

		$DB->query($strSQL);
	}
	elseif ($action == "update"){
		
		
		if ($BannerImg['size']>0)
		{
			$Obj = new myUpload();
			$Obj->setBaseDir("/images/banner/");
			$Obj->upload($BannerImg);
			
		$strSQL = ("UPDATE banner_promotion SET
						active		= \"".$IsActive."\",
						banner_name			= \"".$Name."\",
						banner_type		= \"".$BannerType."\",
						banner_image		= \"".$Obj->uploadfile."\",
						display_order	= \"".$DispOrder."\",
						text1			= \"".$text1."\",
						text2			= \"".$text2."\",
						url				= \"".$Url."\",
						from_date		= \"".$fr_date."\",
						to_date			= \"".$to_date."\",
						date_updated = now()
						WHERE id_banner=".$Banner2);
		}
		else
		{
			$strSQL = ("UPDATE banner_promotion SET
						active		= \"".$IsActive."\",
						banner_name			= \"".$Name."\",
						banner_type		= \"".$BannerType."\",
						display_order	= \"".$DispOrder."\",
						text1			= \"".$text1."\",
						text2			= \"".$text2."\",
						url				= \"".$Url."\",
						from_date		= \"".$fr_date."\",
						to_date			= \"".$to_date."\",
						date_updated = now()
						WHERE id_banner=".$Banner2);
		}
		$DB->query($strSQL);
	}
	
	
	$DB->close();
	echo "<script>location.replace('Manage_Banner.php?nl=".$navleft."&act=".$view."&aid=".$Banner2."');</script>";
?>