
<body>
<?php 
$tcUserIDNO=$_GET['tcUserIDNO'];


include('function.php');

$DB = new myDB;

$strSQL = "SELECT * FROM acc_user  WHERE cUserIDNO = '".$tcUserIDNO."'";	
//print_r($strSQL);		
$DB->query($strSQL);

while ($data = $DB->fetch_array($DB->res)){
		$tcSponsorX=$data["cSponsorX"];
		$tcUser_Num=$data["cUser_Num"];
		$tcUserIDNO=$data["cUserIDNO"];
		$tcPassXxxx=$data["cPassword"];
	   }

   $html = "<!doctype html><html><head><meta http-equiv=content-type content=text/html; charset=UTF-8>";
   $html .= "<style type=text/css><!-- body, td  {font-size: 12pt; font-fmaily:Tahoma,Arial;  COLOR:black;text-decoration: none} --></style>";
   $html .=  "</head><body>";
   $html .=  "<font face=Tahoma size=2>Hello.<br> ";
   $html .= "Per your request,<br><br>";

   $html .=  "Your Sponsor ID  : ".$tcSponsorX."<br>";
   $html .=	"Your Member ID  : ".$tcUser_Num. "<br>";
   $html .= "Your E-mail  : ".$tcUserIDNO."<br>";
   $html .= "Your Password : ".$tcPassXxxx."<br><br>";
   $html .="If you would like to find out more about our bigtms services,<br> Please visit our website at <a href=http://www.bigtms.com>www.bigtms.com</a><br>";
   $html .= "If you have any questions, Please send an e-mail to <a href=mailto:contact@bigtms.com ></a>contact@bigtms.com<br>";
   $html .=  "Regards<br>";
   $html .= "Bigtms Customer Service.</font>";
   $html .= "</body>";
   $html .= "</html>";

   $headers  = 'MIME-Version: 1.0' . "\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
   $headers .= 'From:<contact@bigtms.com>' . "\n";
   
   $subject = "BigTMS.com:Customer Service";
   $to=$tcUserIDNO;
	mail($to, $subject, $html, $headers);



$DB->close();
	

echo "<script>alert('We send your password.');location.replace('index.php');</script>";	
?>

