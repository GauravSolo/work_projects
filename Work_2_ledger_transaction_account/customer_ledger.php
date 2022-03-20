<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="css/styles.css"/>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body >
    

<?php
  include "navbar.php";
  ?>

<section class="home-section">
              <div class="container">            
                
                          <div class="row">
                                
                                    <div class="col-12 mt-4">
                                      <div class="row">

                                        <div class="col-12 col-md-4  col-lg-3 my-auto">
                                          <label for="number" class="form-label label nowrap"><h4>Enter Phone Number : </h4></label>
                                        </div>

                                        <div class="col-12 input-group  mb-3" style="width:auto !important;">
                                          
                                          <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="button-addon2">
                                          <button class="btn btn-outline-primary bg-primary text-white" type="button" id="button-addon2">Fetch Data</button>
                                        </div>
                                        <div class="col order-first order-sm-3 ms-auto">
                                            <ul class="nav float-end">
                                                <li class="nav-item d-none d-sm-block">
                                                  <a class="nav-link customnavlink" href="all_ledger.php">Customer Summary</a>
                                                </li>
                                                <li class="nav-item d-none d-sm-block">
                                                  <a class="nav-link" href="adjustments.php">Prev Adjustments</a>
                                                </li>
                                                <li class="nav-item d-none d-sm-block">
                                                  <a class="nav-link" href="credit_note.php">Credit Notes</a>
                                                </li>
                                                <li class="nav-item dropdown d-sm-none">
                                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Navigation
                                                  </a>
                                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="all_ledger.php">Customer Summary</a></li>
                                                    <li><a class="dropdown-item" href="adjustments.php">Prev Adjustments</a></li>
                                                    <li><a class="dropdown-item" href="credit_note.php">Credit Notes</a></li>
                                                  </ul>
                                                </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                      
                                      
                          </div>
                          
                          <div class="row">
                              <div class="col">
                                <div id="liveAlertPlaceholder"></div>
                              </div>
                            </div>
                          <div class="row mt-2 " >
                                   <div class="table-responsive">
                                                                <table  class="table table-striped table-hover" style="width:100%;border:2px solid rgb(240,143,43) !important;border-radius:20px;">
                                                                            <thead>
                                                                              <tr>
                                                                              <th scope="col" class="attr nowrap" >Customer Name</th>
                                                                                <th scope="col" class="attr">Mobile</th>
                                                                                <th scope="col" class="attr">DOB</th>
                                                                                <th scope="col" class="attr">DOA</th>
                                                                                <th scope="col" class="attr" >Address</th>
                                                                                <th scope="col" class="attr nowrap" >Pin code</th>
                                                                                <th scope="col" class="attr">Email ID</th>
                                                                                <th scope="col" class="attr nowrap" >Start Date</th>
                                                                                <th scope="col" class="attr nowrap">Net ( Db / Cr)</th>
                                                                                <th scope="col" class="attr">Action</th>
                                                                              </tr>
                                                                          </thead>
                                                                          <?php
                                                                              $Customer_Id = 949494949;
                                                                            ?>
                                                                            <input type="hidden" class="customer_id"  value="<?php echo $Customer_Id;?>">

                                                                        <tbody class="fetchcustomerdata" style="border-color:rgb(240,143,43) !important;">
                                                                        
                                                                        </tbody>
                                        </table>  
                                  </div>                                                              
                            </div>

                            
                            
                          <div class="row px-3 ">
                            <div class="col-12 tab_input py-3 px-3 mx-auto"  >
                                          <div class="row" >
                                                        <div class="openledger col-12 col-lg-2 mb-3 m-lg-0">
                                                                    <h3 class="label text-center ledgerheading me-0 me-sm-3 ">Ledger </h3>
                                                        </div>

                                                          <div class="col-12 col-lg-4 ms-auto">
                                                                <div class="row">
                                                                      <div class="col-6 col-lg-5   p-lg-0">
                                                                              <div class="col pe-0 ">
                                                                                  <h4 class="label text-start  nowrap">Start Date</h4>
                                                                                  <input type="date" max="<?php echo Date('Y-m-d');?>" class="form-control startdate tab_input w-100" id="startdate"/>
                                                                              </div>
                                                                      </div>
                                                                      
                                                                      <div class="col-6 col-lg-5 ms-auto  p-lg-0 ">
                                                                              <div class="col pe-0">
                                                                                <h4 class="label text-start  nowrap">End Date</h4>
                                                                                <input type="date" max="<?php echo Date('Y-m-d');?>" class="form-control enddate tab_input w-100" id="enddate"/>
                                                                              </div>
                                                                      </div>
                                                                </div>
                                                          </div>

                                                          <div class="col-12 col-lg-1 my-3 my-lg-0 d-flex  justify-content-center align-items-center">
                                                                <h3 class="line-heading w-100 border-bottom-lg-0 ms-0 ms-lg-4  label  d-flex justify-content-center align-items-center m-0 p-0">Or</h3>
                                                          </div>

                                                          <div class="col-12 col-lg-3 d-flex  justify-content-start align-items-center">
                                                            <input type="checkbox" class="tab1_input_radio  form-check-input" name="fetch" id="checkbox1" style="margin-right:20px;"/>
                                                            <label class="form-check-label" for="checkbox1"><h4 class="d-flex justify-content-center align-items-center m-0 label">Fetch All Transaction</h4></label>
                                                          </div>

                                                          
                                                          <div class="col-12 col-lg-2 mt-3 mt-lg-0 d-flex">
                                                            <button type="button" class="btn btn-primary m-auto fetchtransaction" disabled>Fetch Transaction</button>
                                                          </div>
                                                
                                          </div>

                            </div>
                          </div>




                          <div class="row  px-3 my-3">
                            <div class="col-12 tab_input ">
                                              <div class="row mb-3">
                                                <div class="col-12 mt-3">
                                                      <h3 class="label" style="border-bottom:1px solid rgb(240,143,43);">Ledger Report</h3>
                                                </div>
                                                <div class="col-12 mt-2">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-hover" style="width:100%;border:2px solid rgb(240,143,43) !important;border-radius:20px;">
                                                                            <thead>
                                                                              <tr>
                                                                              <th scope="col" class="attr"style="width:50px;" >S.N.</th>
                                                                                <th scope="col" class="attr" style="width:100px;">Date <i class="fas fa-caret-down sortdate" style="cursor:pointer;"></i></th>
                                                                                <th scope="col" class="attr" >Narration</th>
                                                                                <th scope="col" class="attr" style="width:100px;">Db</th>
                                                                                <th scope="col" class="attr" style="width:100px;">Cr</th>
                                                                                <th scope="col" class="attr nowrap" style="width:100px;">Net ( Db / Cr)</th>
                                                                              </tr>
                                                                          </thead>
                                                                        <tbody  style="border-color:rgb(240,143,43) !important;" id="ledgerreport">
                                                                          
                                                                          
                                                                        </tbody>
                                                                </table>  
                                                            </div>                                                              
                                                  </div> 
                                              </div>
                            </div>
                          </div>
                      
              </div>

