<?php
session_start();
include('header.php');
include('config.inc.php');
include ('webservice/get_customer_count_for_retailer.php');
include ('webservice/get_sale.php');
$a = 10;
$prevmonth1 = date('m Y', strtotime('-' . $a . ' months'));


$Retailer_Id = $_SESSION['Retailer_id'];

$prevmonth2 = date('m Y', strtotime('-2 months'));
$prevmonth3 = date('m Y', strtotime('-3 months'));
$prevmonth4 = date('m Y', strtotime('-4 months'));
$prevmonth5 = date('m Y', strtotime('-5 months'));
$prevmonth6 = date('m Y', strtotime('-6 months'));
$prevmonth7 = date('m Y', strtotime('-7 months'));
$prevmonth8 = date('m Y', strtotime('-8 months'));
$prevmonth9 = date('m Y', strtotime('-9 months'));
$prevmonth10 = date('m Y', strtotime('-10 months'));
$prevmonth11 = date('m Y', strtotime('-11 months'));
$prevmonth12 = date('m Y', strtotime('-12 months'));



// query for is_external_data_available (imported customers).
/* $sql = "SELECT count(distinct `Customer_Retailer_Relationship_Table`.`Customer_Id`) as cust_external_count_email FROM `Customer_Master` inner join `Customer_Retailer_Relationship_Table` "
  . "on  `Customer_Retailer_Relationship_Table`.Customer_Id = `Customer_Master`.Customer_Id "
  . "WHERE `Customer_Retailer_Relationship_Table`.`Retailer_Id` = $Retailer_Id"
  . " and `Customer_Retailer_Relationship_Table`.`Flag`=1 and `Customer_Master`.Unsubscribe_Flag = 0 and `Customer_Master`.`Customer_Email_Id`!=''"; */
$sql = "SELECT count(distinct `Customer_Retailer_Relationship_Table`.`Customer_Id`) as cust_external_count_sms FROM `Customer_Master` inner join `Customer_Retailer_Relationship_Table` 
                on  `Customer_Retailer_Relationship_Table`.Customer_Id = `Customer_Master`.Customer_Id 
                WHERE `Customer_Retailer_Relationship_Table`.`Retailer_Id` = $Retailer_Id";

$query_params = array(
);
////
////execute query
try {
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($query_params);
    $response["success"] = 1;
//            $response["Customer_Category_message"] = "Category 3, customers Found";
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error3!";
    $response["details"] = $ex;
//                    die(json_encode($response));
}
$rows_cust = $stmt->fetch();

// query for is internal.       
$sql = "SELECT count(distinct `Customer_Transaction_Master`.`Customer_Id`) as cust_count_sms FROM `Customer_Master` inner join 
                `Customer_Transaction_Master` on `Customer_Master`.`Customer_Id` = `Customer_Transaction_Master`.`Customer_Id`
                WHERE `Customer_Transaction_Master`.`Retailer_Id` = $Retailer_Id";

$query_params = array(
);
////
////execute query
try {
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($query_params);
    $response["success"] = 1;
//            $response["Customer_Category_message"] = "Category 3, customers Found";
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error3!";
    $response["details"] = $ex;
//                    die(json_encode($response));
}
$rows_int_cust = $stmt->fetch();

// query for is Pick from contact.       
$sql = "SELECT count(distinct `Customer_Retailer_Relationship_Table`.`Customer_Id`) as count_pick FROM `Customer_Master` inner join `Customer_Retailer_Relationship_Table` 
                on  `Customer_Retailer_Relationship_Table`.Customer_Id = `Customer_Master`.Customer_Id 
                WHERE `Customer_Retailer_Relationship_Table`.`Retailer_Id` = $Retailer_Id
                and (`Customer_Retailer_Relationship_Table`.`Flag`=2)and `Customer_Master`.`Verification_For_Coupon` = 1";

