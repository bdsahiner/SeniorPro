<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['user'])) {

	include_once "../model/cv-builder-model.php";
	include_once "../config/connection.php";

	$provinces = $dbh->prepare("SELECT province FROM provinces");
	$provinces->execute();
	$province = $provinces->fetchAll(PDO::FETCH_ASSOC);

	$cvData = $dbh->prepare("SELECT * FROM cvbuilder WHERE userId = ?");
	$cvData->execute([$userId]);
	$cvFetch = $cvData->fetchAll(PDO::FETCH_ASSOC);

	$cvID = isset($cvFetch[0]['id']) ? $cvFetch[0]['id'] : null;

	if (!empty($cvID)) {

		header("Location: cv-template");
		?>

		<?php
	} elseif (empty($cvID)) { ?>

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
									<h2>CV Builder</h2>
									<!-- Breadcrumbs -->
									<nav id="breadcrumbs">
										<ul>
											<li><a href="../">Home</a></li>
											<li><a href="../dashboard">Dashboard</a></li>
											<li>CV Builder</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">

								<div id="add-listing">
									<form action="" name="cvForm" method="POST">
										<!-- Section -->
										<div class="add-listing-section">

											<!-- Headline -->
											<div class="add-listing-headline">
												<h3><i class="sl sl-icon-doc"></i> General Informations</h3>
											</div>

											<!-- Title -->
											<div class="row with-forms">
												<div class="col-md-6">
													<h5>General Description <span>*</span> <i class="tip"
															data-tip-content="Explain about yourself. This will be showed in the beginning of the CV. Maximum 2000 characters allowed."></i>
													</h5>
													<textarea class="search-field" type="text" name="generalDescription" required></textarea>
												</div>
											</div>

											<!-- Row -->
											<div class="row with-forms">
												<div class="col-md-6">
													<h5>Full Name <span>*</span></h5>
													<input class="search-field" type="text" name="fullName" required>
												</div>
											</div>
											<!-- Row / End -->

											<!-- Row -->
											<div class="row with-forms">
												<div class="col-md-6">
													<h5>Email Address <span>*</span></h5>
													<input class="search-field" type="email" name="emailAddress" required>
												</div>
											</div>
											<!-- Row / End -->

											<!-- Row -->
											<div class="row with-forms">
												<div class="col-md-6">
													<h5>Phone Number <span>*</span></h5>
													<input class="search-field" type="number" name="phoneNumber" required>
												</div>
											</div>
											<!-- Row / End -->

											<!-- Row -->
											<div class="row with-forms">
												<div class="col-md-6">
													<h5>Province <span>*</span> <i class="tip"
															data-tip-content="Your current residency"></i></h5>
													<select name="province" class="chosen-select-no-single">
														<option disabled selected>Select Province</option>
														<?php foreach ($province as $pName) { ?>
															<option value="<?php echo $pName['province']; ?>">
																<?php echo $pName['province']; ?>
															</option>
														<?php } ?>
													</select>
												</div>
											</div>
											<!-- Row / End -->

										</div>
										<!-- Section / End -->

										<!-- Section -->
										<div class="add-listing-section margin-top-45">
											<!-- Headline -->
											<div class="add-listing-headline">
												<h3><i class="sl sl-icon-docs"></i> Education <i class="tip"
														data-tip-content="This section is optional."></i></h3>
											</div>
											<!-- Row -->
											<div class="row with-forms">
												<div class="col-md-4">
													<h5>University/High School Title</h5>
													<input type="text" name="eduSchoolTitle">
												</div>
												<div class="col-md-4">
													<h5>Department/Faculty</h5>
													<input type="text" name="eduDepartment">
												</div>
												<div class="col-md-4">
													<h5>Years Studied</h5>
													<input type="number" name="eduYears">
												</div>
												<div class="col-md-12">
													<h5>Description</h5>
													<input type="text" name="eduDescription">
												</div>
											</div>
											<!-- Row / End -->

											<!-- Output Container for Dynamically Generated Rows -->
											<div id="outputt"></div>
										</div>
										<!-- Section / End -->

										<!-- Section -->
										<div class="add-listing-section margin-top-45">
											<!-- Headline -->
											<div class="add-listing-headline">
												<h3><i class="sl sl-icon-docs"></i> Details</h3>
											</div>
											<!-- Row -->
											<div class="row with-forms">
												<!-- Number of Experience Input -->
												<div class="col-md-4">
													<h5>Number of Experience <span>*</span> <i class="tip"
															data-tip-content="Please write how many companies you worked for before. After writing the number, give the relevant details. If you haven't worked before, write '0'."></i>
													</h5>
													<input type="number" id="times" name="totalExperience"
														oninput="renderExperienceHTML()" required>
												</div>
											</div>
											<!-- Row / End -->

											<!-- Output Container for Dynamically Generated Rows -->
											<div id="output"></div>
										</div>
										<!-- Section / End -->

										<!-- Section -->
										<div class="add-listing-section margin-top-45">
											<!-- Headline -->
											<div class="add-listing-headline">
												<h3><i class="sl sl-icon-plus"></i> Additional</h3>
											</div>
											<!-- Row -->
											<div class="row with-forms">
												<!-- Number of Experience Input -->
												<div class="col-md-12">
													<h5>Additional Comments <i class="tip"
															data-tip-content="Please write if you would like to add anything else about yourself for employers in Blue Collar Insight platform."></i>
													</h5>
													<textarea type="text" name="additionalDescription"></textarea>
												</div>
											</div>
											<!-- Row / End -->

											<!-- Section / End -->

											<button type="submit" name="submitCV" class="button preview">Submit <i
													class="fa fa-arrow-circle-right"></i></a>
									</form>
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

			<!-- To handle the "Experience" input -->
			<script>
				function renderExperienceHTML() {
					var times = parseInt(document.getElementById('times').value);
					var outputDiv = document.getElementById('output');
					outputDiv.innerHTML = '';

					if (!isNaN(times) && times > 0) {
						for (var i = 0; i < times; i++) {
							outputDiv.innerHTML += `
								<div class="row with-forms">
								  <div class="col-md-12">
									<h4>Experience ${i + 1}</h4>
								  </div>
								  <div class="col-md-4">
									<h5>Job Title</h5>
									<input type="text" name="expTitle${i}">
								  </div>
								  <div class="col-md-4">
									<h5>Company</h5>
									<input type="text" name="expCompany${i}">
								  </div>
								  <div class="col-md-4">
									<h5>Months of Experience</h5>
									<input type="number" name="expMonths${i}">
								  </div>
								  <div class="col-md-12">
									<h5>Description</h5>
									<input type="text" name="expDescription${i}">
								  </div>
								</div>
								`;
						}
					}
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


			<!-- DropZone | Documentation: http://dropzonejs.com -->
			<script type="text/javascript" src="scripts/dropzone.js"></script>


		</body>

		</html>

		<?php
	}
} else {
	echo '<script>alert("Please login first!");</script>';
	header("Location: ../");
	exit();
} ?>