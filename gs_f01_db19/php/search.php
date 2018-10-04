<?php
//初期設定
session_start();
include("system/function.php");
loginCheck();


//読み込み設定
if(isset($_POST["word"])){
    $word = $_POST["word"];
    $target = $_POST["target"];

    

//データベース接続
$pdo = db_connect();

//登録SQL作成
$sql ="SELECT * 
       FROM gs_bm_table
       WHERE user_id=:id
       AND name LIKE :word";

//データ読み込み
$wordA = "%".$word."%";
$stmt = $pdo -> prepare($sql);
$stmt->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
$stmt->bindValue(":word", $wordA, PDO::PARAM_STR);
$status = $stmt -> execute();

if($status == false){
    $error = $stmt -> errorInfo();
    exit("SQL構文が間違っています:".$error[2]);
}
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
    </div>
    <div>
        <button onclick="jump('look.php')">一覧</button>
        <button onclick="jump('ranking.php')">ランキング</button>
    </div>
    <div>
        <form action="search.php" method=post>
            <div>検索ワード:
            <!-- 対象設定 -->
            <?php if($_SESSION["master"] ==1):?>
            <select name="target">
                <option value="user">ユーザー</option>
                <option value="book">ブックマーク</option>                
            </select>
            <?php else: ?>
                <input type="hidden" name="target" value="book">
            <?php endif ?>

            <!-- 検索窓 -->
            <input type="text" name="word"
            <?php if(isset($_POST["word"])): ?>
            value=<?=$word ?>
            <?php endif ?>
            ><input type="submit" value="検索"></div>
        </form>
    </div>
    <div>
        <table style="boder:solid;">
                <?php if(isset($_POST["word"])): ?>
                <h2>検索結果</h2>
        <?php  while($result = $stmt -> fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td class="id"><?=$result["id"] ?></td>
            <td class="name"><?=$result["name"] ?></td>
            <td><a href=<?=$result["URL"] ?>>urlへ</a></td>
            <td><button type="button" onclick="jump('change.php?id=<?=$result['id'] ?>')">編集</button></td>
            <td><button type="button" onclick="jump('system/delete.php?id=<?=$result['id'] ?>&target=book&come=../look.php&go=../look.php')">消去</button>
        </tr>
        <?php endwhile ?>
        <?php endif ?>
        </table>
    </div>

    <script>
        function jump(link){
            location.replace(link);
        }


    
    </script>
</body>
</html>