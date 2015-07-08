<?php
	include "../include/function.php";

	//echo $_COOKIE["aduserID"];
	//exit;
	$DB = new myDB;

	$GotoPage 				= $_POST["GotoPage"];
	$ProductID 				= $_POST["ProductID"];
	$Cat1ID 				= $_POST["Cat1ID"];
	$Cat2ID 				= $_POST["Cat2ID"];
	$Cat3ID 				= $_POST["Cat3ID"];
	$action 				= $_POST["action"];
	$Display_ActiveItems_By = $_POST["Display_ActiveItems_By"];
	$Display_ActiveItems_In = $_POST["Display_ActiveItems_In"];
	
	$Edit_Style					= $_POST["Edit_Style"];
	$Edit_IsActive 				= $_POST["Edit_IsActive"];
	$Edit_Cat1ID 				= $_POST["Edit_Cat1ID"];
	$Edit_Cat2ID 				= $_POST["Edit_Cat2ID"];
	$Edit_BrandName1 			= $_POST["Edit_BrandName1"];
	if($Edit_BrandName1=="Select")
	$Edit_BrandName1="";
	
	$Edit_BrandName2 			= $_POST["Edit_BrandName2"];
	$Edit_BrandStyle 			= $_POST["Edit_BrandStyle"];
	
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
	$Edit_Cost 			= $_POST["Edit_Cost"];
	$Edit_UnitPrice 			= $_POST["Edit_UnitPrice"];
	$Edit_UnitPriceOnSale 		= $_POST["Edit_UnitPriceOnSale"];
	if($Edit_UnitPriceOnSale=="")
	$Edit_UnitPriceOnSale=$Edit_UnitPrice;
	$Edit_PrepackQuantity		= $_POST["Edit_PrepackQuantity"];
	$Edit_FeeForPersonalization	= $_POST["Edit_FeeForPersonalization"];
	$Edit_FeeForAttachingEmblems= $_POST["Edit_FeeForAttachingEmblems"];
	$Edit_Weight_Pounds 		= $_POST["Edit_Weight_Pounds"];
	$Free_Shipping 				= $_POST["Free_Shipping"];
	$IsTaxable					= $_POST["IsTaxable"];
	$Edit_IsThisBackOrderItem 	= $_POST["Edit_IsThisBackOrderItem"];
	$Edit_ForMenOrWomen 		= $_POST["Edit_ForMenOrWomen"];
	$Edit_SizeChartID 			= $_POST["Edit_SizeChartID"];
	$Edit_PackChartID 			= $_POST["Edit_PackChartID"];
	$CheckedColorID 			= $_POST["CheckedColorID"];

	$CheckedColorID1 			= $_POST["chkidx"];
	

	$personalize 				= $_POST["personalize"];
	$Edit_QuantityDiscountID 	= $_POST["Edit_QuantityDiscountID"];
	$Edit_MatchesWithProduct1 	= $_POST["Edit_MatchesWithProduct1"];
	$Edit_MatchesWithProduct2 	= $_POST["Edit_MatchesWithProduct2"];
	$Edit_MatchesWithProduct3 	= $_POST["Edit_MatchesWithProduct3"];
	$Edit_MatchesWithProduct4 	= $_POST["Edit_MatchesWithProduct4"];
	$Edit_MatchesWithProduct5 	= $_POST["Edit_MatchesWithProduct5"];
	$Edit_MatchesWithProduct6 	= $_POST["Edit_MatchesWithProduct6"];
	$Picture1 					= $_FILES["Picture1"];
	$Picture2 					= $_FILES["Picture2"];
	$Picture3 					= $_FILES["Picture3"];
	$Picture4 					= $_FILES["Picture4"];
	$Picture5 					= $_FILES["Picture5"];
	$Picture6 					= $_FILES["Picture6"];
	$Picture7 					= $_FILES["Picture7"];
	$Picture8 					= $_FILES["Picture8"];
	$Picture9 					= $_FILES["Picture9"];
	$Picture10 					= $_FILES["Picture10"];
	$Picture11 					= $_FILES["Picture11"];
	$Picture12 					= $_FILES["Picture12"];
	$Picture13 					= $_FILES["Picture13"];
	$Picture14 					= $_FILES["Picture14"];
	$Picture15 					= $_FILES["Picture15"];
	$Picture16 					= $_FILES["Picture16"];
	$Picture17 					= $_FILES["Picture17"];
	$Picture18 					= $_FILES["Picture18"];
	$Picture19 					= $_FILES["Picture19"];
	$Picture20 					= $_FILES["Picture20"];
	$Picture21 					= $_FILES["Picture21"];
	$Picture22 					= $_FILES["Picture22"];
	$Picture23 					= $_FILES["Picture23"];
	$Picture24 					= $_FILES["Picture24"];
	$Picture25 					= $_FILES["Picture25"];
	$act						= $_POST["act"];
	
	
	if($act=="DeactivateCheckedProducts"){
		foreach($_POST["idtocheck"] as $key => $val) {
			$updateSQL 	= ("UPDATE Products SET
					IsActive				= \"N\",
					DateTimeLastModified	= now()
					WHERE ProductID=".$val);
			
			$DB->query($updateSQL);
		}
		echo "<script>location.replace('Manage_Products.php');</script>";
		exit;
	}
	
	if($act=="ActivateCheckedProducts"){
		foreach($_POST["idtocheck"] as $key => $val) {
			$strSQL 	= ("UPDATE Products SET
					IsActive				= \"Y\",
					DateTimeLastModified	= now()
					WHERE ProductID=".$val);
			$DB->query($strSQL);
		}
		echo "<script>location.replace('Manage_Products.php');</script>";
		exit;
	}
	elseif($act=="DeleteCheckedProducts"){
		foreach($_POST["idtocheck"] as $key => $val) {
			$strSQL = ("DELETE FROM Products WHERE ProductID=".$val);
			//echo $strSQL;
			$DB->query($strSQL);
			$DB->query("DELETE FROM ProductColors WHERE ProductID=".$val);
			
		}
		echo "<script>location.replace('Manage_Products.php');</script>";
		exit;
	}

	

	if($action == "del"){
		$strSQL = ("DELETE FROM Products Where ProductID=".$ProductID);		
		$DB->query($strSQL);
		
		$DBDEl = new myDB;
		$DBDEl->query("DELETE FROM ProductColors WHERE ProductID=".$ProductID);
		$DBDEl->query("DELETE FROM TProductColors WHERE ProductID=".$ProductID);
	}
	elseif($action == "delPic"){
		$fieldname = $_POST['target'];
		$strSQL = ("UPDATE Products SET ".$fieldname."=\"\" WHERE ProductID=".$ProductID);
		$DB->query($strSQL);
		
		$ximageno=substr($fieldname,7);
	
		$DBDE6 = new myDB;
		
		$DBDE6->query("DELETE FROM ProductColors WHERE ProductID=".$ProductID." and imageno=".$ximageno);
		$DBDE6->query("DELETE FROM TProductColors WHERE ProductID=".$ProductID." and imageno=".$ximageno);
		echo "1";
		exit;
	}
	elseif($action == "add"){
		$i = 0;
		$len = count($_POST["CheckedColorID"]);
		foreach ($_POST["CheckedColorID"] as $key => $val){
			if($i == $len-1){
				$checkColor .= $val;
			}else{
				$checkColor .= $val.",";
			}
			$i++;
		}

		$checkColor=$CheckedColorID1;

		$Obj = new myUpload();
		for ($i=1; $i<26; $i++) {
			$picSQL .= ", ";
			if(${"Picture".$i}['size']>0) {
				$Obj->upload(${"Picture".$i});
				$picSQL .= "\"".$Obj->uploadfile."\"";
			}else{
				$picSQL .= "\"\"";
			}
		}
		$findid = "SELECT MAX(ProductID) as pidmax FROM Products";
		$DB2 = new myDB;
		$DB2->query($findid);
		while ($data = $DB2->fetch_array($DB2->res)){
			//$maxProID = $data["pidmax"];
			$OmaxProID = $data["pidmax"]+1;
			//$maxProID++;
		}
		$maxProID=$maxProID+1;
		$strSQL = ("INSERT INTO Products (ProductID, IsActive, Cat1ID, Cat2ID, StyleNo, BrandName,BrandStyle, ProductName, ProductDescription, NoticeToPurchasers, searchEngineTags, 
				Player, League, Club, Country, MadeOfMaterial, Cost,UnitPrice, UnitPriceOnSale, PrepackQuantity, FeeForPersonalization, FeeForAttachingEmblems,
				Weight_Pounds, FreeShipping, IsTaxable, IsThisBackOrderItem, ForMenOrWomen, SizeChartID,PackChartID, ColorIDs, personalize, QuantityDiscountID,AdminID, MatchesWithProduct1, 
				MatchesWithProduct2, MatchesWithProduct3, MatchesWithProduct4, MatchesWithProduct5, MatchesWithProduct6, Picture1, Picture2, Picture3, Picture4, 
				Picture5, Picture6, Picture7, Picture8, Picture9, Picture10, Picture11, Picture12, Picture13, Picture14, Picture15,Picture16,Picture17,Picture18,Picture19,Picture20,Picture21,Picture22,Picture23,Picture24,Picture25)
					VALUES(
						\"".$OmaxProID."\",
						\"".(($Edit_IsActive=='Y')?'Y':'N')."\",
						\"".$Edit_Cat1ID."\",
						\"".$Edit_Cat2ID."\",");
		if($Edit_Style!=null){
			$strSQL .= "\"$Edit_Style\",";
		}else{
			$strSQL .= "\"".addslashes($Edit_Style)."\",";
		}
		
		if($Edit_BrandName1!=null){
			$strSQL .= "\"$Edit_BrandName1\",";
		}else{
			$strSQL .= "\"".addslashes($Edit_BrandName2)."\",";
		}
		if($Edit_BrandStyle!=null){
			$strSQL .= "\"$Edit_BrandStyle\",";
		}else{
			$strSQL .= "\"".addslashes($Edit_BrandStyle)."\",";
		}
		$strSQL .=("\"".addslashes($Edit_ProductName)."\",
					\"".addslashes($Edit_ProductDescription)."\",
					\"".addslashes($Edit_NoticeToPurchasers)."\",
					\"".addslashes($Edit_SearchEngineTags)."\",");
		if($Edit_Player1!=null){
			$strSQL .= "\"$Edit_Player1\",";
		}else{
			$strSQL .= "\"".addslashes($Edit_Player2)."\",";
		}
		if($Edit_League1!=null){
			$strSQL .= "\"$Edit_League1\",";
		}else{
			$strSQL .= "\"".addslashes($Edit_League2)."\",";
		}
		if($Edit_Club1!=null){
			$strSQL .= "\"$Edit_Club1\",";
		}else{
			$strSQL .= "\"".addslashes($Edit_Club2)."\",";
		}
		if($Edit_Country1!=null){
			$strSQL .= "\"$Edit_Country1\",";
		}else{
			$strSQL .= "\"".addslashes($Edit_Country2)."\",";
		}												
		$strSQL .= 	("\"".$Edit_MadeOfMaterial."\",
					\"".$Edit_Cost."\",
					\"".$Edit_UnitPrice."\",
					\"".$Edit_UnitPriceOnSale."\",
					\"".$Edit_PrepackQuantity."\",
					\"".$Edit_FeeForPersonalization."\",
					\"".$Edit_FeeForAttachingEmblems."\",
					\"".$Edit_Weight_Pounds."\",
					\"".$Free_Shipping."\",
					\"".$IsTaxable."\",
					\"".$Edit_IsThisBackOrderItem."\",
					\"".$Edit_ForMenOrWomen."\",
					\"".$Edit_SizeChartID."\",
					\"".$Edit_PackChartID."\",
					\"".$checkColor."\",
					\"".$personalize."\",
					\"".$Edit_QuantityDiscountID."\",
					\"".$_COOKIE["aduserID"]."\",
					\"".$Edit_MatchesWithProduct1."\",
					\"".$Edit_MatchesWithProduct2."\",
					\"".$Edit_MatchesWithProduct3."\",
					\"".$Edit_MatchesWithProduct4."\",
					\"".$Edit_MatchesWithProduct5."\",
					\"".$Edit_MatchesWithProduct6."\"");
		$strSQL .= $picSQL . ")";
//print_r($strSQL);
//exit;
		
		$DB->query($strSQL);
		
		$ProductID = $OmaxProID;
		$DELLTDB = new myDB;
		$DELLTDB->query("UPDATE TProductColors SET Instock='N', ProductID=".$OmaxProID." WHERE ProductID=0");
		
		foreach($_POST["colorchk"] as $key => $val) {
			$updateSQL 	= ("UPDATE TProductColors SET
					Instock				= \"Y\"
					WHERE Color='".$val."'");
			
			$DB->query($updateSQL);
		}
		
		$i=6;
		$SQL = "SELECT * FROM TProductColors WHERE ProductID=".$ProductID." Order by ProductColor" ;
		$DBX = new myDB;
		$DBX->query($SQL);
		while ($data = $DBX->fetch_array($DBX->res)){
			
			$updateSQL 	= ("UPDATE TProductColors SET
					imageno				= ".$i."
					WHERE ProductColor='".$data["ProductColor"]."'");
			
			$DB->query($updateSQL);
			$i++;

		}



	}

	elseif ($action == "update"){
		$i = 0;
		$len = count($_POST["CheckedColorID"]);

		foreach ($_POST["CheckedColorID"] as $key => $val){
			if($i == $len-1){
				$checkColor .= $val;
			}else{
				$checkColor .= $val.",";
			}
			$i++;
		}

		$checkColor=$CheckedColorID1;	

		$Obj = new myUpload();
		for ($i=1; $i<26; $i++) {
			if(${"Picture".$i}['size']>0) {
				$Obj->upload(${"Picture".$i});
				$picSQL .= " Picture".$i."=\"".$Obj->uploadfile."\",";
			}
		}
		
		$strSQL = ("UPDATE Products SET
						IsActive			= \"".(($Edit_IsActive=='Y')?'Y':'N')."\",
						Cat1ID				= \"".$Edit_Cat1ID."\",
						Cat2ID				= \"".$Edit_Cat2ID."\",");
		if($Edit_Style!=null){
			$strSQL .= "StyleNo				= \"" . $Edit_Style . "\", ";
		}else{
			$strSQL .= "StyleNo				= \"" . addslashes($Edit_Style) . "\", ";
		}
		if($Edit_BrandName1!=null){
			$strSQL .= "BrandName				= \"" . $Edit_BrandName1 . "\", ";
		}else{
			$strSQL .= "BrandName				= \"" . addslashes($Edit_BrandName2) . "\", ";
		}
		
		if($Edit_BrandStyle!=null){
			$strSQL .= "BrandStyle				= \"" . $Edit_BrandStyle . "\", ";
		}else{
			$strSQL .= "BrandStyle				= \"" . addslashes($Edit_BrandStyle) . "\", ";
		}
		$strSQL 	.=("ProductName			= \"".addslashes($Edit_ProductName)."\",
				 		ProductDescription	= \"".addslashes($Edit_ProductDescription)."\",
				 		NoticeToPurchasers	= \"".addslashes($Edit_NoticeToPurchasers)."\",
				 		searchEngineTags	= \"".addslashes($Edit_SearchEngineTags)."\",");			 				
		if ($Edit_Player1!=null) {
			$strSQL .= "Player				= \"" . $Edit_Player1 . "\", ";
		} else {
			$strSQL .= "Player				= \"" . addslashes($Edit_Player2) . "\", ";
		}
		if($Edit_League1!=null){
			$strSQL .= "League				= \"" . $Edit_League1 . "\", ";
		}else{
			$strSQL .= "League				= \"" . addslashes($Edit_League2) . "\", ";
		}
		if($Edit_Club1!=null){
			$strSQL .= "Club				= \"" . $Edit_Club1 . "\", ";
		}else{
			$strSQL .= "Club				= \"" . addslashes($Edit_Club2) . "\", ";
		}
		if($Edit_Country1!=null){
			$strSQL .= "Country				= \"" . $Edit_Country1 . "\", ";
		}else{
			$strSQL .= "Country				= \"" . addslashes($Edit_Country2) . "\", ";
		}

			$strSQL .=("MadeOfMaterial			= \"".$Edit_MadeOfMaterial."\",
						Cost				= \"".$Edit_Cost."\",
						UnitPrice				= \"".$Edit_UnitPrice."\",
						UnitPriceOnSale			= \"".$Edit_UnitPriceOnSale."\",
						PrepackQuantity			= \"".$Edit_PrepackQuantity."\",
						FeeForPersonalization	= \"".$Edit_FeeForPersonalization."\",
						FeeForAttachingEmblems	= \"".$Edit_FeeForAttachingEmblems."\",
						Weight_Pounds			= \"".$Edit_Weight_Pounds."\",
						FreeShipping			= \"".$Free_Shipping."\",
						IsTaxable				= \"".(($IsTaxable=='Y')?'Y':'N')."\",
						IsThisBackOrderItem		= \"".$Edit_IsThisBackOrderItem."\",
						ForMenOrWomen			= \"".$Edit_ForMenOrWomen."\",
						SizeChartID				= \"".$Edit_SizeChartID."\",
						PackChartID				= \"".$Edit_PackChartID."\",
						ColorIDs				= \"".$checkColor."\",
						personalize				= \"".$personalize."\",
						QuantityDiscountID		= \"".$Edit_QuantityDiscountID."\",
						AdminID		= \"".$_COOKIE["aduserID"]."\",
						MatchesWithProduct1		= \"".$Edit_MatchesWithProduct1."\",
						MatchesWithProduct2		= \"".$Edit_MatchesWithProduct2."\",
						MatchesWithProduct3		= \"".$Edit_MatchesWithProduct3."\",
				 		MatchesWithProduct4		= \"".$Edit_MatchesWithProduct4."\",			
						MatchesWithProduct5		= \"".$Edit_MatchesWithProduct5."\",
				 		MatchesWithProduct6		= \"".$Edit_MatchesWithProduct6."\",
						".$picSQL."
						DateTimeLastModified = now()
						WHERE ProductID=".$ProductID);
			//echo $strSQL."<br/>";
			//exit;

		$DB->query($strSQL);
		$DELLTDB = new myDB;
		$DELLTDB->query("UPDATE TProductColors SET Instock='N',ProductID=".$ProductID." WHERE ProductID=".$ProductID);
		
		
		foreach($_POST["colorchk"] as $key => $val) {
			$updateSQL 	= ("UPDATE TProductColors SET
					Instock				= \"Y\"
					WHERE Color='".$val."'");
			
			$DB->query($updateSQL);
		}

		$i=6;
		$SQL = "SELECT * FROM TProductColors WHERE ProductID=".$ProductID." Order by ProductColor" ;
		$DBX = new myDB;
		$DBX->query($SQL);
		while ($data = $DBX->fetch_array($DBX->res)){
			
			$updateSQL 	= ("UPDATE TProductColors SET
					imageno				= ".$i."
					WHERE ProductColor='".$data["ProductColor"]."'");
			
			$DB->query($updateSQL);
			$i++;

		}
		
	} 

	$DB->close();
	$DELLTDB->close();
	$DBX->close();
	if($ProductID!=null){
		echo "<script>location.replace('Manage_Products.php?act=view&aid={$ProductID}');</script>";
	}else{
		echo "<script>location.replace('Manage_Products.php');</script>";
	}	
?>