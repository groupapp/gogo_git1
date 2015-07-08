<!DOCTYPE html>
<head>
<?php include('headerinclude.php'); ?>
<script>
$(document).on("hidden.bs.modal", function (e) {
    $(e.target).removeData("bs.modal").find(".modal-content").empty();
	});
</script>
</head>
<body>
<?php $current = "group";?>
<?php include('nav.php'); ?>
<?php

include_once dirname(__FILE__) . "/include/function.php";



$name_group		= empty($_REQUEST["name_group"])?null:$_REQUEST["name_group"];

$parent_id_group		= empty($_REQUEST["parent_id_group"])?0:$_REQUEST["parent_id_group"];
$submit_type		= empty($_REQUEST["submit_type"])?null:$_REQUEST["submit_type"];
$id_group		= empty($_REQUEST["id_group"])?0:$_REQUEST["id_group"];
$id_group		= empty($_REQUEST["id_group"])?0:$_REQUEST["id_group"];
$input_display		= empty($_REQUEST["input_display"])?0:$_REQUEST["input_display"];
$child_chk		= empty($_REQUEST["child_chk"])?0:$_REQUEST["child_chk"];
/*
if($_POST["parent_id_group"]=='')
$parent_id_group=0;
else
$parent_id_group		= $_POST["parent_id_group"];


$submit_type		= $_REQUEST["submit_type"];
$id_group		= $_GET["id_group"];
*/
//echo $submit_type;

$DB = new myDB;
$selectDB = new myDB;


