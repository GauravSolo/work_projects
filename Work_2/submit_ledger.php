<?php
include('config.php');

if(isset($_POST['customer_name']))
{
    date_default_timezone_set("Asia/Calcutta"); 
    $Customer_Name = mysqli_real_escape_string($conn,$_POST['customer_name']);
    $Customer_Id = mysqli_real_escape_string($conn,$_POST['customer_id']);
    $Customer_Phone_Number = mysqli_real_escape_string($conn,$_POST['customer_number']);
    $Transaction_Timestamp = date("d-m-Y h:i A");
    $Transaction_Status = mysqli_real_escape_string($conn,$_POST['status']);
    $Amount = $_POST['amount'];
    $Paid_By = mysqli_real_escape_string($conn,$_POST['paidby']);
    $Reference_Number = $_POST['reference'];
    $Remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
    $Balance = $_POST['balance'];
    $Prev_Balance = $_POST['prev_balance'];

    if($Balance < 0)
        $Balance = (-$Balance)." Db";
    else if($Balance > 0)
        $Balance .= " Cr";
    
    $Db = $_POST['db'];
    $Cr = $_POST['cr'];

    $sql = "INSERT INTO Customer_Transaction_Adjustment(Customer_Name, Customer_Id, Customer_Phone_Number, Transaction_Timestamp, Transaction_Status, Amount, Paid_By, Reference_Number, Remarks, Prev_Balance, Balance) VALUES('{$Customer_Name}', {$Customer_Id}, '{$Customer_Phone_Number}', now() , '{$Transaction_Status}', {$Amount} ,'{$Paid_By}', {$Reference_Number},'{$Remarks}','{$Prev_Balance}','{$Balance}');";
    $sql .= "INSERT INTO Customers_Transaction_Summary(Customer_Name, Customer_Id, Customer_Phone_Number, Transaction_Timestamp, Balance) VALUES('{$Customer_Name}', {$Customer_Id}, '{$Customer_Phone_Number}', now() ,'{$Balance}') ON DUPLICATE KEY UPDATE Transaction_Timestamp = now(), Balance = '{$Balance}';";

    $result = mysqli_multi_query($conn,$sql);

    if($result)
    {
        echo json_encode(array('res'=>'1'));
    }else{
        echo json_encode(array('res'=>'0'));
    }
  
}else{
    echo json_encode(array('res'=>"2"));
}


?>