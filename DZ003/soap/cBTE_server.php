<?php

if(!extension_loaded("soap")){
  dl("php_soap.dll");
}


ini_set("soap.wsdl_cache_enabled","0");

$server = new SoapServer("toEur.wsdl");


function cBTE($value){
  return $value . " BAM = " . $value * 0.51 . " EUR";
}

$server->AddFunction("cBTE");
$server->handle();
?>