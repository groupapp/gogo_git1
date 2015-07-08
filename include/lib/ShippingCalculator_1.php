<?php
date_default_timezone_set('America/Los_Angeles');
class ShippingCalculator  {
	// Defaults
	var $weight = 1;
	var $weight_unit = "lb";
	var $size_length = 4;
	var $size_width = 8;
	var $size_height = 2;
	var $size_unit = "in";
	var $debug = false; // Change to true to see XML sent and recieved 
	
	// Batch (get all rates in one go, saves lots of time)
	var $batch_ups = false; // Currently Unavailable
	var $batch_usps = true; 
	var $batch_fedex = false; // Currently Unavailable
	
	// Config (you can either set these here or send them in a config array when creating an instance of the class)
	var $services;
	var $from_zip;
	var $from_state;
	var $from_country;
	var $to_zip;
	var $to_stat;
	var $to_country;
	var $ups_access = "7C7065B28FCD67B0"; 	// UPS Access License Key
	var $ups_user = "soccershopusa";//"lemontreecorp";
	var $ups_pass = "soccer1";//"Minime143";
	var $ups_account = "X4847A";//"2W3682";

	var $dhl_reference = "1234567890123456789012345678901";
	var $dhl_account = "846246363";
	var $dhl_user = "OjoghoUS";
	var $dhl_pass = "mlUYuZBC";	
	
	
	var $usps_user = "447SOCCE3087";//"mangahgee"
	var $fedex_account;
	var $fedex_meter;
	//var $today = date("Y-m-d");  
	// Results
	var $rates;
	
	// Setup Class with Config Options
	function ShippingCalculator($config) {
		if($config) {
			foreach($config as $k => $v) $this->$k = $v;
		}
	}
	
	// Calculate
	function calculate($company = NULL,$code = NULL) {
		$this->rates = NULL;
		$services = $this->services;
		if($company && $code) $services[$company][$code] = 1;
		foreach($services as $company => $codes) {
			foreach($codes as $code => $name) {
				switch($company) {
					case "ups": 
						/*if($this->batch_ups == true) $batch[] = $code; // Batch calculation currently unavaiable
						else*/ $this->rates[$company][$code] = $this->calculate_ups($code);
						break;
					case "usps":
						if($this->batch_usps == true) $batch[] = $code;
						else $this->rates[$company][$code] = $this->calculate_usps($code);
						break;
					/*case "dhl":
						/*if($this->batch_usps == true) $batch[] = $code;
						else*/ /*$this->rates[$company][$code] = $this->calculate_dhl($code);
						break;*/	
					/*case "fedex":*/ 
						/*if($this->batch_fedex == true) $batch[] = $code; // Batch calculation currently unavaiable
						else*/ /*$this->rates[$company][$code] = $this->calculate_fedex($code);
						break;*/
				}
			}
			// Batch Rates
			//if($company == "ups" and $this->batch_ups == true and count($batch) > 0) $this->rates[$company] = $this->calculate_ups($batch);
			if($company == "usps" and $this->batch_usps == true and count($batch) > 0) $this->rates[$company] = $this->calculate_usps($batch);
			//if($company == "fedex" and $this->batch_fedex == true and count($batch) > 0) $this->rates[$company] = $this->calculate_fedex($batch);
		}
		
		return $this->rates;
	}
	
