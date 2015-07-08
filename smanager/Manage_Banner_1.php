<?php 
	require_once("header.php"); 
	
	$navleft	=empty($_GET["nl"])?"":  $_GET["nl"];
	$action		=empty($_POST["action"])?"": $_POST["action"];
	$IsActive	= empty($_POST["IsActive"])?"":$_POST["IsActive"];
	$BannerID	= empty($_POST["BannerID"])?"":$_POST["BannerID"];
	$aid		= empty($_GET["aid"])?"":$_GET["aid"];
	$act		= empty($_GET["act"])?"":$_GET["act"];
	$btn		= empty($_POST["button"])?"":$_POST["button"];
	
	//$leftMenu	= array("Banner Slides", "Side Banners", "Below-slide Banners", "Bottom Banners");
	$arrBanVal	= array("slide"=>"Banner Slide", "right"=>"Side banners", "below"=>"Below-slide Banners", "bottom"=>"Bottom Banners");
?>


	<!-- sideMenu -->
	<div class="path" style='display:none'>
	Banner</div>
	
	<div id="bodywrapper">
    
    <!-- sideMenu -->
		<div id="navLeft">
			<div style="font:bold 18px/1.8 Palatino Linotype;color:#aaa;">
				Manager  Promotion Banners
			</div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
			</div>
			
			
			
			
		</div>
		

		<!-- content right -->
		<div id="contwrapper" style="border-left: 1px solid #BBB;">
			<div id="title">
				Manager  Promotion Banners
			</div>
			<div id="sub1">
				<table style="border-bottom: 2px solid #BBB; border-top: 2px solid #BBB;">
					<tbody>
						<tr>
							<td class="subject1_2" style="text-align:left">Name<br /><span class="alt-th">(click to edit)</span></td>
							<td class="subject1_2" width="50">Display Order</td>
							<td class="subject1_2">Banner Image<br /><span class="alt-th">(click to view)</span></td>
							<td class="subject1_2" style="text-align:left">Linked Page<br /><span class="alt-th">(click to open)</span></td>
							<td class="subject1_2">Display Period<br /><span class="alt-th">(<span style="color:green">green</span>=on; <span style="color:#f35">red</span>=off)</span></td>
							<td class="subject1_2">Active?<br /><span class="alt-th">(Y=on; N=off)</span></td>
							<td class="subject1_2">Delete?</td>
						</tr>
						<form name="form1" method="post" action="Manage_Banner_action.php">
							<input type="hidden" name="BannerID" value="<?php echo $aid ?>">
							<input type="hidden" name="action" value="del"/>
							<input type="hidden" name="nl" value="<?php echo $navleft ?>"/>
							
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT * FROM banner_promotion  Order by display_order";
	$DB->query($strSQL);
	while ($data = $DB->fetch_array($DB->res)){
		echo "<tr class=\"thin_border_bottom\">";
		echo "<td class=\"general\"><a href=\"Manage_Banner.php?nl={$navleft}&act=view&aid=" . $data["id_banner"] . "\">" 
		 . substr($data["banner_name"], 0, 100) . "</a></td>";
		echo "<td class=\"general_c\">".$data["display_order"]."</td>";
		echo "<td class=\"general_c\">";
		if ($data["banner_image"]!="")
		echo "<a class=\"ajax\" href=\"/images/banner/".$data["banner_image"]."\"><img src=\"/images/banner/".$data["banner_image"]."\"  width=\"100\" height=\"30\"/></a>";			
		echo "</td>";
		echo "<td class=\"general\">";
		if ($data["url"]!="") {
			echo "<a href=\"".$data["url"]."\" target=\"_blank\">".$data["url"]."</a>";
		} else {
			echo "N/A";
		}
		echo "</td>";
		if (strtotime($data["from_date"]) <= time() && strtotime($data["to_date"]) >= time()) {
			$mystyle = " style=\"color:green\"";
		} else {
			$mystyle = " style=\"color:#f35\"";
		}
		echo "<td class=\"general_c\"".$mystyle.">". $data["from_date"] . " <em>-to-</em> ". $data["to_date"]. "</td>";
		echo "<td class=\"general_c\">";
		if ($data["active"]) {
			echo "Y";
		} else {
			echo "N";
		}
		echo "</td>";
		echo "<td class=\"general_c\">";
		echo "<a href=\"Manage_Banner_action.php?nl={$navleft}&action=del&id=" . $data["id_banner"] . "\" onClick=\"if(confirm('Do you want to delete this content of Banner?')){return true;}else{return false;}\">";
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
				window.location="Manage_Banner.php";
				}
				</script>
				
				<form name="form1" method="post" action="Manage_Banner_action.php" enctype="multipart/form-data" onsubmit="return chkform(this)" >
					<?php
						if($act=="view"){
							$strSQL = "SELECT * FROM banner_promotion WHERE id_banner = " . $aid;
							$DB->query($strSQL);
							$data = $DB->fetch_array($DB->res);	
						}
					?>

					<input type="hidden" name="BannerID" value="<?php echo $aid ?>">
					<input type="hidden" name="nl" value="<?php echo $navleft ?>"/>
					<table>
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2">Display Order</th>
								<td class="general"><input type="text" name="display_order" value="<?php  echo $data["display_order"]?>" size="2" />&nbsp; ( 1, 2, 3,... )</td>
								<th class="subject2">Active?</th>
								<td class="general">
									<input type="checkbox" name="IsActive" value="1" <?php echo ($data["active"]=="1")?"checked":null ?>/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">Name</th>
								<td class="general">
									<input class="input-text200" type="text" name="Name" value="<?php  echo $data["banner_name"]?>" size="20" />
								</td>
								<th class="subject2">Banner Type</th>
								<td class="general">
									<select name="banner_type">
