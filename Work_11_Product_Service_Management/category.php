<?php
require 'config.php';
session_start();

  if(!empty($_POST['category'])){
    $type=$_POST['type'];
    $category=$_POST['category'];
    $query= "select * from category_tb WHERE category_name='$category'";
              $query_run = mysqli_query($con,$query);
              if(mysqli_num_rows($query_run)>0)
              {
                echo '<script type="text/javascript"> alert("Category already exists..") </script>';
              }
              else{
                while(mysqli_next_result($conn)){;}
            $query= "insert into category_tb(category_name,type) values('$category','$type')";
            $query_run = mysqli_query($con,$query);
            $_SESSION['category_name']=$category;
          if($query_run)
                    {
                  echo 1;
                  }
          else{
            echo 0;
            }
         }
        }
        else{
          $_SESSION['category_name']=$_POST['category_name'];
         }


?>