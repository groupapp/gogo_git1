<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  

    <title>Welcome to  An online Coupon </title>

	<!-- CSS import -->
    <link rel="stylesheet" type="text/css" href="/cp/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/cp/css/donstyle.css">
    <link rel="stylesheet" type="text/css" href="/cp/css/custom.css">
    <link rel="stylesheet" type="text/css" href="/cp/css/testbox.css">
    <link rel="stylesheet" type="text/css" href="/cp/css/navadded.css">
    <link rel="stylesheet" type="text/css" href="/cp/css/rebate123.css">
	<script type="text/javascript" src="/cp/js/jquery-1.7.2.min.js"></script>
    <script src="/cp/js/bootstrap.min.js"></script>
    <script src="/cp/js/top-menu.js"></script>
</head>
<body style="width:640px;">



<?php $current = "group";
$cUser_Num=$_GET['cUser_Num'];
 include('function.php'); 
 ?>


	<div class="container1" style="width:600px">
    
    	
	<form   method="post"  action="showdetails_action.php" autocomplete="off">
  	<input type="hidden" name="cUser_Num" value="<?php echo $cUser_Num?>">
	<input type="hidden" name="action" value="add">
    <h1 class="submit-error"></h1>
    
        <div class="container1" style="width:600px" >
            
            <div class="row rg-input-box1">
                <div class="col-xs-4 rg-input-title1">
                    <!--<div class="col-xs-3">
                        <h1>1</h1>
                    </div>-->
                    <div class="col-xs-4">
                        <h2>Full Name</h2>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="row">
                        <div>
                        
                            <input id="firstname" name="cFistName" class="rg-clear rg-input-form1" type="text" value="First Name" />
                            <p style="display:none;">First Name</p>
                            <h1 id="firstname-error" class="rg-error"><span class="glyphicon glyphicon-circle-arrow-up"></span> Invalid First Name</h1>
                     
                        </div>
                        <div>
                        
                            <input id="lastname" name="cLastName" class="rg-clear rg-input-form1" type="text" value="Last Name" />
                     		<p style="display:none;">Last Name</p>
                            <h1 id="lastname-error" class="rg-error"><span class="glyphicon glyphicon-circle-arrow-up"></span> Invalid Last Name</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 rg-input-bottomline1"></div> 
            
			
            <div class="row rg-input-box1">
                <div class="col-xs-4 rg-input-title1">
                    <!--<div class="col-xs-3">
                        <h1>2</h1>
                    </div>-->
                    <div class="col-xs-4">
                        <h2 style="margin-top:-0px">Email</h2>
                    </div>
                  </div>
                
                <div class="col-xs-4">
                    <div class="row">
                        <div>
                        
                            <input name="cEmail" id="email" class="rg-clear rg-input-form1" type="text" value="E-MAIL Address" />
                            <p style="display:none;">E-MAIL Address</p>
                            <h1 id="email-error" class="rg-error"></h1>
                        </div>
                        
                        
                        
                    </div>
                </div>
                
            </div>
            <div class="col-xs-6 rg-input-bottomline1"></div>
            
            
            
            <div class="row rg-input-box1">
                <div class="col-xs-4 rg-input-title1">
                    <!--<div class="col-xs-3">
                        <h1>3</h1>
                    </div>-->
                    <div class="col-xs-4">
                        <h2>Phone</h2>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="row">
                        <div>
                            <input id="phone" name="cCellNumb" class="rg-clear rg-input-form1" type="text" value="" placeholder="Moblie Phone"/>
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

            <div class="col-xs-6 rg-input-bottomline1"></div>
            
            
            <div class="row rg-input-box1">
                <div class="col-xs-4 rg-input-title1">
                    <!--<div class="col-xs-3">
                        <h1>4</h1>
                    </div>
                    <div class="col-xs-4">
                        <h2>Submit</h2>
                    </div>-->
                           
                </div>
                <div class="col-xs-4">
                    <div class="row">
                        <div>
                        
                            <input type ="submit" value="Register" name="Reg_New" class="rg-button" onClick = "return CheckNew()" >
                            <h1 class="submit-error"></h1>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
	</form>
	<script src="js/registration.js"></script>
    
    </body>
	</html>