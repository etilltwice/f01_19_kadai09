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
$stmt->bindValue(":u_id", $u_id, PDO::PARAM_INT);
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
        <?php if(isset($_GET["alert"])): ?>
        <p style="color:#f00;">ID、パスワード、名前は空欄にできません</p>
        <?php endif ?>
        <div>
            <input type="button" value="戻る" onclick="jump('user.php')">
        </div>
        <div>
            <form action="system/update.php" method="post">
            <div>【ユーザー名】　<input type="text" name="u_name" value="<?=$val['u_name'] ?>"></div>
            <div>【ＩＤ】　<input type="text" name="u_id" value="<?=$val['u_id'] ?>"></div>
            <div>【パスワード】　<input type="text" name="u_pw" value="<?=$val['u_pw'] ?>"></div>
            <div>【年齢】　<input type="text" name="age" value="<?=$val['age'] ?>"></div>
            <div>【性別】　<select name="gender">
                <option value="null"> </option>
                <option value="1"<?php if($val['gender'] ==1){echo "selected";} ?>>男性</option>
                <option value="2"<?php if($val['gender'] ==2){echo "selected";} ?>>女性</option>
            </select></div>
            <div>【住所】　<select name="location">
                <option value="null">  </option>
                <option value="北海道"<?php if($val['location'] =="北海道"){echo "selected";} ?>>北海道</option>
                <option value="青森県"<?php if($val['location'] =="青森県"){echo "selected";} ?>>青森県</option>
                <option value="岩手県"<?php if($val['location'] =="岩手県"){echo "selected";} ?>>岩手県</option>
                <option value="秋田県"<?php if($val['location'] =="秋田県"){echo "selected";} ?>>秋田県</option>
                <option value="宮城県"<?php if($val['location'] =="宮城県"){echo "selected";} ?>>宮城県</option>
                <option value="山形県"<?php if($val['location'] =="山形県"){echo "selected";} ?>>山形県</option>
                <option value="福島県"<?php if($val['location'] =="福島県"){echo "selected";} ?>>福島県</option>
                <option value="栃木県"<?php if($val['location'] =="栃木県"){echo "selected";} ?>>栃木県</option>
                <option value="千葉県"<?php if($val['location'] =="千葉県"){echo "selected";} ?>>千葉県</option>
                <option value="群馬県"<?php if($val['location'] =="群馬県"){echo "selected";} ?>>群馬県</option>
                <option value="埼玉県"<?php if($val['location'] =="埼玉県"){echo "selected";} ?>>埼玉県</option>
                <option value="東京都"<?php if($val['location'] =="東京都"){echo "selected";} ?>>東京都</option>
                <option value="神奈川県"<?php if($val['location'] =="神奈川県"){echo "selected";} ?>>神奈川県</option>
                <option value="新潟県"<?php if($val['location'] =="新潟県"){echo "selected";} ?>>新潟県</option>
                <option value="富山県"<?php if($val['location'] =="富山県"){echo "selected";} ?>>富山県</option>
                <option value="石川県"<?php if($val['location'] =="石川県"){echo "selected";} ?>>石川県</option>
                <option value="長野県"<?php if($val['location'] =="長野県"){echo "selected";} ?>>長野県</option>
                <option value="山梨県"<?php if($val['location'] =="山梨県"){echo "selected";} ?>>山梨県</option>
                <option value="愛知県"<?php if($val['location'] =="愛知県"){echo "selected";} ?>>愛知県</option>
                <option value="静岡県"<?php if($val['location'] =="静岡県"){echo "selected";} ?>>静岡県</option>
                <option value="岐阜県"<?php if($val['location'] =="岐阜県"){echo "selected";} ?>>岐阜県</option>
                <option value="福井県"<?php if($val['location'] =="福井県"){echo "selected";} ?>>福井県</option>
                <option value="京都府"<?php if($val['location'] =="京都府"){echo "selected";} ?>>京都府</option>
                <option value="滋賀県"<?php if($val['location'] =="滋賀県"){echo "selected";} ?>>滋賀県</option>
                <option value="三重県"<?php if($val['location'] =="三重県"){echo "selected";} ?>>三重県</option>
                <option value="奈良県"<?php if($val['location'] =="奈良県"){echo "selected";} ?>>奈良県</option>
                <option value="和歌山県"<?php if($val['location'] =="和歌山県"){echo "selected";} ?>>和歌山県</option>
                <option value="大阪府"<?php if($val['location'] =="大阪府"){echo "selected";} ?>>大阪府</option>
                <option value="兵庫県"<?php if($val['location'] =="兵庫県"){echo "selected";} ?>>兵庫県</option>
                <option value="鳥取県"<?php if($val['location'] =="鳥取県"){echo "selected";} ?>>鳥取県</option>
                <option value="島根県"<?php if($val['location'] =="島根県"){echo "selected";} ?>>島根県</option>
                <option value="岡山県"<?php if($val['location'] =="岡山県"){echo "selected";} ?>>岡山県</option>
                <option value="広島県"<?php if($val['location'] =="広島県"){echo "selected";} ?>>広島県</option>
                <option value="山口県"<?php if($val['location'] =="山口県"){echo "selected";} ?>>山口県</option>
                <option value="香川県"<?php if($val['location'] =="香川県"){echo "selected";} ?>>香川県</option>
                <option value="徳島県"<?php if($val['location'] =="徳島県"){echo "selected";} ?>>徳島県</option>
                <option value="愛媛県"<?php if($val['location'] =="愛媛県"){echo "selected";} ?>>愛媛県</option>
                <option value="高知県"<?php if($val['location'] =="高知県"){echo "selected";} ?>>高知県</option>
                <option value="福岡県"<?php if($val['location'] =="福岡県"){echo "selected";} ?>>福岡県</option>
                <option value="佐賀県"<?php if($val['location'] =="佐賀県"){echo "selected";} ?>>佐賀県</option>
                <option value="長崎県"<?php if($val['location'] =="長崎県"){echo "selected";} ?>>長崎県</option>
                <option value="大分県"<?php if($val['location'] =="大分県"){echo "selected";} ?>>大分県</option>
                <option value="熊本県"<?php if($val['location'] =="熊本県"){echo "selected";} ?>>熊本県</option>
                <option value="宮崎県"<?php if($val['location'] =="宮崎県"){echo "selected";} ?>>宮崎県</option>
                <option value="鹿児島県"<?php if($val['location'] =="鹿児島県"){echo "selected";} ?>>鹿児島県</option>
                <option value="沖縄県"<?php if($val['location'] =="沖縄県"){echo "selected";} ?>>沖縄県</option>
            </select></div>
            <!-- 隠し関数 -->
            <input type="hidden" name="id" value="<?=$u_id ?>">
            <input type="hidden" name="come" value="../u_change.php">
            <input type="hidden" name="go" value="../look.php">
            <input type="hidden" name="target" value="user">

            <input type="submit" value="送信">
            
            </form>

            
        </div>
    </div>


    <script>
        function jump(link){
            location.replace(link);
        }

    
    </script>
</body>
</html>
