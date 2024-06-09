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

	<style>
		.contact-map .address-box-container {
			width: 100% !important;
		}
	</style>

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header Container
================================================== -->

		<?php include_once "header.php"; ?>

		<div class="clearfix"></div>
		<!-- Header Container / End -->


		<!-- Content
================================================== -->

		<!-- Map Container -->
		<div class="contact-map margin-bottom-60">

			<!-- Office -->
			<div class="address-box-container">
				<div class="address-container"
					data-background-image="http://www.vasterad.com/themes/listeo_updated/images/our-office.jpg">
					<div class="office-address">
						<h3>Our Office</h3>
						<ul>
							<li>Atilim University Faculty of Engineering</li>
							<li>Ankara</li>
							<li>Phone (553) 362-2568 </li>
						</ul>
					</div>
				</div>
			</div>
			<!-- Office / End -->

		</div>
		<div class="clearfix"></div>
		<!-- Map Container / End -->


		<!-- Container / Start -->
		<div class="container" align="center">

			<div class="row">

				<!-- Contact Form -->
				<div class="col-md-12">

					<section id="contact">
						<h4 class="headline margin-bottom-35">Contact Form</h4>

						<div id="contact-message"></div>

						<form method="POST" action="model/contact-model.php" autocomplete="on">

							<div class="row">
								<div class="col-md-6">
									<div>
										<input name="name" type="text" id="name" placeholder="Your Name"
											required>
									</div>
								</div>

								<div class="col-md-6">
									<div>
										<input name="email" type="email" id="email" placeholder="Email Address"
											pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$"
											required>
									</div>
								</div>
							</div>

							<div>
								<input name="subject" type="text" id="subject" placeholder="Subject"
									required>
							</div>

							<div>
								<textarea name="comments" cols="40" rows="3" id="comments" placeholder="Message"
									spellcheck="true" required></textarea>
							</div>
							<div class="buttonSubmit" style="margin-bottom: 30px; margin-top: -20px;">
								<button type="submit" name="submit" class="button preview">Submit <i class="fa fa-arrow-circle-right"></i>
							</div>


						</form>
					</section>
				</div>
				<!-- Contact Form / End -->

			</div>

		</div>
		<!-- Container / End -->



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