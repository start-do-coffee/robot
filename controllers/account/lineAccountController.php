<?php

class LineAccountCotroller {
    
    
/************************************
    * 函式簡述： 登入
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function login(){

        $lineAccountModel = new lineAccountModel();
        $lineAccountModel -> login();

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