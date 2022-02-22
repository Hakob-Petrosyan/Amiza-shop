<?php
 include "connect.php";
 $qty=$_POST['buying_qty'];
 $buying_product_id=$_POST['buying_product_id'];

   $buying_products_inf="SELECT * FROM products WHERE id=$buying_product_id";
   $buying_product_result=mysqli_query($connect, $buying_products_inf);
   $associative_mass = mysqli_fetch_assoc($buying_product_result);
   
   $buy_name=$associative_mass['name'];
   $buy_price=$associative_mass['price'];
   $buy_img=$associative_mass['img'];
   $buy_id=$associative_mass['id'];
      
   $buying_products="INSERT INTO  karzina (name, qty, price, img, products_id) VALUES ('$buy_name', $qty, $buy_price, '$buy_img', $buy_id) ";
   mysqli_query($connect, $buying_products);


?>