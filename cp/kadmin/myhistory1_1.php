<?php

	//include('nav.php'); 
	//include('function.php'); 
	
	include_once dirname(__FILE__) . "/function.php";
	
	//$cUserIDNO=trim($_POST['cUserIDNO']);
	//$cPassword=trim($_POST['cPassword']);
	
	//session_start();


	$cUserIDNO=$_REQUEST["cUser_Num"];

	if(empty($cUserIDNO))
	{
		echo "	<script>
					window.location='index.php';
				</script>";
	}


	include_once dirname(__FILE__) . "/nav.php";

	/*
	//if (empty($cUserIDNO) || empty($cPassword) )
	//echo "<script>alert('Enter User ID or password');location.replace('login.php');return false;</script>";

    //$cUserIDNO='timsheen3@gmail.com';//$_POST["cUserIDNO"];
    //$cPassword='TIMOTHY1';//$_POST["cPassword"];
	*/
	
	$strSQL_r = "SELECT * FROM acc_user 
		WHERE 
		(cUserIDNO=  '" . $cUserIDNO."' ) or (cUser_Num=  '" . $cUserIDNO."')";
	
	//print_r($strSQL_r);
	//exit;
	
	$DB_r = new myDB;
	$DB_r->query($strSQL_r);

	if($DB_r->rows==0 )
	echo "<script>alert('Mismatch User ID or password');location.replace('index.php');</script>";

	while($data_r = $DB_r->fetch_array($DB_r->res)){
		$cUser_Num=$data_r["cUser_Num"];
		$cOpenDate=$data_r["cOpenDate"];
	}

				
			$fr_date=date_create($cOpenDate);
			$to_date=date_create($data_1["cOpenDate"]);
	
	//print_r('fr'.$fr_date);
	//print_r('to'.$to_date);
	
	
	
	

	 $strSQL = "SELECT * FROM acc_user  
	 WHERE cUser_Num=  '" . $cUser_Num."'";
		
	//print_r($strSQL);	

		$DB = new myDB;
		$DB1 = new myDB;
		$DBe = new myDB;
		$DB->query($strSQL);
	
	
	
	while ($data = $DB->fetch_array($DB->res)){
	$cUser_Num=$data["cUser_Num"];

			$strSQLe = "SELECT * FROM acc_user  
			WHERE cUser_Num=  '" . $data["cSponsorX"]."'";
			$DBe->query($strSQLe);
			while ($datae = $DBe->fetch_array($DBe->res)){
			$cFullname=$datae["cFistName"]. " ".$datae["cLastName"]."(".$datae["cUser_Num"].")" ;	
			}			
	 ?>


					
<div class="myaccount-top">
      <div class="container">

        
<!--------------------------------------------------------------------------------------------------------------------->
<div align="center" style="margin-top: 40px;">
<div class="col-xs-12">
    <table border="0" cellpadding="0" cellspacing="1" width="100%">
     <tbody><tr><td align="left" colspan="2"><font size="6"><b><?php echo $cUser_Num?>&nbsp;Comision History</b></font>
			
			 
    	</td>    
   	</tr>
    
    <tr>
<?php
	$DBtdo = new myDB;
	$DBtuse = new myDB;
	$sDBtdo = new myDB;
	$sDBtuse = new myDB;
	
	$sstrSQLtdo = "SELECT sum(a.fSale) as stdown FROM acc_coupon a,acc_user_coupon b,acc_user c WHERE a.nCouponID=b.nCouponID and b.cUser_Num=c.cUser_Num and  c.cSponsorX='".$cUser_Num."' and b.nFinishSeq<1";
	$sDBtdo->query($sstrSQLtdo);
	while ($sdatat = $sDBtdo->fetch_array($sDBtdo->res)){
		$stdown=$sdatat["stdown"];
	}
	
	$sstrSQLtuse = "SELECT sum(a.fSale) as stuse FROM acc_coupon a,acc_user_coupon b,acc_user c WHERE a.nCouponID=b.nCouponID and b.cUser_Num=c.cUser_Num and  c.cSponsorX='".$cUser_Num."' and b.dUse_date>0 and b.nFinishSeq<1";
	$sDBtuse->query($sstrSQLtuse);
	while ($sdatau = $sDBtuse->fetch_array($sDBtuse->res)){
		$stuse=$sdatau["stuse"];
		$cuse=$stuse*0.25;
		$bcuse=$cuse-$cuse;
	}

	$strSQLtdo = "SELECT count(*) as tdown FROM acc_user_coupon a,acc_user c WHERE a.cUser_Num=c.cUser_Num and c.cSponsorX='".$cUser_Num."' and a.nFinishSeq<1";
	$DBtdo->query($strSQLtdo);
	while ($datat = $DBtdo->fetch_array($DBtdo->res)){
		$tdown=$datat["tdown"];
	}
	
	$strSQLtuse = "SELECT count(*) as tuse FROM acc_user_coupon a,acc_user c WHERE a.cUser_Num=c.cUser_Num and c.cSponsorX='".$cUser_Num."' and a.dUse_date>0 and a.nFinishSeq<1";
	$DBtuse->query($strSQLtuse);
	while ($datau = $DBtuse->fetch_array($DBtuse->res)){
		$tuse=$datau["tuse"];
		
	}

?>
        
        
        <td align="left">
                             
		<?php
			}
		?>
                             
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
	 <tr><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="right">SEQ</td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="right">Use/Down</td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2">Use/Down</td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2">Comision</td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2">Withdraw</td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2">Balance</td></tr>
	 <tr><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="right">1</td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="right"><?php echo $tuse."/".$tdown?></td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2"><?php echo "$".$stuse."/$".$stdown?></td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2"><?php echo "$".$cuse?></td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2"><?php echo "$".$cuse?></td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2"><?php echo "$".$bcuse?></td></tr>

     <tr height="20">
      <td class="warning" align="center">&nbsp;</td>
	  <td class="warning" align="center">#</td>  
      <td class="warning">Use/Down</td>
      <td class="warning" align="right">Use/Down</td>
	  <td class="warning">Member ID</td>
      <td class="warning">Name</td>     
      <td class="warning">Email</td>      
    </tr>

  <?php
	
	
