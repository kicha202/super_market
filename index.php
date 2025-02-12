

<?php
include "database.php";
session_start();
?>

<!DOCTYPE html>
<html>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">
    <title>SUPER MARKET</title>

     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        .main-content{
    width: 50%;
    border-radius: 20px;
    box-shadow: 0 5px 5px rgba(0,0,0,.4);
    margin: 5em auto;
    display: flex;
}
.company__info{
    background-color: #008080;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #fff;
}
.fa-android{
    font-size:3em;
}
@media screen and (max-width: 640px) {
    .main-content{width: 90%;}
    .company__info{
        display: none;
    }
    .login_form{
        border-top-left-radius:20px;
        border-bottom-left-radius:20px;
    }
}
@media screen and (min-width: 642px) and (max-width:800px){
    .main-content{width: 70%;}
}
.row > h2{
    color:#008080;
}
.login_form{
    background-color: #fff;
    border-top-right-radius:20px;
    border-bottom-right-radius:20px;
    border-top:1px solid #ccc;
    border-right:1px solid #ccc;
}
form{
    padding: 0 2em;
}
.form__input{
    width: 100%;
    border:0px solid transparent;
    border-radius: 0;
    border-bottom: 1px solid #aaa;
    padding: 1em .5em .5em;
    padding-left: 2em;
    outline:none;
    margin:1.5em auto;
    transition: all .5s ease;
}
.form__input:focus{
    border-bottom-color: #008080;
    box-shadow: 0 0 5px rgba(0,80,80,.4); 
    border-radius: 4px;
}
.btn{
    transition: all .5s ease;
    width: 70%;
    border-radius: 30px;
    color:#008080;
    font-weight: 600;
    background-color: #fff;
    border: 1px solid #008080;
    margin-top: 1.5em;
    margin-bottom: 1em;
}
.btn:hover, .btn:focus{
    background-color: #008080;
    color:#fff;
}
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
                <span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
                <h4 class="company_title">Departmental Store</h4>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <div class="row">
                        <h2>Log In</h2>
                    </div>
                    <div class="row">

                        <?php
                 
                 if(isset($_POST['login'])){
                   $username=mysqli_real_escape_string($con,$_POST['username']);
                 
                   $password=mysqli_real_escape_string($con,$_POST['password']);
                   if(empty($username)&&empty($password)){
                      $error= 'Fileds are Mandatory';
                   }else{
                  
                    $result=mysqli_query($con,"SELECT * FROM login WHERE username='$username' AND password='$password' ");
                    $row=mysqli_fetch_assoc($result);
                    $count=mysqli_num_rows($result);
                    if($count==1){
                     $_SESSION['user1']=array(
                        'username'=>$row['username'],
                        'password'=>$row['password'],
                        'id'=>$row['id'],
                        'category'=>$row['category']
                     );
                     $category=$_SESSION['user1']['category'];
                    
                     switch($category){
                      case 'admin':
                      echo "<script>window.open('admin/dashboard.php','_self')</script>";
                      break;
                     
                   }
                }else{
                 $error='<p style="font-weight:bold;color:red;text-align:center;" class="alert">Invalid Login Credential</p>';
              }
           }
        }
        ?>

                                <?php if(isset($error)){ echo $error; }?>   
                        <form name="RegForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                            <div class="row">
                                <input type="text" name="username" id="username" class="form__input" placeholder="Username" required>
                            </div>
                            <div class="row">
                                <!-- <span class="fa fa-lock"></span> -->
                                <input type="password" name="password" id="password" class="form__input" placeholder="Password" required>
                            </div>
                            
                            <div class="row">
                                
                                <button type="submit" name="login" class="btn" title="Login Here">Login Here</button>
                            </div>
                        </form>
                    </div>
                <br>
                </div>
            </div>
        </div>
    </div>


    
<script type="text/javascript" rel="stylesheet"> 
   $('document').ready(function(){ 
      $(".alert").fadeOut(5000); 
   }); 
</script> 
    
</body>

<body>

</body>
</html>