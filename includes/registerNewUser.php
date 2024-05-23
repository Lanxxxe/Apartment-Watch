<?php
include_once './databaseConnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "INSERT INTO `owner_acc_table` (last_name, first_name, owner_username, owner_password) values (:LastName, :FirstName, :Owner_Username, :Owner_Password)";
    
    $statement = $PHP_Data_Object->prepare($query);

    $statement->bindParam(':LastName', $lastname);
    $statement->bindParam(':FirstName', $firstname);
    $statement->bindParam(':Owner_Username', $username);
    $statement->bindParam(':Owner_Password', $password);

    if ($statement->execute()) {
        ?>
        <script>
            alert('Account Created Successfully');
        </script>
        <?php

        header('Location: ../index.php');
    } else {

        echo "
        <script>
            alert('An error occur: '. $stmt->errorInfo);
        </script>
        
        ";

        header('Location: ../register.php');
    }

}
?>