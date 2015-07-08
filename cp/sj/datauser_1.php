
<html>
<head>
<title>USIM Manager</title>
<script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
$(document).on("hidden.bs.modal", function (e) {
    $(e.target).removeData("bs.modal").find(".modal-content").empty();
});
</script>
</head>
<body>
<div class="wrapper">
<?php
include_once dirname(__FILE__) . "/include/function.php";

$list_group_item;

function CallGroup()
{
	global $list_group_item;
	
	$strSQL = "SELECT * FROM  item_group"; 
	$DB3 = new myDB;
	$DB3->query($strSQL);
	$loopidx = 0;
	while($list_group = $DB3->fetch_array($DB3->res)) {
		$list_group_item[$loopidx] = $list_group;;
		$loopidx++;
	}
}

function CallDataList($Pk_code) 
{
	echo '<div class="col-sm-12">';
	global $list_group_item;
	
	$DB_All = new myDB;

	$xstrSQL = "select * from data inner join item on item.id_item = data.id_item where pk_code=".$Pk_code." and item.id_group = "; 
	$DB_All->query($xstrSQL);
	
	$DBChild = new myDB;
	$strSQLcnt = "SELECT * FROM  pk_code where parent_pk_code = ". $Pk_code; 
	$DBChild->query($strSQLcnt);
	$childCnt = $DBChild->rows;
	
	$loopcnt = 12;
	
	for($i=0; $i < sizeof($list_group_item);$i++)
	{
		$DBItem = new myDB;
		$strSqlitem = "select * from data inner join item on item.id_item = data.id_item where pk_code=".$Pk_code." and item.id_group = " . $list_group_item[$i]["id_group"];	
		$DBItem->query($strSqlitem);
		if ($DBItem->rows > 0)
		{
			echo '<div class="col-sm-2">';
			while($list_data = $DBItem->fetch_array($DBItem->res)) {
				echo '<div>';
				echo $list_data["pk_code"];
				echo ":";
				echo $list_data["field_name"];
				echo ':';
				echo $list_data["varchr_value"];
				echo '</div>';
			}
			echo '</div>';
			$loopcnt = $loopcnt -2;
		}
	}
	
	echo '<div class="col-sm-'.$loopcnt.'">';
	if ($childCnt > 0)
	{
		
		while($child_key = $DBChild->fetch_array($DBChild->res)) {
			echo '<div class="col-sm-12" style="padding-top:15px;">';
			
			for($i=0; $i < sizeof($list_group_item);$i++)
			{
				$DBChildData = new myDB;
				$strSqlitem = "select * from data inner join item on item.id_item = data.id_item where pk_code=".$child_key["pk_code"] . " and item.id_group=" . $list_group_item[$i]["id_group"]; 
				$DBChildData->query($strSqlitem);
				if ($DBChildData->rows > 0)
				{
					echo '<div class="col-sm-2">';
					while($list_data = $DBChildData->fetch_array($DBChildData->res)) {
						echo '<div>';
						echo $list_data["pk_code"];
						echo ":";
						echo $list_data["field_name"];
						echo ':';
						echo $list_data["varchr_value"];
						echo '</div>';
					}
					echo '</div>';
					$loopcnt = $loopcnt -2;
				}
			}
			
			echo '</div>';
		}
			
	}
	echo '</div>';
	echo '</div>';

}

$DB_item = new myDB;
$PkstrSQL = "SELECT * FROM  pk_code  where delete_date=0 and parent_pk_code is null "; 
$DB_item->query($PkstrSQL);

CallGroup();

while($Pk_code = $DB_item->fetch_array($DB_item->res)) {
	CallDataList($Pk_code["pk_code"]);
}

?>
</div>
</body>
</html>