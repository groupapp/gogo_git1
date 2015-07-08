<?php

include_once dirname(__FILE__) . "/include/function.php";

$id_group	= empty($_REQUEST["id_group"])?null:$_REQUEST["id_group"];
$pk_code	= empty($_REQUEST["pk_code"])?null:$_REQUEST["pk_code"];
$id_item	= empty($_REQUEST["id_item"])?null:$_REQUEST["id_item"];

$DB1 = new myDB;
//$strSQL1 = "SELECT b.id_group,d.pk_code,c.id_item,c.field_name FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  a.pk_code=".$pk_code." and c.id_group=".$id_group;
$strSQL1 = "SELECT * FROM  item where id_group=".$id_group." and parent_id_item=0";

//echo $strSQL1;
$DB1->query($strSQL1);

$subinputstring = "";
echo '<h5 class="span-title" style="padding-bottom:10px;"> Plan Name</h5>';
echo " <form method=\"post\" action=\"data_edit.php\" class=\"form-inline\" role=\"form\">";		
echo "<div class=\"form-group\"><div class=\"input-group\">";
echo '<select class="form-control" name="add_id_item" data-groupid="'.$id_group.'" data-pkcode="'.$pk_code.'" onchange="return call_item_select(this);" >';
while($data1 = $DB1->fetch_array($DB1->res)) {
	$id_item = $id_item == '' ? $data1["id_item"] : $id_item;
	$selectedoption =( $data1["id_item"]== $id_item ? "selected=\"selected\"" : "");
	echo "<option value=\"".$data1["id_item"]."\" class=\"form-control\" " . $selectedoption . ">".$data1["field_name"]."</option>";

}
echo "</select></div>";
echo "<input type=\"hidden\" name=\"id_group\"  value=\"".$id_group."\">";
echo "<input type=\"hidden\" name=\"pk_code\"  value=\"".$pk_code."\">";
echo "<input type=\"hidden\" name=\"add_id_item[]\"  value=\"".$id_item."\">";
echo '<div class="input-group">';
echo "<input type=\"text\" class=\"form-control\" name=\"add_id_value[]\" value=\"\"></div>";
echo '<div class="input-group">';
{
	$DBSubListing = new myDB;
	$strSQLSubListing = 'SELECT * FROM  item where id_group=' . $id_group . ' and parent_id_item=' . $id_item;
	$DBSubListing->query($strSQLSubListing);
	while($sublisting = $DBSubListing->fetch_array($DBSubListing->res))
	{
		echo '<input type="hidden" class="form-control" name="add_id_item[]" value="'. $sublisting["id_item"] .'" placeholder="'. $sublisting["id_item"] .'" >';
		echo '<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"><input type="text" class="col-md-12 col-lg-12 planfield" name="add_id_value[]" value="" placeholder="'. $sublisting["field_name"] .'" ></div>';
	}
}
echo '</div></div>';
echo "<input type=\"submit\" onclick=\"return checkform(this);\" name=\"submit_type\" class=\"btn btn-success\" id=\"plan-btn\" value=\"Add\"></form>";

?>
