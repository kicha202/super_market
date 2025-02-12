<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php 
include 'database.php';
session_start();
?>
<?php
if (isset($_POST['submit'])) {
    $From = $_POST['From'];
    $To = $_POST['To'];

    $varietyname = $_POST['varietyname'];

    $_SESSION['From'] = $From; //Assign a value to the newspaper session
    $_SESSION['To'] = $To;
    //$_SESSION['varietyname'] = $varietyname;
}
?>
<?php 
include 'database.php';
session_start();
if(!isset($_SESSION["id"]) && !isset($_SESSION["user1"]))
{
  echo "<script>window.open('../index.php','_self')</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
        
        <title>SUPER MARKET</title>
        <?php include 'style.php';?>
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

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
          
/* Message */
        .error{
            margin-top: 6px;
            margin-bottom: 0;
            color: #fff;
            color: #D65C4F;

            padding: 5px 8px;
            font-size: 14px;
            font-weight: 600;
            line-height: 14px;

        }
        .green{
            margin-top: 6px;
            margin-bottom: 0;
            color: #fff;
            color: green;

            padding: 5px 8px;
            font-size: 14px;
            font-weight: 600;
            line-height: 14px;

        }
      </style>
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

                            <br>
                            <div class="row">
                                        <?php
                                        if(isset($_POST['submit'])):
                                            extract($_POST);
                                            if($old_password!="" && $password!="") :
                                                $user_id = $_SESSION['user1']['id'];
                                                //echo $user_id;
                                                // $old_pwd=md5(mysqli_real_escape_string($con,$_POST['old_password']));
                                                // $pwd=md5(mysqli_real_escape_string($con,$_POST['password']));
                                                $old_pwd=$_POST['old_password'];
                                                $pwd=$_POST['password'];
                                                if($pwd!=$old_pwd) :
                                                    $con_check=$con->query("SELECT * FROM `login` WHERE `id`='$user_id' AND `password` ='$old_pwd'");
                                                    $count=mysqli_num_rows($con_check);
                                                    if($count==1) :
                                                        $fetch=$con->query("UPDATE `login` SET `password` = '$pwd' WHERE `id`='$user_id'");
                                                        $old_password=''; 
                                                        $password =''; 
                                                        $msg_sucess = "Your new password update successfully.";
                                                    else:
                                                        $error = "The password you gave is incorrect.";
                                                    endif;

                                                else:
                                                    $error = "New password and confirm password do not matched";
                                                endif;
                                            else :
                                                $error = "Please fil all the fields";
                                            endif;   
                                        endif;
                                        ?> 
                                        <br>
                                        <div class="col-md-3">
                                            
                                        </div>

                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                                             <div class="row">
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="form-group">
                                                    <label for="inputName" class="control-label mb-10">Old Password</label> 
                                                    <input type="password" name="old_password" value="<?php echo @$old_password ?>" class="form-control" required="" placeholder="Enter Old Password">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="form-group">
                                                    <label for="inputName" class="control-label mb-10">New Password</label> 
                                                    <input type="password" name="password" value="<?php echo @$password ?>" class="form-control" required="" placeholder="Enter New Password">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                            </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="text-center">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        <div class="<?=(@$msg_sucess=="") ? 'error' : 'green' ; ?> text-center" id="logerror">
                                            <?php echo @$error; ?><?php echo @$msg_sucess; ?>
                                        </div>  
                                    </div>

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


        
 

    </body>


</html>