<?php
include_once dirname(__FILE__) . "/include/function.php";


function CallGroupList($groupidx, $loopcnt, $Pk_code) 
{
	$DB1 = new myDB;
	//$parentidx = $groupidx;
	$strSQL = "SELECT * FROM  item_group where parent_id_group = ". $groupidx . " order by parent_id_group" ; 
	$DB1->query($strSQL);
	while($list_group = $DB1->fetch_array($DB1->res)) {
		
		$DB2 = new myDB;
		$strSQLcnt = "SELECT * FROM  item_group where parent_id_group = ". $list_group["id_group"]; 
		$DB2->query($strSQLcnt);
		$childCnt = $DB2->rows;
		
		if ($childCnt > 0) // existing child
		{
			echo '<div class="col-sm-'. $loopcnt .'">';
		}
		$loopcnt = $loopcnt - 2;
		echo '<div class="col-sm-2">';
		$DB4 = new myDB;

		$xstrSQL = "SELECT a.*,b.* FROM  data a,item b where a.id_item=b.id_item and b.id_group=".$list_group["id_group"]." and b.parent_id_item= 0 and a.pk_code=".$Pk_code; 
		$DB4->query($xstrSQL);
		
		$loopfirst = true;
		while($list_data = $DB4->fetch_array($DB4->res)) {
			if ($loopfirst)
			{
				echo "<table class='table table-striped table-condensed'>";
				echo '<tr><td colspan="2">'. $list_group["name_group"]  . '</td></tr>';
				$loopfirst = false;
			}
			echo "<tr >";
			echo "<td>". ':' . $list_data["pk_code"] .$list_data["field_name"]."</td>";
			echo "<td >".$list_data["varchr_value"]."</td>";
			echo "</tr >";
		}
		
		if (!$loopfirst)
		{
			echo "</table>";
		}
		else
		{
			echo $list_group["name_group"];
		}
		
		echo '</div>';
		
		if ($childCnt > 0)
		{
			$DB_Child = new myDB;
			$strParentCode = "SELECT * from pk_code where parent_pk_code =".$Pk_code; 
			$DB_Child->query($strParentCode);
			while($child_data = $DB_Child->fetch_array($DB_Child->res)) {
				
			}
			
			CallGroupList($list_group["id_group"], $loopcnt, $Pk_code);
			echo '</div>';
		}
	}
}

$DB_item = new myDB;
$PkstrSQL = "SELECT * FROM  pk_code  where delete_date=0 and parent_pk_code is null "; 
$DB_item->query($PkstrSQL);

while($Pk_code = $DB_item->fetch_array($DB_item->res)) {
	CallGroupList(0, 12, $Pk_code["pk_code"]);
}

?>

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



</body>
</html>
