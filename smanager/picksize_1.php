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
$imageno	= (isset($_POST['imageno']))?$_POST['imageno']:null;
$productid	= (isset($_POST['productid']))?$_POST['productid']:null;
$keyword	= (isset($_POST['keyword']))?$_POST['keyword']:null;

$DB = new myDB;
$cnt = 0;
$json ="";

switch ($mode) {

	case "search":
		$strSQL = "SELECT * FROM Size WHERE  SizeChartName LIKE '".$keyword."%' ORDER BY SizeChartID ASC";	
		$DB->query($strSQL);
		
		$json = '{"sizes": [';
		while ($data = $DB->fetch_array($DB->res)) {
			if ($cnt>0) $json .=",";
			$json .= '{"scode":"'.$data["SizeChartID"].'", "sname":"'.$data["SizeChartName"].'"}';
			$cnt++;
		}
		$json .= ']}';
	break;

	case "nosearch":
		$strSQL = "SELECT DISTINCT SizeChartID, SizeChartName FROM Size  ORDER BY SizeChartName ASC";	
		$DB->query($strSQL);
		
		$json = '{"sizes": [';
		while ($data = $DB->fetch_array($DB->res)) {
			if ($cnt>0) $json .=",";
			$json .= '{"scode":"'.$data["SizeChartID"].'", "sname":"'.$data["SizeChartName"].'"}';
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
	
	case "newdel":	
		
		$DB->query("DELETE FROM TProductColors WHERE ProductColor=".$delcolorid);
		
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