</section>







      <div class="modal fade" id="AdjustmentModal" tabindex="-1" aria-labelledby="AdjustmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title label" id="AdjustmentModalLabel">Adjustment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-12 col-sm-11 mx-auto">
                        <div class="row">
                          <div class="col-12 col-sm-4">
                              <div class="row">
                                <div class="col-3 col-sm-4"><label class="label me-3" for=""><h5>Name:</h5> </label></div>
                                <div class="col"><span class="customer_name" name='customer_name' >Gaurav Sharma</span></div>
                              </div>
                          </div>
                          <div class="col-12 col-sm-4 ms-auto">
                              <div class="row">
                                <div class="col-3 col-sm-4"><label class="label me-3" for=""><h5>Balance:</h5> </label></div>
                                <div class="col"><span class="balance" name='balance' data-balance=''></span></div>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-sm-4">
                              <div class="row">
                                <div class="col-3 col-sm-4"><label class="label me-3" for=""><h5>Mobile:</h5> </label></div>
                                <div class="col"><span class="customer_number" name='customer_number'>949494949</span></div>
                              </div>
                          </div>
                        </div>
                  </div>
                </div>

                
              <div class="row d-flex my-4 " role="tablist">
                  <div class="col col-sm-3">
                      <input data-target="#tab1" data-tab="tab1" checked type="radio" class="form-check-input ms-0 ms-sm-4" name="status" value="received" id="checkbox1" />
                      <label class="form-check-label" for="checkbox1">Received</label><br/>
                  </div>

                  <div class="col col-sm-3">
                      <input data-target="#tab2" data-tab="tab2" type="radio" class="form-check-input" name="status"  value="paid" style="margin-left:20px;" id="checkbox2"/>
                      <label class="form-check-label" for="checkbox2">Paid</label><br/>
                  </div>
              </div>


            <div class="tab-content" >
              <!-- Received form -->
                  <div class="row mb-5 tab-pane active" id="tab1" >
                    <div class="col-12 col-sm-11 mx-auto mt-2">
                        <form>
                              <div class="row mb-3">
                                <label for="received_amount" class="col-sm-2 col-form-label nowrap label">Amount Received: </label>
                                <div class="col-sm-8 mx-auto">
                                  <input type="text" class="form-control" id="received_amount" name="received_amount">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="received_status" class="col-sm-2 col-form-label nowrap label">Paid By: </label>
                                <div class="col-sm-8 mx-auto">
                                  <select class="form-select" name="received_status" aria-label="Default select example">
                                    <option selected value="0">Credit Note</option>
                                    <option value="1">Cash</option>
                                    <option value="2">Card</option>
                                    <option value="3">Others</option>
                                </select>
                                </div>
                              </div>
                              
                              <div class="row mb-3">
                                <label for="reference" class="col-sm-2 col-form-label nowrap label">Reference No.: </label>
                                <div class="col-sm-8 mx-auto">
                                  <input type="text" class="form-control" id="received_reference" name="received_reference">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="remarks" class="col-sm-2 col-form-label label">Remarks: </label>
                                <div class="col-sm-8 mx-auto">
                                  <input type="text" class="form-control" id="received_remarks" name="received_remarks"> 
                                </div>
                              </div>
                      </form>                                                  
                      </div> 
                  </div>


                  <!-- Paid form -->
                  <div class="row mb-5 tab-pane" id="tab2">
                    <div class="col-12 col-sm-11 mx-auto mt-2">
                        <form>
                              <div class="row mb-3">
                                <label for="paid_amount" class="col-sm-2 col-form-label nowrap label">Amount Paid: </label>
                                <div class="col-sm-8 mx-auto">
                                  <input type="text" class="form-control" id="paid_amount" name="paid_amount">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="paid_status" class="col-sm-2 col-form-label nowrap label">Paid By: </label>
                                <div class="col-sm-8 mx-auto">
                                  <select class="form-select" name="paid_status" aria-label="Default select example">
                                    <option selected value="0">Credit Note</option>
                                    <option value="1">Cash</option>
                                    <option value="2">Card</option>
                                    <option value="3">Others</option>
                                </select>
                                </div>
                              </div>
                              
                              <div class="row mb-3">
                                <label for="paid_reference" class="col-sm-2 col-form-label nowrap label">Reference No.: </label>
                                <div class="col-sm-8 mx-auto">
                                  <input type="text" class="form-control" id="paid_reference" name="paid_reference">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="paid_remarks" class="col-sm-2 col-form-label label">Remarks: </label>
                                <div class="col-sm-8 mx-auto">
                                  <input type="text" class="form-control" id="paid_remarks" name="paid_remarks">
                                </div>
                              </div>
                              <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
                      </form>                                                  
                      </div> 
                  </div>
            </div>
            <h4 class="indicate text-center"></h4>
            </div>

            <div class="modal-footer">
              <button type="button" id="Adjustment_Submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>






  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
  <script src="script/script.js"> </script>
  </body>
</html>
