<!DOCTYPE html>
<html>
<head>
<title>USIM Data Add</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<?php

include_once dirname(__FILE__) . "/include/function.php";



$subadd_id_item	= empty($_REQUEST["subadd_id_item"])?null:$_REQUEST["subadd_id_item"];
$subadd_id_value	= empty($_REQUEST["subadd_id_value"])?null:$_REQUEST["subadd_id_value"];

$edit_id_item	= empty($_REQUEST["edit_id_item"])?null:$_REQUEST["edit_id_item"];
$edit_id_value	= empty($_REQUEST["edit_id_value"])?null:$_REQUEST["edit_id_value"];
$edit_id_seq= empty($_REQUEST["edit_id_seq"])?null:$_REQUEST["edit_id_seq"];
$pk_code	= empty($_REQUEST["pk_code"])?null:$_REQUEST["pk_code"];
$new	= empty($_REQUEST["new"])?null:$_REQUEST["new"];
$id_item		= empty($_REQUEST["id_item"])?0:$_REQUEST["id_item"];
$add_id_item		= empty($_REQUEST["add_id_item"])?0:$_REQUEST["add_id_item"];
$add_id_value		= empty($_REQUEST["add_id_value"])?0:$_REQUEST["add_id_value"];
$id_group		= 12;//empty($_REQUEST["id_group"])?0:$_REQUEST["id_group"];
$submit_type		= empty($_REQUEST["submit_type"])?null:$_REQUEST["submit_type"];
$mul_parent_seq		= empty($_REQUEST["mul_parent_seq"])?null:$_REQUEST["mul_parent_seq"];

//print_r ($edit_id_item);
//exit;
$rDB = new myDB;
$DB0 = new myDB;
//if (sizeof($add_id_item)>0)
if ($new=='new')
{
	
	$PinSQL = "insert  pk_code (create_date,parent_pk_code) Values (now(),".$pk_code.")";

	$DB0->query($PinSQL);
	$npk_code=$DB0->get_lastid();
	$add_id_item_cnt=sizeof($add_id_item);
	//echo $add_id_item_cnt;
	//exit;
}
else
{
	
								//$strSQL1 = "SELECT b.id_group,d.pk_code,c.id_item,c.field_name FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  a.pk_code=".$pk_code." and c.id_group=".$id_group;
	$qstrSQL1 = "SELECT max(pk_code) AS Max FROM  pk_code ";
								
	//echo $strSQL1;
	$DB0->query($qstrSQL1);
	while($max_data = $DB0->fetch_array($DB0->res)) {
	$npk_code=$max_data["Max"];
	}
}

	//$npk_code=$DB0->get_lastid();




$DB1 = new myDB;
if (sizeof($edit_id_item)>0)
{
	$edit_id_seq_cnt=sizeof($edit_id_seq);
	
}

if (sizeof($subadd_id_item)>0)
{
	$subadd_id_item_cnt=sizeof($subadd_id_item);
	
	
	
}
	
//echo $submit_type;
//exit;
$DB = new myDB;



switch($submit_type) {
	
	case "Add":
			
			
			$IstrSQL = "insert  data (id_item,pk_code,varchr_value) Values (".$add_id_item.",".$npk_code.",'".$add_id_value."')";
			
			$DB->query($IstrSQL);
			
			$lastid=$DB->get_lastid();
		
			/// check array of subadd_id_item
			//
			/// insert about sub
			/// $lastid -> $parent id
			
			
			
			if (sizeof($subadd_id_item)>0)
			{
				
				
				
				for($i = 0; $i < $subadd_id_item_cnt; $i++){
				$SubIstrSQL = "insert  data (id_item,pk_code,varchr_value,mul_parent_seq) Values (".$subadd_id_item[$i].",".$npk_code.",'".$subadd_id_value[$i]."',".$lastid.")";
				
		echo $SubIstrSQL;
				//exit;
				$DB->query($SubIstrSQL);
				}
				
				
				
			}
			
	break;
	
	case "del":
			
			$DstrSQL = "delete from data  where pk_code= ".$pk_code." and id_item=".$id_item." and mul_parent_seq=".$mul_parent_seq ;
		echo $DstrSQL;
			$DB->query($DstrSQL);
			
	break;
	
	case "Update":
			
			//if(sizeof($subadd_id_seq)==0)
		for($i = 0; $i < $edit_id_seq_cnt; $i++){
			$UstrSQL = "update   data SET varchr_value='".$edit_id_value[$i]."' where data_seq= ".$edit_id_seq[$i];
	echo $UstrSQL;
			$DB->query($UstrSQL);
			}
			/*
			else
			for($i = 0; $i < $edit_id_item_cnt; $i++){
			$UstrSQL = "update   data SET varchr_value='".$edit_id_value[$i]."' where id_item= ".$edit_id_item[$i]." and pk_code=".$pk_code." and mul_parent_seq=".$subadd_id_seq[$i];
			//echo $UstrSQL;
			$DB->query($UstrSQL);
			}*/

	break;
	
}



if ($new=='edit')

