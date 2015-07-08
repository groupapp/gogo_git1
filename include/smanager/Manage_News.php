<?php 
	require_once("header.php"); 

	$action						= $_REQUEST["action"];
	$ProductID					= $_POST["ProductID"];
//	$Edit_Country1	= $_POST["Country"];
	$productid_copy				= $_POST["productid_copy"];
	
	$MailID						= $_REQUEST["MailID"];
	$Subject						= $_REQUEST["subject"];
	$Contents						= $_REQUEST["editor1"];
	$User							= $_COOKIE['aduserID'];
	$add						= $_REQUEST["add"];
	$update						= $_REQUEST["update"];

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
	$sppII					= empty($_GET["sppII"])?null:$_GET["sppII"];
	$display				= empty($_GET["display"])?null:$_GET["display"];
	$orderType				= empty($_GET["orderType"])?null:$_GET["orderType"];
	
	$DB 	= new myDB;
	$DBm 	= new myDB;
	$DBm1 	= new myDB;
	$DBd 	= new myDB;
	$DBi 	= new myDB;
	$DBu 	= new myDB;
	if($action=='listdel')
	{
		$strSQLd = "DELETE FROM Mails WHERE MAilID=".$MailID;
		//echo $strSQLd;
		$DBd->query($strSQLd);

		$strSQLd = "DELETE FROM MailItems WHERE MAilID=".$MailID;
		//echo $strSQLd;
		$DBd->query($strSQLd);

	}
	else if ($add=='Add')
	{
		$strSQLi = "Insert into  Mails (Subject,Contents,User,CreatDate,ModifyDate) Values ('".$Subject."','".$Contents."','".$User."',now(),now())";// Where IsActive = 'N'" . $strActSQL;
		//echo $strSQLi;
		$DBi->query($strSQLi);
	}
	else if ($update=='Update')
	{
		$strSQLu = "UPDATE  Mails SET Subject='".$Subject."',Contents='".$Contents."',User='".$User."',ModifyDate=now() WHERE MailID=".$MailID;// Where IsActive = 'N'" . $strActSQL;
		//echo $strSQLu;
		$DBu->query($strSQLu);

	}
?>


<!-- sideMenu 
<div class="path" style='display: block'>About Us</div>-->

	<script type="text/javascript" src="/js/ckeditor.js"></script>

<div id="bodywrapper">

	<!-- sideMenu -->
	<div id="navLeft">
		<div style="font: bold 16px/1.2 Palatino Linotype; color: #aaa;">Lemontree
			Events</div>
		<div id="eventCalendarDefault" class="eventCalendar_wrap">
			<br />

		</div>

	</div>

	
	<!-- content right -->
	<div id="contwrapper" style="border-left: 1px solid #BBB;">
		<div id="title">Manage News Letter</div>
			<div id="sub7">
			<table>
				
				<form name="DisplayActiveItems_Form" method="POST" action="Manage_News.php">
				<tbody>
						<tr >
							<td class="subject1_2" style="text-align:left">No</td>
							<td class="subject1_2" width="50">Subject</td>
							<td class="subject1_2">User</td>
							<td class="subject1_2" >Create Date</td>
							<td class="subject1_2">Modify Date</td>
							<td class="subject1_2">Delete?</td>
						</tr>
						
				<?php 
					$strSQLm = "SELECT * FROM Mails";// Where IsActive = 'N'" . $strActSQL;
					$DBm->query($strSQLm);
					//echo $strSQLm;
					while ($datam = $DBm->fetch_array($DBm->res)){
					echo "<tr class='thin_border_bottom' >";
					echo "<td onclick='mail(".$datam['MailID'].")' style='cursor: pointer;'>".$datam['MailID']."</td>";
					echo "<td onclick='mail(".$datam['MailID'].")' style='text-align:left; width: 700px;cursor: pointer;'>".$datam['Subject']."</td>";
					echo "<td onclick='mail(".$datam['MailID'].")' style='cursor: pointer;'>".$datam['User']."</td>";
					echo "<td style='text-align:center;cursor: pointer;' onclick='mail(".$datam['MailID'].")' >".$datam['CreatDate']."</td>";
					echo "<td style='text-align:center;cursor: pointer;' onclick='mail(".$datam['MailID'].")' >".$datam['ModifyDate']."</td>";
					echo "<td style='text-align:center'><input type='button' onclick='listdel(".$datam['MailID'].")' value='Delete' ></td>";
					echo "</tr>";
					//<a href='Manage_News.php?MailID=".$datam['MailID']."'>
					}
				?>
				</tbody>
				</form>
				<script type="text/javascript">
				function mail(id)
				{
					//alert(id);
					location="Manage_News.php?MailID="+id;
				}
				</script>
				</table>
