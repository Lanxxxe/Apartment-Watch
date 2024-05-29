<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
    exit();
}

include './model/databaseConnection.php';
include_once './includes/header.php';
?>
<link rel="stylesheet" href="./styles/style_apartment_status.css">
<title>A.W. | Apartments</title>
</head>

<body>

    <div class="body-content d-flex">
        <div class="side-nav-bar d-none d-sm-block">
            <?php include './includes/navigation.php' ?>
        </div>

        <!-- Apartment Name, Location, Total Rooms, Vacant, Occupied, Under Maintenance -->

        <div class="main-content container-fluid p-4">

            <div class="mt-2">
                <div class="apartment-name d-flex align-items-center justify-content-between px-2">
                    <p class="fw-bold"><?php 
                    echo $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] 
                    ?></p>
                    
                </div>
                <table class="">
                    <thead>
                        <tr>
                            <td class="" scope="col">Tenant Name</td>
                            <td scope="col">Month Payment</td>
                            <td scope="col">Payment Status</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                            $query = "
                                SELECT 
                                    payment_status AS Payment_Status,
                                    monthly_payment AS Monthly_Payment,
                                    t.first_name AS f_name,
                                    t.last_name AS l_name,
                                    p.tenant_id AS Tenant_ID
                                FROM
                                    payments p,
                                    tenants_table t,
                                    rooms_table r, 
                                    building_table b,
                                    owner_acc_table o
                                WHERE   
                                    o.Account_ID = b.Owner_ID AND b.Building_ID = r.Apartment_ID AND r.Room_ID = t.Assigned_Room AND t.Tenant_ID = p.tenant_id AND o.Account_ID = :user_id;  

                            ";

                            $statement = $PHP_Data_Object->prepare($query);

                            $statement->bindParam(':user_id', $_SESSION['user_id']);

                            $statement->execute();

                            $apartments= $statement->fetchAll(PDO::FETCH_ASSOC);

                            if (count($apartments) > 0) {
                                foreach($apartments as $apartment) {
                                    $modalId = 'updateTenant' . $apartment['Tenant_ID'];
                        ?>

                        <tr>
                            <td><?php echo $apartment['f_name'] . ' ' . $apartment['l_name'] ?></td>
                            <td><?php echo $apartment['Monthly_Payment'] ?></td>
                            <td><?php echo $apartment['Payment_Status'] ?></td>
                            <td>
                                <button class="update-tenant-btn" type="button" role="button" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>">Update</button>                            
                                    <?php include './paymentsModal.php' ?>
                            </td>
                        </tr>

                        <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4" class="text-center fs-3">You don't have apartment, <span class="fs-1">GO BUILD SOME!!!</span></td>
                                </tr>
                                <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    

    <?php include './includes/footer.php' ?>
</body>

</html>