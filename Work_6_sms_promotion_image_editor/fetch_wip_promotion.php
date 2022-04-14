<?php

    include 'config.php';

    $sql = "SELECT * FROM sms_promotion_table ORDER BY sms_promotion_id DESC";

    $result = mysqli_query($conn, $sql);

    if(!$result)
    {
        echo json_encode(array(
            'error' => '1','res' => ''
          ));
    }else{
        if(mysqli_num_rows($result) > 0)
        {
            $i = 1;
            $rows = '';
            $btncolour = '';
            while($row = mysqli_fetch_assoc($result))
            {
                $expected_sms = 10*$row['sms_count'];
                $dnone = '';
                switch($row['status'])
                {
                    case 'submitted':
                        $btncolour = 'btn-danger';
                                $statusbtn = 'Cancel';
                                $btnfunc = 'cancel_sms('.$row['sms_promotion_id'].')';
                        break;
                        case 'modify':
                            $btncolour = 'btn-success';
                            $statusbtn = 'Confirm';
                            $btnfunc = 'confirm_sms('.$row['sms_promotion_id'].')';
                            break;
                            case 'finalised':
                                $dnone = 'd-none';
                                break;
                    
                }

                $promotiondate =date('Y-m-d\TH:i', $row['date_of_promotion']);
                $rows .= "
                <tr>
                    <td class='text-center'>$i</td>
                    <td class='nowrap' ><div data-code='{$row['sms_type']}'  data-sms='{$row['sms_promotion_id']}'><pre>{$row['sms']}</pre></div></td>
                    <td class='text-center nowrap'>{$row['status']}</td>
                    <td class='text-center nowrap'><div data-remarks='{$row['sms_promotion_id']}'>{$row['remarks_by_user']}</div></td>
                    <td class='text-center nowrap'>{$row['customer_segment']}</td>
                    <td class='text-center nowrap'>{$row['sms_count']}</td>
                    <td class='text-center nowrap'>{$row['sms_type']}</td>
                    <td class='text-center nowrap'>{$row['Submission_Date']}</td>
                    <td class='text-center nowrap'>{$row['Retailer_Id']}</td>
                    <td class='text-center nowrap' data-promotiondateid='{$row['sms_promotion_id']}' data-promotiondate='{$promotiondate}'>{$row['date_of_promotion']}</td>
                    <td class='text-center nowrap'>10</td>
                    <td class='text-center nowrap'>$expected_sms</td>
                    <td class='text-center nowrap'>5</td>
                    <td class='text-center nowrap'></td>
                    <td class='text-center nowrap'></td>
                </tr>          
                <tr class='$dnone'>
                    <td></td>
                    <td class=''><button class='btn $btncolour  float-end d-flex justify-content-center align-items-center' onclick='{$btnfunc}' style='border-radius:5px;height:30px;'>$statusbtn</button></td>
                    <td colspan='13'></td>
                </tr>
                ";
                $i++;
            }
            
            echo json_encode(array(
              'error' => '0','res' => $rows
            ));
        }else{
            echo json_encode(array(
              'error' => '2','res' => ''
            ));
        }
    }

?>