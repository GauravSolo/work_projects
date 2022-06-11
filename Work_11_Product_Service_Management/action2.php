<?php
ini_set('error_reporting', E_ALL );
// ini_set('display_errors', 1 );
ini_set('error_log', 'error.log');

include('database_connection.php');
session_start();


if(isset($_POST['action']) && $_POST['action'] == 'edit')
{
 $data = array(
  ':GST'  => $_POST['GST'],
  ':price'  => $_POST['price'],
  ':Commission_per'   => $_POST['Commission_per'],
  ':Commission'   => $_POST['Commission'],
  ':discount_per'   => $_POST['discount_per'],
  ':discount'   => $_POST['discount'],
  ':sub_category_id'    => $_POST['sub_category_id']
 );
 $query = "
 UPDATE products_tb
 SET GST = :GST, 
 price = :price, 
 Commission_per = :Commission_per,
 Commission = :Commission,
 discount_per = :discount_per,
 discount = :discount  
 WHERE sub_category_id = :sub_category_id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
 $connect = NULL;
 die();
}

if(isset($_POST['action']) && $_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM products_tb 
 WHERE sub_category_id = '".$_POST["sub_category_id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
 $connect = NULL;
 die();
}

if(isset($_POST['fetch']))
{
  $column = array("category_id","sub_category_id","type","category_name", "subcategory_name", "GST", "price","commission_per","commission","discount_per","discount");

        $query = "SELECT products_tb.sub_category_id,category_tb.type,category_tb.category_name,products_tb.subcategory_name,products_tb.GST,products_tb.price,products_tb.price,products_tb.commission_per,products_tb.commission,products_tb.discount_per,products_tb.discount
        FROM category_tb
        INNER JOIN products_tb ON category_tb.category_name =products_tb.category_name";
        if(isset($_POST["search"]["value"]))
        {
        $query .= '
        AND (category_tb.type LIKE "%'.$_POST["search"]["value"].'%"
        OR category_tb.category_name LIKE "%'.$_POST["search"]["value"].'%" 
        OR products_tb.subcategory_name LIKE "%'.$_POST["search"]["value"].'%" 
        OR products_tb.GST LIKE "%'.$_POST["search"]["value"].'%" 
        OR products_tb.price LIKE "%'.$_POST["search"]["value"].'%" 
        OR products_tb.commission LIKE "%'.$_POST["search"]["value"].'%" )
        ';
        }
        if(isset($_POST["order"]))
        {
        $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
        $query .= 'ORDER BY products_tb.sub_category_id ASC ';
        }
        $query1 = '';

        if($_POST["length"] != -1)
        {
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $statement = $connect->prepare($query);

        $statement->execute();
        $number_filter_row = $statement->rowCount();

        $statement = $connect->prepare($query . $query1);

        $statement->execute();

        $result = $statement->fetchAll();

        $data = array();
        $no=1;
        foreach($result as $row)
        {
        $sub_array = array();
        $sub_array[] =$no;
        $sub_array[] = $row['sub_category_id'];
        $sub_array[] = $row['type'];
        $sub_array[] = $row['category_name'];
        $sub_array[] = $row['subcategory_name'];
        $sub_array[] = $row['GST'];
        $sub_array[] = $row['price'];
        $sub_array[] = 0;
        $sub_array[] = $row['commission'];
        $sub_array[] = 0;
        $sub_array[] = 0;
        $data[] = $sub_array;
        $no+=1;
        }

        function count_all_data($connect)
        {
        $query = "SELECT * FROM products_tb";
        $statement = $connect->prepare($query);
        $statement->execute();
        return $statement->rowCount();
        }

        $output = array(
        'draw'   => intval($_POST['draw']),
        'recordsTotal' => count_all_data($connect),
        'recordsFiltered' => $number_filter_row,
        'data'   => $data
        );
        echo json_encode($output);
        $connect = NULL;
        die();
}

// include "config.php";
if(isset($_POST["upload"]))
{
    if($_FILES['product_file']['name'])
    {
    $filename = explode(".", $_FILES['product_file']['name']);
    if(end($filename) == "csv")
    {
    $handle = fopen($_FILES['product_file']['tmp_name'], "r");
    while($data = fgetcsv($handle))
    {
        $product_id =  $data[0];
        $GST =  $data[1];  
        $price =  $data[2];
        $Commission_per =  $data[3];
        $Commission =  $data[4];
        $discount_per =  $data[5];
        $discount =  $data[6];
        $query = "
        UPDATE products_tb
        SET GST = '$GST', 
        price = '$price', 
        Commission_per ='$Commission_per',
        Commission ='$Commission',
        discount_per = '$discount_per',
        discount = '$discount'  
        WHERE product_id ='$product_id'
        ";
        $statement = $connect->prepare($query);
        $statement->execute();
    }
    fclose($handle);
    header("location: index.php?updation=1");
    }
    else
    {
    echo'<script type="text/javascript"> alert("Please Select CSV File only")</script>';
    }
    }
    else
    {
    echo'<script type="text/javascript"> alert("Please Select File")</script>';
    }
    $connect = NULL;
    die();
}

if(isset($_POST['category']) || isset($_POST['category_name']))
{
  if(!empty($_POST['category'])){
    $type=$_POST['type'];
    $category=$_POST['category'];
    $query= "select * from category_tb WHERE category_name='$category'";
    $statement = $connect->prepare($query);
    $statement->execute();
              if($statement->rowCount()>0)
              {
                echo '2';
              }
              else{
            $query= "insert into category_tb(category_name,type) values('$category','$type')";
            $statement = $connect->prepare($query);
            $result = $statement->execute();
            if($result)
            {
              echo 1;
                  }
          else{
            echo 0;
            }
         }
  }else{
          $_SESSION['category_name']=$_POST['category_name'];
          echo '3';
         }
         $connect = NULL;
    die();
}


if(isset($_POST['select']))
{
        $type = $_POST['type'];
        $output=" ";
        $query = "SELECT * FROM category_tb WHERE type = '$type' ORDER BY category_id DESC";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $rows)
        // while($rows = $statement->fetch())
            {
        $category_name=$rows['category_name'];
        $output .= '<option value="'.$category_name.'">'.$category_name.'</option>';
         }
        echo $output;
        $connect = NULL;
        die();
}



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
        $query=  "SELECT COUNT(*) as p_count from products_tb 
          WHERE subcategory_name='$sub_category'";

        $statement = $connect->prepare($query);
        $statement->execute();
        $row = $statement->fetch();
        $num= $row['p_count'];
        if($num>0){
          echo '<script type="text/javascript"> alert("alreay present.") </script>';
        }
        else{
          $query= "insert into products_tb values(default,'$category_name',
            '$sub_category','$GST','$price','$commission_per','$commission','$discount_per','$discount')";
            $statement = $connect->prepare($query); 
            $result = $statement->execute();
            if($result)
            {
              echo 1;
            }
            else
            {
              echo $query;
            }
          }
          $connect = NULL;
          die();
}

?>