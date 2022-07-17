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
                <div class="col-11  h-100">
                    <?php

                        include "config.inc.php";
                        $Retailer_Id = $_SESSION['Retailer_id'];
                        $id = $_GET["id"];

                                $query = "SELECT * FROM `Subcription_Master` WHERE `Retailer_Id`= '$Retailer_Id' AND Subcription_Id = '$id'";
                                $statement  = $db->prepare($query);
                                $result = $statement->execute();

                                if($statement->rowCount() > 0)
                                {
                                    $row = $statement->fetch();
                                    $package_type_number = $row['Package_Type'];
                    ?>
                                                                    <div class="table-responsive">
                                                                            <table  class="table table-striped">
                                                                                <thead>
                                                                                <tr>
                                                                                                                    <th style="text-align:center;" class="name">Name of Plan</th>
                                                                                                                    <th style="text-align:center;" class="price">Price (Rs)</th>
                                                                                                                    <th style="text-align:center;" class="validity">Validity (days)</th>
                                                                                                                    <?php
                                                                                                                        if($package_type_number == '1'){
                                                                                                                            echo "<th style='text-align:center;' class='discount'>Visits Allowed</th>";
                                                                                                                        }else if($package_type_number == '2'){
                                                                                                                           echo "<th style='text-align:center;' class='service'>Service Value (Rs)</th>";
                                                                                                                        }else if($package_type_number == '3'){
                                                                                                                           echo "<th style='text-align:center;' class='discount'>(%) discount on bill</th>";
                                                                                                                        }else if($package_type_number == '4'){
                                                                                                                           echo "<th style='text-align:center;white-space:nowrap;'>Package (Item 1 + Item 2 + ....)</th>";
                                                                                                                        }else{
                                                                                                                            echo "<th style='text-align:center;white-space:nowrap;'>unknown</th>";
                                                                                                                        }

                                                                                                                    ?>
                                                                                                                    
                                                                                                                    <th style="text-align:center;" class="disc">Description</th>

                                                                                </tr>
                                                                                </thead>
                                                                                <tbody >
                                                                                    <td><?php  echo $row["Package_Name"]; ?></td>
                                                                                    <td><?php  echo $row["Package_Cost"]; ?></td>
                                                                                    <td><?php  echo $row["Valid_Days"]; ?></td>
                                                                                    <td>
                                                                                        <?php  
                                                                                            if($package_type_number == '1'){
                                                                                                echo $row["Visit_Counts"];
                                                                                            }else if($package_type_number == '2'){
                                                                                            echo $row["Cumulative_Sum"];
                                                                                            }else if($package_type_number == '3'){
                                                                                            echo $row["Per_Discount"];
                                                                                            }else if($package_type_number == '4'){
                                                                                            echo str_replace(","," , ",$row["Package_Items"]);
                                                                                            }else{
                                                                                                echo "<th style='text-align:center;white-space:nowrap;'>unknown</th>";
                                                                                            }

                                                                                        ?>
                                                                                    </td>
                                                                                    <td><?php  echo $row["Package_Desc"]; ?></td>

                                                                                </tbody>
                                                                            </table>
                                                                            
                                                                        </div>
                                                                        <?php
                                }else{
                                    echo "No Data";
                                }
                                                                         ?>
                </div>
   </div>
  </div>
  </div>


	</div>