$query_params = array(
);
////
////execute query
try {
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($query_params);
    $response["success"] = 1;
//            $response["Customer_Category_message"] = "Category 3, customers Found";
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error3!";
    $response["details"] = $ex;
//                    die(json_encode($response));
}
$pick_cust = $stmt->fetch();

/* * *query for get retailer data*** */

/* * query for get rules */
$query = "SELECT * 
FROM  `Retailers_Master` inner join `Cities_Table` on `Cities_Table`.`City_Id` = `Retailers_Master`.`City_Id` inner join `Sender_Id_Master` on `Sender_Id_Master`.`Retailer_Id` = `Retailers_Master`.`Retailer_Id` where `Retailers_Master`.`Retailer_Id` = $Retailer_Id";

$query_params = array(
);

//execute query
try {
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error!";
    $response["details"] = $ex;

    die(json_encode($response));
}
$get_data = $stmt->fetch();
//echo "<pre>";print_r($get_data);echo "</pre>";
$Status_Id = $get_data['Status_Id'];



/* * query for get rules frequency and cumulative */
if ($Status_Id == 2) {
    $query = "SELECT *
			FROM `Rule_Master`
			INNER JOIN Rules_Category_Type_Master ON Rule_Master.`Rules_Category_Id` = Rules_Category_Type_Master.`Rules_Category_Id`
			WHERE Active_Status =1
			AND `Is_Third_Party` =2
			AND Rule_Master.`Rules_Category_Id` =1";
} else if ($Status_Id == 3) {
    $query = "SELECT * 
			FROM  `Retailers_Rules_Master` 
			INNER JOIN  `Rule_Master` ON  `Rule_Master`.`Rule_Id` =  `Retailers_Rules_Master`.`Rule_Id` 
			INNER JOIN  `Rules_Category_Type_Master` ON  `Rules_Category_Type_Master`.`Rules_Category_Id` = `Rule_Master`.`Rules_Category_Id`
			WHERE  `Retailer_Id` = '$Retailer_Id' and Is_Active = 1 and `Rules_Category_Type_Master`.`Rules_Category_Id` = 1";
}


$query_params = array(
);

//execute query
try {
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error!";
    $response["details"] = $ex;

    die(json_encode($response));
}
$rows = $stmt->fetchAll();
//echo "<pre>";print_r($query);echo "</pre>";

$data_f_and_cu = '';
$data_f_and_cu .= '<table border="1" style="width: 100%;"><th style="background-color: rgb(238, 129, 33);">Sr.No.</th><th style="background-color: rgb(238, 129, 33);">Reward (<img src="images/rupeefontfinal.png" />)</th><th style="background-color: rgb(238, 129, 33);">Reward (%)</th><th style="background-color: rgb(238, 129, 33);">Period In Days</th><th style="background-color: rgb(238, 129, 33);">Purchase Amount (<img src="images/rupeefontfinal.png" />)</th><th style="background-color: rgb(238, 129, 33);">Validity in days</th><tr>';

if (empty($rows)) {
    $data_f_and_cu .= '<tr><td>No Records for Rules</td><td></td><td></td><td></td><td></td><td></td></tr>';
    $data_f_and_cu .= '</table>';
} else {
    $i = 1;

    foreach ($rows as $row) {
        $reward_amt = $row['Reward_Amount'];
        $reward_per = $row['Reward_Percentage'];
        if (($reward_amt != NULL || $reward_amt != 0) && ($reward_per == 0 || $reward_per == NULL)) {
            $reward_amt;
            $reward_per = "0";
        } else {
            $reward_amt = "0";
            $reward_per;
        }
        $data_f_and_cu .= '<td>' . $i++ . '</td><td>' . $reward_amt . '</td><td>' . $reward_per . '</td><td>' . $row['Frequency'] . '</td><td>' . $row['Cumulative_Value'] . '</td><td>' . $row['Valid_upto'] . '</td></tr>';
    }
    $data_f_and_cu .= '</table>';
}



