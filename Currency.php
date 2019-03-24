<?php

$cSession = curl_init();
 $currency=$_POST['currency'];
curl_setopt($cSession,CURLOPT_URL,"https://free.currencyconverterapi.com/api/v6/convert?q=".$currency."&compact=ultra&apiKey=d7b5b6fe0b72e355f60a");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);
$result=curl_exec($cSession);
$resA = json_decode($result,true);
print_r($resA);
die();
?>
