<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n   \"notification\": {\r\n     \"title\": \"Portugal vs. Denmark\",\r\n     \"body\": \"5 to 1\",\r\n     \"icon\": \"firebase-logo.png\",\r\n     \"click_action\": \"http://localhost:8081\"\r\n   },\r\n   \"to\": \"foC8mN1blmw:APA91bFmtDsDY2SLlaCfzuRmQryiNAlRQI7CsNEDtnzRmLnmOpvpkKOofnk8zpIo3wYQgmhem1fjiO-7ofW4605iMi1ljgt0azNcFfWuKXEUf7T2PczuTAKyUpD3RTCatzbflLTHLFzU\"\r\n }",
  CURLOPT_HTTPHEADER => array(
    "authorization: key=AIzaSyBt6FCHrt0HrptNtBa3Wic8Mbe8RM70Khk",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: adff424c-0e1b-b492-0e64-b8850ae04baf"
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