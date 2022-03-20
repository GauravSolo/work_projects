<?php
    include "config.php";

    
                    $error ='0';

                    $sql1 = "SELECT Customer_Name, Customer_Phone_Number, Balance FROM Customers_Transaction_Summary";


                    $result1 = mysqli_query($conn,$sql1);

                    if(!$result1){
                        $error = '1';
                    }else{
                        // if everything is fine

                        $num1 = mysqli_num_rows($result1);
                        $rows = [];
                        if($num1 > 0)
                        {
                            

                              while($row1 = mysqli_fetch_assoc($result1))
                              {
                                $rows[] = array(
                                  'customer_name' => $row1['Customer_Name'],
                                  'customer_phone' => $row1['Customer_Phone_Number'],
                                  'balance' => $row1['Balance']
                                );
                              }

                        }else if($num1 == 0)
                        {
                            $error = '2';
                        }
                    }

                    echo json_encode(array(
                        'error' => $error,'res' => $rows
                      ));
   
?>

