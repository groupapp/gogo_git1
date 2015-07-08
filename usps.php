<?php

$url = "http://Production.ShippingAPIs.com/ShippingAPI.dll";
		//$url = "http://testing.shippingapis.com/ShippingAPITest.dll";
		$data = 'API=RateV4&XML=<RateV4Request USERID="447SOCCE3087" PASSWORD="">';

 $data .= '<Package ID="2"><Service>PARCEL </Service><ZipOrigination>90061</ZipOrigination><ZipDestination>90275</ZipDestination><Pounds>1</Pounds><Ounces>16</Ounces><Container/><Size>REGULAR</Size><Machinable>TRUE</Machinable></Package>';
		$data .= '</RateV4Request>';
	
		$results = curl($url,$data);
		
		// Debug
		if(debug == true) {
			print "<xmp>".$data."</xmp><br />";
			print "<xmp>".$results."</xmp><br />";
		}

		

		// Match Rate(s)
		preg_match_all('/<Package ID="([0-9]{1,3})">(.+?)<\/Package>/',$results,$packages);
		foreach($packages[1] as $x => $package) {
			preg_match('/<Rate>(.+?)<\/Rate>/',$packages[2][$x],$rate);
			$rates[$code[$package]] = $rate[1];
		}
		print_r($rates);
		//if($array == true) return $rates;
		//else return $rate;
		
		// Curl
	function curl($url,$data = NULL) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		if($data) {
			curl_setopt($ch, CURLOPT_POST,1);  
			curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		}  
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		$contents = curl_exec ($ch);
		
		return $contents;
		
		curl_close ($ch);
	}
	
	// Convert Weight
	function convert_weight($weight,$old_unit,$new_unit) {
		$units['oz'] = 1;
		$units['lb'] = 0.0625;
		$units['gram'] = 28.3495231;
		$units['kg'] = 0.0283495231;
		
		// Convert to Ounces (if not already)
		if($old_unit != "oz") $weight = $weight / $units[$old_unit];
		
		// Convert to New Unit
		$weight = $weight * $units[$new_unit];
		
		// Minimum Weight
		if($weight < .1) $weight = .1;
		
		// Return New Weight
		return round($weight,2);
	}
	
	// Convert Size
	function convert_size($size,$old_unit,$new_unit) {
		$units['in'] = 1;
		$units['cm'] = 2.54;
		$units['feet'] = 0.083333;
		
		// Convert to Inches (if not already)
		if($old_unit != "in") $size = $size / $units[$old_unit];
		
		// Convert to New Unit
		$size = $size * $units[$new_unit];
		
		// Minimum Size
		if($size < .1) $size = .1;
		
		// Return New Size
		return round($size,2);
	}
	
	// Set Value
	function set_value($k,$v) {
		$this->$k = $v;
	}
		
?>
