<?php
//
//include './util.php';
//Start session
session_start();
include('header.php');
include('config.inc.php');
include ('webservice/get_customer_count_for_retailer.php');
include ('webservice/get_sale.php');
?>

<!DOCTYPE html>
<html lang="en" class="app">
    <head>
        <style>
            a{
                text-decoration: none;
                color: black;
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
            <?php
 include "navbar.php";
?>

<section class="home-section">
    </head>
    <body class="">
        <section class="vbox">

            <section>
                <section class="hbox stretch">
                    <!-- .aside -->
                    <!-- /.aside -->
                    <section id="content">
                        <section class="hbox stretch">
                            <section>
                                <section class="vbox">
                                    <section class="scrollable padder">
                                        <section class="row m-b-md">
                                            <div class="col-lg-12" style="margin-top: 20px;">
                                                <h2 class="main-heading" style="margin-bottom: 15px;">Customer Record</h2>
                                                <!-- .breadcrumb -->
                                                <!--                                                <ul class="breadcrumb">
                                                                                                    <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                                                                                                    <li><a href="#">Get Retailer Customer Details</a></li>                                                   
                                                                                                </ul>-->
                                                <!-- / .breadcrumb -->
                                                <div id="loaderd" style="display:none;height: 100%;left: 0;position: fixed;top: 0;width: 100%;z-index: 999999;">
                                                    <img src="images/loader.gif" id="gif" style="display: block; margin: 17% auto 0; visibility: hidden;" />
                                                </div>																															                                               
                                            </div>
                                        </section>
                                        <div class="col-lg-12" style="height: 10px; "></div>                                       									
                                        <div class="col-lg-12"></div>
                                        <div class="col-lg-8">
                                           
                                                <section class="panel panel-default" >
                                                <div class="panel-body">
                                                                                                        <!--<span style="font-weight: bold; font-size: 16px;">Retailer Customer Details</span>-->
                                                    <div class="line line-dashed b-b line-lg pull-in"></div>
                                                    <!-- <label class="col-sm-4 control-label required"style="top : 10px;padding-left: 0px;text-align: center!important;">Enter Choice</label> -->
                                                    <div class="row" style="display:flex; justify-content : center; align-items:center;">
                                                <div class="col">
                                                    <select id="hashtag" name="hashtag" class="w-select input-css" style="width: 180px !important;">
                                                        <!--<option value="0">Select Option</option>-->
                                                        <option value="1">Last Month</option>
                                                        <option value="2" >Last 3 Months</option>
                                                        <option value="3">Last 6 Months</option>
                                                        <option value="4" selected>All</option>

                                                    </select>
                                                </div>
                                                <div class="col">                                                  
                                                        <a href="#" id="submit_report_button" onclick="return get_report()" class="w-button submit-button" style="text-align: center;width: 80px !important;margin-top: 0 !important;margin-inline: 10px ;">Submit</a>
                                                </div>
                                            </div>
                                                    <div class="form-group">

                                                        <div class="col-sm-4" style="top : 10px; margin-bottom: 20px" style="display: none!important;">
                                                            <input type="text" name="r_id" id="r_id" value="1143" style="display: none!important;" />                                                           
                                                            <span id="riderror"></span>
                                                        </div>
                                                    </div>                                                   
                                                    <div style="clear: both"></div>
                                                    <div class="form-group" style="display: none;">
                                                        <label class="col-sm-4 control-label required"style="top : 10px;padding-left: 0px;">Select Registration From Date</label>
                                                        <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                            
                                                            <input type="text" data-date-format="dd-mm-yyyy" name="from_date" id="from_date" class="input-sm input-s datepicker-input form-control">
                                                            <span id="fromerror"></span>
                                                        </div>
                                                    </div>   
                                                    <div style="clear: both"></div>
                                                    <div class="form-group" style="display: none;">
                                                        <label class="col-sm-4 control-label required"style="top : 10px;padding-left: 0px;">Select Registration To Date</label>
                                                        <div class="col-sm-4" style="top : 10px; margin-bottom: 20px">                                                           
                                                            <input type="text" data-date-format="dd-mm-yyyy" name="to_date" id="to_date" class="input-sm input-s datepicker-input form-control">
                                                            <span id="toerror"></span>
                                                        </div>
                                                    </div>                                                   
                                                    <div style="clear: both"></div>
                                                    <div class="line line-dashed b-b line-lg pull-in"></div>
                                                    <div style="clear: both"></div>
                                                    <div class="col-lg-4">                                               
                                                    </div>
                                                    
                                                    <br><br>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-lg-12"></div>
                                        <div class="col-lg-8">
                                                <!--<span style="font-weight: bold;"> Total No Of Records Found : </span><span id="total_rec"></span>-->
                                            <section class="panel panel-default">
                                                <div class="panel-body">												
                                                    <table class="table" id="indextable">
                                                        <thead>
                                                            <tr>
                                                                <th><a href="javascript:SortTable(0,'N');">Sr No.</a></th>
                                                                <th><a href="javascript:SortTable(1,'T');">Customer Name</a></th>
                                                                <th><a href="javascript:SortTable(2,'N');">Customer Mobile No</a></th>
                                                                <th><a href="javascript:SortTable(3,'N');">Purchase Amount</a></th>												  
                                                                <th><a href="javascript:SortTable(4,'N');">Visits</a></th>												  														
                                                            </tr>
                                                        </thead>
                                                        <tbody id="customer_details">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-lg-2"></div>
                                    </section>
                                </section>
                            </section>                                                  
                        </section>
                        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> 
                    </section>
                </section>
            </section>
        </section>
        <!-- App -->
        </section>
        <script src="js/app.v1.js"></script>
<!--        <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
        <script src="js/charts/flot/jquery.flot.min.js"></script>
        <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script>
        <script src="js/charts/flot/jquery.flot.spline.js"></script>
        <script src="js/charts/flot/jquery.flot.pie.min.js"></script>
        <script src="js/charts/flot/jquery.flot.resize.js"></script>
        <script src="js/charts/flot/jquery.flot.grow.js"></script>
        <script src="js/charts/flot/demo.js"></script>
        <script src="js/calendar/bootstrap_calendar.js"></script>
        <script src="js/calendar/demo.js"></script>
        <script src="js/sortable/jquery.sortable.js"></script>-->
        <script src="js/app.plugin.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://riseretail.net/lmsRRNew/lmsrr/web/datepicker/jquery.datetimepicker.css" type="text/css" /> 

        <script src="https://riseretail.net/lmsRRNew/lmsrr/web/datepicker/jquery.datetimepicker.js"></script>
        <script src="js/sort.js"></script>
    </body>
</html>
<script>
                                                            $('#to_date').datetimepicker({
                                                                timepicker: false,
                                                                format: 'Y-m-d',
                                                                formatDate: 'Y-m-d',
                                                                //minDate: 0,
                                                                scrollDay: false,
                                                                scrollMonth: false,
                                                                scrollYear: false
                                                            });
                                                            $('#from_date').datetimepicker({
                                                                timepicker: false,
                                                                format: 'Y-m-d',
                                                                formatDate: 'Y-m-d',
                                                                //minDate: 0,
                                                                scrollDay: false,
                                                                scrollMonth: false,
                                                                scrollYear: false
                                                            });
                                                            window.onload = function () {
                                                                document.getElementById("submit_report_button").click();
                                                            }

                                                            function get_report() {
                                                                var r_id = document.getElementById('r_id').value.trim();
                                                                var hashtag = document.getElementById('hashtag').value.trim();
                                                                var to_date = document.getElementById('to_date').value.trim();
                                                                var from_date = document.getElementById('from_date').value.trim();

                                                                if (r_id == '') {
                                                                    $("#riderror").html("Please enter retailer id");
                                                                    $('#r_id').focus();
                                                                    return false;
                                                                } else {
                                                                    $("#riderror").html(' ');
                                                                }
                                                                if (hashtag == '') {
                                                                    $("#riderror").html("Please enter retailer id");
                                                                    $('#hashtag').focus();
                                                                    return false;
                                                                } else {
                                                                    $("#riderror").html(' ');
                                                                }
//			if(from_date == ''){
//				$("#fromerror").html("Please select from date");
//				$('#from_date').focus();
//				return false;           
//			}else{
//				$("#fromerror").html(' ');
//			} 	
//			if(to_date == ''){
//				$("#toerror").html("Please select to date");
//				$('#to_date').focus();
//				return false;           
//			}else{
//				$("#toerror").html(' ');
//			} 

                                                                var postTo = './webservice/get-top-customers.php';
                                                                var data = JSON.stringify({
                                                                    r_id: r_id,
                                                                    hashtag: hashtag,
                                                                    from_date: from_date,
                                                                    to_date: to_date
                                                                });
                                                                /* $('#loaderd').show();
                                                                 $('#gif').css('visibility', 'visible');					 */
                                                                jQuery.post(postTo, data,
                                                                        function (data) {
                                                                            $('#loaderd').hide();
                                                                            $('#gif').css('visibility', 'hidden');
                                                                            console.log(data);
                                                                            if (data.customer_details == '') {
                                                                                document.getElementById("customer_details").innerHTML = 'No records found.';
                                                                                document.getElementById("total_rec").innerHTML = '';
                                                                                return false;
                                                                            } else {
                                                                                document.getElementById("customer_details").innerHTML = data.customer_details;
                                                                                document.getElementById("total_rec").innerHTML = data.total_record;
                                                                            }
                                                                            return false;
                                                                        }, 'JSON');
                                                            }
                                                            
</script>
<?php
include('footer.php');
?>