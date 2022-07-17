<?php

include "config.inc.php";
$Retailer_Id = $_SESSION['Retailer_id'];
?>
<style>
    .toggle-btn {
  position: relative;
  display: inline-block;
  /* background: #3890b3; */
  /* color: white; */
  background: #6b93d1;
  color: white;
  /* width: 89px; */
  width: 100%;
  padding:10px;
  text-decoration: none !important;
  margin-bottom: 5px;
  font-weight: bold;
}
.toggle-btn:visited{
    color: white !important;
}

</style>

<div class="row d-flex flex-column flex-sm-row justify-content-center py-4" >
<div class="col-5  h-100">
            <div class="table-responsive  m-0">
            
                <table class="table  table-striped table-sm ">
                    <thead>
                    <tr>
                            <th colspan="5">
                                        <div class="row m-0 text-dark">
                                            <div class="col  nowrap ">
                                                Package Cost Execution
                                            </div>
                                        </div>
                            </th>
                    </tr>
                    <tr>
                        <th style="text-align:center;">Date</th>
                        <th style='text-align:center;'>Due Balance</th>
                        <th style='text-align:center;'>Paid</th>
                        <th style='text-align:center;'>New due balance</th>
                            
                    </tr>
                    </thead>
<tbody>
                          <tr>
                              <td style="text-align:center;">sddsfddds</td>
                              <td style="text-align:center;">ddasddfss</td>
                              <td style="text-align:center;">dsdfddssd</td>
                              <td style="text-align:center;">ddsssddsdf</td>
                          </tr>
                    </tbody>

                </table>
            </div>
    </div>
     <div class="col-5  h-100">
            <div class="table-responsive  m-0">
            
                <table class="table  table-striped table-sm ">
                    <thead>
                    <tr>
                            <th colspan="5">
                                        <div class="row m-0 text-dark">
                                            <div class="col  nowrap ">
                                                Package Plan Execution
                                            </div>
                                        </div>
                            </th>
                    </tr>
                    <tr>
                        <th style="text-align:center;">Date</th>
                        <th style='text-align:center;'>Service Value</th>
                        <th style='text-align:center;'>Paid</th>
                        <th style='text-align:center;'>New balance</th>
                    </tr>
                    </thead>
<tbody>
                          <tr>
                              <td style="text-align:center;">ddsdds</td>
                              <td style="text-align:center;">ddasds</td>
                              <td style="text-align:center;">dsdfsd</td>
                              <td style="text-align:center;">ddsssdf</td>
                          </tr>
                    </tbody>

                </table>
            </div>
    </div>
</div>