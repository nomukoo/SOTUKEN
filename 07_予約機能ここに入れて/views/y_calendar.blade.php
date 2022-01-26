<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>予約カレンダー</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
  　<link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/y_calendar.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/progressbar.css') }}" />
    

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



<!--カレンダー-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <style>
    .ui-widget {
    font-family: Arial,Helvetica,sans-serif;
    font-size: 25px;
    margin:10px;
    width:50%
    }
    /* 日曜日のカラー設定 */
td.ui-datepicker-week-end:first-child a.ui-state-default{
  background-color: #ffecec;   /* 背景色を設定 */
  color: #f00!important;       /* 文字色を設定 */
}
/* 土曜日のカラー設定 */
td.ui-datepicker-week-end:last-child a.ui-state-default{
  background-color: #eaeaff;   /* 背景色を設定 */
  color: #00f!important;       /* 文字色を設定 */
}
/* ホバー時の動作 */
td.ui-datepicker-week-end a.ui-state-hover{
  opacity: 0.8;
}
/* 当日を示す色はそのまま */
td.ui-datepicker-week-end a.ui-state-highlight{
  background-color: #fffa90!important;
}

.ui-widget-content .ui-datepicker-today .ui-state-default{
  opacity: 1 !important;
  background:yellow;
  border: 1px solid yellow;
}

.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
    border: 1px solid #c5c5c5;
    font-weight: normal;
    background:#f6f6f6;
    color: #000;
}
  </style>

  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand1 col-md-3 col-lg-2 me-0 px-3 a1">{{ Session::get('userID') }}</a>
  
  <ul class="nav pull-right">
  <li class="nav-item">
      <a class="nav-link text-white" href="#">
      <form action="{{url('/home')}}" method="get"  class="form"> 
                     @csrf
            <input type="submit" name="submit" value="ホーム" class="btn1" />
      </form>
      </a>
    </li>
    <li class="nav-link text-white" href="#">
    <form action="{{url('/home')}}" method="get"  class="form"> 
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
              <form action="{{url('/home')}}" method="POST"  class="form"> 
            	@csrf
    		<input type="submit" name="submit" value="予約" class="btn2"/>
    	      </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{url('/home')}}" method="POST"  class="form"> 
           	 @csrf
    		<input type="submit" name="submit" value="履歴" class="btn2"/>
	      </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{url('/home')}}" method="POST"  class="form"> 
           	 @csrf
    		<input type="submit" name="submit" value="接種券番号表示" class="btn2"/>
	      </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{url('/home')}}" method="POST"  class="form"> 
           	 @csrf
    		<input type="submit" name="submit" value="お知らせ" class="btn2"/>
	      </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{url('/home')}}" method="POST"  class="form"> 
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
         <li class="active"><a href="#step-2">2<br><small></small></a></li>
         <li><a href="#step-3">3<br><small></small></a></li>
        <li><a href="#step-4">4<br><small></small></a></li>
        <li><a href="#step-5">5<br><small></small></a></li>
        <li><a href="#step-6">6<br><small></small></a></li>
        <li><a href="#step-7">7<br><small></small></a></li>
        </ul>
      </div>


        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
　　　</div>





    <div id="datepicker" align="center">
      <br>
      <form action="{{url('/hospitals')}}" method="POST"  style="display:inline-flex;"> 
           	 @csrf
        <input type="text" id="date_val" name="date_val" placeholder="日付を選択してください" style="font-size:20px;" readonly >
        <input type="reset" value="リセット">
    		<input type="submit" name="submit" value="予約する" />
	    </form>
    </div>
    <br>
    <br>
<script>
$(function() {
    $("#datepicker").datepicker({

      minDate: 1,
        // 日付が選択された時、日付をテキストフィールドへセット
        onSelect: function(dateText, inst) {
                    $("#date_val").val(dateText)  }
    });
    
});


</script>
<input type="button" name="button" value="戻る"  class="custom-btn btn-1"  onClick="history.back()"/>

<script src="https://rawgit.com/jquery/jquery-ui/master/ui/i18n/datepicker-ja.js"></script>
<!------------------------------------------------------------------------------------------------------------------->
      

     


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dashbord.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>