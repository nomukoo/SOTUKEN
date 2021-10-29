<html>
  <head>
    <title>画面遷移テスト</title>
  </head>
  <body>
    <h1>POST結果</h1>
    <div>{{$msg}}</div>
    <div>果物名：{{$fruits_name}}</div>
    <div>果物数：{{$fruits_count}}</div>
    <div>単価&nbsp;&nbsp;&nbsp;：{{$fruits_value}}</div>
    <div>合計金額：{{$total_value}}</div>
    <a href="{{ action('postTestController@inputForm')}}">入力画面に戻る</a>
  </body>
</html>