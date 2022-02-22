<?php
 include "connect.php";

 $firstname =$_POST['firstname'];
 $lastname=$_POST['lastname'];
 $Email=$_POST['Email'];
 $phone=$_POST['phone'];
 $age=$_POST['age'];
 $address=$_POST['address'];

 $user_id="SELECT * FROM users WHERE firstname='$firstname'";
 $user_id_result=mysqli_query($connect, $user_id);
 while($user_id_result_mass=mysqli_fetch_assoc($user_id_result)){
  $buyer_id=$user_id_result_mass['id'];
  }
  echo "<div class='nomer_zakaza'> Номер Заказа <br>".$buyer_id."</div>";

  $buying_products_inf="SELECT products_id, qty, price FROM karzina ";
 $buying_product_result=mysqli_query($connect, $buying_products_inf);
 while ($associative_mass = mysqli_fetch_assoc($buying_product_result)){
   $pr_id=$associative_mass['products_id'];
   $qty=$associative_mass['qty'];
   $price=$associative_mass['price'];
   $cost=$price*$qty;
   $order_products="INSERT INTO  orders (user_id, products_id, qty, price) VALUES ($buyer_id, $pr_id, $qty, $cost)";
   mysqli_query($connect, $order_products);
}

?>