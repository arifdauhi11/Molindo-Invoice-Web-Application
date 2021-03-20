<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://sms-international.p.rapidapi.com/WebTool/SMStoCountry/sms62?msg=Hello%252C%20welcome%20to%20use%20sms%20service&phonenum=%252B6285242401749",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: sms-international.p.rapidapi.com",
		"x-rapidapi-key: dcac6f7006msh84aa441192d60b8p1cf8afjsn205127d1b39d"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}