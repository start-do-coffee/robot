<?php

class ModelRouterError {
    
    
/************************************
    * 函式簡述： 登入
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function callback(){
        echo "Invalid signature. Please check your channel access token/channel secret.";
    }

}