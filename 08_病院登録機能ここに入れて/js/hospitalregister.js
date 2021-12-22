//無効なフィールドがある場合にフォーム送信を無効にするためのスターターJavaScriptの例
(function () {
    'use strict'
  
    // カスタムBootstrap検証スタイルを適用するすべてのフォームをフェッチします
    var forms = document.querySelectorAll('.needs-validation')
  
    // それらをループして送信を防止します
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()