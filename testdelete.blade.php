<html>
    <head>
        　　<title>SAMPLE</title>
        </head>
        <body>
        　　<input type='button' id='deleteBtn1' value='タイトル1削除'>
        　　<input type='button' id='deleteBtn2' value='タイトル2削除'>
        　　<input type='button' id='deleteBtn3' value='タイトルすべて削除'>
        　　<main>
        　　　　<section id='section1' class='sections'>
        　　　　　<h3>タイトル1</h3>
        　　　　　　　<p>内容１<p/>
        　　　　</section>
        　　　　<section id='section2' class='sections'>
        　　　　　<h3>タイトル2</h3>
        　　　　　　　<p>内容２<p/>
        　　　　</section>
        　　　　<section id='section3' class='sections'>
        　　　　　<h3>タイトル3</h3>
        　　　　　　　<p>内容３<p/>
        　　　　</section>
        　　</main>
        </body>
        　　<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        　　<script>
        　　　/*タイトル1削除クリック時*/
        　　　document.querySelector('#deleteBtn1').addEventListener('click', () => {
        　　　　const element = document.getElementById('section1');
        　　　　element.remove();
        　　　});
        　　　/*タイトル2削除クリック時*/ 
        　　　document.querySelector('#deleteBtn2').addEventListener('click', () => {
        　　　　$('#section2').remove();
        　　　});
        　　　/*タイトルすべて削除クリック時*/ 
        　　　document.querySelector('#deleteBtn3').addEventListener('click', () => {
        　　　　$('.sections').remove();
        　　　});
        　　</script>
</html>