<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>印刷中画面</title>
</head>
<body>
<h1>印刷中です</h1>
<div style="display:inline-flex">
<form  action="{{action('vaccineTableController@vaccineTable')}}" method="POST">
  @csrf
<input type="submit" name="cancel" value="キャンセル">
</form>

<form  action="{{action('vaccineTableController@finishPrint')}}" method="POST">
  @csrf
<input type="submit" name="cancel" value="遷移">
</form>
<p>※自動遷移</p>

<form  action="{{action('vaccineTableController@errorPrint')}}" method="POST">
  @csrf
<input type="submit" name="cancel" value="エラー">
</form>

<p>※自動遷移エラー</p>
</div>
</body>
</html>
