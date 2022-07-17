<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <title>Subscription Module</title>
    <style>
      #identificationnumber{
        max-width: 500px; 
        box-shadow: 2px 2px 5px black;
      }
      .row-container{
        background: white;
        box-shadow: 1px 1px 10px  black,-1px -1px 10px #e3dcdc;
        border-radius: 10px;
      }
      thead th,tbody{
        border:  1px solid black;
        /* border-radius: 10px; */
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
  text-decoration :  none;
  margin-inline: 5px;
  color: black;
  font-weight: bold;
}
.list{
    background: white;
    border-radius: 10px;
    height: 33px;
}
.list i{
  cursor : pointer;
  color : red;
}
.name{
  width: 300px;
}
.price{
  width: 100px;
}
.validity{
  width: 100px;
}
.discount{
  width: 100px;
}
.service{
  width: 150px;
}
input{
  margin-inline: auto;
}
.submitth{
  width: 80px;
}
.visits{
  width: 50px;
}
th{
  white-space: nowrap;
}
/* .activebox{
  display: block !important;   
} */
a{
  text-decoration: none !important;
}
.spinner-border{
  width: 1.5rem !important;
  height: 1.5rem !important;
}
.btncss{
        box-shadow: 3px 3px 2px  black !important;
}
.statusbtn{
        border: 2px solid black;
        padding: 2px;
}
    </style>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
  </head>
  <body>
   
<?php
include "navbar.php";
?>
  <section class="home-section">
  <div class="container">

