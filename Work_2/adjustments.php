<?php
include "config.php";

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/adjustments.css"/>
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
                                                  <a class="nav-link" href="credit_note.php">Credit Notes</a>
                                                </li>
                                                <li class="nav-item d-none d-sm-block">
                                                  <a class="nav-link" href="all_ledger.php">Customer Summary</a>
                                                </li>
                                                <li class="nav-item dropdown d-sm-none">
                                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Navigation
                                                  </a>
                                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="customer_ledger.php">Customer Ledger</a></li>
                                                    <li><a class="dropdown-item" href="credit_note.php">Credit Notes</a></li>
                                                    <li><a class="dropdown-item" href="all_ledger.php">Customer Summary</a></li>
                                                  </ul>
                                                </li>
                                          </ul>
                                        </div>
                          </div>

<div class="row  px-3 my-5">
  <div class="col-12 tab_input"> 
                  <div class="row">
                      <div class="col-12 mt-4 mb-3">
                            <div class="row">
                            <div class="col-12">
                            <h3 class="label text-center" style="border-bottom:1px solid rgb(240,143,43);">Prev Adjustmets</h3>
                            </div>
                            <div class="col-12 col-sm-5 ms-auto d-flex">
                            <input class="form-control me-2" type="search" id="searchbox" placeholder="Search User" aria-label="Search">
                            <button class="btn btnicon text-white" style="width:100px;" type="submit">Search</button>
                            </div>
                            </div>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <div class="col-12 ">
                                  <div class="table-responsive" >
                                      <table class="table table-striped table-hover" style="width:100%;border:2px solid lightgrey;border-radius:20px;">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col" class="attr"  >S.N.</th>
                                                      <th scope="col" class="attr" >Username</th>
                                                      <th scope="col" class="attr" >Mobile</th>
                                                      <th scope="col" class="attr" >Status</th>
                                                      <th scope="col" class="attr" >Amount</th>
                                                      <th scope="col" class="attr nowrap" >Paid By</th>
                                                      <th scope="col" class="attr nowrap" >Reference No.</th>
                                                      <th scope="col" class="attr " >Remarks</th>
                                                      <th scope="col" class="attr " >Balance</th>
                                                    </tr>
                                                </thead>
                                              <tbody class="tablebody" style="border-color:rgb(240,143,43) !important;">
                                                <?php
                                                  $i = 1;
                                                  $sql  = "SELECT * FROM Customer_Transaction_Adjustment";

                                                  if($result =  mysqli_query($conn, $sql))
                                                  {
                                                    if(mysqli_num_rows($result) > 0)
                                                    {
                                                      while($row = mysqli_fetch_assoc($result)){
                                                            
                                                                                                                                    
                                                ?>
                                                  <tr data-id='<?php echo $i;?>'>
                                                    <td class='text-center'><?php echo $i;?></td>
                                                    <td class='text-center searchtext' data-id='<?php echo $i;?>'><?php  echo $row['Customer_Name']; ?></td>
                                                    <td class='text-center searchtext' data-id='<?php echo $i;?>'><?php  echo $row['Customer_Phone_Number']; ?></td>
                                                    <td class='text-center'><?php  echo $row['Transaction_Status']; ?></td>
                                                    <td class='text-center'><?php  echo $row['Amount']; ?></td>
                                                    <td class='text-center'><?php  echo $row['Paid_By']; ?></td>
                                                    <td class='text-center'><?php  echo $row['Reference_Number']; ?></td>
                                                    <td class='text-center'><?php  echo $row['Remarks']; ?></td>
                                                    <td class='text-center'><?php  echo $row['Balance']; ?></td>
                                                </tr>
                                                <?php
                                                $i++;
                                                      }
                                                    }
                                                  }
                                                ?>

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
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title label" id="exampleModalLabel">Credit Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row">

                <div class="col-12 pt-4 d-flex  justify-content-start align-items-center">
                  Detail of credit Notes
                </div>
                
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <script src="script/adjustments.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>