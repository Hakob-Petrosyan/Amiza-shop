<?php
 include "connect.php";
 $purpose=$_POST['purpose'];
 $subspecies=mysqli_real_escape_string($connect, $_POST['subspecies']);
if ($purpose == 'Show_All') {
   $sql_result="SELECT * FROM products";
   $geted_result=mysqli_query($connect, $sql_result);
   while($associative_mass = mysqli_fetch_assoc($geted_result)){
      echo 
      "<div class='col-md-3 col-sm-6'>
         <div class='img_div'><img src='photos/".$associative_mass['img']."'>
         </div>
         <div>".$associative_mass['name']."</div>
         <div>price -".$associative_mass['price']." р.</div>
         <div class='buy_button'>qty - <input class='buy_qty".$associative_mass['id']."' type='number' min='1' max='100'><button onclick='buying(".$associative_mass['id'].")'>В корзину</button></div>
      </div>
    ";
   }   
}elseif ($purpose =='order') {
   $sql_result="SELECT * FROM products WHERE type='$subspecies'";
   $geted_result=mysqli_query($connect, $sql_result);
   while($associative_mass = mysqli_fetch_assoc($geted_result)){
      echo 
      "<div class='col-md-3 col-sm-6'>
         <div class='img_div'><img src='photos/".$associative_mass['img']."'>
         </div>
         <div>".$associative_mass['name']."</div>
         <div>price -".$associative_mass['price']." р.</div>
         <div class='buy_button'>qty - <input  class='buy_qty".$associative_mass['id']."'type='number' min='1' max='100'><button onclick='buying(".$associative_mass['id'].")'>В корзину</button></div>
      </div>
    ";
   }
}
?>