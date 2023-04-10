<?php


    $router = new AltoRouter();

/************************************
    * 函式簡述： 取得App初始資料
    * 路徑：/init
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/login/line', array(new LineAccountCotroller(),'login') ,'LineLogin');




    $match = $router->match();


    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 找不到網頁');
    }