<?php 
	$strSQLm1 = "SELECT * FROM Mails  WHERE MailID=".$MailID;
	//echo $strSQLm1;
	$DBm1->query($strSQLm1);
	
	while ($datam1 = $DBm1->fetch_array($DBm1->res)){
		$Subject=$datam1['Subject'];
		$Contents=$datam1['Contents'];	
	}
	$strSQL = "SELECT a.*,b.* FROM MailItems a,Products b WHERE a.ProductID=b.ProductID and a.MailID=".$MailID;// Where IsActive = 'N'" . $strActSQL;
	$strOrd	= " ORDER BY SortNo ";
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
				

			</div>
			<div id="sub4">

			<table>
				
				<form name="DisplayActiveItems_Form" method="POST" action="Manage_News.php">
					<input type="hidden" id="MailID" name="MailID" value="<?php echo $MailID?>"/> 
					
					<tr >
						<td>
						<table>
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td  >Subject</td>
						<td ><input type="text" id="subject" name="subject" value="<?php echo $Subject?>" style="width:400px;"></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						</table>
						</td>
					</tr>
					<tr >
						<td>
						<table><tr><td  ><textarea class="ckeditor" cols="60" id="editor1" name="editor1" rows="3"><?php echo $Contents?></textarea> </td></tr></table>
						</td>
					</tr>

					<tr style="padding-top:40px;">
						<td>
						<table style="margin-top:10px;margin-bottom:10px;">
						<tr><td>
						<?php 
						
							echo '<input type="submit" name="add" id="add" value="Add" onclick="return AddProduct(this.form);"/>';
						if ($MailID!='')
							echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="update" id="update" value="Update" >';
						?>
						</td>
					</form>
						<td>
						<?php
						//echo "<a href=\"#\" onclick=\"Popup=window.open('Manage_PreNews.php?MailID=".$MailID."','Popup','scrollbars=yes,resizable=yes,width=1060,height=880'); return false;\"";

						echo "<a class=\"ajax\" href=\"Manage_PreNews.php?MailID=".$MailID."\"" ;
						echo " style=\"text-decoration: none; color: #0110DD;\">";						
						echo "<input type=\"button\" name=\"preview\" id=\"preview\" value=\"Preview\"/></a>";
						?>
						
						<!--<input type="button" onclick="pre(<?php if($MailID=="") echo '0'; else echo $MailID;?>)" name="preview" id="preview" value="Preview" >-->

						</td><td><input type="button" onclick="send(<?php if($MailID=="") echo '0'; else echo $MailID;?>)" name="send" id="send" value="Send" ></td>
						</td></tr></table>
						</td>	
					</tr>
					<tr class="subject_border_top">
						<td><table><tr>
						<td class="subject1_2" style="width: 40%;"></td>
						<td class="subject1_2">Selected Items</td>
						<td class="subject1_2" style="width: 40%;"></td>
						</tr></table>
						</td>
					</tr>
				

<script type="text/javascript">


	

$(document).ready(function(){
	
	$( "#sortable" ).sortable({
		  update: function( event, ui ) {
		var frmDatax	= $("#form1").serializeArray();
		var MailID=$('#MailID').val();
		  frmDatax.push({name:"mode", value:"sort"},{name:"mailid",value:MailID});
					
		   $.ajax({
						async:true, type:"post", dataType:"json", url:"/lib/ajaxtools.php",
						data: frmDatax,
						success: function(d) {
							
						}
					});	
		  }
		});
	
});
						
