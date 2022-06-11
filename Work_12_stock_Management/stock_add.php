  
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>







<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />










<?php
session_start();

include('header.php');
require("config.inc.php");
$Retailer_Id = $_SESSION['Retailer_id'];
?>
<style>

    body {font-family: Arial;}

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #5b3178;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        color: white;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #f09022;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #f09022;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>

<link rel="stylesheet" href="newinvoice/searchable/jquery-ui.css">
<script src="newinvoice/searchable/jquery-ui.min.js"></script>
<link rel="stylesheet" href="newinvoice/js/chosen.min.css" />
<?php
 include "navbar.php";
?>

<section class="home-section">
<div class="tab" style="margin-top:100px;">

    <button class="tablinks" onclick="openCity(event, 'Paris')">Update Stock Count</button>
    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Live Stock Status</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Add Multiple Stock</button>
    <button class="tablinks" onclick="location.href='stock_report.php';">Stock Change Reports</button>
</div>

<div id="London" class="tabcontent">
    <!--<h2 class="main-heading" style="margin-top:0px;">Add Service Categories</h2>-->

    <div class="w-form" style="display:none;">

        <div>

            <div class="col-lg-12"></div>
            <div class="col-lg-8">
                <section class="panel panel-default">
                    <div class="panel-body">
                                                                            <!--<span style="font-weight: bold; font-size: 16px;">Retailer Customer Details</span>-->

                        <div class="form-group">

                            <div class="col-sm-4" style="top : 10px; margin-bottom: 20px" style="display: none!important;">
                                <input type="text" name="r_id" id="r_id" value="<?php echo $Retailer_Id; ?>" style="display: none!important;" />                                                           
                                <span id="riderror"></span>
                            </div>
                        </div>                                                   
                        <div style="clear: both"></div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required"style="text-align: center!important;">Service Name</label>
                            <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                            
                                <input type="text" data-date-format="dd-mm-yyyy" name="service_name" id="service_name" class="w-select input-css" placeholder="Enter Service Name">

                            </div>

                            <!--                            <label class="col-sm-4 control-label required"style="text-align: center!important;">Staff Designation</label>
                                                        <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                            
                                                            <input type="text" data-date-format="dd-mm-yyyy" name="to_date" id="to_date" class="w-select input-css" placeholder="Enter Staff Designation">
                                                            
                                                        </div>-->
                        </div>   

                        <div style="clear: both"></div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div style="clear: both"></div>
                        <div class="col-lg-4">                                               
                        </div>
                        <div class="col-lg-4">                                                   
                            <a href="#" onclick="return get_report()" id="submit_report_button" class="w-button submit-button" style="text-align: center;">Add</a>
                        </div>     
                        <br><br>
                    </div>
                </section>
            </div>
            <div class="col-lg-12"></div>

        </div>

    </div>

    <h2 class="main-heading" style="margin-top:0px;">Live Stock Status</h2>

    <div class="w-form">

        <div>
            <form name="form1" method="post" action="">
                <?php
                $data = "";
                $sr_no = 1;
                $query = "select sum(Stock_Topup_Count) as count,`Staff_Sub_Service`.`Sub_Service_Name`,`Staff_Service`.`Service_Name` FROM `Stock_Topup` inner join `Staff_Sub_Service` on `Staff_Sub_Service`.`Staff_Sub_Service_Id` = `Stock_Topup`.`Staff_Sub_Service_Id` inner join `Staff_Service` on `Staff_Service`.`Staff_Service_Id` = `Staff_Sub_Service`.`Staff_Service_Id` where Staff_Sub_Service.Retailer_Id=$Retailer_Id and Staff_Sub_Service.Active_Status in (0,1) and Staff_Service.Category = 1 group by `Stock_Topup`.`Staff_Sub_Service_Id`";
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
//            echo json_encode($row);die;
                    $data = '<table><th>Sr. No.</th><th>Product Category</th><th>Product Sub-Category</th><th>Current Stock Count</th>';
                    foreach ($rows as $row) {

                        $data .= '<tr><td>' . $sr_no . '</td><td>' . $row['Service_Name'] . '</td><td>' . $row['Sub_Service_Name'] . '</td><td>' . number_format((float) $row['count'], 2, '.', '') . '</td></tr>';

//                $data .= '<tr><td>' . $sr_no . '</td><td>' . $name . '</td><td>' . $row['total_sale'] . '</td><td>' . $row['total_customer'] . '</td><td>' . $row['avg_rating'] . '</td></tr>';
                        $sr_no = $sr_no + 1;
                    }$data .= '</table>';

                    $data .= '';
                } else {
                    $data = '<table><th>Sr. No.</th><th>Product Category</th><th>Product Sub-Category</th><th>Current Stock Count</th>';

                    $data .= '<tr><td>No records found</td><td></td><td></td><td></td></tr></table>';
                }
                echo $data;
                ?>
                <!--<a href="#" onclick="return get_delete_report2()" id="submit_report_button" class="w-button submit-button" style="text-align: center;">Delete</a>-->
            </form>
        </div>

    </div>
