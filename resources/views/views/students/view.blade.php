<!DOCTYPE html>
<html lang="ja"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>syudents_system</title>
</head>
<body>
<h1>学生表示画面</h1>
<h2>検索フォーム</h2>
<form action="{{ url('/top3') }}" method="GET">
    学生名: <input type="text" name="name" value="{{ request('name') }}"><br>
    <p>学年</p>
    <input type="radio" name="grade" value="1" {{ request('grade') == '1' ? 'checked' : '' }}>1年
    <input type="radio" name="grade" value="2" {{ request('grade') == '2' ? 'checked' : '' }}>2年
    <input type="radio" name="grade" value="3" {{ request('grade') == '3' ? 'checked' : '' }}>3年<br><br>

    <button type="submit">検索</button>
</form>

<hr>

<h2>検索結果</h2>

@if($students->isEmpty())
    <p>検索条件に合致する学生が見つかりませんでした。</p>
@else
    <table border="1">
        <tr>
            <th>学年</th>
            <th>名前</th>
            <th>住所</th>
            <th>詳細</th>
        </tr>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->grade }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->address }}</td>
                <td>
                    <a href="{{ url('/top5/' . $student->id) }}">
                        <button>詳細</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endif
     <a href="{{ url('/top2') }}"><button type="button">戻る</button></a>

</body>