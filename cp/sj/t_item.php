<?php

include_once dirname(__FILE__) . "/include/function.php";



$field_name	= empty($_REQUEST["field_name"])?null:$_REQUEST["field_name"];
$field_value	= empty($_REQUEST["field_value"])?0:$_REQUEST["field_value"];
$id_item		= empty($_REQUEST["id_item"])?0:$_REQUEST["id_item"];
$id_group		= empty($_REQUEST["id_group"])?0:$_REQUEST["id_group"];
$parent_id_item		= empty($_REQUEST["parent_id_item"])?0:$_REQUEST["parent_id_item"];
$requirement		= empty($_REQUEST["requirement"])?0:$_REQUEST["requirement"];
$submit_type		= empty($_REQUEST["submit_type"])?null:$_REQUEST["submit_type"];

echo $requirement;


$DB = new myDB;

switch($submit_type) {
	case "Add":
			$IstrSQL = "insert  item (id_group,parent_id_item,field_name,field_value,requirement) Values (".$id_group.",".$parent_id_item.",'".$field_name."',".$field_value.",".$requirement.")";
			//echo $IstrSQL;
			$DB->query($IstrSQL);
	break;
	case "del":
			$DstrSQL = "delete  from item where id_item= ".$id_item;
			//echo $DstrSQL;
			$DB->query($DstrSQL);
	break;
	case "update":
			$UstrSQL = "update   item SET id_group=".$id_group.",parent_id_item=".$parent_id_item.",field_name='".$field_name."',field_value=".$field_value.",requirement=".$requirement." where id_item= ".$id_item;
			//echo $UstrSQL;
			$DB->query($UstrSQL);
	break;
	case "edit":
			$SstrSQL = "SELECT * FROM item where id_item= ".$id_item;
			//echo $DstrSQL;
			$DB->query($SstrSQL);
			while($sdata = $DB->fetch_array($DB->res)) {	
			$sid_group=$sdata["id_group"];
			$sid_item=$sdata["id_item"];
			$sfield_name=$sdata["field_name"];
			$sfield_value=$sdata["field_value"];
			$sparent_id_item=$sdata["parent_id_item"];
			$srequirement=$sdata["requirement"];
			}
			
	break;
}

$strSQL = "SELECT * FROM item where id_group=".$id_group;
echo $strSQL;
$DB->query($strSQL);

				
	
	?>						
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
							
							<div id="checkout-step-billing" class="step a-item" style="display:block;">
								<ul class="form-list">
								<script type="text/javascript">
								function itemedit(idgroup,iditem) {
								var id_group= idgroup;
								var id_item= iditem;
								var field_name= document.getElementById('field_name_'+id_item).value;
								var field_value= document.getElementById('field_value_'+id_item).value;
								var parent_id_item= document.getElementById('parent_id_item_'+id_item).value;
								
								if (document.getElementById('requirement_'+id_item).checked==true)
								requirement=1;
								else
								requirement=0;
								
								window.location='item.php?id_group='+id_group+'&id_item='+id_item+'&field_name='+field_name+'&field_value='+field_value+'&parent_id_item='+parent_id_item+'&requirement='+requirement+'&submit_type=update';
							}
							
							
						function AddOrUpdateConfirm(frm) {
						
							//var x=checkEmail(document.getElementById('email_address').value);
							//alert(x);
							if (frm.field_name.value == '') {
								alert("Please fill out your field name!");
								frm.field_name.focus();
								return false;
							}
							if (frm.field_value.value == 0) {
								alert("Please select  your field value!");
								frm.field_value.focus();
								return false;
							}	
							else
							{
								if (document.getElementById('requirement').checked==true ) 
								frm.requirement.value=1;
								
								frm.submit();
							}	
						}	

							
							</script>
							
								
