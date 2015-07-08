<?php
/****************************************
/*
/*	Shipping Estimation
/*
/****************************************/
$dcountry	= isset($_POST['ccode'])?$_POST['ccode']:null;
$dstate		= isset($_POST['scode'])?$_POST['scode']:isset($_POST['txtregion'])?$_POST['txtregion']:null;
$dzip		= isset($_POST['zcode'])?$_POST['zcode']:null;
$weight		= isset($_POST['lb_weight'])?$_POST['lb_weight']:0;

// UPS
$services['ups']['14'] = 'Next Day Air Early A.M<br>Next business day delivery by 8:00 a.m. in the 48 states';
$services['ups']['01'] = 'Next Day Air<br/>Early AM Next business day delivery by 10:30 a.m., 12:00 noon<br/>(in stock items delivered by next business days, excludes Saturday and Sunday)<br/>This method is only available in the Continental U.S.';
$services['ups']['65'] = 'Saver';
$services['ups']['59'] = '2nd Day Air Early AM<br>Delivery on the second business day by 10:30 a.m. or 12:00 noon to most commercial destinations';
$services['ups']['02'] = '2nd Day Air<br>Delivery by the end of the second business day<br/>(in stock items delivered within 2 business days, excludes Saturday and Sunday)<br/>This method is only available in the Continental U.S.';
$services['ups']['12'] = '3 Day Select<br>Delivery by the end of the third business day';
$services['ups']['03'] = 'Ground<br>Day-definite delivery typically in one to five days<br/>Delivery time depends on your distance from us. We are located in Los Angeles, CA.';
$services['ups']['11'] = 'Standard';
$services['ups']['07'] = 'Worldwide Express';
$services['ups']['54'] = 'Worldwide Express Plus';
$services['ups']['08'] = 'Worldwide Expedited';
// USPS
$services['usps']['EXPRESS'] = 'Express <br>Overnight delivery to most U.S. locations';
$services['usps']['PRIORITY'] = 'Priority<br>Delivery within 2 days in most cases';
$services['usps']['PARCEL'] = 'Parcel<br>Delivery in 2 to 8 days';

$services['dhl']['EXPRESS'] = 'Express';

//$services['usps']['FIRST CLASS'] = 'First Class';
//$services['usps']['EXPRESS SH'] = 'Express SH';
//$services['usps']['BPM'] = 'BPM';
//$services['usps']['MEDIA '] = 'Media';
//$services['usps']['LIBRARY'] = 'Library';
/*
// FedEx
$services['fedex']['PRIORITYOVERNIGHT'] = 'Priority Overnight';
$services['fedex']['STANDARDOVERNIGHT'] = 'Standard Overnight';
$services['fedex']['FIRSTOVERNIGHT'] = 'First Overnight';
$services['fedex']['FEDEX2DAY'] = '2 Day';
$services['fedex']['FEDEXEXPRESSSAVER'] = 'Express Saver';
$services['fedex']['FEDEXGROUND'] = 'Ground';
$services['fedex']['FEDEX1DAYFREIGHT'] = 'Overnight Day Freight';
$services['fedex']['FEDEX2DAYFREIGHT'] = '2 Day Freight';
$services['fedex']['FEDEX3DAYFREIGHT'] = '3 Day Freight';
$services['fedex']['GROUNDHOMEDELIVERY'] = 'Home Delivery';
$services['fedex']['INTERNATIONALECONOMY'] = 'International Economy';
$services['fedex']['INTERNATIONALFIRST'] = 'International First';
$services['fedex']['INTERNATIONALPRIORITY'] = 'International Priority';
*/

// Config
$config = array(
	// Services
	'services' => $services,
	// Weight
	'weight' => $weight, // Default = 1
	'weight_units' => 'lb', // lb (default), oz, gram, kg
	// Size
	'size_length' => 13, // Default = 8
	'size_width' => 11, // Default = 4
	'size_height' => 2, // Default = 2
	'size_units' => 'in', // in (default), feet, cm
	// From
	'from_zip' => 90004, 
	'from_state' => "CA", // Only Required for FedEx
	'from_country' => "US",
	// To
	'to_zip' => $dzip,
	'to_state' => $dstate, // Only Required for FedEx
	'to_country' => $dcountry
	
	// Service Logins
	/*
	'ups_access' => '7C7065B28FCD67B0', // UPS Access License Key
	'ups_user' => 'soccershopusa', // UPS Username  
	'ups_pass' => 'soccer1', // UPS Password  
	'ups_account' => 'X4847A', // UPS Account Number
	'usps_user' => '447SOCCE3087', // USPS User Name
	'fedex_account' => '', // FedEX Account Number
	'fedex_meter' => '' // FedEx Meter Number
	*/ 
);

// Shipping Calculator Class
require_once "ShippingCalculator.php";
// Create Class (with config array)
$ship = new ShippingCalculator($config);
// Get Rates
$rates = $ship->calculate('',11);

if ($_POST['mode']=="getaquote") {
	
	$json = '{"rates": [';
	foreach($rates as $company => $codes) {
		foreach($codes as $code => $rate) {
			if ($rate) {
				if (($_POST['coupon_opt']=="freeshipping" || $_POST['isfreeShip']=="freeShip") && $company=="ups" && $code=="03") {
					$json .= '{"value":"' . $rate . '", "carrier":"[' . str_replace("Ground", "Ground] <span class=free_ground> FREE SHIPPING!</span>", $services[$company][$code]) . '", "edt":""},';
				} else {
					$json .= '{"value":"' . $rate . '", "carrier":"[' . strtoupper($company) . '] ' . $services[$company][$code] . '", "edt":""},';
				} 
			}
		}
	}
	if (substr($json, -1)==",") $json = substr($json, 0, strlen($json)-1);
	$json .= ']}';

	$result = $json;
	
} else {
	
	$result = "<select name=''>";
	foreach($rates as $company => $codes) {
		foreach($codes as $code => $rate)
			if ($rate) {
				$result .= "<option value='".$rate."' /> $".$rate . " [ " . strtoupper($company) . " ] " . $services[$company][$code] . "</option>";
			}
	}
	$result .= "</select>";
	
}

echo $result;

?>