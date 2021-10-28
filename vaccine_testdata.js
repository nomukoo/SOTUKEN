let items = [{vaccinename:'モデルナ',
              expir:'2021/11/15',
              quantity:10
             },
             {vaccinename:'ファイザー',
              expir:'2021/11/20',
              quantity:15 
             }]

function createJsonData() {
    var json_text = JSON.stringify(items);
    return json_text;
}

$(function(){
    $('#ajax-button').click(
        function() {
            var hostUrl = 'http://192.168.10.10';
            var send_txt = createJsonData();
            &.ajax({
                url: hostUrl,
                type:'POST',
                dataType: 'json',
                data: send_txt,
            }).done(function(data)) {
                location.href = "https://www.google.com";
            }
        }
    )
}