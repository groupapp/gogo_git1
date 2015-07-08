<?php
	
	/**
	 * DHL is an API to DHL shipping services
	 * @author Harish Chauhan
	 * @access Public
	 * @copyright Freeware
	 * @name DHL
	 */

	define( 'XML_ERROR_OFFSET',  2000 );
	
	//Normal services
	define('DHL_SERVICE_EXPRESS','E');
	define('DHL_SERVICE_NEXT_AFTERNOON','N');
	define('DHL_SERVICE_SECOND_DAY','S');
	define('DHL_SERVICE_GROUND','G');
	
	//Special services
	define('DHL_SERVICE_HOLD_AT_DHL','HAA'); //If the receiver will be picking up the shipment from the destination DHL station. ID will be required at the time of pickup
	define('DHL_SERVICE_HAZARDOUS_MATERIALS ','HAZ'); //DHL accepts some classes of hazardous materials for shipment.
	define('DHL_SERVICE_SAT ','SAT'); //-Express Saturday is represented in the API as a service type of "E" combined with a special service type of "SAT."  If this special service is included for a non-Express service type, it will be ignored
	define('DHL_SERVICE_EXPRESS_1030 ','1030'); //Express 10:30 AM is represented in the API as a service type of "E" combined with a special service type of "1030."  If this special service is included for a non-Express service type, it will be ignored
	
	//Shipment type
	
	define('DHL_SHIP_PACKAGE','P');
	define('DHL_SHIP_LETTER','L');
	
	//Shipping Billing Type
	define('DHL_BILL_SENDER','S');
	define('DHL_BILL_RECEIVER','R');
	define('DHL_BILL_THIRD_PARTY','T');
	
	//Additional Protection 
	define('DHL_ASSET_PROTECTION','AP'); //All Risk Asset Protection is available for shipments beyond the published Limit of Liability.
	define('DHL_DECLARED_VALUE','DV'); //Asset Protection is available for shipments, beyond the published Limit of Liability. This is not All Risk Protection. 
	define('DHL_NOT_REQUIRED','NR'); // No additional protection is requested.
	
	//Collect on delivier
	define('DHL_COD_MONEY_ORDER','M'); //Money Order
	define('DHL_COD_CHECK','P'); //Personal or Company Check
	
	class DHL
	{
		var $_userid	= "";
		var $_pwd		= "";
		var $_shipkey 	= "";
		var $_actnumber = "";
		var $_zipcode	= "";
		var $_error		= "";
		var $_isTest	= false;

		var $_url = "";
		var $_testurl = "";
		
		var $_parser	= "";
		var $_result	= "";
		
		var $xmlData;
		var $currentTag;
		var $_xml = null;
		
		var $dhlService = "";
		var $dhlSpecialService="";
		var $dhlShipType="";
		var $dhlBillType="";
		var $_parentnode = null;
		
		
		
		/********************************************************************************
		*** DHL Public Functions													*****
		/********************************************************************************/
		
		function DHL($userid="",$pwd="",$actnumber="",$shipkey="",$zipcode="")
		{
			$this->setUserInfo($userid,$pwd);
			$this->setAccountInfo($actnumber,$zipcode);
			$this->setShipKey($shipkey);
			
			$this->_url = "https://ecommerce.airborne.com/apilanding.asp";
			$this->_testurl = "https://ecommerce.airborne.com/apilandingtest.asp";
			
			$this->dhlShipType = DHL_SHIP_PACKAGE;
			$this->dhlBillType = DHL_BILL_SENDER;
			
			$this->_xml = array();
		}
		
		function setUserInfo($userid,$pwd)
		{
			$this->_userid = $userid;
			$this->_pwd = $pwd;
		}
		
		function setAccountInfo($actnumber,$zipcode)
		{
			$this->_actnumber = $actnumber;
			$this->_zipcode = $zipcode;
		}
		
		function setShipKey($shipkey)
		{
			$this->_shipkey=$shipkey;
		}
		
		function setService($service,$sservice="")
		{
			$this->dhlService = $service;
			$this->dhlSpecialService = $sservice;
		}
		
	
		function addShipmentDetail($shipdate,$weight,$length="",$width="",$height="",$shipmenttype=DHL_SHIP_PACKAGE,$addtype="",$addvalue=0)
		{
			$xml = "<ShipmentDetail>";
			$xml.= "<ShipDate>".$shipdate."</ShipDate>";
			$xml.= "<Service><Code>".$this->dhlService."</Code></Service>";
			$xml.= "<ShipmentType><Code>".$shipmenttype."</Code></ShipmentType>";
			$xml.= "<Weight>".$weight."</Weight>";
			if($length>0 && $width>0 && $height>0)
			{
				$xml.="<Dimensions><Length>".$length."</Length>";
				$xml.="<Width>".$width."</Width>";
				$xml.="<Height>".$height."</Height></Dimensions>";
			}
			if(!empty($addtype) && $addvalue>0)
			{
				$xml.="<AdditionalProtection><Code>".$addtype."</Code>";
				$xml.="<Value>".$addtype."</Value></AdditionalProtection>";
			}
			if(!empty($this->dhlSpecialService))
			{
				$xml.="<SpecialServices><SpecialService><Code>".$this->dhlSpecialService."</Code></SpecialService></SpecialServices>";
			}
			$xml.="</ShipmentDetail>";
			$this->_xml['SHIPMENT']=$xml;
		}
		
		function setBillDetail($billtype=DHL_BILL_SENDER,$codpaycode="",$codpayvalue=0)
		{
				
			$xml = "<Billing>";
			$xml.="<Party><Code>".$billtype."</Code></Party>";
			$xml.="<AccountNbr>".$this->_actnumber."</AccountNbr>";
			if(!empty($codpaycode) && $codpayvalue >0)
				$xml.="<CODPayment><Code>".$codpaycode."</Code><Value>".$codpayvalue."</Value></CODPayment>";
			$xml.="</Billing>";
			$this->_xml['BILL']=$xml;
		}

		function setSenderDetail($sentby,$phone)
		{
				
			$xml = "<Sender>";
			$xml.="<SentBy>".$sentby."</SentBy>";
			$xml.="<PhoneNbr>".$phone."</PhoneNbr>";
			$xml.="</Sender>";
			$this->_xml['SENDER']=$xml;
		}

		
		function setReceiverDetail($name,$state,$country,$zip,$city,$street,$streetline2,$phone,$company,$dept)
		{
			$xml.="<Receiver><Address>";
			if(!empty($company))
				$xml.="<CompanyName>".$company."</CompanyName>";
			if(!empty($dept))
				$xml.="<SuiteDepartmentName>".$dept."</SuiteDepartmentName>";
			if(!empty($street))
				$xml.="<Street>".$street."</Street>";
			if(!empty($streetline2))
				$xml.="<StreetLine2>".$streetline2."</StreetLine2>";
			if(!empty($city))
				$xml.="<City>".$city."</City>";
			$xml.="<State>".$state."</State>";
			$xml.="<PostalCode>".$zip."</PostalCode>";	
			$xml.="<Country>".$country."</Country>";
			$xml.="</Address>";
			if(!empty($company))
				$xml.="<AttnTo>".$name."</AttnTo>";
			if(!empty($company))
				$xml.="<PhoneNbr>".$phone."</PhoneNbr>";
			$xml.="</Receiver>";
			$this->_xml['REC'] = $xml;
		}
		
		function setProcessingInstructions($code)
		{
			$xml ="<ShipmentProcessingInstructions><Overrides>";
			$xml.="<Override><Code>$code</Code></Override>";
			$xml.="</Overrides></ShipmentProcessingInstructions>";
			$this->_xml['INST'] = $xml;	
		}

		function setLabelInstructions($imagetype,$code,$email,$message="")
		{
			$xml ="<ShipmentProcessingInstructions>";
			$xml.="<Label><ImageType>$imagetype</ImageType></Label>";
			if(!empty($code))
				$xml.="<Overrides><Override><Code>$code</Code></Override></Overrides>";
			if(!empty($email))
				$xml.="<Notification><Notify><EmailAddress>$email</EmailAddress></Notify><Message>$message</Message></Notification>";
			$xml.="</ShipmentProcessingInstructions>";
			$this->_xml['INST'] = $xml;	
		}
		
		
		function setOtherElement($data)
		{
			$xml="<TransactionTrace>$data</TransactionTrace>";
			$this->_xml['OTHER'] = $xml;
		}
		
		function error()
		{
			return $this->_error;
		}		
		
		function testShip()
		{
			$this->_isTest = true;
			$this->_url = $this->_testurl;
		}
		
		function getShipKey()
		{
			if(!empty($shipkey))
				return $shipkey;
			else 
				return  $this->requestShipKey();
		}

		
		function addShip()
		{
			$xml.= '<Shipment action="RateEstimate" version="1.0">';
			$xml.= '<ShippingCredentials><ShippingKey>'.$this->_shipkey.'</ShippingKey>';
			$xml.= '<AccountNbr>'.$this->_actnumber.'</AccountNbr></ShippingCredentials>';
			$xml.= $this->_xml['SHIPMENT'];
			if(empty($this->_xml['BILL']))
				$this->setBillDetail();
			$xml.= $this->_xml['BILL'];
			$xml.= $this->_xml['REC'];
			if(!empty($this->_xml['INST']))
				$xml.= $this->_xml['INST'];
			if(!empty($this->_xml['OTHER']))
				$xml.= $this->_xml['OTHER'];
			$xml.= '</Shipment>';
			$this->_xml['SHIP'].=$xml;
		}

		function getShipRate()
		{

			if(empty($this->_xml['SHIP']))
				$this->addShip();

			//echo $xml; exit;
				
			$xml = str_replace("--FUNCTION--",$this->_xml['SHIP'],$this->_getHeaderXML());
			$this->_sendXML($xml);
			$result = $this->_parseXML();
			if($result==false) return false;

			if(count($this->xmlData['TOTALCHARGEESTIMATE'])>1)
				return $this->xmlData['TOTALCHARGEESTIMATE'];
			else
				return $this->xmlData['TOTALCHARGEESTIMATE'][0];
		}
		
		function getShipLabel()
		{
			$xml.= '<Shipment action="GenerateLabel" version="1.0">';
			$xml.= '<ShippingCredentials><ShippingKey>'.$this->_shipkey.'</ShippingKey>';
			$xml.= '<AccountNbr>'.$this->_actnumber.'</AccountNbr></ShippingCredentials>';
			$xml.= $this->_xml['SHIPMENT'];
			if(empty($this->_xml['BILL']))
				$this->setBillDetail();
			$xml.= $this->_xml['BILL'];
			$xml.= $this->_xml['SENDER'];
			$xml.= $this->_xml['REC'];
			if(!empty($this->_xml['INST']))
				$xml.= $this->_xml['INST'];
			if(!empty($this->_xml['OTHER']))
				$xml.= $this->_xml['OTHER'];
			$xml.= '</Shipment>';
			
			//echo $xml; exit;
				
			$xml = str_replace("--FUNCTION--",$xml,$this->_getHeaderXML());
			$this->_sendXML($xml); 
			
			$result = $this->_parseXML();
			if($result==false) return false;
			$return =array();
			$return['TRANSACTIONKEY']=$this->xmlData['AIRBILLNBR'][0];
			if(isset($this->xmlData['IMAGE'][0]))
			{
				for($i=0;$i<count($this->xmlData['IMAGE']);$i++)
					$return['IMAGE'] .= trim($this->xmlData['IMAGE'][$i]);
				$return['IMAGE'] = base64_decode($return['IMAGE']);
			}
			return $return;
		}
		
		function cancelShip($transactionkey)
		{
			$xml.= '<Shipment action="Void" version="1.0">';
			$xml.= '<ShippingCredentials><ShippingKey>'.$this->_shipkey.'</ShippingKey>';
			$xml.= '<AccountNbr>'.$this->_actnumber.'</AccountNbr></ShippingCredentials>';
			$xml.= '<ShipmentDetail><AirbillNbr>'.$transactionkey.'</AirbillNbr></ShipmentDetail>';
			$xml.= '</Shipment>';
			
			//echo $xml; exit;
				
			$xml = str_replace("--FUNCTION--",$xml,$this->_getHeaderXML());
			$this->_sendXML($xml); 
			
			$result = $this->_parseXML();
			if($result==false) return false;
			return true;
		}
		function requestShipKey()
		{
			$xml.= '<Register action="ShippingKey" version="1.0">';
			$xml.= '<AccountNbr>'.$this->_actnumber.'</AccountNbr>';
			$xml.= '<PostalCode>'.$this->_zipcode.'</PostalCode>';
			$xml.= '</Register>';

			$xml = str_replace("--FUNCTION--",$xml,$this->_getHeaderXML());
			//echo $xml;
			$this->_sendXML($xml);
			$result = $this->_parseXML();
			if($result==false) return false;
			return $this->xmlData['SHIPPINGKEY'][0];
			
		}

		function saveLable($name,$imgdata)
		{
			$fp = @fopen($name,"wb");
			if(!is_resource($fp))
			{
				$this->_error = "Error : Can't save image.";
				return false;
			}
			@fwrite($fp,$imgdata);
			@fclose($fp);
		}
		
		/***********************************************************************
		 *** XML Parser - Callback functions                                 ***
		 ***********************************************************************/
		function epXmlElementStart ($parser, $tag, $attributes) {
			$this->currentTag = $tag;
			
			/*$this->_parentnode['node'][$this->_parentnode[$parser]]=$tag;
			$this->_parentnode[$parser]++;*/
			
		}
		
		function epXmlElementEnd ($parser, $tag) {
			$this->currentTag = "";
			//$this->_parentnode[$parser]--;
		}
		
		function epXmlData ($parser, $cdata) {
	        $this->xmlData[$this->currentTag][] = $cdata;
		}

		
		/********************************************************************************
		*** DHL Private Functions													*****
		/********************************************************************************/

		function _getHeaderXML()
		{
			$xml = '<?xml version = "1.0" encoding = "UTF-8"?>';
			$xml.='<eCommerce action="Request" version="1.1">';
			$xml.='<Requestor>';
			$xml.='<ID>'.$this->_userid.'</ID>';		
			$xml.='<Password>'.$this->_pwd.'</Password>';		
			$xml.='</Requestor>';
			$xml.='--FUNCTION--';
			$xml.='</eCommerce>';
			
			return $xml;
		}
		
		function _sendXML($xml)
		{
			if(!$ch=curl_init())
			{
				$this->_error="Curl is not initialized.";
				return false;
			}
			else
			{
				curl_setopt($ch, CURLOPT_URL,$this->_url); 
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$this->_result = curl_exec($ch);
				if(curl_error($ch) != "")
				{
					echo $this->_error= "Error with Curl installation: " . curl_error($ch) . "<br>";
					return false;
				}
				else
				{
					curl_close($ch);
					return $this->_result;
				}
			}
		}
		
		function _parseXML()
		{
            $this->_parser = xml_parser_create();
            
            // Disable XML tag capitalisation (Case Folding)
            xml_parser_set_option ($this->_parser, XML_OPTION_CASE_FOLDING, TRUE);
            
            // Define Callback functions for XML Parsing
            xml_set_object($this->_parser, &$this);
            xml_set_element_handler ($this->_parser, "epXmlElementStart", "epXmlElementEnd");
            xml_set_character_data_handler ($this->_parser, "epXmlData");
            
            // Parse the XML response
            xml_parse($this->_parser, $this->_result, TRUE);
            if( xml_get_error_code( $this->_parser ) == XML_ERROR_NONE ) {
                // Get the result into local variables.
                //print_r($this->xmlData);
                if(strpos($this->_result,"<Faults>")!==false)
				{
					$myError = $this->xmlData["CODE"][0];
		            $myErrorMessage = $this->xmlData["DESC"][0];
		            $myErrorMessage.= $this->xmlData["DESCRIPTION"][0];
					$this->_error.="Error($myError):".$myErrorMessage ;
					return false;
				}
	            return $this->xmlData;
            } else {
                // An XML error occured. Return the error message and number.
                $myError = xml_get_error_code( $this->_parser ) + XML_ERROR_OFFSET;
                $myErrorMessage = xml_error_string( $myError );
				$this->_error="Error($myError):".$myErrorMessage ;
				return false;
            }
            // Clean up our XML parser
            xml_parser_free( $this->parser );

		}		
		
	}
?>