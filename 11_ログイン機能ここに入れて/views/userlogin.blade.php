<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ユーザログイン</title>

        <link rel="stylesheet" href="{{  asset('css/userlogin.css') }}" />

        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>
    <h1 style="text-align:center;">ワクチン接種者ログイン</h1>
<div class="form">
    <form action="{{url('/user_login')}}" method="post" >
        @csrf
  <div class="text-input">
    <label for="userID">ID</label>
    <input type="text" name="userID" id="userID" placeholder="" />
    <span class="separator"> </span>
  </div>

    <div class="text-input">
      <label for="password">Password</label>
        <div class="fieldPassword">
          <input type="password" name="password" id="textPassword" placeholder="" />
          <span id="buttonEye" class="fa fa-eye eye" onclick="pushHideButton()"></span>
        </div>
    </div>

    		<input type="submit" name="submit" value="ログイン" class="form-bottom" />
	  </form>


<br>
<br>
<form action="{{url('/member_comfirm')}}" method="POST" >
   <p>＊IDとPasswordをお持ちでない方はこちら＊</p>
  <div class="text-input">
    <label for="userID">ID(任意)</label>
    <input type="text" name="userID" id="userID" placeholder="" />
    <span class="separator"> </span>
  </div>

  <div class="text-input">
    <label for="password">Password(任意)</label>
      <div class="fieldPassword">
        <input type="password" name="password" id="textPassword1" placeholder="" />
        <span id="buttonEye1" class="fa fa-eye eye" onclick="pushHideButton1()"></span>
      </div>
  </div>


  <div class="text-input">
    <label for="password">Password(確認)</label>
      <div class="fieldPassword">
        <input type="password" name="password1" id="textPassword2" placeholder="" />
        <span id="buttonEye2" class="fa fa-eye  eye" onclick="pushHideButton2()"></span>
      </div>
  </div>
           	 @csrf
    		<input type="submit" name="submit" value="新規会員登録" />
	    </form>
     <div class="class"> 
    <form action="{{url('/emp_login')}}" method="get" >
  <div class="text-input">
    <span class="separator"> </span>
  </div>
  <input type="submit" name="submit" value="病院関係者はこちら" />
</form>
</div>
</div>


<br>
<br>
<br>
<br>

<script language="javascript">
      function pushHideButton() {
        var txtPass = document.getElementById("textPassword");
        var btnEye = document.getElementById("buttonEye");
        if (txtPass.type === "text") {
          txtPass.type = "password";
          btnEye.className = "fa fa-eye eye";
        } else {
          txtPass.type = "text";
          btnEye.className = "fa fa-eye-slash eye";
        }
      }
      function pushHideButton1() {
        var txtPass = document.getElementById("textPassword1");
        var btnEye = document.getElementById("buttonEye1");
        if (txtPass.type === "text") {
          txtPass.type = "password";
          btnEye.className = "fa fa-eye eye";
        } else {
          txtPass.type = "text";
          btnEye.className = "fa fa-eye-slash eye";
        }
      }
      function pushHideButton2() {
        var txtPass = document.getElementById("textPassword2");
        var btnEye = document.getElementById("buttonEye2");
        if (txtPass.type === "text") {
          txtPass.type = "password";
          btnEye.className = "fa fa-eye eye";
        } else {
          txtPass.type = "text";
          btnEye.className = "fa fa-eye-slash eye";
        }
      }


    </script>

<script src="{{ asset('/js/userlogin.js') }}"></script>
    </body>
</html>
