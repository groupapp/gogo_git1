<?php
	require("dhl.inc.php");
	
	$dhl = new DHL();
	$dhl->setUserInfo("userid","password");
	$dhl->setAccountInfo("accountnumber","zipcode");
	$dhl->testShip();
	//$result = $dhl->getShipKey();
	$dhl->setShipKey("56233F2B2C4E5C43465D545B5351304F424F5243405A5A5D5D55");
	$dhl->setSenderDetail("Harish","7609312742");
	//$dhl->setLabelInstructions("GIF","","youremail@domain.com");
	$dhl->setReceiverDetail("Harish","CA","US","92009","Carlsbad","1409 Turquoise Dr","","7609312742","UG","");
	$dhl->setService(DHL_SERVICE_GROUND);
	$dhl->addShipmentDetail(date('Y-m-d'),1);
        $dhl->addShip();
        
        $dhl->setService(DHL_SERVICE_SECOND_DAY);
	$dhl->addShipmentDetail(date('Y-m-d'),12);
	$dhl->addShip();
	$result = $dhl->getShipRate();
	//$result = $dhl->getShipLabel();
	//$result = $dhl->cancelShip(15043974050);
	
	if($result==false)
		echo $dhl->error();
	else 
		print_r($result);
	$dhl->saveLable("label.gif",$result['IMAGE']);
	$transactionkey = $result['TRANSACTIONKEY'];
//Shipkey : 54233F2B2C4E5C43465D545B5351304F424F5241455754595C51
//Tranasaction key : 15043974050

?>