<!DOCTYPE html>
<head>
<?php include('headerinclude.php'); ?>
<script>
$(document).on("hidden.bs.modal", function (e) {
    $(e.target).removeData("bs.modal").find(".modal-content").empty();
});



function modalclose()
{
	location.reload();
}

function checkform(sender)
{

var $form = $(sender).parents('form');
        var $target = $('#loadpage');//loadpage

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize() + '&' + $(sender).attr('name') + '=' + $(sender).attr('value'),
 
            success: function(data, status) {
			    $target.html(data);
				//location.reload();
            }
        });
	return false;
}

function checkform1(seq)
{
       
		var $target = $('.modal-body');
		var pk_code = $('#pk_code').val();
	    var data_seq = $('#data_seq_'+seq).val();
	    var id_item = $('#id_item_'+seq).val();
	    var id_group = $('#id_group').val();
		$.ajax({
            type: 'POST',
            url: 'data_edit.php',  
            data:{"pk_code":pk_code,"data_seq":data_seq,"submit_type":"del","id_item":id_item,"id_group":id_group},
			
            success: function(data, status) {
			    $target.html(data);
				
            }
        });
	return false;
}

</script>
</head>
<body>
<?php
$current = "data";
include('nav.php'); 


include_once dirname(__FILE__) . "/include/function.php";

$search	= empty($_REQUEST["search"])?null:$_REQUEST["search"];

$input_id_item	= empty($_REQUEST["input_id_item"])?null:$_REQUEST["input_id_item"];
$input_id_value	= empty($_REQUEST["input_id_value"])?null:$_REQUEST["input_id_value"];
$pk_code	= empty($_REQUEST["pk_code"])?null:$_REQUEST["pk_code"];

$field_name	= empty($_REQUEST["field_name"])?null:$_REQUEST["field_name"];
$field_value	= empty($_REQUEST["field_value"])?0:$_REQUEST["field_value"];
$id_item		= empty($_REQUEST["id_item"])?0:$_REQUEST["id_item"];
$id_group		= empty($_REQUEST["id_group"])?0:$_REQUEST["id_group"];
$parent_id_item		= empty($_REQUEST["parent_id_item"])?0:$_REQUEST["parent_id_item"];
$requirement		= empty($_REQUEST["requirement"])?0:$_REQUEST["requirement"];
$submit_type		= empty($_REQUEST["submit_type"])?null:$_REQUEST["submit_type"];

//print_r ($submit_type);


$DB1 = new myDB;
if (sizeof($input_id_item)>0)
{
	$PistrSQL = "insert  pk_code (create_date) Values (now())";
	//echo $PistrSQL;
	$DB1->query($PistrSQL);
	$lastid=$DB1->get_lastid();
	$input_id_item_cnt=sizeof($input_id_item);
	//echo $input_id_item_cnt;
	//exit;
}

//echo $submit_type;
//exit;
$DB = new myDB;



switch($submit_type) {
	case "REGISTER":
		for($i = 0; $i < $input_id_item_cnt; $i++){
			
			$IstrSQL = "insert  data (id_item,pk_code,varchr_value) Values (".$input_id_item[$i].",".$lastid.",'".$input_id_value[$i]."')";
			
			//echo $IstrSQL;
			//exit;
			$DB->query($IstrSQL);
		}
		break;
	case "del":
		$DstrSQL = "update pk_code SET delete_date=now() where pk_code= ".$pk_code;
		
		$DB->query($DstrSQL);
		break;
	case "update":
		$UstrSQL = "update   item SET id_group=".$id_group.",parent_id_item=".$parent_id_item.",field_name='".$field_name."',field_value=".$field_value.",requirement=".$requirement." where id_item= ".$id_item;
		//echo $UstrSQL;
		$DB->query($UstrSQL);
		break;
	
	
	
}

$strSQL = "SELECT * FROM item_group where input_display=1";
//echo $strSQL;
$DB->query($strSQL);



?>						
							<div class="wrapper">
								<div class="container">
								<div class="col-sm-12">
								<div class="col-sm-5 col-sm-offset-8">
								
							<form method="get" action="data.php" class="form-inline" role="form">
							<div class="input-group ">
							<input class="search form-control" type="text" name="search" placeholder="search" value="<?php echo $search?>">
							<div class="input-group-btn">
							<button tyoe="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button></div>
							</div>
							</form>
							
							</div>
							</div>
							<hr>
								<button class="btn btn-primary" id="toggle" data-toggle="popover" data-content="Testing Popover" title="Test">Create New</button>	
								
								<!--<div id="jqxgrid"></div>
								<div style='margin-top: 20px;'>
									<div style='float: left;'>
										<input type="button" value="Export to Excel" id='excelExport' />
									</div>
								</div>-->						
								<div class="register col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="img-thumbnail">
