<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
    exit();
}

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
            <?php 
                if (isset($_GET['key']) && isset($_GET['buildingName']) && isset($_GET['Rooms'])){
                $Rooms = $_GET['Rooms'];
                $BuildingName = $_GET['buildingName'];
                $ApartmentID = $_GET['key'];
                
                while ($Rooms > 0){
                    $RoomID = $BuildingName . ' ' . $Rooms;
                ?>
                    <form action="">
                        <div class="insert-rooms">
                            <div class="d-flex align-items-center justify-content-start gap-2">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="RoomID" value="<?php echo $RoomID?> " placeholder="<?php echo $RoomID?> " disabled>
                                    <label for="floatingInput">Room ID</label>
                                </div>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="ApartmentID" value="<?php echo $ApartmentID ?>" placeholder="<?php echo $ApartmentID ?>" disabled>
                                    <label for="floatingInput">Apartment ID</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Room Type</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Room Status</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Rent Amount</label>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                    }
                }
            
            
            ?>
            <form action="">
                <div class="insert-rooms">
                    <div class="d-flex align-items-center justify-content-start gap-2">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" disabled>
                            <label for="floatingInput">Room ID</label>
                        </div>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" disabled>
                            <label for="floatingInput">Apartment ID</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Room Type</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Room Status</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Rent Amount</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>