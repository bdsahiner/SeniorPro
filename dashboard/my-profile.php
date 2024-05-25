<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

include_once "../model/functions.php";

if (isset($_SESSION['user']) || isset($_SESSION['employer'])) {

	?>
	<!DOCTYPE html>

	<head>

		<!-- Basic Page Needs
================================================== -->
		<title>Blue Collar Insight</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- CSS
================================================== -->
		<link rel="stylesheet" href="../css/styles.css">
		<link rel="stylesheet" href="../css/colors/main.css" id="colors">

	</head>

	<body>

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Header Container
================================================== -->

			<?php include_once "header.php"; ?>

			<div class="clearfix"></div>
			<!-- Header Container / End -->


			<!-- Dashboard -->
			<div id="dashboard">

				<!-- Navigation
	================================================== -->

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

				<div class="dashboard-nav">
					<?php include_once "nav.php"; ?>
				</div>
				<!-- Navigation / End -->


				<!-- Content
	================================================== -->
				<div class="dashboard-content">

					<!-- Titlebar -->
					<div id="titlebar">
						<div class="row">
							<div class="col-md-12">
								<h2>My Profile</h2>
								<!-- Breadcrumbs -->
								<nav id="breadcrumbs">
									<ul>
										<li><a href="../">Home</a></li>
										<li><a href="../dashboard">Dashboard</a></li>
										<li>My Profile</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">

						<!-- Profile -->
						<form action="" method="POST">
							<div class="col-lg-6 col-md-12">
								<div class="dashboard-list-box margin-top-0">
									<h4 class="gray">Profile Details</h4>
									<div class="dashboard-list-box-static">

										<!-- Details -->
										<div class="my-profile">

											<label>Full Name</label>
											<input value="<?php foreach ($userName as $uData) {
												echo $uData['fullName'];
											} ?>" type="text" name="userProfileName">

											<label>Phone Number</label>
											<input value="<?php foreach ($userName as $uData) {
												echo $uData['phoneNumber'];
											} ?>" type="number" name="userProfilePhone">

											<label>Email</label>
											<input value="<?php foreach ($userName as $uData) {
												echo $uData['email'];
											} ?>" type="email" name="userProfileEmail">

										</div>

										<button type="submit" name="userChanges" class="button margin-top-15">Save
											Changes</button>

									</div>
								</div>
							</div>
						</form>
						<!-- Change Password -->
						<div class="col-lg-6 col-md-12">
							<div class="dashboard-list-box margin-top-0">
								<h4 class="gray">Change Password</h4>
								<div class="dashboard-list-box-static">

									<!-- Change Password -->
									<form method="POST" action="">
										<!-- Change Password -->
										<div class="my-profile">
											<label class="margin-top-0">Current Password</label>
											<input type="password" name="currentPassword" id="currentPassword">

											<label>New Password</label>
											<input type="password" name="newPassword" id="newPassword">

											<label>Confirm New Password</label>
											<input type="password" name="confirmPassword" id="confirmPassword">
											<span id="passwordError" style="color: red;"></span><br>

											<button type="submit" name="changePassword" class="button margin-top-15">Change
												Password</button>
										</div>
									</form>

								</div>
							</div>
						</div>


						<!-- Copyrights -->
						<div class="col-md-12">
							<div class="copyrights">© 2024 Blue Collar Insight. All Rights Reserved.</div>
						</div>

					</div>

				</div>
				<!-- Content / End -->


			</div>
			<!-- Dashboard / End -->


		</div>
		<!-- Wrapper / End -->

		<script>
			document.addEventListener("DOMContentLoaded", function () {
				var passwordInput = document.getElementById('newPassword');
				var confirmPasswordInput = document.getElementById('confirmPassword');
				var passwordError = document.getElementById('passwordError');
				var submitButton = document.getElementById('submitButton');
				var confirmFocused = false;

				confirmPasswordInput.addEventListener('focus', function () {
					confirmFocused = true;
				});

				function validatePassword() {
					var password = passwordInput.value;
					var confirmPassword = confirmPasswordInput.value;

					if (confirmFocused) {
						if (password === confirmPassword) {
							passwordError.textContent = ''; // Clear error message if passwords match
							submitButton.disabled = false; // Enable the submit button
						} else {
							passwordError.textContent = "Passwords don't match"; // Display error message if passwords don't match
							submitButton.disabled = true; // Disable the submit button
						}
					}
				}

				// Attach event listener to the second password input field to trigger validation on input events
				confirmPasswordInput.addEventListener('input', validatePassword);
			});
		</script>
		<!-- Scripts
================================================== -->
		<script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
		<script type="text/javascript" src="scripts/mmenu.min.js"></script>
		<script type="text/javascript" src="scripts/chosen.min.js"></script>
		<script type="text/javascript" src="scripts/slick.min.js"></script>
		<script type="text/javascript" src="scripts/rangeslider.min.js"></script>
		<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
		<script type="text/javascript" src="scripts/waypoints.min.js"></script>
		<script type="text/javascript" src="scripts/counterup.min.js"></script>
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<script type="text/javascript" src="scripts/tooltips.min.js"></script>
		<script type="text/javascript" src="scripts/custom.js"></script>


	</body>

	</html>

<?php } else {
	echo '<script>alert("Please login first!");</script>';
	header("Location: ../");
	exit();
	}?>