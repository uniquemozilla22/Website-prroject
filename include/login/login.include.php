<!-- Start My Account Area -->
<?php
include("include/connection.php");

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
			$confirm_password=password_hash($confirm_password, PASSWORD_BCRYPT);
			$insertquery="INSERT INTO USERA (USER_ID,USERNAME, USER_PASSWORD, USER_PHONE, USER_ADDRESS, USER_EMAIL,USER_TYPE ) VALUES(3,'$username','$confirm_password','$contact','$address','$email','$constumer_type')";
			$query=oci_parse($conn,$insertquery);
			oci_execute($query); 
			
			echo 'you are registered';

		}else{
			echo "Password are not matching";
		}
	}
}
?>

<!-- LOGIN -->
<?php 

if(isset($_POST['login'])){
    
    $username = $_POST['username'];
    
	$password = $_POST['pass'];

	
	
    
	$select_customer = "select USERNAME ,USER_PASSWORD from USERA where USERNAME='$username' AND USER_PASSWORD='$password'";
    
    $run_customer = oci_parse($conn,$select_customer);

	oci_execute($run_customer);

	echo $run_customer;
	while($row = oci_fetch_array($run_customer)){
		$pass= $row['USER_PASSWORD'];
		$uname= $row['USERNAME'];

		echo 'this is working';

		
		$verify = password_verify($password,$pass);

		if ($verify== true && $uname == $username){

			echo "Congratulations Your account is correct and you are logged in.";
		}
		else if ($verify== false && $uname == $username){
			echo 'Wrong Password entered';
		}
		else{
			echo'invalid credentials';
		}
	}    
  
    
}

?>
<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Login</h3>
							<form action="#" method="POST">
								<div class="account__form">
									<div class="input__box">
										<label>Username or email address <span>*</span></label>
										<input type="text" name="username" required>
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="text" name="pass" required>
									</div>
									<div class="form__btn">
										<button type="submit" name="login">Login</button>
										<label class="label-for-checkbox">
											<input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
											<span>Remember me</span>
										</label>
									</div>
									<a class="forget_pass" href="#">Lost your password?</a>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Register</h3>
							<form action="#" method="POST" enctype="multipart/form-data">
								<div class="account__form">
								<div class="input__box">
										<label>Your Name<span>*</span></label>
										<input type="text" name="name" required>
									</div>
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="email" name="email" required>
									</div>
									<div class="input__box">
										<label>Address <span>*</span></label>
										<input type="text" name="address" required>
									</div>
									<div class="input__box">
										<label>Phone Number<span>*</span></label>
										<input type="number" name="contact" required>
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" name="password" required>
									</div>
									<div class="input__box">
										<label>Confirm Password<span>*</span></label>
										<input type="password" name="password1" required>
									</div>
									<div class="input__box">
										<label>Select the Type<span>*</span></label>
										<select name='customertype'>  
                    					<option value='customer'>Customer</option>
                    					<option value='trader'>Trader</option>
                						</select>
									</div>
									
									<div class="form__btn">
										<button type="submit" name="register">Register</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->

		

