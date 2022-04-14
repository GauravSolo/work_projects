<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sms_promotion_php.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
  </head>
  <body style="margin:0 !important; padding:0 !important;">
            <?php
                include "navbar.php";
            ?>
            <section class="home-section">
            <div class="container-fluid px-0">

                    <div class="row  m-0 position-relative" id="main-div">
                        
                          <div class="col-12 main-panel">
                                <div class="row tab-content" id="myTabContent">
                                            <!-- <div class="tab-content col-12 px-0" id="myTabContent"> -->
                                                  <div class="col-12 col-lg-7 ms-auto side-panel px-0 p-0  ">
                                                          <div class="row m-0">
                                                              <div class="col py-1 py-sm-3 mb-4 px-0 m-0 ">
                                                                      <ul class="nav nav-tabs flex-row nav-fill position-relative" id="myTab" role="tablist">
                                                                            <li class="nav-item  clickonload" role="presentation">
                                                                              <a class="nav-link  label   active " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="true" href="#"><span class="span-link  nowrap navpill span1 mx-auto">New Record</span></a>
                                                                            </li>
                                                                            <li class="nav-item " role="presentation">
                                                                              <a class="nav-link  label ms-3" id="update-tab" data-bs-toggle="tab" data-bs-target="#update"  role="tab" aria-controls="update" aria-selected="false" href="#"><span class="span-link  nowrap  span2 mx-auto">Template</span></a>
                                                                            </li>
                                                                            <li class="nav-item " role="presentation">
                                                                              <a class="nav-link label  ms-3" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" role="tab" aria-controls="contact" aria-selected="false" href="#"><span class="span-link  nowrap span3 mx-auto">Prev Record</span></a>
                                                                            </li>
                                                                            <div class="navdiv position-absolute"></div>
                                                                    </ul>
                                                              </div>
                                                          </div>
                                                  </div>

                                                  <div class="tab-pane col-12 mx-1 px-1 pb-5 tab1 fade show active tab_input position-relative" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                                <div class="container-fluid">      
                                                                      <div class="row container-row">
                                                                          <!-- <div class="col-12 col-sm-11 mx-auto"> -->
                                                                                <!-- <div class="row container-row "> -->
                                                                                      <div class="col-12 col-sm-11 mx-auto">
                                                                                        <div class="row">
                                                                                                <div class="col-12 mb-3 mb-sm-0 ms-auto">
                                                                                                  <div class="row px-0 px-lg-3">                                
                                                                                                    
                                                                                                                          <div class="col-12">
                                                                                                                            <div class="row w-100">
                                                                                                                                <div class="col-12 ">
                                                                                                                                    <div class="row d-flex flex-sm-row-reverse">
                                                                                                                                            
                                                                                                                                            <div class="col m-0 p-0 mb-2 mb-sm-0 event d-flex label justify-content-end align-items-center">

                                                                                                                                                        <div style="border-bottom:2px solid;white-space:nowrap;" class="dropdown">
                                                                                                                                                          Campaign Calendar &nbsp;
                                                                                                                                                          <!-- <i class="fas fa-caret-down"></i>  -->
                                                                                                                                                          <i class="fas fa-calendar"></i>
                                                                                                                                                          <ul class="dropdown-menu tab_input" >
                                                                                                                                                            <li class="label mb-0 pb-1" style="border-bottom:2px solid;">January</li>
                                                                                                                                                            <ul style="list-style-type: none;color:purple;">
                                                                                                                                                              <li>1 Sat : Happy New Year</li>
                                                                                                                                                              <li>13 Thur : Lohri</li>
                                                                                                                                                            </ul>
                                                                                                                                                            <li class="label mb-0 pb-1" style="border-bottom:2px solid;">February</li>
                                                                                                                                                            <ul style="list-style-type: none;color:purple;">
                                                                                                                                                              <li>5 Sat : Puja</li>
                                                                                                                                                              <li>17 Thur : Holi</li>
                                                                                                                                                            </ul>
                                                                                                                                                            <li class="label mb-0 pb-1" style="border-bottom:2px solid;">March</li>
                                                                                                                                                            <ul style="list-style-type: none;color:purple;">
                                                                                                                                                              <li>17 Thur : Holika Dahan</li>
                                                                                                                                                              <li>18 Fri : Holi</li>
                                                                                                                                                            </ul>
                                                                                                                                                            <!-- <li class="label">Jan 1 : Happy New Year</li>
                                                                                                                                                            <li class="label">Jan 13 : Lohri</li>
                                                                                                                                                            <li class="label">Feb 5 : Puja</li>
                                                                                                                                                            <li class="label">Feb 17 : Fast </li>
                                                                                                                                                            <li class="label">March 17 : Holika Dahan</li>
                                                                                                                                                            <li class="label">March 18 : Holi</li> -->
                                                                                                                                                          </ul>
                                                                                                                                                        </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-12 col-sm-3  d-flex label justify-content-end align-items-center mb-4 mb-md-0 px-0">
                                                                                                                                               <div style="border-bottom:2px solid;cursor:pointer;font-size:18px;white-space:nowrap;" data-bs-toggle="modal" data-bs-target="#imagemodal">Image Editor<i class="fas fa-image  ms-2 fs-5"></i></div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-12 col-sm-6">
                                                                                                                                              <div class="row">
                                                                                                                                                    <div class="col  nowrap "> <input style="cursor:pointer;" type="radio" checked class="normalchar" name="charcode" value="normal"><label class="ms-2 label" >Normal</label></div>
                                                                                                                                                    <div class="col   nowrap"><input style="cursor:pointer;" type="radio" class="unicodechar"  name="charcode" value="unicode"><label class="ms-2 label" >Unicode</label></div>
                                                                                                                                              </div>
                                                                                                                                            </div>
                                                                                                                                    </div>
                                                                                                                                </div>         
                                                                                                                            </div>
                                                                                                                          </div>                   
                                                                                                                  <div class="col-12 col-md-5 col-lg-4">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-12 my-3">
                                                                                                                              <div class="row m-0 p-0 d-flex justify-content-between" style="border-bottom: 2px solid rgb(255 163 67);">
                                                                                                                                <div class="col label my-auto p-0" style="font-weight:bold;">
                                                                                                                                  Char Count: <span class="text-dark promotion__char_count ms-1 p-0" style="font-weight:bold;">0</span>
                                                                                                                                </div>

                                                                                                                                <div class="col label my-auto p-0 d-flex justify-content-end" style="font-weight:bold;">
                                                                                                                                  SMS COUNT: <span id="promotion_count_label" class="text-dark  ms-2 p-0" style="font-weight:bold;">0</span>
                                                                                                                                </div>
                                                                                                                              </div>
                                                                                                                            </div>
                                                                                                                              <div class="col-12 mb-4 d-flex flex-column">
                                                                                                                                  <textarea type="text" placeholder="Enter message ..." rows="5" class="tab1_inputs pt-2" id="input_promotion_type"></textarea>
                                                                                                                                  <span class="smsalert mt-3 d-flex"></span>
                                                                                                                              </div>                                                                                      
                                                                                                                        </div>                                                          
                                                                                                                  </div>
                                                                                                                  <!-- <div class="col-12 col-md-6 col-lg-6"> -->
                                                                                                                  <div class="col-12 col-md-7 col-lg-8 pt-md-5 d-flex flex-column-reverse flex-sm-row">
                                                                                                                                <div class="col-12 col-sm-6 ms-lg-5">
                                                                                                                                      <div class="row d-flex flex-column">
                                                                                                                                              <div class="col-12 col-lg-12 mb-3">
                                                                                                                                                      <div class="row m-0 p-0">
                                                                                                                                                          <div class="col-12  fs-4 label my-auto p-0 col-lg-12 col-xl-5">
                                                                                                                                                            <h4 class="m-sm-0 nowrap ">Remarks :</h4> 
                                                                                                                                                          </div>
                                                                                                                                                          <div class="col-12 m-0  p-0 col-lg-12 col-xl-7">
                                                                                                                                                              <textarea type="text" maxlength="100" placeholder="Remarks (If any)" name="remark" value="" class="tab1_inputs" id="input_promtion_remark"></textarea>
                                                                                                                                                          </div>
                                                                                                                                                      </div>
                                                                                                                                              </div>
                                                                                                                                              <div class="col-12 mb-3 col-lg-12">
                                                                                                                                                        <div class="row m-0 p-0">
                                                                                                                                                                <div class="col-12 col-lg-12 fs-4 label my-auto p-0 col-xl-5">
                                                                                                                                                                  <h4 class="m-sm-0">Set Date & Time :</h4>                                                                          
                                                                                                                                                                </div>
                                                                                                                                                                  <div class="col-12 m-0 p-0 col-lg-12  col-xl-7">                                                                      
                                                                                                                                                                      <input type="datetime-local" min="<?php echo date("Y-m-d\TH:i:s", strtotime('tomorrow')); ?>" value="<?php echo date("Y-m-d\T11:00", strtotime('tomorrow')); ?>" name="date" class="tab1_inputs" id="input_date" />
                                                                                                                                                                </div>
                                                                                                                                                                  <div class="col my-3 ms-auto d-flex flex-column-reverse flex-sm-row">
                                                                                                                                                                     <div id="smsinfo">
                                                                                                                                                                     </div>                                                                                           
                                                                                                                                                                    <button class="btn ms-auto tab_input" id="submit_data" data-sms_id="">Send</button>
                                                                                                                                                                  </div>
                                                                                                                                                        </div>                                                                      
                                                                                                                                              </div>                                                                                    
                                                                                                                                      </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                  <div class="col ms-3 ms-lg-5 mb-0 me-auto">
                                                                                                                                      <div class="row">
                                                                                                                                          <div class="col-12 mb-2 position-relative">
                                                                                                                                              <input type="checkbox" name="createlink" class="createlink me-2" id="createlink">
                                                                                                                                              <label for="createlink" class="label ">Create Link
                                                                                                                                              </label>
                                                                                                                                          </div>
                                                                                                                                      

                                                                                                                                          <div class="col col-sm-12  ms-5 mt-2 p-0 1">
                                                                                                                                              <div class="row">
                                                                                                                                                <div id="uploadimagediv" class="col-12 m-0 p-0 d-flex d-none">
                                                                                                                                                  <input class="label   w-50" type="file" id="formFile">
                                                                                                                                                  <label for="formFile" class="form-label">
                                                                                                                                                    <button type="button" class="btn text-white createlinkbtn d-flex justify-content-between align-items-center ms-auto" style="background:rgb(255 163 67);font-size:15px;cursor:pointer;">Upload</button>
                                                                                                                                                  </label>
                                                                                                                                                </div>

                                                                                                                                                <div id="linkbox" class="col-12 mt-2  mb-4  p-0 d-flex flex-column flex-sm-row d-none ">
                                                                                                                                                  <div class="row">
                                                                                                                                                    <div class="col">
                                                                                                                                                    <label class="label fs-5 me-sm-3 nowrap">Link : </label>
                                                                                                                                                      <div type="text" class="copytext d-block p-0 ps-1"> </div>
                                                                                                                                                      <div class="d-flex mt-2">
                                                                                                                                                      <button class="copybtn ms-auto tab1_inputs position-relative d-flex justify-content-center align-items-center text-white" style="padding:0 !important;">Copy<i class="far fa-clone ms-2"></i><span class="copytoast m-2"></span></button>
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
                                                                                          
                                                                                                <div class="col-12 col-sm-6 col-lg-12  my-3 mb-sm-0 "> 
                                                                                                          <div class="col-12 ms-0 ps-0 ps-sm-4 pb-1 d-flex">
                                                                                                                <h4 class="label nowrap" style="font-weight:bold;border-bottom:2px solid;" >Select Target Customers : </h4>
                                                                                                          </div>                                                                                                      <div class="row d-flex flex-column flex-lg-row  ps-md-0" id="promotioncreated">

                                                                                                          <div class="col py-3  col1">
                                                                                                            <div class="row d-flex flex-column justify-content-center align-items-center  ps-lg-5" >  
                                                                                                              <div class="col text-center label">
                                                                                                                <h5 >
                                                                                                                  <span style="border-bottom:2px solid;">
                                                                                                                    Section: A
                                                                                                                  </span>
                                                                                                                </h5>
                                                                                                              </div>                                                                                                           
                                                                                                              <div class="col pt-2 label ">
                                                                                                                            <input type="radio" class="tab1_input_radio  " name="customer" value="All Buyers and Non-Buyers" id="flexRadioDefault1" checked/>
                                                                                                                            <label class="form-check-label" for="flexRadioDefault1">All Buyers and Non-Buyers</label>
                                                                                                              </div>
                                                                                                              <div class="col label  my-2">
                                                                                                                            <input type="radio" class="tab1_input_radio  " name="customer" value="Only Buyers" id="flexRadioDefault2" />
                                                                                                                            <label class="form-check-label" for="flexRadioDefault2">Only Buyers</label>
                                                                                                              </div> 
                                                                                                              <div class="col label ">
                                                                                                                            <input type="radio" class="tab1_input_radio  " name="customer" value="Only Non Buyers" id="flexRadioDefault3" />
                                                                                                                            <label class="form-check-label" for="flexRadioDefault3">Only Non Buyers</label>
                                                                                                              </div>                                                              
                                                                                                            </div>
                                                                                                          </div>

                                                                                                          <div class="col   d-flex flex-column  col2 " >                                                                             
                                                                                                              <div class="row ps-lg-4">
                                                                                                              <div class="col text-center py-2 label">
                                                                                                                <h5 >
                                                                                                                  <span style="border-bottom:2px solid;">
                                                                                                                    Section: B
                                                                                                                  </span>
                                                                                                                </h5>
                                                                                                              </div>     
                                                                                                                    <div class="col-12 label ps-0 d-flex align-items-center">
                                                                                                                                          <input type="radio" class="tab1_input_radio   lostcustomersinput" name="customer"  id="flexRadioDefault4" />
                                                                                                                                        <label class="form-check-label ms-2 label w-100" for="flexRadioDefault4"><span class="nowrap">Lost customers in last</span>
                                                                                                                                              <select class="form-select form-select-sm label mx-2 d-inline-block" id="lastmonths" style="width:55px;height:30px;" aria-label="Default select example">
                                                                                                                                                <option selected  value="1">1</option>
                                                                                                                                                <option value="2">2</option>
                                                                                                                                                <option value="3">3</option>
                                                                                                                                              </select> 
                                                                                                                                          months</label>
                                                                                                                    </div>
                                                                                                                    <div class="col-12 label my-2  ps-0 d-flex align-items-center">
                                                                                                                                  <input type="radio"  class="tab1_input_radio  " name="customer"  id="flexRadioDefault5" />
                                                                                                                                  <label class="form-check-label ms-2" for="flexRadioDefault5">Customer with average purchase <input type="text" id="averagepurchasevalue"  class="m-1" style="width:50px;"> Rs</label>
                                                                                                                    </div>   
                                                                                                                    <div class="col-12 label  ps-0 d-flex align-items-center">
                                                                                                                                  <input type="radio" class="tab1_input_radio  " name="customer"  id="flexRadioDefault6" />
                                                                                                                                  <label class="form-check-label ms-2" for="flexRadioDefault6">Customer with highest purchase <input type="text"  id="highestpurchasevalue" class="m-1" style="width:50px;">Rs</label>
                                                                                                                    </div>   
                                                                                                                    <div class="col-12 label my-2  ps-0 d-flex align-items-center">
                                                                                                                                  <input type="radio" class="tab1_input_radio  " name="customer"  id="flexRadioDefault7" />
                                                                                                                                  <label class="form-check-label ms-2" for="flexRadioDefault7">Customer with visit <input type="text" class="m-1" id="visitcount"  style="width:50px;">count</label>
                                                                                                                    </div>   
                                                                                                              </div>                 
                                                                                                          </div>

                                                                                                          <div class="col  py-2 mx-auto label col3 ps-0 ps-lg-5 ">
                                                                                                          <div class="col text-center label  mb-1">
                                                                                                                <h5 >
                                                                                                                  <span style="border-bottom:2px solid;">
                                                                                                                    Section: C
                                                                                                                  </span>
                                                                                                                </h5>
                                                                                                              </div>     
                                                                                                                          <div class="d-flex align-items-center">
                                                                                                                          <input type="radio" class="tab1_input_radio " name="customer"  id="flexRadioDefault8" />
                                                                                                                            <label class="form-check-label ms-2" for="flexRadioDefault8">Select from buyers segments</label>
                                                                                                                          </div>

                                                                                                                            <input type="checkbox" class="tab1_input_radio " name="segment[]" value="premium" id="checkbox1" style="margin-left:20px;"/>
                                                                                                                            <label class="form-check-label" for="checkbox1">Premium</label><br/>

                                                                                                                            <input type="checkbox" class="tab1_input_radio  " name="segment[]" value="regular" id="checkbox2" style="margin-left:20px;"/>
                                                                                                                            <label class="form-check-label" for="checkbox2">Regular</label>
                                                                                                          </div>

                                                                                                          <div class="col mx-auto  py-2 label col4 ps-0 ps-lg-5">
                                                                                                                            <div class="row mb-1">
                                                                                                                            <!-- <div class="col text-center label  mb-1">
                                                                                                                              <h5 >
                                                                                                                                <span style="border-bottom:2px solid;">
                                                                                                                                  Section: D
                                                                                                                                </span>
                                                                                                                              </h5>
                                                                                                                            </div>      -->
                                                                                                                                                <div class="col-12 mb-2 position-relative">
                                                                                                                                                    <input type="radio" name="uploadfile" class="uploadfile tab1_input_radio   me-2" id="uploadfile">
                                                                                                                                                    <label for="uploadfile" class="label ">Upload Customer Data
                                                                                                                                                    </label>
                                                                                                                                                </div>
                                                                                                                                            

                                                                                                                                                <div class="col col-sm-12  ms-5 mt-2 p-0 createlinkdiv1">
                                                                                                                                                    <div class="row">
                                                                                                                                                      <div id="uploadimagediv1" class="col-12 m-0 p-0 d-flex d-none">
                                                                                                                                                        <input class="label   w-50" type="file" id="formFile1">
                                                                                                                                                      </div>
                                                                                                                                                      <div id="checkboxdatabase" class="col-12 mt-2  mb-4  p-0 d-flex flex-column flex-sm-row d-none ">
                                                                                                                                                        <input type="checkbox" id="filecheckbox" checked>
                                                                                                                                                        <label for="filecheckbox" class="ms-2">Add to existing customer database</label>
                                                                                                                                                      </div>
                                                                                                                                                    </div> 
                                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                </div>

                                                                                                <div class="col-12 col-sm-11 mx-auto px-0 mt-5" >
                                                                                                            <div class="row">
                                                                                                                  <div class="col-12 fs-4 label mb-3 p-0" style="border-bottom: 2px solid rgb(255 163 67);">
                                                                                                                        <h4 class="m-0">WIP PROMOTION</h4>
                                                                                                                      
                                                                                                                  </div>
                                                                                                                  <div class="col-12 m-0 p-0">
                                                                                                                          <div class="table-responsive" >
                                                                                                                                    <table class="table table-striped table-hover" style="width:100%;border:2px solid rgb(240,143,43) !important;border-radius:20px;">
                                                                                                                                                <thead>
                                                                                                                                                <tr class="templateRow ">
                                                                                                                                                  <th scope="col" class="templateRowAttrib">S.N.</th>
                                                                                                                                                  <th scope="col" style="width:500px;" class="templateRowAttrib">Message</th>
                                                                                                                                                  <th scope="col" class="templateRowAttrib">Status</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Remarks By User</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Target Customers</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">SMS COUNT</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">SMS Type</th>
                                                                                                                                                  <th scope="col" style="width:100px;" class="nowrap templateRowAttrib">Submission Date</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Sender ID</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Date of Promotion</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Total Customer</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Expected SMS</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Actual SMS deducted</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Remarks by Admin</th>
                                                                                                                                                  <th scope="col" class="templateRowAttrib">Report</th>
                                                                                                                                                </tr>
                                                                                                                                              </thead>
                                                                                                                                            <tbody style="border-color:rgb(240,143,43) !important;" id="tab1_container">
                                                                                                                                            <tr>
                                                                                                                                                        <td class="text-center" style="color:rgb(240,143,43) !important;" colspan="13">Fetching...</td>
                                                                                                                                              </tr>      
                                                                                                                                              <!-- <tr><td></td><td class=""><button class="btn btn-danger float-end d-flex justify-content-center align-items-center" style="border-radius:5px;height:30px;">Cancel</button></td>
                                                                                                                                            <td colspan="11"></td></tr> -->
                                                                                                                                            </tbody>
                                                                                                                                    </table>  
                                                                                                                          </div>                                                              
                                                                                                                  </div>
                                                                                                            </div>
                                                                                                </div>

                                                                                                <div class="col-12 col-sm-11 mx-auto px-0 mt-5" >
                                                                                                            <div class="row">
                                                                                                                  <div class="col-12 fs-4 label mb-3 p-0" style="border-bottom: 2px solid rgb(255 163 67);">
                                                                                                                        <h4 class="m-0">Prev PROMOTION</h4>
                                                                                                                      
                                                                                                                  </div>
                                                                                                                    <div class="col-12 m-0 p-0">
                                                                                                                          <div class="table-responsive" >
                                                                                                                                    <table class="table table-striped table-hover" style="width:100%;border:2px solid rgb(240,143,43) !important;border-radius:20px;">
                                                                                                                                                <thead>
                                                                                                                                                <tr class="templateRow ">
                                                                                                                                                  <th scope="col" class="templateRowAttrib">S.N.</th>
                                                                                                                                                  <th scope="col" style="width:500px;" class="templateRowAttrib">Message</th>
                                                                                                                                                  <th scope="col" class="templateRowAttrib">Status</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Remarks By User</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Target Customers</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">SMS COUNT</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">SMS Type</th>
                                                                                                                                                  <th scope="col" style="width:100px;" class="nowrap templateRowAttrib">Submission Date</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Sender ID</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Date of Promotion</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Total Customer</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Expected SMS</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Actual SMS deducted</th>
                                                                                                                                                  <th scope="col" class="nowrap templateRowAttrib">Remarks by Admin</th>
                                                                                                                                                  <th scope="col" class="templateRowAttrib">Report</th>
                                                                                                                                                </tr>
                                                                                                                                              </thead>
                                                                                                                                            <tbody style="border-color:rgb(240,143,43) !important;" id="tab2_container">
                                                                                                                                             <tr>
                                                                                                                                                        <td class="text-center">1</td>
                                                                                                                                                        <td class="text-center">This is message</td>
                                                                                                                                                        <td class="text-center">processed</td>
                                                                                                                                                        <td class="text-center">Remarks</td>
                                                                                                                                                        <td class="text-center">target customers</td>
                                                                                                                                                        <td class="text-center">10</td>
                                                                                                                                                        <td class="text-center">sms type</td>
                                                                                                                                                        <td class="text-center">Date</td>
                                                                                                                                                        <td class="text-center">1233</td>
                                                                                                                                                        <td class="text-center">dt</td>
                                                                                                                                                        <td class="text-center">Total</td>
                                                                                                                                                        <td class="text-center">sms</td>
                                                                                                                                                        <td class="text-center">actual sms</td>
                                                                                                                                                        <td class="text-center">Remarks</td>
                                                                                                                                                        <td class="text-center">report</td>
                                                                                                                                              </tr> <tr>
                                                                                                                                                        <td class="text-center">2</td>
                                                                                                                                                        <td class="text-center">This is message</td>
                                                                                                                                                        <td class="text-center">cancelled</td>
                                                                                                                                                        <td class="text-center">Remarks</td>
                                                                                                                                                        <td class="text-center">target customers</td>
                                                                                                                                                        <td class="text-center">10</td>
                                                                                                                                                        <td class="text-center">sms type</td>
                                                                                                                                                        <td class="text-center">Date</td>
                                                                                                                                                        <td class="text-center">1233</td>
                                                                                                                                                        <td class="text-center">dt</td>
                                                                                                                                                        <td class="text-center">Total</td>
                                                                                                                                                        <td class="text-center">sms</td>
                                                                                                                                                        <td class="text-center">actual sms</td>
                                                                                                                                                        <td class="text-center">Remarks</td>
                                                                                                                                                        <td class="text-center">report</td>
                                                                                                                                              </tr> <tr>
                                                                                                                                                        <td class="text-center">3</td>
                                                                                                                                                        <td class="text-center">This is message</td>
                                                                                                                                                        <td class="text-center">problematic</td>
                                                                                                                                                        <td class="text-center">Remarks</td>
                                                                                                                                                        <td class="text-center">target customers</td>
                                                                                                                                                        <td class="text-center">10</td>
                                                                                                                                                        <td class="text-center">sms type</td>
                                                                                                                                                        <td class="text-center">Date</td>
                                                                                                                                                        <td class="text-center">1233</td>
                                                                                                                                                        <td class="text-center">dt</td>
                                                                                                                                                        <td class="text-center">Total</td>
                                                                                                                                                        <td class="text-center">sms</td>
                                                                                                                                                        <td class="text-center">actual sms</td>
                                                                                                                                                        <td class="text-center">Remarks</td>
                                                                                                                                                        <td class="text-center">report</td>
                                                                                                                                              </tr>              
                                                                                                                                            </tbody>
                                                                                                                                    </table>  
                                                                                                                          </div>                                                              
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                </div>
                                                                                        </div>
                                                                                      </div>
                                                                                <!-- </div> -->
                                                                          <!-- </div> -->
                                                                      </div>
                              
                                                                </div>    
                                                  </div>

                                                  <div class="tab-pane col-12 m-0 p-0 tab2 fade" id="update" role="tabpanel" aria-labelledby="update-tab">

                                                    <div class="container">
                                                      <div class="row container-row ">
                                                          <div class="col">
                                                              <div class="row">

                                                                      <div class="col-12 col-sm-10 mx-auto mb-4" style="border-bottom: 2px solid rgb(255 163 67);">
                                                                              <div class="row mb-1" >
                                                                                    <div class="col-6 col-sm-9 mt-auto ms-0 ps-0 pe-0 me-0" >
                                                                                      
                                                                                        <h3 class="label my-auto mb-0">Templates</h3>

                                                                                    </div>
                                                                                  
                                                                                      <div class="col-6 col-sm-3 text-end ps-0 pe-0 me-0">

                                                                                        <select type="text" name="template" id="tab2_dropdown">
                                                                                          <option value="" disabled selected hidden>Select Template</option>
                                                                                          <option value="Discount">Discount</option>
                                                                                          <option value="Promote Product/Service">Promote Product/Service</option>
                                                                                          <option value="Festival Wishes">Festival Wishes</option>
                                                                                          <option value="Sale">Sale</option>
                                                                                          <option value="Deal">Deal</option>
                                                                                        </select>
                                                                                      </div>
                                                                                    <!-- <div class="col-3 px-0 ms-auto">
                                                                                      <div id="select_button" onclick="fetchTemplate()" >Select</div>
                                                                                    </div> -->
                                                                              </div>
                                                                      </div>
                                                                      <div class="col-12 col-sm-10 mx-auto px-0" >
                                                                                  <div class="row">

                                                                                          <div class="col-12">
                                                                                                <div class="table-responsive" >
                                                                                                          <table class="table table-striped table-hover" style="width:100%;border:2px solid rgb(240,143,43) !important;border-radius:20px;">
                                                                                                                      <thead>
                                                                                                                      <tr class="templateRow ">
                                                                                                                        <th scope="col" class="templateRowAttrib" style="width:8.5%;">S.N.</th>
                                                                                                                        <th scope="col" class="templateRowAttrib" style="width:20%;">Name</th>
                                                                                                                        <th scope="col" class="templateRowAttrib" style="width:73%;">Message</th>
                                                                                                                        <th scope="col" class="templateRowAttrib" style="width:100px;" >SELECT</th>
                                                                                                                      </tr>
                                                                                                                    </thead>
                                                                                                                  <tbody style="border-color:rgb(240,143,43) !important;" id="tab3_container">
                                                                                                                  <tr>
                                                                                                                              <td class="text-center">1</td>
                                                                                                                              <td class="text-center">Rakesh</td>
                                                                                                                              <td class="text-center">Hi, this is message</td>
                                                                                                                              <td><button class="btn mx-3" style="background:rgb(240,143,43);color:white;">Select</button></td>
                                                                                                                    </tr> <tr>
                                                                                                                              <td class="text-center">2</td>
                                                                                                                              <td class="text-center">Rahul</td>
                                                                                                                              <td class="text-center">Hi, this is message</td>
                                                                                                                              <td><button class="btn mx-3" style="background:rgb(240,143,43);color:white;">Select</button></td>
                                                                                                                    </tr> <tr>
                                                                                                                              <td class="text-center">3</td>
                                                                                                                              <td class="text-center">Gaurav</td>
                                                                                                                              <td class="text-center">Hi, this is message</td>
                                                                                                                              <td><button class="btn mx-3" style="background:rgb(240,143,43);color:white;">Select</button></td>
                                                                                                                    </tr> <tr>
                                                                                                                              <td class="text-center">4</td>
                                                                                                                              <td class="text-center">Harshit</td>
                                                                                                                              <td class="text-center">Hi, this is message</td>
                                                                                                                              <td><button class="btn mx-3" style="background:rgb(240,143,43);color:white;">Select</button></td>
                                                                                                                    </tr> <tr>
                                                                                                                              <td class="text-center">5</td>
                                                                                                                              <td class="text-center">Akash</td>
                                                                                                                              <td class="text-center">Hi, this is message</td>
                                                                                                                              <td><button class="btn mx-3" style="background:rgb(240,143,43);color:white;">Select</button></td>
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
                                                      </div>
                                                  </div> 

                                                  <div class="tab-pane col-12 m-0 p-0 tab3 fade " id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                          <div class="container">
                                                            <div class="row container-row">
                                                            <div class="col-12 px-0" >
                                                                                  <div class="row">

                                                                                          <div class="col-12 col-sm-10 mx-auto">
                                                                                              <div class="table-responsive">
                                                                                                              <table class="table table-striped table-hover" style=" width:100%;border:2px solid rgb(240,143,43) !important;border-radius:20px;">
                                                                                                                          <thead>
                                                                                                                          <tr id="preRecordRow ">
                                                                                                                          <th scope="col" class="preRecordRowAttrib red" style="width:60px;">S.N.</th>
                                                                                                                          <th scope="col" class="preRecordRowAttrib" style="width:100px;">Date</th>
                                                                                                                          <th scope="col" class="preRecordRowAttrib" style="width:120px;">Type</th>
                                                                                                                          <th scope="col" class="preRecordRowAttrib" style="width:530px;"> Message Sent</th>
                                                                                                                          <th scope="col" class="preRecordRowAttrib" style="width:70px;cursor:pointer;" >Select</th>
                                                                                                                          </tr>
                                                                                                                        </thead>
                                                                                                                      <tbody style="border-color:rgb(240,143,43) !important;" id="preRecordContainer">
                                                                                                                        <?php
                                                                                                                        $i = 0;
                                                                                                                        while($i < 5){
                                                                                                                          $i++;
                                                                                                                          echo "<tr>
                                                                                                                          <td class='text-center' >$i</td>
                                                                                                                          <td class='text-center'  >20-03-2022</td>
                                                                                                                          <td class='text-center' >Message</td>
                                                                                                                          <td class='text-center'  >this is message</td>
                                                                                                                          <td class='text-center' ><button class='btn mx-3' style='background:rgb(240,143,43);color:white;'>Select</button></td>
                                                                                                                        </tr>";
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
                                                          </div>
                                                  </div>


                                           <!-- </div> -->
                                      
                                </div>
                          </div>
                    </div>

            </div>
            </section>



            <div class="modal fade" id="imagemodal" tabindex="-1" aria-labelledby="imagemodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title label" id="imagemodalLabel">Image Editor</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="imageform">
                       <div class="row">

                            <div class="col-12 ">
                                <div class="row">
                                      <div class=" col-3 d-flex align-items-center">    
                                        <label for="" class="label fs-5 nowrap" >Choose Image :</label>  
                                      </div>                      
                                      <div class=" col-7 ms-auto d-flex flex-column my-2 p-0">
                                          <input class="label form-control me-auto paxis" type="file" id='imageeditor' name='imageeditor'>
                                      </div>
                                      <div class="col-12 d-none warnsms">
                                        <div class="text-danger  text-center" style="width:100%;">Only JPEG, JPG, PNG, GIF Images are allowed.</div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                    <div class="row">
                                      <div class=" col-3 d-flex align-items-center">    
                                        <label for="" class="label fs-5 nowrap" >Add Text :</label>  
                                      </div>                      
                                      <div class=" col-7 ms-auto  my-2 mx-0 px-0 d-flex">
                                                <input class="form-control   ms-auto paxis" type="text" id="textinput" name="texteditor">
                                                <input type="color" style="width:70px;height:100%;" class="form-control clrpicker paxis" >
                                         
                                      </div>
                                    </div>
                            </div>
                            
                            <div class="col-12">
                                          <div class="row">
                                              <div class="col-12 col-lg-5 ">
                                                    <div class="row">
                                                        <div class=" col-3 d-flex align-items-center">    
                                                          <label for="" class="label fs-5 nowrap " >Position : &nbsp;&nbsp;</label>  
                                                        </div>                      
                                                        <div class="  my-2 col-8 ms-auto mx-0 px-sm-0">
                                                            <div class="row">
                                                              <div class="col-6  ms-auto  d-flex justify-content-center align-items-center">
                                                                <label for="" class="label nowrap"> Top : &nbsp;</label> <input type="number" class="paxis form-control d-inline-block" style="width:75px;height:38px;"  name="top" id="top" min="0" max="100" value='50'>
                                                              </div>
                                                              <div class="col-6   px-0 d-flex justify-content-center align-items-center">
                                                                <label for="" class="label nowrap">  Left : &nbsp; </label><input type="number" class="paxis form-control d-inline-block" style="width:75px;height:38px;" name="left" id="left" min="0" max="100" value='50'>
                                                              </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-12 m-0 p-0 col-lg-7 ms-auto">
                                                <div class="row">
                                                      <div class="col-6 ">
                                                          <div class="row">
                                                                  <div class=" col-8 d-flex align-items-center justify-content-lg-end">    
                                                                    <label for="" class="label ms-auto fs-5 nowrap" >Font Size :</label>  
                                                                   </div>   
                                                                <div class=" col-4 m-0 p-0 ms-auto d-flex my-2 p-0">
                                                                            <input class="form-control paxis" type="number" id='fonteditor' min="5" value="100" style="width:75px;" name='fonteditor'>
                                                                </div> 
                                                          </div>
                                                      </div>                  
                                                      <div class="col-6 ">
                                                          <div class="row">
                                                                <div class="col-7  d-flex align-items-center justify-content-lg-end">    
                                                                  <label for="" class="label fs-5 nowrap" >Font Style :</label>  
                                                                </div>
                                                                <div class="col-5 m-0 p-0 d-flex my-2 justify-content-center align-items-center">
                                                                  <input type="hidden" name="font" value="segoeui.ttf">
                                                                    <select id="fonts" style="width:0px;" class="form-select paxis" aria-label="Default select example">
                                                                      <option value="1" style="font-family: segoeui;" selected>segoeui.ttf</option>
                                                                      <option value="2" style="font-family: dancing;">dancing.ttf</option>
                                                                      <option value="3" style="font-family: grape;">grape.ttf</option>
                                                                      <option value="4" style="font-family: indie;">indie.ttf</option>
                                                                      <option value="5" style="font-family: mangal;">mangal.ttf</option>
                                                                      <option value="6" style="font-family: beau;">beau.ttf</option>
                                                                  </select>
                                                                </div>
                                                          </div>
                                                      </div>
                                                </div>
                                            </div>
                                          </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="row">
                                      <div class=" col-3 d-flex align-items-center">    
                                        <label for="" class="label fs-5 nowrap" >Text Rotation :</label>  
                                      </div>                      
                                      <div class=" col-7 ms-auto  my-2 p-0">
                                          <input class="form-range me-auto" type="range" min='-180' max='180' value='0' id='rotationtext' class="paxis" name='rotationtext'>
                                          <div class="d-flex w-100 justify-content-between">
                                            <span>
                                              -180&deg;
                                            </span>
                                            <span class='pe-1'>
                                              0&deg;
                                            </span>
                                            <span>
                                              180&deg;
                                            </span>
                                          </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="row">
                                      <div class=" col-3 d-flex align-items-center">    
                                        <label for="" class="label fs-5 nowrap" >Image Rotation :</label>  
                                      </div>                      
                                      <div class=" col-7 ms-auto  my-2 p-0">
                                          <input class="form-range me-auto" type="range" min='-180' max='180' value='0' step="90" id='rotationimage' class="paxis" name='rotationimage'>
                                          <div class="d-flex w-100 justify-content-between">
                                            <span>
                                              -180&deg; 
                                            </span>
                                            <span style="margin-left:-18px;">
                                              -90&deg;  
                                            </span>
                                            <span>
                                              0&deg;  
                                            </span>
                                            <span style="margin-right:-14px;">
                                              90&deg; 
                                            </span>
                                            <span>
                                              180&deg;  
                                            </span>
                                          </div>
                                      </div>
                                </div>
                            </div>
                            <!-- <div class="col-12">
                                            <button type="submit" id="imagebtn"  class="btn text-white  ms-auto float-end" style="background:rgb(255 163 67);font-size:15px;cursor:pointer;">Submit</button>
                            </div> -->
                            <div class="col-12 col-sm-10 mx-auto my-3" id="imagediv">
                                
                            </div>
                           
                         </div>
                  </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                <a href='#' id="aimg"><button type="button" id="save_image" class="btn btn-primary">Save <i class="fas fa-download"></i></button></a>
                  
                </div>
              </div>
            </div>
          </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="script/script.js"> </script>
  </body>
</html>
