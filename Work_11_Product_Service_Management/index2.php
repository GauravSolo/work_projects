<?php 
include('database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Retail Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
                  margin-left:20px;
                  margin-right:20px;
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
              width:30%;
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
        .vl {
            position: absolute;
            top:15%;
            left:31%; 
            transform: translate(-50%);
            border: 2px solid black;
            height: 150px;
        }
       .btn-upload{
            background-color:#203864;
            margin-left:35%;
            margin-top:10px;
            margin-bottom:3%;
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
            margin-left:7%;
            width:90%;
       }
      .form-textbox-small{
            width:100px;
      }
      .upload-box{
            width:250px;
            background:#d1d1d1;
            margin-top:2%;
            margin-left:30%;
            color:black;
            border:none;
            outline:none;
            font-size:16px;
            border-radius:50px 20px 20px 50px;
      }
      ::-webkit-file-upload-button{
            border:none;
            background:#0099ff;
            border-radius:50%;
            height:100px;
            width:100px;
            color:white;
            font-size:16px;
      }
      @media (max-width: 600px) {
            .column1,.column2,.column3,.column4,.form-col1{
                  float:none;
                  margin:none;
                  width:100%;
                  height:40px;
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
        .upload-box{
            margin:none;
            width:150px;
      }

      }


      #searchbox{
        text-align: right;
      }
      #searchinput{
        border: 1px solid !important;
      }
      .input-sm{
        width: 90px !important;
      }
      input[type='search']{
        width: 120px !important;
        margin-right:15px !important;
      }
      
</style>
    </head>
<body>
<header class="topnav">
  <a href="index.php">Home</a>
  <a href="#">Add</a>
</header>

<div class="main">
	
	<div class="column3">
		<form method="post">
			<input type="submit" name="add" id="addBtn" class="button btn-add" 
      value="Add +">
         </form>
     </div>

   <div id="radioSelection" style="display:none">
     <div class="column1 mb-5">
          <div class="button-main">
         	<form id="categoryForm" method="post" >
         	<label class="radio-lable">Select</label>
          <input type="radio" name="type"  value="product">
  			  <label for="product">Product</label>
  			  <input type="radio" name="type" value="service">
  			  <label for="service">Service</label><br>
          </div>
    </div>
  </div>
            
        <div id="categoryDiv" style="display:none">
          <div class="column2">
            <input list="category_name" class="form-textbox category" 
            name="category_name" placeholder="Search..">
           <datalist id="category_name">
          </datalist>  
          	
            <input type="text" class="form-textbox category" id="category"
             name="category" placeholder="Enter new Category">
            <input type="submit" id="btncategory" class="button btn-category"  
             name="done" value="Submit">
        	</form>


		   <p class="upload-text">Or<br>
			    	<input type="checkbox" name="" id="check">
			    	Insert using CSV/Excel file
			</p>
		</div>
  </div>
   
   <div id="productForm" style="display:none">
     <div class="vl d-none"></div>
       <div class="column4">
    	<div class="form-container">
			<form id="subCategoryForm" method="post" style="display:flex;overflow-x:scroll;">
      <div class="form-col1">
      <label>New Subcategory</label><br>
      <input type="text" class="form-textbox" id="sub_category" 
				name="sub_category" required>
      </div>
      <div class="form-col2">
        <label>GST in %</label><br>
				<input type="text" class="form-textbox form-textbox-small" id="GST" 
        name="GST" pattern="^(100(?:\.0{1,2})?|0*?\.\d{1,2}|\d{1,2}(?:\.\d{1,2})?)$" title="Enter number in rnge 0-100 only" required>
      </div>
      <div class="form-col2">
        <label>Price in Rs</label><br>
				<input type="number" class="form-textbox form-textbox-small" id="price" name="price" required>
      </div>
      <div class="form-col2">
      <label>Commission in %</label><br>
				<input type="text" class="form-textbox form-textbox-small" 
				id="commission_per" name="commission_per" pattern="^(100(?:\.0{1,2})?|0*?\.\d{1,2}|\d{1,2}(?:\.\d{1,2})?)$" title="Enter number in rnge 0-100 only" required>
      </div>
       <div class="form-col2">
        <label>Commission in Rs</label><br>
				<input type="number" class="form-textbox form-textbox-small" 
				id="commission" name="commission" required>
			    </div><br>
			    <div class="form-col1" style="margin-top:2%;">
          <input type="checkbox" name="" id="discount">
          <label class="radio-lable">Enable checkbox for discount</label>
        </div>
			    <span id="discountdiv" style="display:none;">
          <div class="form-col2" style="margin-top:2%;">
        <label>Discount in %</label><br>
				<input type="text" class="form-textbox form-textbox-small" 
        id="discount" name="discount_per" value="0" pattern="^(100(?:\.0{1,2})?|0*?\.\d{1,2}|\d{1,2}(?:\.\d{1,2})?)$" title="Enter number in rnge 0-100 only" required>
      </div>
       <div class="form-col2" style="margin-top:2%;">
        <label>Discount in Rs</label><br>
				<input type="number" class="form-textbox form-textbox-small" id="discount" 
        name="discount" value="0" required>
      </div>
			    </span>
			    </div>
      <input type="submit" class="button btn-submit" name="submit" value="Submit">
			</form>
    </div>

        <div id="filediv" style="display:none;">
				<form method="post" action="action3.php" enctype="multipart/form-data">
            <input type="file" name="product_file" class="upload-box" accept=".csv" required>
            <input type="submit" name="upload" class="button btn-upload" value="Upload">
      </form>

      
  </div>
    	</div>
    </div>
  <div class="table-main">
  <div class="col-sm-11">
  <br>
  <div class="panel panel-default">
    <div class="panel-heading">Product Control</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="sample_data" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>S.No</th>
         <th>Id</th>
         <th>Type</th>
         <th class="col-md-5">Category</th>
       <th class="col-md-5">Subcategory</th>
       <th>GST in %</th>
       <th>Price in Rs</th>
       <th>Commission in %</th>
       <th>Commission in Rs</th>
       <th>Discount in %</th>
       <th>Discount in Rs</th>
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
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
    <script src="tableedit.js"></script>



