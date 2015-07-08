<?php 
	require_once("header.php");

	$action 		= $_REQUEST['action'];
	$product_id2 	= $_GET['ProductID']; 
	$product_id 	= $_POST['ProductID'];
	$picture 		= $_POST['Picture1'];
	$cat1_id 		= $_POST['Cat1ID'];
	$cat2_id 		= $_POST['Cat2ID'];
	$cat3_id 		= $_POST['Cat3ID'];
	$brand_name 	= $_POST['brandname'];
	$cat1_name 		= $_POST['Cat1Name'];
	$cat2_name 		= $_POST['Cat2Name'];
	$name 			= $_POST['ProductName'];
	$code 			= $_POST['StyleNo'];
	$regular_unit 	= $_POST['UnitPrice'];
	$sale_unit 		= $_POST['UnitPriceOnSale'];
	$idx 			= $_POST['idx'];
	$cat_name 		= $_POST['cat_name'];
	$idx 			= $cat1_id . '-' . $cat2_id . '-' . $cat3_id ;
	$cat_name 		= $cat1_name . '>' . $cat2_name ;
	$s_category 	= $_GET["s_category"];
	$s_brand 		= $_GET["s_brand"];
	$s_name 		= $_GET["s_name"];
	$s_code 		= $_GET["s_code"];
	
	$arrSCat 		= explode("-", $s_category);
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

		<div id="contwrapper" style="border-left: 1px solid #BBB;">
			<div id="title">
				Products bulk update
			</div>
			<div id="sub1">
				<form name="search" method="get" action="Manage_bulk_product.php">
					<table>
						<tr>
							<td class="genera">Category</td>
						<!--<select name="s_category" id="s_category"> -->
							<td class="general">
								<select name="s_category" id="s_category" style="width: 435px;">
									<option value="">ALL</option>
									<?php
										$DB= new myDB();
										
										$strSQL =  "SELECT DISTINCT CAST( Category1.Cat1ID AS CHAR( 256 ) ) AS idx, Cat1Name AS cat_name, LPAD( CONVERT( Category1.Cat1SortNo, CHAR( 4 ) ) , 4, '0' ) AS cat_order FROM Category1";
										$strSQL .= " UNION ALL SELECT DISTINCT CONCAT( CAST( c1.Cat1ID AS CHAR( 999 ) ) , '-', CAST( c2.Cat2ID AS CHAR( 999 ) ) ) AS idx, CONCAT( c1.Cat1Name, ' > ', c2.Cat2Name ) AS cat_name, CONCAT( LPAD( CONVERT( c1.Cat1SortNo, CHAR( 4 ) ) , 4, '0' ) , '-', LPAD( CONVERT( c2.Cat2SortNo, CHAR( 4 ) ) , 4, '0' ) ) AS cat_order";
							            $strSQL .= " FROM Category2 c2 LEFT JOIN Category1 c1 ON c2.Cat1Id = c1.Cat1Id";
										$strSQL .= " UNION ALL";
										$strSQL .= " SELECT DISTINCT CONCAT( CAST( c1.Cat1ID AS CHAR( 999 ) ) , '-', CAST( c2.Cat2ID AS CHAR( 999 ) ) , '-', CAST( c3.Cat3ID AS CHAR( 999 ) ) ) AS idx, CONCAT( c1.Cat1Name, ' > ', c2.Cat2Name, ' > ', c3.Cat3Name ) AS cat_name, CONCAT( LPAD( CONVERT( c1.Cat1SortNo, CHAR( 4 ) ) , 4, '0' ) , '-', LPAD( CONVERT( c2.Cat2SortNo, CHAR( 4 ) ) , 4, '0' ) , '-', LPAD( CONVERT( c3.Cat3SortNo, CHAR( 4 ) ) , 4, '0' ) ) AS cat_order";
										$strSQL .= " FROM Category3 c3";
										$strSQL .= " LEFT JOIN Category2 c2 ON c3.Cat2Id = c2.Cat2Id";
										$strSQL .= " LEFT JOIN Category1 c1 ON c2.Cat1Id = c1.Cat1Id";
										$strSQL .= " ORDER BY cat_order";
										$DB->query($strSQL);
										while ($data = $DB->fetch_array($DB->res)) {
											if($data["cat_name"]!=""){
												echo "<option value=\"". $data['idx'] ."\"";
												if($s_category==$data['idx']){
													echo "selected";
												}
												echo ">" . $data["cat_name"] . "</option>";
											}										
										}
									?>
								</select>
							</td>
							<td class="general">Brand</td>
							<td class="general">
								<select name="s_brand" id="s_brand" style="width: 185px;">
									<option value="">ALL</option>
									<?php 
										$strSQL = "SELECT DISTINCT BrandName FROM Products Where BrandName IS NOT NULL AND BrandName<>'' ORDER BY BrandName ASC";
										$DB->query($strSQL);
										while ($data = $DB->fetch_array($DB->res)){
											echo "<option value=\"" . $data["BrandName"] . "\" ";
											if($s_brand==$data["BrandName"]){
												echo "selected";
											}
											echo ">&nbsp; &nbsp;" . $data["BrandName"] . "</option>";
										}
									?>
								</select>
							</td>
							<td rowspan="2" class="general_c">
								<input type="button" name="button" value ="Search" onclick="document.search.submit();"/>
								<input type="hidden" name="action" value="search"/>
							</td>
						</tr>
						<tr>
							<td class="general">Name</td>
							<td class="general">
								<input type ="text" name="s_name" id="s_name" value="<?php echo $s_name;?>" style="width: 428px;"/>
							</td>
							<td class="general">Style No</td>
							<td class="general">
								<input type ="text" name="s_code" id="s_code" value="<?php echo $s_code;?>" style="width: 180px;"/>
							
							</td>
						</tr>
						<!--  
						<tr>
							<td colspan="4" class="general_c">
								<input type="button" name="button" value ="Search" onclick="document.search.submit();"/>
								<input type="hidden" name="action" value="search"/>
							</td>
						</tr>	-->								
					</table>
				</form>
			</div>								
			<div id="sub2">
