<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-widthz, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
  <title>COACHTECH</title>

  </head>

  <body>
    <div class="container">
      <div class="card">
        <div class="todo_header">
          <p class="title mb-15">タスク検索</p>
          @auth
          <div class="login">
            <div class="login_user">{{"「". $user ."」でログイン中"}}</div>
            <form action="{{ route('logout')}}" method="post">
              @csrf
              <input class="button-logout" type="submit" value="ログアウト"></form>
          </div>
          @endauth
        </div>
          @if (count($errors)>0)
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
        @endif
        <div class="todo">
          <form method="post" action="/search" class="flex between mb-30" >
            @csrf
            <input type="text" class="input-add" name="input" >
            <select name="tag_id" class="select-tag">
                <option selected></option>
                <option value="1">家事</option>
                <option value="2">勉強</option>
                <option value="3">運動</option>
                <option value="4">食事</option>
                <option value="5">移動</option>
            </select>
            <input class="button-add" type="submit" value="検索">
          </form>
          <table>
            <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>タグ</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
            @if (isset($search)>0)
            @foreach($search as $todo)
          <tr>
            <td>
              {{ $todo->created_at }}
            </td>
            <form action="{{ route('todo.update',['id' => $todo->id]) }}" method="post">
              @csrf
              <td>
                <input type="text" class="input-update" value="{{ $todo->content }}" name="content">
              </td>
              <td>
              <select name="tag_id" class="select-tag">
                @foreach($tags as $tag)
                  @if ($tag->id === $todo->tag_id)
                    <option value="{{ $tag->id }}" selected="selected">{{ $tag->title }}</option>
                  @else
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                  @endif
                @endforeach
            </select>
              </td>
              <td>
                <button class="button-update">更新</button>
              </td>
            </form>
            <td>
              <form action="{{ route('todo.delete', ['id' => $todo ->id])}}" method="post">
                @csrf
                <button class="button-delete">削除</button>
              </form>
            </td>
          </tr>
          @endforeach
          @endif
        </table>
        <a href="/">
          <input class="button-back" type="submit" value="戻る">
        </a>
      </div>
    </div>
  </div>
  </div>
</body>

</html