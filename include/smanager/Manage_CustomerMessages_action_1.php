<?php
	include "../include/function.php";
	$DB = new myDB;

	$action			= $_POST["action"];
	$MessageID		= $_POST["MessageID"];
	$SearchField	= $_POST["SearchField"];
	$SearchKeyword	= $_POST["SearchKeyword"];
	$IsThisResponded= $_POST["IsThisResponded"];	
	$GotoPage		= $_POST["GotoPage"];
	$ReplyMessage		= $_POST["ReplyMessage"];
	$Email		= $_POST["Email"];
	$ReplySubject		= $_POST["ReplySubject"];
	$pp				= $_POST["pp"];
	$view			= $_POST["view"];

	if ($action == "del" && isset($_POST["CheckedMessageIDs"])) {
		foreach($_POST["CheckedMessageIDs"] as $key => $val) {
			$strSQL = ("DELETE FROM MessagesFromCustomers WHERE MessageID=".$val);		
			$DB->query($strSQL);
		}
	}
	elseif($action == "update"){
		if($IsThisResponded=="Y"){
			$strSQL 	= ("UPDATE MessagesFromCustomers SET
				DateTimeResponded = now()
					WHERE MessageID=".$MessageID);

			$DB->query($strSQL);
		}	
	}	
	elseif($action == "reply"){
			$strSQL 	= ("UPDATE MessagesFromCustomers SET
				ReplyMessage		= \"".$ReplyMessage."\",
				DateTimeResponded = now()
					WHERE MessageID=".$MessageID);

			$DB->query($strSQL);
			
			$subject = $ReplySubject;
			$to=$Email;
			$message = $ReplyMessage;

			$headers  = 'MIME-Version: 1.0' . "\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
			$headers .= 'From: lemontreeclothing <info@lemontreeclothing.com>' . "\n";
			mail($to, $subject, $message, $headers);
			
	}
	$DB->close();
	echo "<script>location.replace('Manage_CustomerMessages.php?SearchField=" . $SearchField . "&SearchKeyword=" . $SearchKeyword . "&submit=Submit&pp=".$pp."&act=".$view."&aid=".$MessageID."');</script>";
?>