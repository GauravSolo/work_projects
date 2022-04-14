<?php

include 'config.php';
date_default_timezone_set('Asia/Kolkata');


if(isset($_POST['relailer_id']))
{

        $Relailer_id = $_POST['relailer_id'];
        $sms = $_POST['sms'];
        $sms_type = $_POST['sms_type'];
        $Remarks = $_POST['remarks'];
        $char_count = $_POST['char_count'];
        $sms_count = $_POST['sms_count'];
        $customer_segment = $_POST['customer_segment'];
        $customer_data = $_POST['customer_data'];
        $customer_data_status = $_POST['customer_data_status'];
        $date_of_promotion = date("Y-m-d H:i:s",strtotime($_POST['date_of_promotion']));
        $sms_promotion_id = $_POST['sms_promotion_id'];

           if($sms_promotion_id == '')
           {
            $sql = "INSERT INTO sms_promotion_table(Retailer_Id,Submission_Date,date_of_promotion,sms,sms_type,remarks_by_user,char_count,sms_count,customer_segment,customer_data,customer_data_status,status) VALUES({$Relailer_id},now(), '{$date_of_promotion}' , N'{$sms}', '{$sms_type}', N'{$Remarks}', {$char_count}, {$sms_count},'{$customer_segment}','{$customer_data}','{$customer_data_status}','submitted')";
           }else{
            $sql = "UPDATE sms_promotion_table set Retailer_Id = {$Relailer_id}, Submission_Date  = now(), date_of_promotion  = '{$date_of_promotion}' ,sms  = N'{$sms}', sms_type  = '{$sms_type}', remarks_by_user  = N'{$Remarks}',char_count  = {$char_count}, sms_count = {$sms_count},customer_segment  = '{$customer_segment}',customer_data = '{$customer_data}',customer_data_status = '{$customer_data_status}',status = 'submitted' WHERE sms_promotion_id = {$sms_promotion_id}";
           }

            $result = mysqli_query($conn, $sql);

            if($result)
            {

                echo json_encode(array(
                    'error' => '0','res' => 'ok'.$sql
                ));
            }else{
                echo json_encode(array(
                    'error' => '1','res' => mysqli_error($conn).$sql
                ));
                }
}else{  
                echo json_encode(array(
                'error' => '3','res' => ''
                ));
}






?>