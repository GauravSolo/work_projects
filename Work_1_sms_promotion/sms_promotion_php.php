<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="sms_promotion_php.css"/>
    <link rel="stylesheet" href="styles.css"/>
  </head>
  <body >
            <div class="container-fluid px-0">
             
            <div class="row m-0 p-0">
              <div class="col nav-bar m-0 p-0">
                <nav class="navbar navbar-expand-lg navbar-light h-100">
                  <div class="container-fluid d-flex justify-content-center">
                    <div class="row">
                      <div class="col">
                      <a class="navbar-brand position-relative text-start text-sm-end d-inline-block" target="_blank" style="width: 150px" href="https://riseretail.net"><img src="main_logo.png" style=" background-color: rgb(240,143,43);" class="w-100 " alt="Rise_Retail"></a>
                      </div>
                      <div class="col">
                      <div class="d-flex ms-0 ms-sm-5" id="navbarSupportedContent">
                      <div class="row">
                        <div class="col">
                      
                          <div class="row mb-0 d-flex">
                            <div class="col-12">
                            <h4 class="mb-0 " style="border-bottom:1px solid rgb(240,143,43) ;color:rgb(240,143,43);">Shop Name</h4>
                            </div>
                            <div class="col-12 col-sm-6 pe-0">
                            Credit Balance - 
                            </div> 
                            <div class="col-12 col-sm-4 d-flex px-sm-0">
                            SMS: <span class="mx-1" style="color:rgb(240,143,43);">317</span> Email: <span class="mx-1" style="color:rgb(240,143,43);">0</span>
                            </div>
                           </div>
                        </div>
                      </div>
                    </div>
                      </div>
                    </div>
                    
                    
                   
                  </div>
                </nav>
              </div>
            </div>
            
            <div class="row  m-0 position-relative" id="main-div">
                
                <div class="col-12 main-panel">
                    <div class="row">
                        <div class="col px-0" >
                            <h2 class="text-center my-3 my-sm-5" style="color:rgb(240,143,43);"><span style="border-bottom:2px solid;">SMS PROMOTION</span></h2>
                            <div class="tab-content" id="myTabContent">
                                

                            <div class="col-7 mx-auto side-panel px-0 ">
                                <div class="row m-0">
                                    <div class="col p-0 m-0">
                                        <ul class="nav nav-tabs flex-row nav-fill" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">New Record</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link " id="update-tab" data-bs-toggle="tab" data-bs-target="#update" type="button" role="tab" aria-controls="update" aria-selected="false">Template</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Prev Record</button>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                              </div>

                                <div class="tab-pane tab1 fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    
                                                    
                                        <div class="container">
                                                  <div class="row container-row">
                                                    <div class="col">
                                                      <form>
                                                        <div class="row">
                                                          <div class="col-12 col-sm-5 mb-5 mb-sm-0 ms-auto">
                                                            <div class="row">
                                                              <div class="col-12">
                                                                <div class="mb-0 mb-sm-3">
                                                                  <textarea type="text" placeholder="Message" rows="7" class="tab1_inputs pt-2" id="input_promotion_type"></textarea>
                                                                  
                                                                </div>
                                                              </div>
                                                              <div class="col-12">
                                                                  <div class="row">
                                                                    <div class="col-12 col-sm-6">
                                                                      <div id="promotion_count_label">SMS Count 0</div>
                                                                      <input type="datetime-local" min="<?php echo date("Y-m-d"); ?>" name="date" class="tab1_inputs" id="input_date" />
                                                                      <input type="hidden" name="type" value="Custom(SMS)" id="input_hiddenType" />
                                                                    </div>
                                                                 
                                                                    <div class="col-12 col-sm-6">
                                                                      
                                                                      <textarea type="text" maxlength="100" placeholder="Remarks (If any)" name="remark" value="" class="tab1_inputs" id="input_promtion_remark"></textarea>
                                                                      <div id="submit_data" onclick="checkSubmit()">Submit</div>
                                                                    </div>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="col-12 col-sm-6 mb-5 mb-sm-0">
                                                            <div id="promotionCreated" class="mx-auto">
                                                              <br/>
                                                              <input type="radio" class="tab1_input_radio  form-check-input" name="customer" value="only" onclick="manageRadio(0)" id="flexRadioDefault1" />
                                                              <label class="form-check-label" for="flexRadioDefault1">All Buyers and Non-Buyers</label>
                                                              <br/>
                                                              <br/>
                                                              <input type="radio" class="tab1_input_radio  form-check-input" name="customer" value="only" onclick="manageRadio(0)" id="flexRadioDefault2" />
                                                              <label class="form-check-label" for="flexRadioDefault2">Only Buyers</label>
                                                              <br/>
                                                              <br/>
                                                              <div class="hr"></div><br/>
                                                                

                                                              <input type="radio" class="tab1_input_radio  form-check-input" name="customer" value="lost30" onclick="manageRadio(0)" id="flexRadioDefault3" />
                                                              <label class="form-check-label" for="flexRadioDefault3">Lost customers in last 30 days</label>
                                                              <br/>
                                                              <br/>
                                                              <input type="radio" class="tab1_input_radio  form-check-input" name="customer" value="lost30" onclick="manageRadio(0)" id="flexRadioDefault4" />
                                                              <label class="form-check-label" for="flexRadioDefault4">Lost customers in last 90 days</label>
                                                              <br/>
                                                              <br/>
                                                              <div class="hr"></div><br/>
                                                                
                                                              <input type="radio" class="tab1_input_radio  form-check-input" name="customer" value="seg" onclick="manageRadio(1)" id="flexRadioDefault5" />
                                                              <label class="form-check-label" for="flexRadioDefault5">Select from buyers segments</label>
                                                              <br/>
                                                              <input type="checkbox" class="tab1_input_radio  form-check-input" name="segmentP" id="checkbox1" style="margin-left:20px;"/>
                                                              <label class="form-check-label" for="checkbox1">Premium</label><br/>

                                                              <input type="checkbox" class="tab1_input_radio  form-check-input" name="segmentR" id="checkbox2" style="margin-left:20px;"/>
                                                              <label class="form-check-label" for="checkbox2">Regular</label><br/>
                                                        </div>
                                                          </div>
                                                        </div>
                                                      </form>
                                                    </div>
                                                  </div>
                                        </div>
            
                                </div>    

                                <div class="tab-pane tab2 fade" id="update" role="tabpanel" aria-labelledby="update-tab">

                                  <div class="container">
                                    <div class="row container-row">
                                        <div class="col">
                                            <div class="row">

                                                    <div class="col-12 col-sm-10 mx-auto mb-2">
                                                            <div class="row">
                                                                  <div class="col-8 ps-0">
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
                                                                                                    <tr id="templateRow ">
                                                                                                      <th scope="col" class="templateRowAttrib" style="width:8.5%;">S.N.</th>
                                                                                                      <th scope="col" class="templateRowAttrib" style="width:20%;">Name</th>
                                                                                                      <th scope="col" class="templateRowAttrib" style="width:75%;">Message</th>
                                                                                                      <th scope="col" class="templateRowAttrib" style="width:8.5%;" >SELECT</th>
                                                                                                    </tr>
                                                                                                  </thead>
                                                                                                <tbody style="border-color:rgb(240,143,43) !important;" id="tab2_container">
                                                                                                 <tr>
                                                                                                    <td>348939</td>
                                                                                                    <td class="text-center">djkshfd</td>
                                                                                                    <td>message</td>
                                                                                                    <td></td>
                                                                                                  </tr><tr>
                                                                                                    <td>348939</td>
                                                                                                    <td class="text-center" >djkshfd</td>
                                                                                                    <td>message</td>
                                                                                                    <td></td>
                                                                                                  </tr><tr>
                                                                                                    <td>348939</td>
                                                                                                    <td class="text-center" >djkshfd</td>
                                                                                                    <td>message</td>
                                                                                                    <td></td>
                                                                                                  </tr><tr>
                                                                                                    <td>348939</td>
                                                                                                    <td class="text-center" >djkshfd</td>
                                                                                                    <td>message</td>
                                                                                                    <td></td>
                                                                                                  </tr><tr>
                                                                                                    <td>348939</td>
                                                                                                    <td class="text-center" >djkshfd</td>
                                                                                                    <td>message</td>
                                                                                                    <td></td>
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

                                <div class="tab-pane tab3 fade " id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                                                                                                      <tr>
                                                                                                        <td>348939</td>
                                                                                                        <td >djkshfd</td>
                                                                                                        <td>message</td>
                                                                                                        <td >djkshfd</td>
                                                                                                        <td>message</td>
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
                        </div>
                    </div>
                </div>
            </div>
            
            </div>


            <div id="toast">Promotion Successfull</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="sms_promotion_php.js"> </script>
  </body>
</html>
