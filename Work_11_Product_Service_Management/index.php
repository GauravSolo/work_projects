<?php 
include('database_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Retail Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
</style>
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
     <div class="column1">
          <div class="button-main">
         	<form id="categoryForm" method="post">
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
            name="category_name" placeholder="Search.." required>
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
     <div class="vl"></div>
       <div class="column4">
    	<div class="form-container">
			<form id="subCategoryForm" method="post">
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
				<form method="post" action="action.php" enctype="multipart/form-data">
        <input type="file" name="product_file" class="upload-box" required>
        <input type="submit" name="upload" class="button btn-upload" value="Upload">
      </form>
  </div>
    	</div>
    </div>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
 </head>
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
<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var dataTable = $('#sample_data').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"action.php",
   type:"POST",
   data: {
     fetch: "fetch"
   }
  }
 });

$(document).on('submit','#subCategoryForm',function(e){
        e.preventDefault();
       $.ajax({
        method:"POST",
        url: "action.php",
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
   url:'action.php',
   dataType:'json',
   columns:{
    identifier : [1, 'sub_category_id'],
    editable:[[5, 'GST'], [6, 'price'],[7, 'Commission_per'], 
    [8, 'Commission'],[9, 'discount_per'], [10, 'discount']]
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
        url: "action.php",  
        data: {
          select: "select"
        },
        success: function(data){        
         $("#category_name").html(data); 
        }
    });
}
loadSelection();
$("#addBtn").click(function(event){
   event.preventDefault();
    $("#radioSelection").show();
  });

 $('input[type="radio"]').click(function(){
      var type = $(this).val(); 
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
    $.ajax({
        method:"POST",
        url: "action.php",
        data:$(this).serialize(),
        success: function(data){
          console.log(data);
        if(data==1){
        loadSelection();
         }
         else{
          alert("can not save");
        }
         $('#categoryForm').find('input').val('')
       }
   });
    $("#productForm").show();
    });
});
</script>
</html>
