


<script language="JavaScript">
<!--
function Checkmail() {
       if (document.getElementById('tcUserIDNO').value == '') 
		   { alert("Please, enter your eMail Address.");
          return false; }
		var tcUserIDNO=document.getElementById('tcUserIDNO').value;
		//alert(tcUserIDNO);
       window.location='forget_action.php?tcUserIDNO='+tcUserIDNO;
	}
//-->
</script>

					
<div class="jumbotron">
      <div class="container">
        
<!--------------------------------------------------------------------------------------------------------------------->




   <div align="center">
   <table border="0" cellpadding="0" cellspacing="1" width="90%">
   
   
     <tbody>
	 <tr>
      <td colspan="2"><b><font face="Tahoma" size="6">Forgot your password?</font></b></td>   
     </tr>

     <tr>
      <td colspan="2" size="3">If you can`t remember your password, <br>just enter your email address below and click "Submit"<br>We`ll email your password to you shortly.<br><br><br>
	  </td>
     </tr>

     
	<form name="email" method="post" action="forget_action.php">	
     <tr>
      <td align="right" height="25">E-Mail Address</td>     
      <td align="left" height="25"><input type="text" id="tcUserIDNO" name="tcUserIDNO"   value="" class="inputorder"></td>
     </tr>

     <tr>
      <td></td>
      <td align="left"><input type="submit" value="   Submit  " onclick="return Checkmail()" class="btn_medium"></td>
	  <!--<td align="left"><input type="submit" value="   Submit  "  class="btn_medium"></td>-->
     </tr>
   </form>
   </tbody>
   

   </table>
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
   

	