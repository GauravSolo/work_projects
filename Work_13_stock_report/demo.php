<?php 
// session_start();
// require("config.inc.php");
// $Retailer_Id = $_SESSION['Retailer_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Retail Management System</title>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

	<style>
	            body {margin:0;font-family:Arial}
            .topnav{
                  overflow: hidden;
                  background:linear-gradient(to right, #000066 0%, #3333ff 41%);
                  margin: -8px;
            }
            .topnav a{
                  float: left;
                  display: block;
                  color: #f2f2f2;
                  text-align: center;
                  padding: 14px 16px;
                  text-decoration: none;
                  font-size:20px;
            }
            .topnav a:hover{
                  background-color:#f96a0b;
                  color: white;
                  text-decoration:none;
            }
            .main{
                  width:100%;
            }
            .column1{
                  width:70%;
                  float:left;
                  margin-top:2%;
                  }
            .column2{
                  width:30%;
                  float:left;
            }
            .column3{
                  width:10%;
                  float:left;
            }
            .column4{
                  width:70%;
                  float:left;
                  }
            .form-col1{
              width:40%;
              float:left;
            }
            .form-col2{
             width:15%;
             float:left;
            }
            .table-main{
              margin-left:5%;
              margin-right:2%;
            }
     .upload-text{
            font-size:20px;
            text-align:center;
            color:black;
            padding-top:2%;
      }
       .button-main{
            margin-left:2%;
            margin-right:10%;
            font-size:18px;
            float:left;
       }
    .radio-lable{
      padding-right:10px;
     }
       .button{
            border: none;
            color: white;
            padding: 7px 35px;
            border-radius:10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            cursor: pointer;
       }
       .btn-add{
            background-color:#203864;
            margin-top:15px;
            margin-left:10px;
       }
       .btn-category{
            background-color:#006600;
            margin-top:10px;
            margin-left:35%;
        }
       .btn-submit{
            background-color:#006600;
            margin-top:1%;
            margin-left:35%;
            }
        /* .vl {
            position: absolute;
            top:15%;
            left:31%; 
            transform: translate(-50%);
            border: 2px solid black;
            height: 150px;
        } */
       .btn-upload{
            background-color:#203864;
            margin-top:10px;
            margin-bottom:3%;
            margin-inline: auto;
       }
       .button:hover{
            background-color:#ff9900;
            color:#fff;
       }
       
       .form-container{
            margin-left:1%;
            margin-right:2%;
       }
    .form-textbox{
            margin-top:3px;
            margin-left:20px;
            width:85%;
            height:40px;
            border:none;
            border-bottom:2px solid black;
            text-align:center;
            font-size:18px;
      }
   .select{
            margin-top:10px;
            margin-left:7%;
            width:90%;
            height:35px;
            border:none;
            border-bottom:2px solid black;
            text-align:center;
            font-size:18px;
            color:black;
       }
       .category{
            width:90%;
       }
      .form-textbox-small{
            width:100px;
      }
      .upload-box{
            width:250px;
            background:#d1d1d1;
            margin-top:2%;
            color:black;
            border:none;
            outline:none;
            font-size:16px;
            border-radius:50px 20px 20px 50px;
            margin-inline:auto;
      }
      ::-webkit-file-upload-button{
            border:none;
            background:#0099ff;
            border-radius:50%;
            height:60px;
            width:60px;
            color:white;
            font-size:16px;
      }
      .newwidthcategory{
        width:50%;
      }
      @media (max-width: 600px) {
        
            .column3,.column4,.form-col1{
                  float:none;
                  margin:none;
                  width:100%;
            }
            .column1{
                  float:none;
                  margin:none;
                  width:100%;
                  height:50px;
                  display:flex;
                  align-items: center;
                  margin-top: 20px;
            }
            .column2{
                  float:none;
                  margin:none;
                  width:100%;
            }
            .form-col1{
              margin-top:10px;
            }
            .form-col2{
              margin:none;
              margin-top:10px;
              width:100%;
            }
             .category{
            margin-left:none;
            width:70%;
          }
          .vl {
            display:none;
        }
      .newwidthcategory{
        width:100%;
        margin-left: 0 !important;
      }
      }


        @media screen and (max-width: 800px) {
          
          #subCategoryForm{
            display:flex;
            overflow-x:scroll;
          }
          
        }


      label{
        white-space:nowrap;
      }

      .input-sm{
        width: 90px !important;
      }
      input[type='search']{
        width: 120px !important;
        margin-right:15px !important;
      }
      .btncss{
        box-shadow: 3px 3px 2px  black !important;
      }

      select[name='stock_table_length']{
        padding: 0 0 0px 31px;
      }
    

      
</style>

    </head>
<body>

  <section class="home-section">
 
  <div class="table-main">
  <div class="col-sm-11 mt-5 mt-sm-2">
  <br>
  <div class="panel panel-default">
    <div class="panel-heading">Deduct - 10</div>
    <div class="panel-body">
       <div class="row">
         <div class="col-1" ><button id="invoice" class="btn btn-primary">Invoice</button></div>
         <div class="col">
         <div class="table-responsive ">
      <table id="item_report" class="table table-bordered table-striped">
       <thead>
        <tr>
                <th>S.No.</th>
                <th>Mode</th>
                <th>Stock</th>
                <th>Date</th>
                <th>Remarks</th>
       </tr>
       </thead>
       <tbody>
<?php
        include "config.php";
        $sql = "SELECT * FROM stock where service_id = 11";
        $statement  = $db->prepare($sql);
        $result = $statement->execute();


            $rows = $statement->fetchAll();
            $i = 1;
            foreach($rows as $row){
             
                ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo "invoice"; ?></td>
                    <td><?php echo "date"; ?></td>
                    <td><?php echo $row["stockcount"]; ?></td>
                    <td><?php echo "remarks"; ?></td>
                </tr>

            <?php




                $i++;
            }

?>



       </tbody>
      </table>
         </div>
       </div>
     </div>
    </div>
   </div>
  </div>
  </div>


	</div>
  </section>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
  document.querySelector("#invoice").addEventListener("click",()=>{
    $("#item_report").toggle();
    console.log("click");
  });

</script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/3785baa6f3.js" crossorigin="anonymous"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
</body>
</html>
