<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{  asset('css/table.css') }}" />
        <title>確認画面（出庫）</title>
    </head>
    <h2>情報出力</h2>
    <body>
        <br> 
    <table >
        <tr>
            <th>入庫ID</th>
            <th>ワクチンID</th>
            <th>注射器ID</th>
            <th>数量/本</th>
            <th>製造元</th>
            <th>有効期限</th>  
        </tr>
        <tr>
            <td>・・・・</td>
            <td>・・・・</td>
            <td>・・・・</td>
            <td >・・</td>
            <td  >・・・・</td>
            <td >・・/・・/・・</td>
        </tr>
    </table>
<br>

<input type="submit" name="submit" value="戻る" class="custom-btn btn-1" onClick="history.back()"/>
<form action="{{action('App\Http\Controllers\del_outController@move')}}" method="post"  class="form"> 
    @csrf
<input type="submit"  name="submit" value="削除" class="custom-btn btn-2"　/>
</form>
<form action="{{action('App\Http\Controllers\conp_outController@move')}}" method="post"  class="form"> 
    @csrf
    <input type="submit" name="submit" value="登録" class="custom-btn btn-3"/>
</form>



        
    <body>
  
</html>    