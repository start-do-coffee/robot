function setLineAccountRouter($router){

/************************************
    * 函式簡述： 取得App初始資料
    * 路徑：/init
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
$router->map( 'GET', '/line/login', array(new cotrollerLineAccount(),'login') ,'LineLogin');
/************************************
    * 函式簡述： 取得App初始資料
    * 路徑：/init
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
$router->map( 'GET', '/line/logout', array(new cotrollerLineAccount(),'logout') ,'LineLogOut');

/************************************
    * 函式簡述： 取得App初始資料
    * 路徑：/init
    * Method：GET
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
$router->map( 'GET', '/line/data', array(new cotrollerLineAccount(),'getAccountData') ,'getAccountData');

return $router;
}