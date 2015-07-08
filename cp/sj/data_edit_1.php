
<?php

include_once dirname(__FILE__) . "/include/function.php";



$data_seq	= empty($_REQUEST["data_seq"])?null:$_REQUEST["data_seq"];
$edit_id_item	= empty($_REQUEST["edit_id_item"])?null:$_REQUEST["edit_id_item"];
$edit_id_value	= empty($_REQUEST["edit_id_value"])?null:$_REQUEST["edit_id_value"];
$edit_id_seq	= empty($_REQUEST["edit_id_seq"])?null:$_REQUEST["edit_id_seq"];
$pk_code	= empty($_REQUEST["pk_code"])?null:$_REQUEST["pk_code"];

$id_item		= empty($_REQUEST["id_item"])?0:$_REQUEST["id_item"];
$add_id_item		= empty($_REQUEST["add_id_item"])?0:$_REQUEST["add_id_item"];
$add_id_value		= empty($_REQUEST["add_id_value"])?0:$_REQUEST["add_id_value"];
$id_group		= empty($_REQUEST["id_group"])?0:$_REQUEST["id_group"];
$submit_type		= empty($_REQUEST["submit_type"])?null:$_REQUEST["submit_type"];

print_r ($add_id_item);
//exit;
$mDB = new myDB;
$DB1 = new myDB;
$DBItem = new myDB;




if (sizeof($edit_id_item)>0)
{
	$edit_id_item_cnt=sizeof($edit_id_item);
	
}
	
//echo $submit_type;
//exit;
$DB = new myDB;
$rDB = new myDB;
$aDB = new myDB;
$r1DB = new myDB;
$r2DB = new myDB;

$DBChild = new myDB;

$second_multigroup=$DB->getsecondMulti();

if ($id_group==$second_multigroup)	
{
	$getSQL = "SELECT sum(a.varchr_value)FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  a.pk_code=".$pk_code." and c.id_item=40";
	echo $getSQL;
}


switch($submit_type) {
	
	case "Add":
			
		if (sizeof($add_id_item)>1)
			{
			//echo 'cnt:'.$add_id_item_cnt;
			
			$PistrSQL = "insert  data (id_item,pk_code,varchr_value) Values (".$add_id_item[0].",".$pk_code.",'".$add_id_value[0]."')";
			//echo $PistrSQL;
			$mDB->query($PistrSQL);
			$lastid=$mDB->get_lastid();			
			$add_id_item_cnt=sizeof($add_id_item);
			
			for($i = 1; $i < $add_id_item_cnt; $i++)
				{
				$IstrSQL = "insert  data (id_item,pk_code,varchr_value,mul_parent_seq) Values (".$add_id_item[$i].",".$pk_code.",'".$add_id_value[$i]."',".$lastid.")";
				$DB->query($IstrSQL);	
				}
	
			}
		else
			{					
				$IstrSQL = "insert  data (id_item,pk_code,varchr_value) Values (".$add_id_item[0].",".$pk_code.",'".$add_id_value[0]."')";
				$DB->query($IstrSQL);	
			}
			
		
			
	break;
	
	case "del":
	
		
		$strSqlitem = "select *  from data  where pk_code= ".$pk_code." and  mul_parent_seq=".$data_seq;
//echo $strSqlitem;	

	
		$DBItem->query($strSqlitem);
		
		if ($DBItem->rows > 0)
			$DstrSQL = "delete from data  where pk_code= ".$pk_code." and  (mul_parent_seq=".$data_seq." or data_seq=".$data_seq.")";
		else
			$DstrSQL = "delete from data  where pk_code= ".$pk_code." and  data_seq=".$data_seq;		
//echo $DstrSQL;
//exit;

			$DB->query($DstrSQL);
			
	break;
	
	case "Update":
			for($i = 0; $i < $edit_id_item_cnt; $i++){
			$UstrSQL = "update   data SET varchr_value='".$edit_id_value[$i]."' where  data_seq=".$edit_id_seq[$i];
			
			//$UstrSQL = "update   data SET varchr_value='".$edit_id_value[$i]."' where id_item= ".$edit_id_item[$i]." and pk_code=".$pk_code." and data_seq=".$edit_id_seq[$i];
			//echo $UstrSQL;
			$DB->query($UstrSQL);
			}
	break;
	
}







			/*
			$strSQLcnt = "SELECT *, (select count(data_seq) from data where pk_code = pkitem.pk_code) as ChildCount FROM  pk_code pkitem where parent_pk_code = ". $pk_code;
			$DBChild->query($strSQLcnt);
			$childCnt = $DBChild->rows;

			echo $strSQLcnt;
			*/
			
			
			
			

			$strSQL = "SELECT a.*,b.name_group,c.field_name FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  a.pk_code=".$pk_code." and c.id_group=".$id_group;
	//echo $strSQL;
			$DB->query($strSQL);

	
	
		?>		
		

		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" onclick="modalclose()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title" id="myModalLabel">Title</h4>
		</div>
		<div id="loadpage" class="modal-body">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

	
		<?php
		echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 inputselection">';
		include('data_selection.php');
		echo '</div>';
		?>	
							
		
		<?php
		
