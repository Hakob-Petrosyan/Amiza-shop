<?php
include "connect.php";
$sql_result="SELECT * FROM karzina";
$geted_result=mysqli_query($connect, $sql_result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="amizashop.css">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

   <div class='brend_block'>
      <a href=" amizashop.html" class='homepage'><img src="../../../photos/home1.png" alt=""></a>Am & Za
   </div>

      <div class="buying_block">
         <div class='gnumner'>
            <table>
               <tr>
                  <td></td>
                  <td>наименование</td>
                  <td>количество</td>
                  <td>цена</td>
                  <td>стоимость</td>
                  <td></td>
               </tr>
                  
                  <?php 
                  while($associative_mass = mysqli_fetch_assoc($geted_result)){
                     echo"<tr'><td><img src='photos/".$associative_mass['img']."'></td><td>".$associative_mass['name']."</td><td>".$associative_mass['qty']."</td><td>".$associative_mass['price']."</td><td class='ful_cost'>".$associative_mass['qty']*$associative_mass['price']."</td><td class='del'><button class='delet' onclick='del(".$associative_mass['id'].")'>Удалить</button></td></tr>";
                  } 
                  ?> 

                  <tr>
                     <td colspan='3'> Стоимость заказа</td><td colspan='3' id='total_cost'> </td>
                  </tr>
                  <tr>
                     <td colspan='6'>
                     <div class='buy_button'>
                        <button class='open_close'>Перейти к оформлению</button>
                     </div>
                     </td>
                  </tr>
       
            </table>
         </div>
         <div class="register_block">
         <div class='registration_block'>
   
      <div class='registration_data'>
      <input type="text" class='firstname' placeholder='Имя*'>   
         <input type="text" class='lastname' placeholder='Фамилия'>

         <input type="email" class='Email' placeholder='Email*'>   
         <input type="number" value=""  class='phone' placeholder='8(___)___ __ __*' >
         <br>
    
         <br>
         <input type="number" class='age' placeholder='Age'>   
         <input type="text" class='address' placeholder='Адрес'>
         <div class='buy_button'><button onclick='buying()'>оформить заказ</button></div>
         <div class='login_info'></div>
      </div>
   </div>

         </div>
      </div>

<div class="pordz"></div>

   <script src='karzina.js'> </script>
</body>

</html>
