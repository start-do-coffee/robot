<?php
use LINE\LINEBot;
    use LINE\LINEBot\HTTPClient\CurlHTTPClient;
    use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
    use LINE\LINEBot\Event\MessageEvent\TextMessage;
$file = fopen("output.txt", "w");
  echo "123";

  
    // YOUR_CHANNEL_ACCESS_TOKEN 和 YOUR_CHANNEL_SECRET 要替換成自己的值
    $channel_access_token = 't5wxDlmFJMgTf37rcx2NWxUF9KUA4+7UZNwKHn54Ujsk8EhmG9tRBKenhbgiFui3OCLLWuODpsrQ5K0770Gohv8hSkhElmN03v1RvBv80DZyqnezAMQ2QEn6yun8F4uuxKcRvufPaBJp0oilNPaLewdB04t89/1O/w1cDnyilFU=';
    $channel_secret = 'c1660ccd6e52308d78d23a044f29ee38';

    // 取得 line bot 傳來的訊息
    $entityBody = file_get_contents('php://input');
    $events = json_decode($entityBody, true);

    // 檢查訊息是否為文字訊息
  if (isset($events['events']) && is_array($events['events'])) {
    foreach ($events['events'] as $event) {
    if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
        $userMessage = $event['message']['text']; // 取得用戶輸入的訊息
        $txt = $userMessage;
        fwrite($file, $txt);
        fclose($file);
        // 寫入收到的訊息到檔案中
        $file = 'message_log.txt';
        $current = file_get_contents($file);
        $current .= "User: " . $userMessage . "\n";
        file_put_contents($file, $current);

        
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'https://co-development.jack-100929.repl.co/robot/question/ask/'.$userMessage);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $data = curl_exec($ch);
         //echo $data;
         $userMessageReturn = $data;
        

      
        $replyMessage = $userMessageReturn; // 要回覆的訊息
            error_log(json_encode($response));
            // 回覆訊息給用戶
            $response = [
                'replyToken' => $event['replyToken'],
                'messages' => [
                    [
                        'type' => 'text',
                        'text' => $replyMessage
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

   