<script type="text/javascript" language="javascript" >

var activestatus =  "Active List"; 
var inactivestatus =  "Inactive List"; 
var status;
var img;


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
                            twodigitdecimal(e.target,e.target.value);
                            
                            if(e.target.value.match(/[^0-9.]/g))
                            {
                                e.target.value = e.target.value.replace(/[^0-9]/g,'');
                            }
                        }
                       
                     
var dataTable;
  $(document).ready(function(){
    
    dataTable = $('#sample_data').DataTable({
      "processing" : true,
      "dom": "<'row'<'col-sm-3'l><'col-sm-2'<'#selecttype'>><'col-sm-3'<'#activelist'>><'col-sm-4'f>>" +
             "<'row'<'col-sm-12't>>" +
             "<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "serverSide" : true,
  "order" : [[1,"asc"]],
  "ajax" : {
    url:"action2.php",
    type:"POST",
    data: {
      fetch: "fetch",
      "status" : function(){
        try{
          console.log("trying ... ");
          return document.querySelector("#activelistbox").value;
        }catch(e){
          console.log("message "+e);
          return "Active List";
        }
      },
      "type" : function(){
        try{
          console.log("trying ... ");
          return document.querySelector("#selectbox").value;
        }catch(e){
          console.log("message "+e);
          return "All";
        }
      }
    }
  },
  'columnDefs': [
    {
      'targets': 2,
      'createdCell':  function (td, cellData, rowData, row, col) {
        //  $(td).attr('data-id', rowData.e_id ); 
        console.log("data->",rowData,cellData,td);
      }
    } ,    
    {
      "orderable" : false,
      "searchable": false,
      "targets": [0,7,9,10]
    }
  ],
  
  "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                           oSettings = this.fnSettings();
                           console.log(oSettings," == "+iDisplayIndex, " -- " +oSettings._iDisplayStart);
                           $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
                           return nRow;
    },

    "initComplete":function( settings, json){
      // document.querySelectorAll(".tabledit-delete-button").forEach(element => {
      //   element.style.paddingTop = '0';
      //   element.style.paddingBottom = '0';
      //                     element.innerHTML = `<img  height="28" src="toggleon.png" />`;
      //                     // element.style.color = "red";
                          
      // });
      document.querySelectorAll(".form-textbox-small").forEach(element => {
                          element.addEventListener("input",checkValidation);
      });
      document.querySelectorAll(".tabledit-input").forEach(element => {
                          element.addEventListener("input",checkValidation);
      });


      console.log("============================================");



      document.querySelector("#selecttype").innerHTML = `<select id="selectbox" onchange="reloadselectbox()" class="form-control input-sm"> 
                                                            <option selected data-id="0" value="all">All</option> 
                                                            <option  data-id="1" value="product">Product</option> 
                                                            <option  data-id="2" value="service">Service</option> 
                                                         </select>`;
      document.querySelector("#activelist").innerHTML = `<select id="activelistbox" onchange="reloadactivelistbox()" class="form-control input-sm" style="width: 100px  !important;"> 
                                                            <option data-id="3" selected value="Active List">${activestatus}</option> 
                                                            <option data-id="4" value="Inactive List">${inactivestatus}</option> 
                                                         </select>`;
                                                         
                                                         
    } ,
    "drawCallback": function(settings){
                console.log(5);
                              setTimeout(()=>{
                                        status = document.querySelector("#activelistbox").value;
                                        console.log(activestatus,status);
                                        if(status === activestatus){
                                        img = `<img  height="28" src="toggleimage/toggleon.png" />`;
                                        }else if(status === inactivestatus)
                                        {
                                        img = `<img  height="28" src="toggleimage/toggleoff.png" />`;
                                        }else{
                                        img = `Inactive`;
                                        }
                                        console.log(status);
                                        document.querySelectorAll(".tabledit-delete-button").forEach(element => {
                                                                    element.style.paddingTop = '0';
                                                                    element.style.paddingBottom = '0';
                                                                                    element.innerHTML = img;
                                                                                    // element.style.color = "red";
                                                                                    
                                                                });
                                     },5);
      
    }
});




$(document).on('submit','#subCategoryForm',function(e){
        e.preventDefault();
       $.ajax({
        method:"POST",
        url: "action2.php",
        data:$(this).serialize(),
        success: function(data){
          console.log(data);
        if(data==1){
            $('#sample_data').DataTable().ajax.reload();
         }
         else{
          alert("Something went wrong..");
           }
        $('#subCategoryForm').find('input').val('')
       }
   });
});

 $('#sample_data').on('draw.dt', function(){
  $('#sample_data').Tabledit({
    
   url:'action2.php',
   dataType:'json',
   columns:{
    identifier : [1, 'sub_category_id'],
    editable:[[5, 'GST'], [6, 'price'],
    [8, 'Commission'], [10, 'discount']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     $('#sample_data').DataTable().ajax.reload();
    }
   }
  });
 });
  
}); 
</script>
<script>
$(document).ready(function(){
function loadSelection(){
$.ajax({    
        type: "POST",
        url: "action2.php",  
        data: {
          select: "select",
          type: $("input[type='radio']:checked").val()
        },
        success: function(data){        
         $("#category_name").html(data); 
         console.log(data);
        }
    });
}
$("#addBtn").click(function(event){
  event.preventDefault();
      if(event.target.value == "Add +")
      {
        event.target.value = "Hide -";
        $("#radioSelection").show();
      }else{
        event.target.value = "Add +";
        $("#radioSelection").hide();
        $('#categoryDiv').hide();
        $("#productForm").hide();
        document.querySelectorAll("input[type='radio']").forEach(element=>element.checked=false);
      }
  });

 $('input[type="radio"]').click(function(){
      loadSelection();
      // console.log("clicked",type);
      if($(this).prop('checked')){
        $('#categoryDiv').show();
      }
      else{
        $('#categoryDiv').hide();
      }
    });

$('#check').change(function(){
      if($(this).prop('checked')){
        $('#filediv').show();
      }
      else{
        $('#filediv').hide();
      }
    });

    $('#discount').change(function(){
      if($(this).prop('checked')){
        $('#discountdiv').show();
      }
      else{
        $('#discountdiv').hide();
      }
    });

$(document).on('submit','#categoryForm',function(e){
   e.preventDefault();
   var category = document.querySelector('#category').value;
   var category_name = document.querySelector("input[name='category_name']").value;
   if(category == '' && category_name == '')
   {
     alert('Please select or enter new category');
     return;
   }
   console.log(category,category_name);
    $.ajax({
        method:"POST",
        url: "action2.php",
        data:$(this).serialize(),
        success: function(data){
          console.log(data);
        if(data==1){
          document.querySelector("#category").value = '';
          loadSelection();
          alert("Category added successfully");
          $("input[name='category_name']").click();
         }else if(data == '3')
         {
          loadSelection();
          $("#productForm").show();
         }else if(data == '2')
         {
           alert("Category already exists...");
         }
         else{
          alert("can not save");
        }
         $('#categoryForm').find('input').val('')
       }
   });
    });
});
                                                        function reloadselectbox(event)
                                                        {
                                                          if(document.querySelector("#selectbox").value == "product" || document.querySelector("#selectbox").value == "service")
                                                          {
                                                            console.log("product and service");
                                                            document.getElementById("activelistbox").options.selectedIndex = 0;
                                                            $("#activelistbox > option:last").hide();
                                                          }else
                                                          {
                                                            $("#activelistbox > option:last").show();
                                                          }
                                                            dataTable.ajax.reload();
                                                        }
                                                        function reloadactivelistbox(event)
                                                        {
                                                          if(document.querySelector("#activelistbox").value == "Inactive List")
                                                          {
                                                            console.log("Inactive List");
                                                            document.getElementById("selectbox").options.selectedIndex = 0;
                                                            // $("#selectbox > option:last").hide();
                                                            $("#selectbox > option:nth-child(2)").hide();
                                                            $("#selectbox > option:nth-child(3)").hide();
                                                          }else
                                                          {
                                                            $("#selectbox > option:nth-child(2)").show();
                                                            $("#selectbox > option:nth-child(3)").show();
                                                          }
                                                            dataTable.ajax.reload();
                                                        }
</script>
</html>
