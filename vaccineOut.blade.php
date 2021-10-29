<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入庫受付画面</title>
</head>
<body>
<h1>入庫受付画面</h1>
  <h2>バーコードを読み取ってください
  </h2>
  <div style="display:inline-flex">
  <form  action="{{action('vaccineTableController@vaccineTable')}}" method="POST">
  @csrf
  <input type="submit" name="go" value="確認">
  </form>
  
  <form  action="{{action('vaccineTableController@vaccineEdit')}}" method="POST">
  @csrf
  <input type="submit" name="go" value="編集">
  </form>
</div>
</body>
</html>


