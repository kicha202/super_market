<!doctype html>
<html lang="en">

<head>

    <title>Profile</title>
    <?php include 'style.php'; ?>




</head>

<body data-sidebar-size="sm">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include 'header.php'; ?>

        <?php include 'sideMenu.php'; ?>


        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <BR>

                    <div class="form-container">
                        <h1>Personal Information</h1>
                        <form action="">
                            <div class="input-img">
                                <label><strong> Image</strong></label>
                                    <input type="file" id="file" class="file-pos">
                            </div>
                            <div class="input-group">
                                <label><strong>First Name:</strong></label>
                                <input type="text" placeholder="Enter Your First Name" id="fname">
                            </div>

                            <div class="input-group">
                                <label><strong>Surame:</strong></label>
                                <input type="text" placeholder="Enter Your Last Name" id="lname">
                            </div>

                            <div class="input-group">
                                <label><strong>Date of Birth:</strong></label>
                                <input type="date" id="dob">
                            </div>

                            <div class="input-group">
                                <label><strong>E-Mail:</strong></label>
                                <input type="email" placeholder="Enter Your Email Id" id="email-id">
                            </div>

                            <div class="input-group">
                                <label><strong>Mobile:</strong></label>
                                <input type="tel" placeholder="Enter your mobile number" id="phone-no">
                            </div>

                            <div class="input-group">
                                <label><strong>Gender:</strong></label>
                                <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="gender" value="male"
                                    id="male">
                                <label for="male">Male</label>
                                <input type="radio" style="flex-basis: 0%; margin: 0 10px;" name="gender" value="female"
                                    id="female">
                                <label for="female">Female</label>
                            </div>

                            <div class="input-group">
                                <label><strong>Address:</strong></label>
                                <input type="text" placeholder="Enter Your Address" id="address">
                            </div>
                            
                            <div class="input-group">
                                <label><strong>Postal Code:</strong></label>
                                <input type="text" placeholder="Enter Your Postal Code" id="pcode">
                            </div>

                            <div class="input-group">
                                <label><strong>Country:</strong></label>
                                <select name="country" id="country-name">
                                    <option value="" selected="selected">Select Country</option>
                                    <option value="">Switzerland</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <label><strong>City:</strong></label>
                                <select name="state" id="state-name">
                                    <option value="" selected="selected">Please select country first</option>
                                    <option value="AG">Aargau</option>
                                    <option value="AI">Appenzell Innerrhoden</option>
                                    <option value="AR">Appenzell Ausserrhoden</option>
                                    <option value="BE">Bern</option>
                                    <option value="BL">Basel-Landschaft</option>
                                    <option value="BS">Basel-Stadt</option>
                                    <option value="FR">Fribourg</option>
                                    <option value="GE">Geneva</option>
                                    <option value="GL">Glarus</option>
                                    <option value="GR">Graubünden</option>
                                    <option value="JU">Jura</option>
                                    <option value="LU">Lucerne</option>
                                    <option value="NE">Neuchâtel</option>
                                    <option value="NW">Nidwalden</option>
                                    <option value="OW">Obwalden</option>
                                    <option value="SG">St. Gallen</option>
                                    <option value="SH">Schaffhausen</option>
                                    <option value="SO">Solothurn</option>
                                    <option value="SZ">Schwyz</option>
                                    <option value="TG">Thurgau</option>
                                    <option value="TI">Ticino</option>
                                    <option value="UR">Uri</option>
                                    <option value="VD">Vaud</option>
                                    <option value="VS">Valais</option>
                                    <option value="ZG">Zug</option>
                                    <option value="ZH">Zurich</option>
                                </select>
                            </div>
                            
                            <div class="input-group">
                                <label><strong>Hobbies:</strong></label>
                                <textarea rows="5" placeholder="Enter Your Hobbies" id="hobbies"></textarea>
                            </div>
                            
                            <button>Submit</button>

                        </form>











                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <?php include 'footer.php'; ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->






        <?php include 'layoutSetting.php'; ?>

        <!-- JAVASCRIPT -->
        <?php include 'script.php'; ?>

</body>


</html>