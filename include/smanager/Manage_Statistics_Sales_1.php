<?php 
	require_once("header.php");
	
	$Action		= $_GET["Action"];
	$SalesMonth	= $_GET["SalesMonth"];
	$SalesYear	= $_GET["SalesYear"];
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
		<div id="contwrapper">
			<div id="title">
				Sales Amounts (Total Shipped Order Amounts)
			</div>
			<div id="sub1">
				<form method="get" action="Manage_Statistics_Sales.php">
					<table>
						<tr>
							<td class="general">
								<select name="Action">
									<option value="DailySales" <?php if($Action=="DailySales") echo "selected";?>>Daily Sales</option>
									<option value="MonthlySales" <?php if($Action=="MonthlySales") echo "selected";?>>Monthly Sales</option>
								</select>
								<select name="SalesMonth">
									<?php 
									$thisMonth = date('m');
									$curMonth = date("M");
									echo $thisMonth;
									for($i = 1; $i<=12; $i++){
										$monName = date("M" , mktime(0, 0, 0, $i, 12));
										if($MonthSelected>0){
											if($i == $MonthSelected){
												//$monName = data("F" , mktime(0, 0, 0, $i, 10));
												echo "<option value=\"". $i . "\" selected>&nbsp; " . $monName . "</option>";
											}else{
												//$monName = data("F" , mktime(0, 0, 0, $i, 10));
												echo "<option value=\"". $i . "\">&nbsp; " . $monName . "</option>";
											}
										}else{
											if($i == $thisMonth){
												echo "<option value=\"". $i . "\" selected>&nbsp; " . $curMonth . "</option>";
											}else{
												echo "<option value=\"". $i . "\">&nbsp; " . $monName . "</option>";
											}									
										}
									}
								?>
								</select>
								<select name="SalesYear">
								<?php 
									$thisYear = date('Y');
									for($i = 2008; $i<=$thisYear; $i++){
										if($YearSelected>0){
											if($i == $YearSelected){
												echo "<option value=\"". $i . "\" selected>&nbsp; " . $i . "</option>";
											}else{
												echo "<option value=\"". $i . "\">&nbsp; " . $i . "</option>";
											}
										}else{
											if($i == $thisYear){
												echo "<option value=\"". $i . "\" selected>&nbsp; " . $i . "</option>";
											}else{
												echo "<option value=\"". $i . "\">&nbsp; " . $i . "</option>";
											}
										}
									}	
								?>
								</select>
								<input type="submit" name="submit" value="Submit">
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div id="sub2">
				<table>
					<tr>					
						<td colspan="2" class="general_c"><b><?php 
							if($Action=="DailySales"){
								echo "Daily Sales";
							}elseif($Action=="MonthlySales"){
								echo "Monthly Sales";
							}else{
								echo "Daily Sales";
							}
						?><br/>(<?php
							$monName2 = date("F" , mktime(0, 0, 0, $i, 12));
							$curMonth2 = date("F");
								if($SalesMonth!=null){
									echo $monName2;
								}else{
									echo $curMonth2;
								}?> , <?php 
								if($SalesYear!=null){
									echo $SalesYear;
								}else{
									echo $thisYear;
								}?>)</b></td>
					</tr>
					<tr>
						<td rowspan="2" class="general_c">Amount<br/>($)</td>
						<td class="general"><?php //graph location ?></td>
					</tr>
					<tr>
						<td class="general_c">Dates</td>
					</tr>
				</table>
			</div>
		
<?php require_once("footer.php"); ?>