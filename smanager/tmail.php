<?php
				$to="ttung33@hotmail.com";
				
				$subject = 'LemontreeClothing Order Comment';

				$headers  = 'MIME-Version: 1.0' . "\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
				$headers .= 'From: LemontreeClothing.com <info@LemontreeClothing.com>' . "\n";
				$message ='test';
//				mail($to, $subject, $message, $headers);


				
		ini_set("SMTP","email.secureserver.net");
		ini_set("smtp_port","465");
		ini_set("auth_username","info@lemontreeclothing.com");
		ini_set("auth_password","$info4lemontree");

		$xx=mail($to,$subject,$message,$headers);
		if($xx==true)
		echo $id."sent";
		else
		echo $id."no good";

?>
