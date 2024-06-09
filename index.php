<?php
include_once "config/connection.php";
<<<<<<< HEAD
include_once "search-job-model.php";
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11

$latestJobPostings = $dbh->prepare("SELECT * FROM jobs ORDER BY id DESC LIMIT 6");
$latestJobPostings->execute();
$lastJobs = $latestJobPostings->fetchAll(PDO::FETCH_ASSOC);
<<<<<<< HEAD

$provinces = $dbh->prepare("SELECT province FROM provinces");
$provinces->execute();
$province = $provinces->fetchAll(PDO::FETCH_ASSOC);

$jobs = $dbh->prepare("SELECT jobTitle FROM jobs");
$jobs->execute();
$job = $jobs->fetchAll(PDO::FETCH_ASSOC);
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
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
<<<<<<< HEAD
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
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11

</head>

<body>

	<!-- Wrapper -->
	<div id="wrapper">

		<?php include_once "header.php"; ?>


		<!-- Banner
================================================== -->
<<<<<<< HEAD
		<div class="main-search-container" data-background-image="http://www.vasterad.com/themes/listeo_updated/images/main-search-background-01.jpg">
=======
		<div class="main-search-container"
			data-background-image="http://www.vasterad.com/themes/listeo_updated/images/main-search-background-01.jpg">
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
			<div class="main-search-inner">

				<div class="container">
					<div class="row">
						<div class="col-md-12">