$strSQL_sub = "SELECT * FROM acc_user 
	WHERE 
	cSponsorx=  '" . $cUser_Num."'";
	
	$DB_s = new myDB;
	$DB2 = new myDB;
	$DBdo = new myDB;
	$DBuse = new myDB;
	$xDBtdo = new myDB;
	$xDBtuse = new myDB;
	$DB_s->query($strSQL_sub);
	$n=1;
	while ($data_s = $DB_s->fetch_array($DB_s->res)){
	
	$strSQLdo = "SELECT cUser_Num FROM acc_user_coupon WHERE cUser_Num='".$data_s["cUser_Num"]."' and nFinishSeq<1";
	$DBdo->query($strSQLdo);
	$down=$DBdo->rows;
	
	$strSQLuse = "SELECT cUser_Num FROM acc_user_coupon WHERE cUser_Num='".$data_s["cUser_Num"]."' and dUse_date>0 and nFinishSeq<1";
	$DBuse->query($strSQLuse);
	$use=$DBuse->rows;
	
	$xstrSQLtdo = "SELECT sum(a.fSale) as stdown FROM acc_coupon a,acc_user_coupon b,acc_user c WHERE a.nCouponID=b.nCouponID and b.cUser_Num=c.cUser_Num and  c.cUser_Num='".$data_s["cUser_Num"]."' and b.nFinishSeq<1";
	

	$xDBtdo->query($xstrSQLtdo);
	while ($xdatat = $xDBtdo->fetch_array($xDBtdo->res)){
		$xtdown=$xdatat["stdown"];
	}
	
	$xstrSQLtuse = "SELECT sum(a.fSale) as stuse FROM acc_coupon a,acc_user_coupon b,acc_user c WHERE a.nCouponID=b.nCouponID and b.cUser_Num=c.cUser_Num and  c.cUser_Num='".$data_s["cUser_Num"]."' and b.dUse_date>0 and b.nFinishSeq<1";
	$xDBtuse->query($xstrSQLtuse);
	while ($xdatau = $xDBtuse->fetch_array($xDBtuse->res)){
		$xtuse=$xdatau["stuse"];
	}
 ?> 


   	  <tr onmouseover="this.style.backgroundColor='#ccffff'" onmouseout="this.style.backgroundColor=''">
      <td align="center">&nbsp;</td>
	  <td align="center"><?php echo $n?></td>
      <td align="right"><?php echo $use."/".$down ?></td>
      <td align="right"><?php echo "$".$xtuse."/$".$xtdown ?></td>
	  <td align="left">
	  <?php if($data_s["n1levelCnt"]>0){?>
	  <img id="expand_<?php echo $data_s["cUser_Num"]?>" title="Expand" src="/img/incusersingle.png" style="cursor: pointer;" onclick="showDown('<?php echo $data_s["cUser_Num"]?>')">
	  <?php }
	  else {echo "&nbsp&nbsp&nbsp&nbsp&nbsp";}?>
	  <span id="coll_<?php echo $data_s["cUser_Num"]?>" style="display:none;cursor: pointer;" onclick="HideDown('<?php echo $data_s["cUser_Num"]?>')"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span></span><?php echo $data_s["cUser_Num"] ?></td>
      <td align="left"><?php echo $data_s["cFistName"]." ".$data_s["cLastName"] ?></td>
      <td align="left"><?php echo $data_s["cUserIDNO"] ?></td>
      
<!-- ============================================================================================================================== -->

     </tr>
     <tr ><td colspan="9" height="1" bgcolor="#e8e8e8" id="down_<?php echo $data_s["cUser_Num"]?>"></td></tr>
   
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
    
    
    
    
    
    <script type="text/javascript">
    
        $(document).ready(function(){
            $('#xx').fancybox({
                'width'             :   500,
                'height'            :   400,
				'top'				:   10,	
                'autoScale'         :   true,         //if using older fancybox
                'autoSize'          :   true,         //if using newer fancybox
                'autoDimensions'    :   true,
            });
			$('#xx1').fancybox({
                'width'             :   600,
                'height'            :   480,
                'autoScale'         :   false,         //if using older fancybox
                'autoSize'          :   false,         //if using newer fancybox
                'autoDimensions'    :   false,
            });
            $('.c1').fancybox({
                'width'             :   600,
                'height'            :   500,
                'autoScale'         :   true,         //if using older fancybox
                'autoSize'          :   true,         //if using newer fancybox
                'autoDimensions'    :   true,
            });
            $('.c2').fancybox({
                'width'             :   700,
                'height'            :   500,
                'autoScale'         :   true,         //if using older fancybox
                'autoSize'          :   true,         //if using newer fancybox
                'autoDimensions'    :   true,
            });
            $('.c3').fancybox({
                'width'             :   400,
                'height'            :   300,
                'autoScale'         :   true,         //if using older fancybox
                'autoSize'          :   true,         //if using newer fancybox
                'autoDimensions'    :   true,
            });
            
            //alert($('#xx').val());
        });

		
        
    </script>




    <script type="text/javascript">

        function del(x){
		
			if (confirm("Do you want no more sending reciver?")) {
				location='showdetails_action.php?action=del&cUser_Num='+x;
			}
			return false;

		}
		
		
		function showDown(cUser_Num) {
    
            $.ajax({
                type:"post",
                dataType:"html",
                url:"ajaxtool.php",
                data:{"cUser_Num":cUser_Num},
                success: function(data) {
                    $('#down_'+cUser_Num).html(data);
                    $('#down_'+cUser_Num).show(); 
                }
            });
    
            document.getElementById('expand_'+cUser_Num).style.display = 'none';
            document.getElementById('coll_'+cUser_Num).style.display = 'block';
            
            
            
        }
        
        function HideDown(cUser_Num) {
            $('#down_'+cUser_Num).hide();
            document.getElementById('expand_'+cUser_Num).style.display = 'block';
            document.getElementById('coll_'+cUser_Num).style.display = 'none';
        }
    
    </script>



	<script src="/cp/js/myaccount-effects.js"></script>


</body>
</html>