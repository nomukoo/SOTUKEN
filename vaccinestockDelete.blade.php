<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入庫取消画面</title>
</head>
<body>
<h1>入庫取消画面</h1>
<h2>取り消しました
  </h2>
  <div style="display:inline-flex">
<form  action="{{action('vaccineTableController@vaccineOut')}}" method="POST">
  @csrf
  <input type="submit" name="back" value="戻る">
</form>

<form  action="{{action('vaccineTableController@deleteConfilm')}}" method="POST">
  @csrf
  <input type="submit" name="confilm" value="確定">
</form>
</div>
</body>
</html>

