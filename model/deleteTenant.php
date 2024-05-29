<?php

include './databaseConnection.php';
if (isset($_GET['tenantid'])) {
    $tenant_ID = $_GET['tenantid'];

    $query = "DELETE FROM tenants_table WHERE Tenant_ID = :tenantID";

    $statement = $PHP_Data_Object->prepare($query);
    $statement->bindParam(':tenantID', $tenant_ID);

    if ($statement->execute()) {
        $query = "UPDATE rooms_table SET Room_Status = 'Vacant', Tenant_ID = NULL WHERE Tenant_ID = :tenantid";
        $statement = $PHP_Data_Object->prepare($query);
        $statement->bindParam(':tenantid', $tenant_ID);
        $statement->execute();
        echo 'Success';
        header('Location: ../tenantsInformation.php');
        exit();
    }

    $PHP_Data_Object = null;
    $statement = null;
}