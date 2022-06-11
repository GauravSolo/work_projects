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
</style>

    </head>
<body>
<?php

      include "navbar.php";

?>


  <section class="home-section">
 
  <div class="table-main">
  <div class="col-sm-11 mt-5 mt-sm-2">
  <br>
  <div class="panel panel-default">
    <div class="panel-heading">Stock Management</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="stock_table" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th style="width: 50px;text-align:center;">S.No</th>
         <th style="width: 50px;text-align:center;">Id</th>
         <th style="width: 100px;text-align:center;">Type</th>
         <th style="text-align:center;">Category</th>
        <th style="text-align:center;">Subcategory</th>
        <th style="width: 50px;text-align:center;">GST(%)</th>
        <th style="width: 50px;text-align:center;">Price(Rs.)</th>
        <th style="width: 100px;text-align:center;">Stocks</th>
        <th style="width: 100px;text-align:center;">Add / Deduct</th>
        <th style="width: 0px;text-align:center;">Value</th>
        <th style="width: 0px;text-align:center;"></th>
        <th style="width: 0px;text-align:center;">Remarks</th>
       </tr>
       </thead>
       <tbody id="tbody"></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  </div>


	</div>
  </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>


  

<script type="text/javascript" language="javascript" >

                function twodigitdecimal(curr, str)
                        {
                            if(str.indexOf('.') != -1)
                                    {
                                        if(str.split('.')[1].length >= 2)
                                        {
                                            // console.log('curr',curr.value)
                                            if(str.split('.')[1].length == 2)
                                            {
                                                curr.value = Number(curr.value).toFixed(2);
                                            }else
                                            {
                                                curr.value =  Number(str.slice(0, -1));
                                                // console.log('cufjfjmffjj',curr.value);
                                            }
                                        }
                                    }
                        }
                        function checkValidation(e){
                          if(e.target.value == '0'){
                              e.target.value = '';
                              return ;
                          }
                            twodigitdecimal(e.target,e.target.value);
                            
                            if(e.target.value.match(/[^0-9.]/g))
                            {
                                e.target.value = e.target.value.replace(/[^0-9]/g,'');
                            }
                        }
                        



var showsubmit=0;
var dataTable;
$(document).ready(function(){

 dataTable = $('#stock_table').DataTable({
  "processing" : true,
  "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
             "<'row'<'col-sm-12't>>" +
             "<'row'<'col-sm-6'i><'col-sm-6'p>>",
  "order" : [0,"asc"],
  "ajax" : {
   url:"stock_table.php",
   type:"POST",
   data: {
      fetch: "stock_table.php"
    }
  },
  "aoColumns": [
        {"mData": "sno"},
        {"mData": "id"},
        {"mData": "type"},
        {"mData": "category"},
        {"mData": "subcategory"},
        {"mData": "gst"},
        {"mData": "price"},
        {"mData": "stock"},
        {"mData": "action"},
        {"mData": "stockinput"},
        {"mData": "select"},
        {"mData": "remarks"}
        
],
'columnDefs': [  
    {
      "orderable" : false,
      "searchable": false,
      "targets": [ 8, 9,10,11]
    },
    {
            'targets': '_all',
            'createdCell':  function (td, cellData, rowData, row, col) {
                $(td).attr('style', "text-align: center;vertical-align:middle;" ); 
            }
    }
  ],
  

"initComplete":function( settings, json){
                        

    },
    "footerCallback": function (row, data, start, end, display) {                
                //Get data here 
                console.log("==>",data);
                        
                        // showsubmit = 0;

       },
//   'columnDefs': [
//     {
//       "orderable" : false,
//       "searchable": false,
//       "targets": [0,7,9,10]
//     }
//   ],
//   "fnRowCallback" : function(nRow, aData, iDisplayIndex){
//                            oSettings = this.fnSettings();
//                            $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
//                            return nRow;
//     },
//     "initComplete":function( settings, json){
//       document.querySelectorAll(".tabledit-input").forEach(element => {
//                           element.addEventListener("input click focus",checkValidation);
//       });
//       document.querySelector("#selecttype").innerHTML = `<select id="selectbox" class="form-control input-sm"> 
//                                                             <option selected data-id="0" value="all">All </option> 
//                                                             <option  data-id="1" value="product"> Product</option> 
//                                                             <option  data-id="2" value="service">Service </option> 
//                                                          </select>`;
//       document.querySelector("#activelist").innerHTML = `<select id="activelistbox" class="form-control input-sm" style="width: 100px  !important;"> 
//                                                             <option data-id="3" selected value="Active List">${activestatus}</option> 
//                                                             <option data-id="4" value="Inactive List">${inactivestatus}</option> 
//                                                          </select>`;
//     },
    "drawCallback": function(settings){
                console.log(5);
                document.querySelectorAll(".form-textbox-small").forEach(element => {
                          element.addEventListener("input",checkValidation);
                          console.log("input");
                        });
                        document.querySelectorAll(".form-textbox-small").forEach(element => {
                          element.addEventListener("click",checkValidation);
                          console.log("click");
                        });
                        document.querySelectorAll(".form-textbox-small").forEach(element => {
                          element.addEventListener("focus",checkValidation);
                          console.log("focus");
                        });
                        $("#tbody").append("<tr style='display:none;'> <td colspan='8'></td><td class='text-center' colspan='4'><button type='button' id='stocksubmit' class='btn btn-warning'>Submit</button></td></tr>");
                        document.querySelector("#stocksubmit").addEventListener("click",addStock);
                        showsubmit = 0;
      
    }








 });
// "INSERT INTO `Stock_Topup` (`Staff_Sub_Service_Id`, `Type`, `Retailer_Id`, `Stock_Topup_Count`, `Remark`, `Vendor_Id`, `payment`, `invoice`)"
// . " VALUES ('$from_date', '$to_date', $Ret_Id, $price, '$remark', '$vendor', '$payment', '$invoice')";



}); 




