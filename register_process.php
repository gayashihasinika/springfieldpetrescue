<?php
$connection = new mysqli("localhost", "root", "", "sprinfieldpetrescue");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $full_name = $_POST['full_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 

    
    $sql = "SELECT * FROM users WHERE user_name = ? OR email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $user_name, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
            session_start();
            if ($_SESSION['is_admin'] == 1){
    		header("Location: admin_dashboard.php?status=success&message=User+with+this+username+or+email+already+exists!");
    		exit();
	    } else {
        	header("Location: register.php?status=success&message=User+with+this+username+or+email+already+exists!");
        	exit();
	    } 
    } else {
        
        $sql = "INSERT INTO users (user_name, full_name, email, password, is_admin) VALUES (?, ?, ?, ?, 0)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $user_name, $full_name, $email, $password);

        if ($stmt->execute()) {
            session_start();
            if ($_SESSION['is_admin'] == 1){
    		header("Location: admin_dashboard.php?status=success&message=User+was+added+successfully!");
    		exit();
	    } else {
        	header("Location: login.php?status=success&message=Registration+successfull!+Please+use+your+registered+username+and+password+to+login.");
        	exit();
	    } 
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

$connection->close();
?>
