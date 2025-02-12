

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

                           <h4 class="card-title text-center" style="font-weight:bold;">Customer's Sales Entry
                             </h4>

                             <?php

                //     $query = "select * from invoice3 order by id desc limit 1";
                //     $result = mysqli_query($conn,$query);
                //     $row = mysqli_fetch_array($result);

                //     $lastid = $row['id'];
                //     if($lastid == "")
                //     {
                //         $id = "1";
                //   }
                //   else
                //   {
                //     $id = substr($lastid, 0);
                //     $id = intval($id);
                //     $id = "" . ($id + 1);
                // }
            $query = "select * from issuesstock order by id desc limit 1";
            $result = mysqli_query($con,$query);
            $row = mysqli_fetch_array($result);

            $lastid = $row['id'];
            if($lastid == "")
            {
             $number = "SM-0000001";
           }
           else
           {
             $idd = str_replace("SM-","", $lastid);
             $id = str_pad($idd + 1, 7,0, STR_PAD_LEFT);
             $number = 'SM-' .$id;
           }
           ?>

                             <!-- Tab panes -->
                             <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="navpills-home" role="tabpanel">

                                    <div class="row">
                                        <h6  style="font-weight:bold;font-size: 18px;">Sales Products</h6>
                                        <br>
                                        <div class="col-md-4">
                                             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                                        <div class="row">

                                        <input class="form-control" name="id" id="id" type="hidden" value="<?php echo $number;?>">

                                        <div class="col-12 col-md-10 col-sm-6 col-xs-2" style="display: none;">
                                             <div class="form-group">
                                               <label for="" style="color:black;font-weight: bold;">Date</label>
                                               <input type="date" name="date" id="date" value="<?php echo $date;?>" class="form-control" required>
                                           </div>
                                       </div>

                                       

                                       <div class="col-12 col-md-10 col-sm-6 col-xs-2" style="display: none;">
                                             <div class="form-group">
                                               <label for="" style="color:black;font-weight: bold;">Time</label>
                                               <input type="text" name="time" id="time" value="<?php echo $time;?>" class="form-control" required>
                                           </div>
                                       </div>

                                        <div class="col-12 col-md-10 col-sm-6 col-xs-2" >
                                             <div class="form-group">
                                               <label for="" style="color:black;font-weight: bold;">Category</label>
                                               <select name="category" class="form-control" required="" id="category"
                                                  >
                                                  <option value="">-- Select Category --</option>
                                                </select>
                                           </div>
                                       </div>
                                       <div class="col-12 col-md-10 col-sm-6 col-xs-2" >
                                         <div class="form-group">
                                           <label for="" style="color:black;font-weight: bold;">Sub Category</label>
                                           <select name="subcategory" class="form-control" required=""
                                                    id="subcategory"  required>
                                                    <option value="">-- Select Sub Category --</option>
                                                    
                                                </select> 
                                       </div>
                                   </div>
                                   <div class="col-12 col-md-10 col-sm-6 col-xs-2" >
                                         <div class="form-group">
                                           <label for="" style="color:black;font-weight: bold;">Brand</label>
                                           <select name="brand" class="form-control" required=""
                                                    id="brand"  required>
                                                    <option value="">-- Select Brand--</option>
                                                    
                                                </select>
                                       </div>
                                    </div>


                                    <div class="col-12 col-md-10 col-sm-6 col-xs-2" >
                                         <div class="form-group">
                                           <label for="" style="color:black;font-weight: bold;">Product Name</label>
                                           <select name="pname" class="form-control" required=""
                                                    id="pname"  required>
                                                    <option value="">-- Select Product --</option>
                                                    
                                            </select>
                                       </div>
                                    </div>


                                    




                               <div class="col-12 col-md-5 col-sm-6 col-xs-2">
                                   <div class="form-group">
                                       <label for="" style="color:black;font-weight: bold;">Qty</label>
                                       <input type="text" name="qty" id="qty" class="form-control" required min="1">
                                   </div>
                               </div>
                               <div class="col-12 col-md-5 col-sm-6 col-xs-2">
                                 <div class="form-group">
                                   <label for="" style="color:black;font-weight: bold;">Price</label>
                                  <select name="mrp" class="form-control" required=""
                                                    id="mrp"  readonly style="background-color: grey;">
                                                    <option value="">-- Select Product --</option>
                                                    
                                  </select>
                               </div>
                           </div>
                            <div class="col-12 col-md-10 col-sm-10 col-xs-10">
                                 <div class="form-group">
                                   <label for="" style="color:black;font-weight: bold;">Available Stock</label>
                                   <select name="pqty" class="form-control" required=""
                                                    id="pqty"  readonly style="background-color: grey;">
                                                    <option value="">-- Select Product --</option>
                                                    
                                  </select>
                               </div>
                           </div>
        <br><br><br><br>
        <div class="col-12 col-md-10 col-sm-6 col-xs-2" >
            <div class="text-center">                                                                             
                <button type="button" class="btn btn-primary btn-sm" name="filter"   id="add" onclick = "clearRadio()">&nbsp;&nbsp;&nbsp; <span style="font-weight:bold;font-size: 13px;">Add More</span> &nbsp;&nbsp;&nbsp;</button>
            </div>
        </div><!---end button row--->
    </div>
