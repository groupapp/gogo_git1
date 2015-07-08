<?php 
	require_once("header.php"); 

	$action			= $_POST["action"];
	$PaymentMethodID= $_POST["PaymentMethodID"];
	$PaymentType	= $_POST["PaymentType"];
	$PaymentMethod	= $_POST["PaymentMethod"];
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
		<div id="contwrapper">
			<div id="title">
				Payment Methods
			</div>
			<div id="sub1">
				<p class="bold_s">Payment Processing Types:</p>
				<p>&nbsp; &nbsp; &nbsp; Offline Processing: &nbsp;
				Receive payments or payment info directly from the customers who place orders, via phone, fax or e-mail.<br/>
				&nbsp; &nbsp; &nbsp; Online Processing: &nbsp;
				Process customer orders automatically through your website via a credit card processor or Pay Pal. To do this, your website must have online processing capabilities.
				</p>
				<p><b class="bold_s">Payment Methods:</b> &nbsp; 
				Credit cards (Visa, Master, Discover and etc.), Money orders, COD, Cashier's checks, Company checks and etc.</p>
			</div>
			<div id="sub2">
				<table style="border-bottom: 2px solid #BBB;">
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">No</td>
							<td class="subject1_2">Payment Processing Types</td>
							<td class="subject1_2">Payment Methods</td>
							<td class="subject1_2">Date / Time Created</td>
							<td class="subject1_2">Date / Time Modified</td>
							<td class="subject1_2">Delete</td>
						</tr>
						<form name="form1" method="post" action="Manage_PaymentMethods_action.php">
							<input type="hidden" name="action" value="del"/>
							<input type="hidden" name="PaymentMethodID" value="<?php echo $aid ?>">
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT * FROM PaymentMethods ORDER BY PaymentMethodID ASC";
	$DB->query($strSQL);
	$numrows = $DB->rows;

	while ($data = $DB->fetch_array($DB->res)){
		if($data["DateTimeCreated"]<1){
			$dateCreate="";
		}else{
			$dateCreate = date("n/j/Y g:i:s A", strtotime($data["DateTimeCreated"]));
		}
		if($data["DateTimeLastModified"]<1){
			$dateUpdate="";
		}else{
			$dateUpdate = date("n/j/Y g:i:s A", strtotime($data["DateTimeLastModified"]));
		}
?>		
							<tr class="thin_border_bottom">
								<td class="general_c"><?php echo $numrows;?></td>
								<td class="general_c"><?php echo $data["PaymentType"];?></td>
								<td class="general"><a href="Manage_PaymentMethods.php?act=view&aid=<?php echo $data["PaymentMethodID"];?>"><?php echo $data["PaymentMethod"];?></a></td>
								<td class="general_c"><?php echo $dateCreate;?></td>
								<td class="general_c"><?php echo $dateUpdate;?></td>
								<td class="general_c">
									<a href="Manage_PaymentMethods_action.php?action=del&id=<?php echo $data["PaymentMethodID"];?>" onclick="if(confirm('Do you want to delete this payment method?')){return true;}else{return false;}">
	<!-- 	<input type=\"submit\" name=\"submit\" onclick=\"if(confirm('Do you want to delete this payment method?')){return true;}else{return false;}\" value=\"Delete\"/>"; -->
								Delete</a></td>
							</tr>
<?php	$numrows--;
		$dateCreate = "";
		$dateUpdate = "";
	}
?>
						</form>
					</tbody>
				</table>
			</div>
			<br/>
			<div id="sub3">
			<?php 
				if($act=="view"){		//someting selected
					echo "<p><a href=\"Manage_PaymentMethods.php\">Add New Payment Methods</a></p>";
				}
				?>
				<table>
					<form name="form2" method="post" action="Manage_PaymentMethods_action.php">
					<?php
						if($act=="view"){
							$strSQL = "SELECT * FROM PaymentMethods WHERE PaymentMethodID = " . $aid;
							$DB->query($strSQL);
							$data = $DB->fetch_array($DB->res);	
						}
					?>
						<input type="hidden" name="PaymentMethodID" value="<?php echo $aid ?>">
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2" width="20%">Payment Processing Type</th>
								<td class="general">
									<select name="PaymentType">
										<option value="">Select:</option>";
										<option value="Offline Processing" <?php if($data["PaymentType"]=="Offline Processing") echo "selected";?>>&nbsp; Offline Processing</option>";
										<option value="Online Processing" <?php if($data["PaymentType"]=="Online Processing") echo "selected";?>>&nbsp; Online Processing</option>";										
									</select>
								</td>
								<th class="subject2" width="20%">
									Payment Method
								</th>
								<td class="general">
									<input type="text" name="PaymentMethod" value="<?php echo $data["PaymentMethod"];?>">
								</td>
							</tr>
								<?php 
									if($data["DateTimeCreated"]<1){
										$dateCreate = "";
									}else{
										$dateCreate = date("n/j/Y g:i:s A", strtotime($data["DateTimeCreated"]));
									}
									if($data["DateTimeLastModified"]<1){
										$dateLastModify = "";
									}else{
										$dateLastModify = date("n/j/Y g:i:s A", strtotime($data["DateTimeLastModified"]));
									}
								?>
							<tr class="subject_border_bottom">
								<th class="subject2">
									Date / Time Created
								</th>
								<td class="general"><?php echo $dateCreate;?></td>
								<th class="subject2">
									Date / Time Modified
								</th>
								<td class="general"><?php echo $dateLastModify;?></td>
							</tr>
							<?php 
								echo "<tr>";
								echo "<td colspan=\"4\" class=\"general_c , btns\">";
								if(!$act){	//nothing selected
									echo "<input name=\"button2\" type=\"button\" onClick=\"return AddConfirm7(this.form);\" value=\"Add\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input name=\"button2\" type=\"button\" onClick=\"return ModifyConfirm6(this.form);\" value=\"Update\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"update\"/>";
									echo "<input type=\"hidden\" name=\"view\" value=\"view\"/>";
								}
							?>
							
									<input type="button" name="button" onclick="javascript:document.form1.reset false;" value="Reset">
								</td>
							</tr>
						</tbody>
					</form>
				</table>
			</div>
		
<?php require_once("footer.php"); ?>