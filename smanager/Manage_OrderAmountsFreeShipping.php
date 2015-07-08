<?php 
	require_once("header.php"); 

	$action				= $_POST["action"];
	$FreeShippingAmount	= $_POST["FreeShippingAmount"];
	$aid	= empty($_GET["aid"])?"":$_GET["aid"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
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
		<div id="contwrapper">
			<div id="title">
				Order Amount for Free Ground Shipping
			</div>
			<div id="sub1">
				<table style="width: 70%;">
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">Order Amount for Free Ground Shipping ($)</td>
							<td class="subject1_2"></td>
						</tr>
						<form name="form1" method="post" action="Manage_OrderAmounts_action.php">
							<?php
								$DB 	= new myDB;
								$strSQL = "SELECT * FROM CompanyInfo WHERE CompanyID = 1";
								$DB->query($strSQL);
								$data = $DB->fetch_array($DB->res);	
							?>
							<input type="hidden" name="Action" value="Update"/>
							<tr  class="subject_border_bottom">
								<td class="general_c">
									$
									<input type="text" name="FreeShippingAmount" value="<?php echo $data["FreeShippingAmount"];?>">
									(Example: 80.25)
								</td>
								<td class="general_c">
									<input type="submit" name="submit" value="Update">
									<input type="hidden" name="action" value="FreeShippingUpdate"/>
								</td>
							</tr>
						</form>
					</tbody>
				</table>
				<p>To have <u>no order amount for free ground shipping</u>, just enter <b>0</b> and click on Update button</p>
			</div>
		
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>