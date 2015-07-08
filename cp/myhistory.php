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
			 <tbody>
			 <tr>
			 <td align="left" colspan="2"><font size="6"><b>My Commission History</b></font>
					<a style="margin-left:50px;font-size:40px;"   href="myaccount.php">My account</a>
					 <a style="margin-left:50px;font-size:40px;"   href="mycoupon.php">Coupon</a>
					 
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
		 <tr>
		 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="right">#</td>
		 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="right">SEQ</td>
		 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="right">Use/Down</td>
		 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2">Use/Down</td>
		 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2">Commission</td>
		 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2">Withdraw</td>
		 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2">Balance</td>
		 </tr>

			<?php
	
			$DB = new myDB;
			$DB1 = new myDB;
			$DBe = new myDB;
			$DBtdo = new myDB;
			$DBtuse = new myDB;
			$sDBtdo = new myDB;
			$sDBtuse = new myDB;
			
			 $strSQL1 = "SELECT  nFinishSeq,dUse_date FROM acc_user_coupon WHERE cSponsorX='".$cUser_Num."' and nActive='N' and dUse_date>0";
			$DB->query($strSQL1);
	
			while ($data = $DB->fetch_array($DB->res)){
			$nFinishSeq=$data["nFinishSeq"];					

				$sstrSQLtdo = "SELECT sum(a.fSale) as stdown FROM acc_coupon a,acc_user_coupon b,acc_user c WHERE a.nCouponID=b.nCouponID and b.cUser_Num=c.cUser_Num and  c.cSponsorX='".$cUser_Num."' and b.nFinishSeq=".$nFinishSeq;
				$sDBtdo->query($sstrSQLtdo);
				while ($sdatat = $sDBtdo->fetch_array($sDBtdo->res)){
					$stdown=$sdatat["stdown"];
				}
				
				$sstrSQLtuse = "SELECT sum(a.fSale) as stuse FROM acc_coupon a,acc_user_coupon b,acc_user c WHERE a.nCouponID=b.nCouponID and b.cUser_Num=c.cUser_Num and  c.cSponsorX='".$cUser_Num."' and b.dUse_date>0 and b.nFinishSeq=".$nFinishSeq;
				$sDBtuse->query($sstrSQLtuse);
				while ($sdatau = $sDBtuse->fetch_array($sDBtuse->res)){
					$stuse=$sdatau["stuse"];
					$cuse=$stuse*0.20;
					$bcuse=$cuse-$cuse;
				}

				$strSQLtdo = "SELECT count(*) as tdown FROM acc_user_coupon a,acc_user c WHERE a.cUser_Num=c.cUser_Num and c.cSponsorX='".$cUser_Num."' and a.nFinishSeq=".$nFinishSeq;
				$DBtdo->query($strSQLtdo);
				while ($datat = $DBtdo->fetch_array($DBtdo->res)){
					$tdown=$datat["tdown"];
				}
				
				$strSQLtuse = "SELECT count(*) as tuse FROM acc_user_coupon a,acc_user c WHERE a.cUser_Num=c.cUser_Num and c.cSponsorX='".$cUser_Num."' and a.dUse_date>0 and a.nFinishSeq=".$nFinishSeq;
				$DBtuse->query($strSQLtuse);
				while ($datau = $DBtuse->fetch_array($DBtuse->res)){
					$tuse=$datau["tuse"];
				}

				
			?>
		
	 <tr onmouseover="this.style.backgroundColor='#ccffff'" onmouseout="this.style.backgroundColor=''">
     <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;"><span id="expand_<?php echo $cUser_Num?>"  style="cursor: pointer;" onclick="showDown('<?php echo $cUser_Num?>','<?php echo $nFinishSeq?>')">+</span>&nbsp;&nbsp;&nbsp;
	 <span id="coll_<?php echo $cUser_Num?>" style="display:none;cursor: pointer;" onclick="HideDown('<?php echo $cUser_Num?>','<?php echo $nFinishSeq?>')">-</span></td>
	 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="right"><?php echo $nFinishSeq?>
	 
	 </td>
	 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="right"><?php echo $tuse."/".$tdown?></td>
	 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2"><?php echo "$".$stuse."/$".$stdown?></td>
	 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2"><?php echo "$".$cuse?></td>
	 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2"><?php echo "$".$cuse?></td>
	 <td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2"><?php echo "$".$bcuse?></td>
	 </tr>
	  <tr><td colspan="10" height="1" bgcolor="#e8e8e8" id="down_<?php echo $cUser_Num?>"></td></tr>
<?php
	}
?>
    </tbody></table>
	</div>
    </div>
	

	
<!-- ============================================================================================================================== -->


         
<!--------------------------------------------------------------------------------------------------------------------->
        
      </div>
    </div>	
	
	<hr>

     <?php include('footer.php'); ?>
     
    </div> <!-- /container -->
    
    <script type="text/javascript">
	
		function showDown(cUser_Num,nFinishSeq) {
    
            $.ajax({
                type:"post",
                dataType:"html",
                url:"ajaxtool.php",
                data:{"cUser_Num":cUser_Num,"nFinishSeq":nFinishSeq},
                success: function(data) {
                    $('#down_'+cUser_Num).html(data);
                    $('#down_'+cUser_Num).show(); 
                }
            });
    
            document.getElementById('expand_'+cUser_Num).style.display = 'none';
            document.getElementById('coll_'+cUser_Num).style.display = 'block';
            
            
            
        }
        
        function HideDown(cUser_Num,nFinishSeq) {
            $('#down_'+cUser_Num).hide();
            document.getElementById('expand_'+cUser_Num).style.display = 'block';
            document.getElementById('coll_'+cUser_Num).style.display = 'none';
        }
    
    </script>



	<script src="/cp/js/myaccount-effects.js"></script>


</body>
</html>