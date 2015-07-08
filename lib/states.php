<?php 
/************************************
 *
*	Ajax States List
*
************************************/

include "CountryCodes.php";

$countrycode	= (isset($_POST['code']))?$_POST['code']:null;

if ($countrycode=="MX")
	$arr = $mexican_states;
elseif ($countrycode=="CA")
	$arr = $canadian_states;
else
	$arr = $us_states;

$cnt = 0;
$json = '{"states": [';
foreach($arr as $code => $name) {
	if ($cnt>0) $json .=",";
	$json .= '{"scode":"'.$code.'", "sname":"'.$name.'"}';
	$cnt++;
}
$json .= ']}';
echo $json;

?>