<?php

header('Content-Type: text/plain');

try{
	ini_set('soap.wsdl_cache_enabled',0);
	ini_set('soap.wsdl_cache_ttl',0);

	$value = $_POST['value'];
	if($_POST['currency'] === "toEur"){
		try {
			$sClient = new SoapClient('toEur.wsdl');
			$response = $sClient->cBTE($value);
		  } catch (SoapFault $e) {
			 print_r($e);
		  }
	}
	else{
		try {
	
			$sClient = new SoapClient('toBam.wsdl');
			$response = $sClient->cETB($value);
		  } catch (SoapFault $e) {
			 print_r($e);
		  }
	}
	
	var_dump($response);

} catch(SoapFault $e){

  var_dump($e);
  echo $e ;
}

?>