<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{  asset('css/delete.css') }}" />
  <title>削除画面(出庫)</title>
</head>
<body>
  <br>
  <br>
  <h2>本当に削除しますか？</h2>
  <br>
  <input type="submit" name="submit" value="いいえ" class="custom-btn btn-2" onClick="history.back()"/>
  <form action="{{action('App\Http\Controllers\delConp_outController@move')}}" method="POST"  class="form"> 
    @csrf
  <input type="submit" name="submit" value="はい" class="custom-btn btn-1"/>
</form>
</body>
</html>