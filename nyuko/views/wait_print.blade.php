<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{  asset('css/load.css') }}" />
  <script>
  /*印刷処理へ送信するためPHPからJSへ入庫データを渡す*/
  <?php 
      $lists = session()->get('list'); 
      $json = json_encode($lists);
  ?>
  let array = <?php echo $json; ?>;
</script>
  <script src="{{ asset('js/print_websocketclient.js') }}"></script>
  <title>Loading画面</title>
</head>
<body>
  <br>
  <br>
<p>Now Printing...</p>
<div class="img">
<img src="{{ asset('img/loading.gif') }}" class="img-1">
</div>





</body>
</html>