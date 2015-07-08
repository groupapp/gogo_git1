<?php 
// include('nav.php'); 
 //include('function.php'); 

include_once dirname(__FILE__) . "/function.php";

//$cUserIDNO=trim($_POST['cUserIDNO']);
//$cPassword=trim($_POST['cPassword']);


        //session_start();




$cUserIDNO=$_COOKIE["userID"];
if (empty($cUserIDNO))
{
echo "<script>
window.location='login.php';
</script>";
}


include_once dirname(__FILE__) . "/nav.php";

//if (empty($cUserIDNO) || empty($cPassword) )
//echo "<script>alert('Enter User ID or password');location.replace('login.php');return false;</script>";

//$cUserIDNO='timsheen3@gmail.com';//$_POST["cUserIDNO"];
//$cPassword='TIMOTHY1';//$_POST["cPassword"];

$strSQL_r = "SELECT * FROM acc_user 
	WHERE 
	(cUserIDNO=  '" . $cUserIDNO."' ) or (cUser_Num=  '" . $cUserIDNO."')";
	
//print_r($strSQL_r);
//exit;
	$DB_r = new myDB;
	$DB_r->query($strSQL_r);

	if($DB_r->rows==0 )
	echo "<script>alert('Mismatch User ID or password');location.replace('login.php');</script>";

	while ($data_r = $DB_r->fetch_array($DB_r->res)){
		$cUser_Num=$data_r["cUser_Num"];
		$cOpenDate=$data_r["cOpenDate"];
	}

	

$nCnt = 0;
$n30d = 0;
$nOvr = 0;

$n60d = 0;
$nEnd = 0;

$tc1stValue = "grey";
$tc2ndValue = "grey";
$tnHire_Sum = 0;

$strSQL_1 = "SELECT * FROM  acc_user    WHERE  cSponsorX = '".$cUser_Num."'  and  cPassword  <> 'none'     ORDER  BY nUser_Num ASC  ";

$DB_1 = new myDB;
	$DB_1->query($strSQL_1);



	while ($data_1 = $DB_1->fetch_array($DB_1->res)){
		
		$nCnt = $nCnt + 1;
		if ($data_1["cCliczoOX"] == "O")
         $tnHire_Sum = $tnHire_Sum + 1;

		/*if($cOpenDate!='')
		$fr_date=date('Y-m-d',strtotime($cOpenDate));
		if($data_1["cOpenDate"]!='')
		$to_date=date('Y-m-d',strtotime($data_1["cOpenDate"]));
		*/
			
		$fr_date=date_create($cOpenDate);
		$to_date=date_create($data_1["cOpenDate"]);

//print_r('fr'.$fr_date);
//print_r('to'.$to_date);
		$tnDiffDate = date_diff($fr_date, $to_date);
	$tnDiffDate=$tnDiffDate->format('%a');	
		//$tnDiffDate = date_diff($cOpenDate, $data_1["cOpenDate"]);
//print_r($tnDiffDate."/");
		if ($tnDiffDate <= 30) 
			$n30d = $n30d + 1;
		else
			$nOvr = $nOvr + 1;
      

		 if ($tnDiffDate <= 60)  
			 $n60d = $n60d + 1;
		 else
			$nEnd = $nEnd + 1;
      

	}
	
	if ($n30d == 1) 
      $tc1stValue = "yellow";
   else{
      if ($n30d > 1) 
         $tc1stValue = "green";
      else
         if ($nOvr > 0)
            $tc1stValue = "red";
   }      



   if ($n60d == 1 || $n60d == 2)
      $tc2ndValue = "yellow";
   else{
      if ($n60d >= 3)
         $tc2ndValue = "green";
     else
         if ($nEnd > 0)
            $tc2ndValue = "red";
   }   


	if ($tnDiffDate >= 60)
		$tc2ndValue = "red";
	else
		$tc2ndValue = "grey";


	$DB_u = new myDB;
	
	$cUpdte = "UPDATE  acc_user  SET  nDirectCT = ".$nCnt.", c1stValue = '".$tc1stValue."', c2ndValue = '".$tc2ndValue."', nHire_Sum = ".$tnHire_Sum."    WHERE   cUser_Num = '".$cUser_Num."'";
	$DB_u->query($cUpdte);
