<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>学生詳細表示画面</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="ajax-search-detail-url" content="{{ route('student.ajaxSearchDetail') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>学生詳細表示画面</h1>

    <form action="{{ url('/student/view') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" id="searchName" placeholder="名前で検索">

<div id="studentDetail">

    <h1>{{ $students->name }}の詳細</h1>
    <p>学年: {{ $students->grade }}</p>
    <p>住所: {{ $students->address }}</p>

@if ($students->img_path)
    <p>顔写真:</p>
    <img src="{{ asset('storage/' . $students->img_path) }}" alt="顔写真" width="150">
@else
    <p>顔写真は未登録です</p>
@endif

        <p>コメント: {{ $students->comment }}</p>
        <a href="{{ url('/top6/' . $students->id) }}"><button type="button">学生編集へ</button></a>

        
        @foreach ($school_grades as $grade)
    <hr>
    <p>学年: {{ $grade->grade }}</p>
    <p>学期: {{ $grade->term }}</p>
    <p>国語: {{ $grade->japanese }}</p>
    <p>数学: {{ $grade->math }}</p>
    <p>理科: {{ $grade->science}}</p>
    <p>社会: {{ $grade->social_studies}}</p>
    <p>音楽: {{ $grade->music }}</p>
    <p>家庭科: {{ $grade->home_economics}}</p>
    <p>英語: {{ $grade->english }}</p>
    <p>美術: {{ $grade->art }}</p>
    <p>保健体育: {{ $grade->health_and_physical_education }}</p>
    @endforeach
    </form>
    <a href="{{ url('/top8/' . $students->id) }}"><button type="button">成績編集へ</button></a>
    <a href="{{ url('/top7/' . $students->id) }}"><button type="button">成績登録へ</button></a>
    <form action="{{ route('student.destroy', $students->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
    @csrf
    @method('DELETE')
    <button type="submit">削除</button>
</form>
<a href="{{ url('/top3') }}"><button type="button">戻る</button></a>

    <script>
        $(document).ready(function() {
            $('#searchName').on('input', function () {
                let name = $(this).val();
                let url = $('meta[name="ajax-search-detail-url"]').attr('content');

                $.ajax({
                    url: url,
                    method: "GET",
                    data: { name: name },
                    success: function (res) {
                        $('#studentDetail').html(res.html.join(''));
                    },
                    error: function () {
                        $('#studentDetail').html('<p>検索中にエラーが発生しました</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>