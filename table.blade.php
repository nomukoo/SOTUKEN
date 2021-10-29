<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{  asset('css/table.css') }}" />
        
        <title>読み取り画面</title>
    </head>
    <h2>情報出力</h2>
    <body>
        <br> 
        <table border>
        <tr>
            <th>入庫ID</th>
            <th>ワクチンID</th>
            <th>注射器ID</th>
            <th>数量/本</th>
            <th>製造元</th>
            <th>有効期限</th>
            <th></th>
        </tr>
        <tr>
            <td >・・・・</td>
            <td>・・・・</td>
            <td>・・・・</td>
            <td><input class="inpval" type="text" id="txt1" name="txt1" ></td>    <!--数量/本-->
            <td><input class="inpval" type="text" id="txt1" name="txt1" required></td>    <!--製造元-->
            <td><input type="date" ></td>
            <td><input class="edtbtn" type="button" id="edtBtn1" value="編集" onclick="editRow(this)" ></td>
            
        </tr>
</table>
<br>



<input type="submit" name="submit" value="取消" class="custom-btn btn-2"/>
<form action="{{action('App\Http\Controllers\checkController@move')}}" method="POST"  class="form"> 
    @csrf
    <input type="submit" name="submit" value="確認" class="custom-btn btn-3"/>
</form>

<script>
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
	
</script>



        
    <body>
  
</html>    