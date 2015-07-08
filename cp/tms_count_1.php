<?php
//include_once dirname(__FILE__) . "/kadmin/function.php";
$DB = new myDB;
$DB1 = new myDB;
$DB2 = new myDB;
$DB3 = new myDB;
$DB4 = new myDB;
$DB5 = new myDB;
$DBU = new myDB;
//upline function

$UPstr="update acc_user set n1levelCnt=0,n2levelCnt=0,n3levelCnt=0";
$DBU->query($UPstr);

$strSQL="SELECT *  FROM acc_user where cActivity ='O' Order by  nUser_Num ";
$DB->query($strSQL);
while ($data = $DB->fetch_array($DB->res)){

	$cUser_Num=$data["cUser_Num"];
	
	down_count1($cUser_Num);
	down_count2($cUser_Num);
	down_count3($cUser_Num);

	
}




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
		
		
		$SQLchk="SELECT * FROM acc_4th WHERE cStartUser='".$cUser_Num."' and cSponsorX='".$cSponsorX."' and cUser_Num='".$cUser_Num1."' and nLevel=1";
		$DBch->query($SQLchk);
		if($DBch->rows>0)
		{
			$insert_query = "UPDATE acc_4th SET nCnt=".$fst.",cLevel_chk=".$chk. "WHERE cUser_Num='".$cUser_Num."' and nLevel=1" ;
		}
		else
		{

			$insert_query = "INSERT INTO acc_4th (cStartUser,cSponsorX,cUser_Num,nUser_Num,cInputDate,cInputTime,nCnt,nLevel,cLevel_chk) VALUES (";							
			$insert_query	.="\"".$cUser_Num."\",";
			$insert_query	.="\"".$cSponsorX."\",";
			$insert_query	.="\"".$cUser_Num1."\",
						\"".$data1["nUser_Num"]."\",
						now(),
						now(),
						\"".$fst."\",1,
						\"".$chk."\"
						)";
			
			echo $cSponsorX.",".$cUser_Num.",".$fst.",1::<br>\n";
		}
		
		$DBi->query($insert_query);	
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
			$SQLFchk="SELECT * FROM acc_pool3 WHERE cUser_Num='".$cUser_Num."'";
			$DBFch->query($SQLFchk);
			if($DBFch->rows==0)
			{
				$insert_query1 = "INSERT INTO acc_pool3 (cSponsorX,cUser_Num,cInputDate,cInputTime,nFrist,nTotal) VALUES (";							
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
		
		$SQLchk="SELECT * FROM acc_4th  WHERE cStartUser='".$cUser_Num."' and cSponsorX='".$cSponsorX."' and cUser_Num='".$cUser_Num1."' and  nLevel=2";
		$DBch->query($SQLchk);
		if($DBch->rows>0)
		{
			$insert_query = "UPDATE acc_4th SET nCnt=".$fst.",cLevel_chk=".$chk. "WHERE cUser_Num='".$cUser_Num."' and nLevel=2" ;
		}
		else
		{

			$insert_query = "INSERT INTO acc_4th (cStartUser,cSponsorX,cUser_Num,nUser_Num,cInputDate,cInputTime,nCnt,nLevel,cLevel_chk) VALUES (";							
			$insert_query	.="\"".$cUser_Num."\",";
			$insert_query	.="\"".$cSponsorX."\",";
			$insert_query	.="\"".$cUser_Num1."\",
						\"".$data1["nUser_Num"]."\",
						now(),
						now(),
						\"".$fst."\",2,
						\"".$chk."\"
						)";
			
			echo $cSponsorX.",".$cUser_Num.",".$fst.",2::<br>\n";
		}
		$DBi->query($insert_query);	
		//down_count3($cUser_Num);
	}
	$strSQLc="SELECT count(*) as Second_cnt FROM  acc_4th where nLevel=2 and cStartUser= '".$cUser_Num."' and cLevel_chk='O'";
	$DBc->query($strSQLc);
	while ($datac = $DBc->fetch_array($DBc->res)){	
		$Second_cnt=$datac["Second_cnt"];
		
		$strSQLc1="SELECT n1levelCnt FROM  acc_user  WHERE  cUser_Num = '".$cUser_Num."'";;
		$DBc1->query($strSQLc1);
		while ($datac1 = $DBc1->fetch_array($DBc1->res)){	
			$n1levelCnt=$datac1["n1levelCnt"];
		}
		if($n1levelCnt>0)
		{	
			$UpDate = "UPDATE  acc_user  SET  n2levelCnt=".$Second_cnt." WHERE  cUser_Num = '".$cUser_Num."'";
			$U_DB1->query($UpDate);	
		}	
		
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
			 
			 $UpSeek = "UPDATE  acc_pool3  SET  nFrist=".$Profit1.",nSecond=".$Profit2.",nTotal=".$nTotal." WHERE  cUser_Num = '".$cUser_Num."'";
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
		
		$SQLchk="SELECT * FROM acc_4th WHERE  cStartUser='".$cUser_Num."' and cSponsorX='".$cSponsorX."' and cUser_Num='".$cUser_Num1."' and nLevel=3";
		$DBch->query($SQLchk);
		if($DBch->rows>0)
		{
			$insert_query = "UPDATE acc_4th SET nCnt=".$fst.",cLevel_chk=".$chk. "WHERE cUser_Num='".$cUser_Num."' and nLevel=3" ;
		}
		else
		{
			$insert_query = "INSERT INTO acc_4th (cStartUser,cSponsorX,cUser_Num,nUser_Num,cInputDate,cInputTime,nCnt,nLevel,cLevel_chk) VALUES (";							
			$insert_query	.="\"".$cUser_Num."\",";
			$insert_query	.="\"".$cSponsorX."\",";
			$insert_query	.="\"".$cUser_Num1."\",
						\"".$data1["nUser_Num"]."\",
						now(),
						now(),
						\"".$fst."\",3,
						\"".$chk."\"
						)";
			
			echo $cSponsorX.",".$cUser_Num.",".$fst.",3::<br>\n";
		}
		$DBi->query($insert_query);	
	}

	$strSQLc="SELECT count(*) as Third_cnt FROM  acc_4th where nLevel=3 and cStartUser= '".$cUser_Num."' and cLevel_chk='O'";
	$DBc->query($strSQLc);
	while ($datac = $DBc->fetch_array($DBc->res)){	
		$Third_cnt=$datac["Third_cnt"];

		
		$strSQLc1="SELECT n2levelCnt FROM  acc_user  WHERE  cUser_Num = '".$cUser_Num."'";;
		$DBc1->query($strSQLc1);
		while ($datac1 = $DBc1->fetch_array($DBc1->res)){	
			$n2levelCnt=$datac1["n2levelCnt"];
		}
		if($n2levelCnt>0)
		{	

			$UpDate = "UPDATE  acc_user  SET  n3levelCnt=".$Third_cnt." WHERE  cUser_Num = '".$cUser_Num."'";
			$U_DB1->query($UpDate);	
		}

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
			 
			 $UpSeek = "UPDATE  acc_pool3  SET  nFrist=".$Profit1.",nSecond=".$Profit2.",nThird=".$Profit3.",nTotal=".$nTotal." WHERE  cUser_Num = '".$cUser_Num."'";
			 $U_DB->query($UpSeek);	

			}
		}

	}	

}