<<<<<<< HEAD
							<form method="GET" action="search-job.php">
								<h2>Find Nearby Attractions</h2>
								<h4>Explore top-rated attractions, activities and more</h4>

								<div class="main-search-input">

									<div class="main-search-input-item">
										<input type="text" id="searchTerm" name="searchTerm" class="form-control" placeholder="What are you looking for?" value="<?php echo isset($_GET['searchTerm']) ? htmlspecialchars($_GET['searchTerm']) : ''; ?>">
										<div id="searchSuggestions"></div>
									</div>

									<div class="main-search-input-item">
										<select name="filters[province][]" data-placeholder="All Provinces" class="chosen-select">
											<option disabled selected>All Provinces</option>
											<?php foreach ($province as $pro) { ?>
												<option value="<?php echo $pro['province']; ?>"><?php echo $pro['province']; ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="main-search-input-item">
										<select name="filters[sector][]" data-placeholder="All Sectors" class="chosen-select">
											<option disabled selected>All Sectors</option>
											<?php foreach ($sectors as $sector) { ?>
												<option value="<?php echo $sector['sector']; ?>"><?php echo $sector['sector']; ?></option>
											<?php } ?>
										</select>
									</div>

									<button type="submit" class="button">Search</button>

								</div>
							</form>
=======
							<h2>Find Nearby Attractions</h2>
							<h4>Expolore top-rated attractions, activities and more</h4>

							<div class="main-search-input">

								<div class="main-search-input-item">
									<input type="text" placeholder="What are you looking for?" value="" />
								</div>

								<div class="main-search-input-item location">
									<div id="autocomplete-container">
										<input id="autocomplete-input" type="text" placeholder="Location">
									</div>
									<a href="#"><i class="fa fa-map-marker"></i></a>
								</div>

								<div class="main-search-input-item">
									<select data-placeholder="All Categories" class="chosen-select">
										<option>All Categories</option>
										<option>Shops</option>
										<option>Hotels</option>
										<option>Restaurants</option>
										<option>Fitness</option>
										<option>Events</option>
									</select>
								</div>

								<button class="button" onclick="window.location.href='search-job'">Search</button>

							</div>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
						</div>
					</div>
				</div>

			</div>
		</div>


		<!-- Content
================================================== -->



		<!-- Fullwidth Section -->
		<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<h3 class="headline centered margin-bottom-45">
							Latest Job Postings
							<span>Discover the New Blue-Collar Jobs </span>
						</h3>
					</div>

					<div class="col-md-12">
						<div class="simple-slick-carousel dots-nav">

							<!-- Listing Item -->
							<?php foreach ($lastJobs as $jobs) { ?>
								<div class="carousel-item">
									<a href="listings-single-page.html" class="listing-item-container">
										<div class="listing-item">
											<img src="images/atilim-uni.jpg" alt="">

											<div class="listing-item-content">
												<span class="tag"><?php echo $jobs['sector']; ?></span>
												<h3><?php echo $jobs['jobTitle']; ?> <i class="verified-icon"></i></h3>
												<span><?php echo $jobs['companyName']; ?></span>
											</div>
										</div>
									</a>
								</div>
								<!-- Listing Item / End -->
							<?php } ?>
						</div>

					</div>

				</div>
			</div>

		</section>
		<!-- Fullwidth Section / End -->


		<!-- Info Section -->
		<div class="container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="headline centered margin-top-80">
						Discover the New Software <br>Blue-Collar Employers
						<span class="margin-top-25">Introducing our revolutionary job search software tailored for
							blue-collar workers! Explore countless opportunities with ease, backed by top tips from our
							global partners.</span>
					</h2>
				</div>
			</div>

			<div class="row icons-container">
				<!-- Stage -->
				<div class="col-md-4">
					<div class="icon-box-2 with-line">
						<i class="im im-icon-Mail-withAtSign"></i>
						<h3>Register</h3>
						<p>Easily sign up to access our platform and unlock countless blue-collar job opportunities.
						</p>
					</div>
				</div>

				<!-- Stage -->
				<div class="col-md-4">
					<div class="icon-box-2 with-line">
						<i class="im im-icon-Helmet-2"></i>
						<h3>Search/Post Job</h3>
						<p>Effortlessly navigate job listings or post openings tailored for blue-collar professions with
							our intuitive search and posting features.</p>
					</div>
				</div>

				<!-- Stage -->
				<div class="col-md-4">
					<div class="icon-box-2">
						<i class="im im-icon-Checked-User"></i>
						<h3>Contact with Employer/Employee</h3>
						<p>Seamlessly connect with potential employers or employees to discuss job opportunities and
							requirements on our platform.</p>
					</div>
				</div>
<<<<<<< HEAD

			</div>
			<div class="button-container" style="text-align: center; margin-top: 50px; margin-bottom: 20px;">
				<a href="login/user-register" class="button" style="background-color: #004dda;">Start the Journey <i class="fa fa-arrow-circle-right"></i></a>
			</div>
=======
				
			</div>
			<div class="button-container" style="text-align: center; margin-top: 50px; margin-bottom: 20px;">
					<a href="login/user-register" class="button" style="background-color: #004dda;">Start the Journey <i
							class="fa fa-arrow-circle-right"></i></a>
				</div>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
		</div>
		<!-- Info Section / End -->


		<!-- Footer
================================================== -->
		<?php include_once "footer.php"; ?>
		<!-- Footer / End -->


		<!-- Back To Top Button -->
		<div id="backtotop"><a href="#"></a></div>


	</div>
	<!-- Wrapper / End -->


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

<<<<<<< HEAD
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
=======

	<!-- Google Autocomplete -->
	<script>
		function initAutocomplete() {
			var input = document.getElementById('autocomplete-input');
			var autocomplete = new google.maps.places.Autocomplete(input);

			autocomplete.addListener('place_changed', function () {
				var place = autocomplete.getPlace();
				if (!place.geometry) {
					window.alert("No details available for input: '" + place.name + "'");
					return;
				}
			});

			if ($('.main-search-input-item')[0]) {
				setTimeout(function () {
					$(".pac-container").prependTo("#autocomplete-container");
				}, 300);
			}
		}
	</script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4t4fqmiMhTy9q24S6fjs6HwRmUwe7Nos&libraries=places&callback=initAutocomplete"></script>
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11


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