<?php
include('config.inc.php');

include ('webservice/get_customer_count_for_retailer.php');
include ('webservice/get_sale.php');
$a = 10;
$prevmonth1 = date('m Y', strtotime('-' . $a . ' months'));

$this_month = date("Y-m");
$last_month = date("Y-m", strtotime("first day of previous month"));

$Retailer_Id = $_SESSION['Retailer_id'];
$Retailer_Id2 = $Retailer_Id;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/rise-retail-web-application.webflow.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    
    <style>
        table.dataTable{
            border-collapse: collapse !important;
            margin-bottom: 1rem !important;
        }

    .monthlink{
    color: rgb(240,143,43);
    text-decoration: none;
}
.monthlink:hover{
    color: rgb(240,143,43);
    cursor: pointer;
    /* text-decoration: underline; */
    border-bottom: 2px solid rgb(240,143,43);
}

.table{
    border-top: 2px solid rgb(240,143,43) !important;
}
/* table td + td { border-left:2px solid rgb(240,143,43); } */


.attr{
    background:rgb(240,143,43) !important;
    border:1px solid #fff;
    text-align: center;
    padding-top:10px;
    color:#fff;
}

.tab_input{
    border:1px solid rgb(240,143,43) !important ;
    border-radius:10px !important;
    box-shadow: 0px 0px 15px 1px rgba(250,153,53, 0.3) !important;
    outline:none;
}
.label{
    color: rgb(240,143,43) !important;
}
.year.col{
    border-left: 1px solid !important;
}
table th{ border-right:2px solid rgb(240,143,43); }

.monthheading{
    width: 200px;
    text-align:center;
}
td{
    text-align: center;
    white-space: nowrap !important;
}
.nowrap{
    white-space: nowrap;
}
.searchbox{
    border-color: rgb(240,143,43) !important;
}
.searchbox:focus{
    border-color: rgb(240,143,43) !important;
    box-shadow: 1px 1px 2px rgb(240,143,43), -1px -1px 2px rgb(240,143,43) !important;
    outline: 0 none !important;
}
.startdate, .enddate{
    width: 170px;
}
.activeLink{
    border-bottom: 2px solid rgb(240,143,43);
}

.longword{
    display: flex;
    width: 150px;
    height: 100%;
    
    margin: 0;
    padding: 0;
    border: 0;
    height: 100%;
    overflow-x: scroll;
}
.longtd{
    height: 60px;
}

.longword::-webkit-scrollbar-corner {
  display: none;
}
.longword::-webkit-scrollbar,.longword::-webkit-scrollbar {
  width: 3px;
  height: 5px;
}

.longword::-webkit-scrollbar-thumb,.longword::-webkit-scrollbar-thumb {
  border-radius: 10px;
  /* box-shadow: inset 0 0 6px rgba(0,0,0,.3); */
  background-color: grey;
  opacity: .5;
}

table.dataTable>thead .sorting:before, table.dataTable>thead .sorting:after, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_desc_disabled:before, table.dataTable>thead .sorting_desc_disabled:after{
    /* opacity: 0.8 !important; */
    font-size: 20px !important;
    color: red !important;
}


#fir > thead > tr > th:nth-child(8):before,
#fir > thead > tr > th:nth-child(8):after,#fir > thead > tr > th:nth-child(9):before,
#fir > thead > tr > th:nth-child(9):after,#sec > thead > tr > th:nth-child(6):before,
#sec > thead > tr > th:nth-child(6):after {
    /* content: "" !important; */
    display: none !important;
}
table tr{
    border-bottom-color: inherit !important;
}


.dispicon{
    display:none !important;
}
.dispbtn{
    display: inline !important;
}

input[type="search"]{
    box-sizing: border-box !important;
}

.dataTables_length{
    display: flex;
    justify-content: end;
}
    </style>
  </head>
  <body>
  		<?php
  			include "navbar.php";
  		?>
    <section class="home-section">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="row mt-2 mb-4" style="
     display: flex;
     "> 
    <a href="do_expense.php"   class="w-button submit-button" style="text-align: center;width: 19%;">Add Expense</a>
    <a href="add_vendor.php"   class="w-button submit-button" style="text-align: center;width: 19%;">Add Vendor</a>
    <a href="expense_category.php"   class="w-button submit-button" style="text-align: center;width: 19%;">Add Category</a>
    <a href="expense_dashboard.php"   class="w-button submit-button" style="text-align: center;width: 19%;">Expense Dashboard</a>
    <a href="expense_report.php"   class="w-button submit-button" style="text-align: center;width: 19%;">Report</a>


