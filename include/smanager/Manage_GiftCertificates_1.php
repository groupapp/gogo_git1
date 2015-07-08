<?php 
	require_once("header.php"); 

	$SearchField	= $_GET["SearchField"];
	$SearchKeyword	= $_GET["SearchKeyword"];
	$DisplayOrder	= $_REQUEST["DisplayOrder"];
	$gid			= empty($_GET["gid"])?null:$_GET["gid"];
	$btn			= empty($_POST["button"])?null:$_POST["button"];
	$pp				= empty($_GET["pp"])?null:$_GET["pp"];
	$act		= empty($_GET["act"])?"":$_GET["act"];
	$DB 	= new myDB;
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
				Manage Gift Certificates
			</div>
			<div id="sub1">
				<!--<form name="SearchForm" method="get" action="Manage_GiftCertificates.php?SearchField=<?php echo $SearchField;?>&SearchKeyword=<?php echo $SearchKeyword;?>">
					<p class="general_c">
						<select name="SearchField">
							<option>Select:</option>
						<option value="">&nbsp; Login ID (= Email Address)</option>
							<option value="GiftAuthorizationCode" <?php if($SearchField==GiftAuthorizationCode) echo "selected"; ?>>&nbsp; Authorization Code</option>
						</select>
						&nbsp;
						<input type="text" name="SearchKeyword" value/>
						&nbsp;
						<input type="submit" name="submit" value="Submit"/>
					</p>
				</form>-->
				 
				<form name="form1" method="post" action="Manage_GiftCertificates.php?SearchField=<?php echo $SearchField;?>&SearchKeyword=<?php echo $SearchKeyword;?>&DisplayOrder=<?php echo $DisplayOrder;?>&pp=<?php echo $pp;?>">
					<p class="general_c">
						Display Gift Certificates by: &nbsp;
						<select name="DisplayOrder">
							<option value="">&nbsp;Select</option>
							<?php 
							if($DisplayOrder=="GiftAmountLastUsed")
							echo "<option value=\"GiftAmountLastUsed\" selected>";
							else
							echo "<option value=\"GiftAmountLastUsed\">";
							echo "&nbsp;GiftAmountLastUsed</option>";							
							
							if($DisplayOrder=="GiftAmountRemaining")
							echo "<option value=\"GiftAmountRemaining\" selected>";
							else
							echo "<option value=\"GiftAmountRemaining\">";
							echo "&nbsp;GiftAmountRemaining</option>";	
							
							if ($DisplayOrder=="DateTimeIssued")
							echo "<option value=\"DateTimeIssued\" selected>";
							else
							echo "<option value=\"DateTimeIssued\" >";							
							echo "&nbsp; Date/Time Issued</option>";
							
							if ($DisplayOrder=="GiftAmount")							
							echo "<option value=\"GiftAmount\" selected>";
							else
							echo "<option value=\"GiftAmount\">";
							echo "&nbsp; Gift Amount</option>";
							?>
						</select>
						&nbsp;
						<input type="submit" name="submit" value="Sort"/>
					</p>
				</form>
