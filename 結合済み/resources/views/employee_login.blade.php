<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>従業員ログイン</title>

        <link rel="stylesheet" href="{{  asset('css/userlogin.css') }}" />

        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>
<h1>ワクチン在庫管理システム</h1>
<h2>従業員ログイン画面</h2>
<div class="form">
    <form action="{{url('/emp_login')}}" method="post" >
        @csrf
  <div class="text-input">
    <label for="userID">ID</label>
    <input type="text" name="emp_ID" id="userID" placeholder="" />
    <span class="separator"> </span>
  </div>

    <div class="text-input">
      <label for="password">Password</label>
        <div class="fieldPassword">
          <input type="password" name="emp_password" id="textPassword" placeholder="" />
          <span id="buttonEye" class="fa fa-eye eye" onclick="pushHideButton()"></span>
        </div>
    </div>

    		<input type="submit" name="submit" value="ログイン" class="form-bottom" />
	  </form>


<br>
<br>
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
