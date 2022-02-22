let costing = document.getElementsByClassName('ful_cost')
var ful_price = 0
for (let i = 0; i < costing.length; i++) {
   var ful_price = ful_price + (costing[i].innerText) * 1
}
total_cost.innerHTML = ful_price

function del(products_id) {
   ful_price = 0
   event.target.parentElement.parentElement.remove()
   for (let i = 0; i < costing.length; i++) {
      ful_price = ful_price + (costing[i].innerText) * 1
   }
   total_cost.innerHTML = ful_price

   $.post("delete.php", {
      purpose: 'delete_by_id',
      del_products: products_id
   })
}


$('.open_close').click(function () {
   $('.registration_data').animate({
      height: "toggle"
   }, 1000)
})

function buying() {
   $.post('to_users.php', {
      firstname: $('.firstname').val(),
      lastname: $('.lastname').val(),
      Email: $('.Email').val(),
      phone: $('.phone').val(),
      age: $('.age').val(),
      address: $('.address').val(),
   })
   function to_ord() {
      if (!($('.firstname').val()) || !($('.lastname').val()) || !($('.Email').val()) || !($('.phone').val()) || !($('.age').val()) || !($('.address').val())) {
         $('.login_info').html('заполните поля')
      }
      else {
         $.post("to_order.php", {
            firstname: $('.firstname').val(),
            lastname: $('.lastname').val(),
            Email: $('.Email').val(),
            phone: $('.phone').val(),
            age: $('.age').val(),
            address: $('.address').val(),
         }, function (params) {
            $('.registration_data').html(params)
         })

         function del() {
            $.post("delete.php", {
               purpose: 'all'
            })
         }
         setTimeout(del, 1000)
      }
   }
   setTimeout(to_ord, 500);
}
