<?php
include "../include/function.php";
$action	= (isset($_POST['action']))?$_POST['action']:null;
$keyword	= (isset($_POST['keyword']))?$_POST['keyword']:null;
$productid	= (isset($_POST['productid']))?$_POST['productid']:null;


		$DB 	= new myDB;
		$DBQ 	= new myDB;
		if ($action=='color')
		{
			$strSQL = "SELECT * FROM Products WHERE ProductID = ".$productid;
						$DBQ = new myDB();
						$DBQ->query($strSQL);
						$dataProd = $DBQ->fetch_array($DBQ->res);
			if($dataProd["ColorIDs"]=="")
			$strSQL = "SELECT * FROM Colors WHERE Color LIKE '".$keyword."%' and  IsActive = 'Y' ORDER BY Color ASC";

			else
			$strSQL = "SELECT * FROM Colors WHERE Color LIKE '".$keyword."%' and ColorID Not in(".$dataProd["ColorIDs"].") and IsActive = 'Y' ORDER BY Color ASC";
			$DB->query($strSQL);

			$ColorNum = 0;
			$result= "<tr><td><span id=\"x11\"><table><tr>";
			while ($datap = $DB->fetch_array($DB->res)){
				if($ColorNum%4==0){
					$result.= "</tr><tr>";
				}
				$result.= "<td><input type=\"checkbox\" id=\"colorchk_". $datap["ColorID"] ."\" onclick=\"colorchk(". $datap["ColorID"] .")\" name=\"CheckedColorID[]\" value=\"" . $datap["ColorID"] . "\"";
				$result.= " /><span > " . $datap["Color"] . "</span></td>";

				$ColorNum++;
			}
			if($ColorNum%4==0){
				$result.= "</tr>";
			}elseif($ColorNum%4==1){
				$result.= "<td colspan=\"3\"></td></tr>";
			}elseif($ColorNum%4==2){
				$result.= "<td colspan=\"2\"></td></tr>";
			}elseif($ColorNum%4==3){
				$result.= "<td></td></tr>";
			}
			$result.= "</td></tr></table></span>";
		}
		else if($action=='nocolor')
		{
			$strSQL = "SELECT * FROM Colors WHERE   IsActive = 'Y' ORDER BY Color ASC";
			$DB->query($strSQL);
			$ColorNum = 0;
			$result= "<tr><td><span id=\"x11\"><table><tr>";
			while ($datap = $DB->fetch_array($DB->res)){
				if($ColorNum%4==0){
					$result.= "</tr><tr>";
				}
				$result.= "<td><input type=\"checkbox\" id=\"colorchk_". $datap["ColorID"] ."\" onclick=\"colorchk(". $datap["ColorID"] .")\" name=\"CheckedColorID[]\" value=\"" . $datap["ColorID"] . "\"";
				$result.= " /><span > " . $datap["Color"] . "</span></td>";

				$ColorNum++;
			}
			if($ColorNum%4==0){
				$result.= "</tr>";
			}elseif($ColorNum%4==1){
				$result.= "<td colspan=\"3\"></td></tr>";
			}elseif($ColorNum%4==2){
				$result.= "<td colspan=\"2\"></td></tr>";
			}elseif($ColorNum%4==3){
				$result.= "<td></td></tr>";
			}
			$result.= "</td></tr></table></span>";

		}

/*		if ($action=='colorchk')
		{
			$strSQL = "SELECT * FROM Products WHERE ProductID = ".$productid;
						$DBQ = new myDB();
						$DBQ->query($strSQL);
						$dataProd = $DBQ->fetch_array($DBQ->res);
			
			$strSQL = "SELECT * FROM Colors WHERE Color LIKE '".$keyword."%' and  IsActive = 'Y' ORDER BY Color ASC";
			$DB->query($strSQL);
			$ColorNum = 0;
			//$result= "Search:&nbsp<input type=\"text\" id=\"colorkey\" name=\"colorkey\" value=\"".$keyword."\" ><br/>";
			$result="<table width=\"99%\" border=\"0\">";
										
			$result.= "	<tr>";
			$result.= " <td >";
			$result.= "<tr>";
			while ($data = $DB->fetch_array($DB->res)){
				if($ColorNum%4==0){
					$result.= "</tr><tr>";
				}
				$result.= "<td><input type=\"checkbox\" name=\"CheckedColorID[]\" value=\"" . $data["ColorID"] . "\"";
				$tmpArray = explode(",",$dataProd["ColorIDs"]);
				$temp = "";
				for($i=0;$i<=count($tmpArray);$i++){
					if($tmpArray[$i]==$data["ColorID"]){
						$result.= "checked";
						$temp.= "style=\"font-weight: bold; color: #0000ff;\"";
					}
				}
				$result.= " /><span {$temp}> " . $data["Color"] . "</span></td>";

				$ColorNum++;
			}
				if($ColorNum%4==0){
					$result.= "</tr>";
				}elseif($ColorNum%4==1){
					$result.= "<td colspan=\"3\"></td></tr>";
				}elseif($ColorNum%4==2){
					$result.= "<td colspan=\"2\"></td></tr>";
				}elseif($ColorNum%4==3){
					$result.= "<td></td></tr>";
				}
				$result.= "<tr><td colspan=\"4\"><a href=\"#\" onClick=\"hideStuff('ColorsAvailable'); return false;\" class=\"red\">Hide</a></td></tr>";	
				$result.= " </td >";
				$result.= " </tr >";
				$result.= " </table >";
		}*/

		echo $result;


?>