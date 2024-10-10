<?php
session_start();
if (!isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

$connection = new mysqli("localhost", "root", "", "sprinfieldpetrescue");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$confirmation_message = '';
if (isset($_GET['confirm_adoption']) && $_GET['confirm_adoption'] == 1) {
    $pet_id = $_GET['pet_id'];
    $adopt_id = $_GET['adopt_id'];
    
    $update_pet_sql = "UPDATE pet SET is_adopted = 1 WHERE pet_id = ?";
    $update_pet_stmt = $connection->prepare($update_pet_sql);
    $update_pet_stmt->bind_param("i", $pet_id);

    $update_adopt_sql = "UPDATE adopt SET is_confirmed = 1 WHERE adopt_id = ?";
    $update_adopt_stmt = $connection->prepare($update_adopt_sql);
    $update_adopt_stmt->bind_param("i", $adopt_id);

   if ($update_pet_stmt->execute() && $update_adopt_stmt->execute()) {
        header("Location: admin_dashboard.php?status=success&message=Adoption+confirmed+successfully!");
        exit();
    } else {
        $confirmation_message = "Error updating record: " . $connection->error;
        $confirmation_message = str_replace(' ','+',$confirmation_message);
        header("Location: admin_dashboard.php?status=error&message=".$confirmation_message);
        exit();
        
    }

    $update_pet_stmt->close();
    $update_adopt_stmt->close();
}

    
?>
