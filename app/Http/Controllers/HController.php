<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HController extends Controller //
{
    public function topView(){
        return view('grades.edit');
    }
}