<div class="row mx-2 m-sm-0">
    <div class="col">
      <form action="customer_subscription.php" method="POST">
        <div class="row  d-flex justify-content-center align-items-center mt-4 row-container" >
              <div class="col-12 mt-2 d-flex justify-content-between align-items-center " style="border-bottom:  2px solid black;" >
                <h4 class="m-0">Enter Customer Mobile / Identifcation  Number to get details</h4><button class="btn btn-sm btn-warning my-2" id="identifibtn" type="button" style="box-shadow: 2px 2px 5px black;white-space:nowrap;" data-bs-toggle="modal" data-bs-target="#identifimodal">Create Identification Number</button>
              </div>
                <div class="col">
                  <div class="row py-3 my-4 d-flex justify-content-center align-items-center">
                  <div class="col-12 col-sm-6 ">
                        <input type="text" class="form-control mx-auto" id="identificationnumber" name="mobile" placeholder="Enter customer mobile / identifcation number">
                </div>
                <div class="col-12 col-sm-2 mt-2 mt-sm-0">
                  <button type="submit" name="submit" class="btn btn-primary d-flex ms-auto ms-sm-0" style="box-shadow: 2px 2px 5px black;">Submit</button>
                </div>
                  </div>
                </div>
        </div>  
        </form>
        <div class="col-12 mt-4" id="showmessage"></div>
        <div class="row  d-flex justify-content-center align-items-center mt-4 row-container" >
              <div class="col-12 mt-2 d-flex justify-content-between align-items-center pb-2" style="border-bottom:  2px solid black;" >
                <h4 class="m-0">Your existing plans</h4><span> <button class="btn btn-warning expandbtn"  id="createplan" style="box-shadow: 2px 2px 5px black;white-space:nowrap;">Create New Plan +</button></span>
              </div>
              <div class="col-12 px-4 my-3 " id="expandplan" style="display:none;">


                  <div class="row">
                    <div class="col-12" style="background: white;border-radius: 10px;">
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
                                                    <div class="col-12 col-sm-11 mx-auto mb-3" > 
                                                        <span style="font-style:italic;" class="p-2">Example : Pay Rs.500/- and get membership discount of 3% on every bill. Membership valid for one year.</span>
                                                    </div>
                                                    <div class="col-12 col-sm-11 mx-auto">
                                                                <div class="table-responsive">
                                                                <table  class="table table-hover table-striped">
                                                                    <thead>
                                                                      <tr>
                                                                                                        <th style="text-align:center;" class="name">Name of Plan</th>
                                                                                                        <th style="text-align:center;" class="price">Price (Rs)</th>
                                                                                                        <th style="text-align:center;" class="validity">Validity (days)</th>
                                                                                                        <th style="text-align:center;" class="discount">(%) discount on bill</th>
                                                                                                        <th style="text-align:center;" class="disc">Description</th>
                                                                                                        <th style="text-align:center;" class="submitth"></th>

                                                                      </tr>
                                                                    </thead>
                                                                    <tbody id="disc_body">

                                                                        <td><input type="text" class="form-control input_plan"  placeholder=""></td>
                                                                        <td><input type="text" class="form-control input_price pricevalidity"  placeholder=""></td>
                                                                        <td><input type="text" class="form-control  validityinputs input_validity"    placeholder=""></td>
                                                                        <td>
                                                                        <div class="input-group mb-3">
                                                                        <input type="text" class="form-control  validityinputs input_discount" placeholder="">
                                                                          <span class="input-group-text">%</span>
                                                                        </div>
                                                                          </td>
                                                                        <td><input type="text" class="form-control input_desc" placeholder=""></td>
                                                                        <td>
                                                                          <button type="submit" class="btn btn-warning btn-sm d-flex mx-auto" onclick="submitData(event,3)" style="box-shadow: 2px 2px 5px black;">Submit</button>
                                                                        </td>


                                                                    </tbody>
                                                                </table>
                                                                
                                                              </div>
                                                    </div>
                                                  </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="plan2">
                                                    <div class="row my-3">
                                                    <div class="col-12 col-sm-11 mx-auto mb-3" > 
                                                        <span style="font-style:italic;" class="p-2">Example : Pay Rs. 2,000/- and avail services worth Rs. 2,500 in next 3 months. </span>
                                                    </div>
                                                    <div class="col-12 col-sm-11 mx-auto">
                                                                <div class="table-responsive">
                                                                <table  class="table  table-hover table-striped">
                                                                <thead>
                                                                  <tr>
                                                                                                    <th style="text-align:center;" class="name" >Name of Plan</th>
                                                                                                    <th style="text-align:center;" class="price">Price (Rs)</th>
                                                                                                    <th style="text-align:center;" class="validity">Validity (days)</th>
                                                                                                    <th style="text-align:center;" class="service">Service Value (Rs)</th>
                                                                                                    <th style="text-align:center;" class="disc">Description</th>
                                                                                                    <th style="text-align:center;" class="submitth"></th>

                                                                  </tr>
                                                                </thead>
                                                                <tbody id="service_body">

                                                                <td><input type="text" class="form-control input_plan" placeholder=""></td>
                                                                <td><input type="text" class="form-control input_price pricevalidity" placeholder=""></td>
                                                                <td><input type="text" class="form-control validityinputs input_validity"   placeholder=""></td>
                                                                <td><input type="text" class="form-control validityinputs input_servicevalue" placeholder=""></td>
                                                                <td><input type="text" class="form-control input_desc" placeholder=""></td>
                                                                <td>
                                                                  <button type="submit" class="btn btn-warning btn-sm d-flex mx-auto" onclick="submitData(event,2)" style="box-shadow: 2px 2px 5px black;">Submit</button>
                                                                </td>


                                                                </tbody>
                                                                </table>
                                                              </div>
                                                    </div>
                                                  </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="plan3">
                                                    <div class="row my-3">
                                                    <div class="col-12 col-sm-11 mx-auto mb-3" > 
                                                        <span style="font-style:italic;" class="p-2">Example : Get golden package of Item 1+ Item 2+ Item 3 (services) in just Rs. 1200 valid for 3 months.</span>
                                                    </div>
                                                    <div class="col-12 col-sm-11 mx-auto">
                                                                <div class="table-responsive">
                                                                  <table  class="table  table-hover table-striped">
                                                                  
                                                                  <thead>
                                                                  <tr>
                                                                                                    <th style="text-align:center;" class="name">Name of Plan</th>
                                                                                                    <th style="text-align:center;" class="price">Price (Rs)</th>
                                                                                                    <th style="text-align:center;" class="validity">Validity (days)</th>
                                                                                                    <th style="text-align:center;white-space:nowrap;">Package (Item 1 + Item 2 + ....)</th>
                                                                                                    <th style="text-align:center;" class="disc">Description</th>
                                                                                                    <th style="text-align:center;" class="submitth"></th>

                                                                  </tr>
                                                                </thead>
                                                                <tbody id="package_body">

                                                                <td><input type="text" class="form-control input_plan" placeholder=""></td>
                                                                <td><input type="text" class="form-control input_price pricevalidity" placeholder=""></td>
                                                                <td><input type="text" class="form-control validityinputs input_validity" placeholder=""></td>
                                                                <td>
                                                                 <div class="row">
                                                                        <div class="col px-0">
                                                                                <div class="row m-0" style="width: 100%;">
                                                                                      <div class="col d-flex justify-content-between align-items-center ">
                                                                                            <input type="text" class="form-control" id="itemtext" placeholder="">
                                                                                            <button type="button" class="btn btn-primary btn-sm d-flex ms-2" onclick="addItem(event)" style="box-shadow: 2px 2px 5px black;">Add</button>
                                                                                      </div>
                                                                                </div>
                                                                                <div class="row m-0 px-3" style="width: 100%;" id="itembox">
                                                                                </div>
                                                                        </div>
                                                                 </div>
                                                                </td>
                                                                <td><input type="text" class="form-control input_desc" placeholder=""></td>
                                                                <td>
                                                                  <div class="d-flex justify-content-center align-items-center">
                                                                    <button type="submit" class="btn btn-warning btn-sm d-flex mx-auto" onclick="submitData(event,4)" style="box-shadow: 2px 2px 5px black;">Submit</button>
                                                                  </div>
                                                                </td>


                                                                </tbody>
                                                                </table>

                                                              </div>
                                                    </div>
                                                  </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="plan4">
                                                  <div class="row my-3">
                                                  <div class="col-12 col-sm-11 mx-auto mb-3" > 
                                                        <span style="font-style:italic;" class="p-2">Example : Take membership at Rs. 2,000 and avail 4 regular servicing. Valid for 4 months.</span>
                                                    </div>
                                                    <div class="col-12 col-sm-11 mx-auto">
                                                                <div class="table-responsive">
                                                                <table  class="table table-hover table-striped">
                                                                    <thead>
                                                                      <tr>
                                                                                                        <th style="text-align:center;" class="name">Name of Plan</th>
                                                                                                        <th style="text-align:center;" class="price">Price (Rs)</th>
                                                                                                        <th style="text-align:center;" class="validity">Validity (days)</th>
                                                                                                        <th style="text-align:center;" class="discount">Visits Allowed</th>
                                                                                                        <th style="text-align:center;" class="disc">Description</th>
                                                                                                        <th style="text-align:center;" class="visits"></th>

                                                                      </tr>
                                                                    </thead>
                                                                    <tbody id="visits_body">

                                                                        <td><input type="text" class="form-control input_plan" placeholder=""></td>
                                                                        <td><input type="text" class="form-control input_price pricevalidity" placeholder=""></td>
                                                                        <td><input type="text" class="form-control validityinputs input_validity" placeholder=""></td>
                                                                        <td><input type="text" class="form-control validityinputs input_visits" placeholder=""></td>
                                                                        <td><input type="text" class="form-control input_desc " placeholder=""></td>
                                                                        <td>
                                                                          <button type="submit" class="btn btn-warning btn-sm d-flex mx-auto" onclick="submitData(event,1)" style="box-shadow: 2px 2px 5px black;">Submit</button>
                                                                        </td>


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
              <div class="col-12 mt-3">
                <div class="table-responsive">
                      <table id="table_plans"  class="table table-striped table-hover">
                      <thead>
                        
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Type of Plan</th>
                          <th scope="col">Name of Plan</th>
                          <th scope="col">Price</th>
                          <th scope="col">Validity</th>
                          <th scope="col">Creation Date</th>
                          <th scope="col">Status</th>
                          <th scope="col">Date of Closure</th>
                          <th scope="col">Detail</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="table_plans_body">
                        <tr>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
        </div>      
    </div>
