<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../../shopadmin/css/adm.css" />
	<style type="text/css">
	a.dp-choose-date { float: left; width: 16px; height: 16px; padding: 0; margin: 5px 3px 0; display: block;ext-indent: -2000px; overflow: hidden; background: url(./images/calendar.png) no-repeat; }
	a.dp-choose-date.dp-disabled { background-position: 0 -20px; cursor: default; }
	input.dp-applied { width: 100px; float: left; }
	</style>
	<!-- [if IE 7]><style type="text/css"> .blue ul.mega-menu { position: none; } </style><![endif]-->
	<link href="../../css/style_ty.css" rel="stylesheet" type="text/css" />
	<link href="../../css/skins/blue.css" rel="stylesheet" type="text/css" />
	<script type='text/javascript' src='Script_jy.js'></script>
	

<?php 
	require_once("../include/function.php"); 
	
	$LIMIT	= 20;
	
	$action					= $_POST["action"];
	$nCouponID			= $_POST["nCouponID"];
	$cName			= $_POST["cName"];
	$cDesc	= $_POST["cDesc"];
	$cActive			= $_POST["cActive"];
	

	$aid	= empty($_GET["aid"])?"":$_GET["aid"];
	$act	= empty($_GET["act"])?"":$_GET["act"];
	$btn	= empty($_POST["button"])?"":$_POST["button"];
	$pp		= empty($_GET["pp"])?null:$_GET["pp"];
	$displayOrder	= $_GET["displayOrder"];
	$searchField	= $_GET["searchField"];
	$searchKeyword	= $_GET["searchKeyword"];
?>


	<!-- sideMenu -->
	<script type="text/javascript">
	
	function elfinder(){
	window.open('http://lemontreeclothing.com/myfilemanager/elfinder/elfinder.html?folderName=IN_0','new window','toolbar=0, location=no,status=no,etc,scrollbars=yes,resizable=yes,width=900px,height=450px');
	}
	</script>

	<div id="bodywrapper">
    
    <!-- sideMenu -->
		<div id="navLeft">
			<div style="font:bold 16px/1.2 Palatino Linotype;color:#aaa;">Coupon Events
			</div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
				
				<br/>
				<input type="button" onclick="elfinder()" value="Image">
			</div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
				
				<br/>
				<a href="/cp/kadmin" >Admin</a>
			</div>
			
		</div>
		
		
		
		<!-- content right -->
		<div id="contwrapper">
			<div id="title">
				Coupon
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
		$strSQL = "SELECT * FROM acc_coupon WHERE nCouponID = " . $aid;
		$DB->query($strSQL);
		$data = $DB->fetch_array($DB->res);
		if($data["dCreate_date"]<1){
			$dateCreate = "";
		}else{
			$dateCreate = date("n/j/Y g:i:s A", strtotime($data["dCreate_date"]));
		}
		if($data["dUpdate_date"]<1){
			$dateLastModify = "";
		}else{
			$dateLastModify = date("n/j/Y g:i:s A", strtotime($data["dUpdate_date"]));
		}	
	}
?>		
						<input type="hidden" name="nCouponID" value="<?php echo $data["nCouponID"]; ?>">
						<input type="hidden" name="searchField" value="<?php echo $searchField; ?>">
						<input type="hidden" name="searchKeyword" value="<?php echo $searchKeyword; ?>">
						<input type="hidden" name="displayOrder" value="<?php echo $displayOrder; ?>">
						<input type="hidden" name="pp" value="<?php echo $pp;?>">
						<input type="hidden" name="nCouponID" value="<?php echo $data["nCouponID"]; ?>">
						<tbody>
							<tr class="subject_border_top , thin_border_bottom">
								<th class="subject2" style="width: 200px">Date / Time Created</th>
								<td class="general"><?php echo $dateLastModify;?></td>
								<th class="subject2" style="width: 200px">Status</th>
								<td class="general">
								<input type="radio" name="cActive"  value="Y" <?php echo (($data["cActive"]=="Y") or ($data["cActive"]=="") )?"checked":null?>/>Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="cActive"  value="N" <?php echo ($data["cActive"]=="N")?"checked":null?>/>Inactive
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
								<th  class="subject2">Coupon Name</th>
								<td class="general" colspan="3">
									<input type="text" name="cName" value="<?php echo $data['cName'];?>" style="width: 99%;"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th  class="subject2">Coupon Description</th>
								<td class="general" colspan="3">
									<input type="text" name="cDesc" value="<?php echo $data['cDesc'];?>" style="width: 99%;"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th  class="subject2">Location</th>
								<td class="general" >
									<input type="text" name="cLocation" value="<?php echo $data['cLocation'];?>" />
								</td>
								<th  class="subject2">Shop</th>
								<td class="general" >
									<input type="text" name="cShop" value="<?php echo $data['cShop'];?>" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th  class="subject2">cItem</th>
								<td class="general"  colspan="3">
									<input type="text" name="cItem" value="<?php echo $data['cItem'];?>" />
								</td>
								
							</tr>
							<tr class="thin_border_bottom">
								<th  class="subject2">From</th>
								<td class="general"  >
									<input type="text" name="dFrom" value="<?php echo $data["dFrom"];?>" />
								</td>
								<th  class="subject2">To</th>
								<td class="general" >
									<input type="text" name="dTo" value="<?php echo $data["dTo"];?>" />
								</td>
								
							</tr>
							<tr class="thin_border_bottom">
								<th  class="subject2">Origin Price</th>
								<td class="general" >
									<input type="text" name="fOrigin" value="<?php echo $data['fOrigin'];?>" />
								</td>
								<th  class="subject2">Coupon Price</th>
								<td class="general" >
									<input type="text" name="fSale" value="<?php echo $data['fSale'];?>" />
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th  class="subject2">Create</th>
								<td class="general"  >
									<?php echo $data["dCreate_date"];?>
								</td>
								<th  class="subject2">Update</th>
								<td class="general" >
									<?php echo $data["dUpdate_date"];?>
								</td>
								
							</tr>
							<tr class="thin_border_bottom">
								<th  class="subject2">Image</th>
								<td class="general"  colspan="3">
									<input type="text" name="cImg" value="<?php echo $data['cImg'];?>" style="width: 99%;"/>
								</td>
								
							</tr>
							
						</tbody>
					</form>
				</table>
			</div>
		


