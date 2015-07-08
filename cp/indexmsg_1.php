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
$tcUserIDNO="contact@bigtms.com";

include('function.php'); 

$subject='Contact form('.$tcSubjectX.')';

$headers  = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From:'.$fcFistName.' '.$fcLastName.'<'.$fcUserIDNO.'>' . "\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
$message=$tcMessage;


/*if($tcApply_OX=="all")
{
	$strSQL_f = "SELECT * FROM acc_user"; 
	$DB = new myDB;
	$DB->query($strSQL_f);
	while ($data_f = $DB->fetch_array($DB->res)){
		$to=$data_f["cUserIDNO"];
		//$toFistName=$data_f["cFistName"];
		//$toLastName=$data_f["cLastName"];
		mail($to, $subject, $message, $headers);
	}
	$DB->close();
}
else
{*/
	$to=$tcUserIDNO;
	mail($to, $subject, $message, $headers);

//}	
	
echo "<script>alert('Message sent');location.replace('contactus.php');</script>";	
	


?>






