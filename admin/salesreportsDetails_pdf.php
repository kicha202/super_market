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
	$_SESSION['varietyname'] = $varietyname;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SUPER MARKET</title>
    <!--title icons--->
    <link rel="icon" type="img/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="vendors/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="vendors/bower_components/switchery/dist/switchery.min.css" />
    <link rel="stylesheet" href="vendors/bower_components/owl.carousel/dist/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="vendors/bower_components/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" />
    <!-- Data table CSS -->
    <link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet"
    type="text/css" />
    <!-- Toast CSS -->
    <link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet"
    type="text/css">
    <!-- bootstrap-select CSS -->
    <link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet"
    type="text/css" />
    <!-- Calendar CSS -->
    <link href="vendors/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <style>
        /*Table Design */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid black;
            padding: 4px 4px 6px 4px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->

    <div class="wrapper theme-1-active pimary-color-gold">
        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default card-view">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <h5 style="text-align:center;position: relative;top: 0px;font-size:16px;">SALES
                                         REPORT&nbsp;&nbsp; - &nbsp;&nbsp;
                                        <?php
                                        if(isset($_SESSION["From"], $_SESSION["To"]))
                                        {
                                           $From=date('F',strtotime($_SESSION['From']));
        								    // $To=date('F',strtotime($_SESSION['To']));
                                           $month = strtoupper($From);
                                           echo "$month";
                                       }
                                   ?> -
                                   <?php
                                   if(isset($_SESSION["From"], $_SESSION["To"]))
                                   {
                                      $From=date('Y',strtotime($_SESSION['From']));
        								// $To=date('F',strtotime($_SESSION['To']));
                                      $year = strtoupper($From);
                                      echo "$year" ;
                                  }
                                  ?>
                              </h5>
                            
                      <h4
                      style="font-weight:bold;font-size:12px;color:blue;text-align:right;position: relative;top: -40px;">
                      Date:
                      <?php
                      if(isset($_SESSION["From"], $_SESSION["To"]))
                      {
                          $From=date('d-m-Y',strtotime($_SESSION['From']));
                          $To=date('d-m-Y',strtotime($_SESSION['To']));
                          echo "$From To $To" ;
                      }
                      ?>
                  </h4>


                  <table style="position:relative;top: -40px;">
                    <thead>
                        <tr style="background-color:#76D7C4;">
                            <th  style="font-size:13px;text-align:center;">bill No</th>
                            <th 
                            style="text-align:center;font-size: 13px;text-align:center;">Date
                        </th>
                        <th 
                        style="text-align:center;font-size: 13px;text-align:center;">Product Quantity
                    </th>
                    <th
                    style="text-align:center;font-size: 13px;text-align:center;">Total Amount
                </th>
              
    </tr>
    
</thead>
<tbody>

    <?php
    $From=$_SESSION['From'];
    $To=$_SESSION['To']; 
    

    $query2=$con->query("
        SELECT
        date,id,SUM(qty) As qty,SUM(amt) As amt
        FROM issuesstock  WHERE date BETWEEN '".$_POST["From"]."' AND '".$_POST["To"]."'  GROUP BY id
       ");

	//number of rows count used by avg total
    $count=$query2->num_rows; 
    if(mysqli_num_rows($query2) > 0)
    {
        while($row = mysqli_fetch_array($query2))      
        {
            

        


         echo "<tr>
          <td style='text-align:center;font-weight: bold;'>".$row['id']."</td>
         <td style='text-align:center;font-weight: bold;'>".date('j-n-Y', strtotime($row['date']))."</td>

         <td style='text-align:center;font-weight: bold;'>".$row['qty']."</td>
         <td style='text-align:center;font-weight: bold;'>".$row['amt']."</td>


        
         </tr>";
     }

    

 }

 ?>
</tbody>
</table>

</div>
</div>
</div>
</div>
</div>
<!-- /Row -->
</div>
</div>
</div>
<!-- /Row -->


<!-- jQuery -->
<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Data table JavaScript -->
<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<!-- Slimscroll JavaScript -->
<script src="dist/js/jquery.slimscroll.js"></script>
<!-- EChartJS JavaScript -->
<script src="vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
<script src="vendors/echarts-liquidfill.min.js"></script>
<script src="vendors/ecStat.min.js"></script>
<!-- Toast JavaScript -->
<script src="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<!-- Progressbar Animation JavaScript -->
<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
<!-- Fancy Dropdown JS -->
<script src="dist/js/dropdown-bootstrap-extended.js"></script>
<!-- Sparkline JavaScript -->
<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Owl JavaScript -->
<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
<!-- Calender JavaScripts -->
<script src="vendors/bower_components/moment/min/moment.min.js"></script>
<script src="vendors/jquery-ui.min.js"></script>
<script src="vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="dist/js/fullcalendar-data.js"></script>
<!-- Switchery JavaScript -->
<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
<!-- Bootstrap Select JavaScript -->
<script src="vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<!-- Init JavaScript -->
<script src="dist/js/init.js"></script>
<script src="dist/js/dashboard4-data.js"></script>
</body>
</html>