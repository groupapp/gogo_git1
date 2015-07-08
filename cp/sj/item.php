<?php

include_once dirname(__FILE__) . "/include/function.php";



$field_name	= empty($_REQUEST["field_name"])?null:$_REQUEST["field_name"];
$field_value	= empty($_REQUEST["field_value"])?0:$_REQUEST["field_value"];
$id_item		= empty($_REQUEST["id_item"])?0:$_REQUEST["id_item"];
$id_group		= empty($_REQUEST["id_group"])?0:$_REQUEST["id_group"];
$parent_id_item		= empty($_REQUEST["parent_id_item"])?0:$_REQUEST["parent_id_item"];
$requirement		= empty($_REQUEST["requirement"])?0:$_REQUEST["requirement"];
$vkey		= empty($_REQUEST["vkey"])?0:$_REQUEST["vkey"];
$multi_chk		= empty($_REQUEST["multi_chk"])?0:$_REQUEST["multi_chk"];
$select_value		= empty($_REQUEST["select_value"])?0:$_REQUEST["select_value"];
$submit_type		= empty($_REQUEST["submit_type"])?null:$_REQUEST["submit_type"];



$DB = new myDB;
$selectDB = new myDB;

switch($submit_type) {
	case "Add":
		$IstrSQL = "insert  item (id_group,parent_id_item,field_name,field_value,requirement,multi_chk,select_value) Values (".$id_group.",".$parent_id_item.",'".$field_name."',".$field_value.",".$requirement.",".$multi_chk.",'".$select_value."')";
			//echo $IstrSQL;
			$DB->query($IstrSQL);
	break;
	case "del":
			$DstrSQL = "delete  from item where id_item= ".$id_item;
			//echo $DstrSQL;
			$DB->query($DstrSQL);
	break;
	case "update":
		if ($vkey>0)
		{
			$instrSQL = "update   item SET vkey=0 where id_group= ".$id_group;
			$DB->query($instrSQL);
		}
		$UstrSQL = "update   item SET id_group=".$id_group.",parent_id_item=".$parent_id_item.",field_name='".$field_name."',field_value=".$field_value.",requirement=".$requirement.",multi_chk=".$multi_chk.",vkey=".$vkey.",select_value='".$select_value."' where id_item= ".$id_item;
		//echo $UstrSQL;
			$DB->query($UstrSQL);
	break;
	
}

$strSQL = "SELECT * FROM item where id_group=".$id_group;
//echo $strSQL;
$DB->query($strSQL);

	?>						
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Title</h4>
      </div>
	  <div id="loadpage" class="modal-body col-md-12">					
							<div id="checkout-step-billing" class="step a-item" style="display:block;">
							<div class="btn btn-primary " id="create">Create New</div>
							<script>
							$( "#create" ).click(function() {
							$( ".create-item" ).slideToggle( "slow" );
							});
							</script>
							<div class="create-item">
							<form method="post" action="item.php" class="form-inline">
							<input type="hidden" id="id_group" name="id_group" value="<?php echo empty($id_group)?null:$id_group;?>">
							<input type="hidden" id="id_item" name="id_item" value="<?php echo empty($id_item)?null:$id_item;?>">
							<input type="hidden" id="submit_type" name="submit_type" value="Add">
							<input type="text" placeholder="그룹 이름" class="form-control" id="field_name" name="field_name" value="">
							<select class="form-control" id="field_value" name="field_value"  onchange="return call_item_select_i();">
							<option value="0">--Select--</option>
							<option value="1">Text</option>
							<option value="2">Number</option>
							<option value="3">Float</option>
							<option value="4">Date</option>
							<option value="5">Memo</option>
							<option value="6">Select</option>
							</select >
							<input type="text" placeholder="상위 그룹" class="form-control" id="parent_id_item" name="parent_id_item" value="">
							<input type="text" style="display:none" placeholder="select값" class="form-control" id="select_value" name="select_value" value="">
							<div class="checkbox"><label class="checkbox-inline"><input type="checkbox" class="form-control" id="requirement" name="requirement" value="">Require</label></div>
							<div class="checkbox"><label class="checkbox-inline"><input type="checkbox" class="form-control" id="multi_chk" name="multi_chk" value="">Multi</label></div>
							<input type="button"  class="btn btn-success" name="submit_type" value="Add" onClick="return AddOrUpdateConfirm(this.form);">
							
							</form>
							</div>
							<hr>
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
								
								if (document.getElementById('multi_chk_'+id_item).checked==true)
								multi_chk=1;
								else
								multi_chk=0;
								
								if (document.getElementById('vkey_'+id_item).checked==true)
								vkey=1;
								else
								vkey=0;
								
								var select_value= document.getElementById('select_value_'+id_item).value;
								
								
								//alert('xxx');
								
								window.location='item.php?id_group='+id_group+'&id_item='+id_item+'&field_name='+field_name+'&field_value='+field_value+'&parent_id_item='+parent_id_item+'&requirement='+requirement+'&multi_chk='+multi_chk+'&vkey='+vkey+'&select_value='+select_value+'&submit_type=update';
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
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
	<div class="img-thumbnail">
									<span class="badge  pull-right" style="margin-bottom:10px; background: #428bca !important;"><?php echo $data["id_item"];?></span>
									<div class="field">
									<!--<label for="TotalOrderAmount">value</label>-->
									<div class="input-box">
												<input type="text" class="form-control" name="field_name" id="field_name_<?php echo $data["id_item"];?>" value="<?php echo $data["field_name"];?>">	

