<?php

    require 'router/routerLine.php';
    require 'router/routerRobot.php';


    $router = new AltoRouter();

    // Line帳號相關router
    setLineAccountRouter($router);

    //設定機器人相關router
    setRobotRouter($router);


    $router->map( 'GET', '/callback', array(new ModelRouterError(),'callback') ,'callback');

    $router->map( 'GET', '/', array(new cotrollerRobot(),'index') ,'home');

    $router->map( 'GET', '/index', array(new cotrollerRobot(),'index') ,'index');

    $match = $router->match();

    

    if( is_array($match) && is_callable( $match['target'] ) ) {
        //如果有配對到網址
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        //如果沒有配對到網址
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 找不到網頁');
    }
