<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sprinfieldpetrescue";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT pet_id, name, pet_type, age, city, district, description, photo FROM pet WHERE is_adopted = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        
        if (!empty($row["photo"]) && file_exists($row["photo"])) {
            echo "<img src='" . $row["photo"] . "' alt='Pet Image' />";
        } else {
           
            echo "<img src='default.jpg' alt='Pet Image' />";
        }

        echo "<h3>" . $row["name"] . " (" . $row["pet_type"] . ", Age: " . $row["age"] . ")</h3>";
        echo "<p>&#127760; " . $row["city"] . ", " . $row["district"] . "</p>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<button class='adopt-btn' data-pet-id='" . $row["pet_id"] . "'>Adopt</button>";
        echo "</div>";
    }
} else {
    echo "<p>No pets available for adoption.</p>";
}

$conn->close();
?>
