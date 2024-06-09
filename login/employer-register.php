<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['admin'])) {

	header("location: ../dashboard/admin");

}

if (isset($_SESSION['employer'])) {

	header("location: ../dashboard/employer");

}

if (isset($_SESSION['user'])) {

	header("location: ../dashboard/user");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Blue Collar Insight | Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/employer-register.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="../model/employer-register-model.php" method="POST">
					<span class="login100-form-title p-b-49">
						Employer Registration
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Full Name is required">
						<span class="label-input100">Full Name</span>
<<<<<<< HEAD
						<input class="input100" type="text" name="userName" placeholder="Type your name" required>
=======
						<input class="input100" type="text" name="userName" placeholder="Type your name">
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Phone Number is required">
						<span class="label-input100">Phone Number</span>
<<<<<<< HEAD
						<input class="input100" type="number" name="phoneNumber" placeholder="Please write only 10 digits (ex: 5554443322)"
							id="phoneNumber" oninput="this.value = this.value.slice(0, 10);" required>
=======
						<input class="input100" type="number" name="phoneNumber" placeholder="Type your phone number">
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
						<span class="focus-input100" data-symbol="&#xf2b6;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Government tax ID is required">
						<span class="label-input100">Company Name</span>
						<input class="input100" type="text" name="companyName"
<<<<<<< HEAD
							placeholder="Type your phone company name" required>
=======
							placeholder="Type your phone company name">
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
						<span class="focus-input100" data-symbol="&#xf203;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Government tax ID is required">
						<span class="label-input100">Government Tax ID</span>
<<<<<<< HEAD
						<input class="input100" type="number" name="taxID" placeholder="Type your phone government tax ID"
							id="taxID" oninput="this.value = this.value.slice(0, 10);" required>
=======
						<input class="input100" type="text" name="taxID"
							placeholder="Type your phone government tax ID">
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
						<span class="focus-input100" data-symbol="&#xf150;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
						<span class="label-input100">Email</span>
<<<<<<< HEAD
						<input class="input100" type="email" name="userEmail" placeholder="Type your email" required>
=======
						<input class="input100" type="email" name="userEmail" placeholder="Type your email">
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
						<span class="focus-input100" data-symbol="&#xf200;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
<<<<<<< HEAD
						<input class="input100" type="password" name="userPw" placeholder="Type your password" minlength="8" required>
=======
						<input class="input100" type="password" name="userPw" placeholder="Type your password">
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
						<a href="login">
							Already registered?
						</a>
					</div>


					<div class="container-login100-form-btn" style="padding-top: 15px;">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login" type="submit">
								Submit
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<<<<<<< HEAD
=======

>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>