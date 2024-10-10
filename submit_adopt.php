<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sprinfieldpetrescue";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_id = $_POST["pet_id"];
    $full_name = $_POST["full_name"];
    $district = $_POST["district"];
    $city = $_POST["city"];
    $phone_number = $_POST["phone_number"];

    $sql = "INSERT INTO adopt (pet_id, full_name, district, city, phone_number) 
            VALUES ('$pet_id', '$full_name', '$district', '$city', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?status=success&message=Adoption+form+submitted+successfully!");
    } else {
        header("Location: index.php?status=error&message=" . urlencode("Error: " . $conn->error));
    }
}

$conn->close();
?>
