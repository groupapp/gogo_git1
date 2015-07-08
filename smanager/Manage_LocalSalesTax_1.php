<?php 
	require_once("header.php"); 
	
	$action				= $_POST["action"];
	$LocalSalesTaxRate	= $_POST["LocalSalesTaxRate"];
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
				California Local Sales Tax Rate (%)
			</div>
			<div id="sub1" style="width: 70%;">
				<p class="bold_s">Local Sales Tax Rate: </p>
				<p>For example, the state sales and use tax in Texas is <b>6.25</b>%, but local taxing jurisdictions (cities, counties, special purpose districts, and transit authorities) may also impose sales and use tax up to 2% for a total maximum combined rate of <b>8.25</b>%.<br/>
				If Texas residents purchase taxable items from a website located in Texas, they will have to pay state and local use taxes.</p>
				<br/>
				<p>For information about the tax rate for a specific area in your State, you can easily find it through the internet. For example, here is a link for <a href="http://www.taxadmin.org/fta/rate/sales.html">State Sales Tax Rates</a> in the US. </p>
			</div>
			<div id="sub2">
				<table style="width: 70%;">
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">Local Sales Tax Rate (%) in California</td>
							<td class="subject1_2"></td>
						</tr>
						<form name="form1" method="post" action="Manage_LocalSalesTax_action.php">
							<?php 
								$DB 	= new myDB;							
								$strSQL = "SELECT * FROM CompanyInfo WHERE CompanyID = 1";
								$DB->query($strSQL);
								$data = $DB->fetch_array($DB->res);	
							?>
							<input type="hidden" name="CompanyID" value="<?php echo $data["CompanyID"];?>"/>
							<tr class="subject_border_bottom">
								<td class="general_c">
									<input type="text" name="LocalSalesTaxRate" value="<?php echo $data["LocalSalesTaxRate"];?>"> %
								</td>
								<td class="general_c">
									<input type="button" name="button" onclick="return Confirm_Update2(this.form);" value="Update"/>
									<input type="hidden" name="action" value="update"/>
								</td>
							</tr>						
						</form>
					</tbody>
				</table>
			</div>
		
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>