<html>
 <head>
  <title>Shop Management</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
 </head>
 <body>
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
 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var dataTable = $('#sample_data').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"fetch.php",
   type:"POST"
  }
 });

$(document).on('submit','#subCategoryForm',function(e){
        e.preventDefault();
       $.ajax({
        method:"POST",
        url: "insert.php",
        data:$(this).serialize(),
        success: function(data){
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