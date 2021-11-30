<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>履歴一覧</title>
aaaaaaaaaaaaa
    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    

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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">管理者画面</a>
  
  <ul class="nav pull-right">
  <li class="nav-item">
      <a class="nav-link text-white" href="#">ホーム</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white"href="#">サインアウト</a>
    </li>
  </ul>
</header>



<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page">
              <span data-feather="home"></span>
              メニュー
            </a>
          </li>
          <li class="nav-item">

            <a class="nav-link" href="/test/errorPrint">
              <span data-feather="file"></span>
              入庫
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              
              出庫
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              履歴
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              受付
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              在庫閲覧
            </a>
          </li>
        </ul>

       
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              システム管理
            </a>
          </li>
         
         
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">履歴一覧</h1>
        
        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
    </div>
    

    <div class="box2">
    <div class="container">
    
    <canvas id="myBarChart" ></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

  <script>
  var ctx = document.getElementById("myBarChart");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['10代', '20代', '30代', '40代', '50代', '60代', '70代','80代以上'],
      datasets: [
        {
          label: 'ワクチン接種人数',
          data: [72, 73, 75, 81, 88, 89, 89, 94],
          backgroundColor: "rgba(127,255,143,0.6)"
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'ワクチン接種年齢別'
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMax: 100,
            suggestedMin: 0,
            stepSize: 10,
            callback: function(value, index, values){
              return  value +  '人'
            }
          }
        }]
      },
    }
  });
  </script>
 
    <div class="v_line_fix"></div>

<div class="container container-wrap">
  <div class="font-small">少なくとも1回接種</div>

  <div class="font-large">9867万1017人</div>
<div class="dotted"> </div>

  <div class="font-small">少なくとも2回接種</div>
  <div class="font-large">9414万4252人</div>

  <div class="font-small">累計接種回数</div>
  <div class="font-large">1億9309万5269回</div>
</div>
<style>
#myBarChart {max-width:840px;max-height:580px;}
</style>   


</div>
</div>
<div class="box">
<button type="button" class="btn btn-danger" onclick="history.back(-1)">戻る</button>
</div>
  


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dashbord.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>

  </body>
</html>
