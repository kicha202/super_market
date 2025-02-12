<!doctype html>
<html lang="en">
<head>
    
    <meta charset="utf-8" />
    <title>THIRUMURUGAN SPINNERS</title>
    <?php include 'style.php';?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body onload="getTime()">
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div class="container">
    <div id="showtime"></div>
    <div class="col-lg-4 col-lg-offset-4">
      <div class="lock-screen">
        <h2><a data-toggle="modal" href="#myModal"><i class="fa fa-lock"></i></a></h2>
        <p>UNLOCK</p>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <p class="centered"><img class="img-circle" width="80" src="assets/images/logo.png"></p>
                <input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer centered">
                <button data-dismiss="modal" class="btn btn-theme04" type="button">Cancel</button>
                <button class="btn btn-theme03" type="button">Login</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </div>
      <!-- /lock-screen -->
    </div>
    <!-- /col-lg-4 -->
  </div>
  <!-- /container -->

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery/jquery.min.js"></script>
  <script src="assets/js/jquery/jquery.backstretch.min.js"></script>
  <!--BACKSTRETCH-->

  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script>
    $.backstretch("assets/images/login-bg.jpg", {
      speed: 500
    });
  </script>


  <script>
    function getTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      // add a zero in front of numbers<10
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
      t = setTimeout(function() {
        getTime()
      }, 500);
    }
    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
  </script>
  
</body>
</html>
