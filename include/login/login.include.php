

<!-- LOGIN -->
<?php 

include("../connection.php");

if(isset($_POST['login'])){
$user = $_POST['username'];
$pass = $_POST['pass'];

$sql_login = "SELECT * FROM USERA WHERE USERNAME='$user'"; 

$login_stmt = oci_parse($conn, $sql_login);

if(!$login_stmt)
{
    echo "An error occurred in parsing the sql string.\n"; 
    exit; 
}

oci_execute($login_stmt);
echo "hello";

while (($row= oci_fetch_array($login_stmt))==true)
{
	$username = $row['USERNAME'];
	$password = $row ['USER_PASSWORD'];

	$verified_password= password_verify($pass,$password);
	echo $verified_password;

	if ($verified_password==true )
	{
		header("Location: ../index.php?sucessmessage=loginsucess");
	}

	else if($verified_password==false){
		echo "Password invalid";

	}
	else {
		echo "Login Credentials are wrong";
	}
}


}

?> 


		

