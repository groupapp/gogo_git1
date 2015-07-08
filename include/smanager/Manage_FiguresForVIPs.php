<?php 
	require_once("header.php"); 
	
	$action							= $_POST["action"];
	$PointsID						= $_POST["PointsID"];
	$DiscountPercentageForVIPs		= $_POST["DiscountPercentageForVIPs"];
	$ProductAmountPercentageForVIPs	= $_POST["ProductAmountPercentageForVIPs"];
	$MinimumPointsForVIPs			= $_POST["MinimumPointsForVIPs"];
	$VIP_Membership_Price			= $_POST["VIP_Membership_Price"];
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
				VIP Members Preferences
			</div>
			<div id="sub1">
				<p class="bold_s">Minimum Points for VIP Members:</p>
				<br/>
				<p><u>Minimum Points for VIP Members</u> is a minimum points that a customer must earn before he/she entitles a VIP Members. The idea is that a customer earnes certain points whenever he/she successfully purchases merchandise from Lemontreeclothing.com. Here, a successful purchase means an online purchase order that is completed by being shipped out without cancellation.</p>
				<br/>
				<p>The points he/she earns with an every successful purchase is a certain percentage of the amount of money he/she spends for purchasing with Lemontreeclothing.com. For example, a customer who places a successful order of total product amount $ 100 gets 10 points if 10% of the total product amount is applied to the customer's earned points.</p>
				<br/>
				<p>The accusmlated sum of thease earned points is a customer's total earned points, and he/she becomes a VIP Member if his/her total earned points, the Minimem Points for VIP Members.</p>
				<br/>
				<p class="bold_s">Discount Percentage at Purchase for VIP Members</p>
				<br/>
				<p>By this <u>Discount Percentage at Purchase for VIP Members,</u> VIP members purchase products at reduced prices rather than at regular prices. For example, VIP members purchase a product of regular price $ 100 at $95 if Discount Percentage at Purchase for VIP Members is set to 5%.</p>
			</div>
			<div id="sub2">
				<table>
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">
								Discount Percentage
								at Purchase
							</td>
							<td class="subject1_2">
								Percentage of
								Product Amount
							</td>
							<td class="subject1_2">
								Minimum Points
								for being VIP Members
							</td>
							<td class="subject1_2">
								Price of
								VIP Membership
							</td>
							<td class="subject1_2"></td>
						</tr>
						<form name="form1" method="post" action="Manage_FiguresForVIPs_action.php">
							<input type="hidden" name="PointsID" value="<?php echo $aid ?>">
							<?php 
								$DB 	= new myDB;
								$strSQL = "SELECT * FROM FiguresForVIPs Where PointsID=1";
								$DB->query($strSQL);
								$data = $DB->fetch_array($DB->res);
							?>
							<tr class="subject_border_bottom">
								<td class="general_c">
									<input type="text" name="DiscountPercentageForVIPs" value="<?php echo $data["DiscountPercentageForVIPs"];?>" class="box2"/>%
								</td>
								<td class="general_c">
									<input type="text" name="ProductAmountPercentageForVIPs" value="<?php echo $data["ProductAmountPercentageForVIPs"];?>" class="box2"/>%
								</td>
								<td class="general_c">
									<input type="text" name="MinimumPointsForVIPs" value="<?php echo $data["MinimumPointsForVIPs"];?>" class="box2"/>Points
								</td>
								<td class="general_c">
									$<input type="text" name="VIP_Membership_Price" value="<?php echo $data["VIP_Membership_Price"];?>" class="box2"/>
								</td>
								<td class="general_c">
									<input type="button" name="Submint" onclick="return Confirm_Update(this.form);" value="Update"/>
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