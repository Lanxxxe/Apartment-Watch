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
                'Dashboard' => 'dashboard.php',
                'Apartment Status' => 'apartment_status.php',
                'Tenants Information' => 'tenants_information.php',
                'Commerce' => 'commerce.php',
                'Log Out' => 'logout.php'
            );

            foreach($navigation_links as $navItem => $navLink) {
                echo "
                <li class='nav-item'>
                    <a class='nav-link mx-3' href='$navLink'><i class='bi bi-building-check'></i> $navItem</a>
                </li>
                ";
            };
        ?>
    </ul>
</nav>

