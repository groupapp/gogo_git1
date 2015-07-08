<?php
	require_once("../include/function.php");
	$aid	= (!empty($_GET['id']))?$_GET['id']:null;
	$act	= (!empty($_GET['act']))?$_GET['act']:null;
?>
			<div style="padding: 20px;">
			<div style="font: bold 18px/1.5 Verdana">Product Color</div>
				<table style="width: 700px;">
					<form name="form1" method="post" action="Manage_Colors_action.php">
					<?php					
							$strSQL = "SELECT * FROM Colors WHERE ColorID = " . $aid;
							$DB = new myDB;
							$DB->query($strSQL);
							$data = $DB->fetch_array($DB->res);
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
						<input type="hidden" name="ColorID" value="<?php echo $data["ColorID"];?>"/>
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2">Color Name</th>
								<td colspan="3" class="general">
									<input type="text" name="Color" value="<?php echo $data["Color"];?>" style="width: 500px"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Active?</th>
								<td colspan="3" class="general">
									<input type="checkbox" name="IsActive" value="Y" <?php echo ($data["IsActive"]=="Y")?"checked":null?>
								</td>
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2"  width="130px">Created</th>
								<td class="general"><?php echo $dateCreate;?></td>
								<th class="subject2"  width="130px">Modified</th>
								<td class="general"><?php echo $dateLastModify;?></td>
							</tr>
							<?php								
								echo "<tr>";
								echo "<td colspan=\"4\" class=\"general_c , btns\">";
								if($act=="add"){	//nothing selected
									echo "<input name=\"button2\" type=\"button\" onClick=\"return AddConfirm100(this.form);\" value=\"Add\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input name=\"button2\" type=\"button\" onClick=\"return ModifyConfirm100(this.form);\" value=\"Update\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"update\"/>";	
								}
							?>
									<input type="button" name="button" id="cbClose" value="Cancel"/>
								</td>
							</tr>
						</tbody>
					</form>
				</table>
			</div>
			<script type="text/javascript">
			function AddConfirm100(frm) {
					if (confirm("Do you want to add this color?")) {
						return RegConfirm100(frm);
					}
					return false;
			}
			function ModifyConfirm100(frm) {
				if (confirm("Do you want to modify this color?")) {
					return RegConfirm100(frm);
				}
				return false;
			}

			function RegConfirm100(frm){
				if(!frm.Color.value){
					alert("Color name cannot be empty!");
					frm.Color.focus();
					return false;
				}
				frm.submit();
			}

			$('#cbClose').click(function() {
				parent.jQuery.fn.colorbox.close();
			});
			
			</script>