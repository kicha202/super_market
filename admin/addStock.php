

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

                           <h4 class="card-title text-center" style="font-weight:bold;">Purchase Entry
                             </h4>



                             <!-- Tab panes -->
                             <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="navpills-home" role="tabpanel">

                                    <div class="row">
                                      <div id="sampleveera">
                                            <?php
                                                if(isset($_POST['save']))
                                                {
                                                    $category = $_POST['category'];   
                                                    $subcategory = $_POST['subcategory'];
                                                    $brand = $_POST['brand'];
                                                    $pname = $_POST['pname'];
                                                    
                                                    $pqty = $_POST['pqty'];
                                                    $mrp = $_POST['mrp'];
                                                    $date = $_POST['date'];
                                                    
                                                    

                                                    $check=mysqli_query($con,"select * from productlist where category='$category' and subcategory='$subcategory' and brand='$brand' and pname='$pname' and pqty='$pqty' and mrp='$mrp' and date='$date'");
                                                       
                                                    $checkrows=mysqli_num_rows($check);
                                                    if($checkrows>0) {
                                                         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <i class="uil uil-exclamation-octagon me-2"></i>
                                                Already Registered !!!
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                
                                                </button>
                                            </div>';
                                                    } else {
                                                        // echo $supname."<br>";
                                                        $query = "INSERT INTO productlist(category,subcategory,brand,pname,pqty,mrp,date) VALUES ('$category','$subcategory','$brand','$pname','$pqty','$mrp','$date')";

                                                           
                                                            $query_run = mysqli_query($con, $query);
                                                            if($query_run)
                                                            {
                                                                 echo '<p style="text-align:center;font-weight:bold;color:green;">Product Added Success</p>';
                                                            }
                                                            else{
                                                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <i class="uil uil-exclamation-octagon me-2"></i>
                                                Product Added Failed try again
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                
                                                </button>
                                            </div>';
                                                            }
                                                           
                                                            mysqli_close($con);
                                                        }
                                                       // echo "<script>window.open('addStock.php','_self')</script>";
                                                    }
                                                    ?>
                                    
                                       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                                             <div class="row">

                                       

                                        

                                    
                                        <div class="col-12 col-md-2 col-sm-6 col-xs-2">
                                            <div id="sample">
                                                <label for="" style="color:black;font-weight: bold;">Category &nbsp;
                                                    <a data-bs-toggle="modal" data-bs-target="#addParty"
                                                        style="color:black;font-weight: bold;font-size: 12px;color: blue;">Add
                                                        New</a></label>
                                                <select name="category" class="form-control" required="" id="category"
                                                  >
                                                  <option value="">-- Select Category --</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                      



                                         <div class="col-12 col-md-4 col-sm-6 col-xs-2">
                                            <div id="sample1">
                                                <label for="" style="color:black;font-weight: bold;">Sub Category &nbsp;
                                                    <a data-bs-toggle="modal" data-bs-target="#addVariety"
                                                        style="color:black;font-weight: bold;font-size: 12px;color: blue;">Add
                                                        New</a></label>
                                               <select name="subcategory" class="form-control" required=""
                                                    id="subcategory"  required>
                                                    <option value="">-- Select Sub Category --</option>
                                                    
                                                </select> 
                                            </div>
                                        </div>
                                       
                                    
                                       
                                       <div class="col-12 col-md-2 col-sm-6 col-xs-2">
                                            <div id="sample11111111">
                                                <label for="" style="color:black;font-weight: bold;">Brand &nbsp;
                                                    <a data-bs-toggle="modal" data-bs-target="#addBrand"
                                                        style="color:black;font-weight: bold;font-size: 12px;color: blue;">Add
                                                        New</a></label>
                                                <select name="brand" class="form-control" required=""
                                                    id="brand"  required>
                                                    <option value="">-- Select Brand--</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                      

                                      <div class="col-12 col-md-4 col-sm-6 col-xs-2">
                                            
                                                <label for="" style="color:black;font-weight: bold;">Product Name &nbsp;
                                                    <a data-bs-toggle="modal" data-bs-target="#addProduct"
                                                        style="color:black;font-weight: bold;font-size: 12px;color: blue;">Add
                                                        New Product</a></label>
                                               <select name="pname" class="form-control" required=""
                                                    id="pname"  required>
                                                    <option value="">-- Select Product --</option>
                                                    
                                                </select>
                                           
                                        </div>
                                        <br><br> <br><br> 
                                       <div class="col-12 col-md-1 col-sm-6 col-xs-2" >
                                         <div class="form-group">
                                           <label for="" style="color:black;font-weight: bold;">Prod.Qty</label>
                                           <input type="text" name="pqty" id="pqty" class="form-control" placeholder="Qty" required>
                                       </div>
                                    </div>

                                    <div class="col-12 col-md-1 col-sm-6 col-xs-2" >
                                         <div class="form-group">
                                           <label for="" style="color:black;font-weight: bold;">Prod.Mrp</label>
                                           <input type="text" name="mrp" id="mrp" class="form-control" placeholder="Mrp" required>
                                       </div>
                                    </div>
                                   
                                    <input type="hidden" name="date" id="date" class="form-control" value="<?php echo $date;?>" required>
                                       
                                    </div>
                                    <!---end form row-->
                                    <br>
                                    <div class="row">
                                        <div class="text-center">
                                           <!--  <button type="button" class="btn btn-primary btn-sm" name="save"
                                                id="add">&nbsp;&nbsp;&nbsp; <span
                                                    style="font-weight:bold;font-size: 13px;"
                                                    onclick="ShowEditPersonalInfo( 'hide' );">Submit</span>
                                                &nbsp;&nbsp;&nbsp;</button> -->

                                                <input type="submit" name="save"  value="Submit" id="save" class="btn btn-primary btn-sm" title="Click">
                                        </div>
                                    </div>
                                    <!---end button row--->
                                </form>
                                </div>
                                        
                                    </div>
                                </div>
                                <!-- end first tab--->
                            </div>



                        </div> <!-- end card-body-->
                    </div> <!-- end card-->




                </div> <!-- end col-->









            </div> <!-- end row-->


            
