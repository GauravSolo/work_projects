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
     <div class="col-4 h-100" style="background: white;">
                        <div class="row">
                                        <div class="col">
                                                            <div style="font-weight: bold; padding : 8px;border-bottom : 2px solid;margin-bottom: 5px ;">Total Deduct : <span class="txn_count">10</span></div>
                                        </div>
                        </div>
            <div class="row">
                <div class="col-12">
                                    <a class="toggle-btn" id="invoice" href="#!">
                                    Invoice Deduct : 10
                                    <i class="fas float-end fa-caret-up"  style="display:none;"></i>
                                    <i class="fas float-end fa-caret-down" ></i>
                                    </a>
                                    </div>
                <div class="col-12">
                        <div class="table-responsive">
                            <table id="item_report_deduct" style="display:none;" class="table table-bordered table-striped table-sm m-0" >
                            <thead>
                                <tr>
                                        <th style="width: 50px;text-align:center;">S.No.</th>
                                        <th style="width: 50px;text-align:center;">Stock</th>
                                        <th style="width: 50px;text-align:center;">Date</th>
                                        <th style="width: 50px;text-align:center;">Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php

                        include "config.php";
                        $id = $_GET["id"];
                                $sql = "SELECT * FROM stock where service_id = $id and stockcount < 0";
                                $statement  = $db->prepare($sql);
                                $result = $statement->execute();


                                    $rows = $statement->fetchAll();
                                    $i = 1;
                                    foreach($rows as $row){
                                    
                                        ?>

                                        <tr>
                                            <td style="width: 50px;text-align:center;"><?php echo $i; ?></td>
                                            <td style="width: 50px;text-align:center;"><?php echo $row["stockcount"]; ?></td>
                                            <td style="width: 50px;text-align:center;"><?php echo "date"; ?></td>
                                            <td style="width: 50px;text-align:center;"><?php echo "remarks"; ?></td>
                                        </tr>

                                    <?php

                                        $i++;
                                    }




                                     ?>




                                    </tbody>
                                    </table>
                                    </div>
                 </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                <a class="toggle-btn" id="manual" href="#!">
                                         Manual Deduct : 10
                                     <i class="fas float-end fa-caret-up" style="display:none;"></i>
                                    <i class="fas float-end fa-caret-down"  ></i>
                                    </a>
</div>

                <div class="col-12">
                        <div class="table-responsive">
                            <table id="item_report_manual"   style="display:none;"  class="table table-bordered table-striped table-sm m-0" >
                            <thead>
                                <tr>
                                        <th style="width: 50px;text-align:center;">S.No.</th>
                                        <th style="width: 50px;text-align:center;">Stock</th>
                                        <th style="width: 50px;text-align:center;">Date</th>
                                        <th style="width: 50px;text-align:center;">Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php
                                $sql = "SELECT * FROM stock where service_id = $id and stockcount < 0";
                                $statement  = $db->prepare($sql);
                                $result = $statement->execute();


                                    $rows = $statement->fetchAll();
                                    $i = 1;
                                    foreach($rows as $row){
                                    
                                        ?>

                                        <tr>
                                            <td style="width: 50px;text-align:center;"><?php echo $i; ?></td>
                                            <td style="width: 50px;text-align:center;"><?php echo $row["stockcount"]; ?></td>
                                            <td style="width: 50px;text-align:center;"><?php echo "date"; ?></td>
                                            <td style="width: 50px;text-align:center;"><?php echo "remarks"; ?></td>
                                        </tr>

                                    <?php

                                        $i++;
                                    }




                                     ?>




                                    </tbody>
                                    </table>
                                    </div>
                 </div>
            </div>
     </div>
     <div class="col-4  h-100">
     <div class="table-responsive  m-0">
      <table id="item_report_add" class="table table-bordered table-striped table-sm ">
       <thead>
       <tr>
                                                                                            <th colspan="5">
                                                                                                        <div class="row m-0 text-dark">
                                                                                                            <div class="col  nowrap ">
                                                                                                                Total Add : <span class="txn_count">10</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                            </th>
                                                                                            </tr>
        <tr>
                <th style="width: 50px;text-align:center;">S.No.</th>
                <th style="width: 50px;text-align:center;">Stock</th>
                <th style="width: 50px;text-align:center;">Date</th>
                <th style="width: 50px;text-align:center;">Remarks</th>
       </tr>
       </thead>
       <tbody>

<?php

            $sql = "SELECT * FROM stock where service_id = $id and stockcount > 0";
            $statement  = $db->prepare($sql);
            $result = $statement->execute();
    
    
                $rows = $statement->fetchAll();
                $i = 1;
                foreach($rows as $row){
                 
                    ?>
    
                    <tr>
                        <td style="width: 50px;text-align:center;"><?php echo $i; ?></td>
                        <td style="width: 50px;text-align:center;"><?php echo $row["stockcount"]; ?></td>
                        <td style="width: 50px;text-align:center;"><?php echo "date"; ?></td>
                        <td style="width: 50px;text-align:center;"><?php echo "remarks"; ?></td>
                    </tr>
    
                <?php
    
                    $i++;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        // $("#item_report_deduct").hide();
        // $("#item_report_manual").hide();
  document.querySelector("#invoice").addEventListener("click",()=>{
    $("#item_report_deduct").toggle();
    $("#invoice > i.fa-caret-up").toggle();
    $("#invoice > i.fa-caret-down").toggle();
    console.log("click");
  });

  document.querySelector("#manual").addEventListener("click",()=>{
    $("#item_report_manual").toggle();
    $("#manual > i.fa-caret-up").toggle();
    $("#manual > i.fa-caret-down").toggle();
    console.log("click");
  });
</script>