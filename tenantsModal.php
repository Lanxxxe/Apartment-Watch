<!-- Add Tenant -->
<div class="modal fade" id="addTenant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Tenant</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="./model/addTenants.php" method="POST">
          <div class="modal-body">
              <input class="form-control" type="text" name="AdminID" value="<?php echo $_SESSION['user_id'] ?>" hidden>


              <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="FirstName" id="FirstName">
                  <label for="floatingInput">Tenant First Name</label>
              </div>

              
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="LastName" id="LastName">
                <label for="floatingInput">Tenant Last Name</label>
              </div>
              
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ContactNumber" id="buildingName">
                <label for="floatingInput">Contact Number</label>
              </div>
              
              <div class="form-floating mb-3">
                <select class="form-select" name="RoomChoice" id="floatingSelect" aria-label="Floating label select example">
                  <option selected>Select Room</option>
                <?php 
                $query = "
                SELECT Room_ID, Room_Type, Rent_Amount
                FROM rooms_table r
                JOIN building_table b ON r.Apartment_ID = b.Building_ID
                JOIN owner_acc_table o ON b.Owner_ID = o.Account_ID
                WHERE o.Account_ID = :user_id
                AND r.Room_Status = 'vacant'
                ";
                
                $statement = $PHP_Data_Object->prepare($query);
                $statement->bindParam(':user_id', $_SESSION['user_id']);
                $statement->execute();
                $allVacantRooms = $statement->fetchall(PDO::FETCH_ASSOC);

                foreach($allVacantRooms as $rooms) {

                ?>
                  <option value="<?php echo $rooms['Room_ID']; ?>"><?php echo $rooms['Room_ID'] . ' : ' . $rooms['Room_Type']  ?></option>
                  <?php 
                  }  
                ?>
                </select>
                <label for="floatingSelect">Room Number</label>
              
              </div>

              <div class="form-floating">
                <select class="form-select" id="floatingSelect" name="payment" aria-label="Floating label select example">
                  <option selected>Choose Payment</option>
                  <option value="Paid">Paid</option>
                  <option value="Not Paid">Pending</option>
                </select>
                <label for="floatingSelect">Payment</label>
              </div>

             
                <input type="text" name="RentAmount" value="<?php echo $rooms['Rent_Amount'] ?>" hidden>
                <input type="text" name="NewRoomStatus" value="Rented" hidden>
              </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- View Tenant -->
<div class="modal fade" id="viewTenantInformation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="./model/updateTenant.php" method="POST">
        <div class="modal-body">
          <input class="form-control" type="text" name="tenantID" id="tenantID" hidden>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="lastname" id="tenant-lastname" placeholder="">
            <label for="tenant-lastname">Last Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="firstname" id="tenant-firstname" placeholder="">
            <label for="tenant-firstname">First Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tenant-room" placeholder="" disabled>
            <label for="tenant-room">Assigned Room</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="contact" id="tenant-contact" placeholder="" >
            <label for="tenant-contact">Contact Number</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tenant-paymentstatus" placeholder="" disabled>
            <label for="tenant-paymentstatus">Payment Status</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tenant-monthlypayment" placeholder="" disabled>
            <label for="tenant-monthlypayment">Monthly Payment</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tenant-duedate" placeholder="" disabled>
            <label for="tenant-duedate">Monthly Due Date</label>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-danger" id="delete-link">Delete</a>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
        </div>
        </form>
    </div>
  </div>
</div>