	// Calculate UPS
	function calculate_ups($code) {
		$url = "https://www.ups.com/ups.app/xml/Rate";
    	$data = '<?xml version="1.0"?>  
<AccessRequest xml:lang="en-US">  
	<AccessLicenseNumber>'.$this->ups_access.'</AccessLicenseNumber>  
	<UserId>'.$this->ups_user.'</UserId>  
	<Password>'.$this->ups_pass.'</Password>  
</AccessRequest>  
<?xml version="1.0"?>  
<RatingServiceSelectionRequest xml:lang="en-US">  
	<Request>  
		<TransactionReference>  
			<CustomerContext>Rating and Service</CustomerContext>  
			<XpciVersion>1.0001</XpciVersion>  
		</TransactionReference>  
		<RequestAction>Rate</RequestAction>  
		<RequestOption>Rate</RequestOption>  
	</Request>  
	<PickupType>  
		<Code>03</Code>  
	</PickupType>
	<CustomerClassification>
		<Code>04</Code>
	</CustomerClassification>
	<Shipment>  
		<Shipper>  
			<Address>  
				<PostalCode>'.$this->from_zip.'</PostalCode>  
				<CountryCode>'.$this->from_country.'</CountryCode>  
			</Address>  
		<ShipperNumber>'.$this->ups_account.'</ShipperNumber>  
		</Shipper>  
		<ShipTo>  
			<Address>  
				<PostalCode>'.$this->to_zip.'</PostalCode>  
				<CountryCode>'.$this->to_country.'</CountryCode>  
			<ResidentialAddressIndicator/>  
			</Address>  
		</ShipTo>  
		<ShipFrom>  
			<Address>  
				<PostalCode>'.$this->from_zip.'</PostalCode>  
				<CountryCode>'.$this->from_country.'</CountryCode>  
			</Address>  
		</ShipFrom>  
		<Service>  
			<Code>'.$code.'</Code>  
		</Service>  
		<Package>  
			<PackagingType>  
				<Code>02</Code>
				<Description>Package</Description>  
			</PackagingType>  
			<Description>Rate Shopping</Description>
			<PackageWeight>  
				<UnitOfMeasurement>  
					<Code>LBS</Code>  
				</UnitOfMeasurement>  
				<Weight>'.($this->weight_unit != "lb" ? $this->convert_weight($this->weight,$this->weight_unit,"lb") : $this->weight).'</Weight>  
			</PackageWeight>  
		</Package>  
	</Shipment>  
</RatingServiceSelectionRequest>'; 
		
		// Curl
		$results = $this->curl($url,$data);
		
		// Debug
		if($this->debug == true) {
			print "<xmp>".$data."</xmp><br />";
			print "<xmp>".$results."</xmp><br />";
		}
		
		// Match Rate
		preg_match('/<MonetaryValue>(.*?)<\/MonetaryValue>/',$results,$rate);
		
		return isset($rate[1])?$rate[1]:null;
	}
//------------------------------------------------------------------------------------------
	// Calculate dhl
	function calculate_dhl($code) {

	$data = '<?xml version="1.0" encoding="UTF-8"?>
		<p:DCTRequest xmlns:p="http://www.dhl.com" xmlns:p1="http://www.dhl.com/datatypes" xmlns:p2="http://www.dhl.com/DCTRequestdatatypes" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.dhl.com DCT-req.xsd ">
		  <GetQuote>
			<Request>
			  <ServiceHeader>
				<MessageTime>'.date('c').'</MessageTime>
				<MessageReference>'.$this->dhl_reference.'</MessageReference>
				<SiteID>'.$this->dhl_user.'</SiteID>
				<Password>'.$this->dhl_pass.'</Password>
			  </ServiceHeader>
			</Request>
			<From>
				<CountryCode>'.$this->from_country.'</CountryCode>
				<Postalcode>'.$this->from_zip.'</Postalcode>
			</From>
			<BkgDetails>
			  <PaymentCountryCode>US</PaymentCountryCode>
			  <Date>'.date("Y-m-d").'</Date>
			  <ReadyTime>PT10H21M</ReadyTime>
					<ReadyTimeGMTOffset>+01:00</ReadyTimeGMTOffset>
					<DimensionUnit>IN</DimensionUnit>
					<WeightUnit>LB</WeightUnit>
					<Pieces><Piece>
						<PieceID>1</PieceID>
						<Height>1</Height>
						<Depth>1</Depth>
						<Width>1</Width>   
						<Weight>'.$this->weight.'</Weight>
					</Piece></Pieces>
					<PaymentAccountNumber>'.$this->dhl_account.'</PaymentAccountNumber>
					<IsDutiable>N</IsDutiable>
					<NetworkTypeCode>AL</NetworkTypeCode>
				</BkgDetails>
				<To>
					<CountryCode>'.$this->to_country.'</CountryCode>
					<Postalcode>'.$this->to_zip.'</Postalcode>
				</To>       
			</GetQuote>
		</p:DCTRequest>';
		$tuCurl = curl_init();
		curl_setopt($tuCurl, CURLOPT_URL, "https://xmlpitest-ea.dhl.com/XMLShippingServlet");
		curl_setopt($tuCurl, CURLOPT_PORT , 443);
		curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
		curl_setopt($tuCurl, CURLOPT_HEADER, 0);
		curl_setopt($tuCurl, CURLOPT_POST, 1);
		curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml","SOAPAction: \"/soap/action/query\"", "Content-length: ".strlen($data)));

		$tuData = curl_exec($tuCurl);

		curl_close($tuCurl);
	/*	
		$xml = simplexml_load_string($tuData);
		print "<pre>";
		print_r($xml);
		// Curl
	*/	
		
		// Debug
		if($this->debug == true) {
			print "<xmp>".$data."</xmp><br />";
			print "<xmp>".$tuData."</xmp><br />";
		}
		//PricingDate
		// Match Rate
		$xml = simplexml_load_string($tuData);
		$rate=$xml->GetQuoteResponse->BkgDetails->QtdShp[0]->ShippingCharge;
		$rate1=$xml->GetQuoteResponse->BkgDetails->QtdShp[0]->DeliveryDate;
		if($rate[0]==0)
		$rate=$xml->GetQuoteResponse->BkgDetails->QtdShp[1]->ShippingCharge;
		$srate=round((float)$rate[0],2);
		return isset($rate[0])?$srate." (".$rate1[0].")":null;
		/*
		preg_match('/<ShippingCharge>(.*?)<\/ShippingCharge>/',$tuData,$rate);
		preg_match('/<DeliveryDate>(.*?)<\/DeliveryDate>/',$tuData,$rate1);
		//return $rate[0]."(".$rate1[0].")";
		return isset($rate[0])?$rate[0]."(".$rate1[0].")":null;
		
		
		/*
		preg_match_all('/<QtdShp>(.*?)<\/QtdShp>/',$tuData,$packages);
		foreach($packages as $x => $package) {
			preg_match('/<ShippingCharge>(.+?)<\/ShippingCharge>/',$packages[$x],$rate);
			$rates[$code[$package]] = $rate[0];
		}
		if($array == true) return $rates;
		else return $rate;
		*/
		
	}