$strSQL = "SELECT a.*,b.name_group,c.field_name,d.* FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  d.parent_pk_code=".$pk_code." and c.id_group=".$id_group;

else

$strSQL = "SELECT a.*,b.name_group,c.field_name,d.* FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  d.pk_code=".$npk_code." and c.id_group=".$id_group;

//echo $strSQL;


$DB->query($strSQL);

				
	
	?>						
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Newplan 입력</h4>
      </div>
	  <div id="loadpage" class="modal-body">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">				
							<?php
							echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 inputselection">';
							include('plan_selection.php');
							echo '</div>';
							?>	


								
<?php
//==================================================================================================================================del				
		/*	
								echo " <form method=\"get\" action=\"data_add.php\" class=\"form-inline\">";
								echo "<input type=\"hidden\" name=\"id_group\"  value=".$id_group.">";
								echo "<input type=\"hidden\" name=\"pk_code\"  value=".$pk_code.">";
								while($data = $DB->fetch_array($DB->res)) {	
									
									echo "<div >";
									
									echo "<a href=\"data_add.php?submit_type=del&id_group=".$id_group."&pk_code=".$data["pk_code"]."&mul_parent_seq=".$data["mul_parent_seq"]."&id_item=".$data["id_item"]."\">Delete</a>";
									
									echo "<div ><input type=\"hidden\" name=\"edit_id_item[]\"  value=\"".$data["id_item"]."\"id=\"id_item_".$data["id_item"]."\"><label >".$data["field_name"]."</label><input type=\"text\" name=\"edit_id_value[]\" class=\"form-control\" value=\"".$data["varchr_value"]."\"id=\"id_item_".$data["id_item"]."\"></div>";
										
									echo "</div>";
								}
							echo "<div class=\"col-md-3 col-md-offset-7\"><input type=\"submit\" name=\"submit_type\" class=\"btn btn-success\" value=\"Update\"></div></form>";
										
			*/	
//==================================================================================================================================del					

$rstrSQL = "SELECT * from item_group where parent_id_group = ". $id_group." and child_chk=0";

//echo $rstrSQL;


$rDB->query($rstrSQL);

