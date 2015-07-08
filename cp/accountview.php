<?php 
	// Connect to your Database 
	
	//mysql_connect("localhost", "root", "kshlyh0409") or die(mysql_error()); 
	//mysql_select_db("eworldbaby") or die(mysql_error()); 

	$cUser_Num=$_GET['cUser_Num'];
	
	include('function.php');

	$DB = new myDB;
	$strSQL="SELECT * FROM acc_user  where cUser_Num='".$cUser_Num."'";
	//print_r($strSQL);
	$DB->query($strSQL);
	while($data = $DB->fetch_array($DB->res)) {	
		$cSponsorX=$data["cSponsorX"];
		$cUser_Num=$data["cUser_Num"];
		$cFistName=$data["cFistName"];
		$cLastName=$data["cLastName"];
		$cCellNumb=$data["cCellNumb"];
		$cAddressX=$data["cAddressX"];
		$cCityName=$data["cCityName"];
		$cProvince=$data["cProvince"];
		$cZipsCode=$data["cZipsCode"];
		$cPassword=$data["cPassword"];
		$cSuffixAT=$data["cSuffixAT"];
		$nSMS_Numb=$data["nSMS_Numb"];		
		$cEmail=$data["cUserIDNO"];
		$cOpenDate=$data["cOpenDate"];
		$cDeadDate=$data["cDeadDate"];
	}
	
//print_r($nSMS_Numb);
//exit;

?>
<!DOCTYPE html> 
<html>
<head>
	<title>View</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body style="font-size:13px">
	<table border="0" cellspacing="1" cellpadding="0">
	<tr>
	<td>
	Sender
	</td>
	<td>
	<?php echo $cSponsorX?>
	</td>
	</tr>

	<tr>
	<td>
	ID
	</td>
	<td>
	<?php echo $cUser_Num?>
	</td>
	</tr>

	<tr>
	<td>
	First Name
	</td>
	<td>
	<?php echo $cFistName?>
	</td>
	</tr>

	<tr>
	<td>
	Last Name
	</td>
	<td>
	<?php echo $cLastName?>
	</td>
	</tr>

	<tr>
	<td>
	Email
	</td>
	<td>
	<?php echo $cEmail?>
	</td>
	</tr>

	<tr>
	<td>
	Moblie Phone
	</td>
	<td>
	<?php echo $cCellNumb?>
	</td>
	</tr>
	<tr>
	<td>
	Carriers
	</td>
	<?php 
	$smsSQL = "SELECT * FROM spt_SMS  WHERE cCountryX = 'US' Order BY nSortNo";	
		$sDB = new myDB;
		//print_r($smsSQL);		
		$sDB->query($smsSQL);

	echo '<td>';
	//echo '<select name="tnSMS_Numb" size="1" class="inputorder">'; 
    //	 echo '<option value="">Wireless Carrier</option>';
		  while ($sdata = $sDB->fetch_array($sDB->res)){
			  //echo '<option value="'.$sdata["nSMS_Numb"].'"' .($nSMS_Numb==(int)$sdata["nSMS_Numb"]?"selected=selected":"") .'>'.$sdata["cCarriers"].'</option>';
			if($nSMS_Numb==(int)$sdata["nSMS_Numb"])
			echo $sdata["cCarriers"];
				
	   }
		 ?>
		       <!-- <option value="00" <?php if ($nSMS_Numb==0) echo "selected=selected";?>>I don't know.</option>

          </select>-->
	</td>
	</tr>
	<tr>
	<td>
	Join date
	</td>
	<td>
	<?php echo $cOpenDate?>
	</td>
	</tr>
	<tr>
	<td>
	Last Visit
	</td>
	<td>
	<?php echo $cDeadDate?>
	</td>
	</tr>
	<!--<tr>
	<td>
	State
	</td>
	<td>
	<?php echo $cProvince?>
	</td>
	</tr>
	<tr>
	<td>
	Zip Code
	</td>
	<td>
	<?php echo $cZipsCode?>
	</td>
	</tr>-->
	

	

	
	
	</table>
	
</body>
</html>