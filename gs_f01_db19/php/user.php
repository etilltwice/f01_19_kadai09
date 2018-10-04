<?php 
//初期設定
session_start();
include("system/function.php");
loginCheck();
$u_id = $_SESSION["id"];


//データベース接続
$pdo = db_connect();

//登録SQL作成
$sql ="SELECT * 
       FROM gs_librualy_controle
       WHERE id=:u_id";

//データ読み込み
$stmt = $pdo -> prepare($sql);
$stmt->bindValue(":u_id", $_SESSION["id"], PDO::PARAM_INT);
$status = $stmt -> execute();

if($status == false){
    $error = $stmt -> errorInfo();
    exit("SQL構文が間違っています:".$error[2]);
}
$val = $stmt ->fetch();


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>librualy</title>
</head>
<body>
    <div>
        <h1 style="background-color:green; color:white;">花台図書館</h1>
        <div>
            <input type="button" value="戻る" onclick="jump('look.php')">
            <input type="button" value="ユーザー情報の変更" onclick="jump('u_change.php')">
        </div>
        <div>
            <div>【ユーザー名】　<?=$val['u_name'] ?></div>
            <div>【ＩＤ】　<?=$val["u_id"] ?></div>

            <?php if(!isset($val['age']) || $val['age'] == ""): ?>
                <div>【年齢】　不明</div>
            <?php else: ?>
                <div>【年齢】　<?=$val['age'] ?></div>
            <?php endif ?>
            
            <?php if(!isset($val['gender']) || $val['gender'] == ""): ?>
                <div>【性別】　不明</div>
            <?php elseif($val['gender'] == 1): ?>
                <div>【性別】　男性</div>
            <?php elseif($val['gender'] == 2): ?>
                <div>【性別】　女性</div>
            <?php endif ?>

            <?php if(!isset($val['location']) || $val['location'] == ""): ?>
                <div>【住所】　不明</div>
            <?php else: ?>
                <div>【住所】　<?=$val['location'] ?></div>
            <?php endif ?>
        </div>
    </div>


    <script>
        function jump(link){
            location.replace(link);
        }

    
    </script>
</body>
</html>