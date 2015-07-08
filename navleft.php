					
					
					<!-- //***************************** NAVLEFT *******************************// -->
					
<div class="container">
    
    <div class="col-md-2">
			<link rel="stylesheet" type="text/css" media="screen" href="/css/countdown_<?php echo $cssColor?>.css" />
						<style type="text/css">.dash { width: 70px; height: 45px; float: left; margin-left: 2px; padding-left: 0px; margin-top: 4px; padding-top: 0; position: relative; color: <?php echo $hexColor?>; }</style>
						<div id="countdown_dashboard" >
							<div class="clock_title"></div>
							<div class="cdown_clock">
								<div class="dash weeks_dash">
									<span class="dash_title">weeks</span>
									<div class="digit"></div>
									<div class="digit"></div>
								</div>
								
								<div class="dash days_dash">
									<span class="dash_title">days</span>
									<div class="digit"></div>
									<div class="digit"></div>
								</div>

								<div class="dash hours_dash">
									<span class="dash_title">hours</span>
									<div class="digit"></div>
									<div class="digit"></div>
								</div>

								<div class="dash minutes_dash">
									<span class="dash_title">minutes</span>
									<div class="digit"></div>
									<div class="digit"></div>
								</div>

								<div class="dash seconds_dash">
									<span class="dash_title">seconds</span>
									<div class="digit"></div>
									<div class="digit"></div>
								</div>
							</div>
							<!-- Countdown dashboard end -->
							<script type="text/javascript" src="/js/jquery.lwtCountdown-1.0.js"></script>
							<script language="javascript" type="text/javascript">
								$(document).ready(function() {
									$('#countdown_dashboard').countDown({
										targetDate: {
											'day': 		<?php echo $targetDay?>,
											'month': 	<?php echo $targetMonth?>,
											'year': 	<?php echo $targetYear?>,
											'hour': 	<?php echo $targetHour?>,
											'min': 		<?php echo $targetMin?>,
											'sec': 		<?php echo $targetSec?>
										}
									});
								});
							</script>
						</div>