</script>



				<tr>
					<td colspan="3">
	
		<!--<table id="sort" class="grid" title="Kurt Vonnegut novels">
		<tbody><tr>-->
<?php 
		$n=1;
		echo "<form method=\"post\" name=\"form1\" id=\"form1\">";
		echo "<div id=\"mailpro\">";
		while ($data = $DB->fetch_array($DB->res)){
			
		
			echo "<ul id=\"sortable\">";
			echo "<li id=\"i_". $data["ProductID"] ."\" class=\"ui-state-default\" style=\"padding-left: 0.5em;width: 150px;overflow: hidden;\"><span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<input type=\"hidden\" name=\"productid[]\" id=\"productid\" value=\"" . $data["ProductID"] . "\"/>";

			echo "<table width=\"100%\">";
			echo "<tr><td class=\"general_c\">";
			echo "<input type='button' name='del1' id='del1' onclick='x(". $data["ProductID"] .")' value='Delete'/><br/>";
			echo $data["StyleNo"] ."<br/>";
			echo "$" . $data["UnitPriceOnSale"] . " &nbsp;(<s>$" . $data["UnitPrice"] . "</s>)";
			echo "</td></tr>";
			echo "<tr><td class=\"general_c\">";
			echo "<a href=\"Manage_News.php?act=view&aid=" . $data["ProductID"] . "&Display_ActiveItems_By=".$Display_ActiveItems_By."&Display_ActiveItems_In=".$Display_ActiveItems_In."&pp=".$pp."&ppAI=".$ppAI."&ppII=".$ppII."\">";
			if($data["Picture1"]!=null){
				echo "<img src=\"/Images_Products/" . $data["Picture1"] . "\" height=\"110\" border=\"0\"/>";
			}else{
				echo "<img src=\"/Images_Products/ComingSoon.jpg\" width=\"110\" height=\"110\" border=\"0\"/>";
			}
			echo "</a></td></tr>";
			echo "<tr><td class=\"general_d\">";
			//echo $data["BrandName"] . "<br/>";
			echo "<b>".substr($data["ProductName"], 0, 100)."</b>";
			echo "</td></tr></table></li>";
			$n=$n+1;
		}
		echo "</div>";
		echo "</form>";
?>							
						</td>
					</tr>
				<!--</form>-->			
			</table>
		</div>

<script type="text/javascript">


function AddProduct(frm){
	if(!frm.subject.value){
		alert('Newsletter subject cannot be blank!');
		frm.subject.focus();
		return false;
	}
}
function x(id){
//alert(id);
var MailID=$('#MailID').val();
$.ajax({
				async:true, type:"post", dataType:"json", url:"/lib/ajaxtools.php",
				data:{"mode":"delete","delproductid":id,"mailid":MailID},
				success: function(d) {
					//alert(d);
					$('#i_'+d).remove();
				}
			});		
}  
function listdel(id)
{
location='Manage_News.php?action=listdel&MailID='+id;
}
</script>
 
<!------------------------------------------------------------------------------------------------------------------------------------------------>
		<div id="sub3">
			<form name="SearchItems_Form" method="get" action="Manage_News.php">
			<input type="hidden" id="MailID" name="MailID"	value="<?php echo $MailID?>" />
				<table>
					<tr class="subject_border_top">
						<td class="subject2">Vendor</td>
						<td class="subject2">Product ID</td>
						<td class="subject2">Style No</td>
						<td class="subject2">Product Name</td>
						<td class="subject2">Product Description</td>
						<td class="subject2">&nbsp;</td>
										
					</tr>
					<tr class="subject_border_bottom">
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
						<td class="general">
							<input type="text" name="s_desc" id="s_desc" value="<?php echo $s_desc?>" style="width: 90%;"/>
						</td>
						
						<!--<td class="general">
							<input type="text" name="s_tags" id="s_tags" value="<?php echo $s_tag?>" style="width: 90%;"/>
						</td>-->
						<td  class="general , btns">
							<input type="button" value="Search" onclick="document.SearchItems_Form.submit();" />
							<input type="hidden" name="action" value="search"/>
						</td>

					</tr>
					<!--<tr>
						<td colspan="11" class="general , btns">
							<input type="button" value="Search" onclick="document.SearchItems_Form.submit();" />
							<input type="hidden" name="action" value="search"/>
						</td>
					</tr>-->
				</table>
			<!--</form>-->
			<form name="searchItems" method="post" action="Manage_News.php">
