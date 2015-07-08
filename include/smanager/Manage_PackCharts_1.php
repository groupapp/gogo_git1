<?php 
	require_once("header.php"); 
	
	$LIMIT	= 20;
	
	$action					= $_POST["action"];
	$PackChartID			= $_POST["PackChartID"];
	$PackChartName			= $_POST["PackChartName"];
	$PackChartDescription	= $_POST["PackChartDescription"];
	$Edit_IsActive			= $_POST["Edit_IsActive"];
	

	$aid	= empty($_GET["aid"])?"":$_GET["aid"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
	$btn	= empty($_POST["button"])?"":$_POST["button"];
	$pp		= empty($_GET["pp"])?null:$_GET["pp"];
	$displayOrder	= $_GET["displayOrder"];
	$searchField	= $_GET["searchField"];
	$searchKeyword	= $_GET["searchKeyword"];
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
				Pack Charts
			</div>

<!----------------------------------------------------------------------------------->

<div id="sub2">
				<?php 
				if($act=="view"){		//someting selected
					echo "<p style=\"margin-bottom: 3px;\"><a href=\"Manage_PackCharts.php\"><input type=\"button\" value=\"Add New Pack Chart\" /></a></p>";
				}
				?>
				<table>
					<form name="form1" method="post" action="Manage_PackCharts_action.php">
<?php
	if($act=="view"){
		$DB 	= new myDB;
		$strSQL = "SELECT * FROM Pack WHERE PackChartID = " . $aid;
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
						<input type="hidden" name="PackChartID" value="<?php echo $aid; ?>">
						<input type="hidden" name="searchField" value="<?php echo $searchField; ?>">
						<input type="hidden" name="searchKeyword" value="<?php echo $searchKeyword; ?>">
						<input type="hidden" name="displayOrder" value="<?php echo $displayOrder; ?>">
						<input type="hidden" name="pp" value="<?php echo $pp;?>">
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2" style="width: 200px">Date / Time Created</th>
								<td class="general"><?php echo $dateLastModify;?></td>
								<th class="subject2" style="width: 200px">Status</th>
								<td class="general">
								<input type="radio" name="Edit_IsActive"  value="Y" <?php echo (($data["IsActive"]=="Y") or ($data["IsActive"]=="") )?"checked":null?>/>Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="Edit_IsActive"  value="N" <?php echo ($data["IsActive"]=="N")?"checked":null?>/>Inactive
								</td>
								<?php								
								echo "<td rowspan=\"3\" style=\"border: 1px solid #DDD;\" class=\"general_c , btns,thin_border_bottom\">";
								if(!$act){	//nothing selected
									echo "<input name=\"button2\" type=\"button\" onClick=\"return AddConfirm14(this.form);\" value=\"Add\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input name=\"button2\" type=\"button\" onClick=\"return ModifyConfirm10(this.form);\" value=\"Update\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"update\"/>";
									echo "<input type=\"hidden\" name=\"view\" value=\"view\"/>";
								}
								?>

								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th  class="subject2">Pack Chart Name</th>
								<td class="general" colspan="3">
									<input type="text" name="PackChartName" value="<?php echo $data[PackChartName];?>" style="width: 99%;"/>
								</td>
								<!--<th class="subject2">Pack Chart Description</th>
								<td class="general">
									<textarea name="PackChartDescription" rows="2" style="width: 99%;"><?php echo $data[PackChartDescription];?></textarea>
								</td>-->
							</tr>
							<tr class="thin_border_bottom">
								<td colspan="4">
									<table>
										<tbody>
											<tr>
												<?php 
													for ($i=1;$i<=10;$i++){
														echo "<th class=\"subject2_c\">Pack ".$i."</th>";
													}

												?>
											</tr>
											<tr>
<?php
	$strSQL2 = "SELECT * FROM Pack WHERE PackChartID = " . $aid;
	$strSQL2 .= " ORDER BY `Order`, `PackID` ASC";
	$DB2 = new myDB;
	$DB2->query($strSQL2);
	$cnt = 0;
//	echo $strSQL2;
	while ($PackData = $DB2->fetch_array($DB2->res)){
?>
												<td class="general_2">
													<input type="text" name="Pack[<?php echo $cnt+1;?>]" class="box" value="<?php echo $PackData["Pack"];?>"/>
													<input type="hidden" name="hPack[<?php echo $cnt+1;?>]" value="<?php echo $PackData["PackID"];?>">
												</td>
<?php 
		$cnt++;
	}
	if($cnt<10){
		for($cnt; $cnt<10; $cnt++){
?>
												<td class="general_2">
													<input type="text" name="Pack[<?php echo $cnt+1;?>]" class="box" value=""/>
													<input type="hidden" name="hPack[<?php echo $cnt+1;?>]" value="<?php echo $PackData["PackID"];?>">
												</td>
<?php
		}
	}
?>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<!--<?php								
								echo "<tr>";
								echo "<td colspan=\"4\" class=\"general_c , btns\">";
								if(!$act){	//nothing selected
									echo "<input name=\"button2\" type=\"button\" onClick=\"return AddConfirm11(this.form);\" value=\"Add\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input name=\"button2\" type=\"button\" onClick=\"return ModifyConfirm9(this.form);\" value=\"Update\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"update\"/>";
									echo "<input type=\"hidden\" name=\"view\" value=\"view\"/>";
								}
							?>
									<input type="button" name="button" onclick="javascript:document.form1.reset();return false;" value="Reset"/>
								</td>
							</tr>-->
						</tbody>
					</form>
				</table>
			</div>
		


<!------------------------------------------------------------------------------------>

<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT DISTINCT PackChartID, PackChartName,IsActive,DateTimeLastModified FROM Pack";
	if($searchField && $searchKeyword){
		$strSQL .= " WHERE ".$searchField." LIKE '%".$searchKeyword."%'";
	}
	if($displayOrder=="PackChartName"){
		$strSQL .=" ORDER BY PackChartName ASC";
	}else{
		$strSQL .=" ORDER BY PackChartID DESC";
	}
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = ($LIMIT < 0) ? 1 : ceil($numrows / $LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
?>

			<div id="sub1">
				<!--<form name="searchPack" method="get" action="Manage_PackCharts.php">
					<div class="general_c">
						Search Pack: &nbsp;
						<span class="radiowrap">
							<input type="radio" id="Packchartid" name="searchField" value="PackChartID" class="radio" checked/>
							<label for="Packchartid">Pack Chart ID</label>
						</span>
						<span class="radiowrap">
							<input type="radio" id="Packchartname" name="searchField" value="PackChartName" class="radio" <?php if($searchField=="PackChartName") echo "checked";?>/>
							<label for="Packchartname">Pack Chart Name</label>
						</span>
						<input type="text" name="searchKeyword" value="<?php echo $searchKeyword;?>"/>&nbsp;
						<input type="submit" name="submitKeyword" value="Search"/>
					</div>
					<div style="text-align: right;float:right;">
						Display Pack Charts By: 
						<select name="displayOrder">
							<?php 
								$arrOpt[] = array("PackChartID","Date/Time Added");
								$arrOpt[] = array("PackChartName", "Pack Chart Name");
								for ($i=0; $i<count($arrOpt); $i++) {
									echo "<option value=\"" . $arrOpt[$i][0] . "\"";
									if ($arrOpt[$i][0]==$displayOrder) echo " selected";
									echo ">" . $arrOpt[$i][1] . "</option>";									
								}
							?>
						</select>
						<input type="submit" name="button" value="Submit"/>
					</div></form>-->

					<div style="float:left;">
						Total : <?php echo $numrows?> ( page <?php echo $pp?> of <?php echo $totalpps?> )
					</div>
				
				<table style="border-bottom: 2px solid #BBB;">
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">No</td>
							<td class="subject1_2">SID</td>
							<td class="subject1_2">Pack Chart Name</td>
							<?php 
								for ($i=1;$i<=10;$i++){
									echo "<td class=\"subject1_2\">Pack ".$i."</td>";
								}

							?>
							<td class="subject1_2">Created</td>
							<td class="subject1_2">Status</td>
							<td class="subject1_2" colspan="3">Action</td>
						</tr>
<?php 
	$list_num = $LIMIT * ($pp - 1);
	if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
	$DB->query($strSQL);
	$no = $numrows - ($pp - 1) * $LIMIT;
//	echo $strSQL;
//	$PackChartNum = 1;
	while ($data = $DB->fetch_array($DB->res)){
?>		
						<tr class="thin_border_bottom">
							<td class="general_c"><?php echo $no;?></td>
							<td class="general_c"><?php echo $data["PackChartID"];?></td>
							<td class="general"><a href="Manage_PackCharts.php?act=view&aid=<?php echo $data["PackChartID"];?>&searchField=<?php echo $searchField;?>&displayOrder=<?php echo $displayOrder;?>&searchKeyword=<?php echo $searchKeyword;?>&pp=<?php echo $pp;?>"><?php echo $data["PackChartName"]?></a></td>
<?php 
		$DB2 = new myDB;
		$strSQL2 = "SELECT * FROM Pack WHERE PackChartID = ".$data["PackChartID"]." && `Order` >= 0";
		
		$strSQL2 .= " ORDER BY `Order` , `PackID` ASC LIMIT 0,10";
		$cnt = 0;
		$DB2->query($strSQL2);
		//echo "<br/>".$strSQL2;
		while ($PackData = $DB2->fetch_array($DB2->res)){
?>
							<td class="general_c"><?php echo $PackData["Pack"];?></td>
<?php 
			$cnt++;
		}

		if($cnt<11){
			for($cnt; $cnt<10; $cnt++){?>
							<td class="general_c"></td>
<?php		
			}
		}
?>
							<td class="general_c"><?php echo date("Y-m-d", strtotime($data["DateTimeLastModified"]));?></td>
							<td class="general_c"><?php echo $data["IsActive"];?></td>
							<td class="general_c">
								<a href="Manage_PackCharts_action.php?action=del&id=<?php echo $data["PackChartID"];?>" onclick="if(confirm('Do you want to delete this Pack chart?')){return true;}else{return false;}">Delete</a>
								<input name="Action" type="hidden" value="del"/>
							</td>
							<td class="general_c">
								<a href="Manage_PackCharts.php?act=view&aid=<?php echo $data["PackChartID"];?>&searchField=<?php echo $searchField;?>&displayOrder=<?php echo $displayOrder;?>&searchKeyword=<?php echo $searchKeyword;?>&pp=<?php echo $pp;?>" >Edit</a>
								
							</td>
						</tr>
<?php		
		$no--;
 	}
 ?>	

					</tbody>
				</table>
			</div>
			<br/>
<?php 

		echo "<div class=\"product-page-bar\">";
		$linkopt = "displayOrder={$displayOrder}&searchField={$searchField}&searchKeyword={$searchKeyword}";
		//if ($ord) $linkopt.="&or=".$ord;
		if (!empty($kw)) $linkopt.="&kw=".$kw;
		listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
		echo "</div>";

?>
			
			
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>