</div>
        </div>
    </div>
        <div class="row  px-3 mb-4">
                            <div class="col-12 tab_input ">
                                              <div class="row mb-3 pb-3">
                                                    <div class="col-12" >
                                                        <div class="row">
                                                            <div class="col-12 mt-3">
                                                                <h3 class="label" style="border-bottom:1px solid rgb(240,143,43);">Expense Summary Report</h3>
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped " style="width:100%;border:2px solid rgb(240,143,43) !important;border-radius:20px;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th scope="col" class="year text-center col label " style="width:500px;"></th>
                                                                                            <?php
                                                                                                $row = array(
                                                                                                    "January","February","March","April","May","June","July","August","September","October","November","December"
                                                                                                );
                                                                                                $i = 0;
                                                                                                while($i < sizeof($row))
                                                                                                {                      
                                                                                                    if($i+1 == Date('m'))
                                                                                                    {
                                                                                                        $activeLink = 'activeLink';
                                                                                                    }else
                                                                                                    {
                                                                                                        $activeLink = '';
                                                                                                    }
                                                                                                    echo "<th scope='col' class='monthheading' ><a class='monthlink $activeLink' data-month='$i'>{$row[$i++]}</a></th>";
                                                                                                }
                                                                                            ?>
                                                                                            </tr>
                                                                                    </thead>
                                                                                    <tbody  style="border-color:rgb(240,143,43) !important;" id="ledgerreport">
                                                                                        <tr>
                                                                                            <th  class="label col nowrap">Expense Count</th>
                                                                                            <td colspan="12">Fetching Data</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <th  class="label col nowrap">Total Expense Amount</th>
                                                                                                <td colspan="12">Loading ...</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                            </table>  
                                                                            <div class="float-start label backwardmonths" style="cursor:pointer;"><i class="fas fa-angle-double-left label"></i> 12 months</div>
                                                                            <div class="float-end label forwardmonths" style="cursor:pointer;">12 months <i class="fas fa-angle-double-right label"></i></div>
                                                                        </div>                                                              
                                                            </div> 
                                               </div>
                                              <div class="row" style="margin-bottom: 20px; padding-bottom: 25px; border-bottom: 1px solid rgb(240,143,43);">
                                              <div class="col-12 mt-3">
                                                                <h3 class="label" style="border-bottom:1px solid rgb(240,143,43);">Paid Expense</h3>
                                                            </div>
                                                  <div class="col-12" id="msg">

                                                  </div>
                                                <div class="col-12 mt-2">
                                                    
                                                                <div class="table-responsive">
                                                                            <table class="table table-striped " id="fir" style="width:100%;border:2px solid rgb(240,143,43) !important;border-radius:20px;">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th colspan="9">
                                                                                                        <div class="row m-0 ">
                                                                                                            <div class="col-6 label nowrap ">
                                                                                                                Expense Count: <span class="text-dark txn_count">0</span>
                                                                                                            </div>
                                                                                                            <div class="col-6 label nowrap ">
                                                                                                                Total Expense Amount: <span class="text-dark txn_sum">0</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                            </th>
                                                                                            </tr>
                                                                                            <tr>

                                                                                            <th colspan="9" class="p-0">
                                                                                                <div class="row m-0">
                                                                                                    <div class="col-5 m-0 py-2 text-center " style="color:rgb(240,143,43);">
                                                                                                        <div class="row d-flex align-items-center justify-content-center">
                                                                                                            <div class="col-6 d-flex justify-content-center align-items-center ">
                                                                                                                <div class="row d-flex justify-content-center align-items-center nowrap">
                                                                                                                    <div class="col my-auto"><span class="">From</span></div>
                                                                                                                    <div class="col"><input type="date"  class="form-control startdate mx-auto flex-shrink-0 tab_input" id="startdate"/></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-6 d-flex justify-content-center align-items-center">
                                                                                                                <div class="row d-flex justify-content-center align-items-center">
                                                                                                                        <div class="col my-auto" style="width:62.97px;"><span class="">To</span></div>
                                                                                                                        <div class="col"><input type="date"  class="form-control enddate mx-auto flex-shrink-0 tab_input"  id="enddate"/></div>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-2 m-0 py-2 text-center d-flex justify-content-center align-items-center" style="color:rgb(240,143,43);border-left:2px solid rgb(240,143,43);border-right:2px solid rgb(240,143,43);"><button class="btn submitbtn" style="background-color:rgb(240,143,43);cursor:pointer;color:white;">Submit</button></div>
                                                                                                    <div class="col-5 m-0 py-2 text-center my-auto" style="color:rgb(240,143,43);"><input id="myInput"  class="form-control me-2 searchbox" type="search" placeholder="Search Item" aria-label="Search"></div>
                                                                                                </div>
                                                                                            </th>
                                                                                        </tr>
                                                                                                <tr>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:100px;">S.N.</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:500px;">Expense Name</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:500px;">Vendor Name</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:200px;">Date</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:500px;">Amount</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:500px;">Payment Type</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:500px;">Remark</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:100px;">Edit</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:100px;">Cancel</th>                                                                                
                                                                                                </tr>
                                                                                            
                                                                                    </thead>
                                                                                    <tbody class="tablereportbody"  style="border-color:rgb(240,143,43) !important;">
                                                                                    </tbody>
                                                                            </table>
                                                                            
                                                                </div>                                                              
                                                        </div> 
                                                    </div>     
                                                    <div class="row">
                                                    <div class="col-12 mt-3">
                                                                <h3 class="label" style="border-bottom:1px solid rgb(240,143,43);">Due Expense</h3>
                                                            </div>
                                                <div class="col-12 mt-2">
                                                    
                                                                <div class="table-responsive">
                                                                            <table class="table table-striped " id="sec" style="width:100%;border:2px solid rgb(240,143,43) !important;border-radius:20px;">
                                                                                        <thead>
                                                                                                <tr>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:100px;">S.N.</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:500px;">Expense Name</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:500px;">Vendor Name</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:200px;">Date</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:500px;">Amount</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:500px;">Status</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:100px;">Payment Type</th>
                                                                                                    <th scope="col" class="year nowrap text-center col label " style="width:500px;">Remark</th>                                                                              
                                                                                                </tr>
                                                                                            
                                                                                    </thead>
                                                                                    <tbody class="tablereportbodysec"  style="border-color:rgb(240,143,43) !important;">
                                                                                    
                                                                                    </tbody>
                                                                            </table>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                <?php