/* * query for get rules frequency and count */
if ($Status_Id == 2) {
    $query = "SELECT *
			FROM `Rule_Master`
			INNER JOIN Rules_Category_Type_Master ON Rule_Master.`Rules_Category_Id` = Rules_Category_Type_Master.`Rules_Category_Id`
			WHERE Active_Status =1
			AND `Is_Third_Party` =2
			AND Rule_Master.`Rules_Category_Id` =2";
} else if ($Status_Id == 3) {
    $query = "SELECT * 
			FROM  `Retailers_Rules_Master` 
			INNER JOIN  `Rule_Master` ON  `Rule_Master`.`Rule_Id` =  `Retailers_Rules_Master`.`Rule_Id` 
			INNER JOIN  `Rules_Category_Type_Master` ON  `Rules_Category_Type_Master`.`Rules_Category_Id` = `Rule_Master`.`Rules_Category_Id`
			WHERE  `Retailer_Id` = '$Retailer_Id' and Is_Active = 1 and `Rules_Category_Type_Master`.`Rules_Category_Id` = 2";
}


$query_params = array(
);

//execute query
try {
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error!";
    $response["details"] = $ex;

    die(json_encode($response));
}
$rows = $stmt->fetchAll();


$data_f_and_count = '';
$data_f_and_count .= '<table border="1" style="width: 100%;"><th style="background-color: rgb(238, 129, 33);">Sr.No.</th><th style="background-color: rgb(238, 129, 33);">Reward (<img src="images/rupeefontfinal.png" />)</th><th style="background-color: rgb(238, 129, 33);">Reward (%)</th><th style="background-color: rgb(238, 129, 33);">Period In Days</th><th style="background-color: rgb(238, 129, 33);">Visit Count</th><th style="background-color: rgb(238, 129, 33);">Validity in days</th><tr>';

if (empty($rows)) {
    $data_f_and_count .= '<tr><td>No Records for Rules</td><td></td><td></td><td></td><td></td><td></td></tr>';
    $data_f_and_count .= '</table>';
} else {
    $i = 1;

    foreach ($rows as $row) {
        $reward_amt = $row['Reward_Amount'];
        $reward_per = $row['Reward_Percentage'];
        if (($reward_amt != NULL || $reward_amt != 0) && ($reward_per == 0 || $reward_per == NULL)) {
            $reward_amt;
            $reward_per = "0";
        } else {
            $reward_amt = "0";
            $reward_per;
        }
        $data_f_and_count .= '<td>' . $i++ . '</td><td>' . $reward_amt . '</td><td>' . $reward_per . '</td><td>' . $row['Frequency'] . '</td><td>' . $row['Count'] . '</td><td>' . $row['Valid_upto'] . '</td></tr>';
    }
    $data_f_and_count .= '</table>';
}




/* * query for get rules amount only */
if ($Status_Id == 2) {
    $query = "SELECT *
			FROM `Rule_Master`
			INNER JOIN Rules_Category_Type_Master ON Rule_Master.`Rules_Category_Id` = Rules_Category_Type_Master.`Rules_Category_Id`
			WHERE Active_Status =1
			AND `Is_Third_Party` =2
			AND Rule_Master.`Rules_Category_Id` =3";
} else if ($Status_Id == 3) {
    $query = "SELECT * 
			FROM  `Retailers_Rules_Master` 
			INNER JOIN  `Rule_Master` ON  `Rule_Master`.`Rule_Id` =  `Retailers_Rules_Master`.`Rule_Id` 
			INNER JOIN  `Rules_Category_Type_Master` ON  `Rules_Category_Type_Master`.`Rules_Category_Id` = `Rule_Master`.`Rules_Category_Id`
			WHERE  `Retailer_Id` = '$Retailer_Id' and Is_Active = 1 and `Rules_Category_Type_Master`.`Rules_Category_Id` = 3";
}


