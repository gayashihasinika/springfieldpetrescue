<?php
session_start();
$connection = new mysqli("localhost", "root", "", "sprinfieldpetrescue");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $sql = "SELECT user_name, password, is_admin FROM users WHERE user_name = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_user_name, $db_password, $is_admin);
        $stmt->fetch();
        
        if ($password === $db_password) {
            $_SESSION['user_name'] = $db_user_name;
            $_SESSION['is_admin'] = $is_admin;

            if ($is_admin == 1) {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            header("Location: login.php?status=success&message=Invalid+password!");
        }
    } else {
        header("Location: login.php?status=success&message=User+not+found!");
    }
    
    $stmt->close();
}
$connection->close();
?>
