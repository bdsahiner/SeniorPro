<?php

if(isset($_SESSION['admin'])){

header("location: ../dashboard/admin");

} 

if(isset($_SESSION['employer'])){

header("location: ../dashboard/employer");

}

if(isset($_SESSION['user'])){

header("location: ../dashboard/user");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blue Collar Insight | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="../model/new-password-model.php" method="POST">
					<span class="login100-form-title p-b-49">
						Reset Password
					</span>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">New Password</span>
                        <input class="input100" type="password" name="userPw" id="userPw" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">New Password Again</span>
                        <input class="input100" type="password" name="userPwAgain" id="userPwAgain" placeholder="Type your password again">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        <span id="passwordError" style="color: red;"></span>
                    </div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="login">
							Back to login
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button id ="submitButton" class="login100-form-btn" name="login" type="submit">
								Submit
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var passwordInput = document.getElementById('userPw');
        var confirmPasswordInput = document.getElementById('userPwAgain');
        var passwordError = document.getElementById('passwordError');
        var submitButton = document.getElementById('submitButton');
        var confirmFocused = false;

        confirmPasswordInput.addEventListener('focus', function() {
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