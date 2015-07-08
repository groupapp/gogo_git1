<?php
	include "../include/function.php";
	$DB = new myDB;
	
	$id_vendor			= empty($_REQUEST["id_vendor"])		? null : $_REQUEST["id_vendor"];
	$action			= empty($_POST["action"])		? null : $_POST["action"];
	
	$id_address			= empty($_POST["id_address"])		? null : $_POST["id_address"];
	$address1			= empty($_POST["address1"])		? null : $_POST["address1"];
	$address2			= empty($_POST["address2"])		? null : $_POST["address2"];
	$zip_code			= empty($_POST["zip_code"])		? null : $_POST["zip_code"];
	$city				= empty($_POST["city"])		? null : $_POST["city"];
	$id_state			= empty($_POST["id_state"])		? null : $_POST["id_state"];
	$id_country			= empty($_POST["id_country"])		? null : $_POST["id_country"];
	$phone				= empty($_POST["phone"])		? null : $_POST["phone"];
	$fax				= empty($_POST["fax"])		? null : $_POST["fax"];
	$start_date			= empty($_POST["start_date"])		? null : $_POST["start_date"];
	$start_time			= empty($_POST["start_time"])		? null : $_POST["start_time"];
	$end_time			= empty($_POST["end_time"])		? null : $_POST["end_time"];
	
	

	//$id_vendor=1;
	$id_type_days=1;
	$id_type_open=1;
	$id_user_created=1;
	$id_user_updated=1;
	

	
	
	 if ($action == "add") {
		
		$id_vendor=2;
		$strSQL		= "INSERT INTO vendors_openhour (id_vendor,id_type_days,id_type_open,start_time,end_time,start_date,date_created,date_updated,id_user_created,id_user_updated) 
				VALUES(
				\"".$id_vendor."\",
				\"".$id_type_days."\",
				\"".$id_type_open."\",
				\"".$start_time[0]."\",
				\"".$end_time[0]."\",
				\"".$start_date[0]."\",
				now(),
				now(),		
				\"".$id_user_created."\",
				\"".$id_user_created."\"				
					)";
	//echo $strSQL;  id_vendor primary key :duplicate error 
	//exit;
		$DB->query($strSQL);	
	} else {
		
		$strSQL 	= "UPDATE address SET
				address1				= \"".$address1."\",
				address2			= \"".$address2."\",
				zip_code			= \"".$zip_code."\",
				city		= \"".$city."\",
				id_state		= \"".$id_state."\",
				id_country					= \"".$id_country."\",";
	
		$strSQL .=	"phone			= \"".$phone."\",
				fax			= \"".$fax."\",
				date_updated			= now(),
				id_user_updated			= \"".$id_user_updated."\"				
				WHERE id_address=".$id_address;
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);


		$i=0;
		foreach($_POST["start_date"] as $key => $val) {
			$strSQL = ("UPDATE events_vendors SET  start_time='".$_POST["start_time"][$i]."',end_time='".$_POST["end_time"][$i]."' WHERE id_vendor=".$id_vendor." and start_date=".$val);
			$DB->query($strSQL);
			$i=$i+1;
		}

		



	}
	$DB->close();
//exit;
	echo "<script>location.replace('market.php?id_vendor=".$id_vendor."&menu=3');</script>";
	//echo "<script>location.replace('bang.php?SearchField=".$SearchField."&SearchKeyword=".$SearchKeyword."&pp=".$pp."&act=".$view."&id_bangs=".$id_bangs."&submit=Submit');</script>";
?>