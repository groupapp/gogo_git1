<?php require_once("header.php"); ?>


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
				Spot Light Items
			</div>
			<div id="sub1">
				<form name="form" method="post" action="manage_spotlight_action.php">
				<input type="hidden" name="action" value="update" />
					<table>
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th width="33%" class="subject2_c , thin_border_right">Item #1</th>
								<th width="34%" class="subject2_c , thin_border_right">Item #2</th>
								<th width="33%" class="subject2_c">Item #3</th>
							</tr>
							<?php
							$DB = new myDB;
							$strSQL = "SELECT * FROM Products WHERE Spotlight > 0 ORDER BY Spotlight limit 6";
							$DB->query($strSQL);
							while ($data = $DB->fetch_array($DB->res)){
								$product[]= $data["ProductID"];
								$prod_img[] = $data["Picture1"];
								//$productdes = $data["ProductDescription"];
								$productdes[] = substr($data["ProductDescription"], 0, 200);							
								//echo $productdes[0];								
							}
							?>
							<tr class="thin_border_bottom">
								<?php 
									$j=1;
									for($i=0;$i<=2;$i++){
										echo "<td class=\"general\">";
										echo "<div class=\"cel\">";
										echo "<img src=\"/Images_Products/" . $prod_img[$i] . "\" width=\"100\"/>";
										echo "</div>";
										echo "<span class=\"right\">" . $productdes[$i] . "<br/>";
										echo "<label style=\"padding: 3px 3px 1px 1px;\">ProductID: </label>";
										echo "<input type=\"text\" name=\"spot".$j."\" value=\"" . $product[$i] . "\" class=\"box2\"/>";
										echo "</span></td>";
										$j++;
									}
								?>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2_c , thin_border_right">Item #4</th>
								<th class="subject2_c , thin_border_right">Item #5</th>
								<th class="subject2_c">Item #6</th>
							</tr>
							<tr class="thin_border_bottom">
								<?php
									$j=4;
									for($i=3; $i<=5; $i++){
										echo "<td class=\"general\">";
										echo "<div class=\"cel\">";
										echo "<img src=\"/Images_Products/" . $prod_img[$i] . "\" width=\"100\"/>";
										echo "</div>";
										echo "<span class=\"right\">" . $productdes[$i] . "<br/>";
										echo "<label style=\"padding: 3px 3px 1px 1px;\">ProductID: </label>";
										echo "<input type=\"text\" name=\"spot".$j."\" value=\"" . $product[$i] . "\" class=\"box2\"/>";
										echo "</span></td>";
										$j++;
									}
								?>
							</tr>
<!-- 						<tr class="thin_border_bottom">
								<th class="subject2_c , thin_border_right">Item #7</th>
								<th class="subject2_c , thin_border_right">Item #8</th>
								<th class="subject2_c">Item #9</th>
							</tr>
							<tr class="thin_border_bottom">
								<?php 
									$j=7;
									for($i=6; $i<=8; $i++){
										echo "<td class=\"general\">";
										echo "<div class=\"cel\">";
										echo "<img src=\"/Images_Products/" . $prod_img[$i] . "\" width=\"100\"/>";
										echo "</div>";
										echo "<span class=\"right\">" . $productdes[$i] . "<br/>";
										echo "<label style=\"padding: 3px 3px 1px 1px;\">ProductID: </label>";
										echo "<input type=\"text\" name=\"spot".$j."\" value=\"" . $product[$i] . "\" class=\"box2\"/>";
										echo "</span></td>";
										$j++;
									}
								?>
							</tr> -->
							<tr>
								<td colspan="3" class="general_c , btns">
									<input type="button" value="Update" onclick="return UpdateSpotlight(this.form)"/>
									<input type="hidden" name="action" value="update"/>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		
<?php require_once("footer.php"); ?>