//-------------------------------------------------------------------------------------------	
	
	// Calculate USPS
	function calculate_usps($code) {
		// Weight (in lbs)
		if($this->weight_unit != 'lb') $weight = $this->convert_weight($weight,$this->weight_unit,'lb');
		else $weight = $this->weight;
		// Split into Lbs and Ozs
		$lbs = floor($weight);
		$ozs = ($weight - $lbs)  * 16;
		if($lbs == 0 and $ozs < 1) $ozs = 1;
		// Code(s)
		$array = true;
		if(!is_array($code)) {
			$array = false;
			$code = array($code);
		}
		
		$url = "http://Production.ShippingAPIs.com/ShippingAPI.dll";
		//$url = "http://testing.shippingapis.com/ShippingAPITest.dll";
		$data = 'API=RateV4&XML=<RateV4Request USERID="'.$this->usps_user.'" PASSWORD="">';
		foreach($code as $x => $c) $data .= '<Package ID="'.$x.'"><Service>'.$c.'</Service><ZipOrigination>'.$this->from_zip.'</ZipOrigination><ZipDestination>'.$this->to_zip.'</ZipDestination><Pounds>'.$lbs.'</Pounds><Ounces>'.$ozs.'</Ounces><Container/><Size>REGULAR</Size><Machinable>TRUE</Machinable></Package>';
		$data .= '</RateV4Request>';
		
		// Curl
		$results = $this->curl($url,$data);
		
		// Debug
		if($this->debug == true) {
			print "<xmp>".$data."</xmp><br />";
			print "<xmp>".$results."</xmp><br />";
		}
		
		// Match Rate(s)
		preg_match_all('/<Package ID="([0-9]{1,3})">(.+?)<\/Package>/',$results,$packages);
		foreach($packages[1] as $x => $package) {
			preg_match('/<Rate>(.+?)<\/Rate>/',$packages[2][$x],$rate);
			$rates[$code[$package]] = $rate[1];
		}
		if($array == true) return $rates;
		else return $rate;
	}
	
	// Calculate FedEX
	function calculate_fedex($code) {
		$url = "https://gatewaybeta.fedex.com/GatewayDC";
		$data = '<?xml version="1.0" encoding="UTF-8" ?>
<FDXRateRequest xmlns:api="http://www.fedex.com/fsmapi" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="FDXRateRequest.xsd">
	<RequestHeader>
		<CustomerTransactionIdentifier>Express Rate</CustomerTransactionIdentifier>
		<AccountNumber>'.$this->fedex_account.'</AccountNumber>
		<MeterNumber>'.$this->fedex_meter.'</MeterNumber>
		<CarrierCode>'.(in_array($code,array('FEDEXGROUND','GROUNDHOMEDELIVERY')) ? 'FDXG' : 'FDXE').'</CarrierCode>
	</RequestHeader>
	<DropoffType>REGULARPICKUP</DropoffType>
	<Service>'.$code.'</Service>
	<Packaging>YOURPACKAGING</Packaging>
	<WeightUnits>LBS</WeightUnits>
	<Weight>'.number_format(($this->weight_unit != 'lb' ? convert_weight($this->weight,$this->weight_unit,'lb') : $this->weight), 1, '.', '').'</Weight>
	<OriginAddress>
		<StateOrProvinceCode>'.$this->from_state.'</StateOrProvinceCode>
		<PostalCode>'.$this->from_zip.'</PostalCode>
		<CountryCode>'.$this->from_country.'</CountryCode>
	</OriginAddress>
	<DestinationAddress>
		<StateOrProvinceCode>'.$this->to_state.'</StateOrProvinceCode>
		<PostalCode>'.$this->to_zip.'</PostalCode>
		<CountryCode>'.$this->to_country.'</CountryCode>
	</DestinationAddress>
	<Payment>
		<PayorType>SENDER</PayorType>
	</Payment>
	<PackageCount>1</PackageCount>
</FDXRateRequest>';
		
		// Curl
		$results = $this->curl($url,$data);
		
		// Debug
		if($this->debug == true) {
			print "<xmp>".$data."</xmp><br />";
			print "<xmp>".$results."</xmp><br />";
		}
	
		// Match Rate
		preg_match('/<NetCharge>(.*?)<\/NetCharge>/',$results,$rate);
		
		return $rate;
	}
	
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
}
?>