//print_r($cUpdte);	


 $strSQL = "SELECT * FROM acc_user 
	WHERE 
	cUser_Num=  '" . $cUser_Num."'";
	
//print_r($strSQL);	
	$DB = new myDB;
	$DB->query($strSQL);



	while ($data = $DB->fetch_array($DB->res)){
		$cUser_Num=$data["cUser_Num"];
 
 ?>


					
<div class="jumbotron">
      <div class="container">

        
<!--------------------------------------------------------------------------------------------------------------------->
<div align="center">
    <table  border="0" cellpadding="0" cellspacing="1" width="800">
     <tbody><tr><td align="left" colspan="2"><font size="3"><b>My Account</b></font>
	 
             <a  id="xx" class="ajax1" href="accountedit.php?cUser_Num=<?php echo $data["cUser_Num"]?>">Edit</a>
			 <!--<a href='javascript:win_popup("");' >Edit</a>-->



             <div class="table-responsive"  style="margin:0; float:right; display:inline-block;">
             <table  border="0" cellspacing="0" cellpadding="1" width="200" style="margin:0; display:inline-block;">
             <tbody><tr> 
               <td align="right">
						<?php 
						if ($data["c1stValue"] == "grey") 
                        echo '<div class="signal_grey">N</div>';
						else if ($data["c1stValue"] == "green") 
						echo '<div class="signal_green">N</div>';
						else if ($data["c1stValue"] == "yellow") 
						echo '<div class="signal_yellow">N</div>';
						else if ($data["c1stValue"] == "red") 
						echo '<div class="signal_red">N</div>';
						?>
               </td>  
               <td align="right">
                   
                       <?php 
						if ($data["c2ndValue"] == "grey") 
                        echo '<div class="signal_grey">C</div>';
						else if ($data["c2ndValue"] == "green") 
						echo '<div class="signal_green">C</div>';
						else if ($data["c2ndValue"] == "yellow") 
						echo '<div class="signal_yellow">C</div>';
						else if ($data["c2ndValue"] == "red") 
						echo '<div class="signal_red">C</div>';
						?>
                   
               </td>  
               <td align="right"><div class="signal_white"><?php echo $data["nHire_Sum"]?></div></td>  
               <td align="right">
						<?php
						if ($data["nHire_Sum"] == 0) 
                        echo '<div class="signal_grey">SM</div>';
						else if ($data["nHire_Sum"]>0 && $data["nHire_Sum"]<10)
						echo '<div class="signal_yellow">SM</div>';
						else if ($data["nHire_Sum"] >= 10) 
						echo '<div class="signal_green">SM</div>';
						?>
                       
                   
               </td>  
             </tr>
             </tbody></table>
             </div>



</td>

</tr>
     <tr><td align="left" width="130"><img src="/img/portrait.png" width="120"></td>
         <td align="left">


                              <div align="center">
                              <table class="table" cellspacing="0" cellpadding="2" width="770">
                              <tbody><tr> 
                                <td align="right" class="warning" width="120">&nbsp; Sponsor # &nbsp; </td>  
                                <td align="left" width="180"><?php echo $data["cSponsorD"]?></td>
                                <td align="right" class="warning" width="120">&nbsp; Full Name &nbsp; </td>  
                                <td align="left" width="180"><?php echo $data["cFistName"]." ".$data["cLastName"]?></td>
                              </tr>
                              <tr> 
                                <td align="right" class="warning">&nbsp; Member ID &nbsp; </td>  
                                <td align="left"><?php echo $data["cUser_Num"]?></td>
                                <td align="right" class="warning">&nbsp; E-Mail Address &nbsp; </td>  
                                <td align="left"><?php echo $data["cUserIDNO"]?> </td>
                              </tr>


                              <tr> 
                                <td align="right" class="warning">&nbsp; Mobile Phone &nbsp; </td>  
                                <td align="left"><?php echo $data["cCellNumb"]?></td>
                                <td align="right" valign="top" class="warning">&nbsp; Last Visit &nbsp; </td>  
                                <td align="left"><?php echo $data["cDeadDate"]?></td>
                              </tr>

                              <tr> 
                                <td align="right" class="warning">&nbsp; Join Date &nbsp; </td>  
                                <td align="left"><?php echo $data["cOpenDate"]?></td>
                                <td align="right" valign="top" class="warning">&nbsp; Visited Sum &nbsp; </td>  
                                <td align="left"><?php echo $data["nVisitSum"]?></td>
                              </tr>

                              <tr> 
                                <td align="right" class="warning">&nbsp; Balance &nbsp; </td>  
                                <td align="left">0</td>
                                <td align="right" valign="top" class="warning">&nbsp; Members &nbsp; </td>  
                                <td align="left"><?php echo "(D:".$data["nDirectCT"].")"."(T:".$data["nEntireCT"].")"?></td>
                              </tr>
                              <tr> 
                                <td align="right" valign="top" class="warning">&nbsp; Address &nbsp; </td>  
                                <td align="left" colspan="3"><?php echo $data["cAddressX"]." ".$data["cCityName"]." ".$data["cProvince"]."  ".$data["cZipsCode"]?></td>
                              </tr>
                              </tbody></table>
<?php
	}
							  ?>
                              </div>
         </td></tr>
    </tbody></table>
    </div>

	

	<div align="center">
    <table class="table" border="0" cellpadding="0" cellspacing="1" width="800">

     <tbody><tr><td colspan="9"><font size="3"><b>Genealogy</b></font></td></tr>

     <tr height="20">
      <td class="warning" align="center">#</td>  
      <td  class="warning">XX</td>
	  <td class="warning">Member ID</td>

      <td class="warning">Name</td>     
      <td class="warning">Email</td>
      <td class="warning">Join Date</td>
      <td class="warning">Visit Sum</td>
      <td class="warning">Last Visit</td>
      <td class="warning">Members</td>
      <td class="warning" align="center">Actions</td>
    </tr>

  <?php
