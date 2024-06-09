<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['employer'])) {

	include_once "../model/functions.php";

<<<<<<< HEAD
?>
=======
	?>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11

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
								<h2>Active Job Posts</h2>
								<!-- Breadcrumbs -->
								<nav id="breadcrumbs">
									<ul>
										<li><a href="../">Home</a></li>
										<li><a href="../dashboard">Dashboard</a></li>
										<li>My Job Posts</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">

						<!-- Listings -->
						<div class="col-lg-12 col-md-12">
							<div class="dashboard-list-box margin-top-0">
								<h4><a href="create-job-post" class="create-post">Add a Job Post</a></h4>
								<style>
									.create-post {
										display: inline-block;
										padding: 8px 16px;
										border: 1px solid #004dda;
										background-color: #004dda;
										color: white;
										text-decoration: none;
										border-radius: 4px;
										transition: background-color 0.3s, color 0.3s;
									}

									.create-post:hover {
										background-color: white;
										color: #004dda;
									}
								</style>

								<ul>
<<<<<<< HEAD
									<?php foreach ($jobPostData as $row) {
										$countBookmarks = $dbh->prepare('SELECT COUNT(*) AS bookmarkCount FROM bookmarks WHERE jobId = ?');
										$countBookmarks->execute([$row['id']]);
										$bookmarkCount = $countBookmarks->fetch(PDO::FETCH_ASSOC)['bookmarkCount'];
									?>
=======
									<?php foreach ($jobPostData as $row) { ?>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
										<li>
											<div class="list-box-listing">
												<div class="list-box-listing-img">
													<a href="#">
														<img src="../images/atilim-uni.jpg" alt="Company Logo">
													</a>
												</div>
												<div class="list-box-listing-content">
													<div class="inner">
														<h3><a href="../job-details?id=<?php echo $row['id']; ?>"><?php echo $row['jobTitle']; ?>
																<span style="color: #004dda;">(<?php echo $row['experience']; ?>
																	Level)</span></a></h3>
<<<<<<< HEAD
														<span class="job-post-span"><a href="../company-details?id=<?php echo $row['id']; ?>"><?php echo $row['companyName']; ?></a></span>
														<div class="star-rating">
															<i class="fa fa-map-marker" style="padding-right:7px;"></i><span><?php echo $row['province']; ?>,
																Turkey </span>
														</div>
														<br>
														<?php if(empty($bookmarkCount)) { echo 'No bookmarks for this job post.';} else { echo '' . $bookmarkCount . ' time(s) bookmarked';} ?>
=======
														<span class="job-post-span"><a
																href="../company-details?id=<?php echo $row['id']; ?>"><?php echo $row['companyName']; ?></a></span>
														<div class="star-rating">
															<i class="fa fa-map-marker"
																style="padding-right:7px;"></i><span><?php echo $row['province']; ?>,
																Turkey </span>
														</div>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
													</div>
												</div>
											</div>
											<div class="buttons-to-right">
<<<<<<< HEAD
												<a href="edit-job-post?id=<?php echo $row['id']; ?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
												<a href="delete-job-post?id=<?php echo $row['id']; ?>" class="button gray" onclick="return confirmDeletion()"><i class="sl sl-icon-close"></i>
													Delete</a>
											</div>
										</li>
									<?php }
									if (empty($jobPostData)) {
										echo 'No job posts to show';
									} ?>
=======
												<a href="edit-job-post?id=<?php echo $row['id']; ?>" class="button gray"><i
														class="sl sl-icon-note"></i> Edit</a>
												<a href="delete-job-post?id=<?php echo $row['id']; ?>" class="button gray"
													onclick="return confirmDeletion()"><i class="sl sl-icon-close"></i>
													Delete</a>
											</div>
										</li>
									<?php } ?>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
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
				var confirmDeletion = confirm("Are you sure you want to delete the job post?");
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