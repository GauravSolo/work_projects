<?php

/**
 * author - Jitendra Bhadane
 * Description - Get Retail Id with Schedule date
 */
session_start();
$json = file_get_contents('php://input');
//$Retailer_Id = 1143;
$Retailer_Id = $_SESSION['Retailer_id'];

$Current_Date = date('Y-m-d');
$Date_1 = date('Y-m-d', strtotime("-30 days"));
$Date_2 = date('Y-m-d', strtotime("-90 days"));
$Date_3 = date('Y-m-d', strtotime("-180 days"));

$decoded_json = json_decode($json);
$Ret_Id = $decoded_json->r_id;
$hashtag = $decoded_json->hashtag;
//$from_date = $decoded_json->from_date;
//$to_date = $decoded_json->to_date;

error_reporting(0);
require("config.inc.php"); {
    $response["customer_details"] = "";
    $sr_no = 1;
    $tot_count = 1;

    if ($hashtag == 1) {
        $query = "SELECT `Customer_Master`.`Customer_Name`, `Customer_Transaction_Master`.`Customer_Id`, `Customer_Master`.Customer_Phone_Number, SUM( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Sum,COUNT( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Count FROM `Customer_Transaction_Master` INNER JOIN `Retailers_Master` ON `Retailers_Master`.`Retailer_Id` = `Customer_Transaction_Master`.`Retailer_Id` inner join `Customer_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id` WHERE DATE( `Transaction_Timestamp` ) between '$Date_1' and '$Current_Date' AND `Customer_Transaction_Master`.`Retailer_Id` = $Retailer_Id group by `Customer_Transaction_Master`.`Customer_Id` order by Transaction_Sum desc";

        $query_params = array(
        );
        //echo $query;
        //execute query
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $response["success"] = 1;
            $response["message"] = "Retailer Found 1!";
        } catch (PDOException $ex) {
            $response["success"] = 0;
            $response["message"] = "Database Error!";
            $response["details"] = $ex;
            die(json_encode($response));
        }
        // Finally, we can retrieve all of the found rows into an array using fetchAll
        $rows = $stmt->fetchAll();
        if ($rows) {
            //print_r($rows);exit;		
            foreach ($rows as $row) {
                $response["customer_details"] .= '<tr><td>' . $sr_no . '</td><td>' . $row['Customer_Name'] . '</td><td>'.'<div class="dropdown">
                <button class="dropbtn" style="float:left;">' . $row['Customer_Phone_Number'] . '</button>
                <div class="dropdown-content" style="float:right;margin-left:100%;">
                  
                  <a href="invoice.php?mobile_number=' . $row['Customer_Phone_Number'] . '" target="blank">Invoice</a>
                  <a href="home.php?mobile_number=' . $row['Customer_Phone_Number'] . '" target="blank">Quick Bill</a>
                </div>
              </div>'.'</td><td>' . $row['Transaction_Sum'] . '</td><td>' . $row['Transaction_Count'] . '</td></tr>';
                $sr_no = $sr_no + 1;
                $tot_count = $tot_count + 1;
            }
        } else {
            $return = 0;
        }
    } else if ($hashtag == 2) {
        $query = "SELECT `Customer_Master`.`Customer_Name`, `Customer_Transaction_Master`.`Customer_Id`, `Customer_Master`.Customer_Phone_Number, SUM( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Sum,COUNT( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Count FROM `Customer_Transaction_Master` INNER JOIN `Retailers_Master` ON `Retailers_Master`.`Retailer_Id` = `Customer_Transaction_Master`.`Retailer_Id` inner join `Customer_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id` WHERE DATE( `Transaction_Timestamp` ) between '$Date_2' and '$Current_Date' AND `Customer_Transaction_Master`.`Retailer_Id` = $Retailer_Id group by `Customer_Transaction_Master`.`Customer_Id` order by Transaction_Sum desc";

        $query_params = array(
        );
        //echo $query;
        //execute query
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $response["success"] = 1;
            $response["message"] = "Retailer Found 1!";
        } catch (PDOException $ex) {
            $response["success"] = 0;
            $response["message"] = "Database Error!";
            $response["details"] = $ex;
            die(json_encode($response));
        }
        // Finally, we can retrieve all of the found rows into an array using fetchAll
        $rows = $stmt->fetchAll();
        if ($rows) {
            //print_r($rows);exit;		
            foreach ($rows as $row) {
                $response["customer_details"] .= '<tr><td>' . $sr_no . '</td><td>' . $row['Customer_Name'] . '</td><td>'.'<div class="dropdown">
                <button class="dropbtn" style="float:left;">' . $row['Customer_Phone_Number'] . '</button>
                <div class="dropdown-content" style="float:right;margin-left:100%;">
                  
                  <a href="invoice.php?mobile_number=' . $row['Customer_Phone_Number'] . '" target="blank">Invoice</a>
                  <a href="home.php?mobile_number=' . $row['Customer_Phone_Number'] . '" target="blank">Quick Bill</a>
                </div>
              </div>'.'</td><td>' . $row['Transaction_Sum'] . '</td><td>' . $row['Transaction_Count'] . '</td></tr>';
                $sr_no = $sr_no + 1;
                $tot_count = $tot_count + 1;
            }
        } else {
            $return = 0;
        }
    } else if ($hashtag == 3) {
        $query = "SELECT `Customer_Master`.`Customer_Name`, `Customer_Transaction_Master`.`Customer_Id`, `Customer_Master`.Customer_Phone_Number, SUM( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Sum,COUNT( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Count FROM `Customer_Transaction_Master` INNER JOIN `Retailers_Master` ON `Retailers_Master`.`Retailer_Id` = `Customer_Transaction_Master`.`Retailer_Id` inner join `Customer_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id` WHERE DATE( `Transaction_Timestamp` ) between '$Date_3' and '$Current_Date' AND `Customer_Transaction_Master`.`Retailer_Id` = $Retailer_Id group by `Customer_Transaction_Master`.`Customer_Id` order by Transaction_Sum desc";

        $query_params = array(
        );
        //echo $query;
        //execute query
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $response["success"] = 1;
            $response["message"] = "Retailer Found 1!";
        } catch (PDOException $ex) {
            $response["success"] = 0;
            $response["message"] = "Database Error!";
            $response["details"] = $ex;
            die(json_encode($response));
        }
        // Finally, we can retrieve all of the found rows into an array using fetchAll
        $rows = $stmt->fetchAll();
        if ($rows) {
            //print_r($rows);exit;		
            foreach ($rows as $row) {
                $response["customer_details"] .= '<tr><td>' . $sr_no . '</td><td>' . $row['Customer_Name'] . '</td><td>'.'<div class="dropdown">
                <button class="dropbtn" style="float:left;">' . $row['Customer_Phone_Number'] . '</button>
                <div class="dropdown-content" style="float:right;margin-left:100%;">
                  
                  <a href="invoice.php?mobile_number=' . $row['Customer_Phone_Number'] . '" target="blank">Invoice</a>
                  <a href="home.php?mobile_number=' . $row['Customer_Phone_Number'] . '" target="blank">Quick Bill</a>
                </div>
              </div>'.'</td><td>' . $row['Transaction_Sum'] . '</td><td>' . $row['Transaction_Count'] . '</td></tr>';
                $sr_no = $sr_no + 1;
                $tot_count = $tot_count + 1;
            }
        } else {
            $return = 0;
        }
    }else if ($hashtag == 4) {
        $query = "SELECT `Customer_Master`.`Customer_Name`, `Customer_Transaction_Master`.`Customer_Id`, `Customer_Master`.Customer_Phone_Number, SUM( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Sum,COUNT( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Count FROM `Customer_Transaction_Master` INNER JOIN `Retailers_Master` ON `Retailers_Master`.`Retailer_Id` = `Customer_Transaction_Master`.`Retailer_Id` inner join `Customer_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id` WHERE `Customer_Transaction_Master`.`Retailer_Id` = $Retailer_Id group by `Customer_Transaction_Master`.`Customer_Id` order by Transaction_Sum desc";

        $query_params = array(
        );
        //echo $query;
        //execute query
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            $response["success"] = 1;
            $response["message"] = "Retailer Found 1!";
        } catch (PDOException $ex) {
            $response["success"] = 0;
            $response["message"] = "Database Error!";
            $response["details"] = $ex;
            die(json_encode($response));
        }
        // Finally, we can retrieve all of the found rows into an array using fetchAll
        $rows = $stmt->fetchAll();
        if ($rows) {
            //print_r($rows);exit;		
            foreach ($rows as $row) {
                $response["customer_details"] .= '<tr><td>' . $sr_no . '</td><td>' . $row['Customer_Name'] . '</td><td>'.'<div class="dropdown">
                <button class="dropbtn" style="float:left;">' . $row['Customer_Phone_Number'] . '</button>
                <div class="dropdown-content" style="float:right;margin-left:100%;">
                  
                  <a href="invoice.php?mobile_number=' . $row['Customer_Phone_Number'] . '" target="blank">Invoice</a>
                  <a href="home.php?mobile_number=' . $row['Customer_Phone_Number'] . '" target="blank">Quick Bill</a>
                </div>
              </div>'.'</td><td>' . $row['Transaction_Sum'] . '</td><td>' . $row['Transaction_Count'] . '</td></tr>';
                $sr_no = $sr_no + 1;
                $tot_count = $tot_count + 1;
            }
        } else {
            $return = 0;
        }
    }

                                         

