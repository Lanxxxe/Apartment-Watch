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
<title>A.W. | Rooms</title>
</head>

<body>

    <div class="body-content d-flex">
        <div class="side-nav-bar d-none d-sm-block">
            <?php include './includes/navigation.php' ?>
        </div>

        <div class="main-content container-fluid p-4">

            <div class="mb-4"  data-aos="fade-up"  data-aos-duration="1300">
            <?php 
            $query = "
                SELECT 
                    b.Building_Name AS Apartment,
                    b.Building_Street_Address AS Address,
                    b.Building_City_Address AS City,
                    r.Room_ID AS RoomNumber,
                    r.Room_Type AS RoomType,
                    r.Rent_Amount AS RentAmount,
                    r.Room_Status AS RoomStatus,
                    CONCAT(t.First_Name, ' ', t.Last_Name) AS Tenant
                FROM 
                    owner_acc_table o
                JOIN 
                    building_table b ON o.Account_ID = b.Owner_ID
                LEFT JOIN 
                    rooms_table r ON b.Building_ID = r.Apartment_ID
                LEFT JOIN 
                    tenants_table t ON r.Tenant_ID = t.Tenant_ID
                WHERE 
                    o.Account_ID = :user_id
                ORDER BY 
                    b.Building_Name, r.Room_ID;
            ";

            $statement = $PHP_Data_Object->prepare($query); // Assuming $pdo is your PDO instance from databaseConnection.php
            $statement->bindParam(':user_id', $_SESSION['user_id']);
            $statement->execute();

            $AllRooms = $statement->fetchAll(PDO::FETCH_ASSOC);
            if (count($AllRooms) > 0) {
                $groupedApartments = [];
                foreach ($AllRooms as $apartmentRooms) {
                    $groupedApartments[$apartmentRooms['Apartment']][] = $apartmentRooms;
                }

                foreach ($groupedApartments as $apartmentName => $rooms) {
                    $address = $rooms[0]['Address'] . ', ' . $rooms[0]['City'];
                    ?>

                    <div class="apartment-name d-flex align-items-end justify-content-between px-3 mt-3">
                        <p class="fw-bold"><?php echo htmlspecialchars($apartmentName); ?></p>
                        <p class="fw-light"><?php echo htmlspecialchars($address); ?></p>
                    </div>
                    <div>
                        <table class="">
                            <thead>
                                <tr>
                                    <td class="" scope="col">Room Number</td>
                                    <td scope="col">Room Type</td>
                                    <td scope="col">Rent Amount</td>
                                    <td scope="col">Status</td>
                                    <td scope="col">Tenant</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($rooms as $room) {
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($room['RoomNumber']); ?></td>
                                    <td><?php echo htmlspecialchars($room['RoomType']); ?></td>
                                    <td><?php echo htmlspecialchars($room['RentAmount']); ?></td>
                                    <td><?php echo htmlspecialchars($room['RoomStatus']); ?></td>
                                    <td><?php echo htmlspecialchars($room['Tenant']); ?></td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
            } else {
                ?>
                <p class="text-center text-white">You don't have an apartment, <span class="fs-1">GO BUILD SOME!!!</span></p>
            <?php
            }
            ?>
                <div class="d-flex align-items-center justify-content-center mt-3">
                    <button class="add-room-button" type="button">Add Room</button>
                </div>
            </div>
        </div>

    </div>

    <?php include './includes/footer.php' ?>
</body>

</html>
