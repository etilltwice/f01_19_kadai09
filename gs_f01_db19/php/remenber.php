<?php
//データベース接続
include("system/function.php");
$pdo = db_connect();

//登録SQL作成
if(isset($_POST['lid']) && $_POST['lid'] != ""){

    $sql ="SELECT * 
       FROM gs_librualy_controle
       WHERE u_id=:id";

//データ読み込み
$stmt = $pdo -> prepare($sql);
$stmt->bindValue(":id", $_POST["lid"], PDO::PARAM_INT);
$status = $stmt -> execute();

//検証
if($status == false){
    $error = $stmt -> errorInfo();
    exit("SQL構文が間違っています:".$error[2]);
}
//値取得
$val = $stmt ->fetch();

//変数設定
$lid = $_POST["lid"];
$lpw = $val["u_pw"];
$lpn = $val["u_name"];

}else if(isset($_POST['lpw']) && $_POST['lpw'] != ""){
    $sql ="SELECT * 
       FROM gs_librualy_controle
       WHERE u_pw=:lpw";

//データ読み込み
$stmt = $pdo -> prepare($sql);
$stmt->bindValue(":lpw", $_POST["lpw"], PDO::PARAM_INT);
$status = $stmt -> execute();

//検証
if($status == false){
    $error = $stmt -> errorInfo();
    exit("SQL構文が間違っています:".$error[2]);
}
//値取得
$val = $stmt ->fetch();

//変数設定
$lid = $val["u_id"];
$lpw = $_POST["lpw"];
$lpn = $val["u_name"];

}else if(isset($_POST['lpn']) && $_POST['lpn'] != ""){
    $sql ="SELECT * 
       FROM gs_librualy_controle
       WHERE u_name=:lpn";

//データ読み込み
$stmt = $pdo -> prepare($sql);
$stmt->bindValue(":lpn", $_POST["lpn"], PDO::PARAM_INT);
$status = $stmt -> execute();

//検証
if($status == false){
    $error = $stmt -> errorInfo();
    exit("SQL構文が間違っています:".$error[2]);
}
//値取得
$val = $stmt ->fetch();

//変数設定
$lid = $val["u_id"];
$lpw = $val["u_pw"];
$lpn = $_POST["lpn"];

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
        <h2>パスワード検索</h2>
    </div>
    <div>
        <div>
            <input type="button" value="戻る" onclick="jump('login.php')">
        </div>
        <div>
            <div>ID、パスワード、ユーザー名のいずれかを入力してください</div>
        </div>
        <div>
            <form action="remenber.php" method="post">
                <?php if(isset($lid)): ?>
                <p>ID:<input type="text" value=<?=$lid ?> name="lid"></p>
                <p>password:<input type="text" value=<?=$lpw ?> name="lpw"></p>
                <p>ユーザー名:<input type="text" value=<?=$lpn ?> name="lpn"></p>
                <?php else: ?>
                <p>ID:<input type="text" name="lid"></p>
                <p>password:<input type="text" name="lpw"></p>
                <p>ユーザー名:<input type="text" name="lpn"></p>
                <?php endif ?>
                <input type="submit" value="検索">
            </form>
            <?php if(isset($lid)): ?>
                <form action="system/login_act.php" method="post">
                    <input type="hidden" name="lid" value=<?=$lid ?>>
                    <input type="hidden" name="lpw" value=<?=$lpw ?>>
                    <input type="submit" value="ログイン">
                </form>
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