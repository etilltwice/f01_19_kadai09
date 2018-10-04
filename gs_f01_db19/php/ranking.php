<?php
//初期設定
session_start();
include("system/function.php");
loginCheck();

//データベース接続
$pdo = db_connect();

//登録SQL作成
$sql ="SELECT name, COUNT(DISTINCT(user_id)) 
       FROM gs_bm_table
       GROUP BY name
       ORDER BY COUNT(DISTINCT(user_id)) DESC
       LIMIT 5";

//データ読み込み
$stmt = $pdo -> prepare($sql);
$stmt->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
$status = $stmt -> execute();

if($status == false){
    $error = $stmt -> errorInfo();
    exit("SQL構文が間違っています:".$error[2]);
}
//この先からhtml
$count=1;
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1 style="background-color:green; color:white;">花台図書館</h1>
        <a href="user.php"><?=$_SESSION["u_name"] ?></a>
    </div>
    <div>
        <button onclick="jump('look.php')">一覧</button>
        <button onclick="jump('search.php')">検索</button>
    </div>
    <div>
        <h2>皆がブックマークした本のランキング</h2>
    </div>
    <div>
        <table style="boder:solid;">
        <?php  while($result = $stmt -> fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td>第<?=$count ?>位</td>
            <td class="name"><?=$result["name"] ?></td>
            <td><?=$result["COUNT(DISTINCT(user_id))"] ?>人</td>
        </tr>
        <?php $count++; endwhile; ?>
        </table>
    </div>

    <script>
        function jump(link){
            location.replace(link);
        }


    
    </script>
</body>
</html>