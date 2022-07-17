<?php
session_start();
require("config.inc.php");
$Retailer_Id = $_SESSION['Retailer_id'];
$startdate = $_POST["startdate"];
$enddate = $_POST["enddate"];

if(isset($_POST['customerreport']))
{
    $query = "SELECT `Customer_Master`.`Customer_Name` as name, `Customer_Transaction_Master`.`Customer_Id`, `Customer_Master`.Customer_Phone_Number as mobile, SUM( `Customer_Transaction_Master`.`Tx_Amount` ) AS amount,COUNT( `Customer_Transaction_Master`.`Tx_Amount` ) AS visits FROM `Customer_Transaction_Master`  join `Customer_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id` WHERE DATE( `Customer_Transaction_Master`.`Transaction_Timestamp` ) between '$startdate' and '$enddate' AND `Customer_Transaction_Master`.`Retailer_Id` = '$Retailer_Id' group by `Customer_Transaction_Master`.`Customer_Id` order by amount asc";

$statement  = $db->prepare($query);
$result = $statement->execute();

if($result)
{
    $rows = $statement->fetchAll();
    $response["aaData"] = array();
    $i = 1;
    foreach($rows as $row){
        $arr = array();
        $arr["sno"] = $i;
        $arr["name"] = $row["name"];
        $arr["mobile"] = $row["mobile"];
        $arr["amount"] = $row["amount"];
        $arr["visits"] = $row["visits"];
        
        array_push($response['aaData'], $arr);
        $i++;
    }
    echo json_encode($response);
}else{
    echo "error".$query;
    print_r($db->errorInfo());
}

$db=null;
die();
}


?>