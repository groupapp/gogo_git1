<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  

    <title>Welcome to  An online Coupon </title>

	<!-- CSS import -->
    <link rel="stylesheet" type="text/css" href="/cp/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/cp/css/donstyle.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/cp/js/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="/cp/css/custom.css">
    <link rel="stylesheet" type="text/css" href="/cp/css/testbox.css">
    <link rel="stylesheet" type="text/css" href="/cp/css/navadded.css">
    <link rel="stylesheet" type="text/css" href="/cp/css/rebate123.css">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>

	
    <script type="text/javascript" src="/cp/js/jquery-1.7.2.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript" src="/cp/js/jquery.fancybox.js"></script>
    <script src="/cp/js/bootstrap.min.js"></script>
    <script src="/cp/js/top-menu.js"></script>


</head>




<body>





        <!-- Login Menu Modal Start =============================================================================================-->
        <!-- Login Menu Modal Start =============================================================================================-->
        <!-- Login Menu Modal Start =============================================================================================-->
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Log In | Register</h4>
              </div>
              <div class="modal-body">
              
                
                
                <div class="row">
					<form action="login_action.php" method="post">


						<div class="row col-xs-offset-3 col-xs-6">
                            <div>
                              <input style="max-width: 276px;" type="text" name="cUserIDNO" placeholder="Email" class="form-control">
                            </div>
                            
                            <div>
                              <input style="max-width: 276px;" type="password" name="cPassword" placeholder="Password" class="form-control">
                            </div>
						</div>
                        
                        <div class="row col-xs-offset-3 col-xs-6">
                            <div>
                                <button style="max-width: 276px;" type="submit" class="btn btn-success">Sign In</button>
                            </div>
						</div>
	
    					
                        
                       
					 </form>
				 </div>
                
                
                
              </div>
            
            	 <div class="modal-footer">
                           <div class="row col-xs-offset-3 col-xs-6">
                                <div>
                                  <a href="rg.php" class="new-register2">
                                  <button style="max-width: 276px; background:rgba(255,204,51,1); border: none;" type="submit" class="btn btn-success">Register</button></a>
                                </div>
                        	</div>
                  </div>
						
            
            </div>
          </div>
        </div>
     
        <!-- Login Menu Modal End =============================================================================================-->
        <!-- Login Menu Modal End =============================================================================================-->
        <!-- Login Menu Modal End =============================================================================================-->
     
				 








	 <!-- This login box will be filled with same content of id="login-box" by JS on document load. -->
	 <div id="login-box-float"></div>



<div class="top-space">
	<div class="container" style="position: relative; height: 100px;">
        <div class="m_logo ">
        	<a href="index.php" style="float:left"><img src="/cp/img/logo-x.png" width="319" height="95" ></a>
     	</div>
        
        <!-- div class="m_titleBox" style="margin-bottom: 20px;">
          	<div class="logo-text">
            	<h1>BigTMS</h1>
                <h2>Realizing Dreams Together</h2>
            
            </div>
        </div -->
        
        <?php $userID=$_COOKIE["userID"];
                $name=$_COOKIE["username"];
				$current=basename($_SERVER["PHP_SELF"]);
                if ($userID=="" ) 
					if ($current=="index.php" )
					echo '<div id="login-box" style="position: absolute; right: 0; top: 1px;"></div>
					<div style="float:right; float: right;
							border: 1px solid rgb(141, 141, 141);
							padding: 0px 8px 0px 8px;
							height: 39px;
							margin-top: 10px;
							border-radius: 5px;
							background: rgb(107, 117, 116);
							text-shadow: 0 1px 0 black;">
						  <a href="rg.php" class="new-register"><span></span><h3 class="register-button" style="margin-top: 0px;">Register <span class="label label-default" style="background-color: #E74198;">Click here</span></h3></a>
						  </div>';
	
					else
                echo '				
				<div id="login-box" style="position: absolute; right: 0; top: 1px;">
					<form class="navbar-form navbar-right" action="login_action.php" method="post">
						<div class="form-group">
						  <input style="width: 176px;" type="text" name="cUserIDNO" placeholder="Email" class="form-control">
						</div>
						<div class="form-group">
						  <input style="width: 176px;" type="password" name="cPassword" placeholder="Password" class="form-control">
						</div>
						<button type="submit" class="btn btn-success">Sign In</button>
						<br />
						<div style="float:right; float: right;
							border: 1px solid rgb(141, 141, 141);
							padding: 0px 8px 0px 8px;
							height: 39px;
							margin-top: 10px;
							border-radius: 5px;
							background: rgb(107, 117, 116);
							text-shadow: 0 1px 0 black;">
						  <a href="rg.php" class="new-register"><span></span><h3 class="register-button" style="margin-top: 0px;">Register <span class="label label-default" style="background-color: #E74198;">Click here</span></h3></a>
						  </div>
					 </form>
				 </div>
				 	<!-- Button trigger modal--> 
					<button id="sm-register" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
				  		Sign In | Register
					</button>';
                 else
                 echo '
                        <div class="hidden-lg hidden-md hidden-sm" style="position: absolute; right: 0; top: 0;">
						
						
							
							<div class="form-group" style="margin: 0 20px 0 0;font-size:36px; line-height:15px; text-align: center;">
								<span class="top-logout">Welcome&nbsp;&nbsp;'.$name.' <span class="glyphicon glyphicon-heart-empty"></span>
							</div>
						
							
							
							<div class="form-group" style="margin: 0px 20px 0 0;font-size:16px; line-height:15px;">
							  	<a href="myaccount.php">
								
									<button type="button" class="btn btn-default btn-md" style="width:125px;">
									  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> My Account
									</button>
								</a>	
								<br />
								<a href="logout.php">
									<button type="button" class="btn btn-default btn-md" style="width:125px;">
									  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out
									</button>
								</a>

							</div>
							
							
						</div>
						
						
						
						
						
						<div class="hidden-xs hidden-lg" style="position: absolute; right: 0; top: 0;">
						
						
							<div class="form-group" style="margin: 0 20px 0 0;font-size:36px; line-height:15px;">
								<span class="top-logout">Welcome&nbsp;&nbsp;'.$name.' <span class="glyphicon glyphicon-heart-empty"></span>
							</div>
						
							
							
							<div class="form-group" style="margin: 0px 20px 0 0;font-size:16px; line-height:15px;">
							  	<a href="myaccount.php">
								
									<button type="button" class="btn btn-default btn-lg">
									  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> My Account
									</button>
								</a>	
								<a href="logout.php">
									<button type="button" class="btn btn-default btn-lg">
									  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out
									</button>
								</a>

							</div>
							
							
							
						</div>
						
						
						
						
						
						
						
						
						
						
						<div class="hidden-xs hidden-md hidden-sm" style="position: absolute; right: 0; top: 0;">
						
						
							<div class="form-group" style="margin: 0 20px 0 0;font-size:36px; line-height:15px; text-align: center;">
								<span class="top-logout">Welcome&nbsp;&nbsp;'.$name.' <span class="glyphicon glyphicon-heart-empty"></span>
							</div>
						
							
							
							<div class="form-group" style="margin: 0px 20px 0 0;font-size:16px; line-height:15px;">
							  	<a href="myaccount.php">
								
									<button type="button" class="btn btn-default btn-md" style="width:200px;">
									  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> My Account
									</button>
								</a>	
								<br />
								<a href="logout.php">
									<button type="button" class="btn btn-default btn-md" style="width:200px;">
									  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out
									</button>
								</a>

							</div>
							
							
							
						</div>
						
						
						
						
						
						
						
						
						
							';
            
                 ?>
        
    
    </div>
