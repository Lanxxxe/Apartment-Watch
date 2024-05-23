<?php

$Data_Source_Name = "mysql:host=localhost;dbname=apartment_watch_database";
$Database_Username = "root";
$Database_Password = "";

try {
    $PHP_Data_Object = new PDO($Data_Source_Name, $Database_Username, $Database_Password);
    $PHP_Data_Object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Failed to connect" . $error->getMessage();
}
