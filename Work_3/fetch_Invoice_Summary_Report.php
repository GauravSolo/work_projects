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
                                'Invoice_Count' => 0,
                                'Invoice_Amount' => 0
                            );
            $m++;
        }
        $y++;
    }

    $sql  = "SELECT COUNT(Invoice_Id) as count, SUM(Net_Total) as sum, MONTHNAME(Timestamp)  as month, YEAR(Timestamp) as year FROM Master_Invoice_Table GROUP BY monthname(Timestamp), year(Timestamp)";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $arr[$row['year']][$row['month']]['Invoice_Count'] = $row['count'];
            $arr[$row['year']][$row['month']]['Invoice_Amount'] = $row['sum'];
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