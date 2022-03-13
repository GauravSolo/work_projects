<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all_ledger.css"/>
  
  </head>
  <body >
  <?php
  include "navbar.php";
  ?>

              <section class="home-section">
                <div class="container">
                          <div class="row my-3">
                          <div class="col order-first order-sm-3 ms-auto">
                                            <ul class="nav float-end">
                                                <li class="nav-item d-none d-sm-block">
                                                  <a class="nav-link customnavlink" href="customer_ledger.php">Customer Ledger</a>
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
                                                    <li><a class="dropdown-item" href="customer_ledger.php">Customer Ledger</a></li>
                                                    <li><a class="dropdown-item" href="adjustments.php">Prev Adjustments</a></li>
                                                    <li><a class="dropdown-item" href="credit_note.php">Credit Notes</a></li>
                                                  </ul>
                                                </li>
                                          </ul>
                                        </div>
                          </div>
                          <div class="row  px-3 ">
                            <div class="col-12 tab_input">
                                            <div class="row">
                                                <div class="col-12 my-4">
                                                      <h3 class="label text-center" style="border-bottom:1px solid rgb(240,143,43);">All Ledger Accounts</h3>
                                                </div>
                                              </div>

                                              <div class="row d-flex">
                                                              <div class="col col-sm-3 ps-0">
                                                                  <input type="checkbox" class="form-check-input" name="debit" id="checkbox3" style="margin-left:20px;"/>
                                                                  <label class="form-check-label" for="checkbox3">Debit Balance</label><br/>
                                                              </div>

                                                              <div class="col col-sm-3">
                                                                  <input type="checkbox" class="form-check-input" name="credit" id="checkbox2" style="margin-left:20px;"/>
                                                                  <label class="form-check-label" for="checkbox2">Credit Balance</label><br/>
                                                              </div>
                                                              <div class="col-12 order-first order-sm-3 col-sm-5 mb-3 mb-sm-0  ms-auto d-flex">
                                                                <input class="form-control me-2" type="search" id="searchbox" placeholder="Search User" aria-label="Search">
                                                                <button class="btn btnicon text-white" style="width:100px;" type="submit">Search</button>
                                                              </div>
                                              </div>
                                              <div class="row mb-5">
                                                <div class="col-12 mt-2">
                                                            <div class="table-responsive" >
                                                                <table class="table table-striped table-hover" style="width:100%;border:2px solid lightgrey;border-radius:20px;">
                                                                            <thead>
                                                                              <tr>
                                                                              <th scope="col" class="attr" style="width:100px;">S.N. </th>
                                                                                <th scope="col" class="attr" >User</th>
                                                                                <th scope="col" class="attr" >Mobile</th>
                                                                                <th scope="col" class="attr" >Balance <i class="fas fa-caret-down sortdate" style="cursor:pointer;"></i></th>
                                                                                <th scope="col" class="attr" ><input type="checkbox" class="tab1_input_radio  form-check-input mt-0" name="fetch" id="checkbox1" style="margin-right:10px;"/>Select All</th>
                                                                              </tr>
                                                                          </thead>
                                                                        <tbody class="allledgers" style="border-color:rgb(240,143,43) !important;">
                                                                          
                                                                          
                                                                        </tbody>
                                                                </table>  
                                                            </div>                                                              
                                                  </div> 
                                              </div>
                            </div>
                          </div>
                      
          </div>
              </section>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row">
                 <div class="col textmessage" style="color:rgb(240,143,43);">
                   <h3>Message Sent Successfully!</h3>
                 </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <script src="script/all_ledger.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>

  </body>
</html>
