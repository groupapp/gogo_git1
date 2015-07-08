<?php 
	require_once("header.php"); 

	$Action			= $_POST["action"];
	$SearchField	= $_GET["SearchField"];
	$SearchKeyword	= $_GET["SearchKeyword"];
	$GotoPage	= $_POST["GotoPage"];
	$aid	= empty($_GET["aid"])?"":$_GET["aid"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
	$btn	= empty($_POST["button"])?"":$_POST["button"];
	$pp		= empty($_GET["pp"])?null:$_GET["pp"];
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
				Messages from Customers
			</div>
			<div id="sub1">
				<form name="SearchForm" method="get" action="Manage_CustomerMessages.php">
					<table>
						<tr>
							<td class="general_c">Search:
								<select name="SearchField">
									<option value>Select:&nbsp;</option>
									<option value="CustomerName" <?php if($SearchField=="CustomerName") echo "selected"; ?>>&nbsp; Customer Name</option>
									<option value="CustomerIP_Address" <?php if($SearchField=="CustomerIP_Address") echo "selected"; ?>>&nbsp; Customer IP Address</option>
									<option value="CustomerPhoneNumber" <?php if($SearchField=="CustomerPhoneNumber") echo "selected"; ?>>&nbsp; Customer Phone Number</option>
									<option value="CustomerEmailAddress" <?php if($SearchField=="CustomerEmailAddress") echo "selected"; ?>>&nbsp; Customer Email Address</option>
									<option value="Subject" <?php if($SearchField=="Subject") echo "selected"; ?>>&nbsp; Subject / Title</option>
									<option value="Message" <?php if($SearchField=="Message") echo "selected"; ?>>&nbsp; Message Content</option>
								</select> &nbsp;
								<input type="text" name="SearchKeyword" value="<?php echo $SearchKeyword; ?>"/> &nbsp;
								<input type="submit" name="submit" onclick="return Confirm_Search(this.form);" value="Submit"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
<?php 
	$DB 	= new myDB;
	if($SearchField!=null && $SearchKeyword!=null){
		$strSQL = "SELECT * FROM MessagesFromCustomers";
		$strSQL .= " WHERE " . $SearchField . " LIKE '%" . $SearchKeyword. "%'";
	}else{
		$strSQL = "SELECT * FROM MessagesFromCustomers";
	}
	$strOrd	= " ORDER BY MessageID DESC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = ($LIMIT < 0)?1:ceil($numrows/$LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $LIMIT * ($pp - 1);
	if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
	$DB->query($strSQL);
?>
			<div id="sub2">
				<div style="float:left;">
					Total : <?php echo $numrows?> ( page <?php echo $pp?> of <?php echo $totalpps?> )
				</div>
				<form name="ListMessages" method="post" action="Manage_CustomerMessages_action.php">
					<table style="border-bottom: 2px solid #BBB;">
						<input type="hidden" name="action" value="del"/>
						<input type="hidden" name="GotoPage" value="1"/>						
						<tbody>
							<tr class="subject_border_top">
								<td class="subject1_2">ID</td>
								<td class="subject1_2">Subject / Title</td>
								<td class="subject1_2">Name</td>
								<td class="subject1_2">IP Address</td>
								<td class="subject1_2">Phone No.</td>
								<td class="subject1_2">E-mail Address</td>
								<td class="subject1_2">Date Received</td>
								<td class="subject1_2">Date/Time Responded</td>
								<td class="subject1_2"><input type="checkbox" id="checkall" onclick="return checkedAll(this.form);"></td>
							</tr>
<?php 
	while ($data = $DB->fetch_array($DB->res)){
		if($data["DateTimeReceived"]<1){
			$dateReceived="";
		}else{
			$dateReceived = date("n/j/Y", strtotime($data["DateTimeReceived"]));
		}
		if($data["DateTimeResponded"]<1){
			$dateResponded="";
		}else{
			$dateResponded = date("n/j/Y g:i:s A", strtotime($data["DateTimeResponded"]));
		}
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general_c\">" . $data["MessageID"] . "</td>";
		echo "<td class=\"general\"><a href=\"Manage_CustomerMessages.php?SearchField=" . $SearchField . "&SearchKeyword=" . $SearchKeyword;
		echo "&act=view&pp=".$pp."&aid=" . $data["MessageID"] . "\">" . $data["Subject"] . "</a></td>";
		echo "<td class=\"general\">" . $data["CustomerName"] . "</td>";
		echo "<td class=\"general\">" . $data["CustomerIP_Address"] . "</td>";
		echo "<td class=\"general\">" . $data["CustomerPhoneNumber"] . "</td>";
		echo "<td class=\"general\">" . $data["CustomerEmailAddress"] . "</td>";
		echo "<td class=\"general_c\">" . $dateReceived . "</td>";
		echo "<td class=\"general_c\">" . $dateResponded . "</td>";
		echo "<td class=\"general_c\" style=\"padding-left: 7px;\"><input type=\"checkbox\" name=\"CheckedMessageIDs[]\" id=\"checklist\" value=\"" . $data["MessageID"] . "\"></td>";
		echo "</tr>";
	}
?>
							
						</tbody>	
					</table>
					<p align="right" class="btns">
						<input type="button" name="btnDelete" onclick="return Confirm_DeleteSelected(this.form);" value="Delete All Selected"/>
						<input type="hidden" name="pp" value="<?php echo $pp; ?>"/>
					</p>
				</form>
			</div>
	
<script type="text/javascript" >
			function check(){
			
				document.getElementById("replyarea").style.display="block";			
			
			}
			</script>	
	
<?php 

		echo "<div class=\"product-page-bar\">";
		$linkopt = "";
		//if ($ord) $linkopt.="&or=".$ord;
		if (!empty($kw)) $linkopt.="&kw=".$kw;
		listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
		echo "</div>";
			
?>
			<div id="sub3">
				<form name="UpdateMessage" method="post" action="Manage_CustomerMessages_action.php">
					<input type="hidden" name="SearchField" value="<?php echo $SearchField; ?>">
					<input type="hidden" name="SearchKeyword" value="<?php echo $SearchKeyword; ?>">
					<?php
					if($act=="view"){
						$strSQL = "SELECT * FROM MessagesFromCustomers WHERE MessageID = " . $aid;
						$DB->query($strSQL);
						$data = $DB->fetch_array($DB->res);	
						$dateReceived = date("n/j/Y g:i:s A", strtotime($data["DateTimeReceived"]));
					?>
					<input type="hidden" name="Action" value/>
					<input type="hidden" name="MessageID" value="<?php echo $aid ?>"/>
					<table>
						<tbody>
							<tr class="subject_border_top">
								<td colspan="4" class="subject">View Message (ID = <?php echo $data["MessageID"];?>)</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Date / Time Received</th>
								<td class="general"><?php echo $dateReceived;?></td>
								<th class="subject2">Is This Responded?</th>
								<td class="general">
									<?php 
									if ($data["DateTimeResponded"]>0)
									echo "Replied";
									else
									echo"<input type=\"button\"  name=\"IsThisResponded\" onclick=\"check()\" value=\"Write a reply\" />"; 
									?>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Customer Name</th>
								<td class="general"><?php echo $data["CustomerName"];?></td>
								<th class="subject2">IP Address</th>
								<td class="general"><?php echo $data["CustomerIP_Address"];?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Phone Number</th>
								<td class="general"><?php echo $data["CustomerPhoneNumber"];?></td>
								<th class="subject2">E-mail Address</th>
								<td class="general"><?php echo $data["CustomerEmailAddress"];?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Subject / Title</th>
								<td colspan="3" class="general"><?php echo $data["Subject"];?></td>
								
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Message</th>
								<td colspan="3" class="general"><?php echo $data["Message"];?></td>
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2">Reply Message</th>
								<td colspan="3" class="general"><?php echo $data["ReplyMessage"];?></td>
							</tr>
							<!--<tr>
								<td colspan="4" class="general_c">
									<input type="button" name="btnUpdate" value="Update" onclick="return UpdateConfirm4(this.form);"/>
									<input type="hidden" name="action" value="update"/>
									<input type="hidden" name="pp" value="<?php echo $pp; ?>"/>
									<input type="hidden" name="view" value="view"/> 
								</td>
							</tr>-->
						</tbody>
					</table>
					<?php }?>
				</form>				
			</div>
			
			
			<span id="replyarea" style="display:none;">
			<div id="sub3">
				<h3>Reply</h3>
				<form name="ReplyMessage" method="post" action="Manage_CustomerMessages_action.php">
					<input type="hidden" name="SearchField" value="<?php echo $SearchField; ?>">
					<input type="hidden" name="SearchKeyword" value="<?php echo $SearchKeyword; ?>">
					<?php
					if($act=="view"){
						$strSQL = "SELECT * FROM MessagesFromCustomers WHERE MessageID = " . $aid;
						$DB->query($strSQL);
						$data = $DB->fetch_array($DB->res);
						$chkdate=strtotime($data["DateTimeReply"]);
						if($chkdate>0)		
						$dateReply = date("n/j/Y g:i:s A", strtotime($data["DateTimeReply"]));
					?>
					<input type="hidden" name="Action" value/>
					<input type="hidden" name="MessageID" value="<?php echo $aid ?>"/>
					<input type="hidden" name="Email" value="<?php echo $data["CustomerEmailAddress"]?>"/>
					<table>
						<tbody>
							<tr class="subject_border_top">
								<td colspan="4" class="subject">View Message (ID = <?php echo $data["MessageID"];?>)</td>
							</tr>
							<tr class="thin_border_bottom">
								<td class="subject2">Date / Time Sended</td>
								<td class="general"><?php echo $dateReply;?></td>
								
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Subject / Title</th>
								<td colspan="3" class="general"><input type="text" name="ReplySubject" value="Reply <?php echo $data["Subject"];?>"/></td>
								
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2">Message</th>
								<td colspan="3" class="general">
								<textarea name="ReplyMessage" cols="80" rows="16" style="width: 90%;"><?php echo $data["ReplyMessage"];?></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="4" class="general_c">
									<input type="submit" name="btnUpdate" value="Send" onclick=""/>
									<input type="hidden" name="action" value="reply"/>
									<input type="hidden" name="pp" value="<?php echo $pp; ?>"/>
									<input type="hidden" name="view" value="view"/>
								</td>
							</tr>
						</tbody>
					</table>
					<?php }?>
				</form>				
			</div>
			</span>
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>