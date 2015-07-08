<?php
session_start();
$_SESSION['test'] = array();

$_SESSION['test']['1234']['L']['blk'] = 3;
$_SESSION['test']['1234']['L']['whk'] = 2;
$_SESSION['test']['1234']['S']['blk'] = 1;
$_SESSION['test']['1234']['S']['yel'] = 2;
$_SESSION['test']['1234']['S']['wht'] = 1;
$_SESSION['test']['235']['M'] = 1;
$_SESSION['test']['1234']['S']['wht'] += 2;
$_SESSION['test']['1234']['S']['blk'] += 10;
$_SESSION['test']['54'] = 1;
/*
$_SESSION['test'][] = array("1234", "L", "blk", 3);
$_SESSION['test'][] = array("1234", "L", "whk", 2);
$_SESSION['test'][] = array("1234", "S", "blk", 2);
$_SESSION['test'][] = array("1234", "S", "yel", 2);
$_SESSION['test'][] = array("1234", "S", "wht", 1);
$_SESSION['test'][] = array("235", "M", "", 1);
$_SESSION['test'][] = array("1234", "S", "wht", 2);
*/
?>
<html>
<head>
<link rel="stylesheet" href="./css/jqtransform.css" type="text/css" media="all" />
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="./js/jquery.jqtransform.js"></script>
</head>
<body>


<div class="product-options">
	<dl>
		<dt><label class="required"><em>*</em>Size:</label></dt>
		<dd>
			<div id="jqTransformSelect">
				<div>
				<select name="size" id="">
					<option>-- Please Select --</option>
<?php 
$sizes = array("S", "M", "L", "XL");
for ($i=0; $i<count($sizes); $i++) {
?>
					<option value="<?php echo $sizes[$i]?>"><?php echo $sizes[$i]?></option>
<?php 
}
?>
				</select>
				</div>
			</div>
		</dd>
	</dl>
	<p class="required">* Required Fields</p>
	<p><a href="test2.php">test2</a></p>
</div>

<script type="text/javascript">
$(function() {
    //find all form with class jqtransform and apply the plugin
    $("#jqTransformSelect").jqTransform();
});
</script>
<?php
echo "<pre>";
echo var_dump($_SESSION['test']);
echo "</pre>"; 


echo "Total items: " . multiDimArrSum($_SESSION['test']) . "<br />";
foreach($_SESSION['test'] as $key => $val) {
	echo "Product(" . $key . ")<br/>";
	if (is_array($val)) {
		foreach($val as $size => $val2) {
			echo "&nbsp; &nbsp; - Size(".$size."): ";
			if (is_array($val2)) {
				echo "<br />";
				foreach($val2 as $color => $val3) {
					echo $color . " : " . $val3 . "<br />";
				}
			}else{
				echo $val2;
			}
			echo "<br />";
		}
	} else {
		echo $val;
	}
}
unset($_SESSION['test']);
?>
</body>
</html>


<?php 

function multiDimArrSum($arr, &$result=0) {
	foreach($arr as $key => $val) {
		if(is_array($val)) {
			multiDimArrSum($val, $result);
		} else {
		$result += $val;
		}
	}
	return $result;
}


function multiDimArrayAdd(& $left, $right)    //created by George Pligor
{
	if(is_array($left) && is_array($right))
	{
		foreach($left as $key => $val)
		{
			if( is_array($val) )
			{
				multiDimArrayAdd($left[$key], $right[$key]);
			}
			$left[$key] += $right[$key];
		}
	}
}

?>