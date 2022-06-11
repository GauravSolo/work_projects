<?php


include('database_connection.php');

if(isset($_POST["upload"]))
{
    if($_FILES['product_file']['name'])
    {
    $filename = explode(".", $_FILES['product_file']['name']);
    if(end($filename) == "csv")
    {
    $handle = fopen($_FILES['product_file']['tmp_name'], "r");
    while($row = fgetcsv($handle))
    {
        $rows[] = $row;
        // $product_id =  $data[0];
        // $GST =  $data[1];  
        // $price =  $data[2];
        // $Commission_per =  $data[3];
        // $Commission =  $data[4];
        // $discount_per =  $data[5];
        // $discount =  $data[6];
        // $query = "
        // UPDATE products_tb
        // SET GST = '$GST', 
        // price = '$price', 
        // Commission_per ='$Commission_per',
        // Commission ='$Commission',
        // discount_per = '$discount_per',
        // discount = '$discount'  
        // WHERE product_id ='$product_id'
        // ";
        // $statement = $connect->prepare($query);
        // $statement->execute();
    }
    echo "<pre>";
    print_r($rows);
    echo "</pre>";
    fclose($handle);
    // header("location: index.php?updation=1");
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
    $connect = NULL;
    die();
}

?>