function showaddStock(e,id,button){



  if(!e.target.classList.contains("btncss"))
  {
        if(document.querySelector(`.deduct-${id}`).classList.contains("btncss"))
        {
          document.querySelector(`.deduct-${id}`).classList.remove("btncss");
        }
        
        e.target.classList.add("btncss");
        
        if(document.querySelector(`input[data-stockid="${id}"]`).classList.contains("d-none"))
        {
          document.querySelector(`input[data-stockid="${id}"]`).classList.remove("d-none"); 
          document.querySelector(`input[data-stockid="${id}"]`).classList.add(button);
        }else{
          if(document.querySelector(`input[data-stockid="${id}"]`).classList.contains("deduct"))
          {
            document.querySelector(`input[data-stockid="${id}"]`).classList.remove("deduct");
          }
          document.querySelector(`input[data-stockid="${id}"]`).classList.add(button);
        }

        if(document.querySelector(`textarea[data-stockid="${id}"]`).classList.contains("d-none"))
        {
          document.querySelector(`textarea[data-stockid="${id}"]`).classList.remove("d-none"); 
          document.querySelector(`textarea[data-stockid="${id}"]`).classList.add(button);
        }else{
          if(document.querySelector(`textarea[data-stockid="${id}"]`).classList.contains("deduct"))
          {
            document.querySelector(`textarea[data-stockid="${id}"]`).classList.remove("deduct");
          }
          document.querySelector(`textarea[data-stockid="${id}"]`).classList.add(button);
        }
        
  }else{
    e.target.classList.remove("btncss");
    document.querySelector(`input[data-stockid="${id}"]`).classList.add("d-none"); 
    document.querySelector(`input[data-stockid="${id}"]`).classList.remove(button);
    document.querySelector(`textarea[data-stockid="${id}"]`).classList.add("d-none"); 
    document.querySelector(`textarea[data-stockid="${id}"]`).classList.remove(button);
  }
  if(!document.querySelector(`select[data-stockid="${id}"]`).classList.contains("d-none"))
      {
        document.querySelector(`select[data-stockid="${id}"]`).classList.add("d-none"); 
        document.querySelector(`select[data-stockid="${id}"]`).classList.remove("Deduct");
      }
      
      
      if(document.querySelectorAll(".btncss").length == 0)
      {
        $("#tbody tr:last").hide();
      }else{
        $("#tbody tr:last").show();
      }

      console.log(document.querySelectorAll(".btncss").length);

}

