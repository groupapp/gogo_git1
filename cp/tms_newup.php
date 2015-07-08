<?php
//include_once dirname(__FILE__) . "/kadmin/function.php";
include("./kadmin/function.php");
$n=1;
$flag=0;
$cSponsorX='10830T';	
$DB_f = new myDB;
$DBi2 = new myDB;
$DDB= new myDB;
	do{
	 $strSQL_f="SELECT * FROM  acc_user  WHERE cUser_Num = '".$cSponsorX."' and cActivity ='O'";
	 $DB_f->query($strSQL_f);
		
		 if ($DB_f->rows==0)
			 break;
		 else
			 {	 

				while ($data_f = $DB_f->fetch_array($DB_f->res)){
						$cSponsorX=$data_f["cSponsorX"];
						$cUser_Num= $data_f["cUser_Num"];
						$nUser_Num= $data_f["nUser_Num"];
						$nSalaryUS= $data_f["nSalaryUS"];
						$cPosition= $data_f["cPosition"];
						$cOpenDate= $data_f["cOpenDate"];
						$cOpenTime= $data_f["cOpenTime"];
						$cActivity= $data_f["cActivity"];
				}
				
				if($flag==0)
						{
							$f_cSponsorX= $cSponsorX;
							$f_cUser_Num= $cUser_Num;
							$f_nUser_Num= $nUser_Num;
							$f_cOpenDate= $cOpenDate;
							$f_cOpenTime= $cOpenTime;
							$f_cActivity= $cActivity;
							$flag=1;
						}	
			
			
				if($cSponsorX!="Progenitor")
				{			
					$insert_query2 = "INSERT INTO tacc_3nd (cStartUser,cSponsorX,cUser_Num,nUser_Num,cOpenDate,cOpenTime,cActivity,nLevel) VALUES (	
							\"".$cSponsorX."\",";					
					$insert_query2	.="\"".$f_cSponsorX."\",";
					$insert_query2	.="\"".$f_cUser_Num."\",
							\"".$f_nUser_Num."\",
							\"".$f_cOpenDate."\",
							\"".$f_cOpenTime."\",
							\"".$f_cActivity."\",
							".$n."
							)";

						$DBi2->query($insert_query2);			 
						$n=$n+1;
				}	
			 }			
		
	}while($cSponsorX!="progenitor");


$DB = new myDB;
$RDB = new myDB;
$xDB = new myDB;

$strSQL="SELECT *  FROM tacc_3nd WHERE and cActivity ='O'";
$DB->query($strSQL);
while ($data = $DB->fetch_array($DB->res)){

	$cUser_Num=$data["cStartUser"];
	
	down_count1($cUser_Num);
	down_count2($cUser_Num);
	down_count3($cUser_Num);
}




$RstrSQL = "SELECT *  FROM tacc_3nd WHERE and cActivity ='O'";
$RDB->query($RstrSQL);
while ($Rdata = $RDB->fetch_array($RDB->res)){
	$RcUser_Num=$Rdata["cStartUser"];
	$RcUser_Num1=$RcUser_Num;
	Generator_down($RcUser_Num,$RcUser_Num1);	
}


$strSQL="SELECT *  FROM tacc_3nd WHERE and cActivity ='O'";
$xDB->query($strSQL);
while ($datax = $xDB->fetch_array($xDB->res)){

	$cUser_Num=$datax["cStartUser"];
	
	sum_1($cUser_Num);
	sum_2($cUser_Num);
	sum_3($cUser_Num);
	sum_4($cUser_Num);
	sum_5($cUser_Num);
	sum_6($cUser_Num);
	sum_7($cUser_Num);
	
	
}

$DstrSQL="DELETE  FROM tacc_3nd ";
$DDB->query($DstrSQL);

