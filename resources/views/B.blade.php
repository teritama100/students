<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メニュー</title>
</head>
<body>
    <h1>学生管理システム メニュー</h1>

    <!-- 学生登録画面へ -->
    <form action="{{ url('/top4') }}" method="GET">
        <button type="submit">学生登録画面へ</button>
    </form>
    <br>

    <!-- 学生表示（検索）画面へ -->
    <form action="{{ url('/top3') }}" method="GET">
        <button type="submit">学生表示画面へ</button>
    </form>
    <br>

    <!-- 学年更新ボタン -->
    <form action="{{ url('/students/update-grade') }}" method="POST">
        @csrf
        <button type="submit" onclick="return confirm('全学生の学年を更新しますか？')">全学生の学年を更新</button>
    </form>
</body>
</html>