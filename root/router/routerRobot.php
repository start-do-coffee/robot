<?php

function setRobotRouter($router){

/************************************
    * 函式簡述： 機器人及問及回答
    * 路徑：/robot/question/ask/[*:keyWord]
    * Method：GET
    * 輸入參數 ：keyWord => 需查詢的問句或是關鍵字
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/robot/question/ask/[*:keyWord]', array(new cotrollerChatGPT(),'askQuestion') ,'RobotAskQuestion');

/************************************
    * 函式簡述： 機器人及問及回答
    * 路徑：/robot/ask
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/robot/question/set', array(new cotrollerChatGPT(),'setQuestion') ,'RobotSetQuestion');


    return $router;
}