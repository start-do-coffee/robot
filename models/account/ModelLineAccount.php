<?php

class ModelLineAccount {
    
    
/************************************
    * 函式簡述： 登入
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function login(){
        echo "Model Line Login";
        $KEY = "";
        $SheetIndex = 1;
        $json_url = "https://spreadsheets.google.com/feeds/list/".$KEY."/".$SheetIndex."/public/values?alt=json";
        $string = file_get_contents($json_url);
        $data_json = json_decode($string,true);
        print_r($data_json);
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