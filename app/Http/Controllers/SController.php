<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SController extends Controller
{
    public function topView(){
        return view('S');
    }
}