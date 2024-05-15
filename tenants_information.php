<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./styles/interface.css">
    <link rel="stylesheet" href="./styles/style_tenants_information.css">
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
    
        <div class="main-content container-fluid">
            <div class="p-4 d-flex align-items-start justify-content-start gap-4 flex-wrap">
                <div class="card" style="width: 18rem;">
                    <img src="./images/person.png" class="card-img-top rounded-circle mx-auto" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tenant Name</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Apartment: <span class="fw-bold">Rose</span></li>
                        <li class="list-group-item">Room Number: <span class="fw-bold">R103</span></li>
                        <li class="list-group-item">Monthly Payment: <span class="fw-bold">&#x20B1;4000</span></li>
                        <li class="list-group-item">Due Date: <span class="fw-bold">15th</span> day</li>
                    </ul>
                </div>


                <div class="card" style="width: 18rem;">
                    <img src="./images/person.png" class="card-img-top rounded-circle mx-auto" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tenant Name</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Apartment: <span class="fw-bold">Rose</span></li>
                        <li class="list-group-item">Room Number: <span class="fw-bold">R103</span></li>
                        <li class="list-group-item">Monthly Payment: <span class="fw-bold">&#x20B1;4000</span></li>
                        <li class="list-group-item">Due Date: <span class="fw-bold">15th</span> day</li>
                    </ul>
                </div>
            </div>    
            
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>