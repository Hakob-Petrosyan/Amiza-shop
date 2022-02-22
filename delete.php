<?php
include "connect.php";

$purpose=$_POST['purpose'];
if($purpose=='all'){
   $deleting="DELETE FROM karzina";
   mysqli_query($connect, $deleting);
}elseif($purpose=='delete_by_id'){
   $del_product_id=mysqli_real_escape_string($connect, $_POST['del_products']);
   $deleting="DELETE FROM karzina WHERE id=$del_product_id";
    mysqli_query($connect, $deleting);
}

?>