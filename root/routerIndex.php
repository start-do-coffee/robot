<?php

    require 'router/routerLIne.php';


    $router = new AltoRouter();

    // Line帳號相關
    setLineAccountRouter($router);

    $match = $router->match();


    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 找不到網頁');
    }
