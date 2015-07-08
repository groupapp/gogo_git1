<?php
	include "../include/function.php";
	$DB = new myDB;

	$action			= $_REQUEST["action"];
	$ColorID		= $_GET["id"];
	$ColorID2		= $_POST["ColorID"];
	$DisplayOrder	= $_POST["DisplayOrder"];
	$Color			= $_POST["Color"];
	$IsActive		= $_POST["IsActive"];
	
	if ($action == "del") {
		$DB->query("DELETE FROM Colors WHERE ColorID=".$ColorID);
	} elseif ($action == "add") {
		$strSQL		= ("INSERT INTO Colors (Color,IsActive) VALUES(
				\"".$Color."\",
				\"".$IsActive."\"
				)");
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);	
	} elseif ($action == "update") {
		
		$strSQL 	= ("UPDATE Colors SET
				Color		= \"".$Color."\",
				IsActive		= \"".$IsActive."\",
				DateTimeLastModified	= now()
				WHERE ColorID=".$ColorID2);
		//echo $strSQL;
		//exit;
		$DB->query($strSQL);	
	}
	
	$DB->close();
	echo "<script>window.opener.location.reload();window.close();</script>";
	//echo "<script>parent.location.reload();</script>";
	//echo "<script>location.replace('Manage_Colors.php');</script>";
?>