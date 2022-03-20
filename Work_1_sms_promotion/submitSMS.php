<?php
    
	require_once 'queries.php';
	
	$con = new PromotionSMS();
    $con->makeRecord($_GET['date'], $_GET['type'], $_GET['string'], $_GET['remark'], $_GET['customer']);

?>