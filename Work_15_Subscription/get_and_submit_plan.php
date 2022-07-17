<?php

include "config.inc.php";
$Retailer_Id = $_SESSION['Retailer_id'];


// fetch all customer plan  report to Retailer
if(isset($_POST["customer_plan"]) && $_POST["customer_plan"] == "active")
{   
    $response["aaData"] = array();

    $query = "SELECT DISTINCT Customer_Id FROM Subscription_Child WHERE Retailer_Id = '$Retailer_Id' AND Active_Ststus = 1";

    $statement  = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();

    $pack_counts = 0;
    $cust_counts = 0;
    
    $i = 1;
    foreach($rows as $row){
        $cust_counts++;
        
        $arr = array();
        $arr["sno"] = $i;

        $sub_query = "SELECT Customer_Master.Customer_Name as cust_name,Customer_Master.Customer_Phone_Number as cust_mobile FROM Customer_Master WHERE Customer_Id = '".$row["Customer_Id"]."'";

        $st  = $db->prepare($sub_query);
        $st->execute();
        $sub_rows = $st->fetch();

        
        $arr["name"] = $sub_row["cust_name"];
        $arr["mobile"] = $sub_row["cust_mobile"];
        

        $sub_sub_query = "SELECT Subcription_Master.Package_Name as pack_name, Subcription_Master.Subcription_Id as sub_id FROM Subscription_Child JOIN Subscription_Child.Retailer_Id  = Subcription_Master.Retailer_Id  WHERE Subscription_Child.Retailer_Id = '$Retailer_Id' AND Subscription_Child.Customer_Id = '".$row["customer_id"]."'";

        $st2  = $db->prepare($sub_sub_query);
        $st2->execute();
        $sub_sub_rows = $st2->fetchAll();


        $count = 0;

        $plannames = "<div class='row'>";
        $buttons = "<div class='row'>";
        foreach($sub_sub_rows as $sub_sub_row)
        {
            $plannames .= "<div class='col-12 my-1'>".$sub_sub_row["pack_name"]."</div>";
            $buttons .= "<div class='col-12 my-1'><button type='button' name='btn-group-".$sub_sub_row["sub_id"]."'    id=".$sub_sub_row["sub_id"]." style='outline:none;line-height: 15px;'  onclick='toggleArrow(event,".$sub_sub_row["sub_id"].")' class='btn btn-sm btn-warning details-control add-".$sub_sub_row["sub_id"]."'>Click</button></div>";
            $count++;
            $pack_counts++;
        }
        $plannames .= "</div>";
        $buttons .= "</div>";

        $arr["planname"] = $plannames;
        $arr["count"] = $count;

        $arr["detail"] = $buttons;

        array_push($response['aaData'], $arr);
        $i++;
    }
    $response["message"] = "0";
    $response["cust_counts"] = $cust_counts;
    $response["pack_counts"] = $pack_counts;
    echo json_encode($response);
    die(); 
    
}


// create  identification number
if(isset($_POST["identification"]) && $_POST["identification"] == "create")
{   
    
    $mobile= $_POST["mobile"];
    $identifinum= $_POST["identifinum"];
    $identifitype= $_POST["identifitype"];

    $query = "SELECT Customer_Id FROM  Customer_Extra_Info WHERE Customer_Info = '$identifinum' AND Retailer_Id='$Retailer_Id'";

    $statement  = $db->prepare($query);
    $result = $statement->execute();

    if(!$result){
        echo json_encode(array("error" => "2")); // Something went wrong
         $db=null;
        die();
    }

    if($statement->rowCount() >= 1)
    {
        echo json_encode(array("error" => "1")); // Identification aready exists
         $db=null;
        die();
    }




    $query =  "SELECT Customer_Id FROM Customer_Master WHERE Customer_Phone_Number = '$mobile'";

    $statement  = $db->prepare($main_query);
    $result = $statement->execute();

    if(!$result){
        echo json_encode(array("error" => "2"));
         $db=null;
        die();
    }

    if($statement->rowCount() <= 0)
    {
        $query = "SELECT Customer_Id FROM  Customer_Extra_Info WHERE Customer_Info = '$mobile' AND Retailer_Id='$Retailer_Id'";

        $statement  = $db->prepare($query);
        $result = $statement->execute();

        if($statement->rowCount() <= 0)
        {
            echo json_encode(array("error" => "3")); // user doesn't exist
             $db=null;
            die();
        }
        
        $row = $statement->fetch();
        $Customer_Id = $row["Customer_Id"];


    }else{
        $row = $statement->fetch();
        $Customer_Id = $row["Customer_Id"];
    }



    $main_query = "INSERT INTO `Customer_Extra_Info`(`Customer_Info`,`Key`, `Customer_Id`, `Retailer_Id`) VALUES ('$identifinum', '$identifitype', '$Customer_Id','$Retailer_Id')";

    $statement  = $db->prepare($main_query);
    $result = $statement->execute();

    if($result)
    {
        echo json_encode(array("error" => "0"));
    }else{
        echo json_encode(array("error" => "2"));
    }

    $db=null;
    die();  
    
}