</form>
                                        </div>

                                        <div class="col-md-8">
                                            <h6 style="font-weight:bold;font-size: 18px;">List of Products Sales</h6>

                                            <div class="table-responsive">
                                                <table class="tableper table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="background-color: #3c578b;color: white;display:none ;">Bill No</th>
                                                            <th style="background-color: #3c578b;color: white;display:none ;">Date</th>
                                                            <th style="background-color: #3c578b;color: white;display:none ;">Time</th>
                                                            <th style="background-color: #3c578b;color: white;display:none ;">Category</th>
                                                            <th style="background-color: #3c578b;color: white;display:none ;">Sub Category</th>   
                                                            <th style="background-color: #3c578b;color: white;display:none ;">Brand</th>   
                                                            <th style="background-color: #3c578b;color: white;display: ;">Product Name</th>   
                                                            <th style="background-color: #3c578b;color: white;display: ;">Qty</th>   
                                                            <th style="background-color: #3c578b;color: white;display: ;">Price</th>   
                                                            <th style="background-color: #3c578b;color: white;display: ;">Total</th>                
                                                            <th style="background-color: #3c578b;color: white;">DEL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div><!--end table responsive-->
                                              <form action="invoice.php" method="post" autocomplete="off"  target="_blank">
                                                  <div class="row"><!---start row--->
                                                    <div class="col-6 col-md-2 col-sm-2 col-xs-2">
                                                    </div>
                                                    <div class="col-6 col-md-3 col-sm-2 col-xs-2">
                                                    </div>
                                                    <div class="col-6 col-md-3 col-sm-2 col-xs-2">
                                                      
                                                    </div>
                                                    <div class="col-6 col-md-4 col-sm-2 col-xs-2">
                                                        <div class="form-group">
                                                            <label for="" style="color:black;font-weight: bold;">Total Net Amt:</label>
                                                            <input type="text"  class="form-control" required    name="total" id="total" readonly style="background:#cbcfc9;font-weight: bold;font-size: 12px;" />
                                                        </div>
                                                    </div>
                                                </div><!----end form row---->
                                                <br>


                                            <div class="row">
                                                <div class="text-center">
                                                    <label for="inputName" class="control-label mb-10"></label>
                                                     <input type="submit" value="  Proceed  " id="btn" class="btn btn-primary btn-sm" style="font-weight:bold;font-size: 13px;"  > 
                                                  
                                                </div>
                                            </div>

                                        </form>
                                           
                                            <!---end button row--->
                                        </div><!--end col-md-9-->
                                    </div>
                                </div>
                                <!-- end first tab--->
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        
        
        
<script type="text/javascript">
    $("document").ready(function() {
        $(function() {
                    checkValid(); // run it for the first time
                    $("#date").on("input", checkValid);


                    $("#time").on("input", checkValid);
                    $("#category").on("input", checkValid);
                    $("#subcategory").on("input", checkValid);
                    $("#brand").on("input", checkValid);
                    $("#pname").on("input", checkValid);
                    $("#qty").on("input", checkValid);
                    $("#mrp").on("input", checkValid);
                    $("#id").on("input", checkValid);
                 //   $("#availablestock").on("input", checkValid);
                                    
                });

        function checkValid() {

            var date = $("#date").val().length > 0;      

            var time = $("#time").val().length > 0;
            var category = $("#category").val().length > 0;
            var subcategory = $("#subcategory").val().length > 0;
            var brand = $("#brand").val().length > 0;
            var pname = $("#pname").val().length > 0;
            var qty = $("#qty").val().length >= 1;
            var mrp = $("#mrp").val().length >= 1;
            var id = $("#id").val().length > 0;



            $("#btn").prop("disabled",  !date || !time || !category || !subcategory || !brand || !pname || !qty || !mrp || !id);
        }

        var total = '';

        $("#add").click(function() {

            id = $("#id").val();
            date = $("#date").val();

            time = $("#time").val();
            category = $("#category").val();
            subcategory = $("#subcategory").val();
            brand = $("#brand").val();
            pname = $("#pname").val();
            qty = $("#qty").val();
            mrp = $("#mrp").val();
            pqty = $("#pqty").val();


            if (date != "" && time!="" && category!="" && subcategory!="" && brand!="" && pname!="" && qty!="" && qty!="0"  && mrp!="" && pqty!="" && pqty!="0" && mrp!="0" ) {




                amt = (Number(qty)*Number(mrp));   

               // alert(amt);

                var row = "<tr><td class='id' style='text-align:center;display:none;'>" +
                id + "</td><td class='date' style='text-align:center;display:none;'>" +
                date + "</td><td class='time' style='text-align:center;display:none;'>" +
                time + "</td><td class='category' style='text-align:center;display:none;'>" +
                category + "</td><td class='subcategory' style='text-align:center;display:none;'>" +
                subcategory + "</td><td class='brand' style='text-align:center;display:none;'>" +
                brand + "</td><td class='pname' style='text-align:center;display:;'>" +
                pname + "</td><td class='qty' style='text-align:center;display:;'>" +
                qty + "</td><td class='mrp' style='text-align:center;display:;'>" +
                mrp + "</td><td class='amt' style='text-align:center;display:;'>" +
                amt + "</td><td style='text-align:center;'><button type='button' class='btn btn-danger btn-xs' style='height:21px;font-size:10px;line-height:0;'>Del</button></td></tr>";



                total=(Number(total)+Number(amt));

                $(".tableper").append(row);

                    //$("#date").val("");
                   //  $("#time").val("");
                      //$("#category").val("");
                       //$("#subcategory").val("");
                        //$("#brand").val("");
                        $("#pname").val("");
                         $("#qty").val("");
                          $("#mrp").val("");
                            $("#pqty").val("");
                             $('#total').val(total); 

            } else {
                alert("Please Fill All Details Or Check Quantity,Price,Available Stock Values");
            }
        }); // end add button




        //delete row
        $(".tableper").on("click", "button", function() {

         var amt = $(this).closest("tr").find('.amt').html();
         total=(Number(total)-Number(amt));

        $('#total').val((total).toFixed(2));
        
            $(this).closest("tr").remove();

        });



        ///start insert data
        $("#btn").on("click", function() {


            var id = [];
            var date = [];
            var time = [];
            var category = [];
            var subcategory = [];
            var brand = [];
            var pname = [];
            var qty = [];

            var mrp = [];
            var amt = [];

             $('.id').each(function() {
                id.push($.trim($(this).text()));
            });

            $('.date').each(function() {
                date.push($.trim($(this).text()));
            });

            $('.time').each(function() {
                time.push($.trim($(this).text()));
            });
            $('.category').each(function() {
                category.push($.trim($(this).text()));
            });
            $('.subcategory').each(function() {
                subcategory.push($.trim($(this).text()));
            });
            $('.brand').each(function() {
                brand.push($.trim($(this).text()));
            });
            $('.pname').each(function() {
                pname.push($.trim($(this).text()));
            });
            $('.qty').each(function() {
                qty.push($.trim($(this).text()));
            });
            $('.mrp').each(function() {
                mrp.push($.trim($(this).text()));
            });
            $('.amt').each(function() {
                amt.push($.trim($(this).text()));
            });




            $.ajax({
                url: "salesPageAction.php",
                type: "post",
                data: {


                   id:id,date: date,time:time,category:category,subcategory:subcategory,brand:brand,pname:pname,qty:qty,mrp:mrp,amt:amt

                },
                success: function(data) {
                    if (data == "1") {
                        alert("Data Saved");
                          setTimeout(function(){
                   location.reload()
                }, 5000);
                    }
                }
            });


        }); //end btn 
        ///end inset data
    });
