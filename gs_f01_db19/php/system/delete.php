<?php
//初期設定
include("function.php");

//条件読み込み
$target = $_GET["target"];
$come = $_GET["come"];
$go = $_GET["go"];

if($target == 'user'){
        $u_id = $_GET["u_id"];
}else if($target == 'book'){
        $id = $_GET["id"];
}
//データベース接続
$pdo = db_connect();

//SQL作成から$stmt実行前まで
if($target == 'user'){
    $sql =("DELETE
            FROM gs_librualy_controle
            WHERE u_id=:u_id");
    $stmt = $pdo -> prepare($sql);
    
    $stmt->bindValue(":u_id", $u_id, PDO::PARAM_STR);
}else if($target == 'book'){
    $sql =("DELETE
            FROM gs_bm_table
            WHERE id=:id");
    $stmt = $pdo -> prepare($sql);

    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
}
$status = $stmt -> execute();

//SQL実行検証
if($status == false){
    $error = $stmt->errorInfo;
    exit("DELETEのSQL構文が間違っています".$error[2]);
}



//ID調整
//SQL作成から$stmt実行前まで
if($target == 'user'){
    $sql =("SELECT *
            FROM gs_librualy_controle
            WHERE u_id>:u_id");
    $stmt = $pdo -> prepare($sql);

    $stmt->bindValue(":u_id", $u_id, PDO::PARAM_STR);
}else if($target == 'book'){
    $sql =("SELECT *
            FROM gs_bm_table
            WHERE id>:id");
    $stmt = $pdo -> prepare($sql);
    
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
}
$status = $stmt -> execute();

if($status == false){
    $error = $stmt->errorInfo;
    exit("SELECTのSQL構文が間違っています".$error[2]);
}

while($val = $stmt -> fetch(PDO::FETCH_ASSOC)){
    
    $hold = $val["id"];
    $hold--;
    if($target =="user"){    
        $sql =("UPDATE gs_librualy_controle
            SET id=:newid
            WHERE id=:oldid");
    }else if($target =="book"){
        $sql =("UPDATE gs_bm_table
            SET id=:newid
            WHERE id=:oldid");
    }
    $stmt2 = $pdo -> prepare($sql);
    $stmt2->bindValue(":oldid", $val["id"], PDO::PARAM_INT);
    $stmt2->bindValue(":newid", $hold, PDO::PARAM_INT);
    $status = $stmt2 -> execute();

    if($status == false){
        $error = $stmt2->errorInfo;
        exit("UPDATEのSQL構文が間違っています".$error[2]);
    }
    
    if($status == false){
        $error = $stmt2->errorInfo;
        exit("SELECTのSQL構文が間違っています".$error[2]);
    }
}

header("Location: ".$go);


?>