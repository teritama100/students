<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>syudents_system</title>
</head>
<body>
    <h1>ユーザー登録フォーム</h1>
    <form method="post" action="Acontroller.php">
    <p>
        ユーザーネーム<input type="text" id="user_name" placeholder="半数英数"></p> 
    <p>メールアドレス</p><input type="text" id="email" placeholder="半数英数">
    <p>パスワード</p><input type="text" id="password" placeholder="半数英数">
    <p>パスワード(再確認)</p><input type="text" id="password" placeholder="半数英数">
    <br><a href="http://localhost:8888/students/public/top"><input type="submit" value="登録" action="http://localhost:8888/students/public/top" >
    <a href="http://localhost:8888/students/public/top"><input type="submit" value="戻る">

    </form>
</body>
</html>