// create new plan
if(isset($_POST["submit"]) && $_POST["submit"] == "submit")
{   
    $plan_type= $_POST["plan_type"];
    $input_plan = $_POST["input_plan"];
    $input_visits = $_POST["input_visits"];
    $input_servicevalue = $_POST["input_servicevalue"];
    $input_validity = $_POST["input_validity"];
    $input_price = $_POST["input_price"];
    $input_desc = $_POST["input_desc"];
    $input_discount = $_POST["input_discount"];
    $input_package = $_POST["input_package"];

    $query = "INSERT INTO `Subcription_Master` (`Retailer_Id`, `Package_Name`, `Package_Type`, `Visit_Counts`, `Cumulative_Sum`, `Valid_Days`, `Package_Cost`, `Active_Status`, `Package_Desc`, `Per_Discount`, `Package_Items`) VALUES ('$Retailer_Id','$input_plan','$plan_type','$input_visits','$input_servicevalue', $input_validity, '$input_price', '1', '$input_desc', '$input_discount', '$input_package')";

    $statement  = $db->prepare($query);
    $result = $statement->execute();

    if($result)
    {
        echo json_encode(array("error" => "0"));
    }else{
        echo json_encode(array("error" => "1"));
    }

    $db=null;
    die();  
    
}


// attach new plan to customer
if(isset($_POST["plan_attach"]) && $_POST["plan_attach"] == "attach")
{   
    $customer_number = $_POST["customer_id"];
    $query = "SELECT Customer_Id, Customer_Name, Customer_Phone_Number FROM Customer_Master WHERE Customer_Phone_Number = '$customer_number'";
   
    $statement  = $db->prepare($query);
    $result = $statement->execute();
    if($statement->rowCount() <= 0)
    {
        $query = "SELECT Customer_Id,Customer_Info_Id FROM Customer_Extra_Info WHERE Retailer_Id = '$Retailer_Id' AND Customer_Info_Id = '$customer_number'";
        
        $statement  = $db->prepare($query);
        $result = $statement->execute();
        $custrow = $statement->fetch();
        if($statement->rowCount() <= 0)
        {
            echo json_encode(array("error" => "1"));
            $db=null;
            die();
        }
        $Customer_Id = $custrow["Customer_Id"];
        $Customer_Info_Id = $custrow["Customer_Info_Id"];
    }else{
        $row = $statement->fetch();
        $Customer_Id = $row["Customer_Id"];

        $query = "SELECT Customer_Id,Customer_Info_Id FROM Customer_Extra_Info WHERE Retailer_Id = '$Retailer_Id' AND Customer_Id = '$customer_id'";
        
        $statement  = $db->prepare($query);
        $result = $statement->execute();
        $custrow = $statement->fetch();
        if($statement->rowCount() <= 0)
        {
            $Customer_Info_Id = '';
        }else {
            $Customer_Info_Id = $custrow["Customer_Info_Id"];
        }
        
    }
    
    $Timestamp = date('Y-m-d H:i:s');
    $subscription_id = $_POST["subscription_id"];


    $query = "INSERT INTO `Subscription_Child`(`Subcription_Child_Id`, `Customer_Id`, `Retailer_Id`, `Timestamp`, `Subscription_Id`, `Customer_Info_Id`, `Active_Ststus`) VALUES (NULL, $Customer_Id, $Retailer_Id, '$Timestamp', '$subscription_id', '$Customer_Info_Id',1)";

    $statement  = $db->prepare($query);
    $result = $statement->execute();

    if($result)
    {
        echo json_encode(array("error" => "0"));
    }else{
        echo json_encode(array("error" => "2"));
    }

    $db=null;
    die();  
    
}


