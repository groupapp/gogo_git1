<?php

//set_time_limit(180);

$db = mysql_connect("localhost","lemontree","%db4Lemontree");


mysql_select_db("egcjc584_sshop1",$db);


$result=mysql_query("select ID,email from mail where ID>33693" ,$db);

mysql_fetch_array($result);

    while($row=mysql_fetch_array($result)){
	 $id= trim($row['ID']);
	 //echo $id;
	 $email= trim($row['email']);

	  $to = $email;
	  //$to = "ttung33@hotmail.com";
		$subject = "NEW ARRIVAL LEGGINGS, JOGGER, KID LEGGINGS ENTIRE STORE 50% OFF SALE!!";
		$message ='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> la12st </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>

 <body>
  <img src="http://lemontreeclothing.com/mailchk.php?email='.$email.'" width=1 height=1>
 <table border="0" cellpadding="0" cellspacing="0" width="780" >	
 <tr>
 <td>
  <a href="http://la12st.com" target="_blank" >
  <img src="http://la12st.com/img/la12st-1410059444.jpg" border="0"  style=" height: 177px;padding: 10px;" width="232" ></a>
 </td>
  <td>
  <a href="http://la12st.com" target="_blank" >
  <img src="http://la12st.com/modules/homeslider/images/257e0fd6278d68ebf71efac2e60e6ab3964419c7_50-off2.jpg" border="0"  width="802" height="202"></a>
 </td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="780" style="border:1px solid #dddddd;background:#ffffff">	
 
<tr>
<td align="center" valign="top"></td>
</tr>
<tr>
<td align="center" valign="top">
<table border="0" cellpadding="15" cellspacing="0" width="780">
<tbody>
<tr>
<td valign="top" align="center">
<table border="0" cellpadding="15" cellspacing="0" width="93%">
<tbody>
<tr><td valign="middle">
<table border="0" width="100%" cellpadding="" cellspacing="3">
<tbody>
<tr>
<!-- 1st line-->
<td align="center" valign="top" width="25%">
<a href="http://la12st.com/plus-size-leggings/96-a1081.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/175-thickbox_default/a1081.jpg" width="240" height="240" border="0" alt="A1081" title="A1081"><br>
A1081</a>
<br>
<span>$2.00</span></td>

<td align="center" valign="top" width="25%">
<a href="http://la12st.com/leggings/98-a1083.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/178-thickbox_default/a1083.jpg" width="240" height="240" border="0" alt="A1083" title="A1083"><br>
A1083</a>
<br>
<span>$2.00</span></td>

<td align="center" valign="top" width="25%">
<a href="http://la12st.com/home/182-a1189.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/241-thickbox_default/a1189.jpg" width="240" height="240" border="0" alt="A1189" title="A1189"><br>
A1189</a>
<br><span>$2.00</span></td>

<td align="center" valign="top" width="25%">
<a href="http://la12st.com/home/255-a1113.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/313-thickbox_default/a1113.jpg" width="240" height="240" border="0" alt="A1113" title="A1113"><br>
A1113</a>
<br><span>$1.99</span></td></tr>

<!-- 2nd line-->
<tr>
<td align="center" valign="top" width="25%">
<a href="http://la12st.com/fur-leggings/260-ap1112.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/321-thickbox_default/ap1112.jpg" width="240" height="240" border="0" alt="AP1112" title="AP1112"><br>
AP1112</a>
<br><span>$3.50</span></td>

<td align="center" valign="top" width="25%">
<a href="http://la12st.com/fur-leggings/261-ap1114.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/323-thickbox_default/ap1114.jpg" width="240" height="240" border="0" alt="AP1114" title="AP1114"><br>
AP1114</a><br>
<span>$3.50</span></td>

<td align="center" valign="top" width="25%">
<a href="http://la12st.com/fur-leggings/262-ap1115.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/325-thickbox_default/ap1115.jpg" width="240" height="240" border="0" alt="AP1115" title="AP1115"><br>
AP1115</a>
<br><span>$3.50</span></td>

<td align="center" valign="top" width="25%">
<a href="http://la12st.com/home/199-f1177.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/258-thickbox_default/f1177.jpg"  width="240" height="240" border="0" alt="F1177" title="F1177"><br>
F1177</a>
<br><span>$3.50</span></td></tr>

<!-- 3rd line-->
<tr>
<td align="center" valign="top" width="25%">
<a href="http://la12st.com/home/200-f1178.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/259-thickbox_default/f1178.jpg" width="240" height="240" border="0" alt="F1178" title="F1178"><br>
F1178</a>
<br><span>$3.50</span></td>

<td align="center" valign="top" width="25%"><a href="http://la12st.com/home/215-f1194.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/274-thickbox_default/f1194.jpg" width="240" height="240" border="0" alt="F1194" title="F1194"><br>
F1194</a>
<br><span>$3.50</span></td>
<td align="center" valign="top" width="25%">
<a href="http://la12st.com/kid-leggings/156-chp1143.html" class="product_img_link" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/205-thickbox_default/chp1143.jpg" width="240" height="240" border="0" alt="C1001" title="C1001"><br>
C1001</a>
<br><span>$2.75</span></td>
<td align="center" valign="top" width="25%"><a href="http://la12st.com/kid-leggings/157-chp1144.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/206-thickbox_default/chp1144.jpg" width="240" height="240" border="0" alt="C1003" title="C1003"><br>
C1003</a>
<br><span>$2.75</span></td></tr>



<!-- 4th line-->
<tr>
<td align="center" valign="top" width="25%"><a href="http://la12st.com/kid-leggings/163-chp1151.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/212-thickbox_default/chp1151.jpg" width="240" height="240" border="0" alt="C1010" title="C1010"><br>
C1010</a>
<br><span>$2.75</span></td>

<td align="center" valign="top" width="25%"><a href="http://la12st.com/kid-leggings/217-ch1121.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/275-thickbox_default/ch1121.jpg" width="240" height="240" border="0" alt="CH1121" title="CH1121"><br>
CH1121</a>
<br><span>$1.75</span></td>

<td align="center" valign="top" width="25%"><a href="http://la12st.com/kid-leggings/237-ch1181.html" class="product_img_link" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/295-thickbox_default/ch1181.jpg" width="240" height="240" border="0" alt="CH1181" title="CH1181"><br>
CH1181</a>
<br><span>$1.75</span></td>

<td align="center" valign="top" width="25%"><a href="http://la12st.com/kid-leggings/240-ch1184.html" style="color:#555555;text-decoration:none" target="_blank">
<img src="http://la12st.com/298-thickbox_default/ch1184.jpg" width="240" height="240" border="0" alt="CH1184" title="CH1184"><br>
CH1184</a><br><span>$1.75</span></td></tr>




<!--<tr>
<td colspan="4"><br>
<font>Note: </font>
</td>
</tr>-->
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
 
 </body>
</html>
' 
;
		//$from = "brain@openprice.com";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: la12st 
		<info@la12st.com>\r\n";
		//$headers = "From:" . $from;
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
		//echo '<p>Id:$IDsent<p>';

	 		
	 }
 
mysql_close($db);

?>
