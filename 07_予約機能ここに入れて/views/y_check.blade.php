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

  </head>
  <body>
    
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand1 col-md-3 col-lg-2 me-0 px-3 a1">ユーザ名</a>

  <ul class="nav pull-right">
  <li class="nav-item">
      <a class="nav-link text-white" href="#">
      <form action="{{url('/logout')}}" method="get"  class="form">
                     @csrf
            <input type="submit" name="submit" value="ホーム" class="btn1" />
            </form>
        </a>
    </li>
    <li class="nav-link text-white" href="#">
    <form action="{{url('/user_logout')}}" method="get"  class="form">
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
        <ul class="nav flex-column">
            <h6 class="text-primary" style="padding:5px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
              <i class="bi bi-list"></i>メニュー
            </h6>
        <li class="nav-item">

            <a class="nav-link" href="/test/errorPrint">
                <span data-feather="file"></span>
                予約
            </a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
               履歴
            </a>
          </li>
        
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
         <li><a href="#step-4">4<br><small></small></a></li>
         <li><a href="#step-5">5<br><small></small></a></li>
         <li class="active"><a href="#step-6">6<br><small></small></a></li>
         <li><a href="#step-7">7<br><small></small></a></li>
        </ul>
      </div>

        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div> 
　　　</div>
<form action="{{url('/today_comp')}}" method="post"> 
        @csrf

        <?php $today = date('Y/m/d');
      $hospital = Session::get('today_hospital');?>

<br>
<p>以下の予定でよろしいですか？</P>
    <br>
    <div class="clskwe7b4eq">
    <div class="tbl">
      <table align="center">
        <tr>
          <th>指定日</th>
          <td>{{ $today }}</td>
        </tr>
        <tr>
          <th>指定場所</th>
          @foreach($hospital as $list)
          <td>{{ $list['hospital_name'] }}</td>
          @endforeach
        </tr>
        <tr>
          <th>指定時間</th>
          <td>{{ Session::get('today_time') }}</td>
        </tr>
      </table>
    </div>
  </div>
    
<br>
<br>
<input type="button" name="button" value="戻る" class="custom-btn btn-2" onClick="history.back()"/>

        <input type="submit" name="submit" value="予約する" class="custom-btn btn-4_1"/>
</form>




<script>
history.forward();
</script>





<!------------------------------------------------------------------------------------------------------------------->
    

     


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dashbord.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>