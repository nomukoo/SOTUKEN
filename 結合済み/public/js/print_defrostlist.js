$('.print-btn').on('click', function(){
    dispLoading('印刷中です、しばらくお待ちください');
    var ws = new WebSocket("ws://localhost:9999");//WebSocket接続
    ws.onopen = function(event){
        let sendJson = {};
        cnt = 0;
        deFrostList.forEach(function(data){
            sendJson[cnt] = data;
            cnt++;
        });
        sendJson['print_id'] = 2;
        console.log(sendJson);
        ws.send(JSON.stringify(sendJson));//接続成功直後にデータを送信
        
    }
    /*印刷処理終了後WebSocketサーバからメッセージが帰ってくる*/
    ws.onmessage = function(message){
        ws.close(); //WebSocket切断
        removeLoding();
    }
});

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