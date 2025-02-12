

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

  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
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

                            <div class="row">
                                 <div class="col-md-6">
                                    <h5>Purchase Reports</h5>
                                    <br>
                                   <select id="filterpurchase" onchange="updateChartPurchase()">
                                        <option value="date">Date-wise</option>
                                        <option value="month">Month-wise</option>
                                        <option value="year">Year-wise</option>
                                    </select>
                                     <br><br><br>
                                    <div style="height: 300px">
                                    <canvas id="purchaseChart" width="300"></canvas> 
                                </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <h5>Sales Reports</h5>
                                    <br>
                                     <select id="filter" onchange="updateChart()">
                                        <option value="date">Date-wise</option>
                                        <option value="month">Month-wise</option>
                                        <option value="year">Year-wise</option>
                                    </select>
                                    <br><br><br>
                                     <div style="height: 300px">
                                    <canvas id="salesChart" width="300"></canvas>
                                </div>
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


                
<script>
    let chart;

    async function fetchData(filter) {
        const response = await fetch(`chartLogic.php?filter=${filter}`);
        return response.json();
    }

    async function updateChart() {
        const filter = document.getElementById('filter').value;
        const data = await fetchData(filter);

        const labels = data.map(item => item.pname);
        const values = data.map(item => item.qty);

        if (chart) {
            chart.destroy();
        }

        const ctx = document.getElementById('salesChart').getContext('2d');
        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Product Name',
                        data: values,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,

                    },

                    {
                        label: 'Qty',
                        data: values,
                        backgroundColor: 'rgba(192, 99, 78, 0.2)',
                        borderColor: 'rgba(75, 57, 76, 122)',
                        borderWidth: 1
                    }
                ]
            },

            // options: {
            //     scales: {
            //         y: {
            //             beginAtZero: true
            //         }
            //     }
            // }

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
}
            });
        }

        updateChart(); // Initialize chart
    </script>



    <script>
        let chartpurchase;
        
        async function fetchData(filterpurchase) {
            const response = await fetch(`chartLogicPurchase.php?filterpurchase=${filterpurchase}`);
            return response.json();
        }

        async function updateChartPurchase() {
            const filterpurchase = document.getElementById('filterpurchase').value;
            const data = await fetchData(filterpurchase);

            const labels = data.map(item => item.pname);
            const values = data.map(item => item.qty);

            if (chartpurchase) {
                chartpurchase.destroy();
            }

            const ctx = document.getElementById('purchaseChart').getContext('2d');
            chartpurchase = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Product Name',
                            data: values,
                            backgroundColor: 'rgba(175, 192, 55, 141)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,


                        },

                        {
                            label: 'Qty',
                            data: values,
                            backgroundColor: 'rgba(55, 95, 105, 205)',
                            borderColor: 'rgba(75, 57, 76, 122)',
                            borderWidth: 1
                        }
                    ]
                },

                // options: {
                //     scales: {
                //         y: {
                //             beginAtZero: true
                //         }
                //     }
                // }

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
}
            });
        }

        updateChartPurchase(); // Initialize chart
    </script>

        <!-- JAVASCRIPT -->
        <?php include 'script.php';?>



        


    </body>


</html>