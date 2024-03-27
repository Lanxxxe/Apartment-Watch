<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./styles/style_dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images/AW-logo.png" type="image/x-icon">
    <title>A.W. | Dashboard</title>
</head>

<body>

    <div class="body-content d-flex">
        <div class="side-nav-bar d-none d-sm-block">
            <?php include './includes/navigation.php' ?>
        </div>

        <div class="main-content container-fluid p-4">

            <div class="landlord-info contianer-fluid d-flex align-items-center justify-content-between ">
                <div class="d-flex align-items-center justify-content-start p-2">
                    <img class="owner-img" src="./images/person.png" alt="Landlord Image">
                    <div class="owner-name mx-2">
                        <p class="fs-4 fw-bold">Landlord Name</p>
                        <p class="fst-italic">Owner</p>
                    </div>
                </div>
                <div>
                    <p><span class="fw-bold">Apartment Name:</span> Apartment Name</p>
                    <p><span class="fw-bold">Location:</span> Apartment Location</p>
                    <p><span class="fw-bold">Price Range:</span> Price Range of every room</p>
                </div>
            </div>

            <div class="landlord-dashboard mt-5 d-flex flex-wrap align-items-center justify-content-start">
                <div class="apartment-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Total Apartments</p>
                        <i class="bi bi-buildings fs-4"></i>
                    </div>
                    <p class="">10</p>
                    <a class="text-end" href="">View Apartments</a>
                </div>
                <div class="tenants-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Number of Tenants</p>
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <p class="">54</p>
                    <a class="text-end" href="">Tenants Information</a>
                </div>
                <div class="rooms-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Total Rooms</p>
                        <i class="bi bi-door-open fs-4"></i>
                    </div>
                    <p class="">23</p>
                    <a class="text-end align-self-end" href="">Check Rooms</a>
                </div>
                <div class="income-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Expected Income</p>
                        <i class="bi bi-graph-up-arrow fs-4"></i>
                    </div>
                    <p class="">P18374</p>
                    <a class="text-end" href="">Check Payments </a>
                </div>
                <div class="income-card p-3 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <p class="mt-2">Expenses</p>
                        <i class="bi bi-clipboard-data fs-4"></i>
                    </div>
                    <p class="">P5843</p>
                    <a class="text-end" href="">Expenses Breakdown</a>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>