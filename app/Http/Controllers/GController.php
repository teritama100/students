<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class GController extends Controller 
//成績登録画面

{
    public function topView($id)
    {
        $student = \App\Student::findOrFail($id);
        return view('grades.update', compact('student'));
    }
}
