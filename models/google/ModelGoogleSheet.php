<?php

class ModelGoogleSheet {
    private $gogoleSheetId = '';         //表單編號
    private $googleSheetName = '';       //分頁名稱
    private $googleSheetRange = '';      //資料範圍

    private $GoogleApp;                  //google程式
    
/************************************
    * 函式簡述： 建構子 新增物件時第一執行
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function __construct( ) {

        $this->gogoleSheetId = '18e1rZdQDRB-x6-q40IE56ca1sWmfsu9fVAyyWaojNYI';
        $this->googleSheetName = "start-do-ask!";
        $this->googleSheetRange = "A1:L20";

    }
/************************************
    * 函式簡述： googleClient Init
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function InitGoogleClient(){
        $client = new \Google_Client();
        $client->setApplicationName('Google Sheets and PHP');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig('./credentials.json');

        // 建立 Google Sheets Service
        $this->GoogleApp = new \Google_Service_Sheets($client);

    }
/************************************
    * 函式簡述： 取得表單中全部資料
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function getDataArray(){
        $response = $this->GoogleApp->spreadsheets_values->get($this->gogoleSheetId, $this->googleSheetName.$this->googleSheetRange);
        $values = $response->getValues();
        print_r($values);
    }
/************************************
    * 函式簡述： 取得某一行資料
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function getData(){

    }


}




