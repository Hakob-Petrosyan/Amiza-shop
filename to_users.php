<?php
  include "connect.php";
  $firstname =$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $Email=$_POST['Email'];
  $phone=$_POST['phone'];
  $age=$_POST['age'];
  $address=$_POST['address'];

  
  $users_date="INSERT INTO users (firstname, lastname, age, Email, phone, address) VALUE ('$firstname', '$lastname', $age, '$Email', '$phone', '$address') ";
  mysqli_query($connect, $users_date);

?>