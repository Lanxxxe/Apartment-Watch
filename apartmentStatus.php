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

            <div class="mt-2">
                <div class="apartment-name d-flex align-items-center justify-content-between px-2">
                    <p class="fw-bold">Owner Name</p>
                </div>
                <table class="">
                    <thead>

                        <?php 

                        ?>

                        <tr>
                            <td class="" scope="col">Apartment Name</td>
                            <td scope="col">Total Rooms</td>
                            <td scope="col">Vancant Rooms</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>Rose Building</td>
                            <td>20</td>
                            <td>10</td>
                            <td>
                                <button class="remove-apartment-btn" type="button">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>SunFlower Building</td>
                            <td>20</td>
                            <td>4</td>
                            <td>
                                <a class="remove-apartment-btn">Remove</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex align-items-center justify-content-center mt-3">
                    <button class="add-apartment-button" type="button"  data-bs-toggle="modal" data-bs-target="#addApartment" >Add Apartment</button>
                    
                    <?php include './apartmentModal.php'; ?>
                </div>
            </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>