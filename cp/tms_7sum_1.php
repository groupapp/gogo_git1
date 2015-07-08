<?php
//include_once dirname(__FILE__) . "/kadmin/function.php";
$DB = new myDB;
$DB1 = new myDB;
$DB2 = new myDB;
$DB3 = new myDB;
$DB4 = new myDB;
$DB5 = new myDB;

//upline function

$strSQL="SELECT *  FROM acc_user where cActivity ='O' Order by  nUser_Num ";
$DB->query($strSQL);
while ($data = $DB->fetch_array($DB->res)){

	$cUser_Num=$data["cUser_Num"];
	
	sum1($cUser_Num);
	sum2($cUser_Num);
	sum3($cUser_Num);
	sum4($cUser_Num);
	sum5($cUser_Num);
	sum6($cUser_Num);
	sum7($cUser_Num);
	
	
}

function sum1($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;
$DBe = new myDB;
$DBu = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  acc_pool7 where nLevel=1 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit1=round($nTotal*0.5,3);
			$insert_query = "INSERT INTO acc_sumpool7 (cUser_Num,cInputDate,cInputTime,nOne) VALUES (";							
			$insert_query	.="\"".$cUser_Num."\",
						now(),
						now(),
						\"".$nProfit1."\"
						)";
			
			echo $insert_query.",1<br>\n";
			$DBi->query($insert_query);
			
			
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

}

function sum2($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  acc_pool7 where nLevel=2 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit2=round($nTotal*0.25,3);
			$update_query = "update  acc_sumpool7 set nTwo=".$nProfit2." WHERE cUser_Num='".$cUser_Num."'";				
			echo $update_query.",2<br>\n";
			$DBi->query($update_query);
		}
	}
}

function sum3($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  acc_pool7 where nLevel=3 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit3=round($nTotal*0.1,3);
			$update_query = "update  acc_sumpool7 set nThree=".$nProfit3." WHERE cUser_Num='".$cUser_Num."'";				echo $update_query.",3<br>\n";
			$DBi->query($update_query);
		}
	}
}

function sum4($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  acc_pool7 where nLevel=4 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit4=round($nTotal*0.04,3);
			$update_query = "update  acc_sumpool7 set nFour=".$nProfit4." WHERE cUser_Num='".$cUser_Num."'";					
			echo $update_query.",4<br>\n";
			$DBi->query($update_query);	
		}
	}
}

function sum5($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  acc_pool7 where nLevel=5 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit5=round($nTotal*0.03,3);
			$update_query = "update  acc_sumpool7 set nFive=".$nProfit5." WHERE cUser_Num='".$cUser_Num."'";					echo $update_query.",5<br>\n";
			$DBi->query($update_query);	
		}
	}
}
function sum6($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  acc_pool7 where nLevel=6 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit6=round($nTotal*0.02,3);
			$update_query = "update  acc_sumpool7 set nSix=".$nProfit6." WHERE cUser_Num='".$cUser_Num."'";					
			echo $update_query.",6<br>\n";
			$DBi->query($update_query);	
		}
	}
}

function sum7($cUser_Num){
$DB1 = new myDB;
$DBi = new myDB;

	$strSQL1="SELECT sum(nTotal) as nTotal FROM  acc_pool7 where nLevel=7 and cStartUser= '".$cUser_Num."'";
	$DB1->query($strSQL1);
	while ($data1 = $DB1->fetch_array($DB1->res)){
		$nTotal=(float)$data1["nTotal"];
		if($nTotal>0)
		{
			$nProfit7=round($nTotal*0.01,3);
			$update_query = "update  acc_sumpool7 set nSeven=".$nProfit7." WHERE cUser_Num='".$cUser_Num."'";				echo $update_query.",7<br>\n";
			$DBi->query($update_query);	
		}
	}
}


	$DB->close();
	$DB1->close();
	$DB2 ->close();
	$DB3 ->close();
	$DB4 ->close();
	$DB5 ->close();

?>