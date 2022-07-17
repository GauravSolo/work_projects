<?php
if(isset($_POST["mobile"])){
  if(trim($_POST['mobile']) == '')
  {
    header('Location: subscription_new.php');
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Subscription Module</title>
    <style>
      .row-container{
        background: white;
        box-shadow: 1px 1px 10px  black,-1px -1px 10px #e3dcdc;
        border-radius: 10px;
      }
      thead th,tbody{
        border:  2px solid black;
      }
      th,td{
        text-align : center !important;
      }
      th{
        white-space:nowrap !important;
      }
      table{
        background: white;
      }
[role="tablist"]  a {
  margin-inline: 5px;
  color: black;
  font-weight: bold;
}
.list{
    background: white;
    border-radius: 10px;
    height: 33px;
}
table a{
  text-decoration :  none;
}
.spinner-border{
  width: 1.5rem !important;
  height: 1.5rem !important;
}
.btncss{
        box-shadow: 3px 3px 2px  black !important;
      }
    </style>
  </head>
  <body>
    <?php
      include "navbar.php";

    ?>
    <section class="home-section">
    <div class="container">

<div class="row mx-2 m-sm-0">
    <div class="col">
    <!-- <form action="customer_subscription.php" method="POST">
          <div class="row  d-flex justify-content-center align-items-center mt-4 row-container" >
                <div class="col-12 mt-2" style="border-bottom:  2px solid black;" >
                  <h4 class="m-0">Enter Mobile / Identifcation  Number</h4>
                </div>
                  <div class="col">
                    <div class="row py-3 my-4 d-flex justify-content-center align-items-center">
                    <div class="col-12 col-sm-6 ">
                          <input type="text" class="form-control mx-auto" id="identificationnumber" value="" name="mobile" placeholder="Enter mobile / identifcation number">
                  </div>
                  <div class="col-12 col-sm-2 mt-2 mt-sm-0">
                    <button type="submit" id="mobile_submit" name="submit" class="btn btn-primary d-flex ms-auto ms-sm-0" style="box-shadow: 2px 2px 5px black;">Submit</button>
                  </div>
                    </div>
                  </div>
          </div>  
      </form>  -->
      <div class="col-12  mt-3 d-flex justify-content-start align-items-center">
        <a href="subscription_new.php">&lt;&lt;  Back</a>
      </div>
      <div class="col-12 mt-4" id="showmessage"></div>


        <div class="row  d-flex justify-content-center align-items-center mt-4 row-container" >
              <div class="col-12 mt-2 d-flex justify-content-between align-items-center pb-2" style="border-bottom:  2px solid black;" >
                <h4 class="m-0">Membership plans attached to customer -<span style="color: #b34949;" id="text_number"></span></h4><span> <button class="btn btn-warning expandbtn"  id="createplan" style="box-shadow: 2px 2px 5px black;white-space:nowrap;">Attach Plan +</button></span>
              </div>
              <div class="col-12 px-4 my-3 " id="expandplan" style="display: none;">

                  <div class="row">
                    <div class="col-12" style="background: white;border-radius: 10px;">
                                                  <div class="row my-3">
                                                    <div class="col-12 col-sm-11 mx-auto">
                                                    <ul class="nav nav-tabs d-flex flex-column flex-sm-row my-3" role="tablist">
                                                        <li role="presentation" class="active">
                                                          <a href="#plan1" aria-controls="plan1" role="tab" data-toggle="tab" class="d-flex  align-items-center">
                                                            <input type="radio" name="type" value="3" checked class="me-3 mt-0">
                                                            <label for="" class="m-0">Membership Discount</label>
                                                          </a>
                                                        </li>
                                                        <li role="presentation">
                                                          <a href="#plan2" aria-controls="plan2" role="tab" data-toggle="tab" class="d-flex  align-items-center">
                                                            <input type="radio" name="type" value="2" class="me-3 mt-0">
                                                            <label for="" class="m-0">Pay less Get more</label>
                                                          </a>
                                                        </li>
                                                        <li role="presentation">
                                                          <a href="#plan3" aria-controls="plan3" role="tab" data-toggle="tab" class="d-flex  align-items-center">
                                                            <input type="radio" name="type" value="4" class="me-3 mt-0">
                                                            <label for="" class="m-0">Package Plans</label>
                                                          </a>
                                                        </li>
                                                        <li role="presentation">
                                                          <a href="#plan4" aria-controls="plan4" role="tab" data-toggle="tab" class="d-flex  align-items-center">
                                                            <input type="radio" name="type" value="1" class="me-3 mt-0">
                                                            <label for="" class="m-0">Frequency Plan</label>
                                                          </a>
                                                        </li>
                                                  </ul>
                                      <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="plan1">
                                                  <div class="row my-3">
                                                    <div class="col-12 col-sm-11 mx-auto">
                                                                <div class="table-responsive">
                                                                <table id="discount_table" class="table table-striped table-hover">
                                                                    <thead>
                                                                      
                                                                      <tr>
                                                                      <th scope="col">#</th>
                                                                        <th scope="col">Name of Plan</th>
                                                                        <th scope="col">Price</th>
                                                                        <th scope="col">Validity (Days)</th>
                                                                        <th style="text-align:center;white-space:nowrap;">(%) discount on bill</th>
                                                                        <th scope="col">Creation Date</th>
                                                                        <th scope="col">Remarks</th>
                                                                        <th scope="col">Action</th>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    </tbody>
                                                                  </table>
                                                                
                                                              </div>
                                                    </div>
                                                  </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="plan2">
                                                    <div class="row my-3">
                                                    <div class="col-12 col-sm-11 mx-auto">
                                                                <div class="table-responsive">
                                                                <table id="servicevalue_table" class="table table-striped table-hover">
                                                                      <thead>
                                                                        
                                                                        <tr>
                                                                          <th scope="col">#</th>
                                                                          <th scope="col">Name of Plan</th>
                                                                          <th scope="col">Price</th>
                                                                          <th scope="col">Validity (Days)</th>
                                                                          <th style="text-align:center;white-space:nowrap;">Service Value (Rs)</th>
                                                                          <th scope="col">Creation Date</th>
                                                                          <th scope="col">Remarks</th>
                                                                          <th scope="col">Action</th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                      </tbody>
                                                                    </table>
                                                              </div>
                                                    </div>
                                                  </div>
                                        </div>
                                            <div role="tabpanel" class="tab-pane" id="plan3">
                                                        <div class="row my-3">
                                                            <div class="col-12 col-sm-11 mx-auto">
                                                                        <div class="table-responsive">
                                                                          <table  id="package_table" class="table table-striped table-hover">
                                                                            <thead>
                                                                              
                                                                              <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Name of Plan</th>
                                                                                <th scope="col">Price</th>
                                                                                <th scope="col">Validity (Days)</th>
                                                                                <th style="text-align:center;white-space:nowrap;">Package (Item 1 + Item 2 + ....)</th>
                                                                                <th scope="col">Creation Date</th>
                                                                                <th scope="col">Remarks</th>
                                                                                <th scope="col">Action</th>
                                                                              </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            </tbody>
                                                                          </table>

                                                                      </div>
                                                            </div>
                                                      </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="plan4">
                                                        <div class="row my-3">
                                                            <div class="col-12 col-sm-11 mx-auto">
                                                                        <div class="table-responsive">
                                                                          <table id="fequency_table" class="table table-striped table-hover">
                                                                            <thead>
                                                                              
                                                                              <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Name of Plan</th>
                                                                                <th scope="col">Price</th>
                                                                                <th scope="col">Validity (Days)</th>
                                                                                <th style="text-align:center;white-space:nowrap;">Visits</th>
                                                                                <th scope="col">Creation Date</th>
                                                                                <th scope="col">Remarks</th>
                                                                                <th scope="col">Action</th>
                                                                              </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            </tbody>
                                                                          </table>

                                                                      </div>
                                                            </div>
                                                      </div>
                                            </div>
                                      </div>
                                                    </div>
                                                  </div>
                    </div>
                  </div>





              </div>
              <div class="col-12 mt-3">
                <div class="table-responsive">
                      <table id="attached_plan_table" class="table table-striped table-hover">
                      <thead>
                        
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Type of Plan</th>
                          <th scope="col">Name of Plan</th>
                          <th scope="col">Valid / Expired</th>
                          <th scope="col" class="white-space:nowrap;">Valid Till (Date)</th>
                          <th scope="col">Plan Detail</th>
                          <th scope="col">History</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="attached_plan_table_body">
                      </tbody>
                    </table>
                </div>
              </div>
        </div>      
    </div>
</div>
    
</div>

    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>

    <script>
    // document.querySelector("#identificationnumber").addEventListener("input",(e)=>{
    //     if(e.target.value.match(/[^a-z ^0-9]/gi)){
    //             e.target.value = e.target.value.replace(/[^a-z ^0-9]/gi,'');
    //     }
    //     console.log("input");
    // });


        function formatdetail ( id ) {
            var div = $('<div/>')
            .addClass( 'loading slider' )
            .text( 'Loading...' );
    
            $.ajax( {
                url: 'get_and_submit_plan.php',
                data: {
                    detail : "detail",
                    id: id
                },
                dataType: 'html',
                success: function ( html ) {
                    console.log(html);
                    div
                        .html( html)
                        .removeClass( 'loading' );
                }
            } );
    
        return div;
        }

      function format (  sub_id, cust_id, type) {
            var div = $('<div/>')
            .addClass( 'loading slider' )
            .text( 'Loading...' );
    
            $.ajax( {
                url: 'get_and_submit_plan.php',
                data: {
                    customer_plan_detail : "customer_plan_detail",
                    customer_id: cust_id,
                    Subcription_Child_Id: sub_id,
                    type: type
                },
                dataType: 'html',
                success: function ( html ) {
                    console.log(html);
                    div
                        .html( html)
                        .removeClass( 'loading' );
                }
            } );
    
            return div;
      }

      function formatexec ( type, sub_id,sub_child_id, cust_id,cust_info_id,price,visits,serval,packageitems) {
            var div = $('<div/>')
            .addClass( 'loading slider' )
            .text( 'Loading...' );
    
            $.ajax( {
                url: 'get_and_submit_plan.php',
                data: {
                    customer_plan_execution : "yes",
                    type : type,
                    customer_id : cust_id,
                    customer_info_id : cust_info_id,
                    subscription_id : sub_id,
                    subscription_child_id : sub_child_id,
                    price : price,
                    visits : visits,
                    serval : serval,
                    packageitems : packageitems
                },
                dataType: 'html',
                success: function ( html ) {
                    console.log(html);
                    div
                        .html( html)
                        .removeClass( 'loading' );
                }
            } );
    
            return div;
      }


    var attached_plan_table='';
    var fequency_table='';
    var servicevalue_table='';
    var discount_table='';
    var package_table='';
    var number = "";
    var executebtn = 0;
    var executebtnid = 0;

    $(document).ready(function () {

      attached_plan_table = $('#attached_plan_table').DataTable({
                  "dom":"<'row w-100'<'col-12't>>",
                  "paging": false,
                  "autoWidth": false,
                  "processing" : true,
                  "ajax" : {
                  url: 'get_and_submit_plan.php',
                  type:"POST",
                  data: {
                      attached : "plan",
                      customer_number: function(){
                        number =  <?php  if(isset($_POST["mobile"])){ echo "'".$_POST['mobile']."';";}else{ echo "'';";} ?>
                        <?php   
                        if(isset($_POST["mobile"])){
                            echo "return '".$_POST['mobile']."' ;";
                        }
                        ?>
                        return ;
                      }
                  }
                  },
                  columns: [
                      { data: 'sno' },
                      { data: 'plantype' },
                      { data: 'planname' },
                      { data: 'status' },
                      { data: 'valid_date' },
                      {
                          className: 'details-control-detail',
                          orderable: false,
                          data: 'detail',
                          defaultContent: '',
                      },
                      {
                          className: 'details-control',
                          orderable: false,
                          data: 'history',
                          defaultContent: '',
                      },
                      {
                          className: 'details-control-execute',
                          orderable: false,
                          data: 'action',
                          defaultContent: '',
                      }
                  ],
                  'columnDefs': [        
                      {
                              'targets': '_all',
                              'createdCell':  function (td, cellData, rowData, row, col) {
                                  $(td).attr('style', "text-align: center;vertical-align:middle;" ); 
                              }
                      }
                  ],
                
                  order: [[0, 'asc']],
                  
                  "initComplete":function( settings, json){
                    document.querySelector("#text_number").innerText = number;
                    console.log(json);

                    if(json.message == "1"){

                      document.querySelector("#showmessage").innerHTML = `<div class="alert alert-danger" role="alert">
                                                            Customer isn't register! <a href="registration_new.php" class="alert-link">Click here</a> for register customer
                                                          </div>`;
                    }else if(json.message == "-1"){

                      document.querySelector("#showmessage").innerHTML = `<div class="alert alert-danger" role="alert">
                                                            Something went wrong
                                                          </div>`;
                    }



                  },
                  "drawCallback": function( settings) {
                    if(executebtn)
                    {
                      document.querySelector("button[data-subchildid='"+executebtnid+"']").click();
                      executebtn = 0;
                    }
                  }

              });


              $('#attached_plan_table_body').on('click', 'td.details-control-detail', function (event) {
                    var tr = $(this).closest('tr');
                    var row = attached_plan_table.row( tr );
                    console.log("row id"+ $(this).children('button').attr("id"));
                
                    if ( row.child.isShown() ) {
                            // This row is already open - close it
                            $('div.slider', row.child()).slideUp( function () {
                                row.child.hide();
                                tr.removeClass('shown');
                                
                              } );
                        }
                        else {
                            // Open this row
                            row.child( formatdetail($(this).children('button').attr("id")) ).show();
                            tr.addClass('shown');
                            // $('div.slider', row.child()).fadeIn();
                            
                        }
              } );


              $('#attached_plan_table_body').on('click', 'td.details-control', function (event) {
                  var tr = $(this).closest('tr');
                  var row = attached_plan_table.row( tr );
                  console.log("sub id"+ $(this).children('button').attr("id"));
                  console.log("cust id"+ $(this).children('button').attr("data-id"));
                  console.log("type "+ $(this).children('button').attr("data-type"));
              
                  if ( row.child.isShown() ) {
                          // This row is already open - close it
                          $('div.slider', row.child()).slideUp( function () {
                              row.child.hide();
                              tr.removeClass('shown');
                              
                            } );
                      }
                      else {
                          // Open this row
                          row.child( format($(this).children('button').attr("id"), $(this).children('button').attr("data-id"), $(this).children('button').attr("data-type")) ).show();
                          tr.addClass('shown');
                          // $('div.slider', row.child()).fadeIn();
                          
                      }
              } );

              $('#attached_plan_table_body').on('click', 'td.details-control-execute', function (event) {
                  var tr = $(this).closest('tr');
                  var row = attached_plan_table.row( tr );
                  // console.log("sub id"+ $(this).children('a').attr("id"));
                  // console.log("cust id"+ $(this).children('a').attr("data-id"));
                  // console.log("type "+ $(this).children('a').attr("data-type"));
              
                  if ( row.child.isShown() ) {
                          // This row is already open - close it
                          $('div.slider', row.child()).slideUp( function () {
                              row.child.hide();
                              tr.removeClass('shown');
                              
                            } );
                      }
                      else {
                          // Open this row
                          row.child( formatexec($(this).children('button').attr("data-type"),$(this).children('button').attr("data-subid"),$(this).children('button').attr("data-subchildid"),$(this).children('button').attr("data-custid"),$(this).children('button').attr("data-custinfoid"),$(this).children('button').attr("data-price"),$(this).children('button').attr("data-visits"),$(this).children('button').attr("data-serval"),$(this).children('button').attr("data-packageitems"))).show();
                          tr.addClass('shown');
                          // $('div.slider', row.child()).fadeIn();
                          
                      }
              } );




      





              fequency_table = $('#fequency_table').DataTable({
                  "dom":"<'row w-100'<'col-12't>>",
                  "paging": false,
                  "autoWidth": false,
                  "processing" : true,
                  "ajax" : {
                  url: 'get_and_submit_plan.php',
                  type:"POST",
                  data: {
                      fetch_plan: "customer",
                      type: "1"
                      }
                  },
                  columns: [
                      { data: 'sno' },
                      { data: 'planname' },
                      { data: 'price' },
                      { data: 'validity' },
                      { data: 'visits' },
                      { data: 'creationdate' },
                      { data: 'remarks' },
                      { data: 'action' }
                  ],
                  'columnDefs': [        
                      {
                              'targets': '_all',
                              'createdCell':  function (td, cellData, rowData, row, col) {
                                  $(td).attr('style', "text-align: center;vertical-align:middle;" ); 
                              }
                      }
                  ],
                
                  order: [[0, 'asc']],
                  
                  "initComplete":function( settings, json){

                  },
                  "drawCallback": function( settings) {

                  }

              });


              servicevalue_table = $('#servicevalue_table').DataTable({
                  "dom":"<'row w-100'<'col-12't>>",
                  "paging": false,
                  "autoWidth": false,
                  "processing" : true,
                  "ajax" : {
                  url: 'get_and_submit_plan.php',
                  type:"POST",
                  data: {
                      fetch_plan: "customer",
                      type: "2"
                      }
                  },
                  columns: [
                      { data: 'sno' },
                      { data: 'planname' },
                      { data: 'price' },
                      { data: 'validity' },
                      { data: 'servicevalue' },
                      { data: 'creationdate' },
                      { data: 'remarks' },
                      { data: 'action' }
                  ],
                  'columnDefs': [        
                      {
                              'targets': '_all',
                              'createdCell':  function (td, cellData, rowData, row, col) {
                                  $(td).attr('style', "text-align: center;vertical-align:middle;" ); 
                              }
                      }
                  ],
                
                  order: [[0, 'asc']],
                  
                  "initComplete":function( settings, json){

                  },
                  "drawCallback": function( settings) {

                  }

              });

              discount_table = $('#discount_table').DataTable({
                  "dom":"<'row w-100'<'col-12't>>",
                  "paging": false,
                  "autoWidth": false,
                  "processing" : true,
                  "ajax" : {
                  url: 'get_and_submit_plan.php',
                  type:"POST",
                  data: {
                      fetch_plan: "customer",
                      type: "3"
                      }
                  },
                  columns: [
                      { data: 'sno' },
                      { data: 'planname' },
                      { data: 'price' },
                      { data: 'validity' },
                      { data: 'discount' },
                      { data: 'creationdate' },
                      { data: 'remarks' },
                      { data: 'action' }
                  ],
                  'columnDefs': [        
                      {
                              'targets': '_all',
                              'createdCell':  function (td, cellData, rowData, row, col) {
                                  $(td).attr('style', "text-align: center;vertical-align:middle;" ); 
                              }
                      }
                  ],
                
                  order: [[0, 'asc']],
                  
                  "initComplete":function( settings, json){

                  },
                  "drawCallback": function( settings) {

                  }

              });


              package_table = $('#package_table').DataTable({
                  "dom":"<'row w-100'<'col-12't>>",
                  "paging": false,
                  "autoWidth": false,
                  "processing" : true,
                  "ajax" : {
                  url: 'get_and_submit_plan.php',
                  type:"POST",
                  data: {
                      fetch_plan: "customer",
                      type: "4"
                      }
                  },
                  columns: [
                      { data: 'sno' },
                      { data: 'planname' },
                      { data: 'price' },
                      { data: 'validity' },
                      { data: 'package' },
                      { data: 'creationdate' },
                      { data: 'remarks' },
                      { data: 'action' }
                  ],
                  'columnDefs': [        
                      {
                              'targets': '_all',
                              'createdCell':  function (td, cellData, rowData, row, col) {
                                  $(td).attr('style', "text-align: center;vertical-align:middle;" ); 
                              }
                      }
                  ],
                
                  order: [[0, 'asc']],
                  
                  "initComplete":function( settings, json){

                  },
                  "drawCallback": function( settings) {

                  }

              });


           



    });


    function attachPlan(e,type,subscription_id){
 console.log("click on attach");
e.target.innerHTML = ` <div class="spinner-border text-white" role="status">
  <span class="visually-hidden">Loading...</span>
</div>`;
        $.ajax({    
              type: "POST",
              url: "get_and_submit_plan.php",  
              data: {
                plan_attach: "attach",
                subscription_id : subscription_id,
                customer_id: function(){
                        number =  <?php  if(isset($_POST["mobile"])){ echo "'".$_POST['mobile']."';";}else{ echo "'';";} ?>
                        <?php   
                        if(isset($_POST["mobile"])){
                            echo "return '".$_POST['mobile']."' ;";
                        }
                        ?>
                        return '';
                      }             
              },
              dataType: "json",
              success: function(data){     
                e.target.innerHTML = "Attach";  
                   if(data.error == '0') {
                    document.querySelector("#showmessage").innerHTML = `<div class="alert alert-success" role="alert">
                                                                        Plan Attached Successfully
                                                                    </div>`;
                  } else  if(data.error == '1') {
                    document.querySelector("#showmessage").innerHTML = `<div class="alert alert-danger" role="alert">
                                                            Customer isn't register! <a href='registration_new.php' class='alert-link'>Click here</a> for register customer
                                                          </div>`;
                  } else  if(data.error == '2') {
                    document.querySelector("#showmessage").innerHTML = `<div class="alert alert-danger" role="alert">
                                                            Something went wrong
                                                          </div>`;
                  }
                  setTimeout(() => {document.querySelector("#showmessage").innerHTML = "";}, 4000);
                  attached_plan_table.ajax.reload();


               
              }
       });

}
   
function executePlan(e,type,sub_id,sub_child_id,cust_id,cust_info_id,price,visits,serval,packageitems){


      console.log("click on execute submit");

      e.target.innerHTML = ` <div class="spinner-border text-white" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>`;


      amount = '';
      remark = '';

      packvisits = '0';
      packserval = '0';
      packpackageitems = '';

    amount = $("input[data-paid='"+sub_child_id+"']").val();

  if(type == 1)
  {
    if(document.querySelector("input[data-packagevisits='"+sub_child_id+"']").checked)
        packvisits = '1';

  }else if(type == 2)
  {
    packserval = $("input[data-packagepaid='"+sub_child_id+"']").val();

  }else if(type == 4)
  {
    packpackageitems = [...document.querySelectorAll("input[name='packageitems"+sub_child_id+"']:checked")].map(element=>element.value).join(",");
  }

remark = $("textarea[data-remark='"+sub_child_id+"']").val();


        $.ajax({    
              type: "POST",
              url: "get_and_submit_plan.php",  
              data: {
                execute: "package_price",
                customer_id: cust_id,
                customer_info_id: cust_info_id,
                subcription_id: sub_id,
                subcription_child_id: sub_child_id,
                amount: amount,
                remark: remark ,
                packvisits: packvisits ,
                packserval: packserval ,
                packpackageitems: packpackageitems          
              },
              dataType: "json",
              success: function(data){     
                e.target.innerHTML = "Submit";  

                  executebtnid = sub_child_id;
                  executebtn = 1;
                  attached_plan_table.ajax.reload();

                  if(data.error == '0') {
                    alert("Transaction Done Successfully");
                  } else  if(data.error == '1') {
                    alert("Something went wrong");
                  }
              }
       });

}

      document.querySelector("#createplan").addEventListener("click",(e)=>{
          if(e.target.classList.contains("expandbtn"))
          {
            $("#expandplan input[type='text']").val("");
            console.log("expandbtn");
            e.target.classList.toggle("expandbtn");
            e.target.innerHTML = "Hide box -";
            $( "#expandplan" ).slideDown( 300 );
          }else{
            console.log("no expandbtn");
            e.target.classList.toggle("expandbtn");
            e.target.innerHTML = "Attach  Plan +";
            $( "#expandplan" ).slideUp(300);
          }


      });

      function toggleArrow(e,subid){
        

        if(e.target.classList.contains("btncss"))
        {
          e.target.classList.remove("btncss");
        }else{
          if([...document.querySelectorAll("button[name='btn-group-"+subid+"']")].some(element=>element.classList.contains("btncss")))
            document.querySelectorAll("button[name='btn-group-"+subid+"']").forEach(element=>{
                                                                                if(element.classList.contains("btncss"))
                                                                                    element.classList.remove("btncss");
                                                                              }
                                                                            );
          else{
            e.target.classList.add("btncss");
          }

        }

    }

      $(function () {


          $('.nav-tabs').on('click', 'a[role=tab] input[type=radio]', function(event) {
              event.stopPropagation();
              $(this).parent().tab('show');
          });
          $('.nav-tabs').on('show.bs.tab', 'a[role=tab]', function() {
              $(this).find('input[type=radio]').prop('checked', true);
          });

      }); 




    </script>
   
  </body>
</html>