function First_chk($cUser_Num){
$DBd = new myDB;

	$strSQLd="SELECT nFrist  from acc_pool3 where cUser_Num= '".$cUser_Num."'";
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

	$strSQLd="SELECT nSecond  from acc_pool3 where cUser_Num= '".$cUser_Num."'";
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

	$strSQLd="SELECT nCnt  acc_4th where cUser_Num= '".$cUser_Num."'and cLevel_chk='O' and nLevel=1";
		$DBd->query($strSQLd);
		while ($datad = $DBd->fetch_array($DBd->res)){	
			$nCnt=$datad["nCnt"];
		}
		
		return $nCnt;
		
}


function Valid_2sum($cUser_Num){
$DBd = new myDB;

	$strSQLd="SELECT sum(nCnt) as nCnt2  acc_4th where cUser_Num= '".$cUser_Num."'and cLevel_chk='O' and nLevel=2";
		$DBd->query($strSQLd);
		while ($datad = $DBd->fetch_array($DBd->res)){	
			$nCnt2=$datad["nCnt2"];
		}
		
		return $nCnt2;
		
}

function Valid_3sum($cUser_Num){
$DBd = new myDB;

	$strSQLd="SELECT sum(nCnt) as nCnt3  acc_4th where cUser_Num= '".$cUser_Num."'and cLevel_chk='O' and nLevel=3";
		$DBd->query($strSQLd);
		while ($datad = $DBd->fetch_array($DBd->res)){	
			$nCnt3=$datad["nCnt3"];
		}
		
		return $nCnt3;
		
}


	$DB->close();
	$DB1->close();
	$DB2 ->close();
	$DB3 ->close();
	$DB4 ->close();
	$DB5 ->close();

?>