$strSQL_sub = "SELECT * FROM acc_user 
	WHERE 
	cSponsorx=  '" . $cUser_Num."'";
	
//print_r($strSQL);	
	$DB_s = new myDB;
	$DB_s->query($strSQL_sub);
	$n=1;
	while ($data_s = $DB_s->fetch_array($DB_s->res)){
 
 ?> 
<!--src="/img/incusersingle.png" -->

     <tr onmouseover="this.style.backgroundColor='#ccffff'" onmouseout="this.style.backgroundColor=''">
      <td align="center"><?php echo $n?></td>
      <td align="left" id="expand_<?php echo $data_s["cUser_Num"]?>" onclick="showDown('<?php echo $data_s["cUser_Num"]?>')">+</td>
	  <td id="coll_<?php echo $data_s["cUser_Num"]?>" style="display:none" onclick="HideDown('<?php echo $data_s["cUser_Num"]?>')">-</td>
	  <td><?php echo $data_s["cUser_Num"] ?></td>
      <td align="left"><?php echo $data_s["cFistName"]." ".$data_s["cLastName"] ?></td>
      <td align="left"><?php echo $data_s["cUserIDNO"] ?></td>
      <td align="left"><?php echo $data_s["cOpenDate"] ?></td>
      <td align="left"><?php echo $data_s["nVisitSum"] ?></td>
      <td align="left"><?php echo $data_s["cDeadDate"] ?></td>
      <td align="left">

<img src="/img/icnusermulti.png">
<?php echo "(D:".$data_s["nDirectCT"].") (T:".$data_s["nEntireCT"].")" ?>
</td>
      <td align="left">
          <div align="center">
          <table border="0" cellpadding="0" cellspacing="0">
            <tbody><tr>
              <td align="left"><a class="c1" id="xx1_<?php echo $data_s["cUser_Num"]?>" title="Send SMS" href="sendTxt.php?fcUser_Num=<?php echo $cUser_Num?>&tcUser_Num=<?php echo $data_s["cUser_Num"]?>"><img src="/img/icnsms.png"></a>&nbsp;</td>

              <td align="left"><a class="c2" id="xx2_<?php echo $data_s["cUser_Num"]?>" title="Send Email" href="senMail.php?fcUser_Num=<?php echo $cUser_Num?>&tcUser_Num=<?php echo $data_s["cUser_Num"]?>"><img src="/img/icnemail.png"></a>&nbsp;</td>

              <td align="left"><a class="c3" id="xx3_<?php echo $data_s["cUser_Num"]?>" title="View" href="accountview.php?cUser_Num=<?php echo $data_s["cUser_Num"]?>"><img src="/img/icndetail.png"></a>&nbsp;</td>
            </tr>
          </tbody></table>
          </div>
      </td>
     </tr>
     <tr><td colspan="11" height="1" bgcolor="#e8e8e8" id="down_<?php echo $data_s["cUser_Num"]?>"></td></tr>
   
<?php $n=$n+1;}?>


     <tr><td colspan="9" align="center"><br><br><u>LEGEND</u>
     </td></tr><tr><td colspan="9" align="center"><br>N=Netflix; C=Costco; Number Count=Total Referrals; SM=Super Manager Status
     </td></tr><tr><td colspan="9" align="center">Green=Quota Achieved; Yellow=Pending; Red=Qualification Not Met
     </td></tr><tr><td colspan="9" align="center"><br>Downline Count (D:Direct sum of downline , T:Total sum of downline)</td></tr>


    </tbody></table>
    </div>


         
