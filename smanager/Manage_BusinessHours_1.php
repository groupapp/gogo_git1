<?php 
	require_once("header.php"); 

	$action			= $_POST["action"];
	$BizHours		= $_POST["BizHours"];
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
				
			</div>
			
		</div>
		
		
		<!-- content right -->
		<div id="contwrapper" style="border-left: 1px solid #BBB;">
			<div id="title">
				Store Business Hours
			</div>
			<div id="sub1">
				<table style="width: 70%; border-top: 2px solid #BBB;; border-bottom: 2px solid #BBB;">
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">No</td>
							<td class="subject">Store Business Hours</td>
							<td class="subject1_2">Delete</td>
						</tr>
						<form name="form1" method="post" action="Manage_BusinessHours_action.php">
							
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT * FROM BusinessHours ORDER BY BizHoursID ASC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	echo "<input type=\"hidden\" name=\"BizHoursID\" value=\"" . $aid . "\">";
	while ($data = $DB->fetch_array($DB->res)){
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general_c\">" . $numrows . "</td>";
		echo "<td class=\"general\">" . $data["BizHours"] . "</td>";
		echo "<td class=\"general_c\">";
		echo "<a href=\"Manage_BusinessHours_action.php?action=del&id=" . $data["BizHoursID"] . "\" onclick=\"if(confirm('Do you want to delete the business hours?')){return true;}else{return false;}\">";
		echo "Delete</a>";
		//	echo "<input name=\"button\" type=\"button\" onclick=\"if(confirm('Do you want to delete the business hours?')){return true;}else{return false;}\" value=\"Delete\"/>&nbsp;";
		echo "</td>";
		echo "</tr>";
		$numrows--;
	}
?>
							<tr class="subject_border_bottom">
								<td class="general"></td>
								<td class="general">
									<input type="text" name="BizHours">
								</td>
								<td class="general_c">
									<input type="button" name="Submit" onclick="return AddConfirm8(this.form);" value="Add">
									<input type="hidden" name="action" value="add"/>
								</td>
							</tr>
						</form>
				</table>
			</div>
		
<?php require_once("footer.php"); ?>