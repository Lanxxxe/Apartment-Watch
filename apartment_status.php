<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./styles/interface.css">
    <link rel="stylesheet" href="./styles/style_apartment_status.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images/AW-logo.png" type="image/x-icon">
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
                                <button class="add-tenant" type="button">Add</button>
                                <button class="remove-tenant" type="button">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>023</td>
                            <td>Studio</td>
                            <td>P5000</td>
                            <td>Vacant</td>
                            <td>
                                <button class="add-tenant" type="button">Add</button>
                                <button class="remove-tenant" type="button">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>023</td>
                            <td>Studio</td>
                            <td>P5000</td>
                            <td>Vacant</td>
                            <td>
                                <button class="add-tenant" type="button">Add</button>
                                <button class="remove-tenant" type="button">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>023</td>
                            <td>Studio</td>
                            <td>P5000</td>
                            <td>Vacant</td>
                            <td>
                                <button class="add-tenant" type="button">Add</button>
                                <button class="remove-tenant" type="button">Remove</button>
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