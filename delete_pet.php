<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

$connection = new mysqli("localhost", "root", "", "sprinfieldpetrescue");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$pet_id = $_GET['pet_id'];

$sql = "DELETE FROM pet WHERE pet_id=?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $pet_id);
$stmt->execute();

header("Location: dashboard.php");
exit();

$stmt->close();
$connection->close();
?>
