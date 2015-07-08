<?php 
	require_once("header.php"); 
	
	$action			= $_POST["action"];
	$ReturnPolicyID	= $_POST["ReturnPolicyID"];
	$PriorityNo		= $_POST["PriorityNo"];
	$ReturnPolicy	= $_POST["ReturnPolicy"];
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
				Return Policies
			</div>
			<div id="sub1">
				<table>
					<tbody>
						<tr align="center" class="subject_border_top">
							<td class="subject1_2" width="10%">Sort No</td>
							<td class="subject1_2">Company Policies</td>
							<td class="subject1_2" width="10%">Update / Add</td>
							<td class="subject1_2" width="10%">Delete</td>
						</tr>
						
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT * FROM ReturnPolicy ORDER BY PriorityNo ASC";
	$DB->query($strSQL);
	$Num = 1;
	while ($data = $DB->fetch_array($DB->res)){
		echo "<form name=\"UpdateForm_$Num\" method=\"post\" action=\"Manage_ReturnPolicy_action.php\">";
		echo "<input type=\"hidden\" name=\"ReturnPolicyID\" value=\"". $data["ReturnPolicyID"] ."\"/>";
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general_c\">";
		echo "<input type=\"text\" name=\"PriorityNo\" class=\"box\" value=\"" . $data["PriorityNo"] . "\"/>";
		echo "</td>";
		echo "<td class=\"general_c\">";
		echo "<textarea name=\"ReturnPolicy\" rows=\"4\" style=\"margin: 0px; width: 90%; height: 56px;\">" . $data["ReturnPolicy"] . "</textarea>";
		echo "</td>";
		echo "<td class=\"general_c\">";
		//echo "<a href=\"Manage_ReturnPolicy_action.php?action=update&id=" . $data["ReturnPolicyID"] . "&box1=" . $data["PriorityNo"] . "&box2=" . $data["ReturnPolicy"] . "\">";
		echo "<input type=\"button\" name=\"Submit1\" onclick=\"ModifyConfirm3(this.form);\" value=\"Update\"/>";
		echo "<input type=\"hidden\" name=\"action\" value=\"update\"/>";
		//echo "</a>";
		echo "</td>";
		echo "<td class=\"general_c\">";
		echo "<a href=\"Manage_ReturnPolicy_action.php?action=del&id=" . $data["ReturnPolicyID"] . "\">";
		echo "<input type=\"button\" name=\"Submit2\" onclick=\"DeleteConfirm(this.form);\" value=\"Delete\"/>";
		//echo "<input type=\"hidden\" name=\"action\" value=\"del\"/>";
		echo "</a></td>";
		echo "</tr>";
		echo "</form>";
		$Num++;
	}
	
?>
							<form name="AddForm" method="post" action="Manage_ReturnPolicy_action.php">
							<tr align="center" class="subject_border_bottom">
								<td class="general">
									<input type="text" name="PriorityNo_add" class="box"/>
								</td>
								<td class="general">
									<textarea name="ReturnPolicy_add" rows="4" style="margin: 0px; width:90%; height: 56px;"></textarea>
								</td>
								<td class="general">
									<input type="button" name="Submit3" onclick="AddConfirm4(this.form);" value="Add"/>
									<input type="hidden" name="action" value="add"/>
								</td>
								<td class="general"></td>
							</tr>
						</form>
					</tbody>
				</table>
			</div>

<?php require_once("footer.php"); ?>