

<!-- LOGIN -->
<?php 

include("../connection.php");

if(isset($_POST['login'])){
$user = $_POST['username'];
$pass = $_POST['pass'];
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
		echo "<script>alert('Welcome Back! You have been logged in.')</script>";
		echo "hello";
		//header("Location: ../trader_area/index.php");
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


		

