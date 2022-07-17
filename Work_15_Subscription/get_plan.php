<?php
include "config.inc.php";
$Retailer_Id = $_SESSION['Retailer_id'];

// $response["aaData"] = array();
//     $i = 1;
//     while($i < 16){
//         $arr = array();
//         $arr["sno"] = $i;
//         $arr["plantype"] = "sds";
//         $arr["planname"] = "drd";
//         $arr["price"] = "dfdf";
//                 $arr["validity"] = "drfdf";
//                 $arr["creationdate"] = "dfddf";
//                 $arr["status"] = "df";
//                 $arr["dateofclosure"] = "dffd";
//                 $arr["detail"] = " <a class='toggle-btn d-flex justify-content-center align-items-center' id='343' style='background-color: transparent !important; color : blue !important;' href='#!'>
//                                     <span >Click</span> &nbsp &nbsp
//                                     <i class='fas float-end fa-caret-up'  style='display:none;'></i>
//                                     <i class='fas float-end fa-caret-down' ></i>
//                                     </a>";
//                 $arr["action"] = "<div class='d-flex justify-content-center align-items-center'>
//                 <img  height='28' src='toggleimage/toggleon.png' />
//                 <i class='fas fa-trash text-danger ms-3'></i>
//              </div>";
        
//         array_push($response['aaData'], $arr);
//         $i++;
//     }
//     echo json_encode($response);
//     die();


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
        $arr["status"] = ($row["Active_Status"] == '1')?"Active":(($row["Active_Status"] == '0')?"Inactive":"Closed");
        $arr["dateofclosure"] = $row["Date_Of_Closure"];
        $arr["detail"] = " <a class='toggle-btn d-flex justify-content-center align-items-center' id='343' style='background-color: transparent !important; color : blue !important;' href='#!'>
                            <span >Click</span> &nbsp &nbsp
                            <i class='fas float-end fa-caret-up'  style='display:none;'></i>
                            <i class='fas float-end fa-caret-down' ></i>
                            </a>";
        $arr["action"] = "<div class='d-flex justify-content-center align-items-center'>
                            <img  height='28' src='toggleimage/toggleon.png' />
                            <i class='fas fa-trash text-danger ms-3'></i>
                         </div>";
        
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






?>