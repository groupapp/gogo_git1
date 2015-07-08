<?php 
	require_once("header.php"); 

	$action						= $_REQUEST["action"];
	$ProductID					= $_POST["ProductID"];
//echo $ProductID;
	$Edit_Style					= $_POST["Edit_Style"];
	$productid_copy				= $_POST["productid_copy"];
	$Edit_IsActive 				= $_POST["Edit_IsActive"];
	$Edit_Cat1ID 				= $_POST["Edit_Cat1ID"];
	$Edit_Cat2ID 				= $_POST["Edit_Cat2ID"];
	$Edit_BrandName1 			= $_POST["Edit_BrandName1"];
	if($Edit_BrandName1=="Select")
	$Edit_BrandName1="";
	$Edit_BrandName2 			= $_POST["Edit_BrandName2"];
	$Edit_ProductName 			= $_POST["Edit_ProductName"];
	$Edit_ProductDescription	= $_POST["Edit_ProductDescription"];
	$Edit_NoticeToPurchasers	= $_POST["Edit_NoticeToPurchasers"];
	$Edit_SearchEngineTags 		= $_POST["Edit_SearchEngineTags"];
	$Edit_Player1 				= $_POST["Edit_Player1"];
	$Edit_Player2 				= $_POST["Edit_Player2"];
	$Edit_League1 				= $_POST["Edit_League1"];
	$Edit_League2 				= $_POST["Edit_League2"];
	$Edit_Club1 				= $_POST["Edit_Club1"];
	$Edit_Club2 				= $_POST["Edit_Club2"];
	$Edit_Country1 				= $_POST["Edit_Country1"];
	$Edit_Country2 				= $_POST["Edit_Country2"];
	$Edit_MadeOfMaterial 		= $_POST["Edit_MadeOfMaterial"];
	$Edit_Cost 					= $_POST["Edit_Cost"];
	$Edit_UnitPrice 			= $_POST["Edit_UnitPrice"];
	$Edit_UnitPriceOnSale 		= $_POST["Edit_UnitPriceOnSale"];
	$Edit_PrepackQuantity		= $_POST["Edit_PrepackQuantity"];
	$Edit_Weight_Pounds 		= $_POST["Edit_Weight_Pounds"];
	$Free_Shipping 				= $_POST["Free_Shipping"];
	$Edit_IsThisBackOrderItem 	= $_POST["Edit_IsThisBackOrderItem"];
	$Edit_ForMenOrWomen 		= $_POST["Edit_ForMenOrWomen"];
	$Edit_SizeChartID 			= $_POST["Edit_SizeChartID"];
	$CheckedColorID 			= $_POST["CheckedColorID"];
	$personalize 				= $_POST["personalize"];
	$Edit_QuantityDiscountID 	= $_POST["Edit_QuantityDiscountID"];
	$Edit_MatchesWithProduct1 	= $_POST["Edit_MatchesWithProduct1"];
	$Edit_MatchesWithProduct2 	= $_POST["Edit_MatchesWithProduct2"];
	$Edit_MatchesWithProduct3 	= $_POST["Edit_MatchesWithProduct3"];
	$Edit_MatchesWithProduct4 	= $_POST["Edit_MatchesWithProduct4"];
	$Edit_MatchesWithProduct5 	= $_POST["Edit_MatchesWithProduct5"];
	$Edit_MatchesWithProduct6 	= $_POST["Edit_MatchesWithProduct6"];
	$Picture1 					= $_POST["Picture1"];
	$Picture2 					= $_POST["Picture2"];
	$Picture3 					= $_POST["Picture3"];
	$Picture4 					= $_POST["Picture4"];
	$Picture5 					= $_POST["Picture5"];
	$Picture6 					= $_POST["Picture6"];
	$Picture7 					= $_POST["Picture7"];
	$Picture8 					= $_POST["Picture8"];
	$Picture9 					= $_POST["Picture9"];
	$Picture10 					= $_POST["Picture10"];
	$Picture11 					= $_POST["Picture11"];
	$Picture12 					= $_POST["Picture12"];
	$Picture13 					= $_POST["Picture13"];
	$Picture14 					= $_POST["Picture14"];
	$Picture15 					= $_POST["Picture15"];
	$Picture16 					= $_POST["Picture16"];
	$Picture17 					= $_POST["Picture17"];
	$Picture18 					= $_POST["Picture18"];
	$Picture19 					= $_POST["Picture19"];
	$Picture20 					= $_POST["Picture20"];
	$Picture21 					= $_POST["Picture21"];
	$Picture22 					= $_POST["Picture22"];
	$Picture23 					= $_POST["Picture23"];
	$Picture24 					= $_POST["Picture24"];
	$Picture25 					= $_POST["Picture25"];
	$s_cat1						= $_REQUEST["s_cat1"];
	$s_cat2						= $_REQUEST["s_cat2"];
	$ss_cat1					= $_REQUEST["ss_cat1"];
	if($ss_cat1=="Select")
	$ss_cat1="";
	$ss_cat2					= $_REQUEST["ss_cat2"];
	if($ss_cat2=="Select")
	$ss_cat2="";

	
// Search parameters

	$s_status 				= $_REQUEST["s_status"];
	$s_brand 				= $_GET["s_brand"];
	$s_idx 					= $_GET["s_idx"];
	$s_styleno 				= $_GET["s_styleno"];
	$s_name 				= $_GET["s_name"];
	$s_desc 				= $_GET["s_desc"];
	$s_player 				= $_GET["s_player"];
	$s_club 				= $_GET["s_club"];
	$s_league 				= $_GET["s_league"];
	$s_country 				= $_GET["s_country"];
	$s_tags 				= $_GET["s_tags"];
	$s_freeship				= $_GET["s_freeship"];

	$s_fprice				= $_GET["s_fprice"];
	$s_tprice				= $_GET["s_tprice"];
	
	$s_from					= $_GET["s_from"];
	$s_to					= $_GET["s_to"];
	if($s_from!="" && $s_to=="")
	$s_to=date("Y-m-d");
	
	
	

	$Display_ActiveItems_By = $_GET["Display_ActiveItems_By"];
	$Display_ActiveItems_In	= $_GET["Display_ActiveItems_In"];

	$GotoPage 				= $_POST["GotoPage"];
	$ProductID 				= $_POST["ProductID"];
	$Cat1ID 				= $_POST["Cat1ID"];
	$Cat2ID 				= $_POST["Cat2ID"];
	$Cat3ID 				= $_POST["Cat3ID"];
	$act					= $_POST["act"];
	$aid					= empty($_GET["aid"])?"":$_GET["aid"];
	$act					= empty($_GET["act"])?"":$_GET["act"];
	$btn					= empty($_POST["button"])?"":$_POST["button"];
	$pp						= empty($_GET["pp"])?null:$_GET["pp"];
	$ppAI					= empty($_GET["ppAI"])?null:$_GET["ppAI"];
	$ppII					= empty($_GET["ppII"])?null:$_GET["ppII"];
	$display				= empty($_GET["display"])?null:$_GET["display"];
	$orderType				= empty($_GET["orderType"])?null:$_GET["orderType"];
	$CDB 	= new myDB;
	$DB 	= new myDB;
	$DBCO 	= new myDB;
	$DBC 	= new myDB;
	$DBC1 	= new myDB;
	$DBp 	= new myDB;
	$DBp1 	= new myDB;
	$DBp2 	= new myDB;
	$DBp3 	= new myDB;
	$DBp4 	= new myDB;
	$DBca	= new myDB;
	$DBca2	= new myDB;
/*	echo $act."<br/>";

	if($act=="DeactivateCheckedProducts"){
		foreach($_POST["idtocheck"] as $key => $val) {
			$updateSQL 	= ("UPDATE Products SET
					IsActive				= \"N\",
					DateTimeLastModified	= now()
					WHERE ProductID=".$val);
			$DB->query($updateSQL);
		}
	}

	if($act=="ActivateCheckedProducts"){
		foreach($_POST["idtocheck"] as $key => $val) {
			$strSQL 	= ("UPDATE Products SET
					IsActive				= \"Y\",
					DateTimeLastModified	= now()
					WHERE ProductID=".$val);
			$DB->query($strSQL);
		}
	}
	elseif($act=="DeleteCheckedProducts"){
		foreach($_POST["idtocheck"] as $key => $val) {
			$strSQL = ("DELETE FROM Products WHERE ProductID=".$val);
			//		echo $strSQL;
			$DB->query($strSQL);
		}
	}*/
?>


<!-- sideMenu 
<div class="path" style='display: block'>About Us</div>-->
<script type="text/javascript" src="/js/ckeditor.js"></script>
<script type="text/javascript" src="/js/ajax.js"></script>

