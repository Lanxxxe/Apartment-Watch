<nav class="navbar mt-3">
    <div class="logo-container text-wrap d-flex align-items-center">
        <a href="#" class="navbar-brand">
            <img class="navbar-logo d-inline-block align-text-center" src="./images/AW-logo.png" alt="Navbar Logo">
        </a>
        <p class="mt-4">Apartment Watch</p>
    </div>
    <ul class="navbar-nav mt-3">
        <?php 
        
            $navigation_links = array (
                'Dashboard' => ['dashboard.php', 'bi bi-bar-chart'],
                'Apartment Status' => ['apartmentStatus.php', 'bi bi-building-check'],
                'Room Status' => ['roomStatus.php', 'bi bi-door-open'],
                'Tenants Information' => ['tenantsInformation.php', 'bi bi-person-bounding-box'],
                'Log Out' => ['./includes/logout.php', 'bi bi-arrow-bar-left']
            );

            foreach($navigation_links as $navItem => $navLink) {
                echo "
                <li class='nav-item'>
                    <a class='nav-link mx-3' href='$navLink[0]'><i class='$navLink[1]'></i> $navItem</a>
                </li>
                ";
            };
        ?>
    </ul>
</nav>

