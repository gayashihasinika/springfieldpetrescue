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

$pet_id = isset($_GET['pet_id']) ? $_GET['pet_id'] : null;
$user_name = $_SESSION['user_name'];

if (!$pet_id) {
    die("No pet ID provided.");
}

$pet_sql = "SELECT * FROM pet WHERE pet_id = ? AND user_name = ?";
$pet_stmt = $connection->prepare($pet_sql);
$pet_stmt->bind_param("is", $pet_id, $user_name);
$pet_stmt->execute();
$pet_result = $pet_stmt->get_result();

if ($pet_result->num_rows === 0) {
    die("Pet not found or you don't have permission to edit this pet.");
}

$pet = $pet_result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $pet_type = $_POST['pet_type'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $phone_number = $_POST['phone_number'];
    $description = $_POST['description'];
    $is_adopted = isset($_POST['is_adopted']) ? 1 : 0;

    $update_sql = "UPDATE pet SET name = ?, pet_type = ?, age = ?, gender = ?, district = ?, city = ?, phone_number = ?, description = ?, is_adopted = ? WHERE pet_id = ? AND user_name = ?";
    $update_stmt = $connection->prepare($update_sql);
    $update_stmt->bind_param("ssisssisiis", $name, $pet_type, $age, $gender, $district, $city, $phone_number, $description, $is_adopted, $pet_id, $user_name);

    if ($update_stmt->execute()) {
        header("Location: dashboard.php?status=success&message=Pet+was+updated+successfully!");
        exit();
    } else {
        echo "Error updating pet details: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWS - Edit Pet</title>
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="css/edit.css">
    <style>
        /*header styles*/
.top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #00838f;
    padding: 20px;
    border-bottom: 5px solid #004d40;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.imgl {
    width: 60px;
    height: 60px;
    border-radius: 30px;
}

.auth-buttons .btn {
    color: white;
    background-color: #006064;
    padding: 10px 15px;
    margin-left: 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 1.1rem;
    transition: background-color 0.3s;
}

.auth-buttons .btn:hover {
    background-color: #004d40;
}

.top h1 {
    flex: 1;
    text-align: center;
    font-size: 2.5rem;
    margin: 0;
    color: #ffffff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

/*menu styles*/
ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: left;
    background-color: #004d40;
}

li {
    position: relative;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 1.1rem;
}

li a:hover,
.dropdown:hover .dropbtn {
    background-color: #00332b;
}



/* General Styles */
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

/* Main Container */
.main-container {
    display: flex;
    align-items: center; /* Vertically center items */
    justify-content: center; /* Horizontally center items */
    padding: 30px;
    min-height: 100vh;
    background-image: url(images/background.jpg); /* Light background to contrast with the form */
}

/* Image Styles */
.img {
    flex: 1; /* Allow the image to take up available space */
    max-width: 50%; /* Limit the width of the image */
    margin-right: 90px; /* Add some space between the image and form */
}

.responsive-image {
    width: 100%; /* Make the image responsive */
    height: 500px; /* Maintain aspect ratio */
    border-radius: 10px; /* Optional: rounded corners */
}

/* Form Container */
.form-container {
    flex: 1; /* Allow the form to take up available space */
    padding: 20px; /* Add some padding around the form */
    margin-left: 90px;
}

/* Page Title */
.page-title {
    font-size: 2rem;
    margin-bottom: 30px;
    color: #004d40; /* Dark green for title */
}

/* Shared Form Styles */
form {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    text-align: center;
    z-index: 2;
    position: relative;
    opacity: 0.95;
}

.form h1{
    text-align: center;
    margin-bottom: 30px;
    font-size: 2rem;
    color: #004d40;
}

/* Form Group for Input Fields */
.form-group {
    margin-bottom: 20px;
}

/* Form Labels */
.form-label {
    font-size: 1rem;
    color: #004d40; /* Dark green for labels */
    margin-bottom: 5px;
}

/* Input Fields */
.form-input,
.form-textarea,
.form-file-input {
    width: 90%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #004d40; /* Dark green border */
    border-radius: 5px;
    font-size: 1rem;
    outline: none;
    transition: border-color 0.3s ease;
}

/* Focus and Hover States */
.form-input:focus,
.form-textarea:focus,
.form-file-input:focus {
    border-color: #2ebacd; /* Light teal on focus */
}

/* Textarea Field */
.form-textarea {
    height: 100px;
    resize: none; /* Prevent resizing */
}

/* File Input Field */
.form-file-input {
    padding: 10px 0; /* Adjust padding for file input */
    border: none; /* Clean look for file input */
    background-color: #f1f1f1;
    font-size: 0.9rem;
}

/* Submit Button */
.form-submit,
.btn-primary {
    width: 90%;
    padding: 15px;
    background-color: #004d40; /* Dark green background */
    color: white;
    font-size: 1.2rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Hover Effect on Submit Button */
.form-submit:hover,
.btn-primary:hover {
    background-color: #2ebacd; /* Light teal on hover */
}

/* Form Actions (For alignment of buttons) */
.form-actions {
    margin-top: 20px;
}

/* Responsive Design */
@media screen and (max-width: 600px) {
    .main-container {
        flex-direction: column; /* Stack vertically on small screens */
        align-items: center; /* Center items */
    }

    .img {
        max-width: 90%; /* Adjust max width for smaller screens */
    }

    .form-container {
        width: 100%; /* Ensure form takes full width */
    }

    .page-title {
        font-size: 1.8rem;
    }

    .form-submit,
    .btn-primary {
        font-size: 1rem;
        padding: 12px;
    }
}

.footer {
    background-color: #004d40;
    color: #ffffff;
    padding: 20px 0px;
    text-align: center;
    margin-top: 50px;
}

.footer-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
}

.footer-section {
    flex: 1;
    margin: 10px;
}

.footer-section h3 {
    margin-bottom: 20px;
    color: #2ebacd;
}

.footer-section p {
    margin-bottom: 15px;
    line-height: 1.6;
    margin: 0;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #ffffff;
    text-decoration: none;
}

.footer-section ul li a:hover {
    color: #2ebacd;
    text-decoration: underline;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 15px;
}

.social-links a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #ffffff;
    transition: transform 0.3s ease;
}

