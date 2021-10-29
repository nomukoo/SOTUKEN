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



<form  action="{{action('NyukoController@register')}}" method="POST">
  @csrf
  <input type="submit" name="go" value="登録" >
  <input type="hidden"  name="nyuko_ID" value="4" >
  <input type="hidden"  name="wakuchin_ID" value="DD">
  <input type="hidden"  name="syringe_ID" value="EE">
  <input type="hidden"  name="nyuko_date" value="2021/10/29">
  <input type="hidden"  name="made" value="ファイザー">
  <input type="hidden"  name="kigen" value="2021/11/12">
  <input type="hidden"  name="amount" value="5">
  <input type="hidden"  name="staff_ID" value="0005">

  </form>

  <form  action="{{action('vaccineTableController@errorStock')}}" method="POST">
  @csrf
  <input type="submit" name="go" value="エラー">
  </form>
  <p>※エラーの場合</p>
</div>
</body>
</html>