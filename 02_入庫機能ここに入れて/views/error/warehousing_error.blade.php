<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入庫エラー画面</title>
</head>
<body>
<h1>エラーになりました</h1>
<form  action="{{action('vaccineTableController@vaccineOut')}}" method="POST">
  @csrf
  <input type="submit" name="back" value="入庫受付">
</form>
</body>
</html>
