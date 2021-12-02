    var records = {};　
    var cnt = 0;
    var txt = '';
    //バーコード読み取り処理 一字ずつ読み取る
    document.onkeydown = function(e) {
    　　if(e.key != 'Enter') {
            txt += e.key;　//読んだ文字をtxtに蓄積
        } else {
            var rec = {};
            /*分割*/
            rec['code'] = txt.substr(2,14); 
            rec['expair'] = txt.substr(18,6);
            rec['lot'] = txt.substr(26,7);
            rec['amount'] = 195;
            /*重複チェック*/
            if(duplicateCodeCheck(rec)){
                records[cnt] = rec;
                cnt++;
                get_vaccinedata(rec['code']).done(function(data){
                    var tmp = data;
                    rec['wakuchin_name'] = tmp['wakuchin_name'];
                });
            }
            txt = '';
            console.log(records);
        } 
    }
    //既に一度読み込んだものと同一のワクチンであれば数量のみ増やす処理
    function duplicateCodeCheck(rec){
        var flag = true;
        Object.keys(records).forEach(function(key){
            var tmp = records[key];
            if(tmp['code'] == rec['code'] && tmp['lot'] == rec['lot']){
                tmp['amount'] += 195;
                records[key] = tmp;
                flag = false;
            }
        });
        return flag;
    }

    //サーバからワクチンコードをもとにワクチン名を取得
    function get_vaccinedata(code){
        return $.ajax({
            type: 'Get',
            url: '/get_vaccinedata',
            dataType: 'json',
            data: {
                'code': code
            }
        });
    }
    