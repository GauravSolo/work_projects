<?php
    include "config.php";

    if(isset($_POST['cid'])){

    
                    $i = 1;

                    $Customer_Id = $_POST['cid'];

                        function comp($arr1, $arr2)
                        {
                          $first =  new DateTime($arr1['date']);
                          $second =  new DateTime($arr2['date']);
                          if($first > $second)
                            return $arr1;
                          return $arr2;
                        }

                    $sql1 = "SELECT Transaction_Timestamp, Balance FROM Customer_Transaction_Master WHERE Customer_Id = {$Customer_Id} ORDER BY Transaction_Timestamp DESC LIMIT 1";
                    $sql2 = "SELECT Transaction_Timestamp, Balance FROM Customer_Transaction_Adjustment WHERE Customer_Id = {$Customer_Id} ORDER BY Transaction_Timestamp DESC LIMIT 1";


                    $result1 = mysqli_query($conn,$sql1);
                    $result2 = mysqli_query($conn,$sql2);

                    if(!$result1 || !$result2){
                        $ans = array('Balance' => "Couldnt fetch Net Balance");
                    }else{
                        // if everything is fine

                        $num1 = mysqli_num_rows($result1);
                        $num2 = mysqli_num_rows($result2);
                        if($num1 > 0 && $num2 > 0)
                        {
                            $row1 = mysqli_fetch_assoc($result1);
                            $row2 = mysqli_fetch_assoc($result2);

                            $ans = comp($row1, $row2);

                        }else if($num1 > 0)
                        {
                            $row1 = mysqli_fetch_assoc($result1);
                            $ans = $row1;
                        }else if($num2 > 0){
                            $row2 = mysqli_fetch_assoc($result2);
                            $ans = $row2;
                        }else if($num1 == 0 && $num2 == 0)
                        {
                            $ans = array('Balance' => 'No Data');
                        }
                    }
                    
                    

                    echo json_encode(array(
                    'res' => $ans['Balance']
                    ));
    }
?>





