<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="{{  asset('css/table.css') }}" />
        <title>廃棄予定一覧画面</title>
        <style>
           #submit-btn {
            height:100px;
            width:200px;
            }
        </style>
        <script>
        $(function(){
        $(".btn-dell").click(function(){
                if(confirm("本当に削除しますか？")){
                }else{
                    return false;
                }
            });
        });
    </script>
    </head>
    <body>
        <h2>廃棄予定</h2>
        <br>
        @if(!$DB_PlannedDisposal_get->isEmpty())
          
        <table border>

        <thead>
        <tr>
            <th>ロット番号</th>
            <th>有効期限</th>
            <th></th>
        </tr>
        </thead>
        
        
            @foreach ($DB_PlannedDisposal_get as $list)

            <tr>
                
                    
                    
                <td>{{ $list ->  lot_number}}</td>
                <td>{{ $list -> expair }}</td>
                <td>
                    <form action="/Disposal/{{$list->PlannedDisposal_ID}}" method="POST">
                        @csrf
                    <input type="submit" value="廃棄" class="btn btn-danger btn-sm btn-dell">
                    </form>
                </td>
                
            </tr>
            @endforeach
        </table>
        @else
        <h3>廃棄予定のワクチンはありません</h3>
        @endif
        <br>
    </body>
</html>
