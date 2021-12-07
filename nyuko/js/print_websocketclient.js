/*印刷処理用ネイティブアプリへのデータ送信処理*/
(function(){
    var ws = new WebSocket("ws://localhost:9999");//WebSocket接続
    ws.onopen = function(event){　
        ws.send(JSON.stringify(array));//接続成功直後にデータを送信
        
    }
    /*印刷処理終了後WebSocketサーバからメッセージが帰ってくる*/
    ws.onmessage = function(message){
        ws.close(); //WebSocket切断
    }
    /*切断時の処理*/
    ws.onclose = function(){
        window.location.href = "/finish_print"; //印刷完了画面への遷移
    }
})();