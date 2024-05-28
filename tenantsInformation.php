<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
    exit();
}

include_once './includes/header.php';
?>
    <title>A.W. | Tenants</title>
</head>

<body>

    <div class="body-content d-flex">
        <div class="side-nav-bar d-none d-sm-block">
            <?php include './includes/navigation.php' ?>
        </div>
        <!-- Apartment Name, Location, Total Rooms, Vacant, Occupied, Under Maintenance -->
    
        <div class="main-content container-fluid">
            <div class="p-4 d-flex align-items-start justify-content-start gap-4 flex-wrap">
                <div class="card p-2" style="width: 16rem;">
                    <img src="./images/person.png" class="card-img-top w-50 rounded-circle mx-auto" alt="...">
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


                <div class="card p-2" style="width: 16rem;">
                    <img src="./images/person.png" class="card-img-top w-50 rounded-circle mx-auto" alt="...">
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