<?php
if($action == "search"){
	if(($s_brand != null)or($s_idx != null)or($s_styleno != null)or($s_name != null)or($s_desc != null)){
?>
				<table style="width: 100%;">
					<tr class="subject_border_top">
						<td class="subject1_2">Searched Items</td>
					</tr>
<?php	
	$strSCHSQL = (" Where");
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
	if($s_desc != null){
		$strSCHSQL .= (" ProductDescription LIKE '%" . $s_desc . "%' AND");
	}
	
	/*if($s_tags != null){
		$strSCHSQL .= (" serchEnginTags LIKE '%" . $s_tags . "%' AND");
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

	//echo $strSQL;
?>
					<!--<tr>					
						<td class="general_c">
							<input type="button" id="checkall" onclick="return checkedAll3(this.form)" value="Check All Items"/>
							<input type="button" name="button" onclick="return DeactivateCheckedConfirm(this.form);" value="Deactivate Checked Items"/>
							<input type="hidden" name="act" value/>
						</td>
					</tr>-->
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
		echo "<div class=\"item_wrapper1\">";
		echo "<table width=\"100%\" style=\"height:200px;\">";
		echo "<tr><td class=\"general_c\">";
?>		
		<!--<input type="checkbox" name="idtocheck[]" id="checklist3" value="<?php echo $data["ProductID"];?>"/>-->
<?php
//		echo "<input type=\"checkbox\" name=\"CheckedProductID\" value=\"" . $data["ProductID"] . "\"/>";
		echo $data["StyleNo"];
		//echo "<br/>$" . $data["UnitPriceOnSale"] . " &nbsp;(<s>$" . $data["UnitPrice"] . "</s>)";
		echo "</td></tr>";
		echo "<tr><td class=\"general_c\">";
		//echo "<a href=\"Manage_News.php?act=view&aid=" . $data["ProductID"] . "&{$linkopt}&pp={$pp}\">";
		if($data["Picture1"]!=null){
			echo "<img src=\"/Images_Products/" . $data["Picture1"] . "\" onclick='add(".$data["ProductID"].")' width=\"95\" height=\"95\" border=\"0\"/>";
		}else{
			echo "<img src=\"/Images_Products/ComingSoon.jpg\" height=\"95\" border=\"0\"/>";
		}
		echo "</td></tr>";
		echo "<tr><td class=\"general_c\">";
		//echo $data["BrandName"] . "<br/>";
		//echo $data["ProductName"] . "<br/>";
		echo "</td></tr></table></div>";
	}
	
	echo ("
					</td>
				</tr>
			</table>			
		");
	}
}

?>
			</form>

		</div>

<!------------------------------------------------------------------------------------------------------------------------------------------------->



		<div id="sub5">	
			<!--<form name="InactiveLists_Form" method="post" action="Manage_Products_action.php">-->					
				<table>
					<tr class="subject_border_top">
						<td class="subject1_2">Product Items</td>
					</tr>
					<!--<tr>
						<td class="general_c">
							<input type="button" id="checkall" onclick="return checkedAll2(this.form)" value="Check All Items"/>
							<input type="button" name="button" onclick="return ActivateCheckedConfirm(this.form);" value="Active Checked Items"/>
							<input type="button" name="button" onclick="return DeleteCheckedConfirm2(this.form);" value="Delete Checked Items"/>
							<input type="hidden" name="act" value/>
						</td>
					</tr>-->
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

	$strActSQL .= " IsActive='Y'";
	$strSQL = "SELECT * FROM Products Where  " . $strActSQL;
	$strOrd	= " ORDER BY ProductID DESC";
	$DB->query($strSQL);
	$numrows = $DB->rows;
	$limitProducts = 90;
	$totalpps = ($limitProducts < 0)?1:ceil($numrows/$limitProducts);
	/*print_r('numrows:'.$numrows.'<br>');
	print_r('totalpps:'.$totalpps.'<br>');
	print_r('sppII:'.$sppII.'<br>');*/
	if ($sppII < 1 || $sppII > $totalpps) $sppII = 1;
	$list_num = $limitProducts * ($sppII - 1);
	if ($limitProducts > 0) $strSQL .= $strOrd . " LIMIT {$list_num}, {$limitProducts}";
	$DB->query($strSQL);
//echo $strSQL;
	$prod_img[] = $data["Picture1"];
	echo "<div class=\"product-page-bar\">";
	$linkopt = "pp={$pp}&ppAI={$ppAI}&s_cat1={$s_cat1}&s_cat2={$s_cat2}";
	//if ($ord) $linkopt.="&or=".$ord;
	if (!empty($kw)) $linkopt.="&kw=".$kw;
	listPages(array("sppII", $sppII),PAGEBLOCK,$totalpps,$linkopt);
	echo "</div>";
?>
						</td>
					</tr>				
					<tr>
						<td>
							<!-- pagenation -->
<?php 
	while ($data = $DB->fetch_array($DB->res)){?>
							<div class="item_wrapper1">
								<table width="100%" style="height:200px;">
									<tr>
										<td class="general_c">
											<!--<input type="checkbox" name="idtocheck[]" id="checklist2" value="<?php echo $data["ProductID"];?>"/>-->
											<?php echo $data["StyleNo"];?><!--<br/>
											$<?php echo $data["UnitPriceOnSale"];?> &nbsp;(<s>$<?php echo $data["UnitPrice"];?></s>)-->
										</td>
									</tr>
									<tr>
										<td class="general_c">
											<!--<a href="Manage_News.php?act=view&aid=<?php echo $data["ProductID"];?>&Display_ActiveItems_By=<?php echo $Display_ActiveItems_By;?>&Display_ActiveItems_In=<?php echo $Display_ActiveItems_In;?>&pp=<?php echo $pp;?>&ppAI=<?php echo $ppAI?>&ppII=<?php echo $ppII;?>">-->
<?php 											
		if($data["Picture1"]!=null){
			echo "<img src=\"/Images_Products/" . $data["Picture1"] . "\" onclick='add(".$data["ProductID"].")' width=\"95\" height=\"95\" border=\"0\"/>";
		}else{
			echo "<img src=\"/Images_Products/ComingSoon.jpg\" width=\"95\" height=\"95\" border=\"0\"/>";
		}
?>
											<!--</a>-->
										</td>
									</tr>
									<tr>
										<td class="general_c">
											<!--<?php echo $data["BrandName"];?><br/>-->
											<?php echo substr($data["ProductName"], 0, 100);?>
										</td>
									</tr>
								</table>
							</div>
<?php }
?>

						</td>
					</tr>
				</table>				
			<!--</form>-->
		</div>
<script type="text/javascript">
function pre(id){
	if (id=='0')
	{
		return false;
	}
	else
		window.open("Manage_PreNews.php?MailID="+id,'width=695px,height=680px');
	//location='Manage_PreNews.php?MailID='+id;	
}

function send(id){
	if (id=='0')
	{
		return false;
	}
	else
		//window.open("Manage_SendNews.php?MailID="+id,'width=695px,height=680px');
	location='Manage_SendNews.php?MailID='+id;	
}
function add(id){
//alert(id);
var MailID=$('#MailID').val();
if(MailID=="")
	{
		alert("First save subject and contents." );
		return false;
	}
else{
	$.ajax({
					async:false, type:"post", dataType:"html", url:"/lib/ajaxtools.php",
					data:{"mode":"mailadd","addproductid":id,"mailid":MailID},
					success: function(d) {
						$('#mailpro').append(d);//alert(d);
						
					}
				});		
	}
}  
</script>


<?php 
	require_once("footer.php"); 
	$DB->close();	//DB close
	$DBm->close();
	$DBm1->close();
	$DBd->close();
	$DBi->close();
	$DBu->close();
?>