</div>

<div id="Paris" class="tabcontent">

    <h2 class="main-heading" style="margin-top:0px;">Update Stock</h2>

    <div class="w-form">

        <div>

            <div class="col-lg-12"></div>
            <div class="col-lg-8">
                <section class="panel panel-default">
                    <div class="panel-body">
                                                                            <!--<span style="font-weight: bold; font-size: 16px;">Retailer Customer Details</span>-->

                        <div class="form-group">

                            <div class="col-sm-4" style="top : 10px; margin-bottom: 20px" style="display: none!important;">
                                <input type="text" name="r_id" id="r_id" value="<?php echo $Retailer_Id; ?>" style="display: none!important;" />                                                           
                                <span id="riderror"></span>
                            </div>
                        </div>                                                   
                        <div style="clear: both"></div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label required"style="text-align: center!important;">Select Product Sub-Category*</label>
                            <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                            
                                <select type="text" data-date-format="dd-mm-yyyy" name="service_id" id="service_id" class="js-example-basic-single w-select input-css" placeholder="">
                                    <option value="">Select Product Sub-Category</option>
                                    <?php include ('webservice/get_retailer_productss.php'); ?>
                                </select>
                            </div>
                            
                            <?php 
                            $show = 0;
                            if ($Retailer_Id == 223 || $Retailer_Id == 1167 || $Retailer_Id == 1171 || $Retailer_Id == 1724 || $Retailer_Id == 1725 || $Retailer_Id == 1726) {
                                
                                $show = 1;
                                
                            }?>

                            <div <?php if ($show == 0) { ?>
                                    style="display:none;"
                                    <?php }
                                ?>>
                                <label class="col-sm-4 control-label required"style="text-align: center!important;">Vendor Name (Optional)</label>
                                <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                            
                                    <select type="text" data-date-format="dd-mm-yyyy" name="vendor_name" id="vendor_name" class="js-example-basic-single w-select input-css" placeholder="">
                                        <option value="">Select Vendor</option>
                                        <?php include ('webservice/get_retailer_vendor.php'); ?>
                                    </select>
                                </div>
                            </div>

                            <label class="col-sm-4 control-label required"style="text-align: center!important;">Select Add OR Deduct*</label>
                            <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                            
                                <!--<input type="text" data-date-format="dd-mm-yyyy" name="sub_service_name" id="sub_service_name" class="w-select input-css" placeholder="Enter Sub Service Name">-->
                                <select type="text" data-date-format="dd-mm-yyyy" name="sub_service_name" id="sub_service_name" class="w-select input-css" placeholder="">
                                    <option value="0">Select Add/Deduct</option>
                                    <option value="1">Add Count</option>
                                    <option value="-1">Deduct Count</option>

                                </select>
                            </div>

                            <label class="col-sm-4 control-label required"style="text-align: center!important;">Count of items*</label>
                            <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                            
                                <input type="text" data-date-format="dd-mm-yyyy" name="sub_service_price" id="sub_service_price" class="w-select input-css" placeholder="Enter Product Count">

                            </div>
                            
                            <div <?php if ($show == 0) { ?>
                                    style="display:none;"
                                    <?php }
                                ?>>
                                <label class="col-sm-4 control-label required"style="text-align: center!important;">Purchase Amount Per Item (Optional</label>
                                <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                            
                                    <input type="text" data-date-format="dd-mm-yyyy" name="payment" id="payment" class="w-select input-css" placeholder="Enter Amount">

                                </div>


                                <label class="col-sm-4 control-label required"style="text-align: center!important;">Invoice Number of Purchase (Optional)</label>
                                <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                            
                                    <input type="text" data-date-format="dd-mm-yyyy" name="invoice" id="invoice" class="w-select input-css" placeholder="Enter Invoice Number">

                                </div>
                            </div>

                            <label class="col-sm-4 control-label required"style="text-align: center!important;">Remarks (Optional)</label>
                            <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                            
                                <input type="text" data-date-format="dd-mm-yyyy" name="sub_service_remark" id="sub_service_remark" class="w-select input-css" placeholder="Enter Remark" maxlength="80">

                            </div>
                        </div>   

                        <div style="clear: both"></div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div style="clear: both"></div>
                        <div class="col-lg-4">                                               
                        </div>
                        <div class="col-lg-4">                                                   
                            <a href="#" onclick="return get_report2()" id="submit_report_button" class="w-button submit-button" style="text-align: center;">Submit</a>
                        </div>     
                        <br><br>
                    </div>
                </section>
            </div>
            <div class="col-lg-12"></div>

        </div>

    </div>

    <!--<h2 class="main-heading" style="margin-top: -30px;">Live Stock</h2>-->

    <div class="w-form" style="display: none;">

        <div>
            <form name="form1" method="post" action="">
                <?php
                $data = "";
                $sr_no = 1;
                $query = "select sum(Stock_Topup_Count) as count,`Staff_Sub_Service`.`Sub_Service_Name` FROM `Stock_Topup` inner join `Staff_Sub_Service` on `Staff_Sub_Service`.`Staff_Sub_Service_Id` = `Stock_Topup`.`Staff_Sub_Service_Id` where Staff_Sub_Service.Retailer_Id=1143 and Staff_Sub_Service.Active_Status in (0,1) group by `Stock_Topup`.`Staff_Sub_Service_Id`";
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
//            echo json_encode($row);die;
                    $data = '<table><th>Sr. No.</th><th>Sub Service Name</th><th>Count</th>';
                    foreach ($rows as $row) {

                        $data .= '<tr><td>' . $sr_no . '</td><td>' . $row['Sub_Service_Name'] . '</td><td>' . $row['count'] . '</td></tr>';

//                $data .= '<tr><td>' . $sr_no . '</td><td>' . $name . '</td><td>' . $row['total_sale'] . '</td><td>' . $row['total_customer'] . '</td><td>' . $row['avg_rating'] . '</td></tr>';
                        $sr_no = $sr_no + 1;
                    }$data .= '</table>';

                    $data .= '';
                } else {
                    $data = '<table><th>Sr. No.</th><th>Sub Service Name</th><th>Count</th>';

                    $data .= '<tr><td>No records found</td><td></td><td></td><td></td><td></td></tr></table>';
                }
                echo $data;
                ?>
                <!--<a href="#" onclick="return get_delete_report2()" id="submit_report_button" class="w-button submit-button" style="text-align: center;">Delete</a>-->
            </form>
        </div>

    </div>

