<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>希釈入力画面</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js" integrity="sha256-tcqPYPyxU+Fsv5sVdvnxLYJ7Jq9wWpi4twZbtZ0ubY8=" crossorigin="anonymous"></script> 


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
    <link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
    <link href="/css/dilution.css" rel="stylesheet">


  </head>
  <body>
  

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
<div class="text-light ">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">○○病院</a>
    </div>
    <ul class="nav pull-right">
  <li class="nav-item">
      <a class="nav-link text-white" href="#">
      <form action="{{url('/top')}}" method="get"  class="form">
                     @csrf
            <input type="submit" name="submit" value="ホーム" class="btn1" />
      </form>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white"href="#">
      <form action="{{url('/top')}}" method="POST"  class="form">
                     @csrf
            <input type="submit" name="submit" value="サインアウト" class="btn1" />
            </form>
    </a>
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
            <a class="nav-link" >
              <span data-feather="file"></span>
              <form action="{{url('/top')}}" method="POST"  class="form">
                     @csrf
            <input type="submit" name="submit" value="入庫" class="btn2" />
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" >
              <span data-feather="shopping-cart"></span>
              <form action="{{url('/top')}}" method="POST"  class="form">
                     @csrf
                    <input type="submit" name="submit" value="解凍" class="btn2"/>
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" >
              <span data-feather="users"></span>
              <form action="{{url('/top')}}" method="POST"  class="form">
                     @csrf
                    <input type="submit" name="submit" value="希釈" class="btn2"/>
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <span data-feather="bar-chart-2"></span>
              <form action="{{url('/top')}}" method="get"  class="form">
                     @csrf
                    <input type="submit" name="submit" value="廃棄" class="btn2"/>
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <span data-feather="bar-chart-2"></span>
              <form action="{{url('/top')}}" method="get"  class="form">
                     @csrf
                    <input type="submit" name="submit" value="出庫予定リスト" class="btn2"/>
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <span data-feather="bar-chart-2"></span>
              <form action="{{url('/top')}}" method="get"  class="form">
                     @csrf
                    <input type="submit" name="submit" value="受付" class="btn2"/>
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" >
              <span data-feather="layers"></span>
              <form action="{{url('/top')}}" method="get"  class="form">
                     @csrf
                    <input type="submit" name="submit" value="病院情報登録" class="btn2" />
            </form>
            </a>
          </li>
        </ul>
      </div>
    </nav>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">希釈数入力</h1>
        <div id="smartwizard" class="sw-theme-arrows">
        <ul class="nav nav-tabs step-anchor">
        <li class="active"><a>希釈数入力<br><small></small></a></li>
         <li><a>登録完了<br><small></small></a></li>
        </ul>
      </div>
        

        
        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
    </div>

    <div class="m-5">
    </div>
    
    <div class="text-center">
    <div class="text-danger">
    <h2 color="red">本日の必要なバイアル数</h2>
    </div>
    </div>


    <div class="m-5">
    <div class="text-center">
    <table class="table table-bordered border-dark" > 
    
    
    <tbody>
    <tr>
      <th scope="col"class="table-dark border-dark">解凍ID</th>
      <th scope="col"class="table-dark border-dark">ワクチンID</th>
      <th scope="col"class="table-dark border-dark">ロット番号</th>
      <th scope="col"class="table-dark border-dark">病院ID</th>
      <th scope="col"class="table-dark border-dark">解凍日</th>
      <th scope="col"class="table-dark border-dark">有効期限</th>
      <th scope="col"class="table-dark border-dark">数量</th>
      
    </tr>
    @foreach ($defrost_lists as $defrost_list)
  <tr>
  <td scope="row" class="table-white border-dark" >{{  $defrost_list->defrost_ID }}</td>
  <td scope="row" class="table-white border-dark" >{{  $defrost_list->wakuchin_ID }}</td>
  <td scope="row" class="table-white border-dark" >{{  $defrost_list->lot_number }}</td>
  <td scope="row" class="table-white border-dark" >{{  $defrost_list->hospital_ID }}</td>
  <td scope="row" class="table-white border-dark" >{{  $defrost_list->defrost_date }}</td>
  <td scope="row" class="table-white border-dark" >{{  $defrost_list->expair }}</td>
  <td scope="row" class="table-white border-dark" >{{  $defrost_list->defrost_total }}</td>
  
    </tr>
    @endforeach
    </tbody>
</table>

</div>


<div class="m-5">
</div>

<form class="row g-4 needs-validation" action="{{url('/dilution_finish')}}" method="post" name="dilutionform" novalidate>
  @csrf
  <div class="d-flex justify-content-md-center">
  
    <div class="col-md-4">
    <label for="validationCustom01" class="form-label">バイアル数入力</label>
    <input type="text" class="form-control" name="vial_quantity"  style="width:300px" pattern="^[0-9]+$" required>
    <div class="invalid-feedback">
      個数を入力してください
    </div>
    <div class="valid-feedback">
      OK!
    </div>
    </div>
    </div>
    </div>
  
    <div class="m-4">
</div>



<div class="text-center">
  <div class="d-flex justify-content-md-center">
    <div class="col-1">
<button type="button" class="btn btn-danger rounded-pill " style="width:90px" onclick="history.back(-1)"><h4>戻る</h4></button></div>
<div class="col-2">
<button class="btn btn-success rounded-pill" type="submit" style="width:90px" onclick="confirm_alert(event);return false;" > <h4>確定</h4></button>
    </div>
    </div>
    </form>


    
    

  


    
    <script src="{{ asset('/js/dilution.js') }}"></script>
    <script src="{{ asset('/js/dilution_confirm.js') }}"></script>


  </body>
</html>