<?php $current = "group";
 include('nav.php'); 
 include('function.php'); 
 ?>


	<div class="container">
    
    	<!--<div class="row">
        	<div class="rg-topline"></div>
        </div>
    
    	<div class="row">
   		  <div class="col-lg-6 rg-message">
            	<h1>
                	All of current BIGTMS members<br /><span>Welcome you!</span></h1>
                    
                    <h1>You are about to receive<br /><span>same benefits</span><br />that current BIGTMS members are receiving.
                    </h1>
                
                </h1>
            	
          </div>    
            <div class="col-lg-6 rg-picture hidden-md hidden-sm hidden-xs">
       	    	<img src="img/welcome.png" width="520" height="402" alt="Welcome"> 
            	 
            </div>    
        </div>
        
        
        
        
        
        <div class="row" >
            <a href="contactus.php" target="_self">
                <div class="rg-smallbox2 col-xs-3">
                    <div class="col-xs-3">
                        <span class="glyphicon glyphicon-earphone"></span>
                    </div>
                    
                    <div class="col-xs-8 col-xs-offset-1">
                    <h1>No sponsor?</h1>
                    <h2>Don't worry. Give us a call or email us.</h2>
                    <h3>800 775 0607</h3>
                    
                    <h3>contact@bigtms.com</h3>
                    </div>	
                </div>
            </a>
            <a href="contactus.php" target="_self">
                <div class="rg-smallbox2 col-xs-3">
                    <div class="col-xs-3">
                        <span class="glyphicon glyphicon-time"></span>
                    </div>
                    
                    <div class="col-xs-8 col-xs-offset-1">
                    <h1>Office Hour</h1>
                    <h2>Call us or visit us anytime.</h2>
                    <h3>Monday - Friday</h3>
                    <h3>10AM - 7PM</h3>
                    
                    
                    </div>	
                </div>
            </a>
            
            
            <a href="contactus.php" target="_self">
                <div class="rg-smallbox2 col-xs-3">
                    <div class="col-xs-3">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    
                    <div class="col-xs-8 col-xs-offset-1">
                    <h1>Need help?</h1>
                    <h2>If are not really sure what to do, just visit us.</h2>
                    <h3>Direction to us</h3>
                    
                    </div>	
                </div>
            </a>
        </div>
        
        
        <div class="row">
        	<div class="rg-bottomline"></div>
        </div>
        
    </div>-->






	

	<form name="Reg_New"  method="post"  action="rg_action.php" autocomplete="off">
  	<input type="hidden" name="tnClssNumb" value="">
    <h1 class="submit-error"></h1>
    
        <div class="container" style="margin:80px auto 80px auto;">
            
            <div class="row rg-input-box">
                <div class="col-lg-4 rg-input-title1">
                    <div class="col-xs-2">
                        <h1>1</h1>
                    </div>
                    <div class="col-xs-9">
                        <h2>Your<br />Full Name</h2>
                    </div>
                    <div class="col-xs-12">
                        <h3>Use your legal name showing up on your ID.</h3>
                    </div>
                             
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div>
                        
                            <input id="firstname" name="tcFistName" class="rg-clear rg-input-form1" type="text" value="First Name" />
                            <p style="display:none;">First Name</p>
                            <h1 id="firstname-error" class="rg-error"><span class="glyphicon glyphicon-circle-arrow-up"></span> Invalid First Name</h1>
                     
                        </div>
                        <div>
                        
                            <input id="lastname" name="tcLastName" class="rg-clear rg-input-form1" type="text" value="Last Name" />
                     		<p style="display:none;">Last Name</p>
                            <h1 id="lastname-error" class="rg-error"><span class="glyphicon glyphicon-circle-arrow-up"></span> Invalid Last Name</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 rg-input-bottomline"></div> 
            
			<div class="row rg-input-box">
            	<div class="col-lg-4 rg-input-title1">
                    <div class="col-xs-2">
                        <h1>2</h1>
                    </div>
                    <div class="col-xs-9">
                        <h2>Your <br />Passworde</h2>
                    </div>


					<div>
                        
                        
                            
                            <div class="col-xs-10">
                            	<h1 style="font-weight: 600;
