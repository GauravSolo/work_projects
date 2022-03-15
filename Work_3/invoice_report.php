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

    <div class="container">
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
                                                                                    <td>20</td>
                                                                                    <td>33</td>
                                                                                    <td>12</td>
                                                                                    <td>40</td>
                                                                                    <td>20</td>
                                                                                    <td>22</td>
                                                                                    <td>23</td>
                                                                                    <td>54</td>
                                                                                    <td>34</td>
                                                                                    <td>10</td>
                                                                                    <td>08</td>
                                                                                    <td>30</td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <th  class="label col nowrap">Invoice Amount</th>
                                                                                        <td>1000</td>
                                                                                        <td>350</td>
                                                                                        <td>200</td>
                                                                                        <td>250</td>
                                                                                        <td>320</td>
                                                                                        <td>430</td>
                                                                                        <td>340</td>
                                                                                        <td>2300</td>
                                                                                        <td>433</td>
                                                                                        <td>222</td>
                                                                                        <td>120</td>
                                                                                        <td>900</td>
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
                                                                                        <!-- <th scope="col" colspan="2" class="year nowrap text-center col label " style="width:500px;">2022</th>
                                                                                        <th scope="col" colspan="2" class="year nowrap text-center col label " style="width:500px;">2022</th>
                                                                                        <th scope="col" colspan="2" class="year nowrap text-center col label " style="width:500px;">2022</th>
                                                                                        </tr> -->
                                                                                        <tr>
                                                                                            <th colspan="6" class="p-0">
                                                                                                <div class="row m-0">
                                                                                                    <div class="col-5 m-0 py-2 text-center " style="color:rgb(240,143,43);">
                                                                                                        <div class="row d-flex align-items-center justify-content-center">
                                                                                                            <div class="col-5 d-flex align-items-center ">
                                                                                                                <span class="px-3">From</span> <input type="date"  class="form-control startdate tab_input" id="startdate"/>
                                                                                                            </div>
                                                                                                            <div class="col-5 d-flex align-items-center">
                                                                                                            <span class="px-3">To</span> <input type="date" class="form-control enddate tab_input" id="enddate"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-2 m-0 py-2 text-center d-flex justify-content-center align-items-center" style="color:rgb(240,143,43);border-left:2px solid rgb(240,143,43);"><button class="btn" style="background-color:rgb(240,143,43);cursor:pointer;color:white;">Submit</button></div>
                                                                                                    <div class="col-5 m-0 py-2 text-center" style="color:rgb(240,143,43);border-left:2px solid rgb(240,143,43);"><input class="form-control me-2 searchbox" type="search" placeholder="Search User" aria-label="Search"></div>
                                                                                                </div>
                                                                                            </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                        <th scope="col" class="year nowrap text-center col label " style="width:100px;">S.N.</th>
                                                                                        <th scope="col" class="year nowrap text-center col label " style="width:500px;">Customer Name</th>
                                                                                        <th scope="col" class="year nowrap text-center col label " style="width:500px;">Mobile Number</th>
                                                                                        <th scope="col" class="year nowrap text-center col label " style="width:500px;">Amount</th>
                                                                                        <th scope="col" class="year nowrap text-center col label " style="width:500px;">Date</th>
                                                                                        <th scope="col" class="year  nowrap text-center col label " style="width:500px;">View Invoice</th>
                                                                                    </tr>
                                                                                    
                                                                            </thead>
                                                                            <tbody class="tablereportbody"  style="border-color:rgb(240,143,43) !important;" id="ledgerreport">
                                                                            <tr data-id='1'>                                                                            
                                                                                <td>1</td>
                                                                                <td class="searchtext" data-id='1'>Gaurav</td>
                                                                                <td class="searchtext" data-id='1'>48394382</td>
                                                                                <td>40100</td>
                                                                                <td>20-12-2020</td>
                                                                                <td style="color:rgb(240,143,43);"> <span class="mx-auto" style="cursor:pointer;"> <i class="fas fa-file-alt me-1" style="color:rgb(240,143,43);"></i>View</span> </td>
                                                                            </tr>
                                                                            <tr data-id='2'>
                                                                                    <td>2</td>
                                                                                    <td class="searchtext" data-id='2'>Rahul</td>
                                                                                    <td class="searchtext" data-id='2'>34343433</td>
                                                                                    <td>34343</td>
                                                                                    <td>20-20-2020</td>
                                                                                    <td style="color:rgb(240,143,43);"> <span class="mx-auto" style="cursor:pointer;"> <i class="fas fa-file-alt me-1" style="color:rgb(240,143,43);"></i>View</span> </td>
                                                                            </tr>
                                                                            <tr data-id='3'>                                                                            
                                                                                <td>3</td>
                                                                                <td class="searchtext" data-id='3'>Rakesh</td>
                                                                                <td class="searchtext" data-id='3'>48394382</td>
                                                                                <td>40100</td>
                                                                                <td>20-12-2020</td>
                                                                                <td style="color:rgb(240,143,43);"> <span class="mx-auto" style="cursor:pointer;"> <i class="fas fa-file-alt me-1" style="color:rgb(240,143,43);"></i>View</span> </td>
                                                                            </tr>
                                                                            <tr data-id='4'>
                                                                                    <td>4</td>
                                                                                    <td class="searchtext" data-id='4'>Harsh</td>
                                                                                    <td class="searchtext" data-id='4'>34343433</td>
                                                                                    <td>34343</td>
                                                                                    <td>20-20-2020</td>
                                                                                    <td style="color:rgb(240,143,43);"> <span class="mx-auto" style="cursor:pointer;"> <i class="fas fa-file-alt me-1" style="color:rgb(240,143,43);"></i>View</span> </td>
                                                                            </tr>
                                                                            <tr data-id='5'>                                                                            
                                                                                <td>5</td>
                                                                                <td class="searchtext" data-id='5'>Aakash</td>
                                                                                <td class="searchtext" data-id='5'>48394382</td>
                                                                                <td>40100</td>
                                                                                <td>20-12-2020</td>
                                                                                <td style="color:rgb(240,143,43);"> <span class="mx-auto" style="cursor:pointer;"> <i class="fas fa-file-alt me-1" style="color:rgb(240,143,43);"></i>View</span> </td>
                                                                            </tr>
                                                                            <tr data-id='6'>
                                                                                    <td>6</td>
                                                                                    <td class="searchtext" data-id='6'>Abhi</td>
                                                                                    <td class="searchtext" data-id='6'>34343433</td>
                                                                                    <td>34343</td>
                                                                                    <td>20-20-2020</td>
                                                                                    <td style="color:rgb(240,143,43);"> <span class="mx-auto" style="cursor:pointer;"> <i class="fas fa-file-alt me-1" style="color:rgb(240,143,43);"></i>View</span> </td>
                                                                            </tr>
                                                                            </tbody>
                                                                    </table>
                                                                </div>                                                              
                                                        </div> 
                                                    </div>                                            
                                                </div>
                                              </div>
                          </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
    <script src="script/invoice_report.js"></script>
  </body>
</html>