<!------------------------------------------------------------------------------------>

<?php 
	$DB 	= new myDB;
	$strSQL = "SELECT  * FROM acc_coupon";
	if($searchField && $searchKeyword){
		$strSQL .= " WHERE ".$searchField." LIKE '%".$searchKeyword."%'";
	}
	if($displayOrder=="PackChartName"){
		$strSQL .=" ORDER BY cName ASC";
	}else{
		$strSQL .=" ORDER BY nCouponID DESC";
	}
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$totalpps = ($LIMIT < 0) ? 1 : ceil($numrows / $LIMIT);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
?>

			<div id="sub1">
				
					<div style="float:left;">
						Total : <?php echo $numrows?> ( page <?php echo $pp?> of <?php echo $totalpps?> )
					</div>
				
				<table style="border-bottom: 2px solid #BBB;">
					<tbody>
						<tr class="subject_border_top">
							<td class="subject1_2">No</td>
							<td class="subject1_2">CID</td>
							<!--<td class="subject1_2">Pack Chart Name</td>
							<?php 
								for ($i=1;$i<=10;$i++){
									echo "<td class=\"subject1_2\">Pack ".$i."</td>";
								}

							?>-->
							<td class="subject1_2">Name</td>
							<td class="subject1_2">Location</td>
							<td class="subject1_2">Shop</td>
							<td class="subject1_2">item</td>
							<td class="subject1_2">From</td>
							<td class="subject1_2">To</td>
							<td class="subject1_2">Price</td>
							<td class="subject1_2">C_price</td>
							<td class="subject1_2">Create</td>
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
							<td class="general_c"><?php echo $data["nCouponID"];?></td>
							<td class="general"><a href="Manage_PackCharts.php?act=view&aid=<?php echo $data["nCouponID"];?>&searchField=<?php echo $searchField;?>&displayOrder=<?php echo $displayOrder;?>&searchKeyword=<?php echo $searchKeyword;?>&pp=<?php echo $pp;?>"><?php echo $data["cName"]?></a></td>
							<td class="general_c"><?php echo $data["cLocation"];?></td>
							<td class="general_c"><?php echo $data["cShop"];?></td>
							<td class="general_c"><?php echo $data["cItem"];?></td>
							<td class="general_c"><?php echo date("Y-m-d", strtotime($data["dFrom"]));?></td>
							<td class="general_c"><?php echo date("Y-m-d", strtotime($data["dTo"]));?></td>
							
							<td class="general_c"><?php echo $data["fOrigin"];?></td>
							<td class="general_c"><?php echo $data["fSale"];?></td>
							<td class="general_c"><?php echo date("Y-m-d", strtotime($data["dCreate_date"]));?></td>
							<td class="general_c"><?php echo $data["cActive"];?></td>
							<td class="general_c">
								<a href="Manage_PackCharts_action.php?action=del&id=<?php echo $data["nCouponID"];?>" onclick="if(confirm('Do you want to delete this coupon?')){return true;}else{return false;}">Delete</a>
								<input name="Action" type="hidden" value="del"/>
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
	$DB->close();	//DB close
?>