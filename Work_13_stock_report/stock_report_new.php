<?php 
// session_start();
// require("config.inc.php");
// $Retailer_Id = $_SESSION['Retailer_id'];
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
                  background:linear-gradient(to right, #000066 0%, #3333ff 41%);
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

.toggle-btn {
  position: relative;
  display: inline-block;
  /* background: #3890b3; */
  /* color: white; */
  background: #6b93d1;
  color: white;
  /* width: 89px; */
  width: 100%;
  padding:10px;
  text-decoration: none !important;
  margin-bottom: 5px;
  font-weight: bold;
}
.toggle-btn:visited{
    color: white !important;
}
</style>

    </head>
<body>
<?php

    //   include "navbar.php";

?>


  <section class="home-section">
    <div class="row mb-5">
      <div class="col">
      <header class="topnav">
  <a href="index.php">Home</a>
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
                            <tbody id="sellingbody"></tbody>
                            </table>
                            
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
                            <tbody id="damagedbody"></tbody>
                            </table>
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
                            <tbody id="internalbody"></tbody>
                            </table>

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
                            <tbody id="expiredbody"></tbody>
                            </table>

                          </div>
                </div>
              </div>
    </div>
  </div>
</form>
   </div>
 </div>
  <div class="table-main">
  <div class="col-sm-11 mt-5 mt-sm-2 px-0">
  <br>
  <div class="panel panel-default">
    <div class="panel-heading">Stock Report</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="stock_table" class="table table-bordered table-hover">
       <thead>
         <!-- <tr>
           <th> Year 
           <select  id="" class="form-control">
             <option value="2022">2022</option>
             <option value="2021">2021</option>
             <option value="2020">2020</option>
           </select>

           </th>
           
           <th> Month 
           <select  id="" class="form-control">
             <option value="2022">2022</option>
             <option value="2021">2021</option>
             <option value="2020">2020</option>
           </select>
           </th>
         </tr> -->
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
var mostsellingtable;
var mostdamagedtable;
var internaltable;
var expiredtable;
var rowselling = 3;
var showsellingmore = false;
var rowdamaged = 3;
var showdamagedmore = false;
var rowinternal = 3;
var showinternalmore = false;
var rowexpired = 3;
var showexpiredmore = false;
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
                                                                    <?php 

                                                                        $startyear = 2014;
                                                                        $str = "";
                                                                        while($startyear <= date("Y"))
                                                                        {
                                                                          if($startyear == date("Y"))
                                                                              $str .= "<option value='$startyear' selected>$startyear</option>";
                                                                          else
                                                                              $str .= "<option value='$startyear'>$startyear</option>";
                                                                          $startyear++;
                                                                        }

                                                                        echo $str;
                                                                    ?>
                                                                  </select>`;
                                                                  

                  document.querySelector("#month").innerHTML = `Month 
                                                                <select style="width: 100px !important;" id="selectmonth" class="form-control">
                                                                <?php 
                                                                        $row = array(
                                                                          "January","February","March","April","May","June","July","August","September","October","November","December"
                                                                        );
                                                                        $i = 0;
                                                                        while($i < sizeof($row))
                                                                        {                      
                                                                          if($i+1 == Date('m'))
                                                                          {
                                                                              $activeLink = 'selected';
                                                                          }else
                                                                          {
                                                                              $activeLink = '';
                                                                          }
                                                                          echo "<option value='$i' $activeLink>{$row[$i++]}</option>";
                                                                        }
                                                                  ?>
                                                                </select>`;


                  document.querySelector("#date").innerHTML = `<input type="radio" id="rangedate" name="date" class="mx-auto mt-3 me-4"/><div class="d-flex justify-content-between"> <label> From <input type="date" id="startdate" style="width: 127px !important;" class="form-control"></label> &nbsp&nbsp
                                                                <label>To <input type="date" id="enddate" style="width: 127px !important;" class="form-control"></label></div>`;

                  document.querySelector("#submit").innerHTML = `<button type="button" id="submitbtn" class="btn btn-warning btn-sm mx-auto" style="height:  30px  !important;">Submit</button>`;
                  document.querySelector("#startdate").disabled = true;
                      document.querySelector("#enddate").disabled = true;
                  $("input[type='radio']").on("click",function(){
                    if(document.querySelector("#selectdate").checked)
                    {
                      console.log("djdddfd");
                      document.querySelector("#startdate").disabled = true;
                      document.querySelector("#enddate").disabled = true;
                      document.querySelector("#selectyear").disabled = false;
                      document.querySelector("#selectmonth").disabled = false;
                    }
                    if(document.querySelector("#rangedate").checked)
                    {
                      console.log("dfd");
                      document.querySelector("#startdate").disabled = false;
                      document.querySelector("#enddate").disabled = false;
                      document.querySelector("#selectyear").disabled = true;
                      document.querySelector("#selectmonth").disabled = true;
                    }
                  })


                  document.querySelector("#submitbtn").addEventListener('click',()=>{
                    console.log("click");
                    table.ajax.reload();
                    mostsellingtable.ajax.reload();
                  });


                },
                "drawCallback": function( settings) {
  try {
    document.querySelectorAll(".toggle-btn").forEach(element => {
                          element.addEventListener("click",()=>{
                            element > $("i.fa-caret-up").toggle();
                            element > $("i.fa-caret-down").toggle();
                        console.log("click");
                      });
    });
    } catch (error) {
    console.log(error);
  }
       
    }



    });

    


    function fetch_report_table(){

startFullDate = startdate.value;
endFullDate = enddate.value;
// activemonth = document.querySelector('.monthlink.activeLink').innerText.trim();
// activeyear = year.innerText.trim();
// if(startFullDate == '' && endFullDate == '' && clickonsubmit == 1)
// {
//     return;
// }


// var rows = "<tr> <td colspan='15'><h4 style='color:rgb(240 143 43);' class='text-center'> Loading... </h4>  </td> <tr>";
// tablebody.innerHTML = rows;


if(clickonmonth == 1)
{
  startdate.value = '';
  enddate.value = '';
    var derivedYear = Number(year.innerText);
var derivedMonth = Number(document.querySelector('.activeLink').getAttribute('data-month'));

startFullDate = new Date(derivedYear, derivedMonth,01);
startFullDate = startFullDate.toLocaleDateString("en-GB", { // you can use undefined as first argument
            year: "numeric",
            month: "2-digit",
            day: "2-digit", 
            });
endFullDate = new Date(derivedYear, derivedMonth + 1,0);
endFullDate = endFullDate.toLocaleDateString("en-GB", { // you can use undefined as first argument
            year: "numeric",
            month: "2-digit",
            day: "2-digit", 
            });

startFullDate = startFullDate.split('/').reverse().join('-');
endFullDate = endFullDate.split('/').reverse().join('-');
}

// console.log(startFullDate,endFullDate);
const xhr = new XMLHttpRequest();

xhr.open('POST','fetch_customer_transaction.php',true);
xhr.responseType = 'json';

xhr.onload = ()=>{
    if(xhr.status === 200)
    {
        var response = xhr.response;
        // console.log(response.error, response.res);
        if(response.error === '1')
        {
            rows = "<tr> <td colspan='15'><h4 style='color:rgb(240 143 43);' class='text-center'> Something went wrong--> couldnt fetch data </h4>  </td> <tr>";
            tablebody.innerHTML = rows;
        }else if(response.error === '2'){
            txn_sum.innerText = 0;
            txn_paid.innerText = 0;
            txn_count.innerText = 0;
            txn_card.innerText = 0;
            txn_cash.innerText = 0;
            txn_other.innerText = 0;
            rows = "<tr> <td colspan='15'><h4 style='color:rgb(240 143 43);' class='text-center'> No Data </h4>  </td> <tr>";
            tablebody.innerHTML = rows;
        }else if(response.error === '3'){
            rows = "<tr> <td colspan='15'><h4 style='color:rgb(240 143 43);' class='text-center'> Something went Wrong </h4>  </td> <tr>";
            tablebody.innerHTML = rows;
        }else{
          res = response.res;
          originalres = res;
          insert_fetch_customer_data();
        } 
    }
};

const formdata = new FormData();
formdata.append('startDate', startFullDate);
formdata.append('endDate', endFullDate);

xhr.send(formdata); 
clickonsubmit = 0;
clickonmonth = 1;
}









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

mostsellingtable = $('#mostsellingtable').DataTable({
"processing" : true,
  "dom": "<'row'<'col-sm-12't>>",
"ajax" : {
url: 'fetch_stock_report.php',
type:"POST",
data: {
    selling: "selling",
    rows : function(){
          if(showsellingmore)
          {
            showsellingmore = false;
            rowselling += 3;
            return rowselling;
          }
          return rowselling;
    },
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
"drawCallback": function( settings) {
  try {
    console.log("ressponse",settings.json["rowcount"]);
    if(settings.json["rowcount"])
    {
      console.log(settings.json["rowcount"]);
      $("#sellingbody").append(`<tr ><td colspan="5"><div class="d-flex justify-content-end text-primary fw-bold" ><span style="cursor: pointer;" onclick="showSellingMore()">show more</span></div></td></tr>`);
    }
    } catch (error) {
    console.log(error);
  }
       
    }
});



mostdamagedtable = $('#mostdamagedtable').DataTable({
"processing" : true,
  "dom": "<'row'<'col-sm-12't>>",
"ajax" : {
url: 'fetch_stock_report.php',
type:"POST",
data: {
    damaged: "damaged",
    rows : function(){
      if(showdamagedmore)
          {
            showdamagedmore = false;
            rowdamaged += 3;
            return rowdamaged;
          }
          return rowdamaged;
    },
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
"drawCallback": function( settings) {
  try {
    console.log("ressponse",settings.json["rowcount"]);
    if(settings.json["rowcount"])
    {
      console.log(settings.json["rowcount"]);
      $("#damagedbody").append(`<tr ><td colspan="5"><div class="d-flex justify-content-end text-primary fw-bold" ><span style="cursor: pointer;" onclick="showDamagedMore()">show more</span></div></td></tr>`);
    }
    } catch (error) {
    console.log(error);
  }
       
    }
});




internaltable = $('#internaltable').DataTable({
"processing" : true,
  "dom": "<'row'<'col-sm-12't>>",
"ajax" : {
url: 'fetch_stock_report.php',
type:"POST",
data: {
    internal: "internal",
    rows : function(){
      if(showinternalmore)
          {
            showinternalmore = false;
            rowinternal += 3;
            return rowinternal;
          }
          return rowinternal;
    },
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
"drawCallback": function( settings) {
  try {
    console.log("ressponse",settings.json["rowcount"]);
    if(settings.json["rowcount"])
    {
      console.log(settings.json["rowcount"]);
      $("#internalbody").append(`<tr ><td colspan="5"><div class="d-flex justify-content-end text-primary fw-bold" ><span style="cursor: pointer;" onclick="showInternalMore()">show more</span></div></td></tr>`);
    }
    } catch (error) {
    console.log(error);
  }
       
    }
});



expiredtable = $('#expiredtable').DataTable({
"processing" : true,
  "dom": "<'row'<'col-sm-12't>>",
"ajax" : {
url: 'fetch_stock_report.php',
type:"POST",
data: {
    expired: "expired",
    rows : function(){
      if(showexpiredmore)
          {
            showexpiredmore = false;
            rowexpired += 3;
            return rowexpired;
          }
          return rowexpired;
    },
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
"drawCallback": function( settings) {
  try {
    console.log("ressponse",settings.json["rowcount"]);
    if(settings.json["rowcount"])
    {
      console.log(settings.json["rowcount"]);
      $("#expiredbody").append(`<tr ><td colspan="5"><div class="d-flex justify-content-end text-primary fw-bold" ><span style="cursor: pointer;" onclick="showExpiredMore()">show more</span></div></td></tr>`);
    }
    } catch (error) {
    console.log(error);
  }
       
    }
});


firsttimeload = 0;

});
function showSellingMore(){
  showsellingmore = true;
  mostsellingtable.ajax.reload();
}
function showDamagedMore(){
  showdamagedmore = true;
  mostdamagedtable.ajax.reload();
}
function showInternalMore(){
  showinternalmore = true;
  internaltable.ajax.reload();
}
function showExpiredMore(){
  showexpiredmore = true;
  expiredtable.ajax.reload();
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