</div>
    

    
	<!--<div id="top-menu" class="nav-box">
		<div class="container">    
    

      		<nav class="navbar navbar-default" role="navigation">
             	<div class="navbar-header">
                	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                      	<span class="sr-only">Toggle navigation</span>
                      	<span class="icon-bar"></span>
                      	<span class="icon-bar"></span>
                      	<span class="icon-bar"></span>
                	</button>

              	</div>
             
              	<div class="collapse navbar-collapse navbar-ex1-collapse">
                	<ul class="nav navbar-nav">
                  		
                        <li><a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span></a></li>
                        
                        <li><a href="aboutus.php" class="navbar-brand">About Us</a></p></li>
                 		
                        <li class="dropdown">
                    		<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown">Getting Started <span style="font-size:12px;" class="glyphicon glyphicon-chevron-down"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="registration.php">Membership Registration Instruction</a></li>
                                <li><a href="forms.php">Forms need to be fill by New Members</a></li>
                            </ul>
                  		</li>
                  		
                        <li class="dropdown">
                    		<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown">Marketing System <span style="font-size:12px;" class="glyphicon glyphicon-chevron-down"></span></a>
                    		<ul class="dropdown-menu">
                            	
                      			<li><a href="rebate123.php">Rebate 1-2-3</a></li>
                      			<li><a href="7lpb.php">The 7 Level Passive Bonus Structure</a></li>
                                <li><a href="arm.php">Automatic Recruiting Mechanism</a></li>
                                <li><a href="ims.php">Intelligent Marketing System</a></li>     
                                <li><a href="benefits.php">Benefits</a></li>  
                            
                                   
                    		</ul>
                  		</li>
                  		
                  		
                        <li class="dropdown">
                    		<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown">Resources <span style="font-size:12px;" class="glyphicon glyphicon-chevron-down"></span></a>
                    		<ul class="dropdown-menu">
                      			<li><a href="forms/TMS Handbook 11-7-14 web.pdf" target="new">Hand Book (PDF)</a></li>
                      			<li><a href="#">Presentation Resources</a></li>
                                <li><a href="seminar.php" target="_self">Seminar Schedule</a></li>
                			</ul>
                  		</li>
                  
                  		<li><a href="faq.php" class="navbar-brand">F.A.Q</a></li>
                  		<li style="display:none;"><a href="#" class="navbar-brand">Affiliates</a></li>
                  		<li><a href="contactus.php" class="navbar-brand">Contact US</a></li>                   
                	</ul>                
           		</div>
         	</nav>
            
          
		</div>
	</div>
    
    
    
    
    <div id="top-menu-float" class="nav-box" style="box-shadow:  0px 0px 13px rgb(107, 107, 107)"></div>-->
    
    
    
    
     