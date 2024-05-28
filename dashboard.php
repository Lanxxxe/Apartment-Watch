<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
    exit();
}

// Get the tenants
try {
    require_once "includes/databaseConnection.php"; // Adjust the path as needed

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Query to get the total number of apartments
        $allApartmentsQuery = "
            SELECT COUNT(b.Building_ID) AS apartments
            FROM Owner_Acc_Table o
            LEFT JOIN Building_Table b ON o.Account_ID = b.Owner_ID
            WHERE o.Account_ID = :user_id;
        ";

        $statement = $PHP_Data_Object->prepare($allApartmentsQuery);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $total_apartments = $result['apartments'];
        } else {
            $total_apartments = "An error occurred";
        }

        // Query to get the total number of rooms
        $totalRoomsQuery = "
            SELECT SUM(b.Total_Rooms) AS Total_Rooms
            FROM Owner_Acc_Table o
            JOIN Building_Table b ON o.Account_ID = b.Owner_ID
            WHERE o.Account_ID = :user_id;
        ";

        $statement = $PHP_Data_Object->prepare($totalRoomsQuery);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $total_rooms = $result['Total_Rooms'];
        } else {
            $total_rooms = "An error occurred";
        }

        // Query to get the total number of tenants
        $totalTenantsQuery = "
            SELECT COUNT(DISTINCT t.Tenant_ID) AS Total_Tenants
            FROM Owner_Acc_Table o
            JOIN Building_Table b ON o.Account_ID = b.Owner_ID
            JOIN Rooms_Table r ON b.Building_ID = r.Apartment_ID
            JOIN Tenants_Table t ON r.Room_ID = t.Assigned_Room
            WHERE o.Account_ID = :user_id;
        ";

        $statement = $PHP_Data_Object->prepare($totalTenantsQuery);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $total_tenants = $result['Total_Tenants'];
        } else {
            $total_tenants = "An error occurred";
        }

        // Close the connection
        $PHP_Data_Object = null;
        $statement = null;
    } else {
        echo '<p class="">User is not logged in.</p>';
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
        <div class="side-nav-bar d-none d-sm-block">
            <?php include './includes/navigation.php' ?>
        </div>

        <div class="main-content container-fluid p-4">

            <div class="landlord-info contianer-fluid d-flex align-items-center justify-content-between ">
                <div class="d-flex align-items-center justify-content-start p-2 gap-2">
                    <img class="owner-img" src="./images/person.png" alt="Landlord Image">
                    <div class="owner-name mx-2">
                        <p class="fs-5 fw-bold"><?php echo $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] ?> </p>
                        <p class="fst-italic">Owner</p>
                    </div>
                </div>
            </div>

            <div class="landlord-dashboard mt-5 d-flex flex-wrap align-items-center justify-content-start">
                <div class="apartment-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Total Apartments</p>
                        <i class="bi bi-buildings fs-4"></i>
                    </div>
                    <p class=""><?php echo $total_apartments ?></p>
                    <a class="text-end" href="">View Apartments</a>
                </div>
                <div class="tenants-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">

  
                        <p class="mt-2">Number of Tenants</p>
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <p class=""><?php echo $total_tenants ?></p>
                    <a class="text-end " href="">Tenants Information</a>
                </div>
                <div class="rooms-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Total Rooms</p>
                        <i class="bi bi-door-open fs-4"></i>
                    </div>
                    <p class=""><?php echo $total_rooms ?></p>
                    <a class="text-end " href="">Check Rooms</a>
                </div>
                <div class="income-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Expected Income</p>
                        <i class="bi bi-graph-up-arrow fs-4"></i>
                    </div>
                    <p class="">P18374</p>
                    <a class="text-end " href="">Check Payments </a>
                </div>
                <div class="income-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Expenses</p>
                        <i class="bi bi-clipboard-data fs-4"></i>
                    </div>
                    <p class="">P5843</p>
                    <a class="text-end " href="">Expenses Breakdown</a>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>