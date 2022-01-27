let deFrostList;

function getDefrostList(){
        let tmparray = {};
        tmparray['hospital_ID'] = emp_info['hospital_ID'];
        sendJsonData = JSON.stringify(tmparray);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
            }
        });
        let dfd = $.Deferred();
            $.ajax({
                url: "/get_defrost_list",
                type: "POST",
                data: sendJsonData,
                dataType: "json"
            }).done(function(data){
            if(data == 'empty'){
                $('tbody').append('<tr><td scope="row" class="table-white border-dark" colspan="4">出庫予定はありません</td></tr>')
            } else {
                let obj = JSON.parse(data);
                console.log(obj);
                Object.keys(obj).forEach(function(key){
                    let rec;
                    rec = obj[key];
                    let insertText = '<tr>';
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
                dfd.resolve(obj);
            }
            }).fail(function(XMLHttpRequest, status, e){
                console.log(e);
            }); 
            return dfd.promise(); 
    };

    const setDefrostList = function(obj){
            deFrostList = obj; 
    }

    window.addEventListener('load', function(){
        getDefrostList().then(setDefrostList);
    });