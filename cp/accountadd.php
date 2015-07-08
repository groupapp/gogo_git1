<?php 
	// Connect to your Database 
	
	//mysql_connect("localhost", "root", "kshlyh0409") or die(mysql_error()); 
	//mysql_select_db("eworldbaby") or die(mysql_error()); 

	$cUser_Num=$_GET['cUser_Num'];
	
	include('function.php');

	
//print_r($nSMS_Numb);
//exit;


?>
<!DOCTYPE html> 
<html>
<head>
	<title>Add</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body style="font-size:13px">
	<form action="showdetails_action.php" method="post" >
	<input type="hidden" name="cUser_Num" value="<?php echo $cUser_Num?>">
	<input type="hidden" name="action" value="add">
	<table border="0" cellspacing="1" cellpadding="0">
	<tr>
	<td>
	Sender
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
	<input type="text" name="cFistName" value="" placeholder="First Name *">
	</td>
	</tr>

	<tr>
	<td>
	Last Name
	</td>
	<td>
	<input type="text" name="cLastName" value="" placeholder="Last Name *">
	</td>
	</tr>

	<tr>
	<td>
	Email
	</td>
	<td>
	<input type="text" name="cEmail" value="" placeholder="Email *">
	</td>
	</tr>

	<tr>
	<td>
	Moblie Phone
	</td>
	<td>
	<input type="text" name="cCellNumb" value="" placeholder="Moblie Phone">
	</td>
	</tr>
	<tr>
	<td>
	Carriers
	</td>
	<?php 
	$sDB = new myDB;
	$smsSQL = "SELECT * FROM spt_SMS  WHERE cCountryX = 'US' Order BY nSortNo";	
	
		//print_r($smsSQL);		
		$sDB->query($smsSQL);

	echo '<td>';
	echo '<select name="tnSMS_Numb" size="1" class="inputorder">'; 
    	 echo '<option value="">Wireless Carrier</option>';
		  while ($sdata = $sDB->fetch_array($sDB->res)){
			  echo '<option value="'.$sdata["nSMS_Numb"].'" >'.$sdata["cCarriers"].'</option>';
		
		
	   }
		 ?>
		  

                    <option value="00" <?php if ($nSMS_Numb==0) echo "selected=selected";?>>I don't know.</option>

          </select>
	</td>
	</tr>

	<!--<tr>
	<td>
	Address
	</td>
	<td>
	<input type="text" name="cAddressX" value="<?php echo $cAddressX?>" style="width:300px;">
	</td>
	</tr>
	<tr>
	<td>
	City
	</td>
	<td>
	<input type="text" name="cCityName" value="<?php echo $cCityName?>" style="width:300px;">
	</td>
	</tr>
	<tr>
	<td>
	State
	</td>
	<?php 
	$tDB = new myDB;
	$stateSQL = "SELECT * FROM tcState ";	
	
		//print_r($smsSQL);		
		$tDB->query($stateSQL);

	echo '<td><select name="cProvince" size="1" class="inputorder">'; 
		 echo '<option value="">--Select--</option>';
		  while ($tdata = $tDB->fetch_array($tDB->res)){
			  echo '<option value="'.$tdata["iso"].'"' .($cProvince==$tdata["iso"]?"selected=selected":"") .'>'.$tdata["name"].'</option>';
			   }
			echo '</select>';
	    $tDB->close();
		 ?>

	</td>
	</tr>
	<tr>
	<td>
	Zip Code
	</td>
	<td>
	<input type="text" name="cZipsCode" value="<?php echo $cZipsCode?>" style="width:300px;">
	</td>
	</tr>-->
	


	<tr>
	<td colspan="2">
	<input type="submit" value="Save and Close">
	</td>
	
	</tr>
	
	</table>
	</form>
</body>
</html>