.social-links a:hover {
    transform: scale(1.1);
}

.social-links img.icon {
    width: 30px;
    height: 30px;
    margin-right: 8px;
    transition: opacity 0.3s ease;
}

.social-links a:hover img.icon {
    opacity: 0.7;
}

.social-links i {
    font-size: 1.5rem;
    color: #ffffff;
    margin-left: 8px;
}

.social-links a:hover i {
    color: #2ebacd;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .social-links {
        flex-direction: column;
        gap: 10px;
    }

    .social-links a {
        justify-content: center;
    }
}


.footer-bottom {
    margin-top: 30px;
    border-top: 1px solid #2ebacd;
    padding-top: 10px;
}

.footer-bottom p {
    margin: 0;
    font-size: 0.9rem;
    color: #e0e0e0;
}

/* Icons */
.footer-section i {
    color: #2ebacd;
    margin-right: 10px;
}

.footer-section a {
    color: #ffffff;
    text-decoration: none;
}

.footer-section a:hover {
    color: #2ebacd;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        align-items: center;
    }

    .footer-section {
        max-width: 90%;
    }

    .social-links {
        margin-top: 10px;
    }
}

</style>
</head>
<body>
<header>
    <div class="logo">
            <a href="index.php">
            	<img src="images/logo.png" alt="PAWS Logo">
            </a>
    </div>
    <nav>
    	<ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="dashboard.php">My Dashboard</a></li>
                <li><a href="edit_user.php">Edit Profile</a></li>
                <li>
                <?php
                
                if ($_SESSION['is_admin'] == 1){
                	echo '<a href="admin_dashboard.php">Admin Dashboard</a>';
                }?>
                </li>
                
              
        </ul>
        <div class="auth-buttons">
             	<a href="logout.php" class="btn">Logout</a>
        </div>
    </nav>
    </header>
    <main class="container">
   <h1 class="title">Edit Pet: <?php echo $pet['name']; ?></h1>

    <form action="edit_pet.php?pet_id=<?php echo $pet_id; ?>" method="POST">
        <div class="form-group">
            <label for="name" class="label">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $pet['name']; ?>" required class="input">
        </div>

        <div class="form-group">
            <label for="pet_type" class="label">Type</label>
            <input type="text" id="pet_type" name="pet_type" value="<?php echo $pet['pet_type']; ?>" required class="input">
        </div>

        <div class="form-group">
            <label for="age" class="label">Age</label>
            <input type="number" id="age" name="age" value="<?php echo $pet['age']; ?>" required class="input">
        </div>

        <div class="form-group">
            <label for="gender" class="label">Gender</label>
            <input type="text" id="gender" name="gender" value="<?php echo $pet['gender']; ?>" required class="input">
        </div>

        <div class="form-group">
            <label for="district" class="label">District</label>
            <input type="text" id="district" name="district" value="<?php echo $pet['district']; ?>" required class="input">
        </div>

        <div class="form-group">
            <label for="city" class="label">City</label>
            <input type="text" id="city" name="city" value="<?php echo $pet['city']; ?>" required class="input">
        </div>

        <div class="form-group">
            <label for="phone_number" class="label">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo $pet['phone_number']; ?>" required class="input">
        </div>

        <div class="form-group">
            <label for="description" class="label">Description</label>
            <textarea id="description" name="description" required class="textarea"><?php echo $pet['description']; ?></textarea>
        </div>
        
        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="is_adopted" <?php echo $pet['is_adopted'] ? 'checked' : ''; ?> class="checkbox">
                Is Adopted
            </label>
        </div>

        <div class="form-group">
            <button type="submit" class="button">
                Update Pet
            </button>
        </div>
    </form>
</main>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h3>About Springfield Pet Rescue</h3>
            <p>
                We are dedicated to rescuing, rehabilitating, and rehoming stray and abandoned animals. Our mission is to create a safe and caring community for every animal in need.
            </p>
        </div>

        <div class="footer-section links">
            <h3>Quick Links</h3>
            <ul>
            <li><a href="help.php">Help</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
        </div>

        <div class="footer-section contact">
            <h3>Contact Us</h3>
            <p><i class="fas fa-map-marker-alt"></i> 123 Rescue St, Springfield, SL</p>
            <p><i class="fas fa-phone"></i> +94 123 456 789</p>
            <p><i class="fas fa-envelope"></i> info@springfieldpetrescue.com</p>
            <div class="social-links">
                <a href="https://www.facebook.com/springfieldpetrescue" target="_blank" rel="noopener noreferrer">
                    <img class="icon" src="images/icon1.png" alt="Facebook" />
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/springfieldpetrescue" target="_blank" rel="noopener noreferrer">
                    <img class="icon" src="images/icon2.png" alt="Instagram" />
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://twitter.com/springfieldpetrescue" target="_blank" rel="noopener noreferrer">
                    <img class="icon" src="images/icon3.png" alt="Twitter" />
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://tiktok.com/springfieldpetrescue" target="_blank" rel="noopener noreferrer">
                    <img class="icon" src="images/icon4.png" alt="TikTok" />
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2024 Springfield Pet Rescue and Rehome. All Rights Reserved.</p>
    </div>
</footer>
</body>
</html>

<?php
$pet_stmt->close();
$connection->close();
?>
