<?php
include('database_connection.php');
$column = array("category_name", "subcategory_name", "GST", "price",
	"commission_per","discount_per","discount");
$query = "SELECT products_tb.sub_category_id,category_tb.type,category_tb.category_name,products_tb.subcategory_name,products_tb.GST,products_tb.price,products_tb.price,products_tb.commission_per,products_tb.commission,products_tb.discount_per,products_tb.discount
FROM category_tb
INNER JOIN products_tb ON category_tb.category_name =products_tb.category_name";
if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE category_tb.type LIKE "%'.$_POST["search"]["value"].'%"
 OR category_tb.category_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR products_tb.subcategory_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR products_tb.GST LIKE "%'.$_POST["search"]["value"].'%" 
 OR products_tb.price LIKE "%'.$_POST["search"]["value"].'%" 
 OR products_tb.commission LIKE "%'.$_POST["search"]["value"].'%" 
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
 $sub_array[] = $row['commission_per'];
 $sub_array[] = $row['commission'];
 $sub_array[] = $row['discount_per'];
 $sub_array[] = $row['discount'];
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
?>