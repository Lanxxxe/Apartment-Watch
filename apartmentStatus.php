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

            <div class="mt-2" >
                <div class="apartment-name d-flex align-items-center justify-content-between px-2">
                    <p class="fw-bold">Owner Name</p>
                </div>
                <table class="">
                    <thead>
                        <tr>
                            <td scope="col">Apartment Name</td>
                            <td scope="col">Address</td>
                            <td scope="col">Total Rooms</td>
                            <td scope="col">Vancant Rooms</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                            $query = "
                                SELECT 
                                b.Building_ID,
                                b.Building_Street_Address,
                                b.Building_City_Address,
                                b.Building_Status,
                                b.Building_Name AS Apartment,
                                COUNT(r.Room_ID) AS Total_Rooms,
                                SUM(CASE WHEN r.Room_Status = 'vacant' THEN 1 ELSE 0 END) AS Vacant_Rooms
                                FROM 
                                    owner_acc_table o
                                JOIN 
                                    building_table b ON o.Account_ID = b.Owner_ID
                                LEFT JOIN 
                                    rooms_table r ON b.Building_ID = r.Apartment_ID
                                WHERE 
                                    o.Account_ID = :user_id
                                GROUP BY 
                                    b.Building_Name
                                ORDER BY 
                                    b.Building_Name;
                            ";

                            $statement = $PHP_Data_Object->prepare($query);

                            $statement->bindParam(':user_id', $_SESSION['user_id']);

                            $statement->execute();

                            $apartments = $statement->fetchAll(PDO::FETCH_ASSOC);

                            if (count($apartments) > 0) {
                                foreach($apartments as $apartment) {
                        ?>

                        <tr>
                            <td><?php echo $apartment['Apartment'] ?></td>
                            <td><?php echo $apartment['Building_Street_Address'] . ', ' . $apartment['Building_City_Address'] ?></td>
                            <td><?php echo $apartment['Total_Rooms'] ?></td>
                            <td><?php echo $apartment['Vacant_Rooms'] ?></td>
                            <td>
                                <button class="edit-apartment-btn" type="button" role="button" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editapartment"
                                data-apartmentID="<?php echo htmlspecialchars($apartment['Building_ID']) ?>"
                                data-buildingName="<?php echo htmlspecialchars($apartment['Apartment']) ?>"
                                data-streetAddress="<?php echo htmlspecialchars($apartment['Building_Street_Address']) ?>"
                                data-cityAddress="<?php echo htmlspecialchars($apartment['Building_City_Address']) ?>"
                                data-status="<?php echo htmlspecialchars($apartment['Building_Status']) ?>"
                                data-totalRooms="<?php echo htmlspecialchars($apartment['Total_Rooms']) ?>"
                                
                                >Edit</button>
                                <a href="./model/deleteApartment.php?building_id=<?php echo $apartment['Building_ID']?>" class="remove-apartment-btn" type="button" role="button">Remove</a>
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
                <div class="d-flex align-items-center justify-content-center mt-3 w-100">
                    <button class="add-apartment-button mt-3" type="button"  data-bs-toggle="modal" data-bs-target="#addApartment" >Add Apartment</button>
                    
                    <?php include './apartmentModal.php'; ?>
                </div>
            </div>
        </div>
    </div>

    

    <?php include './includes/footer.php' ?>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var EditApartmentModal = document.querySelector('#editapartment');
        EditApartmentModal.addEventListener('show.bs.modal', (event) => {
            var button = event.relatedTarget

            var BuildingID = button.getAttribute('data-apartmentID');
            var BuildingName = button.getAttribute('data-buildingName');
            var StreetAddress = button.getAttribute('data-streetAddress');
            var CityAddress = button.getAttribute('data-cityAddress');
            var Status = button.getAttribute('data-status');
            var Rooms = button.getAttribute('data-totalRooms');

            EditApartmentModal.querySelector('#apartmentID').value = BuildingID;
            EditApartmentModal.querySelector('#buildingName').value = BuildingName;
            EditApartmentModal.querySelector('#StAddress').value = StreetAddress;
            EditApartmentModal.querySelector('#cityAddress').value = CityAddress;
            EditApartmentModal.querySelector('#status').value = Status;
            EditApartmentModal.querySelector('#totalRooms').value = Rooms;
        })
    })



</script>

</body>

</html>