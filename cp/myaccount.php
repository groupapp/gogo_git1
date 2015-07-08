<?php

	//include('nav.php'); 
	//include('function.php'); 
	
	include_once dirname(__FILE__) . "/function.php";
	
	//$cUserIDNO=trim($_POST['cUserIDNO']);
	//$cPassword=trim($_POST['cPassword']);
	
	//session_start();


	$cUserIDNO=$_COOKIE["userID"];

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





<!--==================================================================================================================================-->
<!--==================================================================================================================================-->
<!--==================================================================================================================================-->
<!--==================================================================================================================================-->
<!--==================================================================================================================================-->
					
<div class="myaccount-top">
      <div class="container">

        
<!--------------------------------------------------------------------------------------------------------------------->
<div align="center" style="margin-top: 40px;">
<div class="col-xs-12">
    <table border="0" cellpadding="0" cellspacing="1" width="100%">
     <tbody><tr><td align="left" colspan="2"><font size="6"><b>My Account</b></font>
	 
             <a style="margin-left:50px;font-size:30px;" id="xx" class="ajax1" href="accountedit.php?cUser_Num=<?php echo $data["cUser_Num"]?>">Edit</a>&nbsp;
			 <a style="margin-left:50px;font-size:30px;"   href="mycoupon.php">Coupon</a>
			 <a style="margin-left:50px;font-size:30px;"   href="history.php">Coupon History</a>
			 <!--<a style="margin-left:50px;font-size:30px;"   href="myhistory.php">Commission History</a>-->
			 
    	</td>    
   	</tr>
    
    <tr>
