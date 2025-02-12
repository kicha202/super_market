

<?php 
include 'database.php';
session_start();
if(!isset($_SESSION["id"]) && !isset($_SESSION["user1"]))
{
  echo "<script>window.open('../index.php','_self')</script>";
}
?>



<?php error_reporting(E_ERROR); ?>
<?php
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d',strtotime("-1 days")); 
$time  = date('h:i');
?>
<!---current date--->
<?php 
date_default_timezone_set('Asia/Kolkata'); 
$dateveera = date("Y-m-d"); // time in India
?>
<!doctype html>
<html lang="en">
<head>
        
        <title>SUPER MARKET</title>
        <?php include 'style.php';?>

  

        <style>
            /*  ------mobile form ---*/
            .col-lg-1,
            .col-lg-10,
            .col-lg-11,
            .col-lg-12,
            .col-lg-2,
            .col-lg-3,
            .col-lg-4,
            .col-lg-5,
            .col-lg-6,
            .col-lg-7,
            .col-lg-8,
            .col-lg-9,
            .col-md-1,
            .col-md-10,
            .col-md-11,
            .col-md-12,
            .col-md-2,
            .col-md-3,
            .col-md-4,
            .col-md-5,
            .col-md-6,
            .col-md-7,
            .col-md-8,
            .col-md-9,
            .col-sm-1,
            .col-sm-10,
            .col-sm-11,
            .col-sm-12,
            .col-sm-2,
            .col-sm-3,
            .col-sm-4,
            .col-sm-5,
            .col-sm-6,
            .col-sm-7,
            .col-sm-8,
            .col-sm-9,
            .col-xs-1,
            .col-xs-10,
            .col-xs-11,
            .col-xs-12,
            .col-xs-2,
            .col-xs-3,
            .col-xs-4,
            .col-xs-5,
            .col-xs-6,
            .col-xs-7,
            .col-xs-8,
            .col-xs-9 {
                position: unset;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
            }

            /* form small */
            .form-control {
                display: block;
                width: 100%;
                height: 26px;
                padding: 2px 2px;
                font-size: 13px;
                line-height: 1.42857143;
                color: black;
                background-color: #fff;
                background-image: none;
                border: 1px solid #08a6fb;
                border-radius: 0px;
                -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
                box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
                -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
                -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            }

            /* table custom design */
            .table>:not(caption)>*>* {
                padding: 2px 3px;
                text-align: center;
            }

            .btn-group-sm>.btn,
            .btn-sm {
                --bs-btn-padding-y: 2px;
                --bs-btn-padding-x: 3px;
                --bs-btn-font-size: 10px;
                --bs-btn-border-radius: var(--bs-border-radius-sm);
            }

            .dropdown-item {
                color: #5e2a2a;
                font-weight: bold;
                font-size: 13px;
            }

            .card-title {
                font-size: 16px;
                margin: 0 0 7px 0;
                color: #045dee !important;
            }

            /*custom*/
            #loader {
                display: none;
                margin-top: 10px;
            }

            #customer-data {
                margin-top: 10px;
            }

            #customer-list {
                height: 30px;
                width: 250px;
            }

            input[type=text]:focus {
                outline: 2px solid #ec3d79;
                /* oranges! yey */
            }

            select:focus {
                border-color: #ec3d79 !important;
            }


            /* net total amt input field rupees symbal design only */
            .input-wrapper {
              position: relative;
          }

          .input-wrapper:before {
              content: attr(data-currency);
              position: absolute;
              left: 0.25em;
              top: 5px;
          }

          .input-wrapper > input {
              text-indent: 1em;
              padding: 3px 3px;
              border: 2px solid black;


          }
      </style>
       <script>
    function ShowEditPersonalInfo(operation) {
        if (operation == 'show') {
            $('#id_nam5').hide();
            $('#edit_id').hide();
            $('#c_id').show();
            $('#add').show();
            $('#id_nam').hide();
            $('#name_id').show();
            $('#vv').hide();
            $('#editpersonalinfodiv').show();
        } else if (operation == 'hide') {
            $('#id_nam').show();
            $('#name_id').hide();
            $('#id_nam5').show();
            $('#edit_id').show();
            $('#c_id').hide();
            $('#add').show();
            $('#vv').hide();
            $('#editpersonalinfodiv').hide();
        }
    }
    </script>
    </head>
    <body data-sidebar-size="sm">
        <!-- Begin page -->
        <div id="layout-wrapper">
           <?php include 'header.php';?>

           <?php include 'sideMenu.php';?>

           
           <div class="main-content">
            <div class="page-content">




                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                          <h4 class="card-title text-center" style="font-weight:bold;">Product List Page
                                </h4>
                                <br>

                                
                                 <div class="row">
                               <div class="table-rep-plugin">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                       <thead>
                                         <tr>
                                             <th style="background:#f85897;color:white;">Sno</th>  
                                             <th style="background:#f85897;color:white;display: none;">Id</th>                                               
                                             <th style="background:#f85897;color:white;">Category</th>
                                             <th style="background:#f85897;color:white;">Sub Category</th>
                                             <th style="background:#f85897;color:white;">Brand</th>
                                             <th style="background:#f85897;color:white;">Prod Name</th>
                                             <th style="background:#f85897;color:white;">Qty</th>
                                             <th style="background:#f85897;color:white;">Mrp</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                         $query = "SELECT * FROM productlist";
                                         $query_run = mysqli_query($con, $query);

                                         if(mysqli_num_rows($query_run) > 0)
                                         {
                                            $snnormal=1;
                                            foreach($query_run as $student)
                                            {
                                                ?>
                                                <tr>
                                                 <td style="color:black;font-size: 14px;"><?php echo $snnormal++;?></td>
                                                 <td style="color:black;font-size: 14px;display: none;"><?= $student['id'] ?></td>
                                                 <td style="color:black;font-size: 14px;font-weight: bolder;text-transform: uppercase;"><?= $student['category'] ?></td> 
                                                 <td style="color:black;font-size: 14px;"><?= $student['subcategory'] ?></td>

                                                  <td style="color:black;font-size: 14px;"><?= $student['brand'] ?></td>
                                                   <td style="color:black;font-size: 14px;"><?= $student['pname'] ?></td>
                                                    <td style="color:black;font-size: 14px;"><?= $student['pqty'] ?></td>
                                                     <td style="color:black;font-size: 14px;"><?= $student['mrp'] ?></td>
                                                 
                                                 
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                                
                                <br>



                        </div> <!-- end card-body-->
                    </div> <!-- end card-->




                </div> <!-- end col-->









            </div> <!-- end row-->


        



        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

     <?php include 'footer.php';?>

        </div>
        <!-- END layout-wrapper -->

        

       

       
                <?php include 'layoutSetting.php';?>

        <!-- JAVASCRIPT -->
        <?php include 'script.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        


    </body>


</html>