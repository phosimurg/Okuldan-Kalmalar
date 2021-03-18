<?php

//fetch.php

$connect = new PDO('mysql:host=remotemysql.com;dbname=BZ56EAYplZ', 'BZ56EAYplZ', 'yFJas1iecL');

if(isset($_POST["index"], $_POST["business_id"]))
{
 $query = "
 INSERT INTO rating(business_id, rating) 
 VALUES (:business_id, :rating)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':business_id'  => $_POST["business_id"],
   ':rating'   => $_POST["index"]
  )
 );
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'done';
 }
}


?>
