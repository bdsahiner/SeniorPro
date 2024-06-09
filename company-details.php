<?php

include_once "config/connection.php";
$compId = $_GET['id'];

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
	<!-- <style>
		.disabled {
			pointer-events: none;
			background-color: #dddddd;
			/* Change the background color to visually indicate it's disabled */
			color: #888888;
			/* Change the text color to visually indicate it's disabled */
		}
	</style> -->
	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header Container
================================================== -->

		<?php include_once "header.php"; ?>

		<div class="clearfix"></div>
		<!-- Header Container / End -->


		<!-- Gradient-->
		<div class="single-listing-page-titlebar"></div>


		<!-- Content
================================================== -->
		<div class="container">
			<div class="row sticky-wrapper">
				<div class="col-lg-8 col-md-8 padding-right-30">
					<?php

					$conn = $dbh->prepare("SELECT * FROM companies WHERE employerId = ?");
					$conn->execute([$compId]);
					$bring = $conn->fetchAll(PDO::FETCH_ASSOC);

					foreach ($bring as $company) {

						?>
						<!-- Titlebar -->
						<div id="titlebar" class="listing-titlebar">
							<div class="listing-titlebar-title">
								<h2><?php echo $company['companyName'] ?> <span
										class="listing-tag"><?php echo $company['sector'] ?></span></h2>
								<br>
								<span>
									<p class="listing-address">
										<i class="fa fa-calendar"> Established in: </i>
										<?php echo date('d F, Y', strtotime($company['establishDate'])); ?>
									</p>
								</span>
                                <br>
                                <span>Employee Count: <?php echo $company['employeeCount'] ?></span>
							</div>
						</div>

						<!-- Overview -->
						<div id="listing-overview" class="listing-section">
							<!-- Description -->
							<p>
								<?php echo $company['companyDescription'] ?>
							</p>
						</div>


						<!-- Location -->
						<div id="listing-location" class="listing-section">
							<h3 class="listing-desc-headline margin-top-60 margin-bottom-30"><i class="fa fa-map-marker"
									style="padding-right:7px;"></i><span><?php echo $company['headQuarters']; ?>, Turkiye <?php ?>
								</span></h3>
						</div>

					</div>


					<!-- Sidebar
		================================================== -->
					<div class="col-lg-4 col-md-4 margin-top-75 sticky">

					</div>
					<!-- Sidebar / End -->

				</div>

			<?php } ?>
		</div>


		<!-- Footer
================================================== -->
		<?php include_once "footer.php"; ?>
		<!-- Footer / End -->


		<!-- Back To Top Button -->
		<div id="backtotop"><a href="#"></a></div>


	</div>
	<!-- Wrapper / End -->

	<!-- Confirm if user wants to apply to the job-->
	<script>
		function confirmApply() {
			// Show a confirmation dialog
			var confirmApply = confirm("Are you sure you want to apply for this job?");
			// Return true if the user confirms, otherwise return false
			return confirmApply;
		}
	</script>

	<script>
		// Prevent default action when the disabled button is clicked
		document.getElementById('disabled-button').addEventListener('click', function (event) {
			event.preventDefault();
		});
	</script>

	<script>
		function redirectToBookmarkModel(jobId) {
			// Redirect to the bookmark model URL with the jobId
			window.location.href = 'model/save-job-model?id=' + jobId;
		}

		// Attach event listener to the button
		document.getElementById('bookmark-job').addEventListener('click', function () {
			redirectToBookmarkModel(<?php echo $companyId ?>);
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

	<!-- Maps -->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
	<script type="text/javascript" src="scripts/infobox.min.js"></script>
	<script type="text/javascript" src="scripts/markerclusterer.js"></script>
	<script type="text/javascript" src="scripts/maps.js"></script>


	<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
	<link href="css/plugins/datedropper.css" rel="stylesheet" type="text/css">
	<script src="scripts/datedropper.js"></script>
	<script>$('#booking-date').dateDropper();</script>

	<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
	<script src="scripts/timedropper.js"></script>
	<link rel="stylesheet" type="text/css" href="css/plugins/timedropper.css">
	<script>
		this.$('#booking-time').timeDropper({
			setCurrentTime: false,
			meridians: true,
			primaryColor: "#1ec755",
			borderColor: "#1ec755",
			minutesInterval: '15'
		});

		var $clocks = $('.td-input');
		_.each($clocks, function (clock) {
			clock.value = null;
		});
	</script>

	<!-- Booking Widget - Quantity Buttons -->
	<script src="scripts/quantityButtons.js"></script>



	<!-- Style Switcher
================================================== -->
	<script src="scripts/switcher.js"></script>

	<div id="style-switcher">
		<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>

		<div>
			<ul class="colors" id="color1">
				<li><a href="#" class="main" title="Main"></a></li>
				<li><a href="#" class="blue" title="Blue"></a></li>
				<li><a href="#" class="green" title="Green"></a></li>
				<li><a href="#" class="orange" title="Orange"></a></li>
				<li><a href="#" class="navy" title="Navy"></a></li>
				<li><a href="#" class="yellow" title="Yellow"></a></li>
				<li><a href="#" class="peach" title="Peach"></a></li>
				<li><a href="#" class="beige" title="Beige"></a></li>
				<li><a href="#" class="purple" title="Purple"></a></li>
				<li><a href="#" class="celadon" title="Celadon"></a></li>
				<li><a href="#" class="red" title="Red"></a></li>
				<li><a href="#" class="brown" title="Brown"></a></li>
				<li><a href="#" class="cherry" title="Cherry"></a></li>
				<li><a href="#" class="cyan" title="Cyan"></a></li>
				<li><a href="#" class="gray" title="Gray"></a></li>
				<li><a href="#" class="olive" title="Olive"></a></li>
			</ul>
		</div>

	</div>
	<!-- Style Switcher / End -->


</body>

</html>