switch($submit_type) {
	case "ADD":
		$IstrSQL = "insert  item_group (name_group,parent_id_group) Values ('".$name_group."',".$parent_id_group.")";
		echo $IstrSQL;
		$DB->query($IstrSQL);
		break;
	case "del":
		$DstrSQL = "delete  from item_group where id_group= ".$id_group;
		//echo $DstrSQL;
		$DB->query($DstrSQL);
		break;
	case "update":
		$UstrSQL = "update   item_group SET name_group='".$name_group."',parent_id_group=".$parent_id_group." ,child_chk=".$child_chk.",input_display=".$input_display." where id_group= ".$id_group;
		//echo $UstrSQL;
		$DB->query($UstrSQL);
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

$strSQL = "SELECT * FROM item_group ";

$DB->query($strSQL);



?>						
							<div class="wrapper">
							<div class="btn btn-primary " id="toggle">Create Group</div>
							<script>
							$( "#toggle" ).click(function() {
							$( ".create" ).slideToggle( "slow" );
							});
							</script>
							<div class="create col-md-12 col-md-offset-6">
							<form method="post" action="group.php" class="form-inline" >
							<input type="hidden" id="id_group" name="id_group" value="<?php echo empty($sid_group)?null:$sid_group;?>">
							<input type="text" class="form-control" id="name_group" placeholder="그룹이름" name="name_group" value="<?php echo empty($sname_group)?null:$sname_group;?>">
							<input type="text" class="form-control" id="parent_id_group" placeholder="상위그룹"name="parent_id_group" value="<?php echo empty($sparent_id_group)?null:$sparent_id_group;?>">
							<?php 
							if ($submit_type=="edit")
							echo "<input type=\"submit\"  class=\"form-control btn btn-success\"name=\"submit_type\" value=\"UPDATE\">";
							else
								echo "<input type=\"submit\"  class=\"form-control btn btn-success\"name=\"submit_type\" value=\"ADD\">";
							?>
							</form>
							</div>
							
							<script type="text/javascript">
								function edit(id) {
								var id_group= id;
								var child_chk;
								var input_display;
								var name_group= document.getElementById('name_group_'+id).value;
								var parent_id_group= document.getElementById('parent_id_group_'+id).value;
								//alert(name_group);
							    if (document.getElementById('child_chk_'+id).checked==true)
								
								child_chk=1;
								else
								child_chk=0;
								
								if (document.getElementById('input_display_'+id).checked==true)
								input_display=1;
								else
								input_display=0;
								
								window.location='group.php?id_group='+id_group+'&parent_id_group='+parent_id_group+'&name_group='+name_group+'&child_chk='+child_chk+'&input_display='+input_display+'&submit_type=update';
							}
							</script>
							
								<div class="wrapper col-sm-12">
								
<?php
while($data = $DB->fetch_array($DB->res)) {	
?>								
	<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
	<div class="img-thumbnail">
	<div class="col-sm-12 col-xs-12">
	<span class="badge pull-right" style="background: #428bca;"><?php echo $data["id_group"] ?></span>
	</div>
	<div class="col-sm-12 col-xs-12">
	<span class="span-title">그룹 이름</span>
	<div class="input-box">
	<input type="hidden" name="id_group" id="id_group" value="<?php echo $data["id_group"];?>">	
	<input type="text" name="name_group" class="form-control" id="name_group_<?php echo $data["id_group"];?>" value="<?php echo $data["name_group"];?>">														
</div>
</div>
<div class="col-sm-12 col-xs-12">
<span class="span-title">상위 그룹</span>
<div >
<?php		
	$sstrSQL = "SELECT * FROM item_group where id_group<>".$data["id_group"];

	$selectDB->query($sstrSQL);
	
	echo '<select name="parent_id_group" class="form-control">';
	
	echo '<option value="0">--select--</option>';
	while($sdata = $selectDB->fetch_array($selectDB->res)) {
	
	//echo '<option>'.$data["parent_id_group"].'</option>';
	//echo '<option >'.$sdata["id_group"].'</option>';
	
	if ($data["parent_id_group"]==$sdata["id_group"])
		echo '<option value=\"'.$sdata["id_group"].'\"class="form-control" selected>'.$sdata["name_group"].'</option>';
	else
		echo '<option value="'.$sdata["id_group"].'" >'.$sdata["name_group"].'</option>';	
	}
	
	
	echo '</select>';
	echo '<input type="text" name="parent_id_group" class="form-control" id="parent_id_group_'. $data["id_group"].'" value="'.$data["parent_id_group"].'">';	

?>
</div>
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-6 col-xs-6">
<label class="checkbox-inline">
	<?php
	if ($data["child_chk"]==1)
	echo "<input type=\"checkbox\" name=\"child_chk\" id=\"child_chk_".$data["id_group"]."\" value=".$data["child_chk"]." checked>";
	else
		echo "<input type=\"checkbox\" name=\"child_chk\" id=\"child_chk_".$data["id_group"]."\" value=".$data["child_chk"]." >";
	echo"Multiple";
	?>	
</label>
</div>
<div class="col-sm-6 col-xs-6">
<label class="checkbox-inline">
		<?php 
		if ($data["input_display"]==1)
		echo "<input type=\"checkbox\" name=\"input_display\" id=\"input_display_".$data["id_group"]."\" value=".$data["input_display"]." checked>";
		else
			echo "<input type=\"checkbox\" name=\"input_display\" id=\"input_display_".$data["id_group"]."\" value=".$data["input_display"]." >";
		echo"Display";
		?>	
</label>
</div>
</div>
<div class="col-sm-12 col-xs-12">
<!--<label for="TotalOrderAmount">value</label>-->
<div class="col-sm-4 col-xs-4">
<button class="btn btn-danger btn-sm">											
			<a href="group.php?id_group=<?php echo $data["id_group"];?>&submit_type=del">DELETE</a>
</button>	
</div>

<!--<label for="TotalOrderAmount">value</label>-->
<div class="col-sm-4 col-xs-4">
			<input type="button" class="btn btn-warning btn-sm" name="submit_type" id="submit_type"  onclick="edit(<?php echo $data["id_group"];?>);" value="UPDATE">
</div>

</div>

<div class="col-sm-12 col-xs-12">
<!--<label for="TotalOrderAmount">value</label>-->
<div style="float:right;">												
			<a href="item.php?id_group=<?php echo $data["id_group"];?>&name_group=<?php echo $data["name_group"]?>&parent_id_group=<?php echo $data["parent_id_group"]?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myGroup">SELECT</a>
			</div>
			</div>
			</div>		
			</div>
			<?php
		}
		$DB->close();								
		?>																		
		</div>
								
							
							
							
		</div>
		</div>
		<div class="modal fade" id="myGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
		<div class="modal-content">
		</div>
		</div>
	</body>
	</html>