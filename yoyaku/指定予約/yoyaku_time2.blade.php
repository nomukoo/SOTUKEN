<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>時間指定</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
  　<link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/progressbar.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/yoyaku.css') }}" />

    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

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
<br>



<p>指定日：
{{ Session::get('date_val') }}
</p>
<p>指定場所：{{ Session::get('hospital_name') }}</p>


<br>
<p>ご希望の時間帯をお選びください。</p>
<br>
<form action="{{action('App\Http\Controllers\yoyaku_info2Controller@move')}}" method="post"  class="form"> 
        @csrf
        <input type="submit" name="time" value="9:00~" class="time "/>
        </form>
<form action="{{action('App\Http\Controllers\yoyaku_info2Controller@move')}}" method="post"  class="form"> 
        @csrf
        <input type="submit" name="time" value="10:00~" class="time "/>
        </form>
<form action="{{action('App\Http\Controllers\yoyaku_info2Controller@move')}}" method="post"  class="form"> 
        @csrf
        <input type="submit" name="time" value="11:00~" class="time " />
        </form>
<form action="{{action('App\Http\Controllers\yoyaku_info2Controller@move')}}" method="post"  class="form"> 
        @csrf
        <input type="submit" name="time" value="12:00~" class="time "/>
        </form>
<form action="{{action('App\Http\Controllers\yoyaku_info2Controller@move')}}" method="post"  class="form"> 
        @csrf
        <input type="submit" name="time" value="13:00~" class="time "/>
        </form>
<form action="{{action('App\Http\Controllers\yoyaku_info2Controller@move')}}" method="post"  class="form"> 
        @csrf
        <input type="submit" name="time" value="14:00~" class="time "/>
        </form>
<form action="{{action('App\Http\Controllers\yoyaku_info2Controller@move')}}" method="post"  class="form"> 
        @csrf
        <input type="submit" name="time" value="15:00~" class="time "/>
        </form>
<form action="{{action('App\Http\Controllers\yoyaku_info2Controller@move')}}" method="post"  class="form"> 
        @csrf
        <input type="submit" name="time" value="16:00~" class="time "/>
        </form>
<form action="{{action('App\Http\Controllers\yoyaku_info2Controller@move')}}" method="post"  class="form"> 
        @csrf
        <input type="submit" name="time" value="17:00~" class="time "/>
        </form>
<br>
<br>
<br>
<!--<input type="submit" name="submit" value="戻る"  class="custom-btn btn-2" onClick="history.back()"/>-->







<!------------------------------------------------------------------------------------------------------------------->
      <!--<canvas id="myChart" width="900" height="380"></canvas>class="my-4 w-100"  少し下にスクロールできる-->

     


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dashbord.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>