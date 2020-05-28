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
<body style="background:background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(163,241,77,0.989233193277311) 0%, rgba(0,212,255,1) 100%);">
   
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Trader Login </h2>
           
           <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>

		   <select name='tradertype'>  
			<option value='customer'>Customer</option>
			<option value='trader'>Trader</option>
		   </select>						
								
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->
    
</body>
</html>
<!-- LOGIN -->
<?php 
 include("includes/connection.php");

if(isset($_POST['admin_login'])){
$user = $_POST['admin_email'];
$pass = $_POST['admin_pass'];
$type= $_POST['tradertype'];

$sql_login = "SELECT * FROM USERA WHERE USERNAME='$user'"; 

$login_stmt = oci_parse($conn, $sql_login);

if(!$login_stmt)
{
    echo "An error occurred in parsing the sql string.\n"; 
    exit; 
}

oci_execute($login_stmt);

if (($row= oci_fetch_array($login_stmt))==true)
{
	$username = $row['USERNAME'];
	$password = $row ['USER_PASSWORD'];

	$verified_password= password_verify($pass,$password);
	echo $verified_password;

	if ($verified_password==true && $type=="customer")
	{
		header("Location: ../index.php?sucessmessage=loginsucess");

	}else if ($verified_password==true && $type=="trader")
	{
		echo "hello";
		echo "<script>alert('Welcome Back! You have been logged in.')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}

	else if($verified_password==false){
		echo "invalid password";

	}	  
	else {
		echo "Login Credentials are wrong";
	}
	
}

}

?> 


		

