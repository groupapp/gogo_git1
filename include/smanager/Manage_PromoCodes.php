<?php 
	require_once("header.php"); 

	$action				= $_POST["action"];
	$coupon_id			= $_POST["coupon_id"];
	$coupon_type		= $_POST["coupon_type"];
	$coupon_code		= $_POST["coupon_code"];
	$minimum_order		= $_POST["minimum_order"];
	$is_active			= $_POST["is_active"];
	$percentage_discount= $_POST["percentage_discount"];
	$product_id			= $_POST["product_id"];
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
				Promo Codes
			</div>
			<div id="sub1">
				<table style="border-top: 2px solid #BBB; border-bottom: 2px solid #BBB;">
					<tbody>
						<tr>
							<td class="subject1_2">Promo Code</td>
							<td class="subject1_2">Type</td>
							<td class="subject1_2">Discount (%)</td>
							<td class="subject1_2">Product ID</td>
							<td class="subject1_2">Minimum Order ($)</td>
							<td class="subject1_2">Free Shipping?</td>
							<td class="subject1_2">Is Active?</td>
							<td class="subject1_2">Actions</td>
						</tr>
					<form name="form1" method="post" action="Manage_promoCodes_action.php">
						<input type="hidden" name="coupon_id" value="<?php echo $aid ?>">
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT * FROM Coupons ORDER BY coupon_id ASC";
	$DB->query($strSQL);
		while ($data = $DB->fetch_array($DB->res)){
?>
						<tr class="thin_border_bottom">
							<td class="general_c"><?php echo $data["coupon_code"];?></td>
							<td class="general_c"><?php echo $data["coupon_type"]?></td>
							<td class="general_c"><?php echo $data["percentage_discount"]?></td>
							<td class="general_c"><?php echo $data["product_id"]?></td>
							<td class="general_c"><?php echo $data["minimum_order"]?></td>
							<td class="general_c"><?php echo $data["IsFreeShip"]?></td>
							<td class="general_c"><?php echo $data["is_active"]?></td>
							<td class="general_c">
								<a href="Manage_PromoCodes.php?act=view&aid=<?php echo $data["coupon_id"];?>">Edit</a> | 
								<a href="Manage_PromoCodes_action.php?action=del&id=<?php echo $data["coupon_id"];?>" onclick="if(confirm('Do you want to delete this Promo-Code?')){return true;}else{return false;}">
								Delete</a>
							</td>
						</tr>
<?php 	}
?>
	</form>
					</tbody>
				</table>
			</div>
			<br/>
			<div id="sub2">
				<?php 
					if($act=="view"){		//someting selected
						echo "<p><a href=\"Manage_PromoCodes.php\">Add New Promo Code</a></p>";
					}
				?>
				<form name="form2" method="post" action="Manage_PromoCodes_action.php">	
					<?php 
						if($act=="view"){
							$strSQL = "SELECT * FROM Coupons WHERE coupon_id = " . $aid;
							$DB->query($strSQL);
							$data = $DB->fetch_array($DB->res);
					//		echo $strSQL."<br/>";
						}
					?>				
					<table>	
						<input type="hidden" name="coupon_id" value="<?php echo $aid ?>"/>
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2">Promo Code Type</th>
								<td class="general">
									<select name="coupon_type">
										<option>Select:</option>
										<?php 
								//			$strSQL = "SELECT DISTINCT coupon_type FROM Coupons ORDER BY coupon_id ASC";
								//			$DB->query($strSQL);
											
											$typeName=array("Free Shipping","Total Discount","Free Product","Total Discount & Free Shipping");
											$type=array("free_shipping","total_discount","free_product","combo_discount");
											for($i=0; $i<=3; $i++){
												echo "<option value=\"". $type[$i] . "\"";
												if($type[$i]==$data["coupon_type"]){
													echo "selected";
												}
												echo ">" . $typeName[$i] . "</option>";
											}
										?>
									</select>
								</td>
								<th class="subject2">Promo Code</th>
								<td class="general">
									<input type="text" name="coupon_code" value="<?php echo $data["coupon_code"];?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Minimum Order</th>
								<td class="general">
									<input type="text" name="minimum_order" value="<?php echo $data["minimum_order"];?>"/>
								</td>
								<th class="subject2">Is Active</th>
								<td class="general">
							<!-- 	<input type="text" name="is_active" value="<?php echo $data["is_active"];?>"/> -->
									<input type="checkbox" name="is_active" value="y" <?php echo ($data["is_active"]=="y")?"checked":null;?>/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Discount (%) (only for Total-Discount)</th>
								<td class="general">
									<input type="text" name="percentage_discount" value="<?php echo $data["percentage_discount"];?>"/>
									(1-100)
								</td>
								<th class="subject2">Product Id (only for Free-Product)</th>
								<td class="general">
									<input type="text" name="product_id" value="<?php echo $data["product_id"];?>"/>
								</td>
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2">Free Shipping?</th>
								<td class="general">
									<input type="checkbox" name="is_freeship" value="y" <?php echo ($data["IsFreeShip"]=="y")?"checked":null;?>/>
								</td>
								<th class="subject2"></th>
								<td class="general"></td>
							</tr>
							<?php								
								echo "<tr>";
								echo "<td colspan=\"4\" class=\"general_c , btns\">";
								if(!$act){	//nothing selected
									echo "<input type=\"button\" name=\"button\" onclick=\"return AddPromoCode(this.form);\" value=\"Add\"/>";
									echo "<input type=\"hidden\" name=\"action\" value=\"add\"/>";		
								}
								else {		//someting selected							
									echo "<input type=\"button\" name=\"button\" onclick=\"return ModifyConfirm7(this.form);\" value=\"Update\"/>";
									echo "<input type=\"hidden\" name=\"action\" value=\"update\"/>";
									echo "<input type=\"hidden\" name=\"view\" value=\"view\"/>";
								}
							?>

									<input type="button" name="button" onclick="javascript:document.form2.reset();return false;" value="Reset" />
								</td>
							</tr>
						</tbody>
					</table>				
				</form>
			</div>
		
<?php require_once("footer.php"); 
	   $DB->close(); //DB close

?>