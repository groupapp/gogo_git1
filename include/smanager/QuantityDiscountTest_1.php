<?php 
	require_once("header.php"); 
		
	$action					= $_POST["action"];
	$QD_ID					= $_POST["QD_ID"];
	$QuantityDiscountName	= $_POST["QuantityDiscountName"];
	$LowerQty1				= $_POST["LowerQty1"];
	$UpperQty1				= $_POST["UpperQty1"];
	$DiscountPercentage1	= $_POST["DiscountPercentage1"];
	$LowerQty2				= $_POST["LowerQty2"];
	$UpperQty2				= $_POST["UpperQty2"];
	$DiscountPercentage2	= $_POST["DiscountPercentage2"];
	$LowerQty3				= $_POST["LowerQty3"];
	$UpperQty3				= $_POST["UpperQty3"];
	$DiscountPercentage3	= $_POST["DiscountPercentage3"];
	$LowerQty4				= $_POST["LowerQty4"];
	$UpperQty4				= $_POST["UpperQty4"];
	$DiscountPercentage4	= $_POST["DiscountPercentage4"];
	$LowerQty5				= $_POST["LowerQty5"];
	$UpperQty5				= $_POST["UpperQty5"];
	$DiscountPercentage5	= $_POST["DiscountPercentage5"];
	$LowerQty6				= $_POST["LowerQty6"];
	$UpperQty6				= $_POST["UpperQty6"];
	$DiscountPercentage6	= $_POST["DiscountPercentage6"];
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
				Manage Discount Rates by Order Quantities Test
			</div>
			<div id="sub1">
				<table style="border-top: 2px solid #BBB; border-bottom: 2px solid #BBB;">
					<tbody>
						<tr>
							<td class="subject1_2">No</td>
							<td class="subject1_2">Q.D. Name</td>
							<td class="subject1_2">Order<br/>Quantities</td>
							<td class="subject1_2">Discount %<br/>per Each</td>
							<td class="subject1_2">Order<br/>Quantities</td>
							<td class="subject1_2">Discount %<br/>per Each</td>
							<td class="subject1_2">Order<br/>Quantities</td>
							<td class="subject1_2">Discount %<br/>per Each</td>
							<td class="subject1_2">Order<br/>Quantities</td>
							<td class="subject1_2">Discount %<br/>per Each</td>
							<td class="subject1_2">Order<br/>Quantities</td>
							<td class="subject1_2">Discount %<br/>per Each</td>
							<td class="subject1_2">Order<br/>Quantities</td>
							<td class="subject1_2">Discount %<br/>per Each</td>
							<td class="subject1_2">Delete</td>
						</tr>
						<form name="form1" method="post" action="Manage_QuantityDiscounts_action.php">
						<input type="hidden" name="QD_ID" value="<?php echo $data["QD_ID"];?>"/>
						<input type="hidden" name="action" value="del"/>
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT DISTINCT QD_ID, QuantityDiscountName FROM NewQuantityDiscounts ORDER BY QD_ID ASC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
//	echo $strSQL."<br/>";
	while ($data = $DB->fetch_array($DB->res)){
?>
						<tr>
							<td class="general_c"><?php echo $numrows;?></td>
							<td class="general"><a href="QuantityDiscountTest.php?act=view&aid=<?php echo $data["QD_ID"]?>"><?php echo $data["QuantityDiscountName"];?></a></td>
<?php 
		$DB2 = new myDB;
		$strSQL2 = "SELECT * FROM NewQuantityDiscounts WHERE QD_ID = ".$data["QD_ID"]." ORDER BY ID ASC";
		$DB2->query($strSQL2);
		$count = 0;
		while ($data2 = $DB2->fetch_array($DB2->res)){
?>
							<td class="general_c">
<?php 
			if($data2["UpperQty"] < $data2["LowerQty"]){
				echo "Over ".$data2["LowerQty"];
			}else{
				echo $data2["LowerQty"]." - ".$data2["UpperQty"];
			}
?>							
							</td>
							<td class="general_c"><?php echo $data2["DiscountPercentage1"];?>%</td>
<?php 	
			$count++;
		}
//		echo $count."<br/>";
		for($count; $count<6; $count++){
?>
							<td></td>
							<td></td>
<?php 	}?>							
							<td class="general_c"><a href="QuantityDiscountTest_action.php?action=del&id=<?php echo $data["QD_ID"];?>">Delete</a></td>
						</tr>
<?php 
	$numrows--;
	}