function showdeductStock(e,id,button){



  if(!e.target.classList.contains("btncss"))
  {
    if(document.querySelector(`.add-${id}`).classList.contains("btncss"))
  {
    document.querySelector(`.add-${id}`).classList.remove("btncss");
  }
  e.target.classList.add("btncss");
  
      if(document.querySelector(`input[data-stockid="${id}"]`).classList.contains("d-none"))
      {
        document.querySelector(`input[data-stockid="${id}"]`).classList.remove("d-none"); 
        document.querySelector(`input[data-stockid="${id}"]`).classList.add(button);
      }else{
        if(document.querySelector(`input[data-stockid="${id}"]`).classList.contains("add"))
        {
          document.querySelector(`input[data-stockid="${id}"]`).classList.remove("add");
        }
        document.querySelector(`input[data-stockid="${id}"]`).classList.add(button);
      }
      if(document.querySelector(`textarea[data-stockid="${id}"]`).classList.contains("d-none"))
      {
        document.querySelector(`textarea[data-stockid="${id}"]`).classList.remove("d-none"); 
        document.querySelector(`textarea[data-stockid="${id}"]`).classList.add(button);
      }else{
        if(document.querySelector(`textarea[data-stockid="${id}"]`).classList.contains("add"))
        {
          document.querySelector(`textarea[data-stockid="${id}"]`).classList.remove("add");
        }
        document.querySelector(`textarea[data-stockid="${id}"]`).classList.add(button);
      }
  }else{
    e.target.classList.remove("btncss");
    document.querySelector(`input[data-stockid="${id}"]`).classList.add("d-none"); 
    document.querySelector(`input[data-stockid="${id}"]`).classList.remove(button);
    document.querySelector(`textarea[data-stockid="${id}"]`).classList.add("d-none"); 
    document.querySelector(`textarea[data-stockid="${id}"]`).classList.remove(button);
  }
      if(document.querySelector(`select[data-stockid="${id}"]`).classList.contains("d-none"))
      {
        document.querySelector(`select[data-stockid="${id}"]`).classList.remove("d-none"); 
        document.querySelector(`select[data-stockid="${id}"]`).classList.add(button);
      }else{
        document.querySelector(`select[data-stockid="${id}"]`).classList.add("d-none"); 
        document.querySelector(`select[data-stockid="${id}"]`).classList.remove(button);
      }

      if(document.querySelectorAll(".btncss").length == 0)
      {
        $("#tbody tr:last").hide();
      }else{
        $("#tbody tr:last").show();
      }
      console.log(document.querySelectorAll(".btncss").length);

}

var Retailer_Id;
var value;
var remarks;

function addStock(){

            data = [];
            document.querySelectorAll("input.add").forEach(element=>{
              temp = {};
              temp["rid"] = <?php echo $Retailer_Id;?>; // write dynamic here for retailer id
              temp["id"] = element.getAttribute("data-stockid");
              temp["stock"] = (element.value).trim();
              temp["type"] = "1";
              temp["remarks"] = document.querySelector(`textarea[data-stockid="${temp['id']}"]`).value;
              data.push(temp);
              console.log(element,element.value,element.getAttribute("data-stockid"),temp);
                
            });
            console.log([...data]);

            document.querySelectorAll("input.deduct").forEach(element=>{
              temp = {};
              temp["rid"] = <?php echo $Retailer_Id;?>;   // write dynamic here for retailer id
              temp["id"] = element.getAttribute("data-stockid");
              temp["stock"] = "-"+(element.value).trim();
              temp["type"] = "-1";
              temp["remarks"] = ((document.querySelector(`select[data-stockid="${temp['id']}"]`).value == 'Select') ? '': (document.querySelector(`select[data-stockid="${temp['id']}"]`).value + " - ")) + document.querySelector(`textarea[data-stockid="${temp['id']}"]`).value;
              data.push(temp);
              console.log(element,element.value,element.getAttribute("data-stockid"),temp);
                
            });
            console.log([...data]);
            // document.querySelectorAll("textarea.add").forEach(element=>console.log(element));
            

    
        var postTo = 'submit.php';
        var data = {
          data : data
        }
        /* $('#loaderd').show();
         $('#gif').css('visibility', 'visible');					 */
        jQuery.post(postTo, data,
                function (data) {
                    
                    console.log(data);
                    if(data.status == '1')
                    {
                      dataTable.ajax.reload();
                      showsubmit = 0;
                      alert("Submitted Successfully");
                    }else{
                      alert("Something went wrong");
                    }

                }, 'JSON');
    

 }



</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
