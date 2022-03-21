<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Invoice_report</title>
    <link rel="stylesheet" href="css/invoice_report.css">
  </head>
  <body>

    <?php
        include "navbar.php";
    ?>
    <section class="home-section">
    <div class="container-fluid">
        <div class="row  px-3 my-4">
                            <div class="col-12 tab_input ">
                            <!-- style="border-bottom:2px solid rgb(240,143,43);" -->
                                              <div class="row mb-3 pb-3" >
                                                <div class="col-12" >
                                                    <div class="row">
                                                        <div class="col-12 mt-3">
                                                            <h3 class="label" style="border-bottom:1px solid rgb(240,143,43);">Invoice Summary Report</h3>
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
                                                                                    <th  class="label col nowrap">Invoice Count</th>
                                                                                    <td colspan="12">Fetching Data</td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <th  class="label col nowrap">Invoice Amount</th>
                                                                                        <td colspan="12">Loading ...</td>
                                                                                </tr>
                                                                                </tbody>
                                                                        </table>  
                                                                        <div class="float-start label backwardmonths" style="cursor:pointer;"><i class="fas fa-angle-double-left label"></i> 12 months</div>
                                                                        <div class="float-end label forwardmonths" style="cursor:pointer;">12 months <i class="fas fa-angle-double-right label"></i></div>
                                                                    </div>                                                              
                                                        </div> 
                                                    </div>  
                                                </div>
                                                </div>
                                              <div class="row">
                                                <div class="col-12 mt-2">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped " style="width:100%;border:2px solid rgb(240,143,43) !important;border-radius:20px;">
                                                                                <thead>
                                                                                    <tr>
                                                                                            <th colspan="6" class="p-0">
                                                                                                <div class="row m-0">
                                                                                                    <div class="col-5 m-0 py-2 text-center " style="color:rgb(240,143,43);">
                                                                                                        <div class="row d-flex align-items-center justify-content-center">
                                                                                                            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center ">
                                                                                                                <div class="row d-flex justify-content-center align-items-center nowrap">
                                                                                                                    <div class="col my-auto"><span class="">From</span></div>
                                                                                                                    <div class="col"><input type="date"  class="form-control startdate mx-auto flex-shrink-0 tab_input" id="startdate"/></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                                                                                                                <div class="row d-flex justify-content-center align-items-center">
                                                                                                                        <div class="col my-auto" style="width:62.97px;"><span class="">To</span></div>
                                                                                                                        <div class="col"><input type="date"  class="form-control enddate mx-auto flex-shrink-0 tab_input"  id="enddate"/></div>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-2 m-0 py-2 text-center d-flex justify-content-center align-items-center" style="color:rgb(240,143,43);border-left:2px solid rgb(240,143,43);border-right:2px solid rgb(240,143,43);"><button class="btn submitbtn" style="background-color:rgb(240,143,43);cursor:pointer;color:white;">Submit</button></div>
                                                                                                    <div class="col-5 m-0 py-2 text-center my-auto" style="color:rgb(240,143,43);"><input class="form-control me-2 searchbox" type="search" placeholder="Search Customer" aria-label="Search"></div>
                                                                                                </div>
                                                                                            </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                        <th scope="col" class="year nowrap text-center col label " style="width:50px;">S.N.</th>
                                                                                        <th scope="col" class="year nowrap text-center col label " style="width:300px;">Customer Name</th>
                                                                                        <th scope="col" class="year nowrap text-center col label " style="width:100px;">Mobile Number</th>
                                                                                        <th scope="col" class="year nowrap text-center col label " style="width:100px;">Amount</th>
                                                                                        <th scope="col" class="year nowrap text-center col label " style="width:100px;">Date <i class="fas fa-caret-down sortdate" style="cursor:pointer;"></i></th>
                                                                                        <th scope="col" class="year  nowrap text-center col label " style="width:100px;">View Invoice</th>
                                                                                    </tr>
                                                                                    
                                                                            </thead>
                                                                            <tbody class="tablereportbody"  style="border-color:rgb(240,143,43) !important;" id="ledgerreport">
                                                                            <tr> <td colspan='6'><h4 style='color:rgb(240 143 43);' class='text-center'> Loading... </h4>  </td> <tr>
                                                                            </tbody>
                                                                    </table>
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
    <script src="script/invoice_report.js"></script>
  </body>
</html>