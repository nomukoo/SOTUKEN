let records = {};
    let cnt = 0;
    let txt = '';
    let quantity = {};
    let command_log_array = [];
    //バーコード読み取りメイン処理
    document.onkeydown = function(e) {
        
        if(e.key != 'Enter') {
            txt += e.key;//読んだ文字をtxtに蓄積
        } else {
            var rec = {};
            let command_log = {};
            /*分割*/
            rec['code'] = txt.substr(2,14);
            rec['syringe_name'] = 'none';
            rec['expair'] = expairFormatter(txt.substr(18,6));
            rec['lot'] = txt.substr(26,7);
            rec['amount'] = 0;
            /*重複チェック*/
            if(duplicateCodeCheck(rec)){
                get_syringedata(rec['code']).done(function(data){
                    var tmp = data;
                    if(tmp == 'undefined'){
                        alert('Error:現在の画面で読み取ることのできないバーコードです');
                    } else {
                    rec['syringe_name'] = tmp['syringe_name'];
                    rec['amount'] = tmp['quantity'];
                    quantity[rec['code']] = tmp['quantity'];
                    records[cnt] = rec;
                    command_log['cnt'] = cnt;
                    command_log['duplicate'] = 0;
                    command_log_array.push(command_log);
                    cnt++;
                    print_rec(records);
                    }
                });
                
            }else{
            print_rec(records);
            }
            txt = '';
        } 
    }
    //同一商品コード、ロット番号のものであれば数量を累積していく関数
    function duplicateCodeCheck(rec){
        var flag = true;
        let command_log = {};
        let local_cnt = 0;
        Object.keys(records).forEach(function(key){
            var tmp = records[key];
            if(tmp['code'] == rec['code'] && tmp['lot'] == rec['lot']){
                Object.keys(quantity).forEach(function(key){
                    if(key == tmp['code']){
                        tmp['amount'] += quantity[key];
                        command_log['cnt'] = local_cnt;
                        command_log['amount'] = quantity[key];
                        command_log['duplicate'] = 1;
                        command_log_array.push(command_log);
                    }
                })
                records[key] = tmp;
                flag = false;
            }
            local_cnt++;
        });
        return flag;
    }

    //ワクチン名称をサーバーから非同期で取り出す関数
    function get_syringedata(code){
        return $.ajax({
            type: 'Get',
            url: '/get_syringedata',
            dataType: 'json',
            data: {
                'code': code
            }
        });
    }
    //バーコードで読みっとったデータの画面表示用関数
    function print_rec(records){
        delete records['nyuko_header'];
        $('#tbody1').empty();
        for(key in records){
            let insertText = '';
            insertText += '<tr>';
            let rec = records[key];
            for(key in rec){
                insertText += '<td>' + rec[key] + '</td>';
            }
            insertText += '</tr>';
            $('#tbody1').append(insertText);
        }
    }
    //有効期限のyymmddをyy-mm-ddの形式に変換する関数
    function expairFormatter(str){
        const yy = str.slice(0,2);
        const mm = str.slice(2,4);
        const dd = str.slice(4,6);
        const yymmdd = (yy + '-' + mm + '-' + dd);
        return yymmdd;
    }
  
   
    