color: #FFF;
font-size: 12px;
font-family: 'Open Sans';
margin: 0;
display: block;
background: #33CC00;
padding: 5px;
border-radius: 4px" class="form-warning2">The Password  consists of minimum 5 charactors.</h1>
                            </div>
                            
                   	</div>
                                        
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div>
                            <input name="password" id="password" class="rg-clear rg-input-form1" type="password" value="" />
                            <p style="display:none;">Password</p>
                            <h1 id="password-error" class="rg-error"><span class="glyphicon glyphicon-circle-arrow-up"></span> Invalid Password </h1>
                        </div>
						<div><span id="msg1"></span></div>
                    </div>
                </div>
            </div>
    		<div class="col-xs-12 rg-input-bottomline"></div> 
            

            <div class="row rg-input-box">
                <div class="col-lg-4 rg-input-title1">
                    <div class="col-xs-2">
                        <h1>3</h1>
                    </div>
                    <div class="col-xs-9">
                        <h2>Your E-mail<br />Address</h2>
                    </div>
                    <div class="col-xs-12">
                        <h3>You will receive a confirmation message to this E-MAIL address.</h3>
                    </div>
                    
                    <div>
                        
                        
                            
                            <div class="col-xs-10">
                            	<h1 style="font-weight: 600;
color: #FFF;
font-size: 12px;
font-family: 'Open Sans';
margin: 0;
display: block;
background: #33CC00;
padding: 5px;
border-radius: 4px" class="form-warning2">If you don't receive a confirmation email, make sure to check your email account's junk mail box.</h1>
                            </div>
                            
                   	</div>
                    
                    
                </div>
                
                <div class="col-lg-4">
                    <div class="row">
                        <div>
                        
                            <input name="tcUserIDNO" id="email" class="rg-clear rg-input-form1" type="text" value="E-MAIL Address" />
                            <p style="display:none;">E-MAIL Address</p>
                            <h1 id="email-error" class="rg-error"></h1>
                        </div>
                        
                        
                        
                    </div>
                </div>
                
            </div>
            <div class="col-xs-12 rg-input-bottomline"></div>
            
            
            
            <div class="row rg-input-box">
                <div class="col-lg-4 rg-input-title1">
                    <div class="col-xs-2">
                        <h1>4</h1>
                    </div>
                    <div class="col-xs-9">
                        <h2>Mobile<br />Phone</h2>
                    </div>
                    <div class="col-xs-12">
                         <h3>Choose your mobile phone carrior.</h3>
                    </div>
                    
                    <div>
                        
                            
                            <div class="col-xs-10">
                            	<h1 style="font-weight: 600;