function down_count1($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;
$DBc = new myDB;
$DBi1 = new myDB;
$DBi2 = new myDB;
$DBEx= new myDB;
$DBw = new myDB;
$DBFch = new myDB;
$DBch = new myDB;
$U_DB1 = new myDB;
	$strSQL1="SELECT cSponsorX,cUser_Num,nUser_Num,count(*) as fst FROM  acc_3nd where nLevel=1 and cStartUser= '".$cUser_Num."' Group by cSponsorX";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$cSponsorX=$data1["cSponsorX"];
		$cUser_Num1=$data1["cUser_Num"];
		$fst=$data1["fst"];
		if ($fst>4)
			$chk='O';
		else
			$chk='X';
		
		$SQLchk="SELECT * FROM tacc_4th WHERE cUser_Num='".$cUser_Num."' and nLevel=1";
		$DBch->query($SQLchk);
		if($DBch->rows>0)
		{
			$insert_query = "UPDATE tacc_4th SET nCnt=".$fst.",cLevel_chk=".$chk. "WHERE cUser_Num='".$cUser_Num."' and nLevel=1" ;
		}
		else
		{
			$insert_query = "INSERT INTO tacc_4th (cStartUser,cSponsorX,cUser_Num,nUser_Num,cInputDate,cInputTime,nCnt,nLevel,cLevel_chk) VALUES (";							
			$insert_query	.="\"".$cUser_Num."\",";
			$insert_query	.="\"".$cSponsorX."\",";
			$insert_query	.="\"".$cUser_Num1."\",
						\"".$data1["nUser_Num"]."\",
						now(),
						now(),
						\"".$fst."\",1,
						\"".$chk."\"
						)";

		}
		$DBi->query($insert_query);
		//echo $cSponsorX.",".$cUser_Num.",".$fst.",1::<br>\n";
			
		//down_count2($cUser_Num);
	}

	$strSQLc="SELECT cSponsorX,nCnt from acc_4th where nLevel=1 and cStartUser= '".$cUser_Num."' ";//and cLevel_chk='O'
	$DBc->query($strSQLc);
	while ($datac = $DBc->fetch_array($DBc->res)){	
		$nCnt=$datac["nCnt"];
			
		if($nCnt>4)
		{	
			$strSQLw="SELECT *  FROM acc_user Where cUser_Num='".$cUser_Num."'";
			$DBw->query($strSQLw);
			while ($dataw = $DBw->fetch_array($DBw->res)){
				$cSponsorX=$dataw["cSponsorX"];
			}
			$nExtra=$nCnt-5;
			$SQLFchk="SELECT * FROM acc_pool3 WHERE cUser_Num='".$cUser_Num."' and cLevel_chk='O' and nLevel=1";
			$DBFch->query($SQLFchk);
			if($DBFch->rows==0)
			{
				$insert_query1 = "INSERT INTO acc_pool3 (cSponsorX,cUser_Num,cInputDate,cInputTime,nFrist,nTotal,nExtra) VALUES (";							
				$insert_query1	.="\"".$cSponsorX."\",";
				$insert_query1	.="\"".$cUser_Num."\",
						now(),
						now(),
						2.5,2.5
						)";
				$DBi1->query($insert_query1);
				
				$SQLEx="SELECT * FROM acc_Extrapool3 WHERE cUser_Num='".$cUser_Num."'";
				$DBEx->query($SQLEx);
				if($DBEx->rows==0)
				{
					while ($dataex = $DBEx->fetch_array($DBEx->res)){
						$nBalance=$dataex["nBalance"];
					}
					$nExtra=$nExtra-$nBalance;
					
					$insert_query2 = "INSERT INTO acc_Extrapool3 (cSponsorX,cUser_Num,cInputDate,cInputTime,nExtra,nBalance) VALUES (";							
					$insert_query2	.="\"".$cSponsorX."\",";
					$insert_query2	.="\"".$cUser_Num."\",
							now(),
							now(),".$nExtra."
							,".$nExtra."
							)";
					$DBi2->query($insert_query2);
				}
			}
		}


		$UpDate = "UPDATE  acc_user  SET  n1levelCnt=".$nCnt." WHERE  cUser_Num = '".$cUser_Num."'";
		$U_DB1->query($UpDate);


	}	
	
	

}
function down_count2($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;
$DBc = new myDB;
$DBc1 = new myDB;
$DBch = new myDB;
$U_DB = new myDB;
$U_DB1 = new myDB;
	$strSQL1="SELECT cSponsorX,cUser_Num,nUser_Num,count(*) as fst FROM  acc_3nd where nLevel=2 and cStartUser= '".$cUser_Num."' Group by cSponsorX";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){		
		
		$cSponsorX=$data1["cSponsorX"];
		$cUser_Num1=$data1["cUser_Num"];
		$fst=$data1["fst"];
		if ($fst>4)
			$chk='O';
		else
			$chk='X';

		$SQLchk="SELECT * FROM tacc_4th WHERE cUser_Num='".$cUser_Num."' and nLevel=2";
		$DBch->query($SQLchk);
		if($DBch->rows>0)
		{
			$insert_query = "UPDATE tacc_4th SET nCnt=".$fst.",cLevel_chk=".$chk. "WHERE cUser_Num='".$cUser_Num."' and nLevel=2" ;
		}
		else
		{

			$insert_query = "INSERT INTO tacc_4th (cStartUser,cSponsorX,cUser_Num,nUser_Num,cInputDate,cInputTime,nCnt,nLevel,cLevel_chk) VALUES (";							
			$insert_query	.="\"".$cUser_Num."\",";
			$insert_query	.="\"".$cSponsorX."\",";
			$insert_query	.="\"".$cUser_Num1."\",
						\"".$data1["nUser_Num"]."\",
						now(),
						now(),
						\"".$fst."\",2,
						\"".$chk."\"
						)";
			
		}
		$DBi->query($insert_query);	
		//down_count3($cUser_Num);
	}
	$strSQLc="SELECT count(*) as Second_cnt FROM  tacc_4th where nLevel=2 and cStartUser= '".$cUser_Num."' and cLevel_chk='O'";
	$DBc->query($strSQLc);
	while ($datac = $DBc->fetch_array($DBc->res)){	
		$Second_cnt=$datac["Second_cnt"];
		

		if($Second_cnt>4)	{			
			if (First_chk($cUser_Num))
			{
			 /*$Sum1=Valid_1sum($cUser_Num);
			 $Sum2=Valid_2sum($cUser_Num);
			 $tSum=$Sum1+$Sum2;

			 $Profit1=($tSum*0.5)/$Sum1;
			 $Profit2=($tSum*0.3);
			 */
			  $t=5+25;
			 $Profit1=ROUND($t*0.5/5,2);
			 $Profit2=ROUND($t*0.3/1,2);
			 $nTotal=$Profit1+$Profit2;	
			 
			 $UpSeek = "UPDATE  tacc_pool3  SET  nFrist=".$Profit1.",nSecond=".$Profit2.",nTotal=".$nTotal." WHERE  cUser_Num = '".$cUser_Num."'";
			 $U_DB->query($UpSeek);	

			}
		}

	}	
	

}
function down_count3($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;
$DBc = new myDB;
$DBc1 = new myDB;
$DBch = new myDB;
$U_DB = new myDB;
$U_DB1 = new myDB;
	$strSQL1="SELECT cSponsorX,cUser_Num,nUser_Num,count(*) as fst FROM  acc_3nd where nLevel=3 and cStartUser= '".$cUser_Num."' Group by cSponsorX";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){			
		
		$cSponsorX=$data1["cSponsorX"];
		$cUser_Num1=$data1["cUser_Num"];
		$fst=$data1["fst"];
		if ($fst>4)
			$chk='O';
		else
			$chk='X';
		
		$SQLchk="SELECT * FROM tacc_4th WHERE cUser_Num='".$cUser_Num."' and nLevel=3";
		$DBch->query($SQLchk);
		if($DBch->rows>0)
		{
			$insert_query = "UPDATE tacc_4th SET nCnt=".$fst.",cLevel_chk=".$chk. "WHERE cUser_Num='".$cUser_Num."' and nLevel=3" ;
		}
		else
		{
			$insert_query = "INSERT INTO tacc_4th (cStartUser,cSponsorX,cUser_Num,nUser_Num,cInputDate,cInputTime,nCnt,nLevel,cLevel_chk) VALUES (";							
			$insert_query	.="\"".$cUser_Num."\",";
			$insert_query	.="\"".$cSponsorX."\",";
			$insert_query	.="\"".$cUser_Num1."\",
						\"".$data1["nUser_Num"]."\",
						now(),
						now(),
						\"".$fst."\",3,
						\"".$chk."\"
						)";
			
		//echo $cSponsorX.",".$cUser_Num.",".$fst.",3::<br>\n";
		}
		$DBi->query($insert_query);	
	}

	$strSQLc="SELECT count(*) as Third_cnt FROM  tacc_4th where nLevel=3 and cStartUser= '".$cUser_Num."' and cLevel_chk='O'";
	$DBc->query($strSQLc);
	while ($datac = $DBc->fetch_array($DBc->res)){	
		$Third_cnt=$datac["Third_cnt"];
		

		if($Third_cnt>4)	{			
			if (Second_chk($cUser_Num))
			{
			 /* 	
			 $Sum1=Valid_1sum($cUser_Num);
			 $Sum2=Valid_2sum($cUser_Num);
			 $Sum3=Valid_3sum($cUser_Num);	
			 
			 $tSum=$Sum1+$Sum2+$Sum3;

			 $Profit1=($tSum*0.5)/$Sum2;
			 $Profit2=($tSum*0.3)/$Sum1;
			 $Profit3=($tSum*0.2);
			 */
			 $t=5+25+125;
			 $Profit1=ROUND($t*0.5/25,2);
			 $Profit2=ROUND($t*0.3/5,2);
			 $Profit3=($t*0.2); 	
			 $nTotal=$Profit1+$Profit2+$Profit3;	
			 
			 $UpSeek = "UPDATE  tacc_pool3  SET  nFrist=".$Profit1.",nSecond=".$Profit2.",nThird=".$Profit3.",nTotal=".$nTotal." WHERE  cUser_Num = '".$cUser_Num."'";
			 $U_DB->query($UpSeek);	

			}
		}

	}	

}


