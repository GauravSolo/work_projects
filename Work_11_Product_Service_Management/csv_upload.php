<?php
require 'config.php';
if(isset($_POST["upload"]))
{
 if($_FILES['product_file']['name'])
 {
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['product_file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $product_id = mysqli_real_escape_string($con, $data[0]);
    $GST = mysqli_real_escape_string($con, $data[1]);  
    $price = mysqli_real_escape_string($con, $data[2]);
    $Commission_per = mysqli_real_escape_string($con, $data[3]);
    $Commission = mysqli_real_escape_string($con, $data[4]);
    $discount_per = mysqli_real_escape_string($con, $data[5]);
    $discount = mysqli_real_escape_string($con, $data[6]);
    $query = "
    UPDATE products_tb
    SET GST = '$GST', 
    price = '$price', 
    Commission_per ='$Commission_per',
    Commission ='$Commission',
    discount_per = '$discount_per',
    discount = '$discount'  
    WHERE product_id ='$product_id'
    ";
    mysqli_query($con, $query);
   }
   fclose($handle);
   header("location: index.php?updation=1");
  }
  else
  {
  echo'<script type="text/javascript"> alert("Please Select CSV File only")</script>';
   }
 }
 else
 {
  echo'<script type="text/javascript"> alert("Please Select File")</script>';
 }
}

/*if(isset($_GET["updation"]))
{

 $message = '<label class="text-success">Product Updation Done</label>';
}*/
?>