$query_params = array(
);

//execute query
try {
    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error!";
    $response["details"] = $ex;

    die(json_encode($response));
}
$rows = $stmt->fetchAll();


$data_amt_only = '';
$data_amt_only .= '<table border="1" style="width: 100%;"><th style="background-color: rgb(238, 129, 33);">Sr.No.</th><th style="background-color: rgb(238, 129, 33);">Reward (<img src="images/rupeefontfinal.png" />)</th><th style="background-color: rgb(238, 129, 33);">Reward (%)</th><th style="background-color: rgb(238, 129, 33);">Purchase Range</th><th style="background-color: rgb(238, 129, 33);">Validity in days</th><tr>';

if (empty($rows)) {
    $data_amt_only .= '<tr><td>No Records for Rules</td><td></td><td></td><td></td><td></td></tr>';
    $data_amt_only .= '</table>';
} else {
    $i = 1;

    foreach ($rows as $row) {
        $reward_amt = $row['Reward_Amount'];
        $reward_per = $row['Reward_Percentage'];
        if (($reward_amt != NULL || $reward_amt != 0) && ($reward_per == 0 || $reward_per == NULL)) {
            $reward_amt;
            $reward_per = "0";
        } else {
            $reward_amt = "0";
            $reward_per;
        }
        $data_amt_only .= '<td>' . $i++ . '</td><td>' . $reward_amt . '</td><td>' . $reward_per . '</td><td>' . $row['Tx_Amount_Start'] . '-' . $row['Tx_Amount_End'] . '</td><td>' . $row['Valid_upto'] . '</td></tr>';
    }
    $data_amt_only .= '</table>';
}
?>
<style>
    .main-div{
        border: 2px solid #EFA96F;
        border-radius: 3px;
        padding-left: 0px;
        padding-right: 0px;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }
    .title-div{
        border-bottom: 2px solid #FEE4CC;
    }
    .title-img{
        float: left;
        margin-right: 10px;
        margin-left: 30px;
        width: 30px;
    }
    .content-div{
        text-align:center;
        padding-left: 10px;
        padding-right: 10px;
        text-align: left;
        padding-left: 16px; 
        padding-top: 10px;
    }
    hr{
        border-color: #EFA96F;
        margin-bottom: 20px;
        width: 97%;
    }
    .tab-heading-div{
        border: 2px solid rgb(249, 193, 151);
        border-radius: 3px;
        padding-left: 10px;
        padding-right: 0px;
        margin-bottom: 20px;
    }
    .tab-div{
        padding-left: 0px;
        padding-right: 0px;
        margin-bottom: 20px;
    }
    .div-left-margin{
        border-right: 2px solid #EFA96F;
    }

</style>
<?php
 include "navbar.php";
?>

