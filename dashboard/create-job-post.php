<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

<<<<<<< HEAD
include_once "../model/functions.php";
include_once "../config/connection.php";

$verifyCheckId = $_SESSION['id'];
$verifiedOrNot = $dbh->prepare("SELECT verified FROM companies WHERE employerId = ?");
$verifiedOrNot->execute([$verifyCheckId]);
$compVerificationCheck = $verifiedOrNot->fetch(PDO::FETCH_ASSOC);

if (isset($_SESSION['employer'])) {

	if ($compVerificationCheck['verified'] == 1) {
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
									<h2>Create Job Post</h2>
									<!-- Breadcrumbs -->
									<nav id="breadcrumbs">
										<ul>
											<li><a href="../">Home</a></li>
											<li><a href="../dashboard">Dashboard</a></li>
											<li>Create Job Post</li>
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
										<form action="../model/add-job-post-model.php" method="POST" id="createJob">
											<!-- Title -->
											<div class="row with-forms">
												<div class="col-md-6">
													<h5>Job Title <span>*</span> <i class="tip"
															data-tip-content="Name which position you are looking for"></i></h5>
													<input class="search-field" type="text" value="" name="jobTitle" required />
												</div>
											</div>

											<!-- Row -->
											<div class="row with-forms">

												<!-- Status -->
												<div class="col-md-6">
													<h5>Sector <span>*</span></h5>
													<select name="sector" class="chosen-select-no-single">
														<option disabled selected>Select Sector</option>
														<?php foreach ($sectors as $sName) { ?>
															<option value="<?php echo $sName['sector']; ?>">
																<?php echo $sName['sector']; ?>
															</option>
														<?php } ?>
													</select>
												</div>

												<!-- Type -->
												<div class="col-md-6">
													<h5>Department <span>*</span></h5>
													<select name="department" class="chosen-select-no-single">
														<option disabled selected>Select Department</option>
														<?php foreach ($departments as $dName) { ?>
															<option value="<?php echo $dName['department']; ?>">
																<?php echo $dName['department']; ?>
															</option>
														<?php } ?>
													</select>
												</div>

												<div class="form">
													<h5>Job Description <span>*</span></h5>
													<textarea name="jobDescription" id="summary" spellcheck="true"
														required></textarea>
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
													<h5>Province <span>*</span></h5>
													<select name="province" class="chosen-select-no-single">
														<option disabled selected>Select Province</option>
														<?php foreach ($provinces as $pName) { ?>
															<option value="<?php echo $pName['province']; ?>">
																<?php echo $pName['province']; ?>
															</option>
														<?php } ?>
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
												<h5>Experience <span>*</span> <i class="tip"
														data-tip-content="Junior = 0 to 3 Years of experience <br> Middle = 3 to 10 Years of experience <br> Senior = 10+ Years of experience"></i>
												</h5>
												<select name="experience" class="chosen-select-no-single">
													<option disabled selected>Select Experience</option>
													<option value="Junior">Junior</option>
													<option value="Middle">Middle</option>
													<option value="Senior">Senior</option>
=======
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
								<h2>Create Job Post</h2>
								<!-- Breadcrumbs -->
								<nav id="breadcrumbs">
									<ul>
										<li><a href="../">Home</a></li>
										<li><a href="../dashboard">Dashboard</a></li>
										<li>Create Job Post</li>
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
									<form action="../model/add-job-post-model.php" method="POST" id="createJob">
										<!-- Title -->
										<div class="row with-forms">
											<div class="col-md-6">
												<h5>Job Title <span>*</span> <i class="tip"
														data-tip-content="Name which position you are looking for"></i></h5>
												<input class="search-field" type="text" value="" name="jobTitle" required />
											</div>
										</div>

										<!-- Row -->
										<div class="row with-forms">

											<!-- Status -->
											<div class="col-md-6">
												<h5>Sector <span>*</span></h5>
												<select name="sector" class="chosen-select-no-single">
													<option disabled selected>Select Sector</option>
													<?php foreach ($sectors as $sName) { ?>
														<option value="<?php echo $sName['sector']; ?>">
															<?php echo $sName['sector']; ?>
														</option>
													<?php } ?>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
												</select>
											</div>

											<!-- Type -->
											<div class="col-md-6">
<<<<<<< HEAD
												<h5>Education Level <span>*</span></h5>
												<select name="education" class="chosen-select-no-single">
													<option disabled selected>Select Education Level</option>
													<option value="Elementary School"> Elementary School</option>
													<option value="High School"> High School</option>
													<option value="Undergraduate"> Undergraduate</option>
													<option value="Graduate"> Graduate</option>
													<option value="Masters Degree"> Masters Degree</option>
												</select>
											</div>

										</div>

										<div class="row with-forms">

											<div class="col-md-6">
												<h5>Work Type <span>*</span></h5>
												<select name="workType" class="chosen-select-no-single">
													<option disabled selected>Select Work Type</option>
													<option value="Full Time"> Full Time</option>
													<option value="Part Time"> Part Time</option>
													<option value="Seasonal"> Seasonal / Project-based</option>
												</select>
											</div>

											<!-- Type -->
											<div class="col-md-6">
												<h5>Ending Date <span>*</span> <i class="tip"
														data-tip-content="Please indicate when this post will be deleted."></i>
												</h5>
												<input type="datetime-local" name="endDate" required>
											</div>

										</div>

										<h5 class="margin-top-30 margin-bottom-10">Language Preferences </h5>
										<div class="checkboxes in-row margin-bottom-20">

											<input id="check-a" type="checkbox" name="language[]" value="Turkish" <?php if (isset($_POST['language']) && in_array('Turkish', $_POST['language']))
												echo 'checked'; ?>>
											<label for="check-a">Turkish</label>

											<input id="check-b" type="checkbox" name="language[]" value="English" <?php if (isset($_POST['language']) && in_array('English', $_POST['language']))
												echo 'checked'; ?>>
											<label for="check-b">English</label>

											<input id="check-c" type="checkbox" name="language[]" value="German" <?php if (isset($_POST['language']) && in_array('German', $_POST['language']))
												echo 'checked'; ?>>
											<label for="check-c">German</label>

											<input id="check-d" type="checkbox" name="language[]" value="Russian" <?php if (isset($_POST['language']) && in_array('Russian', $_POST['language']))
												echo 'checked'; ?>>
											<label for="check-d">Russian</label>

											<input id="check-e" type="checkbox" name="language[]" value="French" <?php if (isset($_POST['language']) && in_array('French', $_POST['language']))
												echo 'checked'; ?>>
											<label for="check-e">French</label>

											<input id="check-f" type="checkbox" name="language[]" value="Arabic" <?php if (isset($_POST['language']) && in_array('Arabic', $_POST['language']))
												echo 'checked'; ?>>
											<label for="check-f">Arabic</label>

											<input id="check-g" type="checkbox" name="language[]" value="Persian" <?php if (isset($_POST['language']) && in_array('Persian', $_POST['language']))
												echo 'checked'; ?>>
											<label for="check-g">Persian</label>

											<input id="check-h" type="checkbox" name="language[]" value="Kurdish" <?php if (isset($_POST['language']) && in_array('Kurdish', $_POST['language']))
												echo 'checked'; ?>>
											<label for="check-h">Kurdish</label>


										</div>
									</div>

									<!-- Section / End -->


									<button type="submit" name="submitJob" class="button preview">Submit <i
											class="fa fa-arrow-circle-right"></i></a>
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
		echo '<script>alert("Your application was not verified yet!");history.go(-1);</script>';
		exit();
	}
=======
												<h5>Department <span>*</span></h5>
												<select name="department" class="chosen-select-no-single">
													<option disabled selected>Select Department</option>
													<?php foreach ($departments as $dName) { ?>
														<option value="<?php echo $dName['department']; ?>">
															<?php echo $dName['department']; ?>
														</option>
													<?php } ?>
												</select>
											</div>

											<div class="form">
												<h5>Job Description <span>*</span></h5>
												<input type="text" name="jobDescription" id="summary" spellcheck="true"
													required>
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
												<h5>Province <span>*</span></h5>
												<select name="province" class="chosen-select-no-single">
													<option disabled selected>Select Province</option>
													<?php foreach ($provinces as $pName) { ?>
														<option value="<?php echo $pName['province']; ?>">
															<?php echo $pName['province']; ?>
														</option>
													<?php } ?>
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
											<h5>Experience <span>*</span> <i class="tip"
													data-tip-content="Junior = 0 to 3 Years of experience <br> Middle = 3 to 10 Years of experience <br> Senior = 10+ Years of experience"></i>
											</h5>
											<select name="experience" class="chosen-select-no-single">
												<option disabled selected>Select Experience</option>
												<option value="Junior">Junior</option>
												<option value="Middle">Middle</option>
												<option value="Senior">Senior</option>
											</select>
										</div>

										<!-- Type -->
										<div class="col-md-6">
											<h5>Education Level <span>*</span></h5>
											<select name="education" class="chosen-select-no-single">
												<option disabled selected>Select Education Level</option>
												<option value="Elementary School"> Elementary School</option>
												<option value="High School"> High School</option>
												<option value="Undergraduate"> Undergraduate</option>
												<option value="Graduate"> Graduate</option>
												<option value="Masters Degree"> Masters Degree</option>
											</select>
										</div>

									</div>

									<div class="row with-forms">

										<div class="col-md-6">
											<h5>Work Type <span>*</span></h5>
											<select name="workType" class="chosen-select-no-single">
												<option disabled selected>Select Work Type</option>
												<option value="Full Time"> Full Time</option>
												<option value="Part Time"> Part Time</option>
												<option value="Seasonal"> Seasonal / Project-based</option>
											</select>
										</div>

										<!-- Type -->
										<div class="col-md-6">
											<h5>Ending Date <span>*</span> <i class="tip"
													data-tip-content="Please indicate when this post will be deleted."></i>
											</h5>
											<input type="datetime-local" name="endDate" required>
										</div>

									</div>

									<h5 class="margin-top-30 margin-bottom-10">Language Preferences </h5>
									<div class="checkboxes in-row margin-bottom-20">

										<input id="check-a" type="checkbox" name="language[]" value="Turkish" <?php if (isset($_POST['language']) && in_array('Turkish', $_POST['language']))
											echo 'checked'; ?>>
										<label for="check-a">Turkish</label>

										<input id="check-b" type="checkbox" name="language[]" value="English" <?php if (isset($_POST['language']) && in_array('English', $_POST['language']))
											echo 'checked'; ?>>
										<label for="check-b">English</label>

										<input id="check-c" type="checkbox" name="language[]" value="German" <?php if (isset($_POST['language']) && in_array('German', $_POST['language']))
											echo 'checked'; ?>>
										<label for="check-c">German</label>

										<input id="check-d" type="checkbox" name="language[]" value="Russian" <?php if (isset($_POST['language']) && in_array('Russian', $_POST['language']))
											echo 'checked'; ?>>
										<label for="check-d">Russian</label>

										<input id="check-e" type="checkbox" name="language[]" value="French" <?php if (isset($_POST['language']) && in_array('French', $_POST['language']))
											echo 'checked'; ?>>
										<label for="check-e">French</label>

										<input id="check-f" type="checkbox" name="language[]" value="Arabic" <?php if (isset($_POST['language']) && in_array('Arabic', $_POST['language']))
											echo 'checked'; ?>>
										<label for="check-f">Arabic</label>

										<input id="check-g" type="checkbox" name="language[]" value="Persian" <?php if (isset($_POST['language']) && in_array('Persian', $_POST['language']))
											echo 'checked'; ?>>
										<label for="check-g">Persian</label>

										<input id="check-h" type="checkbox" name="language[]" value="Kurdish" <?php if (isset($_POST['language']) && in_array('Kurdish', $_POST['language']))
											echo 'checked'; ?>>
										<label for="check-h">Kurdish</label>


									</div>
								</div>

								<!-- Section / End -->


								<button type="submit" name="submitJob" class="button preview">Submit <i
										class="fa fa-arrow-circle-right"></i></a>
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
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
} else {
	echo '<script>alert("Please login first!");</script>';
	header("Location: ../");
	exit();
} ?>