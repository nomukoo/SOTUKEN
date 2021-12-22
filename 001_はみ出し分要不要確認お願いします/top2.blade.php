<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>ホーム_ユーザ側</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
  　<link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
    <!--<link rel="stylesheet" href="{{  asset('css/calendar.css') }}" />-->
    <link rel="stylesheet" href="{{  asset('css/top2.css') }}" />

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
            <input type="submit" name="submit" value="予約" class="btn2" />
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{action('App\Http\Controllers\log2Controller@move')}}" method="POST"  class="form"> 
           	  @csrf
    		      <input type="submit" name="submit" value="履歴" class="btn2" />
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
              <form action="{{action('App\Http\Controllers\m_editController@move')}}" method="post"  class="form"> 
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
      <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2  "> 

        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div> 
　　　</div>


<br>
<br>
<div align="left">
    
   <form action="{{action('App\Http\Controllers\yoyakuController@move')}}" method="POST"  class="form_icon" > 
           	 @csrf
        <button type="submit" class="icon_btn" >
        <img src="{{ asset('img/予約アイコン.png') }}" class="icon_img"><br>
    		<input type="submit" name="submit" value="予約"class="icon_sbm">
        </button>
	</form> 

    <form action="{{action('App\Http\Controllers\log2Controller@move')}}" method="POST"  class="form_icon"> 
           	 @csrf
        <button type="submit" class="icon_btn" >
        <img src="{{ asset('img/履歴アイコン.png') }}"  class="icon_img"><br>
    		<input type="submit" name="submit" value="履歴" class="icon_sbm">
        </button>
	  </form> 

    <form action="{{action('App\Http\Controllers\ticketController@move')}}" method="POST"  class="form_icon"> 
           	 @csrf
        <button type="submit" class="icon_btn" >
        <img src="{{ asset('img/スマホ.png') }}"  class="icon_img"><br>
    		<input type="submit" name="submit" value="接種券番号表示" class="icon_sbm">
        </button>
	  </form> 

</div>
<br>
<br>
<br>
<div align="left">   
    

    <form action="{{action('App\Http\Controllers\m_editController@move')}}" method="POST"  class="form_icon"> 
           	 @csrf
        <button type="submit" class="icon_btn" >
        <img src="{{ asset('img/問診票アイコン.jpg') }}"  class="icon_img"><br>
    		<input type="submit" name="submit" value="問診票編集" class="icon_sbm">
        </button>
	  </form> 

    <form action="{{action('App\Http\Controllers\mailController@move')}}" method="POST"  class="form_icon "  > 
           	 @csrf
        <button type="submit" class="icon_btn icon_badge" id="icon_badge" data-num="1">
        <img src="{{ asset('img/お知らせ.png') }}" class="icon_img"><br>
    		<input type="submit" name="submit" value="お知らせ"  class="icon_sbm">
        </button>
	  </form>

    <form action="{{action('App\Http\Controllers\optionController@move')}}" method="POST"  class="form_icon"> 
           	 @csrf
        <button type="submit" class="icon_btn" >
        <img src="{{ asset('img/設定.png') }}"  class="icon_img"><br>
    		<input type="submit" name="submit" value="その他" class="icon_sbm">
        </button>
	  </form>
</div>


<br>
<br>

<div align="left">
  通知件数の増減
  <button id="plus">+1</button>
  <button id="minus">-1</button>
</div>



<!--カレンダー-->
<div class="container-calendar" align="right">
          <h4 id="monthAndYear"></h4>
          <div class="button-container-calendar">
              <button id="previous" onclick="previous()">‹</button>
              <button id="next" onclick="next()">›</button>
          </div>
          
          <table class="table-calendar" id="calendar" data-lang="ja">
              <thead id="thead-month"></thead>
              <tbody id="calendar-body"></tbody>
          </table>
          
          <div class="footer-container-calendar">
              <label for="month">日付指定：</label>
              <select id="month" onchange="jump()">
                  <option value=0>1月</option>
                  <option value=1>2月</option>
                  <option value=2>3月</option>
                  <option value=3>4月</option>
                  <option value=4>5月</option>
                  <option value=5>6月</option>
                  <option value=6>7月</option>
                  <option value=7>8月</option>
                  <option value=8>9月</option>
                  <option value=9>10月</option>
                  <option value=10>11月</option>
                  <option value=11>12月</option>
              </select>
              <select id="year" onchange="jump()"></select>
          </div>
    </div>

    <script src="js/calendar.js" type="text/javascript"></script>

<!--通知件数-->
<script>
    const icon = document.getElementById('icon_badge');

document.getElementById('plus').addEventListener('click', () => icon_badge.dataset.num++ );
document.getElementById('minus').addEventListener('click', () => icon_badge.dataset.num > 0 && icon_badge.dataset.num-- );
</script>
<!------------------------------------------------------------------------------------------------------------------->
      <canvas id="myChart" width="900" height="380"></canvas><!--class="my-4 w-100"  少し下にスクロールできる-->

     


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dashbord.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>