<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>



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
                              
                              <tbody>
							  <tr> 
                                <td colspan="2" align="center" style="font-size: 30px;height: 200px;">&nbsp; Coupon Admin  &nbsp; </td>  
                                
                              </tr>	

							  <tr> 
                                <td align="right" width="40%">&nbsp; Admin Email &nbsp; </td>  
                                <td align="left" width="60%"><input type="text" name="cUserIDNO"  value="" class="inputorder" style="height: 40px;"></td>
                              </tr>
							  <tr> 
                                <td align="right">&nbsp; &nbsp; </td>
                                <td align="left">&nbsp; &nbsp;</td>
                              </tr>
                              <tr> 
                                <td align="right" width="40%">&nbsp; Password &nbsp; </td>
                                <td align="left" width="60%"><input type="password" id="pass" name="cPassword"  value="" class="inputorder" style="height: 40px;"></td>
                              </tr>
							  <tr> 
                                <td align="right">&nbsp; &nbsp; </td>
                                <td align="left">&nbsp; &nbsp;</td>
                              </tr>
                              <tr> 
                                <td></td>
                                <td align="left"><input type="button" value="Login" name="loginOld" onclick="return CheckAccountOld()" class="btn_medium"></td>
                              </tr>
                              <!--<tr> 
                                <td colspan="2" align="center"><br> <a  id="fp" class="ajax1" href="forget.php">Forget Password</a></td>
                              </tr>-->
                              
                              </tbody></table>
                              </form>  
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
				

	$("#pass").keypress(function (e) {
							
							if (e.keyCode == '13') {
								//alert('xx');
								CheckAccountOld();
								
							}
						});		

});
</script>


   
	