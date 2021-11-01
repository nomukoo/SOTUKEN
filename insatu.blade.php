<!DOCTYPE html>
<!-- CSSの読み込み -->
<link rel="stylesheet" href="{{  asset('css/insatu1.css') }}" />
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<html lang="ja">

  <head>

    <metacharset="UTF-8">

    <title>印刷練習</title>

  </head>

  <body>
    <script>

window.onafterprint = function ( event ) {
	var txt;
//確認ダイアログの表示
var rt = confirm("印刷しましたか？");
if (rt == true) {
    txt = "「OK」を選択しました。";
    location.href = "http://localhost:8000/test/finishPrint";
} else {
txt = "「キャンセル」を選択しました。";
location.href = "http://localhost:8000/test/errorPrint";
}
}


      $(function(){
    
    //個別印刷
    $('.print-btn').on('click', function(){
        var printPage = $(this).closest('.print-page').html();
        $('body').append('<div id="print"></div>');
        $('#print').append(printPage);
        $('body > :not(#print)').addClass('print-off');
        window.print();
        $('#print').remove();
        $('.print-off').removeClass('print-off');
    });

    //一括印刷
    $('.print-all').on('click', function(){
        window.print();
    });

});
</script>

  <div class="wrapper">
<div class="print-page">
<div class="area">
<p class="area-ttl">生卵無料券</p>
<p class="area-txt">カレーをご注文いただいた際に、生卵を一つサービス致します。</p>
<div class="print-btn">個別印刷</div>
</div>
</div>
 
<div class="print-page">
<div class="area">
<p class="area-ttl">ご飯大盛り無料券</p>
<p class="area-txt">カレーをご注文いただいた際に、ご飯を普通盛りから大盛りに変更致します。</p>
<div class="print-btn">個別印刷</div>
</div>
</div>


</div>

<div class="print-all">一括印刷</div>
  </body>




</html>