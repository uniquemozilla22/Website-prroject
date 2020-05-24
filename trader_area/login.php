<?php 

    session_start();
    include("includes/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taste Best</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body style="background-image: url('image/messy-pizza-on-a-black-table_bg2.jpg'); height: 100%;
background-position: center;
background-repeat: no-repeat;
background-size: cover">
  
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Trder Login </h2>
           
           <input type="text" class="form-control" placeholder="Email Address" name="trader_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="trader_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="trader_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->
    
</body>
</html>


<?php 

    if(isset($_POST['trader_login'])){
        
        $admin_email = $_POST['trader_email'];

        $admin_pass = $_POST['trader_pass'];
        
        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        
        $run_admin = oci_parse($conn,$get_admin);

        oci_execute($run_admin);
        
        $count = oci_fetch($run_admin);
        
        if($count==1){
            
            $_SESSION['admin_email']=$admin_email;
            
            echo "<script>alert('Logged in. Welcome Back')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }else{
            
            echo "<script>alert('Email or Password is Wrong !')</script>";
            
        }
        
    }

?>