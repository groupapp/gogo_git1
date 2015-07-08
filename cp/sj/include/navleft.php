					<!-- //***************************** NAVLEFT *******************************// -->
					<div class="left-col">
					<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
				    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
					
<?php 
	$CDB = new myDB;
	$strSQL = "SELECT *FROM ClockImg WHERE IsActive='Y' AND TargetDate>now() ORDER BY ClockID DESC LIMIT 1";
	$CDB->query($strSQL);
	if ($CDB->rows > 0) {
		$rs = $CDB->fetch_array($CDB->res);
		$targetYear		= date("Y", strtotime($rs['TargetDate']));
		$targetMonth	= date("m", strtotime($rs['TargetDate']));
		$targetDay		= date("d", strtotime($rs['TargetDate']));
		$targetHour		= date("H", strtotime($rs['TargetDate']));
		$targetMin		= date("i", strtotime($rs['TargetDate']));
		$targetSec		= date("s", strtotime($rs['TargetDate']));
		$clockImage		= $rs['ClockImg'];
		$cssColor		= $rs['cssName'] ? $rs['cssName'] : "black";
		$hexColor		= $rs['hexColor'] ? "#".$rs['hexColor'] : "#999";
		$arrImage 		= getimagesize($_SERVER['DOCUMENT_ROOT']."/images/banner/".$clockImage);
		//print_array($arrImage);
		if (is_array($arrImage)) {
			$clockBackground = "style=\"background-image: url(/images/banner/".$clockImage.");\"";
		} else {
			$txt_title = $rs['Name'];
		}
?>						<link rel="stylesheet" type="text/css" media="screen" href="/css/countdown_<?php echo $cssColor?>.css" />
						<style type="text/css">.dash { width: 70px; height: 45px; float: left; margin-left: 2px; padding-left: 0px; margin-top: 4px; padding-top: 0; position: relative; color: <?php echo $hexColor?>; }</style>
						<div id="countdown_dashboard" <?php echo $clockBackground?>>
							<div class="clock_title"><?php echo $txt_title?></div>
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
	}
	if ($c1) {
				$nc2= $_GET["c2"];
				$nBrandName= $_GET["BrandName"];				
				$nPlayer= $_GET["Player"];
				$nLeague= $_GET["League"];
				$nCountry= $_GET["Country"];
				$nColorIDs= $_GET["ColorIDs"];
				$nSizeChartID= $_GET["SizeChartID"];
				$nSize= $_GET["Size"];
				$nForMenOrWomen= $_GET["ForMenOrWomen"];
				$nminprice= $_GET["minprice"];
				$nmaxprice= $_GET["maxprice"];
				$nnomaxprice= $_GET["nomaxprice"];
				$pmore= $_GET["pmore"];
				$cmore= $_GET["cmore"];
				$clmore= $_GET["clmore"];
				$smore= $_GET["smore"];
?>						
						<div class="advanced-search-title"><h2>Shop By</h2></div>
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
						<dl>
							<dt>Price Range : <span type="text" id="amount" style="color: #fff; font-weight: bold;"></span></dt>
							<dd style="width:200px;padding-left:8px;"><div id="slider-range"></div></dd>
						</dl>	
						
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
						<script>
						  $(function() {
							$( "#slider-range" ).slider({
							  range: true,
							  min: 0,
							  max: <?php echo $rmaxprice?>+1,
							  values: [  <?php echo $nminprice?> , <?php echo $nmaxprice?> ],
							  slide: function( event, ui ) {
								$("#amount").html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
							    $("#minprice").val(ui.values[ 0 ]);
								$("#maxprice").val(ui.values[ 1 ]);
								sprice();
							  }
							});
							$( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
							  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
						  });
						  </script>						
												
							
							<!--<img src="" width=220 height=500 />-->
							
							<!-- Advance search IF ends here -->
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
							/*
							if ((minprice>0) )
							{
								if (maxprice>0 ){
									if(minprice>=maxprice)
									{
									alert('Please input more then min price');
									return;
									}
									else
									window.location="?c1="+c1+"&minprice="+minprice+"&maxprice="+maxprice+"&BrandName="+BrandName+"&Player="+Player+"&League="+League+"&Country="+Country+"&ColorIDs="+ColorIDs+"&SizeChartID="+SizeChartID+"&Size="+Size;
								}
								else
								{
								
								window.location="?c1="+c1+"&minprice="+minprice+"&maxprice="+maxprice+"&BrandName="+BrandName+"&Player="+Player+"&League="+League+"&Country="+Country+"&ColorIDs="+ColorIDs+"&SizeChartID="+SizeChartID+"&Size="+Size;
								}
							}
							else
								alert('Please input min price');
								return;*/
							
							
							
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
						<div class="nav-left">
<?php
	if ($arrGet[1][0]=="account") {
?>						
							<div class="block block-account">
								<div class="block-title">
							        <strong><span>My Account</span></strong>
							    </div>
							    <div class="block-content">
							        <ul>
							        	<li class="current"><strong>Account Dashboard</strong></li>
										<li><a href="">Account Information</a></li>
										<li><a href="">Address Book</a></li>
										<li><a href="">My Orders</a></li>
										<li><a href="">Billing Agreements</a></li>
										<li><a href="">Recurring Profiles</a></li>
										<li><a href="">My Product Reviews</a></li>
										<li><a href="">My Tags</a></li>
										<li><a href="">My Wishlist</a></li>
										<li><a href="">My Applications</a></li>
										<li><a href="">Newsletter Subscriptions</a></li>
										<li class="last"><a href="">My Downloadable Products</a></li>
									</ul>
							    </div>
							</div>
<?php 
	}
?>
							<div class="nav-wrapper">
								<ul id="nav">
<?php
									// Menu Left
									for ($i=1; $i<=count($subMenu); $i++) {
										$href = (empty($subMenu[$i-1][1]))?"javascript:void(0);":"/?" . $subMenu[$i-1][1];
										echo "<li class=\"level0 nav-{$i} level-top";
										if (count(${$subMenu[$i-1][2]}) || $subMenu[$i-1][2]=="category") {
											echo " parent";
										}
										echo "\">";
										echo "<a href=\"".$href."\" class=\"\">".$subMenu[$i-1][0]."</a>";
										if (count(${$subMenu[$i-1][2]})) {
											echo "<ul class=\"level1\" style=\"display: none\">";
											for ($j=1; $j<count(${$subMenu[$i-1][2]})+1; $j++) {
												if (count($subMenu[$i-1]) > 3 && $subMenu[$i-1][3] > 0) {
													$href = "?" . ${$subMenu[$i-1][2]}[$j-1][1];
													$link = "<a href=\"".$href."\">".${$subMenu[$i-1][2]}[$j-1][0]."</a>";
												} else {
													$href = "?" . $subMenu[$i-1][2] . "=" . ${$subMenu[$i-1][2]}[$j-1];
													$link = "<a href=\"".$href."\">".${$subMenu[$i-1][2]}[$j-1]."</a>";
												}
												echo "<li class=\"level1 nav-1-{$j}\">";
												echo $link;
												echo "</li>";
											}
											echo "</ul>";
										} elseif ($subMenu[$i-1][2]=="category") {
											//print_r(get_declared_classes());
											if (!class_exists($DB)) $DB = new myDB();
											$DB->query("SELECT * FROM Category1 WHERE Cat1ID<>17 ORDER BY Cat1SortNo ASC");
											if ($DB->rows > 0) {
												$k = 1;
												echo "<ul class=\"level1\" style=\"display: none\">";
												while ($rs = $DB->fetch_array($DB->res)) {
													if($rs["Cat1ID"]==21){
														
													}else{
														$href = "?c1=" . $rs["Cat1ID"];
														echo "<li class=\"level1 nav-1-{$k}\">";
														echo "<a href=\"".$href."\">".$rs["Cat1Name"]."</a>";
														echo "</li>";
													}
												}
												echo "</ul>";
											}
										}
										echo "</li>";
									}
?>
								</ul>
							</div>
							
							<div class="block block-cart">
								<div class="block-title"><strong><span>My Cart</span></strong></div>
								<div class="block-content">
<?php
	// Mini cart summary
	if (empty($_SESSION['cart'])) {
		echo "<p class=\"empty\">You have no items in your shopping cart.</p>";
	} else {
		$cart_qty = multiDimArrSum($_SESSION['cart']);
?>
								<div class="summary">
									<p class="amount-2">
<?php 
		if ($cart_qty > 1) {
			echo "There are <a href=\"/?page=mycart\"> $cart_qty items</a> in your cart.";
		} else {
			echo "There is <a href=\"/?page=mycart\"> $cart_qty item</a> in your cart."; 
		}
?>								
									</p>
									<p class="subtotal">
										<span class="label">Cart Subtotal:</span>
										<span class="price">$<?php echo formatMoney(getCartTotal(),true)?></span>
									</p>
								</div>
								<div class="actions">
									<button type="button" title="Checkout" class="button" onclick="location.href='/?page=checkout'">Checkout</button>
								</div>
								
								<p class="block-subtitle">Recently added item(s)</p>
								<ol id="cart-sidebar" class="mini-products-list">
<?php 
		// Mini cart List
		$DB 		= new myDB;
		$cart_qty 	= multiDimArrSum($_SESSION['cart']);
		$item_qty 	= count($_SESSION['cart']);
		$arrCart 	= array_reverse($_SESSION['cart'], true);
		$n			= 1;
		$cnt		= 0;
		$dc			= 1;
		if (!empty($_COOKIE['VIP']['ratio'])) {
			$dc	= 1 - (int) $_COOKIE['VIP']['ratio'] / 100;
		}
		foreach($arrCart as $cart_item => $val) {
			$DB->query("SELECT Picture1, ProductName, UnitPriceOnSale, FeeForPersonalization, Weight_Pounds FROM Products WHERE ProductID=".$cart_item);
			$prod_qty = multiDimArrSum($arrCart[$cart_item]);
			if (is_array($val)) {
				$arrKey = array_keys($val);
			}
			list($prod_img, $prod_name, $prod_price, $persona_fee, $prod_weight) = $DB->fetch_array($DB->res);
?>
									<li class="item<?php echo ($cnt==2||$cnt==($item_qty-1))?" last":null;?>">
										<a href="/?pid=<?php echo $cart_item?>" class="product-image">
											<img src="<?php echo PRODUCT_IMAGE_PATH.$prod_img?>" width="64" height="64" />
										</a>
										<div class="product-details">
											<a href="javascript:void(0)" class="btn-remove" title="Remove This Item" onclick="remove_mini_item(<?php echo $cart_item?>)">Remove This Item</a>
											<p class="product-name">
												<a href="/?pid=<?php echo $cart_item?>"><?php echo $prod_name?></a>
											</p>
											<strong><?php echo $prod_qty?></strong> X <span class="price">
<?php 
			if (!empty($_SESSION['personalized'][$cart_item])) {
				echo "($".formatMoney($prod_price * $dc, true)." + $".formatMoney($persona_fee * $dc, true).")</span>";
			} elseif (!empty($_SESSION['emblem'][$cart_item])) {
				echo "($".formatMoney($prod_price * $dc, true)." + $".formatMoney($_SESSION['emblem'][$cart_item][$arrKey[0]], true).")</span>";
			} else {
				echo "$".formatMoney($prod_price * $dc, true)."</span>";
			}
?>									
										</div>
									</li>
										
<?php 
			$cnt++;
			$n = 1 - $n;
			if ($cnt>2) break;
		}
		echo "</ol>";
	} // end if empty($_SESSION['cart'])
?>								
									
								</div>
							</div>
							<!-- 
							<div class="block block-compare">
								<div class="block-title"><strong><span>Compare Products</span></strong></div>
								<div class="block-content"><p class="empty">You have no items to compare.</p></div>
							</div>
							-->
							<div class="block block-subscribe">
								<div class="block-title"><strong><span>Newsletter</span></strong></div>
								<form action="/lib/newsletter_action.php" method="post" id="">
									<div class="block-content">
										<p>SIGN UP AND SAVE! Subscribe to SoccerShopUSA.com and get a Welcome Offer plus exclusive treat on your Birthday.</p>
										<div class="input-box">
											<input type="text" name="email" id="newsletter" title="Sign up for our newsletter" class="input-text required-entry validate-email" style="margin-top: 10px;"/>
										</div>
										<div class="actions">
											<button type="submit" title="Subscribe" class="button" onclick="return Subscribe(this.form)">
												<span>Subscribe</span>
											</button>
											<input type="hidden" name="action" value="submit"/>
										</div>
									</div>
								</form>
							</div>
							<div class="amazon-logo">
								<a target="_blank" href="http://www.amazonpaymentsblog.com/amazon_payments_blog/checkout-by-amazon/page/2/" title="Additional Options" onclick=""><img src="/images/amazon_payments.png" /></a>
								<div class="visa-logo"><img src="/images/visa_logo.png"/></div>
							</div>

							<!--
							<div class="block block-poll last_block">
								<div class="block-title"><strong><span>Community Poll</span></strong></div>
								<form id="frmPoll" action="" method="post" onsubmit="return validatePollAnswerIsSelected();">
									<div class="block-content">
										<p class="block-subtitle">Whiat is the main reason for you to purchase online?</p>
										<ul id="poll-answers">
											<li class="odd">
												<input type="radio" name="vote" class="radio poll_vote" id="vote_1" value="1" />
												<span class="label"><label for="vote_1">More convenient shipping and delivery</label>
												</span>
											</li>
											<li class="even">
												<input type="radio" name="vote" class="radio poll_vote" id="vote_2" value="2" />
												<span class="label"><label for="vote_2">Lower price</label>
												</span>
											</li>
											<li class="odd">
												<input type="radio" name="vote" class="radio poll_vote" id="vote_3" value="3" />
												<span class="label"><label for="vote_2">Bigger choice</label>
												</span>
											</li>
											<li>
							                    <input type="radio" name="vote" class="radio poll_vote" id="vote_4" value="4" />
							                    <span class="label"><label for="vote_4">Centralized product search procedure (without having to leave your home)</label></span>
							                </li>
							                                <li>
							                    <input type="radio" name="vote" class="radio poll_vote" id="vote_5" value="5" />
							                    <span class="label"><label for="vote_5">Payments security</label></span>
							                </li>
							                                <li>
							                    <input type="radio" name="vote" class="radio poll_vote" id="vote_6" value="6" />
							                    <span class="label"><label for="vote_6">30-day Money Back Guarantee</label></span>
							                </li>
							                                <li>
							                    <input type="radio" name="vote" class="radio poll_vote" id="vote_7" value="7" />
							                    <span class="label"><label for="vote_7">Other.</label></span>
							                </li>
										</ul>
										<script type="text/javascript">//decorateList('poll-answers');</script>
										<div class="actions">
											<button type="submit" title="Vote" class="button"><span>Vote</span></button>
										</div>
									</div>
								</form>
							</div>
							-->
						</div>
					</div>
					<!-- //***************************** END NAVLEFT *******************************// -->