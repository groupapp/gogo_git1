<?php 
	require_once("header.php"); 
	
	$action			= $_POST["action"];
	$HelpAndFAQs_ID	= $_POST["HelpAndFAQs_ID"];
	$IsActive		= $_POST["IsActive"];
	$HelpAndFAQs	= $_POST["HelpAndFAQs"];
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
				Help / FAQs
			</div>
			<div id="sub1">
				<table style="border-top: 2px solid #BBB; border-bottom: 2px solid #BBB;">
					<tbody>
						<tr>
							<td class="subject1_2">No</td>
							<td class="subject1_2">Help</td>
							<td class="subject1_2">Active?</td>
							<td class="subject1_2">Delete</td>
						</tr>
						<form name="form1" method="post" action="Manage_HelpAndFAQs_action.php">
							<input type="hidden" name="action" value="del"/>
							<input type="hidden" name="HelpAndFAQs_ID" value="<?php echo $aid ?>"/>
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT * FROM HelpAndFAQs ORDER BY HelpAndFAQs_ID ASC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	while ($data = $DB->fetch_array($DB->res)){
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general_c\">".$numrows."</td>";
		echo "<td class=\"general\"><a href=\"Manage_HelpAndFAQs.php?act=view&aid=" . $data["HelpAndFAQs_ID"] . "\">Help Statement " . $sortNum . "</a></td>";
		echo "<td class=\"general_c\">";
		if ($data["IsActive"]) {
			echo "Y";
		} else {
			echo "N";
		}
		echo "</td>";
		echo "<td class=\"general_c\">";
		echo "<a href=\"Manage_HelpAndFAQs_action.php?action=del&id=" . $data["HelpAndFAQs_ID"] . "\" onClick=\"if(confirm('Do you want to delete this content of help statement?')){return true;}else{return false;}\"/>";
		//echo "<input name=\"button\" type=\"submit\" onClick=\"if(confirm('Do you want to delete this content of help statement?')){return true;}else{return false;}\" value=\"Delete\"/>&nbsp;";
		echo "Delete</a></td>";
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
					echo "<p><a href=\"Manage_HelpAndFAQs.php\">Add New Help / FAQs</a></p>";
				}
				?>		
				<table>
					<form name="form2" method="post" action="Manage_HelpAndFAQs_action.php">	
						<?php
							if($act=="view"){
								$strSQL = "SELECT * FROM HelpAndFAQs WHERE HelpAndFAQs_ID = " . $aid;
								$DB->query($strSQL);
								$data = $DB->fetch_array($DB->res);	
							}
						?>					
						<input type="hidden" name="Action" value="AddHelpAndFAQs"/>
						<input type="hidden" name="HelpAndFAQs_ID" value="<?php echo $aid ?>"/>
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2">IsActive?</th>
								<td colspan="3" class="general">
									<input type="checkbox" name="IsActive" value="Y" <?php echo ($data["IsActive"]=="Y")?"checked":null?>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Help</th>
								<td colspan="3" class="general">
									You can use HTML syntax to make some texts sized, highlighted, bold, colored, and etc.<br/>
									<textarea name="HelpAndFAQs" rows="20" style="width: 90%;"><?php echo $data["HelpAndFAQs"];?></textarea>
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
								echo "<td colspan=\"4\" align=\"center\" class=\"btns\">";
								if(!$act){	//nothing selected
									echo "<input name=\"button\" type=\"button\" onClick=\"return AddConfirm5(this.form);\" value=\"Add\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input name=\"button\" type=\"button\" onClick=\"return ModifyConfirm4(this.form);\" value=\"Update\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"update\"/>";
									echo "<input type=\"hidden\" name=\"view\" value=\"view\"/>";
								}
							?>

									<input type="button" name="button" onclick="javascript:document.form1.reset();return false;" value="Reset"/>
								</td>
							</tr>
						</tbody>
					</form>
				</table>
			</div>
		
<?php require_once("footer.php"); ?>