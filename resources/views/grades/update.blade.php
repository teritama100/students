<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>成績登録画面</title>
</head>
<body>
    <h1>成績登録画面</h1>

    <form action="{{ url('/grades/store') }}" method="POST">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">

        <p>学年時</p><input type="text" name="grade">
        <p>学期</p><input type="text" name="term">
        <p>国語</p><input type="text" name="japanese">
        <p>数学</p><input type="text" name="math">
        <p>理科</p><input type="text" name="science">
        <p>社会</p><input type="text" name="social_studies">
        <p>音楽</p><input type="text" name="music">
        <p>家庭科</p><input type="text" name="home_economics">
        <p>英語</p><input type="text" name="english">
        <p>美術</p><input type="text" name="art">
        <p>保健体育</p><input type="text" name="health_and_physical_education">

        <button type="submit">成績登録</button>
        
    </form>


    <a href="{{ url('/top5/' . $student->id) }}"><button type="button">戻る</button></a>
</body>
</html>