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

include("./tms_count.php");
echo "<script>alert('1st finish!!')</script>";

function Generator_down($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."' and cActivity ='O' ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",1					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down1($cUser_Num,$RcUser_Num1);		
	}
	
}

function Generator_down1($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."'  and cActivity ='O'";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",2					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down2($cUser_Num,$RcUser_Num1);		
	}
	
}

function Generator_down2($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."'  and cActivity ='O'";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",3					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down3($cUser_Num,$RcUser_Num1);		
	}
	
}

function Generator_down3($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."'  and cActivity ='O'";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",4					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down4($cUser_Num,$RcUser_Num1);		
	}
	
}
function Generator_down4($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."' and cActivity ='O' ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",5					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down5($cUser_Num,$RcUser_Num1);		
	}
	
}
function Generator_down5($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."'  and cActivity ='O'";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",6					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down6($cUser_Num,$RcUser_Num1);		
	}
	
}

function Generator_down6($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."'  and cActivity ='O'";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",7					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down7($cUser_Num,$RcUser_Num1);		
	}
	
}
function Generator_down7($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."'  and cActivity ='O'";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",8					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down8($cUser_Num,$RcUser_Num1);		
	}
	
}
function Generator_down8($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."'  and cActivity ='O'";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",9					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down9($cUser_Num,$RcUser_Num1);		
	}
	
}
function Generator_down9($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."' and cActivity ='O' ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",10					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down10($cUser_Num,$RcUser_Num1);		
	}
	
}
function Generator_down10($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."' and cActivity ='O' ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",11					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down11($cUser_Num,$RcUser_Num1);		
	}
	
}
function Generator_down11($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."' and cActivity ='O' ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",11					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down12($cUser_Num,$RcUser_Num1);			
	}
	
}

function Generator_down12($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."'  and cActivity ='O'";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",12					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down13($cUser_Num,$RcUser_Num1);			
	}
	
}
function Generator_down13($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."'  and cActivity ='O'";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",13					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			Generator_down14($cUser_Num,$RcUser_Num1);
	}
	
}

function Generator_down14($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;	
	$strSQL = "SELECT *  FROM acc_user WHERE cSponsorX = '".$RcUser_Num."'  and cActivity ='O'";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$insert_query = "INSERT INTO acc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (";							
			$insert_query	.="\"".$RcUser_Num1."\",";
			$insert_query	.="\"".$data["cSponsorX"]."\",";
			$insert_query	.="\"".$data["cUser_Num"]."\",
					\"".$data["nUser_Num"]."\",
					\"".$data["cOpenDate"]."\",
					\"".$data["cOpenTime"]."\",
					\"".$data["cActivity"]."\",14					
					)";
			//echo $insert_query."<br>\n";
			$DBi->query($insert_query);			
			//Generator_down11($cUser_Num);		
	}
	
}
?>