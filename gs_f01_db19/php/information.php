
<!-- 登録処理 -->
<?php 
//初期設定
session_start();
include("system/function.php");
loginCheck();

//チェック
if(
    !isset($_POST["name"]) || $_POST["name"] =='' 
    ){
        exit('ParamError');
    }
    
    //読み込み
    $name = $_POST["name"];
    $url = $_POST["url"];
    $memo = $_POST["memo"];
    $id = $_SESSION["id"];
    
    //データベース接続
    $pdo = db_connect();
    
    //sql作成
    $sql ="INSERT INTO gs_bm_table(id, name, url, memo, user_id, indate)
       VALUES(null, :a1, :a2, :a3, :id, sysdate())";

$stmt = $pdo -> prepare($sql);
//書き換え処理
$stmt -> bindValue(':a1', $name, PDO::PARAM_STR);
$stmt -> bindValue(':a2', $url, PDO::PARAM_STR);
$stmt -> bindValue(':a3', $memo, PDO::PARAM_STR);
$stmt -> bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt -> execute();

//データ処理後
if($status == false){
    $error = $stmt -> errorInfo();
    exit("QueryError:".$error[2]);
}

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
    <h1>登録完了</h1>
    <div>
        <p>以下の内容を新規登録しました</p>
        <div>
        <table style="boder:solid">
        <tr>
        <td>題名</td>
        <td>URL</td>
        <td>コメント</td>
        </tr><tr>
        <td><?=$name ?></td>
        <td><?=$url ?></td>
        <td><?=$memo ?></td>
        </tr>
        </table>
        </div>
        <input type="button" value="一覧に戻る" onclick="jump('look.php')">
        <input type="button" value="別の本を登録する" onclick="jump('bookinsert.php')">
    </div>
    
    <script>
        function jump(link){
            location.replace(link);
        }

    
    </script>
</body>
</html>