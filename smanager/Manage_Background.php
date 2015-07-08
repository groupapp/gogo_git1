<?php 
	require_once("header.php");
	
	$action		= $_POST["action"];
	$IsActive	= $_POST["IsActive"];
	$BackgroundID	= $_POST["BackgroundID"];
	$aid		= empty($_GET["aid"])?"":$_GET["aid"];
	$act		= empty($_GET["act"])?"":$_GET["act"];
	$btn		= empty($_POST["button"])?"":$_POST["button"];
	
	$arrBGrepeat = array("fixed no-repeat"=>"Fixed","no-repeat"=>"Repeat Once","repeat-y"=>"Repeat Vertically","repeat-x"=>"Repeat Horizontally","repeat"=>"Repeat All");
?>


	<!-- sideMenu -->
	<div class="path" style='display:none'>Background Image Manager</div>
	
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
			<div id="title">Background Image Manager</div>
			<div id="sub1">
				<form name="form1" method="post" action="Manage_Background_action.php">
					<table style="border-bottom: 2px solid #BBB; border-top: 2px solid #BBB;">
						<tbody>
							<tr>
								<td class="subject1_2">No</td>
								<td class="subject1_2" style="text-align:left">Name</td>
								<td class="subject1_2">Background Image</td>
								<td class="subject1_2">Background Display</td>
								<td class="subject1_2">Background Color</td>
								<td class="subject1_2">Searchbox Color</td>
								<td class="subject1_2">Display Period<br /><span class="alt-th">(<span style="color:green">green</span>=on; <span style="color:#f35">red</span>=off)</span></td>
								<td class="subject1_2">Active?</td>
								<td class="subject1_2">Delete?</td>
							</tr>
								<input type="hidden" name="BannerID" value="<?php echo $aid ?>">
								<input type="hidden" name="action" value="del"/>
							
<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT * FROM Background Order by BackgroundID DESC";
	$DB->query($strSQL);
	$no		= $DB->rows;
	while ($data = $DB->fetch_array($DB->res)){?>
							<tr class="thin_border_bottom">
								<td class="general_c"><a href="Manage_Background.php?act=view&aid=<?php echo $data["BackgroundID"];?>"><?php echo $no;?></a></td>
								<td class="general"><a href="Manage_Background.php?act=view&aid=<?php echo $data["BackgroundID"]?>"><?php echo substr($data["Name"], 0, 100);?></a></td>
								<td class="general_c">
<?php	if ($data["BackgroundImg"]!=""){?>
									<a class="ajax" href="/images/background/<?php echo $data["BackgroundImg"];?>">
										<img src="/images/background/<?php echo str_replace("/", "/thumb_", $data["BackgroundImg"])?>" height="80" />
									</a>
<?php 	}?>	
								</td>
								<td class="general_c"><?php echo $arrBGrepeat[$data["BackgroundRepeat"]];?></td>
								<td class="general_c"><div style="width:30px; height:20px; display:inline-block; border:1px solid #ddd; background-color:#<?php echo $data["BackgroundColor"];?>;"></div></td>
								<td class="general_c"><div style="width:30px; height:20px; display:inline-block; border:1px solid #ddd; background-color:#<?php echo $data["SearchboxColor"];?>;"></div></td>
		
<?php	if (strtotime($data["FromDate"]) <= time() && strtotime($data["ToDate"]) >= time()) {
			$mystyle = " style=\"color:green\"";
		} else {
			$mystyle = " style=\"color:#f35\"";
		}
		echo "<td class=\"general_c\"".$mystyle.">". $data["FromDate"] . " <em>-to-</em> ". $data["ToDate"]. "</td>";
		echo "<td class=\"general_c\">";
		if ($data["IsActive"]) {
			echo "Y";
		} else {
			echo "N";
		}
?>
								</td>
								<td class="general_c">
									<a href="Manage_Background_action.php?action=del&id=<?php echo $data["BackgroundID"];?> onClick="if(confirm('Do you want to delete this content of Background?')){return true;}else{return false;}">
									Delete</a>
								</td>
							</tr>
<?php
		$no--;
	}
?>
						</tbody>
					</table>
				</form>
				<br/>
				<script type="text/javascript" >
				function link(){
				window.location="Manage_Background.php";
				}
				</script>
				
				<?php 
				if($act=="view"){		//someting selected
					echo "<p><input type=\"button\" value=\"Add New Background\" onclick=\"link()\"></p>";
				}
				?>
				
				<form name="form1" method="post" action="Manage_Background_action.php" enctype="multipart/form-data" onsubmit="return chkbanner(this);" >
					<?php
						if($act=="view"){
							$strSQL = "SELECT * FROM Background WHERE BackgroundID = " . $aid;
							$DB->query($strSQL);
							$data = $DB->fetch_array($DB->res);	
						}
					?>

					<input type="hidden" name="BackgroundID" value="<?php echo $aid ?>">
					<table>
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2" style="width: 200px;">Background Name</th>
								<td  class="general">
									<input type="text" name="Name" class="input-text300" value="<?php echo $data["Name"] ?>" />
								</td>
								<th class="subject2" style="width: 200px;">Active?</th>
								<td class="general">
									<input type="checkbox" name="IsActive" value="Y" <?php echo ($data["IsActive"]=="Y")?"checked":null ?>/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2" width="130px">Image</th>
								<td  class="general">
								<?php 
									  if ($data["BackgroundImg"]!="")
									  echo "<img src=\"/images/background/".$data["BackgroundImg"]."\"  width=\"100\" height=\"50\"/>&nbsp;&nbsp;<input type=\"file\" name=\"BackgroundImg\"> ( 370 x 150 px)";
									  else
									  echo "<input type=\"file\" name=\"BackgroundImg\">";
								?>
								</td>
								<th class="subject2">Searchbox Color</th>
								<td class="general">
									<script type="text/javascript" src="./js/jscolor.js"></script>
									<input type="text" name="searchColor" size="10" class="color" value="<?php echo $data['SearchboxColor'] ? $data['SearchboxColor'] : "000000"?>" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2" width="130px">Background Repeat</th>
								<td  class="general">
									<select name="bgRepeat">
									<?php 
										foreach($arrBGrepeat as $key => $val) {
											echo "<option value=\"{$key}\"";
											if ($data["BackgroundRepeat"]==$key) echo " selected";
											echo ">{$val}</option>";
										}
									?>
									</select>
								</td>
								<th class="subject2" width="130px">Background Color</th>
								<td class="general">
									<script type="text/javascript" src="./js/jscolor.js"></script>
									<input type="text" name="bgColor" size="10" class="color" value="<?php echo $data['BackgroundColor'] ? $data['BackgroundColor'] : "000000"?>" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2" width="130px">From Date</th>
								<td class="general"><input type="text" name="FromDate" value="<?php echo $data["FromDate"];?>"/>(yyyy-mm-dd)</td>
								<th class="subject2" width="130px">To Date</th>
								<td class="general"><input type="text" name="ToDate" value="<?php echo $data["ToDate"];?>"/>(yyyy-mm-dd)</td>
							</tr>
							<tr class="subject_border_bottom">
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
									<input type="button" name="goback" onclick="javascript:location.href='Manage_Background.php'" value="Back to List" />
								</td>
							</tr>
						</tbody>
					</table>
				</form>
				<script type="text/javascript">
					function chkbanner(f) {
						if (!f.Name.value) {
							alert('Please enter a name for the new background.');
							f.Name.focus();
							return false;
						} else {
							return true;
						}
					}
				</script>
			</div>
		
<?php 
	$DB->close();	//DB close
	require_once("footer.php"); 
?>