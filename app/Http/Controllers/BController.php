<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class BController extends Controller // top3 学生表示画面 検索フォーム　C
{
    public function topView(){
        return view('B');
    }
}
