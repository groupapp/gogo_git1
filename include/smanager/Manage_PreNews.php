<?php 
	require_once("../include/function.php"); 

	
	$MailID						= $_REQUEST["MailID"];
	
	$DB 	= new myDB;
	$DBm 	= new myDB;
	$DBm1 	= new myDB;
	
?>
<body class="noback">

		
<?php 
	$strSQLm1 = "SELECT * FROM Mails  WHERE MailID=".$MailID;
	$DBm1->query($strSQLm1);
	
	while ($datam1 = $DBm1->fetch_array($DBm1->res)){
		$Subject=$datam1['Subject'];
		$Contents=$datam1['Contents'];	
	}
	$strSQL = "SELECT a.*,b.* FROM MailItems a,Products b WHERE a.ProductID=b.ProductID and a.MailID=".$MailID. " Order by a.SortNo";
	$DB->query($strSQL);
	
?>
	<p><img src="http://lemontreeclothing.com/images/header_back.png" ></p>
	<div id="sub4">

			<table>
					<input type="hidden" name="MailID" value="<?php echo $MailID?>"/> 
					<tr >
						<td><table><tr>
						<td class="subject1_2" style="width: 40%;"></td>
						<td class="subject1_2">Preview Newsletter</td>
						<td class="subject1_2" style="width: 40%;"></td>
						</tr></table>
						</td>
					</tr>
					<tr >
						<td>
						<table>
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td style="width:100px"><span style="margin-left:20px;">Subject</span></td>
						<td ><?php echo $Subject?> </td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						</table>
						</td>
					</tr>
					<tr >
						<td>
						<table style="margin-left:20px;"><tr><td  ><?php echo $Contents?></td></tr></table>
						</td>
					</tr>

				<tr>
					<td colspan="3">
	
	
<?php 
		$n=1;
		echo "<div id=\"mailpro\">";
		while ($data = $DB->fetch_array($DB->res)){
		
			echo "<ul id=\"sortable\">";
			echo "<li id=\"i_". $data["ProductID"] ."\" style=\"border: 1px solid #ffffff;background:#ffffff url('images/ui-bg_glass_100_f6f6f6_1x400.png') 50% 50% repeat-x;width: 170px;height: 280px;padding-left: 0.0em;\" class=\"ui-state-default\"><span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<input type=\"hidden\" name=\"productid[]\" id=\"productid\" value=\"" . $data["ProductID"] . "\"/>";

			echo "<table width=\"100%\">";
			echo "<tr><td class=\"general_c\">";
			echo $data["StyleNo"] ."<br/>";
			echo "$" . $data["UnitPriceOnSale"] . " &nbsp;(<s>$" . $data["UnitPrice"] . "</s>)";
			echo "</td></tr>";
			echo "<tr><td class=\"general_c\">";
			//echo "<a href=\"Manage_News.php?act=view&aid=" . $data["ProductID"] . "&Display_ActiveItems_By=".$Display_ActiveItems_By."&Display_ActiveItems_In=".$Display_ActiveItems_In."&pp=".$pp."&ppAI=".$ppAI."&ppII=".$ppII."\">";
			if($data["Picture1"]!=null){
				echo "<img src=\"/Images_Products/" . $data["Picture1"] . "\" width=\"170\" height=\"250\" border=\"0\"/>";
			}else{
				echo "<img src=\"/Images_Products/ComingSoon.jpg\" width=\"170\" height=\"250\" border=\"0\"/>";
			}
			echo "</td></tr>";
			//echo "<tr><td class=\"general_c\">";
			//echo $data["BrandName"] . "<br/>";
			//echo "<b>".substr($data["ProductName"], 0, 100)."</b>";
			//echo "</td></tr></table></li>";
			echo "</table></li>";
			$n=$n+1;
		}
		echo "</div>";
?>							
						</td>
					</tr>
			</table>
		</div>
</body>	
<?php 
	$DB->close();	//DB close
	$DBm1->close();	//DB close
?>