<?php
session_start();
require("config.inc.php");
$Retailer_Id = $_SESSION['Retailer_id'];
$id = $_GET["id"];

$deduct = "SELECT  COALESCE(sum(Stock_Topup_Count), 0) as count FROM Stock_Topup WHERE Retailer_Id = '$Retailer_Id' and Staff_Sub_Service_Id = '$id' and Type in (0,-1)";
$st  = $db->prepare($deduct);
$st->execute();
$rowdeduct = $st->fetch();

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
     <div class="col-4 h-100" style="background: white;">
                        <div class="row">
                                        <div class="col">
                                                            <div style="font-weight: bold; padding : 8px;border-bottom : 2px solid;margin-bottom: 5px ;">Total Deduct : <span class="txn_count"><?php echo $rowdeduct['count']; ?></span></div>
                                        </div>
                        </div>
            <div class="row">
                <div class="col-12">
                    <?php

                            $sql1 = "SELECT  COALESCE(sum(Stock_Topup_Count), 0) as count FROM Stock_Topup WHERE Retailer_Id = '$Retailer_Id' and Staff_Sub_Service_Id = '$id' and Type = 0";
                            $st  = $db->prepare($sql1);
                            $st->execute();

                            $row1 = $st->fetch();
                            ?>
                                    <a class="toggle-btn" id="invoice" href="#!">
                                    Invoice Deduct : <?php echo $row1["count"]; ?>
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
                                        <th style="width: 110px;text-align:center;">Date</th>
                                        <th style="width: 50px;text-align:center;">Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php
                                $sql = "SELECT * FROM Stock_Topup where Retailer_Id = '$Retailer_Id' and Staff_Sub_Service_Id = '$id' and Type = 0";
                                $statement  = $db->prepare($sql);
                                $result = $statement->execute();
    
                                $rows = $statement->fetchAll();
                                $i = 1;
                                    
                                    foreach($rows as $row){
                                    
                                        ?>

                                        <tr>
                                            <td style="width: 50px;text-align:center;"><?php echo $i; ?></td>
                                            <td style="width: 50px;text-align:center;"><?php echo $row["Stock_Topup_Count"]; ?></td>
                                            <td style="width: 110px;text-align:center;"><?php echo $row["Timestamp"]; ?></td>
                                            <td style="width: 50px;text-align:center;"><?php echo $row["Remark"]; ?></td>
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
                <?php

                        $sql2 = "SELECT  COALESCE(sum(Stock_Topup_Count), 0) as count FROM Stock_Topup WHERE Retailer_Id = '$Retailer_Id' and Staff_Sub_Service_Id = '$id' and Type = -1";
                        $st  = $db->prepare($sql2);
                        $st->execute();

                        $row2 = $st->fetch();
                        ?>
                <a class="toggle-btn" id="manual" href="#!">
                                         Manual Deduct : <?php echo $row2['count'];?>
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
                                        <th style="width: 110px;text-align:center;">Date</th>
                                        <th style="width: 50px;text-align:center;">Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php
                                $sql = "SELECT * FROM Stock_Topup where Retailer_Id = '$Retailer_Id' and Staff_Sub_Service_Id = '$id' and Type = -1";
                                $statement  = $db->prepare($sql);
                                $result = $statement->execute();


                                    $rows = $statement->fetchAll();
                                    $i = 1;
                                    foreach($rows as $row){
                                    
                                        ?>

                                        <tr>
                                            <td style="width: 50px;text-align:center;"><?php echo $i; ?></td>
                                            <td style="width: 50px;text-align:center;"><?php echo $row["Stock_Topup_Count"]; ?></td>
                                            <td style="width: 110px;text-align:center;"><?php echo $row["Timestamp"]; ?></td>
                                            <td style="width: 50px;text-align:center;"><?php echo $row["Remark"]; ?></td>
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
       <?php

$sql2 = "SELECT  COALESCE(sum(Stock_Topup_Count), 0) as count FROM Stock_Topup WHERE Retailer_Id = '$Retailer_Id' and Staff_Sub_Service_Id = '$id' and Type = 1";
$st  = $db->prepare($sql2);
$st->execute();

$row3 = $st->fetch();
?>
                                                                                            <th colspan="5">
                                                                                                        <div class="row m-0 text-dark">
                                                                                                            <div class="col  nowrap ">
                                                                                                                Total Add : <span class="txn_count"><?php echo $row3['count']; ?></span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                            </th>
                                                                                            </tr>
        <tr>
                <th style="width: 50px;text-align:center;">S.No.</th>
                <th style="width: 50px;text-align:center;">Stock</th>
                <th style="width: 110px;text-align:center;">Date</th>
                <th style="width: 50px;text-align:center;">Remarks</th>
       </tr>
       </thead>
       <tbody>

<?php

            $sql = "SELECT * FROM Stock_Topup where Retailer_Id = '$Retailer_Id' and Staff_Sub_Service_Id = '$id' and Type = 1";
            $statement  = $db->prepare($sql);
            $result = $statement->execute();
    
    
                $rows = $statement->fetchAll();
                $i = 1;
                foreach($rows as $row){
                 
                    ?>
    
                    <tr>
                        <td style="width: 50px;text-align:center;"><?php echo $i; ?></td>
                        <td style="width: 50px;text-align:center;"><?php echo $row["Stock_Topup_Count"]; ?></td>
                        <td style="width: 110px;text-align:center;"><?php echo $row["Timestamp"]; ?></td>
                        <td style="width: 50px;text-align:center;"><?php echo $row["Remark"]; ?></td>
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