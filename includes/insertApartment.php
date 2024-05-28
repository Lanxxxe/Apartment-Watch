<?php 

include './databaseConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $UserID = $_POST['AdminID'];
    $ApartmentID = $_POST['AdminID'] . '' . $_POST['BuildingName'];
    $Name = $_POST['BuildingName'];
    $StreetAddress = $_POST['StreetAddress'];
    $CityAddress = $_POST['CityAddress'];
    $Status = $_POST['Status'];
    $TotalRooms = $_POST['roomnumber'];


    $query = "INSERT INTO building_table (Building_ID, Owner_ID, Building_Name, Building_Street_Address, Building_City_Address, Building_Status, Total_Rooms) VALUES (:building_id, :admin_id, :building_name, :street_address, :city_address, :building_status, :total_rooms)";


    $statement = $PHP_Data_Object->prepare($query);

    // :admin_id, :building_name, :street_address, :city_address, :building_status, :total_rooms
    $statement->bindParam(':building_id', $ApartmentID);
    $statement->bindParam(':admin_id', $UserID);
    $statement->bindParam(':building_name', $Name);
    $statement->bindParam(':street_address', $StreetAddress);
    $statement->bindParam(':city_address', $CityAddress);
    $statement->bindParam(':building_status', $Status);
    $statement->bindParam(':total_rooms', $TotalRooms);

    if ($statement->execute()) {
        $PimaryKey = $PHP_Data_Object->lastInsertId();
        header('Location: ../addRooms.php?key=' .$ApartmentID . '&buildingName=' . urlencode($Name)) . '&Rooms=' . $TotalRooms;
        exit();
    } else {
        echo 'An Error occur';
        exit();
    }

    $PHP_Data_Object = null;
    $statement = null;

}