<?php
include('config.inc.php');

$Invoice_Id = $_GET['invoice_id'];

$query = "SELECT * 
FROM  `Invoice_Detail` where Invice_Id = $Invoice_Id";

$query_params = array(
);

//execute query
try {
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error!";
    $response["details"] = $ex;

    die(json_encode($response));
}
$get_data = $stmt->fetch();
//echo "<pre>";print_r($get_data);echo "</pre>";
$customer_name = $get_data['Customer_Name'];
$mobile_no = $get_data['Customer_Number'];
$address = $get_data['Customer_Address'];
$subtotal = $get_data['Subtotal'];
$cgst = $get_data['CGST'];
$sgst = $get_data['SGST'];
$igst = $get_data['IGST'];
$total_tax = $get_data['Total_Tax'];
$discount_amt = $get_data['Discount_Rs'];
$discount_per = $get_data['Discount_Per'];
$discount_loyalty = $get_data['Discount_Loyalty'];
$total_discount = $get_data['Total_Discount'];
$net_total = $get_data['Net_Total'];
$amount_paid = $get_data['Amount_Paid'];
$card_paid = $get_data['Card_Paid'];
$cash_paid = $get_data['Cash_Paid'];
$other_paid = $get_data['Wallet_Paid'];
$amount_due = $get_data['Balance_Due'];
$note = $get_data['Note'];
$date = strtotime($get_data['Timestamp']);
$invoice_number = $get_data['Invoice_Number'];
$Retailer_Business_Name = $get_data['Retailer_Business_Name'];
$Retailer_Address = $get_data['Retailer_Address'];
$City_Name = $get_data['City_Name'];
$Retailer_Pincode = $get_data['Retailer_Pincode'];
$Retailer_GST_Number = $get_data['Retailer_GST_Number'];
$Retailer_Id = $get_data['Retailer_Id'];
$Customer_GST = $get_data['Customer_GST'];
$you_save = $get_data['You_Save'];
$totalA = $net_total + $total_discount - $total_tax;

$query = "SELECT * FROM  `Invoice_Item_Detail` where Invoice_Id = $Invoice_Id";

$query_params = array(
);

//execute query
try {
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error!";
    $response["details"] = $ex;

    die(json_encode($response));
}
$get_data = $stmt->fetchAll();

$query = "SELECT * FROM  `invoice_terms_condition` where `Retailer_Id` = $Retailer_Id";

$query_params = array(
);

//execute query ravi sundaram ganesh natrajan rao citrus payment  jitendra gupta
try {
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error!";
    $response["details"] = $ex;

    die(json_encode($response));
}
$get_data_terms = $stmt->fetchall();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rise Retail Web Application</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
            #header1{
                position: relative;
                background:none  !important;
            }
            .general_select{
                top: 60%;
                left: 50%;
                position: absolute;
                transform: translate(-50%, -50%);
            }
            Chrome, Safari, Edge, Opera
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            .header-new-page-button{
                position: absolute;
                top: -20px;
                right: 10px;
            }
            .header-new-refresh-button{
                position: absolute;
                top: -20px;
                right: 60px;
            }
            .error + .select2-container, 
            .error + .select2-container + .select2-container .select2-dropdown {
                /*border: 3px solid red !important;*/
                width: 100%!important;
                /*height: 5px!important;*/
            }
            .select2-container--open .select2-dropdown--below{
                width: 250px!important;
                /*overflow: auto!important;*/
            }
            .select2-container--default .select2-results>.select2-results__options{
                /*overflow: auto!important;*/
                /*    white-sapce: no-wrap!important;
                  text-overflow: ellipsis!important;*/
                /*max-width:90%!important;*/
            }
            .select2-container--default .select2-selection--single{
                height: 38px!important;
            }
            .product_row{
                flex-wrap: unset;
            }
            .remove-background-and-border{
                background: transparent !important;
                border: none!important;
            }
