<?php

//session_start();
$json = file_get_contents('php://input');
//$Retailer_Id = 1143;
//$Retailer_Id = $_SESSION['Retailer_id'];
$date = date('Y-m-d');
$decoded_json = json_decode($json);
$Ret_Id = $decoded_json->r_id;
//$hashtag = $decoded_json->hashtag;
$from_date = $decoded_json->from_date;
$to_date = $decoded_json->to_date;
$price = $decoded_json->price;
$remark = $decoded_json->remark;
$vendor = $decoded_json->vendor;
$payment = $decoded_json->payment;
$invoice = $decoded_json->invoice;

error_reporting(0);
require("config.inc.php");
require '../../lmsrr/android_webservices/test.php';
{

    if (!empty($from_date) && !empty($to_date) && !empty($price)) {

        if ($to_date == 1) {
            $update_sender_id_query = "INSERT INTO `Stock_Topup` (`Staff_Sub_Service_Id`, `Type`, `Retailer_Id`, `Stock_Topup_Count`, `Remark`, `Vendor_Id`, `payment`, `invoice`)"
                    . " VALUES ('$from_date', '$to_date', $Ret_Id, $price, '$remark', '$vendor', '$payment', '$invoice')";

            $query_params = array();

            try {
                $stmt = $db->prepare($update_sender_id_query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                $response["success"] = 0;
                $response["message"] = "Database Error 2!";
                $response["details"] = $ex;
                die(json_encode($response));
            }
        } else if ($to_date == -1) {
            $update_sender_id_query = "INSERT INTO `Stock_Topup` (`Staff_Sub_Service_Id`, `Type`, `Retailer_Id`, `Stock_Topup_Count`, `Remark`, `Vendor_Id`, `payment`, `invoice`)"
                    . " VALUES ('$from_date', '$to_date', $Ret_Id, '-$price', '$remark', '$vendor', '$payment', '$invoice')";

            $query_params = array();

            try {
                $stmt = $db->prepare($update_sender_id_query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                $response["success"] = 0;
                $response["message"] = "Database Error 2!";
                $response["details"] = $ex;
                die(json_encode($response));
            }
        }
        
        $update_sender_id_query = "INSERT INTO `vendor_stock_payment`(`vendor_stock_payment_id`, `Vendor_id`, `date`, `Retailer_Id`, `bill_amount`, `invoice`)
                VALUES (null,'$vendor','$date','$Ret_Id','$payment', '$invoice')";
        //    }
        $query_params = array();

        try {
            $stmt = $db->prepare($update_sender_id_query);
            $result = $stmt->execute($query_params);
            $response["success"] = 0;
        } catch (PDOException $ex) {
            $response["success"] = 0;
            $response["message"] = "Database Error 2!";
        }
//        if ($Ret_Id != 0) {
//            generateNotificationForAdmin(8, $Ret_Id);
//        }
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