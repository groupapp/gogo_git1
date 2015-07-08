<?php 
/************************************
 *
*	Ajax color pick List
*
************************************/
include "../include/function.php";
$mode	= (isset($_POST['mode']))?$_POST['mode']:null;
$delcolorid	= (isset($_POST['delcolorid']))?$_POST['delcolorid']:null;
$colorid	= (isset($_POST['colorid']))?$_POST['colorid']:null;
$pcolorid	= (isset($_POST['pcolorid']))?$_POST['pcolorid']:null;
$imageno	= (isset($_POST['imageno']))?$_POST['imageno']:null;
$imagechk	= (isset($_POST['imagechk']))?$_POST['imagechk']:null;
$productid	= (isset($_POST['productid']))?$_POST['productid']:0;
$keyword	= (isset($_POST['keyword']))?$_POST['keyword']:null;
$chkidx		= (isset($_POST['chkidx']))?$_POST['chkidx']:null;
$DB = new myDB;
$tDB = new myDB;
$cnt = 0;
$json ="";

switch ($mode) {

	case "search":
		$strSQL = "SELECT * FROM Colors WHERE Color LIKE '%".$keyword."%' ORDER BY Color ASC";	
		$DB->query($strSQL);
		
		$json = '{"colors": [';
		while ($data = $DB->fetch_array($DB->res)) {
			if ($cnt>0) $json .=",";
			$json .= '{"scode":"'.$data["ColorID"].'", "sname":"'.$data["Color"].'"}';
			$cnt++;
		}
		$json .= ']}';
	break;

	case "nosearch":
		$strSQL = "SELECT * FROM Colors ORDER BY Color ASC";	
		$DB->query($strSQL);
		
		$json = '{"colors": [';
		while ($data = $DB->fetch_array($DB->res)) {
			if ($cnt>0) $json .=",";
			$json .= '{"scode":"'.$data["ColorID"].'", "sname":"'.$data["Color"].'"}';
			$cnt++;
		}
		$json .= ']}';
	break;
	
	case "add":	
		
		
		$DB2 = new myDB;
		$strSQL1 = "SELECT ProductColor FROM TProductColors WHERE ProductID=".$productid." and ColorID=".$colorid." and imageno=".$imageno;	
		$DB2->query($strSQL1);
		
		if ($DB2->rows>0)
		{	
			break;
		}
		
		
		$DB3 = new myDB;
		$strSQL2 = "SELECT Color FROM Colors WHERE ColorID=".$colorid;	
		$DB3->query($strSQL2);
		while ($data1 = $DB3->fetch_array($DB3->res)) {
			$color=$data1["Color"];
		}
		
		$DB->query("INSERT INTO TProductColors (Color,ColorID, ProductID, imageno)
						VALUES(
							\"".$color."\",
							\"".$colorid."\",
							\"".$productid."\",
							\"".$imageno."\"
						)");
						
		
		$DB1 = new myDB;
		$strSQL = "SELECT a.ProductColor,b.Color FROM TProductColors a,Colors b WHERE a.ColorID=b.ColorID and a.ProductID=".$productid." and a.imageno=".$imageno." ORDER BY b.Color ASC";	
		$DB1->query($strSQL);
		
		$json = '{"colors": [';
		while ($data = $DB1->fetch_array($DB1->res)) {
			if ($cnt>0) $json .=",";
			$json .= '{"scode":"'.$data["ProductColor"].'", "sname":"'.$data["Color"].'"}';
			$cnt++;
		}
		$json .= ']}';
		
		
		
	break;
	
	case "update":	
		
		
		$DB2 = new myDB;
		$strSQL1 = "SELECT ProductColor FROM ProductColors WHERE ProductID=".$productid." and ColorID=".$colorid." and imageno=".$imageno;	
		$DB2->query($strSQL1);
		
		if ($DB2->rows>0)
		{	
			break;
		}
	
		
		$DB3 = new myDB;
		$strSQL2 = "SELECT Color FROM Colors WHERE ColorID=".$colorid;	
		$DB3->query($strSQL2);
		while ($data1 = $DB3->fetch_array($DB3->res)) {
			$color=$data1["Color"];
		}
		
		$DB->query("INSERT INTO ProductColors (Color,ColorID, ProductID, imageno)
						VALUES(
							\"".$color."\",
							\"".$colorid."\",
							\"".$productid."\",
							\"".$imageno."\"
						)");
						
						
		
		$DB1 = new myDB;
		$strSQL = "SELECT a.ProductColor,b.Color FROM ProductColors a,Colors b WHERE a.ColorID=b.ColorID and a.ProductID=".$productid." and a.imageno=".$imageno." ORDER BY b.Color ASC";	
		$DB1->query($strSQL);
		
		$json = '{"colors": [';
		while ($data = $DB1->fetch_array($DB1->res)) {
			if ($cnt>0) $json .=",";
			$json .= '{"scode":"'.$data["ProductColor"].'", "sname":"'.$data["Color"].'"}';
			$cnt++;
		}
		$json .= ']}';
		
		
		
	break;
	
	case "del":	
		
		$DB->query("DELETE FROM ProductColors WHERE ProductColor=".$delcolorid);
		
		$DB1 = new myDB;
		$strSQL = "SELECT a.ProductColor,b.Color FROM ProductColors a,Colors b WHERE a.ColorID=b.ColorID and a.ProductID=".$productid." and a.imageno=".$imageno." ORDER BY b.Color ASC";
		$DB1->query($strSQL);
		
		$json = '{"colors": [';
		while ($data = $DB1->fetch_array($DB1->res)) {
			if ($cnt>0) $json .=",";
			$json .= '{"scode":"'.$data["ProductColor"].'", "sname":"'.$data["Color"].'"}';
			$cnt++;
		}
		$json .= ']}';
	break;
	

	case "add1":	
		
		
		$DB2 = new myDB;
		$DBi = new myDB;
		//$tDBi = new myDB;
		$DBi2 = new myDB;
		$DB8 = new myDB;
		$DB7 = new myDB;
		
		
		$strSQL7 = "SELECT ProductColor FROM TProductColors WHERE ColorID=".$colorid." and ProductID=".$productid;
		
		$DB7->query($strSQL7);
		
		if ($DB7->rows>0)
		{	
			break;
		}

		if($productid!="" && $pcolorid!="")	
		{
			$strDel ="DELETE  FROM TProductColors WHERE  ColorID in(".$chkidx.") and ProductID=".$productid;
			$DB->query($strDel);
			
			//$json=$strDel;
			
			$strSQL1 = "SELECT * FROM Colors WHERE ColorID in(".$chkidx.") and IsActive = 'Y' ORDER BY Color";	
			
			//$json=$strSQL1;

			$DB2->query($strSQL1);
			while ($data = $DB2->fetch_array($DB2->res)) {
				
				$strSQLx = "SELECT * FROM TProductColors WHERE ColorID =".$data["ColorID"]." and ProductID= ".$productid." and colorid=".$chkidx." and imagechk=1";
				$DBx = new myDB;
				$DBx->query($strSQLx);
				
				if($DBx->rows==0)
				{
						$strSQLi="INSERT INTO TProductColors (Color,ColorID, ProductID,imagechk)
									VALUES(
										\"".$data["Color"]."\",
										\"".$data["ColorID"]."\",
										\"".$productid."\",1									
									)";
						$DBi->query($strSQLi);

						/*$tstrSQLi="INSERT INTO ProductColors (Color,ColorID, ProductID,imageno)
									VALUES(
										\"".$data["Color"]."\",
										\"".$data["ColorID"]."\",
										\"".$productid."\",1									
									)";
						$tDBi->query($tstrSQLi);*/
						

				}
				
			}

			$DB7 = new myDB;
				$strSQL7 = "SELECT Color FROM Colors   WHERE ColorID=".$colorid;	
				$DB7->query($strSQL7);
				while ($data7 = $DB7->fetch_array($DB7->res)) {
					$color=$data7["Color"];
				}
				
				$DB->query("INSERT INTO TProductColors (Color,ColorID, ProductID)
								VALUES(
									\"".$color."\",
									\"".$colorid."\",
									\"".$productid."\"
				)");


		}		
			
		else
		{
			$DB3 = new myDB;
			$strSQL2 = "SELECT Color FROM Colors   WHERE ColorID=".$colorid;	
			$DB3->query($strSQL2);
			while ($data1 = $DB3->fetch_array($DB3->res)) {
				$color=$data1["Color"];
			}
			
			$DB->query("INSERT INTO TProductColors (Color,ColorID, ProductID)
							VALUES(
								\"".$color."\",
								\"".$colorid."\",
								\"".$productid."\"
								
							)");
			/*$tDB->query("INSERT INTO ProductColors (Color,ColorID, ProductID)
							VALUES(
								\"".$color."\",
								\"".$colorid."\",
								\"".$productid."\"
								
							)");*/				
		}
							
		$DB1 = new myDB;
		if($productid=="")
			$productid=0;

		$strSQL = "SELECT a.ProductColor,b.Color,b.ColorID FROM TProductColors a,Colors b WHERE a.ColorID=b.ColorID and a.ProductID=".$productid."  ORDER BY b.Color ASC" ;	
		$DB1->query($strSQL);
		
		//$json=$strSQL;

		
		$json = '{"colors": [';
		$x="";
		while ($data = $DB1->fetch_array($DB1->res)) {
			if ($cnt>0)
			{
			$json .=",";
			$x .=",";
			}
			$x .= $data["ColorID"];
			$json .= '{"scode":"'.$data["ProductColor"].'","x":"'.$x.'", "sname":"'.$data["Color"].'"}';
			
			$cnt++;
		}
		$json .= ']}';
		
		
		
	break;
	
	case "delall":	
		if($productid=="")
			$productid=0;
		$DB->query("DELETE FROM TProductColors WHERE ProductID=".$productid);
		
		$json = '{"colors": [';
		
		$json .= ']}';
	break;

	case "del1":	
		
		$DB->query("DELETE FROM TProductColors WHERE ProductColor=".$delcolorid);
		//$tDB->query("DELETE FROM ProductColors WHERE ProductColor=".$delcolorid);
		if($productid=="")
			$productid=0;
		$DB1 = new myDB;

	//$strSQL ="SELECT * FROM Colors WHERE ColorID in(select ColorIDs from Products where ProductID=".$productid.") and IsActive = 'Y' ORDER BY Color ASC";

		$strSQL = "SELECT a.ProductColor,b.Color,b.ColorID FROM TProductColors a,Colors b WHERE a.ColorID=b.ColorID and a.ProductID=".$productid." ORDER BY b.Color ASC";
		$DB1->query($strSQL);
		
		//$json= $strSQL;

		
		$json = '{"colors": [';
		while ($data = $DB1->fetch_array($DB1->res)) {
			if ($cnt>0)
			{
			$json .=",";
			$x .=",";
			}
			$x .= $data["ColorID"];
			$json .= '{"scode":"'.$data["ProductColor"].'","x":"'.$x.'", "sname":"'.$data["Color"].'"}';
			$cnt++;
		}
		$json .= ']}';
	break;


	case "newdel":	
		
		$DB->query("DELETE FROM TProductColors WHERE ProductColor=".$delcolorid);
		//$tDB->query("DELETE FROM TProductColors WHERE ProductColor=".$delcolorid);
		$DB1 = new myDB;
		$strSQL = "SELECT a.ProductColor,b.Color FROM TProductColors a,Colors b WHERE a.ColorID=b.ColorID and a.ProductID=".$productid." and a.imageno=".$imageno." ORDER BY b.Color ASC";
		$DB1->query($strSQL);
		
		$json = '{"colors": [';
		while ($data = $DB1->fetch_array($DB1->res)) {
			if ($cnt>0) $json .=",";
			$json .= '{"scode":"'.$data["ProductColor"].'", "sname":"'.$data["Color"].'"}';
			$cnt++;
		}
		$json .= ']}';
	break;
	}
echo $json;

?>