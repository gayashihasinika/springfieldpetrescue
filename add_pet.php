<?php
session_start();
if (!isset($_SESSION['user_name'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Springfield Pet Rescue and Rehome</title>
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <style>
        /*header styles*/
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
<?php if (isset($_GET['status']) && isset($_GET['message'])): ?>
        <script>
            alert("<?php echo $_GET['message']; ?>");
        </script>
    <?php endif; ?>

    <div class="container">
        <div class="top">
            <img class="imgl" src="images/1.jpg" alt="Springfield Pet Rescue">
            <h1>Springfield Pet Rescue and Rehome</h1>
            <div class="auth-buttons">
             	<a href="logout.php" class="btn">Logout</a>
        </div>
        </div>
    </div>
    <nav>
        <ul class="menu">
        <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="dashboard.php">My Dashboard</a></li>
                <li><a href="edit_user.php">Profile</a></li>
                <li>
                <?php
                
                if ($_SESSION['is_admin'] == 1){
                	echo '<a href="admin_dashboard.php">Admin Dashboard</a>';
                }?>
                </li>
            </ul>
        </nav>
        
    <main class="main-container">
    <h1 class="page-title">Add New Pet</h1>
    <form action="add_pet_process.php" method="POST" enctype="multipart/form-data" class="pet-form">
        <p class="form-label">Name</p>
        <input type="text" name="name" placeholder="Enter Pet Name" required class="form-input">
        <p class="form-label">Type</p>
        <input type="text" name="pet_type" placeholder="Enter Pet Type" required class="form-input">
        <p class="form-label">Age</p>
        <input type="number" name="age" placeholder="Enter Pet Age" required class="form-input">
        <p class="form-label">Gender</p>
        <input type="text" name="gender" placeholder="Enter Pet Gender" required class="form-input">
        <p class="form-label">District</p>
        <input type="text" name="district" placeholder="Enter District" required class="form-input">
        <p class="form-label">City</p>
        <input type="text" name="city" placeholder="Enter City" required class="form-input">
        <p class="form-label">Phone Number</p>
        <input type="text" name="phone_number" placeholder="Enter Phone Number" required class="form-input">
        <p class="form-label">Description</p>
        <textarea name="description" placeholder="Enter Description" required class="form-textarea"></textarea>
        <p class="form-label">Photo</p>
        <input type="file" name="photo" accept="image/*" required class="form-file-input">
        <input type="submit" value="Add Pet" class="form-submit">
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
            </ul>
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
