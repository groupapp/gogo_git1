<?php 
	require_once("header.php");

	$action					= $_POST["action"];
	$CompanyName			= $_POST["CompanyName"];
	$OwnerFirstName			= $_POST["OwnerFirstName"];
	$OwnerLastName			= $_POST["OwnerLastName"];
	$ContactFirstName		= $_POST["ContactFirstName"];
	$ContactLastName		= $_POST["ContactLastName"];
	$ContactFirstName2		= $_POST["ContactFirstName2"];
	$ContactLastName2		= $_POST["ContactLastName2"];
	$CompanyWebsite1		= $_POST["CompanyWebsite1"];
	$CompanyWebsite2		= $_POST["CompanyWebsite2"];
	$CompanyEmailAddress1	= $_POST["CompanyEmailAddress1"];
	$CompanyEmailAddress2	= $_POST["CompanyEmailAddress2"];
	$StoreAddress			= $_POST["StoreAddress"];
	$StoreCity				= $_POST["StoreCity"];
	$StoreStateOrProvince	= $_POST["StoreStateOrProvince"];
	$StoreZipCode			= $_POST["StoreZipCode"];
	$StoreCountryOrRegion	= $_POST["StoreCountryOrRegion"];
	$StorePhoneNumber		= $_POST["StorePhoneNumber"];
	$StoreFaxNumber			= $_POST["StoreFaxNumber"];
	$StorePhoneNumber2		= $_POST["StorePhoneNumber2"];
	$StoreFaxNumber2		= $_POST["StoreFaxNumber2"];
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
				Company Information
			</div>
			<div id="sub1">
				<form name="form1" method="post" action="Manage_CompanyInfo_action.php">
				
					<?php
						$DB 	= new myDB;
						$strSQL = "SELECT * FROM CompanyInfo WHERE CompanyID = 1";
						$DB->query($strSQL);
						$data = $DB->fetch_array($DB->res);	
					?>
					<table>
						<tbody>
							<tr class="subject_border_top">
								<th colspan="5" class="subject , subject_border_top">Company Information</th>
							</tr>
							<tr class="thin_border_bottom">
								<td class="subject2">Company Name</td>
								<td colspan="4" class="general">
									<input type="text" name="CompanyName" value="<?php echo $data["CompanyName"];?>"/>
								</td>
						</tr>
						<tr class="thin_border_bottom">
							<td class="subject2">Owner Name</td>
							<td class="general">First Name:</td>
							<td class="general"><input type="text" name="OwnerFirstName" value="<?php echo $data["OwnerFirstName"];?>"/></td>
							<td class="general">Last Name:</td>
							<td class="general"><input type="text" name="OwnerLastName" value="<?php echo $data["OwnerLastName"];?>"/></td>
						</tr>
						<tr class="thin_border_bottom">
							<td class="subject2">Contact Person 1</td>
							<td class="general">First Name:</td>
							<td class="general"><input type="text" name="ContactFirstName1" value="<?php echo $data["ContactFirstName1"];?>"/></td>
							<td class="general">Last Name:</td>
							<td class="general"><input type="text" name="ContactLastName1" value="<?php echo $data["ContactLastName1"];?>"/></td>
						</tr>
						<tr class="thin_border_bottom">
							<td class="subject2">Contact Person 2</td>
							<td class="general">First Name:</td>
							<td class="general"><input type="text" name="ContactFirstName2" value="<?php echo $data["ContactFirstName2"];?>"/></td>
							<td class="general">Last Name:</td>
							<td class="general"><input type="text" name="ContactLastName2" value="<?php echo $data["ContactLastName2"];?>"/></td>
						</tr>
						<tr class="thin_border_bottom">
							<td class="subject2">Company Websites</td>
							<td class="general">Website 1:</td>
							<td class="general"><input type="text" name="CompanyWebsite1" value="<?php echo $data["CompanyWebsite1"];?>"/></td>
							<td class="general">Website 2:</td>
							<td class="general"><input type="text" name="CompanyWebsite2" value="<?php echo $data["CompanyWebsite2"];?>"/></td>
						</tr>
						<tr class="subject_border_bottom">
							<td class="subject2">Company E-mail Address</td>
							<td class="general">E-mail 1:</td>
							<td class="general"><input type="text" name="CompanyEmailAddress1" value="<?php echo $data["CompanyEmailAddress1"];?>"/></td>
							<td class="general">E-mail 2:</td>
							<td class="general"><input type="text" name="CompanyEmailAddress2" value="<?php echo $data["CompanyEmailAddress2"];?>"/></td>
						</tr>
						</tbody>
					</table>
					<br/>
					<table>
						<tbody>
						<tr class="subject_border_top">
							<th colspan="4" class="subject">Mailing &amp; Contact information</th>
						</tr>
						<tr class="thin_border_bottom">
							<td class="subject2">Address</td>
							<td class="general"><input type="text" name="StoreAddress" value="<?php echo $data["StoreAddress"];?>"></td>
							<td class="subject2">City</td>
							<td class="general"><input type="text" name="StoreCity" value="<?php echo $data["StoreCity"];?>"></td>
						</tr>
						<tr class="thin_border_bottom">
							<td class="subject2">State / Province</td>
							<td class="general"><input type="text" name="StoreStateOrProvince" value="<?php echo $data["StoreStateOrProvince"];?>"></td>
							<td class="subject2">Zipcode</td>
							<td class="general"><input type="text" name="StoreZipCode" value="<?php echo $data["StoreZipCode"];?>"></td>
						</tr>
						<tr class="thin_border_bottom">
							<td class="subject2">Country</td>
							<td class="general"><input type="text" name="StoreCountryOrRegion" value="<?php echo $data["StoreCountryOrRegion"];?>"></td>
							<td class="subject2"></td>
							<td class="general"></td>
						</tr>
						<tr class="thin_border_bottom">
							<td class="subject2">Phone</td>
							<td class="general"><input type="text" name="StorePhoneNumber" value="<?php echo $data["StorePhoneNumber"];?>"></td>
							<td class="subject2">Fax</td>
							<td class="general"><input type="text" name="StoreFaxNumber" value="<?php echo $data["StoreFaxNumber"];?>"></td>
						</tr>
						<tr class="subject_border_bottom">
							<td class="subject2">Phone 2</td>
							<td class="general"><input type="text" name="StorePhoneNumber2" value="<?php echo $data["StorePhoneNumber2"];?>"></td>
							<td class="subject2">Fax 2</td>
							<td class="general"><input type="text" name="StoreFaxNumber2" value="<?php echo $data["StoreFaxNumber2"];?>"></td>
						</tr>
						<tr>
							<td colspan="4" class="general_c , btns">
								<input type="button" name="button" onclick="return UpdateConfirm2(this.form);" value="Update"/>
								<input type="hidden" name="action" value="update"/>
								<input type="button" name="button" onclick="javascript:document.form1.reset();return false;" value="Reset"/>
							</td>
						</tr>

						</tbody>
					</table>
				</form>
			</div>
			
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>