<?php 
	require_once("header.php"); 
	
	$action		= $_POST["action"];
	$ColorID	= $_POST["ColorID"];	
	$Color		= $_POST["Color"];
	$IsActive	= $_POST["IsActive"];
	$aid	= empty($_GET["aid"])?"":$_GET["aid"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
	$btn	= empty($_POST["button"])?"":$_POST["button"];
	$orderBy	= $_GET["orderby"];
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
				Manage Colors
			</div>
			
			<div id="sub1">
			
			<div style="float:right; margin-bottom: 5px;">
				Display Colors By:
				<select id="DisplayOrder">
					<option value>Select</option>
					<?php 
					$arrOpt[] = array("ColorID","Date/Time Added");
					$arrOpt[] = array("Color", "Color Name");
					$arrOpt[] = array("IsActive", "Active / Inactive");
					for ($i=0; $i<count($arrOpt); $i++) {
						echo "<option value=\"" . $arrOpt[$i][0] . "\"";
						if ($arrOpt[$i][0]==$orderBy) echo " selected";
						echo ">" . $arrOpt[$i][1] . "</option>";									
					}
					?>
				</select>
				<input type="button" name="button" value="Submit" onclick="orderBy()"/>
			</div>
			
			<div style="float:left">
			<?php 
			echo "<a href=\"#\" onclick=\"Popup=window.open('Manage_Colors_form.php?act=add','Popup','scrollbars=yes,resizable=yes,width=860,height=300'); return false;\"";
						echo " style=\"text-decoration: none; color: #0110DD;\">";
						echo "<input type=\"button\" name=\"preview\" id=\"preview\" value=\"Add New Color\"/></a>";
			?>

			<!--<a class="ajax" href="Manage_Colors_form.php?act=add">Add New Color</a></div>-->
				<form name="form2" method="post" action="Manage_Colors_action.php">
					<table>
						<tbody>
							<tr class="subject_border_top">
								<td class="subject1_2">No</td>
								<td class="subject1_2">Color Names</td>
								<td class="subject1_2">Active?</td>
								<td class="subject1_2">Date Created</td>
								<td class="subject1_2">Delete</td>
								<td class="subject1_2"> </td>
								<td class="subject1_2">No</td>
								<td class="subject1_2">Color Names</td>
								<td class="subject1_2">Active?</td>
								<td class="subject1_2">Date Created</td>
								<td class="subject1_2">Delete</td>
								
							</tr>
<?php 
	$DB 	= new myDB;
	if($orderBy){
		$strSQL = "SELECT * FROM Colors ORDER BY $orderBy ASC";
	}else{
		$strSQL = "SELECT * FROM Colors ORDER BY Color ASC";
	}
	$DB->query($strSQL);
	$cnt	= 1;
	$ColorNum = 0;
	$SortNum = 1;
	while ($data = $DB->fetch_array($DB->res)){
		$dateCreate = date("n/j/Y", strtotime($data["DateTimeCreated"]));
			if ($ColorNum < 1)
				echo "<tr class=\"thin_border_bottom\">";
			
			if($ColorNum%2==0 && $ColorNum > 0){
				echo"</tr><tr class=\"thin_border_bottom\">";
			}
			echo "<td class=\"general_c\">" . $SortNum  . "</td>";
			echo "<td class=\"general\">
<a href=\"#\" onclick=\"Popup=window.open('Manage_Colors_form.php?id=". $data["ColorID"] ."','Popup','scrollbars=yes,resizable=yes,width=860,height=300'); return false;\";	\">" . $data["Color"] . "	</a></td>";//<a class=\"ajax\" href=\"Manage_Colors_form.php?id=" . $data["ColorID"] . "\">" . $data["Color"] . "
			echo "<td class=\"general_c\">";
			if($data["IsActive"]){
				echo "Y";
			}else{
				echo "N";
			} 
			echo "</td>";
			echo "<td class=\"general_c\">" . $dateCreate . "</td>";
			echo "<td class=\"general_c\">";
			echo "<a href=\"Manage_Colors_action.php?action=del&id=" . $data["ColorID"] . "\" onclick=\"if(confirm('Do you want to delete this color?')){return true;}else{return false;}\">Delete</a>";
			echo "</td>";
			
			if($cnt>0){
				echo "<td>&nbsp;</td>";
			}
			$ColorNum++;
			$SortNum++;
			$cnt *= (-1);
	}

	if($cnt<0){
		echo "<td colspan=\"5\"></td>";
		echo "</tr>";
	}
?>
						</tbody>
					</table>
				</form>
			</div>
			<br/>
<!--			
			<div id="sub2">
				<?php 
				if($act=="view"){		//someting selected
					echo "<p><a href=\"Manage_Colors.php\">Add New Color</a></p>";
				}
				?>
				<table style="width: 90%;">
					<form name="form1" method="post" action="Manage_Colors_action.php">
					<?php
						if($act=="view"){					
							$strSQL = "SELECT * FROM Colors WHERE ColorID = " . $aid;
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
						}
					?>				
						<input type="hidden" name="ColorID" value="<?php echo $data["ColorID"];?>"/>
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2">Color Name</th>
								<td colspan="3" class="general">
									<input type="text" name="Color" value="<?php echo $data["Color"];?>"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Active?</th>
								<td colspan="3" class="general">
									<input type="checkbox" name="IsActive" value="Y" <?php echo ($data["IsActive"]=="Y")?"checked":null?>
								</td>
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2"  width="130px">Date / Time Created</th>
								<td class="general"><?php echo $dateCreate;?></td>
								<th class="subject2"  width="130px">Date / Time Modified</th>
								<td class="general"><?php echo $dateLastModify;?></td>
							</tr>
							<?php								
								echo "<tr>";
								echo "<td colspan=\"4\" class=\"general_c , btns\">";
								if(!$act){	//nothing selected
									echo "<input name=\"button2\" type=\"button\" onClick=\"return AddConfirm9(this.form);\" value=\"Add\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input name=\"button2\" type=\"button\" onClick=\"return ModifyConfirm8(this.form);\" value=\"Update\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"update\"/>";	
								}
							?>
									<input type="button" name="button" onclick="javascript:document.form1.reset();return false;" value="Reset"/>
								</td>
							</tr>
						</tbody>
					</form>
				</table>
			</div>
			
		
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>