while($rdata = $rDB->fetch_array($rDB->res)) {
	echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">';
	if ($new=='edit')
	$strSQL = "SELECT a.*,b.name_group,c.field_name,d.* FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  d.parent_pk_code=".$pk_code." and c.id_group=".$rdata['id_group'];
	else
		$strSQL = "SELECT a.*,b.name_group,c.field_name,d.* FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  d.pk_code=".$npk_code." and c.id_group=".$rdata['id_group'];
	$DB->query($strSQL);

?>						
				<?php
				
				$DB1 = new myDB;
				$strSQL1 = "SELECT * FROM  item where id_group=".$rdata['id_group'];
				$DB1->query($strSQL1);
				echo'<h5 class="span-title" style="padding-bottom: 10px;">'.$rdata["name_group"].'</h5>';
				echo " <form method=\"get\" action=\"data_add.php\" class=\"form-inline\" role=\"form\">";		
				
				echo "<select name=\"add_id_item\" class=\"form-control\">";
				while($data1 = $DB1->fetch_array($DB1->res)) {
					echo "<option value=\"".$data1["id_item"]."\">".$data1["field_name"]."</option>";
				}
				echo "</select>";
				echo "<input type=\"hidden\" name=\"id_group\"  value=\"".$rdata['id_group']."\">";
				echo "<input type=\"hidden\" name=\"pk_code\"  value=\"".$pk_code."\">";

				$DB7 = new myDB;
				$astrSQL = "SELECT * FROM  item a,item_group b  where a.id_group=b.id_group and  b.child_chk=1 and a.parent_id_item>0 limit 0,1" ; 

				$DB7->query($astrSQL);
				
				while($parent_data = $DB7->fetch_array($DB7->res)) {
					$parent_id_item=$parent_data["parent_id_item"];
				}

				echo "<input type=\"text\" name=\"add_id_value\" class=\"form-control\" value=\"\">";
				
				
				$DB99 = new myDB;
				$xstrSQL = "SELECT * FROM  item  where parent_id_item=".$parent_id_item." and id_group=".$rdata['id_group']; 
				
				$DB99->query($xstrSQL);
				while($list_data99 = $DB99->fetch_array($DB99->res)) {
					
					echo "<div class=\"input-group data-edit\"><span class=\"input-group-addon\">".$list_data99["field_name"]."</span>";
					echo "<input type=\"text\" class=\"form-control\" name=\"subadd_id_value[]\"  value=\"\"></div>";
					echo "<input type=\"hidden\" name=\"subadd_id_item[]\"  value=\"".$list_data99["id_item"]."\">";
				}
				echo "<div class=\"input-group\"><div class=\"input-group-btn\"><input type=\"submit\" onclick=\"return checkform(this);\" name=\"submit_type\" class=\"btn btn-success\" value=\"Add\"></div></div></form></div>";
			}
			
				echo"</div>";
				echo "&nbsp;<hr>";
				//form end//
			echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
				echo " <form method=\"get\" action=\"data_add.php\" class=\"form-inline\">";
				echo "<input type=\"hidden\" name=\"id_group\"  value=".$rdata['id_group'].">";
				echo "<input type=\"hidden\" name=\"pk_code\"  value=".$pk_code.">";
				
				
				if ($new=='edit')
					$strSQL = "SELECT a.*,b.name_group,c.field_name,d.* FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  d.parent_pk_code=".$pk_code." and c.id_group=".$id_group;
				else
					$strSQL = "SELECT a.*,b.name_group,c.field_name,d.* FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  d.pk_code=".$npk_code." and c.id_group=".$id_group;
				
				
				$DB->query($strSQL);
				$test_title1 = CallGroupName($id_group);
				echo'<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">'; //플랜 outer
				echo '<div class="panel panel-primary">'; //panel
			echo '<div class="panel-heading">'.$test_title1.'</div>';
				echo '<div class="panel-body">'; //body	
				echo "<div class=\"img-thumbnail\">"; //thumbnail
					while($data = $DB->fetch_array($DB->res)) {					
						echo "<div class=\"col-xs-11 col-sm-11 col-md-11 col-lg-11\"><input type=\"hidden\" name=\"edit_id_item[]\"  value=\"".$data["id_item"]."\"id=\"id_item_".$data["id_item"]."\"><span class=\"span-title\">".$data["field_name"]." : </span><input type=\"hidden\" name=\"edit_id_seq[]\" class=\"form-control\" value=\"".$data["data_seq"]."\"id=\"id_item_".$data["data_seq"]."\"><input type=\"text\" name=\"edit_id_value[]\" class=\"form-control\" value=\"".$data["varchr_value"]."\"id=\"id_item_".$data["id_item"]."\"></div>";
				}
			echo "<a href=\"data_add.php?submit_type=del&id_group=".$id_group."&pk_code=".$data["pk_code"]."&mul_parent_seq=".$data["mul_parent_seq"]."&id_item=".$data["id_item"]."\"><span class=\"glyphicon glyphicon-remove\"></span></a>";
			
			echo "</div>";	//thumbnail
			echo '</div>'; //body
			echo '</div>'; //panel
			echo '</div>'; //outer
			
				$rstrSQL = "SELECT * from item_group where parent_id_group = ". $id_group." and child_chk=0";
				$rDB->query($rstrSQL);
			
				while($rdata = $rDB->fetch_array($rDB->res)) {
					echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">'; // 입금자 / 개통정보 outer
				echo '<div class="panel panel-primary">'; //panel
				echo '<div class="panel-heading">'.$rdata["name_group"].'</div>';
				echo '<div class="panel-body">'; //body	
					if ($new=='edit')
					$strSQL = "SELECT a.*,b.name_group,c.field_name,d.* FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  d.parent_pk_code=".$pk_code." and c.id_group=".$rdata['id_group'];
					else
						$strSQL = "SELECT a.*,b.name_group,c.field_name,d.* FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  d.pk_code=".$npk_code." and c.id_group=".$rdata['id_group'];
					
					$DB->query($strSQL);
								
					while($data = $DB->fetch_array($DB->res)) {	
					
					echo "<div class=\"img-thumbnail\">";
					
					echo "<div class=\"col-xs-11 col-sm-11 col-md-11 col-lg-11\"><input type=\"hidden\" name=\"edit_id_item[]\"  value=\"".$data["id_item"]."\"id=\"id_item_".$data["id_item"]."\"><span class=\"span-title\" >".$data["field_name"]." : </span><input type=\"hidden\" name=\"edit_id_seq[]\" class=\"form-control\" value=\"".$data["data_seq"]."\"id=\"id_item_".$data["data_seq"]."\"><input type=\"text\" name=\"edit_id_value[]\" class=\"form-control\" value=\"".$data["varchr_value"]."\"id=\"id_item_".$data["id_item"]."\"></div>";
					
					echo "<a href=\"data_add.php?submit_type=del&id_group=".$id_group."&pk_code=".$data["pk_code"]."&mul_parent_seq=".$data["mul_parent_seq"]."&id_item=".$data["id_item"]."\"><span class=\"glyphicon glyphicon-remove\"></span></a>";
					
						echo "</div>";
					}
				echo '</div>'; //body
				echo '</div>'; //panel
				echo '</div>'; //outer
				}	
				echo"</div>";
				
				
				
			echo "&nbsp;<hr><div class=\"update\"><input type=\"submit\" name=\"submit_type\" class=\"btn btn-success update\"  onclick=\"return checkform(this);\" value=\"Update\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>";
				

				
				
				
				
				
?>	
<?php
function CallGroupName($id_group)
{
	$DBItem = new myDB;
	
	$strSqlitem = "select name_group from item_group  where id_group = " . $id_group;	
	
	
	$DBItem->query($strSqlitem);
	
	while($adata = $DBItem->fetch_array($DBItem->res)) {	
		$groupname=	$adata['name_group'];
	}	

	return $groupname;
}	
?>							
</div>
						</div>
	<div class="modal-footer">
	
	</div>
							
							