$query1 = "SELECT * FROM `expense` WHERE `Retailer_Id`=$Retailer_Id2 and expense.payment = 'due'";
$query_params = array(
);

//execute query
try {
    $stmt = $db->prepare($query1);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    
}
// Finally, we can retrieve all of the found rows into an array using fetchAll 
$rows = $stmt->fetchAll();
//   echo $query;
$sum1 = 0;
if ($rows) {

    foreach ($rows as $row) {
        $sum1 += $row['Price'];
    }
}
$dateObj = DateTime::createFromFormat('!m', $month);
$monthName = $dateObj->format('F');


//$cnt = "SELECT count(*) as count FROM `expense` WHERE `Retailer_Id`=$Retailer_Id2 and expense.payment = 'due' and MONTH(date_of_expense) = $month AND YEAR(date_of_expense) = $year";
////echo $query;
//   $output = mysqli_query($con,$cnt) or die('Error, query failed');
//   $row = mysqli_fetch_array($output,MYSQLI_ASSOC);

$query1 = "SELECT count(*) as count2 FROM `expense` WHERE `Retailer_Id`=$Retailer_Id2 and expense.payment = 'due'";
$query_params = array(
);

//execute query
try {
    $stmt = $db->prepare($query1);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    
}
// Finally, we can retrieve all of the found rows into an array using fetchAll 
$rows = $stmt->fetchAll();

$total1 = 0;
if ($rows) {

    foreach ($rows as $row) {
        $total1 += $row['count2'];
    }
}

//   $total1 = $rows['count2'];

echo '<div class="tabledata" style="
    display: flex;
">
    <p id="1" style="
    margin: 0 30px;
">Count of Due Expenses :' . $total1 . '</b>
    </p>
   <p id="2" style="
    margin: 0 30px;
">
   Total Due Expenses :' . $sum1 . '</b>
   </p>
</div>';
?>
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
     </div>     
    </div>
    </section>

                                                                                            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>


const submitbtn = document.querySelector('.submitbtn');
 
