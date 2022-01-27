<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <meta id="csrf-token" content="{{ csrf_token() }}">
    <title>解凍状態管理帳票印刷画面</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   


    <!-- Bootstrap  core CSS -->
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
    <link href="/css/defrost.css" rel="stylesheet">
    <link href="/css/loader.css" rel="stylesheet">
    <link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
  </head>
  <body>

<?php 
          $emp_info = session()->get('emp_Info');
          $json_emp_info = json_encode($emp_info);
          $wakuchin_list = session()->get('defrost_wakuchin_list');
          $json_wakuchin_list = json_encode($wakuchin_list);
?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand1 col-md-3 col-lg-2 me-0 px-3 a1" style="color: white">ワクチン在庫管理システム</a>
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
<a class="nav-link" href="shipping_list">
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
        <h1 class="h1">管理帳票印刷画面</h1>
        <div id="smartwizard" class="sw-theme-arrows">
        <ul class="nav nav-tabs step-anchor">
        <li><a>解凍一覧<br><small></small></a></li>
        <li ><a>解凍数登録<br><small></small></a></li>
         <li class="active"><a>印刷<br><small></small></a></li>
         <li ><a>解凍登録完了<br><small></small></a></li>
        </ul>
      </div>
        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
    </div>
    
    <h4>印刷する帳票の枚数を指定してください</h4>
    <div class="m-5">
    </div>
    <div class="m-5">
    <div class="text-center">
<div class="d-flex justify-content-center">
    <div class="wrapper">
<div class="print-page">
    <table class="table table-bordered border-dark"  > 
    <tbody id='wakuchin_list'>
    <tr>
      <th scope="col"class="table-dark border-dark">商品コード</th>
      <th scope="col"class="table-dark border-dark" >品名</th>
      <th scope="col"class="table-dark border-dark">ロット番号</th>
      <th scope="col"class="table-dark border-dark">解凍数</th>
      <th scope="col"class="table-dark border-dark">枚数</th>
    </tr>
    </tbody>
    </table>
    <table style="margin:auto">
<tr>
<td><div class="print-btn btn-info rounded-pill" style="width:200px" id="send_print" >印刷して出庫を完了</div></td>
<td><div class="print-btn btn-info rounded-pill" style="width:200px"id="no-print" >印刷をスキップして完了</div></td>
</tr>
</table>  
</div>
</div>
</div>
</div>
    <?php 
          $emp_info = session()->get('emp_Info');
          $json_emp_info = json_encode($emp_info);
          $wakuchin_list = session()->get('defrost_wakuchin_list');
          $json_wakuchin_list = json_encode($wakuchin_list);
    ?>
    <script>
      let emp_info = JSON.parse('<?php echo $json_emp_info ?>');
      let wakuchin_list = JSON.parse('<?php echo $json_wakuchin_list?>');

      $('#no-print').on("click",gotoDefrostFinish);
      function gotoDefrostFinish(){
        window.location.href = "/defrost_finish";
      }
      window.addEventListener('load', function(){
    dispItemInfo(wakuchin_list);
});



function dispItemInfo(obj){
    let col = '<tr><div class="col-md-4">';
    let cnt = 0;
    obj.forEach(function(rec){
        col += '<td scope="row" class="table-white border-dark" >' + rec['code'] + '</td>';
        col += '<td scope="row" class="table-white border-dark" >' + rec['name'] + '</td>';
        col += '<td scope="row" class="table-white border-dark" >' + rec['lot'] + '</td>';
        col += '<td scope="row" class="table-white border-dark" >' + rec['amount'] + '</td>';
    })
    col += '<td scope="row" class="table-white border-dark" style="width:80px">' + '<input type="text" class="form-control" id=' + cnt + ' value="1"' + ' style="width:50px,text-align:right"  pattern="^[0-9]+$" required>' + 
    '<div class="invalid-feedback">' + '個数を入力してください' + '</div>' + '<div class="valid-feedback">' + 'OK' + '</div>' + '</div>' + '</td>' + '</tr>';
    $('#wakuchin_list').append(col);
    cnt++;
}

function createSendPrintData(){
    let printdata = {};
    printdata['print_id'] = 3;
    let next_month = getNextMonth();
    next_month = next_month.toISOString().substring(0,10);
    let current_date = getCurrentDate();
    current_date = current_date.toISOString().substring(0,10);
    header = {
      staff_ID: emp_info['staff_name'],
      next_month: next_month,
      current_date: current_date
    };
    printdata['header'] = header;
    let cnt = 0;
    wakuchin_list.forEach(function(rec){
        rec['print_num'] = $("#" + cnt).val();
        printdata[cnt] = rec;
    })
    return printdata;
}

function getNextMonth(){
  let date = new Date()
  let next_month = new Date(date.getFullYear(), date.getMonth()+2, date.getDate());
  return next_month;
}

function getCurrentDate(){
  let date = new Date()
  let current_month = new Date(date.getFullYear(), date.getMonth()+1, date.getDate());
  return current_month;
}


function dispLoading(msg){
    if(msg == undefined){
        msg = "";
    }

    let dispMsg = "<div class='loadingMsg'>" + msg + "</div>";

    if($("#loading").length == 0){
        $("body").append("<div id='loading'>" + dispMsg + "</div>");
    }
}

function removeLoding(){
    $("#loading").remove();
    window.location.href = "/defrost_finish";
}

$('#send_print').on('click', function(){
    dispLoading('印刷中です、しばらくお待ちください');
    var ws = new WebSocket("ws://localhost:9999");//WebSocket接続
    ws.onopen = function(event){
        let printdata = createSendPrintData();
        let sendJson = JSON.stringify(printdata);
        ws.send(sendJson);//接続成功直後にデータを送信
        
    }
    /*印刷処理終了後WebSocketサーバからメッセージが帰ってくる*/
    ws.onmessage = function(message){
        ws.close(); //WebSocket切断
        removeLoding();
    }
});
    </script>
  </body>
</html>