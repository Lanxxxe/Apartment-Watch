<!-- Add Apartment -->
<div class="modal fade" id="addApartment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Apartment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
        <form action="./model/insertApartment.php" method="POST">
            <div class="modal-body">

                <input class="form-control" type="text" name="AdminID" value="<?php echo $_SESSION['user_id'] ?>" hidden>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="BuildingName" id="buildingName">
                    <label for="floatingInput">Apartment Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="StreetAddress" id="buildingStAddress">
                    <label for="floatingInput">Street Address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="CityAddress" id="buildingCityAddress">
                    <label for="floatingInput">City Address</label>
                </div>

                <div class="form-floating mb-3"> 
                    <input type="text" class="form-control" name="Status" id="buildingStatus">
                    <label for="floatingInput">Status</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="TotalRooms" id="totalRooms">
                    <label for="floatingInput">Total Rooms</label>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
  </div>
</div>
