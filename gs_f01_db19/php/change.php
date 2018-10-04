<?php
//変数受け取り
$id = $_GET["id"];

//初期設定
session_start();
include("system/function.php");
loginCheck();

//データベース接続
$pdo = db_connect();

//登録SQL作成
$sql ="SELECT *
       FROM gs_bm_table
       WHERE id=:id";

//データ読み込み
$stmt = $pdo -> prepare($sql);
$stmt ->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt -> execute();

if($status == false){
    $error = $stmt -> errorInfo();
    exit("SQL構文が間違っています:".$error[2]);
}
$val = $stmt ->fetch();

//この先からhtml
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編集中...</title>
</head>
<body>
    <h1 style="background-color:green; color:white;">花台図書館</h1>
    <div>
        <input type="button" value="戻る" onclick="jump('look.php')">
        <h2>項目編集</h1>
    </div>
    <div>
        <form action="system/update.php" method="post">
        <p>名前：<input type="text" name="name" value="<?=$val["name"] ?>"></p>
        <p>URL：<input type="text" name="url" value="<?=$val["URL"] ?>"></p>
        <p>メモ：<textarea name="memo" cols="30" rows="10"><?=$val["memo"] ?></textarea></p>
        <input type="submit">
        <!--   隠し変数 -->
        <input type="hidden" name="id" value="<?=$id ?>">
        <input type="hidden" name="come" value="../change.php">
        <input type="hidden" name="go" value="../look.php">
        <input type="hidden" name="target" value="book">
        </form>
    </div>

    
    <script>
        function jump(link){
            location.replace(link);
        }


    
    </script>
</body>
</html>