<?php
echo " <form method=\"GET\" action=\"data.php\" class=\"form-inline\">";
while($data = $DB->fetch_array($DB->res)) {	
?>								
	
	
	<!--<label for="TotalOrderAmount">value</label>-->
	
	
<?php 
echo "<div class='panel-body'>";
echo '<div class="caption" style="margin-bottom:7px;">';
echo "<h5 class='span-title'>".$data["name_group"]."</h5>";
echo "</div>";
?>


<?php

$DB2 = new myDB;
$item_strSQL = "SELECT * FROM item where id_group=".$data["id_group"];
//echo $strSQL;
$DB2->query($item_strSQL);

while($item_data = $DB2->fetch_array($DB2->res)) {
	
	echo "<input type=\"hidden\" name=\"input_id_item[]\" id=\"id_item_".$item_data["id_item"]."\" value=".$item_data["id_item"].">";
	echo "<input type=\"text\" name=\"input_id_value[]\" class=\"form-control\" placeholder=\"".$item_data["field_name"]."\"id=\"id_item_".$item_data["id_item"]."\" style=\"margin-right:5px;\">";
	
}			
echo "</div><hr>";
}
echo "<div class=\"register-btn\"><input type=\"submit\" name=\"submit_type\" class=\"btn btn-success\" value=\"REGISTER\"></div></form></div>";
//$DB2->close();				
//$DB->close();								
?>								
							
							</div>	
							</div>	
							
							<script>
$( "#toggle" ).click(function() {
  $( ".register" ).slideToggle( "slow" );

});
$('#toggle').popover({trigger:'hover'})
</script>
								<hr>
								<div class="container col-lg-12 col-md-12 col-sm-12">
<?php
///// SJ Comment!! ////
/// before this loop pk_code ////
/////////////

$list_group_item;
$loopcnt;

function CallGroup()
{
	global $list_group_item;
	
	$strSQL = "SELECT * FROM  item_group"; 
	$DB3 = new myDB;
	$DB3->query($strSQL);
	$loopidx = 0;
	
	while($list_group = $DB3->fetch_array($DB3->res)) {
		$list_group_item[$loopidx] = $list_group;;
		$loopidx++;
	}
}

