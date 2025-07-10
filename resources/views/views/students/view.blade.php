<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>学生表示画面</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="ajax-search-url" content="{{ route('student.ajaxSearch') }}">
</head>
<body>
<h1>学生表示画面</h1>

<h2>検索フォーム</h2>
<form id="search-form">
    学生名: <input type="text" name="name" id="name"><br>
    <p>学年</p>
    <input type="radio" name="grade" value="1">1年
    <input type="radio" name="grade" value="2">2年
    <input type="radio" name="grade" value="3">3年<br>

    <p>並び順</p>
    <select name="sort" id="sort">
        <option value="asc">学年 昇順</option>
        <option value="desc">学年 降順</option>
    </select><br><br>

    <button type="submit">検索</button>
</form>

<hr>

<h2>検索結果</h2>
<table border="1" id="results">
    <thead>
        <tr>
            <th>学年</th>
            <th>名前</th>
            <th>住所</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->grade }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->address }}</td>
                <td><a href="{{ url('/top5/' . $student->id) }}"><button>詳細</button></a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ url('/top2') }}"><button type="button">戻る</button></a>
@if (session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif
<script>
document.getElementById('search-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const grade = document.querySelector('input[name="grade"]:checked')?.value || '';
    const sort = document.getElementById('sort').value;
    const searchUrl = document.querySelector('meta[name="ajax-search-url"]').getAttribute('content');

    fetch(`${searchUrl}?name=${name}&grade=${grade}&sort=${sort}`)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#results tbody');
            tbody.innerHTML = '';

            if (data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="4">該当なし</td></tr>';
            } else {
                data.forEach(student => {
                    const row = `
                        <tr>
                            <td>${student.grade}</td>
                            <td>${student.name}</td>
                            <td>${student.address ?? ''}</td>
                            <td><a href="/students/public/top5/${student.id}"><button>詳細</button></a></td>
                        </tr>`;
                    tbody.innerHTML += row;
                });
            }
        })
        .catch(err => console.error('通信エラー', err));
});
</script>
</body>
</html>