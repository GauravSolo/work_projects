<?php
session_start();
require("config.inc.php");
$Retailer_Id = $_SESSION['Retailer_id'];
//  print_r($_POST);

//  $data = json_decode($_POST);
//  print_r($_POST["data"]);

$data = $_POST["data"];
$query = "";

 foreach($data as $row)
 {
     $id = $row['id'];
     $stock = $row['stock'];
     $rid = $row['rid'];
     $stock = $row['stock'];
     $remarks = $row['remarks'];
     $query .= "INSERT INTO Stock_Topup(`Staff_Sub_Service_Id`, `Type`, `Retailer_Id`, `Stock_Topup_Count`, `Remark`, `Vendor_Id`, `payment`, `invoice`) VALUES ($id, $type, $rid, $stock, $remarks,0,0,'');";
 }
//  INSERT INTO `Stock_Topup` (`Staff_Sub_Service_Id`, `Type`, `Retailer_Id`, `Stock_Topup_Count`, `Remark`, `Vendor_Id`, `payment`, `invoice`)"
//  . " VALUES ('$from_date', '$to_date', $Ret_Id, $price, '$remark', '$vendor', '$payment', '$invoice')
 $st = $db->prepare($query);
if($st->execute())
{
    echo json_encode(array('status' => '1'));
}else{
    echo json_encode(array('status' => '0'));
}

$db = null;

die();
    // echo $query;
    // print_r($db->errorInfo());
    // print_r($data);
    // print_r($_POST);

?>


