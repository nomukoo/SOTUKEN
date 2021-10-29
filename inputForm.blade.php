<html>
  <head>
    <title>画面遷移テスト</title>
  </head>
  <body>
    <h1>入力フォームPOSTテスト</h1>
    <div>{{$msg}}</div>
    <form  action="{{action('postTestController@formPost')}}" method="POST">
      @csrf
      <div>果物名：<input type="text" name="fruits_name" require></div>
      <div>果物数：<input type="text" name="fruits_count" require></div>
      <div>単価&nbsp;&nbsp;&nbsp;：<input type="text" name="fruits_value" require></div>
      <input type="submit" name="計算">
    </form>
  </body>
</html>