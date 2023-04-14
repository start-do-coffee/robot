<?php

    require 'router/routerLine.php';
    require 'router/routeRobot.php';


    $router = new AltoRouter();

    // Line帳號相關router
    setLineAccountRouter($router);

    //設定機器人相關router
    setRobotRouter($router);

    $match = $router->match();


    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 找不到網頁');
    }
