<?php
/**********************************************
*		@author : 		    Michael
*		@detail :			Common functions
*		@copyright :		2012
**********************************************/
session_start();
date_default_timezone_set('America/Los_Angeles');


Class myUpload {

	public  $uploaddir;
	public  $allow_ext = array('png','jpeg','gif','jpg');
	public 	$arrArg = array();
	public  $uploadfile;
	private $file_name;
	private $file_name1;
	private $mime_name;
	private $tmp_name;
	private $size;
	private	$baseUploadDir = "/Images_Products/";
	private $strupload;
	private $thumbpath;



    function __construct() {
		$this->uploaddir = date("Y-m");
		/*
		foreach($this->myfile['name'] as $key => $val) {
			if ($val!="") {
				$temp 	= explode(".",$this->myfile['name'][$key]);
				$tstamp = microtime(true)*10000;
				$this->arrArg[] = array(
						'uploadfile' 	=> $this->uploaddir . "/" . strtolower(str_replace(" ", "_", $temp[0]) . "-" . $tstamp . "." . $temp[1]),
						'file_name1'	=> strtolower($this->myfile['name'][$key]),
						'mime_name'		=> basename($this->myfile['type'][$key]),
						'size'			=> basename($this->myfile['size'][$key]),
						'tmp_name'		=> $this->myfile['tmp_name'][$key],
						'file_name'		=> strtolower(str_replace(" ", "_", $temp[0])) . "-" . $tstamp . "." . strtolower($temp[1]),
						'ext'			=> strtolower($temp[1]),
						'flag'			=> 0
				);
			}
		}
		*/
	}

	function setBaseDir($strDir) {
		$this->baseUploadDir = $strDir;
	}

	function validate($ext) {
		if(!in_array($ext,$this->allow_ext)) {
			return false;
		} else {
			return true;
		}
	}

	function upload($file) {
		if(!is_dir($_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->uploaddir)) {
			mkdir($_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->uploaddir, 0777);
		}
		$temp 	= explode(".",$file['name']);
		$tstamp = microtime(true)*10000;
		$this->uploadfile	= $this->uploaddir . "/" . strtolower(str_replace(" ", "_", $temp[0]) . "-" . $tstamp . "." . $temp[1]);
		$this->thumbpath	= $this->uploaddir . "/thumb_" . strtolower(str_replace(" ", "_", $temp[0]) . "-" . $tstamp . "." . $temp[1]);
		$this->file_name1	= strtolower($file['name']);
		$this->mime_name	= basename($file['type']);
		$this->size			= basename($file['size']);
		$this->tmp_name		= $file['tmp_name'];
		$this->file_name	= strtolower(str_replace(" ", "_", $temp[0])) . "-" . $tstamp . "." . strtolower($temp[1]);
		$this->ext			= strtolower($temp[1]);
		if ($this->validate($this->ext)) {
			$this->strupload = $_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->uploadfile;
			if (move_uploaded_file($this->tmp_name ,$this->strupload)) {
				$this->createThumb($this->strupload, 300);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function createThumb($image="", $width=300)
	{
		$src	= ($image) ? $image : $this->strupload;
		$target	= $_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->thumbpath;
		$info 	= pathinfo($src);
		
		if (strtolower($info['extension']) == 'jpg' || strtolower($info['extension']) == 'jpeg') {
			$img 		= @imagecreatefromjpeg("{$src}");
		} elseif (strtolower($info['extension']) == 'gif') {
			$img 		= @imagecreatefromgif("{$src}");
		} elseif (strtolower($info['extension']) == 'png') {
			$img 		= @imagecreatefrompng("{$src}");
		}
		
		$src_width	= imagesx($img);
		$src_height	= imagesy($img);

		$new_width	= $width;
		$new_height	= floor($src_height * ($width/$src_width));

		$tmp_img	= imagecreatetruecolor($new_width, $new_height);
		imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $src_width, $src_height);
		
		if (strtolower($info['extension']) == 'jpg' || strtolower($info['extension']) == 'jpeg') {
			imagejpeg( $tmp_img, "{$target}");
		} elseif (strtolower($info['extension']) == 'gif') {
			imagegif( $tmp_img, "{$target}");
		} elseif (strtolower($info['extension']) == 'png') {
			imagepng( $tmp_img, "{$target}");
		}
		
	}

	function __destruct() {
		unset($_FILES);
	}

}



?>
