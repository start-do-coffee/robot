<?php


    $router = new AltoRouter();

/************************************
    * 函式簡述： 取得App初始資料
    * 路徑：/init
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/init', array(new initAppCotroller(),'getInit') ,'getInit');

/************************************
    * 函式簡述： 取得頻道清單
    * 路徑：/channel/list
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/channel/list', array(new channelCotroller(),'GetChannelList') ,'GetChannelList');

/************************************
    * 函式簡述： 取得頻道的所有資訊
    * 路徑：/channel/{ ch_id }
    * Method：GET
    * 輸入參數 ：
        ch_id //頻道號碼
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/channel/[i:ch_id]', array(new channelCotroller(),'GetChannel') ,'GetChannel');

/************************************
    * 函式簡述： 頻道內所有影片
    * 路徑：/channel/video/{ ch_id }
    * Method：POST
    * 輸入參數 ：
        ch_id //頻道號碼
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/channel/video/[i:ch_id]', array(new channelCotroller(),'GetVideoOfChannel') ,'GetVideoOfChannel');

/************************************
    * 函式簡述： 新增頻道
    * 路徑：/channel/create
    * Method：POST
    * 輸入參數 ：
        ch_id //頻道號碼
    * @return：JSON Array
***********************************/
    $router->map( 'POST', '/channel/create', array(new channelCotroller(),'CreateChannel') ,'CreateChannel');

/************************************
    * 函式簡述： 更新頻道資訊
    * 路徑：/channel/update
    * Method：POST
    * 輸入參數 ：
        ch_id //頻道號碼
        ch_name //頻道名稱
        ch_index //頻道順序
        ch_enable //頻道開關
    * @return：JSON Array
***********************************/
    $router->map( 'POST', '/channel/update', array(new channelCotroller(),'UpdateChannel') ,'UpdateChannel');

/************************************
    * 函式簡述： 刪除頻道
    * 路徑：/channel/delete
    * Method：POST
    * 輸入參數 ：
        ch_id //頻道號碼
    * @return：JSON Array
***********************************/
    $router->map( 'POST', '/channel/delete', array(new channelCotroller(),'DeleteChannel') ,'DeleteChannel');

/************************************
    * 函式簡述： 更新影片資訊
    * 路徑：/video/update
    * Method：POST
    * 輸入參數 ：
        jsonArray=[
            vd_id => 節目編號
            sequence => 影片順序
            name => 影片名稱
            duration => 影片時間長度
            yt_link => Youtube 連結
            vi_link => Vimeo 連結
            start_time => 開始時間
            playtype => 影片播放模式
            vd_enable => 影片開關
        ]
    * @return：JSON Array
***********************************/
    $router->map( 'POST', '/video/update', array(new videoCotroller(),'UpdateVideoInfo') ,'UpdateVideo');

/************************************
    * 函式簡述： 更新影片資訊
    * 路徑：/video/delete
    * Method：POST
    * 輸入參數 ：
        jsonArray=[
            vd_id => 節目編號
        ]
    * @return：JSON Array
***********************************/
    $router->map( 'POST', '/video/delete', array(new videoCotroller(),'DeleteVideo') ,'DeleteVideo');

/************************************
    * 函式簡述： 新增節目
    * 路徑：/video/create
    * Method：POST
    * 輸入參數 ：
        jsonArray=[
            channel_id          int NOT NULL ,
            video_index	        int  NOT NULL DEFAULT '99999' ,
            video_name	        nvarchar(50)  NOT NULL DEFAULT '尚未輸入影片',
            video_live          bit NOT NULL,
            video_duration      time NoT NULL DEFAULT '00:00:00',
            video_yt            char(12) NOT NuLl DEFAULT '',
            video_date          date NoT NULL DEFAULT '2022-01-01'
        ]
    * @return：JSON Array
***********************************/
    $router->map( 'POST', '/video/create', array(new videoCotroller(),'CreateVideo') ,'createVideo');

/************************************
    * 函式簡述： 取得節目置入商品
    * 路徑：/video/product/{{ vd_id }}
    * Method：GET
    * 輸入參數 ：
        vd_id
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/video/product/[i:vd_id]', array(new productOfVideoCotroller(),'getProductlListOfVideo') ,'getProductlListOfVideo');

/************************************
    * 函式簡述： 更新節目置入商品時間
    * 路徑：/video/product/update
    * Method：POST
    * 輸入參數 ：
        jsonArray=[
            product_controller_id = 廣告控制 資料編號
            start_time => 開始時間
            end_time => 結束時間
        ]
    * @return：JSON Array
***********************************/
    $router->map( 'POST', '/video/product/update', array(new productOfVideoCotroller(),'updateProductlListOfVideo') ,'updateProductlListOfVideo');

/************************************
    * 函式簡述： 取得商品清單
    * 路徑：/product/all
    * Method：GET
    * 輸入參數 ：
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/product/all', array(new productCotroller(),'getAllProducts') ,'getAllProducts');

/************************************
    * 函式簡述： 重置切換頻道時顯示的按鈕
    * 路徑：/init/button/all
    * Method：GET
    * 輸入參數 ：
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/init/button/all', array(new initButtonCotroller(),'initButtonAll') ,'initButtonAll');

/************************************
    * 函式簡述： 重置切換頻道時顯示的按鈕_V2
    * 路徑：/init/button/all
    * Method：GET
    * 輸入參數 ：
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/init/button/all/v2', array(new initButtonCotroller(),'initButtonAllV2') ,'initButtonAllV2');

/************************************
    * 函式簡述： 重置切換頻道時顯示的圖片
    * 路徑：/init/button/all
    * Method：GET
    * 輸入參數 ：
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/init/image/all', array(new initChannelCotroller(),'initChannelImage') ,'initChannelImage');


/************************************
    * 函式簡述： 重置切換頻道時顯示的圖片
    * 路徑：/init/button/all
    * Method：GET
    * 輸入參數 ：
    * @return：JSON Array
***********************************/
    $router->map( 'GET', '/php/info', array(function(){echo phpinfo();},'phpInfo') ,'phpInfo');



    $match = $router->match();


    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 找不到網頁');
    }
