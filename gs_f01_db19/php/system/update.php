<?php
//初期設定
include("function.php");

//条件読み込み
$target = $_POST["target"];
$come = $_POST["come"];
$go = $_POST["go"];

if($target == 'user'){
    if(!isset($_POST["u_name"]) || $_POST["u_name"] == "" ||
    !isset($_POST["u_id"]) || $_POST["u_id"] == "" ||
    !isset($_POST["u_pw"]) || $_POST["u_pw"] == ""        
    ){
        header('Location: '.$come."?alert=1");
        exit();
        
    }else{
        $u_name   = $_POST["u_name"];
        $u_id     = $_POST["u_id"];
        $u_pw     = $_POST["u_pw"];
        $age      = $_POST["age"];
        $gender   = $_POST["gender"];
        $location = $_POST["location"];
    }
}else if($target == 'book'){
    if(!isset($_POST["name"]) || $_POST["name"] == ""){
        header($come."?alert=1");

    }else{
        $id      = $_POST["id"];
        $url     = $_POST["url"];
        $memo    = $_POST["memo"];
        $name    = $_POST["name"];
        // $list   = $_POST["list"];
        // $type   = $_POST["type"];
    }
}

//データベース接続
$pdo = db_connect();

//SQL作成から$stmt実行前まで
if($target == 'user'){
    $sql =("UPDATE gs_librualy_controle
            SET u_name=:u_name, u_pw=:u_pw, age=:age, gender=:gender, location=:location
            WHERE u_id=:u_id");
    $stmt = $pdo -> prepare($sql);

    $stmt->bindValue(":u_name", $u_name, PDO::PARAM_STR);
    $stmt->bindValue(":u_id", $u_id, PDO::PARAM_STR);
    $stmt->bindValue(":u_pw", $u_pw, PDO::PARAM_STR);
    $stmt->bindValue(":age", $age, PDO::PARAM_INT);
    $stmt->bindValue(":gender", $gender, PDO::PARAM_INT);
    $stmt->bindValue(":location", $location, PDO::PARAM_STR);
}else if($target == 'book'){
    $sql =("UPDATE gs_bm_table
            SET url=:url, memo=:memo, name=:name
            WHERE id=:id");
    $stmt = $pdo -> prepare($sql);

    $stmt->bindValue(":url", $url, PDO::PARAM_STR);
    $stmt->bindValue(":memo", $memo, PDO::PARAM_STR);
    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
}
$status = $stmt -> execute();

//SQL実行検証
if($status == false){
    $error = $stmt->errorInfo;
    exit("SQL構文が間違っています".$error[2]);
}else{
    header("Location: ".$go);
}


?>