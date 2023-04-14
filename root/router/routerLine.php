<?php

function setLineAccountRouter($router){

/************************************
    * 函式簡述： line 登入
    * 路徑：/line/login
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/line/login', array(new cotrollerLineAccount(),'login') ,'LineLogin');
/************************************
    * 函式簡述： Line 登出
    * 路徑：/line/logout
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/line/logout', array(new cotrollerLineAccount(),'logout') ,'LineLogOut');

/************************************
    * 函式簡述： 取得 line 帳號資料
    * 路徑：/line/data
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/line/data', array(new cotrollerLineAccount(),'getAccountData') ,'getAccountData');

    return $router;
}