<div id="bodywrapper">

	<!-- sideMenu -->
	<div id="navLeft">
		<div style="font: bold 16px/1.2 Palatino Linotype; color: #aaa;">gogomarket event</div>
		<div id="eventCalendarDefault" class="eventCalendar_wrap">
		<p>&nbsp;</p>
		<p>Today Update</p>
		<?php
		$strSQLc = "SELECT * FROM Category1  ORDER BY Cat1SortNo ASC";
		$DBC->query($strSQLc);
		//echo $strSQLc;
		while ($datac = $DBC->fetch_array($DBC->res)){
		
			$strSQLp = "SELECT count(*) as cnt FROM Products WHERE DATE_FORMAT(`DateTimeCreated`,'%Y-%m-%d')='".date("Y-m-d")."' and Cat1ID=".$datac["Cat1ID"] ;
			$DBp->query($strSQLp);
				while ($datacp = $DBp->fetch_array($DBp->res)){
					$cnt=$datacp["cnt"];
				}
			echo "<p><span style='cursor:pointer;' id='texpand_".$datac["Cat1ID"]."' onclick='tshow(".$datac["Cat1ID"].")'>+</span><span style='display:none;cursor:pointer;' id='tcoll_".$datac["Cat1ID"]."' onclick='thide(".$datac["Cat1ID"].")'>-</span><a href='Manage_Products.php?action=search&ss_cat1=".$datac["Cat1ID"]."&s_from=".date("Y-m-d")."&s_to=".date("Y-m-d")."'>".$datac["Cat1Name"]."(".$cnt.")</a></p>";
			echo "<span id='tcat2_".$datac["Cat1ID"]."' style='display:none;'>";
				$strSQLc1 = "SELECT * FROM Category2 WHERE  Cat1ID=".$datac["Cat1ID"]." ORDER BY Cat2SortNo ASC";
					$DBC1->query($strSQLc1);
					while ($datac1 = $DBC1->fetch_array($DBC1->res)){

						$strSQLp1 = "SELECT count(*) as cnt FROM Products WHERE DATE_FORMAT(`DateTimeCreated`,'%Y-%m-%d')='".date("Y-m-d")."' and Cat2ID=".$datac1["Cat2ID"] ;
						$DBp1->query($strSQLp1);
						while ($datacp1 = $DBp1->fetch_array($DBp1->res)){
							$cnt2=$datacp1["cnt"];
						}

						echo "<p style='margin-left: 20px; '><a href='Manage_Products.php?action=search&ss_cat1=".$datac1["Cat1ID"]."&ss_cat2=".$datac1["Cat2ID"]."&s_from=".date("Y-m-d")."&s_to=".date("Y-m-d")."'>".$datac1["Cat2Name"]."(".$cnt2.")</a></p>";
					}
			echo "</span>";

		}
		?>


		<p>&nbsp;</p>
		<p>Category</p>
		<p>&nbsp;</p>
		<?php
		$CSQL = "SELECT count(*) as ccnt FROM Products"  ;
			$CDB->query($CSQL);
				while ($cdata = $CDB->fetch_array($CDB->res)){
					$ccnt=$cdata["ccnt"];
				}
			

		$strSQLc = "SELECT * FROM Category1 ORDER BY Cat1SortNo ASC";
		$DBC->query($strSQLc);
		while ($datac = $DBC->fetch_array($DBC->res)){
		
			$strSQLp = "SELECT count(*) as cnt FROM Products WHERE Cat1ID=".$datac["Cat1ID"] ;
			$DBp->query($strSQLp);
				while ($datacp = $DBp->fetch_array($DBp->res)){
					$cnt=$datacp["cnt"];
				}
			echo "<p><span style='cursor:pointer;' id='expand_".$datac["Cat1ID"]."' onclick='show(".$datac["Cat1ID"].")'>+</span><span style='display:none;cursor:pointer;' id='coll_".$datac["Cat1ID"]."' onclick='hide(".$datac["Cat1ID"].")'>-</span><a href='Manage_Products.php?action=search&ss_cat1=".$datac["Cat1ID"]."'-->".$datac["Cat1Name"]."(".$cnt.")</a></p>";
			echo "<span id='cat2_".$datac["Cat1ID"]."' style='display:none;'>";
				$strSQLc1 = "SELECT * FROM Category2 WHERE Cat1ID=".$datac["Cat1ID"]." ORDER BY Cat2SortNo ASC";
					$DBC1->query($strSQLc1);
					while ($datac1 = $DBC1->fetch_array($DBC1->res)){

						$strSQLp1 = "SELECT count(*) as cnt FROM Products WHERE Cat2ID=".$datac1["Cat2ID"] ;
						$DBp1->query($strSQLp1);
						while ($datacp1 = $DBp1->fetch_array($DBp1->res)){
							$cnt2=$datacp1["cnt"];
						}

						echo "<p style='margin-left: 20px; '><a href='Manage_Products.php?action=search&ss_cat1=".$datac1["Cat1ID"]."&ss_cat2=".$datac1["Cat2ID"]."'>".$datac1["Cat2Name"]."(".$cnt2.")</a></p>";
					}
			echo "</span>";

		}
		echo "<p><b>Total:".$ccnt."</b></p>";	
		?>
		</div>

	</div>


	<!-- content right -->
	<div id="contwrapper" style="border-left: 1px solid #BBB;">
		<div id="title">Manage Products:</div>
		<div id="sub1" style="float:left;">
			<form name="download_search_content" method="get" action="Manage_Products.php">
				<div class="prod-search">
					
				</div>
				<input type="button" value="Add New Item" onclick="return addNewItems(this.form);"/>
				<input type="hidden" name="action" value="addNew"/>
 			<script>
				
				function preview(id)
				{
				document.getElementById('myAnchor').target = "_blank";
				location.href="/?pid="+id;
				}
				
				function tshow(id){
					//alert(id);
					document.getElementById('tcat2_'+id).style.display = 'block';
					document.getElementById('texpand_'+id).style.display = 'none';
					document.getElementById('tcoll_'+id).style.display = 'block';
					
				}
				function thide(id){
					//alert(id);
					document.getElementById('tcat2_'+id).style.display = 'none';
					document.getElementById('texpand_'+id).style.display = 'block';
					document.getElementById('tcoll_'+id).style.display = 'none';
				}	
				function show(id){
					//alert(id);
					document.getElementById('cat2_'+id).style.display = 'block';
					document.getElementById('expand_'+id).style.display = 'none';
					document.getElementById('coll_'+id).style.display = 'block';
					
				}
				function hide(id){
					//alert(id);
					document.getElementById('cat2_'+id).style.display = 'none';
					document.getElementById('expand_'+id).style.display = 'block';
					document.getElementById('coll_'+id).style.display = 'none';
				}	
				
				
				/*
				function addNewItems(frm){
					if(document.getElementById('s_cat1').value==''){
						alert('Please select Main Category');
						return false;
					}*/
					//frm.submit();
				//}
				</script> 
			</form>
		</div>
		<div id="sub2">
			<span >
			<p style=" float: left;  margin-top: -5px; margin-right: 10px;"><b class="bold_s">Copy</b></p>
			<form name="Load" method="post" action="Manage_Products.php">
				
				<p style="float:left;"> Style No : 
						<input type="text" name="productid_copy" id="productid_copy" value="<?php echo $productid_copy; ?>"/>		 
						<input type="button" value="Load" id="btn_copy" onclick="document.Load.submit()"/>
						<input type="hidden" name="action" value="load"/>
				</p>
				
			</form>

			
			</span>
			<?php if($aid!='')
			echo '<span style="float:left;"><a href="/?pid='.$aid.'" style="border-radius: 2px;  -moz-border-radius: 2px;cursor: pointer;  padding: 6px 20px;margin-left: 100px; margin-top: 50px;background: #F89808;  border: 0;  font: normal 12px/26px Arial, Helvetica, sans-serif;  color: white;  text-transform: uppercase;" target="_blank">Preview</a></span>';
			//echo '<span><input type="button" id="myAnchor" value="View" style="margin-left: 100px; margin-top: 5px;" onclick="preview('. $aid.')"/></span>';
			?>
			<?php echo '<span style="margin-left: 100px;">'.date("Y-m-d").'</span>'?>
			<?php if($act=="view" || $action=="load" || $action=="addNew"){?>
			<form name="ProductDetail_Form" method="post" enctype="multipart/form-data" action="Manage_Products_action.php">
				<?php
					
					
					
					
					if($act=="view" || $action=="load"){
						if($action=="load")
						$strSQL = "SELECT * FROM Products WHERE StyleNo = '".$productid_copy."'";
						else	
						$strSQL = "SELECT * FROM Products WHERE ProductID = ".$aid;

						//$strSQL .= ($action=="load")?$productid_copy:$aid;
						$DBQ = new myDB();
						$DBQ->query($strSQL);
						$dataProd = $DBQ->fetch_array($DBQ->res);
						
						
						if($dataProd["DateTimeCreated"]<1){
							$dateCreate = "";
						}else{
							$dateCreate = date("n/j/Y g:i:s A", strtotime($dataProd["DateTimeCreated"]));
						}						
						if($dataProd["DateTimeLastModified"]<=1990){
							$dateUpdate = "";
						}else{
							$dateUpdate = date("n/j/Y g:i:s A", strtotime($dataProd["DateTimeLastModified"]));
						}

						
						
					}	
					else if($action=="addNew"){
					$DBS = new myDB;
					$colorSQL2 = "SELECT MAX(ProductID) as max FROM Products";	
					$DBS->query($colorSQL2);
						while ($datas = $DBS->fetch_array($DBS->res)) {
							$colorproductid=$datas["max"]+1;
						}
					}
					
				?>
				<input type="hidden" id="ProductID" name="ProductID" value="<?php echo $aid ?>"> 
				<!--<span><p style="margin-left: 11px; padding: 15px 0;">Fields with <span class="redstar">*</span> below are required fields, meaning that you must select one or write something.</p></span>-->
				<table style="border-bottom: 2px solid #BBB;">
					<tbody>
						<tr class="subject_border_top , thin_border_bottom">
							<th class="subject2" style="width: 195px;">Product ID</th>
							<td class="general"><?php if($act=="view") echo $dataProd["ProductID"]; ?></td>
							<input type="hidden" id="proID" name="proID" value="<?php if($act=="view") echo $dataProd["ProductID"]; ?>">
							<input type="hidden" id="proID2" name="proID2" value="<?php echo $colorproductid; ?>">
							<th class="subject2" style="width: 195px;">Status <span class="redstar">*</span></th>
							<td colspan="3" class="general" style="width: 300px;">
								<!--<input type="checkbox" name="Edit_IsActive"  value="Y" <?php echo ($dataProd["IsActive"]=="Y")?"checked":null?>/>-->
								<input type="radio" name="Edit_IsActive"  value="Y" <?php echo ($dataProd["IsActive"]=="Y") ?"checked":null?>/>Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="Edit_IsActive"  value="N" <?php echo (($dataProd["IsActive"]=="N") or ($dataProd["IsActive"]=="") ) ?"checked":null?>/>Inactive
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Created</th>
							<td class="general"><?php if($act=="view") echo $dateCreate; ?></td>
							<th class="subject2">Modified</th>
							<td colspan="3" class="general"><?php if($act=="view") echo $dateUpdate; ?></td>
						</tr>
						
						<tr class="thin_border_bottom">
							<th class="subject2">Style No</th>
							<td  class="general , thin_border_right">
							<input type="text" name="Edit_Style" value="<?php echo $dataProd["StyleNo"]?>" style="width: 188px;" maxlength="50">
							
							</td>
							<th class="subject2">Vendor</th>
							<td  class="general">
								<?php
								echo "Search:&nbsp<input type=\"text\" id=\"vendorkey\" name=\"vendorkey\" ><br/>";
								?>
								<select id="Edit_BrandName1" name="Edit_BrandName1">
									<option value="">Select :</option>
									<?php 
											$strSQL = "SELECT DISTINCT BrandName FROM Products Where BrandName IS NOT NULL AND BrandName<>'' ORDER BY BrandName ASC";
											$DB->query($strSQL);
											while ($data = $DB->fetch_array($DB->res)){
												echo "<option value=\"" . $data["BrandName"] . "\" ";
												if($Edit_BrandName1==$data["BrandName"]){
													echo "selected";
												}elseif($dataProd["BrandName"]==$data["BrandName"]){
													echo "selected";
												}
												echo ">&nbsp; &nbsp;" . $data["BrandName"] . "</option>";
											}
									?>
								</select> &nbsp; or &nbsp; 
								<input type="text" name="Edit_BrandName2" value="" style="width: 188px;" maxlength="50"> &nbsp;
							(Name of the Vendor)</td>
							<th class="subject2">Vendor Style No</th>
							<td  class="general">
								
								<input type="text" name="Edit_BrandStyle" value="<?php echo $dataProd["BrandStyle"]?>" style="width: 188px;" maxlength="50"> &nbsp;
							</td>

							<!--<td rowspan="6" class="general_c">							
							<?php 
								if($act=="view"){
									if($dataProd["Picture1"]!=null){
										echo "<a class=\"ajax\" href=\"/Images_Products/".$dataProd["Picture1"]."\"><img src=\"/Images_Products/" . $dataProd["Picture1"] . "\" width=\"200\" /></a>";
									}else{
										echo "Picture 1";
									}						
								}else{
									echo "Picture 1";
								}
							?>
							</td>-->

						</tr>
						<tr class="thin_border_bottom">
							
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Product Name <span class="redstar">*</span></th>
							<td colspan="5" class="general">
								<input type="text" name="Edit_ProductName" value="<?php echo $dataProd["ProductName"]; ?>" maxlength="65" style="width: 79%;"/> (Max. 65 letters)
							</td>
						</tr>
						
						<tr class="thin_border_bottom">
							<th class="subject2">Category</th>
							<td colspan="5" class="general">
								<span id="category_td"> 
									<select id="s_cat1" name="Edit_Cat1ID">
										<option value="">Select :</option>
										<?php 
											$strSQL = "SELECT * FROM Category1 ORDER BY Cat1SortNo ASC";
											$DB->query($strSQL);
											while ($data = $DB->fetch_array($DB->res)){
												echo "<option value=\"" . $data["Cat1ID"] . "\"";
												if($s_cat1==$data["Cat1ID"]){
													echo "selected";
												}
												elseif($Edit_Cat1ID==$data["Cat1ID"]){
													echo "selected";
												}
												elseif($dataProd["Cat1ID"]==$data["Cat1ID"]){
													echo "selected";
												}
												echo ">&nbsp; &nbsp;" . $data["Cat1Name"] . "</option>";
											}
										?>
									</select> &nbsp;>&nbsp;
									<select id="s_cat2" name="Edit_Cat2ID">
										<option value="">Select :</option>
										<?php
											//if (!empty($Edit_Cat1ID)) {
												$strSQL = "SELECT * FROM Category2 Where Cat1ID = " . $dataProd["Cat1ID"] . " ORDER BY Cat2SortNo ASC";
												$DB->query($strSQL);
												
												while ($data = $DB->fetch_array($DB->res)){
													echo "<option value=\"" . $data["Cat2ID"] . "\"";
													if($s_cat2==$data["Cat2ID"]){
														echo "selected";
													}elseif($Edit_Cat2ID==$data["Cat2ID"]){
														echo "selected";
													}elseif($dataProd["Cat2ID"]==$data["Cat2ID"]){
													echo "selected";
												}
													echo ">&nbsp; &nbsp;" . $data["Cat2Name"] . "</option>";
												}									
										//	}
										?>
										</select>
									</span> &nbsp; (<b>Main Category</b> > <b>Sub Category</b>)
								<!--<b>Category 3</b>)--></td>
						</tr>
						
						
						<!--<tr class="thin_border_bottom">
							<th class="subject2">Notice To Buyers</th>
							<td colspan="2" class="general">
								(Write an order instruction for this item to buyers if necessary.)<br/>
								<textarea name="Edit_NoticeToPurchasers" rows="4"
								style="margin: 0px; width: 99%; height: 56px;"><?php echo $dataProd["NoticeToPurchasers"]; ?></textarea>
							</td>
						</tr>-->
						<!--<tr class="thin_border_bottom">
							<th class="subject2">Player</th>
							<td colspan="3" class="general">
								<select name="Edit_Player1">
									<option value>Select :</option>
									<?php 
											$strSQL = "SELECT DISTINCT Player FROM Products Where Player IS NOT NULL AND Player<>'' ORDER BY Player ASC";
											$DB->query($strSQL);
											while ($data = $DB->fetch_array($DB->res)){
												echo "<option value=\"" . $data["Player"] . "\" ";
												if($Edit_Player1==$data["Player"]){
													echo "selected";
												}elseif($dataProd["Player"]==$data["Player"]){
													echo "selected";
												}
												echo ">&nbsp; &nbsp;" . $data["Player"] . "</option>";
											}
									?>									
								</select> &nbsp; or &nbsp; 
								<input type="text" name="Edit_Player2" value="<?php 
					/*			if($Edit_Player1==null){
									echo $dataProd["Player"]
								}
								if($Edit_Player2!=null){
									echo $Edit_Player2;
								}*/?>" style="width: 188px;" maxlength="50"/>
								&nbsp;(Name of the football Player)</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">League</th>
							<td colspan="3" class="general">
								<select name="Edit_League1">
									<option value>Select :</option>
									<?php 
										$strSQL = "SELECT DISTINCT League FROM Products Where League IS NOT NULL AND League<>'' ORDER BY League ASC";
										$DB->query($strSQL);
										while ($data = $DB->fetch_array($DB->res)){
											echo "<option value=\"" . $data["League"] . "\" ";
											if($Edit_League1==$data["League"]){
												echo "selected";
											}elseif($dataProd["League"]==$data["League"]){
												echo "selected";
											}
											echo ">&nbsp; &nbsp;" . $data["League"] . "</option>";
										}
									?>
								</select> &nbsp; or &nbsp; 
								<input type="text" name="Edit_League2" value="<?php 
							/*	if($Edit_League1==null){
									echo $dataProd["League"];
								}
								if($Edit_League2!=null){
									echo $Edit_League2;
								}*/?>" style="width: 188px;" maxlength="50"/>
							&nbsp;(Name of the football League)</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Club / Team</th>
							<td colspan="3" class="general">
								<select name="Edit_Club1">
									<option value="">Select :</option>
										<?php 
												$strSQL = "SELECT DISTINCT Club FROM Products Where Club IS NOT NULL AND Club<>'' ORDER BY Club ASC";
												$DB->query($strSQL);
												while ($data = $DB->fetch_array($DB->res)){
													echo "<option value=\"" . $data["Club"] . "\" ";
													if($Edit_Club1==$data["Club"]){
														echo "selected";
													}elseif($dataProd["Club"]==$data["Club"]){
														echo "selected";
													}
													echo ">&nbsp; &nbsp;" . $data["Club"] . "</option>";
												}
										?>								
								</select> &nbsp; or &nbsp; 
								<input type="text" name="Edit_Club2" value="<?php 
							/*	if($Edit_Club1==null){
									echo $dataProd["Club"];
								}
								if($Edit_Club2!=null){
									echo $Edit_Club2;
								}*/?>" style="width: 188px;" maxlength="50"/>
							&nbsp;(Name of the football Club)</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Country / National Team</th>
							<td colspan="3" class="general">
								<select name="Edit_Country1">
									<option value="">Select :</option>
										<?php 
												$strSQL = "SELECT DISTINCT Country FROM Products Where Country IS NOT NULL AND Country<>'' ORDER BY Country ASC";
												$DB->query($strSQL);
												while ($data = $DB->fetch_array($DB->res)){
													echo "<option value=\"" . $data["Country"] . "\" ";
													if($Edit_Country1==$data["Country"]){
														echo "selected";
													}elseif($dataProd["Country"]==$data["Country"]){
														echo "selected";
													}
													echo ">&nbsp; &nbsp;" . $data["Country"] . "</option>";
												}
										?>				
								</select> &nbsp; or &nbsp; 
								<input type="text" name="Edit_Country2" value="<?php 
						/*		if($Edit_Country1==null){
									echo $dataProd["Country"];
								}
								if($Edit_Country2!=null){
									echo $Edit_Country2;
								}*/?>" style="width: 188px;" maxlength="50"/> 
							&nbsp;(Name of the Country if this is a national team item)</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Material</th>
							<td colspan="3" class="general">
								<input type="text" name="Edit_MadeOfMaterial" value="<?php echo $dataProd["MadeOfMaterial"]; ?>" style="width: 240px;" maxlength="50"/> 
							&nbsp; (Example: Leather, Cotton, Polyester, and etc.)</td>
						</tr>-->
						<tr class="thin_border_bottom">
							<th class="subject2">Size<span class="redstar">*</span></th>
							<td colspan="5" class="general">
								<?php
								echo "Search:&nbsp<input type=\"text\" id=\"sizekey\" name=\"sizekey\" >";
								?>
								<select id="Edit_SizeChartID" name="Edit_SizeChartID" style="width: 700px; font: normal 11px tahoma, sans-serif;">
									<option value="" style="width: inherit;">Select :</option>
									<?php 
										$strSQL = "SELECT DISTINCT SizeChartID, SizeChartName FROM Size ORDER BY SizeChartName ASC";
										$DB->query($strSQL);
								//		$sortNum = 1;
										$sizeList;
										while ($data = $DB->fetch_array($DB->res)){
									//		for($i=1; $i<=25; $i++){
									//			$sizeList .= " " . $data["Size".$i];
									//		}								
										//	echo "<option>" . $sizeList . "</option>";
											
											echo "<option value=\"" . $data["SizeChartID"] . "\"";
											if($dataProd["SizeChartID"]==$data["SizeChartID"]){
												echo "selected";
											}
											echo ">" . $data["SizeChartName"] ;
											/*
											echo ">(" . $data["SizeChartID"] . ")&nbsp;" . $data["SizeChartName"] . ":&nbsp;";
											$strSQL2 = "SELECT Size FROM Size WHERE SizeChartID = ".$data["SizeChartID"]." && `Order` >= 0";
											$DB2 = new myDB();
											$DB2->query($strSQL2);
											while ($data2 = $DB2->fetch_array($DB2->res)){
												if($data2["Size"]!=null){
													echo $data2["Size"]."&nbsp;";
												}
											}*/
											echo "</option>";
									//		$sortNum++;
									//		$sizeList = "";
										}
									?>
								</select>
							</td>
						</tr>

						<tr class="thin_border_bottom">
							<th class="subject2">Pack<span class="redstar">*</span></th>
							<td colspan="5" class="general">
								<?php
								echo "Search:&nbsp<input type=\"text\" id=\"packkey\" name=\"packkey\" >";
								?>
								<select id="Edit_PackChartID" name="Edit_PackChartID"  style="width: 700px; font: normal 11px tahoma, sans-serif;">
									<option value="0" style="width: inherit;">Select :</option>
									<?php 
										$strSQL = "SELECT DISTINCT PackChartID, PackChartName FROM Pack ORDER BY PackChartName ASC";
										$DB->query($strSQL);
								//		$sortNum = 1;
										$PackList;
										while ($data = $DB->fetch_array($DB->res)){
									//		for($i=1; $i<=25; $i++){
									//			$PackList .= " " . $data["Pack".$i];
									//		}								
										//	echo "<option>" . $PackList . "</option>";
											
											echo "<option value=\"" . $data["PackChartID"] . "\"";
											if($dataProd["PackChartID"]==$data["PackChartID"]){
												echo "selected";
											}
											echo ">" . $data["PackChartName"];
											/*echo ">(" . $data["PackChartID"] . ")&nbsp;" . $data["PackChartName"] . ":&nbsp;";
											$strSQL2 = "SELECT Pack FROM Pack WHERE PackChartID = ".$data["PackChartID"]." && `Order` >= 0";
											$DB2 = new myDB();
											$DB2->query($strSQL2);
											while ($data2 = $DB2->fetch_array($DB2->res)){
												if($data2["Pack"]!=null){
													echo $data2["Pack"]."&nbsp;";
												}
											}*/
											echo "</option>";
									//		$sortNum++;
									//		$sizeList = "";
										}
									?>
								</select>
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Price <span class="redstar">*</span></th>
							<td colspan="5" class="general">
								<table width="100%" border="0" cellpadding="0" cellspacing="0"
									class="arial12">
									<tr>
										<td  class="general">&nbsp; <b>Cost:</b>
										</td>
										<td  class="general">$
											<input type="text" name="Edit_Cost" value="<?php echo $dataProd["Cost"]; ?>" size="7" maxlength="7"/>
										</td>
										<td  class="general">&nbsp; <b>Unit Price:</b>
										</td>
										<td  class="general">$
											<input type="text" name="Edit_UnitPrice" value="<?php echo $dataProd["UnitPrice"]; ?>" size="7" maxlength="7"/>
										</td>
										<td  class="general"><b>Sale Price:</b>
										</td>
										<td  class="general">$
											<input type="text" name="Edit_UnitPriceOnSale" value="<?php echo $dataProd["UnitPriceOnSale"]; ?>" size="7" maxlength="7"/>
										</td>
										<td  class="general">&nbsp; <b>Quantity in Prepack:</b>
										</td>
										<td   style="padding-left: 7px;">
											<input type="text" name="Edit_PrepackQuantity" id="PrepackQuantity" value="<?php echo $dataProd["PrepackQuantity"]; ?>" size="4" maxlength="3"/>
										</td>
									</tr>
									<!--<tr>
										<td class="general">&nbsp; <b>Quantity in Prepack:</b>
										</td>
										<td colspan="3" style="padding-left: 7px;">
											<input type="text" name="Edit_PrepackQuantity" value="<?php echo $dataProd["PrepackQuantity"]; ?>" size="4" maxlength="3"/>
										</td>
									</tr>
									<tr>
										<td class="general"></td>
										<td colspan="3" style="padding-bottom: 2px;">
											&nbsp; Enter a prepacked quantity only if this item is sold
											in prepacks of a designated quantity.<br>&nbsp; If a
											prepacked quantity is 3, this item is sold at 3 x Regular
											Unit Price (or Sale Unit Price) in prepacks of 3.
										</td>
									</tr>-->
								</table>
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Description <span class="redstar">*</span></th>
							<td colspan="5" class="general"><!---->
								<textarea  class="ckeditor" name="Edit_ProductDescription" rows="7"
								style="margin: 0px; width: 99%; height: 98px;"><?php echo $dataProd["ProductDescription"]; ?></textarea>
							</td>
						</tr>
						<!--	
						<tr class="thin_border_bottom">
							<th class="subject2">Personalization</th>
							<td colspan="3" class="general">
								<span class="radiowrap">
									<input type="radio" id="single" name="personalize" value="1" class="radio" <?php echo ($dataProd["personalize"]=="1")?"checked":null?>/>
									<label for="single">Single Item</label>
								</span>
								<span class="radiowrap">
									<input type="radio" id="bulk" name="personalize" value="2" class="radio" <?php echo ($dataProd["personalize"]=="2")?"checked":null?>/>
									<label for="bulk">Bulk Item</label>
								</span>
						 	<input type="checkbox" name="personalize" value="1" <?php echo ($dataProd["personalize"]=="1")?"checked":null?>> 
							</td>
						</tr>						
					<!--	<tr class="thin_border_bottom">
							<th class="subject2">Fee for Personalization</th>
							<td colspan="3" class="general">
								$ <input type="text" name="Edit_FeeForPersonalization" value="<?php echo $dataProd["FeeForPersonalization"]; ?>"/>
								&nbsp; (Fee added to the above price for ironing customer's personal name and number on it.  Do not add a $ sign.)
							</td>
						</tr>
<?php // if($dataProd["League"]=="English Premier League ")?>						
						<tr class="thin_border_bottom">
							<th class="subject2">Fee for Attaching Emblems</th>
							<td colspan="3" class="general">
								$ <input type="text" name="Edit_FeeForAttachingEmblems" value="<?php echo $dataProd["FeeForAttachingEmblems"]; ?>"/>
								&nbsp; (Fee added to the above price for attaching league emblems on both sleeves.  Do not add a $ sign.)
							</td>
						</tr>-->
<?php //}?>
						<tr class="thin_border_bottom">
							<th class="subject2">Weight <span class="redstar">*</span></th>
							<td colspan="5" class="general">&nbsp;
								<input type="text" name="Edit_Weight_Pounds" value="<?php echo $dataProd["Weight_Pounds"]; ?>" size="7" maxlength="7"/> 
								(Pounds)
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Search Key</th>
							<td colspan="5" class="general">(Meta Tag : Separate tags with commas)<br/>
								<textarea name="Edit_SearchEngineTags" rows="4"
									style="margin-left: 0px; margin-right: 0px; width: 99%;"><?php echo $dataProd["searchEngineTags"]; ?></textarea>
							</td>
						</tr>
						
						<!--<tr class="thin_border_bottom">
							<th class="subject2">Free Shipping</th>
							<td colspan="3" class="general">
								<input type="checkbox" name="Free_Shipping" value="Y" <?php echo ($dataProd["FreeShipping"]=="Y")?"checked":null?>>
							</td>
						</tr>-->
						<tr class="thin_border_bottom">
							<th class="subject2">Tax</th>
							<td colspan="5" class="general">
								<!--<input type="checkbox" name="IsTaxable" value="Y" <?php echo ($dataProd["IsTaxable"]=="N")?null:"checked"?>>-->
								<input type="radio" name="IsTaxable" value="Y" <?php if($dataProd["IsTaxable"]=="Y") echo "checked"?>>Enable&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="IsTaxable" value="N" <?php  if(($dataProd["IsTaxable"]=="N") or ($dataProd["IsTaxable"]=="") )  echo "checked"?>>Disable 
											
							</td>
						</tr>
						
						<!--<tr class="thin_border_bottom">
							<th class="subject2">Back-order item? <span class="redstar">*</span></th>
							<td colspan="3" class="general">
								<input type="checkbox" name="Edit_IsThisBackOrderItem" value="Y" <?php echo ($dataProd["IsThisBackOrderItem"]=="Y")?"checked":null?>>
								&nbsp;(Select Yes only if this item is available for future order or back-order.)
							</td>
						</tr>
						<tr class="thin_border_bottom" style="display:none;">
							<th class="subject2">This product is for <span class="redstar">*</span></th>
							<td colspan="5" class="general">
								<select name="Edit_ForMenOrWomen">
									<option value="">Select :</option>
									<?php 
										$kindVal = array("Toddlers","Kids Boys","Kids Girls","Kids","Youth Boys","Youth Girls","Youth",
												"Kids and Youth","Intermediate","Youth and Adults","Men","Women","Girls and Women","Adults","All");
										$kindName = array("Toddlers","Kids Boys","Kids Girls","Kids (Boys & Girls)","Youth Boys","Youth Girls",
												"Youth (Boys & Girls)","Kids and Youth (Boys &Girls)","Intermediate (Between Youth and Adults)",
												"Youth & Adults","Adult Men","Adult Women","Girls and Women","Adults (Men & Women)","All Ages & Sexes");
										for($i=0;$i<=14;$i++){
											echo "<option value=\"".$kindVal[$i]."\"";
											if($Edit_ForMenOrWomen==$kindVal[$i]){
												echo "selected";
											}elseif($dataProd["ForMenOrWomen"]==$kindVal[$i]){
												echo "selected";
											}
											echo ">&nbsp; ".$kindVal[$i]."</option>";
										}
									?>
								</select>
							</td>
						</tr>-->

						<?php 
							echo "<tr class=\"thin_border_bottom\">";
							echo "<th class=\"subject2\">Detail Image</th>";
							for($i=1; $i<=5; $i++){
								
									echo "<td style=\"border:1px solid #BBB;padding-left:10px\"> ".$i."<br>";
									if($act=="view"){
										if ($dataProd["Picture$i"]!="") {
											echo "<div >";
											
											echo "<a class=\"ajax\" href=\"/Images_Products/".$dataProd["Picture$i"]."\">";
											echo "<img src=\"/Images_Products/".$dataProd["Picture$i"]."\" width=\"60\"/></a><br>";
											if ($i>0) echo "<input type=\"button\" onclick=\"delimg('Picture$i|".$dataProd["ProductID"]."')\" id=\"btn-remove1_$i\"  value=\"Del\"  >";
											else echo "<span style=\"margin-right:21px\"></span>";
											echo "</div>";
										}
									}								
								echo "<br>";
								echo "<input type=\"FILE\" size=\"45\" name=\"Picture{$i}\" id=\"Picture".$i."\" value=\"".$dataProd["Picture".$i]."\" style=\"width: 160px;height:100px;border: 3px dashed #ccc;\" onchange=\"ajaxUpload(this.form);\"/>";  
								if($i==1){
									//echo "<br>&nbsp;(<font color=\"blue\"><b>Important:</b> </font> ";
									//echo "Thumbnail images of products that customers first see are from this picture.)";
								}
								echo "</td>";
								/*if ($i==5)
								echo "</tr><tr class=\"thin_border_bottom\"><th class=\"subject2\">Image Detail</th>";*/		
							?>
							<?php		
							}
						echo "</tr>";
						?>

						
						
						
						
						<!--<tr class="thin_border_bottom">
							<th class="subject2">Colors <span class="redstar">*</span></th>
							<td colspan="5" class="general">
								<a href="#" onClick="showStuff('ColorsAvailable'); return false;" class="red">Show</a>
								<a href="#" onClick="hideStuff('ColorsAvailable'); return false;" class="red">Hide</a>
								<?php
									echo "Search:&nbsp<input type=\"text\" id=\"colorkey\" name=\"colorkey\" ><br/>";
									?>
								<span id="ColorsAvailable" style="display: none;">
									
									<table width="99%" border="0">
										
										<tr>
											<td >
<?php 
	
	echo "<input type=\"hidden\" id=\"PColorIDs\" value=\"".$dataProd["ProductID"]."\">";

	$strSQL1 = "SELECT * FROM Products WHERE ProductID=".$dataProd["ProductID"];
	$DBp2->query($strSQL1);

	$datapp = $DBp2->fetch_array($DBp2->res);
	
	
if($datapp["ColorIDs"]!="")
{
	$strSQL2 = "SELECT * FROM Colors WHERE ColorID in(".$datapp["ColorIDs"].") and IsActive = 'Y' ORDER BY Color ASC";
//echo $strSQL2;
	$DBp3->query($strSQL2);
	$ColorNum = 0;
	echo "<tr><td><table>";
	while ($datap3 = $DBp3->fetch_array($DBp3->res)){
		if($ColorNum%4==0){
			echo "</tr><tr>";
		}
		echo "<td><input type=\"checkbox\" id=\"colorchk_". $datap3["ColorID"] ."\" onclick=\"colorchk(". $datap3["ColorID"] .")\" name=\"CheckedColorID[]\" value=\"" . $datap3["ColorID"] . "\"";
		echo "checked";
				$temp = "style=\"font-weight: bold; color: #0000ff;\"";
		echo " /><span {$temp}> " . $datap3["Color"] . "</span></td>";

		$ColorNum++;
	}
	echo "</tr></table></td></tr>";
		
}
	
	if($datapp["ColorIDs"]=="")
	$strSQL3 = "SELECT * FROM Colors WHERE  IsActive = 'Y' ORDER BY Color ASC";
	else
	$strSQL3 = "SELECT * FROM Colors WHERE ColorID Not in(".$datapp["ColorIDs"].") and IsActive = 'Y' ORDER BY Color ASC";
	
	$DBp4->query($strSQL3);

	//$strSQL = "SELECT * FROM Colors WHERE IsActive = 'Y' ORDER BY Color ASC";
	//$DB->query($strSQL);
	$ColorNum = 0;
	echo "<tr><td><span id=\"x11\"><table><tr>";
	while ($datap4 = $DBp4->fetch_array($DBp4->res)){
		if($ColorNum%4==0){
			echo "</tr><tr>";
		}
		echo "<td><input type=\"checkbox\" id=\"colorchk_". $datap4["ColorID"] ."\" onclick=\"colorchk(". $datap4["ColorID"] .")\" name=\"CheckedColorID[]\" value=\"" . $datap4["ColorID"] . "\"";
		/*$tmpArray = explode(",",$dataProd["ColorIDs"]);
		$temp = "";
		for($i=0;$i<=count($tmpArray);$i++){
			if($tmpArray[$i]==$data["ColorID"]){
				echo "checked";
				$temp = "style=\"font-weight: bold; color: #0000ff;\"";
			}
		}*/
		echo " /><span > " . $datap4["Color"] . "</span></td>";

		$ColorNum++;
	}
	if($ColorNum%4==0){
		echo "</tr>";
	}elseif($ColorNum%4==1){
		echo "<td colspan=\"3\"></td></tr>";
	}elseif($ColorNum%4==2){
		echo "<td colspan=\"2\"></td></tr>";
	}elseif($ColorNum%4==3){
		echo "<td></td></tr>";
	}
	echo "</td></tr></table></span><tr><td colspan=\"4\"><a href=\"#\" onClick=\"hideStuff('ColorsAvailable'); return false;\" class=\"red\">Hide</a></td></tr>";
/*
	$strSQL = "SELECT * FROM Colors WHERE IsActive = 'Y' ORDER BY Color ASC";
	$DB->query($strSQL);
	echo "Search color :&nbsp;&nbsp;<input type=\"text\" id=\"searchkey\" name=\"searchkey\" ><br/>";
	echo "<select size=\"10\" style=\"height: 100px;\"  id=\"AddColorID\" name=\"AddColorID\"  >";
	while ($data = $DB->fetch_array($DB->res)){
		
		echo "<option value=\"". $data["ColorID"] ."\" >". $data["Color"] ."</option>";
	}
	echo " </select>";
	*/
	
	
	
?>
										</td>
										</tr>
									</table>
								</span>
							</td>
						</tr>
<!----------------------------------------------------------------------------------------------------------->
<tr class="thin_border_bottom">
		<th class="subject2">Colors <span class="redstar">*</span></th>
		<td colspan="5" class="general">
			<?php
				echo "<table width=\"99%\" border=\"0\">";
				echo "<tr><td ><input type=\"hidden\" id=\"pcolorid\" name=\"pcolorid\" value=\"". $dataProd["ColorIDs"]."\"></td><td width=\"300px;\">";
				$strSQLc = "SELECT * FROM Colors WHERE IsActive = 'Y' ORDER BY Color ASC";
				$DBc = new myDB;
				$DBc->query($strSQLc);
				echo "Search:&nbsp<input type=\"text\" id=\"searchkey\" name=\"searchkey\" ><br/>";
				echo "<select size=\"10\" style=\"height: 200px;width: 205px;margin-top: 10px;margin-bottom: 10px;margin-left: 45px;\"  id=\"AddColorID\" name=\"AddColorID\"  >";
				while ($datac = $DBc->fetch_array($DBc->res)){
					
					echo "<option value=\"". $datac["ColorID"] ."\" >". $datac["Color"] ."</option>";
				}
				echo " </select>";
				echo "</td><td >=><br><=</td><td>";
				//$SQL1c= "SELECT a.ProductColor,b.Color FROM TProductColors a, Colors b WHERE a.ColorID=b.ColorID and a.ProductID=".$dataProd["ProductID"]." ORDER BY b.Color ASC";
				$SQL1c = "SELECT * FROM Colors WHERE ColorID in(".$datapp["ColorIDs"].") and IsActive = 'Y' ORDER BY Color ASC";
				//$SQL1c = "SELECT ProductColor, Color FROM ProductColors WHERE ProductID=".$dataProd["ProductID"]." ORDER BY Color";
				$DB1c = new myDB;
				$DB1c->query($SQL1c);
				//echo $SQL1c;
				echo "Selected Color&nbsp;&nbsp;<input  type=\"button\" value=\"Clear\" id=\"ClearDel\"><br/>";
				echo "<select size=\"10\" style=\"height: 200px;width: 205px;margin-top: 13px;margin-bottom: 10px;margin-left: 45px;\"  id=\"DelColorID\" name=\"DelColorID\"  >";
				while ($data1c = $DB1c->fetch_array($DB1c->res)){
					
					echo "<option value=\"". $data1c["ProductColor"] ."\" >". $data1c["Color"] ."</option>";
				}
				echo " </select>";
				echo "</td><td><input type=\"hidden\" name=\"chkidx\" id=\"chkidx\" value=\"".$datapp["ColorIDs"]."\"></td>";
				echo "</tr></table>";
				?>
		</td>
		</th>
</tr>
						
						<script type="text/javascript">
						
						$('#Edit_PackChartID').click(function() {
						var PackChartID=$('#Edit_PackChartID').val();
						//alert('xx'+PackChartID);
							if(PackChartID!='0')
							{
								$.ajax({
										async:false, type:"post", dataType:"json", url:"pickpack.php",
										data:{"mode":"packqty","packid":PackChartID},
										success:function(d) {
											if (d) {
												
												$('#PrepackQuantity').val(d.colors[0].scode);	
												}
											
										}
								});						
							}
							else
							$('#PrepackQuantity').val(0);
						});

						$('#AddColorID').click(function() {
							
							var colorid = $('#AddColorID').val();
							var pcolorid = $('#pcolorid').val();
							var chkidx = $('#chkidx').val();
							var productid = $('#proID').val();
							var mode='add1';
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickcolor.php",
											data:{"mode":mode,"colorid":colorid,"pcolorid":pcolorid,"chkidx":chkidx,"productid":productid},
											success:function(d) {
												if (d) {
													
													var select = $("#DelColorID");
													select.children().remove();
													for(var i=0; i<d.colors.length; i++) {
														select.append("<option value="+d.colors[i].scode+">"+d.colors[i].sname+"</option>");
														$('#chkidx').val(d.colors[i].x);	
													}
												}
											}
										});
									
						});
						$('#DelColorID').click(function() {
							var delcolorid = $('#DelColorID').val();
							var productid = $('#proID').val();
							var mode='del1';
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickcolor.php",
											data:{"mode":mode,"delcolorid":delcolorid,"productid":productid},
											success:function(d) {
												if (d) {
														//alert(d.colors.length);
														
															
															var select = $("#DelColorID");
															select.children().remove();
															for(var i=0; i<d.colors.length; i++) {
																select.append("<option value="+d.colors[i].scode+">"+d.colors[i].sname+"</option>");
																
																//alert(d.colors[i].x);
																$('#chkidx').val(d.colors[i].x);				
															}
															if(d.colors.length==0)
															$('#chkidx').val('');

												}
												
												
											}

										});
									
						});
						
						$('#ClearDel').click(function() {
							var productid = $('#proID').val();
							var mode='delall';
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickcolor.php",
											data:{"mode":mode,"productid":productid},
											success:function(d) {
												if (d) {
														//alert(d.colors.length);
															var select = $("#DelColorID");
															select.children().remove();
															
															if(d.colors.length==0)
															$('#chkidx').val('');
												}
											}

										});
									
						});

						$('#searchkey').keyup(function() {
							var kkeyword = $('#searchkey').val();
							if (kkeyword.length>0)
							{
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickcolor.php",
											data:{"mode":"search","keyword":kkeyword},
											success:function(d) {
												if (d) {
													var select = $("#AddColorID");
													select.children().remove();
													for(var i=0; i<d.colors.length; i++) {
														select.append("<option value="+d.colors[i].scode+">"+d.colors[i].sname+"</option>");
														
														
													}
													
												}
											}
										});
							}
							else
							{
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickcolor.php",
											data:{"mode":"nosearch"},
											success:function(d) {
												if (d) {
													var select = $("#AddColorID");
													select.children().remove();
													for(var i=0; i<d.colors.length; i++) {
														select.append("<option value="+d.colors[i].scode+">"+d.colors[i].sname+"</option>");
														
													}
												}
											}
										});
							}
						});	
						
						$('#sizekey').keyup(function() {
							var kkeyword = $('#sizekey').val();
								kkeyword.trim();
							if (kkeyword.length>0)
							{
								$.ajax({
											async:false, type:"post", dataType:"json", url:"picksize.php",
											data:{"mode":"search","keyword":kkeyword},
											success:function(d) {
												if (d) {
													var select = $("#Edit_SizeChartID");
													select.children().remove();
													for(var i=0; i<d.sizes.length; i++) {
														select.append("<option value="+d.sizes[i].scode+">"+d.sizes[i].sname+"</option>");
														
													}
												}
											}
										});
							}
							else if(kkeyword.length==0)
							{
								$.ajax({
											async:false, type:"post", dataType:"json", url:"picksize.php",
											data:{"mode":"nosearch","keyword":kkeyword},
											success:function(d) {
												if (d) {
													var select = $("#Edit_SizeChartID");
													select.children().remove();
													for(var i=0; i<d.sizes.length; i++) {
														select.append("<option value="+d.sizes[i].scode+">"+d.sizes[i].sname+"</option>");
														
													}
												}
											}
										});
							}	
						});	
						
						
						$('#packkey').keyup(function() {
							var kkeyword = $('#packkey').val();
							
							kkeyword.trim();
							if (kkeyword.length>0)
							{
							//alert('ttt');
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickpack.php",
											data:{"mode":"search","keyword":kkeyword},
											success:function(d) {
												if (d) {
													var select = $("#Edit_PackChartID");
													select.children().remove();
													for(var i=0; i<d.packs.length; i++) {
														select.append("<option value="+d.packs[i].scode+">"+d.packs[i].sname+"</option>");
														
													}
												}
											}
										});
							}
							else if (kkeyword.length==0)
							{
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickpack.php",
											data:{"mode":"nosearch","keyword":kkeyword},
											success:function(d) {
												if (d) {
													var select = $("#Edit_PackChartID");
													select.children().remove();
													for(var i=0; i<d.packs.length; i++) {
														select.append("<option value="+d.packs[i].scode+">"+d.packs[i].sname+"</option>");
														
													}
												}
											}
										});
							}
						});	
						
						$('#vendorkey').keyup(function() {
							var kkeyword = $('#vendorkey').val();
							
							kkeyword.trim();
							if (kkeyword.length>=3)
							{
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickvendor.php",
											data:{"mode":"search","keyword":kkeyword},
											success:function(d) {
												if (d) {
													var select = $("#Edit_BrandName1");
													select.children().remove();
													for(var i=0; i<d.vendor.length; i++) {
														select.append("<option value="+d.vendor[i].scode+">"+d.vendor[i].sname+"</option>");
														
													}
												}
											}
										});
							}
							else if (kkeyword.length==0)
							{
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickvendor.php",
											data:{"mode":"nosearch","keyword":kkeyword},
											success:function(d) {
												if (d) {
													var select = $("#Edit_BrandName1");
													select.children().remove();
													for(var i=0; i<d.vendor.length; i++) {
														select.append("<option value="+d.vendor[i].scode+">"+d.vendor[i].sname+"</option>");
														
													}
												}
											}
										});
							}		
						});
						
						$('#colorkey').keyup(function() {
							var kkeyword = $('#colorkey').val();
							var productid = $('#proID').val();
							var PColorIDs =$('#PColorIDs').val();
							kkeyword.trim();
							//alert(kkeyword);
							if (kkeyword.length>=1)
							{
								$('#ColorsAvailable').css('display','block');
								$.ajax({
										async:false,
										type:"post",
										dataType:"html",
										url:"ajaxtool.php",
										data:{"action":"color","keyword":kkeyword,"productid":productid,"PColorIDs":PColorIDs},
										success: function(data) {
											$('#x11').html(data);
											 
										}
									});
							}
							else if (kkeyword.length==0)
							{
								$.ajax({
										async:false,
										type:"post",
										dataType:"html",
										url:"ajaxtool.php",
										data:{"action":"nocolor","keyword":kkeyword,"productid":productid},
										success: function(data) {
											$('#x11').html(data);
											 
										}
									});
							}
							
						});
						</script>
								
	
			<?php 
							$DBx = new myDB();
							$DBchk = new myDB();
							echo "<tr class=\"thin_border_bottom\">";
							echo "<th class=\"subject2\">Color Images</th>";
							$tmpArray = explode(",",$dataProd["ColorIDs"]);
							$x=0;
							for($i=6; $i<=25; $i++){
									$strSQLx = "SELECT * FROM Colors WHERE ColorID = ".$tmpArray[$x];
						
									$DBx->query($strSQLx);
									$datax = $DBx->fetch_array($DBx->res);


									echo "<td style=\"border:1px solid #BBB;padding-left:10px\">".$i.".".$datax["Color"]."&nbsp;&nbsp;<input type=\"checkbox\" id=\"colorchk\" name=\"colorchk[]\" value=\"".$datax["Color"]."\""; 

									$strSQLchk = "SELECT * FROM TProductColors WHERE ProductID=".$dataProd["ProductID"]." and Color = '".$datax["Color"]."'";
									$DBchk->query($strSQLchk);

									while ($datachk = $DBchk->fetch_array($DBchk->res)){
										$Instock=$datachk["Instock"];
									}
									
									if($Instock=="Y" && $datax["Color"]!="")
									echo "checked"; 

									echo "/><br>";
									if($act=="view"){
										if ($dataProd["Picture$i"]!="") {
											echo "<div >";
											echo "<a class=\"ajax\" href=\"/Images_Products/".$dataProd["Picture$i"]."\">";
											echo "<img src=\"/Images_Products/".$dataProd["Picture$i"]."\" width=\"60\"/></a><br>";
											
											
											if ($i>5) echo "<input type=\"button\" onclick=\"delimg('Picture$i|".$dataProd["ProductID"]."')\" id=\"btn-remove1_$i\"  value=\"Del\"  >";
											else echo "<span style=\"margin-right:21px\"></span>";


											/*if ($i>6) echo "<input type=\"button\" id=\"btn-remove1\" class=\"btn-remove\" title=\"delete\" value=\"Picture$i|".$dataProd["ProductID"]."\" >";
											else echo "<span style=\"margin-right:21px\"></span>";*/
											echo "</div>";
										}
								$x=$x+1;
									}								
								echo "<br>";
								echo "<input type=\"FILE\" size=\"45\" name=\"Picture{$i}\" id=\"Picture".$i."\" value=\"".$dataProd["Picture".$i]."\" style=\"width: 160px;height:100px;border: 3px dashed #ccc;\" onchange=\"ajaxUpload(this.form);\"/>";
								if($i==1){
									//echo "<br>&nbsp;(<font color=\"blue\"><b>Important:</b> </font> ";
									//echo "Thumbnail images of products that customers first see are from this picture.)";
								}
								echo "</td>";
								if ($i==10)
								echo "</tr><tr class=\"thin_border_bottom\"><th class=\"subject2\">&nbsp;</th>";
								if ($i==15)
								echo "</tr><tr class=\"thin_border_bottom\"><th class=\"subject2\">&nbsp;</th>";
								if ($i==20)
								echo "</tr><tr class=\"thin_border_bottom\"><th class=\"subject2\">&nbsp;</th>";
								?>
							<?php		
							}
						echo "</tr>";
						?>
						</tbody>
				</table>
				<p class="general_c , btns">
					<?php 
					if(!$act){	//nothing selected
						echo "<div style=\"position:fixed;left:170px;top:335px;\">";
						echo "<input type=\"button\" name=\"button\" onClick=\"return AddOrUpdateConfirm(this.form);\" value=\"Save\"/>";
						echo "</div>";
						echo "<input type=\"button\" name=\"button\" onClick=\"return AddOrUpdateConfirm(this.form);\" value=\"Save\"/>";
						echo "<input type=\"hidden\" name=\"action\" value=\"add\"/>";
					}
					else{		//someting selected
						echo "<div style=\"position:fixed;left:170px;top:335px;\">";
						echo "<input type=\"button\" name=\"button\" onClick=\"return AddOrUpdateConfirm(this.form);\" value=\"Save\"/>";
						echo "</div>";
						echo "<input type=\"hidden\" name=\"action\" value=\"update\"/>";
					}
					?>
					<!--<input type="submit" name="btnReset" onClick="javascript:this.form.reset();return false;"value="Reset"/>-->
		 		</p>		
			</form>
			<?php }?>
			<script type="text/javascript">
				$(document).ready(function() {
				
					
				
				 $("#ss_from").jqxDateTimeInput({formatString: 'yyyy-MM-dd'});
				 $("#ss_to").jqxDateTimeInput({formatString: 'yyyy-MM-dd'});
					$('#ss_from').change(function() {
						$('#s_from').val($('#ss_from').val());
					});
					$('#ss_to').change(function() {
						$('#s_to').val($('#ss_to').val());
					});

				//$('.ajax').colorbox();
					
					var cat1= $('#s_cat1').val();
					if (cat1>0)
					{
						$('#expand_'+cat1).css('display','none');
						$('#coll_'+cat1).css('display','block');
						$('#cat2_'+cat1).css('display','block');

						$('#texpand_'+cat1).css('display','none');
						$('#tcoll_'+cat1).css('display','block');
						$('#tcat2_'+cat1).css('display','block');
					}	
					
				})
			</script>
		</div>
