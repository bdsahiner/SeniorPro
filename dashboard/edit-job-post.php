<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['employer'])) {

	include_once "../model/functions.php";
	include_once "../config/connection.php";

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
								<h2>Edit Job Post</h2>
								<!-- Breadcrumbs -->
								<nav id="breadcrumbs">
									<ul>
										<li><a href="../">Home</a></li>
										<li><a href="../dashboard">Dashboard</a></li>
										<li>Edit Job Post</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">

							<div id="add-listing" class="createjobpost">

								<!-- Section -->
								<div class="add-listing-section">

									<!-- Headline -->
									<div class="add-listing-headline">
										<h3><i class="sl sl-icon-doc"></i> General Informations</h3>
									</div>

									<!-- Form Beginning-->
									<form action="" method="POST" name="submitJobEdit">
										<?php foreach ($editJobPost as $job) { ?>
											<!-- Title -->
											<div class="row with-forms">
												<div class="col-md-6">
													<h5>Job Title <i class="tip"
															data-tip-content="Name which position you are looking for"></i></h5>
													<input class="search-field" type="text"
														value="<?php echo $job['jobTitle'] ?>" name="jobTitle" disabled />
												</div>
											</div>

											<!-- Row -->
											<div class="row with-forms">

												<!-- Status -->
												<div class="col-md-6">
													<h5>Sector </h5>
													<select name="sector" class="chosen-select-no-single" disabled>
<<<<<<< HEAD
														<option value="<?php echo $job['sector'] ?>">
															<?php echo $job['sector'] ?>
=======
														<option value="<?php echo $job['sector'] ?>"><?php echo $job['sector'] ?>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
														</option>
													</select>
												</div>

												<!-- Type -->
												<div class="col-md-6">
													<h5>Department </h5>
													<select name="department" class="chosen-select-no-single" disabled>
														<option value="<?php echo $job['department'] ?>">
<<<<<<< HEAD
															<?php echo $job['department'] ?>
														</option>
=======
															<?php echo $job['department'] ?></option>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
													</select>
												</div>

												<div class="form">
													<h5>Job Description <span>*</span></h5>
<<<<<<< HEAD
													<textarea name="jobDescript" id="summary"
														><?php echo $job['jobDescription'] ?></textarea>
=======
													<input type="text" name="jobDescript" id="summary" spellcheck="true"
														value="<?php echo $job['jobDescription'] ?>">
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
												</div>

											</div>
											<!-- Row / End -->

									</div>
									<!-- Section / End -->

									<!-- Section -->
									<div class="add-listing-section margin-top-45">

										<!-- Headline -->
										<div class="add-listing-headline">
											<h3><i class="sl sl-icon-location"></i> Location</h3>
										</div>

										<div class="submit-section">

											<!-- Row -->
											<div class="row with-forms">

												<!-- City -->
												<div class="col-md-6">
													<h5>Province </h5>
													<select name="province" class="chosen-select-no-single">
														<option value="<?php echo $job['province'] ?>" disabled selected>
<<<<<<< HEAD
															<?php echo $job['province'] ?>
														</option>
=======
															<?php echo $job['province'] ?></option>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
													</select>
												</div>

											</div>
											<!-- Row / End -->

										</div>
									</div>
									<!-- Section / End -->


									<!-- Section -->
									<div class="add-listing-section margin-top-45">

										<!-- Headline -->
										<div class="add-listing-headline">
											<h3><i class="sl sl-icon-docs"></i> Details</h3>
										</div>

										<!-- Description -->
										<div class="row with-forms">

											<div class="col-md-6">
												<h5>Experience <i class="tip"
														data-tip-content="Junior = 0 to 3 Years of experience <br> Middle = 3 to 10 Years of experience <br> Senior = 10+ Years of experience"></i>
												</h5>
												<select name="experience" class="chosen-select-no-single" disabled>
													<option value="<?php echo $job['experience'] ?>">
<<<<<<< HEAD
														<?php echo $job['experience'] ?>
													</option>
=======
														<?php echo $job['experience'] ?></option>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
												</select>
											</div>

											<!-- Type -->
											<div class="col-md-6">
												<h5>Education Level </h5>
												<select name="education" class="chosen-select-no-single" disabled>
													<option value="<?php echo $job['educationLevel'] ?>">
<<<<<<< HEAD
														<?php echo $job['educationLevel'] ?>
													</option>
=======
														<?php echo $job['educationLevel'] ?></option>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
												</select>
											</div>

										</div>

										<div class="row with-forms">

											<div class="col-md-6">
												<h5>Work Type </h5>
												<select name="workType" class="chosen-select-no-single" disabled>
<<<<<<< HEAD
													<option value="<?php echo $job['workType'] ?>">
														<?php echo $job['workType'] ?>
=======
													<option value="<?php echo $job['workType'] ?>"><?php echo $job['workType'] ?>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
													</option>
												</select>
											</div>

											<!-- Type -->
											<div class="col-md-6">
												<h5>Ending Date <span>*</span> <i class="tip"
														data-tip-content="Please indicate when this post will be deleted."></i>
												</h5>
												<input type="datetime-local" name="endDate"
													value="<?php echo $job['endDate'] ?>">
											</div>

										</div>
									</div>

									<!-- Section / End -->


									<button type="submit" name="submitJobEdit" class="button preview">Submit <i
											class="fa fa-arrow-circle-right"></i></a>
									<?php } ?>
									</form>
									<!-- Form Ending-->
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
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


		<!-- DropZone | Documentation: http://dropzonejs.com -->
		<script type="text/javascript" src="scripts/dropzone.js"></script>


	</body>

	</html>

	<?php
} else {
	echo '<script>alert("Please login first!");</script>';
	header("Location: ../");
	exit();
} ?>