<?php

	include_once dirname(__FILE__) . "/function.php";
	$cUserIDNO=$_COOKIE["userID"];

	if(empty($cUserIDNO))
	{
		echo "	<script>
					window.location='index.php';
				</script>";
	}


	include_once dirname(__FILE__) . "/nav.php";

	
	$strSQL_r = "SELECT * FROM acc_user 
		WHERE 
		(cUserIDNO=  '" . $cUserIDNO."' ) or (cUser_Num=  '" . $cUserIDNO."')";
	
	
	$DB_r = new myDB;
	$DB_r->query($strSQL_r);

	if($DB_r->rows==0 )
	echo "<script>alert('Mismatch User ID or password');location.replace('index.php');</script>";

	while($data_r = $DB_r->fetch_array($DB_r->res)){
		$cUser_Num=$data_r["cUser_Num"];
	}

 ?>
<div class="myaccount-top">
      <div class="container">        
<!--------------------------------------------------------------------------------------------------------------------->
<div align="center" style="margin-top: 40px;">
<div class="col-xs-12">
    <table border="0" cellpadding="0" cellspacing="1" width="100%">
     <tbody><tr><td align="left" colspan="2"><font size="6"><b>My credit History</b></font>
			<a style="margin-left:50px;font-size:30px;"   href="myaccount.php">My account</a>
             <a style="margin-left:50px;font-size:30px;"   href="mycoupon.php">Coupon</a>
			 <a style="margin-left:50px;font-size:30px;"   href="myhistory.php">commission history</a>
    	</td>    
   	</tr>
    </tbody>
	</table>
    </div>
	</div>
	

	<div align="center" style="margin-top: 40px;">
	<div class="col-xs-12">
    <table class="table" border="0" cellpadding="0" cellspacing="1" width="100%">
     <tbody>
	 
     <tr height="20">
     <td class="warning" align="center">#</td>  
      <td class="warning" align="center">Round</td>
	  <td class="warning" align="center">Finish Date</td>
      <td class="warning" align="right">Credit</td>
	  <td class="warning" align="right">Withdraw</td>
	   <td class="warning" align="right">Blance</td>     
    </tr>

	  <tr>
		<?php
		$DBtdo = new myDB;
		//$DBtuse = new myDB;
		$sDBtdo = new myDB;
		$sDBtuse = new myDB;
		$n=1;
		$strSQL1 = "SELECT  nFinishSeq,dUse_date FROM acc_user_coupon WHERE cUser_Num='".$cUser_Num."' and nActive='N' and dUse_date>0";
		
		$DBtdo->query($strSQL1);
		while ($data1 = $DBtdo->fetch_array($DBtdo->res)){
			$nFinishSeq=$data1["nFinishSeq"];
			$dUse_date=$data1["dUse_date"];
			
			
			$sstrSQLtuse = "SELECT sum(fCredit) as stuse FROM acc_user_coupon  WHERE cUser_Num='".$cUser_Num."' and dUse_date>0 and nFinishSeq=".$nFinishSeq;
			$sDBtuse->query($sstrSQLtuse);
			while ($sdatau = $sDBtuse->fetch_array($sDBtuse->res)){
				$ucredit=$sdatau["stuse"];
				
				$bcuse=$ucredit-$ucredit;
			}		

		?>  
		  <tr onmouseover="this.style.backgroundColor='#ccffff'" onmouseout="this.style.backgroundColor=''">
		  <td align="center"><?php echo $n?></td>
		  <td align="center"><?php echo $nFinishSeq?></td>
		  <td align="center"><?php echo $dUse_date ?></td>
		   <td align="right"><?php echo "$".$ucredit?></td>
		   <td align="right"><?php echo "$".$ucredit?></td>
		   <td align="right"><?php echo "$".$bcuse?></td>
	<!-- ============================================================================================================================== -->

     </tr>
     
<?php $n=$n+1;}?>

    </tbody></table>
	</div>
    </div>


         
<!--------------------------------------------------------------------------------------------------------------------->
        
      </div>
    </div>	
	
	<hr>

     <?php include('footer.php'); ?>
     
    </div> <!-- /container -->
    
	<script src="/cp/js/myaccount-effects.js"></script>


</body>
</html>