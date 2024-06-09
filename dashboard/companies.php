<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['admin'])) {

    include_once "../model/functions.php";

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
                                <h2>Companies</h2>
                                <!-- Breadcrumbs -->
                                <nav id="breadcrumbs">
                                    <ul>
                                        <li><a href="../">Home</a></li>
                                        <li><a href="../dashboard">Dashboard</a></li>
                                        <li>Companies</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Listings -->
                        <div class="col-lg-12 col-md-12">
                            <div class="dashboard-list-box margin-top-0">

                                <ul>
                                    <?php foreach ($companyData as $row) { ?>
                                        <li>
                                            <div class="list-box-listing">
                                                <div class="list-box-listing-img">
                                                    <a href="#">
                                                        <img src="../images/atilim-uni.jpg" alt="Company Logo">
                                                    </a>
                                                </div>
                                                <div class="list-box-listing-content">
                                                    <div class="inner">
                                                        <h3><a href="../company-details?id=<?php echo $row['id']; ?>"><b><?php echo $row['companyName']; ?></b>
                                                            </a></h3>
                                                        <span class="job-post-span"><a
                                                                href="../company-details?id=<?php echo $row['id']; ?>"><b>Tax
                                                                    no:</b> <?php echo $row['taxNumber']; ?></a></span>
                                                        <div class="star-rating">
                                                            <i class="fa fa-map-marker"
                                                                style="padding-right:7px;"></i><span><?php echo $row['headQuarters']; ?>,
                                                                Turkey </span>
                                                            <br>
                                                            <span>Established in:
                                                                <?php echo date('d F, Y', strtotime($row['establishDate'])); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="buttons-to-right">
                                                <a href="../model/disable-company?id=<?php echo $row['id']; ?>" class="button gray"
                                                    onclick="return confirmDisable()"><i class="sl sl-icon-close"></i>
                                                    Disable</a>
                                                <a href="../model/delete-company?id=<?php echo $row['id']; ?>" class="button gray"
                                                    onclick="return confirmDeletion()"><i class="sl sl-icon-close"></i>
                                                    Delete</a>
                                            </div>
                                        </li>

                                    <?php }
                                    if (empty($companyData)) {
                                        echo 'No companies to show';
                                    } ?>
                                </ul>

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

        <!-- Ask user if they are sure-->
        <script>
            function confirmDeletion() {
                // Show a confirmation dialog
                var confirmDeletion = confirm("Are you sure you want to delete this company and its job posts?");
                // Return true if the user confirms, otherwise return false
                return confirmDeletion;
            }
        </script>

        <script>
            function confirmDisable() {
                // Show a confirmation dialog
                var confirmDisable = confirm("Are you sure you want to disable this company and its job posts?");
                // Return true if the user confirms, otherwise return false
                return confirmDisable;
            }
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
    echo '<script>alert("Please login first!");history.go(-1);</script>';
    header("Location: ../index");
    exit();
} ?>