<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../model/functions.php";

if (isset($_SESSION['admin'])) {

    $conn = $dbh->prepare("SELECT * FROM users");
    $conn->execute();
    $fetch = $conn->fetchAll(PDO::FETCH_ASSOC);

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

                <?php include_once "nav.php"; ?>
                <!-- Navigation / End -->


                <!-- Content
================================================== -->
                <div class="dashboard-content">

                    <!-- Titlebar -->
                    <div id="titlebar">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Inform Employer</h2>
                                <!-- Breadcrumbs -->
                                <nav id="breadcrumbs">
                                    <ul>
                                        <li><a href="../">Home</a></li>
                                        <li><a href="../dashboard">Dashboard</a></li>
                                        <li>Inform Employer</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <form action="../model/inform-users-model.php" method="POST">

                            <!-- Profile -->
                            <div class="col-lg-12 col-md-12">
                                <div class="dashboard-list-box margin-top-0">
                                    <h4 class="gray">Contact Users by Email</h4>
                                    <div class="dashboard-list-box-static">

                                        <!-- Details -->
                                        <div class="my-profile">

                                            <select name="users" class="chosen-select-no-single">
                                                <option disabled selected>Select User</option>
                                                <?php foreach ($fetch as $f) { ?>
                                                    <option value="<?php echo $f['email']; ?>">
                                                        <?php echo $f['fullName']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>

                                            <label>Subject</label>
                                            <input type="text" name="subject" required>

                                            <label>Message</label>
                                            <textarea name="message" required></textarea>
                                        </div>

                                        <button type="submit" name="submitInform" class="button margin-top-15">Send</button>

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