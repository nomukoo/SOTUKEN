<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>出庫完了画面</title>
</head>
<body>
<h1>出庫が完了しました。</h1>
<form  action="{{action('vaccineTableController@menuTop')}}" method="POST">
  @csrf
  <input type="submit" name="back" value="トップページ">
</form>
</body>
</html>