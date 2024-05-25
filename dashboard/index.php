<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

include_once "../model/functions.php";

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
								<h2><?php foreach ($userName as $userData) {
									$uName = $userData['fullName'];
									echo 'Welcome, ' . $uName;
								} ?></h2>
								<!-- Breadcrumbs -->
								<nav id="breadcrumbs">
									<ul>
										<li><a href="../">Home</a></li>
										<li>Dashboard</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>

					<!-- Notice -->

					<!-- Content -->
					<div class="row">

						<!-- Item -->
						<div class="col-lg-3 col-md-6">
							<div class="dashboard-stat color-1">
								<div class="dashboard-stat-content">
									<h4><?php echo count($jobDataCount); ?></h4> <span><a href="../search-job"
											style="color: #FFF;">Total Job Listings</a></span>
								</div>
								<div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
							</div>
						</div>

						<!-- Item -->
						<div class="col-lg-3 col-md-6">
							<div class="dashboard-stat color-4">
								<div class="dashboard-stat-content">
									<h4><?php echo count($fetchBookmarks); ?></h4> <span><a href="bookmarks"
											style="color: #FFF;">My Bookmarks</a></span>
								</div>
								<div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
							</div>
						</div>
					</div>


					<div class="row">

						<!-- Recent Activity -->
						<div class="col-lg-6 col-md-12">
							<div class="dashboard-list-box with-icons margin-top-20">
								<h4>Latest Job Postings</h4>

								<ul>
									<?php foreach ($latestJobPostings as $latest) { ?>
										<li>
											<i class="list-box-icon sl sl-icon-layers"></i> <?php echo $latest['experience']; ?>
											<strong><a
													href="job-details?id=<?php echo $latest['id']; ?>"><?php echo $latest['jobTitle']; ?></a></strong>
											was posted at <?php echo date('d F, Y', strtotime($latest['publishDate'])); ?>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>

						<!-- Invoices -->
						<div class="col-lg-6 col-md-12">
							<div class="dashboard-list-box invoices with-icons margin-top-20">
								<h4>Applied Jobs</h4>
							<?php foreach ($applicantDataDashboard as $jobId => $jobData) {?>
								<ul>

									<li><i class="list-box-icon sl sl-icon-doc"></i>
										<strong><?php echo $jobData['jobTitle']; ?></strong>
										<ul>
											<li class="unpaid"><?php echo $jobData['province']; ?></li>
											<li><?php echo $jobData['companyName']; ?></li>
											<li><?php echo date('d F, Y', strtotime($jobData['publishDate'])); ?></li>
										</ul>
										<div class="buttons-to-right">
											<a href="../model/cancel-job-application?id=<?php echo $jobData['id']; ?>" class="button gray">Cancel</a>
										</div>
									</li>
							<?php }?>
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


		<!-- Scripts
================================================== -->
		<script type="text/javascript" src="../scripts/jquery-2.2.0.min.js"></script>
		<script type="text/javascript" src="../scripts/mmenu.min.js"></script>
		<script type="text/javascript" src="../scripts/chosen.min.js"></script>
		<script type="text/javascript" src="../scripts/slick.min.js"></script>
		<script type="text/javascript" src="../scripts/rangeslider.min.js"></script>
		<script type="text/javascript" src="../scripts/magnific-popup.min.js"></script>
		<script type="text/javascript" src="../scripts/waypoints.min.js"></script>
		<script type="text/javascript" src="../scripts/counterup.min.js"></script>
		<script type="text/javascript" src="../scripts/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../scripts/tooltips.min.js"></script>
		<script type="text/javascript" src="../scripts/custom.js"></script>


	</body>

	</html>

<?php } elseif (isset($_SESSION['employer'])) {
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
								<h2><?php foreach ($userName as $userData) {
									$uName = $userData['fullName'];
									echo 'Welcome, ' . $uName;
								} ?></h2>
								<!-- Breadcrumbs -->
								<nav id="breadcrumbs">
									<ul>
										<li><a href="../">Home</a></li>
										<li>Dashboard</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>

					<!-- Notice -->

					<!-- Content -->
					<div class="row">

						<!-- Item -->
						<div class="col-lg-3 col-md-6">
							<div class="dashboard-stat color-1">
								<div class="dashboard-stat-content">
									<h4><?php echo count($jobPostData); ?></h4> <span><a href="../search-job"
											style="color: #FFF;">Total Job Listings</a></span>
								</div>
								<div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
							</div>
						</div>
					</div>


					<div class="row">

						<!-- Recent Activity -->
						<div class="col-lg-6 col-md-12">
							<div class="dashboard-list-box with-icons margin-top-20">
								<h4>My Recent Job Postings</h4>
								<?php foreach ($jobPostData as $jb) {
									$cmpName = $jb['companyName'];
									$jbTitle = $jb['jobTitle'];
									$jbId = $jb['id'];
									$jbType = $jb['workType'];
									$jbDate = $jb['publishDate'];
									?>
									<ul>

										<li>
											<i class="list-box-icon sl sl-icon-layers"></i> <?php echo $jbType; ?>
											<strong><a
													href="../job-details?id=<?php echo $jbId; ?>"><?php echo $jbTitle; ?></a></strong>
											was posted at <?php echo date('d F, Y', strtotime($jbDate)); ?>
											<a href="#" class="close-list-item"></a>
										</li>


									</ul>
								<?php } ?>
							</div>
						</div>

						<!-- Applicants -->
						<div class="col-lg-6 col-md-12">
							<div class="dashboard-list-box invoices with-icons margin-top-20">
								<h4>Applicants</h4>
								<?php foreach ($cvBuilderApplicants as $applicants) {
									if (!empty($applicants)) {
										?>
										<ul>

											<li><i class="list-box-icon sl sl-icon-doc"></i>
												<strong><?php echo $applicants['fullName']; ?></strong>
												<ul>
													<?php foreach ($applicants['jobPostInformation'] as $jobInfo): ?>
														<li><?php echo $jobInfo['jobTitle']; ?></li>
													<?php endforeach; ?>
													<li><?php echo date('d F, Y', strtotime($applicants['submittedAt'])); ?></li>
												</ul>
												<div class="buttons-to-right">
													<a target="_blank" href="view-cv?id=<?php echo $applicants['id']; ?>"
														class="button gray">View
														CV</a>
												</div>

											</li>

										</ul>
									<?php } else {
										echo 'No applicants to show.';
									}
								} ?>
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
		<script type="text/javascript" src="../scripts/jquery-2.2.0.min.js"></script>
		<script type="text/javascript" src="../scripts/mmenu.min.js"></script>
		<script type="text/javascript" src="../scripts/chosen.min.js"></script>
		<script type="text/javascript" src="../scripts/slick.min.js"></script>
		<script type="text/javascript" src="../scripts/rangeslider.min.js"></script>
		<script type="text/javascript" src="../scripts/magnific-popup.min.js"></script>
		<script type="text/javascript" src="../scripts/waypoints.min.js"></script>
		<script type="text/javascript" src="../scripts/counterup.min.js"></script>
		<script type="text/javascript" src="../scripts/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../scripts/tooltips.min.js"></script>
		<script type="text/javascript" src="../scripts/custom.js"></script>


	</body>

	</html>

	<?php
} elseif (isset($_SESSION['admin'])) {
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
			<header id="header-container" class="fixed fullwidth dashboard">

				<!-- Header -->
				<div id="header" class="not-sticky">
					<div class="container">

						<!-- Left Side Content -->
						<div class="left-side">

							<!-- Logo -->
							<div id="logo" style="background-color: #FFF;">
								<a href="index"><img src="images/logo-dark.svg" alt=""></a>
								<a href="index" class="dashboard-logo"><img src="images/logo-light.svg" alt=""></a>
							</div>

							<!-- Main Navigation -->
							<nav id="navigation" class="style-1">
								<ul id="responsive">

									<li><a href="#">Listings</a>
										<ul>
											<li><a href="#">List Layout</a>
												<ul>
													<li><a href="listings-list-with-sidebar.html">With Sidebar</a></li>
													<li><a href="listings-list-full-width.html">Full Width</a></li>
													<li><a href="listings-list-full-width-with-map.html">Full Width +
															Map</a></li>
												</ul>
											</li>
											<li><a href="#">Grid Layout</a>
												<ul>
													<li><a href="listings-grid-with-sidebar-1.html">With Sidebar 1</a></li>
													<li><a href="listings-grid-with-sidebar-2.html">With Sidebar 2</a></li>
													<li><a href="listings-grid-full-width.html">Full Width</a></li>
													<li><a href="listings-grid-full-width-with-map.html">Full Width +
															Map</a></li>
												</ul>
											</li>
											<li><a href="#">Half Screen Map</a>
												<ul>
													<li><a href="listings-half-screen-map-list.html">List Layout</a></li>
													<li><a href="listings-half-screen-map-grid-1.html">Grid Layout 1</a>
													</li>
													<li><a href="listings-half-screen-map-grid-2.html">Grid Layout 2</a>
													</li>
												</ul>
											</li>
											<li><a href="listings-single-page.html">Single Listing 1</a></li>
											<li><a href="listings-single-page-2.html">Single Listing 2</a></li>
										</ul>
									</li>

									<li><a class="current" href="#">User Panel</a>
										<ul>
											<li><a href="dashboard.html">Dashboard</a></li>
											<li><a href="dashboard-messages.html">Messages</a></li>
											<li><a href="dashboard-bookings.html">Bookings</a></li>
											<li><a href="dashboard-my-listings.html">My Listings</a></li>
											<li><a href="dashboard-reviews.html">Reviews</a></li>
											<li><a href="dashboard-bookmarks.html">Bookmarks</a></li>
											<li><a href="dashboard-add-listing.html">Add Listing</a></li>
											<li><a href="dashboard-my-profile.html">My Profile</a></li>
											<li><a href="dashboard-invoice.html">Invoice</a></li>
										</ul>
									</li>

									<li><a href="#">Pages</a>
										<div class="mega-menu mobile-styles three-columns">

											<div class="mega-menu-section">
												<ul>
													<li class="mega-menu-headline">Pages #1</li>
													<li><a href="pages-user-profile.html"><i class="sl sl-icon-user"></i>
															User Profile</a></li>
													<li><a href="pages-booking.html"><i class="sl sl-icon-check"></i>
															Booking Page</a></li>
													<li><a href="pages-add-listing.html"><i class="sl sl-icon-plus"></i> Add
															Listing</a></li>
													<li><a href="pages-blog.html"><i class="sl sl-icon-docs"></i> Blog</a>
													</li>
												</ul>
											</div>

											<div class="mega-menu-section">
												<ul>
													<li class="mega-menu-headline">Pages #2</li>
													<li><a href="pages-contact.html"><i
																class="sl sl-icon-envelope-open"></i> Contact</a></li>
													<li><a href="pages-coming-soon.html"><i
																class="sl sl-icon-hourglass"></i> Coming Soon</a></li>
													<li><a href="pages-404.html"><i class="sl sl-icon-close"></i> 404
															Page</a></li>
													<li><a href="pages-masonry-filtering.html"><i
																class="sl sl-icon-equalizer"></i> Masonry Filtering</a></li>
												</ul>
											</div>

											<div class="mega-menu-section">
												<ul>
													<li class="mega-menu-headline">Other</li>
													<li><a href="pages-elements.html"><i class="sl sl-icon-settings"></i>
															Elements</a></li>
													<li><a href="pages-pricing-tables.html"><i class="sl sl-icon-tag"></i>
															Pricing Tables</a></li>
													<li><a href="pages-typography.html"><i class="sl sl-icon-pencil"></i>
															Typography</a></li>
													<li><a href="pages-icons.html"><i class="sl sl-icon-diamond"></i>
															Icons</a></li>
												</ul>
											</div>

										</div>
									</li>

								</ul>
							</nav>
							<div class="clearfix"></div>
							<!-- Main Navigation / End -->

						</div>
						<!-- Left Side Content / End -->

						<!-- Right Side Content / End -->
						<div class="right-side">
							<!-- Header Widget -->
							<div class="header-widget">

								<!-- User Menu -->
								<div class="user-menu">
									<div class="user-name"><span><img src="images/dashboard-avatar.jpg" alt=""></span>My
										Account</div>
									<ul>
										<li><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
										<li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i>
												Bookings</a></li>
										<li name="logout"><a href="../login/logout.php"><i class="sl sl-icon-power"></i>
												Logout</a></li>
									</ul>
								</div>

								<a href="dashboard-add-listing.html" class="button border with-icon">Add Listing <i
										class="sl sl-icon-plus"></i></a>
							</div>
							<!-- Header Widget / End -->
						</div>
						<!-- Right Side Content / End -->

					</div>
				</div>
				<!-- Header / End -->

			</header>
			<div class="clearfix"></div>
			<!-- Header Container / End -->


			<!-- Dashboard -->
			<div id="dashboard">

				<!-- Navigation
	================================================== -->

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Main">
							<li class="active"><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a>
							</li>
							<li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> Bookings</a></li>
						</ul>

						<ul data-submenu-title="Listings">
							<li><a><i class="sl sl-icon-layers"></i> My Listings</a>
								<ul>
									<li><a href="dashboard-my-listings.html">Active <span class="nav-tag green">6</span></a>
									</li>
									<li><a href="dashboard-my-listings.html">Pending <span
												class="nav-tag yellow">1</span></a></li>
									<li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a>
									</li>
								</ul>
							</li>
							<li><a href="dashboard-reviews.html"><i class="sl sl-icon-star"></i> Reviews</a></li>
							<li><a href="dashboard-bookmarks.html"><i class="sl sl-icon-heart"></i> Bookmarks</a></li>
							<li><a href="dashboard-add-listing.html"><i class="sl sl-icon-plus"></i> Add Listing</a></li>
						</ul>

						<ul data-submenu-title="Account">
							<li><a href="dashboard-my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li>
							<li><a href="index.html"><i class="sl sl-icon-power"></i> Logout</a></li>
						</ul>

					</div>
				</div>
				<!-- Navigation / End -->


				<!-- Content
	================================================== -->
				<div class="dashboard-content">

					<!-- Titlebar -->
					<div id="titlebar">
						<div class="row">
							<div class="col-md-12">
								<h2>Howdy, Tom!</h2>
								<!-- Breadcrumbs -->
								<nav id="breadcrumbs">
									<ul>
										<li><a href="#">Home</a></li>
										<li>Dashboard</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>

					<!-- Notice -->
					<div class="row">
						<div class="col-md-12">
							<div class="notification success closeable margin-bottom-30">
								<p>Your listing <strong>Hotel Govendor</strong> has been approved!</p>
								<a class="close" href="#"></a>
							</div>
						</div>
					</div>

					<!-- Content -->
					<div class="row">

						<!-- Item -->
						<div class="col-lg-3 col-md-6">
							<div class="dashboard-stat color-1">
								<div class="dashboard-stat-content">
									<h4>6</h4> <span>Active Listings</span>
								</div>
								<div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
							</div>
						</div>

						<!-- Item -->
						<div class="col-lg-3 col-md-6">
							<div class="dashboard-stat color-2">
								<div class="dashboard-stat-content">
									<h4>726</h4> <span>Total Views</span>
								</div>
								<div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
							</div>
						</div>


						<!-- Item -->
						<div class="col-lg-3 col-md-6">
							<div class="dashboard-stat color-3">
								<div class="dashboard-stat-content">
									<h4>95</h4> <span>Total Reviews</span>
								</div>
								<div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
							</div>
						</div>

						<!-- Item -->
						<div class="col-lg-3 col-md-6">
							<div class="dashboard-stat color-4">
								<div class="dashboard-stat-content">
									<h4>126</h4> <span>Times Bookmarked</span>
								</div>
								<div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
							</div>
						</div>
					</div>


					<div class="row">

						<!-- Recent Activity -->
						<div class="col-lg-6 col-md-12">
							<div class="dashboard-list-box with-icons margin-top-20">
								<h4>Recent Activities</h4>
								<ul>
									<li>
										<i class="list-box-icon sl sl-icon-layers"></i> Your listing <strong><a
												href="#">Hotel Govendor</a></strong> has been approved!
										<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
									</li>

									<li>
										<i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review <div
											class="numerical-rating" data-rating="5.0"></div> on <strong><a href="#">Burger
												House</a></strong>
										<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
									</li>

									<li>
										<i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a
												href="#">Burger House</a></strong> listing!
										<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
									</li>

									<li>
										<i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review <div
											class="numerical-rating" data-rating="3.0"></div> on <strong><a
												href="#">Airport</a></strong>
										<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
									</li>

									<li>
										<i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a
												href="#">Burger House</a></strong> listing!
										<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
									</li>

									<li>
										<i class="list-box-icon sl sl-icon-star"></i> John Doe left a review <div
											class="numerical-rating" data-rating="4.0"></div> on <strong><a href="#">Burger
												House</a></strong>
										<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
									</li>

									<li>
										<i class="list-box-icon sl sl-icon-star"></i> Jack Perry left a review <div
											class="numerical-rating" data-rating="2.5"></div> on <strong><a href="#">Tom's
												Restaurant</a></strong>
										<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
									</li>
								</ul>
							</div>
						</div>

						<!-- Invoices -->
						<div class="col-lg-6 col-md-12">
							<div class="dashboard-list-box invoices with-icons margin-top-20">
								<h4>Invoices</h4>
								<ul>

									<li><i class="list-box-icon sl sl-icon-doc"></i>
										<strong>Professional Plan</strong>
										<ul>
											<li class="unpaid">Unpaid</li>
											<li>Order: #00124</li>
											<li>Date: 20/07/2017</li>
										</ul>
										<div class="buttons-to-right">
											<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
										</div>
									</li>

									<li><i class="list-box-icon sl sl-icon-doc"></i>
										<strong>Extended Plan</strong>
										<ul>
											<li class="paid">Paid</li>
											<li>Order: #00108</li>
											<li>Date: 14/07/2017</li>
										</ul>
										<div class="buttons-to-right">
											<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
										</div>
									</li>

									<li><i class="list-box-icon sl sl-icon-doc"></i>
										<strong>Extended Plan</strong>
										<ul>
											<li class="paid">Paid</li>
											<li>Order: #00097</li>
											<li>Date: 10/07/2017</li>
										</ul>
										<div class="buttons-to-right">
											<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
										</div>
									</li>

									<li><i class="list-box-icon sl sl-icon-doc"></i>
										<strong>Basic Plan</strong>
										<ul>
											<li class="paid">Paid</li>
											<li>Order: #00091</li>
											<li>Date: 30/06/2017</li>
										</ul>
										<div class="buttons-to-right">
											<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
										</div>
									</li>

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


		<!-- Scripts
================================================== -->
		<script type="text/javascript" src="../scripts/jquery-2.2.0.min.js"></script>
		<script type="text/javascript" src="../scripts/mmenu.min.js"></script>
		<script type="text/javascript" src="../scripts/chosen.min.js"></script>
		<script type="text/javascript" src="../scripts/slick.min.js"></script>
		<script type="text/javascript" src="../scripts/rangeslider.min.js"></script>
		<script type="text/javascript" src="../scripts/magnific-popup.min.js"></script>
		<script type="text/javascript" src="../scripts/waypoints.min.js"></script>
		<script type="text/javascript" src="../scripts/counterup.min.js"></script>
		<script type="text/javascript" src="../scripts/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../scripts/tooltips.min.js"></script>
		<script type="text/javascript" src="../scripts/custom.js"></script>


	</body>

	</html>
	<?php
} else {
	echo '<script>alert("Please login first!");</script>';
	header("Location: ../");
	exit();
} ?>