</div>
    
</div>



<!-- Modal -->
<div class="modal fade" id="identifimodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Identification Number</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col">
                <div class="row my-2">
                  <div class="col-12"><label for=""><h6>Enter Identification Number</h6></label></div>
                  <div class="col"><input type="text" class="form-control" id="identifinum" placeholder="Identification Number"></div>
                </div>
                  <div class="row my-2">
                    <div class="col-12"><label for=""><h6>Identifier Type</h6></label> </div>
                    <div class="col">
                          <select class="form-select" id="identifitype" aria-label="Default select example">
                                    <option selected disabled>Select Identifier Type</option>
                                    <option value="Mobile Number">Mobile Number</option>
                                    <option value="Membership Number">Membership Number</option>
                                    <option value="Vehicle Reg. Number">Vehicle Reg. Number</option>
                                    <option value="Others">Others</option>
                          </select>
                    </div>
                  </div>
          </div>
        </div>
        
       



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="clsbtn">Close</button>
        <button type="button" class="btn btn-primary" onclick="createIdentifiNum(event,<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];} ?>)">Submit</button>
      </div>
    </div>
  </div>
</div>




  </section>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script> -->
    <script>


document.querySelectorAll(".validityinputs").forEach(element => {
  element.addEventListener("input",(e)=>{
    if(e.target.value.match(/[^0-9]/gi)){
            e.target.value = e.target.value.replace(/[^0-9]/gi,'');
    }
    console.log("input");
  });
});

