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

$pet_id = $_GET['adopt_id'];


$sql = "DELETE FROM adopt WHERE adopt_id=?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $pet_id);
$stmt->execute();

header("Location: admin_dashboard.php");
exit();

$stmt->close();
$connection->close();
?>
