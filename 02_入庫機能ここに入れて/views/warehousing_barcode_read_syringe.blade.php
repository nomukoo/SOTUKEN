<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>注射器バーコード読み取り画面</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/table.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/progressbar.css') }}" />
    

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
    <link href="/css/footer.css" rel="stylesheet">
    <!-- バーコード読み取りスクリプト -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/barcode_read_syringe.js') }}"></script>
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand1 col-md-3 col-lg-2 me-0 px-3 a1">ワクチン在庫管理システム</a>
  
  <ul class="nav pull-right">
  <li class="nav-item">
      <a class="nav-link text-white" href="#">
      <form action="{{action('TopController@disp_top')}}" method="get"  class="form"> 
                     @csrf
            <input type="submit" name="submit" value="ホーム" class="btn1" />
      </form>
      </a>
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
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              <form action="{{action('WarehousingController@disp_read')}}" method="GET"  class="form"> 
                     @csrf
            <input type="submit" name="submit" value="入庫" class="btn2" />
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{action('ShipController@disp_read')}}" method="POST"  class="form"> 
                     @csrf
                    <input type="submit" name="submit" value="出庫" class="btn2"/>
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              <form action="{{action('LogController@disp_log')}}" method="POST"  class="form"> 
                     @csrf
                    <input type="submit" name="submit" value="履歴" class="btn2"/>
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              <form action="{{action('TopController@disp_top')}}" method="get"  class="form"> 
                     @csrf
                    <input type="submit" name="submit" value="受付" class="btn2"/>
            </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              <form action="{{action('TopController@disp_top')}}" method="get"  class="form"> 
                     @csrf
                    <input type="submit" name="submit" value="在庫閲覧" class="btn2"/>
            </form>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

   <div id="smartwizard" class="sw-theme-arrows">
    <ul class="nav nav-tabs step-anchor">
    <li class="active"><a href="#step-1">読取<br><small></small></a></li>
    <li><a href="#step-2">確認<br><small></small></a></li>
    <li><a href="#step-3">印刷<br><small></small></a></li>
    <li><a href="#step-4">完了<br><small></small></a></li>
  </ul>
</div>     

        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
<br>
<h2>注射器バーコード読み取り画面</h2>
<h4>＊注射器包装のバーコードをスキャンしてください</h4>
    <br> 
    <form id="frm" name="frm" method="get" action="">
    <!--<div>新しい行を追加：<input type="button" id="add" name="add" value="追加" onclick="appendRow()"></div>-->
    <table border="1" id="tbl">
    <thread>
    <tr>
    <th style=" width:200px;">商品ID</th>
        <th style="width:300px;">名称</th>
        <th style="width:100px;">有効期限</th>
        <th style="width:100px;">ロット番号</th>
        <th style="width:150px">数量(本数)</th>
        
    </tr>
    </thread>
    <tbody id='tbody1'>
    </tbody>
    </table>

<br>
    
<input type="button"  name="del" value="取消" class="custom-btn btn-2" id="del"/>

    
<input type="button" name="confirm" value="確認" class="custom-btn btn-3" id="send" />
<br>
<br>
<p>*全ての商品のスキャンが完了したら確認ボタンを押下してください</p>
<p>*取消ボタンを押すことで最後のスキャンを取り消すことができます</p>


<script>
        /* サーバに入力データをajaxでPOST */
<?php 
$emp_info = session()->get('emp_Info'); 
$emp_info = json_encode($emp_info);
?>
let emp_info = JSON.parse('<?php echo $emp_info; ?>');
$(function(){
    $("#send").click(function(){
      if(isEmpty(records)){
        alert('Error:商品が読み込まれていません');
      } else {
        let today = new Date();
        date_txt = today.getFullYear() + "/" +  (today.getMonth() + 1) + "/"+ today.getDate();
        let header = {'staff_ID': emp_info['staff_name'],'hospital_ID': emp_info['hospital_ID'],'date': date_txt};
        records['nyuko_header'] = header;
        let jsonObj = JSON.stringify(records);
        console.log(jsonObj);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $.ajax({
            type: "POST",
            url: "/warehousing_ajax",
            data: jsonObj,
            dataType: "json",
            contentType: "application/json"
        }).done(function(data){
            //通信成功時次の画面に遷移
            window.location.href= "/warehousing_confirm_syringe";
        }).fail(function(XMLHttpRequest, status, e){
            //エラー
            alert(e);
        });
      }
    });
});

$('#del').on('click', function(){
      if(isEmpty(records)){

      } else {
        var last_command = command_log_array[command_log_array.length - 1];
        command_log_array.pop();
        if(last_command['duplicate'] == 0){
            delete records[last_command['cnt']];
            cnt = cnt - 1;
            print_rec(records);
        } else {
            let tmp = records[last_command['cnt']];
            tmp['amount'] -= last_command['amount'];
            records[last_command['cnt']] = tmp;
            print_rec(records);
        }
      }
    });

    function isEmpty(obj){
      return !Object.keys(obj).length;
    }
    </script>
<!---------------------------------------------------------------------------------------->
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dashbord.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>