//==================================================================================================================================del		
	/*	
		echo " <form method=\"get\" action=\"data_edit.php\" class=\"form-inline\">";
		echo "<input type=\"hidden\" name=\"id_group\"  value=".$id_group.">";
		echo "<input type=\"hidden\" name=\"pk_code\"  value=".$pk_code.">";
		while($data = $DB->fetch_array($DB->res)) {	
		

		echo "<div class=\"col-md-12\"><input type=\"hidden\" name=\"edit_id_item[]\"  value=\"".$data["id_item"]."\"id=\"id_item_".$data["id_item"]."\"><input type=\"hidden\" name=\"edit_id_seq[]\"  value=\"".$data["data_seq"]."\"id=\"id_item_".$data["data_seq"]."\"><div class=\"input-group data-edit\"><span class=\"input-group-addon\" >".$data["field_name"]."</span><input type=\"text\" name=\"edit_id_value[]\" class=\"form-control\" value=\"".$data["varchr_value"]."\"id=\"id_item_".$data["id_item"]."\">";

		echo "<div class=\"input-group-addon\"><a href=\"data_edit.php?submit_type=del&id_group=".$id_group."&pk_code=".$pk_code."&id_item=".$data["id_item"]."&data_seq=".$data["data_seq"]."\" class=\"form=control\"><span class=\"glyphicon glyphicon-remove\"></span></a></div></div></div>";

		}
		echo "<div class=\"update\"><input type=\"submit\" name=\"submit_type\" class=\"btn btn-success\" value=\"Update\"></form>";
	*/			

//==================================================================================================================================del		



		$rstrSQL = "SELECT * from item_group where parent_id_group = ". $id_group." and child_chk=0";


		$rDB->query($rstrSQL);

		while($rdata = $rDB->fetch_array($rDB->res)) {
	
		$strSQL = "SELECT a.*,b.name_group,c.field_name FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  a.pk_code=".$pk_code." and c.id_group=".$rdata['id_group'];
		//echo $strSQL;
		$DB->query($strSQL);
		?>						


		<?php
			$DB1 = new myDB;
			$strSQL1 = "SELECT * FROM  item where id_group=".$rdata['id_group'];

	//echo $strSQL1;
			$DB1->query($strSQL1);
		
		echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">';
		
		echo '<h5 class="span-title" style="padding-bottom:10px;"> '.$rdata['name_group'].'</h5>';
		
			echo " <form method=\"post\" action=\"data_edit.php\" class=\"form-inline\">";		
			echo "<div class=\"input-group\"><div class=\"input-group-btn\">";
		echo "<select class=\"form-control\" name=\"add_id_item\" id=\"add_id_item\" >";
			while($data1 = $DB1->fetch_array($DB1->res)) {
				echo "<option value=\"".$data1["id_item"]."\" class=\"form-control\">".$data1["field_name"]."</option>";
			}
			echo "</select>";
			
		
			
			echo "<input type=\"hidden\" name=\"id_group\"  value=\"".$id_group."\">";
			echo "<input type=\"hidden\" name=\"pk_code\"  value=\"".$pk_code."\">";
			
//================================================================add part=========================================================================			
	/*	$DB7 = new myDB;
		
		$astrSQL = "SELECT * FROM  item a,item_group b  where a.id_group=b.id_group and  b.child_chk=1 and a.parent_id_item>0 limit 0,1" ; 
		
		//echo $astrSQL;
		
		$DB7->query($astrSQL);
		while($parent_data = $DB7->fetch_array($DB7->res)) {
			$parent_id_item=$parent_data["parent_id_item"];
		}
		
		
		echo "<input type=\"text\" name=\"add_id_value\" class=\"form-control\" value=\"\">";
		
		
		$DB99 = new myDB;
		$xstrSQL = "SELECT * FROM  item  where parent_id_item=".$parent_id_item; 
		
		echo $xstrSQL;
		
		$DB99->query($xstrSQL);
		
		while($list_data99 = $DB99->fetch_array($DB99->res)) {
			
			echo "<div class=\"input-group data-edit\"><span class=\"input-group-addon\">".$list_data99["field_name"]."</span>";
			echo "<input type=\"text\" class=\"form-control\" name=\"subadd_id_value[]\"  value=\"\"></div>";
			echo "<input type=\"hidden\" name=\"subadd_id_item[]\"  value=\"".$list_data99["id_item"]."\">";
			
		}
		
		
		*/
		
//========================================================================================================================================			
		
		echo "</div></div><div class=\"input-group\"><input type=\"text\" class=\"form-control\"  name=\"add_id_value\" value=\"\">";
		echo "<span class=\"input-group-btn\"><input type=\"submit\"  name=\"submit_type\" onclick=\"return checkform(this);\" class=\"btn btn-success\" value=\"Add\"></span></div></form>";
		
	
		
		echo '</div>';
		}	
		
		?>								
		</div>							
		&nbsp;		
		<hr>
		
		<?php
		// loading for content data
		echo " <form method=\"post\" action=\"data_edit.php\" class=\"form-inline\">";
		echo "<input type=\"hidden\" name=\"id_group\"  value=".$id_group.">";
		echo "<input type=\"hidden\" name=\"pk_code\"  value=".$pk_code.">";
		echo "<div class=\"col-md-12 \">";
		
