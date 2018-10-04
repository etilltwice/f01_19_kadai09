<?php
//初期設定
session_start();
include("function.php");

if(!isset($_POST["lid"]) || !isset($_POST["lpw"])){
    header("Location: ../login.php?alert=1");
    exit();
}else if( $_POST["lid"] == "" || $_POST["lpw"] == ""){
    header("Location: ../login.php?alert=2");
    exit();
}
//数値の読み取り
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//データベース接続
$pdo = db_connect();

//SQLの指定
$sql = "SELECT * 
        FROM gs_librualy_controle
        WHERE u_id=:lid
        AND u_pw=:lpw";

//SQLの実行
$stmt = $pdo -> prepare($sql);
$stmt -> bindValue(":lid", $lid, PDO::PARAM_STR);
$stmt -> bindValue(":lpw", $lpw, PDO::PARAM_STR);
$status = $stmt -> execute();

//SQL実行検証
if($status == false){
    $error = $stmt -> erroInfo;
    exit("SQL関連が間違っています".$error);
}

//データ取得
$val = $stmt -> fetch();

//取得データ参照
if($val["id"] != ""){
    //セッション関数の設定
    $_SESSION["ssid"] = session_id();
    $_SESSION["u_name"] = $val["u_name"];
    $_SESSION["id"] = $val["id"];
    $_SESSION["master"] = $val["master_frag"];
    
    //利用時間の変更
    //SQLの指定
    $sql = "UPDATE gs_librualy_controle
            SET useddate=sysdate()
            WHERE id=:id";

    //SQLの実行
    $stmt = $pdo -> prepare($sql);
    $stmt -> bindValue(":id", $val["id"], PDO::PARAM_INT);
    $status = $stmt -> execute();
    
    //SQL実行検証
    if($status == false){
        $error = $stmt -> erroInfo;
        exit("更新関連が間違っています".$error);
    }

    //ページ変更
    header("Location: ../look.php?login=1");
    
}else{
    //認証失敗
    header("LOcation: ../login.php?alert=3");
}

?>