document.querySelector("#identificationnumber").addEventListener("input",(e)=>{
    if(e.target.value.match(/[^a-z ^0-9]/gi)){
            e.target.value = e.target.value.replace(/[^a-z ^0-9]/gi,'');
    }
    console.log("input");
});

document.querySelector("#itemtext").addEventListener("input",(e)=>{
    if(e.target.value.match(/[,]/gi)){
            e.target.value = e.target.value.replace(/[,]/gi,'');
    }
    console.log("input");
});

document.querySelectorAll(".pricevalidity").forEach(element => {
  element.addEventListener("input",(e)=>{
    var str = e.target.value;
    var curr = e.target;
    if(e.target.value.match(/[^0-9.]/gi)){
            e.target.value = e.target.value.replace(/[^0-9.]/gi,'');
    }
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
    console.log("input");
  });
});

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
                        }
                    }
                  }
    }

      function addItem(e){
        var itemtext = $("#itemtext").val();
        if(itemtext.trim() === "" || itemtext.trim() == "0")
            return;

        console.log("btn clicked"+itemtext);
        $("#itembox").append(`
                    <div class="col-12 list  mt-2 d-flex justify-content-between align-items-center">
                    <span class="item">${itemtext}</span>  <i class="fas fa-trash" onclick="removeItem(event)"></i>
                    </div>            
        `);

        $("#itemtext").val("");

      }

      function removeItem(e){
          $(e.target.parentElement).remove();
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
            e.target.innerHTML = "Create New Plan +";
            $( "#expandplan" ).slideUp(300);
          }
          // document.querySelector("#expandplan").classList.toggle("activebox");


      });


