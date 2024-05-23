<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_username = $_POST["username"];
    $user_password = $_POST["password"];

    try {
        require_once "databaseConnection.php"; // Ensure this file sets up $PDO (not $PHP_Data_Object)

        $query = "SELECT owner_password FROM owner_acc_table WHERE owner_username = :Owner_Username";

        $statement = $PHP_Data_Object->prepare($query); // Changed $PHP_Data_Object to $PDO
        $statement->bindParam(':Owner_Username', $user_username, PDO::PARAM_STR);

        if ($statement->execute()) {
            $stored_password = $statement->fetchColumn();

            // Check if the password is correct (assuming passwords are hashed)
            if ($stored_password == $user_password) {
                header("Location: ../dashboard.php");
                exit();
            } else {
                header("Location: ../index.php?error=invalid_credentials");
                exit();
            }
        } else {
            header("Location: ../index.php?error=query_failed");
            exit();
        }

        // Close the connection
        $PHP_Data_Object = null;
        $statement = null;
    } catch (PDOException $error) {
        die("Failed: " . $error->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit();
}
