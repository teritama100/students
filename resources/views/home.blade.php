
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><br></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    登録が完了しました！<br>
                    <a href="http://localhost:8888/students/public/top2"><input type="submit" value="学生管理画面へ">
                    
                </div>
            </div>
        </div>
    </div>
</div>
