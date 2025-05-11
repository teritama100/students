<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>students_system</title>
</head>
<body>
    <h1>ユーザー登録フォーム</h1>
    <form id="users" action="Scontroller.php" method="POST">
        @csrf
        <label for="user_name">ユーザーネーム</label>
    <input type="text" id="user_name" name="user_name" placeholder="半数英数"><br>
    <label for="email">メールアドレス</label>
    <input type="text" id="email" name="email" placeholder="半数英数"><br>
    <label for="password">パスワード</label>
    <input type="password" id="password" name="password" placeholder="半数英数"><br>
    <label for="password">パスワード(再確認)</label>
    <input type="password" id="password" name="password" placeholder="半数英数"><br>
    <button type="submit">登録</button>
    </form>
    <a href="http://localhost:8888/students/public/top"><input type="submit" value="戻る">    
</body>
</html>