let year = document.querySelector('.year');
const backwardmonths = document.querySelector('.backwardmonths');
const forwardmonths = document.querySelector('.forwardmonths');
const startdate = document.querySelector('.startdate');
const enddate = document.querySelector('.enddate');
const monthlinks = document.querySelectorAll('.monthlink');
const ledgerreport = document.querySelector('#ledgerreport');
const txn_count = document.querySelector('.txn_count');
const txn_sum = document.querySelector('.txn_sum');

let clickonsubmit = 0, clickonmonth=1;
var originalinvres;
var startFullDate,endFullDate;



// months names
const monthnames = ["January","February","March","April","May","June","July","August","September","October","November","December"];


// current Year 
var date = new Date();
year.innerText = date.getFullYear();


// active months 
function activeLink(element){
    monthlinks.forEach(element=>{
        element.classList.remove('activeLink');
    });
    element.classList.add('activeLink');
}



// check current year for navigation
function checkCurrentYear()
{
    var currYear = date.getFullYear();
    var getYear =  Number(year.innerText);
    var startYear = 2014;
    if(getYear == currYear)
    {
        forwardmonths.style.display = "none";
    }else{
        forwardmonths.style.display = "block";
    }
    if(getYear == startYear)
    {
        backwardmonths.style.display = "none";
    }else{
        backwardmonths.style.display = "block";
    }
}


// tranverse through year 
backwardmonths.addEventListener('click',(e)=>{
    var currYear = date.getFullYear();
    var getYear =  Number(year.innerText);
    year.innerText = getYear-1;
    activeLink(monthlinks[0]);
    checkCurrentYear();
    insert_fetched_customers_invoice_summary();
});
forwardmonths.addEventListener('click',(e)=>{
    var currYear = date.getFullYear();
    var getYear =  Number(year.innerText);
    year.innerText = (getYear+1) > currYear ? getYear: getYear+1;
    activeLink(monthlinks[0]);
    checkCurrentYear();
    insert_fetched_customers_invoice_summary();
});



// click event on months 
monthlinks.forEach(element => {
    element.addEventListener('click',(e)=>{
        activeLink(e.target);
        clickonmonth = 1;
        fetch_expense_table();
    });
});

checkCurrentYear();




      startdate.value = '';
      enddate.value = '';

    var derivedYear = Number(year.innerText);
    var derivedMonth = Number(document.querySelector('.activeLink').getAttribute('data-month'));
    console.log(derivedYear,derivedMonth);
    startFullDate = new Date(derivedYear, derivedMonth,01);console.log(startFullDate);
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
                console.log(startFullDate);

    startFullDate = startFullDate.split('/').reverse().join('-');
    endFullDate = endFullDate.split('/').reverse().join('-');

    console.log(startFullDate);
    

    $("#fir").dataTable({
    "bProcessing": true,

    // "sAjaxSource": "old_paid.php",
    "ajax": {
        "url": "paid.php",
        "type": "POST",
        "data": function(d){
         d.startDate = startFullDate;
         d.endDate = endFullDate;
      }
    },
    "sDom": "<'row'<'col-12'l'random'>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
    "sPaginationType": "full_numbers",
    "aoColumns": [

        {"mData": "Sr_no"},
        {"mData": "Category_Name"},
        {"mData": "Vendor_Name"},
        {"mData": "date"},
        {"mData": "Price"},
        {"mData": "Payment_Mode"},
        {"mData": "remark"},
        {"mData": "edit"},
        {"mData": "cancel"}
    ],
    'columnDefs': [
         {
            'targets': 3,
            'createdCell':  function (td, cellData, rowData, row, col) {
               $(td).attr('data-id', rowData.e_id ); 
            }
         },
         {
            'targets': 4,
            'createdCell':  function (td, cellData, rowData, row, col) {
               $(td).attr('data-id', rowData.e_id ); 
            }
         },
         {
             'targets': 5,
             'createdCell':  function (td, cellData, rowData, row, col) {
                $(td).attr('data-id', rowData.e_id ); 
             }
          }
     ],
     "drawCallback": function(settings) {
        // console.log(settings,settings.json);
        //do whatever  
        console.log('djdd');
        txn_count.innerText = $("#fir").DataTable().rows({search:'applied'}).count();
        },
        "footerCallback": function (row, data, start, end, display) {                
                //Get data here 
                console.log("==>",data);
                //Do whatever you want. Example:
                var totalAmount = 0;
                for (var i = 0; i < data.length; i++) {
                    totalAmount += Number(data[i]['Price']);
                }
                console.log(totalAmount);
                txn_sum.innerText = totalAmount;
       }

});


  function fetch_expense_table(){

    startFullDate = startdate.value;
    endFullDate = enddate.value;
    // activemonth = document.querySelector('.monthlink.activeLink').innerText.trim();
    // activeyear = year.innerText.trim();
    if(startFullDate == '' && endFullDate == '' && clickonsubmit == 1)
    {
        return;
    }


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
    console.log(startFullDate);
    $("#fir").DataTable().ajax.reload(null,false);

    clickonsubmit = 0;
    clickonmonth = 1;
}


