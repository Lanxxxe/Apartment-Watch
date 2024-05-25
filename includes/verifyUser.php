<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_username = $_POST["username"];
    $user_password = $_POST["password"];

    try {
        require_once "databaseConnection.php";

        $query = "SELECT Account_ID, owner_password, First_Name, Last_Name FROM owner_acc_table WHERE owner_username = :Owner_Username";
        $statement = $PHP_Data_Object->prepare($query);
        $statement->bindParam(':Owner_Username', $user_username, PDO::PARAM_STR);

        if ($statement->execute()) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result && $user_password == $result['owner_password']) {
                session_start();
                $_SESSION['user_id'] = $result['Account_ID'];
                $_SESSION['FirstName'] = $result['First_Name'];
                $_SESSION['LastName'] = $result['Last_Name'];

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
