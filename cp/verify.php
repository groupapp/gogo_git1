
<body>
<?php 
$tnUser_Num=$_GET['no'];
$tcUser_Num=$_GET['id'];
$tcSponsorX=$_GET['sp'];
$tcUserIDNO=$_GET['em'];

$current = "group";
include('nav.php');
include('function.php');



?>

<SCRIPT LANGUAGE="JavaScript">
<!--
function CheckAccountNew() {
       if (document.loginNew.tcPassword.value == "" ) { alert("Please fill out password");
          document.loginNew.tcPassword.focus();
		  return false; }
       if (document.loginNew.tcPassCode.value == "" ) { alert("Please fill out confirm password");
          document.loginNew.tcPassCode.focus();
		  return false; }
       if (document.loginNew.tcPassCode.value != document.loginNew.tcPassword.value ) { alert("Mismatch confirm password");
          document.loginNew.tcPassCode.focus();
		  return false; }
       return true;
	}
//-->
</script>
					
<div class="jumbotron">
      <div class="container">
        
<!--------------------------------------------------------------------------------------------------------------------->

     <div align="center">
      <form name="loginNew" action="verify_action.php" method="post">
     <input type="hidden" name="tnUser_Num" value="<?php echo $tnUser_Num?>">
     <input type="hidden" name="tcUser_Num" value="<?php echo $tcUser_Num?>">
     <input type="hidden" name="tcSponsorX" value="<?php echo $tcSponsorX?>">

	  <table border="0" cellspacing="1" cellpadding="1">
	 
	  <tbody><tr> 
		<td align="right">&nbsp; Sponsor # &nbsp; </td>  
		<td align="left"><?php echo $tcSponsorX?></td>
	  </tr>

	  <tr> 
		<td align="right">&nbsp; Member ID &nbsp; </td>  
		<td align="left"><?php echo $tcUser_Num?></td>
	  </tr>


	  <tr> 
		<td align="right">&nbsp; E-Mail Address &nbsp; </td>  
		<td align="left"><?php echo $tcUserIDNO?></td>
	  </tr>
	  <tr><td align="center" colspan="2" height="20"></td></tr>

	  <tr> 
		<td align="right">&nbsp; Password &nbsp; </td>
		<td align="left"><input type="password" name="tcPassword" size="25" maxlength="21" value="" class="inputorder"></td>
	  </tr>

	  <tr> 
		<td align="right">Confirm the password</td>
		<td align="left"><input type="password" name="tcPassCode" size="25" maxlength="30" value="" class="inputorder"></td>
	  </tr>

	  <tr> 
		<td></td>
		<td align="left"><input type="submit" value="Submit" name="loginNew" onclick="return CheckAccountNew()" class="btn_medium"></td>
	  </tr>

	  </tbody></table>
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