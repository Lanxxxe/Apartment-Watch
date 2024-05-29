<?php 

include './databaseConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tenant = $_POST['tenantID'];
    $firstname = $_POST['lastname'];
    $lastname = $_POST['firstname'];
    $contact_number = $_POST['contact'];

    $query = "UPDATE tenants_table SET 
    First_Name = :firstname,
    Last_Name = :lastname,
    Contact_Number = :contact
    WHERE Tenant_ID = :tenantsID
    ";

    $statement = $PHP_Data_Object->prepare($query);
    $statement->bindParam(':firstname', $firstname);
    $statement->bindParam(':lastname', $lastname);
    $statement->bindParam(':contact', $contact_number);
    $statement->bindParam(':tenantsID', $tenant);
    
    if ($statement->execute()) {
        header('Location: ../tenantsInformation.php');
    }
    $PHP_Data_Object = null;
    $statement = null;

}