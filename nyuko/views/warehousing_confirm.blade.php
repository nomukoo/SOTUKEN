<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{  asset('css/table.css') }}" />
        <title>読み取り画面</title>
    </head>
    <h2>情報出力</h2>
    <body>
        <br> 
    <table >
        <tr>
            <th>ワクチンID</th>
            <th>注射器ID</th>
            <th>数量/本</th>
            <th>製造元</th>
            <th>有効期限</th>  
        </tr>
        <?php $lists = session()->get('list'); ?>
        
            @foreach($lists as $list)
            <tr>
                @foreach($list as $key => $value)
                    @if($key != 'length')
                    <td>{{$value}}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        
    </table>
<br>


<div class='frame'>
<form  action="{{ url('/warehousing_register')}}" method="POST"> 
@csrf
<input type="submit" name="submit" value="登録" class="custom-btn btn-4"/>
</form>
<input type="submit" name="submit" value="戻る" class="custom-btn btn-1"/>
<input type="submit" name="submit" value="取消" class="custom-btn btn-2"/>

</div>



        
    <body>
  
</html>