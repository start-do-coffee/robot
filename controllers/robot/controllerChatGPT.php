<?php

class cotrollerChatGPT {
    
    
/************************************
    * 函式簡述： 提問
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function askQuestion(){
        $GoogleSheet = new ModelGoogleSheet();
        $GoogleSheet->InitGoogleClient();
        $GoogleSheet->getDataArray();
    }

/************************************
    * 函式簡述： 設定問題
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function setQuestion(){
        echo 'Line@ 機器人問聚集答案設定';
    }
    
}