<?php
	$DBtdo = new myDB;
	$DBtuse = new myDB;
	$sDBtdo = new myDB;
	$sDBtuse = new myDB;
	$cDB = new myDB;

	$sstrSQLtdo = "SELECT sum(b.fSale) as stdown FROM acc_user_coupon b,acc_user c WHERE  b.cUser_Num=c.cUser_Num and  c.cSponsorX='".$cUser_Num."' and b.nFinishSeq<1";
	$sDBtdo->query($sstrSQLtdo);
	while ($sdatat = $sDBtdo->fetch_array($sDBtdo->res)){
		$stdown=formatMoney($sdatat["stdown"]);
	}
	
	$sstrSQLtuse = "SELECT sum(b.fSale) as stuse FROM acc_user_coupon b,acc_user c WHERE  b.cUser_Num=c.cUser_Num and  c.cSponsorX='".$cUser_Num."' and b.dUse_date>0 and b.nFinishSeq<1";
	$sDBtuse->query($sstrSQLtuse);
	while ($sdatau = $sDBtuse->fetch_array($sDBtuse->res)){
		$stuse=$sdatau["stuse"];
		//$cuse=formatMoney($sdatau["stuse"]);
		$cuse=$stuse*0.2;
	}
	if($cuse=='')
		$cuse=0;

	$cSQLuse = "SELECT sum(b.fCredit) as stuse FROM acc_user_coupon b,acc_user c WHERE  b.cUser_Num=c.cUser_Num and  c.cUser_Num='".$cUser_Num."' and b.dUse_date>0 and b.nFinishSeq<1";
	$cDB->query($cSQLuse);
	while ($cdata = $cDB->fetch_array($cDB->res)){
		//$stuse=$sdatau["stuse"];
		$credit=formatMoney($cdata["stuse"]);
		//$cuse=$stuse*0.2;
	}
	if($credit=='')
		$credit=0;
		
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
                              <div align="center">
                              <table class="table" cellspacing="0" cellpadding="2" width="770">
                              <tbody><tr> 
                                <td align="right" width="25%" class="warning" width="120">&nbsp; Sender # &nbsp; </td>  
                                <td align="left" width="25%"><?php if ($data["cSponsorX"]=="0") echo "Admin"; else echo $cFullname;?></td>
                                <td align="right" width="25%" class="warning" width="120">&nbsp; Full Name &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $data["cFistName"]." ".$data["cLastName"]?></td>
                              </tr>
                              <tr> 
                                <td align="right" width="25%" class="warning">&nbsp; Member ID &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $data["cUser_Num"]?></td>
                                <td align="right" class="warning" width="25%">&nbsp; E-Mail Address &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $data["cUserIDNO"]?> </td>
                              </tr>


                              <tr> 
                                <td align="right" class="warning" width="25%">&nbsp; Mobile Phone &nbsp; </td>  
                                <td align="left"  width="25%"><?php echo $data["cCellNumb"]?></td>
                                <td align="right" class="warning" width="25%">&nbsp; Commission  &nbsp; </td>  
                                <td align="left"  width="25%" style="color:red"><?php echo "$".$cuse?><a style="margin-left:20px;"href="myhistory.php">History</a></td>
                              </tr>
							   <!--<tr> 
                                <td align="right" valign="top" class="warning">&nbsp; Address &nbsp; </td>  
                                <td align="left" colspan="3"><?php echo $data["cAddressX"]." ".$data["cCityName"]." ".$data["cProvince"]."  ".$data["cZipsCode"]?></td>
                              </tr>-->	
                              <tr> 
                                <td align="right" class="warning" width="25%">&nbsp; Join Date &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $data["cOpenDate"]?></td>
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; My Credit &nbsp; </td>  
                                <td align="left" width="25%"><?php echo "$".$credit?>&nbsp;<a style="margin-left:20px;"href="mycredit.php">History</a></td>
								<!--<td align="left" width="25%"><?php echo $data["cDeadDate"]?></td>-->
                              </tr>
					
            
                              </tbody></table>
		<?php
			}
		?>
                              </div>
         </td></tr>
    </tbody></table>
    </div>
	</div>
	

	<div align="center" style="margin-top: 40px;">
	<div class="col-xs-12">
    <table class="table" border="0" cellpadding="0" cellspacing="1" width="100%">
     <tbody><tr><td>&nbsp;</td><td ><font size="6"><b>Receiver&nbsp;&nbsp;</b></font></td><td><a id="xx1" style="margin-left:50px;font-size:40px;" class="ajax1" href="7rg.php?cUser_Num=<?php echo $cUser_Num?>">Add+</a></td><td style="font-size:30px;font-family: fantasy;vertical-align: bottom;" align="right">Total:</td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="right"><?php echo $tuse."/".$tdown?></td><td style="font-size:25px;font-family: fantasy;vertical-align: bottom;" align="center" colspan="2"><?php echo "$".$stuse."/$".$stdown?></td></tr>

     <tr height="20">
      <td class="warning" align="center">#</td>  
      <td class="warning">Member ID</td>
      <td class="warning">Name</td>     
      <td class="warning">Email</td>
      <td class="warning">Use/Down</td>
      <td class="warning" align="right">Use/Down</td>
      <td class="warning" align="center">Actions</td>
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
		$xtdown=formatMoney($xdatat["stdown"]);
	}
	
	$xstrSQLtuse = "SELECT sum(a.fSale) as stuse FROM acc_coupon a,acc_user_coupon b,acc_user c WHERE a.nCouponID=b.nCouponID and b.cUser_Num=c.cUser_Num and  c.cUser_Num='".$data_s["cUser_Num"]."' and b.dUse_date>0 and b.nFinishSeq<1";
	$xDBtuse->query($xstrSQLtuse);
	while ($xdatau = $xDBtuse->fetch_array($xDBtuse->res)){
		$xtuse=formatMoney($xdatau["stuse"]);
	}
 ?> 


   	  <tr onmouseover="this.style.backgroundColor='#ccffff'" onmouseout="this.style.backgroundColor=''">
      <td align="center"><?php echo $n?></td>
      <td align="left">
	  <?php if($data_s["n1levelCnt"]>0){?>
	  <img id="expand_<?php echo $data_s["cUser_Num"]?>" title="Expand" src="/img/incusersingle.png" style="cursor: pointer;" onclick="showDown('<?php echo $data_s["cUser_Num"]?>')">
	  <?php }
	  else {echo "&nbsp&nbsp&nbsp&nbsp&nbsp";}?>
	  <span id="coll_<?php echo $data_s["cUser_Num"]?>" style="display:none;cursor: pointer;" onclick="HideDown('<?php echo $data_s["cUser_Num"]?>')"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span></span><?php echo $data_s["cUser_Num"] ?></td>
      <td align="left"><?php echo $data_s["cFistName"]." ".$data_s["cLastName"] ?></td>
      <td align="left"><?php echo $data_s["cUserIDNO"] ?></td>
      <td align="right"><?php echo $use."/".$down ?></td>
      <td align="right"><?php echo "$".$xtuse."/$".$xtdown ?></td>
<!-- ============================================================================================================================== -->

      <td align="left">
          <div align="center">
          <table border="0" cellpadding="0" cellspacing="0">
            <tbody><tr>
              <td align="left"><a class="c1" id="xx1_<?php echo $data_s["cUser_Num"]?>" title="Send SMS" href="sendTxt.php?fcUser_Num=<?php echo $cUser_Num?>&tcUser_Num=<?php echo $data_s["cUser_Num"]?>"><img src="/cp/img/phone2.png" width=17 height=20></a>&nbsp;</td>

              <td align="left"><a class="c2" id="xx2_<?php echo $data_s["cUser_Num"]?>" title="Send Email" href="senMail.php?fcUser_Num=<?php echo $cUser_Num?>&tcUser_Num=<?php echo $data_s["cUser_Num"]?>"><img src="/cp/img/icnemail.png" width=19 height=19></a>&nbsp;</td>

              <td align="left"><a class="c3" id="xx3_<?php echo $data_s["cUser_Num"]?>" title="View" href="accountview.php?cUser_Num=<?php echo $data_s["cUser_Num"]?>"><img src="/cp/img/icndetail.png" width=25 height=16></a>&nbsp;</td>

			  <td align="left"><img src="/cp/img/disabled.gif" width=25 height=16  title="Delete" style="cursor: pointer;" onclick="del('<?php echo $data_s["cUser_Num"]?>')"><td>
            </tr>
          </tbody></table>
          </div>
      </td>
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