<!--<script type="text/javascript" src="/js/ckeditor.js"></script>-->

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
	}
?>



<!--<link rel="stylesheet" href="/css/sample.css">-->


<form name="loginNew" action="sendMail_action.php" method="post">
<input type="hidden" name="fcUserIDNO" value="<?php echo $fcUserIDNO?>">
<input type="hidden" name="fcFistName" value="<?php echo $fcFistName?>">
<input type="hidden" name="fcLastName" value="<?php echo $fcLastName?>">
<input type="hidden" name="tcUserIDNO" value="<?php echo $tcUserIDNO?>">
<div align="center">
<table border="0" cellspacing="0" cellpadding="0" >
<tr><td align=center height=10></td></tr>
<tr><td align=center><div class="pop_title">Email</div></td></tr>
<tr><td align=center height=5></td></tr>




<tr> 
  <td align="left">From: &nbsp;(<?php echo $fcFistName?>&nbsp;<?php echo $fcLastName?>)&nbsp;<?php echo $fcUserIDNO?></td>
</tr>
<tr> 
  <td align="left">To: &nbsp;(<?php echo $tcFistName?>&nbsp;<?php echo $tcLastName?>)&nbsp;<?php echo $tcUserIDNO?></td>
</tr>

<tr><td align=center height=10></td></tr>
<tr> 
  <td align="left">Subject: &nbsp;<input type="text" name="tcSubjectX" size="60" maxlength="100" value=""  class="inputorder"></td>
</tr>
<tr>
  <td align="left">
  <?php
   echo '<textarea class="ckeditor" cols="62" id="tcMessage" name="tcMessage" rows="10"></textarea>';
?>
    
</td>
</tr>
<!--<tr>
  <td><input type=radio name="tcApply_OX" checked value="only"><?php echo $tcUserIDNO?>&nbsp; only &nbsp;&nbsp;
      <input type=radio name="tcApply_OX"         value="all">All Members  
   </td>
</tr>-->
<tr> 
  <td align="left"><input  type="submit"   value="SEND"  id="btnSubmit"  class="btn_medium" ></td>
</tr>

</table>
</div>
</form>  






