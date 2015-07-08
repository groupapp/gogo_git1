
<?php


$fcUser_Num=$_GET['fcUser_Num'];
$tcUser_Num=$_GET['tcUser_Num'];

include('function.php'); 

//$cUserIDNO='timsheen3@gmail.com';//$_POST["cUserIDNO"];
//$cPassword='TIMOTHY1';//$_POST["cPassword"];

$strSQL_f = "SELECT * FROM acc_user 
	WHERE 
	cUser_Num=  '" . $fcUser_Num."'";
	

	$DB_f = new myDB;
	$DB_f->query($strSQL_f);



	while ($data_f = $DB_f->fetch_array($DB_f->res)){
		$fcUserIDNO=$data_f["cUserIDNO"];
		$fcFistName=$data_f["cFistName"];
		$fcLastName=$data_f["cLastName"];
		$fcSuffixAT=$data_t["cSuffixAT"];
		$fcCellNumb=$data_t["cCellNumb"];
	}

//print_r($fcFistName);	

 $strSQL_t = "SELECT * FROM acc_user 
	WHERE 
	cUser_Num=  '" . $tcUser_Num."'";
	
//print_r($strSQL_t);	
	$DB_t = new myDB;
	$DB_t->query($strSQL_t);



	while ($data_t = $DB_t->fetch_array($DB_t->res)){
		$tcUserIDNO=$data_t["cUserIDNO"];
		$tcFistName=$data_t["cFistName"];
		$tcLastName=$data_t["cLastName"];
		$tcSuffixAT=$data_t["cSuffixAT"];
		$tcCellNumb=$data_t["cCellNumb"];
	}
?>






<script language="JavaScript">
<!--
function CheckAccountNew() {
       if (document.loginNew.tcPassword.value == "" ) { alert("Please, enter your password.");
          return false; }
       if (document.loginNew.tcPassCode.value == "" ) { alert("Please, enter your password again.");
          return false; }
       if (document.loginNew.tcPassCode.value != document.loginNew.tcPassword.value ) { alert("!!! Oops, The two passwords you entered did not match. Please try again.");
          return false; }
       return true;
	}
//-->
</script>




<form name="loginNew" action="sendTxt_action.php" method="post">
<input type="hidden" name="fcUserIDNO" value="<?php echo $fcUserIDNO?>">
<input type="hidden" name="fcFistName" value="<?php echo $fcFistName?>">
<input type="hidden" name="fcLastName" value="<?php echo $fcLastName?>">
<input type="hidden" name="fcSuffixAT" value="<?php echo $fcSuffixAT?>">
<input type="hidden" name="fcCellNumb" value="<?php echo $fcCellNumb?>">
<input type="hidden" name="tcSuffixAT" value="<?php echo $tcSuffixAT?>">
<input type="hidden" name="tcCellNumb" value="<?php echo $tcCellNumb?>">

<div align="center">
<table border="0" cellspacing="0" cellpadding="0">
<tbody><tr><td align="center" height="30"></td></tr>
<tr><td align="center"><div class="pop_title">Text Message</div></td></tr>
<tr><td align="center" height="10"></td></tr>




<tr> 
  <td align="left">From: &nbsp;(<?php echo $fcFistName?>&nbsp;<?php echo $fcLastName?>)&nbsp;<?php echo $fcCellNumb?></td>
</tr>
<tr> 
  <td align="left">To: &nbsp;(<?php echo $tcFistName?>&nbsp;<?php echo $tcLastName?>)&nbsp;<?php echo $tcCellNumb?></td>
</tr>

<tr><td align="center" height="10"></td></tr>
<tr> 
  <td align="left">Subject: &nbsp;<input type="text" name="tcSubjectX" size="60" maxlength="100" value="" class="inputorder"></td>
</tr>
<tr>
  <td align="left"><textarea name="tcMessage" cols="62" rows="10"></textarea></td>
</tr>
<!--<tr>
  <td><input type="radio" name="tcApply_OX" checked="" value="only"><?php echo $tcUserIDNO?>&nbsp; only &nbsp;&nbsp;
      <input type="radio" name="tcApply_OX" value="all">All Members   
   </td>
</tr>-->
<tr> 
  <td align="left"><input type="submit" value="SEND" name="loginNew" onclick="return CheckAccountNew()" class="btn_medium"></td>
</tr>

</tbody></table>
</div>
</form>  






