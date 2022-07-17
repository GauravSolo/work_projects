<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Subscription Report</title>
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
      <div class="col-12 mt-4" id="showmessage"></div>
        <div class="row  d-flex justify-content-center align-items-center mt-4 row-container" >
              <div class="col-12 mt-2 d-flex justify-content-between align-items-center pb-2" style="border-bottom:  2px solid black;" >
                <h4 class="m-0">Only Active and Attached Plan</h4>
              </div>
              <div class="col-12 mt-3">
                <div class="table-responsive">
                      <table id="cust_plans_table" class="table table-striped table-hover">
                      <thead>
                      <tr>
                          <th scope="col" colspan="10">
                            <div class="row d-flex justify-content-around align-items-center">
                                <div class="col-sm-6">Customer Count : <span id ="cust_count" style="font-weight: bold;"></span></div>
                                <div class="col-sm-6">Package Count : <span id ="pack_count" style="font-weight: bold;"></span></div>
                            </div>
                          </th>
                        </tr>
                        <tr>
                          <th scope="col">S.N.</th>
                          <th scope="col">Customer Name</th>
                          <th scope="col">Customer Mobile</th>
                          <th scope="col">Package Count</th>
                          <th scope="col">Plan Name</th>
                          <th scope="col">Details</th>
                        </tr>
                      </thead>
                      <tbody id="cust_plans_body">
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

    var cust_plans_table='';

    $(document).ready(function () {

      cust_plans_table = $('#cust_plans_table').DataTable({
                  "dom":"<'row w-100'<'col-12't>>",
                  "paging": false,
                  "autoWidth": false,
                  "processing" : true,
                  "ajax" : {
                  url: 'get_and_submit_plan.php',
                  type:"POST",
                  data: {
                      customer_plan : "active"
                  }
                  },
                  columns: [
                      { data: 'sno' },
                      { data: 'name' },
                      { data: 'mobile' },
                      { data: 'count' },
                      { data: 'planname' },
                      {
                          className: '',
                          orderable: false,
                          data: 'detail',
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
                    console.log(json);

                    if(json.message == "0"){

                        $("#cust_count").val(json.cust_counts);
                        $("#pack_count").val(json.pack_counts);
                    }else {

                      document.querySelector("#showmessage").innerHTML = `<div class="alert alert-danger" role="alert">
                                                            Something went wrong
                                                          </div>`;
                    }



                  },
                  "drawCallback": function( settings) {
                  }

              });

              $('#cust_plans_body').on('click', 'td.details-control', function (event) {
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



    </script>
   
  </body>
</html>