<?php

	//include('nav.php'); 
	//include('function.php'); 
	
	include_once dirname(__FILE__) . "/function.php";
	
	$cCouponNo=trim($_REQUEST['cCouponNo']);
	$usechk=trim($_REQUEST['usechk']);
	//$cPassword=trim($_POST['cPassword']);
	
	//session_start();

/*
	$cUserIDNO=$_COOKIE["userID"];

	if(empty($cUserIDNO))
	{
		echo "	<script>
					window.location='index.php';
				</script>";
	}
*/

	include_once dirname(__FILE__) . "/nav.php";

	
	$strSQL = "SELECT a.*,b.*,c.dUse_date,c.nActive FROM acc_user a,acc_coupon b,acc_user_coupon c
		WHERE c.cUser_Num=a.cUser_Num and c.nCouponID=b.nCouponID and c.cCouponNo='".$cCouponNo."'";
	
	//print_r($strSQL);
	//exit;
	
	
	$DB = new myDB;
	$DB->query($strSQL);

	if($DB->rows==0 )
	{
	echo "<script>alert('Mismatch Coupon NO');</script>";
	
	}
	else
	{	
		while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];
			$cSponsorX=$data["cSponsorX"];
			$cFistName=$data["cFistName"];
			$cLastName=$data["cLastName"];
			$cUserIDNO=$data["cUserIDNO"];
			$cCellNumb=$data["cCellNumb"];
			$cOpenDate=$data["cOpenDate"];
			$cLocation=$data["cLocation"];
			$cShop=$data["cShop"];
			$cItem=$data["cItem"];
			$cName=$data["cName"];
			$cDesc=$data["cDesc"];
			$dFrom=$data["dFrom"];
			$dTo=$data["dTo"];
			$fOrigin=$data["fOrigin"];
			$fSale=$data["fSale"];
			$dCreate_date=$data["dCreate_date"];
			//$cActive=$data["cActive"];
			$nActive=$data["nActive"];
			$dUse_date=date('Y-m-d',strtotime($data['dUse_date']));
			//$dUse_date=mktime($data["dUse_date"]);

			
		}
	}
	 ?>
					
<div class="myaccount-top">
      <div class="container">

        
<!--------------------------------------------------------------------------------------------------------------------->
<div align="center" style="margin-top: 40px;">
<div class="col-xs-12">
    <table border="0" cellpadding="0" cellspacing="1" width="100%">
     <tbody><tr><td align="left" colspan="2"><font size="6"><b>Coupon Check<?php echo $dUse_date.$nActive?></b></font>
	 
			 
    	</td>    
   	</tr>
    
    <tr>
    	  
        
        <td align="left">
                              <div align="center">
                              <table class="table" cellspacing="0" cellpadding="2" width="770">
                              <tbody>
							 <form action="scoupon.php" method="post">
							  <tr> 
                               <td align="right" width="25%" class="warning">&nbsp; Coupon No &nbsp; </td>  
                                <td align="left" width="25%" colspan="3"><input type="text" name="cCouponNo" size="30" id="cCouponNo" value="<?php echo $cCouponNo?>"><input style="margin-left:40px;" type="submit" value="Search"></td>
                                
                              </tr>
							  </form>
							  <tr> 
                                <td align="right" width="25%" class="warning" width="120">&nbsp; Sender # &nbsp; </td>  
                                <td align="left" width="25%"><?php if ($cSponsorX=="0") echo "Admin"; else echo $cFullname;?></td>
                                <td align="right" width="25%" class="warning" width="120">&nbsp; Full Name &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $cFistName." ".$cLastName?></td>
                              </tr>
                              <tr> 
                                <td align="right" width="25%" class="warning">&nbsp; Member ID &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $cUser_Num?></td>
                                <td align="right" class="warning" width="25%">&nbsp; E-Mail Address &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $cUserIDNO?> </td>
                              </tr>
                              <tr> 
                                <td align="right" class="warning" width="25%">&nbsp; Mobile Phone &nbsp; </td>  
                                <td align="left"  width="25%"><?php echo $cCellNumb?></td>
								<td align="right" class="warning" width="25%">&nbsp; Join Date &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $cOpenDate?></td>
                              </tr>
						    <tr> 
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; Location &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $cLocation?></td>
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; Shop &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $cShop?></td>
                              </tr>
							<tr> 
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; Item No &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $cItem?></td>
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; Name &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $cName?></td>
                              </tr>
							<tr> 
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; Description &nbsp; </td>  
                                <td align="left" colspan="3"><?php echo $cDesc?></td>
                            </tr>
							<tr> 
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; From &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $dFrom?></td>
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; To &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $dTo?></td>
                              </tr>
							  <tr> 
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; Reg Price &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $fOrigin?></td>
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; Coupon Price &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $fSale?></td>
                              </tr>
							  <tr> 
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; Open Date &nbsp; </td>  
                                <td align="left" width="25%"><?php echo $dCreate_date?></td>
                                <td align="right" valign="top" class="warning" width="25%">&nbsp; Active &nbsp; </td>  
								<?php 
								if($nActive=='N')
								echo '<td align="left" width="25%" style="color:red;">'.$nActive.'</td>';
								else
								echo '<td align="left" width="25%">'. $nActive.'</td>';
								?>
							  </tr>
							  <?php if( $nActive=="Y" && $dUse_date=="-0001-11-30") { 
							   echo '<form action="use_action.php" method="post">
							  <tr> 
                               <td align="right" width="25%" class="warning">&nbsp; Use ? &nbsp; </td>  
                                <td align="left" width="25%" colspan="3">
								<input type="hidden" name="cCouponNo" id="cCouponNo" value="<?php echo $cCouponNo?>">
								<input type="checkbox" style="width:20px;height:20px;" name="useCoupon" id="useCoupon" value="Y"><input type="submit" value="Done" style="margin-left:40px;"></td>
                                
                              </tr>
							  </form>';
								}?>
                              </tbody></table>
		
                           </div>
         </td></tr>
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
                'width'             :   500,
                'height'            :   400,
                'autoScale'         :   true,         //if using older fancybox
                'autoSize'          :   true,         //if using newer fancybox
                'autoDimensions'    :   true,
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

	<script src="/cp/js/myaccount-effects.js"></script>


</body>
</html>