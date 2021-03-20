<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Md5decrypt {

    public function decrypt($hash)
    {
    	$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://md5-reverse-search.p.rapidapi.com/API/md5.php?hash=".$hash,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"x-rapidapi-host: md5-reverse-search.p.rapidapi.com",
				"x-rapidapi-key: dcac6f7006msh84aa441192d60b8p1cf8afjsn205127d1b39d"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$len = strlen($response);
			if ($len > 3) {
				echo $response;				
			}else{
				echo "Password terlalu rumit untuk di reverse.";
			}
		}
    }
}