// fetch active/inactive/closed plan attached to  retailer
if(isset($_POST['fetch']) && $_POST["fetch"] == "plan")
{
    $status = $_POST["status"];
    $query = "SELECT * FROM `Subcription_Master` WHERE  `Retailer_Id`='$Retailer_Id' AND Active_Status = '$status'";

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
        $package_type='';
        if($row['Package_Type'] == '1'){
            $package_type = 'Frequency Plan';
        }else if($row['Package_Type'] == '2'){
            $package_type = 'Pay Less Get More';
        }else if($row['Package_Type'] == '3'){
            $package_type = 'Membership Discount';
        }else if($row['Package_Type'] == '4'){
            $package_type = 'Package Plans';
        }else{
            $package_type = 'Unknown';
        }

        $arr["plantype"] = $package_type;
        $arr["planname"] = $row["Package_Name"];
        $arr["price"] = $row["Package_Cost"];
        $arr["validity"] = $row["Valid_Days"];
        $arr["creationdate"] = $row["Creation_Date"];
        $arr["status"] = ($row["Active_Status"] == '1')?"<div class='text-primary'>Active</div>":(($row["Active_Status"] == '0')?"Inactive":"<div class='text-danger'>Closed</div>");
        $arr["dateofclosure"] = $row["Date_Of_Closure"];
        $arr["detail"] = "<button type='button' name='btn-group-".$row["Subcription_Id"]."'    id=".$row["Subcription_Id"]." style='outline:none;line-height: 15px;'  onclick='toggleArrow(event,".$row["Subcription_Id"].")' class='btn btn-sm btn-warning add-".$row["Subcription_Id"]."'>Click</button>";


        if($row["Active_Status"] == '1'){
            $arr["action"] = "<div class='d-flex justify-content-center align-items-center mx-3'>        
            <img  height='28' src='toggleimage/toggleon.png' class='status".$row["Subcription_Id"]."' onclick='inactivePlan(event,".$row["Subcription_Id"].")' />
            <i  class='fas fa-trash text-danger ms-3 status".$row["Subcription_Id"]."' onclick='inactivePlan(event,".$row["Subcription_Id"].")'></i>
            <button id='btn".$row["Subcription_Id"]."' onclick='executeStatus(event,".$row["Subcription_Id"].",0)' class='btn btn-sm btn-danger ms-2 text-center'  style='display: none;'>confirm</button>
         </div>";
        }else if($row["Active_Status"] == '0'){
            $arr["action"] = "<div class='d-flex justify-content-center align-items-center mx-3'>        
            <img  height='28' src='toggleimage/toggleoff.png' class='status".$row["Subcription_Id"]."' onclick='inactivePlan(event,".$row["Subcription_Id"].")' />
            <i  class='fas fa-trash text-danger ms-3 status".$row["Subcription_Id"]."' onclick='inactivePlan(event,".$row["Subcription_Id"].")'></i>
            <button id='btn".$row["Subcription_Id"]."' onclick='executeStatus(event,".$row["Subcription_Id"].",1)' class='btn btn-sm btn-danger ms-2 text-center'  style='display: none;'>confirm</button>
         </div>";
        }else if($row["Active_Status"] == '-1'){
            $arr["action"] = "";
        }
       
        
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


// change status of retailer plan

if(isset($_POST["setstatus"]) && $_POST["setstatus"] == "change"){

    $sub_id = $_POST["subscription_id"];
    $status = $_POST["status"];

    $query =  "UPDATE Subcription_Master SET Active_Status = '$status' WHERE Subcription_Id = '$sub_id'";
    $st = $db->prepare($query);
    $result = $st->execute();

    if($result)
    {
        echo json_encode(array("error" => 0));
    }else{
        echo json_encode(array("error" => 1, "query"  => $query));
    }

    $db = null;
    die();
}

//execute package price 
if(isset($_POST['execute']) && $_POST["execute"] == "package_price")
{
    $Customer_Id = $_POST["customer_id"];
    $Customer_Info_Id = $_POST["customer_info_id"];
    $Subcription_Id = $_POST["subcription_id"];
    $Subscription_Child = $_POST["subcription_child_id"];
    $Amount = $_POST["amount"];
    $Remark = $_POST["remark"];

    $Visits = $_POST["packvisits"];
    $Service_Amount = $_POST["packserval"];
    $Package_Items = $_POST["packpackageitems"];
    $Payment = "";
    $Date = date('Y-m-d H:i:s');

    $query = "INSERT INTO `Subcription_Payment_Master`(`Subcription_Payment_Master_Id`, `Customer_Id`, `Retailer_Id`, `Amount`, `Payment_Mode`, `Timestamp`, `Remarks`, `Subcription_Id`, `Customer_Info_Id`, `Subcription_Child_Id`, `Service_Amount`,Visits,Package_Items_Used) VALUES (NULL, '$Customer_Id', '$Retailer_Id', '$Amount','$Payment', '$Date', '$Remark', '$Subcription_Id', '$Customer_Info_Id', '$Subscription_Child', '$Service_Amount','$Visits','$Package_Items')";

    $statement  = $db->prepare($query);
    $result = $statement->execute();

    if($result)
    {
        echo json_encode(array("error" => "0"));
    }else{
        echo json_encode(array("error" => "1","query" => $query));
    }

    $db=null;
    die();  
}

//fetch different types of active plans attached  to Retailer
if(isset($_POST['fetch_plan']) && $_POST["fetch_plan"] == "customer")
{
    $type = $_POST["type"];
    $query = "SELECT * FROM `Subcription_Master` WHERE  `Retailer_Id`='$Retailer_Id' AND Package_Type = '$type' AND Active_Status = 1";

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
            $arr["planname"] = $row["Package_Name"];
            $arr["price"] = $row["Package_Cost"];
            $arr["validity"] = $row["Valid_Days"];

            if($type == "1")
            {
                $arr["visits"] = $row["Visit_Counts"];
            }else if($type == "2")
            {
                $arr["servicevalue"] = $row["Cumulative_Sum"];
            }else if($type == "3")
            {
                $arr["discount"] = $row["Per_Discount"];
            }else if($type == "4")
            {
                $arr["package"] = str_replace(","," , ",$row["Package_Items"]); 
            }

            $arr["creationdate"] = $row["Creation_Date"];
            // $arr["status"] = ($row["Active_Status"] == '1')?"<div class='text-success'>Active</div>":(($row["Active_Status"] == '0')?"Inactive":"<div class='text-danger'>Closed</div>");
            $arr["remarks"] = $row["Package_Desc"];
            $arr["action"] = "<button type='submit' class='btn btn-success btn-sm d-flex mx-auto' onclick='attachPlan(event,".$type.",".$row["Subcription_Id"].")'   style='box-shadow: 2px 2px 5px black;'>Attach</button>";
            
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


//fetch attached plan to customer
if(isset($_POST['attached']) && $_POST["attached"] == "plan")
{
    $response["aaData"] = array();
    $customer_number = $_POST["customer_number"];
    $query = "SELECT Customer_Id, Customer_Name, Customer_Phone_Number FROM Customer_Master WHERE Customer_Phone_Number = '$customer_number'";

    $statement  = $db->prepare($query);
    $result = $statement->execute();

    if($statement->rowCount() <= 0)
    {
        $query = "SELECT Customer_Id FROM Customer_Extra_Info WHERE Retailer_Id = '$Retailer_Id' AND Customer_Info = '$customer_number'";

        $statement  = $db->prepare($query);
        $result = $statement->execute();

        if($statement->rowCount() <= 0)
        {
            $response["message"] = "1";
            echo json_encode($response);
            $db=null;
            die();
        }

    }
    $row = $statement->fetch();
    $customer_id = $row["Customer_Id"];

    $query = "SELECT Subscription_Id,Subcription_Child_Id,Customer_Info_Id FROM Subscription_Child WHERE Retailer_Id = '$Retailer_Id' AND Customer_Id = '$customer_id'";

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
            $Subcription_Id = $row["Subscription_Id"];
            $query = "SELECT Subcription_Master.Package_Type as Package_Type, Subcription_Master.Package_Name as Package_Name, Subcription_Master.Package_Cost as Package_Cost, (Subscription_Child.Timestamp + INTERVAL Subcription_Master.Valid_Days DAY > CURRENT_TIMESTAMP) as plan_status, (Subscription_Child.Timestamp + INTERVAL Subcription_Master.Valid_Days DAY) as valid_date ,Subscription_Child.Subcription_Child_Id as sub_id, Subscription_Child.Active_Ststus as activestatus, Subscription_Child.Subcription_Child_Id as sub_child_id, Subcription_Master.Visit_Counts as Visit_Counts, Subcription_Master.Cumulative_Sum as service_value, Subcription_Master.Package_Items as Package_Items FROM Subcription_Master JOIN Subscription_Child ON Subscription_Child.Subscription_Id = Subcription_Master.Subcription_Id WHERE  Subscription_Child.Customer_Id = '$customer_id' AND Subscription_Child.Retailer_Id = '$Retailer_Id' AND Subcription_Master.Retailer_Id = '$Retailer_Id' AND Subscription_Child.Subscription_Id = '$Subcription_Id' AND Subcription_Master.Subcription_Id = '$Subcription_Id'";
            $st  = $db->prepare($query);
            $st->execute();

            $sub_row = $st->fetch();
            if($sub_row['Package_Type'] == '1'){
                $package_type = 'Frequency Plan';
            }else if($sub_row['Package_Type'] == '2'){
                $package_type = 'Pay Less Get More';
            }else if($sub_row['Package_Type'] == '3'){
                $package_type = 'Membership Discount';
            }else if($sub_row['Package_Type'] == '4'){
                $package_type = 'Package Plans';
            }else{
                $package_type = 'Unknown';
            }
    
            $arr["plantype"] = $package_type;
            $arr["planname"] = $sub_row["Package_Name"];

            if($sub_row["plan_status"] == "0")
            {
                if($sub_row["activestatus"] == "1")
                {   
                    $sub_child_id = $sub_row["sub_child_id"];
                    $sub_sub_query = "UPDATE Subscription_Child SET Active_Ststus = 0 WHERE Retailer_Id = '$Retailer_Id' AND Subcription_Child_Id = '$sub_child_id'"; 
                    $sub_st  = $db->prepare($query);
                    $sub_result = $sub_st->execute();

                    if(!$sub_result)
                    {
                        $response["change_status"] = "yes";
                    }else{
                        $response["change_status"] = "no";
                    }


                }
                    $finalstatus = '0';

                
            }else 
            {
                if($sub_row["activestatus"] == "0")
                {
                    $finalstatus = '0';
                }else{
                    $finalstatus = '1';
                }                
            }
            $arr["status"] = ($finalstatus == '1')?"<div class='text-success'>Valid</div>":"<div class='text-danger'>Expired</div>";
            $arr["valid_date"] =$sub_row["valid_date"];

            $arr["detail"] = "<button type='button' name='btn-group-".$Subcription_Id."' id=".$Subcription_Id." style='outline:none;line-height: 15px;'  onclick='toggleArrow(event,".$Subcription_Id.")' class='btn btn-sm btn-warning add-".$Subcription_Id."'>Click</button>";


            $arr["history"] = "<button type='button' name='btn-group-".$Subcription_Id."' data-type='".$sub_row["Package_Type"]."' data-id='".$customer_id."' id='".$sub_row["sub_id"]."' style='outline:none;line-height: 15px;'  onclick='toggleArrow(event,".$Subcription_Id.")' class='btn btn-sm btn-warning add-".$Subcription_Id."'>Click</button>";


            $arr["action"] = "<button type='submit' name='btn-group-".$Subcription_Id."'  data-visits='".$sub_row['Visit_Counts']."' data-serval='".$sub_row['service_value']."' data-packageitems='".$sub_row['Package_Items']."' data-price='".$sub_row['Package_Cost']."' data-type='".$sub_row['Package_Type']."' data-subid='".$Subcription_Id."' data-subchildid='".$row["Subcription_Child_Id"]."'  data-custid='".$customer_id."' data-custinfoid='".$row["Customer_Info_Id"]."'  class='btn btn-success   btn-sm d-flex mx-auto' style='outline:none;line-height: 15px;' onclick='toggleArrow(event,".$Subcription_Id.")'>Execute</button>";

            array_push($response['aaData'], $arr);
            $i++;
        }
        $response["message"] = "0";
        echo json_encode($response);
    }else{
            $response["message"] = "-1";
            echo json_encode($response);
    }

    $db=null;
    die();
}



