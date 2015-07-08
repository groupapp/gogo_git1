<?php 
	require_once("header.php"); 
	
	$action		= $_POST["action"];
	$IsActive	= $_POST["IsActive"];
	$BannerID	= $_POST["ClockID"];
	$aid		= empty($_GET["aid"])?"":$_GET["aid"];
	$act		= empty($_GET["act"])?"":$_GET["act"];
	$btn		= empty($_POST["button"])?"":$_POST["button"];
?>


	<!-- sideMenu -->
	<div class="path" style='display:none'>
	Clock Manage</div>
	
	<div id="bodywrapper">
    
    <!-- sideMenu -->
		<div id="navLeft">
			<div style="font:bold 16px/1.2 Palatino Linotype;color:#aaa;"></div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
				<br/>
				
			</div>
			
		</div>
		
		
		<!-- content right -->
		<div id="contwrapper">
			<div id="title">
				Countdown Clock Manager
			</div>
			<div id="sub1">
				<table style="border-bottom: 2px solid #BBB; border-top: 2px solid #BBB;">
					<tbody>
						<tr>
							<td class="subject1_2">No</td>
							<td class="subject1_2">Name</td>
							<td class="subject1_2">Image</td>
							<td class="subject1_2">Digit Background</td>
							<td class="subject1_2">Digit Color</td>
							<td class="subject1_2">Active?</td>
							<td class="subject1_2">Delete?</td>
						</tr>
						<form name="form1" method="post" action="Manage_Clock_Image_action.php">
							<input type="hidden" name="ClockID" value="<?php echo $aid ?>">
							<input type="hidden" name="action" value="del"/>
							
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT * FROM ClockImg Order by ClockID DESC";
	$DB->query($strSQL);
	while ($data = $DB->fetch_array($DB->res)){
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general_c\"><a href=\"Manage_Clock_Image.php?act=view&aid=" . $data["ClockID"] . "\">" . $data["ClockID"] . "</a></td>";
		echo "<td class=\"general\"><a href=\"Manage_Clock_Image.php?act=view&aid=" . $data["ClockID"] . "\">" 
		 . substr($data["Name"], 0, 100) . "</a></td>";
		echo "<td class=\"general_c\">";
		if ($data["ClockImg"]!="")
		echo "<a class=\"ajax\" href=\"/images/banner/".$data["ClockImg"]."\">[View Image]</a>";			
		echo "</td>";
		echo "<td class=\"general_c\">".$data['cssName']."</td>";
		echo "<td class=\"general_c\"><div style=\"width:30px;height:20px;display:inline-block;border:1px solid #ddd;background-color:#".$data['hexColor'].";\"/></td>";
		echo "<td class=\"general_c\">";
		if ($data["IsActive"]) {
			echo "Y";
		} else {
			echo "N";
		}
		echo "</td>";
		echo "<td class=\"general_c\">";
		echo "<a href=\"Manage_Clock_Image_action.php?action=del&id=" . $data["ClockID"] . "\" onClick=\"if(confirm('Do you want to delete this content of Clock Image?')){return true;}else{return false;}\">";
		echo "Delete</a>";
		echo "</td>";
		echo "</tr>";
	}
?>
						</form>
					</tbody>
				</table>
				<br/>
				<script type="text/javascript" >
				function link(){
				window.location="Manage_Clock_Image.php";
				}
				</script>
				
				<?php 
				if($act=="view"){		//someting selected
					echo "<p><input type=\"button\" value=\"Add New \" onclick=\"link()\"></p>";
				}
				?>
				
				<form name="form1" method="post" action="Manage_Clock_Image_action.php" enctype="multipart/form-data" >
					<?php
						if($act=="view"){
							$strSQL = "SELECT * FROM ClockImg WHERE ClockID = " . $aid;
							$DB->query($strSQL);
							$data = $DB->fetch_array($DB->res);	
						}
					?>

					<input type="hidden" name="ClockID" value="<?php echo $aid ?>">
					<table>
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2">Active?</th>
								<td colspan="3" class="general">
									<input type="checkbox" name="IsActive" value="Y" <?php echo ($data["IsActive"]=="Y")?"checked":null ?>/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Name</th>
								<td colspan="3" class="general">
									<input type="text" name="Name" value="<?php  echo $data["Name"]?>" size="50" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2" >Background Image</th>
								<td  class="general">
								<?php 
									  if ($data["ClockImg"]!="")
									  echo "<img src=\"/images/banner/".$data["ClockImg"]."\"  width=\"100\" height=\"50\"/>&nbsp;&nbsp;<input type=\"file\" name=\"ClockImg\"> ";
									  else
									  echo "<input type=\"file\" name=\"ClockImg\"> ";
								?>
									<br /><span style="color:#F30">Clock background image must be 261 x 200 pixels.</span>
								</td>
								<th class="subject2">Digit Background</th>
								<td class="general">
									<select name="cssName">
										<option value="">Select One....</option>
										<option value="white" <?php echo $data['cssName']=="white"?"selected":null?>>Light</option>
										<option value="black" <?php echo $data['cssName']=="black"?"selected":null?>>Dark</option>
									</select>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2" >Target Date</th>
								<td class="general"><input type="text" name="TargetDate" value="<?php echo $data["TargetDate"];?>"/>(yyyy-mm-dd H:m:s)</td>
								<th class="subject2">Digit Color</th>
								<td class="general">
									<script type="text/javascript" src="./js/jscolor.js"></script>
									<input type="text" name="hexColor" size="10" class="color" value="<?php echo $data['hexColor'] ? $data['hexColor'] : "4FFF78"?>" /> <span style="color:#999; font-size:1.6em;">��click here</span>
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
									echo "<input name=\"button\" type=\"submit\"  value=\"Add\"/>";
									echo "<input type=\"hidden\" name=\"action\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input type=\"submit\" name=\"button\"  value=\"Update\"/>";
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
	$DB->close();	//DB close
	require_once("footer.php"); 
?>