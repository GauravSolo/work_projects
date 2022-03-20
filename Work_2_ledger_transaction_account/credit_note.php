<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/creditnote.css"/>
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
                                                  <a class="nav-link" href="all_ledger.php">Customer Summary</a>
                                                </li>
                                                <li class="nav-item dropdown d-sm-none">
                                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Navigation
                                                  </a>
                                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="customer_ledger.php">Customer Ledger</a></li>
                                                    <li><a class="dropdown-item" href="adjustments.php">Prev Adjustments</a></li>
                                                    <li><a class="dropdown-item" href="all_ledger.php">Customer Summary</a></li>
                                                  </ul>
                                                </li>
                                          </ul>
                                        </div>
                          </div>

                          <div class="row  px-3">
                            <div class="col-12 tab_input"> 
                                            <div class="row">
                                                <div class="col-12 my-4">
                                                      <div class="row">
                                                      <div class="col-12">
                                                      <h3 class="label text-center" style="border-bottom:1px solid rgb(240,143,43);">Credit Notes</h3>
                                                      </div>
                                                      <div class="col-12 col-sm-5 ms-auto d-flex">
                                                      <input class="form-control me-2" type="search" placeholder="Search User" aria-label="Search">
                                                      <button class="btn btnicon text-white" style="width:100px;" type="submit">Search</button>
                                                      </div>
                                                      </div>
                                                </div>
                                              </div>


                                              <div class="row mb-5">
                                                <div class="col-12 mt-2">
                                                            <div class="table-responsive" >
                                                                <table class="table table-striped table-hover" style="width:100%;border:2px solid lightgrey;border-radius:20px;">
                                                                            <thead>
                                                                              <tr>
                                                                              <th scope="col" class="attr" >S.N.</th>
                                                                                <th scope="col" class="attr" >User</th>
                                                                                <th scope="col" class="attr nowrap" >Credit Note</th>
                                                                                <th scope="col" class="attr" >Detail</th>
                                                                              </tr>
                                                                          </thead>
                                                                        <tbody style="border-color:rgb(240,143,43) !important;">
                                                                          <?php
                                                                            $i = 1;

                                                                            while($i <= 5){
                                                                          ?>
                                                                            <tr>
                                                                              <td class="text-center"><?php echo $i++;?></td>
                                                                              <td class="text-center ">username</td>
                                                                              <td class="text-center">issued</td>
                                                                             
                                                                              <td class="text-center">
                                                                              <button data-bs-toggle="modal" data-bs-target="#exampleModal"  style="white-space:nowrap;width:100px;" class="btn btnicon mx-auto text-white d-flex justify-content-center align-items-center"><i class="fas fa-file-alt me-1" style="color:antiquewhite;"></i>View</td>
                                                                          </tr>
                                                                          <?php
                                                                            }
                                                                          ?>


<tr>
                                                                              <td class="text-center">6</td>
                                                                              <td class="text-center ">username</td>
                                                                              <td class="text-center">received</td>
                                                                             
                                                                              <td class="text-center">
                                                                              <button data-bs-toggle="modal" data-bs-target="#exampleModal"  style="white-space:nowrap;width:100px;" class="btn btnicon mx-auto text-white d-flex justify-content-center align-items-center"><i class="fas fa-file-alt me-1" style="color:antiquewhite;"></i>View</td>
                                                                          </tr>



                                                                          <tr>
                                                                              <td class="text-center">7</td>
                                                                              <td class="text-center ">username</td>
                                                                              <td class="text-center">issued</td>
                                                                             
                                                                              <td class="text-center">
                                                                              <button data-bs-toggle="modal" data-bs-target="#exampleModal"  style="white-space:nowrap;width:100px;" class="btn btnicon mx-auto text-white d-flex justify-content-center align-items-center"><i class="fas fa-file-alt me-1" style="color:antiquewhite;"></i>View</td>
                                                                          </tr>



                                                                          <tr>
                                                                              <td class="text-center">8</td>
                                                                              <td class="text-center ">username</td>
                                                                              <td class="text-center">received</td>
                                                                             
                                                                              <td class="text-center">
                                                                              <button data-bs-toggle="modal" data-bs-target="#exampleModal"  style="white-space:nowrap;width:100px;" class="btn btnicon mx-auto text-white d-flex justify-content-center align-items-center"><i class="fas fa-file-alt me-1" style="color:antiquewhite;"></i>View</td>
                                                                          </tr>



                                                                          <tr>
                                                                              <td class="text-center">9</td>
                                                                              <td class="text-center ">username</td>
                                                                              <td class="text-center">received</td>
                                                                             
                                                                              <td class="text-center">
                                                                              <button data-bs-toggle="modal" data-bs-target="#exampleModal"  style="white-space:nowrap;width:100px;" class="btn btnicon mx-auto text-white d-flex justify-content-center align-items-center"><i class="fas fa-file-alt me-1" style="color:antiquewhite;"></i>View</td>
                                                                          </tr>


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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="script/creditnote.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
