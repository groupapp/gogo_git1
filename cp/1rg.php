
<body>
<?php $current = "group";
 include('nav.php'); 
 include('function.php'); 
 ?>


					
<div class="jumbotron">
      <div class="container">
        
<!--------------------------------------------------------------------------------------------------------------------->
<SCRIPT LANGUAGE="JavaScript">
<!--
function CheckNew() {
       if (document.Reg_New.tcSponsorX.value == "" ) { alert("Please enter sponsor");
          document.Reg_New.tcSponsorX.focus();
		  return false; }
       if (document.Reg_New.tcFistName.value == "" ) { alert("Please enter firstname");
          document.Reg_New.tcFistName.focus();
		  return false; }
       if (document.Reg_New.tcLastName.value == "" ) { alert("Please enter lastname");
          document.Reg_New.tcLastName.focus();
		  return false; }

       if (document.Reg_New.tcUserIDNO.value == "" ) { alert("Please enter email");
          document.Reg_New.tcUserIDNO.focus();
		  return false; }

       if (document.Reg_New.tcUserMail.value == "" ) { alert("Please enter confirm email");
          document.Reg_New.tcUserMail.focus();
		  return false; }

       if (document.Reg_New.tcUserIDNO.value != document.Reg_New.tcUserMail.value ) { alert("Mismatch email");
          document.Reg_New.tcUserIDNO.focus();
		  return false; }



       if (document.Reg_New.tcCellNumb.value == "" ) { alert("Please enter cell phone number");
          document.Reg_New.tcCellNumb.focus();
		  return false; }
       if (document.Reg_New.tnSMS_Numb.value == "" ) { alert("Please select phone company");
          document.Reg_New.tnSMS_Numb.focus();
		  return false; }
       if (document.Reg_New.tcAddressX.value == "" ) { alert("Please enter address");
          document.Reg_New.tcAddressX.focus();
		  return false; }

       return true;
	}
//-->
</script>



     <div class="box_SigninBox" style="margin: 0px 0px 0px 10px;;padding: 30px 20px 20px 20px;font-size:20px;">
   <div >
   <form name="Reg_New"  method="post"  action="rg_action.php">
   <input type="hidden" name="tnClssNumb" value="">

    <table border="0" cellspacing="1"  cellpadding="1">
          <tr><td align=center colspan=2><b><font color="blue"></font></b></td></tr>
          <tr><td align=center colspan=2><b><font color="blue"></font></b></td></tr>
     
     <tr>
      <td align="right" >&nbsp;Sponsor #  &nbsp;</td>    
      <td align="left"><input type="text"     name="tcSponsorX" size="30" maxlength="10" value=""> </td>     
     </tr>

     <tr>
      <td align="right"  >&nbsp;First Name  &nbsp;</td>    
      <td align="left"><input type="text"     name="tcFistName" size="30" maxlength="50" value=""></td>     
     </tr>
     <tr>
      <td align="right"  >&nbsp;Last Name &nbsp;</td>    
      <td align="left"><input type="text"     name="tcLastName" size="30" maxlength="50" value=""></td>     
     </tr>

     <tr>
      <td align="right"  >&nbsp; E-Mail  &nbsp;</td>    
      <td align="left"><input type="text"     name="tcUserIDNO" size="30" maxlength="50" value=""> ex)me@gmail.com</td>     
     </tr>

     <tr>
      <td align="right" >&nbsp; Confirm &nbsp;<br> E-Mail&nbsp;</td>    
      <td align="left"><input type="text"     name="tcUserMail" size="30" maxlength="50" value=""></td>     
     </tr>

     <tr>
      <td align="right"  >&nbsp;Mobile Phone&nbsp;<br>(10 digt.)&nbsp;</td>    
      <td align="left"><input type="text" name="tcCellNumb" size="12" maxlength="20"  value="" class="inputorder">
          <?php 
		$sDB = new myDB;
		$smsSQL = "SELECT * FROM spt_SMS  WHERE cCountryX = 'US'";	
	
		//print_r($smsSQL);		
		$sDB->query($smsSQL);

	
	echo '<select name="tnSMS_Numb" size="1" class="inputorder">'; 
       
		 echo '<option value="">Wireless Carrier</option>';
		  while ($sdata = $sDB->fetch_array($sDB->res)){
			  echo '<option value="'.$sdata["nSMS_Numb"].'">'.$sdata["cCarriers"].'</option>';
	   }
	   $sDB->close();
		 ?>
		  
               <option value="00" >I don't know.</option>

          </select> 
      </td>     
     </tr>

     <tr>
      <td align="right"  >&nbsp;Address   &nbsp;</td>    
      <td align="left"><input type="text"     name="tcAddressX" size="40" maxlength="100"  value=""></td>     
     </tr>
     <tr>
      <td align="right"  >&nbsp;City    &nbsp;</td>    
      <td align="left"><input type="text"     name="tcCityName" size="40" maxlength="50"  value=""></td>     
     </tr>
     <tr>
      <td align="right"  >&nbsp;State   &nbsp;</td> 
	  
<?php 
	$tDB = new myDB;
	$stateSQL = "SELECT * FROM tcState ";	
	
		//print_r($smsSQL);		
		$tDB->query($stateSQL);

	echo '<td align="left"><select name="tcProvince" size="1" class="inputorder">'; 
		 echo '<option value="">--Select--</option>';
		  while ($tdata = $tDB->fetch_array($tDB->res)){
			  echo '<option value="'.$tdata["iso"].'">'.$tdata["name"].'</option>';
			   }
			echo '</select>';
	    $tDB->close();
		 ?>


      <!--<td align="left"><input type="text"     name="tcProvince" size="10" maxlength="50" value=""></td>-->     
     </tr>
     <tr>
      <td  align="right">&nbsp;Postal Code  &nbsp;</td>
      <td align="left"><input type="text"     name="tcZipsCode" size="20" maxlength="20"   value=""></td>
     </tr>
     <tr>
      <td align="left"></td>
      <td align="left"><input type ="submit" value="Register" name="Reg_New"  class="btn_medium" onClick = "return CheckNew()" ></td>
     </tr>
     <!--<tr>
      <td align="left"></td>
      <td align="left">
         <div class="box_VideoTitleX">IP address:<br></div>
         <!--<div class="box_Auto"><a href="#"><img src="http://maps.googleapis.com/maps/api/staticmap?center=&zoom=7&size=500x300&markers=color:yellow%7C&sensor=false"></a></div>-->
      <!--</td>
     </tr>-->
 </table>
 </form>
 </div>



         
<!--------------------------------------------------------------------------------------------------------------------->




        
      </div>
    </div>	
	
	<hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>

	</body>
	</html>