<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
     <meta id="csrf-token" content="{{ csrf_token() }}">
    <title>ホーム_病院側</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/calendar.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/top.css') }}" />

    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" >

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('js/comet.js') }}"></script>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->

  </head>
  <body>
<?php 
  $emp_info = session()->get('emp_Info');
  $json_emp_info = json_encode($emp_info);
?>
<script>
  let emp_info = JSON.parse('<?php echo $json_emp_info; ?>')
</script>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand1 col-md-3 col-lg-2 me-0 px-3 a1">ワクチン在庫管理システム</a>
  <ul class="nav pull-right">
  <li class="nav-item">
  <a class="nav-link text-white"href="#">{{'ログイン中: '}}{{$emp_info['staff_name']}}</a>
  </li>
  <li class="nav-item">
      <a class="nav-link text-white" href="#">
      <form action="{{url('/')}}" method="get"  class="form">
                     @csrf
            <input type="submit" name="submit" value="ホーム" class="btn1" />
      </form>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white"href="{{ url('/emp_logout')}}">サインアウト</a>
    </li>
  </ul>
    </header>
    <div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <h6 class="text-primary" style="padding:5px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                メニュー
              </h6>
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">入庫</a>
          <span data-feather="shopping-cart"></span>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
                <a class="dropdown-item" id="itm" href="/barcoderead">ワクチン入庫</a>
                <a class="dropdown-item" id="itm" href="/barcode_read_syringe">注射器入庫</a>
            </div>
          </li>
<li class="nav-item">
<a class="nav-link" href="/defrost_read">
  <span data-feather="shopping-cart"></span>
  出庫登録
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/defrost_list">
  <span data-feather="users"></span>
  出庫予定閲覧
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/dilution_read">
  <span data-feather="users"></span>
  希釈登録
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/PlannedDisposal">
  <span data-feather="users"></span>
  廃棄登録
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/">
  <span data-feather="users"></span>
  在庫一覧
</a>
</li>
@if ($emp_info['role'] == 0)
<li class="nav-item">
<a class="nav-link" href="hospitalinput">
  <span data-feather="users"></span>
  従業員登録
</a>
</li>
@endif    
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<!--バナー-->


    <div class="news-banner">
        <div class="news-banner__content">
            <p id='banner_text'>本日出庫予定のワクチンはありません。</p>
        </div>
    </div>

        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
      </div>

<!--画像-->
<div class="img">
  <ul class="slider_fade">
    <li><img src="{{ asset('img/診察室.jpg') }}" class="img-1"  align="left"></li>
    <li><img src="{{ asset('img/待合室.jpg') }}" class="img-1"  align="left"></li>
    <li><img src="{{ asset('img/聴診器.jpg') }}" class="img-1"  align="left"></li>
  </ul>
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
    <script>
      $(".news-banner").on('click',function(){
        window.location.href = "/defrost_list";
      });
    </script>

<!------------------------------------------------------------------------------------------>
      <canvas  id="myChart" width="900" height="280"></canvas>




    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dashbord.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
