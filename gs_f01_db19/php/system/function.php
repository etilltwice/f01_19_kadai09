<?php
//データベース接続関数
function db_connect(){
    try{
        $pdo = new PDO("mysql:dbname=gs_f01_db19; charset=utf8; host=localhost", "root", "");
    }catch(PDOException $e){
        exit("【Caution!】データベースへの接続に問題があります" .$e -> getMessage());
    }
    return $pdo;
}

//ログイン認証
function loginCheck(){
    if(!isset($_SESSION["ssid"]) || $_SESSION["ssid"] != session_id()){
        echo("LOGIN ERROR");
        exit();
    }else{
        session_regenerate_id();
        $_SESSION["ssid"] = session_id();
    }
}


?>