<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入庫確認画面</title>




</head>




</script>
<body>
<h1>入庫確認画面</h1>
<div style="display:inline-flex">
<form  action="{{action('vaccineTableController@vaccineOut')}}" method="POST">
  @csrf
  <input type="submit" name="itiran" value="戻る">
</form>
<form  action="{{action('vaccineTableController@deleteConfilm')}}" method="POST">
  @csrf
  <input type="submit"  name="reset" value="取り消し" >
 
</form>
<?php $lis = session()->get('text') ?>
<?php echo gettype($lis) ?>
@foreach($lis as $rec)
  @foreach($rec as $row)
  {{$row}}
  @endforeach
@endforeach
<form  action="{{action('NyukoController@register')}}" method="POST">
  @csrf

  </form>
  


  <form  action="{{action('vaccineTableController@errorStock')}}" method="POST">
  @csrf
  <input type="submit" name="go" value="エラー">
  </form>
  <p>※エラーの場合</p>
</div>
</body>
</html>