</div>

<div id="Tokyo" class="tabcontent">
    <h2 class="main-heading" style="margin-top: 0px;">Add Multiple Stock</h2>

    <div class="w-form">

        <div>
            <form name="form1" method="post" action="">
                <?php
                $data = "";
                $sr_no = 1;
                $query = "select * FROM `Staff_Sub_Service` inner join `Staff_Service` on `Staff_Service`.`Staff_Service_Id` = `Staff_Sub_Service`.`Staff_Service_Id` where Staff_Sub_Service.Retailer_Id=$Retailer_Id and Staff_Sub_Service.Active_Status in (0,1) and `Staff_Service`.`Active_Status` = 1 and Staff_Service.Category = 1 order by Staff_Sub_Service.Active_Status desc";
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
//            echo json_encode($row);die;
                    $data = '<table><th>Sr. No.</th><th>Product Category</th><th>Product Sub-Category</th><th>Add Stock Count</th><th>Select to Add</th>';
                    foreach ($rows as $row) {

                        if ($row['Active_Status'] == 1) {
                            $status = "Active";
                        } else if ($row['Active_Status'] == -1) {
                            $status = "Deactive";
                        } else {
                            $status = "In-process";
                        }
//                    $one_decimal_place = number_format($row['avg_rating'], 1);
                        $data .= '<tr><td>' . $sr_no . '</td><td>' . $row['Service_Name'] . '</td><td>' . $row['Sub_Service_Name'] . '</td><td style="border: 3px solid #ccc;border-radius: 4px;box-sizing: border-box;" contentEditable>0</td><td align="center" bgcolor="#FFFFFF"><input name="checkbox1[]" type="checkbox" value=' . $row['Staff_Sub_Service_Id'] . '></td></tr>';

//                $data .= '<tr><td>' . $sr_no . '</td><td>' . $name . '</td><td>' . $row['total_sale'] . '</td><td>' . $row['total_customer'] . '</td><td>' . $row['avg_rating'] . '</td></tr>';
                        $sr_no = $sr_no + 1;
                    }$data .= '</table>';

                    $data .= '';
                } else {
                    $data = '<table><th>Sr. No.</th>Product Category<th>Product Sub-Category</th><th>Add Stock Count</th><th>Select to Add</th>';

                    $data .= '<tr><td>No records found</td><td></td><td></td><td></td><td></td></tr></table>';
                }
                echo $data;
                ?>
                <a href="#" onclick="return get_delete_report3()" id="submit_report_button" class="w-button submit-button" style="text-align: center;">Submit</a>
            </form>
        </div>

    </div>
