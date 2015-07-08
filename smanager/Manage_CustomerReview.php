<?php 
	require_once("header.php"); 

	$GotoPage	= $_POST["GotoPage"];
	$rateID	= empty($_GET["rateID"])?"":$_GET["rateID"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
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
				Customer Reviews
			</div>
			<div id="sub1">
				<form name="ListReview" method="post" action="Manage_CustomerReview_action.php">
					<table style="border-bottom: 2px solid #BBB;">
						<input type="hidden" name="action" value="del"/>
						<input type="hidden" name="GotoPage" value="1"/>						
						<tbody>
							<tr class="subject_border_top">
								<td class="subject1_2">ID</td>
								<td class="subject1_2">Customer ID</td>
								<td class="subject1_2">Product ID</td>
								<td class="subject1_2">Rating</td>
								<td class="subject1_2">Recommend</td>
								<td class="subject1_2">Comment</td>
								<td class="subject1_2">Date Posted</td>
								<td class="subject1_2">Active</td>
							</tr>
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT * FROM RatingReview";	
	$strOrd	= " ORDER BY RatingReviewID DESC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = ($LIMIT < 0)?1:ceil($numrows/$LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $LIMIT * ($pp - 1);
	if ($LIMIT > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
	$DB->query($strSQL);
	while ($data = $DB->fetch_array($DB->res)){
		if($data["date_posted"]<1){
			$datePosted="";
		}else{
			$datePosted = date("n/j/Y g:i:s A", strtotime($data["date_posted"]));
		}?>
						<tr class="thin_border_bottom">
							<td class="general_c"><a href="https://sshop.i9biz.com/shopadmin/Manage_CustomerReview.php?rateID=<?php echo $data["RatingReviewID"];?>&act=view"><?php echo $data["RatingReviewID"];?></a></td>
							<td class="general"><?php echo $data["member_id"];?></td>
							<td class="general"><?php echo $data["ProductID"];?></td>
							<td class="general_c"><?php echo $data["rating"];?></td>
							<td class="general_c"><?php echo $data["recommend"];?></td>
							<td class="general"><?php echo $data["comment"];?></td>
							<td class="general"><?php echo $datePosted;?></td>
							<td class="general_c">
<?php 	if ($data["is_active"]) {
			echo "Y";
		} else {
			echo "N";
		}?>
							</td>
						</tr>
<?php 	}?>
						</tbody>	
					</table>
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
			<div id="sub2">
				<br/>
				<br/>
				<br/>
				<form name="UpdateReview" method="post" action="Manage_CustomerReview_action.php">
					<?php
					if($act=="view"){
						$strSQL = "SELECT * FROM RatingReview WHERE RatingReviewID = " . $rateID;
						$DB->query($strSQL);
						$data = $DB->fetch_array($DB->res);	
						$datePosted = date("n/j/Y g:i:s A", strtotime($data["date_posted"]));
					?>
					<input type="hidden" name="rateID" value="<?php echo $rateID; ?>"/>
					<table>
						<tbody>
							<tr class="subject_border_top">
								<td colspan="4" class="subject">View Review (ID = <?php echo $data["RatingReviewID"];?>)</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Customer ID</td>
								<td class="general"><?php echo $data["member_id"];?></td>
								<th class="subject2">Product ID</td>
								<td class="general"><?php $data["ProductID"]?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Rating</td>
								<td class="general"><?php echo $data["rating"];?></td>
								<th class="subject2">Recommend</td>
								<td class="general"><?php echo $data["recommend"];?></td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Date Posted</td>
								<td class="general"><?php echo $datePosted;?></td>
								<th class="subject2">Is Active?</td>
								<td class="general"><input type="checkbox" name="IsActive" value="Y" <?php if($data["is_active"]=="Y") echo "checked";?>></td>
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2">Comment</td>
								<td class="general" colspan="3"><?php echo $data["comment"];?></td>
							</tr>
						</tbody>
					</table>
					<p class="btns" style="text-align: center;"><input type="submit" name="update" value="update"/></p>
					<?php }?>
				</form>				
			</div>
			
<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
?>