<section class="home-section">
<div class="w-form">

    <h2 class="main-heading" style="margin-bottom: 15px;">PROFILE</h2>
    <form action="" method="post" id="frm-login">

        <div class="w-col w-col-4 logo-div main-div" style="margin-right: 28px;width: 30.333333%;">
            <div class="title-div"> 
                <img class="title-img" src="images/ic_credit_details.png" style="width: 20px;">
                <h5><b>Available Credit Balance</b></h5>
            </div>
            <div class="content-div">
                <label style="float:left;text-align:center;" >SMS :</label>
                <label id="sms_count"></label>
                <label style="float:left;text-align:center;">Email :</label>
                <label id="email_count"></label>
                <label style="float:left;text-align:center;">Vas : <img src="images/rupeefontfinal.png" /> </label>
                <label id="var_creadits"></label>
            </div>
        </div>

        <div class="w-col w-col-8 main-div">
            <div class="title-div"> 
                <img class="title-img" src="images/ic_business_details.png">
                <h5><b>Business Detail</b></h5>
            </div>

            <div class="w-col w-col-4 logo-div" style="width: 49.333333%;padding-top: 10px;">
                <div class="content-div div-left-margin" style="padding-top: 0px;">
                    <label>Total Customers: <?php echo $rows_int_cust['cust_count_sms'] + $rows_cust['cust_external_count_sms']; ?> </label>
                    <label>Internal Customers: <?php echo $rows_int_cust['cust_count_sms']; //echo $Direct_Cust_Count; //print_r($response['Internal_Customer_Count']);    ?></label>
                    <label>External Customers: <?php echo $rows_cust['cust_external_count_sms']; //echo $rows_cust['cust_external_count_email'];    ?></label>
                </div>
            </div>
            <div class="w-col w-col-4 logo-div">
                <div class="content-div">
                    <label>Total Transactions: <?php echo $tx_cnt; ?></label>
                    <label>Total Sale: <?php echo $Total_Sell; ?></label>
                </div>
            </div>
        </div>	

        <div class="w-col w-col-12 logo-div main-div">
            <div class="title-div" style="margin-bottom: 10px;"> 
                <img class="title-img" src="images/ic_my_details.png">
                <h5><b>My Details</b></h5>
            </div>

            <div class="w-col w-col-4 logo-div" >
                <div class="content-div div-left-margin">
                    <label>Shop Name: <?php echo $get_data['Retailer_Business_Name']; ?></label>
                    <label>Activation Date: <?php echo date("d M Y", strtotime($get_data['Registration_DateTime'])); ?> </label>
                    <label>Owner Name: <?php echo $get_data['Retailer_First_Name'] . " " . $get_data['Retailer_Last_Name']; ?></label>
                </div>
            </div>
            <div class="w-col w-col-4 logo-div">
                <div class="content-div div-left-margin">
                    <label>Registered  Numbers: Mobile :   <?php echo $get_data['Retailer_PhoneNumber']; ?> </label>
                    <label>Landline: <?php echo $get_data['Retailer_Landline']; ?></label>
                    <label>Registered Email ID: <?php echo $get_data['Retailer_Email_Id']; ?></label>
                    <label style="background: red;color: white;padding: 1;width:60%;font-size: 16;">Sender ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     <?php echo $get_data['Sender_Id']; ?></label>
                </DIV>
            </div>
            <div class="w-col w-col-4 logo-div">
                <div class="content-div">
                    <label>Address: <?php echo $get_data['Retailer_Address']; ?></label>
                    <label>PIN Code: <?php echo $get_data['Retailer_Pincode']; ?></label>
                    <label>City: <?php echo $get_data['City_Name']; ?></label>
                    <label>GST No: <?php echo $get_data['Retailer_GST_Number']; ?></label>
                </DIV>
            </div>
        </div>
        <div style="clear: both;"></div>
        <hr>
        <div class="w-col w-col-12 logo-div tab-heading-div">
            <h4><p style="float:left;">Rules</p></h4>
            <p style="float:right;">
                <?php
                mysql_connect("localhost", "root", "supriya_rise@21$");

                mysql_select_db("RiseRetailMasterDatabase");
                ?>

                Download

                <?php
                $query = "SELECT id, name FROM files where `Retailer_Id` = '$Retailer_Id'";

                $result = mysql_query($query) or die('Error, query failed');

                if (mysql_num_rows($result) == 0) {

                    echo "Database is empty";
                } else {

                    while (list($id, $name) = mysql_fetch_array($result)) {
                        ?>

                        <a href="download.php?id=<?php echo $id; ?>"><?php echo $name; ?></a><br>

                        <?php
                    }
                }
                ?>
            </p>

        </div>
        <div class="w-col w-col-3 logo-div tab-heading-div">
            <h5>Rule 1. - Based on Visit Count in a Time Period </h5>
        </div>
        <div class="w-col w-col-12 logo-div tab-div">
            <div>
                <?php echo $data_f_and_count; ?>
            </div>
        </div>
        <div class="w-col w-col-3 logo-div tab-heading-div">
            <h5>Rule 2. - Transaction Amount Based</h5>
        </div>
        <div class="w-col w-col-12 logo-div tab-div">	
            <div>
                <?php echo $data_amt_only; ?>
            </div>
        </div>
        <div class="w-col w-col-3 logo-div tab-heading-div">
            <h5>Rule 3. - Total Spend in a Time Period</h5>
        </div>
        <div class="w-col w-col-12 logo-div tab-div">
            <div>
                <?php echo $data_f_and_cu; ?>
            </div>
        </div>	


        <?php
        $sql = "SELECT `Referral_Template_Master`.`Template` FROM `Referral_Template_Master` WHERE `Referral_Template_Master`.`Retailer_Id`=$Retailer_Id";

        $query_params = array(
        );

        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute($query_params);
            $response["success"] = 1;
