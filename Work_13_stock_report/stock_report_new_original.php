<?php 
session_start();
require("config.inc.php");
$Retailer_Id = $_SESSION['Retailer_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Retail Management System</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

	<style>
	            body {margin:0;font-family:Arial}
            .topnav{
                  overflow: hidden;
                  background:#f09022;
                  margin: -8px;
            }
            .topnav a{
                  float: left;
                  display: block;
                  color: #f2f2f2;
                  text-align: center;
                  padding: 14px 16px;
                  text-decoration: none;
                  font-size:20px;
            }
            .topnav a:hover{
                  background-color:#f96a0b;
                  color: white;
                  text-decoration:none;
            }
            .main{
                  width:100%;
            }
            .column1{
                  width:70%;
                  float:left;
                  margin-top:2%;
                  }
            .column2{
                  width:30%;
                  float:left;
            }
            .column3{
                  width:10%;
                  float:left;
            }
            .column4{
                  width:70%;
                  float:left;
                  }
            .form-col1{
              width:40%;
              float:left;
            }
            .form-col2{
             width:15%;
             float:left;
            }
            .table-main{
              margin-left:5%;
              margin-right:2%;
            }
     .upload-text{
            font-size:20px;
            text-align:center;
            color:black;
            padding-top:2%;
      }
       .button-main{
            margin-left:2%;
            margin-right:10%;
            font-size:18px;
            float:left;
       }
    .radio-lable{
      padding-right:10px;
     }
       .button{
            border: none;
            color: white;
            padding: 7px 35px;
            border-radius:10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            cursor: pointer;
       }
       .btn-add{
            background-color:#203864;
            margin-top:15px;
            margin-left:10px;
       }
       .btn-category{
            background-color:#006600;
            margin-top:10px;
            margin-left:35%;
        }
       .btn-submit{
            background-color:#006600;
            margin-top:1%;
            margin-left:35%;
            }
        /* .vl {
            position: absolute;
            top:15%;
            left:31%; 
            transform: translate(-50%);
            border: 2px solid black;
            height: 150px;
        } */
       .btn-upload{
            background-color:#203864;
            margin-top:10px;
            margin-bottom:3%;
            margin-inline: auto;
       }
       .button:hover{
            background-color:#ff9900;
            color:#fff;
       }
       
       .form-container{
            margin-left:1%;
            margin-right:2%;
       }
    .form-textbox{
            margin-top:3px;
            margin-left:20px;
            width:85%;
            height:40px;
            border:none;
            border-bottom:2px solid black;
            text-align:center;
            font-size:18px;
      }
   .select{
            margin-top:10px;
            margin-left:7%;
            width:90%;
            height:35px;
            border:none;
            border-bottom:2px solid black;
            text-align:center;
            font-size:18px;
            color:black;
       }
       .category{
            width:90%;
       }
      .form-textbox-small{
            width:100px;
      }
      .upload-box{
            width:250px;
            background:#d1d1d1;
            margin-top:2%;
            color:black;
            border:none;
            outline:none;
            font-size:16px;
            border-radius:50px 20px 20px 50px;
            margin-inline:auto;
      }
      ::-webkit-file-upload-button{
            border:none;
            background:#0099ff;
            border-radius:50%;
            height:60px;
            width:60px;
            color:white;
            font-size:16px;
      }
      .newwidthcategory{
        width:50%;
      }
      @media (max-width: 600px) {
        
            .column3,.column4,.form-col1{
                  float:none;
                  margin:none;
                  width:100%;
            }
            .column1{
                  float:none;
                  margin:none;
                  width:100%;
                  height:50px;
                  display:flex;
                  align-items: center;
                  margin-top: 20px;
            }
            .column2{
                  float:none;
                  margin:none;
                  width:100%;
            }
            .form-col1{
              margin-top:10px;
            }
            .form-col2{
              margin:none;
              margin-top:10px;
              width:100%;
            }
             .category{
            margin-left:none;
            width:70%;
          }
          .vl {
            display:none;
        }
      .newwidthcategory{
        width:100%;
        margin-left: 0 !important;
      }
      }


        @media screen and (max-width: 800px) {
          
          #subCategoryForm{
            display:flex;
            overflow-x:scroll;
          }
          
        }


      label{
        white-space:nowrap;
      }

      .input-sm{
        width: 90px !important;
      }
      input[type='search']{
        width: 120px !important;
        margin-right:15px !important;
      }
      .btncss{
        box-shadow: 3px 3px 2px  black !important;
      }

      select[name='stock_table_length']{
        padding: 0 0 0px 31px;
      }
      div.slider {
    /* display: none; */
    background-color: #c1c1c1 !important;
  }
  .shown{
  background-color: #c1c1c1 !important;
}
table.dataTable tbody td.no-padding {
    padding: 0 !important;
}
.panel-heading {
    font-size: 2rem;
    font-weight: bold;
    border-bottom: 2px solid black !important;
}
td[colspan="7"]{
  background: lightgrey;
  padding: 0 !important;
}
#date{
  display: flex;
  justify-content: space-around;
}
</style>

    </head>
