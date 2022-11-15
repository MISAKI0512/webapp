<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Models\Tag;

class AuthorController extends Controller
{
    public function index()
    {
        $user =Auth::user()->name;
        $todos = Todo::all();
        $tags = Tag::all();
        $param = ['todos'=>$todos ,'user' =>$user,'tags'=>$tags];
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
    public function index_search()
    {
        $user =Auth::user()->name;
        return view('search',['user'=> $user]);
    }

    public function search(Request $request) 
    {
        $query = Todo::query();
        $i_todo = $request->input;
        $i_tag = $request -> tag_id;
        if(!empty($i_todo)) {
            $query->where('content', 'like', "%{$i_todo}%");
        }
        if(!empty($i_tag)) {
            $query->where('content', '=', "$i_tag");
        }
        //dd($query); 
        $data=$query->get();
        dd($data);
        //$search = Todo::where('content','LIKE',"%{$request->input}%")->get()->all();
        //$tag_search = Todo::where('tag_id',$request->tag_id)->get()->all();
        //dd($tag_search);
        //$result = array_merge($search, $tag_search, array());
        //dd($result);
        $user =Auth::user()->name;
        $tags = Tag::all();

        return view('search',compact('user', 'tags','data'));

}

}
