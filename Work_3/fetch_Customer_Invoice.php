<?php
    include "config.php";

    if(isset($_POST['startDate'])){

                    $i = 1;

                    $startDate = $_POST['startDate'];
                    $endDate = $_POST['endDate'];

                    // $sql1 = "SELECT Invoice_Number, Customer_Name, Customer_Number, Net_Total, Timestamp FROM Master_Invoice_Table WHERE MONTHNAME(Timestamp) = '{$month}' AND YEAR(Timestamp) = {$year}";
                    $sql1 = "SELECT Invoice_Number, Customer_Name, Customer_Number, Net_Total, Timestamp FROM Master_Invoice_Table WHERE Timestamp >= '{$startDate} 00:00:00' and Timestamp <= '{$endDate} 23:59:00'";

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

                              while($row1 = mysqli_fetch_assoc($result1))
                              {
                                $rows[] = array(
                                  'date' => $row1['Timestamp'],
                                  'customer_name' => $row1['Customer_Name'],
                                  'customer_number' => $row1['Customer_Number'],
                                  'invoice_number' => $row1['Invoice_Number'],
                                  'amount' => $row1['Net_Total']
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