<body>
<?php

      include "navbar.php";

?>


  <section class="home-section">
    <div class="row mb-5">
      <div class="col">
      <header class="topnav">
  <a href="dashbord.php" style="margin-left:55px;">Home</a>
</header>
      </div>
    </div>
 <div class="row">
   <div class="col">
   <form id="frontendEditor" class="col-sm-8 col-sm-offset-2">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a href="#home" aria-controls="home" role="tab" data-toggle="tab" class="d-flex justify-content-between align-items-center">
        <input type="radio" name="type" value="status" checked class="me-3 mt-0">
        <label for="" class="m-0">Most selling products</label>
      </a>
    </li>
    <li role="presentation">
      <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" class="d-flex justify-content-between align-items-center">
        <input type="radio" name="type" value="status" class="me-3 mt-0">
        <label for="" class="m-0">Damaged products</label>
      </a>
    </li>
    <li role="presentation">
      <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" class="d-flex justify-content-between align-items-center">
        <input type="radio" name="type" value="status" class="me-3 mt-0">
        <label for="" class="m-0">Internal Use products</label>
      </a>
    </li>
    <li role="presentation">
      <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" class="d-flex justify-content-between align-items-center">
        <input type="radio" name="type" value="status" class="me-3 mt-0">
        <label for="" class="m-0">Expired products</label>
      </a>
    </li>
  </ul>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
              <div class="row my-3">
                <div class="col-12 col-sm-8 mx-auto">
                            <div class="table-responsive">
                            <table id="mostsellingtable" class="table table-bordered table-hover table-striped">
                            <thead>
                              <tr>
                                      <th style="width: 30px;text-align:center;">S.No.</th>
                                      <th style="width: 30px;text-align:center;">Id</th>
                                      <th style="text-align:center;">Product</th>
                                      <th style="white-space: nowrap;text-align:center;">Sub Product</th>
                                      <th style="width: 100px;text-align:center;white-space: nowrap;">Invoice Deduction Count</th>
                            </tr>
                            </thead>
                            <tbody id=""></tbody>
                            </table>
                            <div class="d-flex justify-content-end text-primary fw-bold" ><span style="cursor: pointer;">show more</span></div>
                          </div>
                </div>
              </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
                <div class="row my-3">
                <div class="col-12 col-sm-8 mx-auto">
                            <div class="table-responsive">
                            <table id="mostdamagedtable" class="table table-bordered table-hover table-striped">
                            <thead>
                              <tr>
                                      <th style="width: 30px;text-align:center;">S.No.</th>
                                      <th style="width: 30px;text-align:center;">Id</th>
                                      <th style="text-align:center;">Product</th>
                                      <th style="white-space: nowrap;text-align:center;">Sub Product</th>
                                      <th style="width: 100px;text-align:center;white-space: nowrap;">Damaged</th>
                            </tr>
                            </thead>
                            <tbody id=""></tbody>
                            </table>
                            <div class="d-flex justify-content-end text-primary fw-bold" ><span style="cursor: pointer;">show more</span></div>
                          </div>
                </div>
              </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
                <div class="row my-3">
                <div class="col-12 col-sm-8 mx-auto">
                            <div class="table-responsive">
                            <table id="internaltable" class="table table-bordered table-hover table-striped">
                            <thead>
                              <tr>
                                      <th style="width: 30px;text-align:center;">S.No.</th>
                                      <th style="width: 30px;text-align:center;">Id</th>
                                      <th style="text-align:center;">Product</th>
                                      <th style="white-space: nowrap;text-align:center;">Sub Product</th>
                                      <th style="width: 100px;text-align:center;white-space: nowrap;">Internal used</th>
                            </tr>
                            </thead>
                            <tbody id=""></tbody>
                            </table>
                            <div class="d-flex justify-content-end text-primary fw-bold" ><span style="cursor: pointer;">show more</span></div>

                          </div>
                </div>
              </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
                <div class="row my-3">
                <div class="col-12 col-sm-8 mx-auto">
                            <div class="table-responsive">
                            <table id="expiredtable" class="table table-bordered table-hover table-striped">
                            <thead>
                              <tr>
                                      <th style="width: 30px;text-align:center;">S.No.</th>
                                      <th style="width: 30px;text-align:center;">Id</th>
                                      <th style="text-align:center;">Product</th>
                                      <th style="white-space: nowrap;text-align:center;">Sub Product</th>
                                      <th style="width: 100px;text-align:center;white-space: nowrap;">Expired</th>
                            </tr>
                            </thead>
                            <tbody id=""></tbody>
                            </table>
                            <div class="d-flex justify-content-end text-primary fw-bold" ><span style="cursor: pointer;">show more</span></div>

                          </div>
                </div>
              </div>
    </div>
  </div>
