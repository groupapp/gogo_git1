<!DOCTYPE html>
<head>
<?php include('headerinclude.php'); ?>
<script>
$(document).on("hidden.bs.modal", function (e) {
    $(e.target).removeData("bs.modal").find(".modal-content").empty();
	});
</script>
</head>
<?php $current = "excel";?>
<?php include('nav.php'); ?>
<?php

include_once dirname(__FILE__) . "/include/function.php";




$submit_type		= empty($_REQUEST["submit_type"])?null:$_REQUEST["submit_type"];
$id_item		= empty($_REQUEST["id_item"])?0:$_REQUEST["id_item"];
$excel_display		= empty($_REQUEST["excel_display"])?null:$_REQUEST["excel_display"];
$excel_f_name		= empty($_REQUEST["excel_f_name"])?null:$_REQUEST["excel_f_name"];
$order		= empty($_REQUEST["order"])?0:$_REQUEST["order"];
$space		= empty($_REQUEST["space"])?0:$_REQUEST["space"];

if (sizeof($id_item)>0)
{
	$id_item_cnt=sizeof($id_item);
}	


$DB = new myDB;

switch($submit_type) {
	case "Save":
		for($i = 0; $i < $id_item_cnt; $i++){
			
			//print_r( $excel_f_name[$i]);
			
			$UstrSQL = "update   item SET excel_display=".$excel_display[$i];
			
			if($order[$i]>0)
			$UstrSQL .=",orderno=".$order[$i];
			if($space[$i]>0)
				$UstrSQL .=",space=".$space[$i];
			if($excel_f_name[$i]!='')
				$UstrSQL .=",excel_f_name='".$excel_f_name[$i]."'";
			
			$UstrSQL .=" where id_item= ".$id_item[$i];
			
		//echo $UstrSQL;
			$DB->query($UstrSQL);
		}	
	break;
	/*case "edit":
			$SstrSQL = "SELECT * FROM item_group where id_group= ".$id_group;
			//echo $DstrSQL;
			$DB->query($SstrSQL);
			while($sdata = $DB->fetch_array($DB->res)) {	
			$sid_group=$sdata["id_group"];
			$sname_group=$sdata["name_group"];
			$sparent_id_group=$sdata["parent_id_group"];
			}
			
	break;*/
}

$strSQL = "SELECT * FROM item_group a,item b where a.id_group=b.id_group ";

$DB->query($strSQL);

				
	
	?>						
							<div class="wrapper">
							<form method="post" action="excelset.php" class="form-inline" role="form" >
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								
<?php
while($data = $DB->fetch_array($DB->res)) {	
?>								
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
	<div class="img-thumbnail item">
											<span class="badge pull-right" style="background: #428bca;"><?php echo $data["id_group"] ?></span>
											
											<div class="col-md-12 col-sm-12 col-xs-12">
											
											<div class="col-md-12 col-sm-12 col-xs-12">
											<input type="hidden" name="id_item[]" id="id_item" value="<?php echo $data["id_item"];?>">	
												<div class="col-md-12 col-sm-12 col-xs-12"><span  style="vertical-align:middle;">Group Name</span> : <span class="span-title"><?php echo $data["name_group"];?></span> 
												<span  style="vertical-align:middle;">Item Name</span> : <span class="span-title"><?php echo $data["field_name"];?>	</span></div>												
</div>
</div>
<div class="input-group col-md-12 col-sm-12 col-xs-12">
<div class="span-title">Display</div>

												<?php 
												echo "<select  class=\"select-menu\" name=\"excel_display[]\">";
												
												if ($data["excel_display"]==0)
												echo "<option value=\"0\" selected>Yes</option><option value=\"1\" >No</option>";
												else
													echo "<option value=\"0\" >Yes</option><option value=\"1\" selected>No</option >";;
												echo"</select>";
												?>	

</div>

<div class="input-group col-md-12 col-sm-12 col-xs-12">
<div class="input-group-addon"><span class="span-title">순서</span></div>
												<?php 
												echo "<input type=\"text\" class=\"form-control\" name=\"order[]\" value=\"".$data["orderno"]."\">";
												
												?>	
</div>
<div class="input-group col-md-12 col-sm-12 col-xs-12">
<div class="input-group-addon"><span class="span-title">Space</span></div>
												<?php 
												echo "<input type=\"text\" class=\"form-control\" name=\"space[]\" value=\"".$data["space"]."\">";
												
												?>	

</div>
<div class="input-group col-md-12 col-sm-12 col-xs-12">
<div class="input-group-addon"><span class="span-title">Excel Field Name</span></div>
												<?php 
												echo "<input type=\"text\" class=\"form-control\" name=\"excel_f_name[]\" value=\"".$data["excel_f_name"]."\">";
												
												?>	

</div>
</div>

													
													</div>
													<?php
												}
												?>
												</div>
												&nbsp;<hr>
												<div class="footer">
												<input type="submit" class="btn btn-success btn-lg" name="submit_type" id="submit_type"   value="SAVE">	
												
												</form>
												</footer>																			
<?php
				$DB->close();								
?>																		
								</div>
								
							
							
							
							
							</div>

	