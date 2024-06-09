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
<<<<<<< HEAD

if (isset($_SESSION['admin'])) {

	?>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Main">
				<li class=""><a href="../dashboard"><i class="sl sl-icon-home"></i> Dashboard</a></li>
			</ul>

			<ul data-submenu-title="Listings">
				<li><a href="company-applications"><i class="sl sl-icon-list"></i> Company Applications</a></li>
				<li><a href="job-postings"><i class="sl sl-icon-layers"></i> Job Postings </a></li>
				<li><a href="companies"><i class="sl sl-icon-globe"></i> Verified Companies</a></li>
			</ul>

			<ul data-submenu-title="Account">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="sl sl-icon-people"></i> Manage Users <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="employers"><i class="sl sl-icon-briefcase"></i>Employers</a></li>
						<li><a href="employees"><i class="sl sl-icon-grid"></i>Employees</a></li>
					</ul>
				</li>
				<li><a href="logs"><i class="sl sl-icon-notebook"></i> System Logs</a></li>
				<li><a href="inform-users"><i class="sl sl-icon-envelope-open"></i> Inform Users</a></li>
				<li><a href="../login/logout"><i class="sl sl-icon-power"></i> Logout</a></li>
			</ul>

		</div>
	</div>

	<?php
}
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
?>