submitbtn.addEventListener('click',()=>{
    clickonsubmit = 1;
    clickonmonth = 0;
    fetch_expense_table();
});



       

$('#myInput').on( 'keyup', function () {
    console.log('typing');
    $("#fir").DataTable().search( this.value ).draw();
    txn_count.innerText = $("#fir").DataTable().rows({search:'applied'}).count();
    console.log($("#fir").DataTable().rows({search:'applied'}));
    sumcolumn();
} );

function sumcolumn(){
            var data = $("#fir").DataTable().rows({search:'applied'}).data();
            console.log('--->',data);
            var totalPrice = 0;
                for (var i = 0; i < data.length; i++) {
                    totalPrice += Number(data[i]['Price']);
                }
                console.log(totalPrice);
                txn_sum.innerText = totalPrice;
}


$("#sec").dataTable({
    "bProcessing": true,

    "sAjaxSource": "due.php",
    "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
    "sPaginationType": "full_numbers",
    "aoColumns": [
                {"mData": "Sr_no"},
                {"mData": "Category_Name"},
                {"mData": "Vendor_Name"},
                {"mData": "date"},
                {"mData": "Price"},
                {"mData": "Status"},
                {"mData": "Payment_Mode"},
                {"mData": "remark"}
    ]
    
});


const searchsec =  document.querySelector('#sec_filter  input');
searchsec.classList.add('searchbox');
searchsec.setAttribute('placeholder','Search Transaction');

function edititem(curr,id){
    document.querySelectorAll(`td[data-id='${id}']`).forEach((element,num)=>{element.contentEditable="true"; if(num==0)element.focus();});
    var [first, second ,third] = document.querySelectorAll(`td[data-id='${id}']`);
    first.style = "border: 2px solid rgb(240,143,43); border-right: none;background: #e5e1e1;";
    second.style = "border-top: 2px solid rgb(240,143,43);border-bottom: 2px solid rgb(240,143,43);background: #e5e1e1;";
    third.style = "border: 2px solid rgb(240,143,43); border-left: none;background: #e5e1e1;";
    curr.classList.add('dispicon');
    curr.nextElementSibling.classList.add('dispbtn');

    
}
function deleteitem(id){
	/*
    $.ajax({
        type: "POST",    
        dataType: "json",
        url: "expense_delete.php",
        data: { 'id': id
        },
        success: function (response) {
            if(response.error == '0')
            {
                document.querySelector('#msg').innerHTML = response.res;

            }else if(response.error == '1')
            {
                document.querySelector('#msg').innerHTML = response.res;
            }
            setTimeout(()=>{document.querySelector('#msg').innerHTML = ''},4000);
            $('#fir').DataTable().ajax.reload();
        }

    });
    */
    var postTo =  "expense_delete.php";
         var data = JSON.stringify({
'id': id
        
            });
        
     jQuery.post(postTo, data,
                    function (response) {
                        console.log(response);
                         if(response.error == '0')
				            {
				                document.querySelector('#msg').innerHTML = response.res;

				            }else if(response.error == '1')
				            {
				                document.querySelector('#msg').innerHTML = response.res;
				            }
                            //  window.location.href = "expense_dashboard.php";
			
				            setTimeout(()=>{document.querySelector('#msg').innerHTML = ''},4000);
                            $('#fir').DataTable().ajax.reload(null, false);
                        return false;
                    }, 'JSON');
}

