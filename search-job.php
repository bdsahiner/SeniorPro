<?php
include_once "config/connection.php";
include_once "test-backend.php";

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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/colors/main.css" id="colors">

</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header Container
================================================== -->

        <?php include_once "header.php"; ?>

        <div class="clearfix"></div>
        <!-- Header Container / End -->


        <!-- Titlebar
================================================== -->
        <div id="titlebar" class="gradient">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2>Job Listings</h2>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="../BlueCollarInsight">Home</a></li>
                                <li>Search Job</li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>


        <!-- Content
================================================== -->
        <div class="container">
            <div class="row">

                <!-- Search -->
                <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <div class="col-md-12">

                        <!-- Sorting - Filtering Section -->
                        <div class="row margin-bottom-25 margin-top-30">
                            <div class="col-md-12">
                                <div class="fullwidth-filters">
                                    <!-- Filter & Sort by -->
                                    <?php foreach ($filterOptions as $option) { ?>
                                        <div class="panel-dropdown wide float-right">
                                            <a href="#"><?php echo $option['label']; ?></a>
                                            <div class="panel-dropdown-content checkboxes" style="max-width: 420px;">
                                                <!-- Checkboxes -->
                                                <div class="card card-body" style="max-height: 200px; overflow-y: auto;">
                                                    <?php foreach ($option['data'] as $dataItem) { ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filters[<?php echo $option['key']; ?>][]"
                                                                id="<?php echo $option['key']; ?>_<?php echo $dataItem[$option['key']]; ?>"
                                                                value="<?php echo $dataItem[$option['key']]; ?>">
                                                            <label class="form-check-label"
                                                                for="<?php echo $option['key']; ?>_<?php echo $dataItem[$option['key']]; ?>">
                                                                <?php echo $dataItem[$option['key']]; ?>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <!-- Buttons -->
                                                <div class="panel-buttons">
                                                    <button class="panel-cancel">Cancel</button>
                                                    <button name="apply" class="panel-apply">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <button class="panel-cancel">Reset Filters</button>
                            </div>
                        </div>
                        <!-- Sorting - Filtering Section / End -->
                </form>
                <!-- Sorting - Filtering Section / End -->

                <div class="row">
                    <style>
                        .row {
                            margin-bottom: 20px;
                            /* Adjust as needed */
                        }

                        .listing-item {
                            padding: 20px;
                            /* Adjust as needed */
                            margin-bottom: 20px;
                            /* Adjust as needed */
                            display: block;
                            background-color: #f9f9f9;
                            /* Optional: Add a background color to visually separate the rows */
                            border-radius: 5px;
                            /* Optional: Add rounded corners */
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            /* Optional: Add a subtle box shadow for depth */
                            min-height: 300px;
                        }
                    </style>

                    <div class="col-lg-12 col-md-12">
                        <div class="listing-item-container list-layout">
                            <?php
                            // Output job listings
                            foreach ($jobListings as $job) { ?>
                                <a href="job-details?id=<?php echo $job['id']; ?>" class="listing-item">

                                    <!-- Image -->
                                    <div class="listing-item-image">
                                        <img src="images/atilim-uni.jpg" alt="">
                                        <span class="tag"><?php echo $job['sector']; ?></span>
                                    </div>

                                    <!-- Content -->
                                    <div class="listing-item-content">
                                        <?php
                                        $publishDateObject = new DateTime($job['publishDate']);
                                        $publishDateObject->add(new DateInterval('P1D'));
                                        $publishDatePlusOne = $publishDateObject->format('Y-m-d H:i:s');

                                        $endDateObject = new DateTime($job['endDate']);
                                        $endDateObject->sub(new DateInterval('P1D'));
                                        $endDateMinusOne = $endDateObject->format('Y-m-d H:i:s');
                                        ?>
                                        <?php if ($publishDatePlusOne > $currentDate) {
                                            echo "<div class='listing-badge now-open'>New Post</div>";
                                        } ?>
                                        <?php if ($currentDate > $endDateMinusOne && $currentDate < $job['endDate']) {
                                            echo "<div class='listing-badge now-closed'>Ends Soon</div>";
                                        } ?>

                                        <div class="listing-item-inner">
                                            <h3><?php echo $job['jobTitle']; ?> (<?php echo $job['experience']; ?> Level)
                                            </h3>
                                            <span><?php echo $job['companyName']; ?></span>
                                            <div>
                                                <i class="fa fa-map-marker"
                                                    style="padding-right:7px;"></i><span><?php echo $job['province']; ?>,
                                                    Turkiye </span>
                                                <br>
                                                <br>
                                                <b><?php echo $job['workType']; ?></b>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>

                    </div>

                </div>
            </div>


            <!-- Footer
================================================== -->
            <?php include_once "footer.php"; ?>
            <!-- Footer / End -->


            <!-- Back To Top Button -->
            <div id="backtotop"><a href="#"></a></div>


        </div>
        <!-- Wrapper / End -->

        <script>
            function updateInterfaceWithFilters() {
                var urlParams = new URLSearchParams(window.location.search);
                var filters = urlParams.getAll('filters[]');

                // Loop through each filter option and mark them as selected
                filters.forEach(function (filter) {
                    var checkboxes = document.querySelectorAll('input[name^="filters[' + filter + ']"]:not(:checked)');
                    checkboxes.forEach(function (checkbox) {
                        checkbox.checked = true;
                    });
                });
            }

            // Call the function to update interface when the page loads
            window.onload = function () {
                updateInterfaceWithFilters();
            };

            // Function to update form action with selected filters
            function updateFormAction() {
                var selectedFilters = document.querySelectorAll('input[name^="filters"]:checked');
                var filterParams = Array.from(selectedFilters).map(function (checkbox) {
                    return encodeURIComponent(checkbox.name) + '=' + encodeURIComponent(checkbox.value);
                }).join('&');

                var form = document.querySelector('form');
                form.action = form.getAttribute('action').split('?')[0] + '?' + filterParams;
            }

            // Call the function to update form action when checkboxes are clicked
            document.addEventListener('DOMContentLoaded', function () {
                updateFormAction(); // Update form action initially
                var checkboxes = document.querySelectorAll('input[name^="filters"]');
                checkboxes.forEach(function (checkbox) {
                    checkbox.addEventListener('click', updateFormAction);
                });
            });
        </script>


        <!-- Scripts
================================================== -->
        <script type="text/javascript" src="scripts/email-decode.min.js"></script>
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