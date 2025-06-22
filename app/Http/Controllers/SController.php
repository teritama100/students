<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SController extends Controller // ログイン関連
{
    public function topView(){
        return view('S');
    }
}