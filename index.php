<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Springfield Pet Rescue and Rehome</title>
    
    <style>
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
    background-image: url('images/background.jpg');
    padding: 0;
}

/* Banner Section */
.banner {
    position: relative;
    background-image: url('images/image1.jpg'); /* Replace with your banner image */
    background-size: cover;
    background-position: center;
    height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #fff;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.banner-content {
    position: relative;
    z-index: 2;
    padding: 20px;
}

.banner-content h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    font-weight: bold;
}

.banner-content p {
    font-size: 1.5rem;
    margin-bottom: 30px;
}

@media (max-width: 768px) {
    .banner-content h1 {
        font-size: 2.5rem;
    }

    .banner-content p {
        font-size: 1.2rem;
    }
}

      /* Adopt Me Section Styling */
.section-2 {
    text-align: center;
    margin: 50px 0;
}

.section-2 h2 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 30px;
}

.pet-listings {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap; /* Allow cards to wrap to the next line if needed */
    overflow-x: auto;  
   
}

.card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
    width: 400px;
    flex-shrink: 0;
}

.card:hover {
    transform: translateY(-10px);
}

.card-body {
    padding: 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.card img {
    width: 100%;
    height: auto;
    border-radius: 10px 10px 0 0;
    object-fit: cover;
}

.card h3 {
    font-size: 1.5rem;
    font-weight: bold;
    color: #2f1313; /* Heading color */
    margin: 15px 0 10px;
}

.card p {
    font-size: 1rem;
    color: #8c6239; /* Text color */
    margin-bottom: 15px;
}

.card .location {
    color: #ae6427; /* Location text color */
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.card .location img {
    width: 20px;
    margin-right: 8px;
}

.card .adopt-btn {
    background-color: #2ebacd;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1.2rem;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.card .adopt-btn:hover {
    background-color: #006064;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .pet-listings {
        flex-direction: column; /* Stack cards vertically on smaller screens */
        align-items: center; /* Center align the cards */
    }

    .card {
        width: 100%; /* Full width on smaller screens */
        max-width: 90%; /* Ensure cards are not too wide */
    }
}

/* Section 3 Styling */
.section-3 {
    display: flex; /* Use flexbox to align image and text side by side */
    align-items: center; /* Center items vertically */
    margin: 50px 0; /* Margin to separate from other sections */
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
}

.image {
    flex: 1; /* Allow the image to take up equal space */
    max-width: 500px; /* Limit the maximum width of the image container */
}

.image img {
    width: 100%; /* Make image responsive */
    height: auto; /* Maintain aspect ratio */
    border-radius: 10px; /* Round corners of the image */
}

.text {
    flex: 2; /* Allow the text to take up more space */
    padding: 20px; /* Padding around the text */
}

.text h2 {
    font-size: 2rem; /* Font size for the heading */
    font-weight: bold; /* Make the heading bold */
    color: #2f1313; /* Heading color */
    margin-bottom: 15px; /* Space below the heading */
}

.text p {
    font-size: 1rem; /* Font size for the paragraph */
    color: #8c6239; /* Text color */
    line-height: 1.5; /* Space between lines for readability */
    margin: 0; /* Remove default margin */
}

/* Responsive Styles */
@media (max-width: 768px) {
    .section-3 {
        flex-direction: column; /* Stack image and text on small screens */
        text-align: center; /* Center text on small screens */
    }

    .text {
        padding: 10px; /* Adjust padding for smaller screens */
    }
}

/* Popup Form Styling */
.popup-form {
    display: none; /* Initially hidden */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
}

.form-container {
    background-color: #f9f3b9; /* Light background for form */
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px; /* Padding inside the form */
    border: 1px solid #8c6239; /* Border for the form */
    border-radius: 10px; /* Rounded corners */
    width: 90%; /* Responsive width */
    max-width: 500px; /* Maximum width */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for depth */
}

.close-btn {
    color: #2f1313; /* Close button color */
    float: right; /* Position at the right */
    font-size: 28px; /* Size of close button */
    font-weight: bold; /* Make it bold */
    cursor: pointer; /* Pointer cursor on hover */
}

h2 {
    text-align: center; /* Centered heading */
    color: #2f1313; /* Heading color */
}

label {
    display: block; /* Each label on a new line */
    margin: 10px 0 5px; /* Spacing above and below */
    font-weight: bold; /* Bold labels */
    color: #2f1313; /* Label color */
}

input[type="text"] {
    width: 100%; /* Full width inputs */
    padding: 10px; /* Padding inside inputs */
    border: 1px solid #8c6239; /* Border color */
    border-radius: 5px; /* Rounded corners */
    box-sizing: border-box; /* Include padding and border in total width */
    margin-bottom: 15px; /* Space below each input */
}

button {
    background-color: #2ebacd; /* Button color */
    color: white; /* Button text color */
    padding: 10px; /* Padding inside button */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    width: 100%; /* Full width button */
    font-size: 16px; /* Font size for button */
}

button:hover {
    background-color: #006064; /* Darker button color on hover */
}

/* Responsive Design */
@media (max-width: 600px) {
    .form-container {
        margin: 10% auto; /* Adjust margins for smaller screens */
        width: 90%; /* Keep it responsive */
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
                <?php if (isset($_SESSION['user_name'])): ?>
                    <a href="logout.php" class="btn">Logout</a>
                <?php else: ?>
                    <a href="register.php" class="btn">Register</a>
                    <a href="login.php" class="btn">Log In</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <nav>
        <ul class="menu">
        <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li>
                 <?php if (isset($_SESSION['user_name'])){ 
                 	echo '<a href="dashboard.php">My Dashboard</a>';
                 }?>	
                </li>
                <li>
                 <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
                    echo '<a href="admin_dashboard.php">Admin Dashboard</a>';
                 } ?>
                </li>
        </ul>
        </nav>

        <!-- Banner Section -->
    <div class="banner">
        <div class="overlay"></div>
        <div class="banner-content">
            <h1>Welcome to Springfield Pet Rescue</h1>
            <p>Join us in making a difference in the lives of stray dogs through rescue, rehabilitation, and rehoming.</p>
        </div>
    </div>

  
    <section class="section-2">
        <h2>Adopt Me!</h2>
        <div class="pet-listings">
        <div class="card">
        <div class="card-body">
            <?php include 'fetch_pets.php'; ?>
            </div>
            </div>
        </div>
    </section>

    <section class="section-3">
        <div class="image">
            <img src="images/banner.jpg" alt="Pet Image">
        </div>
        <div class="text">
            <h2>
                Why Adopt a Pet?
            </h2>
            <p>
                Adopting a pet is a rewarding experience that can change your life. When you adopt a pet, you are giving them a second chance at life and providing them with a loving home. Adopting a pet can also improve your mental and physical health, reduce stress, and increase your overall happiness. So why wait? Adopt a pet today and make a difference in their life and yours.
            </p>
        </div>
    </section>

    
    <div id="adopt-form-popup" class="popup-form">
        <div class="form-container">
            <span id="close-popup" class="close-btn">&times;</span>
            <h2>Adoption Form</h2>
            <form id="adoptForm" action="submit_adopt.php" method="POST">
                <input type="hidden" id="pet_id" name="pet_id" />
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required />
                <label for="district">District:</label>
                <input type="text" id="district" name="district" required />
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required />
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" required />
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

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

        <script src="js/index.js"></script>
    
</body>
</html>
