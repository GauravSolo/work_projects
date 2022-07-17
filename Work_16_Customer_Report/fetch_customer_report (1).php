<?php
session_start();
require("config.inc.php");
$Retailer_Id = $_SESSION['Retailer_id'];
$startdate = $_POST["startdate"];
$enddate = $_POST["enddate"];

if(isset($_POST['customerreport']))
{
$query = "SELECT  `Customer_Master`.`Customer_Name` as name , `Customer_Master`.Customer_Phone_Number as mobile, SUM( `Customer_Transaction_Master`.`Tx_Amount` ) AS amount, COUNT( `Customer_Transaction_Master`.`Tx_Amount` ) AS visits, 'Internal' as type
FROM `Customer_Transaction_Master`
JOIN `Customer_Master` ON `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id`
WHERE DATE( `Customer_Transaction_Master`.`Transaction_Timestamp` ) between '$startdate' and '$enddate'  and `Customer_Transaction_Master`.`Retailer_Id` = '$Retailer_Id'
GROUP BY `Customer_Transaction_Master`.`Customer_Id`
UNION
SELECT `Customer_Master`.`Customer_Name` as name , `Customer_Master`.Customer_Phone_Number as mobile, SUM( 0 ) AS amount, SUM( 0 ) AS visits, 'External' as type
FROM `Customer_Retailer_Relationship_Table`
JOIN `Customer_Master` ON `Customer_Master`.`Customer_Id` = `Customer_Retailer_Relationship_Table`.`Customer_Id`
WHERE `Customer_Retailer_Relationship_Table`.`Retailer_Id` = '$Retailer_Id' and  NOT EXISTS(SELECT * from Customer_Transaction_Master where Customer_Transaction_Master.Customer_Id = `Customer_Retailer_Relationship_Table`.`Customer_Id`)
GROUP BY `Customer_Retailer_Relationship_Table`.`Customer_Id`";


$query = "SELECT * FROM (SELECT `Customer_Master`.`Customer_Id` as id , `Customer_Master`.`Customer_Name` as name , `Customer_Master`.Customer_Phone_Number as mobile, SUM( `Customer_Transaction_Master`.`Tx_Amount` ) AS amount, COUNT( `Customer_Transaction_Master`.`Tx_Amount` ) AS visits, 'Internal' as type
FROM `Customer_Transaction_Master`
JOIN `Customer_Master` ON `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id`
WHERE DATE( `Customer_Transaction_Master`.`Transaction_Timestamp` ) between '$startdate' and '$enddate'  and `Customer_Transaction_Master`.`Retailer_Id` = '$Retailer_Id'
GROUP BY `Customer_Transaction_Master`.`Customer_Id`
UNION
SELECT `Customer_Master`.`Customer_Id` as id , `Customer_Master`.`Customer_Name` as name , `Customer_Master`.Customer_Phone_Number as mobile, SUM( 0 ) AS amount, SUM( 0 ) AS visits, 'External' as type
FROM `Customer_Retailer_Relationship_Table`
JOIN `Customer_Master` ON `Customer_Master`.`Customer_Id` = `Customer_Retailer_Relationship_Table`.`Customer_Id`
WHERE `Customer_Retailer_Relationship_Table`.`Retailer_Id` = '$Retailer_Id'
GROUP BY `Customer_Retailer_Relationship_Table`.`Customer_Id`) GROUP BY id";

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
        $arr["mobile"] = '<div class="dropdown">
        <button class="dropbtn" style="float:left;">' . $row['mobile'] . '</button>
        <div class="dropdown-content" style="float:right;margin-left:100%;">
          
          <a style="background: orange;color: white;" href="invoice.php?mobile_number=' . $row['mobile'] . '" target="blank">Invoice</a>
          <a style="background: purple;color: white;"  href="home.php?mobile_number=' . $row['mobile'] . '" target="blank">Quick Bill</a>
        </div>
      </div>';
        $arr["amount"] = $row["amount"];
        $arr["visits"] = $row["visits"];
        $arr["type"] = $row["type"];
        
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