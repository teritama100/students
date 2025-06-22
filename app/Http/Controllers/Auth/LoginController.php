<?php

namespace App\Http\Controllers\Auth;  // これをファイルの一番最初に書く！

use Illuminate\Http\Request;         // その後にuse文を書く
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/top2';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors([
            'email' => 'ユーザー名またはパスワードが間違っています。',
        ])->withInput();
    }
}