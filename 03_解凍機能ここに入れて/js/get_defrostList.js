(function(){
    let tmparray = {};
    tmparray['hospital_ID'] = 'hugahuga';
    sendJsonData = JSON.stringify(tmparray);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/get_defrost_list",
        type: "POST",
        data: sendJsonData,
        dataType: "json"
    }).done(function(data){
       if(data == 'empty'){
           $('tbody').append('<tr><td scope="row" class="table-white border-dark" colspan="3">出庫予定はありません</td></tr>')
       } else {
          let obj = JSON.parse(data);
          Object.keys(obj).forEach(function(key){
              let rec = obj[key];
              let insertText = '<tr>';
              let currentKey = 0;
              Object.keys(rec).forEach(function(key){
                  if(key != 'group_id'){
                  if(rec[key] != null){
                    insertText += '<td scope="row" class="table-white border-dark">' + rec[key] + '</td>';
                  } else {
                    insertText += '<td scope="row" class="table-white border-dark">' + '―' + '</td>';
                  }
                }
              })
              insertText += '</tr>';
              $('tbody').append(insertText);
          })
       }
    }).fail(function(XMLHttpRequest, status, e){
        console.log(e);
    });
})();