function createIdentifiNum(e, mobile){

      identifinum = $("#identifinum").val();
      identifitype = $("#identifitype").val();

      if(mobile == '' || identifinum == '')
        return;



  e.target.innerHTML = ` <div class="spinner-border text-white" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>`;

        $.ajax({    
                    type: "POST",
                    url: "get_and_submit_plan.php",  
                    data: {
                      identification: "create",
                       mobile : mobile,
                      identifinum : identifinum,
                      identifitype : identifitype         
                    },
                    dataType: "json",
                    success: function(data){      
                      document.querySelector("#clsbtn").click();
                      e.target.innerHTML = ``;

                      if(data.error == '0')
                      { 
                        document.querySelector("#showmessage").innerHTML = `<div class="alert alert-success" role="alert">
                                                                              Identification Number created Successfully
                                                                            </div>`;

                        // alert("Identification Number created Successfully");  
                      }else if(data.error == '1')
                      { 
                        document.querySelector("#showmessage").innerHTML = `<div class="alert alert-warning" role="alert">
                                                                              Identification Number already exists
                                                                            </div>`;
                      }else if(data.error == '2')
                      { 
                        document.querySelector("#showmessage").innerHTML = `<div class="alert alert-danger" role="alert">
                                                                              Something went wrong
                                                                            </div>`;
                      }else if(data.error == '3')
                      { 
                        document.querySelector("#showmessage").innerHTML = `<div class="alert alert-danger" role="alert">
                                                                              Customer isn't register! <a href='registration_new.php' class='alert-link'>Click here</a> for register customer
                                                                            </div>`;
                      }


                      setTimeout(() => {document.querySelector("#showmessage").innerHTML = "";}, 4000);
                    }
            });
}







      function inactivePlan(e,id){
        if(e.target.classList.contains("statusbtn"))
        {
          e.target.classList.remove("statusbtn");
          $("#btn"+id).hide();
        }else{
          if([...document.querySelectorAll(".status"+id)].some(element=>element.classList.contains("statusbtn")))
          {
            document.querySelectorAll(".status"+id).forEach(element=>{
                                                                                if(element.classList.contains("statusbtn"))
                                                                                    element.classList.remove("statusbtn");
                                                                              }
                                                                            );
            $("#btn"+id).hide();
          }else{
            e.target.classList.add("statusbtn");
            $("#btn"+id).show();
          }
        }
      }






      function format ( id ) {
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

    var firsttimeload = 1;
    var table='';
    $(document).ready(function () {
              table = $('#table_plans').DataTable({
                "dom": "<'row w-100'<'col-12 col-sm-auto'l><'col text-nowrap'<'#radiobuttons'>><'col-12 col-sm-auto 'f>>" +      
                      "<'row'<'col-12't>>" +
                      "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                  "processing" : true,
                  "ajax" : {
                  url: 'get_and_submit_plan.php',
                  type:"POST",
                  data: {
                      fetch: "plan",
                      status: function(){
                        if(firsttimeload == 1)
                          return 1;  
                        return $("input[name='group']:checked").val();
                      }
                      }
                  },
                  columns: [
                      { data: 'sno' },
                      { data: 'plantype' },
                      { data: 'planname' },
                      { data: 'price' },
                      { data: 'validity' },
                      { data: 'creationdate' },
                      { data: 'status' },
                      { data: 'dateofclosure' },
                      {
                          className: 'details-control',
                          orderable: false,
                          data: 'detail',
                          defaultContent: '',
                      },
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
                                            document.querySelector("#radiobuttons").innerHTML = `<div class="row">
                                            <div class="col">
                                                <input type="radio" id="active" value="1"  name="group" checked class="mx-2"/>Active
                                            </div>
                                            <div class="col">
                                                <input type="radio" id="inactive"  value="0" name="group" class="mx-2"/>Inactive
                                            </div>
                                            <div class="col">
                                                <input type="radio" id="closed" value="-1"  name="group" class="mx-2"/>Closed
                                            </div>
                                                                                                  </div>`;

                                                                                                  
                            $("input[type='radio']").on("click",function(){
                              table.ajax.reload();
                              if(document.querySelector("#active").checked)
                              {
                                console.log("active");
                              }else  if(document.querySelector("#inactive").checked)
                              {
                                console.log("inactive");
                              }else  if(document.querySelector("#closed").checked)
                              {
                                console.log("closed");
                              }
                              
                            })

                          },
                          "drawCallback": function( settings) {

                          }


              });

              firsttimeload = 0;
    });


    $('#table_plans_body').on('click', 'td.details-control', function (event) {
          var tr = $(this).closest('tr');
          var row = table.row( tr );
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
                  row.child( format($(this).children('button').attr("id")) ).show();
                  tr.addClass('shown');
                  // $('div.slider', row.child()).fadeIn();
                  
              }
    } );

