
/* 画面表示のための連想配列作成用 */
let iteminfolists = {};
function makelist(inputarray){
    console.log(inputarray);
    let association = {};
    let cnt = 0;
    let listrowcnt = 0;
    for(let i = 0; i < inputarray.length; i++){
        switch(cnt){
            case 0:
                association["ワクチンID"] = inputarray[i];
                break;
            case 1:
                association["注射器ID"] = inputarray[i];
                break;
            case 2:
                association["数量/本"] = inputarray[i];
                break;
            case 3:
                association["製造元"] = inputarray[i];
                break;
            case 4:
                association["有効期限"] = inputarray[i];
                break;
        }
        console.log(association);
        cnt++;
        if(cnt == 5){
            listrowcnt++;
            iteminfolists[listrowcnt] = association;//1件ごとのデータを格納した連想配列を配列へpush
            cnt = 0;
            association.length = 0; 
            console.log(iteminfolists);
        }
        
    }
}