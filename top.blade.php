<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{  asset('css/read.css') }}" />
  <link rel="stylesheet" href="{{  asset('css/top.css') }}" />

  <title>トップページ</title>
</head>
<body>
 <h2>トップページ</h2>


<?php

$today = date("Y/m/d");
$target_day = "2021/11/08";
if(strtotime($today) === strtotime($target_day)){

?>

    <div class="news-banner">
        <div class="news-banner__content">
            <p>本日出庫予定のワクチンがあります。</p>
        </div>
    </div>

<?php
  } else {
?>

    <div class="news-banner">
        <div class="news-banner__content">
            <p>本日出庫予定はありません。</p>
        </div>
    </div>

<?php
 }

?>


<br>
<br>
 <div class="frame">
        
 <form action="{{action('App\Http\Controllers\ReadController@move')}}" method="POST"  class="form"> 
            @csrf
    <input type="submit" name="submit" value="入庫" class="btn pushright btn-1"/>
</form>
<form action="{{action('App\Http\Controllers\read_outController@move')}}" method="POST"  class="form"> 
            @csrf
    <input type="submit" name="submit" value="出庫" class="btn pushright btn-2"/>
</form>

 <input type="submit" name="submit" value="履歴" class="btn pushright btn-3"/>
 <br>
 <br>
 <input type="submit" name="submit" value="受付" class="btn pushright btn-4"/>
 <input type="submit" name="submit" value="在庫閲覧" class="btn pushright btn-5"/>
 <input type="submit" name="submit" value="システム管理" class="btn pushright btn-6"/>
</div>


</body>
</html>