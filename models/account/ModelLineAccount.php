<?php


class ModelLineAccount {
    use LINE\LINEBot;
    use LINE\LINEBot\HTTPClient\CurlHTTPClient;
    use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
    use LINE\LINEBot\Event\MessageEvent\TextMessage;
/************************************
    * 函式簡述： 登入
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function login(){

        // 透過composer 安裝 line bot SDK    
        //composer require linecorp/line-bot-sdk

        // YOUR_CHANNEL_ACCESS_TOKEN 和 YOUR_CHANNEL_SECRET 要替換成自己的值
        $channel_access_token = 't5wxDlmFJMgTf37rcx2NWxUF9KUA4+7UZNwKHn54Ujsk8EhmG9tRBKenhbgiFui3OCLLWuODpsrQ5K0770Gohv8hSkhElmN03v1RvBv80DZyqnezAMQ2QEn6yun8F4uuxKcRvufPaBJp0oilNPaLewdB04t89/1O/w1cDnyilFU=';
        $channel_secret = 'c1660ccd6e52308d78d23a044f29ee38';

        
        // 建立 LINE Bot
        $http_client = new CurlHTTPClient($channel_access_token);
        $bot = new LINEBot($http_client, ['channelSecret' => $channel_secret]);

        // 取得 LINE 的請求內容
        $content = file_get_contents('php://input');
        $events = json_decode($content, true);

        // 當收到文字訊息時
        if (!empty($events['events'][0]['message']['text'])) {
            $text = $events['events'][0]['message']['text'];

            // 回覆相同的訊息
            $text_message = new TextMessageBuilder($text);
            $event = new TextMessage(['text' => $text]);

            $response = $bot->replyMessage($event->getReplyToken(), $text_message);
            if (!$response->isSucceeded()) {
                error_log('Failed to send reply: ' . $response->getHTTPStatus() . ' ' . $response->getRawBody());
            }
        }


        
    }
/************************************
    * 函式簡述： 登出
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function logout(){
        echo "Line Logout";
    }   
/************************************
    * 函式簡述： 取得帳號資訊
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function getAccountData(){
        echo "Line 取得帳號資訊";
    }   

}