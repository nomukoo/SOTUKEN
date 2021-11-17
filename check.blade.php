<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>確認画面（入庫）</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
  　<link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
  　<link rel="stylesheet" href="{{  asset('css/progressbar.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/table.css') }}" />

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
  	<a class="navbar-brand1 col-md-3 col-lg-2 me-0 px-3 a1">○○病院</a>
  
  	<ul class="nav pull-right">
  	<li class="nav-item">
		<a class="nav-link text-white" href="#">
			<form action="{{action('App\Http\Controllers\topController@move')}}" method="get"  class="form"> 
				@csrf
				<input type="submit" name="submit" value="ホーム" class="btn1" />
			</form>
		</a>
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
          <br>
          <br>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              <form action="{{action('App\Http\Controllers\ReadController@move')}}" method="POST"  class="form"> 
                     @csrf
            	<input type="submit" name="submit" value="入庫" class="btn2" />
              </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{action('App\Http\Controllers\read_outController@move')}}" method="POST"  class="form"> 
                     @csrf
                    <input type="submit" name="submit" value="出庫" class="btn2"/>
              </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              <form action="{{action('App\Http\Controllers\logController@move')}}" method="POST"  class="form"> 
                     @csrf
                    <input type="submit" name="submit" value="履歴" class="btn2"/>
              </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              <form action="{{action('App\Http\Controllers\topController@move')}}" method="get"  class="form"> 
                     @csrf
                    <input type="submit" name="submit" value="受付" class="btn2"/>
              </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              <form action="{{action('App\Http\Controllers\topController@move')}}" method="get"  class="form"> 
                     @csrf
                    <input type="submit" name="submit" value="在庫閲覧" class="btn2"/>
              </form>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       
		<div id="smartwizard" class="sw-theme-arrows">
  	    	<ul class="nav nav-tabs step-anchor">
    	    	<li><a href="#step-1">読取<br><small></small></a></li>
    	    	<li><a href="#step-2">出力<br><small></small></a></li>
    	    	<li class="active"><a href="#step-3">確認<br><small></small></a></li>
    	    	<li><a href="#step-4">印刷<br><small></small></a></li>
    	    	<li><a href="#step-5">完了<br><small></small></a></li>
	    	</ul>
		</div>
        <div class="btn-toolbar mb-2 mb-md-0">
          
	</div>
<br>

    <form id="frm" name="frm" method="get" action="">
    <!--<div>新しい行を追加：<input type="button" id="add" name="add" value="追加" onclick="appendRow()"></div>-->
    <table border="1" id="tbl">
    <tr>
        <th style=" width:90px;">入庫ID</th>
        <th style="width:90px;">ワクチンID</th>
        <th style="width:90px;">注射器ID</th>
        <th>数量/本</th>
        <th>製造元</th>
        <th>有効期限</th>
    </tr>
    <tr>
        <td style=" width:40px;"><span class="seqno">1</span></td>
        <td value="" size="30" style="border:1px solid #888;">・・・</td>
        <td value="" size="30" style="border:1px solid #888;">・・・</td>
        <td style=""><input class="inpval" type="number" id="a1" name="a1"   value=""  style="border:1px solid #888;"　min="1" max="5" readonly></td>
        <td style=""><input class="inpval" type="text" id="b1" name="b1"   value=""  style="border:1px solid #888;" pattern="[ぁ-ヺ]"　title="ひらがな・カタカナで入力" readonly></td>
        <td style=""><input class="inpval" type="date" id="c1" name="c1"   value=""  style="border:1px solid #888;" min="2021-11-1" readonly></td>
       
    </tr>
    </table>
   
</form>
<br>
<input type="submit" name="submit" value="戻る" class="custom-btn btn-1" onClick="history.back()"/>
<form action="{{action('App\Http\Controllers\del_outController@move')}}" method="post"  class="form"> 
    @csrf
<input type="submit"  name="submit" value="削除" class="custom-btn btn-2"　/>
</form>
<form action="{{action('App\Http\Controllers\LoadController@move')}}" method="post"  class="form"> 
    @csrf
    <input type="submit" name="submit" value="印刷" class="custom-btn btn-3"/>
</form>



<!------------------------------------------------------------------------------------------------>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

     


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dashbord.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>