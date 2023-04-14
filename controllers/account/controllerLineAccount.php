<?php

class cotrollerLineAccount {
    
    
/************************************
    * 函式簡述： 登入
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function login(){

        //加入line sdk(api)
        //用sdk 做登入,取得line token
        //跟伺服器確認有無登入過
        $ModelLineAccount = new ModelLineAccount();
        $ModelLineAccount -> login();
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