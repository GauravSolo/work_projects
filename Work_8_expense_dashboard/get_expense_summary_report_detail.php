<?php

include('config.inc.php');

$Retailer_Id = $_SESSION['Retailer_id'];

    $months = array("January","February","March","April","May","June","July","August","September","October","November","December");

    $arr = [];

    $y = 2014;
    while($y <= date('Y'))
    {
        $m = 0;
        while($m < 12)
        {
            $arr[$y][$months[$m]] = array(
                                'Expense_Count' => 0,
                                'Expense_Amount' => 0
                            );
            $m++;
        }
        $y++;
    }

    $sql  = "SELECT COUNT(e_id) as count, SUM(Price) as sum, MONTHNAME(date_of_expense)  as month, YEAR(date_of_expense) as year FROM expense WHERE Retailer_Id = $Retailer_Id and payment = 'paid' GROUP BY monthname(date_of_expense), year(date_of_expense)";
	$query_params = array(
	);
	try {
	    $stmt = $db->prepare($sql);
	    $result = $stmt->execute($query_params);
	} catch (PDOException $ex) {
	    
	}
	// Finally, we can retrieve all of the found rows into an array using fetchAll 
	$rows = $stmt->fetchAll();

    if($result)
    {
        foreach ($rows as $row)
        {
            $arr[$row['year']][$row['month']]['Expense_Count'] = $row['count'];
            $arr[$row['year']][$row['month']]['Expense_Amount'] = $row['sum'];
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