function First_chk($cUser_Num){
$DBd = new myDB;

	$strSQLd="SELECT nFrist  tacc_pool3 where cUser_Num= '".$cUser_Num."'";
		$DBd->query($strSQLd);
		while ($datad = $DBd->fetch_array($DBd->res)){	
		$nFrist=$datad["nFrist"];
		}
		if ($nFrist)
			return true;
		else
			return false;

}

function Second_chk($cUser_Num){
$DBd = new myDB;

	$strSQLd="SELECT nSecond  tacc_pool3 where cUser_Num= '".$cUser_Num."'";
		$DBd->query($strSQLd);
		while ($datad = $DBd->fetch_array($DBd->res)){	
		$nSecond=$datad["nSecond"];
		}
		if ($nSecond)
			return true;
		else
			return false;

}

function Valid_1sum($cUser_Num){
$DBd = new myDB;

	$strSQLd="SELECT nCnt  tacc_4th where cUser_Num= '".$cUser_Num."'and cLevel_chk='O' and nLevel=1";
		$DBd->query($strSQLd);
		while ($datad = $DBd->fetch_array($DBd->res)){	
			$nCnt=$datad["nCnt"];
		}
		
		return $nCnt;
		
}


function Valid_2sum($cUser_Num){
$DBd = new myDB;

	$strSQLd="SELECT sum(nCnt) as nCnt2  tacc_4th where cUser_Num= '".$cUser_Num."'and cLevel_chk='O' and nLevel=2";
		$DBd->query($strSQLd);
		while ($datad = $DBd->fetch_array($DBd->res)){	
			$nCnt2=$datad["nCnt2"];
		}
		
		return $nCnt2;
		
}

