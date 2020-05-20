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

	$password=password_hash($password, PASSWORD_BCRYPT);
	$confirm_password=password_hash($confirm_password, PASSWORD_BCRYPT);

	$emailquery="Select * from usera where email='$email' ";
	$query=oci_parse($connection,$emailquery);

	$emailcount=mysqli_num_rows($query);

	if($emailcount>0){
		echo "email already exists";
	}else{
		if($password === $confirm_password){
			$insertquery="INSERT INTO USERA (USERNAME, USER_PASSWORD, USER_PHONE, USER_ADDRESS, USER_EMAIL ) VALUES(')";


		}else{
			echo "Password are not matching";
		}
	}
}
?>

 <?php
        session_start();
        global $conn;
        include("include/connection.php");
        if(isset($_POST['login'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $s = oci_parse($conn, "select 

username,password from usera where username='$user' 

and password='$pass'");       
            oci_execute($s);
            $row = oci_fetch_all($s, $res);
            if($row){
                    $_SESSION['user']=$user;
                    $_SESSION['time_start_login'] = time

();
                    header("location: dashboard.php");
            }else{

                echo "wrong password or username";
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
										<input type="text" name="pwd" required>
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

		

