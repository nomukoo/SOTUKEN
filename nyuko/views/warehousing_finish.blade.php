<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入庫完了画面</title>
</head>
<body>
<h1>入庫が完了しました。</h1>
<form  action="{{ url('/') }}" method="get">
  @csrf
  <input type="submit" name="back" value="トップページ">
</form>
</body>
</html>
