<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>トップページ</title>
</head>
<body>
<h1>トップページ</h1>
<form  action="{{action('vaccineTableController@vaccineOut')}}" method="POST">
  @csrf
  <input type="submit" name="back" value="入庫登録">
</form>
</body>
</html>
