<?php

include('config.inc.php');

$Retailer_Id = $_SESSION['Retailer_id'];


$query = "SELECT * FROM `expense` inner JOIN expense_category on expense_category.expense_id = expense.category_id inner JOIN vendor_list on vendor_list.Vendor_Id= expense.vendor_id WHERE expense.`Retailer_Id`=$Retailer_Id and expense.payment = 'paid'";

$query_params = array(
);

//execute query
try {
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    
}
// Finally, we can retrieve all of the found rows into an array using fetchAll 
$rows = $stmt->fetchAll();


if ($rows) {
    $response["aaData"] = array();
    $i = 1;
    foreach ($rows as $row) {

    $post['Sr_no'] = $i;
    $post['e_id'] = $row['e_id'];
    $post['Category_Name'] = $row['Category_Name'];
    $post['Vendor_Name'] = "vendor";
    $post['Price'] = $row['Price'];
    $post['date'] = $row['date_of_expense'];
    $post['remark'] = $row['remark'];
    $post['Payment_Mode'] = $row['payment_type'];
    $post['Payment_Type'] = $row['payment'];
    $post['edit'] = "<i class='fas fa-edit' onclick='edititem(this,{$row['e_id']})' style='color:grey;cursor:pointer;'></i><button onclick='updateitem(this,{$row['e_id']})' class='btn btn-warning btn-sm d-none'>Update</button>";
    $post['cancel'] = "<i class='fas fa-trash' onclick='deleteitem({$row['e_id']})' style='color:red;cursor:pointer;'></i>";
        $i++;
        array_push($response["aaData"], $post);
    }
}


// echoing JSON response
echo json_encode($response);


# close the connectio
$db = null;
?>
