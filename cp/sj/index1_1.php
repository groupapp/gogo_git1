<!DOCTYPE html>
<head>

</head>
<body>
<?php $current = "group";?>
<?php include('nav.php'); ?>
<?php

include_once dirname(__FILE__) . "/include/function.php";



$name_group		= empty($_REQUEST["name_group"])?null:$_REQUEST["name_group"];


$DB = new myDB;
$selectDB = new myDB;


switch($submit_type) {
	case "ADD":
		$IstrSQL = "insert  item_group (name_group,parent_id_group) Values ('".$name_group."',".$parent_id_group.")";
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
	
}

$strSQL = "SELECT * FROM item_group ";

$DB->query($strSQL);



?>						
<div class="jumbotron">
      <div class="container">
        <h1>ARMS</h1>
        <p>tands for Automatic Recruiting Mechanism System.  With our system, building your down-line will be so easy it will feel automatic.  Our system embraces the power of numbers in order to provide our members with discounts and other incentives an individual would not be able to get by themselves.</p>
        
      </div>
    </div>								
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