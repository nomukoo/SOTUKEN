<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{  asset('css/table.css') }}" />
        
        <title>情報出力画面(仮)</title>
    </head>
    <h2>情報出力</h2>
    <body>
    <form id="frm" name="frm" method="GET" action="">
    <!--<div>新しい行を追加：<input type="button" id="add" name="add" value="追加" onclick="appendRow()"></div>-->
    <table border="1" id="tbl">
    <tr>
        <th style="text-align:right; width:70px;">入庫ID</th>
        <th style="">ワクチンID</th>
        <th style="">注射器ID</th>
        <th style="">数量</th>
        <th style="">製造元</th>
        <th style="">有効期限</th>
        <th style=" width:40px;"> </th>
        <th style=" width:40px;"> </th>
    </tr>
    <tr>
        <td style="text-align:right; width:40px;"><span class="seqno">1</span></td>
        <td value="" size="30" style="border:1px solid #888;">・・・</td>
        <td value="" size="30" style="border:1px solid #888;">・・・</td>
        <td style=""><input class="inpval" type="text" id="txt1" name="txt1"   value="" size="30" style="border:1px solid #888;"　min="5" max="5" readonly></td>
        <td style=""><input class="inpval" type="text" id="txt1" name="txt1"   value="" size="30" style="border:1px solid #888;" pattern="[ぁ-ヺ]"　title="ひらがな・カタカナで入力" readonly></td>
        <td style=""><input class="inpval" type="date" id="txt1" name="txt1"   value="" size="30" style="border:1px solid #888;" min="2021-11-1" ></td>
        <td><input class="edtbtn" type="button" id="edtBtn1" value="編集" onclick="editRow(this)"></td>
        <td><input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)"></td>
    </tr>
    </table>
   
</form>
<br>
<form action="{{action('App\Http\Controllers\deleteController@move')}}" method="POST"  class="form"> 
    @csrf
<input type="submit"  name="submit" value="全削除" class="custom-btn btn-2"　/>
</form>
<form action="{{action('App\Http\Controllers\checkController@move')}}" method="POST"  class="form"> 
    @csrf
    <input type="submit" name="submit" value="確認" class="custom-btn btn-3"/>
</form>

<script>
/*
 * editRow: 編集ボタン該当行の内容を入力・編集またモード切り替え
 */
/*
 * appendRow: テーブルに行を追加
 */
function appendRow()
{
    var objTBL = document.getElementById("tbl");
    if (!objTBL)
        return;
    
    var count = objTBL.rows.length;
    
    // 最終行に新しい行を追加
    var row = objTBL.insertRow(count);

    // 列の追加
    var c1 = row.insertCell(0);
    var c2 = row.insertCell(1);
    var c3 = row.insertCell(2);
    var c4 = row.insertCell(3);
    var c5 = row.insertCell(4);
    var c6 = row.insertCell(5);
    var c7 = row.insertCell(6);
    var c8 = row.insertCell(7);
    

    // 各列にスタイルを設定
    c1.style.cssText = "text-align:right; width:40px;";
    c2.style.cssText = "";
    c3.style.cssText = "";
    c4.style.cssText = "";
    c5.style.cssText = "";
    c6.style.cssText = "";
    c7.style.cssText = " width:40px;";
    c8.style.cssText = " width:40px;";
    
    // 各列に表示内容を設定
    c1.innerHTML = '<span class="seqno" size="30">' + count + '</span>';
    c2.innerHTML = '<p>・・・</p>';
    c3.innerHTML = '<p>・・・</p>';
    c4.innerHTML = '<input class="inpval" type="text"   id="txt' + count + '" name="txt' + count + '" value="" size="30" style="border:1px solid #888;"　min="5" max="5" readonly>';
    c5.innerHTML = '<input class="inpval" type="text"   id="txt' + count + '" name="txt' + count + '" value="" size="30" style="border:1px solid #888;"　pattern="[ぁ-ヺ]"　title="ひらがな・カタカナで入力" readonly>';
    c6.innerHTML = '<input class="inpval" type="date"   id="txt' + count + '" name="txt' + count + '" value="" size="30" style="border:1px solid #888;" >';
    c7.innerHTML = '<input class="edtbtn" type="button" id="edtBtn' + count + '" value="編集" onclick="editRow(this)">';
    c8.innerHTML = '<input class="delbtn" type="button" id="delBtn' + count + '" value="削除" onclick="deleteRow(this)">';
    
    // 追加した行の入力フィールドへフォーカスを設定
    var objInp = document.getElementById("txt" + count);
    if (objInp)
        objInp.focus();
}

/*
 * deleteRow: 削除ボタン該当行を削除
 */
function deleteRow(obj)
{
    // 確認
    if (!confirm("この行を削除しますか？"))
        return;

    if (!obj)
        return;

    var objTR = obj.parentNode.parentNode;
    var objTBL = objTR.parentNode;
    
    if (objTBL)
        objTBL.deleteRow(objTR.sectionRowIndex);
    
    // <span> 行番号ふり直し
    var tagElements = document.getElementsByTagName("span");
    if (!tagElements)
        return false;

    var seq = 1;
    for (var i = 0; i < tagElements.length; i++)
    {
        if (tagElements[i].className.match("seqno"))
            tagElements[i].innerHTML = seq++;
    }

    // id/name ふり直し
    var tagElements = document.getElementsByTagName("input");
    if (!tagElements)
        return false;

    // <input type="text" id="txtN">
    var seq = 1;
    for (var i = 0; i < tagElements.length; i++)
    {
        if (tagElements[i].className.match("inpval"))
        {
            tagElements[i].setAttribute("id", "txt" + seq);
            tagElements[i].setAttribute("name", "txt" + seq);
            ++seq;
        }
    }

    // <input type="button" id="edtBtnN">
    seq = 1;
    for (var i = 0; i < tagElements.length; i++)
    {
        if (tagElements[i].className.match("edtbtn"))
        {
            tagElements[i].setAttribute("id", "edtBtn" + seq);
            ++seq;
        }
    }

    // <input type="button" id="delBtnN">
    seq = 1;
    for (var i = 0; i < tagElements.length; i++)
    {
        if (tagElements[i].className.match("delbtn"))
        {
            tagElements[i].setAttribute("id", "delBtn" + seq);
            ++seq;
        }
    }
}

/*
 * editRow: 編集ボタン該当行の内容を入力・編集またモード切り替え
 */
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
        objInp.style.cssText = "border:1px solid #888;"
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
	
</script>



        
    <body>
  
</html>    