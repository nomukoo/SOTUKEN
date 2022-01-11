<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title></title>

        <link rel="stylesheet" href="{{  asset('css/userlogin.css') }}" />
    </head>
    <body>
<br>
<br>
<br>
<br>
<h2>新規登録完了しました</h2>
<form action="{{action('App\Http\Controllers\userloginController@move')}}" method="get" > 
     @csrf
    <input type="submit" name="submit" value="ログイン画面へ" class="btn"/>
</form>
    </body>
</html>