<!doctype html>
<html lang="en">
<head>
        
        <title>ADMIN DASHBOARD</title>
        <?php include 'style.php';?>



        
    </head>
    <body data-sidebar-size="sm">
        <!-- Begin page -->
        <div id="layout-wrapper">
           <?php include 'header.php';?>

           <?php include 'sideMenu.php';?>

           
            <div class="main-content">

                <div class="page-content">
                     <div class="container">
<div class="modal fade" id="studentEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit RG1 Stock</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateStudent">
            <div class="modal-body">
                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                <input type="hidden" name="id" id="id" >
                <div class="mb-3">
                    <label for="">Date</label>
                    <input type="date" name="date" id="date" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Countname</label>
                    <input type="text" name="countname" id="countname" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Packing Production</label>
                    <input type="text" name="packingproduction" id="packingproduction" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Despatch</label>
                    <input type="text" name="despatch" id="despatch" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                               
                                <th>Class</th>
                                <th>Date of Join</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>27-02-2024</td>
                                <td>Ram</td>
                                <td>9965451878</td>
                                <td>demo@gmail.com</td>
                                
                                <td>Class 1</td>
                                <td>27-02-2024</td>
                                <td>45,000</td>
                                <td>Edit</td>
                            </tr>
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
                <!-- End Page-content -->


               <?php include 'footer.php';?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

                <?php include 'layoutSetting.php';?>

        <!-- JAVASCRIPT -->
        <?php include 'script.php';?>

    </body>


</html>