<?php
if(isset($_GET["alert"])){
    $alert = $_GET["alert"];
}else{
    $alert =0;
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
        <h2>ログイン画面</h2>
    </div>
    <div>
        <div>
            <?php if($alert == 1): ?>
            <p style="color:#f00;">テキストボックスにID及びパスワードを入力してください</p>
            <?php elseif($alert == 2):?>
            <p style="color:#f00">テクストボックスが空欄になっています</p>
            <?php elseif($alert == 3):?>
            <p style="color:#f00">IDかパスワードが間違っています</p>
            <?php endif?>
        </div>
        <div>
            <form action="system/login_act.php" method="post">
                <p>ID:<input type="text" name="lid"></p>
                <p>password:<input type="text" name="lpw"></p>
                <input type="submit" value="ログイン">
            </form>
        </div>
        <div>
                <p><a href="remenber.php">パスワードを忘れましたか？</a></p>
            <p><a href="account_make.php">新規登録する方はこちら</a></p>
        </div>

    </div>
    
</body>
</html>