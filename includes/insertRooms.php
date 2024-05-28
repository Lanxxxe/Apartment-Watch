<?php
include './includes/databaseConnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $RoomNumber = $_POST['roomnumber'];
    $RoomID = $_POST['roomid'];
    $ApartmentID = $_POST['apartmentid'];
    $RoomType = $_POST['roomtype'];
    $RoomStatus = $_POST['roomstatus'];
    $RentAmount = $_POST['rentamount'];

    while ($RoomNumber > 0) {
        $query = "INSERT INTO rooms_table (Room_ID, Apartment_ID, Room_Type, Room_Status, Rent_Amount) VALUES (:roomID, :apartmentID, :roomType, :roomStatus, :rentAmount)";

        $statement = $PHP_Data_Object->prepare($query);

        $statement->bindParam(':roomID', $RoomID);
        $statement->bindParam(':apartmentID', $RoomID);
        $statement->bindParam(':roomType', $RoomID);
        $statement->bindParam(':roomStatus', $RoomID);
        $statement->bindParam(':rentAmount', $RentAmount);

        if ($statement->execute()) {
            echo 'Success';
        }
    }

    $PHP_Data_Object = null;
    $statement = null;
    
    header('Location: ./roomStatus.php');



}