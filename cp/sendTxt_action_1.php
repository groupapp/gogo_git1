
<?php



$fcUserIDNO=$_POST['fcUserIDNO'];
$tcUserIDNO=$_POST['tcUserIDNO'];
$fcFistName=$_POST['fcFistName'];
$fcLastName=$_POST['fcLastName'];
$fcSuffixAT=$_POST['fcSuffixAT'];
$fcCellNumb=$_POST['fcCellNumb'];
$tcSuffixAT=$_POST['tcSuffixAT'];
$tcCellNumb=$_POST['tcCellNumb'];
$tcSubjectX=$_POST['tcSubjectX'];
$tcMessage=$_POST['tcMessage'];
$tcApply_OX=$_POST['tcApply_OX'];

//print_r('xx:'.$tcMessage);
//exit;

//$fcUserIDNO="ttung33@hotmail.com";
//$tcUserIDNO="5623945225@tmomail.net";

include('function.php'); 

$subject=$tcSubjectX;

//$headers  = 'MIME-Version: 1.0' . "\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From:'.$fcFistName.' '.$fcLastName.'<'.$fcUserIDNO.'>' . "\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
$message=$tcMessage;


	//$to=$tcUserIDNO;
	$to=$data_f["cCellNumb"].$data_f["cSuffixAT"];
	$xx=mail($to,$subject,$message,$headers);
		if($xx==true)
		$a= "Successful send text";
		else
		$a= "Failed send text";
	
echo "<script>alert('".$a."');location.replace('myaccount.php');</script>";	



	


?>






