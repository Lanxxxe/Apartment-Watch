<?php 
include './databaseConnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $apartmentID=  $_POST['ApartmentID'];
    $name = $_POST['BuildingName'];
    $street = $_POST['StreetAddress'];
    $city = $_POST['CityAddress'];
    $status = $_POST['Status'];
    $rooms = $_POST['TotalRooms'];

    $query = "UPDATE building_table SET 
    Building_Name = :buildingName,
    Building_Street_Address = :streetAddress,
    Building_City_Address = :cityAddress,
    Building_Status = :buildingStatus,
    Total_Rooms = :rooms
    WHERE 
    Building_ID = :buildingID
    ";

    $statement = $PHP_Data_Object->prepare($query);
    $statement->bindParam(':buildingName', $name);
    $statement->bindParam(':streetAddress', $street);
    $statement->bindParam(':cityAddress', $city);
    $statement->bindParam(':buildingStatus', $status);
    $statement->bindParam(':rooms', $rooms);
    $statement->bindParam(':buildingID', $apartmentID);
    
    if ($statement->execute()) {
        echo 'Success';

        header('Location: ../apartmentStatus.php');
        exit();
    } 

    $PHP_Data_Object = null;
    $statement = null;

}