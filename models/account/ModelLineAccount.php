<?php

class ModelLineAccount {
    
    
/************************************
    * 函式簡述： 登入
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function login(){
        echo "Model Line Login";
        // 建立 Google Client
$client = new \Google_Client();
$client->setApplicationName('Google Sheets and PHP');
// 設定權限
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
// 引入金鑰
$client->setAuthConfig(__DIR__ . '/credentials.json');

// 建立 Google Sheets Service
$service = new \Google_Service_Sheets($client);

// Google Sheet ID
$spreadsheetId = '18e1rZdQDRB-x6-q40IE56ca1sWmfsu9fVAyyWaojNYI';
// 取得 Sheet 範圍
$getRange = "start-do-ask!A1:L20";

// 讀取資料
$response = $service->spreadsheets_values->get($spreadsheetId, $getRange);
$values = $response->getValues();

$searchValue = '2023-04-16'; // 要搜尋的值

$found = false; // 設定一個旗標來表示是否有找到對應的值

// 迴圈搜尋
foreach ($values as $row) {
    if (isset($row[0]) && count($row) >= 2 && $row[0] == $searchValue) {
        echo "<br><br><br><br>問句是: ";
        echo "$searchValue";
        echo "<br><br><br><br>回答是: ";
        echo $row[1]; // 輸出對應的第二欄資料
        $found = true;

        break;
    }

}

if (!$found) {
    echo "找不到對應的資料";
}
if (empty($values)) {
    print "No data found.\n";
} else {
    foreach ($values as $row) {
        $date = isset($row[0]) ? $row[0] : '';
        $question = isset($row[1]) ? $row[1] : '';
        $answer = isset($row[2]) ? $row[2] : '';

        printf("日期：%s，問題：%s，答案：%s<br>", $date, $question, $answer);
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