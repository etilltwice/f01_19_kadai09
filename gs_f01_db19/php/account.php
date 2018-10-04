<?php
//初期設定
session_start();
include("system/function.php");
loginCheck();

//データベース接続
$pdo = db_connect();

//登録SQL作成
$sql ="SELECT * 
       FROM gs_librualy_controle";




//データ読み込み
$stmt = $pdo -> prepare($sql);
if($_SESSION["master"] == 0)
$stmt->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
$status = $stmt -> execute();

if($status == false){
    $error = $stmt -> errorInfo();
    exit("SQL構文が間違っています:".$error[2]);
}
//この先からhtml
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
        <button onclick="jump('system/logout.php')">ログアウト</button>
        <button onclick="jump('account_make.php')">新規登録</button>
        <button onclick="jump('search.php')">検索</button>
        <button onclick="jump('ranking.php')">ランキング</button>
        <button onclick="jump('data.php')">データグラフ</button>
    </div>
    <div>
        <h2>アカウント一覧</h2>
    </div>
    <div>
        <table border="1">
        <tr>
            <td>id</td>
            <td>ユーザーネーム</td>
            <td>ユーザーＩＤ</td>
            <td>パスワード</td>
            <td>年齢</td>
            <td>性別</td>
            <td>所在地</td>
            <td>最終利用時間</td>
            <td>登録時間</td>
        </tr>
        <?php  while($result = $stmt -> fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td class="id"><?=$result["id"] ?></td>
            <td class="u_name"><?=$result["u_name"] ?></td>
            <td class="u_id"><?=$result["u_id"] ?></td>
            <td class="u_pw"><?=$result["u_pw"] ?></td>
            <td class="age"><?=$result["age"] ?></td>
            <?php if(!isset($result['gender']) || $result['gender'] == ""): ?>
                <td>不明</td>
            <?php elseif($result['gender'] == 1): ?>
                <td>男性</td>
            <?php elseif($result['gender'] == 2): ?>
                <td>女性</td>
            <?php endif ?>
            <td class="location"><?=$result["location"] ?></td>
            <td class="useddate"><?=$result["useddate"] ?></td>
            <td class="indate"><?=$result["indate"] ?></td>
                <td><button type="button" onclick="jump('change.php?id=<?=$result['id'] ?>')">編集</button></td>
                <td><button type="button" onclick="jump('system/delete.php?id=<?=$result['id'] ?>&target=book&come=../look.php&go=../look.php')">消去</button>
        </tr>
        <?php endwhile ?>
        </table>
    </div>

    <script>
        function jump(link){
            location.replace(link);
        }


    
    </script>
</body>
</html>