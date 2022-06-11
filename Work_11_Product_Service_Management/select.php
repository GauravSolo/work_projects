<?php
include("config.php");
function select_category($con){
$output=" ";
$query = mysqli_query($con,"SELECT * FROM category_tb  ORDER BY category_id DESC");
while($rows = mysqli_fetch_array($query))
    {
$category_name=$rows['category_name'];
$output .= '<option value="'.$category_name.'">'.$category_name.'</option>';
 }
 return $output;
}
//echo "<option>Select category</option>";
echo select_category($con);
?>