//            $response["Customer_Category_message"] = "Category 3, customers Found";
        } catch (PDOException $ex) {
            $response["success"] = 0;
            $response["message"] = "Database Error3!";
            $response["details"] = $ex;
//                    die(json_encode($response));
        }
        $rows = $stmt->fetch();

        if ($rows) {
            ?>

            <div class="w-col w-col-12 logo-div main-div">
                <div style="margin-bottom: 10px;" class="title-div"> 
                    <h4 style="margin-left: 10px;">Your message set for Customer Referral</h4>
                </div>
                <div class="content-div" style="padding: 0 0 0 10px;">
                    <label><?php echo $rows['Template']; ?></label>
                    <!--<label>Email: contact@riseretail.net </label>-->
                    <!--label><a href="feedback.php"> Write Your Feedback</a></label-->
                </div>
            </div>

            <?php
        } else {
            ?>
            <div class="w-col w-col-12 logo-div main-div">
                <div style="margin-bottom: 10px;" class="title-div"> 
                    <h4 style="margin-left: 10px;">Customer Referral Message</h4>
                </div>
                <div class="content-div" style="padding: 0 0 0 10px;">
                    <label>Thank you for referring customer at our store. Please contact us for referral offers.</label>
                    <!--<label>Email: contact@riseretail.net </label>-->
                    <!--label><a href="feedback.php"> Write Your Feedback</a></label-->
                </div>
            </div>
            <?php
        }
        ?>


        <div class="w-col w-col-12 logo-div main-div">
            <div style="margin-bottom: 10px;" class="title-div"> 
                <h4 style="margin-left: 10px;">Customer Support</h4>
            </div>
            <div class="content-div">
                <label>Call: 07304110203</label>
                <label>Email: mail@riseretail.net </label>
                <!--label><a href="feedback.php"> Write Your Feedback</a></label-->
            </div>
        </div>




        <input type="hidden" id="Retailer_Id" name="Retailer_Id" value="<?php echo $_SESSION['Retailer_id']; ?>" placeholder="Retailer_Id" ><br><br>

    </form>
    </section>
    <script>
        var Retailer_Id = document.getElementById('Retailer_Id').value.trim();

        var postTo = 'webservice/get_email_sms_count.php';
        var data = {
            Retailer_Id: Retailer_Id
        };
        jQuery.post(postTo, data,
                function (data) {

                    document.getElementById("sms_count").innerHTML = data.Sms_Count;
                    document.getElementById("email_count").innerHTML = data.Email_Count;

                    return false;
                }, 'json');

        var postTo = 'webservice/get_retailer_vas_credit.php';
        var data = {
            Retailer_Id: Retailer_Id
        };
        jQuery.post(postTo, data,
                function (data) {
                    console.log(data);

                    document.getElementById("var_creadits").innerHTML = data.Vas_Credit;
                    return false;
                }, 'json');

    </script>
    <?php
    include('footer.php');
    ?>