</form>
   </div>
 </div>
  <div class="table-main">
  <div class="col-sm-11 mt-5 mt-sm-2">
  <br>
  <div class="panel panel-default">
    <div class="panel-heading">Stock Change Report</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="stock_table" class="table table-bordered table-hover">
       <thead>
        <tr>
                <th style="width: 30px;text-align:center;">S.No.</th>
                <th style="width: 30px;text-align:center;">Id</th>
                <th style="text-align:center;">Product</th>
                <th style="white-space: nowrap;text-align:center;">Sub Product</th>
                <th style="width: 100px;text-align:center;">Net Change</th>
                <th style="width: 100px;text-align:center;">Current Stock</th>
                <th style="width: 50px;text-align:center;">Detail</th>
       </tr>
       </thead>
       <tbody id="stock_report_body"></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  </div>
	</div>
  </section>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
<script> 

function format ( rowData ) {
    var div = $('<div/>')
        .addClass( 'loading slider' )
        .text( 'Loading...' );
 
    $.ajax( {
        url: 'item_report.php',
        data: {
            id: rowData.id
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
var firsttimeload = 1;
$(document).ready(function () {
    var table = $('#stock_table').DataTable({




        "processing" : true,
        "dom": "<'row'<'col-12 col-sm-auto me-5'l><'col-auto text-nowrap'<'#year'>><'col text-nowrap'<'#month'>><'col'<'#date'>><'col d-flex justify-content-center align-items-center'<'#submit'>><'col-12 col-md-auto my-4 my-md-0'f>>" +
             "<'row'<'col-sm-12't>>" +
             "<'row'<'col-sm-6'i><'col-sm-6'p>>",
        "ajax" : {
        url: 'fetch_stock_report.php',
        type:"POST",
        data: {
            stock: "stock"
            data: {
            stock: "stock",
            startdate: function(){
              if(firsttimeload == 1)
              {
                  return new Date(new Date().getFullYear(),new Date().getMonth(),01).toLocaleDateString("en-GB", { // you can use undefined as first argument
                                                      year: "numeric",
                                                      month: "2-digit",
                                                      day: "2-digit", 
                                                      }).split('/').reverse().join('-');
              }

                                if(document.querySelector("#selectdate").checked)
                                {
                                            startdate.value = '';
                                              var derivedYear = Number((document.querySelector("#selectyear").value).trim());

                                          var derivedMonth = Number((document.querySelector("#selectmonth").value).trim());

                                          startFullDate = new Date(derivedYear, derivedMonth,01);
                                          startFullDate = startFullDate.toLocaleDateString("en-GB", { // you can use undefined as first argument
                                                      year: "numeric",
                                                      month: "2-digit",
                                                      day: "2-digit", 
                                                      });

                                          startFullDate = startFullDate.split('/').reverse().join('-');
                                          return startFullDate;
                                }else{ 

                                  if(startdate.value != '')
                                  return startdate.value;
                                  else
                                  return 2;
                                }
              
              return  2;
            },
            enddate: function(){
              if(firsttimeload == 1)
              {
                  return new Date(new Date().getFullYear(),new Date().getMonth()+1,0).toLocaleDateString("en-GB", { // you can use undefined as first argument
                                                      year: "numeric",
                                                      month: "2-digit",
                                                      day: "2-digit", 
                                                      }).split('/').reverse().join('-');
              }

                                if(document.querySelector("#selectdate").checked)
                                {
                                            // startdate.value = '';
                                            enddate.value = '';
                                              var derivedYear = Number((document.querySelector("#selectyear").value).trim());

                                          var derivedMonth = Number((document.querySelector("#selectmonth").value).trim());
                                          endFullDate = new Date(derivedYear, derivedMonth + 1,0);
                                          endFullDate = endFullDate.toLocaleDateString("en-GB", { // you can use undefined as first argument
                                                      year: "numeric",
                                                      month: "2-digit",
                                                      day: "2-digit", 
                                                      });
                                          endFullDate = endFullDate.split('/').reverse().join('-');
                                          return endFullDate;
                                }else{
                                  if(enddate.value != '')
                                  return enddate.value;
                                  else
                                  return 2;
                                }
              
              return  2;
            }
            }
        },
        columns: [
            { data: 'sno' },
            { data: 'id' },
            { data: 'category' },
            { data: 'subcategory' },
            { data: 'netchange' },
            { data: 'stock' },
            {
                className: 'details-control',
                orderable: false,
                data: 'click',
                defaultContent: '',
            }

        ],
        'columnDefs': [ 
            
            {
                "target": 6,
                "orderable" : false,
                "searchable": false,
            },
            {
                    'targets': '_all',
                    'createdCell':  function (td, cellData, rowData, row, col) {
                        $(td).attr('style', "text-align: center;vertical-align:middle;" ); 
                    }
            }
        ],
        order: [[4, 'asc']],
        "initComplete":function( settings, json){
                  document.querySelector("#year").innerHTML = `<input type="radio" id="selectdate" name="date" checked class=""/>
                  Year 
                                                                  <select style="width: 100px !important;" id="selectyear" class="form-control">
                                                                    <option value="2022">2022</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>

                                                                  </select>`;


                  document.querySelector("#month").innerHTML = `Month 
                                                                <select style="width: 100px !important;" id="selectmonth" class="form-control">
                                                                  <option value="0">January</option>
                                                                  <option value="1">February</option>
                                                                  <option value="2">March</option>
                                                                  <option value="3">April</option>
                                                                  <option value="4">May</option>
                                                                  <option value="5">June</option>
                                                                  <option value="6">July</option>
                                                                  <option value="7">August</option>
                                                                  <option value="8">September</option>
                                                                  <option value="9">October</option>
                                                                  <option value="10">November</option>
                                                                  <option value="11">December</option>
                                                                </select>`;


                  document.querySelector("#date").innerHTML = `<input type="radio" id="rangedate" name="date" class="mx-auto mt-3 me-4"/><div class="d-flex justify-content-between"> <label> From <input type="date" id="startdate" style="width: 127px !important;" class="form-control"></label> - 
                                                                <label>To <input type="date" id="enddate" style="width: 127px !important;" class="form-control"></label></div>`;

                  document.querySelector("#submit").innerHTML = `<button type="button" id="submitbtn" class="btn btn-warning btn-sm mx-auto" style="height:  30px  !important;">Submit</button>`;


                  document.querySelector("#submitbtn").addEventListener('click',()=>{
                    console.log("click");
                    table.ajax.reload();
                  });


                }
    });

    $('#stock_report_body').on('click', 'td.details-control', function (event) {
    var tr = $(this).closest('tr');
    var row = table.row( tr );
    console.log("row id"+ row.data().id);
 
    if ( row.child.isShown() ) {
            // This row is already open - close it
            $('div.slider', row.child()).slideUp( function () {
                row.child.hide();
                tr.removeClass('shown');
                
              } );
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
            // $('div.slider', row.child()).fadeIn();
            
        }
} );


$('#mostsellingtable').DataTable({
"processing" : true,
  "dom": "<'row'<'col-sm-12't>>",
"ajax" : {
url: 'fetch_stock_report.php',
type:"POST",
data: {
    selling: "selling"
    }
},
columns: [
    { data: 'sno' },
    { data: 'id' },
    { data: 'category' },
    { data: 'subcategory' },
    { data: 'stock' }

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
});



$('#mostdamagedtable').DataTable({
"processing" : true,
  "dom": "<'row'<'col-sm-12't>>",
"ajax" : {
url: 'fetch_stock_report.php',
type:"POST",
data: {
    damaged: "damaged"
    }
},
columns: [
    { data: 'sno' },
    { data: 'id' },
    { data: 'category' },
    { data: 'subcategory' },
    { data: 'stock' }

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
});




$('#internaltable').DataTable({
"processing" : true,
  "dom": "<'row'<'col-sm-12't>>",
"ajax" : {
url: 'fetch_stock_report.php',
type:"POST",
data: {
    internal: "internal"
    }
},
columns: [
    { data: 'sno' },
    { data: 'id' },
    { data: 'category' },
    { data: 'subcategory' },
    { data: 'stock' }

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
});



$('#expiredtable').DataTable({
"processing" : true,
  "dom": "<'row'<'col-sm-12't>>",
"ajax" : {
url: 'fetch_stock_report.php',
type:"POST",
data: {
    expired: "expired"
    }
},
columns: [
    { data: 'sno' },
    { data: 'id' },
    { data: 'category' },
    { data: 'subcategory' },
    { data: 'stock' }

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
});













});
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