<?php 
	
	if ($c1) {
				
				if(!empty($_GET["c2"]))
				$nc2= $_GET["c2"];
				if(isset($_GET["BrandName"]))
				$nBrandName= $_GET["BrandName"];
				if(isset($_GET["Player"]))
				$nPlayer= $_GET["Player"];
				if(isset($_GET["League"]))
				$nLeague= $_GET["League"];
				if(isset($_GET["Country"]))
				$nCountry= $_GET["Country"];
				if(isset($_GET["ColorIDs"]))
				$nColorIDs= $_GET["ColorIDs"];
				if(isset($_GET["SizeChartID"]))
				$nSizeChartID= $_GET["SizeChartID"];
				if(isset($_GET["Size"]))
				$nSize= $_GET["Size"];
				if(isset($_GET["ForMenOrWomen"]))
				$nForMenOrWomen= $_GET["ForMenOrWomen"];
				if(isset($_GET["minprice"]))
				$nminprice= $_GET["minprice"];
				if(isset($_GET["maxprice"]))
				$nmaxprice= $_GET["maxprice"];
				if(isset($_GET["nomaxprice"]))
				$nnomaxprice= $_GET["nomaxprice"];
				if(isset($_GET["pmore"]))
				$pmore= $_GET["pmore"];
				if(isset($_GET["cmore"]))
				$cmore= $_GET["cmore"];
				if(isset($_GET["clmore"]))
				$clmore= $_GET["clmore"];
				if(isset($_GET["smore"]))
				$smore= $_GET["smore"];
?>						
						<div ><h2>Shop By</h2></div>
						<div class="advanced-search">
						<input type="hidden" id="c1" name="c1" value="<?php echo $c1?>">
						<input type="hidden" id="c2" name="c1" value="<?php echo $c2?>">
						<input type="hidden" id="BrandName" name="BrandName" value="<?php echo $nBrandName?>">
						<input type="hidden" id="Player" name="Player" value="<?php echo $nPlayer?>">
						<input type="hidden" id="League" name="League" value="<?php echo $nLeague?>">
						<input type="hidden" id="Country" name="Country" value="<?php echo $nCountry?>">
						<input type="hidden" id="ColorIDs" name="ColorIDs" value="<?php echo $nColorIDs?>">
						<input type="hidden" id="SizeChartID" name="SizeChartID" value="<?php echo $nSizeChartID?>">
						<input type="hidden" id="Size" name="Size" value="<?php echo $nSize?>">
						<input type="hidden" id="ForMenOrWomen" name="ForMenOrWomen" value="<?php echo $nForMenOrWomen?>">
						
						
							<!-- Advance search IF starts here -->
<?php
						$strSQL = "SELECT p.Cat2ID,count(p.Cat2ID) as cat2cnt,c.Cat2Name FROM Products p LEFT JOIN Category2 c ON(p.Cat2ID=c.Cat2ID) WHERE p.IsActive='Y' AND p.Cat2ID>0";
						if (!empty($nc2))
						$strSQL .= " AND p.Cat2ID='".$nc2."'";
						if (!empty($nBrandName))
						$strSQL .= " AND p.BrandName='".$nBrandName."'";
						if (!empty($nPlayer))
						$strSQL .= " AND p.Player='".$nPlayer."'";
						if (!empty($nLeague))
						$strSQL .= " AND p.League='".$nLeague."'";
						if (!empty($nCountry))
						$strSQL .= " AND p.Country='".$nCountry."'";
						if (!empty($nForMenOrWomen))
						$strSQL .= " AND p.ForMenOrWomen='".$nForMenOrWomen."'";
						if (!empty($nColorIDs))
						$strSQL .= " AND p.ColorIDs='".$nColorIDs."'";
						if (!empty($nSizeChartID))
						$strSQL .= " AND p.SizeChartID='".$nSizeChartID."'";
						if (!empty($nmaxprice))
						$strSQL .= " and p.UnitPriceOnSale BETWEEN ".$nminprice." and ".$nmaxprice;
						
						$strSQL .=" AND p.Cat1ID=".$c1." Group by p.Cat2ID Order by c.Cat2Name";
				//print_r($strSQL);	
						$CDB->query($strSQL);
						if ($CDB->rows > 0) {
							Echo "<dl><dt>Category</dt>";
							while($data = $CDB->fetch_array($CDB->res)) {							
								echo "<dd><a href=\"?c1=".$c1."&c2=".$data['Cat2ID']."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."\">".$data['Cat2Name']." (".$data['cat2cnt'].")</a></dd>";
							}
							echo "</dl>";
						}
						
						
						
						
						$strSQL = "SELECT BrandName,count(BrandName) as brandcnt FROM Products WHERE IsActive='Y' AND BrandName<>''";
						
						if (!empty($nc2))
						$strSQL .= "AND Cat2ID>0 AND Cat2ID='".$nc2."'";
						if (!empty($nBrandName))
						$strSQL .= " AND BrandName='".$nBrandName."'";
						if (!empty($nPlayer))
						$strSQL .= " AND Player='".$nPlayer."'";
						if (!empty($nLeague))
						$strSQL .= " AND League='".$nLeague."'";
						if (!empty($nCountry))
						$strSQL .= " AND Country='".$nCountry."'";
						if (!empty($nForMenOrWomen))
						$strSQL .= " AND ForMenOrWomen='".$nForMenOrWomen."'";
						if (!empty($nColorIDs))
						$strSQL .= " AND ColorIDs='".$nColorIDs."'";
						if (!empty($nSizeChartID))
						$strSQL .= " AND SizeChartID='".$nSizeChartID."'";
						if (!empty($nmaxprice))
						$strSQL .= " and UnitPriceOnSale BETWEEN ".$nminprice." and ".$nmaxprice;
						
						$strSQL .=" AND Cat1ID=".$c1." Group by BrandName";
				//print_r($bstrSQL);	
						$CDB->query($strSQL);
						if ($CDB->rows > 0) {
							Echo "<dl><dt>Brand</dt>";
							while($data = $CDB->fetch_array($CDB->res)) {							
								echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&BrandName=".$data['BrandName']."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."\">".$data['BrandName']." (".$data['brandcnt'].")</a></dd>";
							}
							echo "</dl>";
						}
						
						$strSQL = "SELECT ForMenOrWomen,count(ForMenOrWomen) as ForMenOrWomencnt FROM Products WHERE IsActive='Y' AND ForMenOrWomen<>''";
						
						if (!empty($nc2))
						$strSQL .= "AND Cat2ID>0 AND Cat2ID='".$nc2."'";
						if (!empty($nBrandName))
						$strSQL .= " AND BrandName='".$nBrandName."'";
						if (!empty($nPlayer))
						$strSQL .= " AND Player='".$nPlayer."'";
						if (!empty($nLeague))
						$strSQL .= " AND League='".$nLeague."'";
						if (!empty($nCountry))
						$strSQL .= " AND Country='".$nCountry."'";
						if (!empty($nForMenOrWomen))
						$strSQL .= " AND ForMenOrWomen='".$nForMenOrWomen."'";
						if (!empty($nColorIDs))
						$strSQL .= " AND ColorIDs='".$nColorIDs."'";
						if (!empty($nSizeChartID))
						$strSQL .= " AND SizeChartID='".$nSizeChartID."'";
						if (!empty($nmaxprice))
						$strSQL .= " and UnitPriceOnSale BETWEEN ".$nminprice." and ".$nmaxprice;
						
						$strSQL .=" AND Cat1ID=".$c1." Group by ForMenOrWomen";
				//print_r($bstrSQL);	
						$CDB->query($strSQL);
						if ($CDB->rows > 0) {
							Echo "<dl><dt>Made For</dt>";
							while($data = $CDB->fetch_array($CDB->res)) {							
								echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&ForMenOrWomen=".$data['ForMenOrWomen']."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&BrandName=".$nBrandName."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."\">".$data['ForMenOrWomen']." (".$data['ForMenOrWomencnt'].")</a></dd>";
							}
							echo "</dl>";
						}
						
						$strSQL = "SELECT Player,count(Player) as Playercnt FROM Products WHERE IsActive='Y' AND Player<>''";
						if (!empty($nc2))
						$strSQL .= " AND Cat2ID>0  AND Cat2ID='".$nc2."'";
						if (!empty($nBrandName))
						$strSQL .= " AND BrandName='".$nBrandName."'";
						if (!empty($nPlayer))
						$strSQL .= " AND Player='".$nPlayer."'";
						if (!empty($nLeague))
						$strSQL .= " AND League='".$nLeague."'";
						if (!empty($nCountry))
						$strSQL .= " AND Country='".$nCountry."'";
						if (!empty($nForMenOrWomen))
						$strSQL .= " AND ForMenOrWomen='".$nForMenOrWomen."'";
						if (!empty($nColorIDs))
						$strSQL .= " AND ColorIDs='".$nColorIDs."'";
						if (!empty($nSizeChartID))
						$strSQL .= " AND SizeChartID='".$nSizeChartID."'";
						if (!empty($nmaxprice))
						$strSQL .= " and UnitPriceOnSale BETWEEN ".$nminprice." and ".$nmaxprice;
						$strSQL .=" AND Cat1ID=".$c1." Group by Player Order by Player";
						if($pmore==0)
						$strSQL .=" Limit 0,10";
						
						$CDB->query($strSQL);
                        //print_r($pstrSQL);		
						if ($CDB->rows > 0) {
							
							Echo "<dl><dt>Player</dt>";
							while($data = $CDB->fetch_array($CDB->res)) {							
								echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&Player=".$data['Player']."&BrandName=".$nBrandName."&League=".$nLeague."&Country=".$nCountry."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."\">".$data['Player']." (".$data['Playercnt'].")</a></dd>";
							}
							if($pmore==0)
							{
								if($CDB->rows<10)
									echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&Player=".$data['Player']."&BrandName=".$nBrandName."&League=".$nLeague."&Country=".$nCountry."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."&pmore=0\"></a></dd>";
								else
									echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&Player=".$data['Player']."&BrandName=".$nBrandName."&League=".$nLeague."&Country=".$nCountry."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."&pmore=1\">More...</a></dd>";
							}
							else
								echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&Player=".$data['Player']."&BrandName=".$nBrandName."&League=".$nLeague."&Country=".$nCountry."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."&pmore=0\">Less...</a></dd>";
							
							echo "</dl>";
							
						}
						
						$strSQL = "SELECT League,count(League) as Leaguecnt FROM Products WHERE IsActive='Y' AND League<>'' ";
						if (!empty($nc2))
						$strSQL .= " AND Cat2ID>0  AND Cat2ID='".$nc2."'";
						if (!empty($nBrandName))
						$strSQL .= " AND BrandName='".$nBrandName."'";
						if (!empty($nPlayer))
						$strSQL .= " AND Player='".$nPlayer."'";
						if (!empty($nLeague))
						$strSQL .= " AND League='".$nLeague."'";
						if (!empty($nCountry))
						$strSQL .= " AND Country='".$nCountry."'";
						if (!empty($nForMenOrWomen))
						$strSQL .= " AND ForMenOrWomen='".$nForMenOrWomen."'";
						if (!empty($nColorIDs))
						$strSQL .= " AND ColorIDs='".$nColorIDs."'";
						if (!empty($nSizeChartID))
						$strSQL .= " AND SizeChartID='".$nSizeChartID."'";
						if (!empty($nmaxprice))
						$strSQL .= " and UnitPriceOnSale BETWEEN ".$nminprice." and ".$nmaxprice;
						
						$strSQL .=" AND Cat1ID=".$c1." Group by League";
						
						$CDB->query($strSQL);
						
						if ($CDB->rows > 0) {
							Echo "<dl><dt>League</dt>";
							while($data = $CDB->fetch_array($CDB->res)) {							
								echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&League=".$data['League']."&BrandName=".$nBrandName."&Player=".$nPlayer."&Country=".$nCountry."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."\">".$data['League']." (".$data['Leaguecnt'].")</a></dd>";
							}
							echo "</dl>";
						}						
						
						$strSQL = "SELECT Country,count(Country) as Countrycnt FROM Products WHERE IsActive='Y' AND Country<>'' ";						
						if (!empty($nc2))
						$strSQL .= " AND Cat2ID>0 AND Cat2ID='".$nc2."'";
						if (!empty($nBrandName))
						$strSQL .= " AND BrandName='".$nBrandName."'";
						if (!empty($nPlayer))
						$strSQL .= " AND Player='".$nPlayer."'";
						if (!empty($nLeague))
						$strSQL .= " AND League='".$nLeague."'";
						if (!empty($nCountry))
						$strSQL .= " AND Country='".$nCountry."'";
						if (!empty($nForMenOrWomen))
						$strSQL .= " AND ForMenOrWomen='".$nForMenOrWomen."'";
						if (!empty($nColorIDs))
						$strSQL .= " AND ColorIDs='".$nColorIDs."'";
						if (!empty($nSizeChartID))
						$strSQL .= " AND SizeChartID='".$nSizeChartID."'";
						if (!empty($nmaxprice))
						$strSQL .= " and UnitPriceOnSale BETWEEN ".$nminprice." and ".$nmaxprice;
						
						$strSQL .=" AND Cat1ID=".$c1." Group by Country";
						if($cmore==0)
						$strSQL .=" Limit 0,10";
						
						$CDB->query($strSQL);
						if ($CDB->rows > 0) {
							Echo "<dl><dt>Country</dt>";
							while($data = $CDB->fetch_array($CDB->res)) {							
								echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&Country=".$data['Country']."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."\">".$data['Country']." (".$data['Countrycnt'].")</a></dd>";
							}
							
							if($cmore==0)
							{
								if($CDB->rows<10)
									echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&Country=".$data['Country']."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."\"></a></dd>";
								else
									echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&Country=".$data['Country']."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."&cmore=1\">More...</a></dd>";
							}
							else
								echo  "<a href=\"?c1=".$c1."&c2=".$c2."&Country=".$data['Country']."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&ForMenOrWomen=".$nForMenOrWomen."&ColorIDs=".$nColorIDs."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."&cmore=0\">Less...</a></br>";
							
							echo "</dl>";
						}
	/*					
						$strSQL = "SELECT c.ColorID,p.ColorIDs,count(p.ColorIDs) as ColorIDscnt,c.Color FROM Products p LEFT JOIN Colors c ON(p.ColorIDs=c.ColorID) WHERE p.IsActive='Y' AND p.ColorIDs<>'' ";
						if (!empty($nc2))
						$strSQL .= "  AND Cat2ID>0  AND p.Cat2ID='".$nc2."'";
						if (!empty($nBrandName))
						$strSQL .= " AND p.BrandName='".$nBrandName."'";
						if (!empty($nPlayer))
						$strSQL .= " AND p.Player='".$nPlayer."'";
						if (!empty($nLeague))
						$strSQL .= " AND p.League='".$nLeague."'";
						if (!empty($nCountry))
						$strSQL .= " AND p.Country='".$nCountry."'";
						if (!empty($nColorIDs))
						$strSQL .= " AND p.ColorIDs='".$nColorIDs."'";
						if (!empty($nSizeChartID))
						$strSQL .= " AND p.SizeChartID='".$nSizeChartID."'";
						if (!empty($nmaxprice))
						$strSQL .= " and p.UnitPriceOnSale BETWEEN ".$nminprice." and ".$nmaxprice;
						
						$strSQL .=" AND p.Cat1ID=".$c1." Group by c.ColorID";
						if($clmore==0)
						$strSQL .=" Limit 0,10";
					//print_r($strSQL);	
						$CDB->query($strSQL);
						if ($CDB->rows > 0) {
							Echo "<dl><dt>Color</dt>";
							while($data = $CDB->fetch_array($CDB->res)) {							
								echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&ColorIDs=".$data['ColorIDs']."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."\">".$data['Color']." (".$data['ColorIDscnt'].")</a></dd>";
							}
							
							if($clmore==0)
							{
								if($CDB->rows<10)
									echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&ColorIDs=".$data['ColorIDs']."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."\"></a></dd>";
								else
									echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&ColorIDs=".$data['ColorIDs']."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."&clmore=1\">More...</a></dd>";
							}
							else
								echo  "<dd><a href=\"?c1=".$c1."&c2=".$c2."&ColorIDs=".$data['ColorIDs']."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$nSizeChartID."&Size=".$nSize."&clmore=0\">Less...</a></dd>";
			
							echo "</dl>";
						}
	*/					
						$strSQL = "SELECT p.SizeChartID,s.Size,count(s.Size) as Sizecnt FROM Products p, Size s  WHERE p.IsActive='Y' and p.SizeChartID=s.SizeChartID and s.Size<>'' ";
						if (!empty($nc2))
						$strSQL .= "  AND Cat2ID>0  AND p.Cat2ID='".$nc2."'";
						if (!empty($nBrandName))
						$strSQL .= " AND p.BrandName='".$nBrandName."'";
						if (!empty($nPlayer))
						$strSQL .= " AND p.Player='".$nPlayer."'";
						if (!empty($nLeague))
						$strSQL .= " AND p.League='".$nLeague."'";
						if (!empty($nCountry))
						$strSQL .= " AND p.Country='".$nCountry."'";
						if (!empty($nColorIDs))
						$strSQL .= " AND p.ColorIDs='".$nColorIDs."'";
						if (!empty($nSizeChartID))
						$strSQL .= " AND p.SizeChartID=".$nSizeChartID;
						if (!empty($nmaxprice))
						$strSQL .= " and p.UnitPriceOnSale BETWEEN ".$nminprice." and ".$nmaxprice;
						
						$strSQL .=" AND p.Cat1ID=".$c1." Group by s.Size Order by s.Order";
						if($smore==0)
						$strSQL .=" Limit 0,5";
					//print_r($strSQL);	
						$CDB->query($strSQL);
						if ($CDB->rows > 1) {
							
							Echo "<dl><dt>Size</dt>";
							while($data = $CDB->fetch_array($CDB->res)) {							
								echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&ColorIDs=".$nColorIDs."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$data['SizeChartID']."&Size=".$data['Size']."\">".$data['Size']." (".$data['Sizecnt'].")</a></dd>";
							}
							if($smore==0)
							{
								if($CDB->rows<5)
									echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&ColorIDs=".$nColorIDs."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$data['SizeChartID']."&Size=".$data['Size']."\"></a></dd>";
								else
									echo "<dd><a href=\"?c1=".$c1."&c2=".$c2."&ColorIDs=".$nColorIDs."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$data['SizeChartID']."&Size=".$data['Size']."&smore=1\">More...</a></dd>";
							}
							else
								echo  "<dd><a href=\"?c1=".$c1."&c2=".$c2."&ColorIDs=".$nColorIDs."&BrandName=".$nBrandName."&Player=".$nPlayer."&League=".$nLeague."&Country=".$nCountry."&minprice=".$nminprice."&maxprice=".$nmaxprice."&SizeChartID=".$data['SizeChartID']."&Size=".$data['Size']."&smore=0\">Less...</a></dd>";
			
							echo "</dl>";
						}
						
						$strSQL = "SELECT Max(UnitPriceOnSale) as maxprice FROM Products WHERE IsActive='Y' ";						
						if (!empty($nc2))
						$strSQL .= "  AND Cat2ID>0  AND Cat2ID='".$nc2."'";
						if (!empty($nBrandName))
						$strSQL .= " AND BrandName='".$nBrandName."'";
						if (!empty($nPlayer))
						$strSQL .= " AND Player='".$nPlayer."'";
						if (!empty($nLeague))
						$strSQL .= " AND League='".$nLeague."'";
						if (!empty($nCountry))
						$strSQL .= " AND Country='".$nCountry."'";
						if (!empty($nColorIDs))
						$strSQL .= " AND ColorIDs='".$nColorIDs."'";
						if (!empty($nSizeChartID))
						$strSQL .= " AND SizeChartID='".$nSizeChartID."'";
						
						$strSQL .=" AND Cat1ID=".$c1;						
						
						$CDB->query($strSQL);
						if ($CDB->rows > 0) {
						while($data = $CDB->fetch_array($CDB->res)) {							
								$rmaxprice=$data["maxprice"];
								//print_r($data["maxprice"]);
							}
						if ($nmaxprice==0)
							$nmaxprice=$rmaxprice;
						if ($nminprice==0)
							$nminprice=0;	
						    $rmaxprice=$rmaxprice;
}
						
						
						
						
						//Echo "<b>Price</b><br>";
						Echo "<input type=\"hidden\" name=\"minprice\" id=\"minprice\" size=\"3\" value=\"\"><input type=\"hidden\" name=\"maxprice\" id=\"maxprice\" size=\"3\" value=\"\"> <br>";	
?>							
									
							
						</div>
						<script type="text/javascript">
						function sprice(){
							var c1=document.getElementById('c1').value;
							var c2=document.getElementById('c2').value;		
							var BrandName=document.getElementById('BrandName').value;
							var Player=document.getElementById('Player').value;
							var League=document.getElementById('League').value;
							var Country=document.getElementById('Country').value;
							var ColorIDs=document.getElementById('ColorIDs').value;
							var SizeChartID=document.getElementById('SizeChartID').value;
							var Size=document.getElementById('Size').value;
							var minprice=parseInt(document.getElementById('minprice').value);
							var maxprice=parseInt(document.getElementById('maxprice').value);		
							
							if (document.getElementById('minprice').value=='')
								minprice=0;
							if (document.getElementById('maxprice').value=='')
								maxprice=0;	
							window.location="?c1="+c1+"&c2="+c2+"&minprice="+minprice+"&maxprice="+maxprice+"&BrandName="+BrandName+"&Player="+Player+"&League="+League+"&Country="+Country+"&ColorIDs="+ColorIDs+"&SizeChartID="+SizeChartID+"&Size="+Size;	
							
							
							
						}
						$("#minprice").keypress(function (e) {
							if (e.keyCode == '13') {
								sprice();
								
							}
						});
						$("#maxprice").keypress(function (e) {
							if (e.keyCode == '13') {
								sprice();
								
							}
						});
						</script>
<?php 
	}
?>
						
					</div>
				