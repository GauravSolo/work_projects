<?php

include "config.php";
//  print_r($_POST);

//  $data = json_decode($_POST);
//  print_r($_POST["data"]);

$data = $_POST["data"];
$query = "";

 foreach($data as $row)
 {
     $id = $row['id'];
     $stock = $row['stock'];

     $query .= "INSERT INTO stock(service_id,stockcount) VALUES ($id, $stock);";
 }

 $st = $db->prepare($query);
if($st->execute())
{
    echo json_encode(array('status' => '1'));
}else{
    echo json_encode(array('status' => '0'));
    die();
    echo $query;
    print_r($db->errorInfo());
    print_r($data);
    print_r($_POST);
}





?>


