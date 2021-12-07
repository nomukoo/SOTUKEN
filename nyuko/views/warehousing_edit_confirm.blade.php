<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集確認画面</title>
</head>
<body>
<h1>編集確認画面</h1>
<div style="display:inline-flex">
<form  action="{{action('vaccineTableController@vaccineOut')}}" method="POST">
  @csrf
  <input type="submit" name="back" value="戻">
</form>

<form  action="{{action('vaccineTableController@vaccinefinishEdit')}}" method="POST">
  @csrf
  <input type="submit" name="back" value="登録">
</form>
</div>
</body>

</html>