function CallItemData($Pk_code, $Group_Item, $col_number = 2)
{
	global $loopcnt;
	global $planprice;
	
	$Group_id = $Group_Item["id_group"];
	$GroupName = $Group_Item["name_group"];
	$DBItem = new myDB;
	
	
	//$strSqlitem = "select * from data inner join item on item.id_item = data.id_item where pk_code=".$Pk_code." and item.id_group = " . $Group_id;	
	
	$strSqlitem = "select * from data data,item item,pk_code pk_code  where data.pk_code=pk_code.pk_code and item.id_item = data.id_item and pk_code.delete_date=0 and data.pk_code=".$Pk_code." and item.id_group = " . $Group_id;	
	
//echo $strSqlitem;
	
	$datastring = "";
	
	$DBItem->query($strSqlitem);
	
	if ($DBItem->rows > 0)
	{
		$stotalprice=0;
		$datastring = '<div class="col-lg-'.$col_number.' col-md-'.$col_number.' col-sm-'.$col_number.' plan-detail">';
		$datastring .= '<div class="panel panel-primary"><div class="panel-heading">'. $GroupName . '</div>';
		$datastring .= '<div class="panel-body">';
		if ($Group_id == 12){
			$datastring .= '<table class="table table-bordered">';
			$datastring .= '<tr>';
		while($list_data = $DBItem->fetch_array($DBItem->res)) {
			
				if($list_data["id_item"]==40)
				{	
					$qty= intval($list_data["varchr_value"]);
					//echo $qty;
				}
				if($list_data["id_item"]==41)
				{	
					$price= intval($list_data["varchr_value"]);
					//echo $price;
					$totalprice=$qty*$price;
					$stotalprice=$stotalprice+$totalprice;
					//echo $stotalprice;
					$planprice=$stotalprice;
				}
				
			
				
				
				$datastring .= '<td>'.$list_data["varchr_value"].'</td>';
				if($list_data["id_item"]==42)
				$datastring .= '</tr><tr>';
				
			} 
			$datastring .= '</tr>';
			
			}else{
			$datastring .= '<div class="img-thumbnail">';
			while($list_data = $DBItem->fetch_array($DBItem->res)) {
				$datastring .= '<div><span class="span-title">'.$list_data["field_name"].'</span>';
				$datastring .= ' : ';
				
				
				if($list_data["id_item"]==32)
				{
					$datastring .= '<span>'.$planprice.'</span>';	
				}
				else
				$datastring .= '<span>'.$list_data["varchr_value"].'</span>';
				
				
				$datastring .= '</div>';
			}
			$datastring .= '</div>';
		}
		$datastring .= '</table>';
		$datastring .= '</div>';
		
		if ($Group_id == 1 || $Group_id == 12 )
		{
			$datastring .= "<a href=\"data_edit.php?pk_code=".$Pk_code."&id_group=".$Group_id."\" class=\"btn btn-warning group-btn\" data-toggle=\"modal\" data-target=\"#editbtn\">Edit</a>";
			$datastring .= "<a href=\"data.php?submit_type=del&pk_code=".$Pk_code."\" class=\"btn btn-danger group-btn\">Delete</a>";
			if($Group_id == 1)
			{
				$datastring .= "<a href=\"data_add.php?new=new&pk_code=".$Pk_code."&id_group=12\" data-toggle=\"modal\" data-target=\"#editbtn\" class=\"btn btn-info group-btn\">NewPlan</a>";		
			}
		}
		$datastring .= '</div></div>';
		$loopcnt = $loopcnt - $col_number;
	}
	return array("Count"=>$DBItem->rows,"Body"=>$datastring);
}

function CallDataList($Pk_code) 
{
	global $loopcnt;
	echo '<div class="row">';
	{
		global $list_group_item;
		
		$DBChild = new myDB;
		$strSQLcnt = "SELECT *, (select count(data_seq) from data where pk_code = pkitem.pk_code) as ChildCount FROM  pk_code pkitem where parent_pk_code = ". $Pk_code;// . " and (select count(data_seq) from data where pk_code = pk_code.parent_pk_code > 0" ; 
		$DBChild->query($strSQLcnt);
		$childCnt = $DBChild->rows;
		
		
		for($i=0; $i < sizeof($list_group_item);$i++)
		{
			$itemvalue = CallItemData($Pk_code, $list_group_item[$i]);
			echo $itemvalue["Body"];
		}
		
		echo '<div class="col-sm-'.$loopcnt.'">';
		{
			if ($childCnt > 0)
			{
				while($child_key = $DBChild->fetch_array($DBChild->res)) {
					if ($child_key["ChildCount"] > 0)
					{
						$itemcount = 0;
						$itemvaluestring = '<div class=" subdatalist col-sm-12" ><div class="img-thumbnail group">';
						for($i=0; $i < sizeof($list_group_item);$i++)
						{
							$itemvalue = CallItemData($child_key["pk_code"], $list_group_item[$i], 4);
							$itemvaluestring .= $itemvalue["Body"];
							$itemcount += (int)$itemvalue["Count"];
						}
						$itemvaluestring .= '</div></div>';
						if ($itemcount > 0)
						{
							echo $itemvaluestring;
						}
					}
				}
			}
		}
		echo '</div>';
	}
	echo '</div>';
}


$DB_item = new myDB;

if ($search!="")
	$PkstrSQL ="SELECT a.* FROM  pk_code a, data b  where  a.pk_code = b.pk_code and a.delete_date=0 and b.varchr_value LIKE '%".$search."%' Group by a.pk_code";
else
	$PkstrSQL = "SELECT * FROM  pk_code  where delete_date=0 and parent_pk_code is null "; 

$DB_item->query($PkstrSQL);


CallGroup();

while($Pk_code = $DB_item->fetch_array($DB_item->res)) {
	$loopcnt = 12;
	
	CallDataList($Pk_code["pk_code"]);
}




?>							
							</div>
<div class="modal fade" id="editbtn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content col-sm-12">
	</div>
	</div>
	</div>
<div class="modal fade" id="addbtn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	</div>
	</div>
	</div>
	</body>
	</html>