<!-- Start My Account Area -->
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
										<label>Your Address</label>
										<label>Address 1 <span>*</span></label>
										<input type="text" name="address1" required>
										<label>Address 2</label>
										<input type="text" name="address2">
									</div>
									<div class="input__box">
										<label>Phone Number<span>*</span></label>
										<input type="number" name="number" required>
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

		<?php
		if(isset($_POST['register'])){
			include("include/connection.php");
			$username=$_POST["name"];
			$email=$_POST["email"];
			$address1=$_POST["address1"];
			$address2=$_POST["address2"];
			$phone=$_POST["number"];
			$password=$_POST["password"];
			$confirm_password=$_POST["password1"];

		if(empty($username) ||empty($email) ||empty($address1) ||empty($address2) ||empty($phone) ||empty($password) ||empty($confirm_password)){
			//header("Location: ../login.php?error=emptyfield&name=".$username."&email=".$email."&address1=".$address1."&address2=".$address2."&number=".$phone."&password=".$password."password1=".$confirm_password);
			exit();
		}

		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../login.php?error=invaidemailname");
			exit();
		}

		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("location: ../login.php?error=invalidemail&name=".$username);		}

		}
		
		elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../login.php?error=invaidname&email=".$email);
			exit();
		}

		elseif ($password==$confirm_password) {
			header("Location: ../login.php?error=passwordcheckname=".$username."&email".$email);
		}

		else
