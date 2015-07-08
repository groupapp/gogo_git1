<?php require_once("header.php"); ?>


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
				Fee for Attaching Emblems onto Jerseys & Replicas
			</div>
			<div id="sub1" style="width: 70%;">
				<p>Customers can have a set of 2 league emblems or badges attached onto both sleeves of the jerseys and replicas that they purchase online by paying the following extra fee:</p>
				<br/>
				<table style="width: 100%;">
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">Fee for Attaching Emblems onto Jerseys, Uniforms & Replicas ($)</td>
							<td class="subject1_2"></td>
						</tr>
						<form name="form1" method="post" action="Manage_FeeForAttachingEmblems_action.php">
							<?php 
								$DB = new myDB;
								$strSQL = "SELECT * FROM CompanyInfo Where CompanyID=1";
								$DB->query($strSQL);
								$data = $DB -> fetch_array($DB -> res)
							?>
							<input type="hidden" name="CompanyID" value="<?php echo $aid ?>">
							<tr class="subject_border_bottom">
								<td class="general_c">$
									<input type="text" name="FeeForAttachingEmblems" value="<?php echo $data["FeeForAttachingEmblems"];?>"> (Example: 15.99)
								</td>
								<td class="general_c , subject_border_top">
									<input type="submit" name="submit" value="Update">
									<input type="hidden" name="action" value="update"/>
								</td>
							</tr>							
						</form>
					</tbody>
				</table>
				<br/>
				<p>To have <u>no Fee for Attaching Emblems</u> (i.e. cancel it), just enter <b>0</b> and click on Update button</p>
			</div>
		
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>