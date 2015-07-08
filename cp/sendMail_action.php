
<?php


$fcUserIDNO=$_POST['fcUserIDNO'];
$tcUserIDNO=$_POST['tcUserIDNO'];
$fcFistName=$_POST['fcFistName'];
$fcLastName=$_POST['fcLastName'];
$tcSubjectX=$_POST['tcSubjectX'];
$tcMessage=$_POST['tcMessage'];
$tcApply_OX=$_POST['tcApply_OX'];

//print_r('xx:'.$tcMessage);
//exit;

//$fcUserIDNO="ttung33@hotmail.com";
//$tcUserIDNO="fxskin1@gmail.com";

include('function.php'); 

$subject=$tcSubjectX;

$headers  = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From:'.$fcFistName.' '.$fcLastName.'<'.$fcUserIDNO.'>' . "\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
$message=$tcMessage;




	$to=$tcUserIDNO;
/*print_r($to."/");
print_r($subject."/");
print_r($message."/");print_r($headers."/");

exit;*/
	//mail($to, $	subject, $message, $headers);

	$xx=mail($to,$subject,$message,$headers);
		if($xx==true)
		$a= "Successful send email";
		else
		$a= "Failed send email";
	
echo "<script>alert('".$a."');location.replace('myaccount.php');</script>";	
	


?>






