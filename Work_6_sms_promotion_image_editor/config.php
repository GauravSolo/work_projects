<?php
    // Database Variables
    $server = "localhost";
    $username = "root";
    $password = "12345";
    $dbName = "";
    
    $conn = mysqli_connect($server, $username, $password);

    $sql = "create database if not exists sms_promotion_database;use sms_promotion_database;";
    if($result = mysqli_multi_query($conn, $sql))
    {
        
    }
    while(mysqli_next_result($conn)){;}

    $table1 = "CREATE TABLE IF NOT EXISTS `sms_promotion_table` (
        `sms_promotion_id` INT NOT NULL AUTO_INCREMENT,
        `Retailer_Id` INT NOT NULL, 
        `Submission_Date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `date_of_promotion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `sms` nvarchar(1024) collate utf8_unicode_ci NOT NULL ,
        `sms_type` TEXT NOT NULL ,  
        `remarks_by_user` nvarchar(1024) collate utf8_unicode_ci,
        `char_count` INT NOT NULL , 
        `sms_count` INT NOT NULL , 
        `customer_segment` TEXT , 
        `customer_data` TEXT ,  
        `customer_data_status` TEXT ,
        `status` text,
         PRIMARY KEY  (`sms_promotion_id`)) ENGINE = InnoDB;";

    $table2 = "CREATE TABLE IF NOT EXISTS `prev_promotion_table` (
        `prev_promotion_id` INT NOT NULL AUTO_INCREMENT ,
        `Retailer_Id` INT NOT NULL , 
        `Submission_Date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `date_of_promotion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `sms` nvarchar(1024) collate utf8_unicode_ci NOT NULL ,
        `sms_type` TEXT NOT NULL ,  
        `remarks_by_user` nvarchar(1024) collate utf8_unicode_ci,
        `char_count` INT NOT NULL , 
        `sms_count` INT NOT NULL , 
        `customer_segment` TEXT , 
        `customer_data` TEXT ,  
        `customer_data_status` TEXT , 
        `status` text,
        `total_customers` INT, 
        `expected_sms` INT, 
        `actual_sms` int, 
        `remarks_by_admin` nvarchar(1024) collate utf8_unicode_ci,
        `report` text,
        PRIMARY KEY  (`prev_promotion_id`)) ENGINE = InnoDB;";
      

      $tables = [$table1, $table2];


      foreach($tables as $sql){
          $query = mysqli_query($conn,$sql) or die('error'.mysqli_error($conn));
          while(mysqli_next_result($conn)){;}
      }

?>