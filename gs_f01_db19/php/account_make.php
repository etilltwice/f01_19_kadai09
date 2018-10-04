<?php session_start();?>

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
    <div>
        <!-- 説明書き -->
        <div>
            <div>ID、パスワード、名前以外は記入しなくてもいいですが、記入するとランキングなどでより貴方にあった本をお勧めすることが出来ます</div>
        </div>
        <!-- 警告表記 -->
    <?php if(isset($_GET["alert"])): ?>
        <p style="color:#f00;">ID、パスワード、名前は空欄にできません</p>
    <?php endif ?>
    <!-- 移動用ボタン -->
        <div>
            <?php if( $_SESSION["master"] == 1): ?>
                <input type="button" value="戻る" onclick="jump('login.php')">
            <?php else: ?>
                <input type="button" value="戻る" onclick="jump('login.php')">
            <?php endif ?>
        </div>

        <!-- 登録する情報 -->
        <div>
            <form action="make_information.php" method="post">
            <div>【ユーザー名】　<input type="text" name="u_name"></div>
            <div>【ＩＤ】　<input type="text" name="u_id"></div>
            <div>【パスワード】　<input type="text" name="u_pw"></div>
            <div>【年齢】　<input type="text" name="age"></div>
            <div>【性別】　<select name="gender">
                <option value="null"> </option>
                <option value="1">男性</option>
                <option value="2">女性</option>
            </select></div>
            <div>【住所】　<select name="location">
                <option value="null">  </option>
                <option value="北海道">北海道</option>
                <option value="青森県">青森県</option>
                <option value="岩手県">岩手県</option>
                <option value="秋田県">秋田県</option>
                <option value="宮城県">宮城県</option>
                <option value="山形県">山形県</option>
                <option value="福島県">福島県</option>
                <option value="栃木県">栃木県</option>
                <option value="千葉県">千葉県</option>
                <option value="群馬県">群馬県</option>
                <option value="埼玉県">埼玉県</option>
                <option value="東京都">東京都</option>
                <option value="神奈川県">神奈川県</option>
                <option value="新潟県">新潟県</option>
                <option value="富山県">富山県</option>
                <option value="石川県">石川県</option>
                <option value="長野県">長野県</option>
                <option value="山梨県">山梨県</option>
                <option value="愛知県">愛知県</option>
                <option value="静岡県">静岡県</option>
                <option value="岐阜県">岐阜県</option>
                <option value="福井県">福井県</option>
                <option value="京都府">京都府</option>
                <option value="滋賀県">滋賀県</option>
                <option value="三重県">三重県</option>
                <option value="奈良県">奈良県</option>
                <option value="和歌山県">和歌山県</option>
                <option value="大阪府">大阪府</option>
                <option value="兵庫県">兵庫県</option>
                <option value="鳥取県">鳥取県</option>
                <option value="島根県">島根県</option>
                <option value="岡山県">岡山県</option>
                <option value="広島県">広島県</option>
                <option value="山口県">山口県</option>
                <option value="香川県">香川県</option>
                <option value="徳島県">徳島県</option>
                <option value="愛媛県">愛媛県</option>
                <option value="高知県">高知県</option>
                <option value="福岡県">福岡県</option>
                <option value="佐賀県">佐賀県</option>
                <option value="長崎県">長崎県</option>
                <option value="大分県">大分県</option>
                <option value="熊本県">熊本県</option>
                <option value="宮崎県">宮崎県</option>
                <option value="鹿児島県">鹿児島県</option>
                <option value="沖縄県">沖縄県</option>
            </select>
        <!-- マスター用 -->
        <?php if( $_SESSION["master"] == 1): ?>
            <div>【会員情報】
                <select name="master">
                    <option value="0">一般会員</option>
                    <option value="1"">管理者</option>
                </select>
            </div>
        <?php else: ?>
            <input type="hidden" name="master" value="0">;
        <?php endif ?>
        
        </div>
            
            <input type="submit" value="アカウント作成">
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