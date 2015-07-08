<?php
$DB1 = new myDB;
//$strSQL1 = "SELECT b.id_group,d.pk_code,c.id_item,c.field_name FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  a.pk_code=".$pk_code." and c.id_group=".$id_group;
$strSQL1 = "SELECT * FROM  item where id_group=".$id_group." and parent_id_item=0";

//echo $strSQL1;
$test_title1 = CallGroupName($id_group);
$DB1->query($strSQL1);
echo '<h5 class="span-title" style="padding-bottom:10px;">'.$test_title1.'</h5>';
echo " <form method=\"get\" action=\"data_add.php\" class=\"form-inline\" role=\"form\">";		

echo "<select name=\"add_id_item\" class=\"form-control\">";
while($data1 = $DB1->fetch_array($DB1->res)) {
	echo "<option value=\"".$data1["id_item"]."\" class=\"form-control\">".$data1["field_name"]."</option>";
}
echo "</select>";
echo "<input type=\"hidden\" name=\"id_group\"  value=\"".$id_group."\">";
echo "<input type=\"hidden\" name=\"pk_code\"  value=\"".$pk_code."\">";

$DB7 = new myDB;

$astrSQL = "SELECT * FROM  item a,item_group b  where a.id_group=b.id_group and  b.child_chk=1 and a.parent_id_item>0 limit 0,1" ; 

//echo $astrSQL;

$DB7->query($astrSQL);
while($parent_data = $DB7->fetch_array($DB7->res)) {
	$parent_id_item=$parent_data["parent_id_item"];
}


echo "<input type=\"text\" name=\"add_id_value\" class=\"form-control\" value=\"\">";


$DB99 = new myDB;
$xstrSQL = "SELECT * FROM  item  where parent_id_item=".$parent_id_item; 

$DB99->query($xstrSQL);

while($list_data99 = $DB99->fetch_array($DB99->res)) {
	//echo $list_data99["field_name"];
	
	echo "<div class=\"input-group data-edit\"><span class=\"input-group-addon\">".$list_data99["field_name"]."</span>";
	echo "<input type=\"text\" class=\"form-control\" name=\"subadd_id_value[]\"  value=\"\"></div>";
	echo "<input type=\"hidden\" name=\"subadd_id_item[]\"  value=\"".$list_data99["id_item"]."\">";
	
	//echo "<td ><input type=\"hidden\" name=\"subadd_id_seq[]\"  value=\"".$list_data["mul_parent_seq"]."\"></td>";
}



echo "<div class=\"input-group\"><div class=\"input-group-btn\"><input type=\"submit\" name=\"submit_type\" onclick=\"return checkform(this);\" class=\"btn btn-success\" value=\"Add\"></div></div></form>";


?>
