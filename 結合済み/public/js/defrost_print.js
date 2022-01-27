window.addEventListener('load', function(){
    console.log(wakuchin_list);
    dispItemInfo(wakuchin_list);
});



function dispItemInfo(obj){
    let col = '<tr><div class="col-md-4">';
    let cnt = 0;
    obj.forEach(function(rec){
        col += '<td scope="row" class="table-white border-dark" >' + rec['code'] + '</td>';
        col += '<td scope="row" class="table-white border-dark" >' + rec['name'] + '</td>';
        col += '<td scope="row" class="table-white border-dark" >' + rec['lot'] + '</td>';
        col += '<td scope="row" class="table-white border-dark" >' + rec['amount'] + '</td>';
    })
    col += '<td scope="row" class="table-white border-dark" style="width:80px">' + '<input type="text" class="form-control" id=' + cnt + ' value="1"' + ' style="width:50px,text-align:right"  pattern="^[0-9]+$" required>' + 
    '<div class="invalid-feedback">' + '個数を入力してください' + '</div>' + '<div class="valid-feedback">' + 'OK' + '</div>' + '</div>' + '</td>' + '</tr>';
    $('#wakuchin_list').append(col);
    cnt++;
}

function createSendPrintData(){
    let printdata = {};
    printdata['print_id'] = 3;
    let cnt = 0;
    wakuchin_list.forEach(function(rec){
        rec['print_num'] = $("#" + cnt).val();
        console.log(rec);
        printdata[cnt] = rec;
    })
    return printdata;
}



function dispLoading(msg){
    if(msg == undefined){
        msg = "";
    }

    let dispMsg = "<div class='loadingMsg'>" + msg + "</div>";

    if($("#loading").length == 0){
        $("body").append("<div id='loading'>" + dispMsg + "</div>");
    }
}

function removeLoding(){
    $("#loading").remove();
}

$('#send_print').on('click', function(){
    dispLoading('印刷中です、しばらくお待ちください');
    var ws = new WebSocket("ws://localhost:9999");//WebSocket接続
    ws.onopen = function(event){
        let printdata = createSendPrintData();
        let sendJson = JSON.stringify(printdata);
        ws.send(JSON.stringify(sendJson));//接続成功直後にデータを送信
        
    }
    /*印刷処理終了後WebSocketサーバからメッセージが帰ってくる*/
    ws.onmessage = function(message){
        ws.close(); //WebSocket切断
        removeLoding();
    }
});
    


