<?php 

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
                    <p class="fw-bold">Apartment Name</p>
                    <p class="fw-light">Apartment Address</p>
                </div>
                <table class="">
                    <thead>
                        <tr>
                            <td class="" scope="col">Room Number</td>
                            <td scope="col">Room Type</td>
                            <td scope="col">Rent Amount</td>
                            <td scope="col">Status</td>
                            <td scope="col">Action(to Tenant)</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>023</td>
                            <td>Studio</td>
                            <td>P5000</td>
                            <td>Vacant</td>
                            <td>
                                <button class="add-tenant" type="button">Add Tenant</button>
                                <button class="remove-tenant" type="button">Remove Tenant</button>
                            </td>
                        </tr>
                        <tr>
                            <td>023</td>
                            <td>Studio</td>
                            <td>P5000</td>
                            <td>Vacant</td>
                            <td>
                                <button class="add-tenant" type="button">Add Tenant</button>
                                <button class="remove-tenant" type="button">Remove Tenant</button>
                            </td>
                        </tr>
                        <tr>
                            <td>023</td>
                            <td>Studio</td>
                            <td>P5000</td>
                            <td>Vacant</td>
                            <td>
                                <button class="add-tenant" type="button">Add Tenant</button>
                                <button class="remove-tenant" type="button">Remove Tenant</button>
                            </td>
                        </tr>
                        <tr>
                            <td>023</td>
                            <td>Studio</td>
                            <td>P5000</td>
                            <td>Vacant</td>
                            <td>
                                <button class="add-tenant" type="button">Add Tenant</button>
                                <button class="remove-tenant" type="button">Remove Tenant</button>
                            </td>
                        </tr>
                    </tbody>
                    <tr></tr>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>