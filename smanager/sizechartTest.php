<?php 
	require_once("header.php"); 
	
	$action					= $_POST["action"];
	$SizeChartID			= $_POST["SizeChartID"];
	$SizeChartName			= $_POST["SizeChartName"];
	$SizeChartDescription	= $_POST["SizeChartDescription"];

	$aid	= empty($_GET["aid"])?"":$_GET["aid"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
	$btn	= empty($_POST["button"])?"":$_POST["button"];
	$pp		= empty($_GET["pp"])?null:$_GET["pp"];
	$orderSize	= $_GET["orderby"];
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
				Size Charts Test
			</div>
			<div id="sub1">
				<table style="border-bottom: 2px solid #BBB;">
					<caption>
						<form name="form2" method="post" action="sizechartTest_action.php">
							Display Size Charts By: 
							<select id="DisplayOrder" name="displayOrder">
								<?php 
									$arrOpt[] = array("SizeChartID","Date/Time Added");
									$arrOpt[] = array("SizeChartName", "Size Chart Name");
									for ($i=0; $i<count($arrOpt); $i++) {
										echo "<option value=\"" . $arrOpt[$i][0] . "\"";
										if ($arrOpt[$i][0]==$orderSize) echo " selected";
										echo ">" . $arrOpt[$i][1] . "</option>";									
									}
								?>
							</select>
							<input type="button" name="button" value="Submit" onclick="orderSize()"/>
						</form>
					</caption>
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">No</td>
							<td class="subject1_2">SID</td>
							<td class="subject1_2">Size Chart Name</td>
							<?php 
								for ($i=1;$i<=23;$i++){
									echo "<td class=\"subject1_2\">Size ".$i."</td>";
								}
							?>
							<td class="subject1_2"></td>
						</tr>
<?php 
	$DB 	= new myDB;
	if($orderSize=="SizeChartName"){
		$strSQL = "SELECT DISTINCT SizeChartID, SizeChartName FROM Size ORDER BY SizeChartName ASC";
	}else{
		$strSQL = "SELECT DISTINCT SizeChartID, SizeChartName FROM Size ORDER BY SizeChartID DESC";
	}
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = (20 < 0)?1:ceil($numrows/20);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $LIMIT * ($pp - 1);
	if (20 > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, 20";
	$DB->query($strSQL);
	echo $strSQL;
	$SizeChartNum = 1;
	while ($data = $DB->fetch_array($DB->res)){
?>		
						<tr class="thin_border_bottom">
							<td class="general_c"><?php echo $SizeChartNum;?></td>
							<td class="general_c"><?php echo $data["SizeChartID"];?></td>
							<td class="general"><a href="sizechartTest.php?act=view&aid=<?php echo $data["SizeChartID"];?>&orderby=<?php echo $orderSize;?>&pp=<?php echo $pp;?>"><?php echo $data["SizeChartName"]?></a></td>
<?php 
		$DB2 = new myDB;
		$strSQL2 = "SELECT Size FROM Size WHERE SizeChartID = ".$data["SizeChartID"];
		$strSQL2 .= " ORDER BY SizeID";
		$cnt = 0;
		$DB2->query($strSQL2);
//		echo $strSQL2;
		while ($sizeData = $DB2->fetch_array($DB2->res)){
?>
							<td class="general_c"><?php echo $sizeData["Size"];?></td>
<?php 
			$cnt++;
		}
		if($cnt<23){
			for($cnt; $cnt<23; $cnt++){?>
							<td class="general_c"></td>
<?php		
			}
		}
?>
							<td class="general_c">
								<a href="sizechartTest_action.php?action=del&id=<?php echo $data["SizeChartID"];?>" onclick="if(confirm('Do you want to delete this size chart?')){return true;}else{return false;}">Delete</a>
								<input name="Action" type="hidden" value="del"/>
							</td>
						</tr>
<?php		
		$SizeChartNum++;
 	}
 ?>	

					</tbody>
				</table>
			</div>
			<br/>
<?php 

		echo "<div class=\"product-page-bar\">";
		$linkopt = "orderby={$orderSize}";
		//if ($ord) $linkopt.="&or=".$ord;
		if (!empty($kw)) $linkopt.="&kw=".$kw;
		listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
		echo "</div>";

?>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<div id="sub2">
				<?php 
				if($act=="view"){		//someting selected
					echo "<p><a href=\"sizechartTest.php\">Add New Size Chart</a></p>";
				}
				?>
				<table>
					<form name="form1" method="post" action="sizechartTest_action.php">
<?php
	if($act=="view"){
		$strSQL = "SELECT * FROM Size WHERE SizeChartID = " . $aid;
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
						<input type="hidden" name="SizeChartID" value="<?php echo $aid ?>">
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2">Date / Time Created</th>
								<td class="general"><?php echo $dateCreate;?></td>
								<th class="subject2">Date / Time Modified</th>
								<td class="general"><?php echo $dateLastModify;?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Size Chart Name</th>
								<td class="general">
									<input type="text" name="SizeChartName" value="<?php echo $data[SizeChartName];?>"/>
								</td>
								<th class="subject2">Size Chart Description</th>
								<td class="general">
									<textarea name="SizeChartDescription" rows="2" style="width: 100%;"><?php echo $data[SizeChartDescription];?></textarea>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th colspan="4" class="subject2">Size Chart :</th>
							</tr>
							<tr class="subject_border_bottom">
								<td colspan="4">
									<table>
										<tbody>
											<tr>
												<?php 
													for ($i=1;$i<=23;$i++){
														echo "<th class=\"subject2_c\">Size ".$i."</th>";
													}
												?>
											</tr>
											<tr>
<?php
	$strSQL2 = "SELECT * FROM Size WHERE SizeChartID = " . $aid;
	$strSQL2 .= " ORDER BY SizeID";
	$DB2 = new myDB;
	$DB2->query($strSQL2);
	$cnt = 0;
//	echo $strSQL2;
	while ($sizeData = $DB2->fetch_array($DB2->res)){
?>
												<td class="general_2">
													<input type="text" name="Size[<?php echo $cnt+1;?>]" class="box" value="<?php echo $sizeData["Size"];?>"/>
													<input type="hidden" name="hsize[<?php echo $cnt+1;?>]" value="<?php echo $sizeData["SizeID"];?>">
												</td>
<?php 
		$cnt++;
	}
	if($cnt<23){
		for($cnt; $cnt<23; $cnt++){
?>
												<td class="general_2">
													<input type="text" name="Size[<?php echo $cnt+1;?>]" class="box" value=""/>
													<input type="hidden" name="hsize[<?php echo $cnt+1;?>]" value="<?php echo $sizeData["SizeID"];?>">
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
							<?php								
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
							</tr>
						</tbody>
					</form>
				</table>
			</div>
		
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>