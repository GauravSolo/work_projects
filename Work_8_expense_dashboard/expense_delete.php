<?php

include('config.php');

// $Retailer_Id = $_SESSION['Retailer_id'];
$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];



$sql = "DELETE FROM expense_table WHERE e_id = {$id}";

$result = mysqli_query($conn, $sql);

if($result){
    echo json_encode(array('error'=> '0','res'=> "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
    Successfully Deleted !
    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
  </div>"));
}else{
    echo json_encode(array('error'=> '1','res'=> "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
    Error : ".mysqli_error($conn).$sql."
    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
  </div>"));
}



?>