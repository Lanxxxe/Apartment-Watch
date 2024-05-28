<?php 
function addOrdinalSuffix($number) {
    $suffix = 'th';

    if (!in_array(($number % 100), [11, 12, 13])) {
        switch ($number % 10) {
            case 1:
                $suffix = 'st';
                break;
            case 2:
                $suffix = 'nd';
                break;
            case 3:
                $suffix = 'rd';
                break;
        }
    }

    return $number . $suffix;
}


include './databaseConnection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $AssignedRoom = $_POST['RoomChoice'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Contact = $_POST['ContactNumber'];
    $RoomRentAmount = $_POST['RentAmount'];
    $PaymentStatus = $_POST['payment'];
    $RoomStatus = $_POST['NewRoomStatus'];


    $query = "INSERT INTO tenants_table (Assigned_Room, First_Name, Last_Name, Contact_Number) VALUES (:room, :firstname, :lastname, :contact)";

    $statement = $PHP_Data_Object->prepare($query);
    $statement->bindParam(':room', $AssignedRoom);
    $statement->bindParam(':firstname', $FirstName);
    $statement->bindParam(':lastname', $LastName);
    $statement->bindParam(':contact', $Contact);


    if ($statement->execute()){
        $TenantPK = $PHP_Data_Object->lastInsertId();
        $roomQuery = "UPDATE rooms_table SET Room_Status = :roomstatus, Tenant_ID = :tenantid  WHERE Room_ID = :assignedroom";

        $roomStatement = $PHP_Data_Object->prepare($roomQuery);
        $roomStatement->bindParam(':roomstatus', $RoomStatus);
        $roomStatement->bindParam(':tenantid', $TenantPK);
        $roomStatement->bindParam(':assignedroom', $AssignedRoom);

        if ($roomStatement->execute()) {
            echo 'Success';
            $roomStatement = null;
        } else {
            echo 'Failed';
        }

        $paymentQuery = "INSERT INTO payments (Payment_Status, Monthly_Payment, Monthly_Due_Date, tenant_id) VALUES (:paymentstatus, :monthlypayment, :duedate, :tenantid)";
        $currentDate = addOrdinalSuffix(date('j'));

        $paymentstatement = $PHP_Data_Object->prepare($paymentQuery);
        $paymentstatement->bindParam(':paymentstatus', $PaymentStatus);
        $paymentstatement->bindParam(':monthlypayment', $RoomRentAmount);
        $paymentstatement->bindParam(':duedate', $currentDate);
        $paymentstatement->bindParam(':tenantid', $TenantPK);  

        if ($paymentstatement->execute()) {
            echo 'Success';
            $paymentQuery = null;
        } else {
            echo 'Failed';
        }


        header('Location: ../tenantsInformation.php');
        $PHP_Data_Object = null;
        $statement = null;
    } else {
        echo "An error occur";
    }


}