function updateitem(curr,id){

var [date, Price, payment_type] = document.querySelectorAll(`td[data-id='${id}']`);

console.log(date, Price, payment_type,document.querySelectorAll(`td[data-id='${id}']`));

var postTo =  "expense_edit.php";
         var data = JSON.stringify(
            { 'id': id,
                'date_of_expense': (date.innerText).trim(),
                'Price': (Price.innerText).trim(),
                'payment_type': (payment_type.innerText).trim()
            }
         );
        
     jQuery.post(postTo, data,
                    function (response) {
                        if(response.error == '0')
            {
                document.querySelector('#msg').innerHTML = response.res;

            }else if(response.error == '1')
            {
                document.querySelector('#msg').innerHTML = response.res;
            }
            setTimeout(()=>{document.querySelector('#msg').innerHTML = ''},4000);
            document.querySelectorAll(`td[data-id='${id}']`).forEach((element,num)=>{element.contentEditable="false";element.style="";});
            curr.previousElementSibling.classList.remove('dispicon');
            curr.classList.remove('dispbtn');
            
				           
                        return false;
                    }, 'JSON');



    // $.ajax({
    //     type: "POST",    
    //     dataType: "json",
    //     url: "expense_edit.php",
    //     data: { 'id': id,
    //             'date_of_expense': (date.innerText).trim(),
    //             'Price': (Price.innerText).trim(),
    //             'payment_type': (payment_type.innerText).trim()
    //     },
    //     success: function (response) {
    //         if(response.error == '0')
    //         {
    //             document.querySelector('#msg').innerHTML = response.res;

    //         }else if(response.error == '1')
    //         {
    //             document.querySelector('#msg').innerHTML = response.res;
    //         }
    //         setTimeout(()=>{document.querySelector('#msg').innerHTML = ''},4000);
    //         document.querySelectorAll(`td[data-id='${id}']`).forEach((element,num)=>{element.contentEditable="false";});
    //         curr.previousElementSibling.classList.remove('dispicon');
    //         curr.classList.remove('dispbtn');
    //     }

    // });
}







function updateStatus(e_id, test, retailer_id) {

    var id = e_id;
    var status = test;

    var retailer_id = retailer_id;


    $.ajax({//create an ajax request to load_page.php
        type: "POST",       
        dataType: "html",
        url: "webservice/change-payment.php",
        data: {'Status': status,
                'Enquiry_Id': id,
                'Test': status,
                'Retailer_id': retailer_id
        },
        success: function (response) {
            //alert(response);

            alert("status updated.");
            window.location.href = 'expense_dashboard.php';
        }

    });

}






// fetch invoice summary 
        function fetch_summary() {
            var postTo = 'get_expense_summary_report_detail.php';
            var data = JSON.stringify({

            });
            /* $('#loaderd').show();
             $('#gif').css('visibility', 'visible');					 */
            jQuery.post(postTo, data,
                    function (data) {
                        console.log(data);
                        if (data.error == '1') {
                            inverror = `<tr>
                                <th  class='label col nowrap'>Expense Count</th>
                                <td colspan='12'>Something Went Wrong</td>
                                </tr>
                                <tr>
                                        <th  class='label col nowrap'>Expense Amount</th>
                                        <td colspan='12'>Couldnt fetch Data</td>
                                </tr>`;
                            ledgerreport.innerHTML = inverror;
                            return false;
                        } else {
                            originalinvres = data.res;
                            insert_fetched_customers_invoice_summary();
                        }
                        return false;
                    }, 'JSON');
        }
        fetch_summary();



// insert fetched customer invoice summary 
        function insert_fetched_customers_invoice_summary() {

            var invres = originalinvres;
            var invyear = Number(year.innerText.trim());

            var i = 0;
            // invoice_count
            var invrowtd = '';
            invrowtd += `<tr>
                        <th  class="label col nowrap">Expense Count</th>`;

            while (i < 12)
            {
                invrowtd += `
                <td>${invres[invyear][monthnames[i]]['Expense_Count']}</td>         
            `;

                i++;
            }
            invrowtd += `</tr>`;

            // invoice amount
            i = 0;
            invrowtd += `<tr>
                        <th  class="label col nowrap">Expense Amount</th>`;
            while (i < 12)
            {
                invrowtd += `
                <td>${parseFloat(invres[invyear][monthnames[i]]['Expense_Amount']).toFixed(2)}</td>         
            `;

                i++;
            }
            invrowtd += `</tr>`;
            ledgerreport.innerHTML = invrowtd;
        }
    </script>
    <!-- <script src="script/transaction_report.js"></script> -->
  


<?php
include('footer.php');
?>