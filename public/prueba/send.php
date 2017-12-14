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
  CURLOPT_POSTFIELDS => "{\r\n   \"notification\": {\r\n     \"title\": \"Portugal vs. Denmark\",\r\n     \"body\": \"5 to 1\",\r\n     \"icon\": \"firebase-logo.png\",\r\n     \"click_action\": \"http://localhost:8081\"\r\n   },\r\n   \"to\": \"fQxSPqFw2YQ:APA91bG7GqmO_ZP5tg6jUhrllKFfPwLLRbFa1BcUwC8p7ojc5R3bRMC7llKTBhnq5nADzCPb9B8whX14wv0LcAbqLkAlnIvS2KHYUc-GOdopUEUpyNjXPTQ5GyyAnB6TVUsE2GcGqTlv\"\r\n }",
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