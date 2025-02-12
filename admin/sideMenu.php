 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.php" class="logo logo-dark">
            <span class="logo-sm">
                <!-- <img src="assets/images/logo-sm.png" alt="" height="22"> -->
                <h6 style="font-size:9px;position: relative;top: 30px;color:blue;width: 150px;font-weight: bold;right: 20px;">SUPER MARKET</h6>
            </span>
            <span class="logo-lg">
                 <h6 style="font-size:15px;position: relative;top: 20px;color:blue;font-weight: bold;">SUPER MARKET </h6>
            </span>
        </a>
        <a href="index.php" class="logo logo-light">
            <span class="logo-sm">
               <h6 style="font-size:7px;position: relative;top: 20px;color:blue;font-weight: bold;">SUPER MARKET</h6>
            </span>
            <span class="logo-lg">
               <h6 style="font-size:7px;position: relative;top: 20px;color:blue;font-weight: bold;">SUPER MARKET</h6>
            </span>
        </a>
    </div>
    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="dashboard.php" >
                        <i class="uil-list-ul"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
               <!--  <li>
                    <a href="dashboard.php" class="has-arrow waves-effect">
                        <i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i>
                        <span>24Hrs Prod Report</span>
                    </a>
                </li> -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-store"></i>
                        <span>Purchase</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="addstock.php">Add Purchased Stock</a></li>
                                    <li><a href="index.php">Sales Page</a></li>
                                    <li><a href="uploadexcelFile.php">Product  Excel files Upload</a></li>
                                    <li><a href="ProductList.php">List of Products</a></li>
                    </ul>
                </li>

              <!--   <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-envelope"></i>
                        <span>Monthly E.B Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">E.B Reading</a></li>
                        <li><a href="#">Genset Reading</a></li>
                        <li><a href="#">Hormonic Filter</a></li>
                        <li><a href="#">Humifog R.Hrs</a></li>
                        <li><a href="#">Tds</a></li>
                        <li><a href="#">R.O Plant Delivery</a></li>
                        <li><a href="#">R.O Plant Run Hrs</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-invoice"></i>
                        <span>Break Study Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Snap Report</a></li>
                        <li><a href="#">100 Rotor Breaks</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="uil-list-ul"></i>
                        <span>RG-1 KGS</span>
                    </a>
                </li> -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                       <i class="uil-envelope"></i>
                        <span>Sales Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="salesReport.php">Sales Reports</a></li>
                        <li><a href="salesChart.php">Sales Chart Reports</a></li>
                                   
                    </ul>
                </li>

                <li>
                    <a href="logout.php" >
                     <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i>
                     <span>Log-Out</span>
                 </a>
             </li>
         </ul>
     </div>
     <!-- Sidebar -->
 </div>
</div>
            <!-- Left Sidebar End -->