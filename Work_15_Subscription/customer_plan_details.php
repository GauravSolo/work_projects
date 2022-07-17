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
     <div class="col-5 h-100" >
                <div class="table-responsive  m-0">
                        <table  class="table  table-striped table-sm ">
                            <thead>
                                    <tr>
                                        <th colspan="5">
                                                    <div class="row m-0 text-dark">
                                                        <div class="col  nowrap ">
                                                            Price History
                                                        </div>
                                                    </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center;">S.No.</th>
                                        <th style="text-align:center;">Date</th>
                                        <th style="text-align:center;">Price</th>
                                        <th style="text-align:center;">Paid</th>
                                        <th style="text-align:center;">Due Balance</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php
                                // test query
                                // SELECT date(Subcription_Payment_Master.Timestamp) as tx_date,Subcription_Master.Package_Cost as price, Subcription_Payment_Master.Amount as paid
                                //     FROM  `Subcription_Payment_Master` JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                                //     WHERE  Subcription_Payment_Master.Customer_Id = -550 AND Subcription_Master.Retailer_Id = 223 AND Subcription_Payment_Master.Subcription_Child_Id =336 AND Subcription_Payment_Master.Amount != 0
                                //     ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id asc



                                    $customer_id = $_GET["customer_id"];
                                    $Subcription_Child_Id = $_GET["Subcription_Child_Id"];

                                    $query = "SELECT date(Subcription_Payment_Master.Timestamp) as tx_date,Subcription_Master.Package_Cost as price, Subcription_Payment_Master.Amount as paid
                                    FROM  Subcription_Payment_Master JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                                    WHERE  Subcription_Payment_Master.Customer_Id = '$customer_id' AND Subcription_Master.Retailer_Id = '$Retailer_Id' AND Subcription_Payment_Master.Subcription_Child_Id ='$Subcription_Child_Id' AND Subcription_Payment_Master.Amount != 0
                                    ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id ASC";

                                    $statement  = $db->prepare($query);
                                    $statement->execute();
                                    $rows = $statement->fetchAll();
                                    $i=1;
                                    $sum=0;
                                    foreach($rows as $row){

                                ?>
                                    <tr>
                                        <td style="text-align:center;"><?php echo $i++; ?></td>
                                        <td style="text-align:center;"><?php echo $row["tx_date"]; ?></td>
                                        <td style="text-align:center;"><?php echo $row["price"]; ?></td>
                                        <td style="text-align:center;"><?php echo $row["paid"]; ?></td>
                                        <td style="text-align:center;">
                                            <?php 
                                                $sum += $row["paid"];
                                                $due = $row["price"]-$sum;
                                                echo $due;
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                </div>
     </div>
     <?php  
     if($_GET["type"] != '3'){
     ?>
     <div class="col-5  h-100">
            <div class="table-responsive  m-0">
            
                <table class="table  table-striped table-sm ">
                    <thead>
                    <tr>
                            <th colspan="5">
                                        <div class="row m-0 text-dark">
                                            <div class="col  nowrap ">
                                                Package History
                                            </div>
                                        </div>
                            </th>
                    </tr>
                    <tr>
                            <th style="text-align:center;">S.No.</th>
                            <th style="text-align:center;">Date</th>
                           
                            <?php  
                                if($_GET["type"] == '4'){
                                    echo " <th style='text-align:center;'>Package Items</th>
                                           <th style='text-align:center;'>Used/Pending</th>
                                           <th style='text-align:center;'>Action</th>";
                                }else{

                                    if($_GET["type"] == '1'){
                                        echo " <th style='text-align:center;'>Visit Quota</th>";
                                    }else if($_GET["type"] == '2'){
                                        echo " <th style='text-align:center;'>Service Value</th>";
                                    }
    
                                    echo "<th style='text-align:center;'>Used</th>
                                          <th style='text-align:center;'>Due Balance</th>";
                                }
                            ?>
                            
                    </tr>
                    </thead>
                    <?php
                        if($_GET["type"] == "1"){
                    ?>
<tbody>
                        <?php
                        $query = "SELECT date(Subcription_Payment_Master.Timestamp) as tx_date,Subcription_Master.Visit_Counts as visits,Subcription_Payment_Master.Visits as visit
                        FROM  Subcription_Payment_Master JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                        WHERE  Subcription_Payment_Master.Customer_Id = '$customer_id' AND Subcription_Master.Retailer_Id = '$Retailer_Id' AND Subcription_Payment_Master.Subcription_Child_Id ='$Subcription_Child_Id' 
                        ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id ASC";


                        //   $query = "SELECT date(`Subcription_Payment_Master.Timestamp`) as tx_date, Subcription_Master.Visit_Counts as visits, Subcription_Payment_Master.Visits as visit
                        //   FROM  `Subcription_Payment_Master` JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                        //   WHERE  Subcription_Payment_Master.Customer_Id = '$customer_id' AND Subcription_Master.Retailer_Id = '$Retailer_Id' AND Subcription_Payment_Master.Subcription_Child_Id ='$Subcription_Child_Id'
                        // ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id ASC";

                          $statement  = $db->prepare($query);
                          $statement->execute();
                          $rows = $statement->fetchAll();
                          $i=1;
                          foreach($rows as $row){

                      ?>
                          <tr>
                              <td style="text-align:center;"><?php echo $i++; ?></td>
                              <td style="text-align:center;"><?php echo $row["tx_date"]; ?></td>
                              <td style="text-align:center;">
                                <?php 
                                      if($i == 2)
                                      {
                                        $price =  $row["visits"];
                                      }else{
                                        $price = $due;
                                      }
                                          
                                      echo $price;
                                ?>
                              </td>
                              <td style="text-align:center;"><?php echo $row["visit"]; ?></td>
                              <td style="text-align:center;">
                                  <?php 
                                      $due = $price - $row["visit"];
                                      echo $due;
                                  ?>
                              </td>
                          </tr>
                        <?php
                          }  
                        ?>
                    </tbody>

                    <?php
                        }else if($_GET["type"] == "2"){
                    ?>

                    <tbody>
                        <?php
                        $query = "SELECT date(Subcription_Payment_Master.Timestamp) as tx_date, Subcription_Master.Cumulative_Sum as servicevalue, Subcription_Payment_Master.Service_Amount as paid
                        FROM  Subcription_Payment_Master JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                        WHERE  Subcription_Payment_Master.Customer_Id = '$customer_id' AND Subcription_Master.Retailer_Id = '$Retailer_Id' AND Subcription_Payment_Master.Subcription_Child_Id ='$Subcription_Child_Id' AND Subcription_Payment_Master.Service_Amount != 0
                        ORDER BY  Subcription_Payment_Master.Subcription_Payment_Master_Id ASC";

                        //   $query = "SELECT date(`Subcription_Payment_Master.Timestamp`) as tx_date, Subcription_Master.Cumulative_Sum as servicevalue, Subcription_Payment_Master.Service_Amount as paid
                        //   FROM  `Subcription_Payment_Master` JOIN Subcription_Master ON Subcription_Payment_Master.Subcription_Id = Subcription_Master.Subcription_Id
                        //   WHERE  `Customer_Id` = '$customer_id' AND `Retailer_Id` = '$Retailer_Id' AND `Subcription_Child_Id` ='$Subcription_Child_Id'
                        //   ORDER BY  `Subcription_Payment_Master_Id` ASC";

                          $statement  = $db->prepare($query);
                          $statement->execute();
                          $rows = $statement->fetchAll();
                          $i=1;
                          foreach($rows as $row){

                      ?>
                          <tr>
                              <td style="text-align:center;"><?php echo $i++; ?></td>
                              <td style="text-align:center;"><?php echo $row["tx_date"]; ?></td>
                              <td style="text-align:center;">
                                <?php 
                                      if($i == 2)
                                      {
                                        $price =  $row["servicevalue"];
                                      }else{
                                        $price = $due;
                                      }
                                          
                                      echo $price;
                                ?>
                              </td>
                              <td style="text-align:center;"><?php echo $row["paid"]; ?></td>
                              <td style="text-align:center;">
                                  <?php 
                                      $due = $price - $row["paid"];
                                      echo $due;
                                  ?>
                              </td>
                          </tr>
                        <?php
                          }  
                        ?>
                    </tbody>
                    <?php
                        }else if($_GET["type"] == "4"){
                    ?>

                    <tbody>
                          <tr>
                              <td style="text-align:center;">dsfddd</td>
                              <td style="text-align:center;">sdsfds</td>
                              <td style="text-align:center;">dfdsdd</td>
                              <td style="text-align:center;">dfds</td>
                              <td style="text-align:center;">dsdsfd</td>
                          </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                    
                </table>
            </div>
    </div>
    <?php  
     }
     ?>
</div>