function Valid_3sum($cUser_Num){
$DBd = new myDB;

	$strSQLd="SELECT sum(nCnt) as nCnt3  tacc_4th where cUser_Num= '".$cUser_Num."'and cLevel_chk='O' and nLevel=3";
		$DBd->query($strSQLd);
		while ($datad = $DBd->fetch_array($DBd->res)){	
			$nCnt3=$datad["nCnt3"];
		}
		
		return $nCnt3;
		
}

//====================================================================================================================
function Generator_down($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;
	$DBch = new myDB;	
	$strSQL = "SELECT *  FROM tacc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$SQLchk="SELECT * FROM tacc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=1";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE tacc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=1";	
			}	
			else
			{
				$insert_query = "INSERT INTO tacc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
				$insert_query	.="\"".$RcUser_Num1."\",";
				$insert_query	.="\"".$data["cSponsorX"]."\",";
				$insert_query	.="\"".$data["cUser_Num"]."\",
						now(),
						now(),
						\"".$data["nTotal"]."\",1					
						)";
			}
			$DBi->query($insert_query);	
			Generator_down1($cUser_Num,$RcUser_Num1);
				
	}
	
}

function Generator_down1($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;
	$DBch = new myDB;
	$strSQL = "SELECT *  FROM tacc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];
			
			$SQLchk="SELECT * FROM tacc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=2";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE tacc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=2";	
			}	
			else
			{
			
				$insert_query = "INSERT INTO tacc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
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
	$strSQL = "SELECT *  FROM tacc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			
			$SQLchk="SELECT * FROM tacc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=3";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE tacc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=3";	
			}	
			else
			{
				$insert_query = "INSERT INTO tacc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
				$insert_query	.="\"".$RcUser_Num1."\",";
				$insert_query	.="\"".$data["cSponsorX"]."\",";
				$insert_query	.="\"".$data["cUser_Num"]."\",
						now(),
						now(),
						\"".$data["nTotal"]."\",3					
						)";
				//echo $insert_query."<br>\n";
			}
			$DBi->query($insert_query);	
			Generator_down3($cUser_Num,$RcUser_Num1);
				
	}
	
}

