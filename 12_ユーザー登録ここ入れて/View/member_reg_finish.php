<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ユーザー登録完了</title>

        <link rel="stylesheet" href="{{  asset('css/userlogin.css') }}" />

        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <style>
      .button_wrapper{
        text-align:center;
      }
      </style>
    <body>

<h1 style="text-align:center;">登録が完了しました</h1>
<div class="button_wrapper">
    <form action="{{url('/user_login')}}" method="get" >
    <input type="submit" name="submit" value="ログインページへ"  />
    </form>
</div>
<br>
<br>

</div>
<br>
<br>
<br>
<br>



<script src="{{ asset('/js/userlogin.js') }}"></script>
    </body>
</html>
