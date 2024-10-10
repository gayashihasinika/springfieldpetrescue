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

$user_name = $_SESSION['user_name'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $pet_type = $_POST['pet_type'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $phone_number = $_POST['phone_number'];
    $description = $_POST['description'];
    
  
    $photoPath = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];
        $fileSize = $_FILES['photo']['size'];
        $fileType = $_FILES['photo']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
      
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $allowedTypes = ['image/jpeg', 'image/png'];
        $maxFileSize = 50 * 1024 * 1024; // 50MB
        
        if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize && in_array($fileExtension, $allowedExtensions)) {
   
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
       
            $filePath = $uploadDir . md5(time() . $fileName) . '.' . $fileExtension;
            
          
            if (move_uploaded_file($fileTmpPath, $filePath)) {
                $photoPath = $filePath;
            } else {
                echo "Error moving the uploaded file.";
                exit();
            }
        } else {
            echo "Invalid file type or size.";
            exit();
        }
    }

    $sql = "INSERT INTO pet (user_name, name, pet_type, age, gender, district, city, phone_number, description, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $connection->error);
    }
    
    $stmt->bind_param("sssisssiss", $user_name, $name, $pet_type, $age, $gender, $district, $city, $phone_number, $description, $photoPath);
    
    if ($stmt->execute()) {
          
        header("Location: dashboard.php?status=success&message=Pet+was+added+successfully!");
        exit();
     
        
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>