</script>







<script>
        $(document).ready(function() {
            // Load countries on page load
            loadCountries();

            // Load subcategorys based on selected category
            $('#category').change(function() {
                var category = $(this).val();
                if (category) {
                    loadsubcategorys(category);
                } else {
                    $('#subcategory').html('<option value="">Select Sub Category</option>');
                    $('#brand').html('<option value="">Select Brand</option>');
                    $('#pname').html('<option value="">Select Product</option>');
                }
            });

            // Load cities based on selected subcategory
            $('#subcategory').change(function() {
                var subcategory = $(this).val();
                if (subcategory) {
                    loadCities(subcategory);
                } else {
                    $('#brand').html('<option value="">Select Brand</option>');
                    $('#pname').html('<option value="">Select Product</option>');
                }
            });

            // Load billnoes based on selected branch
            $('#brand').change(function() {
                var brand = $(this).val();
                if (brand) {
                    loadbillnoes(brand);
                } else {
                    $('#pname').html('<option value="">Select Product</option>');
                }
            });


             $('#pname').change(function() {
                var pname = $(this).val();
                if (pname) {
                    loadbillnoes1(pname);
                } else {
                    $('#mrp').val();
                }
            });


             $('#pname').change(function() {
                var pname = $(this).val();
                if (pname) {
                    loadbillnoes2(pname);
                } else {
                    $('#pqty').val();
                }
            });

            // Submit form
            // $('#locationForm').submit(function(e) {
            //     e.preventDefault();
            //     var formData = $(this).serialize();
            //     console.log(formData);
            // });
        });

        // Function to load countries from database
        function loadCountries() {
            $.ajax({
                url: 'sales.php',
                method: 'GET',
                data: {type: 'category'},
                success: function(response) {
                    $('#category').html('<option value="">Select Category</option>' + response);
                }
            });
        }

        // Function to load subcategorys based on selected category
        function loadsubcategorys(category) {
            $.ajax({
                url: 'sales.php',
                method: 'GET',
                data: {type: 'subcategory', category: category},
                success: function(response) {
                    $('#subcategory').html('<option value="">Select Sub Category</option>' + response);
                    $('#brand').html('<option value="">Select Brand</option>');
                    $('#pname').html('<option value="">Select Product</option>');
                }
            });
        }

        // Function to load cities based on selected subcategory
        function loadCities(subcategory) {
            $.ajax({
                url: 'sales.php',
                method: 'GET',
                data: {type: 'brand', subcategory: subcategory},
                success: function(response) {
                    $('#brand').html('<option value="">Select Brand</option>' + response);
                    $('#pname').html('<option value="">Select Product</option>');
                }
            });
        }

        // Function to load billnoes based on selected branch
        function loadbillnoes(brand) {
            $.ajax({
                url: 'sales.php',
                method: 'GET',
                data: {type: 'pname', brand: brand},
                success: function(response) {
                    $('#pname').html('<option value="">Select Product</option>' + response);
                }
            });
        }

          function loadbillnoes1(pname) {
            $.ajax({
                url: 'sales.php',
                method: 'GET',
                data: {type: 'mrp', pname: pname},
                success: function(response) {
                    $('#mrp').html('' + response);
                }
            });
        }

         function loadbillnoes2(pname) {
            $.ajax({
                url: 'sales.php',
                method: 'GET',
                data: {type: 'pqty', pname: pname},
                success: function(response) {
                    $('#pqty').html('' + response);
                }
            });
        }
    </script>
    </body>


</html>