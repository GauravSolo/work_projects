<?php

//session_start();
$json = file_get_contents('php://input');
//$Retailer_Id = 1143;
//$Retailer_Id = $_SESSION['Retailer_id'];

$decoded_json = json_decode($json);
$Ret_Id = $decoded_json->r_id;
//$hashtag = $decoded_json->hashtag;
//$from_date = $decoded_json->from_date;
$to_date = $decoded_json->datas;
//echo json_encode($to_date);die;

error_reporting(0);
require("config.inc.php");
require '../../lmsrr/android_webservices/test.php';
{

    if (!empty($to_date)) {
        $checkbox = $to_date;

        for ($i = 0; $i < count($checkbox); $i++) {

            $del_id = $checkbox[$i];
            $sql = "UPDATE Staff_Sub_Service SET `Active_Status`= -1 where Staff_Sub_Service_Id='$del_id'";
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
        
        if ($Ret_Id != 0) {
            generateNotificationForAdmin(9, $Ret_Id);
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