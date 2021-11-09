<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{  asset('css/delete.css') }}" />
  <title>削除完了画面(出庫)</title>
</head>
<body>
  <br>
  <br>
  <h2>削除しました</h2>
  <form action="{{action('App\Http\Controllers\topController@move')}}" method="get"  class="form"> 
            @csrf
  <input type="submit" name="submit" value="トップページに戻る" class="custom-btn btn-3"/>
</form>
</body>
</html>