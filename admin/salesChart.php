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
                                <h4 class="card-title text-center" style="font-weight:bold;">DATE WISE SALES CHART REPORT</h4>
                                <br>
                               
                                  <div class="row">
                                      <div class="col-md-2 col-sm-2 col-xs-2">
                                        <label for="" style="color:black;font-weight:bold;">From Date</label>
                                        <input type="date" id="start_date" name="start_date"  class="form-control" required  value="<?php echo (date('d-m-Y', strtotime($From))); ?>" />
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <label for="" style="color:black;font-weight:bold;">To Date</label>
                                       <input type="date" id="end_date" name="end_date"  class="form-control" required  value="<?php echo (date('d-m-Y', strtotime($To))); ?>" />
                                    </div>

                                  
                                  
                               
                                         <div class="col-md-2 col-sm-2">
                                      <div class="form-group">   
                                        <label for="inputName" class="control-label mb-10"></label>                                                    
                                        <!--<button class="btn btn-primary btn-sm" name="submit"  style="position: relative;top: 32px;">&nbsp; GO &nbsp;</button>-->
                                      
                                        <button id="filter-btn" class="btn btn-primary btn-sm" style="position: relative;top: 32px;">Go</button>
                                    </div>
                                </div>
                            </div>
                     
                        <br>


                        
                            <div style="height: 300px">
                            <canvas id="salesChart" width="400" height="200"></canvas>
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

                <script>
        // Chart.js setup
        let chart = null;

        // Fetch and update chart data
        function fetchDataAndUpdateChart() {
            const startDate = $('#start_date').val();
            const endDate = $('#end_date').val();

            if (!startDate || !endDate) {
                alert('Please select both start and end dates.');
                return;
            }

            $.ajax({
                url: 'fetch_data.php', // URL to the PHP file
                method: 'GET',
                data: { start_date: startDate, end_date: endDate },
                success: function(response) {
                    const data = JSON.parse(response);
                    console.log(data);
                    const labels = data.map(item => item.pname);
                    const pName = data.map(item => item.date);
                    const salesQty = data.map(item => item.qty);
                    const salesMrp = data.map(item => item.mrp);

                    // If the chart already exists, destroy it to create a new one
                    if (chart) {
                        chart.destroy();
                    }

                    // Create new chart
                    const ctx = document.getElementById('salesChart').getContext('2d');
                    chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [

                                 {
                                label: 'Product Name',
                                data: pName,
                                borderColor: 'rgba(255, 99, 71, 0.5)',
                                tension: 0.1
                            },
                                {
                                label: 'Sales Qty',
                                data: salesQty,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                tension: 0.1
                            },
                             {
                                label: 'Sales Amount',
                                data: salesMrp,
                                borderColor: 'rgba(192, 70, 85, 91)',
                                tension: 0.1
                            }
                        ]
                        },
                            options: {
                    responsive: true,
    maintainAspectRatio: false,
    legend: {
        display: true,
      position: 'bottom',
        labels: {
            fontColor: 'blue',
            usePointStyle:true,
             background: 'red',
             fontSize: 15,

        }
    },
     scales: {
        xAxes: [{
                    ticks: {
                        fontColor: "orange",
                        fontSize: 12,
                        stepSize: 5,    
                        beginAtZero: true
                    }
                }],

                 yAxes: [{
                    ticks: {
                        
                        fontSize: 12,
                        stepSize: 5,    
                        beginAtZero: true,

                    }
                }],

     }
},
                    });
                },
                error: function(err) {
                    console.error('Error fetching data:', err);
                }
            });
        }

        // Event listener for the filter button
        $('#filter-btn').click(function() {
            fetchDataAndUpdateChart();
        });
    </script>


        <!-- JAVASCRIPT -->
        <?php include 'script.php';?>


        
 

    </body>


</html>