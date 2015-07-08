<?php 
/************************************
 *
*	Ajax color pick List
*
************************************/
include "../include/function.php";
$mode	= (isset($_POST['mode']))?$_POST['mode']:null;
$id_notices	= (isset($_POST['id_notices']))?$_POST['id_notices']:null;
$from_date	= (isset($_POST['from_date']))?$_POST['from_date']:null;
$from_time	= (isset($_POST['from_time']))?$_POST['from_time']:null;
$description	= (isset($_POST['description']))?$_POST['description']:null;
$detail_link	= (isset($_POST['detail_link']))?$_POST['detail_link']:null;



$DB = new myDB;
$cnt = 0;
$json ="";

switch ($mode) {

	case "notice":
		
	$strSQL = "UPDATE notices_vendors SET from_date='".$from_date."', from_time='".$from_time."',description='".$description."',detail_link='".$detail_link."' WHERE id_notices=".$id_notices;	
	$DB->query($strSQL);
		

	break;	
}
echo "1";

?>