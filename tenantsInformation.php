<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
    exit();
}
include './model/databaseConnection.php';
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
            <div class="p-4 d-flex align-items-center justify-content-start gap-4 flex-wrap">
                <button class="add-tenant-button" data-bs-toggle="modal" data-bs-target="#addTenant"><i class="bi bi-person-add fs-1"></i></button>

                <?php 
                    $query = " 
                    SELECT 
                        t.First_Name, 
                        t.Last_Name,
                        t.Contact_Number, 
                        r.Room_ID, 
                        b.Building_Name,
                        p.Monthly_Payment,
                        p.Payment_Status,
                        p.Monthly_Due_Date
                    FROM tenants_table t
                    JOIN rooms_table r ON t.Assigned_Room = r.Room_ID
                    JOIN building_table b ON r.Apartment_ID = b.Building_ID
                    JOIN owner_acc_table o ON b.Owner_ID = o.Account_ID
                    LEFT JOIN payments p ON t.Tenant_ID = p.Tenant_ID
                    WHERE o.Account_ID = :user_id;
                    ";
                
                    $statement = $PHP_Data_Object->prepare($query);
                    $statement->bindParam(':user_id', $_SESSION['user_id']);
                    if ($statement->execute()) {

                        $tenants = $statement->fetchAll(PDO::FETCH_ASSOC);
                        if (count($tenants) > 0) {

                            foreach($tenants as $tenant) {
    
                            
                            ?>
                            <div class="card p-2 bg-dark-subtle" style="width: 18rem;"  data-aos="fade-up"  data-aos-duration="1300" data-aos-delay="300">
                                <img src="./images/person.png" class="card-img-top w-50 rounded-circle mx-auto" alt="...">
                                <div class="card-body ">
                                    <h5 class="card-title text-center"><?php echo htmlspecialchars($tenant['First_Name']) . " " . htmlspecialchars($tenant['Last_Name']) ?></h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-dark-subtle">Apartment: <span class="fw-bold"><?php echo htmlspecialchars($tenant['Building_Name']) ?></span></li>
                                    <li class="list-group-item bg-dark-subtle">Room Number: <span class="fw-bold"><?php echo htmlspecialchars($tenant['Room_ID']) ?></span></li>
                                    <li class="list-group-item bg-dark-subtle">Monthly Payment: <span class="fw-bold">&#x20B1;<?php echo htmlspecialchars($tenant['Monthly_Payment']) ?></span></li>
                                    <li class="list-group-item bg-dark-subtle">Due Date: <span class="fw-bold"><?php echo htmlspecialchars($tenant['Monthly_Due_Date']) ?></span> day</li>
                                    <li class="list-group-item bg-dark-subtle">
                                    <button 
                                        class="btn btn-success w-100" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#viewTenantInformation"
                                        data-firstname="<?php echo htmlspecialchars($tenant['First_Name']); ?>"
                                        data-lastname="<?php echo htmlspecialchars($tenant['Last_Name']); ?>"
                                        data-room="<?php echo htmlspecialchars($tenant['Room_ID']); ?>"
                                        data-contact="<?php echo htmlspecialchars($tenant['Contact_Number']); ?>"
                                        data-paymentstatus="<?php echo htmlspecialchars($tenant['Payment_Status']); ?>"
                                        data-monthlypayment="<?php echo htmlspecialchars($tenant['Monthly_Payment']); ?>"
                                        data-duedate="<?php echo htmlspecialchars($tenant['Monthly_Due_Date']); ?>"
                                    >
                                        View Details
                                    </button>
                                    </li>
                                </ul>
                            </div>
    
                            <?php
    
                            }
                        } else {
                            ?>
                            <div class="card p-2 bg-dark-subtle" style="width: 18rem;">
                                <img src="./images/person.png" class="card-img-top w-50 rounded-circle mx-auto" alt="...">
                                <div class="card-body ">
                                    <h5 class="card-title text-center">No Tenants</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-dark-subtle">Apartment: <span class="fw-bold">COMMON BUILD AN APARTMENT!!</span></li>
                                </ul>
                            </div>
                            <?php

                        }

                    }else {
                        echo 'An Error Occur';
                        ?>

                        <?php
                    }
                ?>
                
            </div>
            <?php 
                include './tenantsModal.php';
            ?>    
        </div>

    </div>

    <?php include './includes/footer.php' ?>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var tenantModal = document.getElementById('viewTenantInformation');
            tenantModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Button that triggered the modal

                // Extract info from data-* attributes
                var firstname = button.getAttribute('data-firstname');
                var lastname = button.getAttribute('data-lastname');
                var room = button.getAttribute('data-room');
                var contact = button.getAttribute('data-contact');
                var paymentstatus = button.getAttribute('data-paymentstatus');
                var monthlypayment = button.getAttribute('data-monthlypayment');
                var duedate = button.getAttribute('data-duedate');

                // Update the modal's content
                tenantModal.querySelector('.modal-title').textContent = 'Tenant Information: ' + firstname + ' ' + lastname;
                tenantModal.querySelector('#tenant-lastname').value = lastname;
                tenantModal.querySelector('#tenant-firstname').value = firstname;
                tenantModal.querySelector('#tenant-room').value = room;
                tenantModal.querySelector('#tenant-contact').value = contact;
                tenantModal.querySelector('#tenant-paymentstatus').value = paymentstatus;
                tenantModal.querySelector('#tenant-monthlypayment').value = monthlypayment;
                tenantModal.querySelector('#tenant-duedate').value = `${duedate} day of the month`;
            });
        });
    </script>
</body>

</html>