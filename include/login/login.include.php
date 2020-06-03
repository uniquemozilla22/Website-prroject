

<!-- LOGIN -->
<?php 

include("../connection.php");


if(isset($_POST['login'])){
$user = $_POST['username'];
$pass = $_POST['pass'];
$type= $_POST['tradertype'];

$sql_login = "SELECT * FROM USERA WHERE USERNAME='$user' OR USER_EMAIL ='$user'"; 

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
	$user_status =$row['USER_STATUS'];

	
	$verified_password= password_verify($pass,$password);
	echo $verified_password;

	if ($user_status=="verified")
	{
		
	if ($verified_password==true && $type=="customer")
	{
		header("Location: ../../index.php?loginsucess=1");

	}else if ($verified_password==true && $type=="trader"){
	
		session_start();
		$_SESSION['admin_name']=$username;
		$_SESSION['admin_type']=$type;
		header("Location: ../../trader_area/index.php?dashboard");
	}

	else if($verified_password==false){
		header("Location: ../../login.php?onlypasswordwrong=1");

	}	  
	else {

		header("Location: ../../login.php?emailpasswordwrong=1");
	}

	}
	else{
		
		?>
		<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP VERification</title>
    <link rel="stylesheet" href="otp.css">
</head>
<body>
    <div class="prompt">
        Enter the code generated on your mobile device below to log in!
    </div>
    
    <form method="post" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off" action="verify_customer.php">
        <input type="text" id="digit-1" name="digit" />
		<button type="submit" name="otpsubmit">Submit OTP</button>
    </form>

    <script src="otp.js"></script>
</body>
</html>


	<?php 
}
}
else{
	header("location: ../../login.php?invalidemail=1");
}
}

?> 


		