/*            #products_container{
                overflow:auto;
            }*/
            @media only screen and (max-width: 600px) {
                .product_row{
                    flex-wrap: wrap;
                }
                #products_container{
                    overflow:hidden;
                }
            }
            
            @media print {
                #printbtn {
                    display :  none;
                }
            }
            .nowrap{
                white-space:nowrap;
            }
            .labelunderline{
                border-bottom: 1.5px solid black;
            }
            th{
                background:none !important;
            }
            table{
                border-color:none !important;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="css/rise-retail-web-application.webflow.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!--<script src="js/invoice.js"></script>-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    </head>
    <body style="background:#e7e9ed !important;">
        <div class="container my-5">
            <div class="card " style="box-shadow:2px 2px 5px darkgrey, -2px -2px 5px darkgrey;">
                <div class="card-header pt-4" id="header1">
                                    <div class="card-header row py-3 d-flex flex-row " style="background:none;">
                        <h3 class="m-0 font-weight-bold text-primary">
                            Invoice
                        </h3>
                        <!--<div>-->
<!--                        <h3 class="ml-auto font-weight-bold text-primary">
                            <?php echo $Retailer_Business_Name; ?>
                        </h3>-->
                        <div class="col-md-3 ml-auto d-flex justify-content-center align-items-center">
                            <label for="" style="white-space:nowrap;margin:0; padding:0;color:black;">Date :</label>
                            <input type="text" disabled name="invoice_date" id="invoice_date" class="form-control remove-background-and-border" value="<?php echo date('d-m-Y', $date); ?>">
                        </div>
                        <div class="col-md-1">
                            <button onclick="window.print()" id="printbtn"><i class="fa fa-print" aria-hidden="true"></i></button>
                        </div>
                            <!--</div>-->
    <!--                    <button type="button" onclick="addProduct()" class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm ml-auto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add One More Product
                        </button>-->
                    </div>





                                    <div class="card-header row py-3 d-flex flex-row " style="background:none;">
                                        <div class="col-12 col-md-8 px-0" style="line-height: 20px;">
                                            <h4 class="m-0 font-weight-bold text-primary">
                                                <?php echo $Retailer_Business_Name; ?>
                                            </h4>
                                            <p class="m-0 p-0"><?php echo $Retailer_Address; ?><?php echo $City_Name != ''? ', '.$City_Name: ''; ?><?php echo $Retailer_Pincode != ''? ', '.$Retailer_Pincode: ''; ?></p>  
                                            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mx-0 px-0">
                                            <label for="" style="white-space:nowrap;margin:0; padding:0;color:black;">GST </label>
                                            <input disabled type="text" class="form-control remove-background-and-border ml-1 pl-0 my-0 py-0" style="color:black;font-weight:bold;" name="retailer_gst_no" id="retailer_gst_no" value="<?php echo $Retailer_GST_Number; ?>">
                                            </div>

                                        </div>

                                        <div class="col-12 col-md-4 d-flex justify-content-center align-items-start">
                                            <h5 class="mt-1 font-weight-bold text-primary d-flex justify-content-center align-items-center" style="white-space:nowrap;">
                                                Invoice No :
                                            </h5>               
                                                    <input disabled  type="text" style="color:black;font-weight:bold;" name="invoice_id" id="invoice_id" value="<?php echo $invoice_number; ?>" class="form-control remove-background-and-border ml-3 mt-0 pt-0">
                                               
                                        </div>
                                            <!--</div>-->
                    <!--                    <button type="button" onclick="addProduct()" class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm ml-auto">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Add One More Product
                                        </button>-->
                                    </div>









                   






                    <div class="card-header row pt-4" style="background:none;">
                        <div class="col-12 mx-0 px-0">
                                            <h5 class="m-0 font-weight-bold text-primary">
                                                Invoice To :
                                            </h5>   
                        </div>
                            <div class="col-12 mx-0 px-0">
                            <div class="row mt-2">
                            <div class="col-12">
                                    <div class="col-12">
                                            <div class="row d-flex justify-content-between align-items-center ">
                                                <div class="col-8 mx-0 px-0  ">
                                                <label class="nowrap m-0 p-0">Customer Name</label>
                                                </div>
                                                <div class="col-4 mx-0 px-0 d-flex justify-content-start align-items-center "> 
                                                <input type="text" style="font-weight:bold !important;height:30px !important; padding:0 !important;" disabled name="customer_name" id="customer_name" class="form-control remove-background-and-border" value="<?php echo $customer_name; ?>">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center ">
                                                <div class="col-8 mx-0 px-0   ">
                                                <label class="nowrap m-0 p-0">Customer GST</label>
                                                </div>
                                                <div class="col-4 mx-0 px-0 d-flex justify-content-start align-items-center">
                                                     <input type="text" style="font-weight:bold !important;height:30px !important; padding:0 !important;" disabled name="customer_gst_no" id="customer_gst_no" class="form-control remove-background-and-border" value="<?php echo $Customer_GST; ?>">
                                                </div>
                                            </div>

                                        
                                       
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center ">
                                                <div class="col-8 mx-0 px-0   ">
                                                    <label class="nowrap m-0 p-0">Customer Number</label>
                                                </div>
                                                <div class="col-4 mx-0 px-0 d-flex justify-content-start align-items-center">
                                                      <input type="number" style="font-weight:bold !important;height:30px !important; padding:0 !important;" disabled class="form-control remove-background-and-border" name="customer_number" id="customer_number" value="<?php echo $mobile_no; ?>">
                                                </div>
                                            </div>

                                        
                                        
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center ">
                                                    <div class="col-8 mx-0 px-0   ">
                                                    <label class="nowrap m-0 p-0">Address</label>
                                                    </div>
                                                    <div class="col-4 mx-0 px-0 d-flex justify-content-start align-items-center">
                                                        <input type="text" style="font-weight:bold !important;height:30px !important; padding:0 !important;" disabled name="customer_address" id="customer_address" class="form-control remove-background-and-border" value="<?php echo $address; ?>">
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                            </div>
                    </div>


                    <table class="table mt-4">
                        <thead>
                            <tr>
                            <th scope="col" class="nowrap text-center">#</th>
                            <th scope="col" class="nowrap text-center">Description</th>
                            <th scope="col" class="nowrap text-center">Price</th>
                            <th scope="col" class="nowrap text-center">Quantity</th>
                            <th scope="col" class="nowrap text-center">GST (%)</th>
                            <th scope="col" class="nowrap text-center">Final (+GST & Disc)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                                foreach ($get_data as $data) {
                        ?>
                            <tr>
                                <th class="text-center" scope="row"><?php echo $i;?></th>
                                <td class="text-center"><?php echo $data['Item_Main']; ?><?php echo (($data['Item'] != '')? ' - '.$data['Item']: ''); ?><?php echo (($data['Item_Description'] != '')? ' - '.$data['Item_Description']: ''); ?></td>
                                <td class="text-center"><?php echo $data['Item_Cost']; ?></td>
                                <td class="text-center"><?php echo $data['Item_Qty']; ?></td>
                                <td class="text-center"><?php echo $data['Item_GST']; ?></td>
                                <td class="text-center"><?php echo $data['Item_Price']; ?></td>
                            </tr>
                            <?php
                                $i++;
                             }
                            ?>
                        </tbody>
                    </table>





                    <div style="background-color: white" class="card-footer">
                        <div class="row">


                                <div class="col-5">
                                    <div class="col-12">
                                            <div class="row d-flex justify-content-between align-items-center ">
                                                <div class="col-6 mx-0 px-0  ">
                                                <label class="nowrap m-0 p-0">Item wise Discount</label>
                                                </div>
                                                <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center "><i class="fas fa-rupee-sign"></i> 
                                                <input type="text" disabled class="form-control remove-background-and-border" style="color:black;font-weight:bold;" style="color:black;font-weight:bold;" id="discount" name="discount" value="<?php echo $you_save; ?>">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center ">
                                                <div class="col-6 mx-0 px-0   ">
                                                <label class="nowrap m-0 p-0">Loyalty Discount</label>
                                                </div>
                                                <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                <input type="text" disabled class="form-control remove-background-and-border" style="color:black;font-weight:bold;" id="loyalty-discount" name="loyalty-discount" value="<?php echo $discount_loyalty; ?>">
                                                </div>
                                            </div>

                                        
                                       
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center labelunderline">
                                                <div class="col-6 mx-0 px-0   ">
                                                    <label class="nowrap m-0 p-0 ">Bill Discount</label>
                                                </div>
                                                <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                    <input type="text" disabled class="form-control remove-background-and-border" style="color:black;font-weight:bold;" id="bill_discount" name="bill_discount" value="<?php echo $discount_amt; ?>">
                                                </div>
                                            </div>

                                        
                                        
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center ">
                                                    <div class="col-6 mx-0 px-0   ">
                                                    <label class="nowrap m-0 p-0 ">Total Discount</label>
                                                    </div>
                                                    <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                    <input type="text" disabled class="form-control remove-background-and-border" style="color:black;font-weight:bold;" id="totalDiscount" name="totalDiscount" value="<?php echo $total_discount; ?>">
                                                    </div>
                                        </div>
                                    </div>
                                </div>



                                 <div class="col-3">
                                    <div class="col-12">
                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-6 mx-0 px-0   ">
                                                <label class="nowrap m-0 p-0">CGST</label>
                                                </div>
                                                <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                    <input type="text" disabled  class="form-control remove-background-and-border" style="color:black;font-weight:bold;" readonly value="<?php echo $cgst; ?>" id="cgst">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-6 mx-0 px-0   ">
                                                <label class="nowrap m-0 p-0">SGST</label>
                                                </div>
                                                <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                <input type="text" disabled  class="form-control remove-background-and-border" style="color:black;font-weight:bold;" readonly value="<?php echo $sgst; ?>" id="sgst">
                                                </div>
                                            </div>

                                        
                                       
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center labelunderline">
                                                <div class="col-6 mx-0 px-0   ">
                                                <label class="nowrap m-0 p-0 ">IGST</label>
                                                </div>
                                                <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                <input disabled type="text" disabled  class="form-control remove-background-and-border" style="color:black;font-weight:bold;" value="<?php echo $igst; ?>" id="igst">
                                                </div>
                                            </div>

                                        
                                        
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center">
                                                    <div class="col-6 mx-0 px-0   ">
                                                    <label class="nowrap m-0 p-0">Total GST</label>
                                                    </div>
                                                    <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                    <input type="text" disabled  class="form-control remove-background-and-border" style="color:black;font-weight:bold;" readonly value="<?php echo $total_tax; ?>" id="totalGst">
                                                    </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-4">
                                    <div class="col-12">
                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-6 mx-0 px-0  ">
                                                    <label class="nowrap m-0 p-0">Sub Total</label>
                                                </div>
                                                <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                     <input type="text" disabled  readonly class="form-control remove-background-and-border" style="color:black;font-weight:bold;" id="finalTotal" value="<?php echo $subtotal; ?>">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-6 mx-0 px-0  ">
                                                    <label class="nowrap m-0 p-0">Net Amount</label>
                                                </div>
                                                <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                    <input type="text" disabled  class="form-control remove-background-and-border" style="color:black;font-weight:bold;" readonly value="<?php echo $net_total; ?>" id="finalTotal_amt">
                                                </div>
                                            </div>

                                        
                                       
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center labelunderline">
                                                <div class="col-6 mx-0 px-0  ">
                                                    <label class="nowrap m-0 p-0 ">Amount Paid</label>
                                                </div>
                                                <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                    <input disabled type="text"  value="<?php echo $amount_paid; ?>" class="form-control remove-background-and-border" style="color:black;font-weight:bold;" class="amount_paid" id="amount_paid">
                                                </div>
                                            </div>

                                        
                                        
                                    </div>
                                    <div class="col-12">
                                         <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-6 mx-0 px-0  ">
                                                    <label class="nowrap m-0 p-0">Balance Due</label>
                                                </div>
                                                <div class="col-6 mx-0 px-0 d-flex justify-content-start align-items-center"><i class="fas fa-rupee-sign"></i>
                                                    <input disabled type="text" value="<?php echo $amount_due; ?>" class="form-control remove-background-and-border" style="color:black;font-weight:bold;" class="balance_due" id="balance_due">
                                                </div>
                                            </div>

                                        
                                        
                                    </div>
                                </div>

                        </div>
                    </div>

<!-- 

                    <div class="card-footer d-flex justify-content-between">
                        <div>
                            <div class="form-group row">
                                <label for="finalTotal_amt" class="col-sm-6 col-form-label">Net Amount</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control remove-background-and-border" id="finalTotal_amt" value="">
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div style="background-color: white" class="card-footer">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <label class="nowrap m-0">Paid By : </label>
                                <!--<input type="checkbox" name="cash_paid_checkbox" id="cash_paid_checkbox" class="ml-1">-->
                                <input disabled type="text" style="color:black;font-weight:bold;" value="<?php
                                    if($cash_paid > 0)
                                        echo "Cash";
                                    else if($card_paid > 0)
                                        echo "Card";
                                    else if($other_paid > 0)
                                        echo "Other";
                            ?>" class="form-control remove-background-and-border" class="paid m-0 p-0" id="paid">
                            </div>
                            <div class="col-6 ml-auto d-flex justify-content-center align-items-center">
                                <label class="nowrap m-0 ml-auto">Remarks :</label>
                                <input type="text" disabled name="remarks" id="remarks" value="<?php echo $note; ?>" class="form-control remove-background-and-border">
                            </div>
                        </div>
                    </div>
                    <div style="background-color: white" class="card-footer">
                        <div class="row">
                            <div class="col-md-1">
                                <label>T & C</label>
                            </div>
                            <div class="col-md-11">
                                <ul>
                                    <?php
                                    if ($get_data_terms) {
                                        foreach ($get_data_terms as $row) {
                                            ?>
                                            <li>
                                                <p><?php echo $row['terms_template']; ?></p>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!--</form>-->

            </div>
        </div>
        <script>
         $(function() {
            $('textarea').each(function() {
                $(this).height($(this).prop('scrollHeight'));
            });
        });
        </script>
        <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
    </body>
</html>