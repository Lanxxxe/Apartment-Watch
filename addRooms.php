<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
    exit();
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once './includes/header.php';
?>
<link rel="stylesheet" href="./styles/style_apartment_status.css">
<title>A.W. | Apartments</title>
</head>

<body>

<div class="body-content d-flex">
    <div class="side-nav-bar d-none d-sm-block">
        <?php include './includes/navigation.php'; ?>
    </div>

    <div class="main-content container-fluid p-4">
        <?php 
            if (isset($_GET['key']) && isset($_GET['buildingName']) && isset($_GET['TotalRooms'])) {
                $RoomNumber = $_GET['TotalRooms'];
                $BuildingName = $_GET['buildingName'];
                $ApartmentID = $_GET['key'];

        ?>
        
        <form action='./includes/insertRooms.php' method='post'>
            <?php
            $Rooms = (int)$RoomNumber; // Ensure $Rooms is an integer
            while ($Rooms > 0) {
                $RoomID = $Rooms . '_' . $BuildingName;
            ?>
                <div class='insert-rooms mt-3'>
                    <div class='d-flex align-items-center justify-content-start gap-2'>
                        <input type="hidden" value="<?php echo htmlspecialchars($RoomNumber); ?>" name="roomnumber">
                        <div class='form-floating'>
                            <input type='text' class='form-control' name='roomid[]' value='<?php echo htmlspecialchars($RoomID); ?>' placeholder='<?php echo htmlspecialchars($RoomID); ?>' readonly>
                            <label for='floatingInput'>Room ID</label>
                        </div>
                        <div class='form-floating'>
                            <input type='text' class='form-control' id='ApartmentID' name="apartmentid" value='<?php echo htmlspecialchars($ApartmentID); ?>' placeholder='<?php echo htmlspecialchars($ApartmentID); ?>' readonly>
                            <label for='floatingInput'>Apartment ID</label>
                        </div>
                        <div class='form-floating'>
                            <input type='text' class='form-control' name="roomtype[]" id='floatingRoomType' placeholder='Room Type'>
                            <label for='floatingRoomType'>Room Type</label>
                        </div>
                        <div class='form-floating'>
                            <input type='text' class='form-control' name="roomstatus[]" id='floatingRoomStatus' placeholder='Room Status'>
                            <label for='floatingRoomStatus'>Room Status</label>
                        </div>
                        <div class='form-floating'>
                            <input type='number' class='form-control' name="rentamount[]" id='floatingRentAmount' placeholder='Rent Amount'>
                            <label for='floatingRentAmount'>Rent Amount</label>
                        </div>
                    </div>
                </div>
            <?php
                $Rooms--; // Decrement the Rooms variable
            }
            ?>
            <button type='submit' class='btn btn-primary'>Submit</button>
        </form>
        <?php
            } else {
                echo "Required parameters are missing.";
            }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>
