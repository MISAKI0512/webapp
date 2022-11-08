<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;

class AuthorController extends Controller
{
    public function index()
    {
        $user =Auth::user()->name;
        $todos = Todo::paginate(4);
        $param = ['todos'=>$todos ,'user' =>$user];
        return view('index',$param);
    }

    public function check(Request $request)
    {
    $text = ['text' => 'ログインして下さい。'];
    return view('auth.login', $text);
    }

    public function checkUser(Request $request)
    {
    $email = $request->email;
    $password = $request->password;
    if (Auth::attempt(['email' => $email,
    'password' => $password])) {
    $text =   Auth::user()->name . 'さんがログインしました';
    } else {
    $text = 'ログインに失敗しました';
    }
    return view('auth.login', ['text' => $text]);
}
}