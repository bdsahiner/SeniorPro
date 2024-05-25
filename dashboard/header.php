<?php

if (isset($_SESSION['user'])) {
    ?>
    <header id="header-container" class="fixed fullwidth dashboard">

        <!-- Header -->
        <div id="header" class="not-sticky">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo" style="background-color: #FFF;">
                        <a href="../"><img src="../images/logo.png" alt=""></a>
                        <a href="../" class="dashboard-logo"><img src="../images/logo.png" alt=""></a>
                    </div>

                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End -->
                <div class="right-side">
                    <!-- Header Widget -->
                    <div class="header-widget">

                        <!-- User Menu -->
                        <div class="user-menu">
                            <div class="user-name"><a href="../login/logout.php"><i class="sl sl-icon-power"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- Header Widget / End -->
                </div>
                <!-- Right Side Content / End -->

            </div>
        </div>
        <!-- Header / End -->

    </header>

    <?php
} ?>

<?php

if (isset($_SESSION['employer'])) {
    ?>
    <header id="header-container" class="fixed fullwidth dashboard">

        <!-- Header -->
        <div id="header" class="not-sticky">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo" style="background-color: #FFF; padding: 30px 0px;">
                        <a href="../"><img src="../images/logo.png" alt=""></a>
                        <a href="../" class="dashboard-logo"><img src="../images/logo.png" alt=""></a>
                    </div>

                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End -->
                <div class="right-side">
                    <!-- Header Widget -->
                    <div class="header-widget">

                        <!-- User Menu -->
                        <div class="user-menu">
                            <div class="user-name"><a href="../login/logout.php"><i class="sl sl-icon-power"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- Header Widget / End -->
                </div>
                <!-- Right Side Content / End -->

            </div>
        </div>
        <!-- Header / End -->

    </header>

    <?php
} ?>