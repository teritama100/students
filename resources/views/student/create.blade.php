<!DOCTYPE html>
<html lang="ja"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>syudents_system</title>
</head>
<body>

<div class="container">
    <h1>学生登録画面</h1> 

    <form action="{{ url('/students/store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <p>名前</p>
        <input type="text" name="name">
        <p>学年</p>
        <input type="text" name="grade">

        <p>住所</p>
        <input type="text" name="address">

        <p>顔写真</p>
        <input type="file" name="img_path">
        <br><br>
        <button type="submit">登録</button>
        </form>
        <a href="{{ url('/top2') }}"><button type="button">戻る</button></a>
</div>

</body>
</html>