// fetch retailer plan in details
if(isset($_GET["id"]) && isset($_GET["detail"]) && $_GET["detail"] == "detail" )
{
    ?>
                <div class="row d-flex flex-column flex-sm-row justify-content-center py-4" >
                                <div class="col-11  h-100">
                                    <?php
                                        $id = $_GET["id"];

                                                $query = "SELECT * FROM `Subcription_Master` WHERE `Retailer_Id`= '$Retailer_Id' AND Subcription_Id = '$id'";
                                                $statement  = $db->prepare($query);
                                                $result = $statement->execute();

                                                if($statement->rowCount() > 0)
                                                {
                                                    $row = $statement->fetch();
                                                    $package_type_number = $row['Package_Type'];
                                    ?>
                                                                                    <div class="table-responsive">
                                                                                            <table  class="table table-striped">
                                                                                                <thead>
                                                                                                <tr>
                                                                                                                                    <th style="text-align:center;" class="name">Name of Plan</th>
                                                                                                                                    <th style="text-align:center;" class="price">Price (Rs)</th>
                                                                                                                                    <th style="text-align:center;" class="validity">Validity (days)</th>
                                                                                                                                    <?php
                                                                                                                                        if($package_type_number == '1'){
                                                                                                                                            echo "<th style='text-align:center;' class='discount'>Visits Allowed</th>";
                                                                                                                                        }else if($package_type_number == '2'){
                                                                                                                                        echo "<th style='text-align:center;' class='service'>Service Value (Rs)</th>";
                                                                                                                                        }else if($package_type_number == '3'){
                                                                                                                                        echo "<th style='text-align:center;' class='discount'>(%) discount on bill</th>";
                                                                                                                                        }else if($package_type_number == '4'){
                                                                                                                                        echo "<th style='text-align:center;white-space:nowrap;'>Package (Item 1 + Item 2 + ....)</th>";
                                                                                                                                        }else{
                                                                                                                                            echo "<th style='text-align:center;white-space:nowrap;'>unknown</th>";
                                                                                                                                        }

                                                                                                                                    ?>
                                                                                                                                    
                                                                                                                                    <th style="text-align:center;" class="disc">Description</th>

                                                                                                </tr>
                                                                                                </thead>
                                                                                                <tbody >
                                                                                                    <td><?php  echo $row["Package_Name"]; ?></td>
                                                                                                    <td><?php  echo $row["Package_Cost"]; ?></td>
                                                                                                    <td><?php  echo $row["Valid_Days"]; ?></td>
                                                                                                    <td>
                                                                                                        <?php  
                                                                                                            if($package_type_number == '1'){
                                                                                                                echo $row["Visit_Counts"];
                                                                                                            }else if($package_type_number == '2'){
                                                                                                            echo $row["Cumulative_Sum"];
                                                                                                            }else if($package_type_number == '3'){
                                                                                                            echo $row["Per_Discount"];
                                                                                                            }else if($package_type_number == '4'){
                                                                                                            echo str_replace(","," , ",$row["Package_Items"]);
                                                                                                            }else{
                                                                                                                echo "<th style='text-align:center;white-space:nowrap;'>unknown</th>";
                                                                                                            }

                                                                                                        ?>
                                                                                                    </td>
                                                                                                    <td><?php  echo $row["Package_Desc"]; ?></td>

                                                                                                </tbody>
                                                                                            </table>
                                                                                            
                                                                                        </div>
                                                                                        <?php
                                                }else{
                                                    echo "No Data";
                                                }
                                                                                        ?>
                                </div>
                </div>
                </div>
                </div>


                    </div>
    <?php
}




