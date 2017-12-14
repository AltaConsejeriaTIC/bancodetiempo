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
  CURLOPT_POSTFIELDS => '{
                            "notification": {
                            "title": "Prueba de cambalachea","body": "Vamos a ver si sirve",
                            "icon": "https://scontent-mia3-2.xx.fbcdn.net/v/t1.0-1/p200x200/18199351_292705817842611_4689648123779858983_n.png?oh=62a22d446953b10a4eaa34fc618d4e04&oe=5A8F4810",
                            "click_action": "http:cambalachea.co"
                            },
                            "to" : "fQxSPqFw2YQ:APA91bG7GqmO_ZP5tg6jUhrllKFfPwLLRbFa1BcUwC8p7ojc5R3bRMC7llKTBhnq5nADzCPb9B8whX14wv0LcAbqLkAlnIvS2KHYUc-GOdopUEUpyNjXPTQ5GyyAnB6TVUsE2GcGqTlv"
                            }',
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