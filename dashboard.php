<?php 
session_start();
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
                    <?php
                    try {
                        require_once "includes/databaseConnection.php"; // Adjust the path as needed
                    
                        // Ensure the user is logged in and user_id is set in the session
                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];
                    
                            $query = "
                                SELECT owner_acc_table.account_id, COUNT(building_table.owner_id) AS apartments
                                FROM owner_acc_table
                                LEFT JOIN building_table ON owner_acc_table.account_id = building_table.owner_id
                                WHERE owner_acc_table.account_id = :user_id
                                GROUP BY owner_acc_table.account_id;
                            ";
                            
                            $statement = $PHP_Data_Object->prepare($query);
                            $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                    
                            if ($statement->execute()) {
                                $result = $statement->fetch(PDO::FETCH_ASSOC);
                                $total_apartments = $result['apartments'];
                    
                                // Display the total count in the <p> tag
                                echo '<p class="">' . $total_apartments . '</p>';
                            } else {
                                echo '<p class="">Query execution failed.</p>';
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
                    ?>
                    <a class="text-end" href="">View Apartments</a>
                </div>
                <div class="tenants-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Number of Tenants</p>
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <p class="">54</p>
                    <a class="text-end " href="">Tenants Information</a>
                </div>
                <div class="rooms-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Total Rooms</p>
                        <i class="bi bi-door-open fs-4"></i>
                    </div>
                    <p class="">23</p>
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