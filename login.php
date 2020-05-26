<?php
include("include/connection.php");
include("include/header.include.php");
include("include/banner.include.php");
?>

<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Login</h3>
							<form action="include/login/login.include.php" method="POST" enctype="multipart/form-data">
								<div class="account__form">
									<div class="input__box">
										<label>Username or email address <span>*</span></label>
										<input type="text" name="username" required>
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="text" name="pass" required>
									</div>
									<div class="input__box">
										<label>Select the Type<span>*</span></label>
										<select name='tradertype'>  
                    					<option value='customer'>Customer</option>
                    					<option value='trader'>Trader</option>
                						</select>
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
							<form action="include/login/register.include.php" method="POST" enctype="multipart/form-data">
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


<?php
include("include/footer.include.php");