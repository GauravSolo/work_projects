<?php
include "config.php";

$query = "select sum(stockcount) as count , category_tb.type as type, products_tb.sub_category_id as id ,products_tb.category_name as name, products_tb.subcategory_name as subname,products_tb.GST as gst,products_tb.price as price FROM `stock` JOIN  `products_tb` on `products_tb`.`sub_category_id` = `stock`.`service_id` JOIN category_tb on category_tb.category_name = products_tb.category_name  group by `stock`.`service_id`";

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
        $arr["type"] = $row["type"];
        $arr["category"] = $row["name"];
        $arr["subcategory"] = $row["subname"];
        $arr["gst"] = $row["gst"];
        $arr["price"] = $row["price"];
        $arr["stock"] = $row["count"];
        $arr["action"] =  "<div style='display:flex;'><button type='button' style='outline:none;'  onclick='showaddStock(event,".$row["id"].",\"add\")' class='btn btn-sm btn-success add-".$row["id"]."'>Add</button><button type='button' onclick='showdeductStock(event,".$row["id"].",\"deduct\")'   style='margin-left: 10px;outline:none;' class='btn btn-sm btn-danger deduct-".$row["id"]."'>Deduct</button></div>";
        $arr["stockinput"] = "<input type='text' style='width: 50px !important;margin: 0 !important; height: 30px !important;' class='form-textbox-small d-none' data-stockid='".$row["id"]."' /> ";
        $arr["remarks"] = "<textarea  style='width: 100px !important;margin: 0 !important;height: 50px !important;' class=' d-none  ' data-stockid='".$row["id"]."' ></textarea> ";
        $arr["select"] = "<select style='width: auto;vertical-align: middle;height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;' class='d-none' data-stockid='".$row["id"]."'  placeholder='select'> <option  selected value='Select'>Select</option><option value='Internal Use'>Internal Use</option><option value='Damage'>Damage</option></select> ";
        
        array_push($response['aaData'], $arr);
        $i++;
    }
    echo json_encode($response);
}else{
    echo "error".$query;
    print_r($db->errorInfo());
}

$db=null;
?>