<?php
//初期設定
include("system/function.php");

//チェック
if(!isset($_POST["u_id"]) || $_POST["u_id"] =='' ||
   !isset($_POST["u_pw"]) || $_POST["u_pw"] =='' 
    ){
        header("LOcation: account_make.php?alert=1");
        exit('ParamError');
    }
    
    //読み込み
    $u_name = $_POST["u_name"];
    $u_id = $_POST["u_id"];
    $u_pw = $_POST["u_pw"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $location = $_POST["location"];
    $master = $_POST["master"];
    
    //データベース接続
    $pdo = db_connect();
    
    //sql作成
    $sql ="INSERT INTO gs_librualy_controle(id, u_name, u_id, u_pw, master_frag, age, gender, location, indate)
       VALUES(null, :u_name, :u_id, :u_pw, :master, :age, :gender, :location, sysdate())";

$stmt = $pdo -> prepare($sql);
//書き換え処理
$stmt -> bindValue(':u_name', $u_name, PDO::PARAM_STR);
$stmt -> bindValue(':u_id', $u_id, PDO::PARAM_INT);
$stmt -> bindValue(':u_pw', $u_pw, PDO::PARAM_STR);
$stmt -> bindValue(':master', $master, PDO::PARAM_INT);
$stmt -> bindValue(':age', $age, PDO::PARAM_INT);
$stmt -> bindValue(':gender', $gender, PDO::PARAM_INT);
$stmt -> bindValue(':location', $location, PDO::PARAM_STR);
$status = $stmt -> execute();

//データ処理後
if($status == false){
    $error = $stmt -> errorInfo();
    exit("QueryError:".$error[2]);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<div>
        <h1 style="background-color:green; color:white;">花台図書館</h1>
        <p>以下の通りにアカウントを作りました。変更する際はユーザーページから行ってください。</p>
            <div>
                <div>【ユーザー名】　<?=$u_name ?></div>
            <div>【ＩＤ】　<?=$u_id ?></div>
            
            <?php if(!isset($age) || $age == ""): ?>
                <div>【年齢】　不明</div>
            <?php else: ?>
                <div>【年齢】　<?=$age ?></div>
            <?php endif ?>
            
            <?php if(!isset($gender) || $gender == ""): ?>
                <div>【性別】　不明</div>
            <?php elseif($gender == 1): ?>
                <div>【性別】　男性</div>
            <?php elseif($gender == 2): ?>
                <div>【性別】　女性</div>
            <?php endif ?>

            <?php if(!isset($location) || $location == ""): ?>
                <div>【住所】　不明</div>
            <?php else: ?>
                <div>【住所】　<?=$location ?></div>
            <?php endif ?>
        </div>
        <div>
            <form action="system/login_act.php" method="post">
                <input type="hidden" name="u_name" value='<?=$u_name ?>'>
                <input type="hidden" name="lid" value='<?=$u_id ?>'>
                <input type="hidden" name="lpw" value='<?=$u_pw ?>'>
                <input type="hidden" name="location" value='<?=$location ?>'>
                <input type="submit" value="ログインする">
            </form>
            <input type="button" value="ログイン画面へ" onclick="jump('login.php')">
        </div>
    </div>
    
</body>
</html>