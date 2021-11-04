<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="{{  asset('css/table.css') }}" />
        <style>
        input[type="url"] {
         opacity: 0;
        }
         </style>
        <title>読み取り画面</title>
    </head>
    <h2>情報出力</h2>
    <body>
    <input type="url" id ="i" autofocus autocomplete="off">
        <br> 
        <table border>
        <thead>
        <tr>
            <th>ワクチンID</th>
            <th>注射器ID</th>
            <th>数量/本</th>
            <th>製造元</th>
            <th>有効期限</th>
        </tr>
    </thead>
  <tbody>
  </tbody>
</table>
<br>



<input type="submit" name="submit" value="取消" class="custom-btn btn-2"/>

    <input id="submit-btn" type="btn" name="submit" value="確認" class="custom-btn btn-3"/>
    <input type="button" value="もう一度読み取る" onclick="clearText()" class="custom-btn btn-3" />


<script>
/*
 * editRow: 編集ボタン該当行の内容を入力・編集またモード切り替え
 */
var inputTextArray;
function editRow(obj)
{
    var objTR = obj.parentNode.parentNode;
    var rowId = objTR.sectionRowIndex;
    var objInp = document.getElementById("txt" + rowId);
    var objBtn = document.getElementById("edtBtn" + rowId);

    if (!objInp || !objBtn)
        return;
    
    // モードの切り替えはボタンの値で判定   
    if (objBtn.value == "編集")
    {
        objInp.style.cssText.txt1 = "border:1px solid #888;"
        objInp.readOnly = false;
        objInp.focus();
        objBtn.value = "確定";
    }
    else
    {
        objInp.readOnly = true;
        objBtn.value = "編集";
    }
}
document.getElementById("i").onchange = function(){
 var text = document.getElementById("i").value; //入力値の取得
 var kugiri = /[^\s]+/g;　
 var c1 = text.match(kugiri); //空白ごとで分割し、項目ごとに配列に挿入
 inputTextArray = c1;
 	 if(c1.length > 6){
    		alert("もう一度読み取るボタンを押してください");
		
 	}else if(text.match(/[^\x01-\x7E\uFF61-\uFF9F]/)){
		alert("半角入力にしてください");
		clearText();
		exit;
 	}else{

 	var str = "";
 	str += "<tr>";
  	for (let i = 0; i < c1.length; i++) {
        	str += "<td>";
		    str += c1[i];
        	str += "</td>";
		}
	str += "</tr>";
        
        $('table tbody').append(str);
	}
}

function clearText() {
  var textForm = document.getElementById("i");
  textForm.value = '';
  document.getElementById('i').focus();
}
document.getElementById('i').onblur = function(){ 
  document.getElementById('i').focus();
};
/* 画面表示のための連想配列作成用 */
let iteminfolists = {};
function makelist(inputarray){
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
/* サーバに入力データをajaxでPOST */

$(function(){
    $("#submit-btn").click(function(){
        makelist(inputTextArray)
        console.log(iteminfolists);
        const jsonObj = JSON.stringify(iteminfolists);
        console.log(jsonObj);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $.ajax({
            type: "POST",
            url: "/warehousingAjax",
            data: jsonObj,
            dataType: "json",
            contentType: "application/json"
        }).done(function(data){
            //通信成功時次の画面に遷移
            window.location.href= "/warehousingConfirm";
        }).fail(function(XMLHttpRequest, status, e){
            //エラー
            alert(e);
        });
    });
});
</script>



        
    <body>
  
</html>    