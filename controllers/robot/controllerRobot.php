<?php
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\Event\MessageEvent\TextMessage;


class cotrollerRobot {
    
    
/************************************
    * 函式簡述： 提問
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function index(){

        $channel_access_token = 'cXZ+5BY0P3qtfCgbkPsXjZvAH7JBosIicj8Tkds+itvSvFE/Wp6K0S1efbj/arUSi6+O5zPNmRKIs4ngQNBYg3O7GRxS4RgYjKD17gQ2Y3ejZGabySL5xIfN7DBtM0XEse2ExoQ6rbRnE0z8RQL8GQdB04t89/1O/w1cDnyilFU=';
        $channel_secret = 'c1660ccd6e52308d78d23a044f29ee38';

        $entityBody = file_get_contents('php://input');
        $events = json_decode($entityBody, true);

          // 檢查訊息是否為文字訊息
        if (isset($events['events']) && is_array($events['events'])) {
            foreach ($events['events'] as $event) {
                if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
                    $userMessage = $event['message']['text']; // 取得用戶輸入的訊息
                    
                    // 回覆訊息給用戶
                    $response = [
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => $userMessage
                            ]
                        ]
                    ];
                        
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/v2/bot/message/reply');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $channel_access_token
                    ]);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    $result = curl_exec($ch);
                    curl_close($ch);
                    error_log($result);
                }
            }
        }

    }
  
}