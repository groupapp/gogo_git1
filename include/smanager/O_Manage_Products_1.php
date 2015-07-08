<?php 
	require_once("header.php"); 

	$action						= $_REQUEST["action"];
	$ProductID					= $_POST["ProductID"];
//echo $ProductID;
//	$Edit_Country1	= $_POST["Country"];
	$productid_copy				= $_POST["productid_copy"];
	$Edit_IsActive 				= $_POST["Edit_IsActive"];
	$Edit_Cat1ID 				= $_POST["Edit_Cat1ID"];
	$Edit_Cat2ID 				= $_POST["Edit_Cat2ID"];
	$Edit_BrandName1 			= $_POST["Edit_BrandName1"];
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
	
	$s_cat1	= $_GET["s_cat1"];
	$s_cat2	= $_GET["s_cat2"];
	
// Search parameters	
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
	
	$DB 	= new myDB;
	$DBC 	= new myDB;
	$DBC1 	= new myDB;
	$DBp 	= new myDB;
	$DBp1 	= new myDB;
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

<div id="bodywrapper">

	<!-- sideMenu -->
	<div id="navLeft">
		<div style="font: bold 16px/1.2 Palatino Linotype; color: #aaa;">Lemontree
			Events</div>
		<div id="eventCalendarDefault" class="eventCalendar_wrap">
		<?php
		$strSQLc = "SELECT * FROM Category1 ORDER BY Cat1SortNo ASC";
		$DBC->query($strSQLc);
		while ($datac = $DBC->fetch_array($DBC->res)){
		
			$strSQLp = "SELECT count(*) as cnt FROM Products WHERE Cat1ID=".$datac["Cat1ID"] ;
			$DBp->query($strSQLp);
				while ($datacp = $DBp->fetch_array($DBp->res)){
					$cnt=$datacp["cnt"];
				}
			echo "<p><span style='cursor:pointer;' id='expand_".$datac["Cat1ID"]."' onclick='show(".$datac["Cat1ID"].")'>+</span><span style='display:none;cursor:pointer;' id='coll_".$datac["Cat1ID"]."' onclick='hide(".$datac["Cat1ID"].")'>-</span><a href='Manage_Products.php?s_cat1=".$datac["Cat1ID"]."'>".$datac["Cat1Name"]."(".$cnt.")</a></p>";
			echo "<span id='cat2_".$datac["Cat1ID"]."' style='display:none;'>";
				$strSQLc1 = "SELECT * FROM Category2 WHERE Cat1ID=".$datac["Cat1ID"]." ORDER BY Cat2SortNo ASC";
					$DBC1->query($strSQLc1);
					while ($datac1 = $DBC1->fetch_array($DBC1->res)){

						$strSQLp1 = "SELECT count(*) as cnt FROM Products WHERE Cat2ID=".$datac1["Cat2ID"] ;
						$DBp1->query($strSQLp1);
						while ($datacp1 = $DBp1->fetch_array($DBp1->res)){
							$cnt2=$datacp1["cnt"];
						}

						echo "<p style='margin-left: 20px; '><a href='Manage_Products.php?s_cat1=".$datac1["Cat1ID"]."&s_cat2=".$datac1["Cat2ID"]."'>".$datac1["Cat2Name"]."(".$cnt2.")</a></p>";
					}
			echo "</span>";

		}
		?>

		</div>

	</div>


	<!-- content right -->
	<div id="contwrapper">
		<div id="title">Manage Products:</div>
		<div id="sub1" style="float:left;">
			<form name="download_search_content" method="get" action="Manage_Products.php">
				<div class="prod-search">
					<label for="s_cat1">Category 1</label><br/>
					<select name="s_cat1" id="s_cat1" onchange="document.download_search_content.submit()">
						<option value="">Select:</option>
						<?php 
							if($aid) {
								$DB->query("SELECT Cat1ID, Cat2ID FROM Products WHERE ProductID=".$aid);
								list($s_cat1, $s_cat2) = $DB->fetch_array($DB->res);
							}
							if($productid_copy){
								$DB->query("SELECT Cat1ID, Cat2ID FROM Products WHERE ProductID=".$productid_copy);
								list($s_cat1, $s_cat2) = $DB->fetch_array($DB->res);
							}
							$strSQL = "SELECT * FROM Category1 ORDER BY Cat1SortNo ASC";
							$DB->query($strSQL);
							while ($data = $DB->fetch_array($DB->res)){
								echo "<option value=\"". $data["Cat1ID"] ."\"";
								if($s_cat1==$data["Cat1ID"]){
									echo "selected";
								}
								echo "> " . $data["Cat1Name"] . "</option>";
							}
						?>
					</select>
				</div>
				<div class="prod-search" id="prod-model">
					<label for="s_cat2">Category 2</label><br/>
					<select name="s_cat2" onchange="document.download_search_content.submit()">
						<option>Select:</option>
						<?php
							if($s_cat1!=null){
								$strSQL = "SELECT * FROM Category2 WHERE Cat1ID = " . $s_cat1 . " ORDER BY Cat2SortNo ASC";
								$DB->query($strSQL);
								while ($data = $DB->fetch_array($DB->res)){									
									echo "<option value=\"" . $data["Cat2ID"] . "\"";
									if($s_cat2==$data["Cat2ID"]){
										echo "selected";
									}
									echo ">" . $data["Cat2Name"] . "</option>";
								}
							}							
						?>
					</select>
				</div>
				<input type="button" value="Add New Item" onclick="return addNewItems(this.form);"/>
				<input type="hidden" name="action" value="addNew"/>
 			<script>
				
				function preview(id)
				{
				document.getElementById('myAnchor').target = "_blank";
				location.href="/?pid="+id;
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
				
				
				
				function addNewItems(frm){
					if(document.getElementById('s_cat1').value==''){
						alert('Please select Category 1');
						return false;
					}
					frm.submit();
				}
				</script> 
			</form>
		</div>
		<div id="sub2">
			<span style="float;left">
			<form name="Load" method="post" action="Manage_Products.php">
				<p style="float:left;"><b class="bold_s">Copy From Existing Item</b> &nbsp; Product ID : 
						<input type="text" name="productid_copy" id="productid_copy" value="<?php echo $productid_copy; ?>"/>		 
						<input type="button" value="Load" id="btn_copy" onclick="document.Load.submit()"/>
						<input type="hidden" name="action" value="load"/>
				</p>
				
			</form>

			
			</span>
			<?php if($aid!='')
			echo '<span><a href="/?pid='.$aid.'" style="border-radius: 2px;  -moz-border-radius: 2px;cursor: pointer;  padding: 6px 20px;margin-left: 100px; margin-top: 50px;background: #F89808;  border: 0;  font: normal 12px/26px Arial, Helvetica, sans-serif;  color: white;  text-transform: uppercase;" target="_blank">Preview</a></span>';
			//echo '<span><input type="button" id="myAnchor" value="View" style="margin-left: 100px; margin-top: 5px;" onclick="preview('. $aid.')"/></span>';
			?>
			<?php if($act=="view" || $action=="load" || $action=="addNew"){?>
			<form name="ProductDetail_Form" method="post" enctype="multipart/form-data" action="Manage_Products_action.php">
				<?php
					
					
					
					
					if($act=="view" || $action=="load"){
						
						$strSQL = "SELECT * FROM Products WHERE ProductID = ";
						$strSQL .= ($action=="load")?$productid_copy:$aid;
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
				<input type="hidden" name="ProductID" value="<?php echo $aid ?>"> 
				<span><p style="margin-left: 11px; padding: 15px 0;">Fields with <span class="redstar">*</span> below are required fields, meaning that you must select one or write something.</p></span>
				<table style="border-bottom: 2px solid #BBB;">
					<tbody>
						<tr class="subject_border_top , thin_border_bottom">
							<th class="subject2" style="width: 195px;">Product ID</th>
							<td class="general"><?php if($act=="view") echo $dataProd["ProductID"]; ?></td>
							<input type="hidden" id="proID" name="proID" value="<?php if($act=="view") echo $dataProd["ProductID"]; ?>">
							<input type="hidden" id="proID2" name="proID2" value="<?php echo $colorproductid; ?>">
							<th class="subject2" style="width: 195px;">IsActive <span class="redstar">*</span></th>
							<td class="general" style="width: 300px;">
								<input type="checkbox" name="Edit_IsActive"  value="Y" <?php echo ($dataProd["IsActive"]=="Y")?"checked":null?>/>
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Date/Time Created</th>
							<td class="general"><?php if($act=="view") echo $dateCreate; ?></td>
							<th class="subject2">Date/Time Modified</th>
							<td class="general"><?php if($act=="view") echo $dateUpdate; ?></td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Categories</th>
							<td colspan="3" class="general">
								<span id="category_td"> 
									<select name="Edit_Cat1ID">
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
												echo ">&nbsp; &nbsp;" . $data["Cat1Name"] . "</option>";
											}
										?>
									</select> &nbsp;>&nbsp;
									<select name="Edit_Cat2ID">
										<option value="">Select :</option>
										<?php
											//if (!empty($Edit_Cat1ID)) {
												$strSQL = "SELECT * FROM Category2 Where Cat1ID = " . $s_cat1 . " ORDER BY Cat2SortNo ASC";
												$DB->query($strSQL);
												
												while ($data = $DB->fetch_array($DB->res)){
													echo "<option value=\"" . $data["Cat2ID"] . "\"";
													if($s_cat2==$data["Cat2ID"]){
														echo "selected";
													}elseif($Edit_Cat2ID==$data["Cat2ID"]){
														echo "selected";
													}/*elseif ($Edit_Cat2ID==$dataProd["Cat2ID"]){
														echo "selected";
													}*/
													echo ">&nbsp; &nbsp;" . $data["Cat2Name"] . "</option>";
												}									
										//	}
										?>
										</select>
									</span> &nbsp; (represent <b>Category 1</b> > <b>Category 2</b> >
								<b>Category 3</b>)</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Item Number</th>
							<td colspan="2" class="general , thin_border_right"><?php if($act=="view") echo $dataProd["StyleNo"]?></td>
							<td rowspan="6" class="general_c">							
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
							</td>

						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Vendor</th>
							<td colspan="2" class="general">
								<select name="Edit_BrandName1">
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
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Product Name <span class="redstar">*</span></th>
							<td colspan="2" class="general">
								<input type="text" name="Edit_ProductName" value="<?php echo $dataProd["ProductName"]; ?>" maxlength="65" style="width: 79%;"/> (Max. 65 letters)
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Product Description <span class="redstar">*</span></th>
							<td colspan="2" class="general">
								<textarea name="Edit_ProductDescription" rows="7"
								style="margin: 0px; width: 99%; height: 98px;"><?php echo $dataProd["ProductDescription"]; ?></textarea>
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Notice To Buyers</th>
							<td colspan="2" class="general">
								(Write an order instruction for this item to buyers if necessary.)<br/>
								<textarea name="Edit_NoticeToPurchasers" rows="4"
								style="margin: 0px; width: 99%; height: 56px;"><?php echo $dataProd["NoticeToPurchasers"]; ?></textarea>
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Search Engine Tags</th>
							<td colspan="2" class="general">(Separate tags with commas)<br/>
								<textarea name="Edit_SearchEngineTags" rows="4"
									style="margin-left: 0px; margin-right: 0px; width: 99%;"><?php echo $dataProd["searchEngineTags"]; ?></textarea>
							</td>
						</tr>
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
						</tr>-->
						<tr class="thin_border_bottom">
							<th class="subject2">Material</th>
							<td colspan="3" class="general">
								<input type="text" name="Edit_MadeOfMaterial" value="<?php echo $dataProd["MadeOfMaterial"]; ?>" style="width: 240px;" maxlength="50"/> 
							&nbsp; (Example: Leather, Cotton, Polyester, and etc.)</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Price <span class="redstar">*</span></th>
							<td colspan="3" class="general">
								<table width="100%" border="0" cellpadding="0" cellspacing="0"
									class="arial12">
									<tr>
										<td width="20%" class="general">&nbsp; <b>Regular Unit Price:</b>
										</td>
										<td width="25%" class="general">$
											<input type="text" name="Edit_UnitPrice" value="<?php echo $dataProd["UnitPrice"]; ?>" size="7" maxlength="7"/>
										</td>
										<td width="17%" class="general"><b>Sale Unit Price:</b>
										</td>
										<td class="general">$
											<input type="text" name="Edit_UnitPriceOnSale" value="<?php echo $dataProd["UnitPriceOnSale"]; ?>" size="7" maxlength="7"/>
										</td>
									</tr>
									<tr>
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
									</tr>
								</table>
							</td>
						</tr>
							
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
						<!-- 	<input type="checkbox" name="personalize" value="1" <?php echo ($dataProd["personalize"]=="1")?"checked":null?>> -->
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
							<th class="subject2">Unit Weight <span class="redstar">*</span></th>
							<td colspan="3" class="general">&nbsp;
								<input type="text" name="Edit_Weight_Pounds" value="<?php echo $dataProd["Weight_Pounds"]; ?>" size="7" maxlength="7"/> 
								(<b>LB</b>s, Pounds)
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Free Shipping</th>
							<td colspan="3" class="general">
								<input type="checkbox" name="Free_Shipping" value="Y" <?php echo ($dataProd["FreeShipping"]=="Y")?"checked":null?>>
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Is Taxable</th>
							<td colspan="3" class="general">
								<input type="checkbox" name="IsTaxable" value="Y" <?php echo ($dataProd["IsTaxable"]=="N")?null:"checked"?>>
								&nbsp;(Select Yes only if this item is taxable item.)
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Back-order item? <span class="redstar">*</span></th>
							<td colspan="3" class="general">
								<input type="checkbox" name="Edit_IsThisBackOrderItem" value="Y" <?php echo ($dataProd["IsThisBackOrderItem"]=="Y")?"checked":null?>>
								&nbsp;(Select Yes only if this item is available for future order or back-order.)
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">This product is for <span class="redstar">*</span></th>
							<td colspan="3" class="general">
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
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Available Sizes</th>
							<td colspan="3" class="general">
								&nbsp;If you don't see the sizes of your interest from below, click on <b>Manage Sizes</b> 
								in the  menu above and add the sizes of your choice.<br> 
								<select name="Edit_SizeChartID" style="width: 100%; font: normal 11px tahoma, sans-serif;">
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
											echo ">(" . $data["SizeChartID"] . ")&nbsp;" . $data["SizeChartName"] . ":&nbsp;";
											$strSQL2 = "SELECT Size FROM Size WHERE SizeChartID = ".$data["SizeChartID"]." && `Order` >= 0";
											$DB2 = new myDB();
											$DB2->query($strSQL2);
											while ($data2 = $DB2->fetch_array($DB2->res)){
												if($data2["Size"]!=null){
													echo $data2["Size"]."&nbsp;";
												}
											}
											echo "</option>";
									//		$sortNum++;
									//		$sizeList = "";
										}
									?>
								</select>
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Available Colors <span class="redstar">*</span></th>
							<td colspan="3" class="general">
								<a href="#" onClick="showStuff('ColorsAvailable'); return false;" class="red">Show</a>
								<a href="#" onClick="hideStuff('ColorsAvailable'); return false;" class="red">Hide</a>
								<span id="ColorsAvailable" style="display: none;">
									<table width="99%" border="0">
										<tr>
											<td colspan="4">
												&nbsp;If you don't see the colors of your interest from below, click on <b>Manage Colors</b> 
												in the left column and add the colors of your choice.
												<p">&nbsp;</p>
											</td>
										</tr>
										<tr>
											<td >
<?php 
	$strSQL = "SELECT * FROM Colors WHERE IsActive = 'Y' ORDER BY Color ASC";
	$DB->query($strSQL);
	$ColorNum = 0;
	echo "<tr>";
	while ($data = $DB->fetch_array($DB->res)){
		if($ColorNum%4==0){
			echo "</tr><tr>";
		}
		echo "<td><input type=\"checkbox\" name=\"CheckedColorID[]\" value=\"" . $data["ColorID"] . "\"";
		$tmpArray = explode(",",$dataProd["ColorIDs"]);
		$temp = "";
		for($i=0;$i<=count($tmpArray);$i++){
			if($tmpArray[$i]==$data["ColorID"]){
				echo "checked";
				$temp = "style=\"font-weight: bold; color: #0000ff;\"";
			}
		}
		echo " /><span {$temp}> " . $data["Color"] . "</span></td>";

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
	echo "<tr><td colspan=\"4\"><a href=\"#\" onClick=\"hideStuff('ColorsAvailable'); return false;\" class=\"red\">Hide</a></td></tr>";
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
										<td>>><br/><br/><< </td>
										<td colspan="4">
										
										
<?php
/*	
	$SQL1 = "SELECT a.ProductColor, b.Color FROM ProductColors a,Colors b WHERE a.ColorID=b.ColorID and b.IsActive = 'Y' and a.ProductID=".$aid." ORDER BY b.Color ASC";
	$DB1 = new myDB;
	$DB1->query($SQL1);
	echo "Selected Color<br/>";
	echo "<select size=\"10\" style=\"height: 100px;\"  id=\"DelColorID\" name=\"DelColorID\"  >";
	while ($data1 = $DB1->fetch_array($DB1->res)){
		
		echo "<option value=\"". $data1["ProductColor"] ."\" >". $data1["Color"] ."</option>";
	}
	echo " </select>";*/
?>
										
										</td>
										</tr>
									</table>
									
								</span>
							</td>
						</tr>

						<tr class="thin_border_bottom">
							<th class="subject2">Discount by Order Qty.</th>
							<td colspan="3" class="general">
								&nbsp;If you don't see the discount rates of your interest from below, click on 
								<b>Discounts by Order Quantities</b> in the left column.<br> 
								<select name="Edit_QuantityDiscountID">
									<option value="">Select one :</option>
<?php 
	$strSQL = "SELECT DISTINCT QD_ID, QuantityDiscountName FROM NewQuantityDiscounts ORDER BY QD_ID";
	$DB->query($strSQL);
	while ($data = $DB->fetch_array($DB->res)){
		echo "<option value=\"".$data["QD_ID"]."\"";
		if($dataProd["QuantityDiscountID"]==$data["QD_ID"]){
			echo "selected";
		}
		echo ">(".$data["QD_ID"].")&nbsp;".$data["QuantityDiscountName"].": ";
		$strSQL2 = "SELECT LowerQty, UpperQty, DiscountPercentage1 FROM NewQuantityDiscounts WHERE QD_ID = ".$data["QD_ID"]." ORDER BY ID";
		$DB2 = new myDB;
		$DB2->query($strSQL2);
		while ($data2 = $DB2->fetch_array($DB2->res)){
			if($data2["LowerQty"] > 0){
				echo $data2["LowerQty"]." ~ ".$data2["UpperQty"]." (".$data2["DiscountPercentage1"]."%) ";
			}
		}
		echo "</option>";
	}
?>									
								</select>
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<th class="subject2">Matches with</th>
							<td colspan="3" class="general">
								<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<?php 
											for($i=1; $i<=6; $i++){
												echo "<td>(". $i .") Product ID:<br>&nbsp; &nbsp;&nbsp; ";
												echo "<input type=\"text\" name=\"Edit_MatchesWithProduct". $i . "\" value=\"" . $dataProd["MatchesWithProduct$i"] . "\" size=\"4\" maxlength=\"5\"/>";
												echo "</td>";
											}
										?>
									</tr>
								</table>
							</td>
						</tr>
						<?php 
							for($i=1; $i<=15; $i++){
								echo "<tr class=\"thin_border_bottom\">";
								echo "<th class=\"subject2\">Picture ".$i;
								if($act=="view"){
									if ($dataProd["Picture$i"]!="") {
										echo "<div style=\"float:right\">";
										echo "<a class=\"ajax\" href=\"/Images_Products/".$dataProd["Picture$i"]."\">";
										echo "<img src=\"/Images_Products/".$dataProd["Picture$i"]."\" width=\"60\"/></a>";
										if ($i>1) echo "<button type=\"button\" class=\"btn-remove\" title=\"delete\" value=\"Picture$i|".$dataProd["ProductID"]."\" style=\"float:right\"></button>";
										else echo "<span style=\"margin-right:21px\"></span>";
										echo "</div>";
									}
								}								
								echo "</th>";
								echo "<td  class=\"general\">&nbsp; ";
								echo "<input type=\"FILE\" name=\"Picture{$i}\" id=\"Picture".$i."\" value=\"".$dataProd["Picture".$i]."\" style=\"width: 200px;\"/>";
								if($i==1){
									//echo "<br>&nbsp;(<font color=\"blue\"><b>Important:</b> </font> ";
									//echo "Thumbnail images of products that customers first see are from this picture.)";
								}
								echo "</td>";
								
								echo "<td>";
								$strSQL = "SELECT * FROM Colors WHERE IsActive = 'Y' ORDER BY Color ASC";
								$DB->query($strSQL);
								echo "Search:&nbsp<input type=\"text\" id=\"searchkey_".$i."\" name=\"searchkey\" ><br/>";
								echo "<select size=\"10\" style=\"height: 100px;\"  id=\"AddColorID_".$i."\" name=\"AddColorID\"  >";
								/*while ($data = $DB->fetch_array($DB->res)){
									
									echo "<option value=\"". $data["ColorID"] ."\" >". $data["Color"] ."</option>";
								}*/
								echo " </select>";
								echo "</td>";
								//echo "<td>=><br/><=</td>";
								echo "<td>";
								//$SQL1 = "SELECT a.ProductColor, b.Color FROM ProductColors a,Colors b WHERE a.ColorID=b.ColorID and b.IsActive = 'Y' and a.ProductID=".$aid." and a.imageno=".$i." ORDER BY b.Color ASC";
								$SQL1 = "SELECT ProductColor, Color FROM ProductColors WHERE ProductID=".$aid." AND imageno=".$i." ORDER BY Color";
								$DB1 = new myDB;
								$DB1->query($SQL1);
								echo "Selected Color<br/>";
								echo "<select size=\"10\" style=\"height: 100px;\"  id=\"DelColorID_".$i."\" name=\"DelColorID\"  >";
								while ($data1 = $DB1->fetch_array($DB1->res)){
									
									echo "<option value=\"". $data1["ProductColor"] ."\" >". $data1["Color"] ."</option>";
								}
								echo " </select>";
								echo "</td>";
								"</tr>";?>


						<script type="text/javascript">
						
						$('#AddColorID_<?php echo $i?>').click(function() {
							
							var colorid = $('#AddColorID_<?php echo $i?>').val();
							var productid = $('#proID').val();
							var mode='update';
							if (productid=='')
							{
								if($('#productid_copy').val()!="")	
								{
									productid= $('#productid_copy').val();
									mode='update';
								}
								else
								{
									productid= $('#proID2').val();
									mode='add';
								}
							}	
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickcolor.php",
											data:{"mode":mode,"colorid":colorid,"productid":productid,"imageno":<?php echo $i?>},
											success:function(d) {
												if (d) {
													
													var select = $("#DelColorID_<?php echo $i?>");
													select.children().remove();
													for(var i=0; i<d.colors.length; i++) {
														select.append("<option value="+d.colors[i].scode+">"+d.colors[i].sname+"</option>");
														
													}
												}
											}
										});
									
						});
						$('#DelColorID_<?php echo $i?>').click(function() {
							var delcolorid = $('#DelColorID_<?php echo $i?>').val();
							var productid = $('#proID').val();
							var mode='del';
							if (productid=='')
							{
								mode='newdel';
								productid= $('#proID2').val();
							}
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickcolor.php",
											data:{"mode":mode,"delcolorid":delcolorid,"productid":productid,"imageno":<?php echo $i?>},
											success:function(d) {
												if (d) {
													
														var select = $("#DelColorID_<?php echo $i?>");
														select.children().remove();
														for(var i=0; i<d.colors.length; i++) {
															select.append("<option value="+d.colors[i].scode+">"+d.colors[i].sname+"</option>");
															
														}
													
												}
											}
										});
									
						});					
						$('#searchkey_<?php echo $i?>').keyup(function() {
							var kkeyword = $('#searchkey_<?php echo $i?>').val();
							if (kkeyword.length>=3)
							{
								$.ajax({
											async:false, type:"post", dataType:"json", url:"pickcolor.php",
											data:{"mode":"search","keyword":kkeyword},
											success:function(d) {
												if (d) {
													var select = $("#AddColorID_<?php echo $i?>");
													select.children().remove();
													for(var i=0; i<d.colors.length; i++) {
														select.append("<option value="+d.colors[i].scode+">"+d.colors[i].sname+"</option>");
														
													}
												}
											}
										});
							}		
						});		
						</script>
								
						
							
						<?php		
							}
						?>
						</tbody>
				</table>
				
				
				
				
						
						
				


				
						
				
				
				<p class="general_c , btns">
					<?php 
					if(!$act){	//nothing selected
						echo "<input type=\"button\" name=\"button\" onClick=\"return AddOrUpdateConfirm(this.form);\" value=\"Add New Product\"/>";
						echo "<input type=\"hidden\" name=\"action\" value=\"add\"/>";
					}
					else{		//someting selected
						echo "<div style=\"position:fixed;left:50px;top:335px;\">";
						echo "<input type=\"button\" name=\"button\" onClick=\"return AddOrUpdateConfirm(this.form);\" value=\"Update This Product\"/>";
						echo "</div>";
						echo "<input type=\"hidden\" name=\"action\" value=\"update\"/>";
					}
					?>
					<input type="submit" name="btnReset" onClick="javascript:this.form.reset();return false;"value="Reset"/>
		 		</p>		
			</form>
			<?php }?>
			<script type="text/javascript">
				$(document).ready(function() {
					
					var cat1= $('#s_cat1').val();
					if (cat1>0)
					{
						$('#expand_'+cat1).css('display','none');
						$('#coll_'+cat1).css('display','block');
						$('#cat2_'+cat1).css('display','block');
					}	
					$('.btn-remove').click(function() {
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
				})
			</script>
		</div>
		<div id="sub3">
			<form name="SearchItems_Form" method="get" action="Manage_Products.php">
				<table>
					<tr class="subject_border_top">
						<td class="subject2">Category</td>
						<td class="subject2">Brand</td>
						<td class="subject2">Product ID</td>
						<td class="subject2">Style #</td>
						<td class="subject2">Product Name</td>
						<!--<td class="subject2">Product Description</td>
						<!--<td class="subject2">Player</td>
						<td class="subject2">Club</td>
						<td class="subject2">League</td>
						<td class="subject2">Country</td>
						<td class="subject2">Search Engine Tags</td>
						<td class="subject2">Free Shipping</td>-->
					</tr>
					<tr class="subject_border_bottom">
						<td class="general">
						
						<div class="prod-search">
							<label for="s_cat1">Category 1</label><br/>
							<select name="s_cat1" id="s_cat1" onchange="">
								<option value="">Select:</option>
								<?php 
									if($aid) {
										$DB->query("SELECT Cat1ID, Cat2ID FROM Products WHERE ProductID=".$aid);
										list($s_cat1, $s_cat2) = $DB->fetch_array($DB->res);
									}
									$strSQL = "SELECT * FROM Category1 ORDER BY Cat1SortNo ASC";
									$DB->query($strSQL);
									while ($data = $DB->fetch_array($DB->res)){
										echo "<option value=\"". $data["Cat1ID"] ."\"";
										if($s_cat1==$data["Cat1ID"]){
											echo "selected";
										}
										echo "> " . $data["Cat1Name"] . "</option>";
									}
								?>
							</select>
						</div>
						<div class="prod-search" id="prod-model">
							<label for="s_cat2">Category 2</label><br/>
							<select name="s_cat2" >
								<option>Select:</option>
								<?php
									if($s_cat1!=null){
										$strSQL = "SELECT * FROM Category2 WHERE Cat1ID = " . $s_cat1 . " ORDER BY Cat2SortNo ASC";
										$DB->query($strSQL);
										while ($data = $DB->fetch_array($DB->res)){									
											echo "<option value=\"" . $data["Cat2ID"] . "\"";
											if($s_cat2==$data["Cat2ID"]){
												echo "selected";
											}
											echo ">" . $data["Cat2Name"] . "</option>";
										}
									}							
								?>
							</select>
						</div>
						
						</td>
						<td class="general">
							<input type="text" name="s_brand" id="s_brand" value="<?php echo $s_brand?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_idx" id="s_idx" value="<?php echo $s_idx?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_styleno" id="s_styleno" value="<?php echo $s_styleno?>" style="width: 90%;"/>
						</td>
						<td class="general">
							<input type="text" name="s_name" id="s_name" value="<?php echo $s_name?>" style="width: 90%;"/>
						</td>
						<!--<td class="general">
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
						</td>-->
					</tr>
					<tr>
						<td colspan="11" class="general , btns">
							<input type="button" value="Search" onclick="document.SearchItems_Form.submit();" />
							<input type="hidden" name="action" value="search"/>
						</td>
					</tr>
				</table>
			</form>
			<form name="searchItems" method="post" action="Manage_Products.php">
<?php
	if($action == "search"){
?>
				<table style="width: 100%;">
					<tr class="subject_border_top">
						<td class="subject1_2">Searched Items</td>
					</tr>
<?php	
	$strSCHSQL = (" Where ");
	

	if($s_brand != null){
		$strSCHSQL .= (" BrandName LIKE '%" . $s_brand . "%' AND");
	}
	if($s_idx != null){
		$strSCHSQL .= (" ProductID LIKE '%" . $s_idx . "%' AND");
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
	
	if($s_player != null){
		$strSCHSQL .= (" Player LIKE '%" . $s_player . "%' AND");
	}
	if($s_club != null){
		$strSCHSQL .= (" Club LIKE '%" . $s_club . "%' AND");
	}
	if($s_league != null){
		$strSCHSQL .= (" League LIKE '%" . $s_league . "%' AND");
	}
	if($s_country != null){
		$strSCHSQL .= (" Country LIKE '%" . $s_country . "%' AND");
	}
	if($s_tags != null){
		$strSCHSQL .= (" serchEnginTags LIKE '%" . $s_tags . "%' AND");
	}
	if($s_freeship != null){
		$strSCHSQL .= (" FreeShipping LIKE '%" . $s_freeship . "%' AND");
	}*/
	$strSCHSQL .= " 1=1";
//	$strSCHSQL .= " IsActive='Y'";
	
	$strSQL = "SELECT * FROM Products ".$strSCHSQL;
//	echo "<br/>" . $strSQL;
	$strOrd	= " ORDER BY ProductID DESC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$limitProducts = 20;
	$totalpps = ($limitProducts < 0)?1:ceil($numrows/$limitProducts);
	if ($pp < 1 || $pp > $totalpps) $pp = 1;
	$list_num = $limitProducts * ($pp - 1);
	if ($limitProducts > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$limitProducts}";
?>
					<!--<tr>					
						<td class="general_c">
							<input type="button" id="checkall" onclick="return checkedAll3(this.form)" value="Check All Items"/>
							<input type="button" name="button" onclick="return DeactivateCheckedConfirm(this.form);" value="Deactivate Checked Items"/>
							<input type="hidden" name="act" value/>
						</td>
					</tr>-->
					<input type="hidden" name="act" value/>

					
<?php
	
		echo "<tr><td><div class=\"product-page-bar\">";
		$linkopt = "ppAI={$ppAI}&ppII={$ppII}";
		$linkopt .= "&s_brand={$s_brand}&s_idx={$s_idx}&s_styleno={$s_styleno}&s_name={$s_name}&s_desc={$s_desc}&s_player={$s_player}&s_club={$s_club}&s_league={$s_league}&s_country={$s_country}&s_tags={$s_tag}&s_freeship={$s_freeship}&action={$action}";
		//if ($ord) $linkopt.="&or=".$ord;
		if (!empty($kw)) $linkopt.="&kw=".$kw;
		listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
		echo "</div></td></tr>";
	
	?>
	<table>
		<tr class="subject_border_top">
		<td class="subject2" ></td><td class="subject2">Img</td><td class="subject2">Style No</td><td class="subject2">Brand</td><td class="subject2">Name</td><td class="subject2">Price</td><td  class="subject2">Status</td><td class="subject2">User</td>
		</tr>
	<?php
	echo "<tr><td class=\"general_c\">";

	$DB->query($strSQL);
	while ($data = $DB->fetch_array($DB->res)){
		echo "<tr><td class=\"general_c\">";
?>		
		<input type="checkbox" name="idtocheck[]" id="checklist3" value="<?php echo $data["ProductID"];?>"/>
<?php
		echo "<td class=\"general_c\">";
		echo "<a href=\"Manage_Products.php?act=view&aid=" . $data["ProductID"] . "&{$linkopt}&pp={$pp}\">";
		if($data["Picture1"]!=null){
			echo "<img src=\"/Images_Products/" . $data["Picture1"] . "\" width=\"110\" height=\"110\" border=\"0\"/>";
		}else{
			echo "<img src=\"/Images_Products/ComingSoon.jpg\" height=\"110\" border=\"0\"/>";
		}
		echo "</a></td>";
		echo "<td class=\"general_c\">";
		echo $data["StyleNo"] ."</td>";
		echo "<td class=\"general_c\">";
		echo $data["BrandName"] . "</td>";
		echo "<td class=\"general_c\">";		
		echo $data["ProductName"] . "</td>";
		echo "<td class=\"general_c\">";
		echo "$" . $data["UnitPriceOnSale"] . " &nbsp;(<s>$" . $data["UnitPrice"] . "</s>)";
		echo "</td>";
		echo "<td class=\"general\">";
		echo $data["IsActive"] ."</td>";
		echo "<td class=\"general\">";
		echo $data["AdminID"]. "</td>";
		echo "</tr>";
	}
	
	echo "</table>";
}?>
		</form>

		</div>
<?php
	if($action != "search"){
?>
		<div id="sub4">
			<table>
				<form name="DisplayActiveItems_Form" method="GET" action="Manage_Products.php">
					<input type="hidden" name="ProductID" value=""/> 
				  	<input type="hidden" name="s_cat1" value="<?php echo $s_cat1;?>"/> 
					<input type="hidden" name="s_cat2" value="<?php echo $s_cat2;?>"/> 
					<input type="hidden" name="s_cat3" value="<?php echo $s_cat3;?>"/> 
					<tr class="subject_border_top">
						<td class="subject1_2" style="width: 40%;"></td>
						<td class="subject1_2">Active Items</td>
						<td class="subject1_2" style="width: 40%;">
							<div style="width: 390px; float: right;">
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
	$limitProducts = 20;
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
	$limitProducts = 20;
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
<table>
		<tr class="subject_border_top">
		<td class="subject2" style="width: 100px;"></td><td class="subject2">Img</td><td class="subject2">Style No</td><td class="subject2">Brand</td><td class="subject2">Name</td><td class="subject2">Price</td><td class="subject2">Status</td><td class="subject2">User</td>
		</tr>					

							<!-- pagenation -->
<?php 
	while ($data = $DB->fetch_array($DB->res)){?>
							
									<tr>
										<td class="general">
											<input type="checkbox" name="idtocheck[]" id="checklist2" value="<?php echo $data["ProductID"];?>"/>										
											
										</td>
										<td class="general">
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
										<td class="general"><?php echo $data["StyleNo"];?></td>
										<td class="general"><?php echo $data["BrandName"];?></td>
										<td class="general"><b> <?php echo substr($data["ProductName"], 0, 100);?></b></td>
										<td class="general">$<?php echo $data["UnitPriceOnSale"];?> &nbsp;(<s>$<?php echo $data["UnitPrice"];?></s>)</td>
										<td class=\"general\"><?php echo $data["IsActive"];?></td>
										<td class=\"general\"><?php echo $data["AdminID"];?></td>
									</tr>
							
<?php }echo "</table>";
?>
					</td>
					</tr>
				</table>				
			</form>
		</div>

<?php
	}
	require_once("footer.php"); 
	$DB->close();	//DB close
?>