<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集完了画面</title>
</head>
<body>
<h1>編集が完了しました。</h1>
<form  action="{{action('vaccineTableController@vaccineOut')}}" method="POST">
  @csrf
  <input type="submit" name="back" value="戻る">
</form>
</body>
</html>