function submitData(e,type){
      console.log(type);

      if(type == 1){
        input_plan = $("#visits_body  .input_plan").val();
        input_price = $("#visits_body  .input_price").val();
        input_validity = $("#visits_body  .input_validity").val();
        input_visits = $("#visits_body  .input_visits").val();
        input_desc = $("#visits_body  .input_desc").val();

        input_servicevalue = 0;
        input_discount = 0;
        input_package = "";
        }else if(type == 2){
          input_plan = $("#service_body  .input_plan").val();
          input_price = $("#service_body  .input_price").val();
          input_validity = $("#service_body  .input_validity").val();
          input_servicevalue = $("#service_body  .input_servicevalue").val();
          input_desc = $("#service_body  .input_desc").val();

          input_visits = 0;
          input_discount = 0;    
          input_package = "";      
        }else if(type == 3){
          input_plan = $("#disc_body  .input_plan").val();
          input_price = $("#disc_body  .input_price").val();
          input_validity = $("#disc_body  .input_validity").val();
          input_discount = $("#disc_body  .input_discount").val();
          input_desc = $("#disc_body  .input_desc").val();

          input_visits = 0;
          input_servicevalue = 0;
          input_package = "";
        }else if(type == 4){
          input_plan = $("#package_body  .input_plan").val();
          input_price = $("#package_body  .input_price").val();
          input_validity = $("#package_body  .input_validity").val();
          input_desc = $("#package_body  .input_desc").val();
          input_package = Array.from(document.querySelectorAll("#itembox .item")).map(curr=>curr.innerText.trim()).join(",");
          console.log(input_package);
          input_visits = 0;
          input_servicevalue = 0;
          input_discount = 0;
        }

        $.ajax({    
              type: "POST",
              url: "get_and_submit_plan.php",  
              data: {
                submit: "submit",
                plan_type : type,

                input_plan : input_plan,
                input_price : input_price,
                input_validity : input_validity,
                input_desc : input_desc,

                input_visits : input_visits,
                input_servicevalue : input_servicevalue,
                input_discount : input_discount,
                input_package : input_package                
              },
              dataType: "json",
              success: function(data){        
                table.ajax.reload();

                if(data.error == '0')
                { 
                  alert("Plan Created Successfully");
                }else
                {
                  alert("Couldn't  Create Plan");
                }
              }
       });

}


function executeStatus(e,subscription_id,status){
        console.log("click on confirm");
        e.target.innerHTML = ` <div class="spinner-border text-white" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>`;


        if(document.querySelector("i.status"+subscription_id).classList.contains("statusbtn"))
        {
          status = -1;
        }


        $.ajax({    
              type: "POST",
              url: "get_and_submit_plan.php",  
              data: {
                setstatus: "change",
                subscription_id : subscription_id,
                status: status            
              },
              dataType: "json",
              success: function(data){     
                table.ajax.reload();


                   if(data.error == '0') {
                    document.querySelector("#showmessage").innerHTML = `<div class="alert alert-success" role="alert">
                                                                        Status Updated Successfully
                                                                    </div>`;
                  } else  if(data.error == '1') {
                    document.querySelector("#showmessage").innerHTML = `<div class="alert alert-danger" role="alert">
                                                            Couldn't update status
                                                          </div>`;
                  } else  if(data.error == '2') {
                    document.querySelector("#showmessage").innerHTML = `<div class="alert alert-danger" role="alert">
                                                            Something went wrong
                                                          </div>`;
                  }
                  setTimeout(() => {document.querySelector("#showmessage").innerHTML = "";}, 4000);
                  


               
              }
       });

} 



function toggleArrow(e,id){
  e.target.classList.toggle("btncss");
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