</div>
</section>
<script src="js/app.v1.js"></script>
<script src="js/app.plugin.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="newinvoice/searchable/jquery.min.js"></script>
<script src="newinvoice/searchable/chosen.jquery.min.js"></script>
<script type='text/javascript'>$('.js-example-basic-single').chosen();</script>
<script>
    $("#service_id_chosen").css("cssText", "width: 500px !important;top: 5px!important;display: block!important;margin-right: auto!important;margin-left: auto!important;border: 2px solid #f09124!important;border-radius: 5px!important;box-shadow: 0 0 18px 4px #fce1cc!important;font-size: 16px!important;");
    $("#vendor_name_chosen").css("cssText", "width: 500px !important;top: 5px!important;display: block!important;margin-right: auto!important;margin-left: auto!important;border: 2px solid #f09124!important;border-radius: 5px!important;box-shadow: 0 0 18px 4px #fce1cc!important;font-size: 16px!important;");
    
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();

    function get_report() {
        var r_id = document.getElementById('r_id').value.trim();
//                        var to_date = document.getElementById('to_date').value.trim();
        var from_date = document.getElementById('service_name').value.trim();

        if (r_id == '') {
            $("#riderror").html("Please enter retailer id");
            $('#r_id').focus();
            return false;
        } else {
            $("#riderror").html(' ');
        }
//                                                               
        var postTo = './webservice/add-service.php';
        var data = JSON.stringify({
            r_id: r_id,
            from_date: from_date
//                            to_date: to_date
        });
        /* $('#loaderd').show();
         $('#gif').css('visibility', 'visible');					 */
        jQuery.post(postTo, data,
                function (data) {
                    $('#loaderd').hide();
                    $('#gif').css('visibility', 'hidden');
                    console.log(data);
                    if (data.details == 1) {
                        alert("Added Successfully");
                        location.reload();
//                        return false;
                    } else {
                        alert("Please Enter all Information");
                    }
                    return false;
                }, 'JSON');
    }

    function get_delete_report() {
        var r_id = document.getElementById('r_id').value.trim();

        if (r_id == '') {
            $("#riderror").html("Please enter retailer id");
            $('#r_id').focus();
            return false;
        } else {
            $("#riderror").html(' ');
        }

//                   var contactArray = inputsToArray(contacts.children);
//    var data = serializeArray(contactArray, 'checkbox[]');
//    var pages = $('input[name="checkbox[]"]:checked');
        var checked = []
        $("input[name='checkbox1[]']:checked").each(function ()
        {
            checked.push(parseInt($(this).val()));
        });

//                                                               
        var postTo = './webservice/delete-service.php';
        var data = JSON.stringify({
            r_id: r_id,
            datas: checked
        });
        /* $('#loaderd').show();
         $('#gif').css('visibility', 'visible');					 */
        jQuery.post(postTo, data,
                function (data) {
                    $('#loaderd').hide();
                    $('#gif').css('visibility', 'hidden');
                    console.log(data);
                    if (data.details == 1) {
                        alert("Deleted Successfully");
                        location.reload();
//                        return false;
                    } else {
                        alert("Please select atleast one.");
                    }
                    return false;
                }, 'JSON');
    }

    function get_report2() {
        var r_id = document.getElementById('r_id').value.trim();
        var to_date = document.getElementById('sub_service_name').value.trim();
        var from_date = document.getElementById('service_id').value.trim();
        var price = document.getElementById('sub_service_price').value.trim();
        var remark = document.getElementById('sub_service_remark').value.trim();
        var vendor = document.getElementById('vendor_name').value.trim();
        var payment = document.getElementById('payment').value.trim();
        var invoice = document.getElementById('invoice').value.trim();

        if (r_id == '') {
            $("#riderror").html("Please enter retailer id");
            $('#r_id').focus();
            return false;
        } else {
            $("#riderror").html(' ');
        }
//                                                               
        var postTo = './webservice/add-stock.php';
        var data = JSON.stringify({
            r_id: r_id,
            from_date: from_date,
            to_date: to_date,
            price: price,
            vendor: vendor,
            remark: remark,
            payment: payment,
            invoice: invoice
        });
        /* $('#loaderd').show();
         $('#gif').css('visibility', 'visible');					 */
        jQuery.post(postTo, data,
                function (data) {
                    $('#loaderd').hide();
                    $('#gif').css('visibility', 'hidden');
                    console.log(data);
                    if (data.details == 1) {
                        alert("Added Successfully");
                        location.reload();
//                        return false;
                    } else {
                        alert("Please Enter all Information");
                    }
                    return false;
                }, 'JSON');
    }

    function get_delete_report2() {
        var r_id = document.getElementById('r_id').value.trim();

        if (r_id == '') {
            $("#riderror").html("Please enter retailer id");
            $('#r_id').focus();
            return false;
        } else {
            $("#riderror").html(' ');
        }

//                   var contactArray = inputsToArray(contacts.children);
//    var data = serializeArray(contactArray, 'checkbox[]');
//    var pages = $('input[name="checkbox[]"]:checked');
        var checked = []
        $("input[name='checkbox2[]']:checked").each(function ()
        {
            checked.push(parseInt($(this).val()));
        });

//                                                               
        var postTo = './webservice/delete-sub-service.php';
        var data = JSON.stringify({
            r_id: r_id,
            datas: checked
        });
        /* $('#loaderd').show();
         $('#gif').css('visibility', 'visible');					 */
        jQuery.post(postTo, data,
                function (data) {
                    $('#loaderd').hide();
                    $('#gif').css('visibility', 'hidden');
                    console.log(data);
                    if (data.details == 1) {
                        alert("Deleted Successfully");
                        location.reload();
//                        return false;
                    } else {
                        alert("Please select atleast one.");
                    }
                    return false;
                }, 'JSON');
    }

    function get_delete_report3() {
        var r_id = <?php echo $Retailer_Id; ?>;

        var checked = []
        var checked2 = []
//                        var checked3 = []
        $("input[name='checkbox1[]']:checked").each(function ()
        {
            checked.push(parseInt($(this).val()));
            checked2.push(parseInt($(this).parent().parent().find('td:eq(3)').text()));
//                            checked3.push(parseInt($(this).parent().parent().find('td:eq(6)').text()));
        });

//                                                               
        var postTo = './webservice/add-stock-multiple.php';
        var data = JSON.stringify({
            r_id: r_id,
            datas: checked,
            datass: checked2
//                            datasss: checked3,
        });
        /* $('#loaderd').show();
         $('#gif').css('visibility', 'visible');					 */
        jQuery.post(postTo, data,
                function (data) {
                    $('#loaderd').hide();
                    $('#gif').css('visibility', 'hidden');
                    console.log(data);
                    if (data.details == 1) {
                        alert("Stock Updated Successfully");
                        location.reload();
//                        return false;
                    } else {
                        alert("Please select atleast one.");
                    }
                    return false;
                }, 'JSON');
    }
</script>
<?php
include('footer.php');
?>