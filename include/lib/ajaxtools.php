<?php
session_start();
include_once dirname(__FILE__) . '/../include/function.php';
$mode		= (!empty($_POST['mode']))?$_POST['mode']:null;
$productid		= (!empty($_POST['productid']))?$_POST['productid']:null;
$hproductid		= (!empty($_POST['hproductid']))?$_POST['hproductid']:null;
$sortid		= (!empty($_POST['sortid']))?$_POST['sortid']:null;
$sortid1		= (!empty($_POST['sortid1']))?$_POST['sortid1']:null;
$mailid		= (!empty($_POST['mailid']))?$_POST['mailid']:null;
$hcontactid		= (!empty($_POST['hcontactid']))?$_POST['hcontactid']:null;
$category_name		= (!empty($_POST['category_name']))?$_POST['category_name']:null;
$id_category		= (!empty($_POST['id_category']))?$_POST['id_category']:null;
$id_language		= (!empty($_POST['id_language']))?$_POST['id_language']:1;

switch ($mode) {
	case "checkemail":
		$email	= trim($_POST['email']);
		$DB 	= new myDB;
		$DB->query("SELECT *FROM Customers WHERE LoginID=\"".$email."\"");
		echo $DB->rows;
		break;
	case "newsletter":
		$email	= trim($_POST['email']);
		$DB 	= new myDB;
		$DB->query("SELECT *FROM SignedUp_EmailList WHERE EmailAddress=\"".$email."\"");

		echo $DB->rows;
		break;
	case "checkgift":
		
		$Code	= trim($_POST['Code']);
		$DB 	= new myDB;
		$DB->query("SELECT *FROM GiftCertificates WHERE GiftAuthorizationCode='".$Code."' AND IsActive='Y' AND GiftExpiryDate>=now()");
		if ($DB->rows > 0) {
			$data = $DB->fetch_array($DB->res);
			/*$json = ('{"GiftCertificates":[{
					"GiftAmountRemaining":"'.$data['GiftAmountRemaining'].'"					
					}]}');*/
			$json = $data['GiftAmountRemaining'];		
			echo $json;
		}
		break;

   case "sort":
		$DBu 	= new myDB;
		$x=1;
		for($i=0; $i<count($productid); $i++){
			
			$strSQL="UPDATE  MailItems  SET SortNo=\"".$x."\" WHERE MailID=\"".$mailid."\" and ProductID=\"".$productid[$i]."\"";//."\" WHERE MailID==\"".;
			
			$x=$x+1;
			$DBu->query($strSQL);
			
		}
		echo "1";
		break;

	case "Hotsort":
		$DBu 	= new myDB;
		$x=1;
		for($i=0; $i<count($hproductid); $i++){
			
			$strSQL="UPDATE  HotItems  SET SortNo=\"".$x."\" WHERE ProductID=\"".$hproductid[$i]."\"";//."\" WHERE MailID==\"".;
			
			$x=$x+1;
			$DBu->query($strSQL);
			
		}
		echo "1";
		break;


   case "itemsort":
		$DBu 	= new myDB;
		$x=1;
		for($i=0; $i<count($hcontactid); $i++){
			
			$strSQL="UPDATE  contacts  SET SortNo=\"".$x."\" WHERE contact_id=\"".$hcontactid[$i]."\"";//."\" WHERE MailID==\"".;
			
			$x=$x+1;
			$DBu->query($strSQL);
			
		}
		echo "1";
		break;



	case "cat":
		$DBu 	= new myDB;
		$x=1;
		for($i=0; $i<count($sortid); $i++){
			
			$strSQL="UPDATE  category  SET position=\"".$x."\" WHERE id_category=\"".$sortid[$i]."\"";//."\" WHERE MailID==\"".;
			
			$x=$x+1;
			$DBu->query($strSQL);
			//echo $strSQL.=$strSQL;
			
		}
		echo "1";
		break;

	
	case "CatUpdate":
		$DBu 	= new myDB;
		$x=1;
			
			$strSQL="UPDATE  category_language  SET category_name=\"".$category_name."\" WHERE id_category=\"".$id_category."\" and id_language=\"".$id_language."\"";
			
			$DBu->query($strSQL);
			//echo $strSQL;
			
		echo "1";
		break;

	case "CatDel":
		$DBu 	= new myDB;
		$x=1;
			
			$strSQL="DELETE  FROM category  WHERE id_category=\"".$id_category."\"";//."\" WHERE MailID==\"".;
			
			$DBu->query($strSQL);

			$strSQL="DELETE  FROM category_language  WHERE id_category=\"".$id_category."\"";//."\" WHERE MailID==\"".;
			
			$DBu->query($strSQL);
			//echo $strSQL;
			
		echo "1";
		break;

	




    case "delete":
		$DB 	= new myDB;
			
			$strSQL="DELETE FROM  MailItems   WHERE MailID=\"".$mailid."\" and ProductID=\"".$_POST['delproductid']."\"";//."\" WHERE MailID==\"".;			
			
			$DB->query($strSQL);
			
		echo $_POST['delproductid'];
		break;

    case "Hotdelete":
		$DB 	= new myDB;
			
			$strSQL="DELETE FROM  HotItems   WHERE  ProductID=\"".$_POST['hotdelid']."\"";		
			
			$DB->query($strSQL);
			
		echo $_POST['hotdelid'];
		break;
	
	
	
	case "2CatUpdate":

		$DB1 	= new myDB;
		$strSQL1 = "SELECT * FROM Category2 WHERE Cat1ID =".$Cat1ID." ORDER BY Cat2SortNo ASC";
		//$result =$strSQL1;

		$DB1->query($strSQL1);
		//$Num = 1;
		
		//$result = "<td >";
		//$result .= "<div id=\"sub12\" >";
		$result = "<form name=\"form3\" id=\"form3\" method=\"post\">";	
		$result .= "<ul id=\"sortable2\" class='ui-sortable'>";
		while ($data1 = $DB1->fetch_array($DB1->res)){
		
			$result .= "<li id=\"i_". $data1["Cat2ID"] ."\" class=\"ui-state-default ui-sortable-handle\" style=\"cursor:move;padding-left: 0.5em;width: 500px;overflow: hidden;\"><span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span><table><tr><td style=\"width: 5%;padding-right:10px;\">".$data1["Cat2SortNo"]."</td><td style=\"width: 75%;padding-right:10px;\"><input type=\"text\" id=\"Cat2ID_".$data1["Cat2ID"]."\" name=\"Cat2ID\" value=\"" . $data1["Cat2Name"] . "\" style=\"width:250px;height:20px;\"/><input type=\"hidden\" name=\"sortid1[]\" id=\"sortid\" value=\"" . $data1["Cat2ID"] . "\"/></td><td style=\"width: 10%;padding-right:10px;\"><input  name=\"button\" type=\"button\" onClick=\"up_date2(".$data1["Cat2ID"].");\" value=\"Update\"/></td><td style=\"width: 10%; \"><input name=\"button\" type=\"button\" onClick=\"del2(".$data1["Cat2ID"].");\" value=\"Delet\"/></td></tr></table></li>";
			//$Num++;
		}
		$result .= "</ul>";	
		$result .= "</form>";
		$result .= "<script type='text/javascript'>";
		$result .= "$(document).ready(function(){";
		$result .= "$( '#sortable2' ).sortable({";
		$result .= "update: function( event, ui ) {";
		$result .= "var frmDatas2	= $('#form3').serializeArray();";
		$result .= "$('ajax_load').css('display','block');";
		$result .= "frmDatas2.push({name:'mode', value:'cat2'},{name:'Cat1ID', value:'".$Cat1ID."'});			
					   $.ajax({
									async:false, type:'post', dataType:'json', url:'/lib/ajaxtools.php',
									data: frmDatas2,
									success: function(d) {
										//location.reload();
										location='Manage_Categories.php?Cat1ID='+d;
									}
						});
						
					  }
				});

			});
									
			</script>";

		//$result .= "</div>";
		//$result .= "</td>";

	echo $result;

	break;


	case "mailadd":
		$DB 	= new myDB;
		$DB1   = new myDB;
		$DB2   = new myDB;
		$DB3   = new myDB;
			if($mailid=="")
			{
				$DB3->query("SELECT max(MailID) AS MaxID from Mails" );
				$data3 = $DB3->fetch_array($DB3->res);
				$mailid=$data3['MailID']+1;
			}
			$DB2->query("SELECT max(SortNO) AS MaxNo from MailItems WHERE MailID=".$mailid);
			$data1 = $DB2->fetch_array($DB2->res);
			$MaxNo=$data1['MaxNo'];

			$SortNO=$MaxNo+1;
			$strSQLi="INSERT INTO MailItems (MailID,ProductID,SortNo) VALUES (\"".$mailid."\",\"".$_POST['addproductid']."\",\"".$SortNO."\")";//."\" WHERE MailID==\"".;			
			
			$DB1->query($strSQLi);
			
			$DB->query("SELECT * from Products WHERE ProductID=".$_POST['addproductid']);
			$data = $DB->fetch_array($DB->res);
			$result =  "<ul id=\"sortable\">";
			$result .= "<li id=\"i_". $data["ProductID"] ."\" class=\"ui-state-default\"><span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			$result .= "<input type=\"hidden\" name=\"productid[]\" id=\"productid\" value=\"" . $data["ProductID"] . "\"/>";

			$result .= "<table width=\"100%\">";
			$result .="<tr><td class=\"general_c\">";
			$result .="<input type='button' name='del1' id='del1' onclick='x(". $data["ProductID"] .")' value='Delete'/>";
			//echo "<input type=\"button\" name=\"del\" id=\"del\" onclick=\"del(" . $data["ProductID"] . ")\" value=\"Delete\"/>";
			$result .= $data["StyleNo"] ."<br/>";
			$result .="$" . $data["UnitPriceOnSale"] . " &nbsp;(<s>$" . $data["UnitPrice"] . "</s>)";
			$result .="</td></tr>";
			$result .="<tr><td class=\"general_c\">";
			$result .="<a href=\"Manage_News.php?act=view&aid=" . $data["ProductID"] . "&Display_ActiveItems_By=".$Display_ActiveItems_By."&Display_ActiveItems_In=".$Display_ActiveItems_In."&pp=".$pp."&ppAI=".$ppAI."&ppII=".$ppII."\">";
			if($data["Picture1"]!=null){
				$result .= "<img src=\"/Images_Products/" . $data["Picture1"] . "\" height=\"110\" border=\"0\"/>";
			}else{
				$result .= "<img src=\"/Images_Products/ComingSoon.jpg\" width=\"110\" height=\"110\" border=\"0\"/>";
			}
			$result .= "</a></td></tr>";
			$result .= "<tr><td class=\"general_c\">";
			$result .= $data["BrandName"] . "<br/>";
			$result .= "<b>".substr($data["ProductName"], 0, 100)."</b>";
			$result .= "</td></tr></table></li></ul>";
			
		echo $result;
		
		$DB-> close();
		$DB1-> close(); 
		$DB2-> close();
		$DB3-> close();
		break;	 	

	case "Hotadd":
		$DB 	= new myDB;
		$DB1   = new myDB;
		$DB2   = new myDB;
		$DB3   = new myDB;
			$DB2->query("SELECT SortNO  from HotItems Oredr by Hotid DESC");
			$data1 = $DB2->fetch_array($DB2->res);
			$MaxNo=$data1['SortNO'];

			$SortNO=$MaxNo+1;
			$strSQLi="INSERT INTO HotItems (ProductID,SortNo) VALUES (\"".$_POST['hotaddid']."\",\"".$SortNO."\")";			
			
			$DB1->query($strSQLi);
			
			$DB->query("SELECT * from Products WHERE ProductID=".$_POST['hotaddid']);
			$data = $DB->fetch_array($DB->res);
			$result =  "<ul id=\"hsortable\">";
			$result .= "<li id=\"i_". $data["ProductID"] ."\" class=\"ui-state-default\"><span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			$result .= "<input type=\"hidden\" name=\"hproductid[]\" id=\"hproductid\" value=\"" . $data["ProductID"] . "\"/>";

			$result .= "<table width=\"100%\">";
			$result .="<tr><td class=\"general_c\">";
			$result .="<input type='button' name='del1' id='del1' onclick='x(". $data["ProductID"] .")' value='Delete'/>";
			//echo "<input type=\"button\" name=\"del\" id=\"del\" onclick=\"del(" . $data["ProductID"] . ")\" value=\"Delete\"/>";
			$result .= $data["StyleNo"] ."<br/>";
			$result .="$" . $data["UnitPriceOnSale"] . " &nbsp;(<s>$" . $data["UnitPrice"] . "</s>)";
			$result .="</td></tr>";
			$result .="<tr><td class=\"general_c\">";
			$result .="<a href=\"Manage_Hot.php?act=view&aid=" . $data["ProductID"] . "&Display_ActiveItems_By=".$Display_ActiveItems_By."&Display_ActiveItems_In=".$Display_ActiveItems_In."&pp=".$pp."&ppAI=".$ppAI."&ppII=".$ppII."\">";
			if($data["Picture1"]!=null){
				$result .= "<img src=\"/Images_Products/" . $data["Picture1"] . "\" height=\"110\" border=\"0\"/>";
			}else{
				$result .= "<img src=\"/Images_Products/ComingSoon.jpg\" width=\"110\" height=\"110\" border=\"0\"/>";
			}
			$result .= "</a></td></tr>";
			$result .= "<tr><td class=\"general_c\">";
			$result .= $data["BrandName"] . "<br/>";
			$result .= "<b>".substr($data["ProductName"], 0, 100)."</b>";
			$result .= "</td></tr></table></li></ul>";
			
		echo $result;
		
		$DB-> close();
		$DB1-> close(); 
		$DB2-> close();
		$DB3-> close();
		break;	 	


   case "Orderchange":
		$oid	= trim($_POST['OrderID']);
		$Status	= trim($_POST['Status']);
		if($Status=="")
			$Status="new";
		$OrderItemID	= trim($_POST['OrderItemID']);
		$TotalQuantity	= trim($_POST['TotalQuantity']);
		

		$DB 	= new myDB;
		$DBu 	= new myDB;
		$strSQL="UPDATE  OrderItems  SET ListOfOrderQuantities=\"".$TotalQuantity."\",TotalQuantity=\"".$TotalQuantity."\",TotalAmount=UnitPrice*\"".$TotalQuantity."\" WHERE OrderItemID=\"".$OrderItemID."\"";
		$DBu->query($strSQL);
		
		$strSQL="SELECT * from OrderItems  WHERE  OrderItemID=\"".$OrderItemID."\"";
		$DBu->query($strSQL);
		if ($DBu->rows > 0) {
			$datau = $DBu->fetch_array($DBu->res);
			
			$comment=$datau['StyleNo']." ".$datau['ProductName']." ".$datau['ListOfSizeNames']." ".$datau['ListOfColorNames'];
			if($TotalQuantity>0)
			$comment.=" left ".$TotalQuantity.".  ";
			else
			$comment.=" Out of Stock.  ";
		}

		$strSQL="SELECT * from Comment  WHERE  OrderID=\"".$oid."\" and Status='".$Status."' and Save='N'";
		$DBu->query($strSQL);
		if ($DBu->rows > 0) {
			$datau = $DBu->fetch_array($DBu->res);
			$comment=$datau['Comment'].$comment;
			$strSQL="UPDATE  Comment  SET Comment=\"".$comment."\" WHERE OrderID=\"".$oid."\" and Status='".$Status."' and Save='N'";
			$DBu->query($strSQL);		
		}
		else
		{
			$strSQL="INSERT INTO  Comment (OrderID,Status,Comment,DateCreate) VALUES (\"".$oid."\",\"".$Status."\",\"".$comment."\",now())";
			$DBu->query($strSQL);
		}

		//echo $strSQL;
		
		$DB->query("SELECT sum(TotalQuantity) AS s_qty,sum(TotalAmount) as s_amount from OrderItems WHERE OrderID=\"".$oid."\"");
		if ($DB->rows > 0) {
			$data = $DB->fetch_array($DB->res);
			$json = ('{"order":[{
					"s_qty":"'.$data['s_qty'].'",					
					"s_amount":"'.$data['s_amount'].'",
					"s_commnt":"'.$comment.'"
					}]}');	
			echo $json;    //"s_commnt":"'.$comment.'",
		}
		
		//else
		//echo "The Giftcard code is not valid.";
		break;
	/*
	case "wishdel":
		$id	= trim($_POST['id']);
		$userID	= trim($_POST['userID']);
		$DB 	= new myDB;
		$DB->query("Delete From Wishlist Where ProductID=".$id);
		$cntSQL = "SELECT count(*) as cnt FROM Wishlist  WHERE LoginID = '" . $userID."'";
		$DB->query($cntSQL);
		$data = $DB->fetch_array($DB->res);
		$cnt = $data["cnt"];
		$expire=time()+60*60*1;
		setcookie("wish", $cnt, $expire,"/","sshop.i9biz.com");
		
		break;	
	*/
	case "address_fillup":
		$email 	= trim($_POST['email']);
		$DB		= new myDB;
		$DB->query("SELECT *FROM Customers WHERE LoginID=\"".$email."\"");
		if ($DB->rows > 0) {
			$data = $DB->fetch_array($DB->res);
			$json = ('{"customer":[{
					"fname":"'.$data['MailingFirstName'].'",
					"lname":"'.$data['MailingLastName'].'",
					"company":"'.$data['MailingCompanyName'].'",
					"email":"'.$data['LoginID'].'",
					"addr1":"'.$data['MailingStreet'].'",
					"addr2":"'.$data['MailingStreet2'].'",
					"city":"'.$data['MailingCity'].'",
					"state":"'.$data['MailingStateOrProvince'].'",
					"zip":"'.$data['MailingZipcode'].'",
					"country":"'.$data['MailingCountry'].'",
					"tel":"'.$data['MailingPhone'].'",
					"fax":"'.$data['MailingFax'].'"
					}]}');
			echo $json;
		}
		break;

	case "sum":
			
			$qty=0;
			foreach ($_POST['fill'] as $key=>$val) {
				$xx=explode(";",$_POST['fill'][$key]);
				$color=$xx[0];
				$qty=$xx[1]
				
				 += $qty;
				
			}
			$DB		= new myDB;
			$DB->query("SELECT * FROM Products WHERE ProductID=\"".$_POST['pid']."\"");
			if ($DB->rows > 0) {
				$data = $DB->fetch_array($DB->res);
				$price=$data['UnitPriceOnSale'];
			}		
			$json = ('{"sum":[{
					"qty":"'.$qty.'",
					"price":"'.$price.'"
					}]}');
			echo $json;
		
		break;

		
	case "update_mini_cart":
		
		$result = "";
		// Mini cart summary
		
			
			$result = "	<div class=\"summary\">
							<p class=\"amount-2\">\n";
			
			$result .=	"	</p>
							<p class=\"subtotal\">
								<span class=\"label\">Cart Subtotal:</span>
								
							</p>
						</div>
								
						<p class=\"block-subtitle\">Recently added item(s)</p>
						<ol style=\"overflow: auto;\" id=\"cart-sidebar\" class=\"mini-products-list\">";
			// Mini cart List
			$DB 		= new myDB;
			$DBL 		= new myDB;
			$item_qty=15;
			$n			= 1;
			$cnt		= 0;
			$dc			= 1;
			$cart_item=1;
			
			$DBL->query("select id_vendor FROM cart_items  Group by id_vendor");	
			while($dataL = $DBL->fetch_array($DBL->res)){
			
			$result .= "<li id='vendor'><span onclick='list_show(".$dataL['id_vendor'].")' id='show_".$dataL['id_vendor']."' style='display:none;float:left;'><i class='fa fa-chevron-circle-up'></i></span>
			<span onclick='list_hide(".$dataL['id_vendor'].")' id='hide_".$dataL['id_vendor']."' style='display:block;float:left;'>
			<i class='fa fa-chevron-circle-down'></i></span><a href='?p1=".$dataL['id_vendor']."'>".$dataL['id_vendor']."</a>
			<span onclick='show_share(".$dataL['id_vendor'].")' style='float: right;  cursor: pointer;'><i class='fa fa-share'></i></span></li>";

			$result .= "<span id='share_hide_".$dataL['id_vendor']."' onclick='hide_share(".$dataL['id_vendor'].")' style='display:none; cursor: pointer;position: absolute;  border: 1px solid #C2C2C2;padding: 10px;background-color: white;left: 160px;width: 40px;border-top-left-radius: 20px;'><i class='fa fa-arrow-right'></i></span>
			<span id='share_item_".$dataL['id_vendor']."' style='display:none; position: absolute;  border: 1px solid #C2C2C2;padding: 10px;background-color: white;left: 200px;width: 226px;z-index:999;'>
			<li>
			<p><input type='checkbox' id='friend' value='1'>&nbsp;donkim</p>
			<p><input type='checkbox' id='friend' value='2'>&nbsp;youngdong</p>
			<p><input type='button' value='Send'></p>
			</li>
			</span>";


			$result .=  "<span id='vendor_item_".$dataL['id_vendor']."'>";
			$result .=  "<li>
			<input type='hidden' name='vendor_id'  id='vendor_id' value='".$dataL['id_vendor']."'><input type='text' name='custominput' id='custominput_".$dataL['id_vendor']."' placeholder='Here your list' onKeyUp='enterForm(event,".$dataL['id_vendor'].");'>			
			<input type='button' id='savebtn' onclick='customadd(".$dataL['id_vendor'].")' style='margin-left 10px;' value='Save'/></li>";
			
				$DB->query("select b.id_cart,b.cart_name,b.contact_id,a.rimg,a.name,a.price FROM cart_items b LEFT JOIN contacts a ON b.contact_id=a.contact_id  WHERE b.id_vendor=".$dataL['id_vendor']." Order by b.id_cart DESC");

				
				while($data = $DB->fetch_array($DB->res)){
				
					
					$result .= 	"<li class=\"item\">";
					
					if ($data['cart_name']=="")
					{
						$result .= 	"<img src=\"data:image;base64,".$data['rimg']."\" width=\"64\" height=\"64\" /><span style='margin-left:15px;'>".$data['name']."</span>";								
						$result .= 	"<a href=\"javascript:void(0)\" style=\"margin-left:10px;\"  title=\"Remove This Item\" onclick=\"remove_mini_item(".$data['id_cart'].",".$data['contact_id'].")\"><i class=\"fa fa-trash-o\"></i></a>";				
					}
					else
					{
						$result .= 	"<img src=\"data:image;base64,".$data['rimg']."\" width=\"64\" height=\"64\" /><span style='margin-left:15px;'>".$data['cart_name']."</span>";								
						$result .= 	"<a href=\"javascript:void(0)\" style=\"margin-left:10px;\"  title=\"Remove This Item\" onclick=\"remove_mini_item(".$data['id_cart'].",".$data['contact_id'].")\"><i class=\"fa fa-trash-o\"></i></a>";				
					}
					$result .= 	"</li>\n";

					$cnt++;
					$n = 1 - $n;
				
				}
				$result .= "</span>";
			}	
			$result .=	"</ol>";
		
		
		
		echo $result;
		
		break;
		
}


?>