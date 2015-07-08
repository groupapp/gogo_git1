<?php
	include "../include/function.php";
	$BannerImg	= $_FILES["BannerImg"];
	
	
		$Obj = new myUpload();
			$Obj->setBaseDir("/images/banner/");
			$Obj->upload($BannerImg);
	echo "<script>location.replace('Manage_Banner.php?nl=".$navleft."&act=".$view."&aid=".$Banner2."');</script>";
?>