<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>問診票</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
  　<link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/progressbar.css') }}" />
    <link rel="stylesheet" href="{{  asset('css/monsin.css') }}" />

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
    		<input type="submit" name="submit" value="予約" class="btn2"/>
    	      </form>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              <form action="{{action('App\Http\Controllers\log2Controller@move')}}" method="POST"  class="form"> 
           	 @csrf
    		<input type="submit" name="submit" value="履歴" class="btn2"/>
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
              <form action="{{action('App\Http\Controllers\m_editController@move')}}" method="POST"  class="form"> 
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
      <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2  border-bottom"> <!--mb-3  進行状況の下のライン-->
      <div id="smartwizard" class="sw-theme-arrows">
        <ul class="nav nav-tabs step-anchor">
         <li><a href="#step-1">1<br><small></small></a></li>
         <li><a href="#step-2">2<br><small></small></a></li>
         <li><a href="#step-3">3<br><small></small></a></li>
         <li><a href="#step-4">4<br><small></small></a></li>
         <li class="active"><a href="#step-5">5<br><small></small></a></li>
         <li><a href="#step-6">6<br><small></small></a></li>
         <li><a href="#step-7">7<br><small></small></a></li>
        </ul>
      </div>

        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div> 
　　　</div>
<h2>問診票</h2>
<p>指定場所：？？？</p>
<?php
$today = date("Y/m/d");
?>
<p>指定日：<?php echo($today) ?></p>
<p>指定時間：？？？</p>
<br>
<br>
<p>新型コロナウイルスの感染拡大を防ぐために問診票の記入をしていただいています。
<br>ご理解とご協力のほどよろしくお願いします。</p>
<div class="clskw1i6vlu">
  <div class="tbl">
    <table>
      <tr>
        <td colspan="4" align="right">記入日:<input type="date" style="width: 15%"></td>
      </tr>
      <tr>
        <th>ふりがな</th>
        <td><input type="text" style="width: 100%" ></td>
        <th rowspan="2" style="width:10%"><input type="radio" name="gender">男<input type="radio" name="gender">女</th>
        <div name="check">
        <th rowspan="2">生年月日<br /><input type="radio" name="generation">大<input type="radio" name="generation">昭<input type="radio" name="generation">平<input type="radio" name="generation">令<input type="text" style="width: 50px">年<input type="text" style="width: 50px">月<input type="text" style="width: 50px">日</th>
      </div>
      </tr>
      <tr>
        <th>氏名</th>
        <td><input type="text" style="width: 100%" name="name"></td>
      </tr>
      <tr>
        <th>住所</th>
        <td colspan="3" align="left">〒<input type="text"  style="width: 30%" name="address"><br><input type="text"  style="width: 50%" name="address"></td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td colspan="3" align="left"><input type="tel" style="width: 50%" ></td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td colspan="3" align="left"><input type="email" style="width: 50%" ></td>
      </tr>
      <tr>
        <th colspan="2">来院時の体温（職員記入）</th>
        <td colspan="2">( <input type="text"  style="width: 30%">)℃</td>
      </tr>
    </table>
  </div>
</div>
<br>