<?php 
	$strSQL = "SELECT * FROM GiftCertificates";
	if($SearchKeyword !='' && $SearchField !=''){
		$strSQL .= " WHERE ".$SearchField." LIKE '%".$SearchKeyword."%'";
	}
	//echo $strSQL;
	
	
	if($DisplayOrder=="DateTimeIssued"){
		$strOrd = " ORDER BY DateTimeIssued DESC";
	}
	elseif($DisplayOrder=="GiftAmount"){
		$strOrd = " ORDER BY GiftAmount DESC";
	}
	elseif($DisplayOrder=="GiftAmountRemaining"){
		$strOrd = " ORDER BY GiftAmountRemaining DESC";
	}
	elseif($DisplayOrder=="GiftAmountLastUsed"){
		$strOrd = " ORDER BY GiftAmountLastUsed DESC";
	}
	else
		$strOrd = " ORDER BY GiftID DESC";
		
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = ($LIMIT < 0)?1:ceil($numrows/$LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $LIMIT * ($pp - 1);
	if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
	$numTop = $numrows - ($pp-1)*$LIMIT;
	//echo $strSQL;
	
	$DB->query($strSQL);
?>	
					<div style="float:left;">
						Total : <?php echo $numrows?> ( page <?php echo $pp?> of <?php echo $totalpps?> )
					</div>
					<table style="border-top: 2px solid #BBB; border-bottom: 2px solid #BBB;">
						<tbody>
							<tr>
								<td class="subject1_2">No</td>
								<td class="subject1_2">G.C. ID</td>
								<td class="subject1_2">Order ID</td>
								<td class="subject1_2">Customer ID / IP Address</td>
								<td class="subject1_2">Certificate Amount ($)</td>
								<td class="subject1_2">Amount Remaining ($)</td>
								<td class="subject1_2">Amount Used ($)</td>
								<td class="subject1_2">Used Order ID</td>
								<td class="subject1_2">Used Customer ID / IP Address</td>
								<td class="subject1_2">Used Date/Time</td>
								<td class="subject1_2">Issued Date/Time</td>
								<td class="subject1_2">Expiration Date/Time</td>
								<td class="subject1_2">Active?</td>
							</tr>
							<!-- DB 가져와서 뿌려주기 -->
<?php 
	
	while ($data = $DB->fetch_array($DB->res)){
		if($data["GiftUsedDateTime"]<1){
			$dateGiftUsed="";
		}else{
			$dateGiftUsed = date("n/j/Y", strtotime($data["GiftUsedDateTime"]));
		}
		if($data["GiftExpiryDate"]<1){
			$dateGiftExpiry = "";
		}else{
			$dateGiftExpiry = date("n/j/Y", strtotime($data["GiftExpiryDate"]));
		}
		if($data["DateTimeIssued"]<1){
			$dateIssued = "";
		}else{
			$dateIssued = date("n/j/Y", strtotime($data["DateTimeIssued"]));
		} 
?>
									<tr class="thin_border_bottom">
										<td class="general_c"><?php echo $numTop;?></td>
										<td class="general_c">
											<a href="Manage_GiftCertificates.php?act=view&SearchField=<?php echo $SearchField;?>&SearchKeyword=<?php echo $SearchKeyword;?>&pp=<?php echo $pp;?>&gid=<?php echo $data["GiftID"];?>">
											<?php echo $data["GiftID"];?>
											</a>
										</td>
										<td class="general_c">
											<a href="Manage_Orders_ViewOrderDetails.php?act=view&oid=<?php echo $data["GiftOrderID"];?>">
												<?php echo $data["GiftOrderID"];?>
											</a>
										</td>
										<td class="general_c"><?php
											if($data["GiftCustomerID"]>0){
												echo "<a href=\"Manage_Customers.php?&act=view&aid=".$data["GiftCustomerID"]."\">".$data["GiftCustomerID"]."</a>";
											}else{
												echo $data["GiftCustomerIP_Address"];
											}?>
										</td>
										<td class="general_c"><?php echo "$".$data["GiftAmount"];?></td>
										<td class="general_c"><?php echo "$".$data["GiftAmountRemaining"];?></td>
										<td class="general_c"><?php echo "$".$data["GiftAmountLastUsed"];?></td>
										<td class="general_c"><?php echo $data["GiftUsedOrderID"];?></td>
										<td class="general_c"><?php
											if($data["GiftUsedCustomerID"]>0){
												echo $data["GiftUsedCustomerID"];
											}else{
												echo $data["GiftUsedCustomerIP_Address"];
											}?>
										</td>
										<td class="general_c"><?php echo $dateGiftUsed;?></td>
										<td class="general_c"><?php echo $dateIssued;?></td>
										<td class="general_c"><?php echo $dateGiftExpiry;?></td>
										<td class="general_c"><?php echo $data["IsActive"];?></td>
									</tr>
<?php								$numTop--;
							
								}
							?>
						</tbody>
					</table>
				
				<br/>
<?php 

		echo "<div class=\"product-page-bar\">";
		$linkopt = "SearchField={$SearchField}&SearchKeyword={$SearchKeyword}&DisplayOrder={$DisplayOrder}";
		//if ($ord) $linkopt.="&or=".$ord;
		if (!empty($kw)) $linkopt.="&kw=".$kw;
		listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
		echo "</div>";

?>
			</div>
			<div id="sub2">
				<?php 
				
				
				$strSQL = "SELECT * FROM GiftCertificates WHERE GiftID=".$gid;
				$DB->query($strSQL);
				$data = $DB->fetch_array($DB->res);
				if($data["GiftUsedDateTime"]<1){
					$dateGiftUsed="";
				}else{
					$dateGiftUsed = date("n/j/Y", strtotime($data["GiftUsedDateTime"]));
				}
				if($data["GiftExpiryDate"]<1){
					$dateGiftExpiry = "";
				}else{
					$dateGiftExpiry = date("n/j/Y", strtotime($data["GiftExpiryDate"]));
				}
				if($data["DateTimeIssued"]<1){
					$dateIssued = "";
				}else{
					$dateIssued = date("n/j/Y", strtotime($data["DateTimeIssued"]));
				}
				if($data["DateTimeModified"]<1){
					$dateModified = "";
				}else{
					$dateModified = date("n/j/Y", strtotime($data["DateTimeModified"]));
				}
				?>
				<script type="text/javascript">
				 function add(){
					 var ext=document.form2.GiftExpiryDate.value;
					 var amt=document.form2.GiftAmount.value;					 
					 if (ext==""){
						 alert("Please input the Expiration data.");
						 document.form2.GiftExpiryDate.focus();
					 }
					 else if (amt==""){
						alert("Please input the gift ammount.");
						document.form2.GiftAmount.focus();
					 }
					 
					 else
						document.form2.submit();
				 }	
				 function update(){
					document.form2.submit();
				 }				 
				 </script>
				 <?php 
				if($act=="view"){		//someting selected
					echo "<p><a href=\"Manage_GiftCertificates.php\">Add New GiftCertificates</a></p>";
				}
				?>
				<form name="form2" method="post" action="Manage_GiftCertificates_action.php">
					<input type="hidden" name="SearchField" value="<?php echo $SearchField?>" maxlength="23"/>
					<input type="hidden" name="SearchKeyword" value="<?php echo $SearchKeyword?>" maxlength="23"/>
					<input type="hidden" name="DisplayOrder" value="<?php echo $DisplayOrder?>" maxlength="23"/>
					<input type="hidden" name="pp" value="<?php echo $pp?>" maxlength="23"/>
					<input type="hidden" name="GiftID" value="<?php echo $data["GiftID"]?>"/>
					<table style="border-top: 2px solid #BBB; border-bottom: 2px solid #BBB;">
						<tbody>
							<tr class="thin_border_bottom">
								<th class="subject2">Gift Certificate ID</th>
								<td class="general"><?php echo $data["GiftID"]?></td>	
								<th class="subject2">Active</th>
								<td class="general">
									<input type="checkbox" name="IsActive" value="Y" <?php echo ($data["IsActive"]=="Y")?"checked":null?>>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Date / Time Issued</th>
								<td class="general"><?php echo $dateIssued?></td>
								<th class="subject2">Date / Time Modified</th>
								<td class="general"><?php echo $dateModified?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Gift Certificate Number</th>
								<td class="general"><?php echo $data["GiftNumber"]?></td>
								<th class="subject2">Authorization Code</th>
								<td class="general"><input type="text" readonly name="GiftAuthorizationCode" value="<?php echo $data["GiftAuthorizationCode"]?>" maxlength="23"/></td>								
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Expiration Date / Time</th>
								<td class="general">
									<input type="text" name="GiftExpiryDate" value="<?php echo $dateGiftExpiry?>" maxlength="23"/>&nbsp;(mm/dd/yyyy)
								</td>
								<th class="subject2"></th>
								<td class="general"></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Order ID</th>
								<td class="general">
									<?php echo $data["GiftOrderID"]?>
								</td>
								<th class="subject2"></th>
								<td class="general"></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Customer ID</th>
								<td class="general">
									<?php echo $data["GiftCustomerID"]?>
								</td>
								<th class="subject2">Customer IP Address</th>
								<td class="general">
									<?php echo $data["GiftCustomerIP_Address"]?>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Gift Certificate Amount</th>
								<td class="general">
								<input type="text" name="GiftAmount" value="<?php echo $data["GiftAmount"]?>" maxlength="23"/>									
								</td>
								<th class="subject2">Amount Remaining</th>
								<td class="general">
									$ <?php echo $data["GiftAmountRemaining"]?>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Amount Last Used</th>
								<td class="general">
									$ <?php echo $data["GiftAmountLastUsed"]?>
								</td>
								<th class="subject2">Date / Time Last Used</th>
								<td class="general">
									<?php echo $dateGiftUsed?>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Used Order ID</th>
								<td class="general">
									<?php echo $data["GiftUsedOrderID"]?>
								</td>
								<th class="subject2"></th>
								<td class="general"></td>
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2">Used Customer ID</th>
								<td class="general">
									<?php echo $data["GiftUsedCustomerID"]?>
								</td>
								<th class="subject2">Used Customer IP Address</th>
								<td class="general">
									<?php echo $data["GiftUsedCustomerIP_Address"]?>
								</td>
							</tr>
							
							
							
							<?php 
								echo "<tr>";
								echo "<td colspan=\"4\" align=\"center\" class=\"btns\">";
								if(!$act){	//nothing selected
									echo "<input name=\"button\" type=\"button\" onClick=\"add()\" value=\"Add\"/>&nbsp;";
									echo "<input type=\"hidden\" name=\"action\" value=\"add\"/>";	
									echo "<input type=\"button\" name=\"button\" onclick=\"javascript:document.form2.reset();return false;\" value=\"Reset\"/>";		
								}
								else{		//someting selected							
									echo "<input type=\"button\" name=\"button\" onClick=\"update()\" value=\"Update\"/>";
									echo "<input type=\"hidden\" name=\"action\" value=\"update\"/>";
									echo "<input type=\"hidden\" name=\"view\" value=\"view\"/>";
								}
							?>

									
								</td>
							</tr>
						</tbody>
					</table>
				
					
								
				</form>
			</div>

<?php require_once("footer.php"); ?>