</div>
</div>
<div class="field">
<!--<label for="TotalOrderAmount">value</label>-->
<div class="input-box">
												<select name="field_value" class="form-control" id="field_value_<?php echo $data["id_item"];?>" onchange="return call_item_select1(<?php echo $data["id_item"];?>);">
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
												
												if($data["field_value"]==6)
												echo "<option value=\"6\" selected >Select</option>";
												else
													echo "<option value=\"6\" >Select</option>";
												
												
												?>
</select>

</div>
</div>
<div class="field">
<div class="input-box">
<?php 
$selectedoption1 =( $data["field_value"]==6 ? "style=\"display:block\"" : "style=\"display:none\"");
?>

												<input type="text" <?php echo $selectedoption1?> placeholder="select값" class="form-control"  name="select_value" id="select_value_<?php echo $data["id_item"];?>" value="<?php echo $data["select_value"];?>">
												
												

											</div>
											</div>
											
											<div class="field">
												<!--<label for="TotalOrderAmount">value</label>-->
												<div >
												
												<?php		
												$sstrSQL = "SELECT * FROM item where id_item<>".$data["id_item"];

												$selectDB->query($sstrSQL);
												
												echo '<select name="parent_id_item" class="form-control" >';
												
												echo '<option value="0">--select--</option>';
												while($sdata = $selectDB->fetch_array($selectDB->res)) {
													
													//echo '<option>'.$data["parent_id_group"].'</option>';
													//echo '<option >'.$sdata["id_group"].'</option>';
													
													if ($data["parent_id_item"]==$sdata["id_item"])
													echo '<option value=\"'.$sdata["id_item"].'\" selected>'.$sdata["field_name"].'</option>';
													else
														echo '<option value="'.$sdata["id_item"].'" >'.$sdata["field_name"].'</option>';	
												}
												
												
												echo '</select>';
												
												?>
												
												
												
												
												
												
													<input type="text" class="form-control"name="parent_id_item" id="parent_id_item_<?php echo $data["id_item"];?>" value="<?php echo $data["parent_id_item"];?>">
													
												</div>
											</div>
											<div class="field">
												<!--<label for="TotalOrderAmount">value</label>-->
											<label class="checkbox-inline">
													<?php 
													if ($data["requirement"]==1)
													echo "<input type=\"checkbox\" name=\"requirement\" id=\"requirement_".$data["id_item"]."\" value=".$data["requirement"]." checked>";
													else
													echo "<input type=\"checkbox\" name=\"requirement\" id=\"requirement_".$data["id_item"]."\" value=".$data["requirement"]." >";
													echo "Require";
													?>	
											</label>

											</div>
											
<div class="field">
<!--<label for="TotalOrderAmount">value</label>-->
<label class="checkbox-inline">
													<?php 
													if ($data["multi_chk"]==1)
													echo "<input type=\"checkbox\" name=\"multi_chk\" id=\"multi_chk_".$data["id_item"]."\" value=".$data["multi_chk"]." checked>";
													else
														echo "<input type=\"checkbox\" name=\"multi_chk\" id=\"multi_chk_".$data["id_item"]."\" value=".$data["multi_chk"]." >";
													echo "Multi";
													?>	
</label>

</div>

<div class="field">
<!--<label for="TotalOrderAmount">value</label>-->
<label class="checkbox-inline">
													<?php 
													if ($data["vkey"]==1)
													echo "<input type=\"radio\" name=\"vkey\" id=\"vkey_".$data["id_item"]."\" value=".$data["vkey"]." checked>";
													else
														echo "<input type=\"radio\" name=\"vkey\" id=\"vkey_".$data["id_item"]."\" value=".$data["vkey"]." >";
													echo "Key";
													?>	
</label>

</div>



<div class="field">
<!--<label for="TotalOrderAmount">value</label>-->									
													<a href="item.php?id_item=<?php echo $data["id_item"];?>&id_group=<?php echo $data["id_group"];?>&submit_type=del" class="btn btn-danger btn-sm">DEL</a>

<!--<label for="TotalOrderAmount">value</label>-->

													<input type="button" class="btn btn-warning btn-sm" name="submit_type" id="submit_type"  onclick="itemedit(<?php echo $data["id_group"];?>,<?php echo $data["id_item"];?>);" value="update">			
											
											</div>
											
											</div>
									</div>
<?php
								}
				$DB->close();								
?>																		
								
							</div>	
							</div>
							
							
							
							
							<div class="modal-footer">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
							