<?php

    include "config.php";

    $months = array("January","February","March","April","May","June","July","August","September","October","November","December");

    $arr = [];

    $y = 2014;
    while($y <= date('Y'))
    {
        $m = 0;
        while($m < 12)
        {
            $arr[$y][$months[$m]] = array(
                                'Transaction_Count' => 0,
                                'Transaction_Amount' => 0
                            );
            $m++;
        }
        $y++;
    }

    $sql  = "SELECT COUNT(Master_Transaction_Table_Id) as count, SUM(Net_Amount) as sum, MONTHNAME(Transaction_Timestamp)  as month, YEAR(Transaction_Timestamp) as year FROM Master_Transaction_Table GROUP BY monthname(Transaction_Timestamp), year(Transaction_Timestamp)";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $arr[$row['year']][$row['month']]['Transaction_Count'] = $row['count'];
            $arr[$row['year']][$row['month']]['Transaction_Amount'] = $row['sum'];
        }
        echo json_encode(array(
            'error' => '0','res' => $arr
          ));
    }else{
        echo json_encode(array(
            'error' => '1','res' => mysqli_error($conn)
          ));
    }

    
    
    
    


?>