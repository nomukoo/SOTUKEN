<html>
  <head>
    <title>画面遷移テスト</title>
  </head>
  <body>
    <h1>エラー画面テスト</h1>
    <div>{{$msg}}</div>
    <form  action="{{action('postTestController@formPost')}}" method="POST">
      @csrf
      <a href="{{ action('postTestController@inputForm')}}">入力画面に戻る</a>
    </form>
  </body>
</html>
