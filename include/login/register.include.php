<!-- Start My Account Area -->
<?php
include("../connection.php");

if(isset($_POST['register'])){
	$username=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$password=$_POST['password'];
	$confirm_password=$_POST['password1'];
	$constumer_type = $_POST['customertype'];
	

	// $password=password_hash($password, PASSWORD_BCRYPT);
	// $confirm_password=password_hash($confirm_password, PASSWORD_BCRYPT);


	// password for the backend = sabdeeka123

	$emailquery="Select * from usera where email='$email' ";
	$equery=oci_parse($conn,$emailquery);
	

	$emailcount=oci_num_rows($equery);

	if($emailcount>0){
		echo "<script> alert('email already exists')</script>";
	}else{
		if($password === $confirm_password){

			//sanitize form data
			$username=$myoci->real_escape_string($username);
			$email=$myoci->real_escape_string($email);
			$address=$myoci->real_escape_string($address);
			$contact=$myoci->real_escape_string($contact);
			$password=$myoci->real_escape_string($password);
			$confirm_password=$myoci->real_escape_string($confirm_password);
			$customer_type=$myoci->real_escape_string($customertype);

			$confirm_password=password_hash($confirm_password, PASSWORD_DEFAULT);
			$insertquery="INSERT INTO USERA (USERNAME, USER_PASSWORD, USER_PHONE, USER_ADDRESS, USER_EMAIL,USER_TYPE ) VALUES('$username','$confirm_password','$contact','$address','$email','$constumer_type')";
			$query=oci_parse($conn,$insertquery);
			oci_execute($query); 

		}else{
			echo "Password are not matching";
		}
	}
}
?>