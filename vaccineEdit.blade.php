<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集画面</title>
</head>
<body>
<h1>編集画面</h1>
<div style="display:inline-flex">
<form  action="{{action('vaccineTableController@vaccineOut')}}" method="POST">
  @csrf
  <input type="submit" name="back" value="戻る">
</form>

<form  action="{{action('vaccineTableController@editConfilm')}}" method="POST">
  @csrf
  <input type="submit" name="back" value="確認">
</form>
</div>
</body>
</html>
