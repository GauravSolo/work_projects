<?php

include('config.inc.php');

$Retailer_Id = $_SESSION['Retailer_id'];
$fromdate = 

$query = "SELECT `Customer_Master`.`Customer_Name` as name, `Customer_Transaction_Master`.`Customer_Id`, `Customer_Master`.Customer_Phone_Number as mobile, SUM( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Sum,COUNT( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Count FROM `Customer_Transaction_Master`  join `Customer_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id` WHERE DATE( `Customer_Transaction_Master`.`Transaction_Timestamp` ) between '$fromdate' and '$todate' AND `Customer_Transaction_Master`.`Retailer_Id` = $Retailer_Id group by `Customer_Transaction_Master`.`Customer_Id` order by Transaction_Sum asc";

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
//        $post['Radio_Button'] = '<label class = "checkbox m-n i-checks">
//                        <input type = "checkbox" value="' . $row["Retailer_Id"] . '" name = "Retailer_Id" id = "Retailer_Id" style="display: none"/><i></i>
//                        </label>';
        $post['Sr_no'] = $i;
        $post['Customer_Name'] = $row['Customer_Name'];
        $post['Customer_Phone_Number'] = '<div class="dropdown">
                                            <button class="dropbtn" style="float:left;">' . $row['Customer_Phone_Number'] . '</button>
                                            <div class="dropdown-content" style="float:right;margin-left:100%;">
                                              
                                              <a href="invoice.php?mobile_number=' . $row['Customer_Phone_Number'] . '" target="blank">Invoice</a>
                                              <a href="home.php?mobile_number=' . $row['Customer_Phone_Number'] . '" target="blank">Quick Bill</a>
                                            </div>
                                          </div>';
//        $post['Customer_Phone_Number'] = '<a style="text-decoration:none;" href="loyalty.php?mobile=' . $row['Customer_Phone_Number'] . '" target="blank">' . $row['Customer_Phone_Number'] . '&nbsp;<u>Click Here</u></a>';
        $post['Customer_Type'] = $row['Customer_Type'];
        $i++;
//        $post['Profile_Button'] = '<a href="User_Profile_2.php?UId=' . $row["UId"] . '" class="btn btn-info"><i class="fa fa-user" style="margin-right: 5px;"></i>Profile</a>';
        array_push($response["aaData"], $post);
    }
}


// echoing JSON response
echo json_encode($response);


# close the connection
$db = null;
?>
