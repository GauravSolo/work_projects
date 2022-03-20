<?php
  
  require_once 'queries.php';
  
  $con = new Template();
  
//  $con->getTemplate('Discount(SMS)');
  
  $con->getTemplate($_GET['type']);
  
?>