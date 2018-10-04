<?php
session_start();

//sessionを初期化
$_SESSION = array();

//Cookieに保存してあるIDの保存期間を過去にして破棄
if(isset($_COOKIE[[session_name()]])){
    setcookie(session_name(), '', time()-42000, '/');
}

//サーバ側でのセッションIDを破棄
session_destroy();

//処理後、ログイン画面へ
header("Location: ../login.php");
exit();

?>