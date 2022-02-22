$('.open_close').click(function () {
   $('.registration_data').animate({
      height: "toggle"
   }, 1000)
})
//печатаем все 
$(".Show_All").click(function () {
   $.post("requests_to_mysql.php", {
      purpose: "Show_All"
   }, function (result) {
      $('.users_block').html(result)
   })
})
//сортировка
$('.order').click(function () {
   $.post("requests_to_mysql.php", {
      purpose: "order",
      order_by: $('.order_by').val()
   }, function (result) {
      $('.users_block').html(result)
   })
})
//удаление
function del(a) {
   $(".del" + a).animate({
      height: "hide"
   }, 2000)
   $.post("requests_to_mysql.php", {
      purpose: "delet",
      del_id: a
   })
}
//поисковик
$('.search').click(function () {
   $.post("requests_to_mysql.php", {
      purpose: "search",
      search_by: $('.search_by').val()
   }, function (result) {
      $('.users_block').html(result)
   })
})
//создание
$('.registration_button').click(function () {
   $.post("requests_to_mysql.php", {
      purpose: "create_new",
      new_login: $('.login').val(),
      new_password: $('.password').val(),
      new_firstname: $('.firstname').val(),
      new_lastname: $('.lastname').val(),
      new_age: $('.age').val(),
      new_proffession: $('.proffession').val(),
   })
   $('.login').val('')
   $('.password').val('')
   $('.firstname').val('')
   $('.lastname').val('')
   $('.lastname').val('')
   $('.age').val('')
   $('.proffession').val('')
})

