let records = [];
let txt = '';
let cnt = 0;
/* バーコード読み取りのメインメソッド */
document.onkeydown = function(e){
    if(e.key != 'Enter') {
        txt += e.key;//読んだ文字をtxtに蓄積
    } else {
        let rec = {};
        /* バーコードからの情報を切り分けてそれぞれ格納 */
        rec['code'] = txt.substr(2,14);
        rec['expair'] = expairFormatter(txt.substr(18,6));
        rec['lot'] = txt.substr(26,7);
        rec['amount'] = 0;
        if(!duplicateCodeCheck(rec)){
            distinctionItem(rec['code'],rec['lot']).then(dispItemInfo);
            records.push(rec);
        }
        txt = ''
    }
}

/*ajaxでサーバから物品名を取得する関数*/
function distinctionItem(code,lot){
    let dfd = $.Deferred();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
        }
    });
    $.ajax ({
        type: 'post',
        url: '/distinctionItem',
        dataType: 'json',
        data: {
            'code': code
        }
    }).done(function(data){
        console.log(data);
        dfd.resolve(data,lot);
    });
    return dfd.promise();
}

/*取得物品のデータをテーブルに表示する関数*/
function dispItemInfo(data,lot){
    let tmpobj = data[0];
    if(data == 'undefined'){
        alert('読み込めないバーコードです');
    } else {
        cnt += 1;
        let col = '<tr><div class="col-md-4">';
        Object.keys(tmpobj).forEach(function(key){
            col += '<td scope="row" class="table-white border-dark" >' + tmpobj[key] + '</td>';
            appendHidden(key,tmpobj[key]);
        })
        appendHidden('lot',lot);
        col += '<td scope="row" class="table-white border-dark" >' + lot + '</td>';
        col += '<td scope="row" class="table-white border-dark">' + '<input type="text" class="form-control" name=data[' + cnt + '][amount]' + ' style="width:300px" placeholder="解凍数を入力してください"pattern="^[0-9]+$" required>' +
        '<div class="invalid-feedback">' + '個数を入力してください' + '</div>' + '<div class="valid-feedback">' + 'OK' + '</div>' + '</div>' + '</td>' + '</tr>';
        $('#confirm_num').append(col);
    }
}

/* 既に読み込まれている物品と同一コード、ロット番号のものがあるかどうかを判定 */
function duplicateCodeCheck(rec){
    let flag = false;
    records.forEach(element => {
        if(element['code'] == rec['code'] && element['lot'] == rec['lot']){
            flag = true;
        }
    })
    return flag;
}

/* yymmddをyy-mm-ddにフォーマットする関数 */
function expairFormatter(str){
    const yy = str.slice(0,2);
    const mm = str.slice(2,4);
    const dd = str.slice(4,6);
    const yymmdd = (yy + '-' + mm + '-' + dd);
    return yymmdd;
}

function appendHidden(key,data){
    let tmp;
    if(key == 'wakuchin_name' || key == 'syringe_name'){
        tmp = 'name';
    } else if(key == 'wakuchin_ID' || key == 'syringe_ID'){
        tmp = 'code';
    } else if(key == 'lot') {
        tmp = 'lot'
    }  
    console.log('appendHidden!');
    $('<input>').attr({
        type: 'hidden',
        name: 'data[' + cnt + ']' + '[' + tmp + ']',
        value: data
    }).appendTo('#defrostRegisterForm');
}