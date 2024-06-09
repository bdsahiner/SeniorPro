<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();

	include_once "../config/connection.php";
}

if (isset($_SESSION['user'])) {

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
								<h2>My Bookmarks</h2>
								<!-- Breadcrumbs -->
								<nav id="breadcrumbs">
									<ul>
										<li><a href="../">Home</a></li>
										<li><a href="../dashboard">Dashboard</a></li>
										<li>My Bookmarks</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">

						<!-- Listings -->
						<div class="col-lg-12 col-md-12">
							<div class="dashboard-list-box margin-top-0">
								<h4>Active Bookmarks</h4>
								<?php
								// Assuming $dbh is your PDO database connection
							
								$userId = $_SESSION['id'];

								// Fetch job data for jobs associated with the user
								$jobDataQuery = $dbh->prepare("
							SELECT jobs.* 
							FROM jobs 
							INNER JOIN bookmarks ON jobs.id = bookmarks.jobId 
							WHERE bookmarks.employeeId = ?
						");
								$jobDataQuery->execute([$userId]);
								$jobData = $jobDataQuery->fetchAll(PDO::FETCH_ASSOC);

								// Check if any job data was retrieved
								if ($jobData) {
									// Initialize the list of job listings
									echo '<ul>';

									// Process and display job data
									foreach ($jobData as $job) {
										echo '<li>
									<div class="list-box-listing">
										<div class="list-box-listing-img"><a href="#"><img src="../images/atilim-uni.jpg" alt=""></a></div>
										<div class="list-box-listing-content">
											<div class="inner">
												<h3><a href="../job-details?id=' . $job['id'] . '">' . $job['jobTitle'] . '</a></h3>
												<p>' . $job['companyName'] . '</p>
												<div>
												<span><i class="fa fa-map-marker" style="padding-right:7px;"></i>' . $job['province'] . ', Turkey</span>
												</div>
											</div>
										</div>
									</div>
									<div class="buttons-to-right">
									<a href="../model/cancel-bookmark?id=' . $job['id'] . '" class="button gray" onclick="return confirmDeletion()"><i class="sl sl-icon-close"></i> Cancel</a>
									</div>
								</li>';
									}

									// Close the list of job listings
									echo '</ul>';
								} else {
									// Display a message if no job data was found
									echo 'No bookmarks found for the user.';
								}
								?>



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

		<!-- Confirm if user wants to apply to the job-->
		<script>
			function confirmDeletion() {
				// Show a confirmation dialog
				var confirmDeletion = confirm("Are you sure you want to delete this bookmark?");
				// Return true if the user confirms, otherwise return false
				return confirmDeletion;
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