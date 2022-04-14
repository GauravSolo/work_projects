<?php

include 'config.php';

if(isset($_POST['sms_promotion_id']))
{
        $sms_promotion_id = $_POST['sms_promotion_id'];
        
        $sql = "DELETE FROM sms_promotion_table  WHERE sms_promotion_id = {$sms_promotion_id}";

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