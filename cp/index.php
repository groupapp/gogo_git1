

<?php $current = "group";?>
<?php include('nav.php'); ?>

<script LANGUAGE="JavaScript">
<!--

function CheckAccountOld() {
       if (document.loginOld.cUserIDNO.value.length < 3 ) {
	  alert("Please enter Email");
          document.loginOld.cUserIDNO.focus();			
          return; }
       if (document.loginOld.cPassword.value.length < 1 ) {
	  alert("Please enter password");
          document.loginOld.cPassword.focus();			
          return; }
       document.loginOld.submit()
         }
//-->




</script>
					
<div class="jumbotron">
      <div class="container">
        
<!--------------------------------------------------------------------------------------------------------------------->

           <div align="center">
		   <div class="col-xs-12">
                              <form name="loginOld" action="login_action.php" method="post">
                              <table border="0" cellspacing="1" cellpadding="1">
                              
                              <tbody><tr> 
                                <td align="right" width="40%">&nbsp;Member ID or Email &nbsp; </td>  
                                <td align="left" width="60%"><input type="text" name="cUserIDNO"  maxlength="100" value="" class="inputorder" style="height: 40px;"></td>
                              </tr>
							  <tr> 
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr> 
                                <td align="right" width="40%">&nbsp; Password &nbsp; </td>
                                <td align="left" width="60%"><input type="password" id="pass" name="cPassword" maxlength="50" value="" class="inputorder" style="height: 40px;"></td>
                              </tr>
							  <tr> 
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr> 
                                <td></td>
                                <td align="left"><input type="button" value="Login" name="loginOld" onclick="return CheckAccountOld()" class="btn_medium"></td>
                              </tr>
                              <tr> 
                                <td colspan="2" align="center"><br> <a  id="fp" class="ajax1" href="forget.php">Forget Password</a></td>
                              </tr>
                              <!--<tr> 
                                <td colspan="2" align="left"><br>Haven't verified your account yet?  Send an email to <a href="mailto:contact@bigtms.com?Subject=Verification%20Email" target="_top">contact@bigtms.com</a>and we'll help you out.</td>
                              </tr>-->
                              </tbody></table>
                              </form>
							  <table border="0" cellspacing="1" cellpadding="1">
							  <tr>
							  <td><img src="/myfilemanager/dynamic_folder/IN_0/ENCORE-COUPON-1-March-300.jpg" width="100%"></td>
							  <td><img src="/myfilemanager/dynamic_folder/IN_0/ENCORE-COUPON-1-March-500.jpg" width="100%"></td>
							  </tr>
							  <tr>
							  <td><img src="/myfilemanager/dynamic_folder/IN_0/ENCORE-COUPON-1-March-300.jpg" width="100%"></td>
							  <td><img src="/myfilemanager/dynamic_folder/IN_0/ENCORE-COUPON-1-March-500.jpg" width="100%"></td>
							  </tr>
							  </table>
							  </div>
                              </div>

         
<!--------------------------------------------------------------------------------------------------------------------->




        
      </div>
    </div>	
	
	<hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>
    </div> <!-- /container -->

<script LANGUAGE="JavaScript">

$(document).ready(function(){
				$('#fp').fancybox({
					'width'             :   600,
					'height'            :   600,
					'autoScale'         :   false,         //if using older fancybox
					'autoSize'          :   false,         //if using newer fancybox
					'autoDimensions'    :   false,
				});

			$("#pass").keypress(function (e) {
							
							if (e.keyCode == '13') {
								//alert('xx');
								CheckAccountOld();
								
							}
						});	

});
</script>


   
	