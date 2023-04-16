<?php

class ModelLineAccount {
    
    
/************************************
    * 函式簡述： 登入
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function login(){
        echo "Model Line Login";
        require_once 'vendor/autoload.php';
        $client = new Google\Client();
        $client->setClientId('YOUR_CLIENT_ID');
        $client->setClientSecret('YOUR_CLIENT_SECRET');
        $client->setRedirectUri('YOUR_REDIRECT_URI');
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');
        $client->setAccessToken('YOUR_ACCESS_TOKEN');
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