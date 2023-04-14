<?php

function setRobotRouter($router){

/************************************
    * 函式簡述： 機器人及問及回答
    * 路徑：/robot/ask
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    $router->map( 'POST', '/robot/question/ask', array(new cotrollerChatGPT(),'askQuestion') ,'RobotAskQuestion');

/************************************
    * 函式簡述： 機器人及問及回答
    * 路徑：/robot/ask
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    $router->map( 'POST', '/robot/question/set', array(new cotrollerChatGPT(),'setQuestion') ,'RobotSetQuestion');


    return $router;
}