<?php
    // Database Variables
    $server = "localhost";
    $username = "root";
    $password = "12345";
    $dbName = "";
    
    $conn = mysqli_connect($server, $username, $password);

    $sql = "create database if not exists ledge_database;use ledge_database;";
    if($result = mysqli_multi_query($conn, $sql))
    {
        
    }
    while(mysqli_next_result($conn)){;}

    $table1 = "CREATE TABLE IF NOT EXISTS `Customer_Transaction_Master` (

        `Customer_Transaction_Master_Id` int NOT NULL AUTO_INCREMENT,
        
        `Customer_Name` text NOT NULL,

        `Customer_Id` int NOT NULL,

        `Invoice_Id` int NOT NULL,
      
        `Customer_Phone_Number` text NOT NULL, 
      
        `Retailer_Id` int NOT NULL,
      
        `Transaction_Timestamp` datetime NOT NULL,

        `Txn_Ref_No` varchar(50) NOT NULL,
      
        `Net_Amount` int NOT NULL,

        `Amount_Paid` int NOT NULL,
      
        `Cash_Paid` int NOT NULL,
      
        `Card_Paid` int NOT NULL,
      
        `Other_Paid` int NOT NULL,

        `Balance` text NOT NULL,
      
        `Indicator` int NOT NULL,
      
        PRIMARY KEY (`Customer_Transaction_Master_Id`)
      
      ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT= 1;";
      
      $table2 = "CREATE TABLE IF NOT EXISTS `Customer_Transaction_Adjustment` (

      `Customer_Transaction_Adjustment_Id` int NOT NULL AUTO_INCREMENT,

      `Customer_Name` text NOT NULL,

      `Customer_Id` int NOT NULL,

      `Customer_Phone_Number` text NOT NULL, 

      `Transaction_Timestamp` datetime NOT NULL,

      `Transaction_Status` text NOT NULL,

      `Amount` int NOT NULL,

      `Paid_By` text NOT NULL,

      `Reference_Number` int NOT NULL,

      `Remarks` text NOT NULL,

      `Prev_Balance` text NOT NULL,

      `Balance` text NOT NULL,

      PRIMARY KEY (`Customer_Transaction_Adjustment_Id`)

      ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT= 1;";

    $table3 = "CREATE TABLE IF NOT EXISTS `Customers_Transaction_Summary` (

    `Customer_Summary_Id` int NOT NULL AUTO_INCREMENT,

    `Customer_Name` text NOT NULL,

    `Customer_Id` int NOT NULL UNIQUE,

    `Customer_Phone_Number` text NOT NULL,

    `Transaction_Timestamp` datetime NOT NULL,

    `Balance` text NOT NULL,

    PRIMARY KEY (`Customer_Summary_Id`)

    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT= 1;";



      $tables = [$table1, $table2, $table3];


      foreach($tables as $sql){
          $query = mysqli_query($conn,$sql);
          while(mysqli_next_result($conn)){;}
      }

?>