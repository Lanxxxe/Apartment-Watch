<?php
include './databaseConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $RoomNumber = $_POST['roomnumber'];
    $RoomIDs = $_POST['roomid'];
    $ApartmentID = $_POST['apartmentid'];
    $RoomTypes = $_POST['roomtype'];
    $RoomStatuses = $_POST['roomstatus'];
    $RentAmounts = $_POST['rentamount'];

    // Ensure these are arrays
    if (is_array($RoomIDs) && is_array($RoomTypes) && is_array($RoomStatuses) && is_array($RentAmounts)) {
        for ($i = 0; $i < $RoomNumber; $i++) {
            $query = "INSERT INTO rooms_table (Room_ID, Apartment_ID, Room_Type, Room_Status, Rent_Amount) VALUES (:roomID, :apartmentID, :roomType, :roomStatus, :rentAmount)";

            $statement = $PHP_Data_Object->prepare($query);

            $statement->bindParam(':roomID', $RoomIDs[$i]);
            $statement->bindParam(':apartmentID', $ApartmentID);
            $statement->bindParam(':roomType', $RoomTypes[$i]);
            $statement->bindParam(':roomStatus', $RoomStatuses[$i]);
            $statement->bindParam(':rentAmount', $RentAmounts[$i]);

            if ($statement->execute()) {
                echo 'Success';
            } else {
                echo 'Failed to insert room: ' . $RoomIDs[$i];
            }
        }
    } else {
        echo 'Error: Invalid input.';
    }

    $PHP_Data_Object = null;
    $statement = null;

    header('Location: ../roomStatus.php');
    exit();
}