<div class="clskw1lg3rg">
  <div class="tbl">
    <table>
      <tr align="left">
        <td >１）以下の症状はありますか？</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>３７．５℃以上の発熱</td>
        <td>（<input type="text" style="width: 30%">）℃</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><input type="checkbox">のどの痛み</td>
        <td><input type="checkbox">鼻水</td>
        <td><input type="checkbox">咳</td>
        <td><input type="checkbox">たん</td>
        <td><input type="checkbox">息苦しさ</td>
      </tr>
      <tr>
        <td><input type="checkbox">強いだるさ（倦怠感）</td>
        <td><input type="checkbox">臭いが分かりにくい</td>
        <td><input type="checkbox">味が分かりにくい</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><input type="checkbox">吐き気・嘔吐</td>
        <td><input type="checkbox">下痢</td>
        <td colspan="2"><input type="checkbox">その他（<input type="text" style="width: 70%">）</td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr align="left">
        <td colspan="2" >２）症状はいつ頃からありますか？</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2">本日の（<input type="text" style="width: 15%">）時から</td>
        <td>（<input type="text" style="width: 30%">）日前から</td>
        <td colspan="2">（<input type="text" style="width: 15%">）週間前から</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr align="left">
        <td colspan="4" >３）４週間以内に新型コロナウイルス陽性（疑いを含む）の方と濃厚接触（COCOAの通知を含む）がありましたか？</td>
        <td></td>
      </tr>
      <tr>
        <td><input type="radio" name="3">はい</td>
        <td><input type="radio" name="3">いいえ</td>
        <td><input type="radio" name="3">分からない</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr align="left">
        <td colspan="5" >（３の質問で「はい」を選んだ方へ）具体的に教えてください。</td>
      </tr>
      <tr>
        <td colspan="3" align="left"><input type="checkbox">感染者と同居、社内や航空機内等で、２メートル以内での長い時間の会話</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3" align="left"><input type="checkbox">マスクや手袋などの個人防護具なしで感染者の看護・介護をしていた。</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3" align="left"><input type="checkbox">感染が疑われる者の気道分泌物、体液等に直接触れた。</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="5" align="left"><input type="checkbox">その他（内容をご記入ください:<input type="text" style="width: 70%">）</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr align="left">
        <td colspan="2" >４）今回の症状が出る前の２週間以内に海外に行きましたか？</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><input type="radio" name="4">いいえ</td>
        <td colspan="4"><input type="radio" name="4">はい（国名をご記入ください:(内容をご記入ください:<input type="text" style="width: 50%">)<br /></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr align="left">
        <td colspan="2" >５）２週間以内に、流行地域の件に行きましたか？</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3">（例：北海道、茨城、埼玉、東京、神奈川、千葉、愛知、岐阜、大阪、京都、兵庫、福井、福岡）</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><input type="radio" name="5">いいえ</td>
        <td colspan="4"><input type="radio" name="5">はい（行った地域をご記入ください:（<input type="text" style="width: 50%">））</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr align="left">
        <td colspan="5"　>６）２週間以内に県内外によらず、いわゆる「３密」（換気の悪い密閉空間、多くの人の密集する場所、近距離での密接な会話）の機会はありましたか？</td>
      </tr>
      <tr>
        <td colspan="4">（例:複数人での飲食、家族以外の複数人での飲食、集会参加、集合しての運動、カラオケ、ライブ参加、パチンコ、マスクなしでの満員電車、満員のバスへの乗車など）</td>
        <td></td>
      </tr>
      <tr>
        <td><input type="radio" name="6">いいえ</td>
        <td><input type="radio" name="6">はい</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr align="left">
        <td colspan="2" >７）喫煙、飲酒について教えてください。</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>喫煙</td>
        <td align="left"><input type="radio" name="7">吸わない</td>
        <td colspan="2"align="left"><input type="radio" name="7">吸う（<input type="text" style="width: 20%">本/日×<input type="text" style="width: 20%">年間）</td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td colspan="3" align="left"><input type="radio" name="7">禁煙した（<input type="text" style="width: 10%">年前から。それまで喫煙（<input type="text" style="width: 10%">本/日×<input type="text" style="width: 10%">年間））</td>
        <td></td>
      </tr>
      <tr>
        <td>飲酒</td>
        <td><input type="radio" name="7_alcohol">飲まない</td>
        <td><input type="radio" name="7_alcohol">飲む（週<input type="text" style="width: 20%">日）</td>
        <td>種類・量（<input type="text" style="width: 50%">）</td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3" align="left">８）食べ物や薬・注射のアレルギー（気分が悪くなったり、じんましんが出たりする）はありますか？</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><input input type="radio" name="8">なし</td>
        <td colspan="2"><input input type="radio" name="8">あり（<input type="text" style="width: 80%">）</td>
        <td></td>
        <td></td>
      </tr><tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr align="left">
        <td colspan="3" >９）（女性の方のみ）現在、妊娠中あるいは妊娠の可能性、または授乳中ですか？</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><input input type="radio" name="9">いいえ</td>
        <td colspan="2"><input input type="radio" name="9">はい（妊娠中　妊娠の可能性あり　授乳中）</td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </div>
</div>
<br>
<br>
<div align="right">
  ※ご協力ありがとうございました。
</div>
<br>
<br>
<br> 
<br>
<br>

 <input type="submit" name="submit" value="戻る" class="custom-btn btn-1 a" onClick="history.back()">
  <form  name="signup" action="{{action('App\Http\Controllers\y_checkController@move')}}" method="post"  class="m_form"> 
        @csrf
      <input type="submit" id="regist" name="submit" class="custom-btn btn-1 a" value="確認画面へ" />
  </form>
  
     
  
<br>
<br>
<br>
<!------------------------------------------------------------------------------------------------------------------->
      <!--<canvas id="myChart" width="900" height="380"></canvas>class="my-4 w-100"  少し下にスクロールできる-->

     


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dashbord.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>