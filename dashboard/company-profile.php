<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../model/functions.php";

if (isset($_SESSION['employer'])) { ?>

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

                <?php include_once "nav.php"; ?>
                <!-- Navigation / End -->


                <!-- Content
================================================== -->
                <div class="dashboard-content">

                    <!-- Titlebar -->
                    <div id="titlebar">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Company Profile</h2>
                                <!-- Breadcrumbs -->
                                <nav id="breadcrumbs">
                                    <ul>
                                        <li><a href="../">Home</a></li>
                                        <li><a href="../dashboard">Dashboard</a></li>
                                        <li>Company Profile</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <form action="" method="POST">

                            <!-- Profile -->
                            <div class="col-lg-6 col-md-6">
                                <div class="dashboard-list-box margin-top-0">
                                    <h4 class="gray">Company Details</h4>
                                    <div class="dashboard-list-box-static">

                                        <!-- Details -->
                                        <div class="my-profile">

                                            <?php if (!empty($compDescription)) { ?>

                                                <label>Company Name</label>
                                                <input value="<?php foreach ($companyName as $comp) {
                                                    echo $comp['companyName'];
                                                } ?> " type="text" name="companyName" disabled>

                                                <label>Tax Number</label>
                                                <input value="<?php foreach ($companyName as $comp) {
                                                    echo $comp['taxNumber'];
                                                } ?>" type="number" name="taxNo" disabled>

                                                <label>Head Quarters</label>
                                                <input value="<?php foreach ($companyName as $comp) {
                                                    echo $comp['headQuarters'];
                                                } ?>" type="text" name="headQuarters" disabled>

                                                <label>Company Description</label>
                                                <textarea name="companyDescription"><?php foreach ($companyName as $comp) {
                                                    echo $comp['companyDescription'];
                                                } ?></textarea>

                                                <label>Sector</label>
                                                <input value="<?php foreach ($companyName as $comp) {
                                                    echo $comp['sector'];
                                                } ?>" type="text" name="sector" disabled>

                                                <label>Employee Count</label>
                                                <input value="<?php foreach ($companyName as $comp) {
                                                    echo $comp['employeeCount'];
                                                } ?>" type="number" name="employeeCount">

                                                <label>Date of Establishment</label>
                                                <input value="<?php foreach ($companyName as $comp) {
                                                    echo $comp['establishDate'];
                                                } ?>" type="date" name="establishDate" disabled>

                                                <label>Website</label>
                                                <input value="<?php foreach ($companyName as $comp) {
                                                    echo $comp['website'];
                                                } ?>" type="text" name="website">

                                            <?php } else { ?>

                                                <label>Company Name</label>
                                                <input value="<?php foreach ($companyName as $comp) {
                                                    echo $comp['companyName'];
                                                } ?>" type="text" name="companyName" disabled>

                                                <label>Tax Number</label>
                                                <input value="<?php foreach ($companyName as $comp) {
                                                    echo $comp['taxNumber'];
                                                } ?>" type="text" name="taxNumber" disabled>

                                                <label>Head Quarters</label>
                                                <select name="headQuarters" class="chosen-select-no-single">
                                                    <option disabled selected>Select Province</option>
                                                    <?php foreach ($provinces as $pName) { ?>
                                                        <option value="<?php echo $pName['province']; ?>">
                                                            <?php echo $pName['province']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                                <label>Company Description</label>
                                                <textarea name="companyDescription" required></textarea>

                                                <label>Main Sector</label>
                                                <select name="sector" class="chosen-select-no-single">
                                                    <option disabled selected>Select Sector</option>
                                                    <?php foreach ($sectors as $sName) { ?>
                                                        <option value="<?php echo $sName['sector']; ?>">
                                                            <?php echo $sName['sector']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                                <label>Employee Count</label>
                                                <input type="number" name="employeeCount" required>

                                                <label>Date of Establishment</label>
                                                <input type="date" name="establishDate" required>

                                                <label>Website</label>
                                                <input type="text" name="website" required>

                                            <?php } ?>

                                        </div>

                                        <button type="submit" name="submitChanges" class="button margin-top-15">Save
                                            Changes</button>

                                    </div>
                                </div>
                            </div>

                        </form>


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

    <?php
} else {
    echo '<script>alert("Please login first!");history.go(-1);</script>';
    header("Location: ../");
    exit();
} ?>