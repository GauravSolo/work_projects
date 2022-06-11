<?php
require 'vendor/autoload.php';
// use Shuchkin\SimpleXLSX;


use Shuchkin\SimpleXLSX;

ini_set('error_reporting', E_ALL );
// ini_set('display_errors', 1 );
ini_set('error_log', 'error.log');
echo "<pre>";
echo SimpleXLSX::parse('samplexlsx.xlsx')->toHTMLEx();
echo "</pre>";

// if ( $xlsx = SimpleXLSX::parseFile('books.xlsx', true ) ) {
// 	echo $xlsx->toHTML();
// } else {
// 	echo SimpleXLSX::parseError();
// }
?>