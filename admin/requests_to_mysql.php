 <?php
  include "../connect.php";
  $purpose=$_POST['purpose'];



  //печатаем все 
  if($purpose=='Show_All'){
    
    // $circulation="SELECT AVG(price) FROM orders  ";
    // $sql_circulation=mysqli_query($connect, $circulation);
    // $mass = mysqli_fetch_assoc( $sql_circulation);
    // echo $mass['SUM(price)'];
         $sql_oll_result="SELECT * FROM users WHERE id IN(SELECT DISTINCT(user_id) FROM orders)";
      $geted_oll_result=mysqli_query($connect, $sql_oll_result); 
  
    while($associative_mass = mysqli_fetch_assoc($geted_oll_result)){
     echo
     
    "<div class='del".$associative_mass['id']."'><div>".$associative_mass['firstname']." ". $associative_mass['lastname']."<br>
    Номер заказа :".$associative_mass['id']."<br>
    тел.:".$associative_mass['phone']."<br>
    Адрес.:".$associative_mass['address']."<br>
    дата заказа:".$associative_mass['date']."<br>
    <div><button class='delete'>Посматреть заказ</div>
    </div><div><button class='delete' onclick='del(".$associative_mass['id'].")'>Выполнено</button></div>
    </div>";
    }
  }

//  сортировка
 elseif($purpose=='order') {
   $order=$_POST['order_by'];
   $order_sequr=mysqli_real_escape_string($connect, $order);
   $sql_oll_result="SELECT * FROM users WHERE id IN(SELECT DISTINCT(user_id) FROM orders) ORDER BY $order";
   $geted_oll_result=mysqli_query($connect, $sql_oll_result); 
   while($associative_mass = mysqli_fetch_assoc($geted_oll_result)){
   echo 
   "<div class='del".$associative_mass['id']."'><div>".$associative_mass['firstname']." ". $associative_mass['lastname']."<br>
   Номер заказа :".$associative_mass['id']."<br>
   Сумма заказа :".$associative_mass['proffession']."<br>
   тел.:".$associative_mass['phone']."<br>
   Адрес.:".$associative_mass['address']."<br>
   дата заказа:".$associative_mass['date']."<br>
   </div>
   <div><button class='delete' onclick='del(".$associative_mass['id'].")'>Delete</button></div>
   </div>";
    }
  }
 //поисковик
 elseif ($purpose=='search') {
    $search=$_POST['search_by'];
    $search_sequr=mysqli_real_escape_string($connect, $search);
    $sql_search_result="SELECT * FROM users WHERE id IN(SELECT DISTINCT(user_id) FROM orders) AND firstname LIKE '%$search_sequr%' OR id LIKE '%$search_sequr%'";
    $geted_search_result = mysqli_query($connect, $sql_search_result);
    $quantity=mysqli_num_rows($geted_search_result);
      if($quantity>0){
        while ($associative_mass = mysqli_fetch_assoc($geted_search_result)) {
          echo 
          "<div class='del".$associative_mass['id']."'><div>".$associative_mass['firstname']." ". $associative_mass['lastname']."<br>
          Номер заказа :".$associative_mass['id']."<br>
          Сумма заказа :".$associative_mass['proffession']."<br>
          тел.:".$associative_mass['phone']."<br>
          Адрес.:".$associative_mass['address']."<br>
          дата заказа:".$associative_mass['date']."<br>
            
          </div>
          <div><button class='delete' onclick='del(".$associative_mass['id'].")'>Delete</button></div>
          </div>";
      }
      }else{
        echo "<div>по вашему запросу ничего не найдено</div>";
      }
    }
 //удаление
//  elseif ($purpose=='delet') {
//    $del_id=$_POST['del_id'];
//    $del_id_sequr=mysqli_real_escape_string($connect, $del_id);
//    $deleting="DELETE  FROM project_create_users WHERE id=$del_id_sequr";
//    mysqli_query($connect, $deleting);
//  }
//  //создание
//  elseif ($purpose=='create_new') {
//    $new_login=mysqli_real_escape_string($connect, $_POST['new_login']);
//    $new_password=mysqli_real_escape_string($connect, $_POST['new_password']);
//    $new_firstname=mysqli_real_escape_string($connect, $_POST['new_firstname']);
//    $new_lastname=mysqli_real_escape_string($connect, $_POST['new_lastname']);
//    $new_age=mysqli_real_escape_string($connect, $_POST['new_age']);
//    $new_proffession=mysqli_real_escape_string($connect, $_POST['new_proffession']);
//    $create_new_user="INSERT INTO project_create_users (login, password, firstname, lastname, age, proffession) VALUES ('$new_login', '$new_password', '$new_firstname', '$new_lastname', '$new_age', '$new_proffession')";
//     $sql_res=mysqli_query($connect, $create_new_user);
//    if($sql_res){
//     echo "data is insert";
//    }else {
//     echo mysqli_error($connect);
//    }
//}
 
?>