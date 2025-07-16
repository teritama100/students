<!DOCTYPE html>
<html lang="ja"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>students_system</title>
    <style>
        body {
            font-family: "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;
            background-color: #f4f8fb;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            background-color: #ffffff;
            margin: 50px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        p {
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }

        button:hover {
            background-color: #2980b9;
        }

        a button {
            background-color: #95a5a6;
        }

        a button:hover {
            background-color: #7f8c8d;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>学生登録画面</h1> 

    <form action="{{ url('/students/store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        @csrf
        <p>名前</p>
        <input type="text" name="name" required>

        <p>学年</p>
        <input type="text" name="grade" required>

        <p>住所</p>
        <input type="text" name="address" required>

        <p>顔写真</p>
        <input type="file" name="img_path">

        <button type="submit">登録</button>
        <a href="{{ url('/top2') }}"><button type="button">戻る</button></a>
    </form>
</div>

</body>
</html>