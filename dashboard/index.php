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
													href="../job-details?id=<?php echo $latest['id']; ?>"><?php echo $latest['jobTitle']; ?></a></strong>
											was posted at <?php echo date('d F, Y', strtotime($latest['publishDate'])); ?>
										</li>
									<?php }
									if (empty($latestJobPostings)) {
										echo 'No job post to show.';
									} ?>
								</ul>
							</div>
						</div>

						<!-- Invoices -->
						<div class="col-lg-6 col-md-12">
							<div class="dashboard-list-box invoices with-icons margin-top-20">
								<h4>Applied Jobs</h4>
								<ul>
									<?php foreach ($applicantDataDashboard as $jobId => $jobData) { ?>
										<li><i class="list-box-icon sl sl-icon-doc"></i>
											<strong><?php echo $jobData['jobTitle']; ?></strong>
											<ul>
												<li class="unpaid"><?php echo $jobData['province']; ?></li>
												<li><?php echo $jobData['companyName']; ?></li>
												<li><?php echo date('d F, Y', strtotime($jobData['publishDate'])); ?></li>
											</ul>
											<div class="buttons-to-right">
												<a href="../model/cancel-job-application?id=<?php echo $jobData['id']; ?>"
													class="button gray">Cancel</a>
											</div>
										</li>
									<?php }
									if (empty($applicantDataDashboard)) {
										echo 'No Applications yet.';
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
								<?php }
								if (empty($jobPostData)) {
									echo 'No job post to show.';
								} ?>
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
								<h4>Recent Job Postings</h4>
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
							<div class="dashboard-list-box with-icons margin-top-20">
								<h4>Company Applications</h4>
								<?php foreach ($unverifiedCompanies as $jb) {
									$cmpName = $jb['companyName'];
									$cmpTax = $jb['taxNumber'];
									$cmpHQ = $jb['headQuarters'];
									$cmpId = $jb['id'];
									$cmpDate = $jb['establishDate'];
									?>
									<ul>

										<li>
											<i class="list-box-icon sl sl-icon-layers"></i> Tax No: <?php echo $cmpTax; ?>
											<strong><a
													href="../company-details?id=<?php echo $cmpId; ?>"><?php echo $cmpName; ?></a></strong>
											was established at <?php echo date('d F, Y', strtotime($cmpDate)); ?>
											<div class="buttons-to-right">
												<a target="_blank" href="company-applications" class="button gray">Evaluate</a>
											</div>
										</li>

									</ul>
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