<?php 
	require_once("header.php"); 

	$action					= $_POST["action"];
	$CompanyID				= $_POST["CompanyID"];
	$FeeForPersonalization	= $_POST["FeeForPersonalization"];
	$aid	= empty($_GET["aid"])?"":$_GET["aid"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
	$btn	= empty($_POST["button"])?"":$_POST["button"];
?>


	<!-- sideMenu -->
	<div class="path" style='display:none'>
	About Us</div>

	<div id="bodywrapper">
    
    <!-- sideMenu -->
		<div id="navLeft">
			<div style="font:bold 16px/1.2 Palatino Linotype;color:#aaa;">Lemontree Events
			</div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
				<br/>
				
			</div>
			
		</div>
		
		
		<!-- content right -->
		<div id="contwrapper" style="border-left: 1px solid #BBB;">
			<div id="title">
				Fee for Personalization (Jerseys, Replicas & Uniforms)
			</div>
			<div id="sub1">
				<p>Customers can have their names and numbers ironed on the jerseys, replicas &amp; uniforms that they purchase online by paying the following extra fee:</p>
				<br/>
				<table style="width: 70%;">
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">Fee for Personalization ($)</td>
							<td class="subject1_2"></td>
						</tr>
						<form name="form1" method="post" action="Manage_FeeForPersonalization_action.php">
							
							<?php 
								$DB = new myDB;
								$strSQL = "SELECT * FROM CompanyInfo Where CompanyID=1";
								$DB->query($strSQL);
								$data = $DB -> fetch_array($DB -> res)
							?> 
							<input type="hidden" name="CompanyID" value="<?php echo $aid ?>">
							<tr class="subject_border_bottom">
								<td class="general_c">$
									<input type="text" name="FeeForPersonalization" value="<?php echo $data[FeeForPersonalization];?>"/> (Example: 25.99)
								</td>
								<td class="general_c">
									<input type="submit" name="submit" value="Update">
									<input type="hidden" name="action" value="update"/>
								</td>
							</tr>			
						</form>
					</tbody>
				</table>
				<br/>
				<p>TO have <u>no Fee For Personalization</u> (i.e. cancel it), just <b>0</b> and click on Update button</p>
			</div>
		
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>