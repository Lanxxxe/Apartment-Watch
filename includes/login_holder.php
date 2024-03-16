<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_username = $_POST["username"];
    $user_password = $_POST["password"];

    try {
        require_once "database.php";

        $query_command = "INSERT INTO apartment_users (user_name, user_password) values (?, ?);";

        $statement = $PHP_Data_Object->prepare($query_command);
        $statement->execute([$user_username, $user_password]);

        header("Location: ../dashboard.php");

        $pdo = null;
        $statement = null;
    } catch (PDOException $error) {
        die("Failed ....." . $error->getMessage());
    }
} else {
    header("Location: ../index.php");
}