color: #FFF;
font-size: 12px;
font-family: 'Open Sans';
margin: 0;
display: block;
background: #33CC00;
padding: 5px;
border-radius: 4px" class="form-warning2">Sumbit your phone numbers without special cheractors. Numbers only.</h1>
                            </div>
                            
                	</div>
                    
                        
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div>
                            <input id="phone" name="tcCellNumb" class="rg-clear rg-input-form1" type="text" value="" placeholder="Moblie Phone"/>
                            <p style="display:none;">Mobile Phone Number ex) 7778889999</p>
                            <h1 id="phone-error" class="rg-error"></h1>
                        </div>
                        
                        
                        
                        
                        
                        	  
						<?php 
                            $sDB = new myDB;
                            $smsSQL = "SELECT * FROM spt_SMS  WHERE cCountryX = 'US'";	
                        
                            //print_r($smsSQL);		
                            $sDB->query($smsSQL);
                                            
                            echo '<div><select id="wireless" name="tnSMS_Numb" class="rg-input-form1">'; 
                           
                            echo '<option value="">Wireless Carrier</option>';
                            while ($sdata = $sDB->fetch_array($sDB->res)){
                            	echo '<option value="'.$sdata["nSMS_Numb"].'">'.$sdata["cCarriers"].'</option>';
                           	}
						 	
							echo '</select></div>';
                         	$sDB->close();
                     	?>
         
         
                        
                        
                    </div>
                </div>
            </div>

            <div class="col-xs-12 rg-input-bottomline"></div>
            
           <!-- <div class="row rg-input-box">
                <div class="col-lg-4 rg-input-title1">
                    <div class="col-xs-2">
                        <h1>5</h1>
                    </div>
                    <div class="col-xs-9">
                        <h2>Home<br />Address</h2>
                    </div>
                    <div class="col-xs-12">
                        <h3>Your home address.</h3>
                    </div>
                            
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div>
                            <input id="address" name="tcAddressX" class="rg-clear rg-input-form1" type="text" value="Address" />
                            <p style="display:none;">Address</p>
                            <h1 id="address-error" class="rg-error"></h1>
                        </div>
    
                        <div>
                            <input id="city" name="tcCityName" style="width: 235px;" class="rg-clear rg-input-form1" type="text" value="City" />
                            <p style="display:none;">City</p>
                            <h1 id="city-error" class="rg-error"></h1>
                        </div>
                        
                       
                        
                        
                        
                                            
                                              
                        <?php 
                            $tDB = new myDB;
                            $stateSQL = "SELECT * FROM tcState ";	
                            
                            //print_r($smsSQL);
                            $tDB->query($stateSQL);
                            echo '<div><select id="state" name="tcProvince" style="width: 200px;" class="rg-input-form1">';
                            echo '<option value="">--Select--</option>';
                            while ($tdata = $tDB->fetch_array($tDB->res)){
                                echo '<option value="'.$tdata["iso"].'">'.$tdata["name"].'</option>';
                            }
                            
                            echo '</select></div>';
                            $tDB->close();
                        ?>

                        
     
                        
    
                        <div>
                            <input id="zip" name="tcZipsCode" style="width: 135px;" class="rg-clear rg-input-form1" type="text" value="ZIP" />
                            <p style="display:none;">ZIP</p>
                            <h1 id="zip-error" class="rg-error"></h1>
                        </div>                               
                    </div>
                </div>
				    
            </div>  
            <div class="col-xs-12 rg-input-bottomline"></div>
            -->
            
            <div class="row rg-input-box">
                <div class="col-lg-4 rg-input-title1">
                    <div class="col-xs-2">
                        <h1>5</h1>
                    </div>
                    <div class="col-xs-9">
                        <h2>Submit<br />Your Form</h2>
                    </div>
                    <!--<div class="col-xs-12">
                        <h3>Click the Submit button and finish the registration process. You will soon receive the confirmation E-MAIL.</h3>
                    </div>-->
                           
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div>
                        
                            <input type ="submit" value="Register" name="Reg_New" class="rg-button" onClick = "return CheckNew()" >
                            <h1 class="submit-error"></h1>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!--<div class="col-xs-12 rg-input-bottomline"></div>-->
            
            
            
            
            
            
            
            
            
            
        </div>
	</form>

				



                
                
<?php /*
                
                
                	
<div class="jumbotron">
      <div class="container">
        
        

     <div class="box_SigninBox" style="margin: 0px 0px 0px 10px;;padding: 30px 20px 20px 20px;font-size:20px;">
   <div >
   <form name="Reg_New"  method="post"  action="rg_action.php">
   <input type="hidden" name="tnClssNumb" value="">

    <table border="0" cellspacing="1"  cellpadding="1" class="">
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
	
	    
    </div> <!-- /container -->

	<?php include('footer.php'); ?>

*/ ?>
    
    <?php include('footer.php'); ?>
    
    
    
    
    
    

	<script src="js/registration.js"></script>
    
    
    
    
    
    
    
    </body>
	</html>