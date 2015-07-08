<?php 
	require_once("header.php");
		
	$action		= $_POST["action"];
	$psid		= empty($_GET["psid"])?"":$_GET["psid"];
	$act		= empty($_GET["act"])?"":$_GET["act"];
	$coltitle	= empty($_GET["coltitle"])?"":$_GET["coltitle"];
	$btn		= empty($_POST["button"])?"":$_POST["button"];

	$DB 	= new myDB;
?>

 
	<!-- sideMenu -->
	<div class="path" style='display:none'></div>
	<div id="bodywrapper">
    
    <!-- sideMenu -->
		<div id="navLeft">
			<div style="font:bold 18px/1.8 Palatino Linotype; color:#aaa;">Column Titles
			</div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
				<br/>
				<form name="coltitle" method="post" action="Manage_Popular_Searches_action.php">
					<table>
						<tbody>
<?php 
	$strSQL = "SELECT * FROM ColumnTitle ORDER BY ColumnOrder ASC";
	$DB->query($strSQL);
	while ($data = $DB->fetch_array($DB->res)){
?>
							<tr>
								<td><?php echo $data["ColumnOrder"];
								if($data["ColumnOrder"]==1){
									echo "st :";
								}elseif($data["ColumnOrder"]==2){
									echo "nd :";
								}elseif($data["ColumnOrder"]==3){
									echo "rd :";
								}
								?></td>
								<td style="text-transform: capitalize;">
									<input type="hidden" name="CategoryOrder<?php echo $data["ColumnOrder"]?>" value="<?php echo $data["ColumnOrder"]?>"/>
									<?php 
									if($coltitle==1){?>
									<input type="text" name="CategoryTitle<?php echo $data["ColumnOrder"];?>" value="<?php echo $data["ColumnTitle"];?>">	
							<?php	}else{
										echo $data["ColumnTitle"];
									}
									?>
								</td>
							</tr>
<?php }?>
						</tbody>
					</table>
					<p class="btns">
						<?php if($coltitle==1){?>
						<inpyt type="hidden" name="coltitle" value="coltitle"/>
						<input type="submit" name="btn" value="Update"/>
						<a href="https://sshop.i9biz.com/shopadmin/Manage_Popular_Searches.php"><input type="button" name="btn" value="Cancel"/></a>
						<?php }else{?>
						<a href="https://sshop.i9biz.com/shopadmin/Manage_Popular_Searches.php?coltitle=1">
						<input type="button" name="btn" value="Edit"/></a>
						<?php }?>
					</p>
				</form>
			</div>		
		</div>
		
		
		<!-- content right -->
		<div id="contwrapper">
			<div id="title">
				Manage Popular Searches
			</div>
			<div id="sub1">	
				<form name="form1" method="post" action="Manage_Popular_Searches_action.php">			
					<table>
						<tbody>
							<tr class="subject_border_top">
								<td class="subject1_2">Location<br/>Column</td>							
								<td class="subject">Category Title</td>
								<td class="subject1_2">Display<br/>Order</td>
								<td class="subject">Popular Search</td>
								<td class="subject">Linked Page</td>
								<td class="subject1_2" style="min-width: 148px;">Display Period<br/><span class="alt-th">(<span style="color:green">green</span>=on; <span style="color:#f35">red</span>=off)</span></td>
								<td class="subject" style="min-width: 59px;">Date<br/>Created</td>
								<td class="subject" style="min-width: 59px;">Date<br/>Updated</td>
								<td class="subject1_2">Active</td>
								<td class="subject1_2">Delete</td>
							</tr>						
							<input type="hidden" name="action" value="del"/>
<?php
	$strSQL = "SELECT CT.ColumnOrder, CT.ColumnTitle, PS.PopularSearchID, PS.DisplayOrder, PS.PopularSearch, PS.SearchLink, PS.FromDate, PS.ToDate, PS.DateTimeCreated, PS.DateTimeLastModified, PS.IsActive
