<?php 
// session_start();
// require("config.inc.php");
// $Retailer_Id = $_SESSION['Retailer_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Custome Report</title>
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
                <a href="index.php">Home</a>
            </header>
            </div>
            </div>

  <div class="table-main">
  <div class="col-sm-11 mt-5 mt-sm-2 px-0">
  <br>
  <div class="panel panel-default">
    <div class="panel-heading">Customer Report</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="customer_table" class="table table-bordered table-striped table-hover">
       <thead>
        <tr>
                <th style="width: 30px;text-align:center;">S.No.</th>
                <th style="text-align:center;">Customer Name</th>
                <th style="text-align:center;">Customer Mobile No</th>
                <th style="width: 50px;text-align:center;white-space:nowrap;">Purchase Amount</th>
                <th style="width: 50px;text-align:center;">Visits</th>
       </tr>
       </thead>
       <tbody></tbody>
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

var firsttimeload = 1;
var table;
$(document).ready(function () {
    table = $('#customer_table').DataTable({
        "processing" : true,
         "dom": "<'row'<'col-12 col-sm-auto me-5'l><'col-auto text-nowrap'<'#year'>><'col text-nowrap'<'#month'>><'col'<'#date'>><'col d-flex justify-content-center align-items-center'<'#submit'>><'col-12 col-md-auto my-4 my-md-0'f>>" +
             "<'row'<'col-sm-12't>>" +
             "<'row'<'col-sm-6'i><'col-sm-6'p>>",
        "ajax" : {
        url: 'fetch_customer_report.php',
        type:"POST",
        data: {
            customerreport: "customer",
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
            { data: 'name' },
            { data: 'mobile' },
            { data: 'amount' },
            { data: 'visits' }
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
                  });


                  document.querySelector("#submitbtn").addEventListener('click',()=>{
                    console.log("click");
                    table.ajax.reload();
                  });


                }
    });
    firsttimeload = 0;

});

</script>



</body>
</html>
