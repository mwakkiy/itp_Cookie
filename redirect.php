<?php

    $filename = './r_log.txt';
    $time = date("Y/m/d H:i");
    $ip = getenv("REMOTE_ADDR");


    //cookie処理
    // if(isset($_COOKIE["visited"])){
    //     $count = $_COOKIE["visited"] + 1;
    // } else {
    //     $count = 0;
    // }
    // $cookieFlag = setcookie("visited", $count);

    $newFlag = 0;

    if(isset($_COOKIE["userid"])){
        $userid = $_COOKIE["userid"];
    } else {
        $userid = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 6);
        $cookieFlag = setcookie("userid", $userid, time()+60*60*24*365);
        $newFlag = 1;
    }
    

    //log
    $log = $time ."\t". $ip ."\t". $userid ."\t". $newFlag;

    //書き込み
    $fp = fopen($filename, "a");
    fputs($fp, $log."\n");
    fclose($fp);
    
    header('Location: http://www.yahoo.co.jp')

?>