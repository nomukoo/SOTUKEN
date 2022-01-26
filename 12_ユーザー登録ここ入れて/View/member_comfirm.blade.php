<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ユーザー登録確認</title>

        <link rel="stylesheet" href="{{  asset('css/userlogin.css') }}" />

        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>

<div class="form">
    <form action="{{url('/member_reg')}}" method="post" >
        @csrf
  <div class="text-input">
    <label for="userID">ID</label>
    {{session('userID')}}
    <span class="separator"> </span>
  </div>

    <div class="text-input">
      <label for="password">入力されたパスワード</label>
      {{session('password')}}
        <div class="fieldPassword">
        </div>
    </div>

    		<input type="submit" name="submit" value="登録" class="form-bottom" />
	  </form>


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