?>
						</form>
					</tbody>
				</table>
				<br/>
				<br/>
				<?php 
				if($act=="view"){		//someting selected
					echo "<p><a href=\"QuantityDiscountTest.php\">Add a new Discount Rates by Order Quantities</a></p>";
				}
				?>
				<form name="form2" method="post" action="QuantityDiscountTest_action.php">
					<?php 
					$strSQL = "SELECT DISTINCT QD_ID, QuantityDiscountName, DateTimeCreated, DateTimeLastModified FROM NewQuantityDiscounts WHERE QD_ID = " . $aid;
					$DB->query($strSQL);
					$data = $DB->fetch_array($DB->res);
			//		echo $strSQL;
					?>
					<input type="hidden" name="QD_ID" value="<?php echo $data["QD_ID"];?>"/>
					<table>
						<tbody>
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
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2" width="150px">Date / Time Created</th>
								<td class="general"><?php echo $dateCreate;?></td>
								<th class="subject2" width="150px">Date / Time Modified</th>
								<td class="general"><?php echo $dateLastModify;?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Name of this Q.D. Scheme</th>
								<td colspan="3" class="general">
									<input type="text" name="QuantityDiscountName" value="<?php echo $data[QuantityDiscountName];?>"/>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<table style="width: 100%;">
										<tbody>
											<tr class="thin_border_bottom">
												<th colspan="3" class="subject2_c , thin_border_right">1</th>
												<th colspan="3" class="subject2_c , thin_border_right">2</th>
												<th colspan="3" class="subject2_c , thin_border_right">3</th>
												<th colspan="3" class="subject2_c , thin_border_right">4</th>
												<th colspan="3" class="subject2_c , thin_border_right">5</th>
												<th colspan="3" class="subject2_c">6</th>
											</tr>
											<tr>
											<?php 
												for($i=1;$i<=6;$i++){
													echo "<td class=\"subject2_c\">Lower Qty.</td>";
													echo "<td class=\"subject2_c\">Upper Qty.</td>";
													echo "<td class=\"subject2_c , thin_border_right\">Discount per Each</td>";
												}
											?>
											</tr>
											<tr class="subject_border_bottom">
<?php 
		$strSQL2 = "SELECT LowerQty, UpperQty, DiscountPercentage1 FROM NewQuantityDiscounts WHERE QD_ID = ".$data["QD_ID"]." ORDER BY ID";
		$DB2->query($strSQL2);
		$num = 1;
//		echo $strSQL2."<br/>";
		while ($data2 = $DB2->fetch_array($DB2->res)){
?>
												<td class="general_2"><input type="text" name="LowerQty<?php echo $num;?>" value="<?php echo $data2["LowerQty"];?>" class="box" /></td>
												<td class="general_2"><input type="text" name="UpperQty<?php echo $num;?>" value="<?php echo $data2["UpperQty"];?>" class="box" /></td>
												<td class="general_2"><input type="text" name="DiscountPercentage<?php echo $num;?>" value="<?php echo $data2["DiscountPercentage1"];?>" class="box" /></td>
<?php 	
			$num++;
		}
		for($num; $num<=6; $num++){
?>
												<td class="general_2"><input type="text" name="LowerQty<?php echo $num;?>" value="" class="box" /></td>
												<td class="general_2"><input type="text" name="UpperQty<?php echo $num;?>" value="" class="box" /></td>
												<td class="general_2"><input type="text" name="DiscountPercentage<?php echo $num;?>" value="" class="box" /></td>
<?php 	}?>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<?php								
								echo "<tr>";
								echo "<td colspan=\"4\" align=\"center\" class=\"btns\">";
								if(!$act){	//nothing selected
									echo "<input name=\"btnAdd\" type=\"button\" onClick=\"return AddConfirm6(this.form);\" value=\"Add\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"add\"/>";		
								}
								else{		//someting selected							
									echo "<input name=\"button2\" type=\"button\" onClick=\"return ModifyConfirm5(this.form);\" value=\"Update\"/>";
									echo "<input name=\"action\" type=\"hidden\" value=\"update\"/>";
									echo "<input type=\"hidden\" name=\"view\" value=\"view\"/>";
								}
							?>

									<input type="button" name="btnReset" onclick="javascript:document.form1.reset();return false;" value="Reset"/>
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