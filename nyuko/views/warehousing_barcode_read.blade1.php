<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="{{  asset('css/table.css') }}" />
        <script src="{{ asset('js/barcode_read.js') }}"></script>
        <script src="{{ asset('js/makelist.js') }}"></script>
        <title>読み取り画面</title>
    </head>
    <body>
        <h2>情報出力</h2>
        <br> 
        <table border>
        <thead>
        <tr>
            <th>商品コード</th>
            <th>名称</th>
            <th>有効期限</th>
            <th>ロット番号</th>
            <th>数量</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
        <br>
        <input type="submit" name="submit" value="確認" class="custom-btn btn-3" id="submit-btn"/>
    <script>
        /* サーバに入力データをajaxでPOST */

$(function(){
    $("#submit-btn").click(function(){
        console.log(inputTextArray);
        makelist(inputTextArray);
        console.log(iteminfolists);
        const jsonObj = JSON.stringify(iteminfolists);
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
            window.location.href= "/warehousing_confirm";
        }).fail(function(XMLHttpRequest, status, e){
            //エラー
            alert(e);
        });
    });
});
    </script>
    </body>
</html>    