//=======================================================================================================add		
		$astrSQL = "SELECT a.*,b.name_group,c.field_name FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  a.pk_code=".$pk_code." and c.id_group=".$id_group;
		//echo $astrSQL; 		

		$test_title1 = CallGroupName($id_group);//"구매자 정보";
		
		$aDB->query($astrSQL);
		echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">'; // column open
		echo '<div class="panel panel-primary">'; // panel open
		echo '<div class="panel-heading">'.$test_title1.'</div>';
		echo '<div class="panel-body">'; //body open
		/*
		echo " <form method=\"get\" action=\"data_edit.php\" class=\"form-inline\">";
		echo "<input type=\"hidden\" name=\"id_group\"  value=".$id_group.">";
		echo "<input type=\"hidden\" name=\"pk_code\"  value=".$pk_code.">";*/
		$prev_parent_seq = "";
		$tag_string = "";
		$closing_tag = "";
		while($adata = $aDB->fetch_array($aDB->res)) {
			echo "<input type=\"hidden\" name=\"edit_id_item[]\"  value=\"".$adata["id_item"]."\"id=\"id_item_".$adata["id_item"]."\"><input type=\"hidden\" name=\"edit_id_seq[]\"  value=\"".$adata["data_seq"]."\"id=\"id_item_".$adata["data_seq"]."\">";
			$new_seq = false;
			if ($prev_parent_seq != $adata["mul_parent_seq"])
			{
				$prev_parent_seq = $adata["data_seq"];
				$new_seq = true;
			}
			
			
			if ($new_seq)
			{
				if ($closing_tag != "")
				{
					echo $closing_tag;
					$closing_tag = "";
				}
				echo '<div class="img-thumbnail">'; // panel open
				
			}
			echo "<div class=\"col-lg-11 col-md-11 col-sm-11 col-xs-11\"><span class=\"span-title\">".$adata["field_name"]." : </span>";	
			echo "<input type=\"text\" name=\"edit_id_value[]\" class=\"form-control\" value=\"".$adata["varchr_value"]."\"id=\"id_item_".$adata["id_item"]."\"></div>";
			if ($new_seq)
			{
				$closing_tag = "
				
				<input type=\"hidden\" name=\"data_seq\"  value=\"".$adata["data_seq"]."\" id=\"data_seq_".$adata["data_seq"]."\">
				<input type=\"hidden\" name=\"id_item\"  value=\"".$adata["id_item"]."\" id=\"id_item_".$adata["data_seq"]."\">
				<input type=\"hidden\" name=\"id_group\"  value=\"".$id_group."\" id=\"id_group\">
				<input type=\"hidden\" name=\"pk_code\"  value=\"".$adata["pk_code"]."\" id=\"pk_code\">
				
				<a href=\"data_edit.php?submit_type=del&id_group=".$id_group."&pk_code=".$pk_code."&id_item=".$adata["id_item"]."&data_seq=".$adata["data_seq"]."\" class=\"form=control\" onclick=\"return checkform1(".$adata["data_seq"].");\">
				<span class=\"glyphicon glyphicon-remove\"></span></a>
				
				
				
				<!--<a href=\"data_edit.php?submit_type=del&id_group=".$id_group."&pk_code=".$pk_code."&id_item=".$adata["id_item"]."&data_seq=".$adata["data_seq"]."\"  class=\"form=control\">
				<span class=\"glyphicon glyphicon-remove\"></span></a>--><p>";
				//$closing_tag = "<a href=\"data_edit.php?submit_type=del&id_group=".$id_group."&pk_code=".$pk_code."&id_item=".$adata["id_item"]."&data_seq=".$adata["data_seq"]."\"  class=\"form=control\"><span class=\"glyphicon glyphicon-remove\"></span></a>";
				$closing_tag .= "</div>";
			}
		}
		
		if ($closing_tag != "")
		{
			echo $closing_tag;
		}
		
		echo "</div>"; //body close
		echo "</div>"; // panel close
		echo "</div>"; // columbn close
		//=============================================================================================================================		
		
		
		$r1strSQL = "SELECT * from item_group where parent_id_group = ". $id_group." and child_chk=0";
		$test_title2 = "입금자";
		$r1DB->query($r1strSQL);
		
		while($r1data = $r1DB->fetch_array($r1DB->res)) {
			$str2SQL = "SELECT a.*,b.name_group,c.field_name FROM data a, item_group b, item c,pk_code d where a.pk_code= d.pk_code and a.id_item = c.id_item and b.id_group=c.id_group and  a.pk_code=".$pk_code." and c.id_group=".$r1data['id_group'];
			$r2DB->query($str2SQL);
			echo '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">'; //outer
			echo '<div class="panel panel-primary">'; //panel
			echo '<div class="panel-heading">'.$r1data["name_group"].'</div>';
			echo '<div class="panel-body">'; //body
			
			while($r2data = $r2DB->fetch_array($r2DB->res)) {		
				echo "<div class=\"img-thumbnail\"><input type=\"hidden\" name=\"edit_id_item[]\"  value=\"".$r2data["id_item"]."\"id=\"id_item_".$r2data["id_item"]."\">
				<input type=\"hidden\" name=\"edit_id_seq[]\"  value=\"".$r2data["data_seq"]."\"id=\"id_item_".$r2data["data_seq"]."\">
				<div class=\"col-lg-11 col-md-11 col-sm-11 col-xs-11\"><span class=\"span-title\" >".$r2data["field_name"]." :</span>
				<input type=\"text\" name=\"edit_id_value[]\" class=\"form-control\" value=\"".$r2data["varchr_value"]."\"id=\"id_item_".$r2data["id_item"]."\"></div>";
				
				
				echo "
				
				<input type=\"hidden\" name=\"id_group\"  value=\"".$r2data["data_seq"]."\" id=\"data_seq_".$r2data["data_seq"]."\">
				<input type=\"hidden\" name=\"pk_code\"  value=\"".$r2data["pk_code"]."\" id=\"pk_code\">
				<input type=\"hidden\" name=\"id_item\"  value=\"".$r2data["id_item"]."\" id=\"id_item_".$r2data["data_seq"]."\">
				<input type=\"hidden\" name=\"id_group\"  value=\"".$id_group."\" id=\"id_group\">
				
				<a href=\"data_edit.php?submit_type=del&id_group=".$id_group."&pk_code=".$pk_code."&id_item=".$r2data["id_item"]."&data_seq=".$r2data["data_seq"]."\" onclick=\"return checkform1(".$r2data["data_seq"].");\">
				<span class=\"glyphicon glyphicon-remove\"></span></a>
				</div>";
			}
										
			echo '</div>'; //body
			echo '</div>'; //panel
			echo '</div>'; //outer
		}						
		echo "</div>&nbsp;<hr><div class=\"update\"><input type=\"submit\" name=\"submit_type\" class=\"btn btn-success update\"  onclick=\"return checkform(this);\" value=\"Update\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\" onclick=\"modalclose()\">Close</button>";
		echo "</form>";

		
		
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
			</div>
	<div class="modal-footer">
	</div>
