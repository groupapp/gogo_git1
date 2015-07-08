<?php 
include_once dirname(__FILE__) . "/include/function.php";

$AdminID		= empty($_POST["AdminID"])?"":$_POST["AdminID"];
//$IsActive		= $_POST["IsActive"];
$LoginID		= empty($_POST["LoginID"])?"":$_POST["LoginID"];
$LoginPassword	= empty($_POST["LoginPassword"])?"":$_POST["LoginPassword"];
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
			<div style="font:bold 16px/1.2 Palatino Linotype;color:#aaa;">Usim Project
			</div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
				<br/>
			</div>		
		</div>
		
		
		<!-- content right -->
		<div id="contwrapper">
			<div id="title">
				Website Administrators
			</div>
			<div id="sub1">	
				<form name="form1" method="post" action="Manage_Administrators_action.php">			
					<table>
						<tbody>
							<tr class="subject_border_top">
								<td class="subject1_2">AID</td>
								<td class="subject">Login ID</td>
								<td class="subject">Login Password</td>
								
							</tr>						
							<input type="hidden" name="action" value="del"/>
<?php
$DB 	= new myDB;
$strSQL = "SELECT * FROM WebsiteAdministrators ORDER BY AdminID ASC";	
$DB->query($strSQL);
while ($data = $DB->fetch_array($DB->res)) {
	//	if()
	echo "<tr class=\"thin_border_bottom\">";
	echo "<td class=\"general_c\"><a href=\"Manage_Administrators.php?act=view&aid=" . $data["AdminID"] . "\">" . $data["AdminID"] . "</a></td>";
	//echo "<td class=\"general\"><a href=\"Manage_Administrators.php?act=view&aid=" . $data["AdminID"] . "\">  </a></td>";
	echo "<td class=\"general\">";
	if (1==1) {	// check if the user is super administrator
		echo $data["LoginID"];
	} else {
		echo "**********";
	}
	echo "</td>";
	echo "<td class=\"general\">" . $data["LoginPassword"] . "</td>";
	echo "<td class=\"general\">";
	echo "</td>";
	echo "<td class=\"general_c\"><input type=\"checkbox\" name=\"idtodel[]\" value=\"" . $data["AdminID"] . "\" class=\"\" /></td>";
	echo "</tr>";
	$dateCreate = "";
	$dateUpdate = "";
}
if($data["AdminID"]=1){
	echo "<tr class=\"subject_border_top\">";
	echo "<td colspan=\"10\" class=\"general_c , btns\">";
	echo "<input name=\"button\" type=\"button\" onClick=\"return DeleteCheckedConfirm(this.form);\" value=\"Delete Checked\"/>&nbsp;";
	echo "<input name=\"button\" type=\"button\" onClick=\"javascript:document.form1.reset();return false;\" value=\"Reset\"/>";
	echo "</td>";
	echo "</tr>";
}

//	$DB->close(); 		// close DB
?>						
						
						
						</tbody>
					</table>
				</form>
			</div>
			<br/>
			<div id="sub2">
				<form name="form2" method="post" action="Manage_Administrators_action.php">	
					<?php
					
					$strSQL = "SELECT * FROM WebsiteAdministrators WHERE AdminID = " . $aid;
					$DB->query($strSQL);
					$data = $DB->fetch_array($DB->res);	
					
					$AdminID	= empty($data["AdminID"];)?"":$data["AdminID"];
					
					$data["AdminID"];
					$data["LoginID"];
					$data["LoginPassword"];
					
					?>				
					<input type="hidden" name="AdminID" value="<?php echo $data["AdminID"];?>"/>
					<table>
						<tbody>
							<tr>
								<th colspan="4" class="subject , subject_border_top">
									Administrator Details
								</th>
							</tr>
<?php 
if ($aid) {
?>
	<tr class="thin_border_bottom">
	<th class="subject2" width="20%">AID</th>
								<td class="general"><?php echo $data["AdminID"];?></td>
<th class="subject2" width="20%">&nbsp;</th>
<td class="general">
</td>
</tr>
							

<?php 
}
?>
							
							<tr class="thin_border_bottom">
								<th class="subject2">Login ID</th>
								<td class="general">
									<input type="text" name="LoginID" value="<?php echo $data["LoginID"];?>"/>
								</td>
								<th class="subject2">Login Passwordd</th>
								<td class="general">
									<input type="text" name="LoginPassword" value="<?php echo $data["LoginPassword"];?>"/>
								</td>
							</tr>
							
							
							<?php								
							echo "<tr>";
							echo "<td colspan=\"4\" align=\"center\" class=\"btns\">";
							if(!$act){	//nothing selected
								echo "<input name=\"button2\" type=\"button\" onClick=\"return AddConfirm(this.form);\" value=\"Add\"/>";
								echo "<input name=\"action\" type=\"hidden\" value=\"add\"/>";		
							}
							else{		//someting selected							
								echo "<input name=\"button2\" type=\"button\" onClick=\"return UpdateConfirm(this.form);\" value=\"Update\"/>";
								echo "<input name=\"action\" type=\"hidden\" value=\"update\"/>";
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
		
<?php 
//require_once("footer.php"); 
$DB->close();	//DB close
?>
