<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="../BlueCollarInsight"><img src="images/logo.png" alt=""></a>
				</div>



				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="search-job"><sl-icon name="icon-name-here"></sl-icon>Search Job</a></li>

						<li><a href="contact"><i class="sl sl-icon-envelope-open"></i> Contact</a></li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">

					<?php
					// Start the session
					if (session_status() === PHP_SESSION_NONE) {
						session_start();
					}

					// Check if any session is set
					if (isset($_SESSION['user'])) {
						// Session is set for user, display "My Profile" button for user dashboard
						echo '<a href="dashboard/" class="sign-in"><i class="sl sl-icon-user"></i> My Profile</a>';
					} elseif (isset($_SESSION['employer'])) {
						// Session is set for employer, display "My Profile" button for employer dashboard
						echo '<a href="dashboard/" class="sign-in"><i class="sl sl-icon-user"></i> My Profile</a>';
					} elseif (isset($_SESSION['admin'])) {
						// Session is set for admin, display "My Profile" button for admin dashboard
						echo '<a href="dashboard/" class="sign-in"><i class="sl sl-icon-user"></i> My Profile</a>';
					} else {
						// Session is not set, display "Sign In" button
						echo '<a href="login/login" class="sign-in"><i class="sl sl-icon-login"></i> Sign In</a>';
					}
					?>

					<?php

					// Check if any session is set
					if (!isset($_SESSION['user']) && !isset($_SESSION['employer']) && !isset($_SESSION['admin'])) {
						// Session is set, display "My Profile" button
						echo '<a href="login/user-register" class="button border with-icon">Register<i class="sl sl-icon-plus"></i></a>';
					}
					?>

				</div>
			</div>
			<!-- Right Side Content / End -->

			<!-- Sign In Popup -->

			<!-- Sign In Popup / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>

<div class="clearfix"></div>
<!-- Header Container / End -->