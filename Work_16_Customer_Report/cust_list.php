<?php
session_start();
include ("header.php");
include('config.inc.php');
include ('webservice/get_customer_count_for_retailer.php');
include ('webservice/get_sale.php');
$a = 10;
$prevmonth1 = date('m Y', strtotime('-' . $a . ' months'));


$Retailer_Id = $_SESSION['Retailer_id'];

$prevmonth2 = date('m Y', strtotime('-2 months'));
$prevmonth3 = date('m Y', strtotime('-3 months'));
$prevmonth4 = date('m Y', strtotime('-4 months'));
$prevmonth5 = date('m Y', strtotime('-5 months'));
$prevmonth6 = date('m Y', strtotime('-6 months'));
$prevmonth7 = date('m Y', strtotime('-7 months'));
$prevmonth8 = date('m Y', strtotime('-8 months'));
$prevmonth9 = date('m Y', strtotime('-9 months'));
$prevmonth10 = date('m Y', strtotime('-10 months'));
$prevmonth11 = date('m Y', strtotime('-11 months'));
$prevmonth12 = date('m Y', strtotime('-12 months'));



//$query = "select `Customer_Master`.`Customer_Name`, `Customer_Master`.`Customer_Phone_Number`, 'Internal' as `Customer_Type` FROM `Customer_Master` inner join `Customer_Transaction_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id` inner join `Retailers_Master` on `Customer_Transaction_Master`.`Retailer_Id` = `Retailers_Master`.`Retailer_Id` where `Customer_Transaction_Master`.`Retailer_Id` = $Retailer_Id group by `Customer_Master`.`Customer_Phone_Number`
//UNION
//select `Customer_Master`.`Customer_Name`, `Customer_Master`.`Customer_Phone_Number`, 'External' as `Customer_Type` FROM `Customer_Master` inner join `customer_retailer_relationship_table` on `Customer_Master`.`Customer_Id` = `customer_retailer_relationship_table`.`Customer_Id` inner join `Retailers_Master` on `customer_retailer_relationship_table`.`Retailer_Id` = `Retailers_Master`.`Retailer_Id` where `customer_retailer_relationship_table`.`Retailer_Id` = $Retailer_Id group by `Customer_Master`.`Customer_Phone_Number`";
//
//
//
//$query_params = array(
//);
//
////execute query
//try {
//    $stmt = $db->prepare($query);
//    $result = $stmt->execute($query_params);
//} catch (PDOException $ex) {
//    $response["success"] = 0;
//    $response["message"] = "Database Error!";
//    $response["details"] = $ex;
//
//    die(json_encode($response));
//}
//$rows = $stmt->fetchAll();
////echo json_encode($rows);die;
//
//$data_retailer_cust = '';
//$data_retailer_cust .= '<table border="1" style="width: 100%;"><th style="background-color: rgb(238, 129, 33);">Sr.No.</th><th style="background-color: rgb(238, 129, 33);">Customer Name</th><th style="background-color: rgb(238, 129, 33);">Mobile Number</th><th style="background-color: rgb(238, 129, 33);">Customer Type</th><tr>';
//
//if (empty($rows)) {
//    $data_retailer_cust .= '<tr><td>No Records for Customers</td><td></td><td></td><td></td></tr>';
//	 $data_retailer_cust .='</table>';
//} else {
//    $i = 1;
//    $cust_type = 'Internal';
//    foreach ($rows as $row) {
//        $data_retailer_cust .= '<td>' . $i++ . '</td><td>' . $row['Customer_Name'] . '</td><td>' . $row['Customer_Phone_Number'] . '</td><td>' . $row['Customer_Type'] . '</td></tr>';
//    }
//    $data_retailer_cust .='</table>';
//}
//
?>

<style>
    .main-div{
        border: 2px solid #EFA96F;
        border-radius: 3px;
        padding-left: 0px;
        padding-right: 0px;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }
    .title-div{
        border-bottom: 2px solid #FEE4CC;
    }
    .title-img{
        float: left;
        margin-right: 10px;
        margin-left: 30px;
        width: 30px;
    }
    .content-div{
        text-align:center;
        padding-left: 10px;
        padding-right: 10px;
        text-align: left;
        padding-left: 16px; 
        padding-top: 10px;
    }
    hr{
        border-color: #EFA96F;
        margin-bottom: 20px;
        width: 97%;
    }
    .tab-heading-div{
        border: 2px solid rgb(249, 193, 151);
        border-radius: 3px;
        padding-left: 10px;
        padding-right: 0px;
        margin-bottom: 20px;
    }
    .tab-div{
        padding-left: 0px;
        padding-right: 0px;
        margin-bottom: 20px;
    }
    .div-left-margin{
        border-right: 2px solid #EFA96F;
    }
    .dataTables_length{
        float: left!important;
    }
    .sorting{
        background-color: #f09022!important;
    }
    .sorting_asc{
        background-color: #f09022!important;
    }
    .dropbtn {
        background-color: #582f7a;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 180px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #582f7a;}
</style>
<link rel="stylesheet" href="js/datatables/datatables.css" type="text/css"/>

<?php
 include "navbar.php";
?>

<section class="home-section">


<div class="w-form">
    <h2 class="main-heading" style="margin-bottom: 15px;">Customers Data</h2>
    <form action="" method="post" id="frm-login">


        <!--		<div class="col-md-2 col-sm-6">
                                                        <a href="cust_list_download.php?" class="btn btn-s-md btn-primary">Download Excel</a>
                                                    </div>-->
        <!--	    <div class="w-col w-col-12 logo-div tab-div">
                    <div>
                                        
                    </div>
                         </div>	-->

        <div class="table-responsive" style="overflow: auto;overflow-y: hidden;">
            <table class="table table-striped m-b-none" data-ride="datatables" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Customer Name</th>
                        <th>Mobile No.</th>
                        <th>Customer Type</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>



        <input type="hidden" id="Retailer_Id" name="Retailer_Id" value="<?php echo $_SESSION['Retailer_id']; ?>" placeholder="Retailer_Id" ><br><br>

    </form>
    </section>
    <script src="js/datatables/jquery.dataTables.min.js"></script>
        <!--<script src="js/app.plugin.js"></script>-->
    <script>
        $('[data-ride="datatables"]').each(function () {
            var oTable = $(this).dataTable({
                "bProcessing": true,
                "sAjaxSource": "test.php",
                "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
                "sPaginationType": "full_numbers",
                "aoColumns": [
//                {"mData": "Radio_Button"},
                    {"mData": "Sr_no"},
                    {"mData": "Customer_Name"},
                    {"mData": "Customer_Phone_Number"},
                    {"mData": "Customer_Type"}
                ]
            });
        });
    </script>
<?php
include('footer.php');
?>