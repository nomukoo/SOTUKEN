<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>wakaran</title>
  
  <script>
function confirmFunction1() {
var txt;
//確認ダイアログの表示
var rt = confirm("本当に取り消してよろしいですか？");
if (rt == true) {
    txt = "「OK」を選択しました。";
    location.href = "https://www.nintendo.co.jp";
} else {
txt = "「キャンセル」を選択しました。";
}
//ブラウザーに表示するテキストを代入する
document.getElementById("conf1").innerHTML = txt;
}
</script>

</head>

<body>
<h1>取り消し確認</h1>
<p><button onclick="confirmFunction1()">ボタンを押して下さい</button></p>
<p id ="conf1"></p>
</body>
</html>

