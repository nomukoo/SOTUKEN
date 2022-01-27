<!-- 病院情報入力画面 -->

<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>病院情報入力</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    

    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  
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
    <link href="/css/hospital.css" rel="stylesheet">
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
        <h1 class="h1">病院情報入力画面</h1>
        <div id="smartwizard" class="sw-theme-arrows">
        <ul class="nav nav-tabs step-anchor">
         <li class="active"><a>病院情報入力<br><small></small></a></li>
         <li ><a>入力確認<br><small></small></a></li>
         <li><a>登録完了<br><small></small></a></li>
        </ul>
      </div>
        
        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
    </div>



    <form action="{{url('/hospitalinputverifi')}}" method="post"  class="row g-4 needs-validation" novalidate>
      @csrf
      <div class="col-md-4">
        <label for="hospital_ID" class="form-label">ID</label>
        <input type="text" class="form-control" name="hospital_ID" required>
        <div class="col-sm-10"></div>
          <div class="invalid-feedback">
            IDを入力してください
          </div>
          <div class="valid-feedback">
            OK!
          </div>
        </div>

      <div class="col-md-4">
        <label for="hospital_name" class="form-label">病院名</label>
        <input type="text" class="form-control" name="hospital_name"  required>
        <div class="invalid-feedback">
          病院名を入力してください
        </div>
        <div class="valid-feedback">
           OK!
        </div>
      </div>

  <div class="col-md-8">
    <label for="hospital_address" class="form-label">住所</label>
   
      <input type="text" class="form-control" name="hospital_address" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        住所を入力してください
      </div>
      <div class="valid-feedback">
      OK!
    </div>
  </div>

  <div class="col-md-4">
    <label for="hospital_tell" class="form-label">電話番号</label>
    <input type="tel" class="form-control" name="hospital_tell" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}" placeholder="例: ○○○-××××-○○○○" required>
    <div class="invalid-feedback">
      電話番号を入力してください
    </div>
    <div class="valid-feedback">
      OK!
    </div>
  </div>

  <div class="col-md-4">

    <label for="hospital_idokeido" class="form-label">緯度</label>
    <input type="text" class="form-control" name="hospital_ido" pattern="\d{1,4}.\d{1,8}" placeholder="例: 34.380846"required>
    <div class="invalid-feedback">
      緯度を入力してください
    </div>
    <div class="valid-feedback">
      OK!
    </div>
  </div>
  <div class="col-md-4">
    <label for="hospital_idokeido" class="form-label">経度</label>
    <input type="text" class="form-control" name="hospital_keido" pattern="\d{1,4}.\d{1,8}" placeholder="例: 132.454321"required>
    <div class="invalid-feedback">

      経度を入力してください
    </div>
    <div class="valid-feedback">
      OK!
    </div>
  </div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        正しく入力できていればチェックしてください
      </label>
      <div class="invalid-feedback">
        チェックできていません
      </div>
    </div>
  </div>
  <div class="m-5">
   

</div>
  <div class="text-center">
  <div class="d-flex justify-content-md-center">
    <div class="col-1">



<button type="button" class="btn btn-danger rounded-pill " style="width:90px" onclick="history.back(-1)"><h4>戻る</h4></button></div>
<div class="col-1">
<button class="btn btn-success rounded-pill" type="submit" style="width:90px"  > <h4>確認</h4></button>
    </div>
    </div>
</form>
    
    <script src="{{ asset('/js/hospitalregister.js') }}"></script>

            
    </div>      
    </div>
    </div>
  </body>
</html>