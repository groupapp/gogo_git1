<?php

	//include('nav.php'); 
	//include('function.php'); 
	
	include_once dirname(__FILE__) . "/function.php";
	
	

	$cUserIDNO=$_COOKIE["userID"];

	$strSQL_r = "SELECT * FROM acc_user WHERE cUserIDNO='".$cUserIDNO."'";
	
	
	
	$DB_r = new myDB;
	$DB_r->query($strSQL_r);

	
	
	while($data_r = $DB_r->fetch_array($DB_r->res)){
		$cUser_Num=$data_r["cUser_Num"];
	}
	//$cUser_Num='10000T';

	//print_r('xxx'.$cUser_Num);
	//exit;

	if(empty($cUserIDNO))
	{
		echo "	<script>
					window.location='index.php';
				</script>";
	}


	include_once dirname(__FILE__) . "/nav.php";
	
		
	 ?>
					
<div class="myaccount-top">
      <div class="container">

        
<!--------------------------------------------------------------------------------------------------------------------->

	<div align="center" style="margin-top: 40px;">
	<div class="col-xs-12">
    <form action="mycoupon_action.php" method="post">
	<table class="table" border="0" cellpadding="0" cellspacing="1" width="100%">

     <tbody><tr><td colspan="9"><font size="6"><b>Coupon Shop</b></font></td></tr>

     <tr height="20">
	 <td class="warning" align="center"><input type="checkbox" name="checkall" id="checkall" onclick="return checkedAll(this.form);"></td>  
      <td class="warning" align="center">#</td>  
     <td class="warning">Item No</td>
	 <td class="warning">Name</td>     
      <td class="warning">Location</td>
      <td class="warning">From</td>
	  <td class="warning">To</td>
	  <td align="right" class="warning">Regular Price</td>
	  <td align="right" class="warning">Coupon Save </td>
      <td align="right" class="warning">Your Price</td>
    </tr>

  <?php
	/*$DBd = new myDB;
	$strSQLd = "SELECT * FROM acc_user_coupon a,acc_user b  WHERE a.cUser_Num=b.cUser_Num and b.cUserIDNO='".$cUserIDNO."' and a.nActive='Y' and a.nFinishSeq<1 and nDown<1";
	$DBd->query($strSQLd);

	if($DBd->rows==0 )
	$strSQL = "SELECT * FROM acc_coupon";
	else*/
	$strSQL = "SELECT a.* FROM acc_coupon a LEFT JOIN acc_user_coupon b ON (a.nCouponID=b.nCouponID  and b.nDown=1  and b.cUser_Num='".$cUser_Num."') WHERE  b.nCouponID IS Null";
	
	
	$DB = new myDB;
	$DB->query($strSQL);
	$n=1;
	while ($data_s = $DB->fetch_array($DB->res)){

 
 ?> 
   	  <tr onmouseover="this.style.backgroundColor='#ccffff'" onmouseout="this.style.backgroundColor=''">
      <td align="center"><input type="checkbox" name="precoupon[]" id="iprecoupon" value="<?php echo $data_s["nCouponID"]?>"><input type="hidden" name="cUserIDNO" id="cUserIDNO" value="<?php echo $cUserIDNO?>"></td>
	  <td align="center"><?php echo $n?></td>
      <td align="left"><?php echo $data_s["cItem"]?></td>
	  <td align="left"><?php echo $data_s["cName"] ?></td>
      <td align="left"><?php echo $data_s["cLocation"]."(".$data_s["cShop"].")" ?></td>
      <td align="left"><?php echo $data_s["dFrom"] ?></td>
	  <td align="left"><?php echo $data_s["dTo"] ?></td>
	  <td align="right"><?php echo "$".formatMoney($data_s["fOrigin"]) ?></td>
	  <td align="right" style="color:red;"><?php echo "$".formatMoney($data_s["fOrigin"]-$data_s["fSale"]); ?></td>
	  <td align="right"><?php echo "$".formatMoney($data_s["fSale"]) ?></td>
     </tr>
    
   
<?php $n=$n+1;}?>
	
	 <tr ><td colspan="10" height="1" bgcolor="#e8e8e8" ><input type="submit" value="Download Coupon"></td></tr>	
    </tbody></table>
	</form>
	
	
	</div>
    </div>
<!--------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------------------->

	<div align="center" style="margin-top: 40px;">
	<div class="col-xs-12">
    <table class="table" border="0" cellpadding="0" cellspacing="1" width="100%">

     <tbody><tr><td colspan="9"><font size="6"><b>My Coupon</b></font>
	 <a style="margin-left:50px;font-size:30px;"   href="myaccount.php">My Account</a><a style="margin-left:50px;font-size:30px;"   href="history.php">Coupon History</a>
	 </td></tr>

     <tr height="20">
      <td class="warning" align="center">#</td>  
     <td class="warning">Coupon No</td>
	 <td class="warning">Name</td>     
      <td class="warning">Location</td>
      <td class="warning">From</td>
	  <td class="warning">To</td>
	  <td align="right" class="warning">Regular Price</td>
	  <td align="right" class="warning">Coupon Save</td>
	  <td align="right" class="warning">Your Price</td>
      <td class="warning">View</td>
    </tr>

  <?php
$strSQLc = "SELECT a.cCouponNo,a.nUserCouponID,b.* FROM acc_user_coupon a,acc_coupon b WHERE a.nCouponID=b.nCouponID and a.nActive='Y' and a.cUser_Num='".$cUser_Num."' ";
	
	$DBc = new myDB;
	$DBc->query($strSQLc);
	$a=1;
	while ($data_c = $DBc->fetch_array($DBc->res)){

 
 ?> 
   	  <tr onmouseover="this.style.backgroundColor='#ccffff'" onmouseout="this.style.backgroundColor=''">
      <td align="center"><?php echo $a?></td>
      <td align="left"><?php echo $data_c["cCouponNo"]?></td>
	  <td align="left"><?php echo $data_c["cName"] ?></td>
      <td align="left"><?php echo $data_c["cLocation"]."(".$data_c["cShop"].")" ?></td>
      <td align="left"><?php echo $data_c["dFrom"] ?></td>
	  <td align="left"><?php echo $data_c["dTo"] ?></td>
	  <td align="right"><?php echo "$".formatMoney($data_c["fOrigin"]) ?></td>
	  <td align="right" style="color:red;"><?php echo "$".formatMoney($data_c["fOrigin"]-$data_c["fSale"]); ?></td>	  
	  <td align="right"><?php echo "$".formatMoney($data_c["fSale"]) ?></td>
	  <td align="left"><a class="c3" id="xx3_<?php echo $data_c["nUserCouponID"]?>" title="View" href="couponview.php?nUserCouponID=<?php echo $data_c["nUserCouponID"]?>"><img src="/cp/img/icndetail.png" width=25 height=16></a></td>
     </tr>
    
   
<?php $a=$a+1;}?>
	
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
                'width'             :   670,
                'height'            :   360,
                'autoScale'         :   false,         //if using older fancybox
                'autoSize'          :   false,         //if using newer fancybox
                'autoDimensions'    :   false,
            });
            
            //alert($('#xx').val());
        });

		
        
    </script>




    <script type="text/javascript">

        function checkedAll(frm){
		var chk_arr =  document.getElementsByName("precoupon[]");
				var chklength = chk_arr.length;             
				//alert('xx'+chklength);
				for(k=0;k< chklength;k++)
				{
					chk_arr[k].checked = true;
				} 
		
	}
		
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