<?php
		if($action!='addNew'){
?>
	
		<div id="sub3">
			<form name="SearchItems_Form" method="get" action="Manage_Products.php">
				<table>
					<tr class="subject_border_top thin_border_bottom" >
						<th class="subject2">Status</th>
						<td class="general">
							<input type="radio" name="s_status"  value="Y" <?php if($s_status=="Y") echo "checked";?>/>Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="s_status"  value="N" <?php if($s_status=="N") echo "checked";?>/>Inactive

						</td>
						<td rowspan="6" class="general , btns" style="border: 1px solid #DDD;">
							<input style="margin-left:20px;margin-right:-40px" type="button" value="Search" onclick="document.SearchItems_Form.submit();" />
							<input type="hidden" name="action" value="search"/>
							<br><br><a class="button" href="Manage_Products.php" style="margin-left:20px;margin-right:-40px;background: #F89808;
border: 0;
font: normal 12px/26px Arial, Helvetica, sans-serif;
color: white;
text-transform: uppercase;
text-align: center;
white-space: nowrap;
overflow: visible;
cursor: pointer;
padding: 5px 25px;
height: 36px;">Reset</a>
						</td>
					</tr>
					<tr class="thin_border_bottom">
						<th class="subject2">Category</th>

						<td class="general">
						
						<div class="prod-search">
							<label for="s_cat1">Main Category</label>
							<select name="ss_cat1" id="ss_cat1" style="margin-left: 10px;margin-top: 5px;">
								<option value="">Select:</option>
								<?php 
									if($aid) {
										$DB->query("SELECT Cat1ID, Cat2ID FROM Products WHERE ProductID=".$aid);
										list($ss_cat1, $ss_cat2) = $DB->fetch_array($DB->res);
									}
									$strSQL = "SELECT * FROM Category1 ORDER BY Cat1SortNo ASC";
									$DB->query($strSQL);
									while ($data = $DB->fetch_array($DB->res)){
										echo "<option value=\"". $data["Cat1ID"] ."\"";
										if($ss_cat1==$data["Cat1ID"]){
											echo "selected";
										}
										echo "> " . $data["Cat1Name"] . "</option>";
									}
								?>
							</select>
						</div>
						<div class="prod-search" id="prod-model">
							<label for="s_cat2">Sub Category</label>
							<select id="ss_cat2" name="ss_cat2"  style="margin-left: 10px;margin-top: 5px;">
								<option value="">Select:</option>
								<?php
									
									if($ss_cat1!=null){
										$strSQL = "SELECT * FROM Category2 WHERE Cat1ID = " . $ss_cat1 . " ORDER BY Cat2SortNo ASC";
										$DB->query($strSQL);
										while ($data = $DB->fetch_array($DB->res)){									
											echo "<option value=\"" . $data["Cat2ID"] . "\"";
											if($ss_cat2==$data["Cat2ID"]){
												echo "selected";
											}
											echo ">" . $data["Cat2Name"] . "</option>";
										}
									}
									
								?>
							</select>
						</div>
						</td>
						
					</tr>
						<!--<td class="subject2">Vendor</td>-->
						<!--<td class="subject2">Product ID</td>-->
					<tr class="thin_border_bottom">
						<th class="subject2">Style #</th>
						<td><input type="text" name="s_styleno" id="s_styleno" value="<?php echo $s_styleno?>" style="width: 90%;"/></td>

					</tr>
					<tr class="thin_border_bottom">
						<th class="subject2">Price</th>
						<td class="general">
							$<input type="text" name="s_fprice" id="s_fprice" value="<?php echo $s_fprice?>" style="width: 30%;"/>
							&nbsp;&nbsp;~&nbsp;&nbsp;$<input type="text" name="s_tprice" id="s_tprice" value="<?php echo $s_tprice?>" style="width: 30%;"/>
						</td>
					</tr>
					<tr class="thin_border_bottom">
						<th class="subject2">Product Name</th>
						<td class="general"><input type="text" name="s_name" id="s_name" value="<?php echo $s_name?>" style="width: 90%;"/></td>
					</tr>
					<tr class="thin_border_bottom">
						<th class="subject2">Period</th>
						<td class="general"><input type="hidden" name="s_from" id="s_from" value="<?php echo $s_from?>" style="width: 30%;"/>
						<input type="hidden" name="s_to" id="s_to" value="<?php echo $s_to?>" style="width: 30%;"/>
					<div id='ss_from' style="float:left;"></div><div id='ss_to' ></div></td>
					</tr>
					
					<tr class="thin_border_bottom">
					<th class="subject2">Filter:</th>
					<td class="general">
						<?php
						
						$strSCHSQL = (" Where ");	
	
						if($s_status != null){
							$strSCHSQL .= (" IsActive='" . $s_status . "' AND");
						}
						if($ss_cat1 != null){
							$strSCHSQL .= (" Cat1ID=" . $ss_cat1 . " AND");
						}
						if($ss_cat2 != null){
							$strSCHSQL .= (" Cat2ID=" . $ss_cat2 . " AND");
						}
						if($s_fprice != null){
							$strSCHSQL .= (" UnitPriceOnSale>=" . $s_fprice . " AND UnitPriceOnSale<=" . $s_tprice . " AND");
						}
						if($s_from != null){
							$strSCHSQL .= (" DateTimeLastModified>='" . $s_from . "' AND DateTimeLastModified<='" . $s_to . "' AND");
						}
						if($s_styleno != null){
							$strSCHSQL .= (" StyleNo LIKE '%" . $s_styleno . "%' AND");
						}
						if($s_name != null){
							$strSCHSQL .= (" ProductName LIKE '%" . $s_name . "%' AND");
						}
						$strSCHSQL .= " 1=1";
						$strSQLco = "SELECT count(*) AS cnt FROM Products ".$strSCHSQL;
						$DBCO->query($strSQLco);
						//echo $strSQLco;
						while ($dataco = $DBCO->fetch_array($DBCO->res)){
							$fcnt= $dataco["cnt"];
						}

						if($s_status!=null){
						echo "Status:".$s_status."&nbsp;&nbsp;";
						}
						if($ss_cat1!=null){
						
							$strSQL = "SELECT * FROM Category1 WHERE Cat1ID=".$ss_cat1;
										$DBca->query($strSQL);
										$dataca = $DBca->fetch_array($DBca->res);


							echo "Category1:".$dataca["Cat1Name"]."&nbsp;&nbsp;";
						}
						if($ss_cat2!=null){
							$strSQL = "SELECT * FROM Category2 WHERE Cat2ID=".$ss_cat2;
										$DBca2->query($strSQL);
										$dataca2 = $DBca2->fetch_array($DBca2->res);


							echo "Category2:".$dataca2["Cat2Name"]."&nbsp;&nbsp;";
						}
						if($s_styleno != null){
						echo "Style no:".$s_styleno."&nbsp;&nbsp;";
						}
						if($s_name != null){
						echo "Product Name:".$s_name."&nbsp;&nbsp;";
						}
						if($s_fprice != null){
						echo "Price:$".$s_fprice."&nbsp;~&nbsp;$".$s_tprice;
						}
						if($s_from != null){
						echo "Period:".$s_from."&nbsp;~&nbsp;".$s_to;
						}
						?>
					</td>
					<td class="general">
					Count:<?php echo $fcnt?>
					</td>
					</tr>	
						<!--<td class="subject2">Product Description</td>
						<!--<td class="subject2">Player</td>
						<td class="subject2">Club</td>
						<td class="subject2">League</td>
						<td class="subject2">Country</td>
						<td class="subject2">Search Engine Tags</td>
						<td class="subject2">Free Shipping</td>
					</tr>
						<!--<td class="general">
							<input type="text" name="s_brand" id="s_brand" value="<?php echo $s_brand?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_idx" id="s_idx" value="<?php echo $s_idx?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_styleno" id="s_styleno" value="<?php echo $s_styleno?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_styleno" id="s_fprice" value="<?php echo $s_fprice?>" style="width: 30%;"/>
							<input type="text" name="s_styleno" id="s_tprice" value="<?php echo $s_tprice?>" style="width: 30%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_name" id="s_name" value="<?php echo $s_name?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_name" id="s_from" value="<?php echo $s_from?>" style="width: 30%;"/>
							<input type="text" name="s_name" id="s_to" value="<?php echo $s_to?>" style="width: 30%;"/>
						</td>
						<td class="general">
							<input type="button" value="Search" onclick="document.SearchItems_Form.submit();" />
							<input type="hidden" name="action" value="search"/>
						</td>
						<td class="general">
							<input type="text" name="s_desc" id="s_desc" value="<?php echo $s_desc?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_player" id="s_player" value="<?php echo $s_player?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_club" id="s_club" value="<?php echo $s_club?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_league" id="s_league" value="<?php echo $s_league?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_country" id="s_country" value="<?php echo $s_country?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_tags" id="s_tags" value="<?php echo $s_tag?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<select type="text" name="s_freeship" id="s_freeship" style="width: 90%;">
								<option value="" selected>All</option>
								<option value="0">No</option>
								<option value="1">Yes</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="11" class="general , btns">
							<input type="button" value="Search" onclick="document.SearchItems_Form.submit();" />
							<input type="hidden" name="action" value="search"/>
						</td>
					</tr>-->
				</table>
			</form>
			
			<form name="searchItems" method="get" action="Manage_Products.php">
<?php
	if($action == "search"){
?>
				<table style="width: 100%;">
					<tr class="subject_border_top">
						<td class="subject1_2">Searched Items</td>
					</tr>
<?php	
	$strSCHSQL = (" Where ");
	

	/*if($s_brand != null){
		$strSCHSQL .= (" BrandName LIKE '%" . $s_brand . "%' AND");
	}
	if($s_idx != null){
		$strSCHSQL .= (" ProductID LIKE '%" . $s_idx . "%' AND");
	}*/
	
	if($s_status != null){
		$strSCHSQL .= (" IsActive='" . $s_status . "' AND");
	}

	if($ss_cat1 != null){
		$strSCHSQL .= (" Cat1ID=" . $ss_cat1 . " AND");
	}
	if($ss_cat2 != null){
		$strSCHSQL .= (" Cat2ID=" . $ss_cat2 . " AND");
	}

	if($s_fprice != null){
		$strSCHSQL .= (" UnitPriceOnSale>=" . $s_fprice . " AND UnitPriceOnSale<=" . $s_tprice . " AND");
	}
    if($s_from != null){
		$strSCHSQL .= (" DateTimeLastModified>='" . $s_from . "' AND DateTimeLastModified<='" . $s_to . "' AND");
	}

	if($s_styleno != null){
		$strSCHSQL .= (" StyleNo LIKE '%" . $s_styleno . "%' AND");
	}
	if($s_name != null){
		$strSCHSQL .= (" ProductName LIKE '%" . $s_name . "%' AND");
	}
	/*
	if($s_desc != null){
		$strSCHSQL .= (" ProductDescription LIKE '%" . $s_desc . "%' AND");
	}
	
	if($s_tags != null){
		$strSCHSQL .= (" serchEnginTags LIKE '%" . $s_tags . "%' AND");
	}*/
	$strSCHSQL .= " 1=1";
//	$strSCHSQL .= " IsActive='Y'";
	
	$strSQL = "SELECT * FROM Products ".$strSCHSQL;
	//echo "<br/>" . $strSQL;
	$strOrd	= " ORDER BY ProductID DESC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$limitProducts = 90;
	$totalpps = ($limitProducts < 0)?1:ceil($numrows/$limitProducts);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $limitProducts * ($pp - 1);
	if ($limitProducts > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$limitProducts}";
?>
<tr>					
						<td class="general_c">
							<input type="button" id="checkall" onclick="return checkedAll3(this.form)" value="Check All Items"/>
							<input type="button" name="button" onclick="return DeactivateCheckedConfirm(this.form);" value="Deactivate Checked Items"/>
							<input type="hidden" name="act" value/>
						</td>
					</tr>
<?php	
	echo "<tr><td><div class=\"product-page-bar\">";
	$linkopt = "ppAI={$ppAI}&ppII={$ppII}";
	$linkopt .= "&s_brand={$s_brand}&s_idx={$s_idx}&s_styleno={$s_styleno}&s_name={$s_name}&s_desc={$s_desc}&s_player={$s_player}&s_club={$s_club}&s_league={$s_league}&s_country={$s_country}&s_tags={$s_tag}&s_freeship={$s_freeship}&action={$action}";
	//if ($ord) $linkopt.="&or=".$ord;
	if (!empty($kw)) $linkopt.="&kw=".$kw;
	listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
	echo "</div></td></tr>";	
	
	echo "<tr><td class=\"general_c\">";

	$DB->query($strSQL);
	while ($data = $DB->fetch_array($DB->res)){
		echo "<div class=\"item_wrapper\">";
		echo "<table width=\"100%\">";
		echo "<tr><td class=\"general_c\">";
?>		
		<input type="checkbox" name="idtocheck[]" id="checklist3" value="<?php echo $data["ProductID"];?>"/>
<?php
//		echo "<input type=\"checkbox\" name=\"CheckedProductID\" value=\"" . $data["ProductID"] . "\"/>";
		echo $data["StyleNo"] ."<br/>";
		echo "$" . $data["UnitPriceOnSale"] ;
		if($data["UnitPriceOnSale"]!=$data["UnitPrice"])
		echo "&nbsp;(<s>$" . $data["UnitPrice"] . "</s>)";
		echo "</td></tr>";
		echo "<tr><td class=\"general_c\">";
		echo "<a href=\"Manage_Products.php?act=view&aid=" . $data["ProductID"] . "&{$linkopt}&pp={$pp}\">";
		if($data["Picture1"]!=null){
			echo "<img src=\"/Images_Products/" . $data["Picture1"] . "\" width=\"110\" height=\"110\" border=\"0\"/>";
		}else{
			echo "<img src=\"/Images_Products/ComingSoon.jpg\" height=\"110\" border=\"0\"/>";
		}
		echo "</a></td></tr>";
		echo "<tr><td class=\"general_c\">";
		echo $data["BrandName"] . "<br/>";
		echo $data["ProductName"] . "<br/>";
		echo "</td></tr></table></div>";
	}
	
	echo ("
					</td>
				</tr>
			</table>			
		");
	}


		echo "</form>

		</div>";
}
?>
<?php
	if($action != "search"){
		if($action!='addNew'){
?>
		<div id="sub4">
			<table>
				<form name="DisplayActiveItems_Form" method="GET" action="Manage_Products.php">
					<input type="hidden" name="ProductID" value=""/> 
				  	<input type="hidden" name="s_cat1" value="<?php echo $s_cat1;?>"/> 
					<input type="hidden" name="s_cat2" value="<?php echo $s_cat2;?>"/> 
					<input type="hidden" name="s_cat3" value="<?php echo $s_cat3;?>"/> 
					<tr class="subject_border_top">
						<td class="subject1_2" style="width: 20%;"></td>
						<td class="subject1_2">Active Items</td>
						<td class="subject1_2" style="width: 60%;">
							<div style="width: 590px; float: right;">
								Order by&nbsp;
								<select name="Display_ActiveItems_By">
									<?php 
										$selVal = array("ProductID","StyleNo","ProductName","BrandName","UnitPrice");
										$selName = array("Product ID","Item No.","Product Name","Brand Name","Unit Price ($)");
										for($i=0;$i<5;$i++){
											echo "<option value=\"".$selVal[$i]."\" ";
											if($selVal[$i]==$Display_ActiveItems_By){
												echo "selected";
											}elseif($selVal[$i]==$display){
												echo "selected";
											}
											echo ">&nbsp; ".$selName[$i]."</option>";
										}
									?>
								</select>&nbsp;
								<select name="Display_ActiveItems_In">
									<?php 
										$selVal = array("DESC","ASC");
										$selName = array("Descending","Ascending");
										for($i=0;$i<2;$i++){
											echo "<option value=\"".$selVal[$i]."\" ";
											if($selVal[$i]==$Display_ActiveItems_In){
												echo "selected";
											}elseif($selVal[$i]==$orderType){
												echo "selected";
											}
											echo ">&nbsp; ".$selName[$i]."</option>";
										}
									?>
								</select>&nbsp;
								<input type="submit" name="DisplayActiveItemsOrderBy" value="Submit"/>
							</div>
						</td>
					</tr>					
				</form>
				<form name="ActiveItems" method="post" action="Manage_Products_action.php">				
					<tr>					
						<td class="general_c" colspan="3">
							<input type="button" id="checkall" onclick="return checkedAll(this.form)" value="Check All Items"/>
							<input type="button" name="button" onclick="return DeactivateCheckedConfirm(this.form);" value="Deactivate Checked Items"/>
							<input type="hidden" name="act" value/>
						</td>
					</tr>
					<tr>
						<td colspan="3">
		<!-- pagenation -->
<?php 
	if($s_cat1!=null){
		$strActSQL = (" AND Cat1ID = " . $s_cat1 . " AND");
		if($s_cat2!=null){
			if($s_cat2!="Select:"){
				$strActSQL .= (" Cat2ID = " . $s_cat2 . " AND");
			}
		}
		$strActSQL .= " 1=1";
	}
	$strSQL = "SELECT * FROM Products Where IsActive = 'Y'" . $strActSQL;
//	echo $Display_ActiveItems_By." ".$Display_ActiveItems_In."<br/>"; 
	if($Display_ActiveItems_By!=null){
		$strSQL .=" ORDER BY ".$Display_ActiveItems_By." ".$Display_ActiveItems_In."";
	}else{
		$strSQL	.= " ORDER BY ProductID DESC";
	}
//	$strSQL = "SELECT * FROM Products Where IsActive = 'Y'" . $strActSQL;
//	echo $strSQL."<br/>";	
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$limitProducts = 90;
	$totalpps = ($limitProducts < 0)?1:ceil($numrows/$limitProducts);
	if ($ppAI < 1 || $ppAI > $totalpps) $ppAI = 1;
	$list_num = $limitProducts * ($ppAI - 1);
	if ($limitProducts > 0) $strSQL .= " LIMIT {$list_num}, {$limitProducts}";
	$DB->query($strSQL);
	echo "<div class=\"product-page-bar\">";
//	$linkopt = "pp={$pp}&ppII={$ppII}";
	$linkopt = "pp={$pp}&ppII={$ppII}&s_cat1={$s_cat1}&s_cat2={$s_cat2}&Display_ActiveItems_By=".$Display_ActiveItems_By."&Display_ActiveItems_In=".$Display_ActiveItems_In;
	//if ($ord) $linkopt.="&or=".$ord;
	if (!empty($kw)) $linkopt.="&kw=".$kw;
	listPages(array("ppAI", $ppAI),PAGEBLOCK,$totalpps,$linkopt);
	echo "</div>";
?>
					</td>
				</tr>
				<tr>
				<td colspan="3">
<?php 
//		echo $strSQL."<br/>";
		while ($data = $DB->fetch_array($DB->res)){
			echo "<div class=\"item_wrapper\">";
			echo "<table width=\"100%\">";
			echo "<tr><td class=\"general_c\">";
			echo "<input type=\"checkbox\" name=\"idtocheck[]\" id=\"checklist\" value=\"" . $data["ProductID"] . "\"/>";
			echo $data["StyleNo"] ."<br/>";
			
			echo "$" . $data["UnitPriceOnSale"];
			if($data["UnitPriceOnSale"]!=$data["UnitPrice"])
			echo " &nbsp;(<s>$" . $data["UnitPrice"] . "</s>)";
			echo "</td></tr>";
			echo "<tr><td class=\"general_c\">";
			echo "<a href=\"Manage_Products.php?act=view&aid=" . $data["ProductID"] . "&Display_ActiveItems_By=".$Display_ActiveItems_By."&Display_ActiveItems_In=".$Display_ActiveItems_In."&pp=".$pp."&ppAI=".$ppAI."&ppII=".$ppII."\">";
			if($data["Picture1"]!=null){
				echo "<img src=\"/Images_Products/" . $data["Picture1"] . "\" height=\"110\" border=\"0\"/>";
			}else{
				echo "<img src=\"/Images_Products/ComingSoon.jpg\" width=\"110\" height=\"110\" border=\"0\"/>";
			}
			echo "</a></td></tr>";
			echo "<tr><td class=\"general_c\">";
			echo $data["BrandName"] . "<br/>";
			echo "<b>".substr($data["ProductName"], 0, 100)."</b>";
			echo "</td></tr></table></div>";
		}
?>
						
						</td>
					</tr>
<!------------------------------------------------------------------------------------>

<!--
		<table>
		<tr class="subject_border_top">
		<td class="subject2" ></td><td class="subject2">Img</td><td class="subject2">Style No</td><td class="subject2">Brand</td><td class="subject2">Name</td><td class="subject2">Price</td><td  class="subject2">Status</td><td class="subject2">User</td>
		</tr>
<?php 
//		echo $strSQL."<br/>";
		
		while ($data = $DB->fetch_array($DB->res)){
			echo "<tr >";
			echo "<td class=\"general\" style=\"width: 100px;\">";
			echo "<input type=\"checkbox\" name=\"idtocheck[]\" id=\"checklist\" value=\"" . $data["ProductID"] . "\"/></td>";
			echo "<td class=\"general\">";
			echo "<a href=\"Manage_Products.php?act=view&aid=" . $data["ProductID"] . "&Display_ActiveItems_By=".$Display_ActiveItems_By."&Display_ActiveItems_In=".$Display_ActiveItems_In."&pp=".$pp."&ppAI=".$ppAI."&ppII=".$ppII."\">";
			if($data["Picture1"]!=null){
				echo "<img src=\"/Images_Products/" . $data["Picture1"] . "\" height=\"110\" border=\"0\"/>";
			}else{
				echo "<img src=\"/Images_Products/ComingSoon.jpg\" width=\"110\" height=\"110\" border=\"0\"/>";
			}
			echo "</a></td>";
			echo "<td class=\"general\">";
			echo $data["StyleNo"] ."</td>";
			echo "<td class=\"general\">";
			echo $data["BrandName"] . "</td>";
			echo "<td class=\"general\">";
			echo substr($data["ProductName"], 0, 100)."</td>";
			echo "<td class=\"general\">";
			echo "$" . $data["UnitPriceOnSale"] . " &nbsp;(<s>$" . $data["UnitPrice"] . "</s>)</td>";
			echo "<td class=\"general\">";
			echo $data["IsActive"] ."</td>";
			echo "<td class=\"general\">";
			echo  $data["AdminID"]."</td>";
			echo "</tr>";
			
			
			
			//echo "</td></tr></table></div>";
		}
		echo "</table>";
?>
-->						
			<!--</td>
			</tr>-->
			</form>			
		</table>
		</div>

		<div id="sub5">	
			<form name="InactiveLists_Form" method="post" action="Manage_Products_action.php">					
				<table>
					<tr class="subject_border_top">
						<td class="subject1_2">Inactive (Deactivated) Items</td>
					</tr>
					<tr>
						<td class="general_c">
							<input type="button" id="checkall" onclick="return checkedAll2(this.form)" value="Check All Items"/>
							<input type="button" name="button" onclick="return ActivateCheckedConfirm(this.form);" value="Active Checked Items"/>
							<input type="button" name="button" onclick="return DeleteCheckedConfirm2(this.form);" value="Delete Checked Items"/>
							<input type="hidden" name="act" value/>
						</td>
					</tr>
					<tr>
						<td>
<?php 
	if($s_cat1!=null){
		$strActSQL = (" AND Cat1ID = " . $s_cat1 . " AND");
		if($s_cat2!=null){
			if($s_cat2!="Select:"){
				$strActSQL .= (" Cat2ID = " . $s_cat2 . " AND");
			}
		}
		$strActSQL .= " 1=1";
	}
	$strSQL = "SELECT * FROM Products Where IsActive = 'N'" . $strActSQL;
	$strOrd	= " ORDER BY ProductID DESC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$limitProducts = 90;
	$totalpps = ($limitProducts < 0)?1:ceil($numrows/$limitProducts);
	if ($ppII < 1 || $ppII > $totalpps) $ppII = 1;
	$list_num = $limitProducts * ($ppII - 1);
	if ($limitProducts > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$limitProducts}";
	$DB->query($strSQL);
//	echo $strSQL;
	$prod_img[] = $data["Picture1"];
	echo "<div class=\"product-page-bar\">";
	$linkopt = "pp={$pp}&ppAI={$ppAI}&s_cat1={$s_cat1}&s_cat2={$s_cat2}";
	//if ($ord) $linkopt.="&or=".$ord;
	if (!empty($kw)) $linkopt.="&kw=".$kw;
	listPages(array("ppII", $ppII),PAGEBLOCK,$totalpps,$linkopt);
	echo "</div>";
?>
						</td>
					</tr>
<!------------------------------------------------------------------------------>
					<tr>
						<td>
							<!-- pagenation -->
<?php 
	while ($data = $DB->fetch_array($DB->res)){?>
							<div class="item_wrapper">
								<table width="100%">
									<tr>
										<td class="general_c">
											<input type="checkbox" name="idtocheck[]" id="checklist2" value="<?php echo $data["ProductID"];?>"/>
											<?php echo $data["StyleNo"];?><br/>
											$<?php echo $data["UnitPriceOnSale"];?> &nbsp;
											<?php if($data["UnitPriceOnSale"]!=$data["UnitPrice"])?>
											(<s>$<?php echo $data["UnitPrice"];?></s>)
										</td>
									</tr>
									<tr>
										<td class="general_c">
											<a href="Manage_Products.php?act=view&aid=<?php echo $data["ProductID"];?>&Display_ActiveItems_By=<?php echo $Display_ActiveItems_By;?>&Display_ActiveItems_In=<?php echo $Display_ActiveItems_In;?>&pp=<?php echo $pp;?>&ppAI=<?php echo $ppAI?>&ppII=<?php echo $ppII;?>">
<?php 											
		if($data["Picture1"]!=null){
			echo "<img src=\"/Images_Products/" . $data["Picture1"] . "\" width=\"110\" height=\"110\" border=\"0\"/>";
		}else{
			echo "<img src=\"/Images_Products/ComingSoon.jpg\" width=\"110\" height=\"110\" border=\"0\"/>";
		}
?>
											</a>
										</td>
									</tr>
									<tr>
										<td class="general_c">
											<?php echo $data["BrandName"];?><br/>
											<b><?php echo substr($data["ProductName"], 0, 100);?></b>
										</td>
									</tr>
								</table>
							</div>
<?php }
?>

					</td>
					</tr>
				</table>				
			</form>
		
		</div>

<?php
		}
	}
?>
<script type="text/javascript">
		
		

		
		function delimg(id){
				  //alert(id);

				  if(confirm("Delete this picture?")) {
								
							var target = id.split("|");
							//alert(target[0]);
							//alert(target[1]);
							$.ajax({
								async:false, type:"post", dataType:"json", url:"Manage_Products_action.php",
								data:{"action":"delPic", "target":target[0], "ProductID":target[1]},
								success:function(result) {
									if(result) location.reload();
								}
							});
				  }
				}

/*
		$('#btn-remove1').click(function() {
						if(confirm("Delete this picture?")) {
							var target = $(this).val().split("|");
							$.ajax({
								async:false, type:"post", dataType:"json", url:"Manage_Products_action.php",
								data:{"action":"delPic", "target":target[0], "ProductID":target[1]},
								success:function(result) {
									if(result) location.reload();
								}
							});
						}
					});	
*/
		
		$('#ss_cat1').click(function() {
			var s_cat1 = $('#ss_cat1').val();
			s_cat1.trim();
			if (s_cat1.length>=0)
			{
				$.ajax({
							async:false, type:"post", dataType:"json", url:"pickcategory.php",
							data:{"mode":"search","s_cat1":s_cat1},
							success:function(d) {
								if (d) {
									var select = $("#ss_cat2");
									select.children().remove();
									for(var i=0; i<d.category.length; i++) {
										select.append("<option value="+d.category[i].scode+">"+d.category[i].sname+"</option>");
										
									}
								}
							}
						});
			}
			

		});

		$('#s_cat1').click(function() {
			var s_cat1 = $('#s_cat1').val();
			s_cat1.trim();
			if (s_cat1.length>=0)
			{
				$.ajax({
							async:false, type:"post", dataType:"json", url:"pickcategory.php",
							data:{"mode":"category","s_cat1":s_cat1},
							success:function(d) {
								if (d) {
									var select = $("#s_cat2");
									select.children().remove();
									for(var i=0; i<d.category.length; i++) {
										select.append("<option value="+d.category[i].scode+">"+d.category[i].sname+"</option>");
										
									}
								}
							}
						});
			}
			

		});
		
</script>		

<?php
	require_once("footer.php"); 
	$CDB->close();
	$DB->close();	//DB close
	$DBC->close();
	$DBCO->close(); 
	$DBC1->close(); 	
	$DBp->close(); 	
	$DBp1->close(); 	
	$DBp2->close(); 	
	$DBp3->close(); 	
	$DBp4->close(); 	
	$DBca->close();	
	$DBca2->close();
?>