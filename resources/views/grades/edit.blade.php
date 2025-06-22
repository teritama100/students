<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>syudents_system</title>
    <!DOCTYPE html>
</head>
<body>
    <h1>成績編集画面</h1>

    <form action="{{ url('/grades/update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $school_grade->id }}">

        <p>学年時</p><input type="text" name="grade" value="{{ $school_grade->grade }}">
        <p>学期</p><input type="text" name="term" value="{{ $school_grade->term }}">
        <p>国語</p><input type="text" name="japanese" value="{{ $school_grade->japanese }}">
        <p>数学</p><input type="text" name="math" value="{{ $school_grade->math }}">
        <p>理科</p><input type="text" name="science" value="{{ $school_grade->science }}">
        <p>社会</p><input type="text" name="social_studies" value="{{ $school_grade->social_studies }}">
        <p>音楽</p><input type="text" name="music" value="{{ $school_grade->music }}">
        <p>家庭科</p><input type="text" name="home_economics" value="{{ $school_grade->home_economics }}">
        <p>英語</p><input type="text" name="english" value="{{ $school_grade->english }}">
        <p>美術</p><input type="text" name="art" value="{{ $school_grade->art }}">
        <p>保健体育</p><input type="text" name="health_and_physical_education" value="{{ $school_grade->health_and_physical_education }}">

        <button type="submit">登録</button>
    </form>

    <a href="{{ url('/top5/' . $school_grade->student_id) }}">
        <button type="button">戻る</button>
    </a>
</body>
</html>