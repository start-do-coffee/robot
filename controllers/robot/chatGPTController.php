<?php

class chatGPTCotroller {
    
    
/************************************
    * 函式簡述： 登入
    * 輸入參數 ：Null
    * @return：JSON Array
***********************************/
    function ask(){
        $GPT = new ChatGPT();
        $answer = $GPT->ask('什麼事chatGPT');
        echo $answer;
    }
}