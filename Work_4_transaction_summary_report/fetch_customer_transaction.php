<?php
    include "config.php";

    if(isset($_POST['startDate'])){

                    $i = 1;

                    $startDate = $_POST['startDate'];
                    $endDate = $_POST['endDate'];

                    $sql1 = "SELECT Customer_Name, Customer_Phone_Number, Tx_Amount, Transaction_Timestamp, Note, Payment, Net_Amount, Cash_Paid, Card_Paid, Other_Paid, item_discount, bill_discount, Discount_Loyalty, Total_Discount, Indicator FROM Master_Transaction_Table WHERE Transaction_Timestamp >= '{$startDate} 00:00:00' and Transaction_Timestamp <= '{$endDate} 23:59:00'";

                    $result1 = mysqli_query($conn,$sql1);

                  if(!$result1)
                  {
                    echo json_encode(array(
                      'error' => '1', 'res' => mysqli_error($conn)
                    ));
                  }else{
                      if(mysqli_num_rows($result1) > 0)
                        {
                              $rows = [];
                              $paytype = '';
                              while($row1 = mysqli_fetch_assoc($result1))
                              {
                                if((int) $row1['Cash_Paid'] != 0)
                                {
                                  $paytype = 'Cash';
                                }else if((int) $row1['Card_Paid'] != 0)
                                {
                                  $paytype = 'Card';
                                }else if((int) $row1['Other_Paid'] != 0)
                                {
                                  $paytype = 'Other';
                                }

                                $rows[] = array(
                                  'customer_name' => $row1['Customer_Name'],
                                  'customer_number' => $row1['Customer_Phone_Number'],
                                  'sub_total' => $row1['item_discount'] + $row1['bill_discount'] + $row1['Discount_Loyalty'] + $row1['Net_Amount'],
                                  'item_disc' => $row1['item_discount'],
                                  'bill_disc' => $row1['bill_discount'],
                                  'loyalty' => $row1['Discount_Loyalty'],
                                  'ttl_disc' => $row1['item_discount'] + $row1['bill_discount'] + $row1['Discount_Loyalty'],
                                  'total_tax' => $row1['Tx_Amount'],
                                  'net_amt' => $row1['Net_Amount'],
                                  'paid' => $row1['Payment'],
                                  'type' => $paytype,
                                  'timestamp' => $row1['Transaction_Timestamp'],
                                  'ind' => $row1['Indicator'],
                                  'note' => $row1['Note'],
                                  'cash' => $row1['Cash_Paid'],
                                  'card' => $row1['Card_Paid'],
                                  'other' => $row1['Other_Paid']
                                );
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
    }else{
      echo json_encode(array(
        'error' => '3','res' => ''
      ));
    }
?>





