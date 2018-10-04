<?php
//初期設定
session_start();
include("system/function.php");
loginCheck();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>librualy/update</title>
</head>
<body>
    <div>
        <div>
            <h1 style="background-color:green; color:white;">花台図書館</h1>
        </div>
        <div>
            <input type="button" onclick="jump('look.php')" value="戻る">
        </div>
        <div>
            <h2>新規登録画面</h1>
        </div>
        <div>
            <form action="information.php" method="post">
                <div>
                    <div>名前：<input name="name" type="text"></div>
                    <div>URL：<input name="url" type="text"></div>
                    <div>メモ：<textarea name="memo" cols="30" rows="10"></textarea></div>
                    <input type="button" value="クリア" onclick="reset()">
                </div>
                <input type="submit" value="送信">
            </form>
            
        </div>
    </div>
    
    <script>
        function reset() {
            document.sampleform.reset();
        }

        function jump(link){
            location.replace(link);
        }

    </script>
</body>
</html>