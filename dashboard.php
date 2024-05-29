<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
    exit();
}

// Get the tenants
try {
    require_once "model/databaseConnection.php"; // Adjust the path as needed

    if (isset($_SESSION['user_id'])) {
        // Query to get the total number of apartments
        $query = "
        SELECT 
            COUNT(DISTINCT b.Building_ID) AS Total_Apartments,
            SUM(b.Total_Rooms) AS Total_Rooms,
            COUNT(DISTINCT t.Tenant_ID) AS Total_Tenants,
            SUM(r.Rent_Amount) AS Total_Rent
        FROM 
            Owner_Acc_Table o
        LEFT JOIN 
            Building_Table b ON o.Account_ID = b.Owner_ID
        LEFT JOIN 
            Rooms_Table r ON b.Building_ID = r.Apartment_ID
        LEFT JOIN 
            Tenants_Table t ON r.Room_ID = t.Assigned_Room
        WHERE 
            o.Account_ID = :user_id;
        
        ";

        $statement = $PHP_Data_Object->prepare($query);
        $statement->bindParam(':user_id', $_SESSION['user_id']);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            $TotalApartments = $result['Total_Apartments'];
            $TotalRooms = $result['Total_Rooms'];
            $TotalTenants = $result['Total_Tenants'];
            $TotalRent = $result['Total_Rent'];
        
        } else {
            $TotalApartments = 0;
            $TotalRooms = 0;
            $TotalTenants = 0;
            $TotalRent = 0;
        }

        // Close the connection
        $PHP_Data_Object = null;
        $statement = null;
    } else {
        echo '<p class="text-center fs-1">User is not logged in.</p>';
    }
} catch (PDOException $error) {
    echo '<p class="">Failed: ' . $error->getMessage() . '</p>';
}


include_once './includes/header.php';
?>
    <link rel="stylesheet" href="./styles/style_dashboard.css">
    <title>A.W. | Dashboard</title>
</head>

<body>  

    <div class="body-content d-flex">
        <div class="side-nav-bar d-none d-sm-block ">
            <?php include './includes/navigation.php' ?>
        </div>

        <div class="main-content container-fluid p-4">

            <div class="landlord-info contianer-fluid d-flex align-items-center justify-content-between " data-aos="fade-down"  data-aos-duration="1300">
                <div class="d-flex align-items-center justify-content-start p-2 gap-2">
                    <img class="owner-img" src="./images/person.png" alt="Landlord Image">
                    <div class="owner-name mx-2">
                        <p class="fs-5 fw-bold"><?php echo $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] ?> </p>
                        <p class="fst-italic">Owner</p>
                    </div>
                </div>
            </div>

            <div class="landlord-dashboard mt-5 d-flex flex-wrap align-items-center justify-content-start">
                <div class="apartment-card p-3 d-flex flex-column" data-aos="fade-up"  data-aos-duration="1300" data-aos-delay="300">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Total Apartments</p>
                        <i class="bi bi-buildings fs-4"></i>
                    </div>
                    <p class=""><?php echo $TotalApartments ?></p>
                    <a class="text-end" href="./apartmentStatus.php">View Apartments</a>
                </div>
                <div class="tenants-card p-3 d-flex flex-column" data-aos="fade-up"  data-aos-duration="1300" data-aos-delay="400">
                    <div class="d-flex justify-content-between">

  
                        <p class="mt-2">Number of Tenants</p>
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <p class=""><?php echo $TotalTenants ?></p>
                    <a class="text-end " href="./tenantsInformation.php">Tenants Information</a>
                </div>
                <div class="rooms-card p-3 d-flex flex-column" data-aos="fade-up"  data-aos-duration="1300" data-aos-delay="500">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Total Rooms</p>
                        <i class="bi bi-door-open fs-4"></i>
                    </div>
                    <?php 
                    if ($TotalRooms != 0) {

                        ?>
                    <p class=""><?php echo $TotalRooms ?></p>
                    <?php
                } else {
                    ?>
                    <p class="">0</p>
                <?php 
                }
                    ?>
                    <a class="text-end " href="./roomStatus.php">Check Rooms</a>
                </div>
                <div class="income-card p-3 d-flex flex-column" data-aos="fade-up"  data-aos-duration="1300" data-aos-delay="600">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Expected Income</p>
                        <i class="bi bi-graph-up-arrow fs-4"></i>
                    </div>
                    <p class="">&#x20B1; <?php echo $TotalRent ?></p>
                    <a class="text-end " href="./paymentStatus.php">Check Payments </a>
                </div>
            </div>
        </div>

    </div>

    <?php include './includes/footer.php' ?>
</body>

</html>