<?php
include "config.php";

if(isset($_POST['stock']))
{
    $query = "select sum(stockcount) as count , category_tb.type as type, products_tb.sub_category_id as id ,products_tb.category_name as name, products_tb.subcategory_name as subname,products_tb.GST as gst,products_tb.price as price FROM `stock` JOIN  `products_tb` on `products_tb`.`sub_category_id` = `stock`.`service_id` JOIN category_tb on category_tb.category_name = products_tb.category_name  group by `stock`.`service_id`";

// $query = "select sum(Stock_Topup_Count) as count, Staff_Sub_Service.Staff_Sub_Service_Id  as id ,`Staff_Sub_Service`.`Sub_Service_Name` as subname,`Staff_Service`.`Service_Name` as name, Staff_Service.type  as type FROM `Stock_Topup` inner join `Staff_Sub_Service` on `Staff_Sub_Service`.`Staff_Sub_Service_Id` = `Stock_Topup`.`Staff_Sub_Service_Id` inner join `Staff_Service` on `Staff_Service`.`Staff_Service_Id` = `Staff_Sub_Service`.`Staff_Service_Id` where Staff_Sub_Service.Retailer_Id=$Retailer_Id and Staff_Sub_Service.Active_Status in (-1,1) and Staff_Service.Category = 1 group by `Stock_Topup`.`Staff_Sub_Service_Id`";

$statement  = $db->prepare($query);
$result = $statement->execute();

if($result)
{
    $rows = $statement->fetchAll();
    $response["aaData"] = array();
    $i = 1;
    foreach($rows as $row){
        $arr = array();
        $arr["sno"] = $i;
        $arr["id"] = $row["id"];
        $arr["category"] = $row["name"];
        $arr["subcategory"] = $row["subname"];
        $arr["netchange"] = 12;
        $arr["stock"] = $row["count"];
        $arr["click"] = " <a class='toggle-btn d-flex justify-content-center align-items-center' style='background-color: transparent !important; color : purple !important;' href='#!'>
                            <span >Click</span> &nbsp &nbsp
                            <i class='fas float-end fa-caret-up'  style='display:none;'></i>
                            <i class='fas float-end fa-caret-down' ></i>
                            </a>";
        
        array_push($response['aaData'], $arr);
        $i++;
    }
    echo json_encode($response);
}else{
    echo "error".$query;
    print_r($db->errorInfo());
}

$db=null;
die();
}


if(isset($_POST['selling']))
{
    $rowcount = $_POST["rows"];
    $query = "SELECT sum(stockcount) as count ,count(*) OVER() AS full_count, category_tb.type as type, products_tb.sub_category_id as id ,products_tb.category_name as name, products_tb.subcategory_name as subname,products_tb.GST as gst,products_tb.price as price FROM `stock` JOIN  `products_tb` on `products_tb`.`sub_category_id` = `stock`.`service_id` JOIN category_tb on category_tb.category_name = products_tb.category_name  group by `stock`.`service_id` order by count ASC LIMIT 0 , $rowcount";

    // $query = "select sum(Stock_Topup_Count) as count, Staff_Sub_Service.Staff_Sub_Service_Id  as id ,`Staff_Sub_Service`.`Sub_Service_Name` as subname,`Staff_Service`.`Service_Name` as name, Staff_Service.type  as type FROM `Stock_Topup` inner join `Staff_Sub_Service` on `Staff_Sub_Service`.`Staff_Sub_Service_Id` = `Stock_Topup`.`Staff_Sub_Service_Id` inner join `Staff_Service` on `Staff_Service`.`Staff_Service_Id` = `Staff_Sub_Service`.`Staff_Service_Id` where Staff_Sub_Service.Retailer_Id=$Retailer_Id and Staff_Sub_Service.Active_Status in (0,1) and Staff_Service.Category = 1 group by `Stock_Topup`.`Staff_Sub_Service_Id`";
    
    $statement  = $db->prepare($query);
    $result = $statement->execute();
    
    if($result)
    {
        $rows = $statement->fetchAll();
        $response["aaData"] = array();
        $i = 1;
        foreach($rows as $row){
            $arr = array();
            $arr["sno"] = $i;
            $arr["id"] = $row["id"];
            $arr["category"] = $row["name"];
            $arr["subcategory"] = $row["subname"];
            $arr["stock"] = $row["count"];
            array_push($response['aaData'], $arr);
            $i++;
        }
        if($rowcount >=$row["full_count"])
        {
            $response["rowcount"] = 0;
        }else{
            $response["rowcount"] = 1;
        }
        echo json_encode($response);
    }else{
        echo "error".$query;
        print_r($db->errorInfo());
    }
$db=null;
die();
}



