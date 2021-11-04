<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{  asset('css/read.css') }}" />
  <title>読み取り画面</title>
</head>
<body>
<h2>バーコードリーダで<br>バーコードを読み取ってください</h2>
<div class="img">
<img src="{{ asset('img/QR.png') }}" class="img-1">
</div>
<form action="{{action('vaccineTableController@vaccineTable')}}" method="POST">
            @csrf
             <input type="submit" name="submit" value="->" />
        </form>


</body>
</html>