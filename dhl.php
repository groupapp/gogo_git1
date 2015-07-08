<?php

$data = '<?xml version="1.0" encoding="UTF-8"?>
<p:DCTRequest xmlns:p="http://www.dhl.com" xmlns:p1="http://www.dhl.com/datatypes" xmlns:p2="http://www.dhl.com/DCTRequestdatatypes" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.dhl.com DCT-req.xsd ">
  <GetQuote>
    <Request>
      <ServiceHeader>
        <MessageTime>'.date('c').'</MessageTime>
        <MessageReference>1234567890123456789012345678901</MessageReference>
        <SiteID>OjoghoUS</SiteID>
        <Password>mlUYuZBC</Password>
      </ServiceHeader>
    </Request>
    <From>
        <CountryCode>US</CountryCode>
        <Postalcode>90006</Postalcode>
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
                <Weight>3</Weight>
            </Piece></Pieces>
            <PaymentAccountNumber>846246363</PaymentAccountNumber>
            <IsDutiable>N</IsDutiable>
            <NetworkTypeCode>AL</NetworkTypeCode>
        </BkgDetails>
        <To>
            <CountryCode>KR</CountryCode>
            <Postalcode>120100</Postalcode>
        </To>       
    </GetQuote>
</p:DCTRequest>';
//682037
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
$xml = simplexml_load_string($tuData);
$rate=$xml->GetQuoteResponse->BkgDetails->QtdShp[0]->ShippingCharge;

echo "<xmp>";
print_r($rate[0]);
//print_r($xml->GetQuoteResponse->BkgDetails->QtdShp[1]->QtdShpExChrg->QtdSExtrChrgInAdCur[2]->ChargeValue);
//print_r($xml->GetQuoteResponse->BkgDetails->QtdShp[1]->QtdSInAdCur[2]->TotalAmount);
//print_r($xml);
//print_r($xml['GetQuoteResponse']['Response']['ServiceHeader']['SiteID']);
echo "</xmp>";
?>