//	//This query for External customer
//	/* $query = "select `Customer_Name`, `Customer_Phone_Number`,(CASE 
//        WHEN Customer_Transaction_Master_Id <> '' THEN 'Internal'            
//        ELSE 1 
//    END) AS 'Customer_Type' FROM `Customer_Master` inner join 
//        `Customer_Transaction_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id`
//        WHERE `Customer_Transaction_Master`.`Retailer_Id` = $Retailer_Id AND Date(`Customer_Registration_DateTime`) BETWEEN '$from_date' AND '$to_date'";
//		 */
//	/* $query = "select `Customer_Name`, `Customer_Phone_Number`, 
//					(
//					CASE 
//					WHEN flag = 4 THEN 'External'
//					WHEN flag = 1 THEN 'External'        
//					ELSE 1
//					END) AS 'Customer_Type'
//					FROM `Customer_Master` inner join `Customer_Retailer_Relationship_Table` 
//					on  `Customer_Retailer_Relationship_Table`.Customer_Id = `Customer_Master`.Customer_Id 
//					WHERE `Customer_Retailer_Relationship_Table`.`Retailer_Id` = $Retailer_Id
//					and (`Customer_Retailer_Relationship_Table`.`Flag`=1 or `Customer_Retailer_Relationship_Table`.`Flag`=4 or Customer_Retailer_Relationship_Table.`flag` <> 2) AND `Verification_For_Coupon` = 1 AND Date(`Customer_Registration_DateTime`) BETWEEN '$from_date' AND '$to_date'";													 */
//	 
//	 $query = "SELECT `Customer_Transaction_Master`.`Customer_Id`, `Customer_Master`.Customer_Phone_Number, SUM( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Sum,COUNT( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Count FROM `Customer_Transaction_Master` INNER JOIN `Retailers_Master` ON `Retailers_Master`.`Retailer_Id` = `Customer_Transaction_Master`.`Retailer_Id` inner join `Customer_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id` WHERE DATE( `Transaction_Timestamp` ) between '2015-10-10' and '2017-10-10' AND `Customer_Transaction_Master`.`Retailer_Id` = $Retailer_Id group by `Customer_Transaction_Master`.`Customer_Id`";
//			
//    $query_params = array(
//    );
//	//echo $query;
//	//execute query
//    try {
//        $stmt = $db->prepare($query);
//        $result = $stmt->execute($query_params);
//		$response["success"] = 1;
//        $response["message"] = "Retailer Found 2!";
//    } catch (PDOException $ex) {
//        $response["success"] = 0;
//        $response["message"] = "Database Error!";
//        $response["details"] = $ex;
//        die(json_encode($response));
//    }
//	// Finally, we can retrieve all of the found rows into an array using fetchAll
//    $rows = $stmt->fetchAll();
//    if ($rows) {
//		//print_r($rows);exit;		
//		foreach ($rows as $row) {				
//			//This query for Internal customer
//			$response["customer_details"] .= '<tr><td>'.$sr_no.'</td><td>'.$row['Customer_Phone_Number'].'</td><td>'.$row['Transaction_Sum'].'</td><td>'.$row['Transaction_Count'].'</td></tr>';  												
//			$sr_no = $sr_no + 1;
//			$tot_count = $tot_count + 1;
//		}      			
//			
//    }else{
//		$return1 = 0;
//       
//    }
//	/* Pick from contact  */
//	$query = "SELECT `Customer_Transaction_Master`.`Customer_Id`, `Customer_Master`.Customer_Phone_Number, SUM( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Sum,COUNT( `Customer_Transaction_Master`.`Tx_Amount` ) AS Transaction_Count FROM `Customer_Transaction_Master` INNER JOIN `Retailers_Master` ON `Retailers_Master`.`Retailer_Id` = `Customer_Transaction_Master`.`Retailer_Id` inner join `Customer_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id` WHERE DATE( `Transaction_Timestamp` ) between '2015-10-10' and '2017-10-10' AND `Customer_Transaction_Master`.`Retailer_Id` = $Retailer_Id group by `Customer_Transaction_Master`.`Customer_Id`";
//			
//    $query_params = array(
//    );
//	//echo $query;
//	//execute query
//    try {
//        $stmt = $db->prepare($query);
//        $result = $stmt->execute($query_params);
//		$response["success"] = 1;
//        $response["message"] = "Retailer Found 2!";
//    } catch (PDOException $ex) {
//        $response["success"] = 0;
//        $response["message"] = "Database Error!";
//        $response["details"] = $ex;
//        die(json_encode($response));
//    }
//	// Finally, we can retrieve all of the found rows into an array using fetchAll
//    $rows = $stmt->fetchAll();
//    if ($rows) {
//		//print_r($rows);exit;		
//		foreach ($rows as $row) {				
//			//This query for Internal customer
//			$response["customer_details"] .= '<tr><td>'.$sr_no.'</td><td>'.$row['Customer_Phone_Number'].'</td><td>'.$row['Transaction_Sum'].'</td><td>'.$row['Transaction_Count'].'</td></tr>';  												
//			$sr_no = $sr_no + 1;
//			$tot_count = $tot_count + 1;
//		}      			
//			
//    }else{
//		$return3 = 0;
//       
//    }
//	/* End Pick from contact  */
    if ($return == 0) {
        $response["success"] = "false";
        $response["message"] = "Retailer Not Found !";
    }
    // echoing JSON response
    $response["total_record"] = $hashtag;
    echo json_encode($response);
    $db = null;
}