function Generator_down3($RcUser_Num,$RcUser_Num1){
	$DB = new myDB;
	$DBi = new myDB;
	$DBch = new myDB;
	$strSQL = "SELECT *  FROM tacc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];
			
			$SQLchk="SELECT * FROM tacc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=4";
			$DBch->query($SQLchk);
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE tacc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=4";	
			}	
			else
			{
			
				$insert_query = "INSERT INTO tacc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
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
	$strSQL = "SELECT *  FROM tacc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			$SQLchk="SELECT * FROM tacc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=5";
			$DBch->query($SQLchk);
			
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE tacc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=5";	
			}	
			else
			{
				$insert_query = "INSERT INTO tacc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
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
	$strSQL = "SELECT *  FROM tacc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			$SQLchk="SELECT * FROM tacc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=6";
			$DBch->query($SQLchk);
			
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE tacc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=6";	
			}	
			else
			{
				$insert_query = "INSERT INTO tacc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
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
	$strSQL = "SELECT *  FROM tacc_pool3 WHERE cSponsorX = '".$RcUser_Num."'  ";
	$DB->query($strSQL);	
	while ($data = $DB->fetch_array($DB->res)){
			$cUser_Num=$data["cUser_Num"];			
			$SQLchk="SELECT * FROM tacc_pool7 WHERE cUser_Num='".$cUser_Num."' and nLevel=7";
			$DBch->query($SQLchk);
			
			if($DBch->rows>0)
			{
				$insert_query = "UPDATE tacc_pool7 SET nTotal=".$data["nTotal"]." WHERE cUser_Num='".$cUser_Num."' and nLevel=7";	
			}	
			else
			{
				$insert_query = "INSERT INTO tacc_pool7 (cStartUser,cSponsorX,cUser_Num,cInputDate,cInputTime,nTotal,nLevel) VALUES (";							
				$insert_query	.="\"".$RcUser_Num1."\",";
				$insert_query	.="\"".$data["cSponsorX"]."\",";
				$insert_query	.="\"".$data["cUser_Num"]."\",
						now(),
						now(),
						\"".$data["nTotal"]."\",7					
						)";
				//echo $insert_query."<br>\n";
			}
			$DBi->query($insert_query);	
			
				
	}
}	

