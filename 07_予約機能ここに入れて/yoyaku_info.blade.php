<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>予約者情報</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
  　<link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/progressbar.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/yoyaku.css') }}" />

    <!-- Bootstrap core CSS -->

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/jquery.autoKana.js"></script>
<script type="text/javascript">
$(function() {
    $.fn.autoKana('input[name="sei"] ', 'input[name="seikana"]', {katakana:true});
});	
$(function() {
    $.fn.autoKana('input[name="mei"] ', 'input[name="meikana"]', {katakana:true});
});
</script>
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand1 col-md-3 col-lg-2 me-0 px-3 a1">ユーザ名</a>
  
  <ul class="nav pull-right">
  <li class="nav-item">
      <a class="nav-link text-white" href="#">
      <form action="{{action('App\Http\Controllers\top2Controller@move')}}" method="get"  class="form"> 
                     @csrf
            <input type="submit" name="submit" value="ホーム" class="btn1" />
            </form>
        </a>
    </li>
    <li class="nav-link text-white" href="#">
    <form action="{{action('App\Http\Controllers\userloginController@move')}}" method="get"  class="form"> 
                     @csrf
            <input type="submit" name="submit" value="サインアウト" class="btn1" />
            </form>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
          <br>
          <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              <form action="{{action('App\Http\Controllers\yoyakuController@move')}}" method="POST"  class="form"> 
            	@csrf
    		<input type="submit" name="submit" value="予約" class="btn2"/>
    	      </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{action('App\Http\Controllers\log2Controller@move')}}" method="POST"  class="form"> 
           	 @csrf
    		<input type="submit" name="submit" value="履歴" class="btn2"/>
	      </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{action('App\Http\Controllers\ticketController@move')}}" method="POST"  class="form"> 
           	 @csrf
    		<input type="submit" name="submit" value="接種券番号表示" class="btn2"/>
	      </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{action('App\Http\Controllers\m_editController@move')}}" method="POST"  class="form"> 
           	 @csrf
    		<input type="submit" name="submit" value="問診票編集" class="btn2"/>
	      </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{action('App\Http\Controllers\mailController@move')}}" method="POST"  class="form"> 
           	 @csrf
    		<input type="submit" name="submit" value="お知らせ" class="btn2"/>
	      </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{action('App\Http\Controllers\optionController@move')}}" method="POST"  class="form"> 
           	 @csrf
    		<input type="submit" name="submit" value="その他" class="btn2"/>
	      </form>
            </a>
          </li>
        </ul>
      </div>
    </nav>
　<br>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2  border-bottom"> <!--mb-3  進行状況の下のライン-->

      <div id="smartwizard" class="sw-theme-arrows">
        <ul class="nav nav-tabs step-anchor">
            <li><a href="#step-1">1<br><small></small></a></li>
            <li><a href="#step-2">2<br><small></small></a></li>
            <li><a href="#step-3">3<br><small></small></a></li>
            <li class="active"><a href="#step-4">4<br><small></small></a></li>
            <li><a href="#step-5">5<br><small></small></a></li>
            <li><a href="#step-6">6<br><small></small></a></li>
            <li><a href="#step-7">7<br><small></small></a></li>
        </ul>
    </div>

        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div> 
　　　</div>
<h2>予約者情報</h2>
<div class="clskwfslejl" align="center">
    <div class="tbl">
    <table>
    <tr>
  <th>接種券番号<span style="color:red">(必須)</span></th><td colspan="2"><input type="text" name="ticketnumber" placeholder="0123456789" maxlength="10" required></td>
</tr>
<tr>
  <th rowspan="2">お名前<span style="color:red">(必須)</span></th><td><input type="text" name="seikana" style="width: 100%" placeholder="セイ"></td><td><input type="text" name="meikana" style="width: 100%" placeholder="メイ"></td>
</tr>
<tr>
    <td><input type="text" name="sei" style="width: 100%" placeholder="姓" required></td><td><input type="text" name="mei" style="width: 100%" placeholder="名" required></td>
</tr>
<tr>
  <th>生年月日<span style="color:red">(必須)</span></th><td colspan="2"><input type="radio" name="generation" >大<input type="radio" name="generation">昭<input type="radio" name="generation">平<input type="radio" name="generation">令<input type="text" style="width: 50px" required>年<input type="text" style="width: 50px" required>月<input type="text" style="width: 50px" required>日</td>
</tr>
<tr>
  <th rowspan="3">住所<span style="color:red">(必須)</span></th><td colspan="2">〒<input type="text" name="address_num" style="width: 30%"  placeholder="000-0000" required></td>
</tr>
<tr>
  <td colspan="2"><input type="text" name="address" style="width: 20%"><input type="radio" name="address">都<input type="radio" name="address">道<input type="radio" name="address">府<input type="radio" name="address">県</td></td>
</tr>
<tr>
  <td colspan="2"><input type="text" style="width:100%" required></td>
</tr>
<tr>
  <th>電話番号<span style="color:red">(必須)</span></th><td colspan="2"><input type="tel" name="tel" placeholder="000-0000-0000" style="width: 100%" required ></td>
</tr>
<tr>
  <th>メールアドレス<span style="color:red">(必須)</span></th><td colspan="2"><input type="email" name="email" placeholder="xxxx@example.com" style="width: 100%" required></td>
</tr>
    </table>
  </div>
</div>
<br>
<br>
<input type="submit" name="submit" value="戻る" class="custom-btn btn-2" onClick="history.back()"/>
<form action="{{action('App\Http\Controllers\monsinController@move')}}" method="post"  class="form"> 
        @csrf
        <input type="submit" name="submit" value="次へ" class="custom-btn btn-2"/>
</form>

<!------------------------------------------------------------------------------------------------------------------->
      

     


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dashbord.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>