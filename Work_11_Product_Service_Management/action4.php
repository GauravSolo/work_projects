<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

// $handle = fopen($_FILES['product_file_xlsx']['tmp_name'], "r");
$spreadsheet = $reader->load($_FILES['product_file_xlsx']['tmp_name']);

$d=$spreadsheet->getSheet(0)->toArray();
echo "row counts ==> ";
echo count($d);
echo "</br>";
echo "</br>";
echo "</br>";



$sheetData = $spreadsheet->getActiveSheet()->toArray();

$i=1;

// unset($sheetData[0]);

echo "<pre>";
print_r($sheetData);
echo "</pre>";

// foreach ($sheetData as $t) {
//  // process element here;
// // access column by index
// 	echo $i."    ".$t[0].",".$t[1]." <br>";
// 	$i++;
// }


?>