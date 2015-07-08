<?php

$data = '<?xml version="1.0"?>  
<AccessRequest xml:lang="en-US">  
	<AccessLicenseNumber>7C7065B28FCD67B0</AccessLicenseNumber>  
	<UserId>soccershopusa</UserId>  
	<Password>soccer1</Password>  
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
				<PostalCode>90006</PostalCode>  
				<CountryCode>US</CountryCode>  
			</Address>  
		<ShipperNumber>X4847A</ShipperNumber>  
		</Shipper>  
		<ShipTo>  
			<Address>  
				<PostalCode>90275</PostalCode>  
				<CountryCode>US</CountryCode>  
			<ResidentialAddressIndicator/>  
			</Address>  
		</ShipTo>  
		<ShipFrom>  
			<Address>  
				<PostalCode>90006</PostalCode>  
				<CountryCode>US</CountryCode>  
			</Address>  
		</ShipFrom>  
		<Service>  
			<Code>12</Code>  
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
				<Weight>1</Weight>  
			</PackageWeight>  
		</Package>  
	</Shipment>  
</RatingServiceSelectionRequest>';
//682037
$tuCurl = curl_init();
curl_setopt($tuCurl, CURLOPT_URL, "https://www.ups.com/ups.app/xml/Rate");
curl_setopt($tuCurl, CURLOPT_PORT , 443);
curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
curl_setopt($tuCurl, CURLOPT_HEADER, 0);
curl_setopt($tuCurl, CURLOPT_POST, 1);
curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data);
curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml","SOAPAction: \"/soap/action/query\"", "Content-length: ".strlen($data)));

$tuData = curl_exec($tuCurl);

curl_close($tuCurl);
$xml = simplexml_load_string($tuData);

print "<pre>";
print_r($xml);
print_r($xml->GetQuoteResponse->BkgDetails->QtdShp[1]->QtdShpExChrg->QtdSExtrChrgInAdCur[2]->ChargeValue);
print_r($xml->GetQuoteResponse->BkgDetails->QtdShp[1]->QtdSInAdCur[2]->TotalAmount);
print_array($xml);
print_r($xml['GetQuoteResponse']['Response']['ServiceHeader']['SiteID']);
?>
