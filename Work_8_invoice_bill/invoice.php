
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
                padding-bottom: 50px;
            }
            #expand-btn{
                position: absolute;
                bottom: 4%;
                left: 50%;
                background-color: #E9ECEF;
                border-radius: 50%;
                padding: 10px;
            }
            label{
                color: gray;
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
                margin-bottom:20px;
                flex-wrap: unset;
            }
            #products_container{
                overflow:auto;
            }
            @media only screen and (max-width: 600px) {
                .product_row{
                    flex-wrap: wrap;
                }
                #products_container{
                    overflow:hidden;
                }
            }
            .product_row::-webkit-scrollbar {
                height: 4px;
            }
            /* Track */
            .product_row::-webkit-scrollbar-track {
                background: #f1f1f1;
            }
            /* Handle */
            .product_row::-webkit-scrollbar-thumb {
                background: grey;
                opacity: 0.1;
            }
            /* Handle on hover */
            .product_row::-webkit-scrollbar-thumb:hover {
                background: #555;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="css/rise-retail-web-application.webflow.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="js/invoice.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    </head>
    <body>
        <div class="container my-5">
            <div class="card shadow-sm">
                <div class="card-header pt-4" id="header1">
    <!--                                <a href="invoice.php" class="btn btn-primary header-new-refresh-button"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                    <button href="" onclick="window.open('invoice.php')" class="btn btn-primary header-new-page-button"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" disabled name="customer_name" id="customer_name" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-3">
                            <input type="text" disabled name="customer_address" id="customer_address" class="form-control" placeholder="Address">
                        </div>
                        <div class="col-md-2" id="customer_number-div">
                            <?php
                            if (!empty($_GET['mobile_number'])) {
                                ?>
                                <input type="number" class="form-control" value="<?php echo $_GET['mobile_number']; ?>" name="customer_number" id="customer_number" placeholder="Customer Number">
                            <?php
                            } else {
                                ?>
                                <input type="number" class="form-control" value="" name="customer_number" id="customer_number" placeholder="Customer Number">
                                <?php
                            }
                            ?>
                            <!--<input type="number" class="form-control" name="customer_number" id="customer_number" placeholder="Customer Number">-->
                        </div>
                        <div class="col-md-2 ml-auto">
                            <input type="date" name="invoice_date" id="invoice_date" class="form-control" style="font-size: 14px!important;" value="">
                        </div>
                        <div class="col-md-1 ">
                            <a href="dashbord.php" class="w-inline-block"><img src="images/Home.png" width="40" height="40" style="background: #f17d06;" class="home-link"></a>
                        </div>
                        <div>
                            <a href="#" onclick="toggleHeader()"><i id="expand-btn" class="fa fa-arrow-down" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div id="expand-header" style="display: none">
                        <div class="row mt-3">
                            <div class="col-2 col-md-1">
                                <!--<a href="#" class="btn btn-primary">More</a>-->
                                <button type="button" data-toggle="modal" data-target="#myModalss-optic" class="btn btn-primary" onclick="return display_optics();">More</button>
                            </div>
                            <div class="col-3 col-md-1 mx-2" id="referral-div">
                                <button type="button" id="referal" data-toggle="modal" data-target="#myModalss-referal" class="btn btn-primary">Referral</button>
                            </div>
                            <div class="col-2 col-md-1" id="kyc-div">
                                <!--<a href="#" class="btn btn-primary">KYC</a>-->
                                <button type="button" data-toggle="modal" data-target="#myModalss-kyc" class="btn btn-primary">KYC</button>
                            </div>
                            <div class="col-3 col-md-1 mx-2">
                                <a href="#" class="btn btn-primary">Subscription</a>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row">
                                            <div class="col-md-4 ml-auto">
                                            <select id="hashtag" name="hashtag" class="form-control" style="width: 100%;">
                                                <option value="">Customer Category</option>
                                                <option value="0">General</option>
                                                <?php include ('webservice/get_retailer_hashtag.php'); ?>
                                            </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input disabled type="text" class="form-control" name="retailer_gst_no" id="retailer_gst_no" value="<?php echo $Retailer_GST_Number; ?>" placeholder="GST Reg No.">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="customer_gst_no" id="customer_gst_no" class="form-control" placeholder="Customer GST No.">
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header py-3 d-flex flex-sm-row flex-column ">
                    
                    <div class="d-flex">
                        <h3 class="m-0 font-weight-bold text-primary">
                            Invoice
                        </h3>
                            <input disabled type="text" name="invoice_id" id="invoice_id" class="form-control ml-3">
                        </div>
                        <button type="button" onclick="addProduct()" class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm ml-auto d-block mt-3  mt-sm-0">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add One More Product
                        </button>
                    </div>
                <form action="#" method="POST" id="invoice">
                    <input type="hidden" name="customer_id" id="customer_id">
                    <input type="hidden" name="Retailer_Id" id="Retailer_Id" value="<?php echo $Retailer_Id; ?>">
                    <input type="hidden" name="Coupon_Master_Id" id="Coupon_Master_Id">
                    <input type="hidden" name="Reward_Amt" id="Reward_Amt">
                    <div class="card-body">
                        <div  class="row">
                            <div id="products_container" class="col-12 pl-0">
                            <div class="d-flex product_row" style="flex-wrap:nowrap;overflow:auto;" id="element_1">
                                <div class="d-flex flex-column align-items-center" style="min-width:100px;" id="general_div_1">
                                    <label style="white-space:nowrap;">General</label>
                                    <input type="checkbox"  class="general_select mt-2" name="general" id="general_1">
                                </div>
                                <div class="ml-3" style="min-width:350px;display:none;" id="general_product_description_div_1">
                                    <label style="white-space:nowrap;color: gray">Product Description</label>
                                    <input type="text" name="Description[]" id="general_product_description_1" class="form-control">
                                </div>
                                <div class="ml-3" style="min-width:150px;" id="product_div_1">
                                    <label style="white-space:nowrap;">Product</label>
                                    <select id="product_1" name="Item2[]" class="js-example-basic-single error form-control product_select">
                                        <option disabled selected>Select Product</option>
                                    </select>
                                </div>
                                <div class="ml-3" style="min-width:175px;" id="sub-product_div_1">
                                    <label style="white-space:nowrap;">Sub-Product</label>
                                    <select id="sub-product_1" name="Item[]" class="js-example-basic-single error form-control sub-product_select">
                                        <option disabled selected>Select Sub-Product</option>
                                    </select>
                                </div>
                                <div class="ml-3" style="min-width:115px;">
                                    <label style="white-space:nowrap;">Staff</label>
                                    <select id="staff_1" name="Service_Person[]" class="js-example-basic-single error form-control staff_select">
                                        <option disabled selected>Select Staff</option>
                                    </select>
                                </div>
                                <div class="ml-3" style="min-width:100px;">
                                    <div class="form-group">
                                        <label style="white-space:nowrap;" >Price</label>
                                        <input type="number" step="any" class="form-control price_input" name="price[]" id="price_1" value="0">
                                    </div>
                                </div>
                                <div class="ml-3" style="min-width:100px;">
                                    <div class="form-group">
                                        <label style="white-space:nowrap;" >Quantity</label>
                                        <input type="number" step="any" name="quantity[]" id="quantity_1" class="form-control quantity_input" value="1">
                                    </div>
                                </div>
                                <div class="ml-3" style="min-width:100px;">
                                    <div class="form-group">
                                        <label style="white-space:nowrap;">GST(%)</label>
                                        <input type="number" step="any" name="gst[]" id="gst_1" class="form-control gst_input" value="0" min="0">
                                        <input type="number" step="any" id="gst_price_1" class="form-control" value="0" min="0" hidden>
                                    </div>
                                </div>
                                <div class="ml-3" style="min-width:100px;">
                                    <div class="form-group">
                                        <label style="white-space:nowrap;" >Final</label>
                                        <input type="number" step="any" name="final_rate[]" id="final_rate_1" class="form-control final_input" value="0">
                                        <input type="number" step="any" id="final_rate_product_1" class="form-control final_input_product" value="0" hidden>
                                        <input type="number" step="any" id="final_rate_sub_1" class="form-control final_input_sub" value="0" hidden>
                                    </div>
                                </div>
                                <div class="ml-3" style="min-width:100px;">
                                    <div class="form-group">
                                        <label style="white-space:nowrap;" >Disc(Rs)</label>  
                                        <input type="number" step="any" class="form-control discount_price_input" value="0" min="0" id="discountrupees_1">
                                    </div>
                                </div>
                                <div class="ml-3" style="min-width:100px;">
                                    <div class="form-group">
                                        <label style="white-space:nowrap;" >Disc(%)</label>
                                        <input type="number" step="any" name="discount[]" id="discount_1" class="form-control discount_input" value="0" min="0">
                                        <input type="number" step="any" id="discount_price_1" class="form-control" value="0" min="0" hidden>
                                    </div>
                                </div>
                                <div class="ml-3 mt-2 d-flex justify-content-center align-items-center" style="min-width:100px;">
                                    <button onclick="deleteProduct(1)" type="button" class="btn btn-danger" >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                    <div style="background-color: white;overflow:auto;" class="card-footer">
                        <div class="d-flex" style="flex-wrap:nowrap;">
                            <div class="" style="min-width:150px;">
                                <label>Reward (loyalty)</label>
                                <input type="number" step="any" disabled class="form-control" id="loyalty-discount" name="loyalty-discount" value="0">
                            </div>
                            <div class="ml-3" style="min-width:150px;">
                                <label>Bill Discount (Rs)</label>
                                <input type="number" step="any" class="form-control" id="bill_discount" name="bill_discount" value="0">
                            </div>
                            <div class="ml-3" style="min-width:150px;">
                                <label>You Save</label>
                                <input type="number" step="any" disabled class="form-control" id="discount" name="discount" value="0">
                            </div>
                            <div class="ml-3" style="min-width:150px;">
                                <label for="finalTotalTotal">Total: (A)</label>
                                <input type="number" step="any" readonly class="form-control" id="finalTotalTotal" value="0">
                            </div>
                            <div class="ml-3" style="min-width:150px;">
                                <label for="finalTotal">Sub Total</label>
                                <input type="number" step="any" readonly class="form-control" id="finalTotal" value="0">
                            </div>
                            <div class="ml-3" style="min-width:150px;">
                                <label>Total Discount: (B)</label>
                                <input type="number" step="any" disabled class="form-control" id="totalDiscount" name="totalDiscount" value="0">
                            </div>
                        </div>
                    </div>
                    <div style="background-color: white;overflow:auto;" class="card-footer">
                        <div class="d-flex" style="flex-wrap:nowrap;">
                            <div class="" style="min-width:100px;">
                                <label>CGST (Rs)</label>
                                <input type="number" step="any" class="form-control" readonly value="0" id="cgst">
                            </div>
                            <div class="ml-3" style="min-width:100px;">
                                <label>SGST (Rs)</label>
                                <input type="number" step="any" class="form-control" readonly value="0" id="sgst">
                            </div>
                            <div class="ml-3" style="min-width:100px;">
                                <label>IGST (Rs)</label>
                                <input type="checkbox" class="ml-1" id="igst-checkbox">
                                <input disabled type="number" step="any" class="form-control" value="0" id="igst">

                            </div>
                            <div class="ml-5" style="min-width:200px;">
                                <label>Total GST (Rs)</label>
                                <input type="number" step="any" class="form-control" readonly value="0" id="totalGst">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <div class="d-flex flex-column flex-md-row">
                            <!--<button type="submit" class="btn btn-primary" name="add_sales" value="addSales" onclick="return editcustomer();"><i class="fa fa-check"></i> Submit</button>-->
                            <input type="radio" id="bypass_loyalty" name="bypass_loyalty" value="yes" class="mx-auto mt-1">
                            <label for="yes" style="white-space:nowrap;margin-left:5px;">Click to bypass coupon</label>
                            <input type="submit" style="display:none;height:40px;" class="btn ml-3 btn-primary" name="submit_row" id="without_discount" value="Submit" onclick="return editcustomer();">
                            <input type="submit" style="display:none;height:40px;" class="btn ml-3 btn-primary" name="submit_row" id="with_discount" value="Redeem" onclick="return redeem_coupon();">
                        </div>
                        <div>
                            <div class="form-group row">
                                <label for="finalTotal_amt" class="col-sm-6 col-form-label" style="white-space:nowrap;">Final Total: (A-B+Tax)</label>
                                <div class="col-sm-6">
                                    <input type="number" step="any" readonly class="form-control" id="finalTotal_amt" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="background-color: white; overflow:auto;" class="card-footer">
                        <div class="d-flex" style="flex-wrap:nowrap;">
                            <div class="" style="min-width:150px;">
                                <label>Cash Paid</label>
                                <input type="checkbox" name="cash_paid_checkbox" id="cash_paid_checkbox" class="ml-1">
                                <input disabled type="number" step="any" value="0" class="form-control" class="cash_paid" id="cash_paid">
                            </div>
                            <div class="ml-3" style="min-width:150px;">
                                <label>Card Paid</label>
                                <input type="checkbox" name="card_paid_checkbox" id="card_paid_checkbox" class="ml-1">
                                <input disabled type="number" step="any" value="0" class="form-control" class="card_paid" id="card_paid">
                            </div>
                            <div class="ml-3" style="min-width:150px;">
                                <label>Other Paid</label>
                                <input type="checkbox" name="other_paid_checkbox" id="other_paid_checkbox" class="ml-1">
                                <input disabled type="number" step="any" value="0" class="form-control" class="other_paid" id="other_paid">
                            </div>
                            <div class="ml-3" style="min-width:150px;">
                                <label>Amount Paid</label>
                                <input disabled type="number" step="any" value="0" class="form-control" class="amount_paid" id="amount_paid">
                            </div>
                            <div class="ml-3" style="min-width:150px;">
                                <label>Balance Due</label>
                                <input disabled type="number" step="any" value="0" class="form-control" class="balance_due" id="balance_due">
                            </div>
                        </div>
                    </div>
                    <div style="background-color: white" class="card-footer">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Please confirm here to send SMS</label>
                                <div>
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="sms_option" name="sms_option" value="1" checked="">
                                    <label for="no" class="ml-5">No</label>
                                    <input  type="radio" id="sms_option" name="sms_option" value="0">
                                </div>
                            </div>
                            <div class="col-md-6 ml-auto" id="yes_sms_div">
                                <label>Select next reminder</label>
                                <div>
                                    <input type="date" name="next_reminder_date" id="next_reminder_date" class="form-control" style="width: 190px; display: inline">
                                    <p style="display: inline">OR</p>
                                    <input type="text" name="next_reminder_days" id="next_reminder_days" class="form-control" placeholder="Enter Number of Days" style="width: 190px;  display: inline">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="background-color: white" class="card-footer">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="remarks" id="remarks" class="form-control">
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
                    <div class="modal fade" id="myModalss-kyc" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content" style="margin-top: 50%;width: 100%!important;">
                                <div class="modal-header">
                                    <h4 class="modal-title">Customer KYC</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <!--                        <h4 class="modal-title">Customer KYC</h4>-->
                                </div>
                                <div class="modal-body" style="text-align: center;overflow-y: auto;">

                                    <div class="row">

                                        <div class="col-xs-6 col-sm-6"> <div><h6>Last Visit Date - <span id="last_visited_date"></span></h6></div>

                                        </div>
                                        <div class="col-xs-6 col-sm-6"> <div><h6>Total Visits - <span id="visit_count"></span></h6></div>

                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6"> <div><h6>Last Purchase - <img src="images/rupeefontfinal.png" />&nbsp;<span id="sym"></span><span id="trans_amt"></span></h6></div>

                                        </div>
                                        <div class="col-xs-6 col-sm-6"> <div><h6>First Visit - <span id="first_trans_date"></span></h6></div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12"> <input type="text" class="form-control"  name="Customer_Email_Id" id="Customer_Email_Id" placeholder="Enter Customer Email Id" value=""/>

                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12"><label for="bdaymonth" style="margin-top: 5px;position: absolute;margin-left: 35px;">Birthday</label> <input type="date" class="form-control"  name="Customer_Date_Of_Birth" id="Customer_Date_Of_Birth" placeholder="Enter Customer Date of Birth" value=""/>
                                            <!--<input type="text" class="form-control"  name="New_Customer_Date_Of_Birth" id="New_Customer_Date_Of_Birth" placeholder="Enter Customer Date of Birth" style="display:none" />-->

                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12"><label for="bdaymonth" style="margin-top: 5px;position: absolute;margin-left: 35px;">Anniversary</label> <input type="date" class="form-control"  name="Customer_Anniversary" id="Customer_Anniversary" placeholder="Enter Customer Anniversary" value=""/>
                                            <!--<input type="text" class="form-control"  name="New_Customer_Anniversary" id="New_Customer_Anniversary" placeholder="Enter Customer Anniversary" style="display:none" />-->

                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12"> <select id="Customer_Gender" name="Customer_Gender" class="form-control">
                                                <option selected>Select Gender</option>                    
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select> 
                                            <select id="New_Customer_Gender" name="New_Customer_Gender" class="w-select input-css" style="display:none"></select>

                                        </div>

                                    </div>
                                    <div class="row" style="display:none;">
                                        <label style="z-index: 9999;top: 40px;left: 129px;">Pincode</label>
                                        <input type="text" class="w-input input-css"  maxlength="6" name="Customer_Zipcode" id="Customer_Zipcode" placeholder="Enter PIN Code" value=""/>
                                        <span id="errorzip" style="color: #f09124; margin-left: 351px;"></span>
                                    </div>
                                    <div class="row" style="display:none;">
                                        <label style="z-index: 9999;top: 40px;left: 129px;">Address</label>
                                        <textarea class="w-input input-css"  name="Customer_Address" id="Customer_Address" placeholder="Enter Customer Address" value=""></textarea>

                                    </div>
                                    <div class="row" style="display:none;">
                                        <label style="z-index: 9999;top: 40px;left: 118px;">Occupation</label>
                                        <input type="text" class="w-input input-css"  name="Customer_Occupation" id="Customer_Occupation" placeholder="Enter Customer Occupation" value="" />

                                    </div>
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12"> <input type="button" value="Purchase History" id="purchase_his" data-wait="Please wait..." class="w-button submit-button" style="background-color:#fdd4b5;color:#000000;" onclick="return display_trans();">

                                        </div>

                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12"> <div id="trans-history">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal fade" id="myModalss-optic" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content" style="margin-top: 50%;width: 100%!important;">
                                <div class="modal-header">
                                    <h4 class="modal-title">Optic Info</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <!--                        <h4 class="modal-title">Optic Info</h4>-->
                                </div>

                                <div class="modal-body" style="text-align: center;overflow-y: auto;">
<!--                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12"> <input type="text" class="form-control" name="Spects_Lens" id="Spects_Lens" placeholder="Spects or Lens Type" value=""/>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-3"> Right Distance

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="D_SPH_R" id="D_SPH_R" placeholder="SPH" value=""/>

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="D_CYL_R" id="D_CYL_R" placeholder="CYL" value=""/>

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="D_AXIS_R" id="D_AXIS_R" placeholder="AXIS" value=""/>

                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-3"> Right Addition

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="A_SPH_R" id="A_SPH_R" placeholder="SPH" value=""/>

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="A_CYL_R" id="A_CYL_R" placeholder="CYL" value=""/>

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="A_AXIS_R" id="A_AXIS_R" placeholder="AXIS" value=""/>

                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-3"> Left Distance

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="D_SPH_L" id="D_SPH_L" placeholder="SPH" value=""/>

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="D_CYL_L" id="D_CYL_L" placeholder="CYL" value=""/>

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="D_AXIS_L" id="D_AXIS_L" placeholder="AXIS" value=""/>

                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-3"> Left Addition

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="A_SPH_L" id="A_SPH_L" placeholder="SPH" value=""/>

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="A_CYL_L" id="A_CYL_L" placeholder="CYL" value=""/>

                                        </div>
                                        <div class="col-xs-3 col-sm-3"> <input type="text" class="form-control" name="A_AXIS_L" id="A_AXIS_L" placeholder="AXIS" value=""/>

                                        </div>

                                    </div>-->

                                    <!--<br>-->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12"> <span id="cust_datas"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal fade" id="myModalss-referal" role="dialog">
                    <div class="modal-dialog">

                        Modal content
                        <div class="modal-content" style="margin-top: 50%;width: 100%!important;">
                            <div class="modal-header">
                                <h4 class="modal-title">Referral</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <!--                        <h4 class="modal-title">Customer KYC</h4>-->
                            </div>
                            <div class="modal-body" style="text-align: center;">

                                <div class="row">

                                    <div class="col-xs-12 col-sm-12">
                                        <!--<label style="z-index: 9999;top: 40px;left: 130px;">Mobile Number</label>-->
                                        <input type="text" class="form-control" maxlength="10" name="Referal_Number" id="Referal_Number" placeholder="Mobile Number" value=""/>
                                        </div><!--<input type="text" class="w-input input-css"  name="New_Customer_Date_Of_Birth" id="New_Customer_Date_Of_Birth" placeholder="Customer Date of birth" style="display:none" />-->
                                </div><br>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12">
                                        <!--<label style="z-index: 9999;top: 40px;left: 130px;">Referral Name</label>-->
                                        <input type="text" class="form-control"  name="Referal_Name" id="Referal_Name" placeholder="Referral Name" value=""/>
                            </div><!--                        <span id="erroremail" style="color: #f09124; margin-left: 351px;"></span>-->
                                </div>	<br>

                                <div class="row">

                                    <div class="col-xs-12 col-sm-12">
                                        <!--<label style="z-index: 9999;top: 40px;left: 130px;">Referral Category</label>-->
                                        <input type="text" class="form-control"  name="Referal_Extra_Note" id="Referal_Extra_Note" placeholder="Referral Category" value=""/>
                            </div><!--                        <span id="erroremail" style="color: #f09124; margin-left: 351px;"></span>-->
                                </div><br>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12">
                                        <!--<label style="z-index: 9999;top: 40px;left: 130px;">Referral Remarks</label>-->
                                        <input type="text" class="form-control"  name="Referal_Remarks" id="Referal_Remarks" placeholder="Referral Remarks" value=""/>
                            </div><!--                        <span id="erroremail" style="color: #f09124; margin-left: 351px;"></span>-->
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                </form>

            </div>
        </div>
        <script type="text/javascript">
                    $(document).ready(function () {
                        <?php if (!empty($_GET['mobile_number'])) { ?>

                                var evt = new Event('input');
                                document.getElementById("customer_number").dispatchEvent(evt)

                            <?php
                        };
                        ?>
                    });
</script>
    </body>
</html>