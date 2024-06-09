<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['admin'])) {

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
                                <h2>System Logs</h2>
                                <!-- Breadcrumbs -->
                                <nav id="breadcrumbs">
                                    <ul>
                                        <li><a href="../">Home</a></li>
                                        <li><a href="../dashboard">Dashboard</a></li>
                                        <li>System Logs</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Listings -->
                        <div class="col-lg-12 col-md-12">
                            <div class="dashboard-list-box margin-top-0">
                                <form method="POST" id="logDates" action="" enctype="multipart/form-data">
                                    <?php
                                    // Check if the date is set in the POST request
                                    if (isset($_POST['logDate'])) {
                                        // If set, use the selected date as the value
                                        $selectedDate = $_POST['logDate'];
                                    } else {
                                        // Otherwise, use the current date
                                        $selectedDate = date('Y-m-d');
                                    }
                                    ?>
                                    <input type="date" name="logDate" class="form-control" id="logDate"
                                        max="<?php echo date('Y-m-d'); ?>" value="<?php echo $selectedDate; ?>"
                                        style="width: 50%;float: left;">
                                    <input type="submit" name="gonder" class="btn btn-info btn-fill" value="Göster"
                                        style="width: 20%;">
                                </form>
                                <?php
                                if (isset($_POST['logDate'])) {
                                    $date = strtotime($_POST['logDate']);
                                    $printDate = date("d-m-Y", $date);
                                    ?>
                                    <h4>Log Records Dated <?php echo $printDate; ?></h4>
                                    <iframe src="http://localhost/BlueCollarInsight/log/<?php echo $printDate; ?>.log" width="100%" height="500px"
                                        frameBorder="0"></iframe>
                                <?php } else {
                                    $printDate = date("d-m-Y"); ?>
                                    <br>
                                    <h4>Log Records Dated <?php echo $printDate; ?></h4>
                                    <iframe src="http://localhost/BlueCollarInsight/log/<?php echo $printDate; ?>.log" width="100%" height="500px"
                                        frameBorder="0"></iframe>
                                <?php } ?>
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
    header("Location: index.php");
}

?>