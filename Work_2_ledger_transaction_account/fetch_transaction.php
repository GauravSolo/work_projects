<?php
    include "config.php";

    if(isset($_POST['cid'])){

    
                    $i = 1;

                    $Customer_Id = $_POST['cid'];
                    function addSuffix($value){
                      if($value < 0)
                        $value = (-$value)." Db";
                      else if($value > 0)
                        $value = ($value)." Cr";
                      return $value;
                    }

                    $sql1 = "SELECT Transaction_Timestamp, Invoice_Id , Net_Amount, Amount_Paid, Balance,Indicator FROM Customer_Transaction_Master WHERE Customer_Id = {$Customer_Id}";
                    $sql2 = "SELECT Transaction_Timestamp, Transaction_Status, Amount, Reference_Number, Balance FROM Customer_Transaction_Adjustment WHERE Customer_Id = {$Customer_Id}";


                    $result1 = mysqli_query($conn,$sql1);
                    $result2 = mysqli_query($conn,$sql2);

                  if(!$result1 || !$result2)
                  {
                    echo json_encode(array(
                      'error' => '1', 'res' => ''
                    ));
                  }else{
                      if(mysqli_num_rows($result1) > 0 || mysqli_num_rows($result2) > 0)
                        {
                              $rows = [];

                              while($row1 = mysqli_fetch_assoc($result1))
                              {
                                  switch($row1['Indicator'])
                                  {
                                    case '1' :
                                          $narr = "Purchase with Invoice No. {$row1['Invoice_Id']}";
                                          break;
                                    case '2' :
                                          $narr = "Purchase against Quick Bill";
                                          break; 
                                          case '3' :
                                            $narr = "Paid with Quick Bill";
                                            break;
                                            case '4' :
                                              $narr = "Paid against  Bill";
                                              break;
                                          
                                  }

                                $rows[] = array(
                                  'date' => $row1['Transaction_Timestamp'],
                                  'narr' => $narr,
                                  'Db' => $row1['Net_Amount'],
                                  'Cr' => $row1['Amount_Paid'],
                                  'net' => $row1['Balance']
                                );
                              }

                              while($row2 = mysqli_fetch_assoc($result2))
                              {
                                if($row2['Transaction_Status'] == 'received')
                                {
                                  $amountDb = 0;
                                  $amountCr = $row2['Amount'];
                                }else if($row2['Transaction_Status'] == 'paid')
                                {
                                  $amountDb = $row2['Amount'];
                                  $amountCr = 0;
                                }

                                $rows[] = array(
                                  'date' => $row2['Transaction_Timestamp'],
                                  'narr' => "Adjustment against Reference No. {$row2['Reference_Number']}",
                                  'Db' => $amountDb,
                                  'Cr' => $amountCr,
                                  'net' => $row2['Balance']
                                );
                              }
                              function comp($arr1, $arr2)
                              {
                                $first =  new DateTime($arr1['date']);
                                $second =  new DateTime($arr2['date']);
                                if($first > $second)
                                  return 1;
                                else if($first < $second)
                                  return -1;
                                return 0;
                              }
                              uasort($rows, "comp");
                              
                            echo json_encode(array(
                              'error' => '0','res' => $rows
                            ));
                          }else{
                            echo json_encode(array(
                              'error' => '2','res' => ''
                            ));
                          }
                  }
    }
?>





