let chuzing = document.querySelectorAll('ul > li')

$.post("request_to_bd.php", {
   purpose: "Show_All"
}, function (params) {
   $('.products_block').html(params)
})

function recuest_bd() {
   $('.products_block').html('')
   $.post("request_to_bd.php", {
      purpose: "order",
      subspecies: this.innerText
   },
      function (params) {
         $('.products_block').html(params)
      })
}

function to_karzina() {
   document.location.href = "http://localhost/db/das6/karzina.php";
}

for (let i = 0; i < chuzing.length; i++) {
   chuzing[i].addEventListener('click', recuest_bd)
}

let buy_count = 1 * 1
function buying(product_id) {
   $.post("buying.php", {

      buying_qty: $('.buy_qty' + product_id).val(),
      buying_product_id: product_id
   })
   // на карзинке печатаем количество
   if ($('.buy_qty' + product_id).val() > 0) {
      buying_count.innerHTML = "+" + buy_count
      buy_count++
   }
}

