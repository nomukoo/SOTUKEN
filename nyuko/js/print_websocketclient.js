(function(){
    var ws = new WebSocket("ws://localhost:9999");
    ws.onopen = function(event){
        console.log("接続");
        ws.send(JSON.stringify(array));
        
    }
    ws.onmessage = function(message){
        console.log(message.data);
        ws.close();
    }
    ws.onclose = function(){
        window.location.href = "/finish_print";
        console.log('切断');
    }
})();