FROM ColumnTitle CT
LEFT JOIN PopularSearch PS ON CT.ColumnOrder = PS.Location
ORDER BY CT.ColumnOrder, PS.DisplayOrder ASC";	
	$DB->query($strSQL);
	while ($data = $DB->fetch_array($DB->res)) {
		if($data["DateTimeCreated"]<1){
			$dateCreate = "";
		}else{
			$dateCreate = date("n/j/Y", strtotime($data["DateTimeCreated"]));
		}
		if($data["DateTimeLastModified"]<1){
			$dateUpdate = "";
		}else{
			$dateUpdate = date("n/j/Y", strtotime($data["DateTimeLastModified"]));
		}		
	//	if()
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general_c\">" . $data["ColumnOrder"] . "</td>";
		echo "<td class=\"general\" style=\"text-transform: capitalize;\">" . $data["ColumnTitle"] . "</td>";
		echo "<td class=\"general_c\">" . $data["DisplayOrder"] . "</td>";
		echo "<td class=\"general\" style=\"text-transform: capitalize;\"><a href=\"Manage_Popular_Searches.php?act=view&psid=" . $data["PopularSearchID"] . "\">" . $data["PopularSearch"] . "</a></td>";
		echo "<td class=\"general\"><a href=\"".$data["SearchLink"]."\" target=\"_blank\">" . $data["SearchLink"] . "</a></td>";
		if (strtotime($data["FromDate"]) <= time() && strtotime($data["ToDate"]) >= time()) {
			$mystyle = " style=\"color:green\"";
		} else {
			$mystyle = " style=\"color:#f35\"";
		}
		echo "<td class=\"general_c\"".$mystyle.">". $data["FromDate"] . " <em>to</em> ". $data["ToDate"]. "</td>";
		echo "<td class=\"general\">" . $dateCreate . "</td>";
		echo "<td class=\"general\">" . $dateUpdate . "</td>";
		echo "<td class=\"general_c\">";
		if ($data["IsActive"]) {
			echo "Y";
		} else {
			echo "N";
		}
		echo "</td>";
		echo "<td class=\"general_c\"><input type=\"checkbox\" name=\"idtodel[]\" value=\"" . $data["PopularSearchID"] . "\" class=\"\" /></td>";
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
				<?php if($act=="view"){?>
				<a href="https://sshop.i9biz.com/shopadmin/Manage_Popular_Searches.php"><input type="button" type="button" value="Add New" style="margin-bottom: 5px;"/></a>
				<?php }?>
				<form name="form2" method="post" action="Manage_Popular_Searches_action.php">	
					<?php
					$strSQL = "SELECT CT.ColumnOrder, CT.ColumnTitle, PS.PopularSearchID, PS.Location, PS.DisplayOrder, PS.PopularSearch, PS.SearchLink, PS.FromDate, PS.ToDate, PS.IsActive
					FROM ColumnTitle CT LEFT JOIN PopularSearch PS ON CT.ColumnOrder = PS.Location 
					WHERE PopularSearchID = " . $psid;
					$DB->query($strSQL);
					$data = $DB->fetch_array($DB->res);	
					?>				
					<input type="hidden" name="PSID" value="<?php echo $data["PopularSearchID"];?>"/>
					<table>
						<tbody>
							<tr>
								<th colspan="4" class="subject , subject_border_top">
									Popular Search Details
								</th>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Location</th>
								<td class="general" colspan="3">
									<ul>
<?php 
	$strSQL = "SELECT * FROM ColumnTitle ORDER BY ColumnOrder ASC";
	$DB->query($strSQL);
	$i=1;
	while ($smallData = $DB->fetch_array($DB->res)){
?>
									
										<li style="float: left; padding-right: 10px; width: 145px;">
											<input type="radio" name="location" id="column<?php echo $i;?>" value="<?php echo $i;?>" <?php if($data["Location"]==$i) echo "checked";?>>
											<label for="column<?php echo $i;?>" style="float: right;">
												<span style="padding-right: 25px; text-transform: capitalize;"><?php echo $smallData["ColumnTitle"];?></span>
											</label>
										</li>
									
<?php 
		$i++;
	}
?>
									</ul>
								</td>
							</tr>
			<!-- 			<tr class="thin_border_bottom">
								<th class="subject2">Category Title</th>
								<td class="general" colspan="3">
									<input type="text" name="CategoryTitle" value="<?php echo $data["CategoryTitle"];?>" style="width: 98%;"/>
								</td>
							</tr> -->
							<tr class="thin_border_bottom">
								<th class="subject2">Popular Search</th>
								<td class="general" colspan="3">
									<input type="text" name="PopularSearch" value="<?php echo $data["PopularSearch"];?>" style="width: 98%;"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Search Link</th>
								<td class="general" colspan="3">
									<input type="text" name="SearchLink" value="<?php echo $data["SearchLink"];?>" style="width: 98%;"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Display Order</th>
								<td class="general">
									<input type="text" name="DisplayOrder" value="<?php echo $data["DisplayOrder"];?>"/>
								</td>
								<th class="subject2">Active</th>
								<td class="general">
									<input type="checkbox" name="IsActive" value="Y" <?php echo ($data["IsActive"]=="Y")?"checked":null?>>
								</td>
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2" style="width: 25%">From Date</th>
								<td class="general">
									<input type="text" name="FromDate" value="<?php echo $data["FromDate"];?>"/>
									 (yyyy-mm-dd)
								</td>
								<th class="subject2" style="width: 25%">To Date</th>
								<td class="general">
									<input type="text" name="ToDate" value="<?php echo $data["ToDate"];?>"/>
									 (yyyy-mm-dd)
								</td>
							</tr>
							<?php								
								echo "<tr>";
								echo "<td colspan=\"4\" align=\"center\" class=\"btns\">";
								if(!$act){	//nothing selected
									echo "<input name=\"button2\" type=\"button\" onClick=\"return AddConfirm12(this.form);\" value=\"Add\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input name=\"button2\" type=\"button\" onClick=\"return UpdateConfirm5(this.form);\" value=\"Update\"/>";
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
	require_once("footer.php"); 
	$DB->close();	//DB close
?>