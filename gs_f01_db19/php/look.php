<?php
//初期設定
session_start();
include("system/function.php");
loginCheck();

//データベース接続
$pdo = db_connect();

//登録SQL作成
if($_SESSION["master"] == 0){
$sql ="SELECT * 
       FROM gs_bm_table
       WHERE user_id=:id";
}else if($_SESSION["master"] == 1){
$sql ="SELECT * 
       FROM gs_bm_table";
}




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
        <button onclick="jump('bookinsert.php')">新規登録</button>
        <?php if($_SESSION["master"] == 1): ?>
        <button onclick="jump('account.php')">アカウント管理</button>
        <?php endif ?>
        <button onclick="jump('search.php')">検索</button>
        <button onclick="jump('ranking.php')">ランキング</button>
        <?php if($_SESSION["master"] == 1): ?>
        <button onclick="jump('data.php')">データグラフ</button>
        <?php endif ?>
    </div>
    <div>
        <h2>あなたがブックマークした本の一覧</h2>
    </div>
    <div>
        <table border="1">
        <?php  while($result = $stmt -> fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td class="id"><?=$result["id"] ?></td>
            <td class="name"><?=$result["name"] ?></td>
            <td><a href=<?=$result["URL"] ?>>urlへ</a></td>
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