<!--------------------------------------------------------------------------------------------------------------------->




        
      </div>
    </div>	
	
	<hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>
    </div> <!-- /container -->
<script type="text/javascript">
			$(document).ready(function(){
				$('#xx').fancybox({
					'width'             :   500,
					'height'            :   400,
					'autoScale'         :   false,         //if using older fancybox
					'autoSize'          :   false,         //if using newer fancybox
					'autoDimensions'    :   false,
				});
				$('.c1').fancybox({
					'width'             :   600,
					'height'            :   500,
					'autoScale'         :   false,         //if using older fancybox
					'autoSize'          :   false,         //if using newer fancybox
					'autoDimensions'    :   false,
				});
				$('.c2').fancybox({
					'width'             :   700,
					'height'            :   500,
					'autoScale'         :   false,         //if using older fancybox
					'autoSize'          :   false,         //if using newer fancybox
					'autoDimensions'    :   false,
				});
				$('.c3').fancybox({
					'width'             :   400,
					'height'            :   300,
					'autoScale'         :   false,         //if using older fancybox
					'autoSize'          :   false,         //if using newer fancybox
					'autoDimensions'    :   false,
				});
				

					
				
				//alert($('#xx').val());
			});
</script>

<script type="text/javascript">
function showDown(cUser_Num) {
	$.ajax({
		type:"post",
		dataType:"html",
		url:"ajaxtool.php",
		data:{"cUser_Num":cUser_Num},
		success: function(data) {
			$('#down_'+cUser_Num).html(data);
		}
	});
$('#down_'+cUser_Num).css('display','block');
document.getElementById('expand_'+cUser_Num).style.display = 'none';
document.getElementById('coll_'+cUser_Num).style.display = 'block';

}

function HideDown(cUser_Num) {
	$('#down_'+cUser_Num).css('display','none');
	document.getElementById('expand_'+cUser_Num).style.display = 'block';
	document.getElementById('coll_'+cUser_Num).style.display = 'none';

}
</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    

	