<!----Add new new party modal popup start--->
    <div class="col-lg-6">
        <div class="mt-4">
            <!-- staticBackdrop Modal example -->
            <div class="modal fade" id="addParty" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background:darkseagreen;">
                            <h5 class="modal-title w-100 text-center" id="exampleModalLabel" style="color: white;">New
                                Category name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="saveParty" autocomplete="off">
                            <div class="modal-body">
                                <div class="row">
                                   <div class="col-md-0 col-sm-0 col-xs-0" > 
                                        &nbsp;
                                        <label for=""
                                            style="font-weight:bold;color: black;font-size: 14px;display: none;">Created
                                            Date</label>
                                        <input type="text" name="createddate" id="createddate" class="form-control"
                                            placeholder="Enter Party Name" required value="<?php echo $dateveera ?>"
                                            style="display: none;" />
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label for="" style="font-weight:bold;color: black;font-size: 14px;">Category Name
                                           <span style="color:red;font-size: 12px;">  *</span></label>
                                        <input type="text" name="category" id="category" class="form-control"
                                            placeholder="Enter Category Name" required />
                                    </div>
                                    
                              
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----Add new party name modal popup end--->



  <!----Add new verity name   start---->
    <div class="col-lg-6">
        <div class="mt-4">
            <!-- staticBackdrop Modal example -->
            <div id="sample">
                <div class="modal fade" id="addVariety" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:darkseagreen;">
                                <h5 class="modal-title w-100 text-center" id="exampleModalLabel" style="color: white;">
                                    New Sub Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form data-toggle="validator" role="form" autocomplete="off" method="POST"
                                autocomplete="off" id="saveVariety">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="" style="font-weight:bold;color: black;font-size: 14px;">Category
                                                Name <span style="font-size: 22px;color: red;"></span></label>
                                            <select name="category" class="form-control" required="" id="category">
                                                <option value="">-- Please Select --</option>
                                                <?php
                                        $query = mysqli_query($con, "SELECT * FROM categorylist  GROUP by category");
                                        while ($row=mysqli_fetch_array($query)) 
                                        {
                                            $id = $row['id'];
                                            $category = $row['category'];
                                            ?>
                                                <option value="<?php echo $category;?>"><?php echo $category;?></option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="" style="font-weight:bold;color: black;font-size: 14px;">Sub Category
                                                Name <span style="font-size: 22px;color: red;"></span></label>
                                            <input type="text" name="subcategory" id="subcategory" class="form-control"
                                                placeholder="Enter Sub Category" required />
                                        </div>
                                       
                                       
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-----Add new verity name end------>




    <!----Add new verity name   start---->
    <div class="col-lg-6">
        <div class="mt-4">
            <!-- staticBackdrop Modal example -->
            <div id="sample11">
                <div class="modal fade" id="addBrand" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:darkseagreen;">
                                <h5 class="modal-title w-100 text-center" id="exampleModalLabel" style="color: white;">
                                    New Brand</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form data-toggle="validator" role="form" autocomplete="off" method="POST"
                                autocomplete="off" id="saveBrand">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="" style="font-weight:bold;color: black;font-size: 14px;">Category
                                                Name <span style="font-size: 22px;color: red;"></span></label>
                                            <select name="category" class="form-control" required="" id="category">
                                                <option value="">-- Please Select --</option>
                                                <?php
                                        $query = mysqli_query($con, "SELECT * FROM categorylist  GROUP by category");
                                        while ($row=mysqli_fetch_array($query)) 
                                        {
                                            $id = $row['id'];
                                            $category = $row['category'];
                                            ?>
                                                <option value="<?php echo $category;?>"><?php echo $category;?></option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="" style="font-weight:bold;color: black;font-size: 14px;">Sub Category
                                                Name <span style="font-size: 22px;color: red;"></span></label>
                                            <select name="subcategory" class="form-control" required="" id="subcategory">
                                                <option value="">-- Please Select --</option>
                                                <?php
                                        $query = mysqli_query($con, "SELECT * FROM subcategorylist  GROUP by subcategory");
                                        while ($row=mysqli_fetch_array($query)) 
                                        {
                                            $id = $row['id'];
                                            $subcategory = $row['subcategory'];
                                            ?>
                                                <option value="<?php echo $subcategory;?>"><?php echo $subcategory;?></option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                        </div>
                                       

                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="" style="font-weight:bold;color: black;font-size: 14px;">Brand
                                                Name <span style="font-size: 22px;color: red;"></span></label>
                                            <input type="text" name="brand" id="brand" class="form-control" placeholder="Enter Brand Name">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-----Add new verity name end------>





    <!----Add new product name   start---->
    <div class="col-lg-6">
        <div class="mt-4">
            <!-- staticBackdrop Modal example -->
            <div id="sample11">
                <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background:darkseagreen;">
                                <h5 class="modal-title w-100 text-center" id="exampleModalLabel" style="color: white;">
                                    New Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form data-toggle="validator" role="form" autocomplete="off" method="POST"
                                autocomplete="off" id="saveProduct">
                                <div class="modal-body">
                                    <div class="row">
                                         <input type="hidden" name="date" id="date" class="form-control" value="<?php echo $date;?>" required>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="" style="font-weight:bold;color: black;font-size: 14px;">Category
                                                Name <span style="font-size: 22px;color: red;"></span></label>
                                            <select name="category" class="form-control" required="" id="category">
                                                <option value="">-- Please Select --</option>
                                                <?php
                                        $query = mysqli_query($con, "SELECT * FROM categorylist  GROUP by category");
                                        while ($row=mysqli_fetch_array($query)) 
                                        {
                                            $id = $row['id'];
                                            $category = $row['category'];
                                            ?>
                                                <option value="<?php echo $category;?>"><?php echo $category;?></option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="" style="font-weight:bold;color: black;font-size: 14px;">Sub Category
                                                Name <span style="font-size: 22px;color: red;"></span></label>
                                            <select name="subcategory" class="form-control" required="" id="subcategory">
                                                <option value="">-- Please Select --</option>
                                                <?php
                                        $query = mysqli_query($con, "SELECT * FROM subcategorylist  GROUP by subcategory");
                                        while ($row=mysqli_fetch_array($query)) 
                                        {
                                            $id = $row['id'];
                                            $subcategory = $row['subcategory'];
                                            ?>
                                                <option value="<?php echo $subcategory;?>"><?php echo $subcategory;?></option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                        </div>
                                       

                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="" style="font-weight:bold;color: black;font-size: 14px;">Brand
                                                Name <span style="font-size: 22px;color: red;"></span></label>
                                           <select name="brand" class="form-control" required="" id="brand">
                                                <option value="">-- Please Select --</option>
                                                <?php
                                        $query = mysqli_query($con, "SELECT * FROM brandlist  GROUP by brand");
                                        while ($row=mysqli_fetch_array($query)) 
                                        {
                                            $id = $row['id'];
                                            $brand = $row['brand'];
                                            ?>
                                                <option value="<?php echo $brand;?>"><?php echo $brand;?></option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                        </div>

                                           <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="" style="font-weight:bold;color: black;font-size: 14px;">Product
                                                Name <span style="font-size: 22px;color: red;"></span></label>
                                            <input type="text" name="pname" id="pname" class="form-control" placeholder="Enter Product Name" required>
                                        </div>

                                         <div class="col-12 col-md-6 col-sm-6 col-xs-2" >
                                         <div class="form-group">
                                           <label for="" style="color:black;font-weight: bold;">Prod.Qty</label>
                                           <input type="text" name="pqty" id="pqty" class="form-control" placeholder="Qty" required>
                                       </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-6 col-xs-2" >
                                         <div class="form-group">
                                           <label for="" style="color:black;font-weight: bold;">Prod.Mrp</label>
                                           <input type="text" name="mrp" id="mrp" class="form-control" placeholder="Mrp" required>
                                       </div>
                                    </div>
                                       
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-----Add new product name end------>



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

        


 <!-----Add new party name start---->
    <script type="text/javascript">
    //insert rg1stock in database start
    $(document).on('submit', '#saveParty', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("save_newParty", true);
        $.ajax({
            type: "POST",
            url: "insertNewCategory.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);
                } else if (res.status == 200) {
                    $('#errorMessageUpdate').addClass('d-none');
                    alertify.set('notifier', 'delay', 2);
                    alertify.set('notifier', 'position', 'top-left');
                    alertify.success(res.message);

                    $('#addParty').modal('hide');
                    $('#saveParty')[0].reset();
                    $('#sample').load(location.href + " #sample");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });
    });
    </script>



    <!-----Add new varity name start---->
    <script type="text/javascript">
    //insert rg1stock in database start
    $(document).on('submit', '#saveVariety', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("save_newVariety", true);
        $.ajax({
            type: "POST",
            url: "insertNewSubCategory.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);
                } else if (res.status == 200) {
                    $('#errorMessageUpdate').addClass('d-none');
                    alertify.set('notifier', 'delay', 2);
                    alertify.set('notifier', 'position', 'top-left');
                    alertify.success(res.message);

                    $('#addVariety').modal('hide');
                    $('#saveVariety')[0].reset();
                    $('#sample1').load(location.href + " #sample1");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });
    });
    </script>
    <!-----Add new variety name end---->



     <!-----Add new brand name start---->
    <script type="text/javascript">
    //insert rg1stock in database start
    $(document).on('submit', '#saveBrand', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("save_newBrand", true);
        $.ajax({
            type: "POST",
            url: "insertNewBrandName.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);
                } else if (res.status == 200) {
                    $('#errorMessageUpdate').addClass('d-none');
                    alertify.set('notifier', 'delay', 2);
                    alertify.set('notifier', 'position', 'top-left');
                    alertify.success(res.message);

                    $('#addBrand').modal('hide');
                    $('#saveBrand')[0].reset();
                    $('#sample11111111').load(location.href + " #sample11111111");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });
    });
    </script>
    <!-----Add new brand name end---->



     <!-----Add new product name start---->
    <script type="text/javascript">
    //insert rg1stock in database start
    $(document).on('submit', '#saveProduct', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("save_newProduct", true);
        $.ajax({
            type: "POST",
            url: "insertNewProductName.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);
                } else if (res.status == 200) {
                    $('#errorMessageUpdate').addClass('d-none');
                    alertify.set('notifier', 'delay', 2);
                    alertify.set('notifier', 'position', 'top-left');
                    alertify.success(res.message);

                    $('#addProduct').modal('hide');
                    $('#saveProduct')[0].reset();
                    $('#sample1111').load(location.href + " #sample1111");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });
    });
    </script>
    <!-----Add new product name end---->






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
                url: 'get_productInformation.php',
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
                url: 'get_productInformation.php',
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
                url: 'get_productInformation.php',
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
                url: 'get_productInformation.php',
                method: 'GET',
                data: {type: 'pname', brand: brand},
                success: function(response) {
                    $('#pname').html('<option value="">Select Product</option>' + response);
                }
            });
        }
    </script>
    </body>


</html>