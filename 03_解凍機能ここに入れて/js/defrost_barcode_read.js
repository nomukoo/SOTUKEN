records = [];
let txt = '';
document.onkeydown = function(e){
    if(e.key != 'Enter') {
        txt += e.key;//読んだ文字をtxtに蓄積
    } else {
        let rec = {};
        rec['code'] = txt.substr(2,14);
        rec['wakuchin_name'] = 'none';
        rec['expair'] = expairFormatter(txt.substr(18,6));
        rec['lot'] = txt.substr(26,7);
        if(!duplicateCodeCheck(rec)){
            distinctionItem(rec['code'],rec['lot']).then(dispItemInfo);
        }
    }
}


function distinctionItem(code,lot){
    let dfd = $.Deferred();
    let sendJson = 
    $.ajax ({
        type: 'Get',
        url: '/distinctionItem',
        dataType: 'json',
        data: {
            'code': code
        }
    }).done(function(data){
        dfd.resolve(data,lot);
    });
    return dfd.promise();
}

function dispItemInfo(data,lot){
    console.log(data);
    if(data == 'undefined'){
        console.log('読み込めないバーコードです');
    } else {
        let col = '<tr><div class="col-md-4">';
        Object.keys(data).forEach(function(key){
            col += '<td scope="row" class="table-white border-dark" >' + data[key] + '</td>';
        })
        col += '<td scope="row" class="table-white border-dark" >' + lot + '</td>';
        col += '<td scope="row" class="table-white border-dark"><input type="text" class="form-control" id=""  style="width:300px" placeholder="解凍数を入力してください"pattern="^[0-9]+$" required>' +
        '<div class="invalid-feedback">' + '個数を入力してください' + '</div>' + '<div class="valid-feedback">' + 'OK' + '</div>' + '</div>' + '</td>' + '</tr>';
        $('#confirm_num').append(col);
    }
}



function expairFormatter(str){
    const yy = str.slice(0,2);
    const mm = str.slice(2,4);
    const dd = str.slice(4,6);
    const yymmdd = (yy + '-' + mm + '-' + dd);
    return yymmdd;
}

function duplicateCodeCheck(rec){
    let flag = false;
    Object.keys(records).forEach(function(key){
        var tmp = records[key];
        if(tmp['code'] == rec['code'] && tmp['lot'] == rec['lot']){
            flag = true;
        }
    });
    return flag;
}