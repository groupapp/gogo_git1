<?php 
	require_once("header.php");

	$action			= $_POST["action"];
	$PrivacyPolicyID= $_POST["PrivacyPolicyID"];
	$PrivacyPolicy	= $_POST["PrivacyPolicy"];
	$IsActive		= $_POST["IsActive"];
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
				Privacy Policy
			</div>
			<div id="sub1">
				<table>
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">No</td>
							<td class="subject1_2">Privacy Policy</td>
							<td class="subject1_2">Active?</td>
							<td class="subject1_2">Delete</td>
						</tr>
						<form name="form1" method="post" action="Manage_PrivacyPolicy_action.php">
							<input type="hidden" name="PrivacyPolicyID" value="<?php echo $aid ?>"/>
							<input type="hidden" name="action" value="del"/>
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT * FROM PrivacyPolicy ORDER BY PrivacyPolicyID ASC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	while ($data = $DB->fetch_array($DB->res)){
		echo "<tr>";
		echo "<td class=\"general_c\">" . $numrows . "</td>";
		echo "<td class=\"general\"><a href=\"Manage_PrivacyPolicy.php?act=view&aid=" . $data["PrivacyPolicyID"] . "\">" . substr($data["PrivacyPolicy"], 0, 100) .  "</a></td>";
		echo "<td class=\"general_c\">";
		if ($data["IsActive"]) {
			echo "Y";
		} else {
			echo "N";
		}
		echo "</td>";
		echo "<td class=\"general_c\">";
		echo "<a href=\"Manage_PrivacyPolicy_action.php?action=del&id=" . $data["PrivacyPolicyID"] . "\" onclick=\"if(confirm('Do you want to delete this content of Privacy Policy?')){return true;}else{return false;}\">";
		echo "Delete</a>";
		echo "</tr>";
		$numrows--;
	}
?>
						</form>
					</tbody>
				</table>
				<br/>
				<?php 
				if($act=="view"){		//someting selected
					echo "<p><a href=\"Manage_PrivacyPolicy.php\">Add New Privacy Policy</a></p>";
				}
				?>
				<form name="form2" method="post" action="Manage_PrivacyPolicy_action.php">	
					<table>
					
						<?php
							if($act=="view"){
								$strSQL = "SELECT * FROM PrivacyPolicy WHERE PrivacyPolicyID = " . $aid;
								$DB->query($strSQL);
								$data = $DB->fetch_array($DB->res);
							}	
						?>				
						<input type="hidden" name="PrivacyPolicyID" value="<?php echo $aid ?>"/>
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2">Active?</th>
								<td colspan="3" class="general">
									<input type="checkbox" name="IsActive" value="Y" <?php echo ($data["IsActive"]=="Y")?"checked":null?>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">About Us</th>
								<td colspan="3" class="general">
									You can use HTML syntax to make some texts sized, highlighted, bold, colored, and etc.<br/>
									<textarea name="PrivacyPolicy" rows="20" style="width: 90%;"><?php echo $data["PrivacyPolicy"];?></textarea>
								</td>
							</tr>
							<tr class="subject_border_bottom">
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
								<th class="subject2" width="130px">Date / Time Created</th>
								<td class="general"><?php echo $dateCreate;?></td>
								<th class="subject2" width="130px">Date / Time Modified</th>
								<td class="general"><?php echo $dateLastModify;?></td>
							</tr>
							<?php 
								echo "<tr>";
								echo "<td colspan=\"4\" class=\"general_c , btns\">";
								if(!$act){	//nothing selected
									echo "<input name=\"button\" type=\"button\" onClick=\"return AddConfirm3(this.form);\" value=\"Add\"/>";
									echo "<input type=\"hidden\" name=\"action\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input type=\"button\" name=\"button\" onClick=\"return ModifyConfirm2(this.form);\" value=\"Update\"/>";
									echo "<input type=\"hidden\" name=\"action\" value=\"update\"/>";
									echo "<input type=\"hidden\" name=\"view\" value=\"view\"/>";
								}
							?>

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