<?php
include_once "config/connection.php";
include_once "test-backend.php";
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Blue Collar Insight</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/colors/main.css" id="colors">
    <style>
        /* Styles for search suggestions dropdown */
        #searchSuggestions {
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            width: 100%;
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header Container -->
        <?php include_once "header.php"; ?>
        <div class="clearfix"></div>

        <!-- Titlebar -->
        <div id="titlebar" class="gradient">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Job Listings</h2>
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

        <!-- Content -->
        <div class="container">
            <div class="row">
                <!-- Search -->
                <div class="col-md-12">
                    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="row margin-bottom-25 margin-top-30">
                            <div class="col-md-10">
                                <input type="text" id="searchTerm" name="searchTerm" class="form-control" placeholder="Search for jobs..." value="<?php echo isset($_GET['searchTerm']) ? htmlspecialchars($_GET['searchTerm']) : ''; ?>">
                                <div id="searchSuggestions"></div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Sorting - Filtering Section -->
                <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="col-md-12">
                        <div class="row margin-bottom-25 margin-top-30">
                            <div class="col-md-12">
                                <div class="fullwidth-filters">
                                    <?php foreach ($filterOptions as $option) { ?>
                                        <div class="panel-dropdown wide float-right">
                                            <a href="#"><?php echo $option['label']; ?></a>
                                            <div class="panel-dropdown-content checkboxes" style="max-width: 420px;">
                                                <div class="card card-body" style="max-height: 200px; overflow-y: auto;">
                                                    <?php foreach ($option['data'] as $dataItem) { ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="filters[<?php echo $option['key']; ?>][]" id="<?php echo $option['key']; ?>_<?php echo $dataItem[$option['key']]; ?>" value="<?php echo $dataItem[$option['key']]; ?>">
                                                            <label class="form-check-label" for="<?php echo $option['key']; ?>_<?php echo $dataItem[$option['key']]; ?>">
                                                                <?php echo $dataItem[$option['key']]; ?>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
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
                    </div>
                </form>

                <div class="row">
                    <style>
                        .row {
                            margin-bottom: 20px;
                        }

                        .listing-item {
                            padding: 20px;
                            margin-bottom: 20px;
                            display: block;
                            background-color: #f9f9f9;
                            border-radius: 5px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            min-height: 300px;
                        }
                    </style>

                    <div class="col-lg-12 col-md-12">
                        <div class="listing-item-container list-layout">
                            <?php
                            foreach ($jobListings as $job) { ?>
                                <a href="job-details?id=<?php echo $job['id']; ?>" class="listing-item">
                                    <div class="listing-item-image">
                                        <img src="images/atilim-uni.jpg" alt="">
                                        <span class="tag"><?php echo $job['sector']; ?></span>
                                    </div>
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
                                            <h3><?php echo $job['jobTitle']; ?> (<?php echo $job['experience']; ?> Level)</h3>
                                            <span><?php echo $job['companyName']; ?></span>
                                            <div>
                                                <i class="fa fa-map-marker" style="padding-right:7px;"></i><span><?php echo $job['province']; ?>, Turkiye </span>
                                                <br><br>
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
        </div>

        <!-- Footer -->
        <?php include_once "footer.php"; ?>

        <!-- Back To Top Button -->
        <div id="backtotop"><a href="#"></a></div>
    </div>

    <script src="scripts/jquery-2.2.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchTerm').on('input', function() {
                var searchTerm = $(this).val();
                if (searchTerm.length > 0) {
                    $.ajax({
                        url: 'search-job-ajax.php',
                        type: 'GET',
                        data: {
                            searchTerm: searchTerm
                        },
                        success: function(data) {
                            $('#searchSuggestions').html(data).show();
                        }
                    });
                } else {
                    $('#searchSuggestions').hide();
                }
            });

            // Hide suggestions when clicking outside
            $(document).on('click', function(event) {
                if (!$(event.target).closest('#searchTerm').length) {
                    $('#searchSuggestions').hide();
                }
            });

            // Handle click on a suggestion item
            $(document).on('click', '.suggestion-item', function() {
                var selectedText = $(this).text();
                $('#searchTerm').val(selectedText);
                $('#searchSuggestions').hide();
            });
        });
    </script>
</body>

</html>