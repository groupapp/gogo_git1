<?php


require_once("../include/function.php");
$DB = new myDB;
$image	= (isset($_POST['image']))?$_POST['image']:null;
/*
$DB = new myDB;
$DBi = new myDB;
$contact_id=$_REQUEST['contact_id'];
$error					= false;
*/
$absolutedir			= dirname(__FILE__);
$dir					= '/tmp/';
$delfile				= $absolutedir.$dir.$image;

unlink($delfile);

$strSQLi = "UPDATE contacts SET img= ''	   WHERE img='".$image."'" ;					
						
		//print_r($strSQLi);
			$DB->query($strSQLi);

echo "1";
/*

$filename				= array();



//print_r('###'.$_POST['thumb_values']);
//print_r('###'.$_POST['thumb1_values']);




foreach($_FILES as $name => $value) {
	//print_r($_POST[$name.'_values']);
	if(!empty($_POST[$name.'_values']))
	{
		$json					= json_decode($_POST[$name.'_values']);

		//echo var_dump($json);
		$tmp					= explode(',',$json->data);
		$imgdata 				= base64_decode($tmp[1]);
		
		$extension				= strtolower(end(explode('.',$json->name)));
		$fname					= substr($json->name,0,-(strlen($extension) + 1)).'.'.substr(sha1(time()),0,6).'.'.$extension;
		
		
		
		
		$rfname					= substr($json->name,0,-(strlen($extension) + 1)).'.'.$extension;
			
		
		$handle					= fopen($serverdir.$fname,'w');
		fwrite($handle, $imgdata);
		fclose($handle);

		//print_r($json->alt);

		$strSQLi = "UPDATE contacts SET img= \"".$fname."\"
						WHERE contact_id=".$json->alt;					
						
		//print_r($strSQLi);
			$DBi->query($strSQLi);

		
		$filename[]				= $fname;
		$rfilename[]				= $rfname;
		
		
	}
}

*/


?>


