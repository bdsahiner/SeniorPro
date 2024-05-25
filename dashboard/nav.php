<?php

if (isset($_SESSION['user'])) {

	?>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Main">
				<li class=""><a href="../dashboard"><i class="sl sl-icon-home"></i> Dashboard</a></li>
			</ul>

			<ul data-submenu-title="Listings">
				<li><a href="my-jobs"><i class="sl sl-icon-layers"></i> Applied Jobs</a></li>
				<li><a href="bookmarks"><i class="sl sl-icon-heart"></i> Bookmarks</a></li>
			</ul>

			<ul data-submenu-title="Account">
				<li><a href="my-profile"><i class="sl sl-icon-user"></i> My Profile</a></li>
				<li><a href="cv-builder"><i class="sl sl-icon-doc"></i> CV Builder</a></li>
				<li><a href="../login/logout"><i class="sl sl-icon-power"></i> Logout</a></li>
			</ul>

		</div>
	</div>

	<?php
}
?>

<?php

if (isset($_SESSION['employer'])) {

	?>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Main">
				<li class=""><a href="../dashboard"><i class="sl sl-icon-home"></i> Dashboard</a></li>
			</ul>

			<ul data-submenu-title="Listings">
				<li><a href="my-job-posts"><i class="sl sl-icon-layers"></i> My Job Posts</a></li>
				<li><a href="applicants"><i class="sl sl-icon-layers"></i> Applicants </a></li>
			</ul>

			<ul data-submenu-title="Account">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="sl sl-icon-user"></i> Profile <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="my-profile">My Profile</a></li>
						<li><a href="company-profile">Company Profile</a></li>
					</ul>
				</li>
				<li><a href="../login/logout"><i class="sl sl-icon-power"></i> Logout</a></li>
			</ul>

		</div>
	</div>

	<?php
}
?>