<?php
							while($data = $DB->fetch_array($DB->res)) {	
?>								
									<li class="fields">
											<div class="field">
												<!--<label for="TotalOrderAmount">value</label>-->
												<div class="input-box">
												<input type="text" name="field_name" id="field_name_<?php echo $data["id_item"];?>" value="<?php echo $data["field_name"];?>">	
													
												</div>
											</div>
											<div class="field">
												<!--<label for="TotalOrderAmount">value</label>-->
												<div class="input-box">
												<select name="field_value" id="field_value_<?php echo $data["id_item"];?>">
												<?php
												echo "<option value=\"0\"  >--Select--</option>";
												if($data["field_value"]==1)
												echo "<option value=\"1\" selected >Text</option>";
												else
												echo "<option value=\"1\" >Text</option>";
												
												if($data["field_value"]==2)
												echo "<option value=\"2\" selected >Number</option>";
												else
												echo "<option value=\"2\" >Number</option>";
												if($data["field_value"]==3)
												echo "<option value=\"3\" selected >Float</option>";
												else
												echo "<option value=\"3\" >Float</option>";
												
												if($data["field_value"]==4)
												echo "<option value=\"4\" selected >Date</option>";
												else
												echo "<option value=\"4\" >Date</option>";
												
												if($data["field_value"]==5)
												echo "<option value=\"5\" selected >Memo</option>";
												else
												echo "<option value=\"5\" >Memo</option>";
												
												
												
												?>
												</select>
													
												</div>
											</div>
											<div class="field">
												<!--<label for="TotalOrderAmount">value</label>-->
												<div >
													<input type="text" name="parent_id_item" id="parent_id_item_<?php echo $data["id_item"];?>" value="<?php echo $data["parent_id_item"];?>">
													
												</div>
											</div>
											<div class="field">
												<!--<label for="TotalOrderAmount">value</label>-->
												<div >
													<?php 
													if ($data["requirement"]==1)
													echo "<input type=\"checkbox\" name=\"requirement\" id=\"requirement_".$data["id_item"]."\" value=".$data["requirement"]." checked>";
													else
													echo "<input type=\"checkbox\" name=\"requirement\" id=\"requirement_".$data["id_item"]."\" value=".$data["requirement"]." >";
													?>	
												</div>
												
												
													
												</div>
											</div>
											<div class="field">
												<!--<label for="TotalOrderAmount">value</label>-->
												<div >												
													<a href="item.php?id_item=<?php echo $data["id_item"];?>&id_group=<?php echo $data["id_group"];?>&submit_type=del">DEL</a>
												</div>
											</div>
											<div class="field">
												<!--<label for="TotalOrderAmount">value</label>-->
												<div >
													<input type="button" name="submit_type" id="submit_type"  onclick="itemedit(<?php echo $data["id_group"];?>,<?php echo $data["id_item"];?>);" value="update">			
													<a href="item.php?id_group=<?php echo $data["id_group"];?>&id_item=<?php echo $data["id_item"];?>&field_name=<?php echo $data["field_name"]?>&field_value=<?php echo $data["field_value"]?>&parent_id_item=<?php echo $data["parent_id_item"]?>&submit_type=edit">Edit</a>
												</div>
											</div>
											
											
									</li>
<?php
								}
				$DB->close();								
?>																		
								</ul>
								
							</div>
							
							<div>
							<form method="get" action="item.php">
							<input type="hidden" id="id_group" name="id_group" value="<?php echo empty($id_group)?null:$id_group;?>">
							<input type="hidden" id="id_item" name="id_item" value="<?php echo empty($id_item)?null:$id_item;?>">
							<input type="hidden" id="submit_type" name="submit_type" value="Add">
							<input type="text" id="field_name" name="field_name" value="<?php echo empty($field_name)?null:$field_name;?>">
							<select id="field_value" name="field_value">
							<option value="0">--Select--</option>
							<option value="1">Text</option>
							<option value="2">Number</option>
							<option value="3">Float</option>
							<option value="4">Date</option>
							<option value="5">Memo</option>
							</select >
							<input type="text" id="parent_id_item" name="parent_id_item" value="<?php echo empty($parent_id_item)?null:$parent_id_item;?>">
							<input type="checkbox" id="requirement" name="requirement" value="<?php echo empty($requirement)?null:$requirement;?>">
							<input type="button"  name="submit_type" value="Add" onClick="return AddOrUpdateConfirm(this.form);">
							
							</form>
							</div>
							
							