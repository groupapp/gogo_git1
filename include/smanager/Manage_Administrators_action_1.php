<?php
include "../include/function.php";
$DB = new myDB;

$action			= $_POST["action"];
$AdminID		= $_POST["AdminID"];
$FirstName		= $_POST["FirstName"];
$LastName		= $_POST["LastName"];
$LoginID		= $_POST["LoginID"];
$LoginPassword	= $_POST["LoginPassword"];
$Notes			= htmlspecialchars($_POST["Notes"]);
$IsActive		= $_POST["IsActive"];
$button			= $_POST["button"];
$view			= $_POST["view"];


if ($action == "del" && isset($_POST["idtodel"])) {
	foreach($_POST["idtodel"] as $key => $val) {
		$DB->query("DELETE FROM WebsiteAdministrators WHERE AdminID=".$val);
	}
} elseif ($action == "add") {
	$strSQL		= ("INSERT INTO WebsiteAdministrators (FirstName,LastName,LoginID,LoginPassword,Notes,IsActive) VALUES(
			\"".$FirstName."\",
			\"".$LastName."\",
			\"".$LoginID."\",
			\"".$LoginPassword."\",
			\"".$Notes."\",
			\"".$IsActive."\"
			)");
	$DB->query($strSQL);	
} elseif ($action == "update" && !empty($AdminID)) {
	
	$strSQL 	= ("UPDATE WebsiteAdministrators SET
			FirstName		= \"".$FirstName."\",
			LastName		= \"".$LastName."\",
			LoginID			= \"".$LoginID."\",
			LoginPassword	= \"".$LoginPassword."\",
			Notes			= \"".$Notes."\",
			IsActive		= \"".$IsActive."\",
			DateTimeUpdated	= now()
			WHERE AdminID=".$AdminID);
	//echo $strSQL;
	//exit;
	$DB->query($strSQL);
}

$DB->close();
echo "<script>location.replace('Manage_Administrators.php?act=".$view."&aid=".$AdminID."');</script>";
?>