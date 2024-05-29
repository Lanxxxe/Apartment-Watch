<?php 


include './databaseConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tenantID = $_POST['tenantid'];
    $status = $_POST['paymentStatus'];

    $query = "UPDATE payments SET Payment_Status = :pay_stats WHERE tenant_id = :tenantID";
    $statement = $PHP_Data_Object->prepare($query);
    $statement->bindParam(':pay_stats', $status);
    $statement->bindParam(':tenantID', $tenantID);

    if ($statement->execute()) {
        header('Location: ../paymentStatus.php');
        exit();
    }

    $PHP_Data_Object = null;
    $statement = null;
}