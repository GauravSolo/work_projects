<?php

//session_start();
$json = file_get_contents('php://input');
//$Retailer_Id = 1143;
//$Retailer_Id = $_SESSION['Retailer_id'];

$decoded_json = json_decode($json);
$Ret_Id = $decoded_json->r_id;
//$hashtag = $decoded_json->hashtag;
//$price = $decoded_json->datasss;
$from_date = $decoded_json->datass;
$to_date = $decoded_json->datas;
//echo json_encode($to_date);die;

error_reporting(0);
require("config.inc.php");
require '../../lmsrr/android_webservices/test.php';
{

    if (!empty($to_date)) {
        $checkbox = $to_date;
//        $checkbox2 = $from_date;

        for ($i = 0; $i < count($checkbox); $i++) {

            $del_id = $checkbox[$i];
            $up_id = $from_date[$i];
//            $price_rs = $price[$i];
            
            $sql = "INSERT INTO `Stock_Topup` (`Staff_Sub_Service_Id`, `Type`, `Retailer_Id`, `Stock_Topup_Count`)"
                . " VALUES ('$del_id', '1', $Ret_Id, $up_id)";
            
//            $sql = "UPDATE Staff_Sub_Service SET `Requested_Comission`= $up_id, `Requested_Price` = $price_rs where Staff_Sub_Service_Id='$del_id'";
            $query_params = array();
//UPDATE `Sender_Id_Master` SET `Sender_Id`= '$Sender_Id'
            try {
                $stmt = $db->prepare($sql);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                $response["success"] = 0;
                $response["message"] = "Database Error 2!";
                $response["details"] = $ex;
                die(json_encode($response));
            }
        }
        
//        echo json_encode($response);
//    echo '<script type="text/javascript">alert("Staff Added Successfully ")</script>';

        $db = NULL;

        $response["details"] = 1;
    } else {
        $response["details"] = 2;
    }
    echo json_encode($response);
    $db = null;
}