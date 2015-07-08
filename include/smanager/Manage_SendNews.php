<?php 
	require_once("../include/function.php"); 

	
	$MailID						= $_REQUEST["MailID"];
	
	$DB 	= new myDB;
	$DBm 	= new myDB;
	$DBm1 	= new myDB;

	
	


		
 
	$strSQLm1 = "SELECT * FROM Mails  WHERE MailID=".$MailID;
	//echo $strSQLm1;
	$DBm1->query($strSQLm1);
	
	while ($datam1 = $DBm1->fetch_array($DBm1->res)){
		$Subject=$datam1['Subject'];
		$Contents=$datam1['Contents'];	
	}
	$strSQL = "SELECT a.*,b.* FROM MailItems a,Products b WHERE a.ProductID=b.ProductID and a.MailID=".$MailID. " Order by a.SortNo";
	$DB->query($strSQL);
	
$subject = $Subject;

$message= 	'<style>
		  #sortable { list-style-type: none; margin: 0; padding: 0; width: 800px; }
		  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 0.0em; font-size: 1.4em; width: 170px;height: 280px;float: left;}
		  #sortable li span { position: absolute; margin-left: -1.3em; }
		  </style>
			<div id="sub4">
			<p><img src="http://lemontreeclothing.com/images/header_back.png" ></p>	
			<table>
					
					<tr >
						<td>
						<table style="margin-left:20px;"><tr><td  >'.  $Contents.'</td></tr></table>
						</td>
					</tr>

				<tr>
					<td colspan="3">';
	
	
 
		$n=1;
		$message.= "<div id=\"mailpro\" >";
		$message.= "<table width=\"100%\"><tr>";
		while ($data = $DB->fetch_array($DB->res)){
		
			//$message.= "<ul id=\"sortable\">";
			//$message.= "<li id=\"i_". $data["ProductID"] ."\" class=\"ui-state-default\"><span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			//$message.= "<input type=\"hidden\" name=\"productid[]\" id=\"productid\" value=\"" . $data["ProductID"] . "\"/>";

			$message.= "<td><table width=\"100%\">";
			$message.= "<tr><td class=\"general_c\">";
			$message.= $data["StyleNo"] ."<br/>";
			$message.= "$" . $data["UnitPriceOnSale"] . " &nbsp;(<s>$" . $data["UnitPrice"] . "</s>)";
			$message.= "</td></tr>";
			$message.= "<tr><td class=\"general_c\">";
			$message.= "<a href='http://lemontreeclothing.com?pid=".$data["ProductID"]."'>";
			if($data["Picture1"]!=null){
				$message.= "<img src=\"http://lemontreeclothing.com/Images_Products/" . $data["Picture1"] . "\" width=\"170\"  height=\"250\" border=\"0\"/>";
			}else{
				$message.= "<img src=\"http://lemontreeclothing.com/Images_Products/ComingSoon.jpg\" width=\"170\" height=\"250\" border=\"0\"/>";
			}
			$message.= "</a></td></tr>";
			//$message.= "<tr><td class=\"general_c\">";
			//$message.= $data["BrandName"] . "<br/>";
			//$message.= "<b>".substr($data["ProductName"], 0, 100)."</b>";
			//$message.= "</td></tr></table>";
			$message.= "</table>";
			//$message.= "</td>";
			if($n%4==0)
			$message.= "</tr><tr>";
			$n=$n+1;
			
		}
		//$message.= "</div>";
							
		//$message.=		"</td>";
		$message.=		"</tr>";
		$message.="<tr><td colspan='3'><table><tr><td>Note: You are receiving this email because you have created a profile on our web site and have indicated that you would like to subscribe to our newsletters. If you no longer wish to receive such emails simply log in to your account at https://wholesalefashionplace.com/account_newsletters.php uncheck the box for General Newsletter and click Continue.</td></tr></table></td></tr>";
		$message.=	"</table>";
		$message.="</div>";
//$message.="</body>"	;
 
$to="ttung33@hotmail.com";
				
				//$subject = 'LemontreeClothing Order Comment';

				$headers  = 'MIME-Version: 1.0' . "\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
				$headers .= 'From: LemontreeClothing.com <info@LemontreeClothing.com>' . "\n";
				//$message ='test';
//				mail($to, $subject, $message, $headers);


		/*		
		ini_set("SMTP","email.secureserver.net");
		ini_set("smtp_port","465");
		ini_set("auth_username","info@lemontreeclothing.com");
		ini_set("auth_password","$info4lemontree");
*/
		$xx=mail($to,$subject,$message,$headers);
	
		if($xx==true)
		echo $id."sent";
		else
		echo $id."no good";
	
//mail($to, $subject, $message, $headers);
	$DB->close();	//DB close
	$DBm1->close();	//DB close
echo "<script>location.replace('Manage_News.php?MailID=".$MailID."');</script>";
?>