//===================================================================================================================

function sum_1($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;
$DBe = new myDB;
$DBu = new myDB;


	$strSQL1="SELECT sum(nTotal) as nTotal FROM  tacc_pool7 where nLevel=1 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float) $data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit1=round($nTotal*0.5,2);
			$insert_query = "INSERT INTO tacc_sumpool7 (cUser_Num,cInputDate,cInputTime,nOne) VALUES (";							
			$insert_query	.="\"".$cUser_Num."\",
						now(),
						now(),
						\"".$nProfit1."\"
						)";
			
			//echo $insert_query.",1<br>\n";
			$DBi->query($insert_query);	
		}

		$strSQLe="SELECT  nExtra FROM  acc_Extrapool3 where cUser_Num= '".$cUser_Num."'";
		$DBe->query($strSQLe);
		while ($datae = $DBe->fetch_array($DBe->res)){
			$nExtra=(float)$datae["nExtra"];
		}
		if($nExtra>4)
		{
			$nProfite=round($nExtra*0.25,3);
			$update_query = "UPDATE acc_sumpool7 SET nEx1=".$nProfite." WHERE cUser_Num='".$cUser_Num."'";	
			$DBu->query($update_query);
		}
	}

}

function sum_2($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  tacc_pool7 where nLevel=2 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit2=round($nTotal*0.25,2);
			$update_query = "update  tacc_sumpool7 set nTwo=".$nProfit2."WHERE cUser_Num='".$cUser_Num."'";							
			
			
			//echo $update_query.",2<br>\n";
			$DBi->query($update_query);	
		}
	}
}

function sum_3($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  tacc_pool7 where nLevel=3 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit3=round($nTotal*0.1,2);
			$update_query = "update  tacc_sumpool7 set nThree=".$nProfit3."WHERE cUser_Num='".$cUser_Num."'";							
			
			
			//echo $update_query.",3<br>\n";
			$DBi->query($update_query);	
		}
	}
}

function sum_4($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  tacc_pool7 where nLevel=4 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit4=round($nTotal*0.04,2);
			$update_query = "update  tacc_sumpool7 set nFour=".$nProfit4."WHERE cUser_Num='".$cUser_Num."'";							
			
			
			//echo $update_query.",4<br>\n";
			$DBi->query($update_query);
		}
	}
}

function sum_5($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  tacc_pool7 where nLevel=5 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit5=round($nTotal*0.03,2);
			$update_query = "update  tacc_sumpool7 set nFive=".$nProfit5."WHERE cUser_Num='".$cUser_Num."'";							
			
			
			//echo $update_query.",5<br>\n";
			$DBi->query($update_query);
		}
	}
}
function sum_6($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  tacc_pool7 where nLevel=6 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit6=round($nTotal*0.02,2);
			$update_query = "update  tacc_sumpool7 set nSix=".$nProfit6."WHERE cUser_Num='".$cUser_Num."'";							
			
			
			//echo $update_query.",6<br>\n";
			$DBi->query($update_query);	
		}
	}
}

function sum_7($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  tacc_pool7 where nLevel=7 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit7=round($nTotal*0.01,2);
			$update_query = "update  tacc_sumpool7 set nSeven=".$nProfit7."WHERE cUser_Num='".$cUser_Num."'";							
			
			
			//echo $update_query.",7<br>\n";
			$DBi->query($update_query);			
		}
	}
}



?>