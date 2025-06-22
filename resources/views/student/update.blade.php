<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>syudents_system</title>
</head>
<body>
    <h1>学生編集画面</h1>
    <form action="{{ url('/students/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $students->id }}">
        <p>学生ID: {{ $students->grade }}</p>
        <p>学年</p><input type="text" name="grade" value="{{ $students->grade}}">
        <p>名前</p><input type="text" name="name" value="{{ $students->name}}">
        <p>住所</p><input type="text" name="address" value="{{ $students->address}}">
        <p>顔写真</p>
        <img src="{{ asset('storage/' . $students->img_path) }}" width="150">
        <br><input type="file" name="img_path" value="{{ $students->img_path}}">
        <p>コメント</p><input type="text" name="comment" value="{{ $students->comment}}">
        <button type="submit">登録</button>
    </form>

    <a href="{{ url('/top5/' . $students->id) }}">
        <button type="button">戻る</button>
    </a>
</body>
</html>