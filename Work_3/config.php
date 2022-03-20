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
      
      $table1 = "CREATE TABLE IF NOT EXISTS `Master_Invoice_Table` (

        `Invoice_Id` int(11) NOT NULL AUTO_INCREMENT,

        `Invoice_Number` int(11) NOT NULL,

        `Retailer_Id` int(11) NOT NULL,

        `Customer_Name` varchar(50) NOT NULL,

        `Customer_Number` text NOT NULL,

        `Subtotal` float NOT NULL,

        `CGST` float NOT NULL,

        `SGST` float NOT NULL,

        `Net_Total` float NOT NULL,

        `Amount_Paid` float NOT NULL,

        `Timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,

        `Customer_Transaction_Id` int(11) NOT NULL,

        `Discount_Loyalty` int(11) NOT NULL,

        `Cash_Paid` int(11) NOT NULL,

        `Card_Paid` int(11) NOT NULL,

        `Wallet_Paid` int(11) NOT NULL,

        `Customer_GST` varchar(50) NOT NULL,

        `You_Save` float NOT NULL,

        PRIMARY KEY (`Invoice_Id`)

      ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT= 45420;";

      $tables = [$table1];


      foreach($tables as $sql){
          $query = mysqli_query($conn,$sql);
          while(mysqli_next_result($conn)){;}
      }

?>