// fetch customer plan in details
if(isset($_GET["customer_plan_detail"]) && isset($_GET["customer_id"]) && $_GET["customer_plan_detail"] == "customer_plan_detail" )
{
    ?>
<div class="row d-flex flex-column flex-sm-row justify-content-center py-4" >
     <div class="col-5 h-100" >
                <div class="table-responsive  m-0">
                        <table  class="table  table-striped table-sm ">
                            <thead>
                                    <tr>
                                        <th colspan="6">
                                                    <div class="row m-0 text-dark">
                                                        <div class="col  nowrap ">
                                                            Price History
                                                        </div>
                                                    </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center;">S.No.</th>
                                        <th style="text-align:center;">Date</th>
                                        <th style="text-align:center;">Price</th>
                                        <th style="text-align:center;">Paid</th>
                                        <th style="text-align:center;">Due Balance</th>
                                        <th style="text-align:center;">Remarks</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php
                                // test query
                                // SELECT date(Subcription_Payment_Master.Timestamp) as tx_date,Subcription_Master.Package_Cost as price, Subcription_Payment_Master.Amount as paid
                                //     FROM  `Subcription_Payment_Master` JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                                //     WHERE  Subcription_Payment_Master.Customer_Id = -550 AND Subcription_Master.Retailer_Id = 223 AND Subcription_Payment_Master.Subcription_Child_Id =336 AND Subcription_Payment_Master.Amount != 0
                                //     ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id asc



                                    $customer_id = $_GET["customer_id"];
                                    $Subcription_Child_Id = $_GET["Subcription_Child_Id"];

                                    $query = "SELECT date(Subcription_Payment_Master.Timestamp) as tx_date,Subcription_Master.Package_Cost as price, Subcription_Payment_Master.Amount as paid, Subcription_Payment_Master.Remarks as Remarks                                    FROM  Subcription_Payment_Master JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                                    WHERE  Subcription_Payment_Master.Customer_Id = '$customer_id' AND Subcription_Master.Retailer_Id = '$Retailer_Id' AND Subcription_Payment_Master.Subcription_Child_Id ='$Subcription_Child_Id' AND Subcription_Payment_Master.Amount != 0
                                    ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id ASC";

                                    $statement  = $db->prepare($query);
                                    $statement->execute();
                                    $rows = $statement->fetchAll();
                                    $i=1;
                                    $sum=0;
                                    foreach($rows as $row){

                                ?>
                                    <tr>
                                        <td style="text-align:center;"><?php echo $i++; ?></td>
                                        <td style="text-align:center;white-space:nowrap;"><?php echo $row["tx_date"]; ?></td>
                                        <td style="text-align:center;"><?php echo $row["price"]; ?></td>
                                        <td style="text-align:center;"><?php echo $row["paid"]; ?></td>
                                        <td style="text-align:center;">
                                            <?php 
                                                $sum += $row["paid"];
                                                $due = $row["price"]-$sum;
                                                echo $due;
                                            ?>
                                        </td>
                                        <td style="text-align:center;"><?php echo $row["Remarks"]; ?></td>                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                </div>
     </div>
     <?php  
     if($_GET["type"] != '3'){
     ?>
     <div class="col-5  h-100">
            <div class="table-responsive  m-0">
            
                <table class="table  table-striped table-sm ">
                    <thead>
                    <tr>
                            <th colspan="6">
                                        <div class="row m-0 text-dark">
                                            <div class="col  nowrap ">
                                                Package History
                                            </div>
                                        </div>
                            </th>
                    </tr>
                    <tr>
                            <th style="text-align:center;">S.No.</th>
                            <th style="text-align:center;">Date</th>
                           
                            <?php  
                                if($_GET["type"] == '4'){
                                    echo " <th style='text-align:center;'>Used Package Item</th>";
                                }else{

                                    if($_GET["type"] == '1'){
                                        echo " <th style='text-align:center;'>Visit Quota</th>";
                                    }else if($_GET["type"] == '2'){
                                        echo " <th style='text-align:center;'>Service Value</th>";
                                    }
    
                                    echo "<th style='text-align:center;'>Used</th>
                                          <th style='text-align:center;'>Due Balance</th>";
                                }
                            ?>
                            <th style="text-align:center;">Remarks</th>
                            
                    </tr>
                    </thead>
                    <?php
                        if($_GET["type"] == "1"){
                    ?>
<tbody>
                        <?php
                        $query = "SELECT date(Subcription_Payment_Master.Timestamp) as tx_date,Subcription_Master.Visit_Counts as visits,Subcription_Payment_Master.Visits as visit, Subcription_Payment_Master.Remarks as Remarks                        FROM  Subcription_Payment_Master JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                        WHERE  Subcription_Payment_Master.Customer_Id = '$customer_id' AND Subcription_Master.Retailer_Id = '$Retailer_Id' AND Subcription_Payment_Master.Subcription_Child_Id ='$Subcription_Child_Id' AND Subcription_Payment_Master.Visits != 0
                        ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id ASC";


                        //   $query = "SELECT date(`Subcription_Payment_Master.Timestamp`) as tx_date, Subcription_Master.Visit_Counts as visits, Subcription_Payment_Master.Visits as visit
                        //   FROM  `Subcription_Payment_Master` JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                        //   WHERE  Subcription_Payment_Master.Customer_Id = '$customer_id' AND Subcription_Master.Retailer_Id = '$Retailer_Id' AND Subcription_Payment_Master.Subcription_Child_Id ='$Subcription_Child_Id'
                        // ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id ASC";

                          $statement  = $db->prepare($query);
                          $statement->execute();
                          $rows = $statement->fetchAll();
                          $i=1;
                          foreach($rows as $row){

                      ?>
                          <tr>
                              <td style="text-align:center;"><?php echo $i++; ?></td>
                              <td style="text-align:center;white-space:nowrap !important;"><?php echo $row["tx_date"]; ?></td>
                              <td style="text-align:center;">
                                <?php 
                                      if($i == 2)
                                      {
                                        $price =  $row["visits"];
                                      }else{
                                        $price = $due;
                                      }
                                          
                                      echo $price;
                                ?>
                              </td>
                              <td style="text-align:center;"><?php echo $row["visit"]; ?></td>
                              <td style="text-align:center;">
                                  <?php 
                                      $due = $price - $row["visit"];
                                      echo $due;
                                  ?>
                              </td>
                              <td style="text-align:center;"><?php echo $row["Remarks"]; ?></td>
                          </tr>
                        <?php
                          }  
                        ?>
                    </tbody>

                    <?php
                        }else if($_GET["type"] == "2"){
                    ?>

                    <tbody>
                        <?php
                        $query = "SELECT date(Subcription_Payment_Master.Timestamp) as tx_date, Subcription_Master.Cumulative_Sum as servicevalue, Subcription_Payment_Master.Service_Amount as paid, Subcription_Payment_Master.Remarks as Remarks                        FROM  Subcription_Payment_Master JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                        WHERE  Subcription_Payment_Master.Customer_Id = '$customer_id' AND Subcription_Master.Retailer_Id = '$Retailer_Id' AND Subcription_Payment_Master.Subcription_Child_Id ='$Subcription_Child_Id' AND Subcription_Payment_Master.Service_Amount != 0
                        ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id ASC";

                        //   $query = "SELECT date(`Subcription_Payment_Master.Timestamp`) as tx_date, Subcription_Master.Cumulative_Sum as servicevalue, Subcription_Payment_Master.Service_Amount as paid
                        //   FROM  `Subcription_Payment_Master` JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                        //   WHERE  `Customer_Id` = '$customer_id' AND `Retailer_Id` = '$Retailer_Id' AND `Subcription_Child_Id` ='$Subcription_Child_Id'
                        //   ORDER BY  `Subcription_Payment_Master_Id` ASC";

                          $statement  = $db->prepare($query);
                          $statement->execute();
                          $rows = $statement->fetchAll();
                          $i=1;
                          foreach($rows as $row){

                      ?>
                          <tr>
                              <td style="text-align:center;"><?php echo $i++; ?></td>
                              <td style="text-align:center;white-space:nowrap !important;"><?php echo $row["tx_date"]; ?></td>
                              <td style="text-align:center;">
                                <?php 
                                      if($i == 2)
                                      {
                                        $price =  $row["servicevalue"];
                                      }else{
                                        $price = $due;
                                      }
                                          
                                      echo $price;
                                ?>
                              </td>
                              <td style="text-align:center;"><?php echo $row["paid"]; ?></td>
                              <td style="text-align:center;">
                                  <?php 
                                      $due = $price - $row["paid"];
                                      echo $due;
                                  ?>
                              </td>
                              <td style="text-align:center;"><?php echo $row["Remarks"]; ?></td>   
                           </tr>
                        <?php
                          }  
                        ?>
                    </tbody>
                    <?php
                        }else if($_GET["type"] == "4"){
                    ?>

                    <tbody>
                         <?php
                        $query = "SELECT date(Subcription_Payment_Master.Timestamp) as tx_date, Subcription_Master.Package_Items as Package_Items, Subcription_Payment_Master.Package_Items_Used as Package_Items_Used, Subcription_Payment_Master.Remarks as Remarks
                        FROM  Subcription_Payment_Master JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                        WHERE  Subcription_Payment_Master.Customer_Id = '$customer_id' AND Subcription_Master.Retailer_Id = '$Retailer_Id' AND Subcription_Payment_Master.Subcription_Child_Id ='$Subcription_Child_Id' AND Subcription_Payment_Master.Package_Items_Used != ''
                        ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id ASC";

                          $statement  = $db->prepare($query);
                          $statement->execute();
                          $rows = $statement->fetchAll();
                          $i=1;
                          foreach($rows as $row){
                      ?>
                          <tr>
                              <td style="text-align:center;"><?php echo $i++; ?></td>
                              <td style="text-align:center;white-space:nowrap !important;"><?php echo $row["tx_date"]; ?></td>
                              <td style="text-align:center;">
                                    <?php echo str_replace(","," , ",$row["Package_Items_Used"]);  ?>   
                              </td>
                              <td style="text-align:center;"><?php echo $row["Remarks"]; ?></td>
                          </tr>
                          <?php
                        }                    
                    ?>
                    </tbody>
                    <?php
                    }
                    ?>
                    
                </table>
            </div>
    </div>
    <?php  
     }
     ?>
</div>
    <?php
}


// execute customer plan 
if(isset($_GET["customer_plan_execution"]) && $_GET["customer_plan_execution"] == "yes")
{
    ?>

<div class="row d-flex flex-column flex-sm-row justify-content-center py-4" >
<div class="col-5  h-100">
            <div class="table-responsive  m-0">
            
                <table class="table  table-striped table-sm ">
                    <thead>
                    <tr>
                            <th colspan="5">
                                        <div class="row m-0 text-dark">
                                            <div class="col  nowrap ">
                                                Price
                                            </div>
                                        </div>
                            </th>
                    </tr>
                    <tr>
                        <th style='text-align:center;'>Price</th>
                        <th style='text-align:center;'>Paid</th>
                        <th style='text-align:center;'>Balance due</th>
                        <th style='text-align:center;'>Paid Now</th>
                            
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $type = $_GET["type"];
                            $price= $_GET["price"];
                            $customer_id = $_GET["customer_id"];
                            $customer_info_id = $_GET["customer_info_id"];
                            $Subscription_Id = $_GET["subscription_id"];
                            $Subscription_Child_Id = $_GET["subscription_child_id"];
                            $visits= $_GET["visits"];
                            $serval= $_GET["serval"];
                            $packageitems= $_GET["packageitems"];
                            

                            $query = "SELECT COALESCE(SUM(Amount),0) as paid 
                            FROM  Subcription_Payment_Master 
                            WHERE Retailer_Id = '$Retailer_Id' AND Subcription_Child_Id ='$Subscription_Child_Id'";

                            $statement  = $db->prepare($query);
                            $statement->execute();
                            $row = $statement->fetch();
                            if(($price-$row["paid"]) <= 0){
                                $enadis_status = "disabled";
                            }else{
                                $enadis_status = "";
                            }
                    ?>
                          <tr>
                              <td style="text-align:center;"><?php echo $price; ?></td>
                              <td style="text-align:center;"><?php echo ($row["paid"]); ?></td>
                              <td style="text-align:center;"><?php echo ($price-$row["paid"]); ?></td>
                              <td style="text-align:center;"><input <?php echo $enadis_status; ?> type="text" class="form-control" data-paid="<?php echo $Subscription_Child_Id; ?>"></td>
                          </tr>
                    </tbody>

                </table>
            </div>
    </div>
     <?php
     if($type != '3')
     {
     ?>
        <div class="col-5  h-100">
            <div class="table-responsive  m-0">
            
                <table class="table  table-striped table-sm ">
                    <thead>
                    <tr>
                            <th colspan="5">
                                        <div class="row m-0 text-dark">
                                            <div class="col  nowrap ">
                                                Package
                                            </div>
                                        </div>
                            </th>
                    </tr>
                    <tr>
                        <?php
                        



                                            if($type == '4'){
                                                echo " <th style='text-align:center;'>Package Items</th>
                                                        <th style='text-align:center;'>Status</th>";
                                            }else{

                                                if($type == '1'){
                                                    echo " <th style='text-align:center;'>Visit Quota</th>
                                                            <th style='text-align:center;'>Visited</th>
                                                            <th style='text-align:center;'>Visit Due</th>
                                                            <th style='text-align:center;'>Visit Done</th>";
                                                }else if($type == '2'){
                                                    echo " <th style='text-align:center;'>Service Value</th>
                                                            <th style='text-align:center;'>Service Value Used</th>
                                                            <th style='text-align:center;'>Balance Ser. Val.</th>
                                                             <th style='text-align:center;'>Use Now</th>";
                                                }
                                            }
                        ?>
                    </tr>
                    </thead>
                    <?php
                if($type == '4')
                {
                ?>
                    <tbody>
                        <?php
                                 $query = "SELECT Package_Items_Used as package
                                 FROM  Subcription_Payment_Master 
                                 WHERE Retailer_Id = '$Retailer_Id' AND Subcription_Child_Id ='$Subscription_Child_Id'";

                                $statement  = $db->prepare($query);
                                $statement->execute();
                                $rows = $statement->fetchAll();
                                
                               


                                $arr = array();
                                $packitems = array();
                                $items =  array();
                                $items = explode(",",$packageitems);

                                $i = 0;
                                foreach ($rows as $row) {
                                    $arr = explode(",",$row["package"]);
                                    foreach ($arr as $pack) {
                                            $packitems[$i++] = $pack;
                                    }                                     
                                }

                                $items = array_map('strtolower', $items);
                                $packitems = array_map('strtolower', $packitems);
                                $i = 0;
                                $flag = 1;
                                $enadis_status = '';
                                foreach($items as $item){
                        ?>
                          <tr>
                              <td >
                                <div class="d-flex justify-content-between align-items-center">
                              <?php  
                                echo $item;
                                $status = in_array($item, $packitems);
                                if($status != 1) {
                                    echo "<input type='checkbox' value='$item' name='packageitems$Subscription_Child_Id'>";
                                }
                              ?>                                    
                              </div>
                              </td>
                              <td style="text-align:center;">
                              <?php  
                                if($status == 1) {
                                    echo "<div class='text-danger text-center'>Used</div>";
                                }else{
                                    $flag = 0;
                                    echo "<div class='text-success text-center'>Available</div>";
                                }
                              ?> 
                             </td>
                          </tr>
                          <?php
                                }

                                if($flag == 1){
                                    $enadis_status = "disabled";
                                    $sub_query = "UPDATE  Subscription_Child SET Active_Ststus = 0 WHERE Retailer_Id = '$Retailer_Id' AND Subcription_Child_Id = '$Subscription_Child_Id'"; 
                                    $sub_st  = $db->prepare($sub_query);
                                    $sub_st->execute();
                                }

                          ?>
                    </tbody>
                    <?php
                }else if($type == '1')
                {
                    // Package_Items_Used
                    $query = "SELECT COALESCE(SUM(Visits),0) as Visits 
                    FROM  Subcription_Payment_Master 
                    WHERE Retailer_Id = '$Retailer_Id' AND Subcription_Child_Id ='$Subscription_Child_Id'";

                    $statement  = $db->prepare($query);
                    $statement->execute();
                    $row = $statement->fetch();

                    if(($visits-$row["Visits"]) <= 0){
                        $enadis_status = "disabled";
                        $sub_query = "UPDATE  Subscription_Child SET Active_Ststus = 0 WHERE Retailer_Id = '$Retailer_Id' AND Subcription_Child_Id = '$Subscription_Child_Id'"; 
                        $sub_st  = $db->prepare($sub_query);
                        $sub_st->execute();
                    }else{
                        $enadis_status = "";
                    }
                ?>
                    <tbody>
                          <tr>
                             <td style="text-align:center;"><?php echo $visits; ?></td>
                              <td style="text-align:center;"><?php echo ($row["Visits"]); ?></td>
                              <td style="text-align:center;"><?php echo ($visits-$row["Visits"]); ?></td>
                              <td style="text-align:center;"><input <?php echo $enadis_status; ?> type="checkbox" data-packagevisits="<?php echo $Subscription_Child_Id; ?>"></td>
                          </tr>
                    </tbody>
                    <?php
                    }else if($type == '2')
                    {
                        $query = "SELECT COALESCE(SUM(Service_Amount),0) as seramount 
                         FROM  Subcription_Payment_Master 
                        WHERE Retailer_Id = '$Retailer_Id' AND Subcription_Child_Id ='$Subscription_Child_Id'";

                        $statement  = $db->prepare($query);
                        $statement->execute();
                        $row = $statement->fetch();

                        if(($serval-$row["seramount"]) <= 0){
                            $enadis_status = "disabled";
                            $sub_query = "UPDATE  Subscription_Child SET Active_Ststus = 0 WHERE Retailer_Id = '$Retailer_Id' AND Subcription_Child_Id = '$Subscription_Child_Id'"; 
                            $sub_st  = $db->prepare($sub_query);
                            $sub_st->execute();
                        }else{
                            $enadis_status = "";
                        }
                    ?>
                        <tbody>
                          <tr>
                             <td style="text-align:center;"><?php echo $serval; ?></td>
                              <td style="text-align:center;"><?php echo ($row["seramount"]); ?></td>
                              <td style="text-align:center;"><?php echo ($serval-$row["seramount"]); ?></td>
                              <td style="text-align:center;"><input <?php echo $enadis_status; ?> type="text" class="form-control" data-packagepaid="<?php echo $Subscription_Child_Id; ?>"></td>
                          </tr>
                    </tbody>
                    <?php
                    }
                    ?>

                </table>
            </div>
    </div>
    <?php
        }
    ?>

<div class="col-12">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-auto">
            
                            <textarea type="text" <?php echo $enadis_status; ?> style="min-width:200px;" placeholder="Any Remarks" class="form-control" data-remark="<?php echo $Subscription_Child_Id; ?>"></textarea>

                        </div>
                        <div class="col-auto ms-sm-3">
                                <button type='submit' <?php echo $enadis_status; ?>  onclick="executePlan(event,<?php echo $type; ?>,<?php echo $Subscription_Id; ?>,<?php echo $Subscription_Child_Id; ?>,<?php echo $customer_id; ?>,<?php echo $customer_info_id; ?>,<?php echo $price; ?>,<?php echo $visits; ?>,<?php echo $serval; ?>,'<?php echo $packageitems; ?>')" class='btn btn-primary   btn-sm d-flex mx-auto' style='box-shadow: 2px 2px 5px black;'>Submit</button>
                        </div>
                    </div>
</div>



    <?php
}


?>