if(isset($_POST['damaged']))
{
    $rowcount = $_POST["rows"];
    $query = "select sum(stockcount) as count , category_tb.type as type, products_tb.sub_category_id as id ,products_tb.category_name as name, products_tb.subcategory_name as subname,products_tb.GST as gst,products_tb.price as price FROM `stock` JOIN  `products_tb` on `products_tb`.`sub_category_id` = `stock`.`service_id` JOIN category_tb on category_tb.category_name = products_tb.category_name  group by `stock`.`service_id` order by count DESC LIMIT 0 , $rowcount";

    // $query = "select sum(Stock_Topup_Count) as count, Staff_Sub_Service.Staff_Sub_Service_Id  as id ,`Staff_Sub_Service`.`Sub_Service_Name` as subname,`Staff_Service`.`Service_Name` as name, Staff_Service.type  as type FROM `Stock_Topup` inner join `Staff_Sub_Service` on `Staff_Sub_Service`.`Staff_Sub_Service_Id` = `Stock_Topup`.`Staff_Sub_Service_Id` inner join `Staff_Service` on `Staff_Service`.`Staff_Service_Id` = `Staff_Sub_Service`.`Staff_Service_Id` where Staff_Sub_Service.Retailer_Id=$Retailer_Id and Staff_Sub_Service.Active_Status in (0,1) and Staff_Service.Category = 1 group by `Stock_Topup`.`Staff_Sub_Service_Id`";
    
    $statement  = $db->prepare($query);
    $result = $statement->execute();
    
    if($result)
    {
        $rows = $statement->fetchAll();
        $response["aaData"] = array();
        $i = 1;
        foreach($rows as $row){
            $arr = array();
            $arr["sno"] = $i;
            $arr["id"] = $row["id"];
            $arr["category"] = $row["name"];
            $arr["subcategory"] = $row["subname"];
            $arr["stock"] = $row["count"];
            
            array_push($response['aaData'], $arr);
            $i++;
        }
        if($i-1 < $rowcount)
        {
            $response["rowcount"] = 0;
        }else{
            $response["rowcount"] = 1;
        }
        echo json_encode($response);
    }else{
        echo "error".$query;
        print_r($db->errorInfo());
    }
$db=null;
die();
}


if(isset($_POST['internal']))
{
    $rowcount = $_POST["rows"];
    $query = "select sum(stockcount) as count , category_tb.type as type, products_tb.sub_category_id as id ,products_tb.category_name as name, products_tb.subcategory_name as subname,products_tb.GST as gst,products_tb.price as price FROM `stock` JOIN  `products_tb` on `products_tb`.`sub_category_id` = `stock`.`service_id` JOIN category_tb on category_tb.category_name = products_tb.category_name  group by `stock`.`service_id` order by count DESC LIMIT 0 , $rowcount";

    // $query = "select sum(Stock_Topup_Count) as count, Staff_Sub_Service.Staff_Sub_Service_Id  as id ,`Staff_Sub_Service`.`Sub_Service_Name` as subname,`Staff_Service`.`Service_Name` as name, Staff_Service.type  as type FROM `Stock_Topup` inner join `Staff_Sub_Service` on `Staff_Sub_Service`.`Staff_Sub_Service_Id` = `Stock_Topup`.`Staff_Sub_Service_Id` inner join `Staff_Service` on `Staff_Service`.`Staff_Service_Id` = `Staff_Sub_Service`.`Staff_Service_Id` where Staff_Sub_Service.Retailer_Id=$Retailer_Id and Staff_Sub_Service.Active_Status in (0,1) and Staff_Service.Category = 1 group by `Stock_Topup`.`Staff_Sub_Service_Id`";
    
    $statement  = $db->prepare($query);
    $result = $statement->execute();
    
    if($result)
    {
        $rows = $statement->fetchAll();
        $response["aaData"] = array();
        $i = 1;
        foreach($rows as $row){
            $arr = array();
            $arr["sno"] = $i;
            $arr["id"] = $row["id"];
            $arr["category"] = $row["name"];
            $arr["subcategory"] = $row["subname"];
            $arr["stock"] = $row["count"];
            
            array_push($response['aaData'], $arr);
            $i++;
        }
        if($i-1 < $rowcount)
        {
            $response["rowcount"] = 0;
        }else{
            $response["rowcount"] = 1;
        }
        echo json_encode($response);
    }else{
        echo "error".$query;
        print_r($db->errorInfo());
    }
$db=null;
die();
}

if(isset($_POST['expired']))
{
    $rowcount = $_POST["rows"];
    $query = "select sum(stockcount) as count , category_tb.type as type, products_tb.sub_category_id as id ,products_tb.category_name as name, products_tb.subcategory_name as subname,products_tb.GST as gst,products_tb.price as price FROM `stock` JOIN  `products_tb` on `products_tb`.`sub_category_id` = `stock`.`service_id` JOIN category_tb on category_tb.category_name = products_tb.category_name  group by `stock`.`service_id` order by count DESC LIMIT 0 , $rowcount";

    // $query = "select sum(Stock_Topup_Count) as count, Staff_Sub_Service.Staff_Sub_Service_Id  as id ,`Staff_Sub_Service`.`Sub_Service_Name` as subname,`Staff_Service`.`Service_Name` as name, Staff_Service.type  as type FROM `Stock_Topup` inner join `Staff_Sub_Service` on `Staff_Sub_Service`.`Staff_Sub_Service_Id` = `Stock_Topup`.`Staff_Sub_Service_Id` inner join `Staff_Service` on `Staff_Service`.`Staff_Service_Id` = `Staff_Sub_Service`.`Staff_Service_Id` where Staff_Sub_Service.Retailer_Id=$Retailer_Id and Staff_Sub_Service.Active_Status in (0,1) and Staff_Service.Category = 1 group by `Stock_Topup`.`Staff_Sub_Service_Id`";
    
    $statement  = $db->prepare($query);
    $result = $statement->execute();
    
    if($result)
    {
        $rows = $statement->fetchAll();
        $response["aaData"] = array();
        $i = 1;
        foreach($rows as $row){
            $arr = array();
            $arr["sno"] = $i;
            $arr["id"] = $row["id"];
            $arr["category"] = $row["name"];
            $arr["subcategory"] = $row["subname"];
            $arr["stock"] = $row["count"];
            
            array_push($response['aaData'], $arr);
            $i++;
        }
        if($i-1 < $rowcount)
        {
            $response["rowcount"] = 0;
        }else{
            $response["rowcount"] = 1;
        }
        echo json_encode($response);
    }else{
        echo "error".$query;
        print_r($db->errorInfo());
    }
$db=null;
die();
}

?>