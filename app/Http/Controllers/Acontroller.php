<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;

class AController extends Controller
{
    public function topView(){
        return view('A');
    }

    public function add(Request $request) 
    { 
        $post = new AController();
        $post->id = $request->id;
        $post->user_name = $request->user_name;
        $post->password = $request->password;
        $post->email = $request->email;
        $post->save();
 
        return redirect('/information');
     }
 
} 