<?php 
	$i=0;
	foreach($arrBanVal as $key => $val) {
		echo "<option value=\"".$key."\"".(($data["	banner_type"]==$key || $navleft==$i)?" selected":"").">{$arrBanVal[$key]}</option>";
		$i++;
	}
?>									
									</select>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2" width="130px">Image</th>
								<td  class="general">
								<?php 
									  if ($data["banner_image"]!="")
									  	echo "<img src=\"/images/banner/".$data["banner_image"]."\"  width=\"100\" height=\"50\"/>&nbsp;&nbsp;<input type=\"file\" name=\"BannerImg\"> ";
									  else
									  	echo "<input type=\"file\" name=\"BannerImg\">&nbsp; ";
									 	echo !empty($dimen);
								?>
								</td>
								<th class="subject2" width="130px">Link</th>
								<td class="general"><input class="input-text300" type="text" name="Url" value="<?php echo $data["url"];?>"/></td>
							</tr>
<?php 
		if ($data["banner_type"]=="slide" || $navleft<1) {
?>							
							<!--<tr class="thin_border_bottom">
								<th class="subject2">Caption line 1</th>
								<td class="general"><textarea class="input-text300" name="text1"><?php echo $data["text1"];?></textarea></td>
								<th class="subject2">Caption line 2</th>
								<td class="general"><textarea class="input-text300" name="text2"><?php echo $data["text2"];?></textarea></td>
							</tr>-->
<?php 
		}
?>
							<tr class="thin_border_bottom">
								<th class="subject2" width="130px">From Date</th>
								<td class="general"><input type="text" name="FromDate" value="<?php echo $data["from_date"];?>"/> (yyyy-mm-dd)</td>
								<th class="subject2" width="130px">To Date</th>
								<td class="general"><input type="text" name="ToDate" value="<?php echo $data["to_date"];?>"/> (yyyy-mm-dd)</td>
							</tr>
							<tr class="subject_border_bottom">
								<?php 
									if($data["date_created"]<1){
										$dateCreate = "";
									}else{
										$dateCreate = date("n/j/Y g:i:s A", strtotime($data["date_created"]));
									}
									if($data["date_updated"]<1){
										$dateLastModify = "";
									}else{
										$dateLastModify = date("n/j/Y g:i:s A", strtotime($data["date_updated"]));
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
<?php 
								if($act=="view"){
									echo "<input type=\"button\" value=\"Add New Banner\" style=\"margin-left:20px\" onclick=\"link()\">";
								}
?>									
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
			<script type="text/javascript">
			function chkform(f) {
				var msg="";
				if (f.elements["banner_name"].value == "") {
					msg += "\n - Name(or description) of banner";
				}
<?php 
	if ($act !="view") {
?>				
				if (f.elements["banner_image"].value == "") {
					msg += "\n - Banner image";
				}
<?php 
	}
?>
				if (f.elements["from_date"].value == "") {
					msg += "\n - Date to start displaying the banner";
				}
				if (f.elements["to_date"].value == "") {
					msg += "\n - Date to end displaying banner";
				}
				if (msg) {
					msg = "A banner cannot be posted without the following(s):" + msg;
					alert(msg);
					return false;
				} else {
					return true;
				}
			}
			</script>
		
<?php 
	$DB->close();	//DB close
	require_once("footer.php"); 
?>