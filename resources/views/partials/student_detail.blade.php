<div>
    <h1>{{ $student->name }}の詳細</h1>
    <p>学年: {{ $student->grade }}</p>
    <p>住所: {{ $student->address }}</p>

    @if ($student->img_path)
        <p>顔写真:</p>
        <img src="{{ asset('storage/' . $student->img_path) }}" alt="顔写真" width="150">
    @else
        <p>顔写真は未登録です</p>
    @endif

    <p>コメント: {{ $student->comment }}</p>

    <a href="{{ url('/top6/' . $student->id) }}"><button type="button">学生編集へ</button></a>

    @foreach ($school_grades as $grade)
        <hr>
        <p>学年: {{ $grade->grade }}</p>
        <p>学期: {{ $grade->term }}</p>
        <p>国語: {{ $grade->japanese }}</p>
        <p>数学: {{ $grade->math }}</p>
        <p>理科: {{ $grade->science }}</p>
        <p>社会: {{ $grade->social_studies }}</p>
        <p>音楽: {{ $grade->music }}</p>
        <p>家庭科: {{ $grade->home_economics }}</p>
        <p>英語: {{ $grade->english }}</p>
        <p>美術: {{ $grade->art }}</p>
        <p>保健体育: {{ $grade->health_and_physical_education }}</p>
    @endforeach

    <a href="{{ url('/top8/' . $student->id) }}"><button type="button">成績編集へ</button></a>
    <a href="{{ url('/top7/' . $student->id) }}"><button type="button">成績登録へ</button></a>
    <a href="{{ url('/top6/' . $student->id) }}"><button type="button">学生編集へ</button></a>
</form>
<form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" style="color: red;">学生を削除</button>
    <a href="{{ url('/top3') }}"><button type="button">戻る</button></a>
</form>
</div>