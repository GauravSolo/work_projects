<?php
    // Database Variables
    $server = "localhost";
    $username = "root";
    $password = "12345";
    $dbName = "";
    
    $conn = mysqli_connect($server, $username, $password);

    $sql = "create database if not exists transaction_database;use transaction_database;";
    if($result = mysqli_multi_query($conn, $sql))
    {
        
    }
    while(mysqli_next_result($conn)){;}

    $table1 = "CREATE TABLE IF NOT EXISTS `Master_Transaction_Table` (

        `Master_Transaction_Table_Id` int NOT NULL AUTO_INCREMENT,
        
        `Customer_Name` text NOT NULL,

        `Customer_Id` int NOT NULL,

        `Customer_Phone_Number` text NOT NULL, 
      
        `Retailer_Id` int NOT NULL,
      
        `Tx_Amount` int NOT NULL,

        `Transaction_Timestamp` datetime NOT NULL,
      
        `Note` text NOT NULL,

        `Payment` int NOT NULL,

        `Net_Amount` int NOT NULL,
      
        `Cash_Paid` int NOT NULL,
      
        `Card_Paid` int NOT NULL,
      
        `Other_Paid` int NOT NULL,

        `item_discount` int NOT NULL,

        `bill_discount` int NOT NULL,

        `Discount_Loyalty` int NOT NULL,

        `Total_Discount` int NOT NULL,
      
        `Indicator` text NOT NULL,
      
        PRIMARY KEY (`Master_Transaction_Table_Id`)
      
      ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT= 1;";
      

      $tables = [$table1];


      foreach($tables as $sql){
          $query = mysqli_query($conn,$sql);
          while(mysqli_next_result($conn)){;}
      }

?>