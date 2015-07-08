<?php
include_once dirname(__FILE__) . '/function.php';
$cUser_Num	= (!empty($_POST['cUser_Num']))?$_POST['cUser_Num']:null;
$nFinishSeq	= $_POST['nFinishSeq'];

		$DB 	= new myDB;
		$DB2 	= new myDB;
		$DBtdo = new myDB;
		$DBtuse = new myDB;
		$sDBtdo = new myDB;
		$sDBtuse = new myDB;
				
			$strSQL="SELECT a.*,b.*,c.cName FROM acc_user a,acc_user_coupon b,acc_coupon c WHERE a.cUser_Num=b.cUser_Num and b.nCouponID=c.nCouponID and a.cSponsorX='".$cUser_Num."' and b.nFinishSeq=".$nFinishSeq;
			
			$DB->query($strSQL);
			if ($DB->rows > 0) {
				


				$result = "<table style='margin-left: 30px;'>";
				$n=1;
				$result .= '<tr><td>#</td><td>Member ID</td><td >Name</td><td>Coupon</td><td>Use Date</td><td>Use price</td><td>Commission</td></tr>';
				while ($data = $DB->fetch_array($DB->res)){
				
				
				
				if($data["nActive"]=="N")
				$result .= '<tr style="color:red">';
				else
				$result .= '<tr>';
				
				$result .='<td>'.$n.'</td>';
				$result .="<td>".$data["cUser_Num"]."</td><td>".$data["cFistName"]." ".$data["cLastName"]."</td>";
				$result .= '<td>'.$data["cName"].'</td><td>';
				if($data["nActive"]=="N")
				$result .=$data["dUse_date"];
				$result .="</td><td align='right'>";
				if($data["nActive"]=="N")
				$result .="$".$data["fSale"];
				$result .="</td><td align='right'>";
				if($data["nActive"]=="N")
				$result .="$".$data["fComision"];
				$result .="</td></tr>";
				$n=$n+1;
				}
				$result .="</table>";
				
			}		
			
		echo $result;


?>