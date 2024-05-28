<?php 
include './databaseConnection.php';
try {

    if (isset($_GET['building_id'])) {
        $building_id = $_GET['building_id'];

        $query = 'DELETE FROM building_table where building_id = :building_ID';

        $statement = $PHP_Data_Object->prepare($query);

        $statement->bindParam(':building_ID', $building_id);

        if ($statement->execute()) {
            header('Location: ../apartmentStatus.php');
        }
    }
} catch (Exception $error) {
    echo "An error occur " . $errro->getMessage();
}

