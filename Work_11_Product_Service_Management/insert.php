<?php
require 'config.php';
session_start();
if(isset($_POST['sub_category']))
      {
        $category_name = $_SESSION['category_name'];
        $sub_category = $_POST['sub_category'];
        $GST = $_POST['GST'];
        $price = $_POST['price'];
        $commission_per= $_POST['commission_per'];
        $commission = $_POST['commission'];
        $discount_per=$_POST['discount_per'];
        $discount=$_POST['discount'];
        $num=0;
        $count= mysqli_query($con,"SELECT COUNT(*) as p_count from products_tb 
          WHERE subcategory_name='$sub_category'");
        $row = mysqli_fetch_array($count);
        $num= $row['p_count'];
        if($num>0){
          echo '<script type="text/javascript"> alert("alreay present.") </script>';
        }
        else{
          $query= "insert into products_tb values('','$category_name',
            '$sub_category','$GST','$price','$commission_per','$commission','$discount_per','$discount')";
            $query_run = mysqli_query($con,$query);
            if($query_run)
            {
              echo 1;
            }
            else
            {
              echo 0;
            }
          }
        }
      ?>