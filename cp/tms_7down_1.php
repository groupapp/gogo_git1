<?php
//include_once dirname(__FILE__) . "/kadmin/function.php";
include("./kadmin/function.php");

$RDB = new myDB;
$n=1;

$RstrSQL = "SELECT *  FROM acc_user where cActivity ='O' Order by  nUser_Num ";
$RDB->query($RstrSQL);
while ($Rdata = $RDB->fetch_array($RDB->res)){
$RcUser_Num=$Rdata["cUser_Num"];
//$RcUser_Num='10010T';
$RcUser_Num1=$RcUser_Num;
Generator_down($RcUser_Num,$RcUser_Num1);	
}

include("./tms_7sum.php");

echo "<script>alert('good job!!')</script>";

function Generator_down($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;
	$DBch = new myDB;
	$strSQL = "SELECT *  FROM acc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$SQLchk="SELECT * FROM acc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=1";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE acc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=1";	
			}	
			else
			{
				$insert_query = "INSERT INTO acc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
				$insert_query	.="\"".$RcUser_Num1."\",";
				$insert_query	.="\"".$data["cSponsorX"]."\",";
				$insert_query	.="\"".$data["cUser_Num"]."\",
						now(),
						now(),
						\"".$data["nTotal"]."\",1					
						)";
				//echo $insert_query."<br>\n";
			}
			$DBi->query($insert_query);	
			Generator_down1($cUser_Num,$RcUser_Num1);
				
	}
	
}

function Generator_down1($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;
	$DBch = new myDB;
	$strSQL = "SELECT *  FROM acc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			$SQLchk="SELECT * FROM acc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=2";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE acc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=2";	
			}	
			else
			{
				$insert_query = "INSERT INTO acc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
				$insert_query	.="\"".$RcUser_Num1."\",";
				$insert_query	.="\"".$data["cSponsorX"]."\",";
				$insert_query	.="\"".$data["cUser_Num"]."\",
						now(),
						now(),
						\"".$data["nTotal"]."\",2					
						)";
				//echo $insert_query."<br>\n";
			}
			$DBi->query($insert_query);	
			Generator_down2($cUser_Num,$RcUser_Num1);
				
	}
	
}

function Generator_down2($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;
	$DBch = new myDB;
	$strSQL = "SELECT *  FROM acc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			$SQLchk="SELECT * FROM acc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=3";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE acc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=3";	
			}	
			else
			{
				$insert_query = "INSERT INTO acc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
				$insert_query	.="\"".$RcUser_Num1."\",";
				$insert_query	.="\"".$data["cSponsorX"]."\",";
				$insert_query	.="\"".$data["cUser_Num"]."\",
						now(),
						now(),
						\"".$data["nTotal"]."\",3					
						)";
			}
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);	
			Generator_down3($cUser_Num,$RcUser_Num1);
				
	}
	
}

function Generator_down3($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;
	$DBch = new myDB;	
	$strSQL = "SELECT *  FROM acc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			$SQLchk="SELECT * FROM acc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=4";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE acc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=4";	
			}	
			else
			{
				$insert_query = "INSERT INTO acc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
				$insert_query	.="\"".$RcUser_Num1."\",";
				$insert_query	.="\"".$data["cSponsorX"]."\",";
				$insert_query	.="\"".$data["cUser_Num"]."\",
						now(),
						now(),
						\"".$data["nTotal"]."\",4					
						)";
				//echo $insert_query."<br>\n";
			}
			$DBi->query($insert_query);	
			Generator_down4($cUser_Num,$RcUser_Num1);
				
	}
	
}
function Generator_down4($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;
	$DBch = new myDB;
	$strSQL = "SELECT *  FROM acc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			$SQLchk="SELECT * FROM acc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=5";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE acc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=5";	
			}	
			else
			{
				$insert_query = "INSERT INTO acc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
				$insert_query	.="\"".$RcUser_Num1."\",";
				$insert_query	.="\"".$data["cSponsorX"]."\",";
				$insert_query	.="\"".$data["cUser_Num"]."\",
						now(),
						now(),
						\"".$data["nTotal"]."\",5					
						)";
				//echo $insert_query."<br>\n";
			}
			$DBi->query($insert_query);	
			Generator_down5($cUser_Num,$RcUser_Num1);
				
	}
	
}
function Generator_down5($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;
	$DBch = new myDB;	
	$strSQL = "SELECT *  FROM acc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			$SQLchk="SELECT * FROM acc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=6";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE acc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=6";	
			}	
			else
			{
				$insert_query = "INSERT INTO acc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
				$insert_query	.="\"".$RcUser_Num1."\",";
				$insert_query	.="\"".$data["cSponsorX"]."\",";
				$insert_query	.="\"".$data["cUser_Num"]."\",
						now(),
						now(),
						\"".$data["nTotal"]."\",6					
						)";
				//echo $insert_query."<br>\n";
			}
			$DBi->query($insert_query);	
			Generator_down6($cUser_Num,$RcUser_Num1);
				
	}
	
}

function Generator_down6($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;
	$DBch = new myDB;
	$strSQL = "SELECT *  FROM acc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			$SQLchk="SELECT * FROM acc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=7";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE acc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=7";	
			}	
			else
			{
				$insert_query = "INSERT INTO acc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
				$insert_query	.="\"".$RcUser_Num1."\",";
				$insert_query	.="\"".$data["cSponsorX"]."\",";
				$insert_query	.="\"".$data["cUser_Num"]."\",
						now(),
						now(),
						\"".$data["nTotal"]."\",7					
						)";
			}
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);	
			
				
	}
}	

?>