<?php 
	if($action == "search"){
		$strSCHSQL = (" Where");
		if($s_category != null){
			for($i=0; $i<count($arrSCat); $i++) {
				$strSCHSQL	.= " P.Cat" . ($i+1) . "ID=" . $arrSCat[$i] . " AND";
				$strSELECT	.= " C" . ($i+1) . ".Cat" . ($i+1) . "Name,";
				$strJOIN	.= " LEFT JOIN Category".($i+1)." C".($i+1)." ON P.Cat".($i+1)."ID=C".($i+1).".Cat".($i+1)."ID";
			}
		}
		if($s_brand != null){
			$strSCHSQL .= (" BrandName LIKE '%" . $s_brand . "%' AND");
		}
		if($s_name != null){
			$strSCHSQL .= (" ProductName LIKE '%" . $s_name . "%' AND");
		}
		if($s_code != null){
			$strSCHSQL .= (" StyleNo LIKE '%" . $s_code . "%' AND");
		}
		$strSCHSQL = substr($strSCHSQL, 0, strlen($strSCHSQL)-3);
		$strSQL3 = "SELECT {$strSELECT} P.* FROM Products P {$strJOIN}";
		$strSQL3 .= $strSCHSQL . " ORDER BY ProductID";
		$DB ->query($strSQL3);
		$linkopt = "&s_category={$s_category}&s_brand={$s_brand}&s_name={$s_name}&s_code={$s_code}";
		//echo $strSQL3;
		$numrows = $DB->rows;
?>
				<form name="action" method="post" action="manage_bulk_action.php">
					<p class="general">Total : <?php echo $numrows?></p>
					<p class="general"><input type="submit" name="button" value="Update"/></p>		
					<table style="border-bottom: 2px solid #BBB;">
						<tbody>
							<tr class="subject_border_top">
								<th rowspan="2" class="subject" style="width: 20px;">
									<input type="checkbox" name="checkall" id="checkall" onclick="return checkedAll(this.form);"/>
								</th>
								<th rowspan="2" class="subject" style="width: 80px;">Photo</th>
								<th rowspan="2" class="subject">Name</th>
								<th rowspan="2" class="subject">Style No</th>
								<th colspan="2" class="subject1_2">Price</th>
								<th rowspan="2" class="subject1_2" style="width: 80px;">Is Active</th>
							</tr>
							<tr>
								<th class="subject1_2" style="width: 90px;">Regular Unit</th>
								<th class="subject1_2" style="width: 90px;">Sale Unit</th>
							</tr>
<?php
		$num = 0;
		while ($data = $DB->fetch_array($DB->res)) {
			$num++;
?>	
							<input type="hidden" name="action" value="search">	
							<input type="hidden" name="s_category" value="<?php echo $s_category; ?>">	
							<input type="hidden" name="s_brand" value="<?php echo $s_brand; ?>">	
							<input type="hidden" name="s_name" value="<?php echo $s_name; ?>">
							<input type="hidden" name="s_code" value="<?php echo $s_code; ?>">					
							<tr class="thin_border_bottom">
								<td class="general" style="padding-left: 10px;">
									<input type="checkbox" name="checkupdate[]" id="checklist" value="<?php echo $num?>"/>
									<input type="hidden" name="checkHidden[]" value="<?php echo $data["ProductID"]?>">
								</td>
								<td class="general">
									<a href="/Images_Products/<?php echo $data["Picture1"]; ?>" class="ajax cboxElement">
										<img src="/Images_Products/<?php echo $data["Picture1"]; ?>" style="width:40px;height:40px;">
									</a>
								</td>
								<td class="general"><?php echo $data["ProductName"]; ?></td>
								<td class="general"><?php echo $data["StyleNo"]; ?></td>
								<td class="general_c">$
									<input type="text" name="UnitPrice[]" value="<?php echo $data["UnitPrice"]; ?>" class="box"/>
								</td>
								<td class="general_c">$
									<input type="text" name="UnitPriceOnSale[]" value="<?php echo $data["UnitPriceOnSale"];?>" class="box"/>
								</td>
								<td class="general_c">
									<input type="checkbox" name="isActive[<?php echo $num?>]" value="Y" id="isActive" <?php echo ($data["IsActive"]=="Y")?"checked":null ?>>
								</td>
							</tr>
							<?php 
		}
	}
							?>
						</tbody>
					</table>
					<p class="general"><input type="submit" name="button" value="Update"/></p>
				</form>	
			</div>
		</div>		
	</div>		
<?php require_once("footer.php"); ?>		