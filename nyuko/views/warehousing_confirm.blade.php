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
        <th style=" width:200px;">商品ID</th>
        <th style="width:200px;">名称</th>
        <th style="width:100px;">有効期限</th>
        <th style="width:100px;">ロット番号</th>
        <th style="width:80px">数量</th>  
        </tr>
        <?php $lists = session()->get('list'); ?>
        
            @foreach($lists as $key => $list)
                @if($key != 'nyuko_header')
                <tr>
                    @foreach($list as $key => $value)
                        @if($key != 'length')
                        <td>{{$value}}</td>
                        @endif
                     @endforeach
                </tr>
                @endif
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